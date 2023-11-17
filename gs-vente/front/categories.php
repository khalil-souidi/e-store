<?php include "header.php" ?>
<title>Catégories</title>

<div class="container py-2" id="cat">
    <h4><i class="fa-solid fa-list" style="color: #000000;"></i> Categories</h4>
    <?php
    $categorie = $pdo->query("SELECT * FROM categorie")->fetchAll(PDO::FETCH_ASSOC);
    ?>
    <ul class="list-group list-group-flush">
        <?php foreach ($categorie as $cat) { ?>
            <li class="list-group-item">
                <a href="categorie?id=<?php echo $cat['id'] ?>" class="btn btn-light"><i class="<?php echo $cat['icone'] ?>" style="color: #000000;"></i> <?php echo $cat['libelle'] ?></a>
            </li>
        <?php } ?>
    </ul>
</div>

<div class="container">
    <nav id="search">
        <form class="form-inline">
            <input id="input_search" name="search_item" type="search" placeholder="Recherche" aria-label="Search">
            <button id="btn_search" type="submit"><i class="fa-solid fa-magnifying-glass" style="color: #000000;"></i></button>
        </form>
    </nav>

    <?php
    if (isset($_GET['search_item'])) {
        $search_item = $_GET['search_item'];
        $produits = $pdo->query("SELECT produits.*, categorie.libelle AS cat_libelle FROM produits JOIN categorie ON produits.id_categorie = categorie.id WHERE produits.libelle LIKE '%$search_item%'")->fetchAll(PDO::FETCH_ASSOC);
    } else {
        $produits = $pdo->query("SELECT produits.*, categorie.libelle AS cat_libelle FROM produits JOIN categorie ON produits.id_categorie = categorie.id")->fetchAll(PDO::FETCH_ASSOC);
    }
    ?>
    <div class="row">
        <?php foreach ($produits as $p) { ?>
            <div class="card mb-3 col-md-4">
                <img src="../upload/<?php echo $p['imagee'] ?>" class="card-img-top" alt="..." width="200" height="312">
                <div class="card-body">
                    <a href="produit?id=<?php echo $p['id'] ?>" class="btn stretched-link">Afficher details</a>
                    <h4 class="card-title"><?php echo $p['libelle'] ?></h4>
                    <h6 class="card-title"><?php echo $p['cat_libelle'] ?></h6>
                    <p class="card-text"><?php echo $p['descriptiion'] ?></p>
                    <h4><span class="badge bg-success"><?php echo $p['prix'] ?> MAD</span></h4>
                    <p class="card-text"><small class="text-muted">Ajoute le : <?php echo $p['date_creation'] ?></small></p>
                </div>
            </div>
        <?php } ?>
    </div>
</div>



<style>
@media screen and (max-width: 600px) {
  .card {
    width: 100%;
  }

  .card-img-top {
    width: 100%;
    height: auto;
  }

  .card-body {
    text-align: center;
  }
  
}

</style>
<?php include "footer.php" ?>
