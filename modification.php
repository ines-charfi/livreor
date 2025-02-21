<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="css/styles.css">
</head>
<body>
<header>
        <div class="logo">
            <img src="images/logo.png" alt="Logo livreor">
        </div>
        <div class="header-content">
            <div class="auth-buttons">
                <a href="index.php">Accueil</a>
                <a href="livreor.php">LivreOr</a>
                <a href="post_message.php">Espace Commentaire</a>
                <a href="logout.php">Déconnexion</a>
            </div>
        </div>
    </header>
    <hr>

    <main>
        <h1>Modifier votre profil</h1>
        <div>
            <form class="form-container">
                <input type="email" placeholder="E-MAIL" required>
                <input type="password" placeholder="MOT DE PASSE" required>
                <input type="password" name="new_password" placeholder="Nouveau mot de passe">
                <input type="password" name="confirm_password" placeholder="Confirmer le nouveau mot de passe">
                <button type="submit">ENREGISTRER</button>
            </form>
        </div>
    </main>

    <hr>
    <footer>
        <p>© Livre d'Or - La Plateforme 2025  | Tous droits réservés</p>
    </footer>
</body>
</html>