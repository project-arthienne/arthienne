const { Pool } = require("pg");
require("dotenv").config();
const pool = new Pool({
  host: "localhost",
  user: "postgres",
  password: "root",
  database: "authdb",
  port: 5432
});

module.exports = pool;
