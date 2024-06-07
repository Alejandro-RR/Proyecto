$(document).ready(function () {
  // Todos los slides de la parte Preguntas frecuentes
  $("#cuadroSlide1").slideUp(0);

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


  $(".Enviar").on("mouseover", function () {
    $(this).css("background-color", "white");
    $(this).css("color", "grey");

  });

  $(".Enviar").on("mouseout", function () {
    $(this).css("background-color", "#333");
    $(this).css("color", "white");

  });


  var imagenes = [
    "Assets/imagenes/FloresMes/Flores_Enero.jpg",
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
  
  var indice = 1;
  function cambiarImagen() {
    var imagen = document.getElementById("florDelMes");
    imagen.src = imagenes[indice];
  }
  
  cambiarImagen();

});


function limpiarFormulario() {
  var formularioUser = document.getElementById("FormularioUsuario");

  //Iterar sobre los nodos hijos y eliminar cada uno
  while (formularioUser.firstChild) {
    formularioUser.removeChild(formularioUser.firstChild);
  }
}



