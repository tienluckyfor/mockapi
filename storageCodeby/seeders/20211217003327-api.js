'use strict';

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
      platform: 'file_s3',
      keys: JSON.stringify({
        "Bucket": "smile-eye",
        "region": "smile-eye",
        "accessKeyId": "smile-eye",
        "secretAccessKey": "smile-eye",
        "apiVersion": "2006-03-01"
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
