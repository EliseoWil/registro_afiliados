<?php
$token = session()->token();

?>
<form action="editEmpresa/<?php echo $Empresa["id_empresa"];?>" method="POST" id="FormEditEmpresa">
  <input type="hidden" name="_token" value="<?php echo $token; ?>">
  <div class="modal-header bg-dark">
    <h4 class="modal-title">ACTUALIZAR DATOS EMPRESA</h4>
    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
      <span aria-hidden="true">&times;</span>
    </button>
  </div>
  <div class="modal-body pb-0 mb-0">

    <div class="row">
      <div class="form-group col-md-6">
        <label for="">Nro. Patronal</label>
        <input type="number" class="form-control" id="numPatronal" name="numPatronal" value="<?php echo $Empresa["nro_patronal"];?>" readonly>
      </div>
      <div class="form-group col-md-6">
        <label for="">Nombre</label>
        <input type="text" class="form-control" id="nomEmpresa" name="nomEmpresa" value="<?php echo $Empresa["nombre_empresa"];?>">
      </div>
      <div class="form-group col-md-6">
        <label for="">Telefono</label>
        <input type="text" class="form-control" id="telEmpresa" name="telEmpresa" value="<?php echo $Empresa["telefono_empresa"];?>">
      </div>
      <div class="form-group col-md-6">
        <label for="">Direccion</label>
        <input type="text" class="form-control" id="dirEmpresa" name="dirEmpresa" value="<?php echo $Empresa["direccion_empresa"];?>">
      </div>
      <div class="form-group col-md-6">
        <label for="">E-mail</label>
        <input type="email" class="form-control" id="emailEmpresa" name="emailEmpresa" value="<?php echo $Empresa["email_empresa"];?>">
      </div>
      <div class="form-group col-md-6">
        <label for="">Observacion</label>
        <input type="text" class="form-control" id="observacion" name="observacion" value="<?php echo $Empresa["observacion"];?>">
      </div>
            <div class="form-group col-md-6">
        <label for="">Estado</label>
        <select name="estadoEmpresa" id="estadoEmpresa" class="form-control">
          <option value="1" <?php if($Empresa["estado_empresa"]==1):?> selected <?php endif;?>>Activo</option>
          <option value="0" <?php if($Empresa["estado_empresa"]==0):?> selected <?php endif;?>>Inactivo</option>
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
    $('#FormEditEmpresa').validate({
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