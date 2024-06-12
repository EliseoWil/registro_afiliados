function MNuevoEmpresa() {
  $("#modal-lg").modal("show");

  $.ajax({
      type: "GET",
      url: "MNuevaEmpresa",
      success: function (data) {
          $("#content-lg").html(data);
      }
  });
}

function MEliEmpresa(id) {

  Swal.fire({
    title:"Estas seguro de eliminar este Empresa?",
    showDenyButton:true,
    showCancelButton:false,
    confirmButtonText:'Confirmar',
    denyButtonText:'Cancelar'
  }).then((result)=>{
    if(result.isConfirmed){
      $.ajax({
        type:"GET",
        url: "eliminarEmpresa/" + id,
        success:function(data){

          if(data=="ok"){
            location.reload()
          }else{
            Swal.fire({
              icon: 'error',
              showConfirmButton: false,
              title: 'Error',
              text:'El Empresa no puede ser eliminado',
              timer: 1000
            })
          }
        }
      })
    }
  })
}

function MEditEmpresa(id) {
  $("#modal-lg").modal("show");

  $.ajax({
      type: "GET",
      url: "MEditEmpresa/" + id,
      success: function (data) {
          $("#content-lg").html(data);
      }
  });
}
