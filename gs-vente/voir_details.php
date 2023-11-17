<?php include "includes/header.php"; ?>
<title>Details de commande</title>
<div class="container py-2">
<?php 
if (!isset($_SESSION['utilisateurs'])) {
    echo "Accès refusé";
    die();
}

$order_date = $_GET['order_date'];
$email = $_GET['email'];

// Convert the order_date back to the original format (Y-m-d H:i:s)
$forma_date = date('Y-m-d H:i:s', strtotime($order_date));

$sql = "SELECT * FROM panier WHERE DATE_FORMAT(date_creation, '%Y-%m-%d %H:%i:%s') = ? AND email = ?";
$stmt = $pdo->prepare($sql);
$stmt->execute([$forma_date, $email]);
$orderItems = $stmt->fetchAll(PDO::FETCH_ASSOC);
?>

<h4>Details commande</h4><br>
<table class="table">
    <thead class="thead-dark">
        <th scope="col">Nom produit</th>
        <th scope="col">Quantite</th>
        <th scope="col">Total</th>
    </thead>
    <tbody>
        <?php foreach ($orderItems as $item) { ?>
            <tr>
                <td><?php echo $item['nom_produit']; ?></td>
                <td><?php echo $item['quantite']; ?></td>
                <td><?php echo $item['total']; ?></td>
            </tr>
        <?php } ?>
    </tbody>
</table>

</div>

<?php include "includes/footer.php"; ?>
