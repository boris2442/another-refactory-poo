<?php

namespace Controllers;

// require_once 'libraries/database.php';
require_once 'libraries/utils.php';
require_once 'libraries/models/Article.php';
require_once 'libraries/models/Comment.php';
// require_once 'libraries/database.php';

class Article
{
    protected $model;
    public function __construct()
    {
        $this->model = new \Models\Article();
    }
    public function index()
    {
        $articles = $this->model->findAll("created_at DESC");

        $pageTitle = "Accueil";
        render('articles/index', compact('articles', 'pageTitle'));
    }
    public function show()
    {
        //Afficher un article
        // $articleModel = new \Models\Article();
        $commentModel = new \Models\Comment();
        // On part du principe qu'on ne possède pas de param "id"
        $article_id = null;

        // Mais si il y'en a un et que c'est un nombre entier, alors c'est cool
        if (!empty($_GET['id']) && ctype_digit($_GET['id'])) {
            $article_id = $_GET['id'];
        }

        // On peut désormais décider : erreur ou pas ?!
        if (!$article_id) {
            die("Vous devez préciser un paramètre `id` dans l'URL !");
        }

        $article = $this->model->find($article_id);


        $commentaires = $commentModel->findAllWithArticle($article_id);

        /**
         * 5. On affiche 
         */
        $pageTitle = $article['title'];
        render(
            'articles/show',
            compact('pageTitle', 'article', 'commentaires', 'article_id')
        );
    }
    public function delete()
    {
        //supprimer un article

        // $articleModel = new \Models\Article();

        if (empty($_GET['id']) || !ctype_digit($_GET['id'])) {
            die("Ho ?! Tu n'as pas précisé l'id de l'article !");
        }

        $id = $_GET['id'];


        $article = $this->model->find($id);
        if (!$article) {
            die("L'article $id n'existe pas, vous ne pouvez donc pas le supprimer !");
        }

        /**
         * 4. Réelle suppression de l'article
         */
        $this->model->delete($id);

        /**
         * 5. Redirection vers la page d'accueil
         */

        redirect("index.php");
    }
}
