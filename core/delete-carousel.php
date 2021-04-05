<?php
//On démarre une session pour pouvoir stocker des informations qui perdurent malgré 
//la navigation de page en page et qui seront accessible dans toute les pages ayant accès a la session(l'accès n'est pas implicite)
session_start();

// 1 - Connexion
require_once('connexion.php');

//Récuperer des infos actuelles
$sql = "SELECT photo FROM carousel WHERE id =".$_GET['id'];
$req = mysqli_query($connexion,$sql) or die (mysqli_error($connexion));
$carousel = mysqli_fetch_array($req);

// Suppression du fichier image
if(file_exists('../images/'.$carousel['photo'])) unlink('../images/'.$carousel['photo']);

// 2 - Ecriture de la requête
$sql = 'DELETE FROM carousel WHERE id='.$_GET['id'];

// 3 - Exécution de la requête
 mysqli_query($connexion, $sql) or die(mysqli_error($connexion));

 //Mise en place d'un message dans la session à l'aide de $_session (super variable accessible parce qu'il y a eu session_start dans la plage)
 $_SESSION ['message'] = "Suppression correctement effectuée.";

 // Redirection vers la liste des abouts
 header('Location:../admin/index-carousel.php');

?>