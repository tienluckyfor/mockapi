'use strict';
const mung = require('express-mung');

function responseFormat(body, req, res) {
    return {status:true, data: body};
}

module.exports = mung.json(responseFormat);