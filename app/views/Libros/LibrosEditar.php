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
                            <form role="form" method="POST" action="<?php echo URLROOT; ?>Libros/editarLibro/<?php echo $data['idLibro']; ?>">
                                <input type="text" name="idLibro" class="form-control w-50" placeholder="Identificación" value="<?php echo $data['idLibro']; ?>" readonly>
                                <br>
                                <input type="text" name="nombreLibro" class="form-control w-50" placeholder="Nombre" value="<?php echo $data['nombreLibro']; ?>">
                                <br>
                                <input type="text" name="autorLibro" class="form-control w-75" placeholder="Autor" value="<?php echo $data['autorLibro']; ?>">
                                <br>
                                <input type="text" name="disponibleLibro" class="form-control w-75" placeholder="disponible" value="<?php echo $data['disponibleLibro']; ?>">
                                <br>
                                <input type="text" name="cantidadTotalLibro" class="form-control w-75" placeholder="Cantidad Total" value="<?php echo $data['cantidadTotalLibro']; ?>">
                                <br>
                            <select class="form-select" name="editorialLibro" value="<?php echo $data['idEditorial']; ?>">
                                <?php foreach ($data['editoriales'] as $edit) :; ?>
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