<?php 

isAdminRedireccion(true);
require_once "clases/Pelicula.php";
$pelicula=(new Pelicula)->getPeliculaPorId($pdo, $_GET["id"]);
if( $error == "erroralguardar"){ ?>
<div class="alert alert-danger" role="alert">
  No se pudo guardar la pelicula;
</div>
<?php } ?>

<div class="container d-flex justify-content-center align-items-center min-vh-100 text-white"> 
    <div class="card bg-dark text-white shadow-lg p-4 border border-secondary border-opacity-25" style="width: 500px;">
       <h1 class="text-center mb-4">Modificar Pelicula</h1>
        
        <form method="POST" action="acciones/modificar_pelicula.php" enctype="multipart/form-data">
            <input type="hidden" name="id" value="<?= $pelicula->getId(); ?>">
            <div class="row g-4">
                <div class="col-lg-7">
                <div class="mb-3">
                <label class="form-label text-white-50 fw-semibold">Titulo:</label>
                <input class="form-control" value="<?= $pelicula->getTitulo(); ?>" type="text" name="titulo" minlength="2" maxlength="30" data-bs-theme="dark" required>
            </div>
            <div class="mb-3">
                <label class="form-label text-white-50 fw-semibold">Director:</label>
                <input class="form-control" type="text" value="<?= $pelicula->getDirector(); ?>" name="director" minlength="3" maxlength="30" data-bs-theme="dark" required>
            </div>
<div class="row g-3"> 
    
    <div class="col-md-6">
        <label for="genero" class="form-label text-white-50 fw-semibold">Genero:</label>
        <input required type="text" value="<?= $pelicula->getGenero(); ?>" data-bs-theme="dark" class="form-control" id="genero" minlength="3" maxlength="30" name="genero" />
    </div>
    <div class="col-md-6">
        <label for="anio" class="form-label text-white-50 fw-semibold">Año:</label>
        <input required type="number" data-bs-theme="dark" value="<?= $pelicula->getAnio(); ?>" class="form-control" id="anio" min="1900" max="2050" name="anio"/>
    </div>
</div>
<div class="col-md-6 mt-2">
        <label for="duracion" class="form-label text-white-50 fw-semibold">Duracion (en minutos):</label>
        <input required type="number" data-bs-theme="dark" class="form-control" value="<?= $pelicula->getDuracion(false); ?>" id="duracion" min="1" max=""  name="duracion" />
    </div>
            <div class="mb-3 mt-3">
                <label class="form-label text-white-50 fw-semibold">Horarios->formato hora:minuto hora:minuto (dejar vacio si todavia no estan asignados)</label>
                <input class="form-control" value="<?= $pelicula->getHorarios(); ?>" type="text" name="horarios" minlength="2" data-bs-theme="dark">
            </div>
            
</div><div class="col-lg-5 d-flex flex-column justify-content-between">
    <div class="text-center"> 
    <p class="text-white-50">Poster actual</p>
    <img src="<?= $pelicula->getPoster();?>" class="img-thumbnail bg-dark border-secondary img-fluid rounded-start h-100" alt="Poster de la pelicula <?= ' '. $pelicula->getTitulo();?>">
</div> 
            <div class="mb-3 mt-3">
                <label class="form-label text-white-50 fw-semibold">Poster:</label>
                <input class="form-control" type="file" name="poster" data-bs-theme="dark">
            </div>
</div></div><div class="mb-3 mt-3">
                <label class="form-label text-white-50 fw-semibold">Sinopsis</label>
                <textarea class="form-control" name="sinopsis" rows="3" data-bs-theme="dark" required><?= $pelicula->getSinopsis(false); ?></textarea>
            </div>
            <div class="d-flex align-items-center justify-content-between mt-4">
               <button class="btn btn-info fw-bold px-4" type="submit">Modificar pelicula</button>
            </div>    
        </form>
    </div>
</div>

