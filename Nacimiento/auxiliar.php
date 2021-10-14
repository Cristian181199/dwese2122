<?php

function filtrar_nombre_apellido($par, &$error)
{
    $val = null;

    if (isset($_GET[$par])) {
        $val = trim($_GET[$par]);
        if ($val === '') {
            $error[] = "El parámetro $par es obligatorio.";
        } elseif (!is_string($val)) {
            $error[] = "El parámetro $par no es correcto.";
        }
    }

    return $val;
}

function filtrar_fecha($par, &$error)
{
    $val = null;

    if (isset($_GET[$par])) {
        $val = trim($_GET[$par]);
        if ($val === '') {
            $error[] = "El parámetro $par es obligatorio.";
        } else {
            $fecha = explode('-', $val);
            if (count($fecha) == 3) {
                [$a, $m, $d] = $fecha;
            }
            if (!isset($a, $m, $d) || !checkdate($m, $d, $a)) {
                $error[] = "El parámetro $par contiene una fecha incorrecta";
            }
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

function calcular($par)
{
    $fecha_actual = new DateTime();

    $val = $fecha_actual->diff(new DateTime($par))->y;

    return $val;
}
