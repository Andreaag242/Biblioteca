<?php require_once APPROOT . "/views/inc/header.php"; ?>
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
                            <form role="form" method="POST" action="<?php echo URLROOT; ?>Libros/agregarLibro">
                                <input type="text" name="nombreLibro" class="form-control w-50" placeholder="Nombre">
                                <br>
                                <input type="text" name="autorLibro" class="form-control w-75" placeholder="Autor">
                                <br>
                                <input type="text" name="disponibleLibro" class="form-control w-75" placeholder="disponible">
                                <br>
                                <input type="text" name="cantidadTotalLibro" class="form-control w-75" placeholder="Cantidad Total">
                                <br>
                            <select class="form-select" name="editorialLibro">
                                <?php foreach ($data as $edit) :; ?>
                                    <option value="<?php echo $edit->idEditorial; ?>"><?php echo $edit->nombreEditorial; ?></option>  
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

<?php require_once APPROOT . "/views/inc/footer.php"; ?>