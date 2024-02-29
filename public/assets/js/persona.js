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