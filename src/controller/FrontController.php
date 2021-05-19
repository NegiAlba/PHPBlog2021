<?php

namespace App\src\controller;

use App\src\DAO\ArticleDAO;

class FrontController
{
    public function home()
    {
        $articleDAO = new ArticleDAO();
        $articles = $articleDAO->getAllArticles();

        require '../templates/home.php';
    }
}
