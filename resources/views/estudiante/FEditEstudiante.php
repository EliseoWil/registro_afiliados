<?php
$token = session()->token();
session_start();
?>
<form action="/editar-estudiante" method="POST" id="FormEditEstudiante">
  <input type="hidden" name="_token" value="<?php echo $token; ?>">
  <div class="modal-header bg-dark">
    <h4 class="modal-title">REGISTRO NUEVO ESTUDIANTE</h4>
    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
      <span aria-hidden="true">&times;</span>
    </button>
  </div>
  <div class="modal-body pb-0 mb-0">
    <div class="row">
      <input type="hidden" class="form-control" id="id_estudiante" name="id_estudiante" value="<?php echo $estudiante->id_estudiante ?>">
      <div class="form-group col-md-6">
        <label for="">Nombres</label>
        <input type="text" class="form-control" id="nombres" name="nombres" value="<?php echo $estudiante->nombre_estu ?>">
      </div>
      <div class="form-group col-md-3">
        <label for="">Apellido Paterno</label>
        <input type="text" class="form-control" id="ap_paterno" name="ap_paterno" value="<?php echo $estudiante->ap_paterno_estu ?>">
      </div>
      <div class="form-group col-md-3">
        <label for="">Apellido Materno</label>
        <input type="text" class="form-control" id="ap_materno" name="ap_materno" value="<?php echo $estudiante->ap_materno_estu ?>">
      </div>
      <div class="form-group col-md-3">
        <label for="">Cédula de Identidad</label>
        <input type="text" class="form-control" id="ci" name="ci" value="<?php echo $estudiante->ci_estudiante ?>">
      </div>
      <div class="form-group col-md-2">
        <label for="">Complemento</label>
        <input type="text" class="form-control" id="comple" name="comple" value="<?php echo $estudiante->complemento ?>">
      </div>
      <div class="form-group col-md-4">
        <label for="">Lugar Emisión</label>
        <input type="text" class="form-control" id="emision" name="emision" value="<?php echo $estudiante->lugar_emision ?>">
      </div>
      <div class="form-group col-md-3">
        <label for="">Fecha Nac.</label>
        <input type="date" class="form-control" id="nacimiento" name="nacimiento" value="<?php echo $estudiante->fecha_nacimiento ?>">
      </div>
      <div class="form-group col-md-3">
        <label for="">R. U.</label>
        <input type="text" class="form-control" id="ru" name="ru" value="<?php echo $estudiante->ru ?>">
      </div>
      <div class="form-group col-md-2">
        <label for="">Curso</label>
        <input type="text" class="form-control" id="curso" name="curso" value="<?php echo $estudiante->curso ?>">
      </div>

      <div class="form-group col-md-4">
        <label for="">Género</label>
        <select name="sexo" id="sexo" class="form-control">
          <option value="<?php echo $estudiante->sexo_estu ?>"><?php echo $estudiante->sexo_estu ?></option>
          <option value="">-- Seleccionar --</option>
          <option value="Masculino">Masculino</option>
          <option value="Femenino">Femenino</option>
        </select>
      </div>

      <div class="form-group col-md-3">
        <label for="">Celular</label>
        <input type="text" class="form-control" id="celular" name="celular" value="<?php echo $estudiante->contactos_estu ?>">
      </div>
      <div class="form-group col-md-3">
        <label for="">Estado Civil</label>
        <select name="estadoCivil" id="estadoCivil" class="form-control">
          <option value="<?php echo $estudiante->estado_civil ?>"><?php echo $estudiante->estado_civil ?></option>
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
          <option value="<?php echo $estudiante->id_universidad ?>"><?php echo $estudiante->id_universidad ?></option>
          <option value="">-- Seleccionar --</option>
          <option value="1">Universidad 1</option>
          <option value="2">Universidad 2</option>
          <option value="3">Universidad 3</option>
          <option value="4">Universidad 4</option>
        </select>
      </div>
      <div class="form-group col-md-4">
        <label for="">COD. Asegurado</label>
        <input type="text" class="form-control bg-secondary" id="codAsegurado" name="codAsegurado" value="<?php echo $estudiante->cod_asegurado ?>">
      </div>

      <div class="form-group col-md-3">
        <label for="">Pais</label>
        <input type="text" class="form-control" id="pais" name="pais" value="<?php echo $estudiante->pais ?>">
      </div>
      <div class="form-group col-md-3">
        <label for="">Departamento</label>
        <input type="text" class="form-control" id="departamento" name="departamento" value="<?php echo $estudiante->departamento ?>">
      </div>
      <div class="form-group col-md-3">
        <label for="">Provincia</label>
        <input type="text" class="form-control" id="provincia" name="provincia" value="<?php echo $estudiante->provincia ?>">
      </div>
      <div class="form-group col-md-3">
        <label for="">Localidad</label>
        <input type="text" class="form-control" id="localidad" name="localidad" value="<?php echo $estudiante->localidad ?>">
      </div>
      <div class="form-group col-md-12">
        <label for="">Dirección</label>
        <input type="text" class="form-control" id="direccion" name="direccion" value="<?php echo $estudiante->direccion_estu ?>">
      </div>
      <div class="form-group col-md-12">
        <label for="">Observación</label>
        <textarea class="form-control" name="observacion" id="observacion" cols="30" rows="2"><?php echo $estudiante->observacion ?></textarea>
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
    $('#FormEditEstudiante').validate({
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