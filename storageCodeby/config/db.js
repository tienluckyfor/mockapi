require('rootpath')();
const env = require("config/env")

module.exports = {
    "username": env.DB_USER,
    "password": env.DB_PASSWORD,
    "database": env.DB_DATABASE,
    "host": env.DB_HOST,
    "dialect": "mariadb"
};