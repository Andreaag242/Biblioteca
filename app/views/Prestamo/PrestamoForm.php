<?php require_once APPROOT . "/views/inc/header.php";
?>
<div class="container-fluid py-4">

    <div class="<?php echo $mensaje->color; ?>" role="alert">
        <?php echo $mensaje->mensaje; ?>
    </div>

    <div class="row">
        <div class="col-8">
            <form role="form" method="POST" action="<?php echo URLROOT; ?>Prestamo/buscarCliente" class="d-flex">
                <input type="text" name="nombreCliente" class="form-control w-15" placeholder="Buscar identificación">
                <button type="submit" class="btn bg-gradient-dark mt-1 ms-3">Buscar</button>
            </form>
        </div>
        <div class="col d-flex justify-content-center">
            <a class="btn btn-danger btn-sm mt-1 ms-3" href="<?php echo URLROOT; ?>Prestamo/formAdd"><i class="bi bi-trash3">Generar Prestamo</i></a>
        </div>
    </div>
    <div class="col-12">

        <div class="card z-index-0">
            <div class="card-header text-center pt-4">
                <h5>Libros</h5>
            </div>
            <div class="row">
                <div class="col-md-10">
                    <div class="col p-3 ps-5">
                        <form role="form" method="POST" action="<?php echo URLROOT; ?>Prestamo/formAdd">
                            <select class="form-select" name="clientePrestamo">
                                <?php foreach ($data['clientes'] as $cliente) :; ?>
                                    <option value="<?php echo $cliente->idCliente; ?>"><?php echo $cliente->idCliente . " " . $cliente->nombre1 . " " . $cliente->nombre2 . " " . $cliente->apellido1 . " " . $cliente->apellido2; ?></option>
                                <?php endforeach; ?>
                            </select>
                            <br>
                            <input type="text" name="usuario" class="form-control w-75" placeholder="Usuario">
                            <br>
                            <input type="text" name="disponible" class="form-control w-75" placeholder="disponible">
                            <br>
                            <input type="text" name="cantidadTotal" class="form-control w-75" placeholder="Cantidad Total">
                            <br>
                    </div>
                    <div class="row mb-2">
                        <div class="col-4">
                            <button type="button" class="btn btn-primary btn-sm shadow-sm" data-bs-toggle="modal" data-bs-target="#libros">
                                Agregar Libro <i class="bi bi-plus-circle"></i>
                            </button>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-12">

                            <table class="table table-bordered table-sm" id="detalle">
                                <thead class=" table-light">
                                    <tr>
                                        <th>Nombre</th>
                                        <th>Código</th>
                                        <th>autor</th>
                                    </tr>
                                </thead>
                                <tbody>


                                </tbody>
                            </table>


                        </div>

                    </div>

                </div>
                <div class="d-flex justify-content-center">
                    <button type="reset" class="btn btn-secondary btn-sm ms-1">Cancelar</button>
                    <button type="submit" class="btn btn-success  btn-sm ms-1">Guardar</button>
                    </form>
                </div>
            </div>

        </div>
    </div>
</div>
</div>


<!-- Modal -->
<div class="modal fade" id="libros" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog ">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Libros</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body d-flex justify-content-center">

                <table class="table table-bordered table-sm table-hover" id="tblLibros">
                    <thead class="table-light">
                        <tr>
                            <th> </th>
                            <th>Nombre</th>
                            <th>Código</th>
                        </tr>
                    </thead>
                    <tbody class="table-group-divider">

                    </tbody>
                    <tfoot>
                        <tr>
                            <th> </th>
                            <th>Nombre</th>
                            <th>Código</th>
                        </tr>

                    </tfoot>
                </table>



            </div>
            <div class="d-flex justify-content-center">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                <button type="button" class="btn btn-primary">Guardar</button>
            </div>
        </div>
    </div>
</div>
</div>

<script src="<?php echo URLROOT; ?>js/bootstrap.bundle.min.js"></script>
<script src="<?php echo URLROOT; ?>jQuery-3.6.0/jquery-3.6.0.min.js"></script>
<script src="<?php echo URLROOT; ?>DataTables-1.12.1/js/jquery.dataTables.min.js"></script>

<script src="<?php echo URLROOT; ?>js/prestamo.js"></script>
<?php require_once APPROOT . "/views/inc/footer.php"; ?>