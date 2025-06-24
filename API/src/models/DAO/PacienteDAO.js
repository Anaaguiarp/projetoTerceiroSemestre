const { createConnection } = require('./db');

async function getPacientes(){
    const connection = await createConnection();
    const [rows] = await connection.query("SELECT * FROM paciente");

    return rows;
};

async function insertPaciente(nome, nome_social, email, senha, data_nascimento, genero, estado, cidade, medicacao, doenca, tipo_sanguineo) {
    const connection = await createConnection();
    if (nome && email && senha && data_nascimento && genero && estado && cidade && tipo_sanguineo) {

        const [result] = await connection.query(`
            INSERT INTO paciente(
                nome, nome_social, email, senha, data_nascimento, 
                genero, estado, cidade, medicacao, doenca, tipo_sanguineo) 
            VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?)`, 
            [nome, nome_social, email, senha, data_nascimento, genero, estado, cidade, medicacao, doenca, tipo_sanguineo]);

        if(result.affectedRows > 0){
            console.log("Inserindo no banco:", nome, email);
            return true;
        }

        return false;
    }

    console.error("Falha ao inserir paciente, faltou algum dado.");
    return false;
};

async function editPaciente(id, nome, nome_social, email, senha, data_nascimento, genero, estado, cidade, medicacao, doenca, tipo_sanguineo) {
    const connection = await createConnection();

    if (!id || !nome || !email || !senha || !data_nascimento || !genero || !estado || !cidade || !medicacao || !doenca || !tipo_sanguineo) {
        console.error("Falha ao editar paciente: faltou algum dado obrigatório.");
        return false;
    }

    const nomeSocial = nome_social && nome_social.trim() !== "" ? nome_social : null;

    const [result] = await connection.query(`
        UPDATE paciente
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
        [nome, nomeSocial, email, senha, data_nascimento, genero, estado, cidade, medicacao, doenca, tipo_sanguineo, id]
    );

    console.log("Resultado do UPDATE:", result);
    return result.affectedRows > 0;
}


async function deletePaciente(id) {
    const connection = await createConnection();
    if (id) {
        const result = await connection.query(`
            DELETE FROM paciente
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
