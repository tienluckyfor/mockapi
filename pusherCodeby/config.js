const dotenv = require('dotenv');
const path = require('path');

dotenv.config({
    path: path.resolve(__dirname, `.env.${process.env.NODE_ENV}`)
});
module.exports = {
    APP_URL : process.env.APP_URL,
    PORT : process.env.PORT
}