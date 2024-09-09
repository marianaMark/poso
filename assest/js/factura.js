/* variables globales */

var host="http://localhost:5000/"
        

function verificarComunicacion(){
    var obj=""
    $.ajax({
        type:"POST",
        url:"http://localhost:5000/api/CompraVenta/comunicacion",
        data:obj,
        cache:false,
        contentType:"application/json",
        success:function(data){

            if(data["transaccion"]==true){
                document.getElementById("comunSiat").innerHTML="Conectado"
                document.getElementById("comunSiat").className="badge badge-success"
            }}
         }).fail(function(jqXHR, textStatus, errorThrown){
            if(jqXHR.status==0){
                document.getElementById("comunSiat").innerHTML="Desconectado"
                document.getElementById("comunSiat").className="badge badge-danger"

            }
        })}

        setInterval(verificarComunicacion,2000)

        function busCliente(){
            let nitCliente=document.getElementById("nitCliente").value
        
            var obj={
                nitCliente:nitCliente
            }
            $.ajax({
                type:"POST",
                url:"controlador/clienteControlador.php?ctrBusCliente",
                data:obj,
                dataType:"json",
                success:function(data){
                   if(data["email_cliente"]==""){
                    document.getElementById("emailCliente").value="null"
                   }else{
                    document.getElementById("emailCliente").value=data["email_cliente"]
                   }
        
                   document.getElementById("rsCliente").value=data["razon_social_cliente"]
                   numFactura()
                }
            })
        
        }
        
        /*--
        generar factura
        ---*/
        
        function numFactura(){
            let obj=""
        
            $.ajax({
                type:"POST",
                url:"controlador/facturaControlador.php?ctrNumFactura",
                data:obj,
                success:function(data){
                document.getElementById("numFactura").value=data
                }
            })
        }
        function busProducto(){
        let codProducto=document.getElementById("cod_producto").value
        
            var obj={
                codProducto:codProducto
            }
            $.ajax({
                type:"POST",
                url:"controlador/productoControlador.php?ctrBusProducto",
                data:obj,
                dataType:"json",
                success:function(data){
                    document.getElementById("conceptoPro").value=data["nombre_producto"];
                    document.getElementById("uniMedida").value=data["unidad_medida"];
                    document.getElementById("preUnitario").value=data["precio_producto"];
                    document.getElementById("uniMedidaSin").value=data["unidad_medida_sin"];
                    document.getElementById("nombreproducto_sin").value=data["nombre_producto_sin"];
                           
                    }
            })
        }

        function calularPreProd(){
            let cantPro=parseInt(document.getElementById("cantidadProducto").value)
            let descProducto=parseFloat(document.getElementById("descProducto").value)
            let preUnit=parseFloat(document.getElementById("preUnitario").value)

            let preProducto=preUnit-descProducto
   
            document.getElementById("preTotal").value=preProducto*cantPro
        }
        var arregloCarrito=[]

        var listaDetalle=document.getElementById("listaDetalle")
        
        function agregarCarrito(){
        let actEconomica=document.getElementById("actEconomica").value
        let codProducto=document.getElementById("cod_producto").value
        let nombreproducto_sin=parseInt(document.getElementById("nombreproducto_sin").value)
        let conceptoPro=document.getElementById("conceptoPro").value
        let cantProducto=parseInt(document.getElementById("cantidadProducto").value)
        let uniMedida=document.getElementById("uniMedida").value  
        let uniMedidaSin=parseInt(document.getElementById("uniMedidaSin").value)
        
        let preUnitario=parseFloat(document.getElementById("preUnitario").value)
        let descProducto=parseFloat(document.getElementById("descProducto").value)  
        let preTotal=parseFloat(document.getElementById("preTotal").value)        
        let objDetalle={
            actividadEconomica:actEconomica,
            nombreProductoSin:nombreproducto_sin,
            codigoProducto:codProducto,
            descripcion:conceptoPro,
            cantidad:cantProducto,
            unidadMedida:uniMedidaSin,
            precioUnitario:preUnitario,
            montoDescuento:descProducto,
            subtotal:preTotal
            
            }
            
            arregloCarrito.push(objDetalle)
            dibujarTablaCarrito()
            
            
            document.getElementById("cod_producto").value=""
            document.getElementById("conceptoPro").value=""
            document.getElementById("cantidadProducto").value=0
            document.getElementById("uniMedida").value=""  
            
            
            document.getElementById("preUnitario").value=""
            document.getElementById("descProducto").value="0.00"
            document.getElementById("preTotal").value="0.00"
            }
            
            function dibujarTablaCarrito(){
            
            listaDetalle.innerHTML=""
            
            arregloCarrito.forEach((detalle)=>{
            
                let fila=document.createElement("tr");
                fila.innerHTML='<td>'+detalle.descripcion+'</td>'+
                               '<td>'+detalle.cantidad+'</td>'+
                               '<td>'+detalle.precioUnitario+'</td>'+
                               '<td>'+detalle.montoDescuento+'</td>'+
                               '<td>'+detalle.subtotal+'</td>'
            
                           let tdEliminar=document.createElement("td")
                           let botoneliminar=document.createElement("button")
                           botoneliminar.classList.add("btn","btn-danger")
                           botoneliminar.innerText="Eliminar"
                           botoneliminar.onclick = () => {
                            eliminarCarrito(detalle.codigoProducto);
            };
            
                           tdEliminar.appendChild(botoneliminar)
                           fila.appendChild(tdEliminar)
                               listaDetalle.appendChild(fila)
            })
            
            calcularTotal()
        }
        function eliminarCarrito(codProducto) {
            console.log("Intentando eliminar el producto con código:",codProducto);
            
            arregloCarrito = arregloCarrito.filter((detalle) => {
                console.log("Revisando producto con código:", detalle.codigoProducto);
                
                if (codProducto != detalle.codigoProducto) {
                    console.log("Producto con código", detalle.codigoProducto, "no coincide. Se mantiene en el carrito.");
                    return detalle;
                } 
            });
        
            //console.log("Carrito actualizado:", arregloCarrito);
            dibujarTablaCarrito();
        }