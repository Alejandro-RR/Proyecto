<?php
// Iniciar la sesión si no está iniciada
if (!isset($_SESSION)) {
    session_start();
}

// Verificar si hay un usuario autenticado
if (isset($_SESSION['usuario'])) {
    include("conexion.php");
    $conexion = conectarBD();

    // Variables para control de errores
    $ConNuevas = false;
    $ConActual = false;

    // Si se envió el formulario para cambiar la contraseña
    if (isset($_POST['cambiar_pwd'])) {
        $nombre = $_SESSION['usuario'];
        $ContraseñaActual = $_POST['ContraseñaActual'];
        $ContraseñaNueva = $_POST['ContraseñaNueva'];
        $ConfirmContraseña = $_POST['ConfirmContraseña'];

        // Validar que las contraseñas coincidan
        if ($ContraseñaNueva != $ConfirmContraseña) {
            $ConNuevas = true;
        } else {
            // Verificar que la contraseña actual sea correcta
            $consulta = "SELECT Contraseña FROM `usuarios` WHERE `Nombre` = '$nombre'";
            $result = $conexion->query($consulta);

            if ($result->num_rows > 0) {
                $datosUsuario = $result->fetch_assoc();
                $passwordDB = $datosUsuario['Contraseña'];

                // Verificar la contraseña actual
                if ($passwordDB == $ContraseñaActual) {
                    // Actualizar la contraseña en la base de datos
                    $update_pwd = "UPDATE `usuarios` SET `Contraseña` = '$ContraseñaNueva' WHERE `Nombre` = '$nombre'";
                    if ($conexion->query($update_pwd) === TRUE) {
                        // Redirigir a usuario.php después de cambiar la contraseña
                        header("Location: usuario.php");
                        exit();
                    }
                } else {
                    $ConActual = true;
                }
            }
        }
        desconectarBD($conexion);
    }
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Cambiar Contraseña</title>
    <script src="Assets/js/jquery-3.7.1.min.js"></script>
    <link rel="stylesheet" href="Assets/Style.css">
    <link rel="icon" href="Assets/imagenes/Iconos/logo.png">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@100..900&display=swap" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Pacifico&display=swap" rel="stylesheet">
</head>

<body>
    <?php include "header.php"; ?>
    <section id="userInfo">
        <article>
            <form action="<?php echo $_SERVER['PHP_SELF']; ?>" method="post">
                <h2>Cambiar Contraseña</h2>
                <label for="ContraseñaActual">Contraseña actual</label>
                <input type="password" name="ContraseñaActual" required><br><br>
                <?php if ($ConActual) { echo "<p>La contraseña actual es incorrecta. Intenta de nuevo.</p>"; } ?>
                
                <label for="ContraseñaNueva">Nueva Contraseña</label>
                <input type="password" name="ContraseñaNueva" required><br><br>
                
                <label for="ConfirmContraseña">Confirmar Nueva Contraseña</label>
                <input type="password" name="ConfirmContraseña" required><br><br>
                <?php if ($ConNuevas) { echo "<p>Las contraseñas no coinciden. Intenta de nuevo.</p>"; } ?>
                
                <input type="submit" value="Guardar Cambios" name="cambiar_pwd" id="boton">
            </form>
        </article>
    </section>
    <div id="relleno"></div>
    <?php include "footer.php"; ?>
    <script src="https://kit.fontawesome.com/fef61d9f2b.js" crossorigin="anonymous"></script>
    <script src="Assets/js/Script.js"></script>
</body>

</html>

<?php
} else {
    // Si no hay sesión iniciada, redirigir o mostrar mensaje de error.
    header("Location: usuario.php");
    exit();
}
?>