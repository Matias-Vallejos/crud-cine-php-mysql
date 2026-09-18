<?php 

require_once "../utilidades/action_conexion.php";
require_once "../utilidades/utils.php";
require_once "../clases/Pelicula.php";
session_start();
isAdminRedireccion(false);

$titulo=htmlspecialchars(trim($_POST["titulo"]));
$director=htmlspecialchars(trim($_POST["director"]));
$genero=htmlspecialchars(trim($_POST["genero"]));
$anio=htmlspecialchars(trim($_POST["anio"]));
$duracion=htmlspecialchars(trim($_POST["duracion"]));
$horarios=htmlspecialchars(trim($_POST["horarios"]));
$sinopsis=htmlspecialchars(trim($_POST["sinopsis"]));

$tmp_name = $_FILES["poster"]["tmp_name"];

if (empty($titulo) || empty($director) || empty($genero) || empty($anio) || empty($duracion) || empty($sinopsis) || !isset($_FILES["poster"])) {
    header("Location: ../index.php?seccion=agregar&error=variablevacia");
    exit();
}



try {
$extension = pathinfo($_FILES["poster"]["name"], PATHINFO_EXTENSION);
$poster= uniqid() ."." . $extension;
move_uploaded_file($tmp_name, "../imagenes/posters/$poster");

$pelicula = new Pelicula();
$pelicula->setTitulo($titulo);
$pelicula->setDirector($director);
$pelicula->setGenero($genero);
$pelicula->setAnio($anio);
$pelicula->setDuracion($duracion);
$pelicula->setHorarios($horarios);
$pelicula->setSinopsis($sinopsis);
$pelicula->setPoster($poster);
$pelicula->nueva($pdo);
header("Location: ../index.php?seccion=agregar&pelicula=agregada");
    exit();
} catch (PDOException $e){
header("Location: ../index.php?seccion=agregar&error=erroralguardar");
    exit();
}

?>

