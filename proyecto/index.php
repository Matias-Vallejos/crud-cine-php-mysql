<?php

$seccion = $_GET["seccion"] ?? "inicio";
$pagina = $_GET["pagina"] ?? 1;
$error = $_GET["error"]??"";
require_once "utilidades/utils.php";
session_start();

require_once "clases/Conexion.php";
$paginasqueusanBD=["borrarPelicula","detalle","inicio", "modificar", "modificarPelicula", "usuarios"];
if ($error!=500){
try {   
    $pdo = (new Conexion())->conectar(); 
} catch (PDOException $e){
    for ($i=0; $i < count($paginasqueusanBD); $i++) { 
    if($seccion==$paginasqueusanBD[$i]){
    header("Location: index.php?seccion=error&error=500");
    exit();
    }
}
}
}
?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Cine PHP</title>
    <link rel="icon" href="imagenes/pochoclos.png">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-sRIl4kxILFvY47J16cr9ZwB07vP4J8+LH7qKQnuqkuIAvNWLzeN8tE5YBujZqJLB" crossorigin="anonymous">
    <link rel="stylesheet" href="css/estilos.css">
</head>
<body class="d-flex flex-column min-vh-100">
    <?php require_once "componentes/navbar.php" ?>

    <main class="flex-grow-1 py-4 px-4" style="background-color:#ced4da;">
        <?php if (file_exists("vistas/$seccion.php")) { 
        require_once "vistas/$seccion.php";
        require_once "componentes/banner_premium.php";
        } else {
        require_once "vistas/error.php";
        }
        ?>
    </main>
    <?php   
        require_once "componentes/footer.php"
    ?>
    
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/js/bootstrap.bundle.min.js" integrity="sha384-FKyoEForCGlyvwx9Hj09JcYn3nv7wiPVlz7YYwJrWVcXK/BmnVDxM+D2scQbITxI" crossorigin="anonymous"></script>
</body>
</html>
