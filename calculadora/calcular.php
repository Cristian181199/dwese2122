<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Prueba de recogida de datos</title>
</head>
<body>
    <h1>Prueba de recogida de datos</h1>

    <?php
    
    require 'auxiliar.php';



    $error = [];

    $x = filtrar_numero('x', $error);
    $y = filtrar_numero('y', $error);
    $oper = filtrar_opciones('oper', OPER, $error);

    mostrar_errores($error);
    ?>

    <?php if (empty($error)):
        $res = calcular($x, $y, $oper) ?>
        <p>El resultado es <?= $res ?></p>
    <?php endif ?>

    <a href="index.php">Volver</a>
</body>
</html>