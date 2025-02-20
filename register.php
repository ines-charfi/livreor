<?php
// register.php
session_start();
include './classes/Db.php';
include './classes/User.php';

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $login = $_POST['login'];
    $password = password_hash($_POST['password'], PASSWORD_DEFAULT);

    // Utilisation de la classe User
    $user = new User($login);
    $user->create($login, $password);

    header('Location: login.php');
    exit();
}
?>

<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Inscription</title>
    <link rel="stylesheet" href="css/styles.css">
</head>
<body>
    <header>
        <div class="logo">
            <img src="../livreor/images/logo.png" alt="Logo livre d'or">
        </div>
        <div>
            <h1>Bienvenue sur notre livre d'or</h1>
        </div>
        <div class="header-content">
            <div class="auth-buttons">
                <button onclick="window.location.href='index.php'">Retour</button>
            </div>
        </div>
    </header>
    <main>
        <section class="hero">
            <h2>PAGE D'INSCRIPTION</h2>
        </section>

        <div class="register-container">
            <form method="post">
              
                <input type="email" name="login" placeholder="Login" required>
                <input type="password" name="password" placeholder="Mot de passe" required>
                <div>
                <label for="password_confirm">Confirmer le mot de passe</label>
                <input type="password" id="password_confirm" name="password_confirm" placeholder="Confirmer le mot de passe">
            </div>
                <button type="submit">S'INSCRIRE</button>
            </form>
        </div>
    </main>
    <footer>
      
        <p>&copy; livre d'or - La Plateforme | Tous droits réservés</p>
      
    </footer>
</body>
</html>