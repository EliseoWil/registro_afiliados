<?php
$token = session()->token();
session_start();
?>
<form action="/editar-persona" method="POST" id="FormEditPersona">
  <input type="hidden" name="_token" value="<?php echo $token; ?>">
  <!-- <input type="hidden" name="_method" value="PUT"> -->

  <div class="modal-header bg-dark">
    <h4 class="modal-title">EDITAR DATOS DE PERSONA</h4>
    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
      <span aria-hidden="true">&times;</span>
    </button>
  </div>
  <div class="modal-body pb-0 mb-0">
    <div class="row">
      <input type="hidden" class="form-control" id="id_persona" name="id_persona" value="<?php echo $persona->id_persona ?>">
      <div class="form-group col-md-6">
        <label for="">Nombres</label>
        <input type="text" class="form-control" id="nombres" name="nombres" value="<?php echo $persona->nombre_persona ?>">
      </div>
      <div class="form-group col-md-3">
        <label for="">Apellido Paterno</label>
        <input type="text" class="form-control" id="ap_paterno" name="ap_paterno" value="<?php echo $persona->ap_paterno ?>">
      </div>
      <div class="form-group col-md-3">
        <label for="">Apellido Materno</label>
        <input type="text" class="form-control" id="ap_materno" name="ap_materno" value="<?php echo $persona->ap_materno ?>">
      </div>
      <div class="form-group col-md-3">
        <label for="">Cédula de Identidad</label>
        <input type="text" class="form-control" id="ci" name="ci" value="<?php echo $persona->ci_persona ?>">
      </div>
      <div class="form-group col-md-2">
        <label for="">Complemento</label>
        <input type="text" class="form-control" id="comple" name="comple" value="<?php echo $persona->complemento ?>">
      </div>
      <div class="form-group col-md-4">
        <label for="">Lugar Emisión</label>
        <input type="text" class="form-control" id="emision" name="emision" value="<?php echo $persona->lugar_emision ?>">
      </div>
      <div class="form-group col-md-3">
        <label for="">Fecha Nac.</label>
        <input type="date" class="form-control" id="nacimiento" name="nacimiento" value="<?php echo $persona->fecha_nacimiento ?>">
      </div>
      <div class="form-group col-md-3">
        <label for="">Factor</label>
        <input type="text" class="form-control" id="factor" name="factor" value="<?php echo $persona->factor ?>">
      </div>
      <div class="form-group col-md-2">
        <label for="">Grupo</label>
        <input type="text" class="form-control" id="grupo" name="grupo" value="<?php echo $persona->grupo ?>">
      </div>

      <div class="form-group col-md-4">
        <label for="">Género</label>
        <select name="sexo" id="sexo" class="form-control">
          <option value="<?php echo $persona->sexo ?>"><?php echo $persona->sexo ?></option>
          <option value="">-- Seleccionar --</option>
          <option value="Masculino">Masculino</option>
          <option value="Femenino">Femenino</option>
        </select>
      </div>

      <div class="form-group col-md-3">
        <label for="">Celular</label>
        <input type="text" class="form-control" id="celular" name="celular" value="<?php echo $persona->contactos_persona ?>">
      </div>
      <div class="form-group col-md-4">
        <label for="">Estado Civil</label>
        <select name="estadoCivil" id="estadoCivil" class="form-control">
          <option value="<?php echo $persona->estado_civil_pers ?>"><?php echo $persona->estado_civil_pers ?></option>
          <option value="">-- Seleccionar --</option>
          <option value="Soltero(a)">Soltero(a)</option>
          <option value="Casado(a)">Casado(a)</option>
          <option value="Divorciado(a)">Divorciado(a)</option>
          <option value="Viudo(a)">Viudo(a)</option>
        </select>
      </div>
      <div class="form-group col-md-4">
        <label for="">Contacto de Referencia</label>
        <input type="text" class="form-control" id="referencia" name="referencia" value="<?php echo $persona->datos_referencia ?>">
      </div>
      <div class="form-group col-md-4">
        <label for="">COD. Asegurado</label>
        <input type="text" class="form-control bg-secondary" id="codAsegurado" name="codAsegurado" value="<?php echo $persona->cod_asegurado ?>">
      </div>

      <div class="form-group col-md-3">
        <label for="">Pais</label>
        <input type="text" class="form-control" id="pais" name="pais" value="<?php echo $persona->pais ?>">
      </div>
      <div class="form-group col-md-3">
        <label for="">Departamento</label>
        <input type="text" class="form-control" id="departamento" name="departamento" value="<?php echo $persona->departamento ?>">
      </div>
      <div class="form-group col-md-3">
        <label for="">Provincia</label>
        <input type="text" class="form-control" id="provincia" name="provincia" value="<?php echo $persona->provincia ?>">
      </div>
      <div class="form-group col-md-3">
        <label for="">Localidad</label>
        <input type="text" class="form-control" id="localidad" name="localidad" value="<?php echo $persona->localidad ?>">
      </div>
      <div class="form-group col-md-12">
        <label for="">Dirección</label>
        <input type="text" class="form-control" id="direccion" name="direccion" value="<?php echo $persona->direccion ?>">
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

    $('#FormEditPersona').validate({
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