require('rootpath')();
const {loadEnv} = require('config/env')
// console.log('db', loadEnv('.env.local'))
let DBs = {};
['.env.local', '.env.dev'].map(item => {
    const env = loadEnv(item)
    DBs[item] = {
        "username": env.DB_USER,
        "password": env.DB_PASSWORD,
        "database": env.DB_DATABASE,
        "host": env.DB_HOST,
        "dialect": "mariadb"
    }
})
console.log('DBs', DBs)
module.exports = {
    ".env.local": DBs['.env.local'],
    ".env.dev": DBs['.env.dev'],
    "test": {
        "username": "root",
        "password": null,
        "database": "database_test",
        "host": "127.0.0.1",
        "dialect": "mariadb"
    },
    "production": {
        "username": "root",
        "password": null,
        "database": "database_production",
        "host": "127.0.0.1",
        "dialect": "mariadb"
    }
};
