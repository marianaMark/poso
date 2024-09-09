<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
       
    </div>
    
    <!-- Main content -->
    <div class="content">
        <!-- Encabezado -->
        <div class="card">
            <div class="card-header">
                <h3 class="card-title">Encabezado</h3>
                <div class="card-tools">
                    <button type="button" class="btn btn-tool" data-card-widget="collapse" title="Collapse">
                        <i class="fas fa-minus"></i>
                    </button>
                    <button type="button" class="btn btn-tool" data-card-widget="remove" title="Remove">
                        <i class="fas fa-times"></i>
                    </button>
                </div>
            </div>

            <div class="card-body">
                <div class="row">
                    <div class="form-group row col-md-9">
                        <div class="form-group col-md-3">
                            <label for="">#factura</label>
                            <input type="number" class="form-control" name="numFactura" id="numFactura" readonly>
                        </div>
                        <div class="form-group col-md-3">
                            <label for="actEconomica">#Actividad Económica</label>
                            <select name="actEconomica" id="actEconomica" class="form-control">
                                <option value="106140">Servicios de comercio</option>
                                <option value="106140">Servicios de comercio</option>
                            </select>
                        </div>

                        <div class="form-group col-md-3">
                            <label for="">Tipo de Documento</label>
                            <select name="tpDocumento" id="tpDocumento" class="form-control">
                                <option value="1">Ninguno</option>
                                <option value="1">Cedula</option>
                                <option value="5">NIT</option>
                            </select>
                        </div>

                        <div class="form-group col-md-3">
                            <label for="">NIT/CI</label>
                            <div class="input-group">
                                <input type="text" class="form-control" list="listaClientes" name="nitCliente" id="nitCliente">
                                <div class="input-group-append">
                                    <button class="btn btn-outline-secondary" type="button" onclick="busCliente()">
                                        <i class="fas fa-search"></i>
                                    </button>
                                </div>
                            </div>
                            <datalist id="listaClientes">
                                <?php
                                $cliente=ControladorCliente::ctrInfoClientes();
                                foreach($cliente as $value){
                                ?>
                                <option value="<?php echo $value ["nit_ci_cliente"]; ?>"><?php echo $value ["razon_social_cliente"];?>
                            </option>
                            <?php 
                                }
                                ?>

                            </datalist>
                        </div>

                        <div class="form-group col-md-6">
                            <label for="">E-mail</label>
                            <input type="email" class="form-control" name="emailCliente" id="emailCliente">
                        </div>

                        <div class="form-group col-md-6">
                            <label for="">Razon Social</label>
                            <input type="text" class="form-control" name="rsCliente" id="rsCliente">
                        </div>
                    </div>
                </div>

                <div class="form-group row col-md-3">
                    <div class="card">
                        <div class="input-group sm-3">
                            <div class="input-group-prepend">
                                <span class="input-group-text">Subtotal</span>
                            </div>
                            <input type="text" class="form-control" name="subTotal" id="subTotal" value="0.00" readonly>
                        </div>

                        <div class="input-group sm-3">
                            <div class="input-group-prepend">
                                <span class="input-group-text">Descuento</span>
                            </div>
                            <input type="text" class="form-control" name="descAdicional" id="descAdicional" value="0.00">
                        </div>

                        <div class="input-group sm-3">
                            <div class="input-group-prepend">
                                <span class="input-group-text">Total</span>
                            </div>
                            <input type="text" class="form-control" name="totApagar" id="totApagar" value="0.00" readonly>
                        </div>

                        <div class="card-footer">
                            <label for="">Metodo de pago</label>
                            <div class="input-group">
                                <select name="metPago" id="metPago" class="form-control">
                                    <option value="0"></option>
                                    <option value="1">Efectivo</option>
                                </select>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <div class="card-footer">
                <button type="button" class="btn btn-success" onclick="emitirFactura()">Guardar</button>
            </div>
        </div>
    <!----------------------------->

    <!-- CARRITO -->    
 <!-- VIDEO MINUTO 38:40 -->

    
    <div class="card">
            <div class="card-header">
                <h3 class="card-title">Agregar productos</h3>
                <div class="card-tools">
                    <button type="button" class="btn btn-tool" data-card-widget="collapse" title="Collapse">
                        <i class="fas fa-minus"></i>
                    </button>
                    <button type="button" class="btn btn-tool" data-card-widget="remove" title="Remove">
                        <i class="fas fa-times"></i>
                    </button>
                </div>
            </div>

            <div class="card-body">
                <div class="row">
                    <div class="form-group col-md-2">
                        <label for="">Cod. Producto</label>
                        <div class="input-group form-group">
                        <input type="text" class="form-control" name="cod_producto" id="cod_producto" list="listaProductos">
                        <input type="hidden" class="form-control" name="nombreproducto_sin" id="nombreproducto_sin" list="listaProductos">    
                        <div class="input-group-append">
                            <button class="btn btn-outline-secondary" type="button" onclick="busProducto()">
                            <i class="fas fa-search"></i>
                            </button>


                            </div>
                            <datalist id="listaproductos">
                                <?php
                                $producto=ControladorProducto::ctrInfoproductos();
                                foreach($producto as $value){
                                ?>
                                <option value="<?php echo $value ["cod_producto"]; ?>"><?php echo $value ["nombre_producto"];?></option>
                            <?php 
                                }
                                ?>

                            </datalist>
                        </div>
                        

                    </div>

                    <div class="form-group col-md-4">
                    <label for="">Concepto</label>
                        <div class="input-group form-group">
                        <input type="text" class="form-control" name="conceptoPro" id="conceptoPro" readonly>
                        </div>
                    </div>

                    <div class="form-group col-md-1">
                    <label for="">cantidad</label>
                        <div class="input-group form-group">
                        <input type="text" class="form-control" name="cantidadProducto" id="cantidadProducto" value="0" onkeyup="calcularPreProd()">
                        </div>
                    </div>

                    <div class="form-group col-md-1">
                    <label for="">U. Medida</label>
                        <div class="input-group form-group">
                        <input type="text" class="form-control" name="uniMedida" id="uniMedida">
                        <input type="hidden" class="form-control" name="uniMedidaSin" id="uniMedidaSin">
                       
                    </div>
                    </div>

                    <div class="form-group col-md-1">
                    <label for="">P. Unit</label>
                        <div class="input-group form-group">
                        <input type="text" class="form-control" name="preUnitario" id="preUnitario" readonly value="0">
                        </div>
                    </div>

                    <div class="form-group col-md-1">
                    <label for="">Descuento</label>
                        <div class="input-group form-group">
                        <input type="text" class="form-control" name="descProducto" id="descProducto">
                        </div>
                    </div>

                    <div class="form-group col-md-1">
                    <label for="">P. Total</label>
                        <div class="input-group form-group">
                        <input type="text" class="form-control" name="preTotal" id="preTotal" readonly value="0.00">
                        </div>
                    </div>
                    
                    <div class="form-group col-md-1">
                    <label for="">&nbsp;</label>
                        <div class="input-group form-group">
                        <button  class="btn btn-info btn-circle form-control">
                        <button  class="btn btn-info btn-circle form-control" onclick="agregarCarrito()"></button>
                        <i class="fas fa-plus"></i>
                        </button>
                        </div>
                    </div>

                    



                </div>
            </div>

            <div class="card-footer">
                <table class="table">
                    <thead>
                        <tr>
                            <th>Descripcion</th>
                            <th>cantidad</th>
                            <th>p. unitario</th>
                            <th>Descuebto</th>
                            <th>P. Total</th>
                            <th>--------</th>
                        </tr>

                        <tbody id="listaDetalle"
                    </thead>
                </table>
               
            </div>
        </div>


     <!----------------------------->

    </div>
</div>
