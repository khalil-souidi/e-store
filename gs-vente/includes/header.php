<link rel="website icon" type="png" href="upload/admin_icon.png">
<?php include "config.php" ?>
<?php session_start(); 
$connect=false;
if(isset($_SESSION['utilisateurs'])){
  $connect=true;
} 


?>
<!DOCTYPE html>
<html lang="en">
<head>
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css" type="text/css">
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.3.1/dist/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
</head>
<body>
    <nav class="navbar navbar-expand-lg navbar-light bg-light">
  <a class="navbar-brand" href="front/index.php">E-store</a>
  <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
    <span class="navbar-toggler-icon"></span>
  </button>

  <div class="collapse navbar-collapse" id="navbarNav">
    <ul class="navbar-nav">
      <?php if($connect){ ?>
      <li class="nav-item">
      <a class="nav-link" href="liste_admin.php">Liste admins</a>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="liste_categories.php">Liste categories</a>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="liste_produits.php">Liste produits</a>
      </li> 
      <li class="nav-item">
        <a class="nav-link" href="liste_messages.php">Liste messages</a>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="liste_clients.php">Liste clients</a>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="liste_commandes.php">Liste Commandes</a>
      </li>   
      <li class="nav-item">
        <a class="nav-link" href="deconnexion.php">Deconnexion</a>
      </li> 
      <li class="nav-item">
      <a class="nav-link" href="front/index.php">Lien vers le site</a>
      </li>
     <?php  } ?>
     <?php if(!$connect){ ?>
      <li class="nav-item">
      <a class="nav-link" href="connexion.php">Connexion</a>
      </li>
      <li class="nav-item">
      <a class="nav-link" href="front/index.php">Lien vers le site</a>
      </li>
      <?php } ?>
    </ul>
  </div>
  
</nav>