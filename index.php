<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <!-- TYPOS -->
    <link rel="preconnect" href="https://fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css2?family=Open+Sans:wght@300;400;600;700&family=Raleway:wght@100;200;300;400;500;600;700&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="./css/font-awesome.min.css">
    <!-- CDN BOOTSTRAP -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.0/dist/css/bootstrap.min.css" integrity="sha384-B0vP5xmATw1+K9KRQjQERJvTumQW0nPEzvF6L/Z6nronJ3oUOFUFpCjEUQouq2+l" crossorigin="anonymous">
    <!-- CSS CUSTOM -->
    <link rel="stylesheet" href="./css/style.css">
    <title>Nantes Accueil</title>
</head>

<body>
    <div class="container">
        <!-- NAVBAR - DEB -->
        <nav class="navbar navbar-expand-lg navbar-light">
            <a class="navbar-brand" href="index.php"><img src="./images/logo.png"></a>
            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarNav">
                <ul class="navbar-nav ml-auto">
                    <li class="nav-item active">
                        <a class="nav-link" href="#">Home <span class="sr-only">(current)</span></a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="#">About</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="#">Features</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="#">Portfolio</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="#">Partners</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="#">Contact</a>
                    </li>
                </ul>
            </div>
        </nav>
        </div>
        <!-- NAVBAR - FIN -->
<?php
    //1
    require_once("./core/connexion.php");
    //2
    $sql = "SELECT * FROM carousel ORDER BY id DESC";
    //3
    $req = mysqli_query($connexion, $sql) or die(mysqli_error($connexion));


?>  
    <!-- CAROUSEL DEB -->
    <div id="carouselExampleCaptions" class="carousel slide" data-ride="carousel">
        <ol class="carousel-indicators">
<?php
    for($i = 0; $i <  mysqli_num_rows($req); $i++){
        ($i == 0) ? $active = "active" : $active = "";
    echo ' <li data-target="#carouselExampleCaptions" data-slide-to="'.$i.'" class="' .$active.'"></li>"';
    }
    
?>
            
        </ol>
        <div class="carousel-inner">
            <?php
            $i = 0;
            while ($slide = mysqli_fetch_array($req)){
                ($i == 0) ? $active = "active" : $active = "";
            ?>
            <div class="carousel-item <?php echo $active;?>">
                <img src="./images/<?php echo $slide['photo'];?>" class="d-block w-100" alt="...">
                <div class="carousel-caption">
                    <p><?php echo html_entity_decode($slide['texte1']);?></p>
                    <h5><?php echo html_entity_decode($slide['texte2']);?></h5>
        </div>
        </div>
        <?php
            $i++;
            }
        ?>
        <a class="carousel-control-prev" href="#carouselExampleCaptions" role="button" data-slide="prev">
            <span class="carousel-control-prev-icon" aria-hidden="true"></span>
            <span class="sr-only">Previous</span>
        </a>
        <a class="carousel-control-next" href="#carouselExampleCaptions" role="button" data-slide="next">
            <span class="carousel-control-next-icon" aria-hidden="true"></span>
            <span class="sr-only">Next</span>
        </a>
    </div>
    <!-- CAROUSEL FIN -->
    <!-- LIGNE JAUNE - DEB -->
    <div class="container-fluid bg-yellow py-4">
        <div class="container">
            <div class="row justify-content-center text-white align-items-center">
                <p class="pr-5 mb-0 ">This is call action module</p>
                <button type="button" class="btn btn-sm btn-outline-light ml-3">DOWNLOAD</button>
            </div>
        </div>
    </div>
    <!-- LIGNE JAUNE - FIN -->
    <!-- CONTENU - DEB -->
    <div class="container" id=contenu>
        <div class="row" id="about">
            <h2 class="text-center w-100">About</h2>
            <hr>
            <p class="text-center w-100 px-5">Lorem, ipsum dolor sit amet consectetur adipisicing elit. Pariatur officia hic vel voluptatem repudiandae asperiores dolore nobis eligendi iure.
                <br>
                <strong>
                    Unde atque aliquam eos hic dolores nesciunt est natus. Consequuntur, in.
                </strong>
            </p>
        </div>
        <div class="row">
            <?php
            //1 on appelle le fichier de connexion
            //require_once contrairement à require n'est exécuté que si nécessaire
            // De manière générales les require agissent comme un include sauf qu'ils déclenchent des erreurs  et arrêtent l'exécution des scripts si problème
            // alors que l'include n'en fait pas
            require_once('./core/connexion.php');
            // 2) Ecriture de la requête
            $sql = 'SELECT * FROM about';
            // 3) Exécution de la requête
            $req = mysqli_query($connexion, $sql) or die(mysqli_error($connexion));
            // 4) Traitement des données
            while ($bloc = mysqli_fetch_array($req)) {
            ?>
                <!-- bloc A -->
                <div class="col-12 col-lg-3 d-flex">
                    <div class="bg-about">
                        <i class="fa <?php echo $bloc['icone']; ?>" aria-hidden="true"></i>
                        <h4><?php echo $bloc['titre']; ?></h4>
                        <p><?php echo $bloc['texte']; ?></p>
                    </div>
                </div>
            <?php
            }
            ?>
        </div>
        <div class="row" id="features">
            <h2 class="text-center w-100">Nantes features</h2>
            <hr>
        </div>

        <div class="row">
            <!-- bloc 1 -->
            <div class="col-12 col-lg-4 d-flex bg-feature">
                <div class="icone rounded">
                    <i class="fa fa-desktop" aria-hidden="true"></i>
                </div>
                <div class="col">
                    <h5><strong>ipsum dolor sit amet consectetur adipisicing elit. Est, eius.</strong></h5>
                    <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Est, eius.</p>
                </div>
            </div>
            <div class="col-12 col-lg-4 d-flex bg-feature">
                <div class="icone rounded">
                    <i class="fa fa-indent" aria-hidden="true"></i>
                </div>
                <div class="col">
                    <h5><strong>ipsum dolor sit amet consectetur adipisicing elit. Est, eius.</strong></h5>
                    <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Est, eius.</p>
                </div>
            </div>
            <div class="col-12 col-lg-4 d-flex bg-feature">
                <div class="icone rounded">
                    <i class="fa fa-font" aria-hidden="true"></i>
                </div>
                <div class="col">
                    <h5><strong>ipsum dolor sit amet consectetur adipisicing elit. Est, eius.</strong></h5>
                    <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Est, eius.</p>
                </div>
            </div>
            <!-- bloc 2 -->
            <div class="col-12 col-lg-4 d-flex bg-feature">
                <div class="icone rounded">
                    <i class="fa fa-cogs" aria-hidden="true"></i>
                </div>
                <div class="col">
                    <h5><strong>ipsum dolor sit amet consectetur adipisicing elit. Est, eius.</strong></h5>
                    <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Est, eius.</p>
                </div>
            </div>
            <div class="col-12 col-lg-4 d-flex bg-feature">
                <div class="icone rounded">
                    <i class="fa fa-clipboard" aria-hidden="true"></i>
                </div>
                <div class="col">
                    <h5><strong>ipsum dolor sit amet consectetur adipisicing elit. Est, eius.</strong></h5>
                    <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Est, eius.</p>
                </div>
            </div>
            <div class="col-12 col-lg-4 d-flex bg-feature">
                <div class="icone rounded">
                    <i class="fa fa-wordpress" aria-hidden="true"></i>
                </div>
                <div class="col">
                    <h5><strong>ipsum dolor sit amet consectetur adipisicing elit. Est, eius.</strong></h5>
                    <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Est, eius.</p>
                </div>
            </div>
            <!-- bloc 3 -->
            <div class="col-12 col-lg-4 d-flex bg-feature">
                <div class="icone rounded">
                <i class="fa fa-newspaper-o" aria-hidden="true"></i>
                </div>
                <div class="col">
                    <h5><strong>ipsum dolor sit amet consectetur adipisicing elit. Est, eius.</strong></h5>
                    <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Est, eius.</p>
                </div>
            </div>
            <div class="col-12 col-lg-4 d-flex bg-feature">
                <div class="icone rounded">
                    <i class="fa fa-usd" aria-hidden="true"></i>
                </div>
                <div class="col">
                    <h5><strong>ipsum dolor sit amet consectetur adipisicing elit. Est, eius.</strong></h5>
                    <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Est, eius.</p>
                </div>
            </div>
            <div class="col-12 col-lg-4 d-flex bg-feature">
                <div class="icone rounded">
                <i class="fa fa-file-code-o" aria-hidden="true"></i>
                </div>
                <div class="col">
                    <h5><strong>ipsum dolor sit amet consectetur adipisicing elit. Est, eius.</strong></h5>
                    <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Est, eius.</p>
                </div>
            </div>
        </div>
    </div>
    <div class="container" id=contenu>
        <div class="row" id="portfolio">
            <h2 class="text-center w-100">Portfolio</h2>
            <hr>
            <p class="text-center w-100 px-5">Lorem, ipsum dolor sit amet consectetur adipisicing elit. Pariatur officia hic vel voluptatem repudiandae asperiores dolore nobis eligendi iure.
                <br>
                </div> 
                <div class="row">
                <div class="col-12 col-lg-4 d-flex ">
                  <img  class="bg-photo"src="./images/portfolio-1.jpg" alt="portfolio-1" >
                 
               </div>
               
                <div class="col-12 col-lg-4 d-flex ">
                  <img class ="bg-photo"src="./images/portfolio-2.jpg" alt="portfolio-2" >
                 
               </div>
               
                <div class="col-12 col-lg-4 d-flex ">
                  <img class ="bg-photo"src="./images/portfolio-3.jpg" alt="portfolio-3" >
                 
               </div>        
               
                <div class="col-12 col-lg-4 d-flex ">
                  <img class ="bg-photo"src="./images/portfolio-4.jpg" alt="portfolio-4" >
                 
               </div>        
               
                <div class="col-12 col-lg-4 d-flex ">
                  <img class ="bg-photo"src="./images/portfolio-5.jpg" alt="portfolio-5" >
                 
               </div>        
               
                <div class="col-12 col-lg-4 d-flex ">
                  <img class ="bg-photo"src="./images/portfolio-6.jpg" alt="portfolio-6" >
                 
               </div>        
               </div>



    <!-- CONTENU - FIN -->
    <!-- CDN JAVASCRIPT -->
    <script src="https://code.jquery.com/jquery-3.5.1.min.js" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.0/dist/js/bootstrap.bundle.min.js" integrity="sha384-Piv4xVNRyMGpqkS2by6br4gNJ7DXjqk09RmUpJ8jgGtD7zP9yug3goQfGII0yAns" crossorigin="anonymous"></script>
</body>

</html>