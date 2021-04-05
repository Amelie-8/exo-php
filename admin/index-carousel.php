<?php
include("./inc/session.inc.php")
?>
<!DOCTYPE html>
<html lang="fr">
<head>
<?php include('./inc/head.inc.php');?>
</head>
<body class="bg-secondary">
<?php include('./inc/header.inc.php');?>
<div class="container bg-white shadow">
        <h1>Gérer les Carousels</h1>
        <div class="row justify-content-end">
            <a href="./new-carousel.php" class="btn btn-info mr-3 mb-3 ">Nouveau</a>
        </div>
        <!-- Prise en charge ds msg de session PHP-->
        <?php
            // On verifie si un message existe dans la session
            if(isset($_SESSION["message"])){
                // On affiche le msg dans une alerte boostrap
                echo '<div class="alert alert-success">'.$_SESSION["message"].'</div>';
                // Et SURTOUT on supprime le message de la session car il a été diffusé
                unset($_SESSION["message"]);
            }
        ?>
        <?php
                // 1 - CONNEXION
                require_once('../core/connexion.php');
                // 2 - Ecrire de la requête
                $sql = 'SELECT * FROM carousel';
                // 3 - Exécution de la requête
                $req = mysqli_query($connexion, $sql) or die(mysqli_error($connexion));
                //Vérification qu'il y a des entrées dans le BDD et donc le nombre de lignes retounées dans la requete 
                //est superieur a 0 
            if(mysqli_num_rows($req)> 0){
                ?>
                <!-- -->
        <table class="table table-striped">
        <thead>
                <tr>
                    <th scope="col">Id</th>
                    <th scope="col">Image</th>
                    <th scope="col">Texte 1</th>
                    <th scope="col">Texte 2</th>
                    <th scope="col">Actions</th>
                </tr>
            </thead>
            <tbody>
                <?php
                
                // 4 - Traitement des données
                while ($bloc = mysqli_fetch_array($req)) {
                ?>
                    <tr>
                        <th scope="row"><?php echo $bloc ['id']; ?></th>
                        <td class="td-img"><img src ="../images/<?php echo $bloc ['photo']; ?>" alt = "" class="img-fluid"></td>
                        <!-- avec html_entity_decode, on décode la conversion des caractères spéciaux obtenue avec la méthode htmlentities lors de la 
                        la modification en BDD (update-carousel.php) -->
                        <td><?php echo html_entity_decode($bloc['texte1']);?></td>
                        <td><?php echo html_entity_decode($bloc['texte2']);?></td>
                    <td>
                        <div class="d-flex">
                            <a href="../core/delete-carousel.php?id=<?php echo $bloc ['id'];?>" class="btn btn-danger mr-2" onclick="return confirm('Vraiment ?')"><i class="fa fa-trash"></i></a>
                            <a href="edit-carousel.php?id=<?php echo $bloc ['id'];?>" class="btn btn-info"><i class="fa fa-edit"></i></a>
                        </div>
                    </td>
                    </tr>
                <?php
                }
                ?>
            </tbody>
        </table>
                <?php
                }else{
                    echo '<p class= "text-warning mb-3" >Désolé il n\'y a pas d\'entrées dans la base de données.<p>';
                }
                ?>
            </div>
    <?php include('./inc/javascript.inc.php');?>
    </body>

</html>

