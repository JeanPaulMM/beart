<?php
require_once '../../Roles/Controller/RolController.php';
require_once '../../Roles/Model/RolModel.php';

$op = new ControllerRMP();
$roles = $op->ctrTraerRoles();
$permisos = $op->ctrTraerMP();
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
    <link rel="stylesheet" href="../css/bootstrap.min.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <!-- style css -->
    <link rel="stylesheet" href="../css/style.css">
    <!-- Responsive-->
    <link rel="stylesheet" href="../css/responsive.css">
    <!-- fevicon -->
    <link rel="icon" href="../images/fevicon.png" type="image/gif"/>
    <!-- Scrollbar Custom CSS -->
    <link rel="stylesheet" href="../css/jquery.mCustomScrollbar.min.css">
    <!-- Tweaks for older IEs-->
    <link rel="stylesheet" href="https://netdna.bootstrapcdn.com/font-awesome/4.0.3/css/font-awesome.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/fancybox/2.1.5/jquery.fancybox.min.css" media="screen">
    <!--[if lt IE 9]>
    <script src="https://oss.maxcdn.com/html5shiv/3.7.3/html5shiv.min.js"></script>
    <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script><![endif]-->
</head>
<body id="bodyRolesPermisos" class="main-layout position_head">
<header>
    <!-- header inner -->
    <div class="header">
        <div class="container-fluid">
            <div class="row">
                <div class="col-xl-3 col-lg-3 col-md-3 col-sm-3 col logo_section">
                    <div class="full">
                        <div class="center-desk">
                            <div class="logo">
                                <a href="index.php"><img src="../images/logo.png" alt="#" /></a>
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
                                <li class="nav-item active">
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
<div id="BodyGestionPermisos" class="BodyGestionPermisos">
    <div class="container container-permisos">
        <div class="titulogestion">
            <h1 class="titulo">Gestión Productos</h1>
            <p>Asigna los permisos que desees para cada rol existente en la base de datos</p><br>
        </div>
        <?php

        // Estructura para almacenar los módulos y sus permisos
        $modulos = [];

        // Recorremos los resultados y organizamos los datos
        foreach ($permisos as $row) {
            $modulo_id = $row['id_modulo'];
            if (!isset($modulos[$modulo_id])) {
                $modulos[$modulo_id] = [
                    'nombre' => $row['nombre_modulo'],
                    'permisos' => []
                ];
            }
            $modulos[$modulo_id]['permisos'][] = [
                'id' => $row['id_permiso'],
                'nombre' => $row['nombre_permiso']
            ];
        }
        ?>
        <form id="RegPerms" method="POST" enctype="multipart/form-data">
            <div class="centrarloe">
                <select name="Rol" id="roleSelector" class="form-select form-select2 Rolperm" onchange="loadRolePermissions()">
                    <option value="0">--Seleccione un Rol--</option>
                    <?php
                    if (is_array($roles) && count($roles) > 0) {
                        foreach ($roles as $rowR) {
                            echo '<option value="' . $rowR['id_rol'] . '">' . $rowR['nombre_rol'] . '</option>';
                        }
                    }
                    ?>
                </select>
            </div>
            <div class="container">
                <div class="row" style="display:flex;justify-content:center">
                    <?php
                    $num_modulos = count($modulos);
                    $modulos_por_fila = 3; // Número de módulos por fila

                    // Variable para contar módulos
                    $modulo_count = 0;

                    foreach ($modulos as $modulo_id => $modulo) {
                        // Si se ha alcanzado el límite de módulos por fila, cerramos la fila y comenzamos una nueva
                        if ($modulo_count % $modulos_por_fila == 0) {
                            if ($modulo_count > 0) {
                                echo '</div>'; // Cerramos la fila anterior
                            }
                            echo '<div class="row filass">'; // Abrimos una nueva fila
                        }

                        // Generamos el HTML para el módulo y sus submódulos
                        echo '<div class="col-md-4 cuadros-perms">';
                        echo '<div class="form-group">';
                        echo '<label><input type="checkbox" class="modulo" value="modulo' . $modulo_id . '" data-modulo-id="' . $modulo_id . '" onclick="toggleSubmodules(' . $modulo_id . ')"> ' . $modulo['nombre'] . '</label>';
                        echo ' <i class="bi bi-chevron-down toggle-icon" onclick="toggleVisibility(' . $modulo_id . ')"></i>';
                        echo '<div class="ml-4 submodules" id="submodulos_modulo' . $modulo_id . '">';
                        foreach ($modulo['permisos'] as $permiso) {
                            echo '<label><input type="checkbox" name="submodulos_modulo[' . $modulo_id . '][]" value="' . $permiso['id'] . '" class="submodule" data-modulo-id="' . $modulo_id . '"> ' . $permiso['nombre'] . '</label><br>';
                        }
                        echo '</div>';
                        echo '</div>';
                        echo '</div>';

                        // Incrementamos el contador de módulos
                        $modulo_count++;
                    }

                    // Cerramos la última fila
                    echo '</div>';
                    ?>
                </div>
            </div>
            <div class="centrarloe">
                <button class="btn btn-primary regperm" name="RegRolPermisos" type="button" onclick="RegistrarPermisos()">Confirmar</button>
            </div>
        </form>
    </div>
</div>
<script>
    function toggleVisibility(moduloId) {
        const submodulesDiv = document.getElementById('submodulos_modulo' + moduloId);
        submodulesDiv.style.display = submodulesDiv.style.display === 'block' ? 'none' : 'block';
    }

    function toggleSubmodules(moduloId) {
        const moduleCheckbox = document.querySelector('input[data-modulo-id="' + moduloId + '"].modulo');
        const submoduleCheckboxes = document.querySelectorAll('input[data-modulo-id="' + moduloId + '"].submodule');
        submoduleCheckboxes.forEach(submoduleCheckbox => {
            submoduleCheckbox.checked = moduleCheckbox.checked;
        });
    }

    function loadRolePermissions() {
        const roleId = document.getElementById('roleSelector').value;
        
        if (roleId == 0) {
            document.querySelectorAll('input[type="checkbox"]').forEach(checkbox => checkbox.checked = false);
            return;
        }

        fetch('../../Roles/View/AsignarPermisos.php', {
            method: 'POST',
            headers: {
                'Content-Type': 'application/json',
            },
            body: JSON.stringify({ roleId: roleId })
        })
        .then(response => response.json())
        .then(data => {
            document.querySelectorAll('input[type="checkbox"]').forEach(checkbox => checkbox.checked = false);

            data.forEach(permission => {
                const checkbox = document.querySelector(`input[value="${permission.Perm_Cod}"]`);
                if (checkbox) checkbox.checked = true;
            });

            document.querySelectorAll('.modulo').forEach(moduleCheckbox => {
                const moduleId = moduleCheckbox.dataset.moduloId;
                const submoduleCheckboxes = document.querySelectorAll(`input[data-modulo-id="${moduleId}"].submodule`);
                const allChecked = submoduleCheckboxes.length > 0 && [...submoduleCheckboxes].every(submoduleCheckbox => submoduleCheckbox.checked);
                moduleCheckbox.checked = allChecked;
            });
        })
        .catch(error => console.error('Error en la solicitud AJAX: ', error));
    }

</script>
<script src="../js/jquery.min.js"></script>
<script src="../js/popper.min.js"></script>
<script src="../js/bootstrap.bundle.min.js"></script>
<script src="../js/jquery-3.0.0.min.js"></script>
<script src="../js/jquery.mCustomScrollbar.concat.min.js"></script>
<script src="../js/custom.js"></script>
<script type="text/javascript" src="../js/misjs/funcionpermisos.js"></script>
</body>
</html>