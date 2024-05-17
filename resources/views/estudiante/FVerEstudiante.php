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
      <p class="text-muted text-md mb-0 pb-0"><b>Código  de asegurado: </b><?php echo $estudiante['cod_asegurado'] ?></p>
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
      <p class="text-muted text-md mb-0 pb-0"><b>País: </b> <?php echo $estudiante['nombre_pais'] ?></p>
      <p class="text-muted text-md mb-0 pb-0"><b>Departamento: </b> <?php echo $estudiante['nombre_departamento'] ?></p>
      <p class="text-muted text-md mb-0 pb-0"><b>Provincia: </b> <?php echo $estudiante['nombre_provincia'] ?></p>
      <p class="text-muted text-md mb-0 pb-0"><b>Localidad: </b> <?php echo $estudiante['nombre_localidad'] ?></p>
      <p class="text-muted text-md mb-0 pb-0"><b>Observación: </b> <?php echo $estudiante['observacion'] ?></p>

      <a class="btn btn-success" href="ImpCarnet/<?php echo $estudiante['id_estudiante'];?>" target="_blank">
       Imprimir Carnet
        <i class="fas fa-print"></i>
      </a>
    </div>
  </div>

</div>

