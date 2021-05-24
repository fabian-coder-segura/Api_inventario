<?php
require_once dirname(__DIR__) . '/../utils/model_util.php';
require_once dirname(__DIR__) . '/../db/conexion_db.php';
require_once dirname(__DIR__) . '/../models/model.php';
require_once dirname(__DIR__) . '/../models/persona.php';
require_once dirname(__DIR__) . '/../controllers/base_controller.php';
require_once dirname(__DIR__) . '/../controllers/personas_controller.php';

use controllers\PersonaController;

$personaController = new PersonaController();
?>
<!doctype HTML>
<html>

<head>
    <title>entradas</title>
</head>

<body>
    <h1>Listado de inventario</h1>
    <a href="index.php?page=personas&view=form">Registrar</a>
    <table>
        <thead>
            <tr>
                <th>Id</th>
                <th>Tipo de Identidicación</th>
                <th>Numero de Identidicación</th>
                <th>Nombres</th>
            </tr>
        </thead>
        <tbody>
            <?php
            $rows = $personaController->index();
            foreach ($rows as $row) {
                echo '<tr>';
                echo '  <td>', $row->get('id'), '</td>';
                echo '  <td>', $row->get('tipo_identificacion'), '</td>';
                echo '  <td>', $row->get('numero_identificacion'), '</td>';
                echo '  <td>', $row->get('nombre'), '</td>';
            ?>
                <td>
                    <a href="index.php?page=personas&view=delete&id=<?php echo $row->get('id'); ?>">Eliminar</a>
                    <a href="index.php?page=personas&view=form&id=<?php echo $row->get('id'); ?>">Actualizar</a>
                    <button onclick="ver(<?php echo $row->get('id'); ?>)">Ver detalle</button>
                </td>
            <?php
                echo '</tr>';
            }
            ?>
        </tbody>
    </table>
    <select name="personas" id="personas">
        <?php
        $rows = $personaController->index();
        foreach ($rows as $row) {
            echo '<option value="' . $row->get('id') . '">' . $row->get('nombres') . '</option>';
        }
        ?>
    </select>
</body>

</html>