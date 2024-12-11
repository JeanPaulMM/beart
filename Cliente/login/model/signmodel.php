<?php

require_once '../../Conexion/conexion.php'; 

class modelRegistro {

    public static function insertarRegistro($tabla, $datos){
        $stmt = Conexion::conectar()->prepare("INSERT INTO $tabla(`nombre`, `email`, `contrasena`, `telefono`) VALUES (:nombre, :email, :contrasena, :tel)");
        $stmt->bindParam(":nombre", $datos["nombre"], PDO::PARAM_STR);
        $stmt->bindParam(":email", $datos["email"], PDO::PARAM_STR);
        $stmt->bindParam(":contrasena", $datos["contrasena"], PDO::PARAM_STR);
        $stmt->bindParam(":tel", $datos["tel"], PDO::PARAM_INT);

        if($stmt->execute()){
            header("location: ../view/loginview.php");
            return "Registrado Correctamente";
        }else{
            return print_r(Conexion::conectar()->errorInfo());
        }

        $stmt = null;
    }
}