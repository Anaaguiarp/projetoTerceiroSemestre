<?php
require_once __DIR__ . '/../../dao/ConnectionFactory.php';
require_once __DIR__ . '/../../dao/AdministradorDao.php';
require __DIR__ . '/../../model/Administrador.php';

function listarAdministradores() {
    $administradorDao = new AdministradorDao();
    $lista = $administradorDao->read();

    if (empty($lista)) {
        echo "<tr><td colspan='12'>Nenhum administrador cadastrado.</td></tr>";
        return;
    }

    foreach ($lista as $adm) {
        echo "<tr class=\"mb-4\">
            <td>{$adm->getId()}</td>
            <td>{$adm->getNome()}</td>
            <td>{$adm->getNomeSocial()}</td>
            <td>{$adm->getEmail()}</td>
            <td>{$adm->getDataNascimento()}</td>
            <td>{$adm->getGenero()}</td>
            <td>" . ($adm->getUltimoLogin() ? $adm->getUltimoLogin() : "adm ainda não logou") . "</td>
            <td>{$adm->getConselhoProfissional()}</td>
            <td>{$adm->getFormacao()}</td>
            <td>{$adm->getRegistroProfissional()}</td>
            <td>{$adm->getEspecialidade()}</td>
            <td>
                <a href='editar.php?id=" . $adm->getId() . "' class='btn btn-sm btn-secondary'>Editar</a>
                <a href='excluir.php?id=" . $adm->getId() . "' class='btn btn-sm btn-danger' onclick=\"return confirm('Tem certeza que deseja excluir este administrador?')\">Excluir</a>
            </td>


            </td>
        </tr>";
    }
}
?>