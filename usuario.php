<?php
// Comprobamos si ya se ha enviado el formulario y si existe el usuario con esa constraseña.

if (isset($_POST['InicioSesion'])) {

    // Guardamos los valores enviados por el formulario y los comprobamos con los datos de la base de datos
    $nombre = $_POST['nombre'];
    $password = $_POST['pwd'];
    if (!empty($nombre) && !empty($password)) {

        // Parámetros de conexión
        $servidor = 'localhost';
        $bd = 'floristeria';
        $user = 'root';
        $pwd = '';

        // Establecimiento de la conexión
        $conexion = new mysqli($servidor, $user, $pwd, $bd);

        // Comprobamos la conexión
        if ($conexion->connect_errno) {
            echo "Error al conectar a MySQL: " . $conexion->connect_error;
            exit();
        }

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
        $conexion->close();

        //Comprobar si algun usuario y la contraseña de la base de datos coinciden con el usuario y la contraseña introducidos 
        $existe = false;
        for ($i = 0; $i < count($nombres); $i++) {

            if ($nombres[$i] == $nombre && $contraseñas[$i] == $password) {
                $existe  = true;
            }
        }

        if (($existe  == true)) {
            session_start();
            $_SESSION['usuario'] = $nombre;


            if (($nombre == "Admin" && $password == "Admin")) {
                // Almacenamos el usuario en la sesión
                $_SESSION['rol'] = "Admin";
                header("Location: usuario.php"); // Redirigimos a la página de administrador
                exit();
            } else {
                $_SESSION['rol'] = "user";
                header("Location: usuario.php"); // Redirigimos a la página de usuario
                exit();
            }
        }
    } else {
    }
}




if (isset($_POST['Registrarse'])) {

    // Guardamos los valores enviados por el formulario y los comprobamos con los datos de la base de datos
    $nombre = $_POST['nombre'];
    $email = $_POST['email'];
    $password = $_POST['pwd'];

    if (!empty($nombre) && !empty($password)) {

        // Parámetros de conexión
        $servidor = 'localhost';
        $bd = 'floristeria';
        $user = 'root';
        $pwd = '';

        // Establecimiento de la conexión
        $conexion = new mysqli($servidor, $user, $pwd, $bd);

        // Comprobamos la conexión
        if ($conexion->connect_errno) {
            echo "Error al conectar a MySQL: " . $conexion->connect_error;
            exit();
        }

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

        if (($NoRepite  == true)) {

            $fechaActual = date('Y-m-d H:i:s');

            $añadirUser = "INSERT INTO `usuarios`(`Nombre`, `Contraseña`, `Correo`, `Fecha`) VALUES ('$nombre','$password','$email','$fechaActual')";
            $insrtarUser = $conexion->query($añadirUser);
            $conexion->close();
            session_start();
            $_SESSION['usuario'] = $nombre;
            $_SESSION['rol'] = "user";
            header("Location: usuario.php");
        } else {
            $conexion->close();
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
</head>

<body>
    <?php
    session_start(); // Asegúrate de iniciar la sesión al principio del archivo

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
                    <input type="text" name="nombre" value="<?php if (isset($_POST['nombre'])) echo $_POST['nombre']; ?>" size="50" required><br><br>

                    <label for="Email">Correo</label>
                    <input type="email" name="email" value="<?php if (isset($_POST['email'])) echo $_POST['email']; ?>" size="50" required><br><br>

                    <label for="Contraseña">Contraseña</label>
                    <input type="password" name="pwd" required size="50"><br>

                    <label class="terminos" for="politica">Acepto los <a href="">terminos y servicios:</a> <input type="checkbox" class="politica" name="politica" required>

                        <input type="submit" value="Registrarse" id="Registrarse" class="Enviar" name="Registrarse">

                </form>
            </article>

        </section>
        <div id="relleno"></div>

    <?php
        include "footer.php";
    } else {



        $servidor = 'localhost';
        $bd = 'floristeria';
        $user = 'root';
        $pwd = '';

        // Establecimiento de la conexión
        $conexion = new mysqli($servidor, $user, $pwd, $bd);

        // Comprobamos la conexión
        if ($conexion->connect_errno) {
            echo "Error al conectar a MySQL: " . $conexion->connect_error;
            exit();
        }

        $nombre = $_SESSION['usuario'];
        $consulta = "SELECT * FROM `usuarios` WHERE `Nombre` = '$nombre'";

        $infoUser = $conexion->query($consulta);

        $datosUsuario = $infoUser->fetch_assoc();

        $correo = $datosUsuario['Correo'];
        $fecha = $datosUsuario['Fecha'];


    ?>
        <section id="userInfo">
            <article>
                <h2>Nombre de usuario:</h2>
                <?php echo $nombre; ?>
                <br>
                <h2>Correo:</h2>
                <?php echo $correo; ?>
                <br>
                <h2>Fecha de creacion:</h2>
                <?php echo $fecha; ?>
                <br>

                <a href="logout.php"><button class="Enviar">Cerrar sesion</button></a>
            </article>
        </section>
    <?php
    }
    ?>
    <script src="https://kit.fontawesome.com/fef61d9f2b.js" crossorigin="anonymous"></script>
    <script src="Assets/js/Script.js"></script>

</body>

</html>