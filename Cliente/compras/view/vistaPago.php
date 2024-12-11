<?php
require '../controller/pagoController.php';

$iduser = $_GET['user'];
$idprodcar = $_GET['producto'];

$_SESSION['idprodcar'] = $idprodcar;

$op=new ControladorPago();
$productos=$op->ctrTraerRegistros($idprodcar);

require '../../../vendor/autoload.php';

// Configurar MercadoPago con el Token de Acceso de prueba
MercadoPago\SDK::setAccessToken('APP_USR-5674794408748672-091616-69151547498cf3cda2fbb6f0e44a5ec9-1994972296');

// Crear una preferencia de pago
$preference = new MercadoPago\Preference();

// Configurar URLs de retorno
$preference->back_urls = array(
    "success" => "notificaciones.php",
    "failure" => "../../carritocompras/view/carritocomprasview.php"
);

    foreach ($productos as $producto => $prods) {
        $item = new MercadoPago\Item();
        $item->title = $prods['nombre_prod']; // Nombre del producto
        $item->quantity = $prods['cantidad']; // Cantidad
        $item->unit_price = $prods['precio']; // Precio unitario
        $item->currency_id = "COP"; // Usar "COP" para pesos colombianos
        $items[] = $item;
    }

$preference->items = $items;

$preference->save();

?>
<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="utf-8">
<meta http-equiv="X-UA-Compatible" content="IE=edge">
<meta name="viewport" content="width=device-width, initial-scale=1">
<title>sungla</title>
<!-- bootstrap css -->
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
<link rel="stylesheet" href="css/bootstrap.min.css">
<!-- style css -->
<link href="../../html/css/style.css" rel="stylesheet">
<!-- Responsive-->
<link rel="stylesheet" href="../../html/css/responsive.css">
<!-- fevicon -->
<link rel="icon" href="../../html/images/fevicon.png" type="image/gif" />
<!-- Scrollbar Custom CSS -->
<link rel="stylesheet" href="../../html/css/jquery.mCustomScrollbar.min.css">
<!-- Tweaks for older IEs-->
<link rel="stylesheet" href="https://netdna.bootstrapcdn.com/font-awesome/4.0.3/css/font-awesome.css">
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/fancybox/2.1.5/jquery.fancybox.min.css" media="screen">
<!--[if lt IE 9]>
<script src="https://oss.maxcdn.com/html5shiv/3.7.3/html5shiv.min.js"></script>
<script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script><![endif]-->
<style>
    .formulario {
        border: 1px solid #ddd;
        border-radius: 5px;
        margin-bottom: 20px;
        overflow: hidden;
        transition: height 0.3s ease;
    }

    .header-form {
        background-color: #f8f9fa;
        padding: 10px;
        cursor: pointer;
    }

    .body-form {
        padding: 20px;
    }

    .formulario.minimized {
        height: 50px; /* Altura del encabezado */
    }

    .formulario.expanded {
        height: auto;
    }

    #form-checkout {
      display: flex;
      flex-direction: column;
      max-width: 600px;
    }

    .contpago {
      height: 18px;
      display: inline-block;
      border: 1px solid rgb(118, 118, 118);
      border-radius: 2px;
      padding: 1px 2px;
    }
    
</style>
</head>
<body>

<script src="https://sdk.mercadopago.com/js/v2"></script>
<script>
    const mp = new MercadoPago('APP_USR-4bcb167d-4154-4d36-bf85-581d96272089', {
        locale: 'es-CO'
    });
    const checkout= mp.checkout({
        preference:{
            id='<?php echo $preference->id;?>'
        },
        render:{
            container: '.btnPagar',
            label: 'Pagar',
        }
    });
</script>
<header>
    <div class="headerpago">
        <div class="container-fluid">
            <div class="row">
                <div class="col-xl-3 col-lg-3 col-md-3 col-sm-3 col logo_section">
                    <div class="full">
                        <div class="center-desk">
                            <div class="logo">
                                <a href="../../html/index.php"><img src="../../html/images/LOGOBEART.png" style="height:100px;width:100px" alt="#"/></a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</header>
<div id="bodypago" class="bodycontent">
    <div class="container container-form">
        <div class="formulario" id="form1Content">
            <div class="header-form">
                <h2 style="padding:0;">Datos personales</h2>
            </div>
            <div class="body-form">
                <form method="POST">
                    <div class="direccion" id="detallesPago">
                        <label for="direccion">Digite su direccion</label><br>
                        <input type="text" class="form-control" id="direccion" name="direccion" required><br>
                        <label for="adicional">Informacion adicional (Opcional)</label><br>
                        <input type="text" class="form-control" id="adicional" name="adicional"><br>
                    </div>
                    <div class="informacion-comprador">
                        <label>Nombre Completo</label><br>
                        <input type="text" class="form-control" id="nombre" name="nombre" required><br>
                        <label>Telefono</label><br>
                        <input type="number" class="form-control" id="tel" name="tel" required><br>
                        <label>Correo Electronico</label><br>
                        <input type="email" class="form-control" id="email" name="email" required>
                    </div>
                    <div class="btn-seguir">
                        <button type="button" id="continuar" class="btn btn-secondary" onclick="showPaymentForm()" disabled>Continuar</button>
                    </div>
                </form>
            </div>
        </div>
        <div class="formulario" id="form2Content" style="overflow:hidden; height:50px;" class="minimized">
            <div class="header-form">
                <h2 style="padding:0;">Metodo de Pago</h2>
            </div>
            <a href="<?php echo $preference->init_point?>" style="width:100%" class="btn btn-secondary">Pagar</a>
        </div>
    </div>
</div>
<script src="js/jquery.min.js"></script>
<script src="js/popper.min.js"></script>
<script src="js/bootstrap.bundle.min.js"></script>
<script src="js/jquery-3.0.0.min.js"></script>
<!-- sidebar -->
<script src="js/jquery.mCustomScrollbar.concat.min.js"></script>
<script src="js/custom.js"></script>
<script type="text/javascript" src="js/misjs/funcionesgenerales.js"></script>
<script>
    function showPaymentForm() {
        document.getElementById('form1Content').classList.remove('expanded');
        document.getElementById('form1Content').classList.add('minimized');
        document.getElementById('form2Content').classList.remove('minimized');
        document.getElementById('form2Content').classList.add('expanded');
        document.getElementById('form2Content').style.height = 'auto';
    }

    function goBack() {
        document.getElementById('form2Content').classList.remove('expanded');
        document.getElementById('form2Content').classList.add('minimized');
        document.getElementById('form1Content').classList.remove('minimized');
        document.getElementById('form1Content').classList.add('expanded');
        document.getElementById('form1Content').style.overflow = 'auto';// Ensure scroll if needed
        document.getElementById('form2Content').style.height = '50px';
    }

    function checkFormCompletion() {
        // Obtener los elementos del formulario
        const direccion = document.getElementById('direccion').value.trim();
        const nombre = document.getElementById('nombre').value.trim();
        const telefono = document.getElementById('tel').value.trim();
        const email = document.getElementById('email').value.trim();
        
        // Verificar si los campos obligatorios están completos
        const allRequiredFilled = direccion !== '' &&
                                    nombre !== '' &&
                                    telefono !== '' &&
                                    email !== '';
        
        // Habilitar o deshabilitar el botón basado en la validación
        document.getElementById('continuar').disabled = !allRequiredFilled;
    }

    // Asignar la función de validación a los eventos de los campos
    document.getElementById('direccion').addEventListener('input', checkFormCompletion);
    document.getElementById('nombre').addEventListener('input', checkFormCompletion);
    document.getElementById('tel').addEventListener('input', checkFormCompletion);
    document.getElementById('email').addEventListener('input', checkFormCompletion);
</script>
</body>
</html>