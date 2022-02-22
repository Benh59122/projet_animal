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
            $_SESSION['user']['firstname'] = $result['firstname'];
            $_SESSION['user']['name'] = $result['name'];
        }
        
    }

    public function insertUser($username, $password, $firstname, $name) : void
    {
        $query = $this->getBdd->prepare("INSERT INTO users(email,password,firstname,name) VALUES (:email,:password,:firstname,:name)");
        $query->execute([
            ':email'=>$username,
            ':password'=>$password,
            ':firstname'=>$firstname,
            ':name'=>$name
        ]);
    }
}
?>