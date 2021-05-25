<?php

$conf = 'api';

$fileHtml = $conf == 'api' ? '/Backend/api.php' : '/Backend/web.php';
require_once dirname(__DIR__) . $fileHtml;
