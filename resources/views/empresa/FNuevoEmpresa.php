<?php
$token = session()->token();
session_start();
?>
<form action="regEmpresa" method="POST" id="FormRegEmpresa">
  <input type="hidden" name="_token" value="<?php echo $token; ?>">
  <div class="modal-header bg-dark">
    <h4 class="modal-title">REGISTRO NUEVA EMPRESA</h4>
    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
      <span aria-hidden="true">&times;</span>
    </button>
  </div>
  <div class="modal-body pb-0 mb-0">

    <div class="row">
      <div class="form-group col-md-6">
        <label for="">Nro. Patronal</label>
        <input type="number" class="form-control" id="numPatronal" name="numPatronal">
      </div>
      <div class="form-group col-md-6">
        <label for="">Nombre</label>
        <input type="text" class="form-control" id="nomEmpresa" name="nomEmpresa">
      </div>
      <div class="form-group col-md-6">
        <label for="">Telefono</label>
        <input type="text" class="form-control" id="telEmpresa" name="telEmpresa">
      </div>
      <div class="form-group col-md-6">
        <label for="">Direccion</label>
        <input type="text" class="form-control" id="dirEmpresa" name="dirEmpresa">
      </div>
      <div class="form-group col-md-6">
        <label for="">E-mail</label>
        <input type="email" class="form-control" id="emailEmpresa" name="emailEmpresa">
      </div>
      <div class="form-group col-md-6">
        <label for="">Observacion</label>
        <input type="text" class="form-control" id="observacion" name="observacion">
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
    $('#FormRegEmpresa').validate({
      rules: {
        numPatronal: {
          required: true,
          minlength: 3
        },
        nomEmpresa: {
          required: true,
          minlength: 3
        },
        emailEmpresa: {
          email: true 
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