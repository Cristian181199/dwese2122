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

function mostrar_errores(array $error): void
{
    foreach ($error as $err) : ?>
        <p>Error: <?= $err ?></p>
<?php
    endforeach;
}
