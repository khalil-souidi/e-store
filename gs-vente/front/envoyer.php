<?php include "header.php"; ?>
<title>Confirmer la commande</title>

<?php
$total_panier = 0; 

if (isset($_POST['submit'])) {
    foreach ($_SESSION['panier'] as $item) {
        $id_produit = $item['produit'];
        $nom_produit = $item['nomprod'];
        $quantite = $item['quantite'];
        $total = $item['total'];

        $email = $_POST['email'];
        $num_tele = $_POST['tele'];

        $stmt = $pdo->prepare("INSERT INTO panier (id_produit, nom_produit, quantite, total, email, num_tele) VALUES (?, ?, ?, ?, ?, ?)");
        $stmt->execute([$id_produit, $nom_produit, $quantite, $total, $email, $num_tele]);
    }

?>    <div class="alert alert-success" role="alert" id="err">
Votre commande a été envoyée avec succès. Un de nos responsables va vous contacter pour la confirmation. Merci pour votre confiance <i class="fa-regular fa-face-smile-wink" style="color: #000000;"></i> .
</div>
<?php }
else {
    // Calculate  le total_panier avant de clique sur submit
    foreach ($_SESSION['panier'] as $item) {
        $total_panier += $item['total'];
    } }
?>


<div class="container" id="cat">
    <div id="about_cnt">
        <form method="POST">
            <div class="form-group">
                <h4>Confirmer la commande</h4>
                <label>email</label>
                <input name="email" type="mail" class="form-control">
            </div>
            <div class="form-group">
                <label>Numero de telephone</label>
                <input name="tele" type="number" class="form-control">
            </div>
            <p>livraision gratuit <i class="fa-regular fa-face-smile-wink" style="color: #000000;"></i> .</p>
            <div class="form-group">
                <label>Le total est</label>
                <input disabled value="<?php echo $total_panier ?>">MAD
            </div>
            <button type="submit" name="submit" class="btn btn-primary">Envoyer la commande</button>
        </form>
    </div>
</div>

<style>
    @media screen and (max-width: 600px) {
    .form-group {
        margin-bottom: 15px;
    }

    .form-control {
        width: 100%;
    }
}
</style>
<?php include "footer.php" ?>
