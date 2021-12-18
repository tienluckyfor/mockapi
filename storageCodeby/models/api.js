'use strict';
const {
    Model
} = require('sequelize');
module.exports = (sequelize, DataTypes) => {
    class Api extends Model {
        /**
         * Helper method for defining associations.
         * This method is not a part of Sequelize lifecycle.
         * The `models/index` file will call this method automatically.
         */
        static associate(models) {
            // define association here
            // this.belongsTo(models.User, {foreignKey: 'user_id', as: 'users', });
        }
    };
    Api.init({
        user_id: DataTypes.STRING,
        platform: DataTypes.STRING,
        keys: DataTypes.JSON
    }, {
        sequelize,
        modelName: 'Api',
    });
    return Api;
};