function limparTabela() {
    // Confirmar com o usuário antes de limpar
    let confirmar = confirm("Você tem certeza que deseja apagar todos os cadastros?");
    
    if (confirmar) {
        // Limpar os dados do localStorage
        localStorage.removeItem("usuarios");

        // Atualizar a tabela
        let tBody = document.querySelector('.table tbody');
        tBody.innerHTML = ''; // Limpar o conteúdo da tabela

        // Exibir mensagem de confirmação
        alert("Tabela limpa com sucesso!");
    } else {
        alert("Ação cancelada. Os dados não foram apagados.");
    }
}

window.onload = function () {

    let usuarios = JSON.parse(localStorage.getItem("usuarios")) || [];

    let tBody = document.querySelector('.table tbody');

    tBody.innerHTML = '';

    usuarios.forEach(function(cadastro, index) {
        let linha = document.createElement('tr');

        let colId = document.createElement('td');
        let colNome = document.createElement('td');
        let colEmail = document.createElement('td');

        colId.innerHTML = index + 1;
        colNome.innerHTML = cadastro.nome;
        colEmail.innerHTML = cadastro.email;

        linha.appendChild(colId);
        linha.appendChild(colNome);
        linha.appendChild(colEmail);

        tBody.appendChild(linha);
    });
};
