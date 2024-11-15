<?php
include 'db_connection.php';

$sql = "SELECT * FROM animal";
$result = $conn->query($sql);

if ($result->num_rows > 0) {
    while($row = $result->fetch_assoc()) {
        echo "ID: " . $row["animal_id"]. " - Prénom: " . $row["prenom"]. " - État: " . $row["etat"]. "<br>";
    }
} else {
    echo "Aucun résultat";
}

$conn->close();
?>
