<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Inicio</title>
    <script src="Assets/js/jquery-3.7.1.min.js"></script>

    <link rel="stylesheet" href="Assets/Style.css">

</head>

<body>
    <?php
    include "header.php";
    ?>
    <img src="Assets/imagenes/imgContacto.png" alt="" class="imgContacto">
    <div id="TituloContacto1">
        <h1 class="Textocentrado">NUESTRA FLORISTERÍA</h1>
    </div>

    <section id="localizacion">
        <article>
            <img src="Assets/imagenes/imgTienda.jpg" alt="" id="imgTienda">
            <div>
                <h3>Floristería Druidcraft</h3>
                <p>Avda. Alcalde Ramón Pastor Sótano 1 del Rotor (Corte Inglés)</p>
                <p>03204 Elx-Elche (Alicante)</p>
                <h3>Tel: 633 053 206</h3>
                <p>floristeriadruidcraft@gmail.com</p>
            </div>
        </article>

        <article>
            <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3133.1452795125115!2d-0.8051371236139374!3d38.252936484471846!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0xd63b9128aa42c4b%3A0xecd7eb533184279d!2sIES%20Maci%C3%A0%20Abela!5e0!3m2!1ses!2ses!4v1701029295402!5m2!1ses!2ses" style="border:0;" allowfullscreen="" loading="lazy" referrerpolicy="no-referrer-when-downgrade"></iframe>
        </article>
    </section>
    <section id="Contacto">

        <article>

            <h2>PREGUNTAS MÁS FRECUENTES</h2>
            <hr>
            <div id="mostrar1" class="preguntas">
                <h4> <i class="fa-solid fa-angle-down flechita1" id="flechita"></i> ¿Llegará bien mi pedido?</h4>
                <div id="cuadroSlide1">
                    <p>Valoramos mucho ofrecer la máxima calidad posible en nuestros envíos. NO enviamos en cajas. Disponemos de un servicio de reparto propio. Durante el trayecto serán tratadas con gran cuidado para que lleguen a su destino en perfectas condiciones y a tiempo.</p>
                </div>
            </div>
            <hr>
            <div id="mostrar2" class="preguntas">
                <h4><i class="fa-solid fa-angle-down flechita2"></i>  ¿Qué métodos de pago hay disponibles?</h4>
                <div id="cuadroSlide2">
                    <p>Disponemos de varios métodos de pago, como Tarjeta de Crédito o Débito</p>
                </div>
            </div>
            <hr>
            <div id="mostrar3" class="preguntas">
                <h4><i class="fa-solid fa-angle-down flechita3"></i>  ¿El producto es idéntico al mostrando en Web?</h4>
                <div id="cuadroSlide3">
                    <p>Al tratarse de un producto artesanal, podrá mostrar pequeñas variaciones pero siempre trataremos de respetar la forma y la tonalidad. En caso de ser necesario una sustitución de alguna flor nos pondremos en contacto con usted para ofrecerle alternativas por un valor igual o superior al original</p>
                </div>
            </div>
            <hr>
            <div id="mostrar4" class="preguntas">
                <h4><i class="fa-solid fa-angle-down flechita4"></i>  ¿Haceis entregas los Domigos y Festivos?</h4>
                <div id="cuadroSlide4">
                    <p>Nuestro horario de oficina es de Lunes a Sábado de 10:00 a 22:00. Pero contacta con nosotros: Escucharemos tu petición y haremos lo posible para hacer la entrega cuando lo necesites. Puedes contactarnos en nuestro email. Te atenderemos encantados.</p>
                </div>
            </div>
            <hr>
            <div id="mostrar5" class="preguntas">
                <h4><i class="fa-solid fa-angle-down flechita5"></i>  Si envío un regalo sopresa y el destinatario no está... ¿Qué hacéis?</h4>
                <div id="cuadroSlide5">
                    <p>Tratándose de un regalo, <b>haremos lo posible por mantener la sorpresa</b> hasta entregarlo a su destinatario. Al momento de contactar con esa persona, no desvelaremos de qué trata el envío para no romper la sorpresa.</p>
                </div>
            </div>
            <hr>
            <div id="mostrar6" class="preguntas">
                <h4><i class="fa-solid fa-angle-down flechita6"></i>  ¿Hacéis envíos a Hospitales y Tanatorios?</h4>
                <div id="cuadroSlide6">
                    <h3>Hospitales</h3>
                    <p>Sí, enviamos flores a cualquier Clínica u Hospital de Elche. <b>¡¡IMPORTANTE!! Debido a la nueva Ley de Protección de datos, necesitamos que nos proporciones la mayor cantidad de datos posible. Como mínimo, es necesario el número de habitación.</b></p><br>

                    <h3>Tanatorios</h3>
                    <p>Sí, es posible. Siempre damos prioridad a los envíos funerarios. Antes de realizar el envío siempre confirmamos: <b>Tanatorio, sala velatorio y hora del entierro o cremación.</b></p>
                </div>
            </div>


        </article>

        <article id="formContacto">
            <h2>CONTACTANOS VÍA EMAIL</h2>

            <form action="">
                <label for="nombre">Nombre:</label>
                <input type="text" id="nombre" name="nombre" maxlength="30" pattern="[A-Za-z0-9]+" placeholder="Nombre" required><br>

                <label for="email">E-mail:</label>
                <input type="email" id="email" name="email" required><br>

                <label for="edad">Edad:</label>
                <input type="number" id="edad" name="edad" placeholder="Edad" required><br>

                <label for="telefono">Teléfono:</label>
                <input type="tel" id="telefono" name="telefono" placeholder="Teléfono" required><br>

                <label for="consulta">Consulta:</label>
                <textarea id="consulta" name="consulta" rows="4" cols="50" placeholder="Escribe tu consulta" required></textarea><br>

                <label class="terminos" for="politica">Acepto la política de privacidad y cookies: <input type="checkbox" class="politica"  name="politica" required>
                </label>

                <br>

                <input type="submit" value="Enviar" id="Enviar" class="Enviar">
                
            </form>
        </article>
    </section>
    <?php
    include "footer.php";
    ?>
    <script src="https://kit.fontawesome.com/fef61d9f2b.js" crossorigin="anonymous"></script>
    <script src="Assets/js/Script.js"></script>

</body>

</html>