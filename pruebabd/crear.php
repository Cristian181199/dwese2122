<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Crear empleado</title>
</head>

<body>
    <?php
    require 'auxiliar.php';

    $error = [];


    $nombre = filtrar_nombre_post('nombre', $error);
    $fecha_alt = filtrar_fecha_post('fecha_alt', $error);
    $salario = filtrar_salario_post('salario', $error);
    $departamento = (isset($_POST['depart_id'])) ? trim($_POST['depart_id']) : null;

    ?>


    <h3>Crear empleado</h3>

    <form action="" method="POST">
        <div>
            <label for="nombre">Nombre: </label>
            <input type="text" name="nombre" id="nombre" value="<?= $nombre ?>">
        </div>

        <div>
            <label for="fecha_alt">Fecha de alta: </label>
            <input type="date" name="fecha_alt" id="fecha_alt" value="<?= $fecha_alt ?>">
        </div>

        <div>
            <label for="salario">Salario: </label>
            <input type="text" name="salario" id="salario" value="<?= $salario ?>">
        </div>

        <div>
            <label for="depart_id">Departamento: </label>
            <select name="depart_id" id="depart_id">
                <option value="1">Contabilidad</option>
                <option value="2">Informática</option>
                <option value="3">Inglés</option>
                <option value="4">Matemáticas</option>
                <option value="5">Cibernética</option>
            </select>
        </div>

        <div>
            <button type="submit">Crear</button>
            <button type="submit"><a href="index.php">Volver</a></button>
        </div>
    </form>

    <?php

    if (empty($error)) {
        if (ctype_digit($departamento) && mb_strlen($departamento) === 1) {
            $pdo = conectar();
            $sent = $pdo->prepare('INSERT INTO emple(nombre, fecha_alt, salario, depart_id)
                                    VALUES (:nombre, :fecha_alt, :salario, :depart_id)');
            if (
                $sent->execute([
                    ':nombre' => $nombre,
                    ':fecha_alt' => $fecha_alt,
                    ':salario' => $salario,
                    ':depart_id' => $departamento
                ])
                && $sent->rowCount() === 1
            ) {
                // Bien
            } else {
                // Mal
            }
            header('Location: index.php');
            return;
        }
    } elseif (!empty($error)) {
        mostrar_errores($error);
    } else {
        header('Location: index.php');
        return;
    }
    ?>
</body>

</html>