<?php
include "includes/header.php";
?>
<title>Modifier Categorie</title>
<div class="container py-2">

<?php 
$id = $_GET['id'];
$mod = $pdo->prepare("SELECT * FROM categorie WHERE id = ?");
$mod->execute([$id]);
$categorie = $mod->fetch(PDO::FETCH_ASSOC);

if(isset($_POST['submit'])){
    $libelle = $_POST['libelle'];
    $descriptiion = $_POST['descriptiion']; 
    $icone = $_POST['icone'];
    if(empty($libelle) || empty($descriptiion) || empty($icone)){ 
?>
    <div class="alert alert-danger" role="alert">
        Libelle et descriptiion sont obligatoires pour modifier!
    </div>
<?php  
    } else { 
        $date = date('Y-m-d');
        $upd = $pdo->prepare("UPDATE categorie SET libelle = ?, descriptiion = ?, date_creation = ?, icone = ? WHERE id = ?");
        if($upd->execute([$libelle, $descriptiion, $date, $icone, $id])){
?>
            <div class="alert alert-success" role="alert">
                Categorie <?php echo $libelle ?> modifiee avec succès
            </div>
            <small style="color: gray;">Veuillez consulter la liste des categories</small>
<?php
        } else {
?>
            <div class="alert alert-danger" role="alert">
                Une erreur s'est produite lors de la modification de la categorie.
            </div>
<?php
        }
    }
}
?>

<form method="POST">
    <h4>Modifier categorie</h4>
    <div class="form-group">
        <input type="hidden" name="id" type="text" class="form-control" placeholder="id" value="<?php echo $categorie['id'] ?>">
    </div>
    <div class="form-group">
        <label>Libelle</label>
        <input name="libelle" type="text" class="form-control" placeholder="libelle" value="<?php echo $categorie['libelle'] ?>">
    </div>
    <div class="form-group">
        <label>Description</label>
        <textarea class="form-control" name="descriptiion" cols="30" rows="10"><?php echo $categorie['descriptiion'] ?></textarea>
    </div>
    <div class="form-group">
        <label>Icone</label>
        <input name="icone" type="text" class="form-control" placeholder="icone" value="<?php echo $categorie['icone'] ?>">
    </div>
    <button type="submit" name="submit" class="btn btn-primary">Modifier</button>
</form>

<?php
include "includes/footer.php";
?>
