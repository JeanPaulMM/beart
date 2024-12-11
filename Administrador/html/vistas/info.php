<?php
session_start();

if (isset($_GET['cerrars'])) {
   session_unset();
   session_destroy();
   header("Location: ../login/view/loginview.php");
   exit();
}

if(isset($_SESSION['usuarioConectado'])){
$user = $_SESSION["usuarioConectado"];
$iduser=$_SESSION['id_usuario'];
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
      <!-- style css -->
      <link rel="stylesheet" href="../css/style.css">
      <!-- Responsive-->
      <link rel="stylesheet" href="../css/responsive.css">
      <!-- fevicon -->
      <link rel="icon" href="images/fevicon.png" type="image/gif" />
      <!-- Scrollbar Custom CSS -->
      <link rel="stylesheet" href="css/jquery.mCustomScrollbar.min.css">
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
                              <a href="index.php"><img src="images/logo.png" alt="#" /></a>
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
                                 <a class="nav-link" href="index.php">Principal</a>
                              </li>
                              <li class="nav-item">
                                 <a class="nav-link" href="gestionProductos.php">Gestion productos</a>
                              </li>
                              <li class="nav-item">
                                 <a class="nav-link" href="usuPedidos.php">Usuarios/Pedidos</a>
                              </li>
                              <li class="nav-item">
                                 <a class="nav-link" href="informesEstadisticas.php">Informes/Estadisticas</a>
                              </li>
                              <li class="nav-item active">
                                 <a class="nav-link" href="info.php">Info</a>
                              </li>
                              <li class="nav-item d_none sea_icon">
                                 <a class="nav-link" href="?cerrars=true"><svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" fill="currentColor" class="bi bi-box-arrow-right" viewBox="0 0 16 16">
                                 <path fill-rule="evenodd" d="M10 12.5a.5.5 0 0 1-.5.5h-8a.5.5 0 0 1-.5-.5v-9a.5.5 0 0 1 .5-.5h8a.5.5 0 0 1 .5.5v2a.5.5 0 0 0 1 0v-2A1.5 1.5 0 0 0 9.5 2h-8A1.5 1.5 0 0 0 0 3.5v9A1.5 1.5 0 0 0 1.5 14h8a1.5 1.5 0 0 0 1.5-1.5v-2a.5.5 0 0 0-1 0z"/>
                                 <path fill-rule="evenodd" d="M15.854 8.354a.5.5 0 0 0 0-.708l-3-3a.5.5 0 0 0-.708.708L14.293 7.5H5.5a.5.5 0 0 0 0 1h8.793l-2.147 2.146a.5.5 0 0 0 .708.708z"/>
                                 </svg></a>
                              </li>
                           </ul>
                        </div>
                     </nav>
                  </div>
               </div>
            </div>
         </div>
      </header>
      <section id="info">
        <div class="container containerinfo">
            <div class="recuadro">
               <div class="titulodiv">
                  <h1 class="titulo">Informacion Administrativa</h1>
               </div>
               <div class="bodyinfo contgencar overflow-auto">
                  <p>
                  La vista de administrador de tu programa está diseñada para proporcionar un control completo y eficiente sobre la gestión de tu página web. Este panel integral permite a los administradores realizar diversas tareas críticas para mantener y optimizar la plataforma. A continuación se detallan las funcionalidades principales:
                  <br><br>

                  <span class="bold">1. Gestión de Productos:</span>
                  <br><br>
                  <span>Agregar Productos:</span> Permite a los administradores introducir nuevos productos en la página web, incluyendo detalles como nombre, descripción, precio, imágenes y categorías.
                  <br>
                  <span>Actualizar Productos:</span> Facilita la modificación de información de productos existentes, asegurando que todos los datos estén actualizados y correctos.
                  <br>
                  <span>Eliminar Productos:</span> Ofrece la opción de eliminar productos que ya no están disponibles o que se deseen retirar de la tienda.
                  <br><br>

                  <span class="bold">2. Visibilidad de Usuarios y Pedidos:</span>
                  <br><br>
                  <span>Ver Usuarios:</span> Proporciona una vista completa de todos los usuarios registrados en la plataforma, con la opción de ver detalles como información de contacto y actividad reciente.
                  <br>
                  <span>Ver Pedidos:</span> Muestra un historial detallado de pedidos realizados, permitiendo a los administradores revisar el estado de cada uno, desde la recepción hasta la entrega.
                  <br><br>

                  <span class="bold">3. Informacion Estadistica de la Pagina:</span>
                  <br><br>
                  <span>Informes y Estadísticas:</span> Proporciona herramientas para generar informes y estadísticas sobre ventas, comportamiento de usuarios y otras métricas clave.
                  <br><br>

                  La vista de administrador está diseñada para ser intuitiva y fácil de usar, con un enfoque en la eficiencia y la simplicidad. Cada sección está claramente organizada y accesible, permitiendo a los administradores gestionar todos los aspectos de la página web con facilidad.
                  </p>
               </div>
            </div>
        </div>
      </section>
      <!-- end footer -->
      <!-- Javascript files-->
      <script src="js/jquery.min.js"></script>
      <script src="js/popper.min.js"></script>
      <script src="js/bootstrap.bundle.min.js"></script>
      <script src="js/jquery-3.0.0.min.js"></script>
      <!-- sidebar -->
      <script src="js/jquery.mCustomScrollbar.concat.min.js"></script>
      <script src="js/custom.js"></script>
   </body>
</html>