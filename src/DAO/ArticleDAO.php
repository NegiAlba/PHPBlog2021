<?php

namespace App\src\DAO;

use App\src\models\Article;

class ArticleDAO extends DAO
{
    //! PARTIE GESTION D'ARTICLES DANS LA BDD
    public function buildArticle($row)
    {
        return new Article($row);
    }

    public function getAllArticles()
    {
        $articles = [];
        $sql = 'SELECT * FROM article ORDER BY created_at DESC';
        $req = $this->createQuery($sql);
        $result = $req->fetchAll();
        // var_dump($result);

        foreach ($result as $row) {
            $id = $row['id'];
            $articles[$id] = $this->buildArticle($row);
        }

        return $articles;
    }

    public function getArticle($id)
    {
        $sql = 'SELECT * FROM article WHERE id = ?';
        $result = $this->createQuery($sql, [$id]);
        $article = $result->fetch();

        return $this->buildArticle($article);
    }

    public function createArticle($data)
    {
        // $values = implode(', ', array_values($data));
        $sql = 'INSERT INTO article (title, theme, content) VALUES (?,?,?)';
        $result = $this->createQuery($sql, [$data[0], $data[1], $data[2]]);
    }

    public function editArticle($data)
    {
        // $values = implode(', ', array_values($data));
        $sql = 'UPDATE article SET title = ?,theme = ?,content = ? WHERE id = ?';
        $result = $this->createQuery($sql, [$data[0], $data[1], $data[2], $data[3]]);
    }

    public function deleteArticle($data)
    {
        // $values = implode(', ', array_values($data));
        $sql = 'DELETE FROM article WHERE id = ?';
        $result = $this->createQuery($sql, [$data[0]]);
    }
}
