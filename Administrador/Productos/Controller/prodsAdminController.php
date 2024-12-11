
<?php 
class ControllerProductos
{
    static public function ctrAgregarProductos(){
        if(isset($_POST['AgregarProducto'])) {
            $tabla = "productos";

            $datos=array(
                "nombreprod"=>$_POST['nombreprod'],
                "descripcion"=>$_POST['descripcion'],
                "precio"=>$_POST['precio'],
                "imagen"=>$_POST['imagen']);

            $resultado=ModelProductos::mdlAgregarProducto($tabla, $datos); 

            return $resultado;
        }
    }

    static public function ctrEliminarProductos(){
        if(isset($_POST['eliminar'])) {
            $idprod = $_POST['idprod'];
            $resultado = ModelProductos::mdlEliminarProductos($idprod);
            
            return $resultado;
        }
    }

    public function ctrTraerRegistros(){
        $tabla = "productos";
    
        $respuesta = ModelProductos::seleccionarRegistros($tabla);
    
        return $respuesta;
    }

    public function ctrTraerRegistrosUpd($idprod) {
        $resultado = ModelProductos::seleccionarProductoPorId($idprod);
        
        if (is_array($resultado) && !empty($resultado)) {
            return $resultado;
        } else {
            return [];
        }
    }

    public function ctrActualizarProducto() {
        if (isset($_POST['ActualizarProducto'])) {
            $tabla = "productos";
            $datos = array(
                "idprod" => $_POST['prod'],
                "nombreprod" => isset($_POST['nombreprod']) ? $_POST['nombreprod'] : null,
                "descripcion" => isset($_POST['descripcion']) ? $_POST['descripcion'] : null,
                "precio" => isset($_POST['precio']) ? $_POST['precio'] : null,
                "imagen" => isset($_POST['imagen']) ? $_POST['imagen'] : null
            );

            // Llama al método de actualización del modelo
            $resultado = ModelProductos::mdlActualizarProducto($tabla, $datos);

            return $resultado;
        }
    }
}
?>

