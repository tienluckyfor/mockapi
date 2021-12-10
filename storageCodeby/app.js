require('rootpath')();
require('log-timestamp');
const express = require('express')
const indexRouter = require("routes/index")
const authRouter = require("routes/auth")
const postsRouter = require("routes/posts")
// const {errorHandle} = require("helpers/errorHandle")
const responseFormat = require('middleware/responseFormat')

const app = express()
app.use(express.json())
app.use(responseFormat)

app.use(indexRouter)
app.use(authRouter)
app.use(postsRouter)

app.use((err, req, res, next) => {
    console.log('err1', err)
    res.status(500);
    res.json({status: false, message: err.message});
    // next()
})
module.exports = app