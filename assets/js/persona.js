function MNuevoPersona() {
  $("#modal-xl").modal("show");

  $.ajax({
    type: "GET",
    url: "nuevo-persona",
    success: function (data) {
      $("#content-xl").html(data);
    }
  });
}

function MVerPersona(id) {
  $("#modal-lg").modal("show");

  $.ajax({
    type: "GET",
    url: "ver-persona/" + id,
    success: function (data) {
      $("#content-lg").html(data);
    }
  });
}

function MEliPersona(id) {
  $("#modal-default").modal("show");

  $.ajax({
    type: "GET",
    url: "eliminarPersona/" + id,
    success: function (data) {

      $("#content-default").html(data);
    }
  });
}

function EliminarPersona(id) {
  $("#modal-default").modal("show");

  $.ajax({
    type: "GET",
    url: "eliminar-persona/" + id,
    success: function (data) {
      if(data=="ok"){

        setTimeout(function() {
         location.reload()
        }, 1000);

      }

    }
  })
}

function MEditPersona(id) {
  $("#modal-xl").modal("show");

  $.ajax({
    type: "GET",
    url: "edit-persona/" + id,
    success: function (data) {
      $("#content-xl").html(data);
    }
  });
}

function MCarnetSeguroPer(id){
    $("#modal-lg").modal("show");

  $.ajax({
    type: "GET",
    url: "MFormCarnetPer/" + id,
    success: function (data) {
      $("#content-lg").html(data);
    }
  });
}

function MEditCarnetPer(cod){
  $("#modal-lg").modal("show");

  $.ajax({
    type: "GET",
    url: "MEditCarnetPer/" + cod,
    success: function (data) {
      $("#content-lg").html(data);
    }
  });
}

function previsualizar(){
  let imagen=document.getElementById("imgPersona").files[0]

  if(imagen["type"]!="image/png" && imagen["type"]!="image/jpeg"){

    $("#imgPersona").val("")

    Swal.fire({
      icon: 'error',
      showConfirmButton: false,
      title: 'El archivo no es JPG o PNG',
    })
  }else if(imagen["size"]>10000000){
    $("#imgPersona").val("")

    Swal.fire({
      icon: 'error',
      showConfirmButton: false,
      title: 'El archivo no puede ser mayor a 10MB',
    })

  }else{

    let datosImagen= new FileReader
    datosImagen.readAsDataURL(imagen)

    $(datosImagen).on("load", function(event){
      let rutaImagen=event.target.result
      $(".previsualizar").attr("src", rutaImagen)
    })
  }
}



