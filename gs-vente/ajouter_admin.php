<?php include "includes/header.php"; ?>
<title>E-store</title>
<div class="container py-2">
<?php 
if (!isset($_SESSION['utilisateurs'])) {
    echo "Accès refusé";
    die();
}

if(isset($_POST['submit'])){
    $username = $_POST['login'];
    $mdp = $_POST['mdp'];
    if(empty($username) || empty($mdp)){ 
?>
    <div class="alert alert-danger" role="alert">
        Login et le mot de passe sont obligatoires !
    </div>
<?php  
    } else { 
        $date = date('Y-m-d');
        $insert = $pdo->prepare("INSERT INTO utilisateurs (username, motdepasse, date_creation) VALUES (:username, :motdepasse, :date_creation)");
        $insert->execute([
            ':username' => $username,
            ':motdepasse' => password_hash($mdp, PASSWORD_DEFAULT),
            ':date_creation' => $date,
        ]);
?>
        <div class="alert alert-success" role="alert">
            Admin <?php echo $username ?> ajoutée avec succès
        </div>
<?php
    }
}
?>

<form method="POST">
    <div class="form-group">
        <h4>Ajouter Admin</h4>
        <label>Nom d'utilisateur</label>
        <input name="login" type="text" class="form-control" placeholder="Enter email">
    </div>
    <div class="form-group">
        <label>Mot de passe</label>
        <input name="mdp" type="password" class="form-control" placeholder="Mot de passe">
    </div>

    <button type="submit" name="submit" class="btn btn-primary">Ajouter</button>
</form>
</div>

<?php include "includes/footer.php"; ?> 
