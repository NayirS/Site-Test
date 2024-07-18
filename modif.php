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

$message = ''; // Variable pour stocker le message de confirmation
$id = null;

try {
    $pdo = new PDO($connection_string, $username, $password, $options);

    // Vérifier si le formulaire a été soumis
    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        if (isset($_POST['id']) && !empty($_POST['id'])) {
            $id = $_POST['id'];
            
            // Récupérer les données du produit existant
            $sql_select = "SELECT * FROM pharmacie WHERE id = :id";
            $stmt_select = $pdo->prepare($sql_select);
            $stmt_select->execute([':id' => $id]);
            $produit = $stmt_select->fetch(PDO::FETCH_ASSOC);
            
            if ($produit) {
                // Requête SQL pour mettre à jour un produit existant
                $sql_update = "UPDATE pharmacie SET 
                    nom_produit = :nom_produit,
                    description = :description,
                    prix = :prix,
                    quantite = :quantite,
                    date_expiration = :date_expiration,
                    fournisseur = :fournisseur,
                    fabricant = :fabricant,
                    categorie = :categorie,
                    date_entree = :date_entree,
                    date_sortie = :date_sortie,
                    lieu_stockage = :lieu_stockage,
                    pharmacien_responsable = :pharmacien_responsable,
                    client = :client,
                    adresse_client = :adresse_client,
                    telephone_client = :telephone_client
                    WHERE id = :id";
                
                $stmt_update = $pdo->prepare($sql_update);

                // Récupération des valeurs du formulaire
                $values = [
                    ':id' => $id,
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
                $stmt_update->execute($values);

                $message = "Produit mis à jour avec succès.";
            } else {
                $message = "Produit non trouvé.";
            }
        }
    }
} catch (PDOException $e) {
    $message = "Erreur de connexion : " . $e->getMessage();
}
?>


    <title>Modifier un Produit</title>
    <link rel="stylesheet" href="style3.css">
</head>
<body>
    <div class="ContainerPrincipal">
        <h1>Modifier un Produit Pharmaceutique</h1>
        <!-- Affichage du message de confirmation -->
        <?php if (!empty($message)) : ?>
            <p><?php echo $message; ?></p>
        <?php endif; ?>
        
        <!-- Formulaire de modification -->
        <form action="" method="post">
            <label for="id">ID du Produit:</label>
            <input type="text" id="id" name="id" value="<?php echo htmlspecialchars($id); ?>" readonly><br>

            <label for="nom_produit">Nom du Produit:</label>
            <input type="text" id="nom_produit" name="nom_produit" value="<?php echo isset($produit['nom_produit']) ? htmlspecialchars($produit['nom_produit']) : ''; ?>" required><br>

            <label for="description">Description:</label>
            <input type="text" id="description" name="description" value="<?php echo isset($produit['description']) ? htmlspecialchars($produit['description']) : ''; ?>" required><br>

            <label for="prix">Prix:</label>
            <input type="number" step="0.01" id="prix" name="prix" value="<?php echo isset($produit['prix']) ? htmlspecialchars($produit['prix']) : ''; ?>" required><br>

            <label for="quantite">Quantité:</label>
            <input type="number" id="quantite" name="quantite" value="<?php echo isset($produit['quantite']) ? htmlspecialchars($produit['quantite']) : ''; ?>" required><br>

            <label for="date_expiration">Date d'Expiration:</label>
            <input type="date" id="date_expiration" name="date_expiration" value="<?php echo isset($produit['date_expiration']) ? htmlspecialchars($produit['date_expiration']) : ''; ?>" required><br>

            <label for="fournisseur">Fournisseur:</label>
            <input type="text" id="fournisseur" name="fournisseur" value="<?php echo isset($produit['fournisseur']) ? htmlspecialchars($produit['fournisseur']) : ''; ?>" required><br>

            <label for="fabricant">Fabricant:</label>
            <input type="text" id="fabricant" name="fabricant" value="<?php echo isset($produit['fabricant']) ? htmlspecialchars($produit['fabricant']) : ''; ?>" required><br>

            <label for="categorie">Catégorie:</label>
            <input type="text" id="categorie" name="categorie" value="<?php echo isset($produit['categorie']) ? htmlspecialchars($produit['categorie']) : ''; ?>" required><br>

            <label for="date_entree">Date d'Entrée:</label>
            <input type="date" id="date_entree" name="date_entree" value="<?php echo isset($produit['date_entree']) ? htmlspecialchars($produit['date_entree']) : ''; ?>" required><br>

            <label for="date_sortie">Date de Sortie:</label>
            <input type="date" id="date_sortie" name="date_sortie" value="<?php echo isset($produit['date_sortie']) ? htmlspecialchars($produit['date_sortie']) : ''; ?>" required><br>

            <label for="lieu_stockage">Lieu de Stockage:</label>
            <input type="text" id="lieu_stockage" name="lieu_stockage" value="<?php echo isset($produit['lieu_stockage']) ? htmlspecialchars($produit['lieu_stockage']) : ''; ?>" required><br>

            <label for="pharmacien_responsable">Pharmacien Responsable:</label>
            <input type="text" id="pharmacien_responsable" name="pharmacien_responsable" value="<?php echo isset($produit['pharmacien_responsable']) ? htmlspecialchars($produit['pharmacien_responsable']) : ''; ?>" required><br>

            <label for="client">Client:</label>
            <input type="text" id="client" name="client" value="<?php echo isset($produit['client']) ? htmlspecialchars($produit['client']) : ''; ?>" required><br>

            <label for="adresse_client">Adresse Client:</label>
            <input type="text" id="adresse_client" name="adresse_client" value="<?php echo isset($produit['adresse_client']) ? htmlspecialchars($produit['adresse_client']) : ''; ?>" required><br>

            <label for="telephone_client">Téléphone Client:</label>
            <input type="text" id="telephone_client" name="telephone_client" value="<?php echo isset($produit['telephone_client']) ? htmlspecialchars($produit['telephone_client']) : ''; ?>" required><br>

            <button type="submit">Modifier le Produit</button>
        </form>
        <form action="temp.php" method="post">
            <input type="submit" value="Retourner sur la page des Produits">
        </form>  
    </div>
</body>
</html>
