<?php require_once APPROOT . "/views/inc/header.php"; ?>
<div class="container-fluid py-4">

    <div class="<?php echo $mensaje->color; ?>" role="alert">
        <?php echo $mensaje->mensaje; ?>
    </div>

    <div class="row">
        <div class="col-12">

            <div class="card z-index-0">
                <div class="card-header text-center pt-4">
                    <h5>Usuario</h5>
                </div>
                <div class="row">
                    <div class="col-md-6">
                        <div class="col p-3 ps-5">
                            <form role="form" method="POST" id="frmUsuario" name="frmUsuario" action="<?php echo URLROOT; ?>Usuario/agregarUsuario">
                                <input type="text" name="idUsuario" class="form-control w-50" placeholder="Identificación">
                                <br>
                                <input type="text" name="nombre1Usuario" class="form-control w-75" placeholder="Primer Nombre">
                                <br>
                                <input type="text" name="nombre2Usuario" class="form-control w-75" placeholder="Segundo Nombre">
                                <br>
                                <input type="text" name="apellido1Usuario" class="form-control w-75" placeholder="Primer Apellido">
                                <br>
                                <input type="text" name="apellido2Usuario" class="form-control w-75" placeholder="Segundo Apellido">
                                <br>
                                <h6>Fecha de Nacimiento</h6>
                                <input type="date" name="fechaNaceUsuario" class="form-control w-75">
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="col p-3">
                            <input type="text" name="telefonoUsuario" class="form-control" placeholder="Télefono">
                            <br>
                            <input type="text" name="direccionUsuario" class="form-control" placeholder="Dirección">
                            <br>
                            <input type="text" name="usuario" class="form-control" placeholder="Usuario">
                            <br>
                            <input type="password" name="passUsuario" class="form-control" placeholder="Contraseña">
                            <br>
                            <select class="form-select" name="rolUsuario">
                                <?php foreach ($data as $rol) :; ?>
                                    <option value="<?php echo $rol->idRol; ?>"><?php echo $rol->nombreRol; ?></option>
                                <?php endforeach; ?>
                            </select>
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

<script src="<?php echo URLROOT; ?>js/sweetalert2.all.min.js"></script>
<script src="<?php echo URLROOT; ?>css/sweetalert2.min.css"></script>
<script src="<?php echo URLROOT; ?>js/usuario.js"></script>
<?php require_once APPROOT . "/views/inc/footer.php"; ?>