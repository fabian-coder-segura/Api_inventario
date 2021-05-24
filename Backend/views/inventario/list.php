<?php
require_once dirname(__DIR__) . '/../utils/model_util.php';
require_once dirname(__DIR__) . '/../db/conexion_db.php';
require_once dirname(__DIR__) . '/../models/model.php';
require_once dirname(__DIR__) . '/../models/inventario.php';
require_once dirname(__DIR__) . '/../controllers/base_controller.php';
require_once dirname(__DIR__) . '/../controllers/inventario_controller.php';

use controllers\InventarioController;

$inventarioController = new InventarioController();
?>
<!doctype HTML>
<html>

<head>
    <title>entradas</title>
</head>

<body>
    <h1>Listado de inventario</h1>
    <a href="index.php?page=objecto_inventario&view=form">Registrar</a>
    <table>
        <thead>
            <tr>
                <th>Id</th>
                <th>Nombre</th>
                <th>Descripción</th>
            </tr>
        </thead>
        <tbody>
            <?php
            $rows = $inventarioController->index();
            foreach ($rows as $row) {
                echo '<tr>';
                echo '  <td>', $row->get('id'), '</td>';
                echo '  <td>', $row->get('nombre'), '</td>';
                echo '  <td>', $row->get('descripcion'), '</td>';
            ?>
                <td>
                    <a href="index.php?page=objectos_inventario&view=delete&id=<?php echo $row->get('id'); ?>">Eliminar</a>
                    <a href="index.php?page=objectos_inventario&view=form&id=<?php echo $row->get('id'); ?>">Actualizar</a>
                    <button onclick="ver(<?php echo $row->get('id'); ?>)">Ver detalle</button>
                </td>
            <?php
                echo '</tr>';
            }
            ?>
        </tbody>
    </table>
    <select name="objectos_inventario" id="objectos_inventario">
        <?php
        $rows = $inventarioController->index();
        foreach ($rows as $row) {
            echo '<option value="' . $row->get('id') . '">' . $row->get('nombres') . '</option>';
        }
        ?>
    </select>
</body>

</html>