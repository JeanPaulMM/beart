<?php
require '../Productos/Controller/prodsAdminController.php';
require '../Productos/Model/prodsAdminModel.php';

$ctrprd = new ControllerProductos;
$ctrprd->ctrAgregarProductos();
$ctrprd->ctrActualizarProducto();
$ctrprd->ctrEliminarProductos();
$productos = $ctrprd->ctrTraerRegistros();
//$actId=$ctrprd->ctrTraerRegistrosUpd();
//var_dump($productos);
var_dump($actId);
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
    <body class="main-layout position_head">
        <header>
            <!-- header inner -->
            <div class="header">
                <div class="container-fluid">
                    <div class="row">
                        <div class="col-xl-3 col-lg-3 col-md-3 col-sm-3 col logo_section">
                            <div class="full">
                                <div class="center-desk">
                                <h1 style="font-weight:bold; font-size:4vh;">Administracion</h1>
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
                                        <li class="nav-item active">
                                            <a class="nav-link" href="gestionProductos.php">Gestion productos</a>
                                        </li>
                                        <li class="nav-item">
                                            <a class="nav-link" href="usuPedidos.php">Usuarios/Pedidos</a>
                                        </li>
                                        <li class="nav-item">
                                            <a class="nav-link" href="rolesPermisos.php">Roles/Permisos</a>
                                        </li>
                                        <li class="nav-item">
                                            <a class="nav-link" href="informesEstadisticas.php">Informes/Estadisticas</a>
                                        </li>
                                        <li class="nav-item">
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
        <section id="bodygestionprod">
            <div class="titulogestion">
                <h1 class="titulo">Gestión Productos</h1>
            </div>
            <div class="container overflow-y-auto overflow-hidden" style="height:60vh;">
                <div class="add-button">
                    <button type="button" class="btn btn-dark"  data-bs-toggle="modal" data-bs-target="#grlModal">
                    <svg style="margin-bottom:3px" xmlns="http://www.w3.org/2000/svg" width="20" height="20" fill="currentColor" class="bi bi-plus-lg" viewBox="0 0 16 16">
                        <path fill-rule="evenodd" d="M8 2a.5.5 0 0 1 .5.5v5h5a.5.5 0 0 1 0 1h-5v5a.5.5 0 0 1-1 0v-5h-5a.5.5 0 0 1 0-1h5v-5A.5.5 0 0 1 8 2"/>
                        </svg> Agregar Producto
                    </button>
                </div>
                <table class="table table-light table-striped">
                    <tr>
                        <th>Codigo producto</th>
                        <th>Imagen de Referencia</th>
                        <th>Producto</th>
                        <th>Descripcion</th>
                        <th>Precio</th>
                        <th>Acciones</th>
                    </tr>
                    <?php
                    foreach ($productos as $product) {
                        echo '<form method="post">';
                        echo '<input type="hidden" name="idprod" value="'.$product['id_producto'].'">';
                        echo '<tr>
                            <td>'.$product['id_producto'].'</td>
                            <td><img style="width:100px;height:75px;" src="'.$product['imagen'].'"></td>
                            <td>'.$product['nombre_prod'].'</td>
                            <td>'.$product['descripcion'].'</td>
                            <td>'.$product['precio'].'</td>
                            <td>
                                <button type="button" data-bs-toggle="modal" data-bs-target="#updModal" class="btn btn-warning" name="actualizar" data-id="'.htmlspecialchars($product['id_producto']).'">
                                    <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-arrow-repeat" viewBox="0 0 16 16">
                                        <path d="M11.534 7h3.932a.25.25 0 0 1 .192.41l-1.966 2.36a.25.25 0 0 1-.384 0l-1.966-2.36a.25.25 0 0 1 .192-.41m-11 2h3.932a.25.25 0 0 0 .192-.41L2.692 6.23a.25.25 0 0 0-.384 0L.342 8.59A.25.25 0 0 0 .534 9"/>
                                        <path fill-rule="evenodd" d="M8 3c-1.552 0-2.94.707-3.857 1.818a.5.5 0 1 1-.771-.636A6.002 6.002 0 0 1 13.917 7H12.9A5 5 0 0 0 8 3M3.1 9a5.002 5.002 0 0 0 8.757 2.182.5.5 0 1 1 .771.636A6.002 6.002 0 0 1 2.083 9z"/>
                                    </svg>
                                </button>
                                <button type="submit" class="btn btn-danger" name="eliminar">
                                    <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-trash3" viewBox="0 0 16 16">
                                    <path d="M6.5 1h3a.5.5 0 0 1 .5.5v1H6v-1a.5.5 0 0 1 .5-.5M11 2.5v-1A1.5 1.5 0 0 0 9.5 0h-3A1.5 1.5 0 0 0 5 1.5v1H1.5a.5.5 0 0 0 0 1h.538l.853 10.66A2 2 0 0 0 4.885 16h6.23a2 2 0 0 0 1.994-1.84l.853-10.66h.538a.5.5 0 0 0 0-1zm1.958 1-.846 10.58a1 1 0 0 1-.997.92h-6.23a1 1 0 0 1-.997-.92L3.042 3.5zm-7.487 1a.5.5 0 0 1 .528.47l.5 8.5a.5.5 0 0 1-.998.06L5 5.03a.5.5 0 0 1 .47-.53Zm5.058 0a.5.5 0 0 1 .47.53l-.5 8.5a.5.5 0 1 1-.998-.06l.5-8.5a.5.5 0 0 1 .528-.47M8 4.5a.5.5 0 0 1 .5.5v8.5a.5.5 0 0 1-1 0V5a.5.5 0 0 1 .5-.5"/>
                                    </svg>
                                </button>
                            </td>
                            </tr>';
                        echo '</form>';
                    }
                    ?>
                </table>
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

        <!-- Modal -->
        <div class="modal fade" id="grlModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
            <div class="modal-dialog modal-dialog-centered">
                <div class="modal-content">
                    <div class="modal-header">
                        <h1 class="modal-title fs-5" id="exampleModalLabel"><b>Agregar Producto</b></h1>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <form method="POST">
                        <div class="modal-body">
                                <label><strong>Nombre del Producto</strong></label><br>
                                <input class="fieldagrprod" type="text" name="nombreprod"><br>
                                <label><strong>Descripcion</strong></label><br>
                                <textarea class="fieldagrprod desc" name="descripcion"></textarea><br>
                                <label><strong>Precio</strong></label><br>
                                <input class="fieldagrprod" type="number" name="precio"><br>
                                <label><strong>Ruta/Nombre de la imagen</strong><br>(Asegurese de guardarla en la carpeta)</label><br>
                                <input class="fieldagrprod" type="text" name="imagen"><br>
                        </div>
                        <div class="modal-footer">
                            <button type="submit" class="btn btn-primary botonagregarprod" name="AgregarProducto">Confirmar</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
        <div class="modal fade" id="updModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
            <div class="modal-dialog modal-dialog-centered">
                <div class="modal-content">
                    <div class="modal-header">
                        <h1 class="modal-title fs-5" id="exampleModalLabel"><b>Actualizar Producto</b></h1>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <form method="POST">
                        <?php
                        foreach($actId as $id){ ?>
                        <div class="modal-body">
                            <input type="hidden" id="productId" name="idprod" placeholder="<?php echo $id['id_producto'];?>">
                            <label><strong>Nombre del Producto</strong></label><br>
                            <input class="fieldagrprod" type="text" name="nombreprod" placeholder="<?php echo $id['nombre_prod'];?>"><br>
                            <label><strong>Descripción</strong></label><br>
                            <textarea class="fieldagrprod desc" name="descripcion" placeholder="<?php echo $id['descripcion'];?>"></textarea><br>
                            <label><strong>Precio</strong></label><br>
                            <input class="fieldagrprod" type="number" name="precio" placeholder="<?php echo $id['precio'];?>"><br>
                            <label><strong>Ruta/Nombre de la imagen</strong><br>(Asegúrate de guardarla en la carpeta)</label><br>
                            <input class="fieldagrprod" type="text" name="imagen" placeholder="<?php echo $id['imagen'];?>"><br>
                        </div>
                        <?php } ?>
                        <div class="modal-footer">
                            <button type="submit" class="btn btn-primary botonagregarprod" name="ActualizarProducto">Actualizar</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
        <!-- Bootstrap Bundle with Popper -->
        <script src="js/misjs/funcionesgenerales.js"></script>
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
    </body>
</html>