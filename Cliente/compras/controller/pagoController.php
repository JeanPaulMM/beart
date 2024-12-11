<?php
require '../model/pagoModel.php';

class ControladorPago
{
    public function ctrTraerRegistros($prod) {
        $tablas = array(
            "carrito" => "carrito",
            "carritoprod" => "carrito_productos",
            "productos" => "productos",
            "personalizacion" => "personalizaciones"
        );
        
        $respuesta = ModeloPago::seleccionarRegistros($tablas, $prod);
        return $respuesta;
    }

    public function ctrEliminarCarrito($idprodcar){
        $respuesta = ModeloPago::EliminarCarProd($idprodcar);
        
        return $respuesta;
    }

    public function ctrSubirPedido($user){
        $respuesta = ModeloPago::SubirPedido($user);

        return $respuesta;
    }
}
?>