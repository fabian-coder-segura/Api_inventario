<?php

use controllers\PersonaController;
use models\inventario;

require_once dirname(__DIR__) . '/../utils/model_util.php';
require_once dirname(__DIR__) . '/../db/conexion_db.php';
require_once dirname(__DIR__) . '/../models/model.php';
require_once dirname(__DIR__) . '/../models/persona.php';
require_once dirname(__DIR__) . '/../controllers/base_controller.php';
require_once dirname(__DIR__) . '/../controllers/personas_controller.php';

$personaController = new PersonaController();
$persona = empty($_GET['id']) ? new Entrada() : $personaController->detail($_GET['id']);
$titulo = empty($_GET['id']) ? 'Registrar persona' : 'Modificar persona';
?>

<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <title><?php echo $titulo; ?></title>
</head>

<body>
    <a href="index.php?page=personas">Volver</a>
    <div>
        <h1><?php echo $titulo; ?></h1>
        <form action="index.php?page=personas&view=save" method="POST">
            <?php
            if (!empty($_GET['id'])) {
                echo '<input name="id" id="id" type="hidden" value="' . $persona->get('id') . '">';
            }
            ?>
              <div>
                <label>Tipo de Identidicación:</label>
                <input name="tipo_identifacion" id="tipo_identifacion" type="text" value="<?php echo $persona->get('tipo_identifacion'); ?>" required>
            </div>
            <div>
                <label>Numero de Identidicación:</label>
                <input name="numero_identificacion" id="numero_identificacion" type="text" value="<?php echo $persona->get('numero_identificacion'); ?>" required>
            </div>
            <div>
                <label>Nombres:</label>
                <input name="nombres" id="nombres" type="text" value="<?php echo $persona->get('nombres'); ?>" required>
            </div>
            <div>
                <button type="submit">Guardar</button>
            </div>
        </form>
    </div>
</body>

</html>