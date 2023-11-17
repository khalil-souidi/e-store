<?php include "includes/header.php"; ?>
<title>Connexion</title>
<div class="container py-2">
<?php 
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
        $login=$pdo->prepare("SELECT * FROM utilisateurs WHERE username = :username");
        $login->execute([':username' => $username]);
        $data = $login->fetch(PDO::FETCH_ASSOC);

        if ($login->rowCount() > 0) {
            if (password_verify($mdp, $data['motdepasse'])) {
                $_SESSION['utilisateurs']=$login->fetch();
                header("location:admin.php");
            } else { ?>
                <div class="alert alert-danger" role="alert" id="err">
       Login ou le mot de passe est incorrect.
    </div>
         <?php   }
        } else { ?>
            <div class="alert alert-danger" role="alert" id="err">
       Login ou le mot de passe est incorrect.
    </div>
   <?php     }
     
        }
    }
?>

<form method="POST">
  <div class="form-group">
    <h4>Connexion</h4>
    <label>Nom d'utilisateur</label>
    <input name="login" type="text" class="form-control" placeholder="Enter email">
  </div>
  <div class="form-group">
    <label>Mot de passe</label>
    <input name="mdp" type="password" class="form-control" placeholder="Mot de passe">
  </div>

    <button type="submit" name="submit" class="btn btn-primary">Connexion</button>
</form>
</div>

<?php include "includes/footer.php"; ?> 
