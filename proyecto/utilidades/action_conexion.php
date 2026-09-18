<?php 
require_once "../clases/Conexion.php";
try {   
    $pdo = (new Conexion())->conectar(); 
} catch (PDOException $e){
    header("Location: ../index.php?seccion=error&error=500");
    exit();
}
?>