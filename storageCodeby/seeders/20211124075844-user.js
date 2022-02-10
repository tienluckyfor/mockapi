'use strict';
const {jwtEncode} = require("helpers/jwt")

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
        try {
            return queryInterface.bulkInsert('Users', [{
                name: 'Tien',
                phone: '0344703838',
                email: 'tien.luckyfor@gmail.com',
                password: "0344703838",
                token: jwtEncode({ id: 1, token: 'token' }),
                createdAt: new Date(),
                updatedAt: new Date(),
            }]);
        } catch (e) {
            console.log('e', e)
        }
    },

    down: async (queryInterface, Sequelize) => {
        /**
         * Add commands to revert seed here.
         *
         * Example:
         * await queryInterface.bulkDelete('People', null, {});
         */
        return queryInterface.bulkDelete('Users', null, {});

    }
};
