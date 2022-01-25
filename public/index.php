<?php

require_once __DIR__ . "/../configs/common.php";
require_once __DIR__ . "/../vendor/autoload.php";

use FoxTool\Yukon\Core\Starter;

$app = new Starter();
$app->run();
