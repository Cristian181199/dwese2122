<?php

function conectar(): \PDO
{
    try {
        return new PDO(
            'pgsql:host=localhost;dbname=prueba',
            'prueba',
            'prueba',
            [PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION]
        );
    } catch (PDOException $e) {
        echo 'Fallo al conectar con la base de datos: ' . $e->getMessage();
    }
}

function find_depart(\PDO $pdo, string $keyword): array
{
    $pattern = '%' . $keyword . '%';

    $sql = 'SELECT id, nombre, localidad
            FROM emple e LEFT JOIN depart d ON e.depart_id = d.id
            WHERE nombre ILIKE :pattern';

    $statement = $pdo->prepare($sql);
    $statement->execute([':pattern' => $pattern]);

    return $statement->fetchAll(PDO::FETCH_ASSOC);
}

function filtrar_nombre_post(string $par, array &$error): ?string
{
    $val = null;

    if (isset($_POST[$par])) {
        $val = trim($_POST[$par]);
        if ($val === '') {
            $error[] = "El parámetro $par es obligatorio.";
        } elseif (!is_string($val)) {
            $error[] = "El parámetro $par no es correcto.";
        }
    }

    return $val;
}

function filtrar_fecha_post($par, &$error)
{
    $val = null;

    if (isset($_POST[$par])) {
        $val = trim($_POST[$par]);
        $fecha = explode('-', $val);
        if (count($fecha) == 3) {
            [$a, $m, $d] = $fecha;
        }
        if (!isset($a, $m, $d) || !checkdate($m, $d, $a)) {
            $error[] = "El parámetro $par contiene una fecha incorrecta";
        }
    }


    return $val;
}

function filtrar_salario_post(string $par, array &$error)
{
    $val = null;

    if (isset($_POST[$par])) {
        $val = trim($_POST[$par]);

        if (!is_numeric($val)) {
            $error[] = "El parámetro $par no es correcto.";
        }
    }
    return $val;
}

function filtrar_trim($nombre, $metodo = INPUT_POST)
{
    return filter_input(
        $metodo,
        $nombre,
        FILTER_CALLBACK,
        ['options' => 'trim']
    );
}

function mostrar_error($error, $par)
{
    if (isset($error[$par])) { ?>
        <span style="color: red"><?= $error[$par] ?></span><?php
                                                        }
                                                    }

                                                    function mostrar_formulario(array $params, $error)
                                                    {
                                                        extract($params);
                                                            ?>
    <div>
        <form action="" method="POST">
            <div>
                <label for="nombre">Nombre:</label>
                <input id="nombre" name="nombre" type="text" value="<?= $nombre ?>">
                <?php mostrar_error($error, 'nombre') ?>
            </div>
            <div>
                <label for="fecha_alt">Fecha de alta:</label>
                <input id="fecha_alt" name="fecha_alt" type="text" value="<?= $fecha_alt ?>">
                <?php mostrar_error($error, 'fecha_alt') ?>
            </div>
            <div>
                <label for="salario">Salario:</label>
                <input id="salario" name="salario" type="text" value="<?= $salario ?>">
                <?php mostrar_error($error, 'salario') ?>
            </div>
            <div>
                <label for="depart_id">Departamento:</label>
                <input id="depart_id" name="depart_id" type="text" value="<?= $depart_id ?>">
                <?php mostrar_error($error, 'depart_id') ?>
            </div>
            <div>
                <button type="submit">Insertar</button>
                <button><a href="index.php">Volver</a></button>
            </div>
        </form>
    </div><?php
                                                    }
