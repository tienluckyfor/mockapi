var url = require('url');
const axios = require("axios")

class Url {
    static baseUrl(req, prefix = null) {
        const bUrl = url.format({
            protocol: req.protocol,
            host: req.get('host'),
            // pathname: req.originalUrl
        });
        return prefix ? [bUrl, prefix].join('') : bUrl;
    }

    static fullUrl(req) {
        return url.format({
            protocol: req.protocol,
            host: req.get('host'),
            pathname: req.originalUrl
        });
    }

    static async isOnline(url) {
        try {
            await axios.head(url, {timeout: 1000 * 1});
            return true;
        } catch (error) {
            return false;
        }
    }
}

module.exports = {Url}