<?php 
$actual = $_GET["seccion"] ?? "inicio";
?>
<nav class="navbar px-4 bg-dark border-bottom border-body navbar-expand-lg bg-body-tertiary" data-bs-theme="dark">
  <div class="container-fluid">
    <a class="navbar-brand" href="index.php?seccion=inicio">Cine PHP</a>
    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="navbarSupportedContent">
      <ul class="navbar-nav me-auto mb-2 mb-lg-0">
        <li class="nav-item">
          <a class="nav-link <?php if($actual=="inicio"){echo "active";}?>" aria-current="seccion" href="index.php?seccion=inicio">Inicio</a>
        </li>
        <li class="nav-item">
          <a class="nav-link <?php if($actual=="about"){echo "active";}?>" href="index.php?seccion=about">Sobre Nosotros</a>
        </li>
        <li class="nav-item">
          <a class="nav-link <?php if($actual=="contacto"){echo "active";}?>" href="index.php?seccion=contacto">Contactanos</a>
        </li>
     </ul>
     <ul class="navbar-nav ms-auto mb-2 mb-lg-0"> 
      <?php if (isAdmin()) { ?>
      <li class="nav-item">
            <a class="nav-link <?php if($actual=="agregar"){echo "active";}?>" href="index.php?seccion=agregar">Nueva pelicula</a>
          </li>      
      <li class="nav-item">
            <a class="nav-link <?php if($actual=="usuarios"){echo "active";}?>" href="index.php?seccion=usuarios">Lista de usuarios</a>
          </li> 
          <?php } 
          if (isset($_SESSION["usuario"])) { ?>
           <li class="nav-item">
            <a class="nav-link" href="index.php?seccion=home"><img src="imagenes/home.png" alt="logo de home"></a>
          </li> 
          <?php } 
            if (isset($_SESSION["usuario"])) { ?>
        <li class="nav-item">
            <a class="nav-link" href="acciones/cerrar_sesion.php">Cerrar sesión</a>
</li>
          <?php } else { ?>
          <li class="nav-item">
            <a class="nav-link <?php if($actual=="ingresar"){echo "active";}?>" href="index.php?seccion=ingresar">Ingresar</a>  
        </li>
        <?php } ?>
     </ul>
    </div>
  </div>
</nav>