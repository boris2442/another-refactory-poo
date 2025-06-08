<?php
namespace Models;
require_once 'libraries/database.php';
abstract class Model //abstract veut dire que la classe ne peut pas etre extensier
{
    protected $pdo;
    protected $table;
    public function __construct()
    {
        $this->pdo = getpdo(); // a la naissance  pdo existe deja...
    }
    public function find($id)
    {

        $query = $this->pdo->prepare("SELECT * FROM {$this->table} WHERE id = :id");
        $query->execute(['id' => $id]);
        $item = $query->fetch();
        return $item;
    }

    public function delete(int $id)
    {
        $query = $this->pdo->prepare("DELETE FROM {$this->table} WHERE id = :id");
        $query->execute(['id' => $id]);
    }



     /**
     * Retourne la liste des articles de la database classes par date de creation
     * @return @rray
     */
    public  function findAll(string $order=""): array
    {
        // $pdo = getpdo();
        $sql ="SELECT * FROM {$this->table}";
        if($order){
            $sql.= " ORDER BY ". $order;
        }
        $resultats=$this->pdo->query($sql);
        // On fouille le résultat pour en extraire les données réelles
        $articles = $resultats->fetchAll();
        return $articles;
    }
}
