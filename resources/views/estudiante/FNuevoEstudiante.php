<?php
$token = session()->token();
session_start();
?>
<form action="/crear-estudiante" method="POST" id="FormRegEstudiante">
  <input type="hidden" name="_token" value="<?php echo $token; ?>">
  <div class="modal-header bg-dark">
    <h4 class="modal-title">REGISTRO NUEVO ESTUDIANTE</h4>
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
      <div class="form-group col-md-3">
        <label for="">Cédula de Identidad</label>
        <input type="text" class="form-control" id="ci" name="ci" placeholder="Cédula de Identidad">
      </div>
      <div class="form-group col-md-2">
        <label for="">Complemento</label>
        <input type="text" class="form-control" id="comple" name="comple" placeholder="Complemento">
      </div>
      <div class="form-group col-md-4">
        <label for="">Lugar Emisión</label>
        <input type="text" class="form-control" id="emision" name="emision" placeholder="Lugar de Emisión">
      </div>
      <div class="form-group col-md-3">
        <label for="">Fecha Nac.</label>
        <input type="date" class="form-control" id="nacimiento" name="nacimiento">
      </div>
      <div class="form-group col-md-3">
        <label for="">R. U.</label>
        <input type="text" class="form-control" id="ru" name="ru" placeholder="Registro Universitario">
      </div>
      <div class="form-group col-md-2">
        <label for="">Curso</label>
        <input type="text" class="form-control" id="curso" name="curso" placeholder="Nombre de Curso">
      </div>

      <div class="form-group col-md-4">
        <label for="">Género</label>
        <select name="sexo" id="sexo" class="form-control">
          <option value="">-- Seleccionar --</option>
          <option value="Masculino">Masculino</option>
          <option value="Femenino">Femenino</option>
        </select>
      </div>

      <div class="form-group col-md-3">
        <label for="">Celular</label>
        <input type="text" class="form-control" id="celular" name="celular" placeholder="Telefono / Celular">
      </div>
      <div class="form-group col-md-3">
        <label for="">Estado Civil</label>
        <select name="estadoCivil" id="estadoCivil" class="form-control">
          <option value="">-- Seleccionar --</option>
          <option value="Soltero(a)">Soltero(a)</option>
          <option value="Casado(a)">Casado(a)</option>
          <option value="Divorciado(a)">Divorciado(a)</option>
          <option value="Viudo(a)">Viudo(a)</option>
        </select>
      </div>
      <div class="form-group col-md-5">
        <label for="">Universidad</label>
        <select name="universidad" id="universidad" class="form-control">
          <option value="">-- Seleccionar --</option>
          <option value="1">Universidad 1</option>
          <option value="2">Universidad 2</option>
          <option value="3">Universidad 3</option>
          <option value="4">Universidad 4</option>
        </select>
      </div>
      <div class="form-group col-md-4">
        <label for="">COD. Asegurado</label>
        <input type="text" class="form-control bg-secondary" id="codAsegurado" name="codAsegurado" placeholder="Código de Asegurado">
      </div>

      <div class="form-group col-md-3">
        <label for="">Pais</label>
        <input type="text" class="form-control" id="pais" name="pais" placeholder="Ingrese el Pais">
      </div>
      <div class="form-group col-md-3">
        <label for="">Departamento</label>
        <input type="text" class="form-control" id="departamento" name="departamento" placeholder="Ingrese el Departamento">
      </div>
      <div class="form-group col-md-3">
        <label for="">Provincia</label>
        <input type="text" class="form-control" id="provincia" name="provincia" placeholder="Ingrese la Provincia">
      </div>
      <div class="form-group col-md-3">
        <label for="">Localidad</label>
        <input type="text" class="form-control" id="localidad" name="localidad" placeholder="Ingrese la Localidad">
      </div>
      <div class="form-group col-md-12">
        <label for="">Dirección</label>
        <input type="text" class="form-control" id="direccion" name="direccion" placeholder="Ingrese su Dirección de domicilio Actual">
      </div>
      <div class="form-group col-md-12">
        <label for="">Observación</label>
        <textarea class="form-control" name="observacion" id="observacion" cols="30" rows="2" placeholder="Ingrese la observación"></textarea>
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
    $('#FormRegEstudiante').validate({
      rules: {
        nombres: {
          required: true,
          minlength: 3
        },
        ci: {
          required: true,
          minlength: 6
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