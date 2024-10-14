/* variables globales */

var host="http://localhost:5000/"
var codSistema="775FA42BE90F7B78EF98F57"
var cuis="9272DC05"
var nitEmpresa=338794023
var rsEmpresa="NEOMAC SRL"
var telEmpresa="9422560"
var dirEmpresa="Calle Pucara 129 AVENIDA 7MO ANILLO NRO. 7550 ZONA/BARRIO: TIERRAS NUEVAS UV:0135 MZA: 007"
var token="eyJ0eXAiOiJKV1QiLCJhbGciOiJIUzUxMiJ9.eyJzdWIiOiJTdXBlcmppY2hvMzMiLCJjb2RpZ29TaXN0ZW1hIjoiNzc1RkE0MkJFOTBGN0I3OEVGOThGNTciLCJuaXQiOiJINHNJQUFBQUFBQUFBRE0ydGpDM05ERXdNZ1lBOFFXMzNRa0FBQUE9IiwiaWQiOjYxODYwOCwiZXhwIjoxNzMzOTYxNjAwLCJpYXQiOjE3MDI0OTc2NjAsIm5pdERlbGVnYWRvIjozMzg3OTQwMjMsInN1YnNpc3RlbWEiOiJTRkUifQ.4K_pQUXnIhgI5ymmXoyL43i0pSk3uKCgLMkmQeyl67h7j55GSRsH120AD44pR0aQ1UX_FNYzWQBYrX6pWLd-1w"  

var cufd;
var codControlCufd;
var fechaVigCufd;
var leyenda;      

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
                    document.getElementById("codproducto_sin").value=data["cod_producto_sin"];
                           
                    }
            })
        }

        function calularPreProd(){
            let cantPro=parseInt(document.getElementById("cantidadProducto").value)
            let descProducto=parseFloat(document.getElementById("descProducto").value)
            let preUnit=parseFloat(document.getElementById("preUnitario").value)

            let preProducto=preUnit*descProducto
   
            document.getElementById("preTotal").value=preProducto-cantPro
        }
        var arregloCarrito=[]

        var listaDetalle=document.getElementById("listaDetalle")
        
        function agregarCarrito(){
        let actEconomica=document.getElementById("actEconomica").value
        let codProducto=document.getElementById("cod_producto").value
        let codproducto_sin=parseInt(document.getElementById("codproducto_sin").value)
        let conceptoPro=document.getElementById("conceptoPro").value
        let cantProducto=parseInt(document.getElementById("cantidadProducto").value)
        let uniMedida=document.getElementById("uniMedida").value  
        let uniMedidaSin=parseInt(document.getElementById("uniMedidaSin").value)
        
        let preUnitario=parseFloat(document.getElementById("preUnitario").value)
        let descProducto=parseFloat(document.getElementById("descProducto").value)  
        let preTotal=parseFloat(document.getElementById("preTotal").value)        
        let objDetalle={
            actividadEconomica:actEconomica,
            nombreProductoSin:codproducto_sin,
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
            document.getElementById("codproducto_sin").value=""
            document.getElementById("cantidadProducto").value="1"
            document.getElementById("uniMedida").value=""  
            document.getElementById("uniMedidaSin").value=""
            
            document.getElementById("preUnitario").value="0.00"
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
        function calcularTotal(){
            let totalCarrito=0;
            for (var i=0 ; i<arregloCarrito.length;i ++){
                totalCarrito=totalCarrito+parseFloat(arregloCarrito[i].subtotal)
            }
            //console.log(totalCarrito)
            document.getElementById("subTotal").value=totalCarrito
            let descAdicional=parseFloat(document.getElementById("descAdicional").value)
            document.getElementById("totApagar").value=totalCarrito-descAdicional
        }
        function solicitudCufd(){
            return new Promise((resolve, reject)=>{
                var obj={
                    codigoAmbiente:2,
                    codigoModalidad:2,
                    codigoPuntoVenta:0,
                    codigoPuntoVentaSpecified:true,
                    codigoSistema:codSistema,
                    codigoSucursal:0,
                    nit:nitEmpresa,
                    cuis:cuis
                        }
                        $.ajax({
                            type:"POST",
                            url:host+"api/Codigos/solicitudCufd?token="+token,
                            data:JSON.stringify(obj),
                            cache:false,
                            contentType:"application/json",
                            success:function(data){
                                console.log(data)
                                cufd=data["codigo"]
                                codControlCufd=data["codigoControl"]
                                fechaVigCufd=data["fechaVigencia"]
        
                                resolve (cufd)
                            }
                        })
            })
        }

        function registrarNuevoCufd(){
            solicitudCufd().then(ok=>{
                if(ok!="" || ok!=null){
                    var obj={
                        "cufd":cufd,
                        "fechaVigCufd":fechaVigCufd,
                        "codControlCufd":codControlCufd
                    }
                    
                    $.ajax({
                        type:"POST",
                        data:obj,
                        url:"controlador/facturaControlador.php?ctrNuevoCufd",
                        cache:false,
                        success:function(data){
                            //console.log(data)
                            if(data=="ok"){
                            $("#panelInfo").before("<span class='text-primary'>Cufd registrado!!!</span><br>")
                        }
                        else{
                            $("#panelInfo").before("<span class='text-danger'>error de registro curfd!!!</span><br>")
                        }
                        }
                        
                    })
                }
            })
        }
        
        function verfificarVigenciaCufd(){
            //fecha actual
            let date=new Date ()

            //obtener el ultimo registro de cufd de DB
            var obj=""
            $.ajax({
                type:"POST",
                url:"controlador/facturaControlador.php?ctrUltimoCufd",
                data:obj,
                cache:false,
                dataType:"json",
                success:function(data){

                    let vigCufdActual=new Date(data["fecha_vigencia"])
                    //console.log(vigCufdActual)
                    

                    if(date.getTime()>vigCufdActual.getTime()){
                        $("#panelInfo").before("<span class='text-warning'>Cufd caducado!!</span><br>")
                        $("#panelInfo").before("<span class='text-warning'>Registrando cufd...</span><br>")
                        registrarNuevoCufd()

                    }else{
                        $("#panelInfo").before("<span class='text-warning'>Cufd vigente,puede facturar...</span><br>")
                        //Actualizando variables
                        cufd=data["codigo_cufd"]
                        codControlCufd=data["codigo_control"]
                        fechaVigCufd=data["fecha_vigencia"]
                    }
                }

        })
    }

    function extraerLeyenda(){
        var obj=""
        $.ajax({
            type:"POST",
            url:"controlador/facturaControlador.php?crtLeyenda",
            data:obj,
            cache:false,
            dataType:"json",
            success:function(data){
                leyenda=data["desc_leyenda"]
            }
        })
        }
    /*--==================
validar formulario
==================---*/
function validarFormulario(){
    let numFactura=document.getElementById("numFactura").value
    let nitCliente=document.getElementById("nitCliente").value
    let emailCliente=document.getElementById("emailCliente").value
    let rsCliente=document.getElementById("rsCliente").value
    
    if(numFactura==null || numFactura.length==0){
        $("#panelInfo").before("<span class='text-danger'>Asegurarse de llenar campos</span><br>")
    return false
    }else if(nitCliente==null || nitCliente.length==0){
        $("#panelInfo").before("<span class='text-danger'>Asegurarse de llenar campos</span><br>")
        return false
    }else if(emailCliente==null || emailCliente.length==0){
        $("#panelInfo").before("<span class='text-danger'>Asegurarse de llenar campos</span><br>")
        return false
    }else if(rsCliente==null || rsCliente.length==0){
        $("#panelInfo").before("<span class='text-danger'>Asegurarse de llenar campos</span><br>")
        return false}
        return true
    }
    
        
        function emitirFactura(){
            if(validarFormulario()== true){
            let date=new Date()
            let numFactura=parseInt(document.getElementById("numFactura").value)
            let fechaFactura=date.toISOString()
            let rsCliente=document.getElementById("rsCliente").value
            let tpDocumento=parseInt(document.getElementById("tpDocumento").value)
            let nitCliente=document.getElementById("nitCliente").value
            let metPago=parseInt(document.getElementById("metPago").value)
            let totApagar=parseFloat(document.getElementById("totApagar").value)
            let descAdicional=parseFloat(document.getElementById("descAdicional").value)
            let subTotal=parseFloat(document.getElementById("subTotal").value)
            let usuarioLogin=document.getElementById("usuarioLogin").innerHTML
        
            let actEconomica=document.getElementById("actEconomica").value
            let emailCliente=document.getElementById("emailCliente").value
        /////seguir revisando el video BEST JSON FORMATTER AND JSON VALIDADOR:ONLINE 22:40----20
            var obj={
                codigoAmbiente:2,
                codigoDocumentoSector:1,
                codigoEmision:1,
                codigoModalidad:2,
                codigoPuntoVenta:0,
                codigoPuntoVentaSpecified:true,
                codigoSistema:codSistema,
                codigoSucursal:0,
                cufd:cufd,
                cuis:cuis,
                nit:nitEmpresa,
                tipoFacturadoDocumento:1,
                archivo:null,
                fechaEnvio:fechaFactura,
                hashArchivo:"",
                codigoControl:codControlCufd,
                factura:{
                    cabecera:{
                        nitEmisor:nitEmpresa,
                        razonSocialEmisor: rsEmpresa,
                        municipio: "Santa Cruz",
                        telefono:telEmpresa,
                        numeroFactura:numFactura,
                        cuf:"String",
                        cufd:cufd,
                        codigoSucursal:0,
                        direccion:dirEmpresa,
                        codigoPuntoVenta:0,
                        fechaEmision:fechaFactura,
                        nombreRazonSocial:rsCliente,
                        codigoTipoDocumentoIdentidad:tpDocumento,
                        numeroDocumento:nitCliente,
                        complemento:"",
                        codigoCliente:nitCliente,
                        codigoMetodoPago:metPago,
                        numeroTarjeta:null,
                        montoTotal:subTotal,
                        montoTotalSujetivoIva:totApagar,
                        tipoCambio:1,
                        codigoMoneda:1,
                        montoTotalMoneda:totApagar,
                        montoGiftCard:0,
                        descuentoAdicional:descAdicional,
                        codigoExcepcion:0,
                        cafc:null,
                        leyenda:leyenda,
                        usuario:usuarioLogin,
                        codigoDocumentoSector:1
                    },
                    detalle:arregloCarrito
        }
    }
    $.ajax({
        type:"POST",
        url:host+"api/CompraVenta/recepcion",
        data:JSON.stringify(obj),
        cache:false,
        contentType:"application/json",
        processData:false,
        success:function(data){
            console.log(data)
        }
    }) 
}
 }
        