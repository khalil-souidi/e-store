<?php include "header.php" ?>

<?php 
$id = $_GET['id'];
$st = $pdo->prepare("SELECT * FROM produits WHERE id = ?");
$st->execute([$id]);
$produit = $st->fetch(PDO::FETCH_ASSOC);
?>

<title>Produit | <?php echo $produit['libelle'] ?></title>
<div class="container py-2" id="cat">
    <h4><?php echo $produit['libelle'] ?></h4>
</div>

<div class="container">
    <div class="row">
        <div class="col-md-6">
            <img class="img img-fluid h-75" src="../upload/<?php echo $produit['imagee'] ?>" alt="">
        </div>
        <div class="col-md-6">
            <h1><?php echo $produit['libelle'] ?></h1>
            <h4><span class="badge bg-success"><?php echo $produit['prix'] ?> MAD</span></h4>
            <p><?php echo $produit['descriptiion'] ?></p>
           
            <hr> 
            <form method="POST" action="ajouter_panier.php">
            <div class="cardfooter">   
            <div class="counter d-flex" > 
            <?php $id_prod=$produit['id']; ?>
            <button onclick="return false" class="btn btn-primary" id="counter-plus">+</button>
            <input type="hidden" name="id" type="text" value="<?php echo $id_prod ?>">
            <input type="number" name="qte" id="qte" value="1">
            <button onclick="return false" class="btn btn-primary" id="counter-moins">-</button>
            </div>
        </div> </hr><br>
        <button type="submit" class="btn btn-primary">Ajouter au panier</button></form>
    </div>
</div>

<div class="container">
    <h1>Produit Similaire</h1>
    <?php 
    $id_categorie = $produit['id_categorie'];
    $produits_similaires = $pdo->prepare("SELECT * FROM produits WHERE id_categorie = ? AND id != ? LIMIT 3"); //id_categorie=id and display only 3 products
    $produits_similaires->execute([$id_categorie, $id]);
    $similaires = $produits_similaires->fetchAll(PDO::FETCH_ASSOC);
    ?>
    <div class="row">
        <?php foreach($similaires as $p) { ?>
            <div class="card mb-3 col-md-4">
                <img src="../upload/<?php echo $p['imagee'] ?>" class="card-img-top" alt="..." width="200" height="312">
                <div class="card-body">
                    <a href="produit?id=<?php echo $p['id'] ?>" class="btn stretched-link">Afficher détails</a>
                    <h5 class="card-title"><?php echo $p['libelle'] ?></h5>
                    <p class="card-text"><?php echo $p['descriptiion'] ?></p>
                    <h4><span class="badge bg-success"><?php echo $p['prix'] ?> MAD</span></h4>
                    <p class="card-text"><small class="text-muted">Ajouté le : <?php echo $p['date_creation'] ?></small></p>
                </div>
            </div>
        <?php } ?>
    </div>
</div>
<?php include "footer.php" ;?>
