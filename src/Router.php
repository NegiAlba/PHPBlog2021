<?php

namespace App\src;

use App\src\controller\FrontController;
use Exception;

class Router
{
    private $frontController;

    public function __construct()
    {
        $this->frontController = new FrontController();
    }

    public function run()
    {
        try {
            $this->frontController->home();
        } catch (Exception $e) {
            echo 'Erreur : '.$e->getMessage();
        }
    }
}
