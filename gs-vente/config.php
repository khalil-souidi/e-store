<?php 
try {
    $pdo = new PDO("mysql:host=localhost;dbname=estore", "root", "");
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    } catch (PDOException $e) {
    echo "Erreur : " . $e->getMessage();
    }
?>