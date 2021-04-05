<?php
//On déclare un flag (boolean) pour savoir quel jeu de données de connexion on utilise
$online = false;
//
if(!$online){
    $host = "localhost"; // Le nom du serveur local (émilateur)
    $user = "root";
    $password = "root";
    $bdd ="cours_nantes";
    
}else{
    // Les informations fournies par l'hébergeur
    $host = ""; 
    $user = "";
    $password = "";
    $bdd ="";
}
// Mise en place de la connexion au serveur et a la base de données
$connexion = mysqli_connect($host,$user,$password,$bdd)or die("Erreur de connexion au serveur");
// On précise de l'encodage des requêtes est en UTF-8
mysqli_query($connexion,"SET NAMES 'utf8'");

