<?php session_start() ?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Home</title>
    <link rel="stylesheet" href="./comunes/style.css">
</head>

<body>

    <?php
    include './comunes/auxiliar.php';
    mostrar_navbar();
    ?>

    <?php if ($login = logueado()) :?>

        <h3>Buenas <?= $login['username'] ?> Todo bien?</h3>

    <?php else : ?>

        <h3>Registrate o inicia sesion para poder ver los departamentos y empleados.</h3>

    <?php endif ?>
</body>

</html>