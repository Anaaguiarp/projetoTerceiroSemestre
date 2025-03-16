function cadastro() {
    let nome = document.getElementById('nome').value.trim() + ' ' + document.getElementById('sobreNome').value.trim();
    let senha = document.getElementById('senha').value;
    let senhaC = document.getElementById('senhaC').value;
    let email = document.getElementById('email').value.trim();

    if (nome.trim() === '') {
        alert('Por favor, informe seu nome!');
        return;
    }
    
    if (email === '') {
        alert('Por favor, informe um e-mail!');
        return;
    }

    if (senha === '') {
        alert('Por favor, digite uma senha!');
        return;
    }

    if (senhaC === '') {
        alert('Por favor, confirme sua senha!');
        return;
    }

    if (senha !== senhaC) {
        alert('Senhas diferentes!');
        return;
    }
    
    alert('Cadastro realizado com sucesso!');
}