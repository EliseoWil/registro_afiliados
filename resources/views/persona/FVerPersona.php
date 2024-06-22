<div class="modal-header bg-dark">
  <h4 class="modal-title">DATOS DE LA PERSONA</h4>
  <button type="button" class="close" data-dismiss="modal" aria-label="Close">
    <span aria-hidden="true">&times;</span>
  </button>
</div>


<div class="modal-body pt-0">
  <hr>
  <div class="row">
    <div class="col-7">
      <h2 class="lead text-lg" style="font-weight: 800;"><b><?php echo $persona['nombre_persona'] . " " . $persona['ap_paterno'] . " " . $persona['ap_materno'] ?></b></h2>
      <p class="text-muted text-md mb-0 pb-0"><b>Código de asegurado: </b> <?php echo $persona['cod_asegurado'] ?></p>
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
      <p class="text-muted text-md mb-0 pb-0"><b>Contáctos de la Persona: </b> <?php echo $persona['datos_referencia']?></p>
      <p class="text-muted text-md mb-0 pb-0"><b>País: </b> <?php echo $persona['nombre_pais']?></p>
      <p class="text-muted text-md mb-0 pb-0"><b>Departamento: </b> <?php echo $persona['nombre_departamento']?></p>
      <p class="text-muted text-md mb-0 pb-0"><b>Provincia: </b> <?php echo $persona['nombre_provincia']?></p>
      <p class="text-muted text-md mb-0 pb-0"><b>Localidad: </b> <?php echo $persona['nombre_localidad']?></p>

      <?php
  if($persona['carnet_de_asegurado']==""){
      ?>
      <button class="btn btn-primary" onclick="MCarnetSeguroPer(<?php echo $persona['id_persona'] ?>)">
        <i class="fas fa-id-card"> Registrar Carnet</i>
      </button>
      <?php
  }else{
      ?>
      <a class="btn btn-success" href="ImpCarnetPer/<?php echo $persona['id_persona'];?>" target="_blank">
        Imprimir Carnet
        <i class="fas fa-print"></i>
      </a>

      <button class="btn btn-secondary" onclick="MEditCarnetPer('<?php echo $persona['cod_asegurado'] ?>')">
        <i class="fas fa-id-card"> Editar Carnet</i>
      </button>
      <?php
  }
      ?>
    </div>
  </div>
</div>

