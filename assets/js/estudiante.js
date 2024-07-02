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
      $("#content-lg").html(data);
    }
  });
}

function MEliEstudiante(id) {

  Swal.fire({
    title:"Estas seguro de eliminar este estudiante?",
    showDenyButton:true,
    showCancelButton:false,
    confirmButtonText:'Confirmar',
    denyButtonText:'Cancelar'
  }).then((result)=>{
    if(result.isConfirmed){
      $.ajax({
        type:"GET",
        url: "eliminarEstudiante/" + id,
        success:function(data){

          if(data=="ok"){
            location.reload()
          }else{
            Swal.fire({
              icon: 'error',
              showConfirmButton: false,
              title: 'Error',
              text:'El estudiante no puede ser eliminado',
              timer: 1000
            })
          }
        }
      })
    }
  })
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

function MCarnetSeguroEst(id){
  $("#modal-lg").modal("show");

  $.ajax({
    type: "GET",
    url: "MFormCarnet/" + id,
    success: function (data) {
      $("#content-lg").html(data);
    }
  });
}

function MEditCarnetEst(cod){
  $("#modal-lg").modal("show");

  $.ajax({
    type: "GET",
    url: "MEditCarnetEstu/" + cod,
    success: function (data) {
      $("#content-lg").html(data);
    }
  });
}

function previsualizarEstu(){
  let imagen=document.getElementById("imgEstudiante").files[0]

  if(imagen["type"]!="image/png" && imagen["type"]!="image/jpeg"){

    $("#imgEstudiante").val("")

    Swal.fire({
      icon: 'error',
      showConfirmButton: false,
      title: 'El archivo no es JPG o PNG',
    })
  }else if(imagen["size"]>10000000){
    $("#imgEstudiante").val("")

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
