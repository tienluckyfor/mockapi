const jwt = require('jsonwebtoken')
const env = require("config/env")

function jwtDecode(token) {
    return jwt.verify(token, env.JWT_SECRET ?? 'JWT_SECRET')
}

function jwtEncode(any) {
    return jwt.sign(any, env.JWT_SECRET ?? 'JWT_SECRET')
}

module.exports = {jwtEncode, jwtDecode}