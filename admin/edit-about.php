<?php
include("./inc/session.inc.php")
?>
<!DOCTYPE html>
<html lang="fr">

<head>
<?php include('./inc/head.inc.php')?>
    <title>Edit about</title>
</head>

<body class="bg-secondary">
<?php include('./inc/header.inc.php');?>
    <div class="container bg-white shadow py-2">
        <h1>Modifier le About</h1>
        <hr>
        <?php 
        // 1 - CONNEXION
        require_once('../core/connexion.php');
        // 2 - Ecrire de la requête
        $sql = 'SELECT * FROM about WHERE id ='.$_GET['id'];
        // 3 - Exécution de la requête
        $req = mysqli_query($connexion, $sql) or die(mysqli_error($connexion));
        // 4 - Traitement des données
        $bloc = mysqli_fetch_array($req)
        ?>
        <form action ="../core/update-about.php" method ="POST">    
            <div class="form-group">
                <label for="titre">Titre</label>
                <input type="text" name="titre" id ="titre" class="form-control" value= "<?php echo $bloc["titre"];?>">
            </div>
            <div class="form-group">
            <label for="titre">Texte</label>
            <textarea name="texte" id="texte" rows="4" class="form-control"><?php echo $bloc["texte"];?>"</textarea>
            </div>
            <div class="form-group">
            <label for="icone">Icone</label>
            <input type="text" name="icone" id="icone" class="form-control" value= "<?php echo $bloc["icone"];?>">
            </div>
            <button type="submit" class="btn btn-dark">Modifier</button>
            <input type="hidden" name="form-id" value="<?php echo $bloc["id"];?>">
        </form>
        </div>
        <?php include('./inc/javascript.inc.php')?>
        </body>
        </html>