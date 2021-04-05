<?php 
session_start();
// On verifie le role de l'utilisateur
if(!isset($_SESSION['role']) || $_SESSION['role'] != "ROLE_ADMIN"){
    //
    $_SESSION['Message']="Veuillez vous connecter.";
    header("Location:./index.php");
}
