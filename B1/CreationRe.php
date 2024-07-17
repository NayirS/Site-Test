<?php
// Configuration de la connexion à la base de données
$servername = '127.0.0.1';
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

$message = ''; // Variable pour stocker le message de confirmation

try {
    $pdo = new PDO($connection_string, $username, $password, $options);

    // Vérifier si le formulaire a été soumis
    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        // Requête SQL pour insérer un nouveau produit
        $sql = "INSERT INTO pharmacie (nom_produit, description, prix, quantite, date_expiration, fournisseur, fabricant, categorie, date_entree, date_sortie, lieu_stockage, pharmacien_responsable, client, adresse_client, telephone_client)
        VALUES (:nom_produit, :description, :prix, :quantite, :date_expiration, :fournisseur, :fabricant, :categorie, :date_entree, :date_sortie, :lieu_stockage, :pharmacien_responsable, :client, :adresse_client, :telephone_client)";
        
        $stmt = $pdo->prepare($sql);

        // Récupération des valeurs du formulaire
        $values = [
            ':nom_produit' => $_POST['nom_produit'],
            ':description' => $_POST['description'],
            ':prix' => $_POST['prix'],
            ':quantite' => $_POST['quantite'],
            ':date_expiration' => $_POST['date_expiration'],
            ':fournisseur' => $_POST['fournisseur'],
            ':fabricant' => $_POST['fabricant'],
            ':categorie' => $_POST['categorie'],
            ':date_entree' => $_POST['date_entree'],
            ':date_sortie' => $_POST['date_sortie'],
            ':lieu_stockage' => $_POST['lieu_stockage'],
            ':pharmacien_responsable' => $_POST['pharmacien_responsable'],
            ':client' => $_POST['client'],
            ':adresse_client' => $_POST['adresse_client'],
            ':telephone_client' => $_POST['telephone_client']
        ];

        // Exécution de la requête avec les valeurs
        $stmt->execute($values);

        $message = "Nouveau produit ajouté avec succès.";
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
    <title>Ajouter un Produit</title>
    <link rel="stylesheet" href="style3.css">
</head>
<body>
    <div class="ContainerPrincipal">
        <h1>Ajouter un Produit Pharmaceutique</h1>
        <form action="" method="post">
            <label for="nom_produit">Nom du Produit:</label>
            <input type="text" id="nom_produit" name="nom_produit" required><br>

            <label for="description">Description:</label>
            <input type="text" id="description" name="description" required><br>

            <label for="prix">Prix:</label>
            <input type="number" step="0.01" id="prix" name="prix" required><br>

            <label for="quantite">Quantité:</label>
            <input type="number" id="quantite" name="quantite" required><br>

            <label for="date_expiration">Date d'Expiration:</label>
            <input type="date" id="date_expiration" name="date_expiration" required><br>

            <label for="fournisseur">Fournisseur:</label>
            <input type="text" id="fournisseur" name="fournisseur" required><br>

            <label for="fabricant">Fabricant:</label>
            <input type="text" id="fabricant" name="fabricant" required><br>

            <label for="categorie">Catégorie:</label>
            <input type="text" id="categorie" name="categorie" required><br>

            <label for="date_entree">Date d'Entrée:</label>
            <input type="date" id="date_entree" name="date_entree" required><br>

            <label for="date_sortie">Date de Sortie:</label>
            <input type="date" id="date_sortie" name="date_sortie" required><br>

            <label for="lieu_stockage">Lieu de Stockage:</label>
            <input type="text" id="lieu_stockage" name="lieu_stockage" required><br>

            <label for="pharmacien_responsable">Pharmacien Responsable:</label>
            <input type="text" id="pharmacien_responsable" name="pharmacien_responsable" required><br>

            <label for="client">Client:</label>
            <input type="text" id="client" name="client" required><br>

            <label for="adresse_client">Adresse Client:</label>
            <input type="text" id="adresse_client" name="adresse_client" required><br>

            <label for="telephone_client">Téléphone Client:</label>
            <input type="text" id="telephone_client" name="telephone_client" required><br>

            <input type="submit" value="Ajouter le Produit">
        </form>

        <?php if ($message): ?>
            <p><?php echo $message; ?></p>
        <?php endif; ?>

        <form action="temp.php" method="post">
            <input type="submit" value="Retourner sur la page des Produits">
        </form>    
    </div>
</body>
</html>
