<?php
// Configuration de la connexion à la base de données
$servername = '158.178.193.178';
$username = 'root'; // Votre nom d'utilisateur
$password = 'Admin@123'; // Votre mot de passe
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

<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Liste des Villes</title>
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
                    </tr>
                </thead>
                <tbody>
                    <?php foreach ($results as $Prodm): ?>
                        <tr>
                            <td><?php echo $Prodm["nom_produit"]; ?></td>
                            <td><?php echo $Prodm["description"]; ?></td>
                            <td><?php echo $Prodm["prix"]; ?></td>
                            <td><?php echo $Prodm["date_expiration"]; ?></td>
                            <td><?php echo $Prodm["fournisseur"]; ?></td>
                            <td><?php echo $Prodm["fabricant"]; ?></td>
                            <td><?php echo $Prodm["categorie"]; ?></td>
                            <td>
                                <form action='détails.php'>
                                    <input type='hidden' name='id' value='<?php echo $Prodm["id"]; ?>' />
                                    <input type='submit' value='Détail' />
                                </form>
                            </td>
                            <td>
                            <form action='CreationRe.php'>
                            <button class="creation-button" type="submit">Crée</button>
                                </form>
                            </td>
                            <td>
                            <form action='modif.php'>
                            <button class="modif-button" type="submit">modifier</button>
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
