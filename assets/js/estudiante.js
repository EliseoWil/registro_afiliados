function MNuevoEstudiante() {
  $("#modal-xl").modal("show");

  $.ajax({
      type: "GET",
      url: "nuevo-estudiante",
      success: function (data) {
          $("#content-xl").html(data);
      }
  });
}

function MVerEstudiante(id) {
  $("#modal-lg").modal("show");

  $.ajax({
      type: "GET",
      url: "ver-estudiante/" + id,
      success: function (data) {
          //$("#content-lg").html(data);
        console.log(data)
      }
  });
}

function MEliEstudiante(id) {
  $("#modal-default").modal("show");

  $.ajax({
      type: "GET",
      url: "eliminarEstudiante/" + id,
      success: function (data) {
          $("#content-default").html(data);
      }
  });
}

function EliminarEstudiante(id) {
  $("#modal-default").modal("show");

  $.ajax({
      type: "GET",
      url: "eliminar-estudiante/" + id,
      success: function (data) {
          $("#content-default").html(data);
      }
  });
}

function MEditEstudiante(id) {
  $("#modal-xl").modal("show");

  $.ajax({
      type: "GET",
      url: "edit-estudiante/" + id,
      success: function (data) {
          $("#content-xl").html(data);
      }
  });
}
