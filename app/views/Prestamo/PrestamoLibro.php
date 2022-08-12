<?php require_once APPROOT . "/views/inc/header.php"; ?>
<?php
    # La lista de nombres; por defecto vacía
    $libros = [];
    # Si hay nombres enviados por el formulario; entonces
    # la lista es el formulario.
    # Cada que lo envíen, se agrega un elemento a la lista
    if (isset($_POST["libros"])) {
        $libros = $_POST["libros"];
    }
    # Detectar cuál botón fue presionado
    # Más info: https://parzibyte.me/blog/2019/07/23/php-formulario-dos-botones/
    # En caso de que haya sido el de guardar, no agregamos más campos
    if (isset($_POST["guardar"])) {
        # Quieren guardar; no quieren agregar campos
        echo "OK se guarda lo siguiente:<br>";
        print_r($libros);
        exit;
    }
    ?>
    <form method="post" action="">
        <!--Comienza el ciclo que dibuja los campos dinámicos-->
        <?php foreach ($libros as $libro) { ?>
            <input value="<?php echo $libro ?>" type="text" name="libro[]">
            <br><br>
        <?php } ?>
        <!--Termina el ciclo que dibuja los campos dinámicos-->

        <!--Fuera de la lista tenemos siempre este campo, es el primero-->
        <input autocomplete="off" autofocus value="" type="text" name="libro[]">
        <br><br>
        <button name="agregar" type="submit">Agregar campo</button>
        <button name="guardar" type="submit">Guardar lista</button>
    </form>

    <?php require_once APPROOT . "/views/inc/footer.php"; ?>