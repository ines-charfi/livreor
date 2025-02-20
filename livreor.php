<?php
session_start();
require_once './classes/Db.php';
require_once './classes/User.php';
require_once './classes/Comment.php';

$userObj = new User();
$messageObj = new Comment();

// Vérification si l'utilisateur est connecté
if (!isset($_SESSION['id_user'])) {
    header("Location: login.php");
    exit;
}

// Gestion de la recherche
$searchTerm = isset($_GET['search']) ? $_GET['search'] : '';

// Récupérer le nombre total de messages
$totalMessages = $messageObj->countComments();

// Définir le nombre de messages par page (7 messages par page)
$messagesPerPage = 7;

// Calculer le nombre de pages
$totalPages = ceil($totalMessages / $messagesPerPage);

// Déterminer la page actuelle (par défaut page 1)
$currentPage = isset($_GET['page']) ? (int)$_GET['page'] : 1;

// Calculer l'offset pour la requête
$offset = ($currentPage - 1) * $messagesPerPage;

// Récupérer les commentaires de la page actuelle
if ($searchTerm) {
    // Si un mot-clé est recherché, utiliser la méthode de recherche paginée
    $messages = $messageObj->searchComments($searchTerm, $messagesPerPage, $offset);
} else {
    // Sinon, récupérer les messages de la page actuelle
    $messages = $messageObj->getComments($messagesPerPage, $offset);
}

// Envoi d'un nouveau message
if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['message'])) {
    $message = $_POST['message'];
    $user_id = $_SESSION['id_user'];
    $messageObj->addComment($user_id, $message);
    header("Location: post_message.php");
    exit;
}

// Suppression d'un message
if (isset($_GET['delete_message_id'])) {
    $message_id = $_GET['delete_message_id'];
    $messageObj->deleteMessage($message_id);
    header("Location: livreor.php");
    exit;
}
?>

<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="css/styles.css">
    <title>Post Message</title>
</head>
<body>
    <header>
         <div class="logo">
            <img src="images/logo.png" alt="Logo livreor">
        </div>
        <form method="GET" action="post_message.php">
            <input type="text" name="search" placeholder="Rechercher un mot-clé..." value="<?php echo isset($_GET['search']) ? htmlspecialchars($_GET['search']) : ''; ?>" onkeydown="if(event.key === 'Enter'){this.form.submit();}">
        </form>
        <a href="index.php">Acceuil</a> 
        <a href="modification.php">Profile</a>
        <a href="post_message.php">Get a touch</a>
        <a href="logout.php">Déconnexion</a></p>
    </header>

    <a href="post_message.php"><button type="submit">Ajouter un commentaire</button></a>

    <!-- Affichage des messages -->
    <section class="messages">
        <h2>Messages du Livre d'Or :</h2>
        <?php if ($searchTerm): ?>
            <p><h3>Résultats de la recherche pour : </h3>"<strong><?php echo htmlspecialchars($searchTerm); ?></strong>"</p>
        <?php endif; ?>
        
        <?php if (empty($messages)): ?>
            <p>Aucun message trouvé.</p>
        <?php else: ?>
            <?php foreach ($messages as $message): ?>
                <div class="message">
                    <p><strong><?php echo htmlspecialchars($message['login']); ?> :</strong></p>
                    <p><?php echo nl2br(htmlspecialchars($message['comment'])); ?></p>
                    <small><em>Posté le <?php echo $message['date']; ?></em></small>
                    <a href="?delete_message_id=<?php echo $message['id']; ?>">Supprimer</a>
                </div>
            <?php endforeach; ?>
        <?php endif; ?>
    </section>

    <!-- Pagination -->
    <section class="pagination">
        <ul>
            <?php if ($currentPage > 1): ?>
                <li><a href="?page=<?php echo $currentPage - 1; ?>&search=<?php echo htmlspecialchars($searchTerm); ?>">Précédent</a></li>
            <?php endif; ?>

            <?php for ($i = 1; $i <= $totalPages; $i++): ?>
                <li>
                    <a href="?page=<?php echo $i; ?>&search=<?php echo htmlspecialchars($searchTerm); ?>" class="<?php echo ($i == $currentPage) ? 'active' : ''; ?>">
                        <?php echo $i; ?>
                    </a>
                </li>
            <?php endfor; ?>

            <?php if ($currentPage < $totalPages): ?>
                <li><a href="?page=<?php echo $currentPage + 1; ?>&search=<?php echo htmlspecialchars($searchTerm); ?>">Suivant</a></li>
            <?php endif; ?>
        </ul>
    </section>

    <footer>
        <p>&copy; livre d'or - La Plateforme | Tous droits réservés</p>
    </footer>
</body>
</html>
