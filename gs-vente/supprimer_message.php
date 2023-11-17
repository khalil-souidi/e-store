<?php include "config.php"; ?>
<?php  
$id=$_GET['id'];
$supp=$pdo->prepare("DELETE FROM contact WHERE id = ?");
$supp->execute([$id]);
if($supp){
    header("location:liste_messages.php");
}
else{ ?>
    <div class="alert alert-danger" role="alert" id="err">
       Message non supprimer.
    </div>
<?php
} 
?>