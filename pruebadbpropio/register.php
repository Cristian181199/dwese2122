<?php session_start() ?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Register</title>
    <link rel="stylesheet" href="/comunes/style.css">
</head>
<body>
    <?php
    include './comunes/auxiliar.php';

    mostrar_navbar();

    $username = filtrar_entrada('username');
    $password = filtrar_entrada('password');
    $repassword = filtrar_entrada('repassword');
    var_dump($username);
    var_dump($password);
    var_dump($repassword);

    $error = [];

    if ($username === '') {
        $error['username'] = 'El usuario es obligatorio.';
    }
    if ($password === '') {
        $error['password'] = 'La contrasena no puede estar vacia.';
    }
    if ($repassword === '') {
        $error['repassword'] = 'La contrasena no puede estar vacia.';
    }
    if ($password !== $repassword) {
        $error['repassword'] = 'La contrasena no coincide.';
    }
    var_dump($error);

    if (isset($username, $password, $repassword) && empty($error)) {
        echo 'ha entrao';
        $pdo = conectar();

        $sent = $pdo->prepare('SELECT *
                                 FROM usuarios
                                WHERE username = :username');
        $sent->execute([':username' => $username]);
        if ($sent->rowCount() === 0) {
            // el usuario no existe
            echo 'el usuario no existe';
            // lo metemos en la base de datos
        } else {
            //error, el nombre de usuario ya existe
            $error['username'] = 'El nombre de usuario no esta disponible.';
            echo 'el usuario ya existe';
        }
    }

    ?>
    <h3>Registrate</h3>
    <form action="" method="post">
        <div>
            <label for="username">Nombre de usuario: </label>
            <input type="text" name="username" id="username" value="<?=$username?>">
            <?php mostrar_error($error, 'username') ?>
        </div>
        <div>
            <label for="password">Contrasena: </label>
            <input type="password" name="password" id="password">
            <?php mostrar_error($error, 'password') ?>
        </div>
        <div>
            <label for="repassword">Vuelve a introducir la contrasena: </label>
            <input type="repassword" name="repassword" id="repassword">
            <?php mostrar_error($error, 'repassword') ?>
        </div>
        <div>
            <button type="submit">Registrar</button>
        </div>
    </form>
</body>
</html>