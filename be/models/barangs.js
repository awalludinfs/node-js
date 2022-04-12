'use strict';
const {
  Model
} = require('sequelize');
module.exports = (sequelize, DataTypes) => {
  class Barangs extends Model {
    /**
     * Helper method for defining associations.
     * This method is not a part of Sequelize lifecycle.
     * The `models/index` file will call this method automatically.
     */
    static associate(models) {
      // define association here
    }
  }
  Barangs.init({
    id: {type:DataTypes.INTEGER,primaryKey:true, autoIncrement:true},
    nama: DataTypes.STRING,
    brand: DataTypes.STRING,
    keterangan: DataTypes.STRING,
    createdAt: DataTypes.DATE,
    updatedAt: DataTypes.DATE
  }, {
    sequelize,
    modelName: 'Barangs',
    tableName:'barang'
  });
  return Barangs;
};