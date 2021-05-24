<?php

use controllers\EntradaController;
use models\Entrada;

require_once dirname(__DIR__) . '/../utils/model_util.php';
require_once dirname(__DIR__) . '/../db/conexion_db.php';
require_once dirname(__DIR__) . '/../models/model.php';
require_once dirname(__DIR__) . '/../models/entrada.php';
require_once dirname(__DIR__) . '/../controllers/base_controller.php';
require_once dirname(__DIR__) . '/../controllers/entradas_controller.php';

$entradaController = new EntradaController();
$entrada = empty($_GET['id']) ? new Entrada() : $entradaController->detail($_GET['id']);
$titulo = empty($_GET['id']) ? 'Registrar entrada' : 'Modificar entrada';
?>

<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <title><?php echo $titulo; ?></title>
</head>

<body>
    <a href="index.php?page=entradas">Volver</a>
    <div>
        <h1><?php echo $titulo; ?></h1>
        <form action="index.php?page=entradas&view=save" method="POST">
            <?php
            if (!empty($_GET['id'])) {
                echo '<input name="id" id="id" type="hidden" value="' . $entrada->get('id') . '">';
            }
            ?>

            <div>
                <label>Fecha:</label>
                <input name="fecha" id="fecha" type="date" value="<?php echo $entrada->get('fecha'); ?>" required>
            </div>
            <div>
                <label>Cantidad:</label>
                <input name="cantidad" id="cantidad" type="number" value="<?php echo $entrada->get('cantidad'); ?>" required>
            </div>
            <div>
                <label>Persona:</label>
                <input name="persona_id" id="persona_id" type="text" value="<?php echo $entrada->get('persona_id'); ?>" required>
            </div>
            <div>
                <label>Edad:</label>
                <input name="edad" id="edad" type="number" value="<?php echo $entrada->get('edad'); ?>" required>
            </div>
            <div>
                <button type="submit">Guardar</button>
            </div>
        </form>
    </div>
</body>

</html>