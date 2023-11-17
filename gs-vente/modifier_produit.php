<?php
include "includes/header.php";
?>
<title>Modifier Produit</title>
<div class="container py-2">

<?php 
$id = $_GET['id'];
$up = $pdo->prepare("SELECT * FROM produits WHERE id = ?");
$up->execute([$id]);
$produit = $up->fetch(PDO::FETCH_ASSOC);

if(isset($_POST['submit'])){
    $libelle = $_POST['libelle'];
    $prix = $_POST['prix'];
    $descriptiion = $_POST['descriptiion'];
    $id_categorie = $_POST['categorie'];

    if(empty($libelle) || empty($prix) || empty($descriptiion)){ 
?>
    <div class="alert alert-danger" role="alert">
        Libelle, prix, categorie, description et image sont obligatoires pour modifier !
    </div>
<?php  
    } else { 
        $date = date('Y-m-d');
        $filename='';
      if(!empty($_FILES['imagee']['name'])){
        $imagee=$_FILES['imagee']['name'];
        $filename=uniqid().$imagee;
        move_uploaded_file($_FILES['imagee']['tmp_name'],'upload/'.$filename); 
      }
      $query="UPDATE produits SET libelle = ?, prix = ?, id_categorie = ?, date_creation = ?, descriptiion = ?  WHERE id = ?";
       if(!empty($filename)){
        $query="UPDATE produits SET libelle = ?, prix = ?, id_categorie = ?, date_creation = ?, descriptiion = ?, imagee = ?  WHERE id = ?";
        $upd = $pdo->prepare($query);
        $upd->execute([$libelle, $prix, $id_categorie, $date, $descriptiion, $filename, $id]);
       }
       else{
        $query="UPDATE produits SET libelle = ?, prix = ?, id_categorie = ?, date_creation = ?, descriptiion = ?  WHERE id = ?";
        $upd = $pdo->prepare($query);
        $upd->execute([$libelle, $prix, $id_categorie, $date, $descriptiion, $id]);
    }
        
        if($upd){
?>
            <div class="alert alert-success" role="alert">
                Produit <?php echo $libelle ?> modifie avec succès
            </div>
            <small style="color: gray;">Veuillez consulter la liste des produits</small>
<?php 
        } else {
?>
            <div class="alert alert-danger" role="alert">
                Une erreur s'est produite lors de la modification du produit.
            </div>
<?php 
        }
    }
}
?>

<form method="POST" enctype="multipart/form-data">
    <h4>Modifier produit</h4>
    <div class="form-group">
        <input type="hidden" name="id" value="<?php echo $produit['id'] ?>">
        <label>Libelle</label>
        <input name="libelle" type="text" class="form-control" placeholder="libelle" value="<?php echo $produit['libelle'] ?>">
    </div>
    <div class="form-group">
        <label>Prix</label>
        <input name="prix" type="number" class="form-control" placeholder="prix" value="<?php echo $produit['prix'] ?>">
    </div>
    <div class="form-group">
    <label>Description</label>
    <input name="descriptiion" type="text" class="form-control" placeholder="Description"  value="<?php echo $produit['descriptiion']?>">
  </div>
  <div class="form-group">
    <label>Image</label>
    <input name="imagee" type="file" class="form-control" placeholder="Image">
    <img width="200px" class="img img-fluid" src="upload/<?php echo $produit['imagee'] ?>">
  </div>
    <?php 
        $categories = $pdo->query("SELECT * FROM categorie")->fetchAll(PDO::FETCH_ASSOC);
    ?>
    <label>Categorie</label>
    <select name="categorie" class="form-control">
        <option value="">choisissez une categorie</option>
        <?php 
        foreach ($categories as $cat) {
            if($produit['id_categorie'] == $cat['id']) {
                echo "<option selected value=" . $cat['id'] . ">" . $cat['libelle'] . "</option>";
            } else {
                echo "<option value=" . $cat['id'] . ">" . $cat['libelle'] . "</option>";
            }
        }
        ?>
    </select><br>

    <button type="submit" name="submit" class="btn btn-primary">Modifier</button>
</form>
</div>

<?php
include "includes/footer.php";
?>
