<?php

use App\Http\Controllers\usuarioController;

include 'header.php';
?>

<body class="hold-transition login-page">
    <div id="back"></div>
    <div class="login-box">
        <div class="login-logo">
            <a href=""><b>REGISTRO</b>Afiliados</a>
        </div>
        <!-- /.login-logo -->
        <div class="card">
            <div class="card-body login-card-body">
                <p class="login-box-msg">Ingrese sus credenciales para Acceder al Sistema</p>

                <form action="panel">
                
               <!--  -->
                    <div class="input-group mb-3">
                        <input type="text" class="form-control" placeholder="Login de usuario" name="usuario">
                        <div class="input-group-append">
                            <div class="input-group-text">
                                <span class="fas fa-user"></span>
                            </div>
                        </div>
                    </div>
                    <div class="input-group mb-3">
                        <input type="password" class="form-control" placeholder="Ingrese su contraseña" name="password">
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

                    <?php
                        $login = new usuarioController;
                        $login->ctrIngresoUsuario();
                    ?>


                </form>

            </div>
            <!-- /.login-card-body -->
        </div>
    </div>
    <!-- /.login-box -->

    <?php
include 'footer.php';
?>