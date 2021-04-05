<?php
//On démarre une session pour pouvoir stocker des informations qui perdurent malgré 
//la navigation de page en page et qui seront accessible dans toute les pages ayant accès a la session(l'accès n'est pas implicite)
session_start();
// 1 - Connexion
require_once('connexion.php');

// 2 - Ecriture de la requête
$sql = 'DELETE FROM user WHERE id= '.$_GET['id'];

// 3 - Exécution de la requête
mysqli_query($connexion, $sql) or die(mysqli_error($connexion));
 //Mise en place d'un message dans la session à l'aide de $_session (super variable accessible parce qu'il y a eu session_start dans la plage)
$_SESSION ['message'] = "Suppression correctement effectuée.";
 // Redirection vers la liste des abouts
header('Location:../admin/index-user.php');

?>