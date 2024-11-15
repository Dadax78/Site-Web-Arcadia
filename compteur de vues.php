<?php
session_start();
require 'db.php'; // Connexion à la base de données

// Supposons que le nom de l'animal soit passé via GET
$animal_name = $_GET['animal_name'];

// Vérifiez que l'animal existe (facultatif, mais recommandé)
$stmt = $db->prepare("SELECT * FROM animals WHERE name = ?");
$stmt->execute([$animal_name]);
$animal = $stmt->fetch();

if ($animal) {
    // Incrémenter le compteur de vues
    $stmt = $db->prepare("INSERT INTO animal_views (animal_name, view_count, last_viewed) VALUES (?, 1, NOW()) ON DUPLICATE KEY UPDATE view_count = view_count + 1, last_viewed = NOW()");
    $stmt->execute([$animal_name]);

    // Récupérer le nombre de vues
    $stmt = $db->prepare("SELECT view_count FROM animal_views WHERE animal_name = ?");
    $stmt->execute([$animal_name]);
    $views = $stmt->fetchColumn();
    
    // Affichage des informations sur l'animal
    echo "<h1>" . htmlspecialchars($animal['name']) . "</h1>";
    echo "<p>Nombre de vues : " . $views . "</p>";
    // Afficher d'autres informations sur l'animal ici
} else {
    echo "Animal non trouvé.";
}
?>
