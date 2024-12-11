<?php
require '../Controller/prodsAdminController.php';
require '../Model/prodsAdminModel.php';

$idprod = $_GET['idprod'];

$opupd = new ControllerProductos;
$prod = $opupd->ctrTraerRegistrosUpd($idprod);
$opupd->ctrActualizarProducto();

if (is_array($prod)) {
?>
<html>
    <div class="modal-header">
        <h1 class="modal-title fs-5" id="exampleModalLabel"><b>Actualizar Producto</b></h1>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
    </div>
    <form method="POST">
        <div id="modalbodyupd" class="modal-body">
            <input type="hidden" id="productId" name="prod" value="<?php echo htmlspecialchars($prod['id_producto']); ?>">
            <label><strong>Nombre del Producto</strong></label><br>
            <input class="fieldagrprod" type="text" name="nombreprod" value="<?php echo htmlspecialchars($prod['nombre_prod']); ?>"><br>
            <label><strong>Descripcion</strong></label><br>
            <textarea class="fieldagrprod desc" name="descripcion"><?php echo htmlspecialchars($prod['descripcion']); ?></textarea><br>
            <label><strong>Precio</strong></label><br>
            <input class="fieldagrprod" type="number" name="precio" value="<?php echo htmlspecialchars($prod['precio']); ?>"><br>
            <label><strong>Ruta/Nombre de la imagen</strong><br>(Asegurese de guardarla en la carpeta)</label><br>
            <input class="fieldagrprod" type="text" name="imagen" value="<?php echo htmlspecialchars($prod['imagen']); ?>"><br>
        </div>
        <div class="modal-footer">
            <button type="submit" class="btn btn-primary botonagregarprod" name="ActualizarProducto">Actualizar</button>
        </div>
    </form>
</html>
<?php
} else {
    echo "Error: No se encontró el producto o el formato de datos es incorrecto.";
}
?>