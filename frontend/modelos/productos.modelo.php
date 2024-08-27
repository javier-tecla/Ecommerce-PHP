<?php


require_once "conexion.php";

class ModeloProductos{

    /*=============================================
    MOSTRAR CATEGORÍAS
    =============================================*/

    static public function mdlMostrarCategorias($tabla, $item, $valor){

        try {
            if($item != null){

                $stmt = Conexion::conectar()->prepare("SELECT * FROM $tabla WHERE $item = :$item");

                $stmt->bindParam(":".$item, $valor, PDO::PARAM_STR);

                $stmt->execute();

                return $stmt->fetch(PDO::FETCH_ASSOC);

            } else {

                $stmt = Conexion::conectar()->prepare("SELECT * FROM $tabla");

                $stmt->execute();

                return $stmt->fetchAll(PDO::FETCH_ASSOC);

            }
        } catch (Exception $e) {
            error_log("Error en mdlMostrarCategorias: " . $e->getMessage());
            return false;
        } finally {
            $stmt = null; // Destruye el objeto y libera la conexión
        }
    }

    /*=============================================
    MOSTRAR SUB-CATEGORÍAS
    =============================================*/

    public static function mdlMostrarSubCategorias($tabla, $item, $valor){

        try {
            if($item != null){

                $stmt = Conexion::conectar()->prepare("SELECT * FROM $tabla WHERE $item = :$item");

                $stmt->bindParam(":".$item, $valor, PDO::PARAM_STR);

                $stmt->execute();

                return $stmt->fetchAll(PDO::FETCH_ASSOC);

            } else {

                $stmt = Conexion::conectar()->prepare("SELECT * FROM $tabla");

                $stmt->execute();

                return $stmt->fetchAll(PDO::FETCH_ASSOC);

            }
        } catch (Exception $e) {
            error_log("Error en mdlMostrarSubCategorias: " . $e->getMessage());
            return false;
        } finally {
            $stmt = null;
        }
    }

    /*=====================================
    MOSTRAR PRODUCTOS
    =======================================*/

    public static function mdlMostrarProductos($tabla, $ordenar, $item, $valor, $base, $tope) {

        try {
            if($item != null){

                $stmt = Conexion::conectar()->prepare("SELECT * FROM $tabla WHERE $item = :$item ORDER BY $ordenar DESC LIMIT $base, $tope");

                $stmt->bindParam(":".$item, $valor, PDO::PARAM_STR);

                $stmt->execute();

                return $stmt->fetchAll(PDO::FETCH_ASSOC);

            } else {

                $stmt = Conexion::conectar()->prepare("SELECT * FROM $tabla ORDER BY $ordenar DESC LIMIT $base, $tope");

                $stmt->execute();

                return $stmt->fetchAll(PDO::FETCH_ASSOC);

            }
        } catch (Exception $e) {
            error_log("Error en mdlMostrarProductos: " . $e->getMessage());
            return false;
        } finally {
            $stmt = null;
        }
    }

    /*=============================================
    MOSTRAR INFOPRODUCTO
    =============================================*/

    public static function mdlMostrarInfoProducto($tabla, $item, $valor){

        try {
            if($item != null){

                $stmt = Conexion::conectar()->prepare("SELECT * FROM $tabla WHERE $item = :$item");

                $stmt->bindParam(":".$item, $valor, PDO::PARAM_STR);

                $stmt->execute();

                return $stmt->fetch(PDO::FETCH_ASSOC);

            } else {

                $stmt = Conexion::conectar()->prepare("SELECT * FROM $tabla");

                $stmt->execute();

                return $stmt->fetchAll(PDO::FETCH_ASSOC);

            }
        } catch (Exception $e) {
            error_log("Error en mdlMostrarInfoProducto: " . $e->getMessage());
            return false;
        } finally {
            $stmt = null;
        }
    }
}