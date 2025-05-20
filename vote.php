<?php
require 'config.php';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $id_electeur = $_POST['id_electeur'];
    $id_candidat = $_POST['id_candidat'];
    $date_vote = date('Y-m-d H:i:s');

    // Vérifie que l'électeur n’a pas déjà voté
    $check = $pdo->prepare("SELECT * FROM votes WHERE id_electeur = ?");
    $check->execute([$id_electeur]);

    if ($check->rowCount() > 0) {
        echo "Vous avez déjà voté.";
    } else {
        $stmt = $pdo->prepare("INSERT INTO votes (id_electeur, id_candidat, date_vote)
                               VALUES (?, ?, ?)");
        $stmt->execute([$id_electeur, $id_candidat, $date_vote]);
        echo "Vote enregistré.";
    }
}
?>
