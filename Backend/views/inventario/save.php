<?php

use controllers\InventarioController;
use models\inventario;

require_once dirname(__DIR__) . '/../utils/model_util.php';
require_once dirname(__DIR__) . '/../db/conexion_db.php';
require_once dirname(__DIR__) . '/../models/model.php';
require_once dirname(__DIR__) . '/../models/inventario.php';
require_once dirname(__DIR__) . '/../controllers/base_controller.php';
require_once dirname(__DIR__) . '/../controllers/inventario_controller.php';

$inventarioController = new InventarioController();

$request = [
    'nombre' => $_POST['nombre'],
    'descripcion' => $_POST['descripcion'],
];

$estado = empty($_POST['id']) ? $inventarioController->create($request) : $inventarioController->update($_POST['id'], $request);
$url = 'index.php?page=objectos_inventario';
if ($estado != 'Registro actualizado' &&  !empty($_POST['id'])) {
    $url .= '&view=form&id=' . $_POST['id'];
}
?>

<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <title>Registro guardado</title>
</head>

<body>
    <div>
        <h1>Resultado de la operación</h1>
        <p>
            <?php echo $estado; ?>
        </p>
        <a href="<?php echo  $url; ?>">Volver</a>
    </div>
</body>

</html>