<?php include "config.php"; ?>
<?php  
$id=$_GET['id'];
$supp=$pdo->prepare("DELETE FROM categorie WHERE id = ?");
$supp->execute([$id]);
if($supp){
    header("location:liste_categories.php");
}
else{ ?>
    <div class="alert alert-danger" role="alert" id="err">
       categorie non supprimer.
    </div>
<?php
} 
?>