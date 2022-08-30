<?php require_once APPROOT . "/views/inc/header.php"; ?>

<!-- End Navbar -->
<div class="container-fluid py-4">
  <div class="row">
  </div>
  <div class="row">
    <div class="col-8">
      <form role="form" method="POST" action="<?php echo URLROOT; ?>Usuario/buscarUsuario" class="d-flex">
        <input type="text" name="nombreUsuario" class="form-control w-20" placeholder="Buscar Usuario">
        <button type="submit" class="btn bg-gradient-dark mt-1 ms-3">Buscar</button>
      </form>
    </div>
    <div class="col-4">
      <a class="btn btn-success btn-sm" href="<?php echo URLROOT; ?>Usuario/formAdd"><i class="bi bi-trash3">Agregar</i></a>
      <a class="btn btn-success btn-sm" href="<?php echo URLROOT; ?>Usuario/ImprimirListado"><i class="bi bi-printer"></i></a></small>
    </div>

    <div class="col-12">
      <div class="card mb-4">
        <div class="card-header pb-0">
          <h6>Usuarios</h6>

        </div>
        <div class="card-body px-0 pt-0 pb-2">
          <div class="table-responsive p-0">
            <table class="table align-items-center mb-0">
              <thead>
                <tr>
                  <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">Identificación</th>
                  <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7 ps-2">Nombre</th>
                  <th class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">Telefono</th>
                  <th class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">Dirección</th>
                  <th class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">Usuario</th>
                  <th class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">Rol</th>
                </tr>
              </thead>
              <tbody>
                <?php foreach ($data as $index => $fila) :; ?>
                  <?php foreach ($fila as $index2 => $usuario) :; ?>
                    <tr>
                      <td class="align-middle text-center text-sm">
                        <p class="text-xs text-black mb-0"><?php echo $usuario->idUsuario; ?></p>
                      </td>
                      <td>
                        <p class="text-xs text-black mb-0"><?php echo $usuario->nombre1 . ' ' . $usuario->nombre2 . ' ' . $usuario->apellido1 . ' ' . $usuario->apellido2; ?></p>
                      </td>
                      <td class="align-middle text-center text-sm">
                        <p class="text-xs text-secondary mb-0"><?php echo $usuario->telefono; ?></p>
                      </td>
                      <td class="align-middle text-center">
                        <p class="text-xs text-secondary mb-0"><?php echo $usuario->direccion; ?></p>
                      </td>
                      <td class="align-middle text-center">
                        <p class="text-xs text-secondary mb-0"><?php echo $usuario->usuario; ?></p>
                      </td>
                      <td class="align-middle text-center">
                        <p class="text-xs text-secondary mb-0"><?php echo $usuario->nombreRol; ?></p>
                      </td>
                      <td class="align-middle">
                        <a class="btn btn-primary btn-sm" href="<?php echo URLROOT; ?>Usuario/editarUsuario/<?php echo $usuario->idUsuario;  ?>"><i class="bi bi-pencil-square">Editar</i></a>
                      </td>
                      <td>
                        <a class="btn btn-primary btn-sm" href="<?php echo URLROOT; ?>Usuario/eliminarUsuario/<?php echo $usuario->idUsuario;  ?>" data-dismiss="modal"><i class="bi bi-pencil-square">Eliminar</i></a>
                      </td>
                    </tr>
                  <?php endforeach; ?>
                <?php endforeach; ?>
              </tbody>
            </table>
            <nav aria-label="Page navigation example justify-align-center">
              <ul class="pagination">
                <li class="page-item"><a class="page-link" href="<?php echo $data["previous"]; ?>">Previo</a></li>
                <?php for ($index = 1; $index <= $data['total']; $index++) : ?>
                  <li class="page-item"><a class="page-link" href=" <?php echo $index; ?>">
                      <?php echo $index; ?>
                    </a></li>
                <?php endfor; ?>
                <li class="page-item"><a class="page-link" href=" <?php echo URLROOT; ?>Usuario/<?php echo $data["next"]; ?>">Siguiente</a></li>
              </ul>
            </nav>
          </div>
        </div>
      </div>
    </div>
  </div>
</div>


<?php require_once APPROOT . "/views/inc/footer.php"; ?>