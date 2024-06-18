<?php
$token = session()->token();
session_start();
?>
<form action="crear-persona" method="POST" id="FormRegPersona">
  <input type="hidden" name="_token" value="<?php echo $token; ?>">
  <div class="modal-header bg-dark">
    <h4 class="modal-title">REGISTRO NUEVA PERSONA</h4>
    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
      <span aria-hidden="true">&times;</span>
    </button>
  </div>
  <div class="modal-body pb-0 mb-0">
    <div class="row">
      <div class="form-group col-md-4">
        <label for="">Nombres</label>
        <input type="text" class="form-control" id="nombres" name="nombres" placeholder="Ingrese sus nombres">
      </div>
      <div class="form-group col-md-4">
        <label for="">Apellido Paterno</label>
        <input type="text" class="form-control" id="ap_paterno" name="ap_paterno" placeholder="Apellido Paterno">
      </div>
      <div class="form-group col-md-4">
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
        <label for="">Factor</label>
        <input type="text" class="form-control" id="factor" name="factor" placeholder="Factor">
      </div>
      <div class="form-group col-md-2">
        <label for="">Grupo</label>
        <input type="text" class="form-control" id="grupo" name="grupo" placeholder="Grupo">
      </div>

      <div class="form-group col-md-4">
        <label for="">Género</label>
        <select name="sexo" id="sexo" class="form-control">
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
      <div class="form-group col-md-4">
        <label for="">Contacto de Referencia</label>
        <input type="text" class="form-control" id="referencia" name="referencia" placeholder="Contacto de referencia">
      </div>
      <div class="form-group col-md-5">
        <label for="">Dirección</label>
        <input type="text" class="form-control" id="direccion" name="direccion" placeholder="Ingrese su Dirección de domicilio Actual">
      </div>
      <div class="form-group col-md-3">
        <label for="">Pais</label>
        <select class="form-control" id="pais" name="pais">
          <option value="">-- Seleccionar --</option>
          <?php
          foreach($paises as $key=>$value){
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
          <option value="">-- Seleccionar --</option>
          <?php
          foreach($departamentos as $key=>$value){
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
          <option value="">-- Seleccionar --</option>
          <?php
          foreach($provincias as $key=>$value){
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
          <option value="">-- Seleccionar --</option>
          <?php
          foreach($localidades as $key=>$value){
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

    $('#FormRegPersona').validate({
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