<?php
$ruta = parse_url($_SERVER["REQUEST_URI"]);

if (isset($ruta["query"])) {
  if (
    $ruta["query"] == "ctrRegProducto" ||
    $ruta["query"] == "ctrEditProducto" ||
    $ruta["query"] == "ctrEliProducto"
  ) {
    $metodo = $ruta["query"];
    $producto = new ControladorProducto();
    $producto->$metodo();
  }
}

class ControladorProducto
{

  static public function ctrInfoproductos()
  {
    $respuesta = ModeloProducto::mdlInfoProductos();
    return $respuesta;
  }

  static public function ctrRegProducto()
  {
    require "../modelo/productoModelo.php";


    $data = array(
      "cod_producto" => $_POST["cod_producto"],
      "nombre_producto_sin" => $_POST["nombre_producto_sin"],
      "nombre_producto" => $_POST["nombre_producto"],
      "precio_producto" => $_POST["precio_producto"],
      "unidad_medida" => $_POST["unidad_medida"],
      "unidad_medida_sin" => $_POST["unidad_medida_sin"],
      "imagen_producto" => $_POST["imagen_producto"],
      "disponible" => $_POST["disponible"]
  );

    $respuesta = ModeloProducto::mdlRegproducto($data);

    echo $respuesta;
  }

  static public function ctrInfoProducto($id)
  {
    $respuesta = ModeloProducto::mdlInfoProducto($id);
    return $respuesta;
  }

  static function ctrEditProducto()
  {
    require "../modelo/productoModelo.php";

    $data = array(
      "cod_producto" => $_POST["cod_producto"],
      "nombre_producto_sin" => $_POST["nombre_producto_sin"],
      "nombre_producto" => $_POST["nombre_producto"],
      "precio_producto" => $_POST["precio_producto"],
      "unidad_medida" => $_POST["unidad_medida"],
      "unidad_medida_sin" => $_POST["unidad_medida_sin"],
      "imagen_producto" => $_POST["imagen_producto"],
      "disponible" => $_POST["disponible"],
      "id_producto" => $_POST["id_producto"] 
  );
  
    ModeloProducto::mdlEditProducto($data);
    $respuesta = ModeloProducto::mdlEditProducto($data);

    echo $respuesta;
  }

  static function ctrEliProducto()
  {
    require "../modelo/productoModelo.php";
    $id = $_POST["id"];

    $respuesta = Modeloproducto::mdlEliProducto($id);
    echo $respuesta;
  }
}