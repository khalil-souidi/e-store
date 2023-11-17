<?php include "header.php"; ?>
<?php
if (!isset($_SESSION['clients'])) {
?>
    <div class="alert alert-danger" role="alert" id="err">
        Merci de vous connecter à votre compte <a href="seconnecter.php">cliquez ici !</a>
    </div>
<?php
    die();
}

?>

<div id="cat">
    <?php
    if (!empty($_POST['id']) && !empty($_POST['qte'])) {
      $id = $_POST['id'];
      $qte = $_POST['qte'];
      $total_panier=0;
        if (!isset($_SESSION['panier'])) {
            $_SESSION['panier'] = array();
        }
        $p = $pdo->prepare("SELECT * FROM produits WHERE id = ?"); 
        $p->execute([$id]);
        $produit = $p->fetch(PDO::FETCH_ASSOC);
        if ($produit) {
            $_SESSION['panier'][] = array(
                'id' => $id,
                'imagee' => $produit['imagee'],
                'nomprod' => $produit['libelle'],
                'produit' => $produit['id'],
                'prix' => $produit['prix'],
                'quantite' => $qte,
                'total' => $qte*$produit['prix']
            );
            ?>
<div class="container py-2">
<table class="table">
  <thead class="thead-dark">
      <th scope="row">Image</th>
      <th scope="row">Nom produit</th>
      <th scope="row">Prix</th>
      <th scope="row">Quantite</th>
      <th scope="row">Total</th>
  </thead>
  <tbody>
    <?php 
    foreach($_SESSION['panier'] as $item){  ?>
         <tr>
      <th><img class="img img-fluid" width="100" src="../upload/<?php echo $item['imagee']?>" alt=""></th>
        <th><?php echo $item['nomprod']?></th>
        <th><?php echo $item['prix']?> MAD</th>
        <th><?php echo $item['quantite']?></th>
        <th><?php echo $item['total']?> MAD</th>
        <?php $total_panier += $item['total']; ?>
      </tr>
   <?php } ?>
  </tbody>
</table><br>
<div id="total">Total: MAD<input disabled type="text" value="<?php echo $total_panier ?>"></div><a href="envoyer.php" name=submit class="btn btn-primary">passe commande</a> <br><br>
   <?php    } 
    } else { ?> 
    <div class="alert alert-danger" role="alert" id="err">
       Votre panier est vide.
    </div><br><br><br><br><br>
       
  <?php  }
    ?>
</div></div>

<?php include "footer.php" ?>
