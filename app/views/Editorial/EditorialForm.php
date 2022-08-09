<?php require_once APPROOT . "/views/inc/header.php"; ?>
<div class="container-fluid py-4">

    <div class="<?php echo $mensaje->color; ?>" role="alert">
        <?php echo $mensaje->mensaje; ?>
    </div>

    <div class="row">
        <div class="col-12">

            <div class="card z-index-0">
                <div class="card-header text-center pt-4">
                    <h5>Cliente</h5>
                </div>
                <div class="row">
                    <div class="col-md-8">
                        <div class="col p-3 ps-5">
                            <form role="form" method="POST" action="<?php echo URLROOT; ?>Editorial/agregarEditorial">
                                <input type="text" name="nombreEditorial" class="form-control w-75" placeholder="Nombre">
                                <br>
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

<?php require_once APPROOT . "/views/inc/footer.php"; ?>