const express = require('express');
const router = express.Router();
const asyncHandler = require('express-async-handler')

/* eslint-disable no-new */
const ffmpeg = require('fluent-ffmpeg')
// const ffmpegPath = require('ffmpeg-static').path
// const ffprobePath = require('ffprobe-static').path
const path = require('path')
const {v4: uuidv4} = require('uuid');

router.get('/test', asyncHandler(async (req, res) => {
    const promises = []
    function ffmpegSync(path, savePath) {
        return new Promise((resolve, reject) => {
            ffmpeg(path)
                .saveToFile(savePath)
                .on('end', () => {
                    resolve()
                })
                .on('error', (err) => {
                    return reject(new Error(err))
                })
        })
    }
    console.log('1')
    const v1 = ffmpegSync('routes/input.mp4', 'output-1.mp4')
    const v2 = ffmpegSync('routes/input.mp4', 'output-2.mp4')
    promises.push(v1, v2)
    Promise.all(promises).then(async values => {
        console.log('values', values)
    })
    console.log('2')
}))

module.exports = router;
