<?php
include("./inc/session.inc.php")
?>
<!DOCTYPE html>
<html lang="fr">
<head>
  <?php include('./inc/head.inc.php');?>
    <title>New About</title>
</head>
<body>
    <?php include('./inc/header.inc.php') ;?>
    <div class="container bg-white shadow py-2">
    <h1>Ajouter about</h1>
    <hr>
    <form action="../core/add-about.php" method="post">
    <div class="form-group">
                <label for="titre">Titre</label>
                <input type="text" name="titre" id ="titre" class="form-control" >
            </div>
            <div class="form-group">
            <label for="titre">Texte</label>
            <textarea name="texte" id="texte" rows="4" class="form-control"></textarea>
            </div>
            <div class="form-group">
            <label for="icone">Icone</label>
            <input type="text" name="icone" id="icone" class="form-control" >
            </div>
            <button type="submit" class="btn btn-dark">Ajouter</button>
            </form>
    </div>
  
    <?php include('./inc/javascript.inc.php'); ?>
  </body>

</html>