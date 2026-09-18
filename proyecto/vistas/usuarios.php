<?php 

isAdminRedireccion(true);
require_once "clases/Usuario.php";
$usuarios = (new Usuario())->getUsuarios($pdo);
?>


<h1>Lista de usuarios</h1>
<div class="table-responsive">
<table class="table table-dark table-striped">
  <thead>
    <tr>
      <th scope="col">#</th>
      <th scope="col">Nombre</th>
      <th scope="col">Apellido</th>
      <th scope="col">Email</th>
      <th scope="col">Fecha de Nacimiento</th>
      <th scope="col">Entradas gratis disponibles</th>
      <th scope="col">Rol</th>
    </tr>
  </thead>
  <tbody>
    <?php foreach ($usuarios as $usuario) { ?>
        <tr>
        <td class="fw-bold"><?= $usuario->getId()?></td>
        <td><?= $usuario->getNombre()?></td>
        <td><?= $usuario->getApellido()?></td>
        <td><?= $usuario->getEmail()?></td>
        <td><?= $usuario->getFechaNacimiento()?></td>
        <td><?= $usuario->getEntradasGratis()?></td>
        <td>
            <form method="POST" action="acciones/cambiar_rol_usuario.php" class="d-flex">
                <input type="hidden" name="id" value="<?= $usuario->getId() ?>">
                <input type="hidden" name="cambio" value="admin">
                <select class="form-select me-3" name="rol" data-bs-theme="dark" style="max-width: 200px;">
                    <option value=<?= USER ?> <?= $usuario->getRol()==USER ? "selected" : "" ?> >USER</option>
                    <option value=<?= USERPREMIUM ?> <?= $usuario->getRol()==USERPREMIUM ? "selected" : "" ?>>USERPREMIUM</option>
                    <option value=<?= ADMIN ?> <?= $usuario->getRol()==ADMIN ? "selected" : "" ?>>ADMIN</option>
                </select>
                        <button type="submit" class="btn btn-secondary btn-sm fw-semibold px-3">Modificar</button></form></td>
        </tr>
    <?php } ?>

  </tbody>
</table>
</div>