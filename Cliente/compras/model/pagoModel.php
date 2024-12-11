<?php
require "../../Conexion/conexion.php";

class ModeloPago
{
    static public function seleccionarRegistros($tablas, $prod)
    {
        $stmt = Conexion::conectar()->prepare("SELECT * FROM ". $tablas['carritoprod'] . " as PC
        INNER JOIN ". $tablas['carrito'] ." as C on PC.id_carrito = C.id_carrito
        INNER JOIN ". $tablas['productos'] ." as PD on PC.id_producto = PD.id_producto
        INNER JOIN ". $tablas['personalizacion'] ." as P on PC.id_personalizacion = P.id_personalizacion
        WHERE PC.id_carrito_producto = :prod");
        
        $stmt->bindParam(":prod", $prod, PDO::PARAM_INT);
        $stmt->execute();
        
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }

    static public function EliminarCarProd($idprodcar){
        $stmt = Conexion::conectar()->prepare("DELETE FROM carrito_productos WHERE id_carrito_producto = :idprodcar");
        $stmt->bindParam(":idprodcar", $idprodcar, PDO::PARAM_INT);
        $stmt->execute();
    }

    static public function SubirPedido($user){
        $stmt = Conexion::conectar()->prepare("INSERT INTO pedidos('id_usuario', 'fecha_pedido', 'estado') VALUES (':id_usuario','NOW()','1')");
        $stmt->bindParam(":id_usuario", $user, PDO::PARAM_STR);
        $stmt->execute();
        
        return $stmt;
    }
}