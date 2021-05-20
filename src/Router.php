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
            // $url = explode('/', filter_var($_SERVER['REQUEST_URI'], FILTER_SANITIZE_URL));
            // $ctrlFunction = $url[3];

            if (isset($_GET['path'])) {
                $url = explode('/', filter_var($_GET['path'], FILTER_SANITIZE_URL));
                $ctrlFunction = $url[0];
                // var_dump($url);
                if (method_exists($this->frontController, $ctrlFunction)) {
                    $params = null;
                    if (isset($url[1])) {
                        $params = $url[1];
                        var_dump($params);
                    }
                    $this->frontController->{$ctrlFunction}($params);
                } else {
                    echo 'La page à laquelle vous souhaiter accéder n\'existe pas';
                    $this->frontController->home();
                }
            } else {
                // var_dump($url);
                $this->frontController->home();
            }
        } catch (Exception $e) {
            echo 'Erreur : '.$e->getMessage();
        }
    }
}
