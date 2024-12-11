<?php
require_once '../../Conexion/conexion.php';
require "../Controller/prodsAdminController.php";
require "../Model/prodsAdminModel.php";

?>
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
        <!-- loader  -->
    
        <!-- end loader -->
        <!-- header -->
        <header>
            <div class="header">
                <div class="container-fluid">
                    <div class="row d-flex justify-content-between align-items-center">
                        <div class="col-xl-3 col-lg-3 col-md-3 col-sm-3 logo_section">
                            <div class="full">
                                <div class="center-desk">
                                    <div class="logo">
                                        <a href="index.php"><img src="../../html/images/logo.png" alt="#" /></a>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="salida">
                            <a href="../../html/gestionProductos.php"><svg xmlns="http://www.w3.org/2000/svg" width="35" height="35" fill="currentColor" class="bi bi-arrow-left-circle" viewBox="0 0 16 16">
                            <path fill-rule="evenodd" d="M1 8a7 7 0 1 0 14 0A7 7 0 0 0 1 8m15 0A8 8 0 1 1 0 8a8 8 0 0 1 16 0m-4.5-.5a.5.5 0 0 1 0 1H5.707l2.147 2.146a.5.5 0 0 1-.708.708l-3-3a.5.5 0 0 1 0-.708l3-3a.5.5 0 1 1 .708.708L5.707 7.5z"/>
                            </svg>Volver</a>
                        </div>
                    </div>
                </div>
            </div>
        </header>

        <section id="DelProdBody">
        <div class="prods">
            <div class="container-fluid">
                <div class="row">
                <?php 
                $op = new ControllerProductos();
                $productos = $op->ctrTraerRegistros();
                
                foreach ($productos as $producto): ?>
                <div class="col-xl-3 col-lg-3 col-md-6 col-sm-6">
                    <div class="prods_box">
                        <figure><img src="<?php echo '../../html/'.htmlspecialchars($producto['imagen']); ?>" style="width: 325px;height:250px;" alt="#"/></figure>
                        <h3><span class="blu">$</span><?php echo htmlspecialchars($producto['precio']); ?></h3>
                        <p><?php echo htmlspecialchars($producto['nombre_prod']); ?></p>
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
                            <li><a href="#"><i class="fa fa-map-marker" aria-hidden="true"></i></a><br> Location</li>
                            <li><a href="#"><i class="fa fa-phone" aria-hidden="true"></i></a><br> +01 1234567890</li>
                            <li><a href="#"><i class="fa fa-envelope" aria-hidden="true"></i></a><br> demo@gmail.com</li>
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