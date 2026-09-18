<?php if (!isset($_SESSION["usuario"])) {
    header("Location: index.php?seccion=home");
    exit();
    } ?>

<div class="row mb-5 justify-content-center">
  <div class="col-sm-6 mb-3 mb-sm-0">
    <div class="card bg-dark text-white border-secondary border-opacity-25 text-center">
      <div class="card-body">
        <h2 class="card-title">Suscribirse a premium</h2>
        <p class="card-text">Vas a tener 2 entradas por mes y descuentos exclusivos por un costo de $3000 al mes</p>
        <form method="POST" action="acciones/cambiar_rol_usuario.php">
          <input type="hidden" name="cambio" value="suscripcion">
          <?php if ($_SESSION["usuario"]["rol"]==USER){ ?>
        <div><button type="submit" class="btn btn-info fw-extrabold btn-lg px-5 py-2.5 shadow-lg border-2 border-white border-opacity-10 mb-3 w-100" style="max-width: 250px;">Suscribirse</button>
      </div>
          <?php } else { ?>
            <p class="card-text fw-semibold">Ya estás suscripto</p>
         <div><button type="submit" class="btn btn-danger fw-extrabold btn-lg px-5 py-2.5 shadow-lg border-2 border-white border-opacity-10 mb-3 w-100" style="max-width: 300px;">Cancelar suscripción</button>
         </div>
          <?php } ?>
        <a href="index.php?seccion=home" class="btn btn-outline-secondary btn-sm text-white-50 border-opacity-25 px-4 py-1.5 text-decoration-none">Volver atrás</a>
</form>
    </div>
  </div>
</div>
</div>
