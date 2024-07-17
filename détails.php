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

    // Récupérer l'ID passé en paramètre
    $id = isset($_GET['id']) ? (int)$_GET['id'] : 0;

    // Requête SQL pour récupérer les détails du produit
    $sql = "SELECT * FROM pharmacie WHERE id = :id";
    $stmt = $pdo->prepare($sql);
    $stmt->execute(['id' => $id]);
    $details = $stmt->fetch();

    if (!$details) {
        echo "Produit non trouvé.";
        exit;
    }

} catch (PDOException $e) {
    echo "Erreur de connexion : " . $e->getMessage();
    exit;
}
?>


    <title>Détails du Produit</title>
    <link rel="stylesheet" href="style3.css">
</head>
<body>
    <div class="ContainerPrincipal">
        <h1>Détails du Produit</h1>
        <p>Voici les détails du produit sélectionné.</p>

        <div class="produit-details">
            <table>
                <tr>
                    <th>ID</th>
                    <td><?php echo $details["id"]; ?></td>
                </tr>
                <tr>
                    <th>Fournisseur</th>
                    <td><?php echo $details["fournisseur"]; ?></td>
                </tr>
                <tr>
                    <th>Date d'entrée</th>
                    <td><?php echo $details["date_entree"]; ?></td>
                </tr>
                <tr>
                    <th>Date de sortie</th>
                    <td><?php echo $details["date_sortie"]; ?></td>
                </tr>
                <tr>
                    <th>Lieu de stockage</th>
                    <td><?php echo $details["lieu_stockage"]; ?></td>
                </tr>
                <tr>
                    <th>Responsable</th>
                    <td><?php echo $details["pharmacien_responsable"]; ?></td>
                </tr>
                <tr>
                    <th>Client</th>
                    <td><?php echo $details["client"]; ?></td>
                </tr>
                <tr>
                    <th>Adresse client</th>
                    <td><?php echo $details["adresse_client"]; ?></td>
                </tr>
            </table>
        </div>

        <div class="button-container">
            <button class="return-button" onclick="window.location.href='temp.php'">Retourner à la liste des produits</button>
        </div>
    </div>
</body>

