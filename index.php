<?php
if (!isset($_SESSION)) {
    session_start();
}
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Inicio</title>
    <script src="Assets/js/jquery-3.7.1.min.js"></script>
    <link rel="stylesheet" href="Assets/Style.css">
    <link rel="icon" href="Assets/imagenes/Iconos/logo.png" >

</head>

<body>
    <?php
    include "header.php";
    ?>
    <img src="Assets/imagenes/imgInicio.jpg" alt="" id="img1">


    <section id="sect1">
        <article id="div1" class="Textocentrado">
            <h3>Druidcraft, tu floristería de confianza</h3>
            <p>Nuestros servicios incluyen desde la elaboración de composiciones de flores y/o plantas hasta la decoración integral de espacios para eventos y bodas, de empresas, hoteles, etc. Te ofrecemos un amplio catálogo online con composiciones pensadas para cada ocasión: amor, cumpleaños, nacimientos, bodas, nacimientos, aniversarios, funerales, etc.; y lo enviamos donde nos digas.</p>

        </article>

    </section>
    <img src="" alt="" id="img2" height="200" width="300" class="imgInicio">

    <section id="sect2">
        <article id="div2" class="Textocentrado">
            <h2>Flores de temporada</h2>

            <img src="" alt="" id="florDelMes" height="200" width="300">

        </article>

    </section>

    <?php
    include "footer.php";
    ?>
    <script src="https://kit.fontawesome.com/fef61d9f2b.js" crossorigin="anonymous"></script>
    <script src="Assets/js/Script.js"></script>
</body>

</html>