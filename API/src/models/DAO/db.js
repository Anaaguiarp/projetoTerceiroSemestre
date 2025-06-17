const mysql = require('mysql2/promise');

async function createConnection() {
  const connection = await mysql.createConnection({
    host: 'localhost',
    user: 'root',
    password: '',
    database: 'projeto_cuidados_paliativos'
  });
  console.log('Conectado ao MySQL! :)');
  return connection;
}

module.exports = { createConnection };