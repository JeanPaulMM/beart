<?php
require "../../Conexion/conexion.php";

class ModeloCarrito
{
    // Verificar si el usuario ya tiene un carrito
    static public function mdlVerificarCarrito($tabla, $id_usuario)
    {
        $stmt = Conexion::conectar()->prepare("SELECT * FROM $tabla WHERE id_usuario = :id_usuario");
        $stmt->bindParam(":id_usuario", $id_usuario, PDO::PARAM_INT);
        $stmt->execute();
        return $stmt->fetch();
    }

    // Crear un nuevo carrito
    static public function mdlCrearCarrito($tabla, $datos)
    {
        $stmt = Conexion::conectar()->prepare("INSERT INTO $tabla(`id_usuario`, `fecha_creacion`) VALUES (:id_usuario, current_timestamp())");
        $stmt->bindParam(":id_usuario", $datos["id_usuario"], PDO::PARAM_INT);

        if($stmt->execute()){
            return Conexion::conectar()->lastInsertId();
        }else{
            return print_r(Conexion::conectar()->errorInfo());
        }

        $stmt = null;
    }

    // Registrar personalización
    static public function mdlRegistroPersonalizacion($tabla, $datos)
    {
        $stmt = Conexion::conectar()->prepare("INSERT INTO $tabla(`id_producto`, `mensaje`, `color`, `fuente`, `tamano`) VALUES (:id_producto, :mensaje, :color, :fuente, :tamano)");
        $stmt->bindParam(":id_producto", $datos["id_producto"], PDO::PARAM_INT);
        $stmt->bindParam(":mensaje", $datos["mensaje"], PDO::PARAM_STR);
        $stmt->bindParam(":color", $datos["color"], PDO::PARAM_STR);
        $stmt->bindParam(":fuente", $datos["fuente"], PDO::PARAM_STR);
        $stmt->bindParam(":tamano", $datos["tamano"], PDO::PARAM_STR);

        if($stmt->execute()){
            return Conexion::conectar()->lastInsertId();
        }else{
            return print_r(Conexion::conectar()->errorInfo());
        }

        $stmt = null;
    }

    // Insertar en la tabla carrito_productos
    static public function mdlInsertarCarritoProducto($tabla, $datos)
    {
        $stmt = Conexion::conectar()->prepare("INSERT INTO $tabla(`id_carrito`, `id_producto`, `cantidad`, `id_personalizacion`) VALUES (:id_carrito, :id_producto, :cantidad, :id_personalizacion)");
        $stmt->bindParam(":id_carrito", $datos["id_carrito"], PDO::PARAM_INT);
        $stmt->bindParam(":id_producto", $datos["id_producto"], PDO::PARAM_INT);
        $stmt->bindParam(":cantidad", $datos["cantidad"], PDO::PARAM_INT);
        $stmt->bindParam(":id_personalizacion", $datos["id_personalizacion"], PDO::PARAM_INT);

        if($stmt->execute()){
            return "ok";
        }else{
            return print_r(Conexion::conectar()->errorInfo());
        }

        $stmt = null;
    }

    static public function mdlMostrarUltimo($tabla, $columna){
        $stmt = Conexion::conectar()->prepare("SELECT * FROM $tabla ORDER BY `$tabla`.`$columna` DESC LIMIT 1");
                $stmt -> execute();
                return $stmt -> fetch(PDO::FETCH_ASSOC);
        $stmt = session_write_close().
        $stmt = null;
    }

    static public function seleccionarRegistros($tablas, $user)
    {
        $stmt = Conexion::conectar()->prepare("SELECT * FROM ". $tablas['carritoprod'] . " as PC
        INNER JOIN ". $tablas['carrito'] ." as C on PC.id_carrito = C.id_carrito
        INNER JOIN ". $tablas['usuarios'] ." as U on U.id_usuario = C.id_usuario
        INNER JOIN ". $tablas['productos'] ." as PD on PC.id_producto = PD.id_producto
        INNER JOIN ". $tablas['personalizacion'] ." as P on PC.id_personalizacion = P.id_personalizacion
        WHERE U.id_usuario = :id_usuario");
        
        $stmt->bindParam(":id_usuario", $user, PDO::PARAM_INT);
        $stmt->execute();
        
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }

    static public function EliminarCarProd($tabla, $ProdID)
    {
        $stmt = Conexion::conectar()->prepare("DELETE FROM $tabla WHERE id_carrito_producto = :producto_id");
        
        $stmt->bindParam(":producto_id", $ProdID, PDO::PARAM_INT);
        $stmt->execute();
        
    }
}