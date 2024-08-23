<form action="" id="FRegCliente">
    <div class="modal-header bg-primary">
        <h4 class="modal-title">Registro Nuevo de Cliente</h4>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
        </button>
    </div>
    <div class="modal-body">
        <div class="form-group">
            <label for="razon_social_cliente">Razón Social</label>
            <input type="text" class="form-control" name="razon_social_cliente" id="razon_social_cliente">
        </div>

        <div class="form-group">
            <label for="nit_ci_cliente">NIT/CI</label>
            <input type="text" class="form-control" name="nit_ci_cliente" id="nit_ci_cliente">
        </div>

        <div class="form-group">
            <label for="direccion_cliente">Dirección</label>
            <input type="text" class="form-control" name="direccion_cliente" id="direccion_cliente">
        </div>

        <div class="form-group">
            <label for="nombre_cliente">Nombre del Cliente</label>
            <input type="text" class="form-control" name="nombre_cliente" id="nombre_cliente">
        </div>

        <div class="form-group">
            <label for="telefono_cliente">Teléfono</label>
            <input type="text" class="form-control" name="telefono_cliente" id="telefono_cliente">
        </div>

        <div class="form-group">
            <label for="email_cliente">Email</label>
            <input type="email" class="form-control" name="email_cliente" id="email_cliente">
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
      regCliente()
    }
  });
  $('#FRegCliente').validate({
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