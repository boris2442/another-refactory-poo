<?php
/**
 * retourne une connexion a la base de donnee
 * @return PDO
 */
function getpdo():PDO{
    $pdo = new PDO('mysql:host=localhost;dbname=blogpoo;charset=utf8', 'root', '', [
    PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION,
    PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC
]);
return $pdo;
}

/**
 * Retourne la listedes articles de la database classes par date de creation
 * @return @rray
 */
function findAllArticles():array{
    $pdo=getpdo();
    $resultats = $pdo->query('SELECT * FROM articles ORDER BY created_at DESC');
// On fouille le résultat pour en extraire les données réelles
$articles = $resultats->fetchAll();
return $articles;
}