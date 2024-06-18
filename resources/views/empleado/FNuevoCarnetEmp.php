<?php
$token = session()->token();
session_start();
?>
<form action="regCarnetEmp/<?php echo $empleado->cod_asegurado;?>" method="POST" id="FormRegCarnetEmp" enctype="multipart/form-data">
  <input type="hidden" name="_token" value="<?php echo $token; ?>">
  <div class="modal-header bg-dark flex">
    <h4 class="modal-title">REGISTRAR CARNET DE SEGURO PARA EMPLEADO </h4>
    <h4 class="modal-title">COD.: <?php echo $empleado->cod_asegurado;?></h4>
    <button type="button" class="close" data-dismiss="modal" aria-label="Close" style="margin:-1rem -1rem -1rem;">
      <span aria-hidden="true">&times;</span>
    </button>
  </div>
  <div class="modal-body pb-0 mb-0">

    <div class="row">
      <div class="form-group col-md-4">
        <label for="">Fecha de emision</label>
        <input type="date" class="form-control" id="fechaEmision" name="fechaEmision">
      </div>
      <div class="form-group col-md-4">
        <label for="">Fecha de vencimiento</label>
        <input type="date" class="form-control" id="fechaVencimiento" name="fechaVencimiento">
      </div>
      <div class="form-group col-md-4">
        <label for="">Gestion</label>
        <input type="number" class="form-control" id="gestion" name="gestion">
      </div>
      <div class="row form-group col-md-12">
        <div class="col-sm-6">
          <div class="form-group">
            <label>Imagen <span class="text-muted">(Peso maximo 10MB - JPG,PNG)</span> </label>
            <div class="input-group">
              <div class="custom-file">
                <input type="file" class="custom-file-input" id="imgEmpleado" name="imgEmpleado" onchange="previsualizar()">
                <label class="custom-file-label" for="imgEmpleado">Elegir archivo</label>
              </div>
              <div class="input-group-append">
                <span class="input-group-text">Subir</span>
              </div>
            </div>
          </div>
        </div>
        <div class="col-sm-6">
          <div class="form-group" style="text-align:center">
            <img src="assets/dist/img/user_default.jpg" alt="" width="150" class="img-thumbnail previsualizar">
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
    $('#FormRegCarnetEmp').validate({
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