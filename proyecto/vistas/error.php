<?php 
$error = $_GET["error"] ?? 404;
?>

<div class="container d-flex flex-column justify-content-center align-items-center vh-100 text-center">
    <h1 class="display-1 fw-bold mb-5"><?= "error ".$error; ?></h1>
    <div class="h2"> <?php
     if ($error==404){echo "Las salas del cine estan muy oscuras, no se pudo encontrar la página web";}
     elseif($error==500){echo "No se pudo conectar a la base de datos, vuelva a intentar mas tarde";}
     ?> </div>
     <a href="index.php?seccion=inicio" class="btn btn-dark mt-4">Volver al inicio</a>
     </div>