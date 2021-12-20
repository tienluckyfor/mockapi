require('rootpath')();
require('log-timestamp');
const express = require('express')
const responseFormat = require('middleware/responseFormat')
const indexRouter = require("routes/index")
const authRouter = require("routes/auth")
const postsRouter = require("routes/posts")
const fileLocalRouter = require("routes/file_local")
const fileS3Router = require("routes/file_s3")
const testRouter = require("routes/test")
const path = require('path')
const cors = require('cors')

const app = express()
app.use(cors())
app.use(express.json())
app.use(responseFormat)

app.use('/public', express.static(path.join(__dirname, 'public')));

app.use(indexRouter)
app.use(authRouter)
app.use(postsRouter)
app.use(fileLocalRouter)
app.use(fileS3Router)
app.use(testRouter)

app.use((err, req, res, next) => {
    res.status(500);
    res.json({status: false, message: err.message});
    // next()
})
module.exports = app