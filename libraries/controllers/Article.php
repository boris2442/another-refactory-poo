<?php

namespace Controllers;

require_once 'libraries/database.php';
require_once 'libraries/utils.php';
require_once 'libraries/models/Article.php';
class Article
{
    public function index()
    {
        //montrer la liste de tous les articles


        $model = new \Models\Article();

        $articles = $model->findAll("created_at DESC");

        $pageTitle = "Accueil";
        render('articles/index', compact('articles', 'pageTitle'));
    }
    public function show()
    {
        //Afficher un article
    }
    public function delete()
    {
        //supprimer un article
    }
}
