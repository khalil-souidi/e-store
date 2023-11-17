<?php include "../config.php" ?>
<?php session_start(); 
?>
<?php $connect=false;
if(isset($_SESSION['clients'])){
  $connect=true;
 } ?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <link rel="website icon" type="png" href="../upload/logoo.png">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css" type="text/css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/locomotive-scroll@3.5.4/dist/locomotive-scroll.css">
    <title>Accueil</title>
   <link rel="stylesheet" href="../assets/style_index.css">
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
            <a href="ajouter_panier.php">Panier</a>
            <a href="deconnexion.php">Deconnexion</a>
        <?php  }?>
        <?php if(!$connect){ ?>
          <a href="index.php">Accueil</a>
            <a href="categories.php">Catégories</a>
            <a href="about.php">Qui somme-nous</a>
            <a href="contact.php">Contactez-nous</a>
            <a href="seconnecter.php">se connecter ou cree compte</a>
        <?php  }?>

        </nav>

    </header><br><br>
<div id="mainn">
        <div id="page">
            <div id="loopp">
                <h1> Bienvenue dans votre <span> E-store &nbsp; </span></h1>
                <h1> Bienvenue dans votre <span> E-store &nbsp; </span></h1>
                <h1> Bienvenue dans votre <span> E-store &nbsp; </span></h1>
                <h1> Bienvenue dans votre <span> E-store &nbsp; </span></h1>
                
            </div>
        </div>
  </div>

<div class="imgg-container">
  <img src="../upload/background.png" id="imgg" alt="">
  <div class="imgg-content">
            <p>La meilleure façon d'acheter <br>
              les produits que vous aimez 
          </p><br><br>
            <a href="categories.php">Explorer <i class="fa-solid fa-arrow-right" style="color: #ffffff;"></i> </a>
  </div>
</div>
<?php include "footer.php" ?>