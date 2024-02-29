<form action="" id="FormRegEstudiante">
  <div class="modal-header bg-dark">
    <h4 class="modal-title">REGISTRO NUEVO ESTUDIANTE</h4>
    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
      <span aria-hidden="true">&times;</span>
    </button>
  </div>
  <div class="modal-body pb-0 mb-0">
    <div class="row">
      <div class="form-group col-md-12">
        <label for="">Seleccionar Estudiante</label>
        <select name="estudiante" id="estudiante" class="form-control">
          <option value="">-- Seleccionar --</option>
          <option value="Estudiante 1">Estudiante 1</option>
          <option value="Estudiante 2">Estudiante 2</option>
        </select>
      </div>
      <div class="form-group col-md-6">
        <label for="">Registro Universitario</label>
        <input type="text" class="form-control" id="runiversitario" name="runiversitario" placeholder="Nro de registro Universitario">
      </div>
      <div class="form-group col-md-6">
        <label for="">Estado Civil</label>
        <select name="estadocivil" id="estadocivil" class="form-control">
          <option value="">-- Seleccionar --</option>
          <option value="Soltero /a">Soltero /a</option>
          <option value="Casado /a">Casado /a</option>
          <option value="Divorciado /a">Divorciado /a</option>
          <option value="Viudo /a">Viudo /a</option>
        </select>
      </div>
      <div class="form-group col-md-6">
        <label for="">País</label>
        <input type="text" class="form-control" id="pais" name="pais" placeholder="Nombre País">
      </div>
      <div class="form-group col-md-6">
        <label for="">Universidad</label>
        <input type="text" class="form-control" id="universidad" name="universidad" placeholder="Nombre Universitario">
      </div>
    </div>

    <div class="form-group">
      <label for="">Observaciones</label>
      <textarea name="observacion" id="observacion" class="form-control"  cols="30" rows="4"></textarea>
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