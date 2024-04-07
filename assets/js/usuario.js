/*===================================
Modal formulario nuevo usuario
=====================================*/
function MNuevoUsuario() {
  $("#modal-default").modal("show");

  $.ajax({
    type: "GET",
    url: "nuevo-usuario",
    success: function (data) {
      $("#content-default").html(data);
    }
  });
}

function MEliUsuario(id) {
  $("#modal-default").modal("show");

  $.ajax({
    type: "GET",
    url: "eliminarUsuario/" + id,
    success: function (data) {
      $("#content-default").html(data);
    }
  });
}
function EliminarUsuario(id) {

  $.ajax({
    type: "GET",
    url: "eliminar-usuario/" + id,
    success: function (data) {
      if(data=="ok"){
        Swal.fire({
          icon: "success",
          showConfirmButton: false,
          title: "El Registro fue eliminado exitosamente",
          timer: 2000,
        });
        setTimeout(function() {
          location.reload()
        }, 2000);
      }

    }
  });
}

function MEditUsuario(id) {
  $("#modal-lg").modal("show");

  $.ajax({
    type: "GET",
    url: "edit-usuario/" + id,
    success: function (data) {
      $("#content-lg").html(data);
    }
  });
}



