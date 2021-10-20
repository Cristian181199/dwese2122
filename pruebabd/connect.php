<?php

/**
 * Establece la conexion con PostgreSQL y en caso de fallar, devuelve el mensaje.
 * 
 * @param  string $host
 * @param  string $bd
 * @param  string $user
 * @param  string $password
 * @return PDO
 */
function connect_bd(string $host, string $bd, string $user, string $password): PDO
{
    try {
        return new PDO(
            "pgsql:host=$host;dbname=$bd",
            $user,
            $password,
            [PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION]
        );
    } catch (PDOException $e) {
        die($e->getMessage());
    }
}

return connect_bd('localhost', 'prueba', 'prueba', 'prueba');
