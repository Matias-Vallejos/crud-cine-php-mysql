<?php 

require_once "../clases/Usuario.php";
require_once "../utilidades/utils.php";
require_once "../utilidades/action_conexion.php";
session_start();

$email=htmlspecialchars(trim($_POST["email"]));
$nombre=htmlspecialchars(trim($_POST["nombre"]));
$apellido=htmlspecialchars(trim($_POST["apellido"]));
$fechaNacimiento=htmlspecialchars(trim($_POST["fechaNacimiento"]));
$contrasenia1=htmlspecialchars(trim($_POST["contrasenia1"]));
$contrasenia2=htmlspecialchars(trim($_POST["contrasenia2"]));

$email=validarLargo($email,3,100);
$nombre=validarLargo($nombre,3,30);
$apellido=validarLargo($apellido,3,30);
$contrasenia1=validarLargo($contrasenia1,3,100);
if ($fechaNacimiento>date("Y-m-d", strtotime("-18 years"))){
    $fechaNacimiento="";
}

$errores= "";

if (empty($email)){
    $errores .= "<li>No se pudo validar el mail</li>";
}
if (empty($nombre)){
    $errores .= "<li>No se pudo validar el nombre</li>";
}
if (empty($apellido)){
    $errores .= "<li>No se pudo validar el apellido</li>";
}
if (empty($fechaNacimiento)){
    $errores .= "<li>Solo pueden registrarse mayores de 18 años</li>";
}
if (empty($contrasenia1)){
    $errores .= "<li>Contraseña inválida, debe tener al menos 3 caractéres</li>";
}
if ($contrasenia1!==$contrasenia2){
    $errores .= "<li>Las contraseñas no coinciden</li>";
}
if ($errores != ""){
    $_SESSION["erroresRegistro"] = $errores;
    header("Location: ../index.php?seccion=registrar");
    exit();
}

try {
    $usuario = new Usuario();
    $usuario->setEmail($email);
    $usuario->setNombre($nombre);
    $usuario->setApellido($apellido);
    $usuario->setFechaNacimiento($fechaNacimiento);
    $usuario->setContrasenia(password_hash($contrasenia1, PASSWORD_DEFAULT));
    $usuario->registrar($pdo);

    $errores="sin error";
    $_SESSION["erroresRegistro"] = $errores;
    header("Location: ../index.php?seccion=ingresar");
    exit();
} catch (Exception $e) {
    $errores="<li>El correo electrónico ya se encuentra registrado.</li>";
    $_SESSION["erroresRegistro"] = $errores;
    header("Location: ../index.php?seccion=registrar");
    exit();
}   
   

  ?>