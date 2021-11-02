<?php session_start() ?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Borrar</title>
    <link rel="stylesheet" href="../comunes/style.css">
</head>
<body>
    <?php 
        include '../comunes/auxiliar.php';
        mostrar_navbar();

        if (!logueado()) {
            header('Location: /index.php');
            return;
        }

        $pdo = conectar();
        if (isset($_POST['id'])) {
            $id = filtrar_entrada('id');

            if (ctype_digit($id)) {
                
                $sent = $pdo->prepare('DELETE 
                                       FROM depart
                                       WHERE id = :id');
                if ($sent->execute([':id' => $id])
                    && $sent->rowCount() === 1) {
                    // Bien
                } else {
                    // Mal
                }
                header('Location: index.php');
                return;
            }

        } elseif (isset($_GET['id'])) {
            $id = filtrar_entrada('id', INPUT_GET);
            var_dump($id);
            $sent = $pdo->prepare('SELECT COUNT(*)
                                   FROM emple e LEFT JOIN depart d ON e.depart_id = d.id
                                   WHERE d.id = :id');
            $sent->execute([':id' => $id]);

            if ($sent->fetchColumn() > 0) {
            echo 'es diferente a 0, no se puede borrar';
            $sentprueba = $pdo->prepare('SELECT COUNT(*)
                        FROM emple e LEFT JOIN depart d ON e.depart_id = d.id
                        WHERE d.id = :id');
            $sentprueba->execute([':id' => $id]);
            var_dump($sentprueba->fetchColumn());
            $_SESSION['flash_delete'] = 'El departamento no se puede borrar por que tiene empleados asociados.';
            header('Location: index.php');
            }
        } else {
            header('Location: index.php');
            return;
        }

        
    ?>

    <h3>¿Seguro que desea borrar el departamento?</h3>
    <form action="" method="post">
        <input type="hidden" name="id" value="<?= $id ?>">
        <button type="submit">Si</button>
        <button><a href="index.php">No</a></button>
    </form>

    
</body>
</html>