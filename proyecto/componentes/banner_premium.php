<?php if(isset($_SESSION['usuario'])) { ?>
<div class="row justify-content-center mt-3">
    <div class="card text-center justify-content-center bg-dark text-white border border-info border-2" style="max-width: 400px">
        <div class="card-header">
        Premium
        </div>
        <div class="card-body">
            <h5 class="card-title">Entradas gratis disponibles por CinePHPREMIUM</h5>
            <p class="card-text">Te quedan <span class="fw-bold"><?= $_SESSION["usuario"]["entradasGratis"] ?> entradas</span></p>
            <?php if($_SESSION["usuario"]["rol"]==USER && $seccion!='home' && $seccion!="suscribir") { ?>
            <a href="index.php?seccion=home" class="btn btn-info fw-bold btn-sm">Suscribirse</a>
            <?php } ?>
        </div>
        <?php if ($_SESSION["usuario"]["entradasGratis"]>0){ ?>
        <div class="card-footer text-warning fw-bold">
    Tenes <?php 
    $hoy= new DateTime();
    $ultimoDiaMes = new Datetime("last day of this month");
    $restante= ($hoy->diff($ultimoDiaMes))->days;
    echo $restante;
    ?>
     días para usarlas
        </div>
        <?php } ?>
    </div>
</div>
<?php } ?>