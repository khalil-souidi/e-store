<?php include "includes/header.php"; ?>
<title>Admin</title>
<?php 
if (!isset($_SESSION['utilisateurs'])) { ?>

<div class="alert alert-danger" role="alert" id="err">
        Acces refusé
    </div>

<?php
die();
}
?>

<style>
    body {
        background: url("upload/admin_page.png");
        background-size: cover;
        background-repeat: no-repeat;
    }
</style>
<?php include "includes/footer.php"; ?> 
