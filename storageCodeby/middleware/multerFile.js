const multer = require('multer')
const fs = require('fs')
const path = require('path')

const storage = multer.diskStorage({
    destination: (request, file, cb) => {
        const api_id = request.header('api_id')
        const path = `./public/files/${app_id}`
        fs.mkdirSync(path, {recursive: true})
        return cb(null, path)
    },
    filename: (req, file, cb) => {
        // cb(null, Date.now() + path.extname(file.originalname))
        cb(null, Date.now() + '.webp')
    }
})

const upload = multer({storage})

module.exports = upload
