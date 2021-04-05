<header class="container-fluid px-0">
    <nav class="navbar navbar-expand-lg navbar-dark bg-dark">
        <a class="navbar-brand" href="dashboard.php"><img src="../images/logo.png" class="bg-white"></a>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarNav">
            <ul class="navbar-nav ">
                <li class="nav-item active">
                    <a class="nav-link" href="#">Home<span class="sr-only">(current)</span></a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="index-carousel.php">Livres</a>
                <li class="nav-item">
                    <a class="nav-link" href="index-about.php">About</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="index-user.php">User</a>
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
            <ul class="navbar-nav ml-auto text-white">
            <li>
                <?php
                if(isset($_SESSION['prenom'])){
                    echo 'Bienvenue '.$_SESSION['prenom'];
                }
                ?>
            </li>
            <li>
                <a href="../core/deconnect.php" class="btn btn-danger btn-sm ml-4 text-white"><i class="fa fa-sign-out"></i></a>
            </li>
            </ul>
        </div>
    </nav>


</header>