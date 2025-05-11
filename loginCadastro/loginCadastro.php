<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="style.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.5/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-SgOJa3DmI69IUzQ2PVdRZhwQ+dy64/BUtbMJw1MZ8t5HZApcHrRKUc4W0kG879m7" crossorigin="anonymous">
    <title>Login e Cadastro</title>
</head>
<body>
    <header>
        <?php
            require_once ('../header/header.php');
        ?>
    </header>
    <div class="container" style="width: 50%;">
        <div class="mb-3 mt-5">
            <h2>Faça login</h2>
        </div>
        <form action="pagHome.php" method="post"> <!--pag demonstrativa-->
            <div class="mb-2">
                <label for="email_login" class="form-label">Email</label>
                <input type="email" class="form-control" maxlength="100" id="email_login" name="email_login">
            </div>
            <div class="mb-3">
                <label for="senha_login" class="form-label">Senha</label>
                <input type="password" class="form-control" maxlength="10" name="senha_login" id="senha_login">
            </div>
            <div class="d-grid gap-2">
                <button type="submit" class="btn btn-primary">Entrar</button>
            </div>
            <div>
                <p><a href="esqSenha.php">Esqueceu sua senha?</a><!--pag demonstrativa--></p>
            </div>
        </form>
        <h3>ou</h3>
        <div class="mb-3">
            <h2><a href="../perfil/perfil.php">Cadastre-se<i class="fi fi-br-arrow-right"></i></a></h2>
        </div>
    </div>
</body>
</html>