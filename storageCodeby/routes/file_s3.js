const express = require('express');
const router = express.Router();
const asyncHandler = require('express-async-handler')
const File = require("models").File
const path = require('path');
const fs = require('fs');
const multer = require('multer')
const _ = require('lodash');
const {v4: uuidv4} = require('uuid');
const {ffmpegSync, sharpSync, writeFileSync} = require('helpers/writeFile')
const {resImageByStream, resFileByStream} = require('helpers/readFile')
const {uploadFile, getFileStream, getFileURL} = require('helpers/s3')

const storage = multer.memoryStorage();
const upload = multer({storage});

router.post('/file_s3', upload.any(), asyncHandler(async (request, response) => {
    const app_id = request.header('api_id')
    const filepath = `public/files/${app_id}`
    fs.mkdirSync(filepath, {recursive: true})
    const promises = [];
    // const otherFiles = [];
    const platform = 'file_s3';

    (request.files ?? []).map(async (file, key) => {
        const {buffer, mimetype} = file;
        let filePath, aFile;
        aFile = _.omit(file, ['buffer'])

        switch (true) {
            case (mimetype.match(/video/g) ? true : false) :
                const filePath1 = `${filepath}/${uuidv4()}${path.extname(file.originalname)}`
                fs.writeFileSync(filePath1, buffer);
                filePath = `${filepath}/${uuidv4()}.mp4`
                aFile = {...aFile, app_id, path: filePath, input: filePath1, output: filePath, platform}
                promises.push(ffmpegSync(aFile))
                break;
            case (mimetype.match(/image/g) ? true : false) :
                filePath = `${filepath}/${uuidv4()}.webp`
                aFile = {...aFile, app_id, path: filePath, output: filePath, platform}
                // console.log('aFile', aFile)
                // const result = await uploadFile(aFile)
                // console.log('result', result)
                promises.push(sharpSync(buffer, aFile))
                break;
            default:
                filePath = `${filepath}/${uuidv4()}${path.extname(file.originalname)}`
                // fs.writeFileSync(filePath, buffer);
                aFile = {...aFile, app_id, path: filePath, output: filePath, platform}
                promises.push(writeFileSync(buffer, aFile))
                // otherFiles.push(aFile)
                break;
        }
    })

    // let files;
    Promise.all(promises).then(async values => {
        const payload = values.map(async aFile => {
            const cloud = await uploadFile(aFile)
            return {...aFile, cloud}
        })
        Promise.all(payload).then(async vals => {
            const files = await File.bulkCreate(vals, {returning: true})
            response.send(files)
        });
    })
}))

router.get('/file_s3/:file_id', asyncHandler(async (request, response) => {
    const {file_id} = request.params
    const file = await File.findByPk(file_id)
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