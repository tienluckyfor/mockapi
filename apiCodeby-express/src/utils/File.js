const fs = require('fs')

class File {
    static async exists(path) {
        try {
            if (fs.existsSync(path)) {
                return path
            }
        } catch (err) {
            return null
        }
    }
}

module.exports = {File}