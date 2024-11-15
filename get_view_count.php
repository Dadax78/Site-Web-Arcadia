<?php
error_reporting(E_ALL);
ini_set('display_errors', 1);

require 'db.php'; 

header('Content-Type: application/json'); 

if (isset($_GET['animal_name'])) {
    $animal_name = $_GET['animal_name'];

    $stmt = $db->prepare("SELECT view_count FROM animal_views WHERE animal_name = ?");
    $stmt->execute([$animal_name]);
    $view_count = $stmt->fetchColumn();

    if ($view_count !== false) {
        echo json_encode(["status" => "success", "view_count" => $view_count]);
    } else {
    
        echo json_encode(["status" => "error", "message" => "Animal non trouvé."]);
    }
} else {
    echo json_encode(["status" => "error", "message" => "Nom de l'animal manquant."]);
}
?>
