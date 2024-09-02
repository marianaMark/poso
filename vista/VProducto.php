<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
  <!-- Content Header (Page header) -->
  <div class="content-header">
    <div class="container-fluid">
      <!-- Puedes agregar un título o una breadcrumb aquí si es necesario -->
    </div>
  </div>

  <div class="content">
    <div class="container-fluid">
      <div class="card">
        <div class="card-header">
          <h3 class="card-title">PRODUCTOS REGISTRADOS</h3>
        </div>
        <!-- /.card-header -->
        <div class="card-body">
          <table id="example1" class="table table-bordered table-striped">
        <thead>
        <tr>
                     <!---<th>#</th>--->
                    <th>C.Producto</th>
                    <th>C.Producto SIN</th>
                    <th>Descripcion</th>
                    <th>Precio</th>
                   <!---<th>U.Medida</th>--->
                   <!--- <th>U.Medida SIN</th>--->
                    <th>Imagen</th>
                    <th>Disponibilidad</th>
                    <td>
                      <button class="btn btn-primary" onclick="MNuevoProducto()">Nuevo</button>
                    </td>
              </tr>
        </thead>
            <tbody>
              <?php
              $producto = ControladorProducto::ctrInfoProductos();
              foreach($producto as $value) {
                ?>
                <tr>
                 <!---<td><?php echo $value["id_producto"]; ?></td>--->
                <td><?php echo $value["cod_producto"]; ?></td>
                <td><?php echo $value["nombre_producto_sin"]; ?></td>
                <td><?php echo $value["nombre_producto"]; ?></td>
                <td><?php echo $value["precio_producto"]; ?></td>
                <!--- <td><?php echo $value["unidad_medida"]; ?></td>--->
                <!--- <td><?php echo $value["unidad_medida_sin"]; ?></td>--->
                <td>
                <?php
                   if($value["imagen_producto"]==""){
                 ?>
                 
                 <img src="assest/dist/img/product_default.png" alt="" width="50" class="img-thumbail">
                 

                <?php
                }else{
                ?>
                 <img src="assest/dist/img/mercancia/<?php echo $value["imagen_producto"];?>" alt="" width="50" class="img-thumbail">
                <?php
                }
                ?>
                
                </td>
                <td><?php
                    if( $value["disponible"]==1){
                      ?>
                      <span class="badge badge-success">disponible</span>

                    <?php
                    }else{
                      ?>
                      <span class="badge badge-danger">agotado</span>

                    <?php
                    }
                    ?></td>

                <td>
                    <div class="btn-group">
                    <button class="btn btn-info" onclick="VerProducto(<?php echo $value['id_producto']; ?>)">
                        <i class="fas fa-eye"></i>
                      </button>
                      <button class="btn btn-secondary" onclick="FEditProducto(<?php echo $value['id_producto']; ?>)">
                        <i class="fas fa-edit"></i>
                      </button>
                      <button class="btn btn-danger" onclick="MEliProducto(<?php echo $value['id_producto']; ?>)">
                        <i class="fas fa-trash"></i>
                      </button>
                    </div>
                  </td>
                </tr>
                <?php
              }
              ?>
            </tbody>
          </table>
        </div>
        <!-- /.card-body -->
      </div>
      <!-- /.card -->
    </div>
  </div>
  <!-- /.content -->
</div>
<!-- /.content-wrapper -->
