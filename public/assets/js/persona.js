function MNuevoPersona() {
    $("#modal-lg").modal("show");

    $.ajax({
        type: "GET",
        url: "/nuevo-persona",
        success: function (data) {
            $("#content-lg").html(data);
        }
    });
}

function MVerPersona(id) {
    $("#modal-lg").modal("show");

    $.ajax({
        type: "GET",
        url: "/ver-persona/" + id,
        success: function (data) {
            $("#content-lg").html(data);
        }
    });
}

function MEliPersona(id) {
    $("#modal-default").modal("show");

    $.ajax({
        type: "GET",
        url: "/eliminarPersona/" + id,
        success: function (data) {
            $("#content-default").html(data);
        }
    });
}

function EliminarPersona(id) {
    $("#modal-default").modal("show");

    $.ajax({
        type: "GET",
        url: "/eliminar-persona/" + id,
        success: function (data) {
            $("#content-default").html(data);
        }
    });
}

function MEditPersona(id) {
    $("#modal-lg").modal("show");

    $.ajax({
        type: "GET",
        url: "/edit-persona/" + id,
        success: function (data) {
            $("#content-lg").html(data);
        }
    });
}

function editarPersona(id) {
    $("#modal-lg").modal("show");

    console.log(id);
    /* $.ajax({
        type: "GET",
        url: "/editar-persona/" + id,
        success: function (data) {
            $("#content-lg").html(data);
        }
    }); */
}



