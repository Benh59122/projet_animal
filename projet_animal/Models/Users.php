<?php
include 'Bdd.php';

class Users {

    private PDO $getBdd;
    
    public function __construct() {
        $bdd = new Bdd();
        $this->getBdd = $bdd->getBdd();
    }

    public function getAll() : array
    {
        $req = $this->getBdd->prepare("SELECT * FROM users");
        $req->execute();
        return $req->fetchAll(PDO::FETCH_ASSOC);
    }

    public function connectUser(string $username,string $password) : void
    {
        $query = $this->getBdd->prepare("SELECT * FROM users WHERE login = :login");

        $query->execute([
            ":login" => $username
        ]);

        $result = $query->fetch(PDO::FETCH_ASSOC);
        $passverify = password_verify($password, $result['password']);
        if($passverify){
            $_SESSION['user']['id'] = $result['id_us'];
            $_SESSION['user']['login'] = $result['login'];
            $_SESSION['user']['firstName'] = $result['firstName'];
            $_SESSION['user']['lastName'] = $result['lastName'];
        }
    }

    public function insertUser(string $username, string $password,string $firstName,string $lastName) : void
    {
        $query = $this->getBdd->prepare("INSERT INTO users(email,password,firstName,lastName) VALUES (:email,:password,:firstName,:lastName)");
        $query->execute([
            ':email'=>$username,
            ':password'=>$password,
            ':firstName'=>$firstName,
            ':lastName'=>$lastName
        ]);
    }
}
?>