<?php include "includes/header.php"; ?>
<title>Liste Produits</title>
<div class="container py-2">
<?php 
if (!isset($_SESSION['utilisateurs'])) {
    echo "Accès refusé";
    die();
}
?>
<h4>Liste des produits</h4><br>
<a href="ajouter_produit" class="btn btn-primary">Ajouter produit</a><br><br>
<?php 
$produit = $pdo->query("SELECT produits.*, categorie.libelle as 'categorie_libelle' 
FROM produits INNER JOIN categorie ON produits.id_categorie = categorie.id")->fetchAll(PDO::FETCH_ASSOC);
?>
<table class="table">
  <thead class="thead-dark">
      <th scope="row">id</th>
      <th scope="row">Libelle</th>
      <th scope="row">prix</th>
      <th scope="row">categorie</th>
      <th scope="row">Image</th>
      <th scope="row">Date de creation</th>
      <th scope="row">Operation</th>
  </thead>
  <tbody>
    <?php 
    foreach($produit as $prod){?>
      <tr>
        <th><?php echo $prod['id']?></th>
        <th><?php echo $prod['libelle']?></th>
        <th><?php echo $prod['prix']?> MAD</th>
        <th><?php echo $prod['categorie_libelle']?></th>
        <th><img class="img img-fluid" width="100" src="upload/<?php echo $prod['imagee']?>" alt=""></th>
        <th><?php echo $prod['date_creation']?></th>
        <th>
        <a href="modifier_produit.php?id=<?php echo $prod['id']?>" class="btn btn-primary">Modifier</a>
        <a href="supprimer_produit.php?id=<?php echo $prod['id']?>" onclick="return confirm('voulez vous vraiment supprimer le produit <?php echo $prod['libelle'] ?>')" class="btn btn-danger">Supprimer</a>
      </th>
      </tr>
   <?php  } ?>
  </tbody>
</table>

</div>

<?php include "includes/footer.php"; ?> 
