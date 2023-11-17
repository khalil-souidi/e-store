<?php include "includes/header.php"; ?>
<title>Produit</title>
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
    $prix = $_POST['prix']; 
    $descriptiion=$_POST['descriptiion'];
    $id_categorie = $_POST['categorie'];
    if(empty($libelle) || empty($prix) || empty($id_categorie) || empty($descriptiion)){ 
    ?>
    <div class="alert alert-danger" role="alert">
    Libelle, prix, categorie, description et image sont obligatoires !
    </div>
<?php  
    } else { 

      $filename='';
      if(!empty($_FILES['imagee']['name'])){
        $imagee=$_FILES['imagee']['name'];
        $filename=uniqid().$imagee;
        move_uploaded_file($_FILES['imagee']['tmp_name'],'upload/'.$filename); 
      }

        $date = date('Y-m-d');
        $insert = $pdo->prepare("INSERT INTO produits (libelle, prix, id_categorie, date_creation, descriptiion, imagee) VALUES (:libelle, :prix, :id_categorie, :date_creation, :descriptiion, :imagee)");
        $insert->execute([
            ':libelle' => $libelle,
            ':prix' => $prix,
            ':id_categorie' => $id_categorie,
            ':date_creation' => $date,
            ':descriptiion' => $descriptiion,
            ':imagee' => $filename,
        ]);
        ?>
    <div class="alert alert-success" role="alert">
    Produit <?php echo $libelle ?> ajoutée avec succès
    </div>
    <small style="color: gray;">Veuillez consulter la liste des produits</small>
    <?php
      
    }
}
?>

<form method="POST" enctype="multipart/form-data">
  <div class="form-group">
    <h4>Ajouter produit</h4>
    <label>Libelle</label>
    <input name="libelle" type="text" class="form-control" placeholder="libelle">
  </div>
  <div class="form-group">
    <label>Prix</label>
    <input name="prix" type="number" class="form-control" placeholder="prix">
  </div>
  <div class="form-group">
    <label>Description</label>
    <textarea class="form-control" name="descriptiion" cols="30" rows="5"></textarea>
  </div>
  <div class="form-group">
    <label>Image</label>
    <input name="imagee" type="file" class="form-control" placeholder="Image">
  </div>
  <?php 
$categorie = $pdo->query("SELECT * FROM categorie")->fetchAll(PDO::FETCH_ASSOC);

  ?>
  <label>Categorie</label>
<select name="categorie" class="form-control">
  <option value="">choisissez une categorie</option>
  <?php 
  foreach ($categorie as $cat) {
    echo "<option value=" . $cat['id'] . ">" . $cat['libelle'] . "</option>";
  }
  ?>
</select><br>

  <button type="submit" name="submit" class="btn btn-primary">Ajouter</button>
</form>
</div>

<?php include "includes/footer.php"; ?> 
