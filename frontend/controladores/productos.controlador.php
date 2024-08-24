<?php

class ControladorProductos {

    /*=====================================
	MOSTRAR CATEGORÍAS
	======================================*/

    public static function ctrMostrarCategorias($item, $valor) {

        $tabla = "categorias";

        $respuesta = ModeloProductos::mdlMostrarCategorias($tabla, $item, $valor);

         // Verifica si la respuesta es falsa, si es así, devuelve un array vacío
         if ($respuesta === false) {
            return array();
        }
        
        return $respuesta;
    }

    /*=====================================
	MOSTRAR SUBCATEGORÍAS
	======================================*/

    public static function ctrMostrarSubCategorias($item, $valor) {

        $tabla = "subcategorias";

        $respuesta = ModeloProductos::mdlMostrarSubCategorias($tabla, $item, $valor);

         // Verifica si la respuesta es falsa, si es así, devuelve un array vacío
         if ($respuesta === false) {
            return array();
        }
        
        return $respuesta;
    }

    /*=====================================
	MOSTRAR PRODUCTOS
	======================================*/

    public static function ctrMostrarProductos($ordenar, $item, $valor) {

        $tabla = "productos";

        $respuesta = ModeloProductos::mdlMostrarProductos($tabla, $ordenar, $item, $valor);

        // Verifica si la respuesta es falsa, si es así, devuelve un array vacío
        if ($respuesta === false) {
            return array();
        }

        return $respuesta;
    }

    /*=====================================
	MOSTRAR INFOPRODUCTO
	======================================*/

    public static function ctrMostrarInfoProducto($item, $valor) {

        $tabla = "productos";

        $respuesta = ModeloProductos::mdlMostrarInfoProducto($tabla, $item, $valor);

        // Verifica si la respuesta es falsa, si es así, devuelve un array vacío
        if ($respuesta === false) {
            return array();
        }

        return $respuesta;
    }
}