<?php 

require_once "../clases/Pelicula.php";
require_once "../utilidades/action_conexion.php";
require_once "../utilidades/utils.php";
session_start();
isAdminRedireccion(false);

$id=$_POST["id"] ?? 0;

$pelicula= (new Pelicula)->getPeliculaPorId($pdo, $id);

try{
    if(!empty($pelicula)){
        $pelicula->borrar($pdo);
    }
    header("Location: ../index.php?seccion=inicio&borrado=exito");
    exit();
} catch(Exception $e){
    header("Location: ../index.php?seccion=detalle&id=".$pelicula->getId()."&error=no se pudo borrar");
    exit();
}