<?php
function validarLargo($aValidar,$min,$max){
    if(strlen($aValidar)<$min||strlen($aValidar)>$max){
    return "";
    }
    return $aValidar;
}

const USER = 0;
const USERPREMIUM = 1;
const ADMIN = 2;

// entradasgratis
const USERGRATIS = 0;
const USERPREMIUMGRATIS = 2;
const ADMINGRATIS = 10;

function isAdmin()
{
    if (isset($_SESSION["usuario"]) && $_SESSION["usuario"]["rol"] == ADMIN) {
        return true;
    }
    return false;
}

function isAdminRedireccion($ubicacionIndex=true)
{
    if (isset($_SESSION["usuario"]) && $_SESSION["usuario"]["rol"] == ADMIN) {
        return true;
    }
    if ($ubicacionIndex){
            header("Location: index.php?seccion=error");
             exit();
    } else {
        header("Location: ../index.php?seccion=error");
             exit();
    }
}



?>