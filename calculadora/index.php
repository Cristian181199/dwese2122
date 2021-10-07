<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Calculadora</title>
</head>
<body>
    <?php require 'auxiliar.php'; ?>
    <form action="calcular.php" method="GET">
        <div>
            <label for="op1">Primer operando:</label>
            <input id="op1" type="number" name="x" size="10">
        </div>
        <div>
            <label for="op2">Segundo operando:</label>
            <input id="op2" type="number" name="y" size="10">
        </div>
        <div>
            <label for="op">Operación:</label>
            <select name="oper" id="op">
                <?php foreach (OPER as $oper):?>
                    <option value="<?= $oper ?>"><?= $oper ?></option>
                <?php endforeach ?>
            </select>
        </div>
        <div>
            <button type="submit">Operar</button>
        </div>
    </form>
</body>
</html>