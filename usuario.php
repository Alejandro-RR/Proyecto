<?php
// Comprobamos si ya se ha enviado el formulario y si existe el usuario con esa constraseña.

if (isset($_POST['InicioSesion'])) {

    // Guardamos los valores enviados por el formulario y los comprobamos con los datos de la base de datos
    $nombre = $_POST['nombre'];
    $password = $_POST['pwd'];
    if (!empty($nombre) && !empty($password)) {

        include("conexion.php");
        // Parámetros de conexión
        $conexion = conectarBD();

        // Consulta a la base de datos
        $usuario = "SELECT Nombre FROM `usuarios`";
        $contraseña = "SELECT Contraseña FROM `usuarios`";

        // Ejecutamos las consultas
        $resultNombres = $conexion->query($usuario);
        $resultContraseñas = $conexion->query($contraseña);

        // Verificamos y añadimos los resultados a un array
        $nombres = [];
        $contraseñas = [];

        if ($resultNombres->num_rows > 0) {
            while ($fila = $resultNombres->fetch_assoc()) {
                $nombres[] = $fila['Nombre'];
            }
        }

        if ($resultContraseñas->num_rows > 0) {
            while ($fila = $resultContraseñas->fetch_assoc()) {
                $contraseñas[] = $fila['Contraseña'];
            }
        }

        //Comprobar si algun usuario y la contraseña de la base de datos coinciden con el usuario y la contraseña introducidos 
        $existe = false;
        for ($i = 0; $i < count($nombres); $i++) {

            if ($nombres[$i] == $nombre && $contraseñas[$i] == $password) {
                $existe  = true;
            }
        }
        // Desconectamos de la BD
        desconectarBD($conexion);

        //Si el usuario existe en la BD asignamos valores y el rol de Admin o user
        if (($existe  == true)) {
            session_start();
            $_SESSION['usuario'] = $nombre;


            if (($nombre == "Admin" && $password == "Admin")) {
                // Almacenamos el usuario en la sesión
                $_SESSION['rol'] = "Admin";
                header("Location: usuario.php");
                exit();
            } else {
                $_SESSION['rol'] = "user";
                header("Location: usuario.php");
                exit();
            }
        }
    } else {
    }
}



// Comprobar si se envio el formulario para registrarse
if (isset($_POST['Registrarse'])) {


    include("conexion.php");
    // Parámetros de conexión
    $conexion = conectarBD();

    // Guardamos los valores enviados por el formulario y los comprobamos con los datos de la base de datos
    $nombre = $_POST['nombre'];
    $email = $_POST['email'];
    $password = $_POST['pwd'];

    if (!empty($nombre) && !empty($password)) {



        // Consulta a la base de datos
        $usuario = "SELECT Nombre FROM `usuarios`";
        $correo = "SELECT Correo FROM `usuarios`";


        // Ejecutamos las consultas
        $resultNombres = $conexion->query($usuario);
        $resultCorreos = $conexion->query($correo);

        // Verificamos y añadimos los resultados a un array
        $nombres = [];
        $correos = [];
        if ($resultNombres->num_rows > 0) {
            while ($fila = $resultNombres->fetch_assoc()) {
                $nombres[] = $fila['Nombre'];
            }
        }
        if ($resultCorreos->num_rows > 0) {
            while ($fila = $resultCorreos->fetch_assoc()) {
                $correos[] = $fila['Correo'];
            }
        }




        //Comprobar si algun usuario y la contraseña de la base de datos coinciden con el usuario y la contraseña introducidos 
        $NoRepite = false;
        for ($i = 0; $i < count($nombres); $i++) {

            if ($nombres[$i] != $nombre || $correos[$i] != $email) {
                $NoRepite  = true;
            }
        }


        //Si no se repite el nombre de usuario o correo se añade el usuario a la BD y se inicia sesion.
        if (($NoRepite  == true)) {

            $fechaActual = date('Y-m-d H:i:s');

            $añadirUser = "INSERT INTO `usuarios`(`Nombre`, `Contraseña`, `Correo`, `Fecha`) VALUES ('$nombre','$password','$email','$fechaActual')";
            $insrtarUser = $conexion->query($añadirUser);
            desconectarBD($conexion);
            session_start();
            $_SESSION['usuario'] = $nombre;
            $_SESSION['rol'] = "user";
            header("Location: usuario.php");
        } else {
            desconectarBD($conexion);
        }
    }
}


?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Registro</title>
    <script src="Assets/js/jquery-3.7.1.min.js"></script>
    <link rel="stylesheet" href="Assets/Style.css">
    <link rel="icon" href="Assets/imagenes/Iconos/logo.png">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@100..900&display=swap" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Pacifico&display=swap" rel="stylesheet">
</head>

<body>
    <?php
    session_start();

    include "header.php";

    // Verifica si la sesión está iniciada
    if (!isset($_SESSION['usuario'])) {
    ?>
        <section id="Registro">
            <article id="Reg">
                <h2>Iniciar sesion</h2>
                <form action="<?php echo $_SERVER['PHP_SELF']; ?>" method="post">
                    <label for="nombre">Nombre de usuario</label>
                    <input type="text" name="nombre" value="<?php if (isset($_POST['nombre'])) echo $_POST['nombre']; ?>" size="50" required><br><br>
                    <label for="pwd">Contraseña</label>
                    <input type="password" name="pwd" required size="50"><br>
                    <input type="submit" value="Inicio de Sesion" id="InicioSesion" class="Enviar" name="InicioSesion">
                </form>
            </article>
            <article id="Reg">
                <h2>Registrarse</h2>

                <form action="<?php echo $_SERVER['PHP_SELF']; ?>" method="post">
                    <label for="nombre">Nombre de usuario</label>
                    <input type="text" name="nombre" id="nombre" value="<?php if (isset($_POST['nombre'])) echo $_POST['nombre']; ?>" size="50" required><br><br>
                    <p id="malNom"></p>

                    <label for="Email">Correo</label>
                    <input type="email" name="email" id="correo" value="<?php if (isset($_POST['email'])) echo $_POST['email']; ?>" size="50" required><br><br>
                    <p id="malEmail"></p>

                    <label for="Contraseña">Contraseña</label>
                    <input type="password" name="pwd" required size="50"><br>

                    <label class="terminos" for="politica">Acepto los <a href="https://es.wikipedia.org/wiki/Diez_Mandamientos">terminos y servicios:</a>

                        <input type="checkbox" class="politica" name="politica" required>

                        <input type="submit" value="Registrarse" id="Registrarse" class="Enviar" name="Registrarse">

                </form>
            </article>

        </section>
        <div id="relleno"></div>

    <?php
    } else {



        include("conexion.php");
        // Parámetros de conexión
        $conexion = conectarBD();
        // Se consulta en la base de datos la informacion del usuario para mostrarla más tarde
        $nombre = $_SESSION['usuario'];
        $consulta = "SELECT * FROM `usuarios` WHERE `Nombre` = '$nombre'";
        $infoUser = $conexion->query($consulta);
        $datosUsuario = $infoUser->fetch_assoc();
        $correo = $datosUsuario['Correo'];
        $fecha = $datosUsuario['Fecha'];

        desconectarBD($conexion);
    ?>
        <section id="userInfo">
            <article>

                <?php echo "<h3>Nombre de usuario:</h3>$nombre"; ?>
                <?php echo "<h3>Correo:</h3> $correo"; ?>
                <?php echo "<h3>Fecha de creacion:</h3> $fecha"; ?>
                <div id="RegiBotones">
                    <?php
                     // Solo si es administrador se mostrara el acceso a la lista de usuarios
                    if ($_SESSION['rol'] == "Admin") {
                    ?>
                        <br><a href="registros.php"><button id="boton">Registros</button></a>

                    <?php
                    }
                    ?>
                    <br>
                    <a href="CambioConstraseña.php"><button id="boton">Cambiar contraseña</button></a>
                    <a href="logout.php"><button id="boton">Cerrar sesion</button></a>
                </div>
            </article>
        </section>
        <div id="relleno"></div>
    <?php
    }
    include "footer.php";
    ?>

    <script src="https://kit.fontawesome.com/fef61d9f2b.js" crossorigin="anonymous"></script>
    <script src="Assets/js/Script.js"></script>

</body>

</html>