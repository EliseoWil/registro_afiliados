<form action="" id="FormRegEstudiante">
  <div class="modal-header bg-dark">
    <h4 class="modal-title">REGISTRO NUEVA PERSONA</h4>
    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
      <span aria-hidden="true">&times;</span>
    </button>
  </div>
  <div class="modal-body pb-0 mb-0">
    <div class="row">
      
      <div class="form-group col-md-6">
        <label for="">Nombres</label>
        <input type="text" class="form-control" id="nombres" name="nombres" placeholder="Ingrese sus nombres">
      </div>

      <div class="form-group col-md-3">
        <label for="">Apellido Paterno</label>
        <input type="text" class="form-control" id="ap_paterno" name="ap_paterno" placeholder="Apellido Paterno">
      </div>
      <div class="form-group col-md-3">
        <label for="">Apellido Materno</label>
        <input type="text" class="form-control" id="ap_materno" name="ap_materno" placeholder="Apellido Paterno">
      </div>
      <div class="form-group col-md-4">
        <label for="">Cédula de Identidad</label>
        <input type="text" class="form-control" id="ci" name="ci" placeholder="Cédula de Identidad">
      </div>
      <div class="form-group col-md-2">
        <label for="">Complemento</label>
        <input type="text" class="form-control" id="complemento" name="complemento" placeholder="Complemento">
      </div>
      <div class="form-group col-md-4">
        <label for="">Lugar Emisión</label>
        <input type="text" class="form-control" id="emision" name="emision" placeholder="Lugar de Emisión">
      </div>
      <div class="form-group col-md-2">
        <label for="">Matricula</label>
        <input type="text" class="form-control" id="emision" name="emision" placeholder="Matrícula">
      </div>
      <div class="form-group col-md-3">
        <label for="">Fecha Nac.</label>
        <input type="date" class="form-control" id="nacimiento" name="nacimiento" placeholder="Matrícula">
      </div>
      <div class="form-group col-md-3">
        <label for="">Factor</label>
        <input type="text" class="form-control" id="factor" name="factor" placeholder="Factor">
      </div>
      <div class="form-group col-md-3">
        <label for="">Grupo</label>
        <input type="text" class="form-control" id="grupo" name="grupo" placeholder="Grupo">
      </div>

      <div class="form-group col-md-12">
        <label for="">Sexo</label>
        <select name="sexo" id="sexo" class="form-control">
          <option value="">-- Seleccionar --</option>
          <option value="Masculino">Masculino</option>
          <option value="Femenino">Femenino</option>
        </select>
      </div>

      <div class="form-group col-md-3">
        <label for="">Celular</label>
        <input type="text" class="form-control" id="celular" name="celular" placeholder="Grupo">
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
    $.validator.setDefaults({
      submitHandler: function() {
        RegEstudiante()
      }
    });
    $('#FormRegEstudiante').validate({
      rules: {
        estudiante: {
          required: true
        },
        runiversitario: {
          required: true,
          minlength: 3
        },
        perfilUsuario: {
          required: true
        },
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