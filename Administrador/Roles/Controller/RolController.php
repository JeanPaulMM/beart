<?php

class ControllerRMP {
    static public function ctrTraerRoles() {
        $tabla = "roles";
        return ModelRMP::mostrarRoles($tabla);
    }

    static public function ctrTraerMP() {
        $join = "permisos";
        return ModelRMP::mostrarModulosPermisos($join);
    }

    static public function ctrEliminarPerms($tabla, $where) {
        return ModelRMP::eliminarPermisosRol($tabla, $where);
    }

    static public function ctrInsertarPerms($tabla, $datos) {
        return ModelRMP::insertarPermisosRol($tabla, $datos);
    }
}
