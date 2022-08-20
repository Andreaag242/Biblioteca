<?php require_once APPROOT . "/views/inc/header.php"; ?>

<!-- End Navbar -->
<div class="container-fluid py-4">
  <div class="row">
  </div>
  <div class="row">
    <div class="col-8">
      <form role="form" method="POST" action="<?php echo URLROOT; ?>Libros/buscarLibros" class="d-flex">
        <input type="text" name="nombreLibro" class="form-control w-15" placeholder="Buscar nombre">
        <button type="submit" class="btn bg-gradient-dark mt-1 ms-3">Buscar</button>
      </form>
    </div>
    <div class="col-4">
      
    <a class="btn btn-success btn-sm" href="<?php echo URLROOT; ?>Libros/formAdd"><i class="bi bi-trash3">Agregar</i></a>
    <a class="btn btn-success btn-sm" href="<?php echo URLROOT; ?>Libros/ImprimirListado"><i class="bi bi-printer"></i></a></small>
    </div>
    <div class="col-12">
      <div class="card mb-4">
        <div class="card-header pb-0">
          <h6>Libros</h6>
          
        </div>
        <div class="card-body px-0 pt-0 pb-2">
          <div class="table-responsive p-0">
            <table class="table align-items-center mb-0">
              <thead>
                <tr>
                  <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">Id</th>
                  <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7 ps-2">Nombre</th>
                  <th class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">Autor</th>
                  <th class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">Disponible</th>
                  <th class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">Cantidad</th>
                  <th class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">Editorial</th>
                </tr>
              </thead>
              <tbody>
                <?php foreach ($data as $libros) :; ?>
                  <tr>
                    <td class="align-middle text-center text-sm">
                      <p class="text-xs text-black mb-0"><?php echo $libros->idLibro; ?></p>
                    </td>
                    <td>
                      <p class="text-xs text-black mb-0"><?php echo $libros->nombreLibro; ?></p>
                    </td>
                    <td class="align-middle text-center text-sm">
                      <p class="text-xs text-secondary mb-0"><?php echo $libros->autor; ?></p>
                    </td>
                    <td class="align-middle text-center">
                      <p class="text-xs text-secondary mb-0"><?php echo $libros->disponible; ?></p>
                    </td>
                    <td class="align-middle text-center">
                      <p class="text-xs text-secondary mb-0"><?php echo $libros->cantidadTotal; ?></p>
                    </td>
                    <td class="align-middle text-center">
                      <p class="text-xs text-secondary mb-0"><?php echo $libros->nombreEditorial; ?></p>
                    </td>
                    <td class="align-middle">
                      <a class="btn btn-primary btn-sm" href="<?php echo URLROOT; ?>Libros/editarLibro/<?php echo $libros->idLibro;  ?>"><i class="bi bi-pencil-square">Editar</i></a>
                    </td>
                    <td><a class="btn btn-danger btn-sm" href="<?php echo URLROOT; ?>Libros/eliminarLibro/<?php echo $libros->idLibro;  ?>"><i class="bi bi-trash3">Borrar</i></a>
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