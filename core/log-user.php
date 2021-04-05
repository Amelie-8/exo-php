<?php 
session_start();
//1
require_once("connexion.php");

//2
// On fait une requete pour savoir si ce mail existe dans la base de données
$sql = 'SELECT * FROM user WHERE email="'.strtolower(trim($_POST['email'])).'"';

// 3 On exécute la requete 
$req = mysqli_query($connexion, $sql) or die(mysqli_error($connexion));
//On verifie si lemail existe dans la BDD 
if(mysqli_num_rows($req)==0){
    $_SESSION['message']= "Email non reconnu dans la base données";
    header('Location:'.$_SERVER['HTTP_REFERER']);
}else{
    $user=mysqli_fetch_assoc($req);
    if($user['role'] == "ROLE_USER"){
        $_SESSION['message']= "Vous n'êtes pas autorisé a vous connecter. Contacter l'administrateur";
        header('Location:'.$_SERVER['HTTP_REFERER']);
    }else{
        if(password_verify(trim($_POST['password']),$user['password'])){
            $_SESSION['prenom'] = $user['prenom'];
            $_SESSION['role'] = $user['role'];
            header("Location:../admin/dashboard.php");
        }else{
        $_SESSION['message']= "Erreur de mot de passe";
    header('Location:'.$_SERVER['HTTP_REFERER']);
        }
    }
}