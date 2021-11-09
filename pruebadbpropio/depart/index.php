<?php session_start() ?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Departamentos</title>
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


        $pdo = conectar();
        $sent = $pdo->prepare("SELECT COUNT(*) FROM depart");
        $sent->execute();
        $count = $sent->fetchColumn();
        $sent = $pdo->prepare('SELECT *
                                 FROM depart');
        $sent->execute();

    ?>
    <h3>Departamentos</h3>

    <table border="1">
        <thead>
            <th>Denominacion</th>
            <th>Localidad</th>
            <th>Acciones</th>
        </thead>
        <tbody>
            <?php foreach ($sent as $fila) : ?>
                <tr>
                    <td><?= hh($fila['denominacion']) ?></td>
                    <td><?= hh($fila['localidad']) ?></td>
                    <td>
                        <form action="borrar.php" method="GET">
                            <input type="hidden" name="id" value="<?= $fila['id'] ?>">
                            <button type="submit">Borrar</button>
                        </form>

                        <form action="modificar.php">
                            <input type="hidden" name="id" value="<?= $fila['id'] ?>">
                            <button type="submit">Modificar</button>
                        </form>

                    </td>
                </tr>
            <?php endforeach ?>
        </tbody>
        <tfoot>
            <td colspan="3">
                Total de filas: <?= $count ?>
            </td>
        </tfoot>
    </table>

    <div>
        <button><a href="insertar.php">Insertar un nuevo departamento</a></button>
    </div>

    <?php
        if (isset($_SESSION['flash_delete'])) {
            $mensaje = $_SESSION['flash_delete'];
            unset($_SESSION['flash_delete']); ?>
            <p id="error"> <?= $mensaje ?></p> <?php
        }
    ?>

</body>
</html>