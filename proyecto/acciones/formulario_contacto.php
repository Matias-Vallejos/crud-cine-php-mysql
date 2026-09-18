<?php 
require_once "../utilidades/utils.php";

$email=htmlspecialchars(trim($_POST["email"]));
$tipoConsulta=htmlspecialchars(trim($_POST["tipoConsulta"]));
$nombre=htmlspecialchars(trim($_POST["nombre"]));
$celular=htmlspecialchars(trim($_POST["celular"]));
$consulta=htmlspecialchars(trim($_POST["consulta"]));

if(!is_numeric($celular)){$celular="";}
if(!is_numeric($tipoConsulta) || $tipoConsulta < 1 || $tipoConsulta>4 || strlen($tipoConsulta)!=1) {$tipoConsulta="";}
$email=validarLargo($email,3,100);
$nombre=validarLargo($nombre,3,100);
$celular=validarLargo($celular,3,50);
$consulta=validarLargo($consulta,3,1000);



if (empty($email) || empty($tipoConsulta) || empty($nombre) || empty($celular) || empty($consulta)) {
    header("Location: ../index.php?seccion=contacto&resultado=error");
} else {
    header("Location: ../index.php?seccion=contacto&resultado=enviado");
} 
  exit();
?>