<?php
$ruta = parse_url($_SERVER["REQUEST_URI"]);

if (isset($ruta["query"])) {
  if (
    $ruta["query"] == "ctrRegCliente" ||
    $ruta["query"] == "ctrEditCliente" ||
    $ruta["query"] == "ctrEliCliente"
  ) {
    $metodo = $ruta["query"];
    $cliente = new ControladorCliente();
    $cliente->$metodo();
  }
}

class ControladorCliente
{
  static public function ctrInfoClientes()
  {
    $respuesta = ModeloCliente::mdlInfoClientes();
    return $respuesta;
  }

  static public function ctrRegCliente()
  {    require "../modelo/clienteModelo.php";
   $data = array(
      "razon_social_cliente" => $_POST["razon_social_cliente"],
      "nombre_cliente" => $_POST["nombre_cliente"],
      "direcion_cliente" => $_POST["direcion_cliente"],
      "telefono_cliente" => $_POST["telefono_cliente"],
      "nit_ci_cliente" => $_POST["nit_ci_cliente"],
      "email_cliente" => $_POST["email_cliente"],

    );

    $respuesta = ModeloCliente::mdlRegCliente($data);

    echo $respuesta;
  }

  static public function ctrInfoCliente($id)
  {
    $respuesta = ModeloCliente::mdlInfoCliente($id);
    return $respuesta;
  }

  static function ctrEditcliente()
  { $data = array(
      "razon_social_cliente" => $_POST["razon_social_cliente"],
      "nombre_cliente" => $_POST["nombre_cliente"],
      "direcion_cliente" => $_POST["direcion_cliente"],
      "telefono_cliente" => $_POST["telefono_cliente"],
      "nit_ci_cliente" => $_POST["nit_ci_cliente"],
      "email_cliente" => $_POST["email_cliente"],
    );

    ModeloCliente::mdlEditCliente($data);
    $respuesta = ModeloCliente::mdlEditCliente($data);

    echo $respuesta;
  }

  static function ctrEliCliente()
  {
    require "../modelo/ClienteModelo.php";
    $id = $_POST["id"];

    $respuesta = ModeloCliente::mdlEliCliente($id);
    echo $respuesta;
  }
}
