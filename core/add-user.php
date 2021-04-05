<?php
session_start();
// 1 - Connexion

require_once('connexion.php');

// 2 - Préparation des données et ecriture de requete 
$nom = addslashes(mb_convert_case(trim($_POST['nom']),MB_CASE_UPPER));
$prenom = addslashes(mb_convert_case(trim($_POST['prenom']),MB_CASE_TITLE));
$email = strtolower(trim($_POST['email']));

//Le mot de passe 
//On va prendre en charge le "hachage" (encodage) du password avec un algo sécurisé (pour info une mode de passe encodé 
// n'est pas décodable). On va utiliser Bcrypt (il existe aussi argon2i et sha-www)
$options = ["cost"=>12];
$password = password_hash(trim($_POST['password']), PASSWORD_DEFAULT,$options);
$role = $_POST ['role'];
$sql = 'INSERT INTO user (nom, prenom, email, password, role) VALUES( "'.$nom.'","'.$prenom.'","'.$email.'","'.$password.'","'.$role.'")';
mysqli_query($connexion, $sql) or die (mysqli_error($connexion));

//Mise en place du message et de la redirection
$_SESSION ['message']= "utilisateur ajouté a BDD";
header ("Location:../admin/index-user.php");