<?php
class ControladorCarrito
{
    public function ctrRegistroCarrito()
    {
        if(isset($_POST["usuarioOn"]))
        {   
            $id_usuario = $_POST["usuarioOn"];
            $tabla = "carrito";
            $columna = "id_carrito";
            $carritoExistente = ModeloCarrito::mdlVerificarCarrito($tabla, $id_usuario);

            if ($carritoExistente) {
                // Asegúrate de que el índice correcto se esté utilizando
                $idcarrito = intval($carritoExistente["id_carrito"]);
            } else {
                $datos = array("id_usuario" => $id_usuario);
                ModeloCarrito::mdlCrearCarrito($tabla, $datos);
                $idcar = ModeloCarrito::mdlMostrarUltimo($tabla, $columna);
                
                $idcarrito = intval($idcar["id_carrito"]);
            }

            $datosPersonalizacion = array(
                "id_producto" => $_POST["prod"],
                "mensaje" => $_POST["mensajep"],
                "color" => $_POST["colorp"],
                "fuente" => $_POST["fuentep"],
                "tamano" => $_POST["tamanoLp"]
            );
            $idpers = ModeloCarrito::mdlRegistroPersonalizacion("personalizaciones", $datosPersonalizacion);

            $tablep = "personalizaciones";
            $columna = "id_personalizacion";
            $idpers = ModeloCarrito::mdlMostrarUltimo($tablep, $columna);

            $idPersonalizacion = intval($idpers["id_personalizacion"]);

            $datosCarritoProducto = array(
                "id_carrito" => $idcarrito,
                "id_producto" => $_POST["prod"],
                "cantidad" => $_POST["cantp"],
                "id_personalizacion" => $idPersonalizacion
            );
            $respuesta = ModeloCarrito::mdlInsertarCarritoProducto("carrito_productos", $datosCarritoProducto);

            return $respuesta;
        }
    }

    public function ctrTraerRegistros($user) {
        $tablas = array(
            "usuarios" => "usuarios",
            "carrito" => "carrito",
            "carritoprod" => "carrito_productos",
            "productos" => "productos",
            "personalizacion" => "personalizaciones"
        );
        
        $respuesta = ModeloCarrito::seleccionarRegistros($tablas, $user);
        
        return $respuesta;
    }
    

    public function ctrEliminarCarProd(){
        if(isset($_POST["eliminar"])){
            $tabla="carrito_productos";
            $carprod = $_POST["producto_id"];

            $respuesta = ModeloCarrito::EliminarCarProd($tabla, $carprod);

            return $respuesta;
        }
    }
    
}
?>