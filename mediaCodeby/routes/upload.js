var express = require('express');
var router = express.Router();
const multer = require('multer')
const path = require('path')
const fs = require('fs')
const crypto = require('crypto')
const slug = require('slug')

const storage = multer.diskStorage({
    destination: (req, file, cb) => {
        const {app_id} = req.body
        const path = `./files/${app_id}`
        fs.mkdirSync(path, { recursive: true })
        return cb(null, path)
    },
    filename: (req, file, cb) => {
        cb(null, Date.now() + path.extname(file.originalname))
    }
})
const upload = multer({storage})

router.post('/', upload.any('avatar'), function (req, res) {
    // res.render('index', {title: 'Express'});
    // console.log('res', res)
    // console.log('req.files', req.files)
    res.send(req.files)
});

module.exports = router;
