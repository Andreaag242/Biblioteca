<?php require_once APPROOT . "/views/inc/header.php"; ?>

<!-- End Navbar -->
<div class="container-fluid py-4">
  <div class="row">
    <div class="col-8">
      <form role="form" method="POST" action="<?php echo URLROOT; ?>Prestamo/buscarPrestamos" class="d-flex">
        <input type="text" name="idCliente" class="form-control w-15" placeholder="Buscar identificación">
        <button type="submit" class="btn bg-gradient-dark mt-1 ms-3">Buscar</button>
      </form>
    </div>
    <div class="col d-flex justify-content-center">
      <a class="btn btn-danger btn-sm mt-1 ms-3" href="<?php echo URLROOT; ?>Prestamo/formAdd"><i class="bi bi-trash3">Generar Prestamo</i></a>
    </div>
  </div>
  <div class="col-12">
    <div class="card mb-4">
      <div class="card-header pb-0">
        <h6>Prestamos</h6>

      </div>
      <div class="card-body px-0 pt-0 pb-2">
        <div class="table-responsive p-0">
          <table class="table align-items-center mb-0">
            <thead>
              <tr>
                <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">Id</th>
                <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7 ps-2">Fecha prestamo</th>
                <th class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">Fecha entrega</th>
                <th class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">Identificación</th>
                <th class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">Usuario</th>
              </tr>
            </thead>
            <tbody>
              <?php foreach ($data as $prestamos) :; ?>
                <tr>
                  <td class="align-middle text-center text-sm">
                    <p class="text-xs text-black mb-0"><?php echo $prestamos->idPrestamo; ?></p>
                  </td>
                  <td>
                    <p class="text-xs text-black mb-0"><?php echo $prestamos->fechaPrestamo; ?></p>
                  </td>
                  <td class="align-middle text-center text-sm">
                    <p class="text-xs text-secondary mb-0"><?php echo $prestamos->fechaEntrega; ?></p>
                  </td>
                  <td class="align-middle text-center">
                    <p class="text-xs text-secondary mb-0"><?php echo $prestamos->cliente_idCliente; ?></p>
                  </td>
                  <td class="align-middle text-center">
                    <p class="text-xs text-secondary mb-0"><?php echo $prestamos->usuario; ?></p>
                  </td>
                  <td>
                    <a class="btn btn-danger btn-sm" href="<?php echo URLROOT; ?>"><i class="bi bi-trash3">Entrega</i></a>
                  </td>
                </tr>
              <?php endforeach; ?>
            </tbody>
          </table>
        </div>
      </div>
    </div>
  </div>
</div>

<?php require_once APPROOT . "/views/inc/footer.php"; ?>