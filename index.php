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
    <title>Livreor - La Plateforme</title>
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
              <a href="register.php"><button>S'inscrire</button></a>
              <a href="login.php"><button>Se connecter</button></a>
          </div>
        </div>
    </header>
    <hr>

    <main>
        <section class="">
            <a href="livreor.php"><button type="submit">Entrer</button></a>
        
           
        </section>
    </main>
    <hr>
    <footer>
      
        <p>&copy; livre d'or - La Plateforme | Tous droits réservés</p>
      
    </footer>
</body>
</html>