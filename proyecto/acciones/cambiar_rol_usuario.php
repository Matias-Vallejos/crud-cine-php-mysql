<?php 
require_once "../clases/Usuario.php";
require_once "../utilidades/utils.php";
require_once "../utilidades/action_conexion.php";
session_start();

if($_POST["cambio"]=="suscripcion"){
try{
$usuario = ( new Usuario() )->getUsuarioByEmail($pdo, $_SESSION["usuario"]["email"]);

if ($usuario->getRol()==USER){
    $usuario->setRol(USERPREMIUM);
    $usuario->setEntradasGratis(USERPREMIUMGRATIS);
    $usuario->cambiarRol($pdo);
    $_SESSION["usuario"]["rol"]=USERPREMIUM;
    $_SESSION["usuario"]["entradasGratis"]=USERPREMIUMGRATIS;
    $mensaje="suscripcion";
} else if($usuario->getRol()==USERPREMIUM){
    $usuario->setRol(USER);
    $usuario->setEntradasGratis(USERGRATIS);
    $usuario->cambiarRol($pdo);
    $_SESSION["usuario"]["rol"]=USER;
    $_SESSION["usuario"]["entradasGratis"]=USERGRATIS;
    $mensaje="dessuscripcion";
}
} catch(PDOException $e){
    $mensaje="error";
}
header("Location: ../index.php?seccion=home&mensaje=$mensaje");
exit();
} else if (isAdmin()) {
    isAdminRedireccion(false);
    if ($_POST["cambio"]=="admin"){
        $id=$_POST["id"];
        $rol=$_POST["rol"];
        if($rol==USER){
            $entradas=USERGRATIS;
        } elseif($rol==USERPREMIUM){
            $entradas=USERPREMIUMGRATIS;
        } elseif($rol==ADMIN){
            $entradas=ADMINGRATIS;
        }
        try{
            $sql = "UPDATE `usuarios` SET `rol` = :rol, `entradasGratis` = :entradasGratis WHERE `usuarios`.`id` = :id";
            $stmt = $pdo->prepare($sql);
            $stmt->execute([":rol"=>$rol,
            ":id"=>$id,
            ":entradasGratis"=>$entradas]);
            header("Location: ../index.php?seccion=usuarios");
            exit();
        } catch(PDOException $e){
            header("Location: ../index.php?seccion=usuarios&error=error");
            exit();
        }
    }
}
?>