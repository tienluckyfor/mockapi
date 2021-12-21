'use strict';
const {jwtDecode,} = require("helpers/jwt")

module.exports = {
    up: async (queryInterface, Sequelize) => {
        /**
         * Add seed commands here.
         *
         * Example:
         * await queryInterface.bulkInsert('People', [{
         *   name: 'John Doe',
         *   isBetaMember: false
         * }], {});
         */
        return queryInterface.bulkInsert('Apis', [{
            user_id: 1,
            platform: 'file_s3',
            keys: JSON.stringify({
                "Bucket": "smile-eye",
                "region": "ap-southeast-1",
                "accessKeyId": jwtDecode("eyJhbGciOiJIUzI1NiJ9.QUtJQVhYN0JPSEVLNzU0T0M0NUY.GtT5vMuD9SQpDdSuPj4Eyb8S7xWFVDsy39Q7tHHtzWE"),
                "secretAccessKey": jwtDecode("eyJhbGciOiJIUzI1NiJ9.NUpUZEgwNDltUU5DeUlSbldIbUF1ZDJ0TFRuQnFVeVllNCs0OEdXaQ.K-A7QTo3MKYLweyb8KDoM8hHwgQ1u1FGD9bqLyRwd4s"),
                "apiVersion": "2006-03-01",
                "signatureVersion": "v4",
            }),
            createdAt: new Date(),
            updatedAt: new Date(),
        }]);
    },

    down: async (queryInterface, Sequelize) => {
        /**
         * Add commands to revert seed here.
         *
         * Example:
         * await queryInterface.bulkDelete('People', null, {});
         */
    }
};
