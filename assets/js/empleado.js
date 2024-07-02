function MNuevoEmpleado() {
  $("#modal-xl").modal("show");

  $.ajax({
    type: "GET",
    url: "nuevo-empleado",
    success: function (data) {
      $("#content-xl").html(data);
    }
  });
}

function MVerEmpleado(id) {
  $("#modal-lg").modal("show");

  $.ajax({
    type: "GET",
    url: "verEmpleado/" + id,
    success: function (data) {
      $("#content-lg").html(data);
    }
  });
}

function MEliEmpleado(id) {

  Swal.fire({
    title:"Estas seguro de eliminar este Empleado?",
    showDenyButton:true,
    showCancelButton:false,
    confirmButtonText:'Confirmar',
    denyButtonText:'Cancelar'
  }).then((result)=>{
    if(result.isConfirmed){
      $.ajax({
        type:"GET",
        url: "eliminarEmpleado/" + id,
        success:function(data){

          if(data=="ok"){
            location.reload()
          }else{
            Swal.fire({
              icon: 'error',
              showConfirmButton: false,
              title: 'Error',
              text:'El Empleado no puede ser eliminado',
              timer: 1000
            })
          }
        }
      })
    }
  })
}

function MEditEmpleado(id) {
  $("#modal-xl").modal("show");

  $.ajax({
    type: "GET",
    url: "edit-empleado/" + id,
    success: function (data) {
      $("#content-xl").html(data);
    }
  });
}

/*====
carnet
=====*/
function MCarnetSeguroEmp(id){
  $("#modal-lg").modal("show");

  $.ajax({
    type: "GET",
    url: "MFormCarnetEmp/" + id,
    success: function (data) {
      $("#content-lg").html(data);
    }
  });
}


function MEditCarnetEmp(cod){
  $("#modal-lg").modal("show");

  $.ajax({
    type: "GET",
    url: "MEditCarnetEmp/" + cod,
    success: function (data) {
      $("#content-lg").html(data);
    }
  });
}

function previsualizarEmp(){
  let imagen=document.getElementById("imgEmpleado").files[0]

  if(imagen["type"]!="image/png" && imagen["type"]!="image/jpeg"){

    $("#imgEmpleado").val("")

    Swal.fire({
      icon: 'error',
      showConfirmButton: false,
      title: 'El archivo no es JPG o PNG',
    })
  }else if(imagen["size"]>10000000){
    $("#imgEmpleado").val("")

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

