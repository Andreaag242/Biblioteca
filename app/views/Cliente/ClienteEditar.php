<?php require_once APPROOT . "/views/inc/header.php"; ?>
<div class="container-fluid py-4">
    <div class="row">
        <div class="col-12">
            <div class="card z-index-0">
                <div class="card-header text-center pt-4">
                    <h5>Cliente</h5>
                </div>
                <div class="row">
                    <div class="col-md-6">
                        <div class="col p-3 ps-5">
                            <form role="form" method="POST" action="<?php echo URLROOT; ?>Cliente/editarCliente/<?php echo $data['idCliente']; ?>">
                                
                                <input type="text" name="idCliente" class="form-control w-50" placeholder="Identificación" value="<?php echo $data['idCliente']; ?>" readonly>
                                <br>
                                <input type="text" name="nombre1Cliente" class="form-control w-75" placeholder="Primer Nombre" value="<?php echo $data['nombre1Cliente']; ?>">
                                <br>
                                <input type="text" name="nombre2Cliente" class="form-control w-75" placeholder="Segundo Nombre" value="<?php echo $data['nombre2Cliente']; ?>">
                                <br>
                                <input type="text" name="apellido1Cliente" class="form-control w-75" placeholder="Primer Apellido" value="<?php echo $data['apellido1Cliente']; ?>">
                                <br>
                                <input type="text" name="apellido2Cliente" class="form-control w-75" placeholder="Segundo Apellido" value="<?php echo $data['apellido2Cliente']; ?>">
                                <br>
                                <h6>Fecha de Nacimiento</h6>
                                <input type="date" name="fechaNaceCliente" class="form-control w-75" value="<?php echo $data['fechaNaceCliente']; ?>">
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="col p-3">
                            <input type="text" name="telefonoCliente" class="form-control" placeholder="Télefono" value="<?php echo $data['telefonoCliente']; ?>">
                            <br>
                            <input type="text" name="direccionCliente" class="form-control" placeholder="Dirección" value="<?php echo $data['direccionCliente']; ?>">
                            
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