<?php
include '../Models/Users.php';
if(isset($_GET['register'])){
    // On inscrit l'utilisateur
    $email = $_POST['username'];
    $password = password_hash($_POST['password'], PASSWORD_BCRYPT);
    $firstname = $_POST['firstname'];
    $name = $_POST['name'];
    $users = new Users();
    $users->insertUser($email,$password,$firstname,$name);
    header('Location:/');
}else{
    include "../View/inscription.php";
}
?>