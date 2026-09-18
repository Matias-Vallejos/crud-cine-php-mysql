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
$id=htmlspecialchars(trim($_POST["id"]));


if (empty($titulo) || empty($director) || empty($genero) || empty($anio) || empty($duracion) || empty($sinopsis)) {
    header("Location: ../index.php?seccion=modificar&id=".$id."&error=variablevacia");
    exit();
}


try {
$pelicula = (new Pelicula())->getPeliculaPorId($pdo,$id);

$pelicula->setTitulo($titulo);
$pelicula->setDirector($director);
$pelicula->setGenero($genero);
$pelicula->setAnio($anio);
$pelicula->setDuracion($duracion);
$pelicula->setHorarios($horarios);
$pelicula->setSinopsis($sinopsis);

if(isset($_FILES["poster"]) && $_FILES["poster"]["tmp_name"]!=""){
    $tmp_name = $_FILES["poster"]["tmp_name"];
    $extension = pathinfo($_FILES["poster"]["name"], PATHINFO_EXTENSION);
    $poster= uniqid() ."." . $extension;
    move_uploaded_file($tmp_name, "../imagenes/posters/$poster");
    if (!empty($pelicula->getPoster()) && file_exists("../" . $pelicula->getPoster()) && !unlink("../" . $pelicula->getPoster())) {
            throw new Exception("No se pudo borrar");
        }
    $pelicula->setPoster($poster);
}

$pelicula->modificar($pdo);

header("Location: ../index.php?seccion=detalle&id=".$id."&pelicula=modificada");
    exit();
} catch (Exception $e){
header("Location: ../index.php?seccion=modificarPelicula&id=".$id."&error=erroralguardar");
    exit();
}

?>

