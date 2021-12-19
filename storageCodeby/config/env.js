require('rootpath')();
const dotenv = require('dotenv');

const readEnv = (path) => {
    console.log('readEnv path',  path)
    dotenv.config({
        path
    })
    return {
        DB_HOST: process.env.DB_HOST,
        DB_DATABASE: process.env.DB_DATABASE,
        DB_USER: process.env.DB_USER,
        DB_PASSWORD: process.env.DB_PASSWORD,
        PORT: process.env.PORT,
        JWT_SECRET: process.env.JWT_SECRET,
        BASE_URL: process.env.BASE_URL,
    }
}

const loadEnv = (path=process.env.NODE_ENV) => {
    console.log('loadEnv path',  path)
    dotenv.config({
        path
    })
    return {
        DB_HOST: process.env.DB_HOST,
        DB_DATABASE: process.env.DB_DATABASE,
        DB_USER: process.env.DB_USER,
        DB_PASSWORD: process.env.DB_PASSWORD,
        PORT: process.env.PORT,
        JWT_SECRET: process.env.JWT_SECRET,
        BASE_URL: process.env.BASE_URL,
    }
}
const env = loadEnv()

module.exports = {...env, readEnv, loadEnv}
