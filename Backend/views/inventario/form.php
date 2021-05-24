<?php

use controllers\InventarioController;
use models\inventario;

require_once dirname(__DIR__) . '/../utils/model_util.php';
require_once dirname(__DIR__) . '/../db/conexion_db.php';
require_once dirname(__DIR__) . '/../models/model.php';
require_once dirname(__DIR__) . '/../models/inventario.php';
require_once dirname(__DIR__) . '/../controllers/base_controller.php';
require_once dirname(__DIR__) . '/../controllers/inventario_controller.php';

$entradaController = new InventarioController();
$entrada = empty($_GET['id']) ? new Entrada() : $entradaController->detail($_GET['id']);
$titulo = empty($_GET['id']) ? 'Registrar inventario' : 'Modificar inventario';
?>

<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <title><?php echo $titulo; ?></title>
</head>

<body>
    <a href="index.php?page=objectos_inventario">Volver</a>
    <div>
        <h1><?php echo $titulo; ?></h1>
        <form action="index.php?page=objectos_inventario&view=save" method="POST">
            <?php
            if (!empty($_GET['id'])) {
                echo '<input name="id" id="id" type="hidden" value="' . $entrada->get('id') . '">';
            }
            ?>

            <div>
                <label>Nombre:</label>
                <input name="nombre" id="nombre" type="text" value="<?php echo $entrada->get('nombre'); ?>" required>
            </div>
            <div>
                <label>Descripción:</label>
                <input name="descripcion" id="descripcion" type="text" value="<?php echo $entrada->get('descripcion'); ?>" required>
            </div>
            <div>
                <button type="submit">Guardar</button>
            </div>
        </form>
    </div>
</body>

</html>