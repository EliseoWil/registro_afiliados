<?php
$token = session()->token();
session_start();
?>
<form action="editar-estudiante" method="POST" id="FormEditEstudiante">
  <input type="hidden" name="_token" value="<?php echo $token; ?>">
  <div class="modal-header bg-dark flex">
    <h4 class="modal-title">ACTUALIZAR INFORMACION ESTUDIANTE </h4>
    <h4 class="modal-title">COD.: <?php echo $estudiante->cod_asegurado;?></h4>
    <button type="button" class="close" data-dismiss="modal" aria-label="Close" style="margin:-1rem -1rem -1rem;">
      <span aria-hidden="true">&times;</span>
    </button>
  </div>
  <div class="modal-body pb-0 mb-0">

    <div class="row">
      <input type="hidden" id="id_estudiante" name="id_estudiante" value="<?php echo $estudiante->id_estudiante ?>">
      <input type="hidden" id="codAsegurado" name="codAsegurado" value="<?php echo $estudiante->cod_asegurado ?>">
      <div class="form-group col-md-4">
        <label for="">Nombres</label>
        <input type="text" class="form-control" id="nombres" name="nombres" value="<?php echo $estudiante->nombre_estu ?>">
      </div>
      <div class="form-group col-md-4">
        <label for="">Apellido Paterno</label>
        <input type="text" class="form-control" id="ap_paterno" name="ap_paterno" value="<?php echo $estudiante->ap_paterno_estu ?>">
      </div>
      <div class="form-group col-md-4">
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
        <input type="text" class="form-control" id="ru" name="ru" value="<?php echo $estudiante->ru ?>" readonly>
      </div>
      <div class="form-group col-md-3">
        <label for="">Curso</label>
        <input type="text" class="form-control" id="curso" name="curso" value="<?php echo $estudiante->curso ?>">
      </div>

      <div class="form-group col-md-3">
        <label for="">Género</label>
        <select name="sexo" id="sexo" class="form-control">
          <option value="Masculino" <?php if($estudiante->sexo_estu=="Masculino"):?>selected<?php endif;?>>Masculino</option>
          <option value="Femenino" <?php if($estudiante->sexo_estu=="Femenino"):?>selected<?php endif;?>>Femenino</option>
        </select>
      </div>

      <div class="form-group col-md-3">
        <label for="">Celular</label>
        <input type="text" class="form-control" id="celular" name="celular" value="<?php echo $estudiante->contactos_estu ?>">
      </div>
      <div class="form-group col-md-4">
        <label for="">Estado Civil</label>
        <?php
  $estado_civil=array(
  "1"=>"Soltero(a)",
  "2"=>"Casado(a)",
  "3"=>"Divorciado(a)",
  "4"=>"Viudo(a)"
);
        ?>
        <select name="estadoCivil" id="estadoCivil" class="form-control">
          <?php foreach($estado_civil as $key=>$valor){
  if($estudiante->estado_civil==$valor){
          ?>
          <option value="<?php echo $key;?>" selected><?php echo $valor;?></option>
          <?php
  }else{
          ?>
          <option value="<?php echo $key;?>"><?php echo $valor;?></option>
          <?php
  }
}?>

        </select>
      </div>
      <div class="form-group col-md-4">
        <label for="">Universidad</label>
        <select name="universidad" id="universidad" class="form-control">
          <?php
          foreach($universidades as $key=>$value){
            if($estudiante->id_universidad==$value->id_universidad){
          ?>
          <option value="<?php echo $value->id_universidad;?>" selected><?php echo $value->nombre_universidad;?></option>
          <?php
            }else{
          ?>
          <option value="<?php echo $value->id_universidad;?>"><?php echo $value->nombre_universidad;?></option>
          <?php
            }

          }
          ?>
        </select>
      </div>

      <div class="form-group col-md-4">
        <label for="">Pais</label>
        <select name="pais" id="pais" class="form-control">
          <?php
          foreach($paises as $paisKey=>$paisValue){
            if($estudiante->id_pais==$paisValue->id_pais){
          ?>
          <option value="<?php echo $paisValue->id_pais;?>" selected><?php echo $paisValue->nombre_pais;?></option>
          <?php
            }else{
          ?>
          <option value="<?php echo $paisValue->id_pais;?>"><?php echo $paisValue->nombre_pais;?></option>
          <?php
            }
          }

          ?>
        </select>
      </div>
      <div class="form-group col-md-4">
        <label for="">Departamento</label>
        <select name="departamento" id="departamento" class="form-control">
          <?php
          foreach($departamentos as $departamentoKey=>$departamentoValue){
            if($estudiante->departamento==$departamentoValue->id_departamento){
          ?>
          <option value="<?php echo $departamentoValue->id_departamento;?>" selected><?php echo $departamentoValue->nombre_departamento;?></option>
          <?php
            }else{
          ?>
          <option value="<?php echo $departamentoValue->id_departamento;?>"><?php echo $departamentoValue->nombre_departamento;?></option>
          <?php
            }
          }

          ?>
        </select>

      </div>
      <div class="form-group col-md-4">
        <label for="">Provincia</label>
        <select name="provincia" id="provincia" class="form-control">
          <?php
          foreach($provincias as $provinciaKey=>$provinciaValue){
            if($estudiante->provincia==$provinciaValue->id_provincia){
          ?>
          <option value="<?php echo $provinciaValue->id_provincia;?>" selected><?php echo $provinciaValue->nombre_provincia;?></option>
          <?php
            }else{
          ?>
          <option value="<?php echo $provinciaValue->id_provincia;?>"><?php echo $provinciaValue->nombre_provincia;?></option>
          <?php
            }
          }

          ?>
        </select>
      </div>
      <div class="form-group col-md-4">
        <label for="">Localidad</label>
        <select name="localidad" id="localidad" class="form-control">
          <?php
          foreach($localidades as $localidadKey=>$localidadValue){
            if($estudiante->localidad==$localidadValue->id_localidad){
          ?>
          <option value="<?php echo $localidadValue->id_localidad;?>" selected><?php echo $localidadValue->nombre_localidad;?></option>
          <?php
            }else{
          ?>
          <option value="<?php echo $localidadValue->id_localidad;?>"><?php echo $localidadValue->nombre_localidad;?></option>
          <?php
            }
          }

          ?>
        </select>

      </div>
      <div class="form-group col-md-6">
        <label for="">Dirección</label>
        <input type="text" class="form-control" id="direccion" name="direccion" value="<?php echo $estudiante->direccion_estu ?>">
      </div>
      <div class="form-group col-md-6">
        <label for="">Observación</label>
        <textarea class="form-control" name="observacion" id="observacion" cols="30" rows="2"><?php echo $estudiante->observacion ?></textarea>
      </div>
    </div>

    <div class="modal-footer justify-content-between">

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
        ap_paterno: {
          required: true,
          minlength: 3
        },
        ap_materno: {
          required: true,
          minlength: 3
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
        universidad: {
          required: true
        },
        departamento: {
          required: true
        },
        ci: {
          required: true,
          minlength: 6
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