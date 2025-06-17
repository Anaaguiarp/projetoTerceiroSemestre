const { createConnection } = require('./db');

async function getConteudos() {
    const connection = await createConnection();
    const [rows] = await connection.query("SELECT * FROM conteudo");
    return rows;
}

async function insertConteudo(titulo, descricao, texto, data) {
    const connection = await createConnection();
    if (titulo && descricao && texto && data) {
        const [result] = await connection.query(
            `INSERT INTO conteudo (titulo, descricao, texto, data)
             VALUES (?, ?, ?, ?)`,
            [titulo, descricao, texto, data]
        );

       if(result.affectedRows > 0){
            return true;
        }
        
        return false;
    }

    console.error("Falha ao criar o conteúdo. Faltou algum dado");
    return false;
}

async function editConteudo(id, titulo, descricao, texto, data) {
    const connection = await createConnection();
    if (id && titulo && descricao && texto && data){
        const [result] = await connection.query(
            `UPDATE conteudo SET titulo = ?, descricao = ?, texto = ?, data = ? WHERE id = ?`,
            [titulo, descricao, texto, data, id]
        );

        if (result.affectedRows === 0) return false;
        return true;
    }

    console.error("Falha ao editar o conteúdo. Faltou algum dado");
    return false;
}

async function deleteConteudo(id) {
    if (id){
        const connection = await createConnection();
        const [result] = await connection.query(
            `DELETE FROM conteudo WHERE id = ?`,
            [id]
        );

        if (result.affectedRows > 0) {
            console.log(`Conteúdo com ID ${id} removida com sucesso.`);
            return true;
        }

        console.error(`Nenhum conteúdo encontrada com ID ${id}.`);
        return false;
    }

    console.error("Falha ao deletar a tarefa. ID não informado.");
    return false;
}

module.exports = {
    getConteudos,
    insertConteudo,
    editConteudo,
    deleteConteudo
};
