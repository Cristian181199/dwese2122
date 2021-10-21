<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>

<body>
    <?php
    require 'auxiliar.php';

    $pdo = conectar();
    $sent1 = $pdo->query('SELECT * FROM depart');
    $sent2 = $pdo->query('SELECT * FROM emple');
    ?>

    <table border="1">
        <thead>
            <th>Id</th>
            <th>Nombre</th>
            <th>Localidad</th>
        </thead>
        <tbody>
            <?php foreach ($sent1 as $fila) : ?>
                <tr>
                    <td><?= $fila['id'] ?></td>
                    <td><?= $fila['denominacion'] ?></td>
                    <td><?= $fila['localidad'] ?></td>
                </tr>
            <?php endforeach ?>
        </tbody>
    </table>
    <hr>
    <table border="1">
        <thead>
            <th>Id</th>
            <th>Nombre</th>
            <th>Fecha Alta</th>
            <th>Salario</th>
            <th>Depart ID</th>
        </thead>
        <tbody>
            <?php foreach ($sent2 as $fila) : ?>
                <tr>
                    <td><?= $fila['id'] ?></td>
                    <td><?= $fila['nombre'] ?></td>
                    <td><?= $fila['fecha_alt'] ?></td>
                    <td><?= $fila['salario'] ?></td>
                    <td><?= $fila['depart_id'] ?></td>
                </tr>
            <?php endforeach ?>
        </tbody>
    </table>
</body>

</html>