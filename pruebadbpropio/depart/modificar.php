<?php session_start() ?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Modificar</title>
    <link rel="stylesheet" href="../comunes/style.css">
</head>
<body>
    <?php
        include '../comunes/auxiliar.php';
        mostrar_navbar();

        $id = filtrar_entrada('id', INPUT_GET);


    ?>

    <form action="" method="POST">
        <div>
            <label for="denomionacion">Denominacion: </label>
            <input type="text" name="denominacion" id="denominacion">
        </div>
        <div>
            <label for="localidad">Localidad: </label>
            <input type="text" name="localidad" id="localidad">
        </div>
        <div>
            <button type="submit">Modificar</button>
        </div>
    </form>
</body>
</html>