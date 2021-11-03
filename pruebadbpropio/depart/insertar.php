<?php session_start() ?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Insertar</title>
    <link rel="stylesheet" href="../comunes/style.css">
</head>
<body>
    <?php 
        include '../comunes/auxiliar.php';
        mostrar_navbar();

        if (!logueado()) {
            header('Location: /index.php');
            return;
        }

        $denominacion = filtrar_entrada('denominacion');
        $localidad = filtrar_entrada('localidad');

        $error = [];

        if (isset($denominacion)) {
            if ($denominacion === '') {
                $error['denominacion'] = 'Este campo no puede estar vacio.';
            }
        }

        if (isset($localidad)) {
            if ($localidad === '') {
                $localidad = null;
            }
        }

        

        if (isset($denominacion, $localidad)) {
            $pdo = conectar();
            //Insertar los datos en depart.
        }
    ?>

    <form action="" method="POST">
        <div>
            <label for="denominacion">Denominacion: </label>
            <input type="text" name="denominacion" id="denominacion" value="<?= $denominacion ?>">
            <?= mostrar_error($error, 'denominacion') ?>
        </div>
        <div>
            <label for="localidad">Localidad: </label>
            <input type="text" name="localidad" id="localidad" value="<?= $localidad ?>">
            <?= mostrar_error($error, 'localidad') ?>
        </div>
        <div>
            <button type="submit">Insertar</button>
        </div>
    </form>
    
</body>
</html>