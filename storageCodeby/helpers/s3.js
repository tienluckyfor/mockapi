require('dotenv').config()
const fs = require('fs')
const S3 = require('aws-sdk/clients/s3')

const bucketName = "smile-eye"
const region = "ap-southeast-1"
const accessKeyId = "AKIAXX7BOHEK754OC45F"
const secretAccessKey = "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"

const s3 = new S3({
    region,
    accessKeyId,
    secretAccessKey,
    apiVersion: "2006-03-01"
})

function uploadFile(file) {
    const fileStream = fs.createReadStream(file.path)
    const uploadParams = {
        Bucket: bucketName,
        Body: fileStream,
        Key: `${file.path}`
    }
    return s3.upload(uploadParams).promise()
}

function getFileStream(fileKey) {
    const downloadParams = {
        Key: fileKey,
        Bucket: bucketName
    }
    return s3.getObject(downloadParams).createReadStream()
}

function getFileURL(fileKey) {
    const params = {
        Key: fileKey,
        Bucket: bucketName,
        Expires: 900,
    }
    return s3.getSignedUrl('getObject', params)
}


module.exports = {uploadFile, getFileStream, getFileURL}