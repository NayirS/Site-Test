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
    $nom = $_POST['nom'];
    $motdepasse = $_POST['motdepasse'];

    // Vérifier les informations d'identification
    $sql = "SELECT * FROM users WHERE login = :nom";
    $stmt = $pdo->prepare($sql);
    $stmt->execute(['nom' => $nom]);
    $user = $stmt->fetch();

    if ($user && password_verify($motdepasse, $user['motdepasse'])) {
        // Redirection vers temp.php après la connexion réussie
        header('Location: temp.php');
        exit();
    } else {
        // Redirection vers index.php avec erreur si la connexion échoue
        header('Location: index.php?error=1');
        exit();
    }
} catch (PDOException $e) {
    echo "Erreur de connexion : " . $e->getMessage();
}
?>
