# Projet de Gestion Pharmaceutique

## Introduction

Ce projet consiste en une application de gestion pharmaceutique pour suivre les produits pharmaceutiques en stock, avec des fonctionnalités pour ajouter, modifier, supprimer et afficher les détails des produits.

## Structure du Projet

### 1. page d'Accueil (index.php)

***Objectif***

La page d'accueil, index.php, sert de point d'entrée principal pour le système de gestion pharmaceutique.

***Fonctionnalités***

Navigation :
Permet de naviguer vers d'autres sections principales du système, comme la liste des produits et la gestion des utilisateurs.
Affiche une présentation générale du système.

### 2.Page de Connexion (login.php) ###

***Objectif***

Permet à l'utilisateur de se connecter à l'application.

***Fonctionnalités***

Formulaire de Connexion :
Collecte du nom d'utilisateur et du mot de passe.
Validation des Informations :
Vérification dans la base de données pour l'authentification.
Exemple de Code PHP (partie validation)
```php
<?php
// Exemple de validation de connexion
$sql = "SELECT * FROM users WHERE username = :username AND password = :password";
$stmt = $pdo->prepare($sql);
$stmt->execute([
    ':username' => $_POST['username'],
    ':password' => $_POST['password']
]);
$user = $stmt->fetch();
?>
```
### 3.Création de Compte (creation_compte.php)

***Objectif***

Permet à un utilisateur de créer un nouveau compte dans l'application.

**Fonctionnalités**

Formulaire de Création de Compte :
Collecte des informations nécessaires pour créer un nouveau compte utilisateur.
Validation et Enregistrement :
Vérification des champs requis et insertion des données dans la base de données après validation.
```php
<?php
// Affichage du message d'erreur
if (isset($_GET['error']) && $_GET['error'] == 1) {
    echo '<p class="error-message">Ce compte n\'existe pas.</p>';
}
?>

<!-- Formulaire de création de compte -->
<form action="creation_verif.php" method="POST">
    <div class="input-container">
        <label for="login"><b>Login</b></label>
        <input type="text" id="login" class="login-input" placeholder="Entre ton Login" name="Login" required>
    </div>

    <div class="input-container">
        <label for="email"><b>Email</b></label>
        <input type="text" class="email-input" placeholder="Entre ton Email" name="Email" required>
    </div>

    <div class="Password">
        <label for="password"><b>Mot de passe</b></label>
        <input type="password" id="password" class="password-input" placeholder="Entre ton Mot de passe" name="psw" required>
    </div>

    <div class="button-container">
        <button class="creation-button" type="submit">Créer un Compte</button>
    </div>
</form>
```

### 4. Liste des Produits (`temp.php`)

Ce fichier affiche une liste des produits pharmaceutiques enregistrés en base de données.

```php
<?php
// Connexion à la base de données et récupération des produits
try {
    $pdo = new PDO($connection_string, $username, $password, $options);
    $sql = "SELECT * FROM pharmacie";
    $stmt = $pdo->query($sql);
    $results = $stmt->fetchAll();
} catch (PDOException $e) {
    echo "Erreur de connexion : " . $e->getMessage();
}
?> 
```



### 5.Ajout du Produit (CreationRe.php)

***Objectif***

La page CreationRe.php permet d'ajouter un nouveau produit pharmaceutique à la base de données.

***Fonctionnalités***
Formulaire d'Ajout de Produit :
Saisie des informations du nouveau produit : nom, description, prix, quantité, dates d'expiration, fournisseur, fabricant, catégorie, etc.
Insertion des données dans la base de données après validation.

***Étapes pour Ajouter un Produit***
1.Formulaire d'Ajout :
L'utilisateur remplit les champs requis dans le formulaire.
Les données sont validées côté serveur pour s'assurer qu'elles sont complètes et correctes.
Insertion dans la Base de Données :
Les données sont insérées dans la table pharmacie de la base de données.
Exemple de Code PHP (partie insertion)
```php
<?php
// Connexion à la base de données
try {
    $pdo = new PDO("mysql:host=127.0.0.1;dbname=formation;charset=utf8mb4", 'root', '');

    if ($_SERVER["REQUEST_METHOD"] == "POST") 
    {
        $sql = "INSERT INTO pharmacie (nom_produit, description, prix, quantite, date_expiration, fournisseur, fabricant, categorie, date_entree, date_sortie, lieu_stockage, pharmacien_responsable, client, adresse_client, telephone_client)
                VALUES (:nom_produit, :description, :prix, :quantite, :date_expiration, :fournisseur, :fabricant, :categorie, :date_entree, :date_sortie, :lieu_stockage, :pharmacien_responsable, :client, :adresse_client, :telephone_client)";
        
        $stmt = $pdo->prepare($sql);

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

        $stmt->execute($values);

        $message = "Nouveau produit ajouté avec succès.";
    }
} catch (PDOException $e) {
    $message = "Erreur de connexion : " . $e->getMessage();
}
?>
```
### 6.Modifier un Produit (modifier.php) ###

***Objectif***

La page modifier.php permet de mettre à jour les informations d'un produit existant dans la base de données.

***Fonctionnalités***
Formulaire de Modification de Produit :
Affiche les détails actuels du produit sélectionné.
Permet à l'utilisateur de modifier n'importe quelle information du produit.
Enregistre les modifications dans la base de données après validation.


### 7.Supprimer un Produit (supprimer.php) ###

***Objectif***

La page supprimer.php permet de supprimer un produit de la base de données.

***Fonctionnalités***

Confirmation de Suppression :
Affiche les détails du produit à supprimer.
Demande confirmation avant de supprimer définitivement le produit de la base de données.

### Principe de ma base de donnée

<span style="color: #d70a01">ma base de données est utile pour chacun des etapes avoir avec les produits car elle contient sur mon admin les info de mes produit donc la connexion est obligatoire. Elle permet de centraliser mes informations et d'assurer leur disponibilité et leur accessibilité à tout moment pour mon code , une sorte de global.

