<?php
$resultado = $_GET["resultado"] ?? "";
if( $resultado!= ""&& $resultado=="enviado"){ ?>
<div class="alert alert-success" role="alert">
  El formulario se envió correctamente
</div>
<?php } elseif ($resultado!= ""&& $resultado=="error"){ ?>
<div class="alert alert-danger" role="alert">
  Hubo un error al enviar el formulario, intente nuevamente
</div>
<?php }?>
<h1 class="text-center my-5">¡Contactanos con el siguiente formulario!</h1>

<div
  class="container d-flex justify-content-center align-items-center card shadow p-4 bg-secondary"
>
  <form class="row g-3 text-light" method="POST" action="acciones/formulario_contacto.php">
    <div class="col-md-6">
      <label for="email" class="form-label" maxlength="100">Email:</label>
      <input required type="email" class="form-control" id="email" name="email"/>
    </div>    
    <div class="col-md-6">
      <label for="tipoConsulta" class="form-label">Motivo de consulta</label>
      <select required class="form-select text-secondary" id="tipoConsulta" aria-label="Tipo de Consulta" name="tipoConsulta">
        <option value="" selected disabled>
          Seleccione el motivo de la consulta
        </option>
        <option class="text-black" value="1">Sugerir una pelicula para la cartelera</option>
        <option class="text-black" value="2">Problemas con las entradas</option>
        <option class="text-black" value="3">Problemas con el sitio web</option>
        <option class="text-black" value="4">Otro Problema</option>
      </select>
    </div>
    <div class="col-md-6">
      <label for="nombre" class="form-label">Nombre:</label>
      <input required type="text" class="form-control" id="nombre" minlength="3" maxlength="100" name="nombre" />
    </div>
        <div class="col-md-6">
      <label for="celular" class="form-label">Celular:</label>
      <input required type="number" class="form-control" id="celular" min="0" name="celular"/>
    </div>
    <div class="mb-3">
      <label for="consulta" class="form-label"
        >Ingrese su consulta:</label
      >
      <textarea
        required class="form-control"
        id="consulta"
        rows="5" minlength="10" maxlength="1000" name="consulta"
      ></textarea>
    </div>
    <div class="text-center">
      <button type="submit" class="btn btn-lg btn-dark col-5">Enviar</button>
    </div>
  </form>
</div>
