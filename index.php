<?php
require_once 'libraries/database.php';
require_once 'libraries/utils.php';
require_once 'libraries/models/Article.php';
$model=new Article();

$articles =$model-> findAll();

$pageTitle = "Accueil";
render('articles/index', compact('articles', 'pageTitle'));

