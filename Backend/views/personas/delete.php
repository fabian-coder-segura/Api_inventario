<?php

use controllers\PersonaController;

require_once dirname(__DIR__) . '/../utils/model_util.php';
require_once dirname(__DIR__) . '/../db/conexion_db.php';
require_once dirname(__DIR__) . '/../models/model.php';
require_once dirname(__DIR__) . '/../models/persona.php';
require_once dirname(__DIR__) . '/../controllers/base_controller.php';
require_once dirname(__DIR__) . '/../controllers/personas_controller.php';

$personaController = new PersonaController();
$estado = $personaController->delete($_GET['id']);
?>


<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <title>Eliminar registro de inventario</title>
</head>

<body>
    <div>
        <h1>Resultado de la operación</h1>
        <p>
            <?php echo $estado; ?>
        </p>
        <a href="index.php?page=personas">Volver</a>
    </div>
</body>

</html>