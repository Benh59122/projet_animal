<?php
if (session_status() === PHP_SESSION_NONE) {
    session_start();
}
class Bdd {

    private PDO $bdd;

    public function __construct(){
        // $this->bdd = new PDO("mysql:host=localhost:3308;dbname=intro-mvc", "root", "root");
         $this->bdd = new PDO("mysql:host=localhost:3308;dbname=socialdb", "root", "root");

    }

    public function getBdd(){
        return $this->bdd;
    }
}
?>