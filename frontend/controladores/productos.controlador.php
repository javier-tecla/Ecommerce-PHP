<?php

class ControladorProductos {

    /*=====================================
	MOSTRAR CATEGORÍAS
	======================================*/

    public static function ctrMostrarCategorias() {

        $tabla = "categorias";

        $respuesta = ModeloProductos::mdlMostrarCategorias($tabla);
        
        return $respuesta;
    }

    /*=====================================
	MOSTRAR SUB-CATEGORÍAS
	======================================*/

    public static function ctrMostrarSubCategorias($id) {

        $tabla = "subcategorias";

        $respuesta = ModeloProductos::mdlMostrarSubCategorias($tabla, $id);
        
        return $respuesta;
    }
}