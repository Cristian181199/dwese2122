<?php

function conectar(): \PDO
{
    try {
        return new PDO(
            'pgsql:host=localhost;dbname=prueba',
            'prueba',
            'prueba',
            [PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION]
        );
    } catch (PDOException $e) {
        echo 'Fallo al conectar con la base de datos: ' . $e->getMessage();
    }
}

function find_depart(\PDO $pdo, string $keyword): array
{
    $pattern = '%' . $keyword . '%';

    $sql = 'SELECT id, nombre, localidad
            FROM emple e LEFT JOIN depart d ON e.depart_id = d.id
            WHERE nombre ILIKE :pattern';

    $statement = $pdo->prepare($sql);
    $statement->execute([':pattern' => $pattern]);

    return $statement->fetchAll(PDO::FETCH_ASSOC);
}