<?php
// Après la connexion à la base de données

$animal_name = "Lion d'Afrique"; // Récupérez dynamiquement le nom de l'animal
$stmt = $db->prepare("SELECT view_count FROM animal_views WHERE animal_name = ?");
$stmt->execute([$animal_name]);
$views = $stmt->fetchColumn();

echo "<p>Nombre de vues : " . ($views ? $views : 0) . "</p>"; // Affiche 0 si aucune vue
?>
