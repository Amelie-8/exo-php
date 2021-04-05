<?php
include("./inc/session.inc.php")
?>
<!DOCTYPE html>
<html lang="fr">
<head>
<?php include('./inc/head.inc.php');?>
    <title>New carousel</title>
</head>
<body>
    <?php include('./inc/header.inc.php') ;?>
    <div class="container bg-white shadow py-2">
    <h1>Ajouter un Carousel</h1>
    <hr>
    <form action="../core/add-carousel.php" method="post" enctype="multipart/form-data">
    <div class="form-group position-relative">
                <label for="image">Image</label>
                <input type="file" name="image" id ="image" class="form-control noAction" accept="image/png,image/jpg,image/jpeg">
            <button id="pseudoFile" class="btn btn-sm btn-dark ">Charger une Image</button>
            </div>
            <div class="form-group">
            <label for="texte1">Texte 1</label>
            <input type="text" name="texte1" id="texte1" class="form-control">
            </div>
            <div class="form-group">
            <label for="texte2">Texte 2</label>
            <input type="text" name="texte2" id="texte2" class="form-control" >
            </div>
            <button type="submit" class="btn btn-dark">Ajouter</button>
            </form>
    </div>
<?php include('./inc/javascript.inc.php'); ?>
    <script>
        $("#pseudoFile").on("click", function(event){
            event.preventDefault();
            event.stopPropagation();
            // ON déclenche un faux clic utilisateur sur l'input de type file
            $("#image").trigger("click");
        });
        </script>
</body>

</html>