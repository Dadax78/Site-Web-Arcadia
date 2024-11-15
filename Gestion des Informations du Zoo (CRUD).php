// Exemple pour afficher, ajouter et supprimer un service
<?php
session_start();
require 'db.php';

if (!isset($_SESSION['user_id']) || $_SESSION['role'] !== 'admin') {
    header('Location: login.php');
    exit;
}

// Affichage des services existants
$services = $pdo->query("SELECT * FROM services")->fetchAll();

// Ajout d'un nouveau service
if ($_SERVER['REQUEST_METHOD'] == 'POST' && isset($_POST['ajouter_service'])) {
    $nom = $_POST['nom'];
    $pdo->prepare("INSERT INTO services (nom) VALUES (?)")->execute([$nom]);
    header('Location: gerer_zoo.php');
    exit;
}

// Suppression d'un service
if (isset($_GET['supprimer'])) {
    $id = $_GET['supprimer'];
    $pdo->prepare("DELETE FROM services WHERE id = ?")->execute([$id]);
    header('Location: gerer_zoo.php');
    exit;
}
?>

<!-- Formulaire HTML -->
<!DOCTYPE html>
<html lang="fr">
<head><title>Gérer les Services</title></head>
<body>
<h2>Gérer les Services</h2>
<ul>
    <?php foreach ($services as $service): ?>
        <li><?php echo htmlspecialchars($service['nom']); ?>
            <a href="gerer_zoo.php?supprimer=<?php echo $service['id']; ?>">Supprimer</a>
        </li>
    <?php endforeach; ?>
</ul>

<form method="post">
    <label>Nom du Service :</label>
    <input type="text" name="nom" required>
    <button type="submit" name="ajouter_service">Ajouter</button>
</form>
</body>
</html>
