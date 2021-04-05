<?php
session_start();
// 1 - Connexion

require_once('connexion.php');

// 2 - Prise en charge de l'image
//Récupération de l'extension
$ext = pathinfo($_FILES['image']['name'], PATHINFO_EXTENSION);
//On renomme l'image pour qu'il n'y ai pas de doublon de noms et q'une image n'en remplace pas une autre
$carousel = "carousel_".uniqid().'.'.$ext;
//On déplace l'image du dossier temporaire du server ver le dossier image du site 
move_uploaded_file($_FILES['image']['tmp_name'], "../images/".$carousel);
//
$sql = 'INSERT INTO carousel (photo, texte1, texte2) VALUES ("'.$carousel.'","'.addslashes(ucfirst(htmlentities(htmlspecialchars($_POST['texte1'])))).
'","'.addslashes(ucfirst(htmlentities(htmlspecialchars(trim($_POST['texte2']))))).'")';
//
mysqli_query($connexion, $sql) or die (mysqli_error($connexion));
//
$_SESSION ["message"] = "Carousel ajouté dans la base de données";
header("Location:../admin/index-carousel.php");





?>