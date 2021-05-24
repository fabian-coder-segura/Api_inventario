<?php

$fileHtml = "";
if (!empty($_GET['page'])) {
    $view = !empty($_GET['view']) ? $_GET['view'] : 'list';
    $fileHtml = "/API_INVENTARIO/Api_inventario/Backend/views/$_GET[page]/$view.php";
} else {
    $fileHtml = '/API_INVENTARIO/Api_inventario/Backend/views/welcome.php';
}

require_once dirname(__DIR__) . $fileHtml;