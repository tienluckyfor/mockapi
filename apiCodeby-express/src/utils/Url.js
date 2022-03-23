var url = require('url');
const axios = require("axios")
const config =  require('../../config.js');

class Url {
    static baseUrl(req, prefix = null) {
        // const bUrl = url.format({
        //     protocol: req.protocol,
        //     host: req.get('host'),
        //     // pathname: req.originalUrl
        // });

        return prefix ? [config.APP_URL, prefix].join('') : bUrl;
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
            return true;
            await axios.head(url, {timeout: 1000 * 10});
            return true;
        } catch (error) {
            return false;
        }
    }
}

module.exports = {Url}