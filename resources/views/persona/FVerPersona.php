    <!-- Content Header (Page header) -->
    <section class="content-header">
        <div class="modal-header bg-dark">
            <h4 class="modal-title">DATOS DE LA PERSONA</h4>
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
            </button>
        </div>
    </section>

    <!-- Main content -->
    <section class="content">

        <!-- Default box -->
        <div class="card card-solid">
            <div class="card-body pb-0">
                <div class="row">
                    <div class="col-12 col-sm-12 col-md-12 d-flex align-items-stretch flex-column">
                        <div class="card bg-light d-flex flex-fill">
                            <div class="card-header text-muted border-bottom-0">
                                CÓDIGO DE ASEGURADO : <?php echo $persona['cod_asegurado'] ?>
                            </div>
                            <div class="card-body pt-0">
                                <div class="row">
                                    <div class="col-7">
                                        <h2 class="lead text-lg" style="font-weight: 800;"><b><?php echo $persona['nombre_persona'] . " " . $persona['ap_paterno'] . " " . $persona['ap_materno'] ?></b></h2>
                                        <p class="text-muted text-md mb-0 pb-0"><b>Cédula de Identidad: </b> <?php echo $persona['ci_persona'] . " ". $persona['lugar_emision']?></p>
                                        <p class="text-muted text-md mb-0 pb-0"><b>Fecha de Nacimiento: </b> <?php echo $persona['fecha_nacimiento']?></p>
                                        <p class="text-muted text-md mb-0 pb-0"><b>Estado Civil: </b> <?php echo $persona['estado_civil_pers']?></p>
                                        <p class="text-muted text-md mb-0 pb-0"><b>Género: </b> <?php echo $persona['sexo']?></p>
                                        <p class="text-muted text-md mb-0 pb-0"><b>Factor: </b> <?php echo $persona['factor']?></p>
                                        <p class="text-muted text-md mb-0 pb-0"><b>Grupo: </b> <?php echo $persona['grupo']?></p>

                                        <p class="text-muted text-md mb-0 pb-0"><b>Dirección: </b> <?php echo $persona['direccion']?></p>
                                        <p class="text-muted text-md mb-0 pb-0"><b>Contácto: </b> <?php echo $persona['contactos_persona']?></p>
                                    </div>
                                    <div class="col-5">
                                        <!-- <img src="../../dist/img/user1-128x128.jpg" alt="user-avatar" class="img-circle img-fluid"> -->
                                        <p class="text-muted text-md mb-0 pb-0"><b>Contáctos de la Persona: </b> <?php echo $persona['datos_referencia']?></p>
                                        <p class="text-muted text-md mb-0 pb-0"><b>País: </b> <?php echo $persona['pais']?></p>
                                        <p class="text-muted text-md mb-0 pb-0"><b>Departamento: </b> <?php echo $persona['departamento']?></p>
                                        <p class="text-muted text-md mb-0 pb-0"><b>Provincia: </b> <?php echo $persona['provincia']?></p>
                                        <p class="text-muted text-md mb-0 pb-0"><b>Localidad: </b> <?php echo $persona['localidad']?></p>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <!-- /.card-footer -->
        </div>
        <!-- /.card -->

    </section>
    <!-- /.content -->