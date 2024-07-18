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

    // Requête SQL pour récupérer les données
    $sql = "SELECT * FROM pharmacie";
    $stmt = $pdo->query($sql);
    $results = $stmt->fetchAll();

} catch (PDOException $e) {
    echo "Erreur de connexion : " . $e->getMessage();
}
?>


    <link rel="stylesheet" href="style3.css">
</head>
<body>
    <div class="ContainerPrincipal">
        <h1>Liste des Produits</h1>
        <p>Voici la liste des Produits disponibles.</p>

        <div class="produit-liste">
            <table>
                <thead>
                    <tr>
                        <th>Nom</th>
                        <th>Description</th>
                        <th>Prix</th>
                        <th>Date d'expiration</th>
                        <th>Fournisseur</th>
                        <th>Fabricant</th>
                        <th>Catégories</th>
                        <th>Détail</th>
                        <th>Actions</th>
                    </tr>
                </thead>
                <tbody>
                    <?php foreach ($results as $produit): ?>
                        <tr>
                            <td><?php echo htmlspecialchars($produit["nom_produit"]); ?></td>
                            <td><?php echo htmlspecialchars($produit["description"]); ?></td>
                            <td><?php echo htmlspecialchars($produit["prix"]); ?></td>
                            <td><?php echo htmlspecialchars($produit["date_expiration"]); ?></td>
                            <td><?php echo htmlspecialchars($produit["fournisseur"]); ?></td>
                            <td><?php echo htmlspecialchars($produit["fabricant"]); ?></td>
                            <td><?php echo htmlspecialchars($produit["categorie"]); ?></td>
                            <td>
                                <form action='details.php' method='get'>
                                    <input type='hidden' name='id' value='<?php echo $produit["id"]; ?>' />
                                    <button class='details-button' type='submit'>Détail</button>
                                </form>
                            </td>
                            <td>
                                <form action='modification.php' method='get'>
                                    <input type='hidden' name='id' value='<?php echo $produit["id"]; ?>' />
                                    <button class='modifier-button' type='submit'>Modifier</button>
                                </form>
                            </td>
                            <td>
                                <form action='suppression.php' method='post'>
                                    <input type='hidden' name='action' value='supprimer'>
                                    <input type='hidden' name='id' value='<?php echo $produit["id"]; ?>' />
                                    <button class='supprimer-button' type='submit'>Supprimer</button>
                                </form>
                            </td>
                        </tr>
                    <?php endforeach; ?>
                </tbody>
            </table>
        </div>

        <div class="button-container">
            <button class="return-button" onclick="window.location.href='index.php'">Retour à l'accueil</button>
        </div>
    </div>
</body>
</html>
