<?php
require_once dirname(__DIR__) . '/../utils/model_util.php';
require_once dirname(__DIR__) . '/../db/conexion_db.php';
require_once dirname(__DIR__) . '/../models/model.php';
require_once dirname(__DIR__) . '/../models/entrada.php';
require_once dirname(__DIR__) . '/../controllers/base_controller.php';
require_once dirname(__DIR__) . '/../controllers/entradas_controller.php';

use controllers\EntradaController;

$entradaController = new EntradaController();
?>
<!doctype HTML>
<html>

<head>
    <title>entradas</title>
</head>

<body>
    <h1>Listado de entradas</h1>
    <a href="index.php?page=entradas&view=form">Registrar</a>
    <table>
        <thead>
            <tr>
                <th>Id</th>
                <th>Fecha</th>
                <th>Cantidad</th>
                <th>Persona</th>
                <th>Objeto</th>
            </tr>
        </thead>
        <tbody>
            <?php
            $rows = $entradaController->index();
            foreach ($rows as $row) {
                echo '<tr>';
                echo '  <td>', $row->get('id'), '</td>';
                echo '  <td>', $row->get('fecha'), '</td>';
                echo '  <td>', $row->get('cantidad'), '</td>';
                echo '  <td>', $row->get('persona_id'), '</td>';
                echo '  <td>', $row->get('objecto_inventario_id'), '</td>';
            ?>
                <td>
                    <a href="index.php?page=entradas&view=delete&id=<?php echo $row->get('id'); ?>">Eliminar</a>
                    <a href="index.php?page=entradas&view=form&id=<?php echo $row->get('id'); ?>">Actualizar</a>
                    <button onclick="ver(<?php echo $row->get('id'); ?>)">Ver detalle</button>
                </td>
            <?php
                echo '</tr>';
            }
            ?>
        </tbody>
    </table>
    <select name="entradas" id="entradas">
        <?php
        $rows = $entradaController->index();
        foreach ($rows as $row) {
            echo '<option value="' . $row->get('id') . '">' . $row->get('nombres') . '</option>';
        }
        ?>
    </select>
</body>

</html>