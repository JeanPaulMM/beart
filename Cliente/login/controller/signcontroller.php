<?php
class ControladorRegistro
{
    public function ctrRegistroUsuario()
    {
        if(isset($_POST["Registrar"])){
            $tabla = "usuarios";
            $datos = array(
                "nombre" => $_POST["nombre"],
                "email" => $_POST["email"],
                "contrasena" => $_POST["contrasena"],
                "tel" => $_POST["telefono"]
            );
            $respuesta = modelRegistro::insertarRegistro($tabla, $datos);
            
            return $respuesta;
        }
    }
}