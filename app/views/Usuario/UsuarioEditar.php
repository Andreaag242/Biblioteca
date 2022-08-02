<?php require_once APPROOT . "/views/inc/header.php"; ?>
<div class="container-fluid py-4">
    <div class="row">
        <div class="col-12">
            
            <div class="card z-index-0">
                <div class="card-header text-center pt-4">
                    <h5>Usuario</h5>
                </div>
                <div class="row">
                    <div class="col-md-6">
                        <div class="col p-3 ps-5">
                            <form role="form" method="POST" action="<?php echo URLROOT; ?>Usuario/editarUsuario/<?php echo $data['idUsuario']; ?>">
                                
                                <input type="text" name="idUsuario" class="form-control w-50" placeholder="Identificación" value="<?php echo $data['idUsuario']; ?>" readonly>
                                <br>
                                <input type="text" name="nombre1Usuario" class="form-control w-75" placeholder="Primer Nombre" value="<?php echo $data['nombre1Usuario']; ?>">
                                <br>
                                <input type="text" name="nombre2Usuario" class="form-control w-75" placeholder="Segundo Nombre" value="<?php echo $data['nombre2Usuario']; ?>">
                                <br>
                                <input type="text" name="apellido1Usuario" class="form-control w-75" placeholder="Primer Apellido" value="<?php echo $data['apellido1Usuario']; ?>">
                                <br>
                                <input type="text" name="apellido2Usuario" class="form-control w-75" placeholder="Segundo Apellido" value="<?php echo $data['apellido2Usuario']; ?>">
                                <br>
                                <h6>Fecha de Nacimiento</h6>
                                <input type="date" name="fechaNaceUsuario" class="form-control w-75" value="<?php echo $data['fechaNaceUsuario']; ?>">
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="col p-3">
                            <input type="text" name="telefonoUsuario" class="form-control" placeholder="Télefono" value="<?php echo $data['telefonoUsuario']; ?>">
                            <br>
                            <input type="text" name="direccionUsuario" class="form-control" placeholder="Dirección" value="<?php echo $data['direccionUsuario']; ?>">
                            <br>
                            <input type="text" name="usuario" class="form-control" placeholder="Usuario" value="<?php echo $data['usuario']; ?>">
                            <br>
                            <input type="password" name="passUsuario" class="form-control" placeholder="Contraseña" value="<?php echo $data['passUsuario']; ?>">
                            <br>
                            <select class="form-select" name="rolUsuario" value="<?php echo $data['irolUsuario']; ?>">
                                <?php foreach ($rol as $roles) :; ?>
                                    <option value="<?php echo $rol->idRol; ?>"><?php echo $roles->nombreRol; ?></option>
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