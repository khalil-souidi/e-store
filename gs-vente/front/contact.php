<?php  include "header.php"; ?>
<title>Contactez-nous</title>
<?php

if(isset($_POST['submit'])) {
    $username = $_POST['username'];
    $email = $_POST['email'];
    $messsage = $_POST['messsage']; 
    if(empty($username) || empty($email) || empty($messsage)) { 
        ?>
        <div id="err" class="alert alert-danger" role="alert">
            Nom, email et message sont obligatoires !
        </div>
        <?php  
    } else { 
        $date = date('Y-m-d');
        $insert = $pdo->prepare("INSERT INTO contact (username, email, messsage, date_creation) VALUES (:username, :email, :messsage, :date_creation)");
        $insert->execute([
            ':username' => $username,
            ':email' => $email,
            ':messsage' => $messsage, 
            ':date_creation' => $date,
        ]);
        ?>
        <div id="err" class="alert alert-success" role="alert">
            Votre message a été envoyé avec succès Merci <i class="fa-regular fa-face-smile-wink" style="color: #000000;"></i> .
        </div>
        <?php
    }
}
?>

<div id="cat">
    <form method="POST" id="fr">
        <div class="form-group">
            <h4>Contactez-nous</h4>
            <label>Nom et prénom</label> 
            <input name="username" type="text" class="form-control">
        </div>
        <div class="form-group">
            <label>Email</label>
            <input name="email" type="email" class="form-control">
        </div>
        <div class="form-group">
            <label>Message</label>
            <textarea class="form-control" name="messsage" cols="30" rows="5"></textarea> 
        </div>
        <button type="submit" name="submit" class="btn btn-primary">Envoyer</button>
    </form>
</div>

<style>
    @media screen and (max-width: 600px) {
    #fr {
        max-width: 100%;
    }

    .form-group {
        margin-bottom: 15px;
    }

    .form-control {
        width: 100%;
    }
}
</style>

<?php include "footer.php"; ?>
