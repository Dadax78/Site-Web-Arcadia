<?php
include 'db_connection.php';

$username = "exempleUser";
$password = password_hash("exempleMotDePasse", PASSWORD_DEFAULT);
$nom = "Dupont";
$prenom = "Jean";

$sql = "INSERT INTO utilisateur (username, password, nom, prenom) VALUES ('$username', '$password', '$nom', '$prenom')";

if ($conn->query($sql) === TRUE) {
    echo "Nouvel utilisateur ajouté avec succès";
} else {
    echo "Erreur : " . $sql . "<br>" . $conn->error;
}

$conn->close();
?>
