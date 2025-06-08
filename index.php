<?php
require_once 'libraries/database.php';
require_once 'libraries/utils.php';

$articles = findAllArticles();

$pageTitle = "Accueil";
render('articles/index', compact('articles', 'pageTitle'));

