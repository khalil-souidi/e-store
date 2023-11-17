<?php include "includes/header.php"; ?>
<title>Liste Commandes</title>
<div class="container py-2">
<?php 
if (!isset($_SESSION['utilisateurs'])) {
    echo "Accès refusé";
    die();
}
?>
<h4>Liste des commandes</h4><br>
<?php 
 $sql = "SELECT DATE_FORMAT(date_creation, '%Y-%m-%d %H:%i:%s') AS order_date, SUM(total) AS total_panier, email, num_tele 
 FROM panier 
 WHERE email IN (SELECT email FROM panier GROUP BY email)
 GROUP BY order_date, email
 ORDER BY order_date DESC";
$stmt = $pdo->prepare($sql);
$stmt->execute();
$result = $stmt->fetchAll(PDO::FETCH_ASSOC);
?>
<table class="table">
  <thead class="thead-dark">
      <th scope="row">Date</th>
      <th scope="row">Total</th>
      <th scope="row">Email</th>
      <th scope="row">Num telephone</th>
      <th scope="row">Operation</th>
      
  </thead>
  <tbody>
    <?php 
    foreach($result as $res){ ?>
      <tr>
        <th><?php echo $res['order_date']?></th>
        <th><?php echo $res['total_panier']?> MAD</th>
        <th><?php echo $res['email']?></th>
        <th>+212 <?php echo $res['num_tele']?></th>
        <th>
        <a href="voir_details.php?order_date=<?php echo $res['order_date']; ?>&email=<?php echo urlencode($res['email']); ?>" class="btn btn-info">voir details</a>
      </th>
      </tr>
   <?php } ?>
  </tbody>
</table>

</div>

<?php include "includes/footer.php"; ?>
