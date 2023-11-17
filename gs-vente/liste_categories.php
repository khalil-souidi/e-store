<?php include "includes/header.php"; ?>
<title>Liste Categories</title>
<div class="container py-2">
<?php 
if (!isset($_SESSION['utilisateurs'])) {
    echo "Accès refusé";
    die();
}
?>
<h4>Liste des categories</h4><br>
<a href="ajouter_categorie" class="btn btn-primary">Ajouter categorie</a><br><br>
<?php 
$categorie = $pdo->query("SELECT * FROM categorie")->fetchAll(PDO::FETCH_ASSOC);
?>
<table class="table">
  <thead class="thead-dark">
      <th scope="row">id</th>
      <th scope="row">Libelle</th>
      <th scope="row">Description</th>
      <th scope="row">Date de creation</th>
      <th scope="row">icone</th>
      <th scope="row">Operation</th>
  </thead>
  <tbody>
    <?php 
    foreach($categorie as $cat){ ?>
      <tr>
        <th><?php echo $cat['id']?></th>
        <th><?php echo $cat['libelle']?></th>
        <th><?php echo $cat['descriptiion']?></th>
        <th><?php echo $cat['date_creation']?></th>
        <th><i class="<?php echo $cat['icone']?>"></i></th>
        <th>
        <a href="modifier_categorie.php?id=<?php echo $cat['id']?>" class="btn btn-primary">Modifier</a>
        <a href="supprimer_categorie.php?id=<?php echo $cat['id']?>" onclick="return confirm('voulez vous vraiment supprimer la categorie <?php echo $cat['libelle'] ?>')" class="btn btn-danger">Supprimer</a>
      </th>
      </tr>
   <?php } ?>
  </tbody>
</table>

</div>

<?php include "includes/footer.php"; ?> 
