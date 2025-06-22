<?php
function listarAdministradores($administradores) {
    if (!$administradores || count($administradores) === 0) {
        echo "<tr><td colspan='12'>Nenhum administrador encontrado</td></tr>";
        return;
    }

    foreach ($administradores as $admin) {
        echo "<tr>";
        echo "<td>" . $admin->getId() . "</td>";
        echo "<td>" . $admin->getNome() . "</td>";
        echo "<td>" . $admin->getNomeSocial() . "</td>";
        echo "<td>" . $admin->getEmail() . "</td>";
        echo "<td>" . $admin->getDataNascimento() . "</td>";
        echo "<td>" . $admin->getGenero() . "</td>";
        echo "<td>" . $admin->getUltimoLogin() . "</td>";
        echo "<td>" . $admin->getConselhoProfissional() . "</td>";
        echo "<td>" . $admin->getFormacao() . "</td>";
        echo "<td>" . $admin->getRegistroProfissional() . "</td>";
        echo "<td>" . $admin->getEspecialidade() . "</td>";
        echo "<td>
            <div class='d-flex flex-column align-items-center gap-1'>
                <a href='../perfil/perfilAdministrador.php?id=" . $admin->getId() . "' class='btn btn-warning btn-sm mb-2 text-white w-100'>Editar</a>
                <a href='excluir.php?id=" . $admin->getId() . "' class='btn btn-danger btn-sm w-100'>Excluir</a>
            </div>  
            </td>";
        echo "</tr>";
    }
}
?>