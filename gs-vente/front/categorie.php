<?php include "header.php" ?>
<?php 
$id=$_GET['id'];
$st=$pdo->prepare("SELECT * from categorie where id = ?");
$st->execute([$id]);
$categorie=$st->fetch(PDO::FETCH_ASSOC);

$p = $pdo->prepare("SELECT * FROM produits where id_categorie = ?");
$p->execute([$id]);
$produit=$p->fetchAll(PDO::FETCH_ASSOC);
?>
<title>Catégorie | <?php echo $categorie['libelle']?> </title>
    <div class="container py-2" id="cat">
<h4><i class="<?php echo $categorie['icone'] ?>" style="color: #000000;"></i> <?php echo $categorie['libelle']?></h4>
        <ul class="list-group list-group-flush">
        </ul>
    </div>

<div class="container">
<div class="row"
>
<?php foreach($produit as $p) { ?>
    <div class="card mb-3 col-md-4">
    <img src="../upload/<?php echo $p['imagee'] ?>" class="card-img-top" alt="..." width="200" , height="312">
    <div class="card-body">
    <a href="produit?id=<?php echo $p['id'] ?>" class="btn stretched-link">Afficher details</a>
    <h5 class="card-title"><?php echo $p['libelle'] ?></h5>
    <p class="card-text"><?php echo $p['descriptiion'] ?></p>
    <h4><span class="badge bg-success"><?php echo $p['prix'] ?> MAD</span></h4>
    <p class="card-text"><small class="text-muted">Ajoute le : <?php echo $p['date_creation'] ?></small></p>
    
</div>
    </div>
<?php } ?>
<?php
if(empty($produit)){ ?>
<div class="alert alert-info" role="alert">
        Pas de produit a l'instant                                                 
        </div>
<?php

}
?>
</div>
</div>
<br><br><br><br>


<style>
@media screen and (max-width: 600px) {
    .row {
      display: flex;
      flex-wrap: wrap;
      justify-content: center;
    }
  
    .card {
      width: 90%; /* Adjust the card width for smaller screens */
      margin: 10px;
    }
  
    .card-img-top {
      width: 100%; /* Make the card image responsive */
    }
  
    .btn.stretched-link {
      display: block; /* Show the full link button on mobile */
    }
  
    .card-body {
      text-align: center;
    }
  }
      
    </style>
<?php include "footer.php" ?>