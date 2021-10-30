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

        <div id="navbarlogin">
            <div>
                <button type="submit"><a href="/emple/index.php">Empleados</a></button>
                <button type="submit"><a href="/depart/index.php">Departamentos</a></button>
            </div>
            <div>
                <?= $login['username'] ?>
                <button type="submit"><a href="index.php">Home</a></button>
                <button type="submit"><a href="logout.php">Logout</a></button>
            </div>
        </div>

        <hr>
        
        <?php else : ?>
        <div id="navbarlogout">
            <div>
                <button type="submit"><a href="index.php">Home</a></button>
                <button type="submit"><a href="register.php">Register</a></button>
                <button type="submit"><a href="login.php">Login</a></button>
            </div>
        </div>

        <hr>

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