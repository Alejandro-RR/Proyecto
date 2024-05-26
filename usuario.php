<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Inicio</title>
    <link rel="stylesheet" href="Assets/Style.css">

</head>

<body>
    <?php
    include "header.php";
    ?>


    <section id="Registro">
        <div id="Reg">
            <h2>Iniciar sesion</h2>
            <form action="">
                <label for="nombre">Nombre de usuario</label>
                <input type="text" id="nombre">
                <label for="Contraseña">Contraseña</label>
                <input type="password" id="Contraseña">
                <input type="submit" value="Inicio de sesion" id="InicioSesion">
            </form>
        </div>

        <div id="Reg">
            <h2>Registrarse</h2>

            <form action="">
                <label for="nombre">Nombre de usuario</label>
                <input type="text" id="nombre">

                <label for="Correo">Correo</label>
                <input type="email" id="Correo">

                <label for="Contraseña">Contraseña</label>
                <input type="password" id="Contraseña">

                <label for="Terminos">Aceptar <a href="https://es.wikipedia.org/wiki/Diez_Mandamientos">terminos y servicios:</a> </label>

                <input type="checkbox" id="Terminos">
                Acepto recibir un newsletter promocional de Druidcraft S.A. con nuestras ofertas al día
                <input type="checkbox" id="SpamDescarado">

                <input type="submit" value="Registrarse" id="Registrarse">
            </form>
        </div>



    </section>


    <?php
    include "footer.php";
    ?>
    <script src="https://kit.fontawesome.com/fef61d9f2b.js" crossorigin="anonymous"></script>
</body>

</html>