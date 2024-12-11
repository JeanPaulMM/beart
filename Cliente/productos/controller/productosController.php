<?php
class ControladorProductos
{
    public function ctrTraerRegistros(){
        $tabla = "productos";
    
        $respuesta = ModeloProductos::seleccionarRegistros($tabla);
    
        return $respuesta;
    }
    
    public function ctrRegCarrito()
    {
        if(isset($_POST["usuarioOn"]))
        {   
            $id_usuario = $_POST["usuarioOn"];
            $tabla = "carrito";
            $columna = "id_carrito";
            $carritoExistente = ModeloProductos::mdlVerificarCarrito($tabla, $id_usuario);

            if(isset($_POST["cantidad"])){
                $cantidad=$_POST["cantidad"];
            }

            if(isset($_POST["prod"])){
                $producto=$_POST["prod"];
            }

            if ($carritoExistente) {
                // Asegúrate de que el índice correcto se esté utilizando
                $idcarrito = intval($carritoExistente["id_carrito"]);
            } else {
                $datos = array("id_usuario" => $id_usuario);
                ModeloProductos::mdlCrearCarrito($tabla, $datos);
                $idcar = ModeloProductos::mdlMostrarUltimo($tabla, $columna);
                
                $idcarrito = intval($idcar["id_carrito"]);
            }

            $datosCarritoProducto = array(
                "id_carrito" => $idcarrito,
                "id_producto" => $producto,
                "cantidad" => $cantidad
            );
            $respuesta = ModeloProductos::mdlInsertarCarritoProducto("carrito_productos", $datosCarritoProducto);

            return $respuesta;
        }
    }
}
?>