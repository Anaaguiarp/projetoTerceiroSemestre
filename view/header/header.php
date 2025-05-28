<style>
    .nav-login{
        font-family: "Lexend Giga", sans-serif;
        font-size: 20px;
        background-color: rgb(217, 217, 217, 0.5);
    }

    a{
        text-decoration: none;
        color: #131C63;
    }

    ul{
        list-style: none;
    }
</style>

<nav class="p-3 nav-login">
    <ul class="m-0 px-5 d-flex justify-content-between align-items-center">
        <li class="d-flex justify-content-between align-items-center text-decoration-none">
            <img src="../img/perfil.png" alt="Imagem de perfil" style="width: 8%;">
            <span>
                <?php if (isset($_SESSION['usuario'])): ?>
                    <strong><?php echo htmlspecialchars($_SESSION['usuario']['nome']); ?></strong>
                    <a href="../logout.php" class="ms-3">Sair</a>
                <?php else: ?>
                    <a href="../login/login.php">Faça login</a>
                    <a href="../cadastro/cadastro.php">ou cadastre-se</a>
                <?php endif; ?>
            </span>
        </li>
        <li>
            <a href="../homePage/index.php">Sobre nós</a>
        </li>
    </ul>
</nav>