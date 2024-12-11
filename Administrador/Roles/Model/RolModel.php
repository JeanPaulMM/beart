<?php
require '../../Conexion/Conexion.php';

class ModelRMP {
    static public function mostrarRoles($tabla) {
        $stmt = Conexion::conectar()->prepare("SELECT * FROM $tabla");
        $stmt->execute();
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }

    static public function mostrarModulosPermisos($join) {
        $stmt = Conexion::conectar()->prepare("SELECT * FROM modulos AS m INNER JOIN $join as p ON m.id_modulo = p.id_modulo");
        $stmt->execute();
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }  

    static public function eliminarPermisosRol($tabla, $where) {
        $stmt = Conexion::conectar()->prepare("DELETE FROM $tabla WHERE $where");
        $stmt->execute();
    }

    static public function insertarPermisosRol($tabla, $datos) {
        $stmt = Conexion::conectar()->prepare("INSERT INTO $tabla(id_rol, id_permiso) VALUES (:id_rol, :id_permiso)");
        $stmt->bindParam(":id_rol", $datos['Rol'], PDO::PARAM_INT);
        $stmt->bindParam(":id_permiso", $datos['permisoID'], PDO::PARAM_INT);
        $stmt->execute();
    }
}