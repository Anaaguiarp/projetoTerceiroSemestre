<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.5/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-SgOJa3DmI69IUzQ2PVdRZhwQ+dy64/BUtbMJw1MZ8t5HZApcHrRKUc4W0kG879m7" crossorigin="anonymous">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Lexend+Giga:wght@100..900&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="loginStyles.css">
</head>
<body>
    <div class="container-fluid p-0">
        <header><?php require_once ('../header/header.php'); ?></header>
        <main class="mt-5">
            <section class="d-flex flex-column justify-content-center w-25 mx-auto">
                <h1 class="my-5 text-center">Entrar</h1>
                <div class="border rounded p-4">
                    <form action="pagHome.php" method="post"> <!--pag demonstrativa-->
                        <div class="mb-3">
                            <label for="email_login" class="form-label">Email</label>
                            <input type="email" class="form-control" maxlength="100" id="email_login" name="email_login" placeholder="Digite seu e-mail">
                        </div>
                        <div class="mb-3">
                            <label for="senha_login" class="form-label">Senha</label>
                            <input type="password" class="form-control" maxlength="10" name="senha_login" id="senha_login" placeholder="Digite sua senha">
                        </div>
                            <button type="submit" class="botao btn w-100 my-4 fw-bold">Entrar</button>
                            <p><u><a href="esqSenha.php">Esqueceu sua senha?</a><!--pag demonstrativa--></u></p>
                    </form>
                </div>
                <div class="text-center mt-5">
                    <h3>ou</h3>
                    <h1 class="mt-2"><a class="forgetPass" href="../cadastro/cadastro.php">Cadastrar</a></h1>  
                </div>        
            </section>
        </main>
    </div>
</body>
</html>