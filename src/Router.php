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
                //* site.com/cettepartie
                //* $_GET['path'] vire la partie site.com => /cettepartie
                $url = explode('/', filter_var($_GET['path'], FILTER_SANITIZE_URL));
                $ctrlFunction = $url[0];
                // var_dump($url);
                //* Est-ce que tu possède une fonction cettepartie ? Si oui alors execute la fonction, sinon alors renvoie une erreur
                if (method_exists($this->frontController, $ctrlFunction)) {
                    //* /cettepartie/machinchouette
                    //* Tu n'as pas de paramètres $params = null;
                    $params = null;
                    if (isset($url[1])) {
                        //* Si jamais /machinchouette est effectivement machinchouette
                        //* machinchouette est probablement un paramètre.
                        $params = $url[1];
                        // var_dump($params);
                    }
                    //* Execute la fonction, et s'il y a des paramètres, insère -les dans la fonction, sinon execute la fonction mais sans paramètres.
                    //* /cettepartie/machinchouette

                    //* /article/1
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
