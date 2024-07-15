<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $login = $_POST['Login'];
    $mail = $_POST['Email'];
    $motdepasse = $_POST['psw'];

    $data = "Login: $login | Mail: $mail | Mot de passe: $motdepasse" . PHP_EOL;
    $file = 'comptes.txt';

    if (file_put_contents($file, $data, FILE_APPEND | LOCK_EX) !== false) {
        header('Location: reussite.php');
        exit();
    } else {
        echo "Erreur dans la saisie";
        $stmt = $pdo->query($sql);
        $results = $stmt->fetchAll();
    }
}
?>