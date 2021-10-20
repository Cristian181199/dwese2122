<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Mostrar datos en tabla</title>
    <link rel="stylesheet" href="style.css">
</head>

<body>
    <?php
    require 'auxiliar.php';

    $pdo = require 'connect.php';

    $error = [];

    //$keyword = filtrar_keyword('keyword', $error);

    $resultados = find_depart($pdo, 'con');


    $sent = $pdo->query(
        'SELECT * 
            FROM depart'
    );
    ?>
    <h1>Tabla DEPART</h1>

    <table>
        <tr>
            <th>ID</th>
            <th>NOMBRE</th>
            <th>LOCALIDAD</th>
        </tr>
        <?php foreach ($sent as $fila) : ?>
            <tr>
                <td> <?= $fila['id'] ?> </td>
                <td> <?= $fila['nombre'] ?> </td>
                <td> <?= $fila['localidad'] ?> </td>
            </tr>
        <?php endforeach ?>
    </table>

    <h2>Busca departamento por nombre</h2>

    <?php if ($resultados) : ?>
        <table>
            <tr>
                <th>ID</th>
                <th>NOMBRE</th>
                <th>LOCALIDAD</th>
            </tr>
            <?php foreach ($resultados as $resultado) : ?>
                <tr>
                    <td> <?= $resultado['id'] ?> </td>
                    <td> <?= $resultado['nombre'] ?> </td>
                    <td> <?= $resultado['localidad'] ?> </td>
                </tr>
            <?php endforeach ?>
        </table>

    <?php else : ?>
        <p>No se ha encontrado ningun departamento con ese nombre.</p>

    <?php endif ?>

</body>

</html>