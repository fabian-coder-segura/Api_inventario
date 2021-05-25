<?php

require_once dirname(__DIR__) . '/utils/model_util.php';
require_once dirname(__DIR__) . '/db/conexion_db.php';
require_once  dirname(__DIR__) . '/models/model.php';
require_once dirname(__DIR__) . '/models/persona.php';
require_once dirname(__DIR__) . '/controllers/base_controller.php';
require_once dirname(__DIR__) . '/controllers/persona_controller.php';

use controllers\PersonaController;


$personaController = new PersonaController();
$persona =  $personaController->index();
foreach ($persona as $item) {
    echo  $item->get('id'), ' ', $item->get('nombres'), '<br/>';
}


$status = $personaController->update(29, [
    'id' => 'Test',
    'apellidos' => 'Test 2',
    'edad' => 30,
    'codigo' => '9999'
]);

echo '<br>', $status, '<br>';

$status = $personaController->delete(29);

echo '<br>', $status, '<br>';
