<?php
require_once 'libraries/database.php';
require_once 'libraries/utils.php';
require_once 'libraries/models/Article.php';
require_once 'libraries/models/Comment.php';
$articleModel=new Article();
$commentModel=new Comment();
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

$article =$articleModel-> find($article_id);


$commentaires =$commentModel->findAllWithArticle($article_id);

/**
 * 5. On affiche 
 */
$pageTitle = $article['title'];
render('articles/show', 
// [
//     'pageTitle' => $pageTitle, 'article' => $article, 'commentaires' => $commentaires, 'article_id' => $article_id
// ]
compact('pageTitle', 'article', 'commentaires', 'article_id')
);
