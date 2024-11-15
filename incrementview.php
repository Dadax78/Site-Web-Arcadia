<?php
error_reporting(E_ALL);
ini_set('display_errors', 1);

session_start();
require 'db.php'; // Connexion à la base de données

header('Content-Type: application/json'); // Indique que la réponse est au format JSON

if (isset($_GET['animal_name'])) {
    $animal_name = $_GET['animal_name'];

    // Incrémente ou initialise le compteur de vues
    $stmt = $db->prepare("INSERT INTO animal_views (animal_name, view_count, last_viewed) 
                          VALUES (?, 1, NOW()) 
                          ON DUPLICATE KEY UPDATE view_count = view_count + 1, last_viewed = NOW()");
    $stmt->execute([$animal_name]);

    // Récupère le nouveau compteur de vues
    $stmt = $db->prepare("SELECT view_count FROM animal_views WHERE animal_name = ?");
    $stmt->execute([$animal_name]);
    $view_count = $stmt->fetchColumn();

    // Retourne le compteur mis à jour en JSON
    echo json_encode(["status" => "success", "view_count" => $view_count]);
} else {
    echo json_encode(["status" => "error", "message" => "Nom de l'animal manquant."]);
}
?>
