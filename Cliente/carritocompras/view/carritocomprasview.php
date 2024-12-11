<?php
session_start();

require "../controller/carritocontroller.php";
require "../model/carritomodel.php";

if (isset($_GET['cerrars'])) {
  session_unset();
  session_destroy();
  header("Location: ../../login/view/loginview.php");
  exit();
}

if(isset($_SESSION['usuarioConectado'])){
  $user = $_SESSION["usuarioConectado"];
  $iduser = $_SESSION['id_usuario'];
}

$operador = new ControladorCarrito();
$operador -> ctrRegistroCarrito();
$operador -> ctrEliminarCarProd();
$productos = $operador -> ctrTraerRegistros($iduser);

$num_car = count($productos);

// Establecer la clase CSS basada en el número de productos
if ($num_car > 10) {
    $fontClass = 'large-font';
} elseif ($num_car > 5) {
    $fontClass = 'medium-font';
} else {
    $fontClass = 'small-font';
}
?>

<!DOCTYPE html>
<html lang="en">
  <head>
    <!-- basic -->
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <!-- mobile metas -->
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="viewport" content="initial-scale=1, maximum-scale=1">
    <!-- site metas -->
    <title>sungla</title>
    <meta name="keywords" content="">
    <meta name="description" content="">
    <meta name="author" content="">
    <!-- bootstrap css -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <link rel="stylesheet" href="../../html/css/bootstrap.min.css">
    <!-- style css -->
    <link rel="stylesheet" href="../../html/css/style.css">
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
  </head>
  <!-- body -->
  <body class="main-layout position_head">
      <!-- end loader -->
      <!-- header -->
    <header>
        <!-- header inner -->
      <div class="header">
        <div class="container-fluid">
          <div class="row">
            <div class="col-xl-3 col-lg-3 col-md-3 col-sm-3 col logo_section">
                <div class="full">
                  <div class="center-desk">
                    <div class="logo">
                      <a href="index.php"><img src="../../html/images/LOGOBEART.png" style="height:100px;width:100px" alt="#" /></a>
                    </div>
                  </div>
                </div>
            </div>
            <div class="col-xl-9 col-lg-9 col-md-9 col-sm-9">
                <nav class="navigation navbar navbar-expand-md navbar-dark ">
                  <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarsExample04" aria-controls="navbarsExample04" aria-expanded="false" aria-label="Toggle navigation">
                  <span class="navbar-toggler-icon"></span>
                  </button>
                  <div class="collapse navbar-collapse" id="navbarsExample04">
                    <ul class="navbar-nav mr-auto">
                      <li class="nav-item">
                          <a class="nav-link" href="../../html/index.php">Principal</a>
                      </li>
                      <li class="nav-item">
                          <a class="nav-link" href="../../html/nosotros.php">Info</a>
                      </li>
                      <li class="nav-item">
                          <a class="nav-link" href="../../html/productos.php">Productos</a>
                      </li>
                      <li class="nav-item">
                          <a class="nav-link" href="../../html/personalizacion.php">personalizacion</a>
                      </li>
                      <li class="nav-item">
                          <a class="nav-link" href="../../html/contactenos.php">Contactenos</a>
                      </li>
                      <li class="nav-item active">
                          <a class="nav-link" href="#"><svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" fill="currentColor" class="bi bi-cart3" viewBox="0 0 16 16">
                          <path d="M0 1.5A.5.5 0 0 1 .5 1H2a.5.5 0 0 1 .485.379L2.89 3H14.5a.5.5 0 0 1 .49.598l-1 5a.5.5 0 0 1-.465.401l-9.397.472L4.415 11H13a.5.5 0 0 1 0 1H4a.5.5 0 0 1-.491-.408L2.01 3.607 1.61 2H.5a.5.5 0 0 1-.5-.5M3.102 4l.84 4.479 9.144-.459L13.89 4zM5 12a2 2 0 1 0 0 4 2 2 0 0 0 0-4m7 0a2 2 0 1 0 0 4 2 2 0 0 0 0-4m-7 1a1 1 0 1 1 0 2 1 1 0 0 1 0-2m7 0a1 1 0 1 1 0 2 1 1 0 0 1 0-2"/>
                          </svg></a>
                      </li>
                      <?php if(isset($_SESSION['usuarioConectado'])){ ?>
                      <li class="nav-item d_none sea_icon">
                          <a class="nav-link" href="?cerrars=true"><svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" fill="currentColor" class="bi bi-box-arrow-right" viewBox="0 0 16 16">
                          <path fill-rule="evenodd" d="M10 12.5a.5.5 0 0 1-.5.5h-8a.5.5 0 0 1-.5-.5v-9a.5.5 0 0 1 .5-.5h8a.5.5 0 0 1 .5.5v2a.5.5 0 0 0 1 0v-2A1.5 1.5 0 0 0 9.5 2h-8A1.5 1.5 0 0 0 0 3.5v9A1.5 1.5 0 0 0 1.5 14h8a1.5 1.5 0 0 0 1.5-1.5v-2a.5.5 0 0 0-1 0z"/>
                          <path fill-rule="evenodd" d="M15.854 8.354a.5.5 0 0 0 0-.708l-3-3a.5.5 0 0 0-.708.708L14.293 7.5H5.5a.5.5 0 0 0 0 1h8.793l-2.147 2.146a.5.5 0 0 0 .708.708z"/>
                          </svg></a>
                      </li>
                      <?php
                      }
                        if(!isset($_SESSION['usuarioConectado'])){ ?>
                      <li class="nav-item d_none login_btn">
                          <a class="nav-link" href="../login/view/loginview.php">Login</a>
                      </li>
                      <?php } ?>
                    </ul>
                  </div>
                </nav>
              </div>
            </div>
          </div>
        </div>
      </header>
      <section id="CarritoBody">
        <?php
        $num_car = count($productos);
        $prod_por_fila = 3;
        $prod_count = 0;
        if ($num_car==0){ ?>
          <h1 class="aviso">NO TIENES NINGUN PRODUCTO EN TU CARRITO, AUN c;</h1>
        <?php
        }
        ?>
          <div class="prods">
            <div class="container">
              <div class="row">
                  <div class="col-md-10 offset-md-1">
                    <div class="titlepage">
                        <h2>Bienvenido a tu carrito de compras</h2>
                        <p>Aqui encontraras todo lo que quieres o en algun momento quiziste comprar.</p>
                    </div>
                  </div>
              </div>
            </div>
            <div class="container-fluid separadorprods">
              <div class="row">
                <?php 
                foreach ($productos as $producto):
                  $idcarproducto = $producto["id_carrito_producto"];
                  $fontSizeClass = '';
                  
                  // Asignar la clase CSS basada en el tamaño
                  switch ($producto['tamano']) {
                      case 'pequeño':
                          $fontSizeClass = 'font-small';
                          break;
                      case 'medio':
                          $fontSizeClass = 'font-medium';
                          break;
                      case 'grande':
                          $fontSizeClass = 'font-large';
                          break;
                      default:
                          $fontSizeClass = 'font-medium'; // Valor por defecto si no coincide
                          break;
                  }
              ?>
              <div class="col-xl-3 col-lg-3 col-md-6 col-sm-6">
                  <div class="prods_box carritopbc">
                      <div class="about_img">
                          <div class="container lapiz">
                              <figure>
                                  <h1 class="<?php echo $fontSizeClass; ?>" style="color:<?php echo $producto['color']; ?>; font-family:<?php echo $producto['fuente']; ?>;">
                                    <?php echo $producto['mensaje']; ?>
                                  </h1>
                              </figure>
                          </div>
                      </div>
                      <p><?php echo htmlspecialchars($producto['nombre_prod']); ?></p>
                      <div class="producto-personalizacion" hidden>
                          <div>Mensaje: <?php echo $producto['mensaje']; ?></div>
                          <div>Color: <?php echo $producto['color']; ?></div>
                          <div>Fuente: <?php echo $producto['fuente']; ?></div>
                          <div>Tamaño: <?php echo $producto['tamano']; ?></div>
                      </div>
                      <p>Cantidad: <?php echo htmlspecialchars($producto['cantidad']); ?></p><br>
                      <form method="post">
                          <div class="btnes d-grid gap-2 col-8 mx-auto">
                              <a href="../../compras/view/vistaPago.php?user=<?php echo $iduser; ?>&producto=<?php echo $idcarproducto; ?>" class="btn btn-success">
                                  <!-- SVG icon for payment button -->
                                  Proceder al Pago
                              </a>
                              <input type="hidden" name="producto_id" value="<?php echo $producto['id_carrito_producto']; ?>">
                              <button type="submit" class="btn btn-danger" name="eliminar" value="1">
                                  <!-- SVG icon for delete button -->
                                  Eliminar
                              </button>
                          </div>
                      </form>
                  </div>
                </div>
              <?php endforeach; ?>
              </div>
            </div>
          </div>
      </section>
      <footer>
          <div class="footer">
            <div class="container">
                <div class="row">
                  <div class="col-md-8 offset-md-2">
                      <ul class="location_icon">
                          <li><a href="#"><i class="fa fa-phone" aria-hidden="true"></i></i></a><br>Tel 602 6637174</li>
                          <li><a href="#"><svg xmlns="http://www.w3.org/2000/svg" width="33" height="40" fill="currentColor" class="bi bi-phone-fill" viewBox="0 0 16 16">
                          <path d="M3 2a2 2 0 0 1 2-2h6a2 2 0 0 1 2 2v12a2 2 0 0 1-2 2H5a2 2 0 0 1-2-2zm6 11a1 1 0 1 0-2 0 1 1 0 0 0 2 0"/>
                          </svg></a><br> +57 320 781 3837</li>
                          <li><a href="https://www.instagram.com/creacionesbeart/"><svg xmlns="http://www.w3.org/2000/svg" width="30" height="30" fill="currentColor" class="bi bi-instagram" viewBox="0 0 16 16">
                          <path d="M8 0C5.829 0 5.556.01 4.703.048 3.85.088 3.269.222 2.76.42a3.9 3.9 0 0 0-1.417.923A3.9 3.9 0 0 0 .42 2.76C.222 3.268.087 3.85.048 4.7.01 5.555 0 5.827 0 8.001c0 2.172.01 2.444.048 3.297.04.852.174 1.433.372 1.942.205.526.478.972.923 1.417.444.445.89.719 1.416.923.51.198 1.09.333 1.942.372C5.555 15.99 5.827 16 8 16s2.444-.01 3.298-.048c.851-.04 1.434-.174 1.943-.372a3.9 3.9 0 0 0 1.416-.923c.445-.445.718-.891.923-1.417.197-.509.332-1.09.372-1.942C15.99 10.445 16 10.173 16 8s-.01-2.445-.048-3.299c-.04-.851-.175-1.433-.372-1.941a3.9 3.9 0 0 0-.923-1.417A3.9 3.9 0 0 0 13.24.42c-.51-.198-1.092-.333-1.943-.372C10.443.01 10.172 0 7.998 0zm-.717 1.442h.718c2.136 0 2.389.007 3.232.046.78.035 1.204.166 1.486.275.373.145.64.319.92.599s.453.546.598.92c.11.281.24.705.275 1.485.039.843.047 1.096.047 3.231s-.008 2.389-.047 3.232c-.035.78-.166 1.203-.275 1.485a2.5 2.5 0 0 1-.599.919c-.28.28-.546.453-.92.598-.28.11-.704.24-1.485.276-.843.038-1.096.047-3.232.047s-2.39-.009-3.233-.047c-.78-.036-1.203-.166-1.485-.276a2.5 2.5 0 0 1-.92-.598 2.5 2.5 0 0 1-.6-.92c-.109-.281-.24-.705-.275-1.485-.038-.843-.046-1.096-.046-3.233s.008-2.388.046-3.231c.036-.78.166-1.204.276-1.486.145-.373.319-.64.599-.92s.546-.453.92-.598c.282-.11.705-.24 1.485-.276.738-.034 1.024-.044 2.515-.045zm4.988 1.328a.96.96 0 1 0 0 1.92.96.96 0 0 0 0-1.92m-4.27 1.122a4.109 4.109 0 1 0 0 8.217 4.109 4.109 0 0 0 0-8.217m0 1.441a2.667 2.667 0 1 1 0 5.334 2.667 2.667 0 0 1 0-5.334"/>
                          </svg></a><br> click aqui</li>
                      </ul>
                  </div>
                </div>
            </div>
            <div class="copyright">
                <div class="container">
                  <div class="row">
                      <div class="col-md-12">
                        <p>© 2019 All Rights Reserved. Design by<a href="https://html.design/"> Free Html Templates</a></p>
                      </div>
                  </div>
                </div>
            </div>
          </div>
      </footer>
      <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Título del Modal</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body" id="modal-body-content">
                  
                </div>
            </div>
        </div>
      </div>
      <script>
        document.addEventListener('DOMContentLoaded', function () {
            var detalleLinks = document.querySelectorAll('.verdetalles');

            detalleLinks.forEach(function (link) {
                link.addEventListener('click', function () {
                    var value = this.getAttribute('data-value');
                    
                    var modalContent = document.getElementById('modalContent');
                    modalContent.textContent = 'Valor recibido: ' + value;
                });
            });
        });
      </script>
      <script src="../../html/js/misjs/funcionesgenerales.js"></script>
      <script src="../../html/js/misjs/funcionescarrito.js"></script>
      <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
      <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.8/dist/umd/popper.min.js" integrity="sha384-I7E8VVD/ismYTF4hNIPjVp/Zjvgyol6VFvRkX/vR+Vc4jQkC+hVqc2pM8ODewa9r" crossorigin="anonymous"></script>
      <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.min.js" integrity="sha384-0pUGZvbkm6XF6gxjEnlmuGrJXVbNuzT9qBBavbLwCsOGabYfZo0T0to5eqruptLy" crossorigin="anonymous"></script>
      <script src="../../html/js/jquery.min.js"></script>
      <script src="../../html/js/popper.min.js"></script>
      <script src="../../html/js/bootstrap.bundle.min.js"></script>
      <script src="../../html/js/jquery-3.0.0.min.js"></script>
      <!-- sidebar -->
      <script src="../../html/js/jquery.mCustomScrollbar.concat.min.js"></script>
      <script src="../../html/js/custom.js"></script>
  </body>
</html>