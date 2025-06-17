const pool = require('./db');

async function getPacientes() {
    const { rows } = await pool.query("SELECT * FROM pacientes ORDER BY nome");
    return rows;
};

async function insertPaciente(nome, nome_social, email, senha, confirmacao_senha, data_nascimento, genero, estado, cidade, medicacao, doenca, tipo_sanguineo) {
    if (nome && nome_social && email && senha && confirmacao_senha && data_nascimento && genero && estado && cidade && medicacao && doenca && tipo_sanguineo) {
        
        if (senha !== confirmacao_senha) {
            console.error("Senha e confirmação de senha não conferem.");
            return false;
        }

        const result = await pool.query(`
            INSERT INTO pacientes(
                nome, nome_social, email, senha, data_nascimento, 
                genero, estado, cidade, medicacao, doenca, tipo_sanguineo
            ) 
            VALUES ($1, $2, $3, $4, $5, $6, $7, $8, $9, $10, $11)
            RETURNING id, nome, nome_social, email, senha, data_nascimento, genero, estado, cidade, medicacao, doenca, tipo_sanguineo
        `, [nome, nome_social, email, senha, data_nascimento, genero, estado, cidade, medicacao, doenca, tipo_sanguineo]);

        console.log("Resultado do Insert: ", result.rows[0]);

        return result.rows.length > 0;
    }

    console.error("Falha ao inserir paciente, faltou algum dado.");
    return false;
};

async function editPaciente(id, nome, nome_social, email, senha, confirmacao_senha, data_nascimento, genero, estado, cidade, medicacao, doenca, tipo_sanguineo) {
    if (!id || !nome || !nome_social || !email || !senha || !confirmacao_senha || !data_nascimento || !genero || !estado || !cidade || !medicacao || !doenca || !tipo_sanguineo) {
        console.error("Falha ao editar paciente, faltou algum dado.");
        return false;
    }

    if (senha !== confirmacao_senha) {
        console.error("Senha e confirmação de senha não conferem.");
        return false;
    }

    const result = await pool.query(`
        UPDATE pacientes
        SET nome = $1,
            nome_social = $2,
            email = $3,
            senha = $4,
            data_nascimento = $5,
            genero = $6,
            estado = $7,
            cidade = $8,
            medicacao = $9,
            doenca = $10,
            tipo_sanguineo = $11
        WHERE id = $12
        RETURNING id, nome, nome_social, email, senha, data_nascimento, genero, estado, cidade, medicacao, doenca, tipo_sanguineo
    `, [nome, nome_social, email, senha, data_nascimento, genero, estado, cidade, medicacao, doenca, tipo_sanguineo, id]);

    console.log("Resultado do edit: ", result.rows[0]);

    return result.rows.length > 0;
};

async function deletePaciente(id) {
    if (id) {
        const result = await pool.query(`
            DELETE FROM pacientes
            WHERE id = $1
            RETURNING id
        `, [id]);

        return result.rows.length > 0;
    }

    console.error("Falha ao remover o paciente!");
    return false;
}

module.exports = {
    getPacientes,
    insertPaciente,
    editPaciente,
    deletePaciente
};
