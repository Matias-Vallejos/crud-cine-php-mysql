<?php 
isAdminRedireccion(true);
$error = $_GET["error"] ?? "";
$exito = $_GET["pelicula"]??"";
if( $exito == "agregada"){ ?>
<div class="alert alert-success" role="alert">
  La pelicula se agrego correctamente
</div>
<?php } else if($error=="variablevacia") { ?>
    <div class="alert alert-danger" role="alert">
    El formulario no se lleno correctamente
    </div> 
<?php } else if($error=="erroralguardar") { ?>
   <div class="alert alert-danger" role="alert">
    No se pudo guardar la pelicula, intente nuevamente
    </div> 
<?php } ?>

<div class="container d-flex justify-content-center align-items-center min-vh-100 text-white">
    <div class="card bg-dark text-white shadow-lg p-4 border border-secondary border-opacity-25" style="width: 500px;">
        <h1 class="text-center mb-4">Nueva pelicula</h1>
        
        <form method="POST" action="acciones/nueva_pelicula.php" enctype="multipart/form-data">
            <div class="mb-3">
                <label class="form-label text-white-50 fw-semibold">Titulo:</label>
                <input class="form-control" type="text" name="titulo" minlength="2" maxlength="30" data-bs-theme="dark" required>
            </div>
            <div class="mb-3">
                <label class="form-label text-white-50 fw-semibold">Director:</label>
                <input class="form-control" type="text" name="director" minlength="3" maxlength="30" data-bs-theme="dark" required>
            </div>
<div class="row g-3"> 
    
    <div class="col-md-6">
        <label for="genero" class="form-label text-white-50 fw-semibold">Genero:</label>
        <input required type="text" data-bs-theme="dark" class="form-control" id="genero" minlength="3" maxlength="30" name="genero" />
    </div>
    <div class="col-md-6">
        <label for="anio" class="form-label text-white-50 fw-semibold">Año:</label>
        <input required type="number" data-bs-theme="dark" class="form-control" id="anio" min="1900" max="2050" name="anio"/>
    </div>
</div>
<div class="col-md-6 mt-2">
        <label for="duracion" class="form-label text-white-50 fw-semibold">Duracion (en minutos):</label>
        <input required type="number" data-bs-theme="dark" class="form-control" id="duracion" min="1" max=""  name="duracion" />
    </div>
            <div class="mb-3 mt-3">
                <label class="form-label text-white-50 fw-semibold">Horarios->formato hora:minuto hora:minuto (dejar vacio si todavia no estan asignados)</label>
                <input class="form-control" type="text" name="horarios" minlength="2" data-bs-theme="dark">
            </div>
            <div class="mb-3 mt-3">
                <label class="form-label text-white-50 fw-semibold">Sinopsis</label>
                <textarea class="form-control" name="sinopsis" rows="3" data-bs-theme="dark" required></textarea>
            </div>
            <div class="mb-3 mt-3">
                <label class="form-label text-white-50 fw-semibold">Poster:</label>
                <input class="form-control" type="file" name="poster" data-bs-theme="dark" required>
            </div>
            <div class="d-flex align-items-center justify-content-between mt-4">
               <button class="btn btn-success fw-bold px-4" type="submit">Agregar pelicula</button>
            </div>
            
            
        </form>
    </div>
</div>