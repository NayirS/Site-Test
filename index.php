<?php
// Configuration de la connexion à la base de données
$servername = '158.178.193.178'; // Ou l'adresse IP de votre serveur de base de données
$username = 'root'; // Votre nom d'utilisateur
$password = ''; // Votre mot de passe
$dbname = 'formation'; // Nom de votre base de données
$charset = 'utf8mb4';

// Connexion à la base de données
$connection_string = "mysql:host=$servername;dbname=$dbname;charset=$charset";
$options = [
    PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION,
    PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC,
];
try {
    $pdo = new PDO($connection_string, $username, $password, $options);

    // Requête SQL pour récupérer les données
    $sql = "SELECT * FROM pharmacie";
    $stmt = $pdo->query($sql);
    $results = $stmt->fetchAll();

} catch (PDOException $e) {
    echo "Erreur de connexion : " . $e->getMessage();
}
?>

<link rel="stylesheet" href="style.css"> <!-- Lien vers le fichier CSS -->
</head>
<body>
    <div class="ContainerPrincipal">
        
    <?php
        if (isset($_GET['error']) && $_GET['error'] == 1) {
            echo '<p class="error-message">Ce compte n\'existe pas.</p>';
        }
        ?>

        <!-- Formulaire de connexion -->
        <form action='index_verif.php' method="GET">
            <div class="input-container">
                <label for="login"><b>Login</b></label>
                <input type="text" id="login" class="login-input" placeholder="Entre ton Login" name="nom" required>
            </div>

            <div class="Password">
                <label for="password"><b>Mot de passe</b></label>
                <input type="password" id="password" class="password-input" placeholder="Entre ton Mot de passe" name="motdepasse" required>
            </div>

            <div class="button-container">
                <button class="login-button" type="submit">Login</button>
            </div>
        </form>

        <!-- Formulaire de création de compte -->
        <form action='Creation.php' method="GET">
            <div class="button-container">
                <button type="submit" class="creation-button">Crée un Compte</button>
            </div>
        </form>
    </div>
</body>
