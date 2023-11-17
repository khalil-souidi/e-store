<?php include "config.php"; ?>
<?php 
if (!isset($_SESSION['utilisateurs'])) {
    echo "Accès refusé";
    die();
}
?>
<?php  
$id=$_GET['id'];
$supp=$pdo->prepare("DELETE FROM produits WHERE id = ?");
$supp->execute([$id]);
if($supp){
    header("location:liste_produits.php");
}
else{ ?>
    <div class="alert alert-danger" role="alert" id="err">
       Produit non supprimer.
    </div>
<?php
} 
?>