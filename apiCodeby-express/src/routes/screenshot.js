const {Screenshot} = require("../utils/Screenshot");
const {Url} = require("../utils/Url");
var path = require('path');
var express = require('express');
const {check, validationResult} = require('express-validator')


var router = express.Router();
/* GET home page. */
router.get('/',
    // createValidationFor('login'),
    // checkValidationResult,
    async (req, res, next) => {
        console.log(11);
        const {url} = req.query;
        console.log("url", url)
        const targetPath = path.join(__dirname, `../../public/images`)
        console.log('targetPath', targetPath, url)
        let imageFile = await Screenshot.imageFiles(targetPath, req, url)
        console.log('imageFile 1', imageFile)
        if (imageFile.data) {
            return res.status(imageFile.status).send(imageFile);
        } else {
            const isOnline = await Url.isOnline(url)
            if (!isOnline) {
                return res.status(imageFile.status).send(imageFile);
            }
            await Screenshot.takePhoto(url, targetPath);
        }
        imageFile = await Screenshot.imageFiles(targetPath, req, url);
        console.log('imageFile 2', imageFile)
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
