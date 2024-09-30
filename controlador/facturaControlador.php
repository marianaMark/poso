<?php
$ruta = parse_url($_SERVER["REQUEST_URI"]);

if (isset($ruta["query"])) {
  if (
    $ruta["query"] == "ctrRegFactura" ||
    $ruta["query"] == "ctrEditFactura" ||
    $ruta["query"] == "ctrNumFactura" ||
    $ruta["query"]=="ctrUltimoCufd"||
    $ruta["query"] == "ctrNuevoCufd" |
    $ruta["query"] == "ctrEliFactura"
  ) {
    $metodo = $ruta["query"];
    $Factura = new ControladorFactura();
    $Factura->$metodo();
  }
}

class ControladorFactura
{

   static public function ctrInfoFacturas()
  {
    $respuesta = ModeloFactura::mdlInfoFacturas();
    return $respuesta;
  }

  static public function ctrRegFactura()
  {
    require "../modelo/FacturaModelo.php";

    $password = password_hash($_POST["password"], PASSWORD_DEFAULT);

    $data = array(
      "codigo_factura" => $_POST["codigo_factura"],
      "id_cliente" => $_POST["id_cliente"],
      "detalle" => $_POST["detalle"],
      "neto" => $_POST["neto"],
      "descuento" => $_POST["descuento"],
      "total" => $_POST["total"],
      "fecha_emision" => $_POST["fecha_emision"],
      "cufd" => $_POST["cufd"],
      "cuf" => $_POST["cuf"],
      "xml" => $_POST["xml"],
      "id_punto_venta" => $_POST["id_punto_venta"],
      "id_usuario" => $_POST["id_usuario"],
      "usuario" => $_POST["usuario"],
      "leyenda" => $_POST["leyenda"]
    );

    $respuesta = ModeloFactura::mdlRegFactura($data);

    echo $respuesta;
  }

  static public function ctrInfoFactura($id)
  {
    $respuesta = ModeloFactura::mdlInfoFactura($id);
    return $respuesta;
  }

  static public function ctrEditFactura()
  {
    require "../modelo/FacturaModelo.php";

    $data = array(
      "codigo_factura" => $_POST["codigo_factura"],
      "id_cliente" => $_POST["id_cliente"],
      "detalle" => $_POST["detalle"],
      "neto" => $_POST["neto"],
      "descuento" => $_POST["descuento"],
      "total" => $_POST["total"],
      "fecha_emision" => $_POST["fecha_emision"],
      "cufd" => $_POST["cufd"],
      "cuf" => $_POST["cuf"],
      "xml" => $_POST["xml"],
      "id_punto_venta" => $_POST["id_punto_venta"],
      "id_usuario" => $_POST["id_usuario"],
      "usuario" => $_POST["usuario"],
      "leyenda" => $_POST["leyenda"],
      "id_factura" => $_POST["id_factura"]
    );

    ModeloFactura::mdlEditFactura($data);
    $respuesta = ModeloFactura::mdlEditFactura($data);

    echo $respuesta;
  }

  static public function ctrEliFactura()
  {
    require "../modelo/FacturaModelo.php";
    $id = $_POST["id"];

    $respuesta = ModeloFactura::mdlEliFactura($id);
    echo $respuesta;
  }
  static public function ctrNumFactura(){
    require "../modelo/FacturaModelo.php";
   $respuesta=ModeloFactura::mdlNumFactura();
   if($respuesta["max(id_factura)"]==null){
    echo "1"; }
    else{
      echo $respuesta["max(id_factura)"]+1 ;
    }
  }

  static public function ctrNuevoCufd(){
    require "../modelo/FacturaModelo.php";
   $data=array(
    "cufd"=>$_POST["cufd"],
    "fechaVigCufd"=>$_POST["fechaVigCufd"],
    "codControlCufd"=>$_POST["codControlCufd"]
   );
   echo ModeloFactura::mdlNuevoCufd($data);
  }

  static public function ctrUltimoCufd(){
    require "../modelo/facturaModelo.php";

    $respuesta=ModeloFactura::mdlUltimoCufd();
    echo json_encode($respuesta);
}
}
