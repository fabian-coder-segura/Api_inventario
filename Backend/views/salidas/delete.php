<?php

use controllers\SalidaController;

require_once dirname(__DIR__) . '/../utils/model_util.php';
require_once dirname(__DIR__) . '/../db/conexion_db.php';
require_once dirname(__DIR__) . '/../models/model.php';
require_once dirname(__DIR__) . '/../models/salida.php';
require_once dirname(__DIR__) . '/../controllers/base_controller.php';
require_once dirname(__DIR__) . '/../controllers/salidas_controller.php';

$salidaController = new SalidaController();
$estado = $salidaController->delete($_GET['id']);
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
        <a href="index.php?page=salidas">Volver</a>
    </div>
</body>

</html>