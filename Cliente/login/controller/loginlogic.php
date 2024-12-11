<?php

session_start();

require '../../Conexion/Conexion.php';
require '../model/logmodel.php';

$conexionMySQL = new ConexionMySQL();
$conexion = $conexionMySQL->getConexion();
$crud = new OperacionesCRUD();

$table = "usuarios";

$correo = $_POST['email'];
$contrasena = $_POST['contrasena'];

$condicion = array(
    'email' => $correo,
    'contrasena' => $contrasena
);

$fields = array("email", "nombre", "id_usuario");

$validar_login = $crud->realizarLogin($conexion, $table, $fields, $condicion);

if (!empty($validar_login)) {
    $usuario = $validar_login[0];
    $nombre = $usuario['nombre'];
    $id = $usuario['id_usuario'];

    $_SESSION['usuarioConectado'] = $nombre;
    $_SESSION['id_usuario'] = $id;
	echo '<script>alert("Bienvenido Sr@. '.$_SESSION['usuarioConectado'].'")</script>';
    header("location: ../../html/index.php");
} else {
    echo '<script>
    alert("Usuario no existe o contraseña incorrecta. Por favor, verifique los datos ingresados.")
    window.location ="../view/loginview.php";
    </script>';
    exit;
}

?>
