<?php
include("./inc/session.inc.php");
if (!isset($_GET['id'])) {
    header("Location:./index-user.php");
}
?>
<!DOCTYPE html>
<html lang="fr">

<head>
    <?php include('./inc/head.inc.php') ?>
    <title>Edit user</title>
</head>

<body>
    <?php include('./inc/header.inc.php'); ?>
    <div class="container bg-white shadow py-2">
        <h1>Modifier un User</h1>
    <hr>
    <?php
    if (isset($_SESSION['postDatas'])){
        $nom = $_SESSION['postDatas'] ["nom"];
        $prenom= $_SESSION['postDatas']["prenom"];
        $email= $_SESSION['postDatas']["email"];
        $roleUser = $_SESSION['postDatas'] ["role"];
        unset($_SESSION['postDatas']);

    }else{
        // 1 connexion
        require_once("../core/connexion.php");
        // 2 
        $sql = "SELECT * FROM user WHERE id=" . $_GET['id'];
        // 3 
        $req = mysqli_query($connexion, $sql) or die(mysqli_error($connexion));
        // 4
        $user = mysqli_fetch_array($req);
        //
        $nom = $user ["nom"];
        $prenom= $user["prenom"];
        $email= $user["email"];
        $roleUser = $user ["role"];
    }   
        ?>
        <form action="../core/update-user.php" method="post" onsubmit="return true; validForm();">
            <div class="form-group">
                <label for="nom">Nom</label>
                <input type="text" name="nom" id="nom" class="form-control" value="<?php echo $nom; ?>" required>
            </div>
            <div class="form-group">
                <label for="prenom">Prénom</label>
                <input type="text" name="prenom" id="prenom" class="form-control" value="<?php echo $prenom; ?>" required>
            </div>
            <div class="form-group">
                <label for="email">Email</label>
                <input type="email" name="email" id="email" class="form-control" value="<?php echo $email; ?>" required>
            </div>
            <div class="form-group">
                <label for="role">Rôle</label>
                <?php
                $roles = array(
                    ["utilisateur", "ROLE_USER"],
                    ["administrateur", "ROLE_ADMIN"]
                );
                ?>
                <select name="role" id="role" class="form-control">
                    <?php
                    foreach ($roles as $role) {
                        $selected = ($roleUser == $role[1]) ? "selected" : "";
                        echo '<option value="' . $role[1] . '" ' . $selected . '>' . ucfirst($role[0]) . '</option>';
                    }
                    ?>
                </select>
            </div>
            <hr>
            <?php
            if(isset($_SESSION['error-password'])){
                echo '<p class ="text-danger">'.$_SESSION['error-password'].'</p>';
                unset($_SESSION['error-password']);
            }
            ?>
            <div class="form-group">
                <label for="password">Mot de passe</label>
                <input type="password" name="password" id="password" class="form-control">
            </div>
            <div class="form-group">
                <label for="confirm-password">Confirmez votre mot de passe</label>
                <input type="password" name="confirm-password" id="confirm-password" class="form-control">
            </div>
            <button type="submit" class="btn btn-dark">Modifier</button>
            <input type="hidden" name="id" value="<?php echo $_GET['id']; ?> ">
        </form>
    </div>
    <?php include('./inc/javascript.inc.php') ?>
    <script>
        function validForm() {
            if ($("#password").val() != "") {
                if ($("#confirm-password").val() == "") {
                    alert("Veuillez renseigner la confirmation du password");
                    return false;
                }
                if ($("#password").val() != $("#confirm-password").val()){
                    alert("Le mot de passe ne correspond pas à la confirmation");
                    return false;
                }
            }
            return true;
        }
    </script>
</body>

</html>