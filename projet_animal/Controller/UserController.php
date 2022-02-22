<?php
if (session_status() === PHP_SESSION_NONE) {
    session_start();
}
include_once "../Model/Users.php";
$userClass = new Users();

$content = trim(file_get_contents("php://input"));
$data = json_decode($content, true);

if(isset($_GET['register'])){
    $userClass->insertUser($data);
    echo json_encode($data);
}else if(isset($_GET['login'])){
    $user = $userClass->verifyUser($data);
    $password = $data['password'];
    $verif = password_verify($password, $user['password']);
    if($verif){
        $_SESSION['user']['id']= $user['id_us'];
        $_SESSION['user']['name']= $user['name']." ".$user['firstname'];
        $_SESSION['user']['email'] = $user['email'];
        echo json_encode($_SESSION);
    }
}