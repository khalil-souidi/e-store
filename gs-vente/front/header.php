<link rel="website icon" type="png" href="../upload/logoo.png">
<?php include "../config.php" ?>
<?php session_start();?>
<?php $connect=false;
if(isset($_SESSION['clients'])){
  $connect=true;
 } ?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css" type="text/css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.3.1/dist/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
    
    <link rel="stylesheet" href="../assets/style_fixe.css">        
</head>
<body>
    <header class="headerr">
        <a href="index.php" class="logoo">E-store</a>
        <nav class="navbarr">
        <?php if($connect){ ?>
            <a href="index.php">Accueil</a>
            <a href="categories.php">Catégories</a>
            <a href="about.php">Qui somme-nous</a>
            <a href="contact.php">Contactez-nous</a>
            <a href="deconnexion.php">Deconnexion</a>
            <a href="ajouter_panier.php">Panier</a>
          <?php };
          if(!$connect){ ?>
            <a href="index.php">Accueil</a>
            <a href="categories.php">Catégories</a>
            <a href="about.php">Qui somme-nous</a>
            <a href="contact.php">Contactez-nous</a>
            <a href="seconnecter.php">Se connecter ou cree compte</a>
          <?php }?>
        </nav>
    </header>
  
