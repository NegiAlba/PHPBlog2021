<?php

namespace App\src\DAO;

use App\src\models\Article;
use PDO;
use PDOException;

class ArticleManager
{
    //! PARTIE CONNEXION A LA BDD
    private $db;

    public function __construct()
    {
        $this->getDb();
    }

    public function setDb()
    {
        try {
            $this->db = new \PDO(DB_HOST, DB_USER, DB_PASS);
            $this->db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

            return $this->db;
        } catch (PDOException $e) {
            echo 'Erreur : '.$e->getMessage();
        }
    }

    public function getDb()
    {
        if (null === $this->db) {
            return $this->setDb();
        }

        return $this->db;
    }

    //! PARTIE GESTION D'ARTICLES DANS LA BDD
    public function buildArticle($row)
    {
        return new Article($row);
    }

    public function getAllArticles()
    {
        $articles = [];

        $req = $this->db->prepare('SELECT * FROM article ORDER BY created_at DESC');
        $req->execute();
        $result = $req->fetchAll();

        foreach ($result as $row) {
            $id = $row['id'];
            $articles[$id] = $this->buildArticle($row);
        }

        return $articles;
    }
}
