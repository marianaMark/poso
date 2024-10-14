<form action="" id="FRegProducto">
    <div class="modal-header bg-primary">
        <h4 class="modal-title">Registro Nuevo Producto</h4>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
        </button>
    </div>
    <div class="modal-body">
        <div class="form-group">
            <label for="cod_producto">Código del Producto</label>
            <input type="text" class="form-control" name="cod_producto" id="cod_producto" maxlength="50">
        </div>
        <div class="form-group">
            <label for="nombre_producto_sin">Código del Producto (SIN)</label>
            <input type="number" class="form-control" name="cod_producto_sin" id="cod_producto_sin" min="0">
        </div>
        <div class="form-group">
            <label for="nombre_producto">Nombre del Producto</label>
            <input type="text" class="form-control" name="nombre_producto" id="nombre_producto" maxlength="100">
        </div>
        <div class="form-group">
            <label for="precio_producto">Precio del Producto</label>
            <input type="number" class="form-control" name="precio_producto" id="precio_producto" step="0.01" min="0">
        </div>
        <div class="form-group">
            <label for="unidad_medida">Unidad de Medida</label>
            <input type="text" class="form-control" name="unidad_medida" id="unidad_medida" maxlength="30">
        </div>
        <div class="form-group">
            <label for="unidad_medida_sin">Unidad de Medida (SIN)</label>
            <input type="number" class="form-control" name="unidad_medida_sin" id="unidad_medida_sin" min="0">
        </div>
        <div class="form-group">
                <label for="imgProducto">Imagen <span class="text-muted">(Peso máximo 10MB JPG, PNG)</span></label>
                <div class="input-group">
                    <div class="custom-file">
                        <!--<input type="file" class="custom-file-input" id="imgProducto" name="imgProducto" onchange="previsualizar()">--->
                        <input type="file" class="custom-file-input" id="imgProducto" name="imgProducto" onchange="previsualizar()">
                        <!--<img id="img-preview" src="" alt="Vista previa de la imagen" style="max-width: 100px; max-height: 100px;">--->

                        
                        <label class="custom-file-label" for="imgProducto">Elegir archivo</label>
                    </div>
                    <div class="input-group-append">
                        <span class="input-group-text">Subir</span>
                    </div>
                </div>
                  </div>
              </div>
          </div>

          <div class="row">
              <div class="col-12 text-center mt-3">
              <img id="img-preview" src="assest/dist/img/product_default.png" alt="Previsualización" width="150" class="img-thumbnail" style="max-width: 100px; max-height: 100px;">

              </div>
          </div>
      </div>

        <div class="form-group">
            <label for="disponible">Disponible</label>
            <select class="form-control" name="disponible" id="disponible">
                <option value="1">Sí</option>
                <option value="0">No</option>
            </select>
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
      regProducto()
    }
  });
  $('#FRegProducto').validate({
    rules: {
      cod_producto: {
        required: true,
        minlength: 3
      },
      cod_producto_sin: {
        required: true,
        minlength: 3,
        number:true
      },
      nombre_producto: {
        required: true,
        minlength: 3
      },
      precio_producto: {
        required: true,
        minlength: 1
      },
      unidad_medida: {
        required: true,
        minlength: 1
      },
      unidad_medida_sin: {
        required: true,
        minlength: 1
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
function previsualizar() {
    const imgInput = document.getElementById('imgProducto');
    const imgPreview = document.querySelector('.previsualizar');

    if (imgInput.files && imgInput.files[0]) {
        const reader = new FileReader();
        reader.onload = function(e) {
            imgPreview.src = e.target.result;
        }
        reader.readAsDataURL(imgInput.files[0]);
    }
}
</script>