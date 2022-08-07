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
                    <div class="col-md-6">
                        <div class="col p-3 ps-5">
                            <form role="form" method="POST" action="<?php echo URLROOT; ?>Cliente/agregarCliente">
                                <input type="text" name="idCliente" class="form-control w-50" placeholder="Identificación">
                                <br>
                                <input type="text" name="nombre1Cliente" class="form-control w-75" placeholder="Primer Nombre">
                                <br>
                                <input type="text" name="nombre2Cliente" class="form-control w-75" placeholder="Segundo Nombre">
                                <br>
                                <input type="text" name="apellido1Cliente" class="form-control w-75" placeholder="Primer Apellido">
                                <br>
                                <input type="text" name="apellido2Cliente" class="form-control w-75" placeholder="Segundo Apellido">
                                <br>
                                <h6>Fecha de Nacimiento</h6>
                                <input type="date" name="fechaNaceCliente" class="form-control w-75">
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="col p-3">
                            <input type="text" name="telefonoCliente" class="form-control" placeholder="Télefono">
                            <br>
                            <input type="text" name="direccionCliente" class="form-control" placeholder="Dirección">
                            
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