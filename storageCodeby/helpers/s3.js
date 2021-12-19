require('dotenv').config()
const fs = require('fs')
const S3 = require('aws-sdk/clients/s3')

function uploadFile(file, keys) {
    const s3 = new S3(keys)
    const fileStream = fs.createReadStream(file.path)
    const params = {
        ...keys,
        Body: fileStream,
        Key: `${file.path}`
    }
    return s3.upload(params).promise()
}

function getFileStream(fileKey, keys) {
    const s3 = new S3(keys)
    const params = {
        Key: fileKey,
        Bucket: keys.Bucket
    }
    return s3.getObject(params).createReadStream()
}

function getFileURL(fileKey, keys) {
    const s3 = new S3(keys)
    const params = {
        Key: fileKey,
        Bucket: keys.Bucket,
        Expires: 900,
    }
    return s3.getSignedUrl('getObject', params)
}

module.exports = {uploadFile, getFileStream, getFileURL}