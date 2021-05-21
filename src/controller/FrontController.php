<?php

namespace App\src\controller;

use App\src\DAO\ArticleDAO;
use App\src\DAO\CommentDAO;

class FrontController
{
    private $articleDAO;
    private $commentDAO;

    public function __construct()
    {
        $this->articleDAO = new ArticleDAO();
        $this->commentDAO = new CommentDAO();
    }

    public function home()
    {
        $articles = $this->articleDAO->getAllArticles();

        // var_dump($articles);

        require '../templates/home.php';
    }

    public function contact()
    {
        require '../templates/contact.php';
    }

    public function edit($id)
    {
        if (!empty($id)) {
            $article = $this->articleDAO->getArticle($id);
            if (isset($_POST['form_submit'])) {
                if (!empty($_POST['title']) && !empty($_POST['theme']) && !empty($_POST['content'])) {
                    $title = htmlspecialchars($_POST['title']);
                    $theme = htmlspecialchars($_POST['theme']);
                    $content = htmlspecialchars($_POST['content']);
                    $data = [$title, $theme, $content, $id];
                    $this->articleDAO->editArticle($data);

                    return header('Location:/phpblog2021/');
                }
            }
        }

        require '../templates/form.php';
    }

    public function create()
    {
        // var_dump($_POST);
        if (isset($_POST['form_submit'])) {
            if (!empty($_POST['title']) && !empty($_POST['theme']) && !empty($_POST['content'])) {
                $title = htmlspecialchars($_POST['title']);
                $theme = htmlspecialchars($_POST['theme']);
                $content = htmlspecialchars($_POST['content']);
                $data = [$title, $theme, $content];
                $this->articleDAO->createArticle($data);

                return header('Location:/phpblog2021/');
            }
        }

        require '../templates/form.php';
    }

    public function post($id)
    {
        if (isset($_POST['comment_submit'])) {
            if (!empty($_POST['author']) && !empty($_POST['content'])) {
                $author = htmlspecialchars($_POST['author']);
                $content = htmlspecialchars($_POST['content']);
                $data = [$author, $content, $id];
                $this->commentDAO->createComment($data);
            }
        }
        if (isset($_POST['comment_delete'])) {
            $data = [$_POST['comment_id']];
            $this->commentDAO->deleteComment($data);
        }

        $article = $this->articleDAO->getArticle($id);
        $comments = $this->commentDAO->getCommentsFromArticle($id);

        require '../templates/post.php';
    }

    public function delete($id)
    {
        $this->articleDAO->deleteArticle($id);

        return header('Location:/phpblog2021/');
    }
}
