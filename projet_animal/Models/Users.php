<?php
include_once "Bdd.php";
class Users
{
    private PDO $bdd;

    public function __construct(){
        $bddClass = new Bdd();
        $this->bdd = $bddClass->getBdd();
    }

    public function insertUser($data)
    {
        $password = password_hash($data['password'], PASSWORD_BCRYPT);
        $request = $this->bdd->prepare("INSERT INTO users(name, firstname, email, password, admin) VALUES (:name,:firstname,:email,:password,0)");
        $request->execute([
            ':name'=>$data['name'],
            ':firstname'=>$data['firstname'],
            ':email'=>$data['email'],
            ':password'=>$password
        ]);
    }

    public function verifyUser($data)
    {
        $email = filter_var($data['email'], FILTER_VALIDATE_EMAIL) ? $data['email'] : null;

        $request = $this->bdd->prepare("SELECT * FROM users WHERE email = :email");
        $request->execute([
            ':email' => $email
        ]);
        return $request->fetch(PDO::FETCH_ASSOC);


    }
}