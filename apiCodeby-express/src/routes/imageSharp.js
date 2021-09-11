var path = require('path');
var express = require('express');
const fs = require('fs');
const Sharp = require('sharp');

var router = express.Router();
/* GET home page. */
router.get(`/:dir/:imageName`, (req, res, next) => {
    const {dir, imageName} = req.params
    console.log('imageName', imageName)
//set image caches
    res.set(`Cache-Control`, `public, max-age=31557600`);
//get the original image path
//     console.log('req._parsedOriginalUrl.pathname', req._parsedOriginalUrl.pathname)
    var imagePath = path.join(__dirname, `../../public/images/${dir}/${imageName}`)
//check if it has a format, if not choose webp
    const format = req.query.format ? req.query.format : `webp`;
//ignore this line :-) wordpress throwback!
    imagePath = imagePath.replace(`-scaled`, ``);
    console.log('imagePath', imagePath)
//if it cant find an image show the image not found image
    if (!fs.existsSync(imagePath)) {
        imagePath = path.join(__dirname, `../../public/images/`) + `image-not-found.jpeg`;
    }
//get the variables from the url
    const width = req.query.width ? parseInt(req.query.width) : null;
    const height = req.query.height ? parseInt(req.query.height) : null;
    const crop = req.query.crop ? req.query.crop : `cover`;
    const quality = req.query.quality ? req.query.quality : 100;
//create the stream — so basically read the path
    const stream = fs.createReadStream(imagePath);
//transform the image based on our variable, then output using the quality
    const transform = Sharp().resize(width, height, {
        fit: crop,
        position: 'left top',
    }).toFormat(format, {
        quality: parseInt(quality)
    });
//make sure the content type is set for the correct format.
    res.set(`Content-Type`, `image/${format}`);
//then output the image
    stream.pipe(transform).on(`error`, (e) => {
    }).pipe(res);
    return stream;
});
module.exports = router;