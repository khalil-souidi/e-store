<?php include "config.php"; ?>
<?php  
$id=$_GET['id'];
$supp=$pdo->prepare("DELETE FROM clients WHERE id = ?");
$supp->execute([$id]);
if($supp){
    header("location:liste_clients.php");
}
else{ ?>
    <div class="alert alert-danger" role="alert" id="err">
       client non supprimer.
    </div>
<?php
} 
?>