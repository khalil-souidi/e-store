<?php include "includes/header.php"; ?>
<title>Liste Messages</title>
<div class="container py-2">
<?php 
if (!isset($_SESSION['utilisateurs'])) {
    echo "Accès refusé";
    die();
}
?>
<h4>Liste des messages</h4><br>
<?php 
$messages = $pdo->query("SELECT * FROM contact ORDER BY date_creation DESC")->fetchAll(PDO::FETCH_ASSOC);
?>
<table class="table">
  <thead class="thead-dark">
      <th scope="row">id</th>
      <th scope="row">Nom prenom</th>
      <th scope="row">Email</th>
      <th scope="row">Message</th>
      <th scope="row">Date de creation</th>
      <th scope="row">Operation</th>
  </thead>
  <tbody>
    <?php 
    foreach($messages as $msg){ ?>
      <tr>
        <th><?php echo $msg['id']?></th>
        <th><?php echo $msg['username']?></th>
        <th><?php echo $msg['email']?></th>
        <th><?php echo $msg['messsage']?></th>
        <th><?php echo $msg['date_creation']?></th>
        <th>
        <a href="supprimer_message.php?id=<?php echo $msg['id']?>" onclick="return confirm('voulez vous vraiment supprimer le message de <?php echo $msg['username'] ?>')" class="btn btn-danger">Supprimer</a>
      </th>
      </tr>
   <?php } ?>
  </tbody>
</table>

</div>

<?php include "includes/footer.php"; ?> 
