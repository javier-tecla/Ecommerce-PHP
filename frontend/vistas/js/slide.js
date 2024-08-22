/*=====================================
VARIABLES
======================================*/

let item = 0;
let itemPaginacion = $("#paginacion li");
let interrumpirCiclo = false;
let imgProducto = $(".imgProducto");
let titulos1 = $("#slide h1");
let titulos2 = $("#slide h2");
let titulos3 = $("#slide h3");
let btnVerProducto = $("#slide button");
let detenerIntervalo = false;
let toogle = false;

$("#slide ul li").css({"width":100/$("#slide ul li").length + "%"})
$("#slide ul").css({"width":$("#slide ul li").length*100 + "%"})

/*=====================================
ANIMACIÓN INICIAL
======================================*/

$(imgProducto[item]).animate({ top: -10 + "%", opacity: 0 }, 100);
$(imgProducto[item]).animate({ top: 30 + "px", opacity: 1 }, 600);

$(titulos1[item]).animate({ top: -10 + "px", opacity: 0 }, 100);
$(titulos1[item]).animate({ top: 30 + "px", opacity: 1 }, 600);

$(titulos2[item]).animate({ top: -10 + "px", opacity: 0 }, 100);
$(titulos2[item]).animate({ top: 30 + "px", opacity: 1 }, 600);

$(titulos3[item]).animate({ top: -10 + "px", opacity: 0 }, 100);
$(titulos3[item]).animate({ top: 30 + "px", opacity: 1 }, 600);

$(btnVerProducto[item]).animate({ top: -10 + "px", opacity: 0 }, 100);
$(btnVerProducto[item]).animate({ top: 30 + "px", opacity: 1 }, 600);

/*=====================================
PAGINACIÓN 
======================================*/

$("#paginacion li").click(function () {
  item = $(this).attr("item") - 1;

  movimientoSlide(item);
});

/*=====================================
AVANZAR
======================================*/

function avanzar() {
  if (item == $("#slide ul li").length -1) {
    item = 0;
  } else {
    item++;
  }

  interrumpirCiclo = true;

  movimientoSlide(item);
}
$("#slide #avanzar").click(function () {
  avanzar();
});

/*=====================================
RETROCEDER
======================================*/

$("#slide #retroceder").click(function () {
  if (item == 0) {
    item = $("#slide ul li").length -1;
  } else {
    item--;
  }

  movimientoSlide(item);
});

/*=====================================
MOVIMIENTO SLIDE
======================================*/

function movimientoSlide(item) {

  $("#slide ul li").finish();

  $("#slide ul").animate({ left: item * -100 + "%" }, 1000, "easeOutQuart");

  $("#paginacion li").css({ opacity: 0.5 });

  $(itemPaginacion[item]).css({ opacity: 1 });

  interrumpirCiclo = true;

  $(imgProducto[item]).animate({ top: -10 + "%", opacity: 0 }, 100);
  $(imgProducto[item]).animate({ top: 30 + "px", opacity: 1 }, 600);

  $(titulos1[item]).animate({ top: -10 + "px", opacity: 0 }, 100);
  $(titulos1[item]).animate({ top: 30 + "px", opacity: 1 }, 600);

  $(titulos2[item]).animate({ top: -10 + "px", opacity: 0 }, 100);
  $(titulos2[item]).animate({ top: 30 + "px", opacity: 1 }, 600);

  $(titulos3[item]).animate({ top: -10 + "px", opacity: 0 }, 100);
  $(titulos3[item]).animate({ top: 30 + "px", opacity: 1 }, 600);

  $(btnVerProducto[item]).animate({ top: -10 + "px", opacity: 0 }, 100);
  $(btnVerProducto[item]).animate({ top: 30 + "px", opacity: 1 }, 600);
}

/*=====================================
INTERVALO
======================================*/

setInterval(function () {
  if (interrumpirCiclo) {
    interrumpirCiclo = false;
    detenerIntervalo = false;
    $("#slide ul li").finish();
  } else {
    if (!detenerIntervalo) {
      avanzar();
    }
  }
}, 3000);

/*=====================================
APARECER FLECHAS
======================================*/

$("#slide").mouseover(function () {
  $("#slide #retroceder").css({ opacity: 1 });
  $("#slide #avanzar").css({ opacity: 1 });

  detenerIntervalo = true;
});

$("#slide").mouseout(function () {
  $("#slide #retroceder").css({ opacity: 0 });
  $("#slide #avanzar").css({ opacity: 0 });

  detenerIntervalo = false;
});

/*=====================================
ESCONDER SLIDE
======================================*/

$("#btnSlide").click(function() {

    if(!toogle) {

      toogle = true;

      $("#slide").slideUp("fast");

      $("#btnSlide").html('<i class="fa fa-angle-down"></i>')

    } else {

      toogle = false;

      $("#slide").slideDown("fast");

      $("#btnSlide").html('<i class="fa fa-angle-up"></i>')
    }

})



