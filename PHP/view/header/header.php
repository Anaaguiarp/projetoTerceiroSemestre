<?php
if (session_status() === PHP_SESSION_NONE) {
    session_start();
}
?>

<style>
    .nav-login {
        font-family: "Lexend Giga", sans-serif;
        font-size: 20px;
        background-color: rgba(217, 217, 217, 0.5);
    }

    a {
        text-decoration: none;
        color: #131C63;
    }

    ul {
        list-style: none;
    }

    .perfil-info {
        display: flex;
        align-items: center;
    }

    .perfil-info img {
        width: 24px;
        border-radius: 50%;
        margin-right: 10px;
    }

    .btn-sair {
        margin-left: 10px;
        background-color: #d67b09;
        color: #FFF;
    }
</style>

<nav class="p-3 nav-login">
    <ul class="m-0 px-5 d-flex justify-content-between align-items-center">
        <li class="perfil-info">
            <img src="../img/perfil.png" alt="Imagem de perfil">
            <?php
                if (isset($_SESSION['paciente'])) {
                    echo '<span>
                            <a href="../perfil/perfil.php">' . htmlspecialchars($_SESSION['paciente']['nome']) . '</a>
                            <a href="../logout/logout.php" class="btn btn-sair">Sair</a>
                        </span>';
                } elseif (isset($_SESSION['admin'])) {
                    echo '<span>
                            <a href="../perfil/perfilAdministrador.php">' . htmlspecialchars($_SESSION['admin']['nome']) . '</a>
                            <a href="../logout/logout.php" class="btn btn-sair">Sair</a>
                        </span>';
                } else {
                    echo '<span>
                            <a href="../login/login.php">Faça login</a>
                            <a href="../cadastro/cadastro.php">ou cadastre-se</a>
                        </span>';
                }
            ?>
        </li>
        <li>
            <a href="../homePage/index.php">Sobre nós</a>
        </li>
    </ul>
</nav>
