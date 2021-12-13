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
const _ = require('lodash');
const ffmpeg = require('fluent-ffmpeg');
const {v4: uuidv4} = require('uuid');

const storage = multer.memoryStorage();
const upload = multer({storage});

function ffmpegSync(file) {
    return new Promise((resolve, reject) => {
        ffmpeg(file.input)
            .saveToFile(file.output)
            .on('end', () => {
                fs.unlinkSync(file.input);
                resolve(file)
            })
            .on('error', (err) => {
                return reject(new Error(err))
            })
    })
}

function sharpSync(buffer, file) {
    return new Promise((resolve, reject) => {
        Sharp(buffer)
            .webp({quality: 20})
            .rotate()
            .toFile(file.output)
            .then(data => {
                resolve(file)
            })
            .catch(err => {
                return reject(new Error(err))
            });
    })
}

function writeFileSync(buffer, file) {
    return new Promise((resolve, reject) => {
        fs.writeFile(file.output, buffer, function (err) {
            if (err) reject(err);
            else resolve(file);
        });
    })
}

router.post('/files', upload.any(), asyncHandler(async (request, response) => {
    const app_id = request.header('api_id')
    const filepath = `public/files/${app_id}`
    fs.mkdirSync(filepath, {recursive: true})
    const promises = [];
    const otherFiles = [];

    (request.files ?? []).map((file, key) => {
        const {buffer, mimetype} = file;
        let fileName, filePath, aFile;
        aFile = _.omit(file, ['buffer'])

        switch (true) {
            case (mimetype.match(/video/g) ? true : false) :
                const filePath1 = `${filepath}/${uuidv4()}${path.extname(file.originalname)}`
                fs.writeFileSync(filePath1, buffer);
                filePath = `${filepath}/${uuidv4()}.mp4`
                aFile = {...aFile, app_id, path: filePath, input: filePath1, output: filePath}
                promises.push(ffmpegSync(aFile))
                break;
            case (mimetype.match(/image/g) ? true : false) :
                filePath = `${filepath}/${uuidv4()}.webp`
                aFile = {...aFile, app_id, path: filePath, output: filePath}
                promises.push(sharpSync(buffer, aFile))
                break;
            default:
                filePath = `${filepath}/${uuidv4()}${path.extname(file.originalname)}`
                // fs.writeFileSync(filePath, buffer);
                aFile = {...aFile, app_id, path: filePath, output: filePath}
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

// router.post('/files1', multerFile.any(), asyncHandler(async (request, response) => {
//     const values = (request.files ?? []).map(item => {
//         return {...item, api_id: request.header('api_id')}
//     })
//     const files = await File.bulkCreate(values, {returning: true})
//     response.send(files)
// }))

// router.get('/files/video1', asyncHandler(async (req, res) => {
//     let range = req.headers.range ?? '0';
//     console.log(range)
//     res.set('Content-Type', 'video/mp4');
//     const file = 'public/4.mp4';
//     // const ffmpeg = require('fluent-ffmpeg');
//     const proc = ffmpeg()
//         // input video only stream
//         .addInput(fs.createReadStream(`${file}`))
//         // input audio only file
//         // .addInput(`${file}-audio.aac`)
//         .format('mp4')
//         // required bcz mp4 needs to write header in the front after completing whole encoding
//         .outputOptions('-movflags frag_keyframe+empty_moov')
//         // display progress
//         .on('progress', function (progress) {
//             console.log(progress);
//         })
//         .on('error', function (err) {
//             console.log('An error occurred: ' + err.message);
//         })
//         // after whole merging operation is finished
//         .on('end', function () {
//             console.log('Processing finished !');
//         })
//
//     // pipe the resulting merged stream to output
//     const ffStream = proc.pipe();
//     ffStream.on('data', function (chunk) {
//         console.log('ffmpeg just wrote ' + chunk.length + ' bytes');
//     });
//     ffStream.pipe(res);
// }))

router.get('/files/video', asyncHandler(async (req, res) => {
// Ensure there is a range given for the video
    const range = req.headers.range ?? '0';
    if (!range) {
        res.status(400).send("Requires Range header");
    }

    // get video stats (about 61MB)
    const videoPath = "public/4.mp4";
    const videoSize = fs.statSync("public/4.mp4").size;

    // Parse Range
    // Example: "bytes=32324-"
    const CHUNK_SIZE = 10 ** 6; // 1MB
    const start = Number(range.replace(/\D/g, ""));
    const end = Math.min(start + CHUNK_SIZE, videoSize - 1);

    // Create headers
    const contentLength = end - start + 1;
    const headers = {
        "Content-Range": `bytes ${start}-${end}/${videoSize}`,
        "Accept-Ranges": "bytes",
        "Content-Length": contentLength,
        "Content-Type": "video/mp4",
    };

    // HTTP Status 206 for Partial Content
    res.writeHead(206, headers);

    // create video read stream for this particular chunk
    const videoStream = fs.createReadStream(videoPath, {start, end});

    // Stream the video chunk to the client
    videoStream.pipe(res);

}))
router.get('/files/ffmpeg', asyncHandler(async (request, response) => {
    var outStream = fs.createWriteStream('public/41.mp4');

    ffmpeg('public/4.mp4')
        .videoCodec('libx264')
        .audioCodec('libmp3lame')
        .size('320x240')
        .on('error', function (err) {
            console.log('An error occurred: ' + err.message);
        })
        .on('end', function () {
            console.log('Processing finished !');
        })
        .pipe(outStream, {end: true});
    // var stream  = fs.createWriteStream('outputfile.divx');
    //
    // ffmpeg('public/4.mp4')
    //     .output('outputfile.mp4')
    //     .output(stream);
    // ffmpeg -i 1.mp4 -vcodec libx265 -crf 28 fps=fps=30 11.mp4
    // ffmpeg -i 4.mp4 -vcodec libx265 -crf 28 -filter:v fps=fps=30 41.mp4
    // ffmpeg -i 4.mp4 -vcodec h264 -acodec aac 41.mp4
    // // ffmpeg -i 4.mp4 -vcodec libx265 -crf 28 44.mp4
    // // ffmpeg -i 4.mp4 -vcodec h264 -acodec aac 45.mp4
    // // ffmpeg -i 4.mp4 -c:v libx264 -crf 18 -preset ultrafast 46.mp4
    // ffmpeg -i 4.mp4 -vcodec libx265 -crf 28 42.mp4
    // ffmpeg -i 4.mp4 43.mp4

    // try {
    //     var process = new ffmpeg('public/4.mp4');
    //     process
    //         // .on('progress', progress => console.log('Processing: ' + progress.percent + '%'))
    //         .then(function (video) {
    //             video
    //                 .save('public/44.mp4', function (error, file) {
    //                     console.log('error', error)
    //                     if (!error)
    //                         console.log('Video file: ' + file);
    //                 })
    //         }, function (err) {
    //             console.log('Error: ' + err);
    //         });
    // } catch (e) {
    //     console.log('e', e)
    // }

}))

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
