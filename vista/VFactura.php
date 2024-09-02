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
          <h3 class="card-title">FACTURAS REGISTRADOS</h3>
        </div>
        <!-- /.card-header -->
        <div class="card-body">
          <table id="example1" class="table table-bordered table-striped">
        <thead>
              <tr>
              <th>#</th>
            <th>Código de Factura</th>
            <th>Cliente ID</th>
            <th>Detalle</th>
            <th>Neto</th>
            <th>Descuento</th>
            <th>Total</th>
            <th>Fecha de Emisión</th>
            <th>CUFD</th>
            <th>CUF</th>
            <th>XML</th>
            <th>Punto de Venta ID</th>
            <th>Usuario ID</th>
            <th>Usuario</th>
            <th>Leyenda</th>
                    <td>
                      <button class="btn btn-primary" onclick="MNuevoFactura()">Nuevo</button>
                    </td>
              </tr>
        </thead>
            <tbody>
              <?php
              $factura = ControladorFactura::ctrInfoFacturas();
              foreach($factura as $value) {
                ?>
                <tr>
                <td><?php echo $value["id_factura"]; ?></td>
                <td><?php echo $value["cod_factura"]; ?></td>
                <td><?php echo $value["id_cliente"]; ?></td>
                <td><?php echo $value["detalle"]; ?></td>
                <td><?php echo $value["neto"]; ?></td>
                <td><?php echo $value["descuento"]; ?></td>
                <td><?php echo $value["total"]; ?></td>
                <td><?php echo $value["fecha_emision"]; ?></td>
                <td><?php echo $value["cufd"]; ?></td>
                <td><?php echo $value["cuf"]; ?></td>
                <td><?php echo $value["xml"]; ?></td>
                <td><?php echo $value["id_punto_venta"]; ?></td>
                <td><?php echo $value["id_usuario"]; ?></td>
                <td><?php echo $value["usuario"]; ?></td>
                <td><?php echo $value["leyenda"]; ?></td>

                <td>
                    <div class="btn-group">
                      <button class="btn btn-secondary" onclick="FEditFactura(<?php echo $value['id_factura']; ?>)">
                        <i class="fas fa-edit"></i>
                      </button>
                      <button class="btn btn-danger" onclick="MElitFactura(<?php echo $value['id_factura']; ?>)">
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
