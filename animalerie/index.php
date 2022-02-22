<?php
session_start();

if(isset($_SESSION['user'])){
    // On dirige l'utilisateur vers une page
    header("Location:/Controller/AccueilController.php");
}else{
    // On le dirige vers la connexion
    header("Location:/Controller/ConnexionController.php");
}
?>