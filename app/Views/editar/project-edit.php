<?php if (session()->getFlashdata('message')): ?>
    <div class="alert alert-success">
        <?= session()->getFlashdata('message') ?>
    </div>
<?php elseif (session()->getFlashdata('error')): ?>
    <div class="alert alert-danger">
        <?= session()->getFlashdata('error') ?>
    </div>
<?php endif; ?>

<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>Crud Usuários</title>

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
    body, .content-wrapper {
        background-color: #f0f4f8; /* Cor azul para o fundo total */
    }
    .card {
        width: 75%; /* Ajusta a largura da tabela conforme necessário */
        margin: auto; /* Adiciona margem automática para centralização horizontal */
    }
  </style>
</head>
<body class="hold-transition sidebar-mini">

    <div class="wrapper">
        <!-- Conteúdo principal -->
        <div class="content-wrapper p-4 mt-5 ml-5">
            <div id="mensagem" class="w-75 alert"></div>
            <div class="content">
                <div class="container-fluid mt-5">
                    <div class="card card-teal mx-auto w-50">
                        <div class="card-header">
                            <h3 class="card-title">Editar Usuário</h3>
                        </div>
                        <!-- Formulário de Edição -->
                        <form id="editForm" action="/update/<?= esc($usuario['id']) ?>" method="post">
                            <?= csrf_field() ?>
                            
                            <div class="card-body">
                                <div class="form-group row">
                                    <label for="nome" class="col-sm-2 col-form-label">Nome</label>
                                    <div class="col-sm-10">
                                        <input type="text" class="form-control" id="nome" name="nome" value="<?= esc($usuario['nome']) ?>">
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label for="email" class="col-sm-2 col-form-label">Email</label>
                                    <div class="col-sm-10">
                                        <div class="input-group">
                                            <div class="input-group-prepend">
                                                <span class="input-group-text"><i class="fas fa-envelope"></i></span>
                                            </div>
                                            <input type="email" class="form-control" id="email" name="email" value="<?= esc($usuario['email']) ?>">
                                        </div>
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label for="senha" class="col-sm-2 col-form-label">Senha</label>
                                    <div class="col-sm-10">
                                        <input type="password" class="form-control" id="senha" name="senha"value="<?= esc($usuario['senha']) ?> placeholder="Senha (deixe em branco se não quiser alterar)">
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label class="col-sm-2 col-form-label">Perfil</label>
                                    <div class="col-sm-10">
                                        <div class="form-check form-check-inline">
                                            <input class="form-check-input" type="radio" name="perfil" id="administrador" value="Administrador" <?= $usuario['perfil'] === 'Administrador' ? 'checked' : '' ?>>
                                            <label class="form-check-label" for="administrador">Administrador</label>
                                        </div>
                                        <div class="form-check form-check-inline">
                                            <input class="form-check-input" type="radio" name="perfil" id="convidado" value="Convidado" <?= $usuario['perfil'] === 'Convidado' ? 'checked' : '' ?>>
                                            <label class="form-check-label" for="convidado">Convidado</label>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="card-footer d-flex justify-content-between">
                                <button type="submit" class="btn btn-primary">Alterar</button>
                                <button type="reset" class="btn btn-secondary ml-auto" id="btnCancelar">Cancelar</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
   <!-- Modal de Confirmação -->
    <div class="modal fade" id="modalEdicao" tabindex="-1" aria-labelledby="modalEdicaoLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content bg-success text-white">
                <div class="modal-header">
                    <h5 class="modal-title bg-success" id="modalEdicaoLabel">Sucesso</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body bg-success text-white">
                    Usuário editado com sucesso!
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
 
    <script>

        document.addEventListener('DOMContentLoaded', function() {
            const btnCancelar = document.getElementById('btnCancelar');
            btnCancelar.addEventListener('click', function(event) {
                event.preventDefault();
                window.location.href = '/';
            });
        });
    </script>
    <script>
    $(document).ready(function() {
        $('#editForm').on('submit', function(e) {
            e.preventDefault(); // Evita o envio padrão do formulário

            $.ajax({
                url: $(this).attr('action'),
                method: 'POST',
                data: $(this).serialize(),
                dataType: 'json',
                success: function(response) {
                    // Verifica se a resposta contém sucesso
                    if (response.success) {
                        // Exibe o modal de confirmação
                        $('#modalEdicao').modal('show');

                        // Fecha o modal automaticamente após 3 segundos
                        setTimeout(function() {
                            $('#modalEdicao').modal('hide');
                            window.location.href = '/'; // Redireciona após o sucesso
                        }, 3000); 
                    }
                },
                error: function(xhr) {
                    // Limpa os erros anteriores
                    $('.invalid-feedback').remove();
                    $('.is-invalid').removeClass('is-invalid');

                    // Se houver erros de validação
                    if (xhr.status === 400 && xhr.responseJSON.errors) {
                        $.each(xhr.responseJSON.errors, function(key, error) {
                            var input = $('[name="' + key + '"]');
                            input.addClass('is-invalid'); // Adiciona a classe de erro
                            input.after('<div class="invalid-feedback">' + error + '</div>'); // Adiciona a mensagem de erro
                        });
                    } else {
                        // Exibe uma mensagem de erro genérica
                        alert('Falha ao atualizar usuário!');
                    }
                }
            });
        });
    });
</script>


</body>
</html>
