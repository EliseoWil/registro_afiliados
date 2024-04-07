
<div class="modal-header bg-dark">
  <h4 class="modal-title">DATOS DEL ESTUDIANTE</h4>
  <button type="button" class="close" data-dismiss="modal" aria-label="Close">
    <span aria-hidden="true">&times;</span>
  </button>
</div>

<div class="modal-body pt-0">
<hr>
  <div class="row">
    <div class="col-7">
      <h2 class="lead text-lg" style="font-weight: 800;"><b><?php echo $estudiante['nombre_estu'] . " " . $estudiante['ap_paterno_estu'] . " " . $estudiante['ap_materno_estu'] ?></b></h2>
      <p class="text-muted text-md mb-0 pb-0"><b>CÓDIGO DE ASEGURADO : </b><?php echo $estudiante['cod_asegurado'] ?></p>
      <p class="text-muted text-md mb-0 pb-0"><b>Cédula de Identidad: </b> <?php echo $estudiante['ci_estudiante'] . " " . $estudiante['lugar_emision'] ?></p>
      <p class="text-muted text-md mb-0 pb-0"><b>Fecha de Nacimiento: </b> <?php echo $estudiante['fecha_nacimiento'] ?></p>
      <p class="text-muted text-md mb-0 pb-0"><b>Estado Civil: </b> <?php echo $estudiante['estado_civil'] ?></p>
      <p class="text-muted text-md mb-0 pb-0"><b>Género: </b> <?php echo $estudiante['sexo_estu'] ?></p>
      <p class="text-muted text-md mb-0 pb-0"><b>R.U.: </b> <?php echo $estudiante['ru'] ?></p>
      <p class="text-muted text-md mb-0 pb-0"><b>Curso: </b> <?php echo $estudiante['curso'] ?></p>

      <p class="text-muted text-md mb-0 pb-0"><b>Dirección: </b> <?php echo $estudiante['direccion_estu'] ?></p>
      <p class="text-muted text-md mb-0 pb-0"><b>Contácto: </b> <?php echo $estudiante['contactos_estu'] ?></p>
    </div>
    <div class="col-5">
      <!-- <img src="../../dist/img/user1-128x128.jpg" alt="user-avatar" class="img-circle img-fluid"> -->
      <p class="text-muted text-md mb-0 pb-0"><b>Contáctos de la estudiante: </b> <?php echo $estudiante['datos_referencia'] ?></p>
      <p class="text-muted text-md mb-0 pb-0"><b>País: </b> <?php echo $estudiante['pais'] ?></p>
      <p class="text-muted text-md mb-0 pb-0"><b>Departamento: </b> <?php echo $estudiante['departamento'] ?></p>
      <p class="text-muted text-md mb-0 pb-0"><b>Provincia: </b> <?php echo $estudiante['provincia'] ?></p>
      <p class="text-muted text-md mb-0 pb-0"><b>Localidad: </b> <?php echo $estudiante['localidad'] ?></p>
      <p class="text-muted text-md mb-0 pb-0"><b>Observación: </b> <?php echo $estudiante['observacion'] ?></p>
    </div>
  </div>
</div>

