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

<div class="modal-body">
  <form id="FormRegUsuario" action="crear-usuario" method="POST">
    <input type="hidden" name="_token" value="<?php echo $token; ?>">
    <div class="row">
      <div class="form-group col-md-12">
        <label>Nombre Usuario</label>
        <input type="text" class="form-control" id="usuario" name="usuario">
      </div>

      <div class="form-group col-md-6">
        <label>Login Usuario</label>
        <input type="text" class="form-control" id="login" name="login">
      </div>

      <div class="form-group col-md-6">
        <label>Rol de Usuario</label>
        <select name="rolUsuario" id="rolUsuario" class="form-control">
          <option value="null">Seleccionar</option>
          <option value="Administrador">Administrador</option>
          <option value="Consultor">Consultor</option>
          <option value="Gestor">Gestor</option>
        </select>
      </div>

      <div class="form-group col-md-6">
        <label>Password</label>
        <input type="password" class="form-control" id="password" name="password">
      </div>
      <div class="form-group col-md-6">
        <label>Repetir password</label>
        <input type="password" class="form-control" id="password2" name="password2">
      </div>
    </div>

    <div class="modal-footer justify-content-between">
      <button type="button" class="btn btn-default" data-dismiss="modal">Cerrar</button>
      <button type="submit" class="btn btn-primary">Guardar</button>
    </div>
    <!-- /.card-body -->
  </form>
</div>


<script>
  $(function() {
    $.validator.setDefaults({
    });

    $(document).ready(function() {
      $("#FormRegUsuario").validate({
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
