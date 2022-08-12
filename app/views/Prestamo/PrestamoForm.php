<?php require_once APPROOT . "/views/inc/header.php";
var_dump($data);
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
                            <!--  <form role="form" method="POST" action="<?php //echo URLROOT; 
                                                                            ?>Libros/agregarLibro"> -->
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
                            <a class="btn btn-primary btn-sm" href="<?php echo URLROOT; ?>Prestamo/FormAddLibro" data-dismiss="modal"><i class="bi bi-pencil-square">Escoger Libros</i></a>

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
<script src="<?php echo URLROOT; ?>js/prestamo.js"></script>
<?php require_once APPROOT . "/views/inc/footer.php"; ?>