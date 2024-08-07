<?php

use App\Http\Controllers\usuarioController;

include 'header.php';
//sesion del token
$token = session()->token();

session_start();

// Verificar si hay un mensaje en la sesión
if (isset($_SESSION['mensaje']) && isset($_SESSION['mensaje']['credenciales'])) {
  echo '<div class="alert alert-danger">' . $_SESSION['mensaje']['credenciales'] . '</div>';
  unset($_SESSION['mensaje']); // Limpiar el mensaje después de mostrarlo
}

?>
<!DOCTYPE html>
<html lang="en">

  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Registro de Afiliados</title>

    <!-- Google Font: Source Sans Pro -->
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback">
    <!-- Font Awesome -->
    <link rel="stylesheet" href="assets/plugins/fontawesome-free/css/all.min.css">
    <!-- Ionicons -->
    <link rel="stylesheet" href="https://code.ionicframework.com/ionicons/2.0.1/css/ionicons.min.css">
    <!-- Tempusdominus Bootstrap 4 -->
    <link rel="stylesheet" href="assets/plugins/tempusdominus-bootstrap-4/css/tempusdominus-bootstrap-4.min.css">
    <!-- iCheck -->
    <link rel="stylesheet" href="assets/plugins/icheck-bootstrap/icheck-bootstrap.min.css">
    <!-- JQVMap -->
    <link rel="stylesheet" href="assets/plugins/jqvmap/jqvmap.min.css">
    <!-- Theme style -->
    <link rel="stylesheet" href="assets/dist/css/adminlte.min.css">
    <!-- overlayScrollbars -->
    <link rel="stylesheet" href="assets/plugins/overlayScrollbars/css/OverlayScrollbars.min.css">
    <!-- Daterange picker -->
    <link rel="stylesheet" href="assets/plugins/daterangepicker/daterangepicker.css">
    <!-- summernote -->
    <link rel="stylesheet" href="assets/plugins/summernote/summernote-bs4.min.css">
    <!-- DataTables -->
    <link rel="stylesheet" href="assets/plugins/datatables-bs4/css/dataTables.bootstrap4.min.css">
    <link rel="stylesheet" href="assets/plugins/datatables-responsive/css/responsive.bootstrap4.min.css">
    <link rel="stylesheet" href="assets/plugins/datatables-buttons/css/buttons.bootstrap4.min.css">
    <!-- SweetAlert2 -->
    <link rel="stylesheet" href="assets/plugins/sweetalert2-theme-bootstrap-4/bootstrap-4.min.css">
    <link rel="shortcut icon" href="#">
  </head>

  <body class="hold-transition login-page">
    <div id="back"></div>
    <div class="login-box">
      <div class="login-logo">
        <a href=""><b>REGISTRO</b> Afiliados</a>
      </div>
      <!-- /.login-logo -->
      <div class="card">
        <div class="card-body login-card-body">
          <p class="login-box-msg">Ingrese sus credenciales para Acceder</p>

          <?php
          if (session('mensaje') && session('mensaje')['credenciales']) {
          ?>
          <div class="alert alert-danger">
            Credenciales de acceso inválidas..!!!
          </div>
          <?php
          }
          ?>

          <form method="POST" action="acceso">
           <!--envio de token de autenticacion para laravel-->
            <input type="hidden" name="_token" value="<?php echo $token; ?>">
            <div class="input-group mb-3">
              <input type="text" class="form-control" placeholder="Login de usuario" name="login_usuario">
              <div class="input-group-append">
                <div class="input-group-text">
                  <span class="fas fa-user"></span>
                </div>
              </div>
            </div>
            <div class="input-group mb-3">
              <input type="password" class="form-control" placeholder="Ingrese su contraseña" name="password_usuario">
              <div class="input-group-append">
                <div class="input-group-text">
                  <span class="fas fa-lock"></span>
                </div>
              </div>
            </div>
            <div class="row">
              <div class="col-8">

              </div>
              <!-- /.col -->
              <div class="col-4">
                <button type="submit" class="btn btn-primary btn-block">Ingresar</button>
              </div>
              <!-- /.col -->
            </div>

          </form>

        </div>
        <!-- /.login-card-body -->
      </div>
    </div>
    <!-- /.login-box -->