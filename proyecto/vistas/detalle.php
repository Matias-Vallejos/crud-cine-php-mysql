<?php 
require_once "clases/Pelicula.php";
$pelicula=(new Pelicula)->getPeliculaPorId($pdo, $_GET["id"]); 

$error= $_GET["error"] ?? "";
$modificar= $_GET["pelicula"] ?? "";
if ($error!=""){ ?>
<div class="alert alert-danger" role="alert">
  <?= $error ?>
</div> 
<?php }
if ($modificar=="modificada"){ ?>
<div class="alert alert-success" role="alert">
  La pelicula se modificó con exito
</div> 
<?php }
?>
<div class="d-flex justify-content-center w-100">
<div class="card mb-3 my-3 text-bg-secondary" style="max-width: 75%;">
  <div class="row g-0">
    <div class="col-md-4">
      <img src="<?= $pelicula->getPoster();?>" class="img-fluid rounded-start h-100" alt="Poster de la pelicula <?= ' '. $pelicula->getTitulo();?>">
    </div>
    <div class="col-md-8">
      <div class="card-body d-flex flex-column h-100">
        <h1 class="card-title"><?= $pelicula->getTitulo(). " (" . $pelicula->getAnio().")" ?></h1>
        <p class="card-text mb-1 fw-semibold fs-4"><small class="text-white-50">Dirigida por: <?= $pelicula->getDirector()?></small></p>
        <p class="card-text mb-3 fw-semibold fs-4"><small class="text-white-50"><?= $pelicula->getDuracion()?></small></p>
        <p class="card-text mb-3 fs-3"><?= $pelicula->getSinopsis(false)?></p>
        <p class="card-text mb-2 fw-semibold fs-4"><small class="text-white-50"><?= $pelicula->getGenero()?></small></p> 
        <?php
        if(empty($pelicula->getHorarios())){ ?>
        <button class="btn btn-dark mt-auto mb-2">Proximamente</button>
        <?php } else { ?>
        <p class="card-text mb-2 fw-semibold fs-5 mt-auto"><small>Funciones disponibles:</small></p>  
        <?php
        $funciones=explode(" ",$pelicula->getHorarios());
        for ($i=0; $i < count($funciones); $i++) { 
        ?>  
         <button class="btn btn-dark mt-auto mb-2"><?= $funciones[$i] ?></button>
        <?php }} ?>
        <?php if(isAdmin()) { ?>
        <a href="index.php?seccion=modificarPelicula&id=<?= $pelicula->getId();?>" class="btn btn-info mt-auto mb-2">Modificar película</a>
        <a href="index.php?seccion=borrarPelicula&id=<?= $pelicula->getId();?>" class="btn btn-danger mt-auto">Borrar película</a>
        <?php } ?>
      </div>
    </div>
  </div> 
</div>
</div>

<a href="index.php?seccion=inicio&pagina=<?= $pagina;?>" class="btn btn-dark mt-4">Volver</a>