<?php
require_once dirname(__DIR__) . '/utils/model_util.php';
require_once dirname(__DIR__) . '/db/conexion_db.php';
require_once dirname(__DIR__) . '/models/model.php';
require_once dirname(__DIR__) . '/controllers/base_controller.php';
require_once dirname(__DIR__) . '/api/parse_array_reponse.php';
require_once dirname(__DIR__) . '/api/response.php';

$uriRelativeApp =  '/API_INVENTARIO/Api_inventario/Backend/';

$uriClass = [
    "entradas" => [
        'model' => 'models/entrada.php',
        'controller' => 'controllers/entradas_controller.php'
    ],
    "objetos_inventario" => [
        'model' => 'models/inventario.php',
        'controller' => 'controllers/inventario_controller.php'
    ],
    "personas" => [
        'model' => 'models/persona.php',
        'controller' => 'controllers/personas_controller.php'
    ],
    "salidas" => [
        'model' => 'models/salida.php',
        'controller' => 'controllers/salidas_controller.php'
    ],
  
];

$controllers = [
    'controller' => 'controllers/entradas_controller.php',
    'controller' => 'controllers/inventario_controller.php',
    'controller' => 'controllers/personas_controller.php',
    'controller' => 'controllers/salidas_controller.php'
];


$getArrayUrlCurrent = function () {
    $urlData = str_replace($GLOBALS['uriRelativeApp'], '', $_SERVER['REQUEST_URI']);
    $urlArray  =  explode('/', $urlData);
    return  $urlArray;
};

