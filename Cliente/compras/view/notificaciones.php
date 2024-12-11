<?php
session_start();
require '../../../vendor/autoload.php';
require '../controller/pagoController.php';

// Configurar MercadoPago con el Token de Acceso de prueba
MercadoPago\SDK::setAccessToken('YOUR_ACCESS_TOKEN');

// Verificar si hay un ID de pago en la solicitud
$data = json_decode(file_get_contents('php://input'), true);
$payment_id = $data['id']; // ID del pago recibido
$payment = MercadoPago\Payment::find_by_id($payment_id);

$ope = new ControladorPago();

if ($payment) {
    if ($payment->status === 'approved') {
        $user = $_SESSION['id_usuario'];
        $idcarrito = $_SESSION['idprodcar'];
        
        $ope->ctrEliminarCarrito($idcarrito);
        $ope->ctrSubirPedido($user);

        http_response_code(200);
    } else {
        
        http_response_code(400);
    }
} else {
    http_response_code(404);
}
?>