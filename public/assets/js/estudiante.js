function MNuevoEstudiante() {
  $("#modal-default").modal("show");

  $.ajax({
      type: "GET",
      url: "/nuevo-estudiante",
      success: function (data) {
          $("#content-default").html(data);
      }
  });
}