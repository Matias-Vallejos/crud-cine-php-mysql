<?php 
$error = $_SESSION["erroresRegistro"] ?? "";
$errorLogin = $_GET["error"]??"";

if (isset($_SESSION["usuario"])) {
    header("Location: index.php?seccion=home");
    exit();
} else if( $error == "sin error"){ ?>


<div class="alert alert-success" role="alert">
  El usuario se registro correctamente;
</div>
<?php } else if($errorLogin=="usuarioinvalido") { ?>
    <div class="alert alert-danger" role="alert">
    No se encontró el usuario o la contraseña es incorrecta 
    </div> 
<?php }
 unset($_SESSION["erroresRegistro"]); ?>
<div class="container d-flex justify-content-center align-items-center vh-100 text-white">
    <div class="card bg-dark text-white shadow-lg p-4 border border-secondary border-opacity-25" style="width: 500px;">
        <h1 class="text-center mb-4">Ingresar</h1>
        
        <form method="POST" action="acciones/ingresar_usuario.php">
            <div class="mb-3">
                <label class="form-label text-white-50 fw-semibold">Email</label>
                <input class="form-control" type="email" name="email" data-bs-theme="dark" required>
            </div>
            <div class="mb-3">
                <label class="form-label text-white-50 fw-semibold">Contraseña</label>
                <input class="form-control" type="password" name="contrasenia" data-bs-theme="dark" required>
            </div>
            
            <div class="d-flex align-items-center justify-content-between mt-4">
               <button class="btn btn-info fw-bold px-4" type="submit">Ingresar</button>
               <a class="btn btn-outline-secondary btn-sm text-white-50" href="index.php?seccion=registrar">Registrarse</a>
            </div>
            
        </form>
    </div>
</div>