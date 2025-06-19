const { createConnection } = require('./db');

async function getPacientes(){
    const connection = await createConnection();
    const [rows] = await connection.query("SELECT * FROM paciente ORDER BY nome");

    return rows;
};

async function insertPaciente(nome, nome_social, email, senha, confirmacao_senha, data_nascimento, genero, estado, cidade, medicacao, doenca, tipo_sanguineo) {
    const connection = await createConnection();
    if (nome && nome_social && email && senha && confirmacao_senha && data_nascimento && genero && estado && cidade && medicacao && doenca && tipo_sanguineo) {
        
        if (senha !== confirmacao_senha) {
            console.error("Senha e confirmação de senha não conferem.");
            return false;
        }

        const [result] = await connection.query(`
            INSERT INTO pacientes(
                nome, nome_social, email, senha, data_nascimento, 
                genero, estado, cidade, medicacao, doenca, tipo_sanguineo) 
            VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?)`, 
            [nome, nome_social, email, senha, data_nascimento, genero, estado, cidade, medicacao, doenca, tipo_sanguineo]);

        if(result.affectedRows > 0){
            return true;
        }

        return false;
    }

    console.error("Falha ao inserir paciente, faltou algum dado.");
    return false;
};

async function editPaciente(id, nome, nome_social, email, senha, confirmacao_senha, data_nascimento, genero, estado, cidade, medicacao, doenca, tipo_sanguineo) {
    const connection = await createConnection();
    if (!id || !nome || !nome_social || !email || !senha || !confirmacao_senha || !data_nascimento || !genero || !estado || !cidade || !medicacao || !doenca || !tipo_sanguineo) {
        console.error("Falha ao editar paciente, faltou algum dado.");
        return false;
    }

    if (senha !== confirmacao_senha) {
        console.error("Senha e confirmação de senha não conferem.");
        return false;
    }

    const result = await connection.query(`
        UPDATE pacientes
        SET nome = ?,
            nome_social = ?,
            email = ?,
            senha = ?,
            data_nascimento = ?,
            genero = ?,
            estado = ?,
            cidade = ?,
            medicacao = ?,
            doenca = ?,
            tipo_sanguineo = ?
        WHERE id = ?`, 
        [nome, nome_social, email, senha, data_nascimento, genero, estado, cidade, medicacao, doenca, tipo_sanguineo, id]);

    console.log("Resultado do edit: ", result.rows[0]);

    return result.rows.length > 0;
};

async function deletePaciente(id) {
    const connection = await createConnection();
    if (id) {
        const result = await connection.query(`
            DELETE FROM pacientes
            WHERE id = ?`, [id]
        );

        if(result.affectedRows === 0) return false;
        return true;
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
