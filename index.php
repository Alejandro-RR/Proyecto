<h2?php if (!isset($_SESSION)) { session_start(); } ?>
  <!DOCTYPE html>
  <html lang="en">

  <head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Inicio</title>
    <script src="Assets/js/jquery-3.7.1.min.js"></script>
    <link rel="stylesheet" href="Assets/Style.css">
    <link rel="icon" href="Assets/imagenes/Iconos/logo.png">
    <script src="Assets/js/fancybox/fancybox.umd.js"></script>
    <link rel="stylesheet" href="Assets/js/fancybox/fancybox.css" />
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@100..900&display=swap" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Pacifico&display=swap" rel="stylesheet">
  </head>

  <body>
    <?php
    include "header.php";
    ?>
    <section class="centrarBloque" id="bloque1">
      <article id="sect1">
        <h2> <u>Druidcraft, tu floristería de confianza</u></h2>
        <p>Nuestros servicios incluyen desde la elaboración de composiciones de flores y/o plantas hasta la decoración integral de espacios para eventos y bodas, de empresas, hoteles, etc. Te ofrecemos un amplio catálogo online con composiciones pensadas para cada ocasión: amor, cumpleaños, nacimientos, bodas, nacimientos, aniversarios, funerales, etc.; y lo enviamos donde nos digas.</p>
      </article>
      <article>

        <img src="" alt="" id="img2" height="200" width="300" class="imgInicio">

      </article>

    </section>


    <section id="galeria">

      <h1>Productos recomendados</h1>


      <article>
        <a data-fancybox="gallery" href="Assets/imagenes/Galeria/img2.jpg">
          <img src="Assets/imagenes/Galeria/img2.jpg" width="520px" height="300px" alt="" id="galeriaImg" />
        </a>

        <div style="display:none">
          <a data-fancybox="gallery" href="Assets/imagenes/Galeria/img1.jpg">
            <img src="Assets/imagenes/Galeria/img1.jpg" />
          </a>
          <a data-fancybox="gallery" href="Assets/imagenes/Galeria/img3.jpg">
            <img src="Assets/imagenes/Galeria/img3.jpg" />
          </a>
          <a data-fancybox="gallery" href="Assets/imagenes/Galeria/img4.jpg">
            <img src="Assets/imagenes/Galeria/img4.jpg" />
          </a>
          <a data-fancybox="gallery" href="Assets/imagenes/Galeria/img5.jpg">
            <img src="Assets/imagenes/Galeria/img5.jpg" />
          </a>
          <a data-fancybox="gallery" href="Assets/imagenes/Galeria/img6.jpg">
            <img src="Assets/imagenes/Galeria/img6.jpg" />
          </a>
          <a data-fancybox="gallery" href="Assets/imagenes/Galeria/img7.jpg">
            <img src="Assets/imagenes/Galeria/img7.jpg" />
          </a>

        </div>
      </article>
    </section>

    <section class="centrarBloque" id="">
      <article id="sect1">
        <h2>Flores ideales</h2>
        <p> Las Flores son el regalo perfecto para expresar nuestros sentimientos en cualquier situación especial. Desde Druidcraft, tu floristería experta en flores de Elche, te ofrecemos un amplio catálogo de Ramos de Flores para regalar, centros y cestas, Rosas, Plantas y Arreglos Funerarios. Enviaremos tus Flores donde lo necesites.
        </p>
      </article>
      <article>
        <h1>Flores de temporada</h1>
        <img src="" alt="" id="florDelMes">
      </article>
    </section>

    <div id="MostrarCuadro"></div>
    <?php
    include "footer.php";
    ?>
    <script src="https://kit.fontawesome.com/fef61d9f2b.js" crossorigin="anonymous"></script>
    <script src="Assets/js/Script.js"></script>
    <script>
      Fancybox.bind('[data-fancybox]', {});
    </script>
  </body>

  </html>