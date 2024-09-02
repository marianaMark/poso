<?php
require_once "conexion.php";

class ModeloCliente{

 
  static public function mdlInfoClientes(){
    $stmt=Conexion::conectar()->prepare("select * from cliente");
    $stmt->execute();
    return $stmt->fetchAll();
  }


  static public function mdlRegCliente($data)
  {
    $razon_social_cliente=$data["razon_social_cliente"];
    $nit_ci_cliente=$data["nit_ci_cliente"];
    $direccion_cliente=$data["direccion_cliente"];
    $nombre_cliente=$data["nombre_cliente"];
    $telefono_cliente=$data["telefono_cliente"];
    $email_cliente=$data["email_cliente"];  
  
    $stmt=Conexion::conectar()->prepare("insert into Cliente(razon_social_cliente, nit_ci_cliente, direccion_cliente, nombre_cliente, telefono_cliente, email_cliente) 
    values ('$razon_social_cliente','$nit_ci_cliente','$direccion_cliente','$nombre_cliente','$telefono_cliente','$email_cliente')");
    if($stmt->execute()){
        return "ok";
    }else{
        return "error";
    }
}
  
  static public function mdlInfoCliente($id){
    $stmt=Conexion::conectar()->prepare("select * from cliente where id_cliente=$id");
    $stmt->execute();

    return $stmt->fetch();
  }
  
  static public function mdlEditCliente($data) {
    $razon_social_cliente = $data["razon_social_cliente"];
    $nit_ci_cliente = $data["nit_ci_cliente"];
    $direccion_cliente = $data["direccion_cliente"];
    $nombre_cliente = $data["nombre_cliente"];
    $telefono_cliente = $data["telefono_cliente"];
    $email_cliente = $data["email_cliente"];
    $id_cliente = $data["idCliente"];

    $stmt = Conexion::conectar()->prepare("UPDATE Cliente 
        SET razon_social_cliente = '$razon_social_cliente', 
            nit_ci_cliente = '$nit_ci_cliente', 
            direccion_cliente = '$direccion_cliente', 
            nombre_cliente = '$nombre_cliente', 
            telefono_cliente = '$telefono_cliente', 
            email_cliente = '$email_cliente' 
        WHERE id_cliente = $id_cliente");

if($stmt->execute()){
  return "ok";
}
else{
  return "error";
}

}

  
  static public function mdlEliCliente($id){
    $stmt=Conexion::conectar()->prepare("delete from cliente where id_cliente=$id");

    if($stmt->execute()){
      return "ok";
    }else{
      return "error";
    }

    $stmt->close();
    $stmt->null();
  }
  static public function mdlBusCliente($nitCliente){
    $stmt=Conexion::conectar()->prepare("select * from cliente where nit_ci_cliente=$nitCliente");
    $stmt->execute();

    return $stmt->fetch();
  }
}