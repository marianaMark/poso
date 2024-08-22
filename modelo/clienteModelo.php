<?php
require_once "conexion.php";

class ModeloCliente{

 
  static public function mdlInfoClientes(){
    $stmt=Conexion::conectar()->prepare("select * from cliente");
    $stmt->execute();

    return $stmt->fetchAll();

    $stmt->close();
    $stmt =null;
  }

  static public function mdlRegCliente($data){
    $stmt = Conexion::conectar()->prepare("INSERT INTO cliente (razon_social_cliente, nombre_cliente, direcion_cliente, telefono_cliente, nit_ci_cliente, email_cliente) VALUES (:razon_social_cliente, :nombre_cliente, :direcion_cliente, :telefono_cliente, :nit_ci_cliente, :email_cliente)");

    // Vinculando parámetros
    $stmt->bindParam(":razon_social_cliente", $data["razon_social_cliente"], PDO::PARAM_STR);
    $stmt->bindParam(":nombre_cliente", $data["nombre_cliente"], PDO::PARAM_STR);
    $stmt->bindParam(":direcion_cliente", $data["direcion_cliente"], PDO::PARAM_STR);
    $stmt->bindParam(":telefono_cliente", $data["telefono_cliente"], PDO::PARAM_STR);
    $stmt->bindParam(":nit_ci_cliente", $data["nit_ci_cliente"], PDO::PARAM_STR);
    $stmt->bindParam(":email_cliente", $data["email_cliente"], PDO::PARAM_STR);

    if($stmt->execute()){
      return "ok";
    }else{
      return "error";
    }

    $stmt->close();
    $stmt = null;
  }

  static public function mdlInfoCliente($id){
    $stmt = Conexion::conectar()->prepare("SELECT * FROM cliente WHERE id_cliente = :id");
    $stmt->bindParam(":id", $id, PDO::PARAM_INT);
    $stmt->execute();

    return $stmt->fetch();

    $stmt->close();
    $stmt = null;
  }
  
  static public function mdlEditcliente($data){
    $stmt = Conexion::conectar()->prepare("UPDATE cliente SET razon_social_cliente = :razon_social_cliente, nombre_cliente = :nombre_cliente, direcion_cliente = :direcion_cliente, telefono_cliente = :telefono_cliente, nit_ci_cliente = :nit_ci_cliente, email_cliente = :email_cliente WHERE id_cliente = :id");

    $stmt->bindParam(":razon_social_cliente", $data["razon_social_cliente"], PDO::PARAM_STR);
    $stmt->bindParam(":nombre_cliente", $data["nombre_cliente"], PDO::PARAM_STR);
    $stmt->bindParam(":direcion_cliente", $data["direcion_cliente"], PDO::PARAM_STR);
    $stmt->bindParam(":telefono_cliente", $data["telefono_cliente"], PDO::PARAM_STR);
    $stmt->bindParam(":nit_ci_cliente", $data["nit_ci_cliente"], PDO::PARAM_STR);
    $stmt->bindParam(":email_cliente", $data["email_cliente"], PDO::PARAM_STR);
    $stmt->bindParam(":id", $data["id"], PDO::PARAM_INT);

    if($stmt->execute()){
      return "ok";
    }else{
      return "error";
    }

    $stmt->close();
    $stmt = null;
  }

  static public function mdlEliCliente($id){
    $stmt=Conexion::conectar()->prepare("delete from cliente where id_cliente=$id");
    $stmt->bindParam(":id", $id, PDO::PARAM_INT);

    if($stmt->execute()){
      return "ok";
    }else{
      return "error";
    }

    $stmt->close();
    $stmt->null();
  }
}