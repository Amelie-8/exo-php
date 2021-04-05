<?php
session_start();
// 
require_once("connexion.php");
$okToProceed = true;
// Vérification des mots de passe
if(!empty($_POST['password'])){
    if($_POST['password'] != $_POST['confirm-password']){
        // Le mode de passe ne correspond pas on va renvoyer sur l'utilisateur sur le formulaire de modification 
        //avec msg erreur
        $_SESSION['error-password'] = " Le mot de passe et sa confirmation ne correspondent pas .";
        // On stock les données postées dans la session pour pouvoir les ré afficher dans le formulaire
        $_SESSION['postDatas'] = $_POST;
        //header('Location:'.$_SERVER['HTTP_REFERER']);
        //die();
        $okToProceed = !$okToProceed; // On inverse la valeur du boolean avec un ! de sorte que s'il vaut true 
        //il passe a false et vice versa 
    }
}
if($okToProceed){
//
$nom = addslashes(mb_convert_case(trim($_POST['nom']), MB_CASE_UPPER));
$prenom = addslashes(mb_convert_case(trim($_POST['prenom']), MB_CASE_TITLE));
$email = strtolower(trim($_POST['email']));
$role = $_POST['role'];
if(empty($_POST['password'])){
    $sql = 'UPDATE user SET nom="' . $nom .'", prenom="'. $prenom.'", email="'. $email.'", role="'.$role.'" WHERE id='.$_POST['id'];
    $redirect = '../admin/index-user.php';
}else{
    $options = ["cost" => 12];
    $password = password_hash(trim($_POST['password']), PASSWORD_DEFAULT, $options);
    $sql = 'UPDATE user SET nom="' . $nom . '", prenom="' . $prenom . '", email="' . $email . '", role="' . $role . '" , password="'.$password.'" WHERE id=' . $_POST['id'];
    $redirect = './deconnect.php';
}
mysqli_query($connexion, $sql) or die(mysqli_error($connexion));
//
$_SESSION['message'] = "Utilisateur modifié";
//
header("Location:".$redirect);
}else{
    header('Location:'.$_SERVER['HTTP_REFERER']);
}