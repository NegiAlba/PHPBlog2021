<?php

    require 'config/dev.php';
// require 'config/autoloader.php';

use \App\src\Router;

$router = new Router();
$router->run();
