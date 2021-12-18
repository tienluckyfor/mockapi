const asyncHandler = require('express-async-handler')
const User = require("models").User
const Api = require("models").Api
const {jwtDecode} = require("helpers/jwt")

const authUser = asyncHandler(async (request, response, next) => {
    const token = request.header('Authorization').replace('Bearer ', '')
    console.log('token', token)
    const decoded = jwtDecode(token)
    console.log('decoded', decoded)
    const user = await User.findOne({where: {id: decoded.id, token: token}})
    if (!user) {
        throw new Error("Token not valid")
    }
    request.token = token
    request.user = user
    next()
})

const authS3 = asyncHandler(async (request, response, next) => {
    const api_id = request.header('api_id')
    const api = await Api.findOne({id: api_id, platform: 'file_s3'})
    if (!api) {
        throw new Error("Api not exists")
    }
    request.api = api
    next()
})

module.exports = {authUser, authS3}
