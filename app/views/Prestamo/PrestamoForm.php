<?php require_once APPROOT . "/views/inc/header.php";
?>
<div class="container-fluid py-4">

    <div class="<?php echo $mensaje->color; ?>" role="alert">
        <?php echo $mensaje->mensaje; ?>
    </div>

    <div class="row">
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
                                    <option value="<?php echo $cliente->idCliente; ?>"><?php echo $cliente->idCliente; ?></option>
                                <?php endforeach; ?>
                            </select>
                            <input type="text" name="usuario" class="form-control w-75" placeholder="Usuario">
                            <br>
                            <input type="text" name="disponible" class="form-control w-75" placeholder="disponible">
                            <br>
                            <input type="text" name="cantidadTotal" class="form-control w-75" placeholder="Cantidad Total">
                            <br>
                            <div class="row mb-1">
                                <div class="col-1"><label for="">Libros:</label></div>
                                <div class="col-4">
                                    <select class="form-select" name="libro" id="valorOption">
                                        <?php foreach ($data['libros'] as $libro) :; ?>
                                            <option value="<?php echo $libro->idLibro; ?>"><?php echo $libro->nombreLibro . ' ' . $libro->nombreEditorial; ?></option>
                                        <?php endforeach; ?>
                                    </select>
                                </div>
                                <div class="col-6 "> <button type="button" class="btn btn-success" onclick="agregarDetalle()"> + </button></div>
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
                        <div class="col-12 d-flex justify-content-center ">
                            <div class="text-center">
                                <button type="submit" class="btn bg-gradient-dark w-100 my-4 mb-2">Enviar</button>
                            </div>
                        </div>
                        </form>
                    </div>

                </div>
            </div>
        </div>
    </div>
    <script src="<?php echo URLROOT; ?>js/formula.js"></script>
    <?php require_once APPROOT . "/views/inc/footer.php"; ?>