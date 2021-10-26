<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Nacimiento</title>
</head>

<body>
    <?php require 'auxiliar.php';
    $error = [];

    $nombre = filtrar_nombre_apellido('nombre', $error);
    $apellidos = filtrar_nombre_apellido('apellidos', $error);
    $fecha = filtrar_fecha('fecha', $error);
    ?>
    <div>
        <form action="" method="get">
            <div>
                <label for="name">Nombre</label>
                <input id="name" type="text" name="nombre" value="<?= $nombre ?>">
            </div>
            <div>
                <label for="ape">Apellidos</label>
                <input id="ape" type="text" name="apellidos" value="<?= $apellidos ?>">
            </div>
            <div>
                <label for="date">Fecha de nacimiento</label>
                <input id="date" type="date" name="fecha" value="<?= $fecha ?>">
            </div>
            <div>
                <button type="submit">Enviar</button>
            </div>
        </form>

        <?php
        mostrar_errores($error);

        if (empty($error)) : ?>
            <p>La edad es: <?= calcular($fecha) ?></p>
        <?php endif ?>

    </div>
</body>

</html>