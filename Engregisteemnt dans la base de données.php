// Exemple d'insertion dans la base de données
$sql = "INSERT INTO visites (animal_id, date_passage, etat, grammage, notes) VALUES (?, ?, ?, ?, ?)";
$stmt = $pdo->prepare($sql);
$stmt->execute([$animal_id, $date_passage, $etat, $grammage, $notes]);
