const pool = require('./db');

async function getAdministradores(){
    const {rows} = await pool.query("SELECT * FROM administradores ORDER BY nome");
    const administradores = rows;

    return administradores;
};

async function insertAdministrador(nome, nome_social, email, senha, confirmacao_senha, data_nascimento, genero, conselho_profissional, formacao, registro_profissional, especialidade){
    if(nome, nome_social, email, senha, confirmacao_senha, data_nascimento, genero, conselho_profissional, formacao, registro_profissional, especialidade){
        const result = await pool.query(`
            INSERT INTO administradores(nome, nome_social, email, senha, data_nascimento, 
            genero, conselho_profissional, formacao, registro_profissional, ultimo_login, especialidade) 
            VALUES ($1, $2, $3, $4, $5, $6, $7, $8, $9, Now(), $10)
            RETURNING id, nome, nome_social, email, senha, data_nascimento, genero, 
            conselho_profissional, formacao, registro_profissional, ultimo_login, especialidade`, 
            [nome, nome_social, email, senha, data_nascimento, genero, 
            conselho_profissional, formacao, registro_profissional, especialidade]
        );
        console.log("Resultado do Insert: ", result.rows[0]);
        if(result.rows.length > 0) return true;
        return false;
    }
    console.error("Falha ao inserir cliente, faltou algum dado");
    return false;
};

async function editAdministrador(id, nome, nome_social, email, senha, confirmacao_senha, data_nascimento, genero, conselho_profissional, formacao, registro_profissional, especialidade){

    if(!id || !nome || !nome_social || !email || !senha || !confirmacao_senha || !data_nascimento || !genero || !conselho_profissional || !formacao || !registro_profissional || !especialidade){
        console.error("Falha ao editar administrador, faltou algum dado.");
        return false;
    }

    if(senha !== confirmacao_senha){
        console.error("Senha e confirmação de senha não conferem.");
        return false;
    }

    const result = await pool.query(`
        UPDATE administradores
        SET nome = $1,
            nome_social = $2,
            email = $3,
            senha = $4,
            data_nascimento = $5,
            genero = $6,
            conselho_profissional = $7,
            formacao = $8,
            registro_profissional = $9,
            ultimo_login = NOW(),
            especialidade = $10
        WHERE id = $11
        RETURNING id, nome, nome_social, email, senha, data_nascimento, genero, conselho_profissional, formacao, registro_profissional, especialidade
    `, [nome, nome_social, email, senha, data_nascimento, genero, conselho_profissional, formacao, registro_profissional, especialidade, id]);

    console.log("Resultado do edit: ", result.rows[0]);

    if(result.rows.length === 0) return false;
    return true;
}

async function deleteAdministrador(id){
    if(id){
        const result = await pool.query(`
            DELETE FROM administradores
            WHERE id = $1
            RETURNING id`,
            [id]
        );

        if(result.rows.length === 0) return false;
        return true;
    }
    console.error("Falha ao remover o administrador!");
    return false;
}

module.exports = {getAdministradores, insertAdministrador, editAdministrador, deleteAdministrador};