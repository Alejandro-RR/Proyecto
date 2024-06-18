<?php
if (!isset($_SESSION)) {
    session_start();
}
// Y comprobamos que el usuario se haya autentificado
if (isset($_SESSION['rol']) && $_SESSION['rol'] === 'Admin') {
    include("conexion.php");
    $conexion = conectarBD();
    // Consulta SQL para obtener la lista de usuarios
    $sql = "SELECT nombre, correo, fecha FROM usuarios";
    $result = $conexion->query($sql);
?>

    <!DOCTYPE html>
    <html lang="en">

    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Tienda</title>
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
        include "header.php";
        ?>
        <h1 class="centrar">Lista de Usuarios</h1>
        <section id="ListaUsuarios">
            <article>
                <a href="Assets/PDF/PDF-users.php"><button id="boton">Listado de usuarios en PDF</button></a>

                <table border="1">
                    <tr>
                        <th>Nombre</th>
                        <th>Correo</th>
                        <th>Fecha</th>
                    </tr>
                    <?php
                    if ($result->num_rows > 0) {
                        // Salida de datos de cada fila
                        while ($row = $result->fetch_assoc()) {
                            echo "<tr><td>" . $row["nombre"] . "</td><td>" . $row["correo"] . "</td><td>" . $row["fecha"] . "</td></tr>";
                        }
                    } else {
                        echo "<tr><td colspan='3'>No hay usuarios registrados</td></tr>";
                    }

                    $conexion->close();
                    ?>
                </table>


            </article>
        </section>
        <div id="relleno"></div>

    <?php
    include "footer.php";
} else {

    header("Location: usuario.php"); // Redirigimos a la página de usuario
}
    ?>
    <script src="https://kit.fontawesome.com/fef61d9f2b.js" crossorigin="anonymous"></script>
    <script src="Assets/js/Script.js"></script>

    </body>

    </html>