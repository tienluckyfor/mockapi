const fs = require('fs')

const Exists = async (path) => {
    try {
        if (fs.existsSync(path)) {
            return path
        }
    } catch(err) {
        console.error(err)
        return null
    }
}

module.exports = {Exists}