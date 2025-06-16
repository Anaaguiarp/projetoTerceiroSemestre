const {Pool} = require("pg");

const pool = new Pool({
    host: 'localhost',
    port: 5432,
    user: 'postgres',
    password: 'Anac2004.',
    database: 'db_ProjetoIntegradoNode',
});

module.exports = pool;