<?php
$token = session()->token();
session_start();
?>
<form action="editar-persona/<?php echo $persona["id_persona"];?>" method="POST" id="FormEditPersona">
  <input type="hidden" name="_token" value="<?php echo $token; ?>">

  <div class="modal-header bg-dark">
    <h4 class="modal-title">EDITAR DATOS DE BENEFICIARIO</h4>
    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
      <span aria-hidden="true">&times;</span>
    </button>
  </div>
  <div class="modal-body pb-0 mb-0">
    <div class="row">
      <input type="hidden" class="form-control" id="id_persona" name="id_persona" value="<?php echo $persona["id_persona"] ?>">
      <div class="form-group col-md-4">
        <label for="">Nombres</label>
        <input type="text" class="form-control" id="nombres" name="nombres" value="<?php echo $persona["nombre_persona"] ?>">
      </div>
      <div class="form-group col-md-4">
        <label for="">Apellido Paterno</label>
        <input type="text" class="form-control" id="ap_paterno" name="ap_paterno" value="<?php echo $persona["ap_paterno"] ?>">
      </div>
      <div class="form-group col-md-4">
        <label for="">Apellido Materno</label>
        <input type="text" class="form-control" id="ap_materno" name="ap_materno" value="<?php echo $persona["ap_materno"] ?>">
      </div>
      <div class="form-group col-md-3">
        <label for="">Cédula de Identidad</label>
        <input type="text" class="form-control" id="ci" name="ci" value="<?php echo $persona["ci_persona"] ?>">
      </div>
      <div class="form-group col-md-2">
        <label for="">Complemento</label>
        <input type="text" class="form-control" id="comple" name="comple" value="<?php echo $persona["complemento"] ?>">
      </div>
      <div class="form-group col-md-4">
        <label for="">Lugar Emisión</label>
        <input type="text" class="form-control" id="emision" name="emision" value="<?php echo $persona["lugar_emision"] ?>">
      </div>
      <div class="form-group col-md-3">
        <label for="">Fecha Nac.</label>
        <input type="date" class="form-control" id="nacimiento" name="nacimiento" value="<?php echo $persona["fecha_nacimiento"] ?>">
      </div>
      <div class="form-group col-md-3">
        <label for="">Factor</label>
        <input type="text" class="form-control" id="factor" name="factor" value="<?php echo $persona["factor"] ?>">
      </div>
      <div class="form-group col-md-2">
        <label for="">Grupo</label>
        <input type="text" class="form-control" id="grupo" name="grupo" value="<?php echo $persona["grupo"] ?>">
      </div>

      <div class="form-group col-md-4">
        <label for="">Género</label>
        <select name="sexo" id="sexo" class="form-control">
          <option value="Masculino" <?php if($persona["sexo"]=="Masculino"):?> selected <?php endif;?>>Masculino</option>
          <option value="Femenino" <?php if($persona["sexo"]=="Femenino"):?> selected <?php endif;?>>Femenino</option>
        </select>
      </div>

      <div class="form-group col-md-3">
        <label for="">Celular</label>
        <input type="text" class="form-control" id="celular" name="celular" value="<?php echo $persona["contactos_persona"] ?>">
      </div>
      <div class="form-group col-md-3">
        <label for="">Estado Civil</label>
        <select name="estadoCivil" id="estadoCivil" class="form-control">
          <option value="Soltero(a)" <?php if($persona["estado_civil_pers"]=="Soltero(a)"):?> selected <?php endif;?>>Soltero(a)</option>
          <option value="Casado(a)" <?php if($persona["estado_civil_pers"]=="Casado(a)"):?> selected <?php endif;?>>Casado(a)</option>
          <option value="Divorciado(a)" <?php if($persona["estado_civil_pers"]=="Divorciado(a)"):?> selected <?php endif;?>>Divorciado(a)</option>
          <option value="Viudo(a)" <?php if($persona["estado_civil_pers"]=="Viudo(a)"):?> selected <?php endif;?>>Viudo(a)</option>
        </select>
      </div>
      <div class="form-group col-md-4">
        <label for="">Contacto de Referencia</label>
        <input type="text" class="form-control" id="referencia" name="referencia" value="<?php echo $persona["datos_referencia"] ?>">
      </div>
      <div class="form-group col-md-5">
        <label for="">Dirección</label>
        <input type="text" class="form-control" id="direccion" name="direccion" value="<?php echo $persona["direccion"] ?>">
      </div>
      <div class="form-group col-md-3">
        <label for="">Pais</label>
        <select class="form-control" id="pais" name="pais">
          <?php
  foreach($paises as $key=>$value){
    if($value->nombre_pais==$persona["nombre_pais"]){
          ?>
          <option value="<?php echo $value->id_pais;?>" selected><?php echo $value->nombre_pais;?></option>
          <?php
    }
          ?>
          <option value="<?php echo $value->id_pais;?>"><?php echo $value->nombre_pais;?></option>
          <?php
  }
          ?>
        </select>
      </div>
      <div class="form-group col-md-3">
        <label for="">Departamento</label>
        <select class="form-control" id="departamento" name="departamento">

          <?php
          foreach($departamentos as $key=>$value){
            if($value->nombre_departamento==$persona["nombre_departamento"]){
          ?>
          <option value="<?php echo $value->id_departamento;?>" selected><?php echo $value->nombre_departamento;?></option>
          <?php
            }

          ?>
          <option value="<?php echo $value->id_departamento;?>"><?php echo $value->nombre_departamento;?></option>
          <?php
          }
          ?>
        </select>
      </div>
      <div class="form-group col-md-3">
        <label for="">Provincia</label>
        <select class="form-control" id="provincia" name="provincia">

          <?php
          foreach($provincias as $key=>$value){
            if($value->nombre_provincia==$persona["nombre_provincia"]){
          ?>
          <option value="<?php echo $value->id_provincia;?>" selected><?php echo $value->nombre_provincia;?></option>
          <?php
            }
          ?>
          <option value="<?php echo $value->id_provincia;?>"><?php echo $value->nombre_provincia;?></option>
          <?php
          }
          ?>
        </select>
      </div>
      <div class="form-group col-md-3">
        <label for="">Localidad</label>
        <select class="form-control" id="localidad" name="localidad">

          <?php
          foreach($localidades as $key=>$value){
            if($value->nombre_localidad==$persona["nombre_localidad"]){
          ?>
          <option value="<?php echo $value->id_localidad;?>" selected><?php echo $value->nombre_localidad;?></option>
          <?php
            }
          ?>
          <option value="<?php echo $value->id_localidad;?>"><?php echo $value->nombre_localidad;?></option>
          <?php
          }
          ?>
        </select>
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
        ap_paterno: {
          required: true,
          minlength: 3
        },
        ap_materno: {
          required: true,
          minlength: 3
        },
        ci: {
          required: true,
          minlength: 6
        },
        pais: {
          required: true
        },
        localidad: {
          required: true
        },
        provincia: {
          required: true
        },
        departamento: {
          required: true
        },
        nacimiento: {
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