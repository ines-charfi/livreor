<?php
// index.php
session_start();
include './classes/Db.php';
?>

<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Livre d'Or - La Plateforme</title>
    <link rel="stylesheet" href="css/styles.css">
</head>
<body>
    <header>
        <div class="logo">
            <img src="images/logo.png" alt="Logo livreor">
        </div>
        <div class="header-content">
          <div class="auth-buttons">
              <a href="register.php">S'inscrire</a>
              <a href="login.php">Se connecter</a>
          </div>
        </div>
    </header>
    <hr>

    <main>
        <section class="hero">
            <h1>Bienvenue dans notre Livre d'Or</h1>
            <p>Vous pouvez laisser un message sur notre livre d'or en vous inscrivant ou en vous connectant.</p><br>
            <a href="livreor.php"><button type="submit">ENTRER</button></a>
        </section>
    </main>
    <hr>
    <footer>
      
        <p>&copy; Livre d'Or - La Plateforme | Tous droits réservés</p>
      
    </footer>
</body>
</html>