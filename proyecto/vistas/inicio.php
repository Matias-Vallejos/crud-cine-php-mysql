<?php 
$valorEntrada = 2000;

require_once "clases/Pelicula.php";
$totalPaginas= ceil(count((new Pelicula())->getPeliculas($pdo)) / 4);
if($pagina>$totalPaginas){
    $pagina=$totalPaginas;
    } elseif($pagina<1){
        $pagina=1;
        }
$peliculas=(new Pelicula())->getPeliculaPaginado($pagina, 4, $pdo);


$borrado= $_GET["borrado"] ?? "";
if ($borrado=="exito"){ ?>
<div class="alert alert-success" role="alert">
  La pelicula se borró con exito
</div> 
<?php }
?>

<h1>Películas en Cartelera
</h1>
<p class="fs-4">El valor de la entrada de cualquier película es de <?= "$".number_format($valorEntrada, 2, ",", "."); ?></p>
<?php if(isAdmin()){ ?>
<div class="d-flex justify-content-center"><a style="max-width: 400px;" href="index.php?seccion=agregar" class="btn btn-success fw-extrabold btn-lg px-5 py-2.5 shadow-lg border-2 border-white border-opacity-10 mb-3 w-100">Agregar pelicula</a></div>
<?php } ?>
<div class="d-flex w-100 flex-wrap justify-content-center">
<?php foreach ($peliculas as $pelicula) {?>
<div class="card mb-3 mx-4 my-3 text-bg-secondary" id="tarjetaPelicula">
  <div class="row g-0 h-100">
    <div class="col-md-4 bg-black">
      <img src="<?= $pelicula->getPoster();?>" class="img-fluid rounded-start h-100 object-fit-cover" alt="Poster de la pelicula <?= ' '. $pelicula->getTitulo();?>">
    </div>
    <div class="col-md-8">
      <div class="card-body d-flex flex-column h-100">
        <h2 class="card-title fs-2"><?= $pelicula->getTitulo(). " (" . $pelicula->getAnio().")" ?></h2>
        <p class="card-text mb-1 fw-medium fs-5"><small class="text-white-50">Dirigida por: <?= $pelicula->getDirector()?></small></p>
        <p class="card-text mb-3 fw-semibold fs-6"><small class="text-white-50"><?= $pelicula->getDuracion()?></small></p>
        <p class="card-text mb-3 fs-5"><?= $pelicula->getSinopsis(true)?></p>
        <p class="card-text mb-2 fw-semibold fs-5"><small class="text-white-50"><?= $pelicula->getGenero()?></small></p> 
        <a href="index.php?seccion=detalle&id=<?= $pelicula->getId();?>&pagina=<?= $pagina ?>" class="btn btn-dark mt-auto mb-3">Ver más</a>
        <?php if(isAdmin()) { ?>
        <a href="index.php?seccion=modificarPelicula&id=<?= $pelicula->getId();?>" class="btn btn-info mt-auto mb-3">Modificar película</a>
        <a href="index.php?seccion=borrarPelicula&id=<?= $pelicula->getId();?>" class="btn btn-danger mt-auto">Borrar película</a>
        <?php } ?>
      </div>
    </div>
  </div>
</div>
<?php } ?>
</div>
    <div class="d-flex justify-content-center">
        <nav aria-label="Page navigation" data-bs-theme="dark">
            <ul class="pagination">
                <li class="page-item "><a class="page-link  <?= $pagina > 1 ? '' : 'disabled' ?>" href="index.php?seccion=inicio&pagina=<?= $pagina - 1 ?>" aria-label="Previous"><span aria-hidden="true">&laquo;</span></a></li>
                <?php for ($i = 1; $i <= $totalPaginas; $i++) { ?>
                    <li class="page-item <?= ($pagina==$i) ? "active" : "";?>"><a class="page-link" href="index.php?seccion=inicio&pagina=<?= $i ?>"><?= $i ?></a></li>
                <?php } ?>
                <li class="page-item"><a class="page-link <?= ($totalPaginas - 1) >= $pagina ? '' : 'disabled' ?>" href="index.php?seccion=inicio&pagina=<?= $pagina + 1 ?>" aria-label="Next"><span aria-hidden="true">&raquo;</span></a></li>
            </ul>
        </nav>
    </div>
