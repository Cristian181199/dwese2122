<?php session_start() ?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Home</title>
    <style>
        #navbar {
            display: flex;
            align-items: right;
            justify-content: right;
        }
    </style>
</head>

<body>
    <div id="navbar">
        <div>
            <button type="submit"><a href="register.php">Register</a></button>
            <button type="submit"><a href="login.php">Login</a></button>
        </div>
    </div>

    <hr>

    <h3>Registrate o inicia sesion para poder ver los departamentos y empleados.</h3>
</body>

</html>