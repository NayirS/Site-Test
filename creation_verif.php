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

try {
    $pdo = new PDO($connection_string, $username, $password, $options);

    // Récupérer les données du formulaire
    $login = $_POST['Login'];
    $email = $_POST['Email'];
    $motdepasse = $_POST['psw'];

    // Hash du mot de passe
    $hash_motdepasse = password_hash($motdepasse, PASSWORD_DEFAULT);

    // Préparer et exécuter la requête d'insertion dans la base de données
    $sql = "INSERT INTO users (login, email, motdepasse) VALUES (:login, :email, :motdepasse)";
    $stmt = $pdo->prepare($sql);
    $stmt->execute(['login' => $login, 'email' => $email, 'motdepasse' => $hash_motdepasse]);

    // Redirection vers reussite.php après la création réussie
    header('Location: reussite.php');
    exit();
} catch (PDOException $e) {
    echo "Erreur de connexion : " . $e->getMessage();
}
?>
