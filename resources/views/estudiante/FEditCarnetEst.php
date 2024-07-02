<?php
$token = session()->token();
session_start();
?>
<form action="editCarnetEst/<?php echo $carnet->cod_asegurado;?>" method="POST" id="FormEditCarnetEst" enctype="multipart/form-data">
  <input type="hidden" name="_token" value="<?php echo $token; ?>">
  <div class="modal-header bg-dark flex">
    <h4 class="modal-title">EDITAR CARNET DE SEGURO PARA ESTUDIANTE </h4>
    <h4 class="modal-title">COD.: <?php echo $carnet->cod_asegurado;?></h4>
    <button type="button" class="close" data-dismiss="modal" aria-label="Close" style="margin:-1rem -1rem -1rem;">
      <span aria-hidden="true">&times;</span>
    </button>
  </div>
  <div class="modal-body pb-0 mb-0">

    <div class="row">
      <div class="form-group col-md-6">
        <label for="">Fecha de emision</label>
        <input type="date" class="form-control" id="fechaEmision" name="fechaEmision" value="<?php echo $carnet->fecha_emision;?>">
      </div>
      <div class="form-group col-md-6">
        <label for="">Fecha de vencimiento</label>
        <input type="date" class="form-control" id="fechaVencimiento" name="fechaVencimiento" value="<?php echo $carnet->fecha_vencimiento;?>">
      </div>
      <div class="form-group col-md-6">
        <label for="">Gestion</label>
        <input type="number" class="form-control" id="gestion" name="gestion" value="<?php echo $carnet->gestion;?>">
      </div>
      
      <div class="form-group col-md-6">
        <label for="">Estado</label>
        <select name="estadoCarnet" id="estadoCarnet" class="form-control">
          <option value="1" <?php if($carnet->estado_carnet==1):?>selected<?php endif;?>>Alta</option>
          <option value="0" <?php if($carnet->estado_carnet==0):?>selected<?php endif;?>>De Baja</option>
        </select>
      </div>
      
      <div class="row form-group col-md-12">
        <div class="col-sm-6">
          <div class="form-group">
            <label>Imagen <span class="text-muted">(Peso maximo 10MB - JPG,PNG)</span> </label>
            <div class="input-group">
              <div class="custom-file">
               
                <input type="file" class="custom-file-input" id="imgEstudiante" name="imgEstudiante" onchange="previsualizarEstu()" id="imgEstudiante" name="imgEstudiante">
                <input type="hidden" id="imgEstudianteActual" name="imgEstudianteActual" value="<?php echo $carnet->fotografia;?>">
                <label class="custom-file-label" for="imgEstudiante">Elegir archivo</label>
              </div>
              <div class="input-group-append">
                <span class="input-group-text">Subir</span>
              </div>
            </div>
          </div>
        </div>
        <div class="col-sm-6">
          <div class="form-group" style="text-align:center">
           <?php
                if($carnet->fotografia==""){
                  ?>
                  <img src="assets/dist/img/estudiante/user_default.jpg" alt="" width="150" class="img-thumbnail previsualizar">
                  <?php
                }else{
                  ?>
                   <img src="assets/dist/img/estudiante/<?php echo $carnet->fotografia;?>" alt="" width="150" class="img-thumbnail previsualizar">
                  <?php
                }
                ?>
            
          </div>
        </div>
      </div>

    </div>

    <div class="modal-footer justify-content-between">
      <button type="button" class="btn btn-default" data-dismiss="modal">Cancelar</button>
      <button type="submit" class="btn btn-primary">Guardar</button>
    </div>

  </div>
</form>

<script>
  $(function() {
    $('#FormEditCarnetEst').validate({
      rules: {
        fechaEmision: {
          required: true,
          minlength: 3
        },
        fechaVencimiento: {
          required: true,
          minlength: 3
        },
        gestion: {
          required: true
        }
      },
      errorElement: 'span',
      errorPlacement: function(error, element) {
        error.addClass('invalid-feedback');
        element.closest('.form-group').append(error);
      },
      highlight: function(element, errorClass, validClass) {
        $(element).addClass('is-invalid');
      },
      unhighlight: function(element, errorClass, validClass) {
        $(element).removeClass('is-invalid');
      }
    });
  });
</script>