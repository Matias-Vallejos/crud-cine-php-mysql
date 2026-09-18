<?php 
isAdminRedireccion(true);
require_once "clases/Pelicula.php";
$pelicula=(new Pelicula)->getPeliculaPorId($pdo, $_GET["id"]);
?>
<h1 class="fw-bold text-center mb-3">¿Esta seguro que desea borrar la siguiente pelicula?</h1>
<div class="d-flex justify-content-center w-100">
<div class="card mb-3 my-3 text-bg-secondary" style="max-width: 75%;">
  <div class="row g-0">
    <div class="col-md-4">
      <img src="<?= $pelicula->getPoster();?>" class="img-fluid rounded-start h-100" alt="Poster de la pelicula <?= ' '. $pelicula->getTitulo();?>">
    </div>
    <div class="col-md-8">
      <div class="card-body d-flex flex-column h-100">
        <h2 class="card-title"><?= $pelicula->getTitulo(). " (" . $pelicula->getAnio().")" ?></h2>
        <p class="card-text mb-1 fw-semibold fs-5"><small class="text-white-50">Dirigida por: <?= $pelicula->getDirector()?></small></p>
        <p class="card-text mb-3 fw-semibold fs-5"><small class="text-white-50"><?= $pelicula->getDuracion()?></small></p>
        <p class="card-text mb-3 fs-4"><?= $pelicula->getSinopsis(false)?></p>
        <p class="card-text mb-2 fw-semibold fs-5"><small class="text-white-50"><?= $pelicula->getGenero()?></small></p> 
        <div class="d-flex mt-4">
                <a href="index.php?seccion=detalle&id=<?= $pelicula->getId();?>" class="btn btn-outline-light btn-lg px-4 fw-semibold mx-3">Volver atras</a>
            <form method="POST" action="acciones/borrar_pelicula.php" >
                <input type="hidden" name="id" value="<?= $pelicula->getId() ?>">
                <button type="submit" class="btn btn-danger btn-lg fw-bold px-4 shadow">Borrar película</button>  
            </form>
        </div>
      </div>
    </div>
  </div> 
</div>
</div>