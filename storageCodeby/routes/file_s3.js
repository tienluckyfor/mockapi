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
const {ffmpegSync, sharpSync, writeFileSync, writeFileBase64Sync} = require('helpers/writeFile')
const {resImageByStream, resFileByStream} = require('helpers/readFile')
const {uploadFile, getFileStream, getFileURL} = require('helpers/s3')
const {authUser, authS3} = require('middleware/auth')

const storage = multer.memoryStorage();
const upload = multer({storage});

router.post('/file_s3', authUser, authS3, upload.any(), asyncHandler(async (request, response) => {
    const {api} = request
    const filepath = `public/files/${api.id}`
    fs.mkdirSync(filepath, {recursive: true})
    const promises = [];

    // console.log('request.files', request.body);
    const {audio_base64} = request.body
    if (audio_base64) {
        const buffer = audio_base64.replace(/^data:audio\/wav;base64,/, "")
        const filePath = `${filepath}/${uuidv4()}.mp3`
        const aFile = {
            fieldname: 'audio_base64',
            originalname: 'record',
            encoding: '7bit',
            mimetype: 'audio/mpeg',
            size: -1,
            path: filePath,
            output: filePath,
            api_id: api.id,
            platform: api.platform
        }
        promises.push(writeFileBase64Sync(buffer, aFile))
    }

    // convert
    (request.files ?? []).map(async (file, key) => {
        const {buffer, mimetype} = file;
        let filePath, aFile;
        aFile = _.omit(file, ['buffer'])
        console.log('aFile', aFile)
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
                console.log('file', file)
                console.log('path.extname(file.originalname)', path.extname(file.originalname))
                if(file.originalname=='mp4')
                    promises.push(writeFileSync(buffer, aFile))
                else
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
            vals.map(item => {
                fs.unlinkSync(item.path)
            })
            const files = await File.bulkCreate(vals, {returning: true})
            response.send(files)
        });
    })
}))

router.get('/file_s3/:file_id/:any?', asyncHandler(async (request, response) => {
    const {file_id} = request.params;
    const file = await File.findOne({
        where: {id: file_id},
        include: {model: Api, as: 'api',},
    })
    let streamData;
    const apiKeys = JSON.parse(file.api.keys)
    switch (true) {
        case ((file.mimetype ?? '').match(/image/g) ? true : false) :
            streamData = getFileStream(file.cloud.Key, apiKeys)
            return resImageByStream(streamData, request.query, response)
            break;
        case ((file.mimetype ?? '').match(/video/g) ? true : false) :
            // case ((file.mimetype ?? '').match(/audio/g) ? true : false) :
            // console.log('file', file)
            // const Location = getFileURL(file.cloud.Key, apiKeys)
            const {Location} = file.cloud
            response.writeHead(301, {Location});
            response.end();
            break;
        default:
            streamData = getFileStream(file.cloud.Key, apiKeys)
            return resFileByStream(streamData, response)
            break;
    }
}))

module.exports = router;