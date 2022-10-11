<?php require_once APPROOT . "/views/inc/header.php"; ?>


<form role="form" method="POST" id="frmUsuario" name="frmUsuario" action="<?php echo URLROOT; ?>Usuario/eliminarUsuario/<?php echo $data->idUsuario; ?>">
    <div class="modal fade" id="exampleModalCenter" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close d-flex align-items-center justify-content-center" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true" class="ion-ios-close"></span>
                    </button>
                </div>
                <div class="row">
                    <div class="col-md mb-md-0 mb-5">
                        <div class="modal-body ">
                            <h3>Borrar Usuario</h3>
                            <br><br><br>
                            <div class="col text-light">
                                <p>Está seguro de que desea eliminar el usuario: <?php echo $data->idUsuario;  ?></p>
                            </div>
                        </div>
                    </div>
                    <br><br>
                    <div class="close d-flex align-items-center justify-content-center">
                        <button type="submit" class="btn btn-info rounded px-3 mx-auto">Enviar</button>
                        <a class="btn btn-secondary rounded px-3 mx-auto" href="<?php echo URLROOT; ?>Usuario/index"><i class="bi bi-pencil-square">Cancelar</i></a>
                    </div>
                </div>
            </div>
        </div>
    </form>
</div>

<script src="<?php echo URLROOT; ?>js/sweetalert2.all.min.js"></script>
<script src="<?php echo URLROOT; ?>css/sweetalert2.min.css"></script>
<script src="<?php echo URLROOT; ?>js/usuarioEliminar.js"></script>
<?php require_once APPROOT . "/views/inc/footer.php"; ?>