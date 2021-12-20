var ffmpeg = require('fluent-ffmpeg');
const Sharp = require('sharp');
const fs = require('fs');

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

function writeFileBase64Sync(buffer, file) {
    return new Promise((resolve, reject) => {
        fs.writeFile(file.output, buffer, 'base64', function (err) {
            if (err) reject(err);
            else resolve(file);
        })
    })
}

module.exports = {ffmpegSync, sharpSync, writeFileSync, writeFileBase64Sync}