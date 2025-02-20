<?php
// login.php
session_start();
include './classes/Db.php';
include './classes/User.php';

// Message d'erreur ou de succès
$message = ''; // Variable pour les messages de statut

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $login = $_POST['login'];
    $password = $_POST['password'];

    // Utilisation de la classe User
    $user = new User();
    $userData = $user->findBylogin($login); // Utilisation d'une variable différente pour les données utilisateur

    if ($userData) {
        // Vérifier le mot de passe (en clair ou haché)
        if ($user->verifyPassword($userData, $password)) { // Appel de verifyPassword avec un tableau
            // Connexion réussie
            $_SESSION['id_user'] = $userData['id'];
            $_SESSION['message'] = "Bienvenue, connexion réussie!";
            header('Location: livreor.php'); // Redirection après connexion
            exit();
        } else {
            $message = "Mot de passe incorrect.";
        }
    } else {
        $message = "Email non trouvé.";
    }
}
?>

<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Connexion</title>
    <link rel="stylesheet" href="css/styles.css">
   
</head>
<body>
    <header>
        <div class="logo">
            <img src="images/logo.png" alt="Logo livreor">
        </div>
        <div>
            <h1>Bienvenue sur notre livre d'or</h1>
        </div>
        <div class="header-content">
            <div class="auth-buttons">
                <button onclick="window.location.href='index.php'">Home</button>
                <button onclick="window.location.href='logout.php'">Déconnexion</button>
            </div>
        </div>
    </header>
    <main>
        <section class="hero">
            <h2>PAGE DE CONNEXION</h2>
        </section>

        <!-- Affichage des messages d'erreur ou de succès -->
        <?php if ($message): ?>
            <div class="message <?php echo ($message === "Bienvenue, connexion réussie!") ? 'success' : 'error'; ?>">
                <?php echo $message; ?>
            </div>
        <?php endif; ?>

        <div class="register-container">
            <form method="post">
                <input type="email" name="login" placeholder="Login" required>
                <input type="password" name="password" placeholder="Mot de passe" required>
                <button type="submit">SE CONNECTER</button>
                <a href="register.php">Pas encore inscrit?</a><br>
                <a href="mofidication.php">Mot de passe oublié?</a>
            </form>
        </div>
    </main>
    <footer>
        <p>&copy; livre d'or - La Plateforme | Tous droits réservés</p>
    </footer>
</body>
</html>
