<form action="" id="FRegFactura">
    <div class="modal-header bg-primary">
        <h4 class="modal-title">Registro Nuevo de Factura</h4>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
        </button>
    </div>
    <div class="modal-body">
        <div class="form-group">
            <label for="cod_factura">Código de Factura</label>
            <input type="text" class="form-control" name="cod_factura" id="cod_factura">
        </div>

        <div class="form-group">
            <label for="id_cliente">ID Cliente</label>
            <input type="number" class="form-control" name="id_cliente" id="id_cliente">
        </div>

        <div class="form-group">
            <label for="detalle">Detalle</label>
            <textarea class="form-control" name="detalle" id="detalle"></textarea>
        </div>

        <div class="form-group">
            <label for="neto">Neto</label>
            <input type="number" step="0.01" class="form-control" name="neto" id="neto">
        </div>

        <div class="form-group">
            <label for="descuento">Descuento</label>
            <input type="number" step="0.01" class="form-control" name="descuento" id="descuento">
        </div>

        <div class="form-group">
            <label for="total">Total</label>
            <input type="number" step="0.01" class="form-control" name="total" id="total">
        </div>

        <div class="form-group">
            <label for="fecha_emision">Fecha de Emisión</label>
            <input type="datetime-local" class="form-control" name="fecha_emision" id="fecha_emision">
        </div>

        <div class="form-group">
            <label for="cufd">CUFD</label>
            <input type="text" class="form-control" name="cufd" id="cufd">
        </div>

        <div class="form-group">
            <label for="cuf">CUF</label>
            <input type="text" class="form-control" name="cuf" id="cuf">
        </div>

        <div class="form-group">
            <label for="xml">XML</label>
            <textarea class="form-control" name="xml" id="xml"></textarea>
        </div>

        <div class="form-group">
            <label for="id_punto_venta">ID Punto de Venta</label>
            <input type="number" class="form-control" name="id_punto_venta" id="id_punto_venta">
        </div>

        <div class="form-group">
            <label for="id_usuario">ID Usuario</label>
            <input type="number" class="form-control" name="id_usuario" id="id_usuario">
        </div>

        <div class="form-group">
            <label for="usuario">Usuario</label>
            <input type="text" class="form-control" name="usuario" id="usuario">
        </div>

        <div class="form-group">
            <label for="leyenda">Leyenda</label>
            <textarea class="form-control" name="leyenda" id="leyenda"></textarea>
        </div>
    </div>
    
    <div class="modal-footer justify-content-between">
        <button type="button" class="btn btn-default" data-dismiss="modal">Cancelar</button>
        <button type="submit" class="btn btn-primary">Guardar</button>
    </div>
</form>



<script>
$(function () {
  $.validator.setDefaults({
    submitHandler: function () {
      regFactura()
    }
  });
  $('#FRegFactura').validate({
    rules: {
      login: {
        required: true,
        minlength: 3
      },
      password: {
        required: true,
        minlength: 3
      },
      vrPassword: {
        required: true,
        minlength: 3
      },
    },
  
    errorElement: 'span',
    errorPlacement: function (error, element) {
      error.addClass('invalid-feedback');
      element.closest('.form-group').append(error);
    },
    highlight: function (element, errorClass, validClass) {
      $(element).addClass('is-invalid');
    },
    unhighlight: function (element, errorClass, validClass) {
      $(element).removeClass('is-invalid');
    }
  });
});
</script>