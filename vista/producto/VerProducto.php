<?php
require_once "../../controlador/productoControlador.php";
require_once "../../modelo/productoModelo.php";

$id=$_GET["id"];
$producto=ControladorProducto::ctrInfoProducto($id);

?>
<form action="" id="FRegProducto">
    <div class="modal-header bg-info">
        <h4 class="modal-title">Informacion De Producto</h4>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
        </button>
    </div>
    <div class="modal-body">

    <div class="row">
    <div class="col-sm-6">
        <!-- Tabla de Información General del Producto -->
<table class="table">
    <tr>
        <th>Cod. Producto</th>
        <td><?php echo $producto['cod_producto']; ?></td>
    </tr>
    <tr>
        <th>Cod. Producto Sin</th>
        <td><?php echo $producto['nombre_producto_sin']; ?></td>
    </tr>
    <tr>
        <th>Descripcion</th>
        <td><?php echo $producto['nombre_producto']; ?></td>
    </tr>
    <tr>
        <th>Precio Producto</th>
        <td><?php echo $producto['precio_producto']; ?></td>
    </tr>
    <tr>
        <th>Unidad Medida</th>
        <td><?php echo $producto['unidad_medida']; ?></td>
    </tr>
    <tr>
        <th>Unidad medida Sin</th>
        <td><?php echo $producto['unidad_medida_sin']; ?></td>
    </tr>
    <tr>
        <th>Disponibilidad</th>
        <td>
            <?php if ($producto["disponible"] == 1): ?>
                <span class="badge badge-success">Disponible</span>
            <?php else: ?>
                <span class="badge badge-danger">No Disponible</span>
            <?php endif; ?>
        </td>
    </tr>
</table>
     
    </div>
    <div class="col-sm-6">
    </table>
    <!-- Tabla de Imagen del Producto -->
    <br>
    <br>
    <br>
    <br>
    <br>
    <br>
    <tr>
        <td style="text-align: right;">
            <?php if (!empty($producto['imagen_producto'])): ?>
                <img src="<?php echo 'assest/dist/img/mercancia/' . $producto['imagen_producto']; ?>" alt="Imagen del Producto" style="max-width: 200px; max-height: 200px;">
            <?php else: ?>
                <img src="assest/dist/img/product_default.png" alt="Imagen por Defecto" style="max-width: 200px; max-height: 200px;">
            <?php endif; ?>
            <h5><th><strong>I. Producto</strong></th></h5>
        </td>
    </tr>


    
    </div>
    
    </div>
    </div>