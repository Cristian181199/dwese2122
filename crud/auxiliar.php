<?php

function conectar()
{
    try {
        return new PDO(
            'pgsql:host=localhost;dbname=prueba',
            'prueba',
            'prueba',
            [PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION]
        );
    } catch (PDOException $ex) {
        echo 'Ha ocurrido un error con la base de datos: ' . $ex->getMessage();
    }
}

function mostrar_departamentos(array|false $departamentos): void
{
    foreach ($departamentos as $departamento) : ?>
        <tr>
            <td><?= $departamento['id'] ?></td>
            <td><?= $departamento['denominacion'] ?></td>
            <td><?= $departamento['localidad'] ?></td>
        </tr>
<?php endforeach;
}
