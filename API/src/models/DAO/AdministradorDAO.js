const { createConnection } = require('./db');

async function getAdministradores(){
    const connection = await createConnection();
    const [rows] = await connection.query("SELECT * FROM administrador ORDER BY nome");

    return rows;
};

async function insertAdministrador(nome, nome_social, email, senha, data_nascimento, genero, conselho_profissional, formacao, registro_profissional, ultimo_login, especialidade){
    const connection = await createConnection();
    if(nome, nome_social, email, senha, data_nascimento, genero, conselho_profissional, formacao, registro_profissional, ultimo_login, especialidade){
        const [result] = await connection.query(`
            INSERT INTO administrador(nome, nome_social, email, senha, data_nascimento, 
            genero, conselho_profissional, formacao, registro_profissional, ultimo_login, especialidade) 
            VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?, Now(), ?)`, 
            [nome, nome_social, email, senha, data_nascimento, genero, 
            conselho_profissional, formacao, registro_profissional, ultimo_login, especialidade]
        );

        if(result.affectedRows > 0){
            return true;
        }

        return false;
    }
    console.error("Falha ao inserir cliente, faltou algum dado");
    return false;
};

async function editAdministrador(id, nome, nome_social, email, senha, confirmacao_senha, data_nascimento, genero, conselho_profissional, formacao, registro_profissional, especialidade){

    const connection = await createConnection();
    if(!id || !nome || !nome_social || !email || !senha || !confirmacao_senha || !data_nascimento || !genero || !conselho_profissional || !formacao || !registro_profissional || !especialidade){
        console.error("Falha ao editar administrador, faltou algum dado.");
        return false;
    }

    if(senha !== confirmacao_senha){
        console.error("Senha e confirmação de senha não conferem.");
        return false;
    }

    const [result] = await connection.query(
        `UPDATE administrador
        SET nome = ?,
            nome_social = ?,
            email = ?,
            senha = ?,
            data_nascimento = ?,
            genero = ?,
            conselho_profissional = ?,
            formacao = ?,
            registro_profissional = ?,
            ultimo_login = NOW(),
            especialidade = ?
        WHERE id = ?`, [nome, nome_social, email, senha, data_nascimento, genero, conselho_profissional, formacao, registro_profissional, especialidade, id]
    );

    if(result.affectedRows === 0) return false;
    return true;
}

async function deleteAdministrador(id){
    if(id){
        const connection = await createConnection();
        const [result] = await connection.query(`
            DELETE FROM administrador
            WHERE id = ?`,
            [id]
        );

        if(result.affectedRows === 0) return false;
        return true;
    }
    console.error("Falha ao remover o administrador!");
    return false;
}

module.exports = {getAdministradores, insertAdministrador, editAdministrador, deleteAdministrador};