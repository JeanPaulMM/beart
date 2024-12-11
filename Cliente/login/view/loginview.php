<html>
    <head>
        <title>Login</title>
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
        <link href="../../html/css/styleslogin.css" rel="stylesheet">
    </head>
    <body>
        <div class="container contenedorlog">
            <div class="recuadrolog">
                <div class="contformlog">
                    <div class="titulo">
                        <h1 style="font-weight: bold">Log In</h1>
                    </div>
                    <div class="cuerpoform">
                        <form action="../controller/loginlogic.php" method="POST">
                            <label>Email: </label><br>
                            <input class="field" type="text" name="email"><br>
                            <label>Contraseña: </label><br>
                            <input class="field" type="text" name="contrasena"><br>
                            <div class="botonn">
                                <input class="btnlog" type="submit" value="Ingresar">
                            </div>
                            <div class="rregister">
                                <p style="font-size:1.2vh;margin-top:5px">No tienes una cuenta?, <a href="Registerview.php"><span>Crear Una</span></a></p>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </body>
</html>