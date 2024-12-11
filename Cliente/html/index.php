<?php
session_start();

if (isset($_GET['cerrars'])) {
   session_unset();
   session_destroy();
   header("Location: ../login/view/loginview.php");
   exit();
}
 
require '../Conexion/conexion.php';
require_once "../productos/controller/productosController.php";
require_once "../productos/model/productosModel.php";

if(isset($_SESSION['usuarioConectado'])){
$user = $_SESSION["usuarioConectado"];
$iduser=$_SESSION['id_usuario'];
}

$op = new ControladorProductos();
$productos = $op->ctrTraerRegistros();
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
      <title>Titulo</title>

      <!-- <link rel="apple-touch-icon" href="assets/img/apple-icon.png">
      <link rel="shortcut icon" type="image/x-icon" href="assets/img/favicon.ico">-->

      <meta name="keywords" content="">
      <meta name="description" content="">
      <meta name="author" content="">
      <!-- bootstrap css -->
      <link rel="stylesheet" href="css/bootstrap.min.css">
      <!-- style css -->
      <link rel="stylesheet" href="css/style.css">
      <!-- Responsive-->
      <link rel="stylesheet" href="css/responsive.css">
      <!-- fevicon -->
      <link rel="icon" href="images/fevicon.png" type="image/gif" />
      <!-- Scrollbar Custom CSS -->
      <link rel="stylesheet" href="css/jquery.mCustomScrollbar.min.css">
      <!-- Tweaks for older IEs-->
      <link rel="stylesheet" href="https://netdna.bootstrapcdn.com/font-awesome/4.0.3/css/font-awesome.css">
      <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/fancybox/2.1.5/jquery.fancybox.min.css" media="screen">
      <link rel="stylesheet" href="../estilos/styles.css">
      <!--[if lt IE 9]>
      <script src="https://oss.maxcdn.com/html5shiv/3.7.3/html5shiv.min.js"></script>
      <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script><![endif]-->
   </head>
   <!-- body -->
   <body class="main-layout">
      <!-- loader  -->
      <div class="loader_bg">
         <div class="loader"><img src="images/loading.gif" alt="#" /></div>
      </div>
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
                              <a href="index.php"><img src="images/LOGOBEART.png" style="height:100px;width:100px" alt="#" /></a>
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
                              <li class="nav-item active">
                                 <a class="nav-link" href="index.php">Principal</a>
                              </li>
                              <li class="nav-item">
                                 <a class="nav-link" href="nosotros.php">Info</a>
                              </li>
                              <li class="nav-item">
                                 <a class="nav-link" href="productos.php">Productos</a>
                              </li>
                              <li class="nav-item">
                                 <a class="nav-link" href="personalizacion.php">personalizacion</a>
                              </li>
                              <li class="nav-item">
                                 <a class="nav-link" href="contactenos.php">Contactenos</a>
                              </li>
                              <?php if(isset($_SESSION['usuarioConectado'])){ ?>
                              <li class="nav-item">
                                 <a class="nav-link" href="../carritocompras/view/carritocomprasview.php"><svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" fill="currentColor" class="bi bi-cart3" viewBox="0 0 16 16">
                                 <path d="M0 1.5A.5.5 0 0 1 .5 1H2a.5.5 0 0 1 .485.379L2.89 3H14.5a.5.5 0 0 1 .49.598l-1 5a.5.5 0 0 1-.465.401l-9.397.472L4.415 11H13a.5.5 0 0 1 0 1H4a.5.5 0 0 1-.491-.408L2.01 3.607 1.61 2H.5a.5.5 0 0 1-.5-.5M3.102 4l.84 4.479 9.144-.459L13.89 4zM5 12a2 2 0 1 0 0 4 2 2 0 0 0 0-4m7 0a2 2 0 1 0 0 4 2 2 0 0 0 0-4m-7 1a1 1 0 1 1 0 2 1 1 0 0 1 0-2m7 0a1 1 0 1 1 0 2 1 1 0 0 1 0-2"/>
                                 </svg></a>
                              </li>
                              <?php 
                              }
                              if(isset($_SESSION['usuarioConectado'])){ ?>
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
      <!-- end header inner -->
      <!-- end header -->
      <!-- banner -->
      <section class="banner_main">
         <div id="banner1" class="carousel slide" data-ride="carousel">
            <ol class="carousel-indicators">
               <li data-target="#banner1" data-slide-to="0" class="active"></li>
               <li data-target="#banner1" data-slide-to="1"></li>
               <li data-target="#banner1" data-slide-to="2"></li>
            </ol>
            <div class="carousel-inner">
               <div class="carousel-item active">
                  <div class="container">
                     <div class="carousel-caption">
                        <div class="text-bg">
                           <h1> <span class="blu">Bienvenido <br></span>A nuestra web!</h1>
                           <figure><img src="images/portada.png" alt="#"></figure>
                           <a class="read_more" href="#personalizacion">Comprar Ahora</a>
                        </div>
                     </div>
                  </div>
               </div>
               <div class="carousel-item">
                  <div class="container">
                     <div class="carousel-caption">
                        <div class="text-bg">
                           <h1> <span class="blu">Echa un vistazo <br></span>a nuestros llaveros</h1>
                           <figure><img class="imagenllaveroportada" src="images/LLAVERO_MODELO2.png" alt="#"/></figure>
                           <a class="read_more" href="#prods">Ver más</a>
                        </div>
                     </div>
                  </div>
               </div>
            </div>
            <a class="carousel-control-prev" href="#banner1" role="button" data-slide="prev">
            <i class="fa fa-arrow-left" aria-hidden="true"></i>
            </a>
            <a class="carousel-control-next" href="#banner1" role="button" data-slide="next">
            <i class="fa fa-arrow-right" aria-hidden="true"></i>
            </a>
         </div>
      </section>
      <!-- end banner -->
      <!-- about section -->
      <div id="personalizacion" class="about">
         <div class="container">
            <div class="row d_flex formpers">
               <div class="col-md-7 gridlapiz">
                  <div class="about_img">
                     <div class="container lapiz">
                        <figure><p id='personaltext'></p></figure>
                     </div>
                  </div>
               </div>
               <div class="col-md-4">
                  <h2 class="tittleform">Personalización</h2>
                  <div class="formulario">
                     <form id="formpers" action="../carritocompras/view/carritopersview.php" method="POST">
                        <div>
                           <label class="labelpers">Prediseños</label>
                           <select class="selectfields" id="text-select">
                              <option value="" disabled selected>Selecciona una opción</option>
                              <option value="CRISTO TE AMA">CRISTO TE AMA</option>
                              <option value="LAS MUJERES SON COMO LAS FLORES">LAS MUJERES SON COMO LAS FLORES</option>
                              <option value="NUNCA RENDIRSE">NUNCA RENDIRSE</option>
                              <option value="DIOS MI LUZ Y SALVACION">DIOS MI LUZ Y SALVACION</option>
                              <option value="DIOS MI PROTECTOR">DIOS MI PROTECTOR</option>
                              <option value="Cali es Son, Salsa y Saber">Cali es Son, Salsa y Saber</option>
                              <option value="Cali, Oiga Mire Vea!">Cali, Oiga Mire Vea!</option>
                              <option value="CALI ES CALI LO DEMAS ES LOMA">CALI ES CALI LO DEMAS ES LOMA</option>
                              <option value="TODO COMIENZA CON UN SUEÑO">TODO COMIENZA CON UN SUEÑO</option>
                              <option value="UN DIA A LA VEZ">UN DIA A LA VEZ</option>
                              <option value="CONFIA EN EL PROCESO">CONFIA EN EL PROCESO</option>
                              <option value="SIN MIEDO AL EXITO">SIN MIEDO AL EXITO</option>
                           </select><br>
                        </div>
                        <div>
                           <input type="hidden" name="producto" value="1">
                           <label class="labelpers">Texto Personalizado</label><br>
                           <input class="fields" name="texto" type="text" id="textField" maxlength="30" oninput="updateLabel()" required><br>
                        </div>
                        <div>
                           <label class="labelpers">Fuente</label><br>
                           <select class="selectfields" id="fuentesel" name="fuente" onchange="updateStyles()" required>
                              <option value="">Selecciona una Fuente</option>
                              <option value="Times New Roman">Times New Roman</option>
                              <option value="Arial">Arial</option>
                              <option value="Franklin Gothic Medium">Franklin Gothic Medium</option>
                           </select><br>
                        </div>
                        <div>
                           <label class="labelpers">Tamaño de letra</label><br>
                           <select id="tamañoL" class="fields" name="tamanoL" onchange="updateStyles()" required>
                              <option value="pequeño">Pequeño</option>
                              <option value="medio">Medio</option>
                              <option value="grande">Grande</option>
                           </select><br>
                        </div>
                        <div>
                        <label class="labelpers">Color</label><br>
                           <input id="colorpick" class="color" type="color" name="color" onchange="updateStyles()"><br>
                        </div>
                           <?php if (isset($_SESSION['usuarioConectado'])) { ?>
                              <div class="contbtn">
                                 <button type="submit" class="read_more">Confirmar</button>
                              </div>
                           <?php } else { ?>
                              <a class="btn btn-secondary" style="margin-top:10px" href="../login/view/loginview.php">Confirmar</a>
                           <?php } ?>
                     </form>
                  </div>
               </div>
            </div>
         </div>
      </div>
      <div id="prods" class="prods">
         <div class="container">
            <div class="row">
               <div class="col-md-10 offset-md-1">
                  <div class="titlepage">
                     <h2>Productos</h2>
                     <p>
                        Descubre nuestra variada selección de productos, con la mejor relación calidad-precio. 
                        ¡Encuentra lo que necesitas y disfruta de una excelente experiencia de compra!
                     </p>
                  </div>
               </div>
            </div>
         </div>
         <div class="container-fluid">
            <div class="row">
               <?php
               $contador = 0; // Inicializa el contador
               foreach ($productos as $producto):
                  if ($contador >= 8) break; // Sale del bucle si se han mostrado 6 productos
               ?>
               <div class="col-xl-3 col-lg-3 col-md-6 col-sm-6">
                  <div class="prods_box">
                     <figure><img src="<?php echo htmlspecialchars($producto['imagen']); ?>" style="width: 325px;height:250px;" alt="#"/></figure>
                     <h3><span class="blu">$</span><?php echo htmlspecialchars($producto['precio']); ?></h3>
                     <p><?php echo htmlspecialchars($producto['nombre_prod']); ?></p>
                  </div>
               </div>
               <?php
                  $contador++; // Incrementa el contador después de mostrar un producto
               endforeach;
               ?>
               <div class="col-md-12">
                     <a class="read_more" href="productos.php">Ver Más</a>
               </div>
            </div>
         </div>
      </div>
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
      <!-- end footer -->
      <!-- Javascript files-->
      <script src="js/jquery.min.js"></script>
      <script src="js/popper.min.js"></script>
      <script src="js/bootstrap.bundle.min.js"></script>
      <script src="js/jquery-3.0.0.min.js"></script>
      <!-- sidebar -->
      <script src="js/jquery.mCustomScrollbar.concat.min.js"></script>
      <script src="js/custom.js"></script>
      <script type="text/javascript" src="js/misjs/funcionesgenerales.js"></script>
   </body>
</html>