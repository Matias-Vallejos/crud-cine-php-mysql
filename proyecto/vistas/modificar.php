<?php   
if (!isset($_SESSION["usuario"])) {
    header("Location: index.php?seccion=ingresar");
    exit();
    }
$error= $_GET["error"]??"";
if ($error=="contraseñaincorrecta"){ ?>
    <div class="alert alert-danger" role="alert">
    Contraseña inválida
</div> 
<?php }
$error = $_SESSION["erroresModificar"] ?? "";
    if($error== "sin error") { ?>
<div class="alert alert-success" role="alert">
    Se modificaron correctamente los datos
</div> 
<?php    } else if( $error!= ""){ ?>
<div class="alert alert-danger" role="alert">
    No se pudo modificar los datos: 
  <ul>
    <?= $error ?>
  </ul>
</div> 
<?php }  
unset($_SESSION["erroresModificar"]);
require_once "clases/Usuario.php";
$usuario = ( new Usuario() )->getUsuarioByEmail($pdo, $_SESSION["usuario"]["email"]);
?>
<div class="container d-flex justify-content-center align-items-center min-vh-100 text-white">
    <div class="card bg-dark text-white shadow-lg p-4 border border-secondary border-opacity-25" style="width: 500px;">
        <h1 class="text-center mb-4">Datos personales</h1>
        
        <form method="POST" action="acciones/modificar_usuario.php">
            <div class="mb-3">
                <label class="form-label text-white-50 fw-semibold">Email:</label>
                <input value="<?= $usuario->getEmail() ?>" class="form-control" type="email" name="email" data-bs-theme="dark" required>
            </div>
<div class="row g-3"> 
    
    <div class="col-md-6">
        <label for="nombre" class="form-label text-white-50 fw-semibold">Nombre:</label>
        <input value="<?= $usuario->getNombre() ?>" required type="text" data-bs-theme="dark" class="form-control" id="nombre" minlength="3" maxlength="30" name="nombre" />
    </div>
    <div class="col-md-6">
        <label for="apellido" class="form-label text-white-50 fw-semibold">Apellido:</label>
        <input value="<?= $usuario->getApellido() ?>" required type="text" data-bs-theme="dark" class="form-control" id="apellido" minlength="3" maxlength="30" name="apellido"/>
    </div>
</div>
            <div class="mt-3">
    <label for="fechaNacimiento" class="form-label text-white-50 fw-semibold">Fecha de Nacimiento:</label>
    <input value="<?= $usuario->getFechaNacimiento() ?>" required type="date" data-bs-theme="dark" class="form-control" id="fechaNacimiento" name="fechaNacimiento"
     max="<?php echo date("Y-m-d", strtotime("-18 years"));?>"  />
</div>
            <div class="mb-3">
                <label class="form-label text-white-50 fw-semibold">Nueva Contraseña:</label>
                <input class="form-control" type="password" name="contrasenia1" data-bs-theme="dark">
            </div>
            <div class="mb-3">
                <label class="form-label text-white-50 fw-semibold">Confirmar nueva contraseña:</label>
                <input class="form-control" type="password" name="contrasenia2" data-bs-theme="dark">
            </div>
            <div class="mb-3">
                <label class="form-label text-white fw-bold">Ingrese su contraseña actual</label>
                <input class="form-control" type="password" name="contraseniaActual" data-bs-theme="dark" required>
            </div>
            
            <div class="d-flex align-items-center justify-content-between mt-4">
               <button class="btn btn-info fw-bold px-4" type="submit">Modificar</button>
               <a class="btn btn-outline-secondary btn-sm text-white-50" href="index.php?seccion=home">Volver atras</a>
            </div>
            
            
        </form>
    </div>
</div>