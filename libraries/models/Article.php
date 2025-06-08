<?php
require_once 'libraries/database.php';
class Article
{
    //tout les functions qui permet de manipuler les articles

    /**
     * Retourne la listedes articles de la database classes par date de creation
     * @return @rray
     */
    public  function findAll(): array
    {
        $pdo = getpdo();
        $resultats = $pdo->query('SELECT * FROM articles ORDER BY created_at DESC');
        // On fouille le résultat pour en extraire les données réelles
        $articles = $resultats->fetchAll();
        return $articles;
    }

    public function find($id)
    {
        $pdo = getpdo();
        $query = $pdo->prepare("SELECT * FROM articles WHERE id = :article_id");

        // On exécute la requête en précisant le paramètre :article_id 
        $query->execute(['article_id' => $id]);

        // On fouille le résultat pour en extraire les données réelles de l'article
        $article = $query->fetch();
        return $article;
    }



  public  function delete($id)
    {
        $pdo = getpdo();
        $query = $pdo->prepare('DELETE FROM articles WHERE id = :id');
        $query->execute(['id' => $id]);
    }
}
