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
