<?php session_start() ?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login</title>
    <link rel="stylesheet" href="./comunes/style.css">
</head>

<body>

    <?php
    include './comunes/auxiliar.php';
    mostrar_navbar();

    $username = filtrar_entrada('username');
    $password = filtrar_entrada('password');
    var_dump($username);
    var_dump($password);

    $error = [];
    
    if ($username === '') {
        $error['username'] = 'El usuario es obligatorio.';
    }
    if ($password === '') {
        $error['password'] = 'La contrasena no puede estar vacia.';
    }
    var_dump($error);

    if (isset($username, $password)) {
        $pdo = conectar();

        $sent = $pdo->prepare('SELECT *
                                 FROM usuarios
                                WHERE username = :username');
        $sent->execute([':username' => $username]);
        $fila = $sent->fetch();

        if ($fila !== false && password_verify($password, $fila['password'])) {
            $_SESSION['login'] = [
                'id' => $fila['id'],
                'username' => $fila['username'],
            ];
            header('Location: index.php');
            return;
        } else {
            $error['login'] = 'Nombre de usuario o contrasena incorrectos.';
        }
    }

    if (isset($_SESSION['flash_register'])) {
        $mensaje = $_SESSION['flash_register'];
        unset($_SESSION['flash_register']);
        echo $mensaje;
    }

    ?>

    <h3>Inicia sesion</h3>
    <div>
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
                <button type="submit">Iniciar</button>
            </div>
        </form>
    </div>
    <?php mostrar_error($error, 'login') ?>
</body>

</html>