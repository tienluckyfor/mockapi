'use strict';
const {
  Model
} = require('sequelize');
const env = require("config/env")

module.exports = (sequelize, DataTypes) => {
  class File extends Model {
    /**
     * Helper method for defining associations.
     * This method is not a part of Sequelize lifecycle.
     * The `models/index` file will call this method automatically.
     */
    static associate(models) {
      // define association here
    }
  };
  File.init({
    app_id: DataTypes.INTEGER,
    fieldname: DataTypes.STRING,
    originalname: DataTypes.STRING,
    encoding: DataTypes.STRING,
    mimetype: DataTypes.STRING,
    destination: DataTypes.STRING,
    filename: DataTypes.STRING,
    path: DataTypes.STRING,
    size: DataTypes.INTEGER,
    original_file: {
      type:DataTypes.VIRTUAL,
      get(){
        const path = this.getDataValue('path');
        return `${env.BASE_URL}/${path}`
      }
    },
    file: {
      type:DataTypes.VIRTUAL,
      get(){
        const path = this.getDataValue('path');
        const id = this.getDataValue('id');
        return `${env.BASE_URL}/files/${id}`
      }
    }
  }, {
    sequelize,
    modelName: 'File',
  });
  return File;
};