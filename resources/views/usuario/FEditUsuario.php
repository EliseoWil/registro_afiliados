<?php
$token = session()->token();
session_start();
?>


<div class="modal-header bg-dark">
  <h4 class="modal-title"> REGISTRO NUEVO USUARIO </h4>
  <button type="button" class="close" data-dismiss="modal" aria-label="Close">
    <span aria-hidden="true">&times;</span>
  </button>
</div>
<form id="FormEditUsuario" action="editar-usuario" method="POST">
  <div class="modal-body">
    <input type="hidden" name="_token" value="<?php echo $token; ?>">
    <div class="row">
      <div class="form-group col-md-12">
        <label>Nombre Usuario</label>
        <input type="text" class="form-control" id="usuario" name="usuario" value="<?php echo $usuario->nombre_usuario ?>">
        <input type="hidden" class="form-control" id="id_usuario" name="id_usuario" value="<?php echo $usuario->id_usuario ?>">
      </div>

      <div class="form-group col-md-6">
        <label>Login Usuario</label>
        <input type="text" class="form-control"  id="login" name="login" value="<?php echo $usuario->login_usuario ?>">
      </div>

      <div class="form-group col-md-6">
        <label>Rol de Usuario</label>
        <select name="rolUsuario" id="rolUsuario" class="form-control">
          <option value="Administrador" <?php if($usuario->rol_usuario=="Administrador"):?>selected<?php endif;?>>Administrador</option>
          <option value="Consultor" <?php if($usuario->rol_usuario=="Consultor"):?>selected<?php endif;?>>Consultor</option>
          <option value="Gestor" <?php if($usuario->rol_usuario=="Gestor"):?>selected<?php endif;?>>Gestor</option>
        </select>
      </div>

      <div class="form-group col-md-6">
        <label>Password</label>
        <input type="password" class="form-control" id="password" name="password" disabled>
      </div>

      <div class="form-group col-md-6">
        <label>Repetir password</label>
        <input type="password" class="form-control" id="password2" name="password2" disabled>
      </div>

      <div class="form-group ml-2">
        <input type="checkbox" id="activarCampos" onchange="toggleCampos()"> 
        <label for="activarCampos"><i class="fa fa-key" aria-hidden="true"></i> <span class="text-sm text-blue">(Habilitar el cuadro para actualizar contraseñas)</span></label>
      </div>
    </div>

    <div class="modal-footer justify-content-between">
      <button type="button" class="btn btn-default" data-dismiss="modal">Cerrar</button>
      <button type="submit" class="btn btn-primary">Guardar</button>
    </div>
  </div>
  <!-- /.card-body -->
</form>

<script>
  function toggleCampos() {
    var activarCamposCheckbox = document.getElementById("activarCampos");
    document.getElementById("password").disabled = !activarCamposCheckbox.checked;
    document.getElementById("password2").disabled = !activarCamposCheckbox.checked;
  }
</script>

<script>
  $(function() {
    $.validator.setDefaults({
    });

    $(document).ready(function() {
      $("#FormEditUsuario").validate({
        rules: {
          login: {
            required: true,
            minlength: 5
          },
          usuario: {
            required: true,
            minlength: 3
          },
          password: {
            required: true,
            minlength: 8
          },
          password2: {
            required: true,
            minlength: 8,
            equalTo: "#password"
          },
          rolUsuario: "required"
        },
        messages: {
          password2: {
            equalTo: "Las contraseñas no coinciden...!!!!"
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
  });
</script>
