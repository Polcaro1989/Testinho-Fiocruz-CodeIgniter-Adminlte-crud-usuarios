<?php if (isset($errors) && !empty($errors)): ?>
    <div class="alert alert-danger">
        <?php foreach ($errors as $error): ?>
            <p><?= $error ?></p>
        <?php endforeach; ?>
    </div>
<?php endif; ?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Cadastro de Usuário</title>

    <!-- Google Font: Source Sans Pro -->
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback">
    <!-- Font Awesome -->
    <link rel="stylesheet" href="/template/plugins/fontawesome-free/css/all.min.css">
    <!-- Ionicons -->
    <link rel="stylesheet" href="https://code.ionicframework.com/ionicons/2.0.1/css/ionicons.min.css">
    <!-- Tempusdominus Bootstrap 4 -->
    <link rel="stylesheet" href="/template/plugins/tempusdominus-bootstrap-4/css/tempusdominus-bootstrap-4.min.css">
    <!-- iCheck -->
    <link rel="stylesheet" href="/template/plugins/icheck-bootstrap/icheck-bootstrap.min.css">
    <!-- JQVMap -->
    <link rel="stylesheet" href="/template/plugins/jqvmap/jqvmap.min.css">
    <!-- Theme style -->
    <link rel="stylesheet" href="/template/dist/css/adminlte.min.css">
    <!-- overlayScrollbars -->
    <link rel="stylesheet" href="/template/plugins/overlayScrollbars/css/OverlayScrollbars.min.css">
    <!-- Daterange picker -->
    <link rel="stylesheet" href="/template/plugins/daterangepicker/daterangepicker.css">
    <!-- summernote -->
    <link rel="stylesheet" href="/template/plugins/summernote/summernote-bs4.min.css">
    <style>
        body,
        .content-wrapper {
            background-color: #f0f4f8;
            /* Cor azul para o fundo total */
        }

        .card {
            width: 75%;
            /* Ajusta a largura do formulário conforme necessário */
            margin: auto;
            /* Adiciona margem automática para centralização horizontal */
        }
    </style>
</head>

<body class="hold-transition sidebar-mini">

    <div class="wrapper">
        <!-- Conteúdo principal -->
        <div class="content-wrapper p-4 mt-5 ml-5">
            <div class="content">
                <div class="container-fluid mt-5">
                    <div class="card card-teal mx-auto w-50">
                        <div class="card-header">
                            <h1 class="card-title">Cadastrar Novo Usuário</h1>
                        </div>
                        <!-- Formulário de Cadastro -->
                        <form id="registerForm">
                            <?= csrf_field() ?>

                            <div class="card-body">
                                <div class="form-group row">
                                    <label for="nome" class="col-sm-2 col-form-label">Nome</label>
                                    <div class="col-sm-10">
                                        <input type="text" class="form-control" id="nome" name="nome" placeholder="Digite o nome">
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label for="email" class="col-sm-2 col-form-label">Email</label>
                                    <div class="col-sm-10">
                                        <div class="input-group">
                                            <div class="input-group-prepend">
                                                <span class="input-group-text"><i class="fas fa-envelope"></i></span>
                                            </div>
                                            <input type="email" class="form-control" id="email" name="email" placeholder="Digite o email">
                                        </div>
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label for="senha" class="col-sm-2 col-form-label">Senha</label>
                                    <div class="col-sm-10">
                                        <input type="password" class="form-control" id="senha" name="senha" placeholder="Digite a senha">
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label class="col-sm-2 col-form-label">Perfil</label>
                                    <div class="col-sm-10">
                                        <div class="form-check form-check-inline">
                                            <input class="form-check-input" type="radio" name="perfil" id="administrador" value="Administrador">
                                            <label class="form-check-label" for="administrador">Administrador</label>
                                        </div>
                                        <div class="form-check form-check-inline">
                                            <input class="form-check-input" type="radio" name="perfil" id="convidado" value="Convidado">
                                            <label class="form-check-label" for="convidado">Convidado</label>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="card-footer d-flex justify-content-between">
                                <button type="submit" class="btn btn-primary">Cadastrar</button>
                                <button type="reset" class="btn btn-secondary ml-auto" id="btnCancelar">Cancelar</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Modal de Confirmação -->
    <div class="modal fade" id="modalCadastro" tabindex="-1" aria-labelledby="modalCadastroLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content bg-success text-white">
                <div class="modal-header">
                    <h5 class="modal-title bg-success" id="modalCadastroLabel">Sucesso</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body bg-success text-white">
                    Usuário cadastrado com sucesso!
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-light" data-dismiss="modal">Fechar</button>
                </div>
            </div>
        </div>
    </div>

    <!-- jQuery -->
    <script src="/template/plugins/jquery/jquery.min.js"></script>
    <!-- jQuery UI 1.11.4 -->
    <script src="/template/plugins/jquery-ui/jquery-ui.min.js"></script>
    <!-- Resolve conflict in jQuery UI tooltip with Bootstrap tooltip -->
    <script>
        $.widget.bridge('uibutton', $.ui.button)
    </script>
    <!-- Bootstrap 4 -->
    <script src="/template/plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
    <!-- ChartJS -->
    <script src="/template/plugins/chart.js/Chart.min.js"></script>
    <!-- JQVMap -->
    <script src="/template/plugins/jqvmap/jquery.vmap.min.js"></script>
    <script src="/template/plugins/jqvmap/maps/jquery.vmap.usa.js"></script>
    <!-- jQuery Knob Chart -->
    <script src="/template/plugins/jquery-knob/jquery.knob.min.js"></script>
    <!-- daterangepicker -->
    <script src="/template/plugins/moment/moment.min.js"></script>
    <script src="/template/plugins/daterangepicker/daterangepicker.js"></script>
    <!-- Tempusdominus Bootstrap 4 -->
    <script src="/template/plugins/tempusdominus-bootstrap-4/js/tempusdominus-bootstrap-4.min.js"></script>
    <!-- Summernote -->
    <script src="/template/plugins/summernote/summernote-bs4.min.js"></script>
    <!-- overlayScrollbars -->
    <script src="/template/plugins/overlayScrollbars/js/jquery.overlayScrollbars.min.js"></script>
    <!-- AdminLTE App -->
    <script src="/template/dist/js/adminlte.js"></script>
    <!-- AdminLTE App -->
    <script src="/template/dist/js/app.js"></script>
    <!-- AdminLTE for demo purposes -->
     
    <script>
        // Função para o botão Cadastrar
        document.addEventListener('DOMContentLoaded', function() {
            // Evento para o botão Cancelar
            const btnCancelar = document.getElementById('btnCancelar');
            btnCancelar.addEventListener('click', function(event) {
                event.preventDefault();
                window.location.href = '/';
            });

            $(document).ready(function() {
                $('#registerForm').submit(function(event) {
                    event.preventDefault(); // Evita o envio padrão do formulário

                    $.ajax({
                        url: $(this).attr('action'), // Usa a URL do formulário
                        type: 'POST',
                        data: $(this).serialize(),
                        dataType: 'json',
                        success: function(response) {
                            if (response.success) {
                                $('#modalCadastro').modal('show');
                                setTimeout(function() {
                                    $('#modalCadastro').modal('hide');
                                    window.location.href = '/';
                                }, 2000);
                            } else {
                                // Limpa erros anteriores
                                $('.invalid-feedback').remove();
                                $('.is-invalid').removeClass('is-invalid');

                                // Se houver erros de validação
                                if (response.errors) {
                                    $.each(response.errors, function(key, error) {
                                        var input = $('[name="' + key + '"]');
                                        if (input.length) {
                                            input.addClass('is-invalid');
                                            input.after('<div class="invalid-feedback">' + error + '</div>');
                                        }
                                    });
                                }
                            }
                        },
                        error: function(xhr, status, error) {
                            console.log('Status:', status);
                            console.log('Error:', error);
                            console.log('Response:', xhr.responseText);

                            // Limpa erros anteriores
                            $('.invalid-feedback').remove();
                            $('.is-invalid').removeClass('is-invalid');

                            if (xhr.status === 400 && xhr.responseJSON.errors) {
                                $.each(xhr.responseJSON.errors, function(key, error) {
                                    var input = $('[name="' + key + '"]');
                                    if (input.length) {
                                        input.addClass('is-invalid');
                                        input.after('<div class="invalid-feedback">' + error + '</div>');
                                    }
                                });
                            } else {
                                $('#registerForm').before('<div class="alert alert-danger">Ocorreu um erro. Por favor, tente novamente.</div>');
                            }
                        }
                    });
                });
            });
        });
    </script>
</body>

</html>