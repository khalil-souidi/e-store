<?php include "includes/header.php"; ?>
<title>Categorie</title>
<div class="container py-2">
<?php 
if (!isset($_SESSION['utilisateurs'])) {
    echo "Accès refusé";
    die();
}
?>
<?php 
if(isset($_POST['submit'])){
    $libelle = $_POST['libelle'];
    $descriptiion = $_POST['descriptiion'];
    $icone=$_POST['icone'];
    if(empty($libelle) || empty($descriptiion || empty($icone))){ 
    ?>
    <div class="alert alert-danger" role="alert">
    Libelle, description et icone sont obligatoires !
    </div>
<?php  
    } else { 
        $date = date('Y-m-d');
        $insert = $pdo->prepare("INSERT INTO categorie (libelle, descriptiion, date_creation, icone) VALUES (:libelle, :descriptiion, :date_creation, :icone)");
        $insert->execute([
            ':libelle' => $libelle,
            ':descriptiion' => $descriptiion,
            ':date_creation' => $date,
            ':icone'=> $icone,
        ]);
        ?>
    <div class="alert alert-success" role="alert">
    Categorie <?php echo $libelle ?> ajoutée avec succès
    </div>
    <small style="color: gray;">Veuillez consulter la liste des categories</small>
    <?php
      
    }
}
?>

<form method="POST">
<div class="form-group">
    <h4>Ajouter categorie</h4>

    <label>Icone</label>
    <input name="icone" type="text" class="form-control" placeholder="icone">
    <p><small>lien : <a target="_blank" href="https://fontawesome.com/search?o=r&m=free&f=classic">fontawesome.com</a></small></p>
  </div>
  <div class="form-group">
    <label>Libelle</label>
    <input name="libelle" type="text" class="form-control" placeholder="libelle">
  </div>
  <div class="form-group">
    <label>Description</label>
    <textarea class="form-control" name="descriptiion" cols="30" rows="5"></textarea>
  </div>
  <button type="submit" name="submit" class="btn btn-primary">Ajouter</button>
</form>
</div>

<?php include "includes/footer.php"; ?> 
