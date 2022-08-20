<?php require_once APPROOT . "/views/inc/header.php"; ?>
<?php var_dump($data) ?>
    <?php foreach ($data['seleccion'] as $libro) { ?>
            <?php $val += 1; ?>
            <input value="<?php echo $libro["$val"] ?>" type="text" name="libro">
            <br><br>
        <?php } ?>
    <form method="post" action="<?php echo URLROOT; ?>Prestamo/formVerifLibro">
        <input autocomplete="off" autofocus value="" type="text" name="libros">
        <br><br>
        <button name="agregar" type="submit">Agregar campo</button>
    </form>

    <?php require_once APPROOT . "/views/inc/footer.php"; ?>