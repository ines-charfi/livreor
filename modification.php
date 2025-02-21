<?php
session_start();
require_once './classes/Db.php';
require_once './classes/User.php';

$userObj = new User();
$message = '';

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $new_login = $_POST['login'];
    $current_password = $_POST['current_password'];
    $new_password = $_POST['new_password'];
    $confirm_password = $_POST['confirm_password'];
    
    // Get current user
    $user_id = $_SESSION['id_user'];
    $user = $userObj->getUserById($user_id);
    
    // Validate inputs
    if (empty($current_password)) {
        $message = "Le mot de passe actuel est obligatoire.";
    } elseif (!$userObj->verifyPassword($user, $current_password)) {
        $message = "Mot de passe actuel incorrect.";
    } elseif (!empty($new_password) && $new_password !== $confirm_password) {
        $message = "Les nouveaux mots de passe ne correspondent pas.";
    } elseif (!empty($new_password) && strlen($new_password) < 8) {
        $message = "Le nouveau mot de passe doit contenir au moins 8 caractères.";
    } else {
        // Update profile
        if ($userObj->updateProfile($user_id, $new_login, $new_password)) {
            $message = "Profil mis à jour avec succès!";
            // Update session login if changed
            if ($new_login !== $user['login']) {
                $_SESSION['login'] = $new_login;
            }
        } else {
            $message = "Erreur lors de la mise à jour du profil. Vérifiez vos informations.";
        }
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Modification du profil</title>
    <link rel="stylesheet" href="css/styles.css">
</head>
<body>
<header>
        <div class="logo">
            <img src="images/logo.png" alt="Logo livreor">
        </div>
        <nav>
            <a href="index.php">ACCUEIL</a>
            <a href="livreor.php">Livreor</a>
            <a href="post_message.php">Get a touch</a>
            <a href="logout.php">DÉCONNEXION</a>
        </nav>
    </header>
    <main>
        <h1>Modifier votre profil</h1>
        <?php if (!empty($message)): ?>
            <div class="message"><?php echo $message; ?></div>
        <?php endif; ?>
        <div class="form-container">
            <form method="POST" action="">
                <input type="text" name="login" placeholder="Nouveau login" value="<?php echo isset($user['login']) ? htmlspecialchars($user['login']) : ''; ?>">
                <input type="password" name="current_password" placeholder="Mot de passe actuel" required>
                <input type="password" name="new_password" placeholder="Nouveau mot de passe">
                <input type="password" name="confirm_password" placeholder="Confirmer le nouveau mot de passe">
                <button type="submit">ENREGISTRER</button>
            </form>
        </div>
    </main>

    <footer>
        <p>© Livred'or - La Plateforme 2025  | Tous droits réservés</p>
    </footer>
</body>
</html>