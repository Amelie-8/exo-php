<?php
  session_start();
?>
<!DOCTYPE html>
<html lang="fr">
<head>
    <?php
    include("./inc/head.inc.php");
    ?>
    <title>Admin : login</title>
</head>

<body class="bg-secondary">
<!-- BLOC LOGIN-->
<div class="modal modal-log shadow" tabindex="-1">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title">Connexion</h5>
      </div>
      <form action="../core/log-user.php" method="POST">
      <div class="modal-body">
        <div class="form-group">
        <label for="identifiant">Email</label>
        <input type="text" name="email" id="identifiant" class="form-control">
      </div>
      <div class="form-group">
          <label for="password">Mot de passe</label>
          <input type="password" name="password" id="password" class="form-control">
      </div>
      </div>
      <div class="modal-footer">
    <button type="submit" class="btn btn-sm btn-primary">Connexion</button>
        </div>
        </form>
        <?php
        if(isset($_SESSION['message'])){
          echo '<div class="alert alert-danger">'.$_SESSION['message'].'</div>';
          unset($_SESSION['message']);
        }
        ?>
      </div>
    </div>
  </div>
  <!-- FIN BLOC DE LOGIN-->
</div>
<?php
include("./inc/javascript.inc.php")
?>
</body>
</html>