<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Création de Compte</title>
    <link rel="stylesheet" href="style2.css"> <!-- Lien vers le fichier CSS -->
</head>
<body>
    <div class="ContainerPrincipal">
     <!-- Affichage du message d'erreur -->
     <?php
        if (isset($_GET['error']) && $_GET['error'] == 1) {
            echo '<p class="error-message">Erreur dans la saisie des informations.</p>';
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
    </div>
</body>
</html>
