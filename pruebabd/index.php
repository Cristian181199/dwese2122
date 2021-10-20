<?php


$pdo = require 'connect.php';


$sent = $pdo->query(
    'SELECT * 
     FROM depart'
);

//foreach ($sent as $fila) {
//    echo $fila['id'] . '|' . $fila['nombre'] . '|' . $fila['localidad'] . "\n";
//}

?>

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