var url = require('url');


function baseUrl(req, prefix=null) {
    const bUrl = url.format({
        protocol: req.protocol,
        host: req.get('host'),
        // pathname: req.originalUrl
    });
    return prefix ? [bUrl, prefix].join('') : bUrl;
}

function fullUrl(req) {
    return url.format({
        protocol: req.protocol,
        host: req.get('host'),
        pathname: req.originalUrl
    });
}

module.exports = {
    baseUrl, fullUrl
}