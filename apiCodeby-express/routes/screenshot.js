const Screenshot = require("../utils/Screenshot");
const File = require("../utils/File");
const Url = require("../utils/Url");
var path = require('path');
var express = require('express');
const {check, validationResult} = require('express-validator')


var router = express.Router();
/* GET home page. */
router.get('/',
    createValidationFor('login'),
    checkValidationResult,
    async (req, res, next) => {
        const {url} = req.query
        console.log('url', url)
        const targetPath = path.join(__dirname, `../public/images/${Screenshot.ImageName(url)}`)
        if(!await File.Exists(targetPath)){
            await Screenshot.TakePhoto(url, targetPath)
        }
        if(await File.Exists(targetPath)){
            res.json({
                "data": {
                    "url":url,
                    "imageUrl":Url.baseUrl(req, '/images/')+Screenshot.ImageName(url)
                },
            })
        }
        return res.status(400).send({
            message: `Can not Screenshot URL: ${url}`
        });
    });


function createValidationFor(route) {
    switch (route) {
        case 'login':
            return [
                check('url').isURL().withMessage('The Url field must be an URL'),
                // check('url').not().isEmpty()//.withMessage('some message')
            ];
        default:
            return [];
    }
}

function checkValidationResult(req, res, next) {
    const result = validationResult(req);
    if (result.isEmpty()) {
        return next();
    }
    res.status(422).json({message: result.array()[0].msg, errors: result.array()});
}

module.exports = router;
