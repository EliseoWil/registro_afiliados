/*===================================
Modal formulario nuevo usuario
=====================================*/
function MNuevoUsuario() {
    $("#modal-default").modal("show");

    $.ajax({
        type: "GET",
        url: "/nuevo-usuario",
        success: function (data) {
            $("#content-default").html(data);
        }
    });
}

function MEliUsuario(id) {
    $("#modal-default").modal("show");

    $.ajax({
        type: "GET",
        url: "/eliminarUsuario/" + id,
        success: function (data) {
            $("#content-default").html(data);
        }
    });
}
function EliminarUsuario(id) {
    $("#modal-default").modal("show");

    $.ajax({
        type: "GET",
        url: "/eliminar-usuario/" + id,
        success: function (data) {
            $("#content-default").html(data);
        }
    });
}

function MEditUsuario(id) {
    $("#modal-lg").modal("show");

    $.ajax({
        type: "GET",
        url: "/edit-usuario/" + id,
        success: function (data) {
            $("#content-lg").html(data);
        }
    });
}



