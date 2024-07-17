<?php
if ($_SERVER["REQUEST_METHOD"] == "GET") {
    $nom = $_GET['nom'];
    $motdepasse = $_GET['motdepasse'];

    $file = 'comptes.txt';

    if (file_exists($file)) {
        $lines = file($file, FILE_IGNORE_NEW_LINES);

        foreach ($lines as $line) {
            $info = explode('|', $line);
            $loginSave = trim(str_replace('Login:', '', $info[0]));
            $mdpSave = trim(str_replace('Mot de passe:', '', $info[2]));

            if ($nom == $loginSave && $motdepasse == $mdpSave) {
                header('Location: temp.php');
                exit;
            }
        }
    }

    header('Location: index.php?error=1');
}
?>