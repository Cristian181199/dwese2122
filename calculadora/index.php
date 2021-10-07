<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Prueba de recogida de datos</title>
</head>

<body>
    <h1>Prueba de recogida de datos</h1>

    <?php
    $error = [];

    function filtrar_numero($par, &$error)
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

    function filtrar_opciones($par, $opciones, &$error)
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

    function operar_switch($num1, $num2, $oper, &$error)
    {
        if (empty($error)) :

            switch ($_GET[$oper]) {
                case 'suma':
                    $res = $_GET[$num1] + $_GET[$num2];
                    break;

                case 'resta':
                    $res = $_GET[$num1] - $_GET[$num2];
                    break;

                case 'mult':
                    $res = $_GET[$num1] * $_GET[$num2];
                    break;

                case 'div':
                    $res = $_GET[$num1] / $_GET[$num2];
                    break;
            }
    ?>
            <p>El resultado es <?= $res ?></p>
        <?php endif;
    }

    function mostrar_errores($error)
    {
        foreach ($error as $err) : ?>
            <p>Error: <?= $err ?></p>
    <?php
        endforeach;
    }

    $x = filtrar_numero('x', $error);
    $y = filtrar_numero('y', $error);
    $oper = filtrar_opciones('oper', ['suma', 'resta', 'mult', 'div'], $error);

    mostrar_errores($error);
    operar_switch('x', 'y', 'oper', $error);
    ?>

    <a href="index.html">Volver</a>
</body>

</html>