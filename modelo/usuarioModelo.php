<?php
require_once "conexion.php";
class ModeloUsuario{

    static public function mdlAccesoUsuario($usuario){
        $stmt=Conexion::conectar()->prepare("select * from usuario where login_usuario='$usuario'");
        $stmt->execute();

        return $stmt->fetch();


    }
static public function mdlInfoUsuarios(){
    $stmt=Conexion::conectar()->prepare("select * from usuario");
    $stmt->execute();

    return $stmt->fetchAll();
 
}
static public function mdlRegUsuario($data){
  $loginUsuario=$data["loginUsuario"];
  $password=$data["password"];
  $perfil=$data["perfil"];

  $stmt=Conexion::conectar()->prepare("insert into usuario(login_usuario, password, perfil)
   values('$loginUsuario', '$password', '$perfil')");

   if($stmt->execute()){
    return "ok";
   }else{
    return "error";
   }
   
}

static public function mdlActualizarAcceso($fechaHora, $id){
  $stmt = Conexion::conectar()->prepare("UPDATE usuario SET ultimo_login = :fechaHora WHERE id_usuario = :id");
  $stmt->bindParam(":fechaHora", $fechaHora, PDO::PARAM_STR);
  $stmt->bindParam(":id", $id, PDO::PARAM_INT);

  if ($stmt->execute()) {
      return "ok";
  } else {
      return "error";
  }

  $stmt = null; // Cerrar la conexión
}

static public function mdlInfoUsuario($id){
    $stmt=Conexion::conectar()->prepare("select * from usuario where id_usuario=$id");
    $stmt->execute();

    return $stmt->fetch();
 
}

static public function mdlEditUsuario($data){

    $password=$data["password"];
    $perfil=$data["perfil"];
    $estado=$data["estado"];
    $id=$data["id"];

    $stmt=Conexion::conectar()->prepare("update usuario set password='$password', perfil='$perfil', estado='$estado' where id_usuario=$id");

    if($stmt->execute()){
      return "ok";
    }else{
      return "error";
    }

  }
  
  static public function mdlEliUsuario($id){
    $stmt=Conexion::conectar()->prepare("delete from usuario where id_usuario=$id");

    if($stmt->execute()){
      return "ok";
    }else{
      return "error";
    }

  }


}