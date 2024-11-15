<?php
include 'db_connection.php';

$utilisateur_id = 1;  // ID de l'utilisateur
$role_id = 2;         // ID du rôle

$sql = "INSERT INTO possede (utilisateur_id, role_id) VALUES ($utilisateur_id, $role_id)";

if ($conn->query($sql) === TRUE) {
    echo "Utilisateur associé au rôle avec succès";
} else {
    echo "Erreur : " . $sql . "<br>" . $conn->error;
}

$conn->close();
?>
