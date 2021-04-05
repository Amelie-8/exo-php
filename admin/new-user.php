<?php
include("./inc/session.inc.php")
?>
<!DOCTYPE html>
<html lang="fr">
<head>
<?php include('./inc/head.inc.php');?>
    <title>New user</title>
</head>
<body>
    <?php include('./inc/header.inc.php') ;?>
    <div class="container bg-white shadow py-2">
    <h1>Ajouter un user</h1>
    <hr>
    <form action="../core/add-user.php" method="POST">
    <div class="form-group">
        <label for ="nom">Nom</label>
        <input type="text" name="nom" id="nom" class="form-control">
    </div>
    <div class="form-group">
        <label for ="prenom">Prénom</label>
        <input type="text" name="prenom" id="prenom" class="form-control">
    </div>
    <div class="form-group">
        <label for ="email">Email</label>
        <input type="email" name="email" id="email" class="form-control">
    </div>
    <div class="form-group">
        <label for ="password">Password</label>
        <input type="password" name="password" id="password" class="form-control">
    </div>
    <div class="form-group">
        <label for ="role">Rôle</label>
        <select name="role" id="role"class="form-control">
        <option value="ROLE_USER">Utilisateur</option>
        <option value="ROLE_ADMIN">Administrateur</option>
        </select>
    </div>
    
    <button type="submit" class="btn btn-dark">Ajouter</button>
</form>
    </div>
    <?php include('./inc/javascript.inc.php'); ?>
    </body>

</html>
