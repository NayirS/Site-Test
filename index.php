<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login</title>
    <link rel="stylesheet" href="style.css"> <!-- Lien vers le fichier CSS -->
</head>
<body>
    <div class="ContainerPrincipal">
        
    <?php
        if (isset($_GET['error']) && $_GET['error'] == 1) {
            echo '<p class="error-message">Ce compte n\'existe pas ou mot de passe incorrect.</p>';
        }
        ?>

        <!-- Formulaire de connexion -->
        <form action='index_verif.php' method="POST">
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
</html>
