<?php

function filtrar_nombre_apellido ($par, &$error) {
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

function filtrar_fecha ($par, &$error) {
    $val = null;

    if (isset($_GET[$par])) {
        $val = trim($_GET[$par]);
        if ($val === '') {
            $error[] = "El parámetro $par es obligatorio.";
        } else {
            $fecha = explode("-", $par);
            var_dump($fecha);
            //$ano = $fecha[0];
            //$mes = $fecha[1];
            //$dia = $fecha[2];
        }
    }

    return $val;
}

function mostrar_errores(array $error): void
{
    foreach ($error as $err): ?>
        <p>Error: <?= $err ?></p>
    <?php
    endforeach;
}

function calcular ($par) {
    $fecha_actual = new DateTime();

    var_dump($par);

    //$ano_actual= $fecha_actual->format("Y");

    //return $ano_actual - $ano_nacimiento;

}