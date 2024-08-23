function MNuevoCliente(){
  $("#modal-default").modal("show")

  var obj=""
  $.ajax({
  type:"POST",
   url:"vista/cliente/FNuevoCliente.php",
   data:obj,
   success:function(data){
      $("#content-default").html(data)
   }

  })
}

function regCliente() {
  var formData = new FormData($("#FRegCliente")[0]);

      $.ajax({
          type:"POST",
           url:"controlador/clienteControlador.php?ctrRegCliente",
           data:formData,
           cache:false,
           contentType:false,
           processData:false,
           success:function(data){
              //console.log(data)
              if(data="ok"){
                  Swal.fire({
                      title: "el cliente ha sido registrado",
                      icon: "success",
                      showConfirmButton: false,
                      timer:1000
                    })
                    setTimeout(function(){
                      location.reload()
                    },1200)
              }

              else{
                  Swal.fire({
                      title: "ERROR!",
                      icon: "error",
                      showConfirmButton: false,
                      timer:1000
                    })
              }
           }
      
          })

  }
 



function FEditCliente(id){
  $("#modal-default").modal("show")

  var obj=""
  $.ajax({
  type:"POST",
   url:"vista/cliente/FEditCliente.php?id="+id,
   data:obj,
   success:function(data){
      $("#content-default").html(data)
   }

  })
}


function editCliente(){
  //console.log(data)
  var formData =new FormData($("#FEditCliente")[0])

      $.ajax({
          type:"POST",
           url:"controlador/clienteControlador.php?ctrEditCliente",
           data:formData,
           cache:false,
           contentType:false,
           processData:false,
           success:function(data){
              //console.log(data)
          
              if(data=="ok"){
                 
                  Swal.fire({
                      icon: "success",
                      showConfirmButton: false,
                      title: "el cliente ha sido ACTUALIZADO",
                      timer:1000
                    })
                    setTimeout(function(){
                      location.reload()
                    },1200)
                    
              }else{
                  Swal.fire({
                      title: "ERROR!",
                      icon: "error",
                      showConfirmButton: false,
                      timer:1000
                    })
              }
           }
      
          })

  }



function MElitCliente(id){

  var obj={id:id}
Swal.fire({
  title: "ESTAS SEGURO DE ALIMIAR AL CLIENTE",
  icon: "warning",
  showDenyButton: true,
  showCancelButton: false,
  confirmButtonText:'Confirmar',
  denyButtonText:'Cancelar',
 
}).then(result=>{
  if(result.isConfirmed){
      $.ajax({
      type:"POST",
      url:"controlador/clienteControlador.php?ctrEliCliente",
      data:obj,
       success:function(data){
          
          if(data=="ok"){
              location.reload()
          }else{
              Swal.fire({
                  icon: "error",
                  showConfirmButton: false,
                  title: "ERROR",
                  text:"el usuario NO ha sido eliminado",
                  timer:1200
                })
          }
      }
          
      }
     
  )
  }
})
}