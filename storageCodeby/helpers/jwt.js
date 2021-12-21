const jwt = require('jsonwebtoken')
const env = require("config/env")

function jwtDecode(token) {
    return jwt.verify(token, 'JWT_SECRET')
}

function jwtEncode(any) {
    return jwt.sign(any, 'JWT_SECRET')
}

module.exports = {jwtEncode, jwtDecode}