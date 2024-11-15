<?php
session_start();
require 'db.php'; // Connexion à la base de données

// Vérification que l'utilisateur est bien un employé
if (!isset($_SESSION['user_id']) || $_SESSION['role'] !== 'employe') {
    header('Location: login.php');
    exit;
}

// Récupération des avis, services, et animaux pour les différentes sections de la page
$avis = $pdo->query("SELECT * FROM avis")->fetchAll();
$services = $pdo->query("SELECT * FROM services")->fetchAll();
$animaux = $pdo->query("SELECT * FROM animaux")->fetchAll();
?>

<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <title>Espace Employé</title>
</head>
<body>
    <h1>Espace Employé</h1>

    <!-- Section pour valider ou invalider les avis -->
    <h2>Gestion des Avis</h2>
    <ul>
        <?php foreach ($avis as $a): ?>
            <li>
                <?php echo htmlspecialchars($a['contenu']); ?>
                <a href="valider_avis.php?id=<?php echo $a['id']; ?>&action=valider">Valider</a>
                <a href="valider_avis.php?id=<?php echo $a['id']; ?>&action=invalider">Invalider</a>
            </li>
        <?php endforeach; ?>
    </ul>

    <!-- Section pour modifier les services -->
    <h2>Gestion des Services</h2>
    <ul>
        <?php foreach ($services as $service): ?>
            <li>
                <?php echo htmlspecialchars($service['nom']); ?>
                <a href="modifier_service.php?id=<?php echo $service['id']; ?>">Modifier</a>
            </li>
        <?php endforeach; ?>
    </ul>

    <!-- Section pour ajouter une consommation de nourriture -->
    <h2>Ajout de Consommation de Nourriture</h2>
    <form method="post" action="ajouter_consommation.php">
        <label>Animal :</label>
        <select name="animal_id" required>
            <?php foreach ($animaux as $animal): ?>
                <option value="<?php echo $animal['id']; ?>"><?php echo htmlspecialchars($animal['nom']); ?></option>
            <?php endforeach; ?>
        </select><br>
        
        <label>Date :</label>
        <input type="date" name="date_consommation" required><br>
        
        <label>Heure :</label>
        <input type="time" name="heure_consommation" required><br>
        
        <label>Type de Nourriture :</label>
        <input type="text" name="type_nourriture" required><br>
        
        <label>Quantité (en grammes) :</label>
        <input type="number" name="quantite" step="0.01" required><br>
        
        <button type="submit">Ajouter la Consommation</button>
    </form>

</body>
</html>
