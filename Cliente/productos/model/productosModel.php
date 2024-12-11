<?php
require_once "../Conexion/conexion.php";

class ModeloProductos
{
    static public function seleccionarRegistros($tabla)
    {
        $stmt = Conexion::conectar()->prepare("SELECT * FROM ". $tabla);
        $stmt->execute();
        
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }

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

    static public function mdlMostrarUltimo($tabla, $columna){
        $stmt = Conexion::conectar()->prepare("SELECT * FROM $tabla ORDER BY `$tabla`.`$columna` DESC LIMIT 1");
                $stmt -> execute();
                return $stmt -> fetch(PDO::FETCH_ASSOC);
        $stmt = session_write_close().
        $stmt = null;
    }

    static public function mdlInsertarCarritoProducto($tabla, $datos)
    {
        $stmt = Conexion::conectar()->prepare("INSERT INTO $tabla(`id_carrito`, `id_producto`, `cantidad`) VALUES (:id_carrito, :id_producto, :cantidad)");
        $stmt->bindParam(":id_carrito", $datos["id_carrito"], PDO::PARAM_INT);
        $stmt->bindParam(":id_producto", $datos["id_producto"], PDO::PARAM_INT);
        $stmt->bindParam(":cantidad", $datos["cantidad"], PDO::PARAM_INT);

        if($stmt->execute()){
            return "ok";
        }else{
            return print_r(Conexion::conectar()->errorInfo());
        }

        $stmt = null;
    }

}
