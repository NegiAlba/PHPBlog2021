<?php

    require '../config/dev.php';

    require '../vendor/autoload.php';

use App\src\Router;

$router = new Router();
$router->run();
