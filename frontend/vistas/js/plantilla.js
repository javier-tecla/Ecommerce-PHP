/*=============================================
PLANTILLA
=============================================*/

$.ajax({
  url: "ajax/plantilla.ajax.php",
  success: function (respuesta) {
    let colorFondo = JSON.parse(respuesta).colorFondo;
    let colorTexto = JSON.parse(respuesta).colorTexto;
    let barraSuperior = JSON.parse(respuesta).barraSuperior;
    let textoSuperior = JSON.parse(respuesta).textoSuperior;

    $(".backColor, .backColor a").css({
      background: colorFondo,
      color: colorTexto,
    });

    $(".barraSuperior, .barraSuperior a").css({
      background: barraSuperior,
      color: textoSuperior,
    });
  },
});

/*=============================================
CUADRÍCULA O LISTA
=============================================*/

let btnList = $(".btnList");

for (let i = 0; i < btnList.length; i++) {
  $("#btnGrid" + i).click(function () {
    let numero = $(this).attr("id").substr(-1);

    $(".list" + numero).hide();
    $(".grid" + numero).show();

    $("#btnGrid" + numero).addClass("backColor");
    $("#btnList" + numero).removeClass("backColor");
  });

  $("#btnList" + i).click(function () {
    let numero = $(this).attr("id").substr(-1);

    $(".list" + numero).show();
    $(".grid" + numero).hide();

    $("#btnGrid" + numero).removeClass("backColor");
    $("#btnList" + numero).addClass("backColor");
  });
}

/*=============================================
EFECTOS CON EL SCROLL
=============================================*/

$(window).scroll(function () {
  let scrollY = window.pageYOffset;

  if (window.matchMedia("(min-width:768px)").matches) {
    if (scrollY < $(".banner").offset().top - 150) {
      $(".banner img").css({ "margin-top": -scrollY / 3 + "px" });
    } else {
      scrollY = 0;
    }
  }
})

  $.scrollUp({

		scrollText: "",
		scrollSpeed: 2000,
		easingType: "easeOutQuint"
});


