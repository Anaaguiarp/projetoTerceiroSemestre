<?php
    require '../../controller/pacienteController.php';
?>

<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Cadastro de Paciente</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.5/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-SgOJa3DmI69IUzQ2PVdRZhwQ+dy64/BUtbMJw1MZ8t5HZApcHrRKUc4W0kG879m7" crossorigin="anonymous">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Lexend+Giga:wght@100..900&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="../global.css">
    <link rel="stylesheet" href="cadastroStyles.css">
    <script>
        document.addEventListener('DOMContentLoaded', () => {
            const selectEstado = document.getElementById('estado');
            const selectCidade = document.getElementById('cidade');
            const estadoSelecionado = "<?= isset($paciente) ? $paciente->getEstado() : '' ?>";
            const cidadeSelecionada = "<?= isset($paciente) ? $paciente->getCidade() : '' ?>";

            // Carrega estados
            fetch('https://servicodados.ibge.gov.br/api/v1/localidades/estados?orderBy=nome')
                .then(res => res.json())
                .then(estados => {
                    estados.forEach(estado => {
                        const option = document.createElement('option');
                        option.value = estado.id; // ID do estado (ex: 35)
                        option.textContent = estado.nome;
                        option.dataset.sigla = estado.sigla;

                        if (estado.nome === estadoSelecionado || estado.sigla === estadoSelecionado) {
                            option.selected = true;
                            carregarCidades(estado.id); // Carrega as cidades do estado já salvo
                        }

                        selectEstado.appendChild(option);
                    });
                });

            // Quando muda o estado
            selectEstado.addEventListener('change', () => {
                const estadoId = selectEstado.value;
                carregarCidades(estadoId);
            });

            function carregarCidades(estadoId) {
                selectCidade.innerHTML = '<option value="">Carregando cidades...</option>';

                fetch(`https://servicodados.ibge.gov.br/api/v1/localidades/estados/${estadoId}/municipios`)
                    .then(res => res.json())
                    .then(cidades => {
                        selectCidade.innerHTML = '<option value="">Selecione uma cidade</option>';
                        cidades.forEach(cidade => {
                            const option = document.createElement('option');
                            option.value = cidade.nome;
                            option.textContent = cidade.nome;
                            if (cidade.nome === cidadeSelecionada) {
                                option.selected = true;
                            }
                            selectCidade.appendChild(option);
                        });
                });
            }
        });
        document.addEventListener('DOMContentLoaded', function() {
        const form = document.querySelector('form');
        const senha = document.getElementById('senha');
        const confirmaSenha = document.getElementById('confirma_senha');

            form.addEventListener('submit', function(event) {
                if (senha.value !== confirmaSenha.value) {
                    event.preventDefault();
                    alert('As senhas não conferem. Por favor, verifique e tente novamente.');
                    confirmaSenha.focus();
                }
            });
        });
    </script>
</head>
<body>
    <div class="container-fluid p-0">
        <header><?php require_once ('../header/header.php'); ?></header>
        <main class="mt-5">
            <section class="d-flex flex-column justify-content-center w-50 mx-auto">
                <h1 class="my-5 text-center">Cadastro de Paciente</h1>
                <div class="border rounded p-4">
                    <form action="../../controller/pacienteController.php" method="POST">
                        <div class="mb-3">
                            <input type="hidden" name="id" value="<?= isset($paciente) && $paciente->getId() ? $paciente->getId() : ''?>">
                        </div>
                        <div class="mb-3">
                            <label for="nome" class="form-label">Nome Completo</label>
                            <input type="text" class="form-control" name="nome" placeholder="Seu nome completo" maxlength="100" required
                            value="<?= isset($paciente) && $paciente->getNome() ? $paciente->getNome() : '' ?>">
                        </div>
                        <div class="mb-3">
                            <label for="nome_social" class="form-label">Nome Social</label>
                            <input type="text" class="form-control" name="nome_social" placeholder="Apelido ou nome social" maxlength="100"
                            value="<?= isset($paciente) && $paciente->getNomeSocial() ? $paciente->getNomeSocial() : '' ?>">
                        </div>
                        <div class="mb-3">
                            <label for="email" class="form-label">E-mail</label>
                            <input type="email" class="form-control" name="email" placeholder="Seu email" maxlength="120" required 
                            value="<?= isset($paciente) && $paciente->getEmail() ? $paciente->getEmail() : '' ?>">
                        </div>
                        <div class="mb-3">
                            <label for="senha" class="form-label">Sua senha</label>
                            <input type="password" class="form-control" id="senha" name="senha" placeholder="Crie uma senha" maxlength="30"
                            <?= isset($paciente) && $paciente->getId() ? '' : 'required' ?>>
                        </div>
                        <div class="mb-3">
                            <label for="confirma_senha" class="form-label">Confirme sua senha</label>
                            <input type="password" class="form-control" id="confirma_senha" name="confirma_senha" placeholder="Confirme sua senha" maxlength="30"
                            <?= isset($paciente) && $paciente->getId() ? '' : 'required' ?>>
                        </div>
                        <div class="mb-3">
                            <label for="data_nascimento" class="form-label">Data de Nascimento</label>
                            <input type="date" class="form-control" name="data_nascimento" 
                            value="<?= isset($paciente) && $paciente->getDataNascimento() ? $paciente->getDataNascimento() : '' ?>">
                        </div>
                        <div class="d-flex">
                            <div class="mb-3">
                                <label for="estado" class="form-label">Estado</label>
                                <select id="estado" name="estado" class="form-select">
                                    <option value="">Selecione um estado</option>
                                </select>
                            </div>
                            <div class="mb-3 mx-3">
                                <label for="cidade" class="form-label">Cidade</label>
                                <select id="cidade" name="cidade" class="form-select">
                                    <option value="">Selecione uma cidade</option>
                                </select>
                            </div>
                        </div>
                        <div class="mb-3">
                            <p class="label-genero">Gênero</p>
                            <div class="d-flex justify-content-between">
                                <div class="form-check">
                                    <input class="form-check-input" type="radio" name="genero" value="F"
                                        <?= isset($paciente) && $paciente->getGenero() === 'F' ? 'checked' : '' ?>>
                                    <label class="form-check-label">Feminino</label>
                                </div>
                                <div class="form-check">
                                    <input class="form-check-input" type="radio" name="genero" value="M"
                                        <?= isset($paciente) && $paciente->getGenero() === 'M' ? 'checked' : '' ?>>
                                    <label class="form-check-label">Masculino</label>
                                </div>
                                <div class="form-check">
                                    <input class="form-check-input" type="radio" name="genero" value="O"
                                        <?= (isset($paciente) && $paciente->getGenero() === 'O') || !isset($paciente) ? 'checked' : '' ?>>
                                    <label class="form-check-label">Outro</label>
                                </div>
                            </div>
                        </div>
                        <div class="mb-3">
                            <p class="label-genero">Tipo sanguíneo</p>
                            <div class="row row-cols-4 g-3">
                                <div class="col">
                                    <div class="form-check">
                                        <input class="form-check-input" type="radio" name="tipo_sanguineo" value="A+"
                                            <?= (isset($paciente) && $paciente->getTipoSanguineo() === 'A+') ? 'checked' : (!isset($paciente) && 'A+' === 'O+' ? 'checked' : '') ?>>
                                        <label class="form-check-label">A+</label>
                                    </div>
                                </div>
                                <div class="col">
                                    <div class="form-check">
                                        <input class="form-check-input" type="radio" name="tipo_sanguineo" value="B+"
                                            <?= (isset($paciente) && $paciente->getTipoSanguineo() === 'B+') ? 'checked' : (!isset($paciente) && 'B+' === 'O+' ? 'checked' : '') ?>>
                                        <label class="form-check-label">B+</label>
                                    </div>
                                </div>
                                <div class="col">
                                    <div class="form-check">
                                        <input class="form-check-input" type="radio" name="tipo_sanguineo" value="AB+"
                                            <?= (isset($paciente) && $paciente->getTipoSanguineo() === 'AB+') ? 'checked' : (!isset($paciente) && 'AB+' === 'O+' ? 'checked' : '') ?>>
                                        <label class="form-check-label">AB+</label>
                                    </div>
                                </div>
                                <div class="col">
                                    <div class="form-check">
                                        <input class="form-check-input" type="radio" name="tipo_sanguineo" value="O+"
                                            <?= (isset($paciente) && $paciente->getTipoSanguineo() === 'O+') || (!isset($paciente)) ? 'checked' : '' ?>>
                                        <label class="form-check-label">O+</label>
                                    </div>
                                </div>
                                <div class="col">
                                    <div class="form-check">
                                        <input class="form-check-input" type="radio" name="tipo_sanguineo" value="A-"
                                            <?= (isset($paciente) && $paciente->getTipoSanguineo() === 'A-') ? 'checked' : (!isset($paciente) && 'A-' === 'O+' ? 'checked' : '') ?>>
                                        <label class="form-check-label">A-</label>
                                    </div>
                                </div>
                                <div class="col">
                                    <div class="form-check">
                                        <input class="form-check-input" type="radio" name="tipo_sanguineo" value="B-"
                                            <?= (isset($paciente) && $paciente->getTipoSanguineo() === 'B-') ? 'checked' : (!isset($paciente) && 'B-' === 'O+' ? 'checked' : '') ?>>
                                        <label class="form-check-label">B-</label>
                                    </div>
                                </div>
                                <div class="col">
                                    <div class="form-check">
                                        <input class="form-check-input" type="radio" name="tipo_sanguineo" value="AB-"
                                            <?= (isset($paciente) && $paciente->getTipoSanguineo() === 'AB-') ? 'checked' : (!isset($paciente) && 'AB-' === 'O+' ? 'checked' : '') ?>>
                                        <label class="form-check-label">AB-</label>
                                    </div>
                                </div>
                                <div class="col">
                                    <div class="form-check">
                                        <input class="form-check-input" type="radio" name="tipo_sanguineo" value="O-"
                                            <?= (isset($paciente) && $paciente->getTipoSanguineo() === 'O-') ? 'checked' : (!isset($paciente) && 'O-' === 'O+' ? 'checked' : '') ?>>
                                        <label class="form-check-label">O-</label>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="mb-3">
                            <label for="medicacao" class="form-label">Medicação</label>
                            <textarea class="form-control" name="medicacao" placeholder="Exemplo: Remédio 30mg, Remédio 15mg" rows="5" maxlength="500"><?= isset($paciente) && $paciente->getMedicacao() ? $paciente->getMedicacao() : '' ?></textarea>
                        </div>
                        <div class="mb-3">
                            <label for="doenca" class="form-label">Doenças ou Condições de Saúde</label>
                            <textarea class="form-control" name="doenca" placeholder="Informe suas condições de saúde" rows="5" maxlength="500"><?= isset($paciente) && $paciente->getDoenca() ? $paciente->getDoenca() : '' ?></textarea>
                        </div>
                        <?php
                            if(isset($paciente) && $paciente->getId()) : ?>
                            <button type="submit" name="salvar-edicao" class="btn text-white" style="background-color: #542e16;">Salvar Edição</button>
                            <?php else: ?>
                            <button type="submit" name="cadastrar" class="btn text-white" style="background-color: #542e16;">Cadastrar</button>
                        <?php endif; ?>
                    </form>
                </div>
            </section>
        </main>
        <?php require '../footer/footer.php'?>
    </div>
</body>
</html>