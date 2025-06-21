<?php
function listarAdministradores($administradores) {
    if (!is_array($administradores)) {
        echo "<tr><td colspan='12'>Nenhum administrador encontrado</td></tr>";
        return;
    }

    foreach ($administradores as $admin) {
        echo "<tr>";
        echo "<td>{$admin['id']}</td>";
        echo "<td>{$admin['nome']}</td>";
        echo "<td>{$admin['nome_social']}</td>";
        echo "<td>{$admin['email']}</td>";
        echo "<td>{$admin['data_nascimento']}</td>";
        echo "<td>{$admin['genero']}</td>";
        echo "<td>{$admin['ultimo_login']}</td>";
        echo "<td>{$admin['conselho_profissional']}</td>";
        echo "<td>{$admin['formacao']}</td>";
        echo "<td>{$admin['registro_profissional']}</td>";
        echo "<td>{$admin['especialidade']}</td>";
        echo "<td>
                <a href='editar.php?id={$admin['id']}' class='btn btn-warning btn-sm'>Editar</a>
                <a href='excluir.php?id={$admin['id']}' class='btn btn-danger btn-sm'>Excluir</a>
              </td>";
        echo "</tr>";
    }
}
?>
