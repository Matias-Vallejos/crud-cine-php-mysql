<?php if (!isset($_SESSION["usuario"])) {
    header("Location: index.php?seccion=inicio");
    exit();
}
$mensaje = $_GET["mensaje"] ?? "";
if ($mensaje=="suscripcion") { ?>
<div class="alert alert-success" role="alert">
  Te suscribiste con exito
</div>
  <?php } else if($mensaje=="dessuscripcion"){ ?>
<div class="alert alert-success" role="alert">
  Te desuscribiste con exito
</div>
<?php } else if($mensaje=="error") { ?>
<div class="alert alert-danger" role="alert">
  Hubo un error al actualizar la base de datos, vuelva a intentar en otro momento
</div>
<?php } ?>
<h1 class="text-center fw-bold mt-5 mb-4">¡Bienvenido <?= $_SESSION["usuario"]["nombre"]; ?>!</h1>
<div class="row mb-5 justify-content-center">
  <div class="col-sm-6 mb-3 mb-sm-0">
    <div class="card bg-dark text-white border-secondary border-opacity-25 text-center">
      <div class="card-body">
        <h2 class="card-title">Ver cartelera</h2>
        <p class="card-text">Tenemos muchas peliculas increíbles para ver! Elegí un horario y saca tus entradas</p>
        <a href="index.php?seccion=inicio" class="btn btn-info fw-extrabold btn-lg px-5 py-2.5 shadow-lg border-2 border-white border-opacity-10 mb-3 w-100" style="max-width: 300px;">Revisar cartelera</a>
      </div>
    </div>
  </div>
</div>
<div class="row">
  <div class="col-sm-6 mb-3 mb-sm-0">
    <div class="card bg-dark text-white border-secondary border-opacity-25 text-center">
      <div class="card-body">
        <h3 class="card-title">Modificar datos personales</h3>
        <p class="card-text">¿Algún dato no esta bien o cambio desde la última ves que entraste? Ingresa aquí para modificar</p>
        <a href="index.php?seccion=modificar" class="btn btn-info fw-bold btn-sm">Ver y modificar</a>
      </div>
    </div>
  </div>
  <div class="col-sm-6">
    <div class="card bg-dark text-white border-secondary border-opacity-25 text-center">
      <div class="card-body">
        <?php if(!isAdmin()){ ?>
        <h3 class="card-title">Premium</h3>
        <p class="card-text">Suscribite a CinePHPREMIUM para tener 2 entradas gratis por mes y descuentos exclusivos</p>
        <?php if($_SESSION["usuario"]["rol"]==USER) { ?>
            <a href="index.php?seccion=suscribir" class="btn btn-info fw-bold btn-sm">Suscribir</a>
        <?php } else{ ?>
         <p class="card-text fw-semibold">Ya estás suscripto</p>
         <a href="index.php?seccion=suscribir" class="btn btn-danger fw-bold btn-sm">Cancelar suscripción</a>
        <?php }} else{ ?>
        <h3 class="card-title">Panel de administrador</h3>
        <p class="card-text">Funcionalidades de los admin</p>
        <a href="index.php?seccion=usuarios" class="btn btn-info fw-bold btn-sm">Lista de usuarios</a>
        <a href="index.php?seccion=agregar" class="btn btn-success fw-bold btn-sm">Agregar pelicula</a>
        <a href="index.php?seccion=inicio" class="btn btn-info fw-bold btn-sm">Modificar pelicula</a>
        <a href="index.php?seccion=inicio" class="btn btn-danger fw-bold btn-sm">Borrar pelicula</a>

        <?php } ?>
      </div>
    </div>
  </div>
</div>
