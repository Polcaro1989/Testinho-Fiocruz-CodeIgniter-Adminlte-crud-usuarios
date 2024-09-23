<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Crud Usuários</title>

    <!-- Google Font: Source Sans Pro -->
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback">
    <!-- Font Awesome -->
    <link rel="stylesheet" href="./template/plugins/fontawesome-free/css/all.min.css">
    <!-- Theme style -->
    <link rel="stylesheet" href="./template/dist/css/adminlte.min.css">
    <!-- Custom CSS (Ajustes de Estilo) -->
    <link rel="stylesheet" href="./template/dist/css/style.css">
        
</head>

<body class="hold-transition sidebar-mini">
    <div class="wrapper">
        <!-- Conteúdo principal -->
        <div class="content-wrapper p-4">
            <div id="mensagem" class="w-75 alert"></div>
            <div class="content">
                <div class="container-fluid">
                    <!-- Título e Botão de Cadastrar em uma única linha -->
                    <div class="d-flex justify-content-between align-items-center mb-3">
                        <h3 class="mb-0">Cadastro de Usuários</h3>
                        <!-- Botão Cadastrar -->
                        <button class="meuElemento btn btn-success" id="btnCadastrar">Cadastrar</button>
                    </div>
                    <!-- Tabela de Usuários -->
                    <div class="table-container">
                        <div class="card text-center">
                            <div class="card-body">
                                <table class="table table-bordered">
                                    <thead>
                                        <tr>
                                            <th class="hidden">#</th>
                                            <th>Nome</th>
                                            <th>Email</th>
                                            <th>Perfil</th>
                                            <th>Ações</th>
                                        </tr>
                                    </thead>
                                    <tbody id="tabelaUsuarios">
                                        <?php if (!empty($usuarios) && is_array($usuarios)): ?>
                                            <?php foreach ($usuarios as $usuario): ?>
                                                <tr id="usuario_<?= esc($usuario['id']) ?>">
                                                    <td class="hidden"><?= esc($usuario['id']) ?></td>
                                                    <td><?= esc($usuario['nome']) ?></td>
                                                    <td><?= esc($usuario['email']) ?></td>
                                                    <td><?= esc($usuario['perfil']) ?></td>
                                                    <td>
                                                        <button class="btn btn-primary btn-sm" onclick="editarUsuario('<?= esc($usuario['id']) ?>')">
                                                            <i class="fas fa-pencil-alt"></i> Editar
                                                        </button>
                                                        <button class="btn btn-danger btn-sm" onclick="abrirModalExclusao('<?= esc($usuario['id']) ?>')">
                                                            <i class="fas fa-trash"></i> Excluir
                                                        </button>
                                                    </td>
                                                </tr>
                                            <?php endforeach; ?>
                                        <?php else: ?>
                                            <tr>
                                                <td colspan="5">Nenhum usuário encontrado.</td>
                                            </tr>
                                        <?php endif; ?>
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Modal de Confirmação -->
    <div class="modal fade" id="modalExclusao" tabindex="-1" aria-labelledby="modalExclusaoLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="modalExclusaoLabel">Confirmação</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    Deseja realmente excluir o usuário <strong id="nomeUsuario"></strong>?
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Não</button>
                    <button type="button" class="btn btn-primary ml-auto" id="btnConfirmarExclusao">Sim</button>
                </div>
            </div>
        </div>
    </div>

    <!-- Footer -->
    <footer>
        <div class="footer-content">
            <div class="footer-section about">
                <h2>Sobre Min</h2>
                <p>Author:Abraão Polcaro</p>
            </div>
            <div class="footer-section contact">
                <h2>Contato</h2>
                <p>Email: <a href="mailto:contato@exemplo.com">abraao695@gmail.com</a></p>
                <p>Telefone: (21)9950-18935</p>
            </div>
        </div>
        <div class="footer-bottom">
            <p>&copy; 2024 Todos os direitos reservados.</p>
        </div>
    </footer>


    <!-- Scripts (AdminLTE e jQuery) -->
    <script src="./template/plugins/jquery/jquery.min.js"></script>
    <script src="./template/plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
    <script src="./template/dist/js/adminlte.js"></script>

    <script>
        let idUsuarioParaExcluir = '';

        function editarUsuario(id) {
            // Redireciona para a página de edição com o ID do usuário
            window.location.href = `/edit/${id}`;
        }

        function abrirModalExclusao(id) {
            // Armazena o ID do usuário para exclusão
            idUsuarioParaExcluir = id;

            // Exibe o modal de confirmação
            $('#modalExclusao').modal('show');
        }

        // Confirmação de exclusão no modal
        document.getElementById('btnConfirmarExclusao').addEventListener('click', function() {
            // Chama a função deletarUsuario passando o ID armazenado
            deletarUsuario(idUsuarioParaExcluir);
        });

        // Função para excluir o usuário
        function deletarUsuario(id) {
            $.ajax({
                url: `/usuarios/delete/${id}`, // Agora o ID correto está sendo passado
                type: 'DELETE',
                dataType: 'json',
                success: function(response) {
                    const mensagemEl = $('#mensagem');
                    if (response.success) {
                        // Exibe a mensagem de sucesso
                        mensagemEl.removeClass('alert-danger').addClass('alert-success');
                        mensagemEl.text(response.message).fadeIn(300);

                        // Remove a linha da tabela sem recarregar a página
                        $(`#usuario_${id}`).fadeOut(300, function() {
                            $(this).remove(); // Remove a linha após o fade-out
                        });

                        // Oculta a mensagem após 3 segundos
                        setTimeout(function() {
                            mensagemEl.fadeOut(300);
                        }, 3000);

                        // Oculta o modal
                        $('#modalExclusao').modal('hide');
                    } else {
                        // Exibe a mensagem de erro
                        mensagemEl.removeClass('alert-success').addClass('alert-danger');
                        mensagemEl.text(response.message).fadeIn(300);

                        // Oculta a mensagem após 3 segundos
                        setTimeout(function() {
                            mensagemEl.fadeOut(300);
                        }, 3000);
                    }
                },
                error: function(xhr, status, error) {
                    const mensagemEl = $('#mensagem');
                    try {
                        var jsonResponse = JSON.parse(xhr.responseText);
                        mensagemEl.removeClass('alert-success').addClass('alert-danger');
                        mensagemEl.text('Erro ao excluir usuário: ' + jsonResponse.message).fadeIn(300);
                    } catch (e) {
                        mensagemEl.removeClass('alert-success').addClass('alert-danger');
                        mensagemEl.text('Erro ao excluir usuário. Tente novamente. Detalhes do erro: ' + error).fadeIn(300);
                    }

                    // Oculta a mensagem após 3 segundos
                    setTimeout(function() {
                        mensagemEl.fadeOut(300);
                    }, 3000);

                    $('#modalExclusao').modal('hide');
                }
            });
        }

        // Função para redirecionar para a página de cadastro
        document.getElementById('btnCadastrar').addEventListener('click', function() {
            window.location.href = 'cadastrar';
        });
    </script>


</body>

</html>