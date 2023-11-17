<?php include "config.php"; ?>
<?php  
$id=$_GET['id'];
$supp=$pdo->prepare("DELETE FROM utilisateurs WHERE id = ?");
$supp->execute([$id]);
if($supp){
    header("location:liste_admin.php");
}
else{ ?>
    <div class="alert alert-danger" role="alert" id="err">
       Admin non supprimer.
    </div>
<?php
} 
?>