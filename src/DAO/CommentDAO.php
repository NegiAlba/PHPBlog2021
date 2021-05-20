<?php

namespace App\src\DAO;

use App\src\models\Comment;

class CommentDAO extends DAO
{
    public function getAllComments()
    {
        $sql = 'SELECT * FROM comment ORDER BY created_at DESC';
        $comments = [];
        $result = $this->createQuery($sql)->fetchAll();
        foreach($result as $row){
            $id = $row['id'];
            $comments[$id] = $this->buildComment($row);
        }
    }

    public function getCommentsFromArticle($articleId)
    {
        $sql = 'SELECT * FROM comment WHERE id_article = ? ORDER BY created_at DESC';
        $result = $this->createQuery($sql, [$articleId])->fetchAll(\PDO::FETCH_ASSOC);
        $comments = [];
        foreach ($result as $row) {
            $commentId = $row['id'];
            $comments[$commentId] = $this->buildComment($row);
        }

        return $comments;
    }

    private function buildComment($row)
    {
        return new Comment($row);
    }
}
