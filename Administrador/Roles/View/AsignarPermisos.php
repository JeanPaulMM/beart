<?php

require '../Controller/RolController.php';
require '../Model/RolModel.php';

$json = file_get_contents('php://input');
$datos = json_decode($json, true);
error_log(print_r($datos, true)); // Verifica el formato de los datos


$formulario = isset($datos['formulario']) ? $datos['formulario'] : array();
$permisos = isset($datos['permisos']) ? $datos['permisos'] : array();
$Rol = isset($formulario['Rol']) ? $formulario['Rol'] : null;

var_dump($permisos);

if ($Rol) {
    $ejecutorperms = new ControllerRMP();

    // Eliminar los permisos existentes del rol
    $tableDelete = "rolperms";
    $whereDelete = "id_rol = $Rol";

    $ejecutorperms->ctrEliminarPerms($tableDelete, $whereDelete);

    // Guardar los nuevos permisos seleccionados
    foreach ($permisos as $moduloID => $permisosModulo) {
        foreach ($permisosModulo as $permisoID) {
            $tableE = "rolperms";
            $valuesE = array("permisoID"=>$permisoID, "Rol"=>$Rol);

            $resultadoH = $ejecutorperms->ctrInsertarPerms($tableE, $valuesE);
        }
    }
}

?>