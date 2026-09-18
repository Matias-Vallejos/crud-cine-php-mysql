<?php 

require_once "../clases/Usuario.php";
require_once "../utilidades/action_conexion.php";
session_start();

$email=htmlspecialchars(trim($_POST["email"]));
$contrasenia=htmlspecialchars(trim($_POST["contrasenia"]));


$usuario = ( new Usuario() )->getUsuarioByEmail($pdo, $email);

if ($usuario && password_verify($contrasenia, $usuario->getContrasenia()) ) {
    $_SESSION["usuario"] = [
        "email" => $usuario->getEmail(),
        "nombre" => $usuario->getNombre(),
        "rol" => $usuario->getRol(),
        "entradasGratis" => $usuario->getEntradasGratis(),
    ];
    header("Location: ../index.php?seccion=home");
    exit();
} else {
    header("Location: ../index.php?seccion=ingresar&error=usuarioinvalido");
    exit();
}
?>