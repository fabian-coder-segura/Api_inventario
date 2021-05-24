<?php

$conf = 'api';

$fileHtml = $conf == 'api' ? '/API_INVENTARIO/Api_inventario/Backend/api.php' : '/API_INVENTARIO/Api_inventario/Backend/web.php';
require_once dirname(__DIR__) . $fileHtml;
