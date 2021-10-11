<?php

const OPER = ['+', '-', '*', '/'];

/**
 * Filtra un parametro recibido mediante GET, lo trimea y
 * comprueba si es un numero (en caso contrario devuelve null).
 * 
 * Actualiza el array de errores en caso necesario.
 *
 * @param  string           $par    El nombre del parametro
 * @param  array            $error  El array de errores
 * @return string|null              El valor del parametro o null si no es
 *                                  un numero
 */
function filtrar_numero(string $par, array &$error): ?string
{
    $val = null;

    if (isset($_GET[$par])) {
        $val = trim($_GET[$par]);
        if ($val === '') {
            $error[] = "El parámetro $par es obligatorio.";
        } elseif (!is_numeric($val)) {
            $error[] = "El parámetro $par no es correcto.";
        }
    }

    return $val;
}

/**
 * Filtra un parametro recibido mediante GET, lo trimea y
 * comprueba si es un string (en caso contrario devuelve null).
 * 
 * Actualiza el array de errores en caso necesario.
 *
 * @param  string           $par        El nombre del parametro
 * @param array             $opciones   El array de opciones
 * @param  array            $error      El array de errores
 * @return string|null                  El valor del parametro o null si no es
 *                                      un string
 */
function filtrar_opciones(
    string $par, 
    array $opciones, 
    array &$error
): ?string
{

    $val = null;

    if (isset($_GET[$par])) {
        $val = trim($_GET[$par]);
        if (!in_array($val, $opciones)) {
            $error[] = "El parámetro $par no es correcto.";
        }
    }

    return $val;
}


/**
 * Muestra los errores que tiene el array $error.
 *
 * @param  mixed    $error  El array de errores
 * @return void             No devuelve nada, provoca efecto lateral ya que 
 *                          muestra los errores
 */
function mostrar_errores(array $error): void
{
    foreach ($error as $err): ?>
        <p>Error: <?= $err ?></p>
    <?php
    endforeach;
}

/**
 * Calcula la operacion que le llega de $oper con los numeros $x y $y
 *
 * @param  int|float|string    $x       Parametro que indica el primer numero
 * @param  int|float|string    $y       Parametro que indica el segundo numero
 * @param  int|float|string    $oper    Parametro que indica la operacion a realizar
 * @return int|float|null               El valor del parametro o null si no es int o float
 */
function calcular(
    int|float|string $x, 
    int|float|string $y, 
    string $oper
): int|float|null
{
    switch ($oper) {
        case '+': 
            $res = $x + $y; 
            break;

        case '-':
            $res = $x - $y;
            break;

        case '*':
            $res = $x * $y;
            break;

        case '/':
            $res = $x / $y;
            break;

        default:
            $res = null;
            break;
    }

    return $res;
}