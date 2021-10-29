<?php

function conectar()
{
    return new PDO(
        'pgsql:host=localhost;dbname=prueba',
        'prueba',
        'prueba'
    );
}

function logueado()
{
    return $_SESSION['login'] ?? false;
}

function mostrar_navbar()
{ ?>
        <?php if ($login = logueado()): ?>

        <div id="navbar">
            <div>
                <?= $login['username'] ?>
                <button type="submit"><a href="index.php">Home</a></button>
                <button type="submit"><a href="logout.php">Logout</a></button>

            </div>
        </div>

        <hr>

        <h3>Buenas <?= $login['username'] ?> Todo bien?</h3>

        <?php else : ?>
        <div id="navbar">
            <div>
                <button type="submit"><a href="index.php">Home</a></button>
                <button type="submit"><a href="register.php">Register</a></button>
                <button type="submit"><a href="login.php">Login</a></button>
            </div>
        </div>

        <hr>

        <h3>Registrate o inicia sesion para poder ver los departamentos y empleados.</h3>

        <?php endif ?>
    <?php
}

function filtrar_entrada(string $param, string $metodo = INPUT_POST)
{
    return filter_input($metodo, $param, FILTER_CALLBACK,
                        ['options' => 'trim']);
}

function mostrar_error(array $error, string $par)
{   
    if (isset($error[$par])) { ?>
        <span id="error"><?= $error[$par]?></span><?php    
    }
}

function hh($cadena)
{
    return htmlspecialchars($cadena, ENT_QUOTES | ENT_SUBSTITUTE);
}