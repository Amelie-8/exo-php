<?php
session_start();
//On détruit la session
session_destroy();
//
$_SESSION = [];
//On démarre une nouelle session
session_start();
//Mise en place d'un msg
$_SESSION['message'] = "Vous êtes bien déconnecté";
//Redirection
header('Location:../admin/index.php');
?>