
$(document).ready(function () {
  // Todos los slides de la parte Preguntas frecuentes
  $("#cuadroSlide1").slideUp(0);

  // Esta variable sirve para que todas las flechas empiecen mirando abajo y sirve para alternarn entre arriba y abajo
  var rotated1 = false;

  $("#mostrar1").click(function () {
    $("#cuadroSlide1").slideToggle();
    var rotationAngle = rotated1 ? 0 : 180;
    rotated1 = !rotated1;

    $(".flechita1").animate({
      "rotation": rotationAngle
    }, {
      duration: 200,
      step: function (now) {
        $(this).css("transform", "rotate(" + now + "deg)");
      }
    });
  });

  $("#cuadroSlide2").slideUp(0);

  var rotated2 = false;

  $("#mostrar2").click(function () {
    $("#cuadroSlide2").slideToggle();
    var rotationAngle = rotated2 ? 0 : 180;
    rotated2 = !rotated2;

    $(".flechita2").animate({
      "rotation": rotationAngle
    }, {
      duration: 200,
      step: function (now) {
        $(this).css("transform", "rotate(" + now + "deg)");
      }
    });
  });


  $("#cuadroSlide3").slideUp(0);

  var rotated3 = false;

  $("#mostrar3").click(function () {
    $("#cuadroSlide3").slideToggle();
    var rotationAngle = rotated3 ? 0 : 180;
    rotated3 = !rotated3;

    $(".flechita3").animate({
      "rotation": rotationAngle
    }, {
      duration: 200,
      step: function (now) {
        $(this).css("transform", "rotate(" + now + "deg)");
      }
    });
  });

  $("#cuadroSlide4").slideUp(0);

  var rotated4 = false;

  $("#mostrar4").click(function () {
    $("#cuadroSlide4").slideToggle();
    var rotationAngle = rotated4 ? 0 : 180;
    rotated4 = !rotated4;

    $(".flechita4").animate({
      "rotation": rotationAngle
    }, {
      duration: 200,
      step: function (now) {
        $(this).css("transform", "rotate(" + now + "deg)");
      }
    });
  });

  $("#cuadroSlide5").slideUp(0);

  var rotated5 = false;

  $("#mostrar5").click(function () {
    $("#cuadroSlide5").slideToggle();
    var rotationAngle = rotated5 ? 0 : 180;
    rotated5 = !rotated5;

    $(".flechita5").animate({
      "rotation": rotationAngle
    }, {
      duration: 200,
      step: function (now) {
        $(this).css("transform", "rotate(" + now + "deg)");
      }
    });
  });

  $("#cuadroSlide6").slideUp(0);

  var rotated6 = false;

  $("#mostrar6").click(function () {
    $("#cuadroSlide6").slideToggle();
    var rotationAngle = rotated6 ? 0 : 180;
    rotated6 = !rotated6;

    $(".flechita6").animate({
      "rotation": rotationAngle
    }, {
      duration: 200,
      step: function (now) {
        $(this).css("transform", "rotate(" + now + "deg)");
      }
    });
  });


  // Estas funciones cambian el estilo de los botonoes del formulario al poner el raton encima o quitarlo
  $(".Enviar").on("mouseover", function () {
    $(this).css("background-color", "white");
    $(this).css("color", "grey");

  });

  $(".Enviar").on("mouseout", function () {
    $(this).css("background-color", "#333");
    $(this).css("color", "white");

  });





});


// obetener la fecha de actual para usarla en las funciones
var fecha = new Date();

// Obetener el nombre del documento en el que se encuentra el usuario para evitar que intente cargar funciones
// donde no estan los elementos necesarios para que funcioneny no salga error por consola.
var nombreArchivo = document.title;
if (nombreArchivo == "Inicio") {
  document.getElementById('InicioH').classList.add('active');

// Varibale para saber en que mes estamos
  var florDelMes = fecha.getMonth();

// Array de imagenes en orden de mes para  depues mostrarlas
  var imagenes = ["Assets/imagenes/FloresMes/Flores_Enero.jpg",
    "Assets/imagenes/FloresMes/Flores_Febrero.jpg",
    "Assets/imagenes/FloresMes/Flores_Marzo.jpg",
    "Assets/imagenes/FloresMes/Flores_Abril.jpg",
    "Assets/imagenes/FloresMes/Flores_Mayo.jpg",
    "Assets/imagenes/FloresMes/Flores_Junio.jpg",
    "Assets/imagenes/FloresMes/Flores_Julio.jpg",
    "Assets/imagenes/FloresMes/Flores_Agosto.jpg",
    "Assets/imagenes/FloresMes/Flores_Septiembre.jpg",
    "Assets/imagenes/FloresMes/Flores_Octubre.jpg",
    "Assets/imagenes/FloresMes/Flores_Noviembre.jpg",
    "Assets/imagenes/FloresMes/Flores_Diciembre.jpg"
  ];

// Funcion que cambia la imagen del inicio segun el mes
  function cambiarImagen() {
    var imagen = document.getElementById("florDelMes");
    imagen.src = imagenes[florDelMes];
  }
  cambiarImagen();

// Esta parte de aqui hace que pasen las imagenes del array cada cierto tiempo
  var imagenes2 = ["Assets/imagenes/flores-2.jpg", "Assets/imagenes/flores-3.png", "Assets/imagenes/flores-1.jpg", "Assets/imagenes/flores-4.jpg"];
  var indice = 0;
  function cambiarImagen2() {
    var imagen2 = document.getElementById("img2");
    imagen2.src = imagenes2[indice];
    indice = (indice + 1) % imagenes2.length;
  }
  setInterval(cambiarImagen2, 3500);
  cambiarImagen2();


// Esto hace que al cargar el documento se active la funcion mostrarCuadro
  document.addEventListener("DOMContentLoaded", mostrarCuadro, false);

  //Funcion para mostrar el cuadro del inicio como saludo
  function mostrarCuadro() {
    //Guarda una variable en el localStorage para que no se muestre el mensaje cada vez que se entre a Index.html
    var mensajeYaMostrado = localStorage.getItem("mensajeMostrado");

    if (!mensajeYaMostrado) {
      //Obtener un div ya creado en el HTML y añadirle un titulo, parrafo y boton de cerrar   
      var bloque = document.getElementById("MostrarCuadro");

      //crear y añadir un titulo con un mensaje que depende de la hora del dia
      var hora = fecha.getHours();
      var titulo = document.createElement("h3");
      if (hora < 12) {
        var momento = "Buenos dias";
      } else if (hora > 12 && hora < 18) {
        var momento = "Buenas tardes";
      } else {
        var momento = "Buenas noches";
      }
      titulo.textContent = momento;
      bloque.appendChild(titulo);

      //crear y añadir un boton con una X que elimina el div en el que esta
      var eliminarBloque = document.createElement("button");
      eliminarBloque.setAttribute("id", "eliminarBloque");
      eliminarBloque.setAttribute("onclick", "eliminarBloque()");
      eliminarBloque.textContent = "x";
      bloque.appendChild(eliminarBloque);

      var mensajeBienvenida = document.createElement("p");
      mensajeBienvenida.textContent = "Bienvenido, si tiene alguna duda respecto a nuestra tienda puede contactar con nosotros en la pestaña contactos. Que tenga un buen día";
      bloque.appendChild(mensajeBienvenida);

      //Establecer la variable del localStorage en true para que no se muestre el contenido del div y borra el div
      localStorage.setItem("mensajeMostrado", "true");
    } else {
      var bloque = document.getElementById("MostrarCuadro");
      bloque.remove();
    }

  }
  //funcion que elimina el div de MostrarCuadro
  function eliminarBloque() {
    var divPadre = document.getElementById("eliminarBloque").parentNode;
    divPadre.remove();
  }

} else if (nombreArchivo == "Tienda") {
    document.getElementById('TeindaH').classList.add('active');
} else if (nombreArchivo == "Contacto") {
    document.getElementById('ContactoH').classList.add('active');
} else if (nombreArchivo == "Usuario") {
    document.getElementById('UsuarioH').classList.add('active');
}