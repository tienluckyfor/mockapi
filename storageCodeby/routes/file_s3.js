const express = require('express');
const router = express.Router();
const asyncHandler = require('express-async-handler')
const File = require("models").File
const Api = require("models").Api
const path = require('path');
const fs = require('fs');
const multer = require('multer')
const _ = require('lodash');
const {v4: uuidv4} = require('uuid');
const {ffmpegSync, sharpSync, writeFileSync} = require('helpers/writeFile')
const {resImageByStream, resFileByStream} = require('helpers/readFile')
const {uploadFile, getFileStream, getFileURL} = require('helpers/s3')
const {authUser, authS3} = require('middleware/auth')

const storage = multer.memoryStorage();
const upload = multer({storage});

router.post('/file_s3', authUser, authS3, upload.any(), asyncHandler(async (request, response) => {
    const {api} = request
    // console.log('api', api)
    // return;
    // const api_id = request.header('api_id')
    // const api = await Api.findByPk(api_id)
    const filepath = `public/files/${api.id}`
    fs.mkdirSync(filepath, {recursive: true})
    const promises = [];
    // const otherFiles = [];
    // const platform = 'file_s3';

    // convert
    (request.files ?? []).map(async (file, key) => {
        const {buffer, mimetype} = file;
        let filePath, aFile;
        aFile = _.omit(file, ['buffer'])
        switch (true) {
            case (mimetype.match(/video/g) ? true : false) :
                const filePath1 = `${filepath}/${uuidv4()}${path.extname(file.originalname)}`
                fs.writeFileSync(filePath1, buffer);
                filePath = `${filepath}/${uuidv4()}.mp4`
                aFile = {
                    ...aFile,
                    path: filePath,
                    input: filePath1,
                    output: filePath,
                    api_id: api.id,
                    platform: api.platform
                }
                promises.push(ffmpegSync(aFile))
                break;
            case (mimetype.match(/image/g) ? true : false) :
                filePath = `${filepath}/${uuidv4()}.webp`
                aFile = {
                    ...aFile,
                    path: filePath,
                    output: filePath,
                    api_id: api.id,
                    platform: api.platform
                }
                promises.push(sharpSync(buffer, aFile))
                break;
            default:
                filePath = `${filepath}/${uuidv4()}${path.extname(file.originalname)}`
                aFile = {
                    ...aFile,
                    path: filePath,
                    output: filePath,
                    api_id: api.id,
                    platform: api.platform
                }
                promises.push(writeFileSync(buffer, aFile))
                break;
        }
    })

    // s3 upload
    Promise.all(promises).then(async values => {
        const payload = values.map(async aFile => {
            const cloud = await uploadFile(aFile, api.keys)
            return {...aFile, cloud}
        })
        Promise.all(payload).then(async vals => {
            vals.map(item=>{
                fs.unlinkSync(item.path)
            })
            const files = await File.bulkCreate(vals, {returning: true})
            response.send(files)
        });
    })
}))

router.get('/file_s3/:file_id', asyncHandler(async (request, response) => {
    const {file_id} = request.params
    const file = await File.findOne({
        id: file_id,
        include: {model: Api, as: 'api',},
    })
    let stream;
    switch (true) {
        case ((file.mimetype ?? '').match(/image/g) ? true : false) :
            stream = getFileStream(file.cloud.key)
            return resImageByStream(stream, request.query, response)
            break;
        case ((file.mimetype ?? '').match(/video/g) ? true : false) :
            const Location = getFileURL(file.cloud.key)
            response.writeHead(301, {Location});
            response.end();
            break;
        default:
            stream = getFileStream(file.cloud.key)
            return resFileByStream(stream, response)
            break;
    }
}))

module.exports = router;