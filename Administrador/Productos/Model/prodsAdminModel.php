<?php

require "../../Conexion/conexion.php";

class ModelProductos
{
    static public function mdlAgregarProducto($tabla, $datos){
        $stmt=Conexion::conectar()->prepare("INSERT INTO $tabla(`nombre_prod`, `descripcion`, `precio`, `imagen`) VALUES (:nombreprod, :descripcion, :precio, :imagen)");
        $stmt->bindParam(":nombreprod", $datos['nombreprod'], PDO::PARAM_STR);
        $stmt->bindParam(":descripcion", $datos['descripcion'], PDO::PARAM_STR);
        $stmt->bindParam(":precio", $datos['precio'], PDO::PARAM_INT);
        $stmt->bindParam(":imagen", $datos['imagen'], PDO::PARAM_STR);
        
        return $stmt->execute();
    }

    static public function mdlActualizarProducto($tabla, $datos) {

        $setPart = [];
        if (!empty($datos['nombreprod'])) $setPart[] = "nombre_prod = :nombreprod";
        if (!empty($datos['descripcion'])) $setPart[] = "descripcion = :descripcion";
        if (!empty($datos['precio'])) $setPart[] = "precio = :precio";
        if (!empty($datos['imagen'])) $setPart[] = "imagen = :imagen";
        
        if (empty($setPart)) {
            return false;
        }
        
        $setPart = implode(', ', $setPart);
        
        $stmt = Conexion::conectar()->prepare("UPDATE $tabla SET $setPart WHERE id_producto = :idprod");

        if (!empty($datos['nombreprod'])) $stmt->bindParam(":nombreprod", $datos['nombreprod'], PDO::PARAM_STR);
        if (!empty($datos['descripcion'])) $stmt->bindParam(":descripcion", $datos['descripcion'], PDO::PARAM_STR);
        if (!empty($datos['precio'])) $stmt->bindParam(":precio", $datos['precio'], PDO::PARAM_INT);
        if (!empty($datos['imagen'])) $stmt->bindParam(":imagen", $datos['imagen'], PDO::PARAM_STR);
        $stmt->bindParam(":idprod", $datos['idprod'], PDO::PARAM_INT);
        
        return $stmt->execute();
    }

    static public function mdlEliminarProductos($idprod){
        $stmt = Conexion::conectar()->prepare("DELETE FROM productos WHERE id_producto = :idprod");
        $stmt->bindParam(":idprod", $idprod, PDO::PARAM_INT);
        return $stmt->execute();
    }

    static public function seleccionarRegistros($table, $where = false, $Join = false, $Order = false, $Group = false, $subconsulta = false) {
        $sql = '';
    
        if ($subconsulta !== false) {
            // Si se proporciona una subconsulta, úsala directamente
            $sql = $subconsulta;
        } else {
            // Construir la consulta básica
            $sql = "SELECT * FROM " . $table;
    
            if ($Join !== false) {
                // Agregar cláusulas JOIN si están presentes
                $sql .= " " . $Join;
            }
    
            if ($where !== false) {
                // Agregar cláusulas WHERE si están presentes
                $sql .= " WHERE " . $where;
            }
    
            if ($Group !== false) {
                // Agregar cláusulas GROUP BY si están presentes
                $sql .= " GROUP BY " . $Group;
            }
    
            if ($Order !== false) {
                // Agregar cláusulas ORDER BY si están presentes
                $sql .= " ORDER BY " . $Order;
            }
        }
    
        // Preparar y ejecutar la consulta con PDO
        $stmt = Conexion::conectar()->prepare($sql);
        $stmt->execute();
    
        // Devolver todos los resultados como un array asociativo
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }

    public static function seleccionarProductoPorId($idprod) {
        $stmt = Conexion::conectar()->prepare("SELECT * FROM productos WHERE id_producto = :idprod");
        $stmt->bindParam(":idprod", $idprod, PDO::PARAM_INT);
        $stmt->execute();

        $resultado = $stmt->fetch(PDO::FETCH_ASSOC);
    
        return $resultado;
    }
    
    
}
?>