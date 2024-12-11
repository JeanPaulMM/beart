<?php

require "../controller/signcontroller.php";
require "../model/signmodel.php";

$usuario = new ControladorRegistro;
$usuario -> ctrRegistroUsuario();
?>
<html>
    <head>
        <link rel="stylesheet" href="../../html/css/stylesign.css">
    </head>
    <body>
    <div class="contenedorlog">
        <div class="recuadrolog">
            <div class="titulo">
                <h2>Registro</h2>
            </div>
            <form method="POST" class="cuerpoform">
                <label for="nombre">Nombre</label>
                <input type="text" id="nombre" name="nombre" class="field" required>

                <label for="correo">Correo Electrónico</label>
                <input type="email" id="correo" name="email" class="field" required>

                <label for="telefono">Teléfono</label>
                <input type="tel" id="telefono" name="telefono" class="field" required>

                <label for="password">Contraseña</label>
                <input type="password" id="contrasena" name="contrasena" class="field" required>

                <label for="confirmar-password">Confirmar Contraseña</label>
                <input type="password" id="confcontrasena" name="confcontrasena" class="field" required>
                
                <div class="botonn">
                    <button type="submit" class="btnlog" name="Registrar" id="submit-btn" disabled>Registrar</button>
                </div>
            </form>
        </div>
    </div>

    <script>
        document.addEventListener('DOMContentLoaded', function () {
            const passwordInput = document.getElementById('contrasena');
            const confirmPasswordInput = document.getElementById('confcontrasena');
            const submitBtn = document.getElementById('submit-btn');

            function validatePasswords() {
                if (passwordInput.value === confirmPasswordInput.value && passwordInput.value !== '') {
                    submitBtn.disabled = false;
                    submitBtn.style.opacity = 1; // Activar opacidad del botón
                    submitBtn.style.pointerEvents = 'auto'; // Habilitar eventos del botón
                } else {
                    submitBtn.disabled = true;
                    submitBtn.style.opacity = 0.5; // Desactivar opacidad del botón
                    submitBtn.style.pointerEvents = 'none'; // Deshabilitar eventos del botón
                }
            }

            passwordInput.addEventListener('input', validatePasswords);
            confirmPasswordInput.addEventListener('input', validatePasswords);
        });
    </script>
</body>
</html>