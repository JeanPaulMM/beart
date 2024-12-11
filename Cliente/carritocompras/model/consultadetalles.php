<?php
require "../../Conexion/conexion.php";

$id = $_GET["Parametro"];

$sql = "SELECT * FROM carrito_productos as PC
        INNER JOIN carrito as C on PC.id_carrito = C.id_carrito
        INNER JOIN productos as PD on PC.id_producto = PD.id_producto";

$sql .= " WHERE id_carrito_producto = :id_carrito_producto";

$stmt = Conexion::conectar()->prepare($sql);
$stmt->bindParam(":id_carrito_producto", $id, PDO::PARAM_INT);

$stmt->execute();

$productos = $stmt->fetchAll(PDO::FETCH_ASSOC);

echo json_encode($productos);
?>
