<?php
// Initialiser les variables d'erreur et de succès
$success = $error = "";

// Traitement du formulaire lors de la soumission
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    // Récupérer et valider les données
    $titre = trim($_POST['titre']);
    $description = trim($_POST['description']);
    $email = trim($_POST['email']);

    if (empty($titre) || empty($description) || empty($email)) {
        $error = "Tous les champs sont obligatoires.";
    } elseif (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
        $error = "Veuillez entrer un e-mail valide.";
    } else {
        // Adresse e-mail du zoo
        $zooEmail = "contact@zoo.fr"; // À remplacer par l'adresse e-mail réelle du zoo

        // Sujet et message pour l'e-mail envoyé au zoo
        $sujet = "Demande de contact : $titre";
        $message = "Un visiteur vous a contacté via le formulaire de contact du site.\n\n"
                 . "Détails de la demande :\n"
                 . "Titre : $titre\n"
                 . "Description : $description\n\n"
                 . "E-mail du visiteur : $email";

        // En-têtes pour l'e-mail
        $headers = "From: $email\r\n" .
                   "Reply-To: $email\r\n" .
                   "Content-Type: text/plain; charset=UTF-8\r\n";

        // Envoi de l'e-mail
        if (mail($zooEmail, $sujet, $message, $headers)) {
            $success = "Votre message a été envoyé avec succès. Nous vous répondrons sous peu.";
        } else {
            $error = "Une erreur est survenue lors de l'envoi de votre message. Veuillez réessayer plus tard.";
        }
    }
}
?>

<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <title>Contactez le Zoo</title>
</head>
<body>
    <h1>Contactez le Zoo</h1>

    <!-- Affichage du message de succès ou d'erreur -->
    <?php if ($success): ?>
        <p style="color: green;"><?php echo $success; ?></p>
    <?php elseif ($error): ?>
        <p style="color: red;"><?php echo $error; ?></p>
    <?php endif; ?
    
    <!-- Exemple de lien dans le menu -->
<nav>
    <ul>
        <li><a href="index.php">Accueil</a></li>
        <li><a href="contact.php">Contact</a></li>
        <!-- Autres liens du menu -->
    </ul>
</nav>
>

    <!-- Formulaire de contact -->
    <form method="post" action="contact.php">
        <label for="titre">Titre :</label>
        <input type="text" name="titre" id="titre" required><br>

        <label for="description">Description :</label>
        <textarea name="description" id="description" rows="4" required></textarea><br>

        <label for="email">Votre E-mail :</label>
        <input type="email" name="email" id="email" required><br>

        <button type="submit">Envoyer le message</button>
    </form>
</body>
</html>
