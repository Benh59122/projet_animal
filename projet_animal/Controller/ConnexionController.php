<?php 
include "../Models/Users.php";
if(isset($_GET['connect'])){
    $username = filter_var($_POST['username'], FILTER_VALIDATE_EMAIL) ? $_POST['username'] : null;
    $password = $_POST['password'];
    // $users = new Users();
    $users->connectUser($username, $password);
    header("Location:/");
}else{
    include "../View/connexion.php";
}
?>