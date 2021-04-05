<?php

session_start();

// 1 - Connexion

require_once('connexion.php');

// 2 - Ecriture de la requête
// analyse si une image a été chargée dans le formulaire 
if(!empty($_FILES['image']['name'])){
    //On supprime la photo actuelle
    unlink('../images/'.$_POST['current-photo']);
    // Création d'un nom d'image et transfert du fichier depuis le répertoire temporaire du serveur
    // vers le dossier images du site
    $ext = pathinfo($_FILES['image']['name'], PATHINFO_EXTENSION);
    $filename = "carousel_".uniqid().'.'.$ext;
    move_uploaded_file($_FILES['image']['tmp_name'], '../images/'.$filename);

}else{
    $filename = $_POST['current-photo'];
}
//Préparation des données texte 
//trim : supprime les espaces en début et fin de chaine
//htmlentities et htmlspecialchars : Converti les caractères spéciaux en entités html ce qui securise 
//les données entrant dans la Bdd. Par exemple  : <script> devient &lt;script&gt; ou &lt = < et &gt = >
$texte1 = trim(ucfirst(addslashes(htmlentities(htmlspecialchars ($_POST["texte1"])))));
$texte2 = trim(ucfirst(addslashes(htmlentities(htmlspecialchars ($_POST["texte2"])))));
//
$sql = 'UPDATE carousel SET photo ="'.$filename.'", texte1="'.$texte1.'",texte2= "'.$texte2.'" WHERE id='.$_POST['id'];
mysqli_query($connexion,$sql) or die (mysqli_error($connexion));
//
$_SESSION['message'] = "Mise a jour du carousel ok.";
//
header('Location:../admin/index-carousel.php');