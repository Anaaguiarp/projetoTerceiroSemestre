<!DOCTYPE html>
<html lang="pt-br">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Perfil</title>
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.5/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-SgOJa3DmI69IUzQ2PVdRZhwQ+dy64/BUtbMJw1MZ8t5HZApcHrRKUc4W0kG879m7" crossorigin="anonymous">
        <link rel="preconnect" href="https://fonts.googleapis.com">
        <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
        <link href="https://fonts.googleapis.com/css2?family=Lexend+Giga:wght@100..900&display=swap" rel="stylesheet">
        <link rel="stylesheet" href="perfil.css">
        <link rel="stylesheet" href="../global.css">
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
                        option.value = estado.sigla; // quero salvar a sigla
                        option.textContent = estado.nome;

                        if (estado.sigla == estadoSelecionado) {
                            option.selected = true;
                            carregarCidades(estado.sigla); // carrega as cidades do estado já salvo
                        }

                        selectEstado.appendChild(option);
                    });
                });

            selectEstado.addEventListener('change', () => {
                const estadoSigla = selectEstado.value;
                carregarCidades(estadoSigla);
            });

            function carregarCidades(estadoSigla) {
                selectCidade.innerHTML = '<option value="">Carregando cidades...</option>';

                fetch(`https://servicodados.ibge.gov.br/api/v1/localidades/estados/${estadoSigla}/municipios`)
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
        </script>
    </head>
    <body>
        <div class="container-fluid p-0">
            <header><?php require '../header/header.php' ?></header>
            <main>
                <h1 class="my-5 text-center">Informações Pessoais</h1>
                <div class="info-pessoal">
                <form action="../../controller/pacienteController.php" method="POST">
                    <input type="hidden" name="_method" value="PUT" />
                    <input type="hidden" name="id" value="<?= $paciente['id'] ?>" />

                    <div class="perfil-item mb-3">
                        <p class="tipo-dado">Nome Completo:</p>
                        <p class="dado">
                            <input type="text" name="nome" value="<?= !empty($paciente['nome']) ? htmlspecialchars($paciente['nome']) : 'Não informado' ?>" class="form-control" />
                        </p>
                    </div>
                    <div class="perfil-item mb-3">
                        <p class="tipo-dado">Nome Social:</p>
                        <p class="dado">
                            <input type="text" name="nome_social" value="<?= !empty($paciente['nome_social']) ? htmlspecialchars($paciente['nome_social']) : 'Não informado' ?>" class="form-control" />
                        </p>
                    </div>
                    <div class="perfil-item mb-3">
                        <p class="tipo-dado">E-mail:</p>
                        <p class="dado">
                            <input type="email" name="email" value="<?= !empty($paciente['email']) ? htmlspecialchars($paciente['email']) : 'Não informado' ?>" class="form-control" />
                        </p>
                    </div>
                    <div class="perfil-item mb-3">
                        <p class="tipo-dado">Data de Nascimento:</p>
                        <p class="dado">
                            <input type="date" name="data_nascimento" class="form-control" value="<?= !empty($paciente['data_nascimento']) ? htmlspecialchars($paciente['data_nascimento']) : '' ?>">
                        </p>
                    </div>
                    <div class="perfil-item mb-3">
                        <div>
                            <p class="tipo-dado">Estado</p>
                            <p class="dado">
                            <select name="estado" id="estado" class="form-select">
                                <option value="">Carregando estados...</option> <!-- estado carregado via JS -->
                            </select>
                            </p>
                        </div>
                        <div>
                            <p class="tipo-dado">Cidade</p>
                            <p class="dado">
                            <select name="cidade" id="cidade" class="form-select">
                                <option value="">Selecione um estado primeiro</option> <!-- cidade carregada via JS -->
                            </select>
                            </p>
                        </div>
                    </div>
                    <div class="perfil-item mb-3">
                        <p class="tipo-dado">Gênero:</p>
                        <p class="dado">
                            <?php
                                $genero = isset($paciente) ? $paciente->getGenero() : '';
                            ?>
                            <div class="form-check">
                                <input class="form-check-input" type="radio" name="genero" value="F" <?= $genero === 'F' ? 'checked' : '' ?>>
                                <label class="form-check-label">Feminino</label>
                            </div>
                            <div class="form-check">
                                <input class="form-check-input" type="radio" name="genero" value="M" <?= $genero === 'M' ? 'checked' : '' ?>>
                                <label class="form-check-label">Masculino</label>
                            </div>
                            <div class="form-check">
                                <input class="form-check-input" type="radio" name="genero" value="O" <?= $genero === 'O' ? 'checked' : '' ?>>
                                <label class="form-check-label">Outro</label>
                            </div>
                            <div class="form-check">
                                <input class="form-check-input" type="radio" name="genero" value="" <?= $genero === '' ? 'checked' : '' ?>>
                                <label class="form-check-label">Não informado</label>
                            </div>
                        </div>
                        </p>
                    </div>
                    <div class="perfil-item mb-3">
                        <p class="tipo-dado">Tipo Sanguíneo:</p>
                        <p class="dado">
                            <?php
                                $tiposSanguineos = [
                                    'A+' => 'A+',
                                    'A-' => 'A-',
                                    'B+' => 'B+',
                                    'B-' => 'B-',
                                    'AB+' => 'AB+',
                                    'AB-' => 'AB-',
                                    'O+' => 'O+',
                                    'O-' => 'O-'
                                ];
                                $tipoPaciente = $paciente['tipo_sanguineo'] ?? '';
                            ?>
                            <?php foreach ($tiposSanguineos as $valor => $label): ?>
                                <div class="col">
                                    <div class="form-check">
                                        <input class="form-check-input" type="radio" name="tipo_sanguineo" value="<?= $valor ?>"
                                            <?= $tipoPaciente === $valor ? 'checked' : '' ?>>
                                        <label class="form-check-label"><?= $label ?></label>
                                    </div>
                                </div>
                            <?php endforeach; ?>
                        </p>
                    </div>
                    <div class="perfil-item mb-3">
                        <p class="tipo-dado">Medicação:</p>
                        <p class="dado">
                            <textarea name="medicacao" placeholder="Não informado"><?= isset($paciente) && $paciente->getMedicacao() ? htmlspecialchars($paciente->getMedicacao()) : '' ?></textarea>
                        </p>
                    </div>
                    <div class="perfil-item mb-3">
                        <p class="tipo-dado">Doenças:</p>
                        <p class="dado">
                            <textarea name="doenca" placeholder="Não informado"><?= isset($paciente) && $paciente->getDoenca() ? htmlspecialchars($paciente->getDoenca()) : '' ?></textarea>
                        </p>
                    </div>
                </form>    
                </div>
            </main>
            <footer><?php require '../footer/footer.php' ?></footer>
        </div>
    </body>
</html>