<?php require_once APPROOT . "/views/inc/header.php"; ?>

<!-- End Navbar -->
<div class="container-fluid py-4">
  <div class="row">
  </div>
  <div class="row">

    <div class="col-4">

      <a class="btn btn-success btn-sm" href="<?php echo URLROOT; ?>Editorial/formAdd"><i class="bi bi-trash3">Agregar</i></a>
    </div>

    <div class="col-12">
      <div class="card mb-4">
        <div class="card-header pb-0">
          <h6>Editoriales</h6>

        </div>
        <div class="card-body px-0 pt-0 pb-2">
          <div class="table-responsive p-0">
            <table class="table align-items-center mb-0">
              <thead>
                <tr>
                  <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">Identificación</th>
                  <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7 ps-2">Nombre</th>
                </tr>
              </thead>
              <tbody>
                <?php foreach ($data as $editorial) :; ?>
                  <tr>
                    <td class="align-middle text-center text-sm">
                      <p class="text-xs text-black mb-0"><?php echo $editorial->idEditorial; ?></p>
                    </td>
                    <td>
                      <p class="text-xs text-black mb-0"><?php echo $editorial->nombreEditorial; ?></p>
                    </td>
                    <td class="align-middle">
                      <a class="btn btn-primary btn-sm" href="<?php echo URLROOT; ?>Editorial/editareditorial/<?php echo $editorial->idEditorial;  ?>"><i class="bi bi-pencil-square">Editar</i></a>
                    </td>
                    <td>
                      <a class="btn btn-danger btn-sm" href="<?php echo URLROOT; ?>Editorial/eliminareditorial/<?php echo $editorial->idEditorial;  ?>"><i class="bi bi-trash3">Borrar</i></a>
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
</div>

<?php require_once APPROOT . "/views/inc/footer.php"; ?>