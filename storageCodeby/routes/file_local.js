const express = require('express');
const router = express.Router();
const asyncHandler = require('express-async-handler')
const File = require("models").File
const path = require('path');
const fs = require('fs');
// const Sharp = require('sharp');
const multer = require('multer')
const _ = require('lodash');
const ffmpeg = require('fluent-ffmpeg');
const {v4: uuidv4} = require('uuid');
const {ffmpegSync, sharpSync, writeFileSync} = require('helpers/writeFile')
const {resImageByPath, resVideoByPath, resFileByPath} = require('helpers/readFile')

const storage = multer.memoryStorage();
const upload = multer({storage});

router.post('/file_local', upload.any(), asyncHandler(async (request, response) => {
    const app_id = request.header('api_id')
    const filepath = `public/files/${app_id}`
    fs.mkdirSync(filepath, {recursive: true})
    const promises = [];
    // const otherFiles = [];
    const platform = 'file_local';

    (request.files ?? []).map((file, key) => {
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

    let files;
    Promise.all(promises).then(async values => {
        console.log('values', values)
        // const result = values.map((item, key) => {
        //     return {...videoFiles[key], ...item}
        // })
        files = await File.bulkCreate(values, {returning: true})
        response.send(files)
    })
    // Promise.all(imagePromises).then(async values => {
    //     const result = values.map((item, key) => {
    //         return {...fileData[key], ...item}
    //     })
    //     files = await File.bulkCreate(result, {returning: true})
    //     response.send(files)
    // })
    // files = await File.bulkCreate(fileData, {returning: true})
    // response.send(files)
}))

router.get('/file_local/:file_id', asyncHandler(async (request, response) => {
    const {file_id} = request.params
    const file = await File.findByPk(file_id)
    switch (true) {
        case ((file.mimetype ?? '').match(/image/g) ? true : false) :
            return resImageByPath(file.path, request.query, response)
            break;
        case ((file.mimetype ?? '').match(/video/g) ? true : false) :
            const {thumb_at} = request.query
            if (thumb_at) {
                const obj = {
                    timestamps: [thumb_at],
                    filename: `video-thumb-${file.id}.png`,
                    folder: `public/files/${file.app_id}`,
                }
                ffmpeg(file.path)
                    .screenshots(obj);
                const filepath = _.join([obj.folder, obj.filename], '/')
                return resImageByPath(filepath, request.query, response)
            }
            return resVideoByPath(file.path, request, response)
            break;
        default:
            return resFileByPath(file.path, response)
            break;
    }
    response.send(file)
}))

module.exports = router;