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

        $icono = ControladorPlantilla::ctrEstiloPlantilla();

        echo '<link rel="icon" href="http://localhost/ecommerce-php/backend/'.$icono["icono"].'">';

        /*=====================================
        MANTENER LA RUTA FIJA DEL PROYECTO
        ======================================*/

        $url = Ruta::ctrRuta();

    ?>

    <link rel="stylesheet" href="<?php echo $url; ?>vistas/css/plugins/bootstrap.min.css">
    <link rel="stylesheet" href="<?php echo $url; ?>vistas/css/plugins/font-awesome.min.css">

    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Ubuntu:ital,wght@0,300;0,400;0,500;0,700;1,300;1,400;1,500;1,700&display=swap" rel="stylesheet">

    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Ubuntu+Condensed&display=swap" rel="stylesheet">

    <link rel="stylesheet" href="<?php echo $url; ?>vistas/css/plantilla.css">
    <link rel="stylesheet" href="<?php echo $url; ?>vistas/css/cabezote.css">


    <script src="<?php echo $url; ?>vistas/js/plugins/jquery.min.js"></script>
    <script src="<?php echo $url; ?>vistas/js/plugins/bootstrap.min.js"></script>
    


</head>
<body>

<?php

/*=====================================
CABEZOTE
======================================*/

include "modulos/cabezote.php";

$rutas = array();

if(isset($_GET["ruta"])) {

    $rutas = explode("/", $_GET["ruta"]);

}

?>

<script src="<?php echo $url; ?>vistas/js/cabezote.js"></script>
<script src="<?php echo $url; ?>vistas/js/plantilla.js"></script>

</body>
</html>