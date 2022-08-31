<?php require_once APPROOT . "/views/inc/header.php"; ?>

<!-- End Navbar -->
<div class="container-fluid py-4">
  <div class="row">
  </div>
  <div class="row">
    <div class="col-8">
      <form role="form" method="POST" action="<?php echo URLROOT; ?>Cliente/buscarCliente" class="d-flex">
        <input type="text" name="nombreCliente" class="form-control w-20" placeholder="Buscar Cliente">
        <button type="submit" class="btn bg-gradient-dark mt-1 ms-3">Buscar</button>
      </form>
    </div>
    <div class="col-4">
      <a class="btn btn-success btn-sm" href="<?php echo URLROOT; ?>Cliente/formAdd"><i class="bi bi-trash3">Agregar</i></a>
      <a class="btn btn-success btn-sm" href="<?php echo URLROOT; ?>Cliente/ImprimirListado"><i class="bi bi-printer"></i></a></small>
    </div>

    <div class="col-12">
      <div class="card mb-4">
        <div class="card-header pb-0">
          <h6>Clientes</h6>

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
                  <th class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">Activo</th>
                </tr>
              </thead>
              <tbody>
                <?php foreach ($data as $index => $fila) :; ?>
                  <?php foreach ($fila as $index2 => $cliente) :; ?>
                    <tr>
                      <td class="align-middle text-center text-sm">
                        <p class="text-xs text-black mb-0"><?php echo $cliente->idCliente; ?></p>
                      </td>
                      <td>
                        <p class="text-xs text-black mb-0"><?php echo $cliente->nombre1 . ' ' . $cliente->nombre2 . ' ' . $cliente->apellido1 . ' ' . $cliente->apellido2; ?></p>
                      </td>
                      <td class="align-middle text-center text-sm">
                        <p class="text-xs text-secondary mb-0"><?php echo $cliente->telefono; ?></p>
                      </td>
                      <td class="align-middle text-center">
                        <p class="text-xs text-secondary mb-0"><?php echo $cliente->direccion; ?></p>
                      </td>
                      <td class="align-middle">
                        <a class="btn btn-primary btn-sm" href="<?php echo URLROOT; ?>Cliente/editarCliente/<?php echo $cliente->idCliente;  ?>"><i class="bi bi-pencil-square">Editar</i></a>
                      </td>
                      <td><a class="btn btn-danger btn-sm" href="<?php echo URLROOT; ?>Cliente/eliminarCliente/<?php echo $cliente->idCliente;  ?>"><i class="bi bi-trash3">Borrar</i></a>
                      </td>
                    </tr>
                  <?php endforeach; ?>
                <?php endforeach; ?>
              </tbody>
            </table>
            <nav aria-label="Page navigation example justify-align-center">
              <ul class="pagination">
                <li class="page-item"><a class="page-link" href="<?php echo $data["previous"]; ?>"><i class="bi bi-arrow-left-circle" style="font-size: 2em;"></i></a></li>
                <?php for ($index = 1; $index <= $data['total']; $index++) : ?>
                  <li class="page-item"><a class="page-link" href=" <?php echo $index; ?>">
                      <?php echo $index; ?>
                    </a></li>
                <?php endfor; ?>
                <li class="page-item"><a class="page-link" href=" <?php echo URLROOT; ?>Cliente/<?php echo $data["next"]; ?>"><i class="bi bi-arrow-right-circle" style="font-size: 2em;"></i></a></li>
              </ul>
            </nav>
          </div>
        </div>

      </div>
    </div>
  </div>
</div>

<?php require_once APPROOT . "/views/inc/footer.php"; ?>