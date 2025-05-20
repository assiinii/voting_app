<?php
require 'config.php';

$sql = "SELECT e.nom, e.prenom, e.num_cni, b.nom AS bureau
        FROM electeurs e
        JOIN liste_electorale le ON e.id_electeur = le.id_electeur
        JOIN bureau_vote b ON le.id_bureau = b.id_bureau";
$stmt = $pdo->query($sql);

while ($row = $stmt->fetch(PDO::FETCH_ASSOC)) {
    echo "{$row['prenom']} {$row['nom']} - CNI: {$row['num_cni']} - Bureau: {$row['bureau']}<br>";
}
?>
