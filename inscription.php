<?php
require 'config.php';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $prenom = $_POST['prenom'];
    $nom = $_POST['nom'];
    $email = $_POST['email'];
    $date_naissance = $_POST['date_naissance'];
    $num_cni = $_POST['num_cni'];
    $adresse = $_POST['adresse'];

    $sql = "INSERT INTO electeurs (prenom, nom, email, date_naissance, num_cni, adresse)
            VALUES (?, ?, ?, ?, ?, ?)";
    $stmt = $pdo->prepare($sql);

    try {
        $stmt->execute([$prenom, $nom, $email, $date_naissance, $num_cni, $adresse]);
        echo "Inscription réussie.";
    } catch (PDOException $e) {
        echo "Erreur : " . $e->getMessage();
    }
}
?>
