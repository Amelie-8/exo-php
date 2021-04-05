<?php
//On démarre une session pour pouvoir stocker des informations qui perdurent malgré 
//la navigation de page en page et qui seront accessible dans toute les pages ayant accès a la session
//(l'accès n'est pas implicite)
session_start();
// 1 - Connexion
require_once('connexion.php');
// 2 - 2criture de la requête
// Addslashes échappent les guillemets simples ou doubles se trouvant dans le contenu
// $_POST est super (globale) variable qui sert a récupérer les données du formulaire puisque celui-ci est en 
//méthode POST
//Les noms dans les crochets correspondent aux attributs name des inputs du formulaire
$titre = addslashes($_POST['titre']);
$texte = addslashes($_POST['texte']);
$sql = 'UPDATE about SET titre ="' .$titre. '", texte="' .$texte.'", icone ="'.$_POST['icone'].'" WHERE id='.$_POST["form-id"];

// 3 - Exécution de la requête
 mysqli_query($connexion, $sql) or die(mysqli_error($connexion));
 //Mise en place d'un message dans la session à l'aide de $_session 
 //(super variable accessible parce qu'il y a eu session_start dans la plage)
 $_SESSION ['message'] = "Mise a jour correctement effectuée.";
 // Redirection vers la liste des abouts
 header('Location:../admin/index-about.php');

?>