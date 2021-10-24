<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Read</title>
</head>

<body>
    <?php

    require 'auxiliar.php';
    $pdo = conectar();

    $sql = 'SELECT * 
            FROM depart';

    // Usamos query ya que no usamos parametros
    $sent = $pdo->query($sql);

    // Obtener todos los departamentos
    $departamentos = $sent->fetchAll(PDO::FETCH_ASSOC);

    if ($departamentos) {
        // Mostramos la tabla
    ?>
        <table>
            <thead>
                <tr>
                    <th>ID</th>
                    <th>Departamento</th>
                    <th>Localidad</th>
                </tr>
            </thead>
            <tbody>
                <?= mostrar_departamentos($departamentos) ?>
            </tbody>
        </table>
    <?php
    }

    ?>
</body>

</html>