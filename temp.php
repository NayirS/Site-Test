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

// Récupération des données de la base de données
try {
    $pdo = new PDO($connection_string, $username, $password, $options);

    // Requête SQL pour récupérer les produits
    $sql = "SELECT * FROM pharmacie";
    $stmt = $pdo->query($sql);
    $products = $stmt->fetchAll();

} catch (PDOException $e) {
    echo "Erreur de connexion : " . $e->getMessage();
}
?>

<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Liste des Produits</title>
    <link rel="stylesheet" href="style3.css">
</head>
<body>
    <div class="ContainerPrincipal">
        <h1>Liste des Produits Pharmaceutiques</h1>

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
                        <th>Catégorie</th>
                        <th>Actions</th>
                    </tr>
                </thead>
                <tbody>
                    <?php foreach ($products as $product): ?>
                        <tr>
                            <td><?php echo htmlspecialchars($product['nom_produit']); ?></td>
                            <td><?php echo htmlspecialchars($product['description']); ?></td>
                            <td><?php echo htmlspecialchars($product['prix']); ?></td>
                            <td><?php echo htmlspecialchars($product['date_expiration']); ?></td>
                            <td><?php echo htmlspecialchars($product['fournisseur']); ?></td>
                            <td><?php echo htmlspecialchars($product['fabricant']); ?></td>
                            <td><?php echo htmlspecialchars($product['categorie']); ?></td>
                            <td>
                                <form action="suppression.php" method="post">
                                    <input type="hidden" name="action" value="supprimer">
                                    <input type="hidden" name="id" value="<?php echo $product['id']; ?>">
                                    <button class="supprimer-button" type="submit">Supprimer</button>
                                </form>
                            </td>
                            <td>
                                <form action="details.php" method="get">
                                    <input type="hidden" name="id" value="<?php echo $product['id']; ?>">
                                    <button class="detail-button" type="submit">Détail</button>
                                </form>
                            </td>
                            <td>
                                <form action="CreationRe.php" method="post">
                                    <input type="hidden" name="id" value="<?php echo $product['id']; ?>">
                                    <button class="creation-button" type="submit">Créer</button>
                                </form>
                            </td>
                        </tr>
                    <?php endforeach; ?>
                </tbody>
            </table>
        </div>

        <div class="button-container">
            <button class="return-button" onclick="window.location.href='index.php'">Retourner à l'accueil</button>
        </div>
    </div>
</body>
</html>
