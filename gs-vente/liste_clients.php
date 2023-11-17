<?php include "includes/header.php"; ?>
<title>Liste Clients</title>
<div class="container py-2">
<?php 
if (!isset($_SESSION['utilisateurs'])) {
    echo "Accès refusé";
    die();
}
?>
<h4>Liste des clients</h4><br>
<?php 
$user = $pdo->query("SELECT * FROM clients")->fetchAll(PDO::FETCH_ASSOC);
?>
<table class="table">
  <thead class="thead-dark">
      <th scope="row">id</th>
      <th scope="row">username</th>
      <th scope="row">Numero de telephone</th>
      <th scope="row">date_creation</th>
      <th scope="row">Operation</th>
  </thead>
  <tbody>
    <?php 
    foreach($user as $us){?>
      <tr>
        <th><?php echo $us['id']?></th>
        <th><?php echo $us['username']?></th>
        <th>+212 <?php echo $us['num_tele']?></th>
        <th><?php echo $us['date_creation']?></th>
        <th>
        <a href="supprimer_client.php?id=<?php echo $us['id']?>" onclick="return confirm('voulez vous vraiment supprimer le client <?php echo $us['username'] ?>')" class="btn btn-danger">Supprimer</a>
      </th>
      </tr>
   <?php  } ?>
  </tbody>
</table>

</div>

<?php include "includes/footer.php"; ?> 
