const jwt = require('jsonwebtoken')
const asyncHandler = require('express-async-handler')
const User = require("models").User
const env = require("config/env")

const authentication = asyncHandler(async (request, response, next) => {
    const token = request.header('Authorization').replace('Bearer ', '')
    const decoded = jwt.verify(token, env.JWT_SECRET)
    const user = await User.findOne({where: {id: decoded.id, token: token}})
    if (!user) {
        throw new Error("Token not valid")
    }
    request.token = token
    request.user = user
    next()
})

module.exports = authentication
