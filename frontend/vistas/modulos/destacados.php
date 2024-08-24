<?php

$servidor = Ruta::ctrRutaServidor();

?>


<!--=====================================
BANNER
======================================-->

<figure class="banner">

    <img src="http://localhost/ecommerce-php/backend/vistas/img/banner/default.jpg" class="img-responsive" width="100%">

    <div class="textoBanner textoDer">

        <h1 style="color:#fff">OFERTAS ESPECIALES</h1>

        <h2 style="color:#fff"><strong>50% off</strong></h2>

        <h3 style="color:#fff">Termina el 31 de Octubre</h3>

    </div>

</figure>

<?php


$titulosModulos = array("ARTICULOS GRATUITOS", "LO MÁS VENDIDO", "LO MÁS VISTO");
$rutaModulos = array("articulos-gratis", "lo-mas-vendido", "lo-mas-visto");

$gratis = [];
$ventas = [];
$vistas = [];

if ($titulosModulos[0] == "ARTÍCULOS GRATUITOS") {
    
    $ordenar = "id";
    $item = "precio";
    $valor = 0;
    
    $gratis = ControladorProductos::ctrMostrarProductos($ordenar, $item, $valor);
    
}

if ($titulosModulos[1] == "LO MÁS VENDIDO") {
    
    $ordenar = "ventas";
    $item = null;
    $valor = null;
    
    $ventas = ControladorProductos::ctrMostrarProductos($ordenar, $item, $valor);
    
}

if ($titulosModulos[2] == "LO MÁS VISTO") {
    
    $ordenar = "vistas";
    $item = null;
    $valor = null;
    
    $vistas = ControladorProductos::ctrMostrarProductos($ordenar, $item, $valor);
    
}

$modulos = array($gratis, $ventas, $vistas);

for ($i=0; $i < count($titulosModulos); $i++) { 
    
    echo '<div class="container-fluid well well-sm barraProductos">

    <div class="container">

        <div class="row">

            <div class="col-xs-12 organizarProductos">

                <div class="btn-group pull-right">

                    <button type="button" class="btn btn-default btnGrid" id="btnGrid'.$i.'">

                        <i class="fa fa-th" aria-hidden="true"></i>

                        <span class="col-xs-0 pull-right"> GRID</span>

                    </button>

                    <button type="button" class="btn btn-default btnList" id="btnList'.$i.'">

                        <i class="fa fa-list" aria-hidden="true"></i>

                        <span class="col-xs-0 pull-right"> LIST</span>

                    </button>


                </div>

            </div>

        </div>

    </div>

</div>


<div class="container-fluid productos">

    <div class="container">

        <div class="row">
        
        <div class="col-xs-12 tituloDestacado">
        
        <div class="col-sm-6 col-xs-12">

            <h1><small>'.$titulosModulos[$i].' </small></h1>

        </div>
        
        <div class="col-sm-6 col-xs-12">

            <a href="'.$rutaModulos[$i].'">

                <button class="btn btn-default backColor pull-right">

                    VER MÁS <span class="fa fa-chevron-right"></span>

                </button>

            </a>

        </div>
        
        </div>

            <div class="clearfix"></div>

            <hr>

        </div>

            <ul class="grid'.$i.'">';

                foreach ($modulos[$i] as $key => $value) {
                    
                    echo '<li class="col-md-3 col-sm-6 col-xs-12">
                    
                    <figure>

                    <a href="'.$value["ruta"].'" class="pixelProducto">

                        <img src="'.$servidor.$value["portada"].'" class="img-responsive">

                    </a>

                </figure>
                
                <h4>

                    <small>

                        <a href="'.$value["ruta"].'" class="pixelProducto">

                            '.$value["titulo"].'<br>
                            
                            <span style="color:rgba(0,0,0,0)">-</span>';

                            if (isset($value["nuevo"]) && $value["nuevo"] !== 0){

                                echo '<span class="label label-warning fontSize">Nuevo</span> ';

                            }

                            if ($value["oferta"] !== 0){

                               echo '<span class="label label-warning fontSize">'.$value["descuentoOferta"].'% off</span>';
                            }
   
                       echo '</a>

                    </small>

                </h4>
                
                <div class="col-xs-6 precio">';

                if($value["precio"] == 0){

                   echo '<h2><small>GRATIS</small></h2>';

                } else {

                    if($value["oferta"] !== 0){

                        echo '<h2><small>
                        
                                <strong class="oferta">USD $'.$value["precio"].'</strong>
                            
                            </small>
                            
                            <small>$'.$value["precioOferta"].'</small></h2>';

                    } else {

                        echo '<h2><small>USD $'.$value["precio"].'</small></h2>';
                    }


                }

               echo '</div>
                
                <div class="col-xs-6 enlaces">

                    <div class="btn-group pull-right">

                        <button type="button" class="btn btn-default btn-xs deseos" idProducto="'.$value["id"].'" data-toggle="tooltip" title="Agregar a mi lista de deseos">

                            <i class="fa fa-heart" aria-hidden="true"></i>

                        </button>';

                        if($value["tipo"] == "virtual"){

                            if($value["oferta"] !== 0){

                                echo '<button type="button" class="btn btn-default btn-xs agregarCarrito" idProducto="'.$value["id"].'" imagen="'.$servidor.$value["portada"].'" titulo="'.$value["titulo"].'" precio="'.$value["precioOferta"].'" tipo="'.$value["tipo"].'" peso="'.$value["peso"].'" data-toggle="tooltip" title="Agregar al carrito de compras">
                                
                                <i class="fa fa-shopping-cart" aria-hidden="true"></i>
                                
                                </button>';


                            } else {
                                
                                echo '<button type="button" class="btn btn-default btn-xs agregarCarrito" idProducto="'.$value["id"].'" imagen="'.$servidor.$value["portada"].'" titulo="'.$value["titulo"].'" precio="'.$value["precio"].'" tipo="'.$value["tipo"].'" peso="'.$value["peso"].'" data-toggle="tooltip" title="Agregar al carrito de compras">
                                
                                <i class="fa fa-shopping-cart" aria-hidden="true"></i>
                                
                                </button>';
                            }

                        }

                       echo '<a href="'.$value["ruta"].'" class="pixelProducto">

                            <button type="button" class="btn btn-default btn-xs" data-toggle="tooltip" title="Ver producto">

                                <i class="fa fa-eye" aria-hidden="true"></i>

                            </button>

                        </a>

                    </div>

                </div>
                
                </li>';
                }

            echo '</ul>
        
        </div>
        
        </div>';
}

?>



<!--=====================================
BARRA PRODUCTOS GRATIS
======================================-->

<div class="container-fluid well well-sm barraProductos">

    <div class="container">

        <div class="row">

            <div class="col-xs-12 organizarProductos">

                <div class="btn-group pull-right">

                    <button type="button" class="btn btn-default btnGrid" id="btnGrid0">

                        <i class="fa fa-th" aria-hidden="true"></i>

                        <span class="col-xs-0 pull-right"> GRID</span>

                    </button>

                    <button type="button" class="btn btn-default btnList" id="btnList0">

                        <i class="fa fa-list" aria-hidden="true"></i>

                        <span class="col-xs-0 pull-right"> LIST</span>

                    </button>


                </div>

            </div>

        </div>

    </div>

</div>

<!--=====================================
VITRINA DE PRODUCTOS GRATIS
======================================-->

<div class="container-fluid productos">

    <div class="container">

        <div class="row">

            <!--=====================================
            BARRA TÍTULO
            ======================================-->

            <div class="col-xs-12 tituloDestacado">

                <!--=======================================================-->

                <div class="col-sm-6 col-xs-12">

                    <h1><small>ARTÍCULOS GRATUITOS </small></h1>

                </div>

                <!--=======================================================-->

                <div class="col-sm-6 col-xs-12">

                    <a href="articulos-gratis">

                        <button class="btn btn-default backColor pull-right">

                            VER MÁS <span class="fa fa-chevron-right"></span>

                        </button>

                    </a>

                </div>

                <!--=======================================================-->

            </div>

            <div class="clearfix"></div>

            <hr>

        </div>

        <!--=====================================
        VITRINA DE PRODUCTOS EN CUADRÍCULA
        ======================================-->

        <ul class="grid0">

            <!-- Producto 1 -->

            <li class="col-md-3 col-sm-6 col-xs-12">

                <!--=======================================================-->

                <figure>

                    <a href="#" class="pixelProducto">

                        <img src="http://localhost/ecommerce-php/backend/vistas/img/productos/accesorios/accesorio04.jpg" class="img-responsive">

                    </a>

                </figure>

                <!--=======================================================-->

                <h4>

                    <small>

                        <a href="#" class="pixelProducto">

                            Collar de diamantes<br><br>

                        </a>

                    </small>

                </h4>

                <!--=======================================================-->

                <div class="col-xs-6 precio">

                    <h2><small>GRATIS</small></h2>

                </div>

                <!--=======================================================-->

                <div class="col-xs-6 enlaces">

                    <div class="btn-group pull-right">

                        <button type="button" class="btn btn-default btn-xs deseos" idProducto="470" data-toggle="tooltip" title="Agregar a mi lista de deseos">

                            <i class="fa fa-heart" aria-hidden="true"></i>

                        </button>

                        <a href="#" class="pixelProducto">

                            <button type="button" class="btn btn-default btn-xs" data-toggle="tooltip" title="Ver producto">

                                <i class="fa fa-eye" aria-hidden="true"></i>

                            </button>

                        </a>

                    </div>

                </div>

            </li>

            <!-- Producto 2 -->

            <li class="col-md-3 col-sm-6 col-xs-12">

                <!--=======================================================-->

                <figure>

                    <a href="#" class="pixelProducto">

                        <img src="http://localhost/ecommerce-php/backend/vistas/img/productos/accesorios/accesorio03.jpg" class="img-responsive">

                    </a>

                </figure>

                <!--=======================================================-->

                <h4>

                    <small>

                        <a href="#" class="pixelProducto">

                            Bolso deportivo gris<br><br>

                        </a>

                    </small>

                </h4>

                <!--=======================================================-->

                <div class="col-xs-6 precio">

                    <h2><small>GRATIS</small></h2>

                </div>

                <!--=======================================================-->

                <div class="col-xs-6 enlaces">

                    <div class="btn-group pull-right">

                        <button type="button" class="btn btn-default btn-xs deseos" idProducto="470" data-toggle="tooltip" title="Agregar a mi lista de deseos">

                            <i class="fa fa-heart" aria-hidden="true"></i>

                        </button>

                        <a href="#" class="pixelProducto">

                            <button type="button" class="btn btn-default btn-xs" data-toggle="tooltip" title="Ver producto">

                                <i class="fa fa-eye" aria-hidden="true"></i>

                            </button>

                        </a>

                    </div>

                </div>

            </li>

            <!-- Producto 3 -->

            <li class="col-md-3 col-sm-6 col-xs-12">

                <!--=======================================================-->

                <figure>

                    <a href="#" class="pixelProducto">

                        <img src="http://localhost/ecommerce-php/backend/vistas/img/productos/accesorios/accesorio02.jpg" class="img-responsive">

                    </a>

                </figure>

                <!--=======================================================-->

                <h4>

                    <small>

                        <a href="#" class="pixelProducto">

                            Bolso militar<br><br>

                        </a>

                    </small>

                </h4>

                <!--=======================================================-->

                <div class="col-xs-6 precio">

                    <h2><small>GRATIS</small></h2>

                </div>

                <!--=======================================================-->

                <div class="col-xs-6 enlaces">

                    <div class="btn-group pull-right">

                        <button type="button" class="btn btn-default btn-xs deseos" idProducto="470" data-toggle="tooltip" title="Agregar a mi lista de deseos">

                            <i class="fa fa-heart" aria-hidden="true"></i>

                        </button>

                        <a href="#" class="pixelProducto">

                            <button type="button" class="btn btn-default btn-xs" data-toggle="tooltip" title="Ver producto">

                                <i class="fa fa-eye" aria-hidden="true"></i>

                            </button>

                        </a>

                    </div>

                </div>

            </li>

            <!-- Producto 4 -->

            <li class="col-md-3 col-sm-6 col-xs-12">

                <!--=======================================================-->

                <figure>

                    <a href="#" class="pixelProducto">

                        <img src="http://localhost/ecommerce-php/backend/vistas/img/productos/accesorios/accesorio01.jpg" class="img-responsive">

                    </a>

                </figure>

                <!--=======================================================-->

                <h4>

                    <small>

                        <a href="#" class="pixelProducto">

                            Pulsera de diamantes<br>

                            <span class="label label-warning fontSize">Nuevo</span>

                        </a>

                    </small>

                </h4>

                <!--=======================================================-->

                <div class="col-xs-6 precio">

                    <h2><small>GRATIS</small></h2>

                </div>

                <!--=======================================================-->

                <div class="col-xs-6 enlaces">

                    <div class="btn-group pull-right">

                        <button type="button" class="btn btn-default btn-xs deseos" idProducto="470" data-toggle="tooltip" title="Agregar a mi lista de deseos">

                            <i class="fa fa-heart" aria-hidden="true"></i>

                        </button>

                        <a href="#" class="pixelProducto">

                            <button type="button" class="btn btn-default btn-xs" data-toggle="tooltip" title="Ver producto">

                                <i class="fa fa-eye" aria-hidden="true"></i>

                            </button>

                        </a>

                    </div>

                </div>

            </li>

        </ul>

        <!--=====================================
        VITRINA DE PRODUCTOS EN LISTA
        ======================================-->

        <ul class="list0" style="display:none">

            <!-- PRODUCTO 1 -->

            <li class="col-xs-12">

                <!--=====================================-->

                <div class="col-lg-2 col-md-3 col-sm-4 col-xs-12">

                    <figure>

                        <a href="collar-de-diamantes-11" class="pixelProducto"><img src="http://localhost/ecommerce-php/backend/vistas/img/productos/accesorios/accesorio04.jpg" class="img-responsive"></a>

                    </figure>

                </div>

                <!--=====================================-->

                <div class="col-lg-10 col-md-7 col-sm-8 col-xs-12">

                    <h1>

                        <small>

                            <a href="#" class="pixelProducto">Collar de diamantes</a>

                        </small>

                    </h1>

                    <p class="text-muted">Lorem ipsum dolor sit amet consectetur adipisicing elit. Necessitatibus animi fugiat saepe sequi enim repudiandae eaque, aliquid asperiores laudantium, dolores optio itaque repellat velit numquam nobis alias rem id ratione.</p>

                    <h2><small>GRATIS</small></h2>

                    <div class="btn-group pull-left enlaces">

                        <button type="button" class="btn btn-default btn-xs deseos" idProducto="470" data-toggle="tooltip" title="Agregar a mi lista de deseos">

                            <i class="fa fa-heart" aria-hidden="true"></i>

                        </button>

                        <a href="#" class="pixelProducto">

                            <button type="button" class="btn btn-default btn-xs" data-toggle="tooltip" title="Ver producto">

                                <i class="fa fa-eye" aria-hidden="true"></i>

                            </button>

                        </a>

                    </div>

                </div>

                <!--=====================================-->

                <div class="col-xs-12">

                    <hr>

                </div>

                <!--=====================================-->

            </li>

            <!-- PRODUCTO 2 -->

            <li class="col-xs-12">

                <!--=====================================-->

                <div class="col-lg-2 col-md-3 col-sm-4 col-xs-12">

                    <figure>

                        <a href="collar-de-diamantes-11" class="pixelProducto"><img src="http://localhost/ecommerce-php/backend/vistas/img/productos/accesorios/accesorio03.jpg" class="img-responsive"></a>

                    </figure>

                </div>

                <!--=====================================-->

                <div class="col-lg-10 col-md-7 col-sm-8 col-xs-12">

                    <h1>

                        <small>

                            <a href="#" class="pixelProducto">Bolso Deportivo Gris</a>

                        </small>

                    </h1>

                    <p class="text-muted">Lorem ipsum dolor sit amet consectetur adipisicing elit. Necessitatibus animi fugiat saepe sequi enim repudiandae eaque, aliquid asperiores laudantium, dolores optio itaque repellat velit numquam nobis alias rem id ratione.</p>

                    <h2><small>GRATIS</small></h2>

                    <div class="btn-group pull-left enlaces">

                        <button type="button" class="btn btn-default btn-xs deseos" idProducto="470" data-toggle="tooltip" title="Agregar a mi lista de deseos">

                            <i class="fa fa-heart" aria-hidden="true"></i>

                        </button>

                        <a href="#" class="pixelProducto">

                            <button type="button" class="btn btn-default btn-xs" data-toggle="tooltip" title="Ver producto">

                                <i class="fa fa-eye" aria-hidden="true"></i>

                            </button>

                        </a>

                    </div>

                </div>

                <!--=====================================-->

                <div class="col-xs-12">

                    <hr>

                </div>

                <!--=====================================-->

            </li>

            <!-- PRODUCTO 3 -->

            <li class="col-xs-12">

                <!--=====================================-->

                <div class="col-lg-2 col-md-3 col-sm-4 col-xs-12">

                    <figure>

                        <a href="collar-de-diamantes-11" class="pixelProducto"><img src="http://localhost/ecommerce-php/backend/vistas/img/productos/accesorios/accesorio02.jpg" class="img-responsive"></a>

                    </figure>

                </div>

                <!--=====================================-->

                <div class="col-lg-10 col-md-7 col-sm-8 col-xs-12">

                    <h1>

                        <small>

                            <a href="#" class="pixelProducto">Bolso Militar</a>

                        </small>

                    </h1>

                    <p class="text-muted">Lorem ipsum dolor sit amet consectetur adipisicing elit. Necessitatibus animi fugiat saepe sequi enim repudiandae eaque, aliquid asperiores laudantium, dolores optio itaque repellat velit numquam nobis alias rem id ratione.</p>

                    <h2><small>GRATIS</small></h2>

                    <div class="btn-group pull-left enlaces">

                        <button type="button" class="btn btn-default btn-xs deseos" idProducto="470" data-toggle="tooltip" title="Agregar a mi lista de deseos">

                            <i class="fa fa-heart" aria-hidden="true"></i>

                        </button>

                        <a href="#" class="pixelProducto">

                            <button type="button" class="btn btn-default btn-xs" data-toggle="tooltip" title="Ver producto">

                                <i class="fa fa-eye" aria-hidden="true"></i>

                            </button>

                        </a>

                    </div>

                </div>

                <!--=====================================-->

                <div class="col-xs-12">

                    <hr>

                </div>

                <!--=====================================-->

            </li>

            <!-- PRODUCTO 4 -->

            <li class="col-xs-12">

                <!--=====================================-->

                <div class="col-lg-2 col-md-3 col-sm-4 col-xs-12">

                    <figure>

                        <a href="collar-de-diamantes-11" class="pixelProducto"><img src="http://localhost/ecommerce-php/backend/vistas/img/productos/accesorios/accesorio01.jpg" class="img-responsive"></a>

                    </figure>

                </div>

                <!--=====================================-->

                <div class="col-lg-10 col-md-7 col-sm-8 col-xs-12">

                    <h1>

                        <small>

                            <a href="#" class="pixelProducto">Pulsera de Diamantes</a>

                        </small>

                    </h1>

                    <p class="text-muted">Lorem ipsum dolor sit amet consectetur adipisicing elit. Necessitatibus animi fugiat saepe sequi enim repudiandae eaque, aliquid asperiores laudantium, dolores optio itaque repellat velit numquam nobis alias rem id ratione.</p>

                    <h2><small>GRATIS</small></h2>

                    <div class="btn-group pull-left enlaces">

                        <button type="button" class="btn btn-default btn-xs deseos" idProducto="470" data-toggle="tooltip" title="Agregar a mi lista de deseos">

                            <i class="fa fa-heart" aria-hidden="true"></i>

                        </button>

                        <a href="#" class="pixelProducto">

                            <button type="button" class="btn btn-default btn-xs" data-toggle="tooltip" title="Ver producto">

                                <i class="fa fa-eye" aria-hidden="true"></i>

                            </button>

                        </a>

                    </div>

                </div>

                <!--=====================================-->

                <div class="col-xs-12">

                    <hr>

                </div>

                <!--=====================================-->

            </li>

        </ul>

    </div>

</div>

<!--=====================================
BARRA PRODUCTOS MÁS VENDIDOS
======================================-->

<div class="container-fluid well well-sm barraProductos">

    <div class="container">

        <div class="row">

            <div class="col-xs-12 organizarProductos">

                <div class="btn-group pull-right">

                    <button type="button" class="btn btn-default btnGrid" id="btnGrid1">

                        <i class="fa fa-th" aria-hidden="true"></i>

                        <span class="col-xs-0 pull-right"> GRID</span>

                    </button>

                    <button type="button" class="btn btn-default btnList" id="btnList1">

                        <i class="fa fa-list" aria-hidden="true"></i>

                        <span class="col-xs-0 pull-right"> LIST</span>

                    </button>


                </div>

            </div>

        </div>

    </div>

</div>

<!--=====================================
VITRINA DE PRODUCTOS MÁS VENDIDOS
======================================-->

<div class="container-fluid productos">

    <div class="container">

        <div class="row">

            <!--=====================================
            BARRA TÍTULO
            ======================================-->

            <div class="col-xs-12 tituloDestacado">

                <!--=======================================================-->

                <div class="col-sm-6 col-xs-12">

                    <h1><small>LO MÁS VENDIDO </small></h1>

                </div>

                <!--=======================================================-->

                <div class="col-sm-6 col-xs-12">

                    <a href="lo-mas-vendido">

                        <button class="btn btn-default backColor pull-right">

                            VER MÁS <span class="fa fa-chevron-right"></span>

                        </button>

                    </a>

                </div>

                <!--=======================================================-->

            </div>

            <div class="clearfix"></div>

            <hr>

        </div>

        <!--=====================================
        VITRINA DE PRODUCTOS EN CUADRÍCULA
        ======================================-->

        <ul class="grid1">

            <!-- Producto 1 -->

            <li class="col-md-3 col-sm-6 col-xs-12">

                <!--=======================================================-->

                <figure>

                    <a href="#" class="pixelProducto">

                        <img src="http://localhost/ecommerce-php/backend/vistas/img/productos/ropa/ropa03.jpg" class="img-responsive">

                    </a>

                </figure>

                <!--=======================================================-->

                <h4>

                    <small>

                        <a href="#" class="pixelProducto">

                            Falda de Flores<br>

                            <span class="label label-warning fontSize">Nuevo</span>

                            <span class="label label-warning fontSize">40% off</span>

                        </a>

                    </small>

                </h4>

                <!--=======================================================-->

                <div class="col-xs-6 precio">

                    <h2>

                        <small>

                            <strong class="oferta">USD $29</strong>

                        </small>

                        <small>$11</small>

                    </h2>

                </div>

                <!--=======================================================-->

                <div class="col-xs-6 enlaces">

                    <div class="btn-group pull-right">

                        <button type="button" class="btn btn-default btn-xs deseos" idProducto="470" data-toggle="tooltip" title="Agregar a mi lista de deseos">

                            <i class="fa fa-heart" aria-hidden="true"></i>

                        </button>

                        <a href="#" class="pixelProducto">

                            <button type="button" class="btn btn-default btn-xs" data-toggle="tooltip" title="Ver producto">

                                <i class="fa fa-eye" aria-hidden="true"></i>

                            </button>

                        </a>

                    </div>

                </div>

            </li>

            <!-- Producto 2 -->

            <li class="col-md-3 col-sm-6 col-xs-12">

                <!--=======================================================-->

                <figure>

                    <a href="#" class="pixelProducto">

                        <img src="http://localhost/ecommerce-php/backend/vistas/img/productos/ropa/ropa04.jpg" class="img-responsive">

                    </a>

                </figure>

                <!--=======================================================-->

                <h4>

                    <small>

                        <a href="#" class="pixelProducto">

                            Vestido Jean<br>

                            <span class="label label-warning fontSize">40% off</span>

                        </a>

                    </small>

                </h4>

                <!--=======================================================-->

                <div class="col-xs-6 precio">

                    <h2>

                        <small>

                            <strong class="oferta">USD $29</strong>

                        </small>

                        <small>$11</small>

                    </h2>

                </div>

                <!--=======================================================-->

                <div class="col-xs-6 enlaces">

                    <div class="btn-group pull-right">

                        <button type="button" class="btn btn-default btn-xs deseos" idProducto="470" data-toggle="tooltip" title="Agregar a mi lista de deseos">

                            <i class="fa fa-heart" aria-hidden="true"></i>

                        </button>

                        <a href="#" class="pixelProducto">

                            <button type="button" class="btn btn-default btn-xs" data-toggle="tooltip" title="Ver producto">

                                <i class="fa fa-eye" aria-hidden="true"></i>

                            </button>

                        </a>

                    </div>

                </div>

            </li>

            <!-- Producto 3 -->

            <li class="col-md-3 col-sm-6 col-xs-12">

                <!--=======================================================-->

                <figure>

                    <a href="#" class="pixelProducto">

                        <img src="http://localhost/ecommerce-php/backend/vistas/img/productos/ropa/ropa02.jpg" class="img-responsive">

                    </a>

                </figure>

                <!--=======================================================-->

                <h4>

                    <small>

                        <a href="#" class="pixelProducto">

                            Vestido Clásico<br>

                            <span class="label label-warning fontSize">40% off</span>

                        </a>

                    </small>

                </h4>

                <!--=======================================================-->

                <div class="col-xs-6 precio">

                    <h2>

                        <small>

                            <strong class="oferta">USD $29</strong>

                        </small>

                        <small>$11</small>

                    </h2>

                </div>

                <!--=======================================================-->

                <div class="col-xs-6 enlaces">

                    <div class="btn-group pull-right">

                        <button type="button" class="btn btn-default btn-xs deseos" idProducto="470" data-toggle="tooltip" title="Agregar a mi lista de deseos">

                            <i class="fa fa-heart" aria-hidden="true"></i>

                        </button>

                        <a href="#" class="pixelProducto">

                            <button type="button" class="btn btn-default btn-xs" data-toggle="tooltip" title="Ver producto">

                                <i class="fa fa-eye" aria-hidden="true"></i>

                            </button>

                        </a>

                    </div>

                </div>

            </li>

            <!-- Producto 4 -->

            <li class="col-md-3 col-sm-6 col-xs-12">

                <!--=======================================================-->

                <figure>

                    <a href="#" class="pixelProducto">

                        <img src="http://localhost/ecommerce-php/backend/vistas/img/productos/ropa/ropa06.jpg" class="img-responsive">

                    </a>

                </figure>

                <!--=======================================================-->

                <h4>

                    <small>

                        <a href="#" class="pixelProducto">

                            Top Dama

                            <br>
                            <br>

                        </a>

                    </small>

                </h4>

                <!--=======================================================-->

                <div class="col-xs-6 precio">

                    <h2>

                        <small>USD $29</small>

                    </h2>

                </div>

                <!--=======================================================-->

                <div class="col-xs-6 enlaces">

                    <div class="btn-group pull-right">

                        <button type="button" class="btn btn-default btn-xs deseos" idProducto="470" data-toggle="tooltip" title="Agregar a mi lista de deseos">

                            <i class="fa fa-heart" aria-hidden="true"></i>

                        </button>

                        <a href="#" class="pixelProducto">

                            <button type="button" class="btn btn-default btn-xs" data-toggle="tooltip" title="Ver producto">

                                <i class="fa fa-eye" aria-hidden="true"></i>

                            </button>

                        </a>

                    </div>

                </div>

            </li>


        </ul>

        <!--=====================================
        VITRINA DE PRODUCTOS EN LISTA
        ======================================-->

        <ul class="list1" style="display: none;">

            <!-- Producto 1 -->

            <li class="col-xs-12">

                <!--=======================================================-->

                <div class="col-lg-2 col-md-3 col-sm-4 col-xs-12">

                    <figure>

                        <a href="falda-de-flores-1" class="pixelProducto">

                            <img src="http://localhost/ecommerce-php/backend/vistas/img/productos/ropa/ropa03.jpg" class="img-responsive">

                        </a>

                    </figure>

                </div>

                <!--=======================================================-->

                <div class="col-lg-10 col-md-7 col-sm-8 col-xs-12">

                    <h1>

                        <small>

                            <a href="#" class="pixelProducto">

                                Falda de Flores

                                <span class="label label-warning">Nuevo</span>

                                <span class="label label-warning">40% off</span>

                            </a>

                        </small>

                    </h1>

                    <p class="text-muted">Lorem ipsum dolor sit, amet consectetur adipisicing elit. Repellendus accusantium tempora commodi nesciunt adipisci labore iste ipsum aperiam laudantium explicabo provident vero, sint consequatur quidem vel nisi magni eveniet soluta.</p>

                    <h2>

                        <small>

                            <strong class="oferta">USD $29</strong>

                        </small>

                        <small>$11</small>

                    </h2>

                    <div class="btn-group pull-left enlaces">

                        <button type="button" class="btn btn-default btn-xs deseos" idProducto="470" data-toggle="tooltip" title="Agregar a mi lista de deseos">

                            <i class="fa fa-heart" aria-hidden="true"></i>

                        </button>

                        <a href="#" class="pixelProducto">

                            <button type="button" class="btn btn-default btn-xs" data-toggle="tooltip" title="Ver producto">

                                <i class="fa fa-eye" aria-hidden="true"></i>

                            </button>

                        </a>

                    </div>

                </div>

            </li>

        </ul>

    </div>

</div>

<!--=====================================
BARRA PRODUCTOS MÁS VISTOS
======================================-->

<div class="container-fluid well well-sm barraProductos">

    <div class="container">

        <div class="row">

            <div class="col-xs-12 organizarProductos">

                <div class="btn-group pull-right">

                    <button type="button" class="btn btn-default btnGrid" id="btnGrid2">

                        <i class="fa fa-th" aria-hidden="true"></i>

                        <span class="col-xs-0 pull-right"> GRID</span>

                    </button>

                    <button type="button" class="btn btn-default btnList" id="btnList2">

                        <i class="fa fa-list" aria-hidden="true"></i>

                        <span class="col-xs-0 pull-right"> LIST</span>

                    </button>


                </div>

            </div>

        </div>

    </div>

</div>

<!--=====================================
VITRINA DE PRODUCTOS MÁS VISTOS
======================================-->

<div class="container-fluid productos">

    <div class="container">

        <div class="row">

            <!--=====================================
            BARRA TÍTULO
            ======================================-->

            <div class="col-xs-12 tituloDestacado">

                <!--=======================================================-->

                <div class="col-sm-6 col-xs-12">

                    <h1><small>LO MÁS VISTO </small></h1>

                </div>

                <!--=======================================================-->

                <div class="col-sm-6 col-xs-12">

                    <a href="lo-mas-visto">

                        <button class="btn btn-default backColor pull-right">

                            VER MÁS <span class="fa fa-chevron-right"></span>

                        </button>

                    </a>

                </div>

                <!--=======================================================-->

            </div>

            <div class="clearfix"></div>

            <hr>

        </div>

        <!--=====================================
        VITRINA DE PRODUCTOS EN CUADRÍCULA
        ======================================-->

        <ul class="grid2">

            <!-- Producto 1 -->

            <li class="col-md-3 col-sm-6 col-xs-12">

                <!--=======================================================-->

                <figure>

                    <a href="#" class="pixelProducto">

                        <img src="http://localhost/ecommerce-php/backend/vistas/img/productos/cursos/curso05.jpg" class="img-responsive">

                    </a>

                </figure>

                <!--=======================================================-->

                <h4>

                    <small>

                        <a href="#" class="pixelProducto">

                            Curso de Bootstrap <br>

                            <span class="label label-warning fontSize">90% off</span>

                        </a>

                    </small>

                </h4>

                <!--=======================================================-->

                <div class="col-xs-6 precio">

                    <h2>

                        <small>

                            <strong class="oferta">USD $100</strong>

                        </small>

                        <small>$10</small>

                    </h2>

                </div>

                <!--=======================================================-->

                <div class="col-xs-6 enlaces">

                    <div class="btn-group pull-right">

                        <button type="button" class="btn btn-default btn-xs deseos" idProducto="470" data-toggle="tooltip" title="Agregar a mi lista de deseos">

                            <i class="fa fa-heart" aria-hidden="true"></i>

                        </button>

                        <button type="button" class="btn btn-default btn-xs agregarCarrito" idProducto="404" imagen="http://localhost/ecommerce-php/backend/vistas/img/productos/cursos/curso05.jpg" titulo="Curso de Bootstrap" precio="10" tipo="virtual" peso="0" data-toggle="tooltip" title="Agregar al carrito de compras">

                            <i class="fa fa-shopping-cart" aria-hidden="true"></i>

                        </button>

                        <a href="#" class="pixelProducto">

                            <button type="button" class="btn btn-default btn-xs" data-toggle="tooltip" title="Ver producto">

                                <i class="fa fa-eye" aria-hidden="true"></i>

                            </button>

                        </a>

                    </div>

                </div>

            </li>

            <!-- Producto 2 -->

            <li class="col-md-3 col-sm-6 col-xs-12">

                <!--=======================================================-->

                <figure>

                    <a href="#" class="pixelProducto">

                        <img src="http://localhost/ecommerce-php/backend/vistas/img/productos/cursos/curso04.jpg" class="img-responsive">

                    </a>

                </figure>

                <!--=======================================================-->

                <h4>

                    <small>

                        <a href="#" class="pixelProducto">

                            Curso de Canvas y Javascrip <br>

                            <span class="label label-warning fontSize">90% off</span>

                        </a>

                    </small>

                </h4>

                <!--=======================================================-->

                <div class="col-xs-6 precio">

                    <h2>

                        <small>

                            <strong class="oferta">USD $100</strong>

                        </small>

                        <small>$10</small>

                    </h2>

                </div>

                <!--=======================================================-->

                <div class="col-xs-6 enlaces">

                    <div class="btn-group pull-right">

                        <button type="button" class="btn btn-default btn-xs deseos" idProducto="470" data-toggle="tooltip" title="Agregar a mi lista de deseos">

                            <i class="fa fa-heart" aria-hidden="true"></i>

                        </button>

                        <button type="button" class="btn btn-default btn-xs agregarCarrito" idProducto="404" imagen="http://localhost/ecommerce-php/backend/vistas/img/productos/cursos/curso04.jpg" titulo="Curso de Canvas y Javascript" precio="10" tipo="virtual" peso="0" data-toggle="tooltip" title="Agregar al carrito de compras">

                            <i class="fa fa-shopping-cart" aria-hidden="true"></i>

                        </button>

                        <a href="#" class="pixelProducto">

                            <button type="button" class="btn btn-default btn-xs" data-toggle="tooltip" title="Ver producto">

                                <i class="fa fa-eye" aria-hidden="true"></i>

                            </button>

                        </a>

                    </div>

                </div>

            </li>

            <!-- Producto 3 -->

            <li class="col-md-3 col-sm-6 col-xs-12">

                <!--=======================================================-->

                <figure>

                    <a href="#" class="pixelProducto">

                        <img src="http://localhost/ecommerce-php/backend/vistas/img/productos/cursos/curso02.jpg" class="img-responsive">

                    </a>

                </figure>

                <!--=======================================================-->

                <h4>

                    <small>

                        <a href="#" class="pixelProducto">

                            Aprenjde Javascript desde cero <br>

                            <span class="label label-warning fontSize">90% off</span>

                        </a>

                    </small>

                </h4>

                <!--=======================================================-->

                <div class="col-xs-6 precio">

                    <h2>

                        <small>

                            <strong class="oferta">USD $100</strong>

                        </small>

                        <small>$10</small>

                    </h2>

                </div>

                <!--=======================================================-->

                <div class="col-xs-6 enlaces">

                    <div class="btn-group pull-right">

                        <button type="button" class="btn btn-default btn-xs deseos" idProducto="470" data-toggle="tooltip" title="Agregar a mi lista de deseos">

                            <i class="fa fa-heart" aria-hidden="true"></i>

                        </button>

                        <button type="button" class="btn btn-default btn-xs agregarCarrito" idProducto="404" imagen="http://localhost/ecommerce-php/backend/vistas/img/productos/cursos/curso02.jpg" titulo="Aprende Javascript desde cero" precio="10" tipo="virtual" peso="0" data-toggle="tooltip" title="Agregar al carrito de compras">

                            <i class="fa fa-shopping-cart" aria-hidden="true"></i>

                        </button>

                        <a href="#" class="pixelProducto">

                            <button type="button" class="btn btn-default btn-xs" data-toggle="tooltip" title="Ver producto">

                                <i class="fa fa-eye" aria-hidden="true"></i>

                            </button>

                        </a>

                    </div>

                </div>

            </li>

            <!-- Producto 4 -->

            <li class="col-md-3 col-sm-6 col-xs-12">

                <!--=======================================================-->

                <figure>

                    <a href="#" class="pixelProducto">

                        <img src="http://localhost/ecommerce-php/backend/vistas/img/productos/cursos/curso03.jpg" class="img-responsive">

                    </a>

                </figure>

                <!--=======================================================-->

                <h4>

                    <small>

                        <a href="#" class="pixelProducto">

                            Curso de jQuery <br>

                            <span class="label label-warning fontSize">90% off</span>

                        </a>

                    </small>

                </h4>

                <!--=======================================================-->

                <div class="col-xs-6 precio">

                    <h2>

                        <small>

                            <strong class="oferta">USD $100</strong>

                        </small>

                        <small>$10</small>

                    </h2>

                </div>

                <!--=======================================================-->

                <div class="col-xs-6 enlaces">

                    <div class="btn-group pull-right">

                        <button type="button" class="btn btn-default btn-xs deseos" idProducto="470" data-toggle="tooltip" title="Agregar a mi lista de deseos">

                            <i class="fa fa-heart" aria-hidden="true"></i>

                        </button>

                        <button type="button" class="btn btn-default btn-xs agregarCarrito" idProducto="404" imagen="http://localhost/ecommerce-php/backend/vistas/img/productos/cursos/curso03.jpg" titulo="Curso de jQuery" precio="10" tipo="virtual" peso="0" data-toggle="tooltip" title="Agregar al carrito de compras">

                            <i class="fa fa-shopping-cart" aria-hidden="true"></i>

                        </button>

                        <a href="#" class="pixelProducto">

                            <button type="button" class="btn btn-default btn-xs" data-toggle="tooltip" title="Ver producto">

                                <i class="fa fa-eye" aria-hidden="true"></i>

                            </button>

                        </a>

                    </div>

                </div>

            </li>

        </ul>

        <!--=====================================
        VITRINA DE PRODUCTOS EN LISTA
        ======================================-->

        <ul class="list2" style="display: none;">

            <!-- Producto 1 -->

            <li class="col-xs-12">

                <!--=======================================================-->

                <div class="col-lg-2 col-md-3 col-sm-4 col-xs-12">

                    <figure>

                        <a href="falda-de-flores-1" class="pixelProducto">

                            <img src="http://localhost/ecommerce-php/backend/vistas/img/productos/cursos/curso05.jpg" class="img-responsive">

                        </a>

                    </figure>

                </div>

                <!--=======================================================-->

                <div class="col-lg-10 col-md-7 col-sm-8 col-xs-12">

                    <h1>

                        <small>

                            <a href="#" class="pixelProducto">

                                Curso de Bootstrap

                                <span class="label label-warning">90% off</span>

                            </a>

                        </small>

                    </h1>

                    <p class="text-muted">Lorem ipsum dolor sit, amet consectetur adipisicing elit. Repellendus accusantium tempora commodi nesciunt adipisci labore iste ipsum aperiam laudantium explicabo provident vero, sint consequatur quidem vel nisi magni eveniet soluta.</p>

                    <h2>

                        <small>

                            <strong class="oferta">USD $100</strong>

                        </small>

                        <small>$10</small>

                    </h2>

                    <div class="btn-group pull-left enlaces">

                        <button type="button" class="btn btn-default btn-xs deseos" idProducto="1" data-toggle="tooltip" title="Agregar a mi lista de deseos">

                            <i class="fa fa-heart" aria-hidden="true"></i>

                        </button>

                        <button type="button" class="btn btn-default btn-xs agregarCarrito" idProducto="404" imagen="http://localhost/ecommerce-php/backend/vistas/img/productos/cursos/curso05.jpg" titulo="Curso de Bootstrap" precio="10" tipo="virtual" peso="0" data-toggle="tooltip" title="Agregar al carrito de compras">

                            <i class="fa fa-shopping-cart" aria-hidden="true"></i>

                        </button>

                        <a href="#" class="pixelProducto">

                            <button type="button" class="btn btn-default btn-xs" data-toggle="tooltip" title="Ver producto">

                                <i class="fa fa-eye" aria-hidden="true"></i>

                            </button>

                        </a>

                    </div>

                </div>

            </li>

        </ul>

    </div>

</div>