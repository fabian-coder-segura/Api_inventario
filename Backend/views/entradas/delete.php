<?php

use controllers\EntradaController;

require_once dirname(__DIR__) . '/../utils/model_util.php';
require_once dirname(__DIR__) . '/../db/conexion_db.php';
require_once dirname(__DIR__) . '/../models/model.php';
require_once dirname(__DIR__) . '/../models/entrada.php';
require_once dirname(__DIR__) . '/../controllers/base_controller.php';
require_once dirname(__DIR__) . '/../controllers/entradas_controller.php';

$entradaController = new EntradaController();
$estado = $entradaController->delete($_GET['id']);
?>


<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <title>Eliminar registro entrada</title>
</head>

<body>
    <div>
        <h1>Resultado de la operación</h1>
        <p>
            <?php echo $estado; ?>
        </p>
        <a href="index.php?page=entradas">Volver</a>
    </div>
</body>

</html>