<?php
include("./inc/session.inc.php")
?>
<!DOCTYPE html>
<html lang="fr">
<head>
<?php include('./inc/head.inc.php');?>
    <title>Edit Carousel</title>
</head>
<body>
    <?php include('./inc/header.inc.php') ;?>
    <div class="container bg-white shadow py-2">
    <h1>Ajouter un Carousel</h1>
    <hr>
    <?php
    //1
    require_once("../core/connexion.php");
    //2 
    $sql = 'SELECT * FROM carousel WHERE id='.$_GET['id'];
    //3
    $req = mysqli_query($connexion, $sql) or die(mysqli_error($connexion));
    //4
    $carousel = mysqli_fetch_assoc($req);
    ?>
    <form action="../core/update-carousel.php" method="post" enctype="multipart/form-data">
    <div class="form-group position-relative">
                <label for="image">Image</label>
                <img src="../images/<?php echo $carousel['photo'];?>" alt="" class="img-fluid img-update">
                <input type="file" name="image" id ="image" class="form-control noAction" accept="image/png,image/jpg,image/jpeg">
            <button id="pseudoFile" class="btn btn-sm btn-dark ">Charger une Image</button>
            </div>
            <div class="form-group">
            <label for="texte1">Texte 1</label>
            <input type="text" name="texte1" id="texte1" class="form-control" value="<?php html_entity_decode( $carousel['texte1']);?>">
            </div>
            <div class="form-group">
            <label for="texte2">Texte 2</label>
            <input type="text" name="texte2" id="texte2" class="form-control" value="<?php html_entity_decode( $carousel['texte2']);?>">
            </div>
            <button type="submit" class="btn btn-dark">Modifier</button>
            <input type="hidden" name="id" value="<?php echo $carousel['id']; ?>">
            <input type="hidden" name="current-photo" value="<?php echo $carousel['photo']; ?>">
            </form>
    </div>
    <?php include('./inc/javascript.inc.php'); ?>
    <script>
        $("#pseudoFile").on("click", function(event){
            event.preventDefault();
            //event.stopPropagation();
            // ON déclenche un faux clic utilisateur sur l'input de type file
            $("#image").trigger("click");
        });
        </script>
</body>

</html>