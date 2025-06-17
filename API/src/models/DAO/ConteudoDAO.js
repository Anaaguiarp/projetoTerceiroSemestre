const pool = require('./db');

async function getConteudos() {
    const { rows } = await pool.query("SELECT * FROM conteudos ORDER BY titulo");
    return rows;
}

async function insertConteudo(titulo, texto) {
    if (titulo && texto) {
        const result = await pool.query(`
            INSERT INTO conteudos (titulo, texto)
            VALUES ($1, $2)
            RETURNING id, titulo, texto
        `, [titulo, texto]);

        return result.rows.length > 0;
    }
    return false;
}

async function editConteudo(id, titulo, texto) {
    if (!id || !titulo || !texto) return false;

    const result = await pool.query(`
        UPDATE conteudos
        SET titulo = $1,
            texto = $2
        WHERE id = $3
        RETURNING id, titulo, texto
    `, [titulo, texto, id]);

    return result.rows.length > 0;
}

async function deleteConteudo(id) {
    if (!id) return false;

    const result = await pool.query(`
        DELETE FROM conteudos WHERE id = $1 RETURNING id
    `, [id]);

    return result.rows.length > 0;
}

module.exports = {
    getConteudos,
    insertConteudo,
    editConteudo,
    deleteConteudo
};
