<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="title" content="Tienda Virtual">
    <meta name="description" content="Duis at consequat quam, vitae luctus odio. In porta sapien at justo congue imperdiet. Fusce mattis nisi eu massa dignissim, et ultricies sem facilisis.">
    <meta name="keyword" content="Curabitur tempor scelerisque turpis sit amet scelerisque. Nullam felis turpis, lacinia vel odio sed, mollis posuere ante">
    <title>Tienda Virtual</title>

    <?php
        $servidor = Ruta::ctrRutaServidor();
        $icono = ControladorPlantilla::ctrEstiloPlantilla();
        echo '<link rel="icon" href="'.$servidor.$icono["icono"].'">';

        /*=====================================
        MANTENER LA RUTA FIJA DEL PROYECTO
        ======================================*/
        $url = Ruta::ctrRuta();
    ?>

    <!--=====================================
    PLUGINS DE CSS
    ======================================-->
    <link rel="stylesheet" href="<?php echo $url; ?>vistas/css/plugins/bootstrap.min.css">
    <link rel="stylesheet" href="<?php echo $url; ?>vistas/css/plugins/font-awesome.min.css">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Ubuntu:ital,wght@0,300;0,400;0,500;0,700;1,300;1,400;1,500;1,700&display=swap" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Ubuntu+Condensed&display=swap" rel="stylesheet">

    <!--=====================================
    HOJAS DE ESTILO PERSONALIZADAS
    ======================================-->
    <link rel="stylesheet" href="<?php echo $url; ?>vistas/css/plantilla.css">
    <link rel="stylesheet" href="<?php echo $url; ?>vistas/css/cabezote.css">
    <link rel="stylesheet" href="<?php echo $url; ?>vistas/css/slide.css">
    <link rel="stylesheet" href="<?php echo $url; ?>vistas/css/productos.css">

    <!--=====================================
    PLUGINS DE JAVASCRIPT
    ======================================-->
    <script src="<?php echo $url; ?>vistas/js/plugins/jquery.min.js"></script>
    <script src="<?php echo $url; ?>vistas/js/plugins/bootstrap.min.js"></script>
    <script src="<?php echo $url; ?>vistas/js/plugins/jquery.easing.js"></script>
    <script src="<?php echo $url; ?>vistas/js/plugins/jquery.scrollUp.js"></script>
</head>
<body>

<?php
/*=====================================
CABEZOTE
======================================*/
include "modulos/cabezote.php";

/*=====================================
CONTENIDO DINÁMICO
======================================*/
$rutas = array();
$ruta = null;
$infoProducto = null;

if(isset($_GET["ruta"])) {

    $rutas = explode("/", $_GET["ruta"]);
    $item = "ruta";
    $valor = $rutas[0];

    /*=====================================
    URL'S AMIGABLES DE CATEGORÍAS
    ======================================*/
    $rutaCategorias = ControladorProductos::ctrMostrarCategorias($item, $valor);

    if(is_array($rutaCategorias) && isset($rutaCategorias["ruta"])) {
        if($rutas[0] == $rutaCategorias["ruta"]) {
            $ruta = $rutas[0];
        }
    }

    /*=====================================
    URL'S AMIGABLES DE SUBCATEGORÍAS
    ======================================*/
    $rutaSubCategorias = ControladorProductos::ctrMostrarSubCategorias($item, $valor);

    foreach ($rutaSubCategorias as $key => $value) {
        if(isset($value["ruta"]) && $rutas[0] == $value["ruta"]) {
            $ruta = $rutas[0];
        }
    }

    /*=====================================
    URL'S AMIGABLES DE PRODUCTOS
    ======================================*/
    $rutaProductos = ControladorProductos::ctrMostrarInfoProducto($item, $valor);

    if(is_array($rutaProductos) && isset($rutaProductos["ruta"]) && $rutas[0] == $rutaProductos["ruta"]) {
        $infoProducto = $rutas[0];
    }

    /*=====================================
    LISTA BLANCA DE URL'S AMIGABLES
    ======================================*/
    if($ruta != null || $rutas[0] == "articulos-gratis" || $rutas[0] == "lo-mas-vendido" || $rutas[0] == "lo-mas-visto") {
        include "modulos/productos.php";
    } else if($infoProducto !== null) {
        include "modulos/infoproducto.php";
    } else {
        include "modulos/error404.php";
    }

} else {
    include "modulos/slide.php";
    include "modulos/destacados.php";
}
?>

<!--=====================================
JAVASCRIPT PERSONALIZADO
======================================-->
<script src="<?php echo $url; ?>vistas/js/cabezote.js"></script>
<script src="<?php echo $url; ?>vistas/js/plantilla.js"></script>
<script src="<?php echo $url; ?>vistas/js/slide.js"></script>

</body>
</html>