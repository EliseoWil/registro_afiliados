<?php
$token = session()->token();
session_start();
?>
<form action="editar-empleado" method="POST" id="FormEditEmpleado">
  <input type="hidden" name="_token" value="<?php echo $token; ?>">
  <div class="modal-header bg-dark">
    <h4 class="modal-title">ACTUALIZAR EMPLEADO</h4>
    <h4 class="modal-title">COD.: <?php echo $empleado->cod_asegurado;?></h4>
    <button type="button" class="close" data-dismiss="modal" aria-label="Close" style="margin:-1rem -1rem -1rem;">
      <span aria-hidden="true">&times;</span>
    </button>
  </div>
  <div class="modal-body pb-0 mb-0">

    <div class="row">
      <div class="form-group col-md-4">
        <label for="">Nombre(s)</label>
        <input type="text" class="form-control" id="nombres" name="nombres" placeholder="Ingrese sus nombres" value="<?php echo $empleado->nombre_empleado;?>">
        <input type="hidden" id="idEmpleado" name="idEmpleado" value="<?php echo $empleado->id_empleado;?>">
      </div>
      <div class="form-group col-md-4">
        <label for="">Apellido Paterno</label>
        <input type="text" class="form-control" id="ap_paterno" name="ap_paterno" placeholder="Apellido Paterno" value="<?php echo $empleado->ap_paterno;?>">
      </div>
      <div class="form-group col-md-4">
        <label for="">Apellido Materno</label>
        <input type="text" class="form-control" id="ap_materno" name="ap_materno" placeholder="Apellido Paterno" value="<?php echo $empleado->ap_materno;?>">
      </div>
      <div class="form-group col-md-3">
        <label for="">Cédula de Identidad</label>
        <input type="text" class="form-control" id="ci" name="ci" placeholder="Cédula de Identidad" value="<?php echo $empleado->ci_empleado;?>">
      </div>
      <div class="form-group col-md-3">
        <label for="">Complemento</label>
        <input type="text" class="form-control" id="comple" name="comple" placeholder="Complemento" value="<?php echo $empleado->complemento;?>">
      </div>
      <div class="form-group col-md-3">
        <label for="">Lugar Emisión</label>
        <input type="text" class="form-control" id="emision" name="emision" placeholder="Lugar de Emisión" value="<?php echo $empleado->lugar_emision;?>">
      </div>
      <div class="form-group col-md-3">
        <label for="">Fecha Nac.</label>
        <input type="date" class="form-control" id="nacimiento" name="nacimiento" value="<?php echo $empleado->fecha_nacimiento;?>">
      </div>
      <div class="form-group col-md-3">
        <label for="">Cargo</label>
        <input type="text" class="form-control" id="cargo" name="cargo" value="<?php echo $empleado->cargo;?>">
      </div>
      <div class="form-group col-md-3">
        <label for="">Profesion</label>
        <input type="text" class="form-control" id="profesion" name="profesion" value="<?php echo $empleado->profesion;?>">
      </div>
      <div class="form-group col-md-3">
        <label for="">Salario</label>
        <input type="number" class="form-control" id="salario" name="salario" value="<?php echo $empleado->salario;?>">
      </div>
      <div class="form-group col-md-3">
        <label for="">Género</label>
        <select name="sexo" id="sexo" class="form-control">
          <option value="Masculino" <?php if($empleado->sexo=="Masculino"):?>selected<?php endif;?>>Masculino</option>
          <option value="Femenino" <?php if($empleado->sexo=="Femenino"):?>selected<?php endif;?>>Femenino</option>
        </select>
      </div>
      <div class="form-group col-md-3">
        <label for="">Fecha de ingreso</label>
        <input type="date" class="form-control" id="fechaIngreso" name="fechaIngreso" value="<?php echo $empleado->fecha_ingreso_laboral;?>">
      </div>

      <div class="form-group col-md-6">
        <label for="">Contactos</label>
        <input type="text" class="form-control" id="contacto" name="contacto" value="<?php echo $empleado->contactos_empleado;?>">
      </div>
      <div class="form-group col-md-3">
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
  if($empleado->estado_civil==$valor){
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
      <div class="form-group col-md-3">
        <label for="">Empresa</label>
        <select name="empresa" id="empresa" class="form-control">
          <option value="">-- Seleccionar --</option>
          <?php
          foreach($empresas as $key=>$value){
            if($empleado->id_empresa==$value->id_empresa){
          ?>
          <option value="<?php echo $value->id_empresa;?>" selected><?php echo $value->nombre_empresa;?></option>
          <?php
            }else{
          ?>
          <option value="<?php echo $value->id_empresa;?>"><?php echo $value->nombre_empresa;?></option>
          <?php
            }
          }
          ?>
        </select>
      </div>

      <div class="form-group col-md-3">
        <label for="">Pais</label>
        <select class="form-control" id="pais" name="pais">
          <option value="">-- Seleccionar --</option>

          <?php
          foreach($paises as $key=>$value){
            if($empleado->pais==$value->id_pais){
          ?>
          <option value="<?php echo $value->id_pais;?>" selected><?php echo $value->nombre_pais;?></option>
          <?php
            }else{
          ?>
          <option value="<?php echo $value->id_pais;?>"><?php echo $value->nombre_pais;?></option>
          <?php
            }
          }
          ?>
        </select>
      </div>
      <div class="form-group col-md-3">
        <label for="">Departamento</label>
        <select class="form-control" id="departamento" name="departamento">
          <option value="">-- Seleccionar --</option>

          <?php
          foreach($departamentos as $key=>$value){
            if($empleado->departamento==$value->id_departamento){
          ?>
          <option value="<?php echo $value->id_departamento;?>" selected><?php echo $value->nombre_departamento;?></option>
          <?php
            }else{
          ?>
          <option value="<?php echo $value->id_departamento;?>"><?php echo $value->nombre_departamento;?></option>
          <?php
            }
          }
          ?>
        </select>
      </div>
      <div class="form-group col-md-3">
        <label for="">Provincia</label>
        <select class="form-control" id="provincia" name="provincia">
          <option value="">-- Seleccionar --</option>

          <?php
          foreach($provincias as $key=>$value){
            if($empleado->provincia==$value->id_provincia){
          ?>
          <option value="<?php echo $value->id_provincia;?>" selected><?php echo $value->nombre_provincia;?></option>
          <?php
            }else{
          ?>
          <option value="<?php echo $value->id_provincia;?>"><?php echo $value->nombre_provincia;?></option>
          <?php
            }
          }
          ?>
        </select>
      </div>

      <div class="form-group col-md-3">
        <label for="">Localidad</label>
        <select class="form-control" id="localidad" name="localidad">
          <option value="">-- Seleccionar --</option>
          <?php
          foreach($localidades as $key=>$value){
            if($empleado->localidad==$value->id_localidad){
          ?>
          <option value="<?php echo $value->id_localidad;?>" selected><?php echo $value->nombre_localidad;?></option>
          <?php
            }else{
          ?>
          <option value="<?php echo $value->id_localidad;?>"><?php echo $value->nombre_localidad;?></option>
          <?php
            }
          }
          ?>
        </select>
      </div>
      <div class="form-group col-md-6">
        <label for="">Dirección</label>
        <input type="text" class="form-control" id="direccion" name="direccion" placeholder="Ingrese su Dirección de domicilio Actual" value="<?php echo $empleado->direccion;?>">
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
    $('#FormEditEmpleado').validate({
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
        empresa: {
          required: true
        },
        cargo:{
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