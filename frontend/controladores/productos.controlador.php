<?php

class ControladorProductos {

    /*=====================================
	MOSTRAR CATEGORÍAS
	======================================*/

    public static function ctrMostrarCategorias($item, $valor) {

        $tabla = "categorias";

        $respuesta = ModeloProductos::mdlMostrarCategorias($tabla, $item, $valor);
        
        return $respuesta;
    }

    /*=====================================
	MOSTRAR SUBCATEGORÍAS
	======================================*/

    public static function ctrMostrarSubCategorias($item, $valor) {

        $tabla = "subcategorias";

        $respuesta = ModeloProductos::mdlMostrarSubCategorias($tabla, $item, $valor);
        
        return $respuesta;
    }
}