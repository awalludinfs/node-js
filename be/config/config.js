require('dotenv').config();
const {
  username,
    password,
    database,
    host,
    dialect,
}=process.env;
module.exports = 
{
  "development": {
    "username": "root",
    "password": "",
    "database": "db_barang",
    "host": "127.0.0.1",
    "dialect": "mysql"
  },
  "test": {
    "username": "root",
    "password": "",
    "database": "db_barang",
    "host": "127.0.0.1",
    "dialect": "mysql"
  },
  "production": {
    "username": "root",
    "password": "",
    "database": "db_barang",
    "host": "127.0.0.1",
    "dialect": "mysql"
  }
}
