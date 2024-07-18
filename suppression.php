<?php
// Configuration de la connexion à la base de données
$servername = 'localhost';
$username = 'mob'; // Votre nom d'utilisateur
$password = 'Mob@1234'; // Votre mot de passe
$dbname = 'Bigtest'; // Nom de votre base de données
$charset = 'utf8mb4';

// Connexion à la base de données
$connection_string = "mysql:host=$servername;dbname=$dbname;charset=$charset";
$options = [
    PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION,
    PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC,
];

// Message pour afficher le résultat de l'opération
$message = '';

try {
    $pdo = new PDO($connection_string, $username, $password, $options);

    // Vérifier si l'action de suppression a été déclenchée
    if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST['action']) && $_POST['action'] == 'supprimer') {
        // Vérifier si l'id du produit à supprimer est présent
        if (isset($_POST['id'])) {
            // Préparer la requête SQL pour supprimer le produit
            $sql = "DELETE FROM pharmacie WHERE id = :id";
            $stmt = $pdo->prepare($sql);

            // Liaison des paramètres
            $stmt->bindParam(':id', $_POST['id']);

            // Exécution de la requête
            $stmt->execute();

            $message = "Produit supprimé avec succès.";
        } else {
            $message = "ID du produit à supprimer non spécifié.";
        }
    }
} catch (PDOException $e) {
    $message = "Erreur de connexion : " . $e->getMessage();
}
?>

<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Suppression d'un Produit</title>
    <link rel="stylesheet" href="style3.css">
</head>
<body>
    <div class="ContainerPrincipal">
        <h1>Suppression d'un Produit Pharmaceutique</h1>
        <p><?php echo $message; ?></p>

        <div class="button-container">
            <button class="return-button" onclick="window.location.href='temp.php'">Retourner à la liste des Produits</button>
        </div>
    </div>
</body>
</html>
