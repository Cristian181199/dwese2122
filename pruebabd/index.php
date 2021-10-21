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
    $sent1 = $pdo->query('SELECT * 
                          FROM emple e
                          LEFT JOIN depart d
                          ON e.depart_id = d.id');
    $sent2 = $pdo->query('SELECT count(*) as num_filas FROM emple e
                          LEFT JOIN depart d
                          ON e.depart_id = d.id')->fetchColumn();
    ?>
    <table border="1">
        <thead>
            <th>Nombre</th>
            <th>Fecha Alta</th>
            <th>Salario</th>
            <th>Denominacion</th>
            <th>Localidad</th>
        </thead>
        <tbody>
            <?php foreach ($sent1 as $fila) : ?>
                <tr>

                    <td><?= $fila['nombre'] ?></td>
                    <td><?= $fila['fecha_alt'] ?></td>
                    <td><?= $fila['salario'] ?></td>
                    <td><?= $fila['denominacion'] ?></td>
                    <td><?= $fila['localidad'] ?></td>

                </tr>
            <?php endforeach ?>

        </tbody>
        <tfoot>
            <tr>
            <th>Total</th>
            <th><?= $sent2?></th>
            </tr>
        </tfoot>
    </table>
</body>

</html>