<div class="modal-header bg-dark">
  <h4 class="modal-title">DATOS DEL EMPLEADO</h4>
  <button type="button" class="close" data-dismiss="modal" aria-label="Close">
    <span aria-hidden="true">&times;</span>
  </button>
</div>

<div class="modal-body pt-0">
<hr>
  <div class="row">
    <div class="col-7">
      <h2 class="lead text-lg" style="font-weight: 800;"><b><?php echo $empleado['nombre_empleado'] . " " . $empleado['ap_paterno'] . " " . $empleado['ap_materno'] ?></b></h2>
      <p class="text-muted text-md mb-0 pb-0"><b>Código  de asegurado: </b><?php echo $empleado['cod_asegurado'] ?></p>
      <p class="text-muted text-md mb-0 pb-0"><b>Cédula de Identidad: </b> <?php echo $empleado['ci_empleado'] ?></p>
      <p class="text-muted text-md mb-0 pb-0"><b>Emitido en: </b> <?php echo $empleado['lugar_emision'] ?></p>
      <p class="text-muted text-md mb-0 pb-0"><b>Fecha de Nacimiento: </b> <?php echo $empleado['fecha_nacimiento'] ?></p>
      <p class="text-muted text-md mb-0 pb-0"><b>Estado Civil: </b> <?php echo $empleado['estado_civil'] ?></p>
      <p class="text-muted text-md mb-0 pb-0"><b>Género: </b> <?php echo $empleado['sexo'] ?></p>

      <p class="text-muted text-md mb-0 pb-0"><b>Dirección: </b> <?php echo $empleado['direccion'] ?></p>
      <p class="text-muted text-md mb-0 pb-0"><b>Contáctos: </b> <?php echo $empleado['contactos_empleado'] ?></p>
    </div>
    <div class="col-5">
      <p class="text-muted text-md mb-0 pb-0"><b>País: </b> <?php echo $empleado['nombre_pais'] ?></p>
      <p class="text-muted text-md mb-0 pb-0"><b>Departamento: </b> <?php echo $empleado['nombre_departamento'] ?></p>
      <p class="text-muted text-md mb-0 pb-0"><b>Provincia: </b> <?php echo $empleado['nombre_provincia'] ?></p>
      <p class="text-muted text-md mb-0 pb-0"><b>Localidad: </b> <?php echo $empleado['nombre_localidad'] ?></p>
    </div>
  </div>

</div>

