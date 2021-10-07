<?php

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
            if (!is_numeric($val)) {
                $error[] = "El parámetro $par no es correcto.";
            }
        } else {
            $error[] = "Falta el parámetro $par.";
        }

        return $val;
    }
    
    

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
        } else {
            $error[] = "Falta el parámetro $par.";
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

    function calcular(
        int|float|string $x, 
        int|float|string $y,   
        string $oper
    ): int|float|null
    {
        switch ($oper) {
            case 'suma':
                $res = $x + $y;
                break;

            case 'resta':
                $res = $x - $y;
                break;

            case 'mult':
                $res = $x * $y;
                break;

            case 'div':
                $res = $x / $y;
                break;

            default:
                $res = null;
                break;
        }

        return $res;
    }