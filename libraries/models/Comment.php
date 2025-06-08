<?php
namespace Models;
require_once 'libraries/models/Model.php';
class Comment extends Model
{
protected $table='comments';
    public function findAllWithArticle(int $article_id)
    {
      
        $query = $this->pdo->prepare("SELECT * FROM comments WHERE article_id = :article_id");
        $query->execute(['article_id' => $article_id]);
        $commentaires = $query->fetchAll();
        return  $commentaires;
    }

   

    public function insert($author, string $content, int $article_id)
    {
        // $pdo = getpdo();
        $query = $this->pdo->prepare('INSERT INTO comments SET author = :author, content = :content, article_id = :article_id, created_at = NOW()');
        $query->execute(compact('author', 'content', 'article_id'));
    }
}
