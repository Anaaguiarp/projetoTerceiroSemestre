function cadastro() {
    let nome = document.getElementById('nome').value.trim();
    let sobrenome = document.getElementById('sobreNome').value.trim();
    let senha = document.getElementById('senha').value;
    let senhaC = document.getElementById('senhaC').value;
    let email = document.getElementById('email').value.trim();

    if (!nome || !sobrenome) {
        alert('Por favor, informe seu nome completo!');
        return;
    } else if (!senha) {
        alert('Por favor, digite uma senha!');
        return;
    } else if (!senhaC) {
        alert('Por favor, confirme sua senha!');
        return;
    } else if (senha !== senhaC) {
        alert('Senhas diferentes!');
        return;
    } else if (!email) {
        alert('Por favor, informe um e-mail!');
        return;
    }

    let usuario = {
        nome: nome + " " + sobrenome,
        email: email
    };

    let usuarios = JSON.parse(localStorage.getItem("usuarios")) || [];
    usuarios.push(usuario);
    localStorage.setItem("usuarios", JSON.stringify(usuarios));

    alert("Cadastro realizado com sucesso!");

    window.location.href = "../PagListagemCadastro/listagemCadastro.html";
}