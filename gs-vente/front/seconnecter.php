<?php include "header.php"; ?>

<title>Connexion</title>
<div class="container py-2">

    <?php
    if (isset($_POST['submit2'])) {
        $username = $_POST['login2'];
        $num_tele = $_POST['tele'];
        $mdp = $_POST['mdp2'];
    
        if (empty($username) || empty($mdp) || empty($num_tele)) {
            ?>
            <div class="alert alert-danger" role="alert" id="err">
                Login, le mot de passe et le numéro de téléphone sont obligatoires!
            </div>
            <?php
        } else {
            $var = $pdo->prepare("SELECT * FROM clients WHERE username = :username");
            $var->execute([':username' => $username]);
            $data = $var->fetch(PDO::FETCH_ASSOC);
    
            if ($var->rowCount() > 0) {
                ?>
                <div class="alert alert-danger" role="alert" id="err">
                    Email existe déjà. Veuillez le changer.
                </div>
                <?php
            } else {
                $date = date('Y-m-d');
                $insert = $pdo->prepare("INSERT INTO clients (username, num_tele, motdepasse, date_creation) VALUES (:username, :num_tele, :motdepasse, :date_creation)");
                $insert->execute([
                    ':username' => $username,
                    ':num_tele' => $num_tele,
                    ':motdepasse' => password_hash($mdp, PASSWORD_DEFAULT),
                    ':date_creation' => $date,
                ]);
                ?>
                <div class="alert alert-success" role="alert" id="err">
                    Le compte <?php echo $username ?> a été ajouté avec succès.
                </div>
                <?php
            }
        }
    }
    ?>
    

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
        $login=$pdo->prepare("SELECT * FROM clients WHERE username = :username");
        $login->execute([':username' => $username]);
        $data = $login->fetch(PDO::FETCH_ASSOC);
        if ($login->rowCount() > 0) {
            if (password_verify($mdp, $data['motdepasse'])) {
                $_SESSION['clients']=$login->fetch(); ?>
                     <div class="alert alert-success" role="alert" id="err">
       vous etes bien connectee bienvenu dans votre espace <a href="categories.php">cliquez ici !</a>
        </div>
          <?php          } else { ?>

<div class="alert alert-danger" role="alert">
        Login et le mot de passe sont obligatoires !
        </div>

   <?php       }
        } else { ?>

            <div class="alert alert-danger" role="alert" id="err">
        Login ou le mot de passe est incorrect !
        </div>

  <?php      }
     
        }
    }
?>

    <div class="row" id="cat">
        <div class="col-md-6">
            <form method="POST"> 
                <div class="form-group">
                    <h4>Connexion</h4>
                    <label>email</label>
                    <input name="login" type="email" class="form-control" placeholder="Enter email">
                </div>
                <div class="form-group">
                    <label>Mot de passe</label>
                    <input name="mdp" type="password" class="form-control" placeholder="Mot de passe">
                </div>
                <button type="submit" name="submit" class="btn btn-primary">Connexion</button>
            </form>
        </div><br>
        <div class="col-md-6">
            <form method="POST"> 
                <div class="form-group">
                    <h4>Crée un compte</h4>
                    <label>email</label>
                    <input name="login2" type="email" class="form-control" placeholder="Enter email">
                    <span style="color:gray">email doit etre unique</span>
                </div>
                <div class="form-group">
                    <label>Numero de telephone</label>
                    <input name="tele" type="number" class="form-control" placeholder="Numero de telephone">
                </div>
                <div class="form-group">
                    <label>Mot de passe</label>
                    <input name="mdp2" type="password" class="form-control" placeholder="Mot de passe">
                </div>
                <button type="submit" name="submit2" class="btn btn-primary">Créer le compte</button>
            </form>
        </div><br>
    </div>
</div><br>     

<style>



</style>
<?php include "footer.php"; ?>
