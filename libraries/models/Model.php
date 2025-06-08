<?php
require_once 'libraries/database.php';
class Model
{
    protected $pdo;
    public function __construct()
    {
        $this->pdo = getpdo(); // a la naissance  pdo existe deja...
    }
}
