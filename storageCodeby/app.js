require('rootpath')();
require('log-timestamp');
const express = require('express')
const responseFormat = require('middleware/responseFormat')
const indexRouter = require("routes/index")
const authRouter = require("routes/auth")
const postsRouter = require("routes/posts")
const filesRouter = require("routes/files")
const path = require('path')

const app = express()
app.use(express.json())
app.use(responseFormat)

app.use('/public', express.static(path.join(__dirname, 'public')));

app.use(indexRouter)
app.use(authRouter)
app.use(postsRouter)
app.use(filesRouter)

app.use((err, req, res, next) => {
    res.status(500);
    res.json({status: false, message: err.message});
    // next()
})
module.exports = app