const {Screenshot} = require("../utils/Screenshot");
const {Url} = require("../utils/Url");
var path = require('path');
var express = require('express');
const {check, validationResult} = require('express-validator')


var router = express.Router();
/* GET home page. */
router.get('/',
    createValidationFor('login'),
    checkValidationResult,
    async (req, res, next) => {
        const {url} = req.query;
        const targetPath = path.join(__dirname, `../../public/images`)
        console.log('targetPath', targetPath, url)
        let imageFile = await Screenshot.imageFiles(targetPath, req, url)
        console.log('imageFile', imageFile)
        if (imageFile.data) {
            return res.status(imageFile.status).send(imageFile);
        } else {
            const isOnline = await Url.isOnline(url)
            if (!isOnline) {
                return res.status(400).send({
                    message: `URL is not online: ${url}`
                });
            }
            await Screenshot.takePhoto(url, targetPath);
        }
        imageFile = await Screenshot.imageFiles(targetPath, req, url);
        console.log('imageFile', imageFile)
        return res.status(imageFile.status).send(imageFile);
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
