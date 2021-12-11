const express = require('express');
const router = express.Router();
const Joi = require('joi');
const asyncHandler = require('express-async-handler')
const multerFile = require('middleware/multerFile')
const {joiValidation} = require("helpers/errorHandle")
const File = require("models").File
const path = require('path');
const fs = require('fs');
const Sharp = require('sharp');
const multer = require('multer')
var _ = require('lodash');

const storage = multer.memoryStorage();
const upload = multer({storage});
router.post('/files', upload.any(), asyncHandler(async (request, response) => {
    const app_id = request.header('api_id')
    const filepath = `public/files/${app_id}`
    fs.mkdirSync(filepath, {recursive: true})
    const {files} = request
    // response.send(files)
    const promises = [];

    const fileData = files.map((file, key) => {
        const {buffer, mimetype} = file;
        switch (true) {
            case (mimetype.match(/image/g) ? true : false) :
                const ref = Date.now() + '.webp'
                const filepath1 = `${filepath}/${ref}`
                const sharp = Sharp(buffer)
                    .webp({quality: 20})
                    .rotate()
                    .toFile(filepath1);
                promises.push(sharp)
                let aFile = _.omit(file, ['buffer'])
                aFile = {...aFile, app_id, path: filepath1,}
                return aFile;
                break;
        }
    })
    Promise.all(promises).then(async values => {
        const result = values.map((item, key) => {
            return {...fileData[key], ...item}
        })
        const files = await File.bulkCreate(result, {returning: true})
        response.send(files)
    })
}))

// router.post('/files1', multerFile.any(), asyncHandler(async (request, response) => {
//     const values = (request.files ?? []).map(item => {
//         return {...item, api_id: request.header('api_id')}
//     })
//     const files = await File.bulkCreate(values, {returning: true})
//     response.send(files)
// }))

router.get('/files/:file_id', asyncHandler(async (request, response) => {
    const {file_id} = request.params
    const file = await File.findByPk(file_id)
    switch (true) {
        case ((file.mimetype ?? '').match(/image/g) ? true : false) :
            const {w, h, q = 100, f = 'cover', p = 'left top', format = 'webp'} = request.query
            const width = w ? parseInt(w) : null
            const height = h ? parseInt(h) : null
            const quality = q ? parseInt(q) : null
            const fit = f
            const position = p

            let imagePath = path.join(__dirname, `../${file.path}`)
            if (!fs.existsSync(imagePath)) {
                imagePath = path.join(__dirname, `../public/images/file-not-found.png`)
            }
            const stream = fs.createReadStream(imagePath);
            const transform = Sharp().resize(width, height, {
                fit,
                position,
            }).toFormat(format, {
                quality: parseInt(quality)
            });
            response.set(`Content-Type`, `image/${format}`);
            stream.pipe(transform).on(`error`, (e) => {
            }).pipe(response);
            return stream;
            break;
    }
    response.send(file)
}))

module.exports = router;
