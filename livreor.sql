-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Hôte : 127.0.0.1:3306
-- Généré le : ven. 21 fév. 2025 à 10:06
-- Version du serveur : 9.1.0
-- Version de PHP : 8.3.14

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de données : `livreor`
--

-- --------------------------------------------------------

--
-- Structure de la table `comment`
--

DROP TABLE IF EXISTS `comment`;
CREATE TABLE IF NOT EXISTS `comment` (
  `id` int NOT NULL AUTO_INCREMENT,
  `comment` text CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci NOT NULL,
  `id_user` int NOT NULL,
  `date` datetime NOT NULL,
  PRIMARY KEY (`id`),
  KEY `id_user` (`id_user`)
) ENGINE=InnoDB AUTO_INCREMENT=32 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Déchargement des données de la table `comment`
--

INSERT INTO `comment` (`id`, `comment`, `id_user`, `date`) VALUES
(1, 'Bonjour, merci pour l\'invitation, un beau moment ensemble !', 1, '2025-02-21 09:11:05'),
(2, 'Très content d\'avoir partagé ce moment avec vous.', 1, '2025-02-21 09:32:00'),
(3, 'Un vrai plaisir, merci encore pour l\'invitation !', 1, '2025-02-21 09:34:00'),
(4, 'On reviendra avec plaisir, c\'était top !', 1, '2025-02-21 09:36:00'),
(5, 'Merci pour cette belle expérience !', 1, '2025-02-21 09:38:00'),
(6, 'Excellente soirée, vivement la prochaine !', 1, '2025-02-21 09:40:00'),
(7, 'C\'était génial, merci beaucoup !', 1, '2025-02-21 09:42:00'),
(8, 'Quel plaisir d\'avoir passé ce moment ensemble, merci !', 1, '2025-02-21 09:44:00'),
(9, 'Un moment inoubliable, merci pour tout !', 1, '2025-02-21 09:46:00'),
(10, 'J\'ai adoré, merci pour l\'accueil chaleureux !', 1, '2025-02-21 09:48:00'),
(11, 'Que du bonheur, on reviendra !', 1, '2025-02-21 09:50:00'),
(12, 'Merci pour cette belle expérience partagée.', 1, '2025-02-21 09:52:00'),
(13, 'Tout était parfait, merci encore !', 1, '2025-02-21 09:54:00'),
(14, 'Un grand merci pour cette soirée inoubliable !', 1, '2025-02-21 09:56:00'),
(15, 'Un super moment entre amis, merci à tous !', 1, '2025-02-21 09:58:00'),
(16, 'J\'ai passé un excellent moment, merci à vous !', 1, '2025-02-21 10:00:00'),
(17, 'Merci pour cette ambiance géniale et ces rires !', 1, '2025-02-21 10:02:00'),
(18, 'Je me suis régalé, merci pour l\'invitation !', 1, '2025-02-21 10:04:00'),
(19, 'Une soirée mémorable, merci à tous !', 1, '2025-02-21 10:06:00'),
(20, 'Merci pour l\'accueil et les belles discussions.', 1, '2025-02-21 10:08:00'),
(21, 'Vivement la prochaine rencontre, c\'était génial !', 1, '2025-02-21 10:10:00'),
(22, 'Je suis ravi de cette soirée, à refaire !', 1, '2025-02-21 10:12:00'),
(23, 'Merci pour tout, c\'était une soirée formidable !', 1, '2025-02-21 10:14:00'),
(24, 'Une expérience incroyable, à renouveler !', 1, '2025-02-21 10:16:00'),
(25, 'Un grand merci pour cette soirée exceptionnelle !', 1, '2025-02-21 10:18:00'),
(26, 'Merci pour cette soirée pleine de bonne humeur !', 1, '2025-02-21 10:20:00'),
(27, 'Superbe expérience, merci pour l\'accueil !', 1, '2025-02-21 10:22:00'),
(28, 'Une soirée comme on les aime, merci à vous !', 1, '2025-02-21 10:24:00'),
(29, 'Que du bonheur, merci encore pour l\'invitation !', 1, '2025-02-21 10:26:00'),
(30, 'Un très beau moment passé ensemble, merci pour tout !', 1, '2025-02-21 10:28:00'),
(31, 'Bonjour, Inès !', 1, '2025-02-21 10:00:59');

-- --------------------------------------------------------

--
-- Structure de la table `user`
--

DROP TABLE IF EXISTS `user`;
CREATE TABLE IF NOT EXISTS `user` (
  `id` int NOT NULL AUTO_INCREMENT,
  `login` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Déchargement des données de la table `user`
--

INSERT INTO `user` (`id`, `login`, `password`) VALUES
(1, 'meriam.goudadi@laplateforme.io', '$2y$10$etWNK1EcjwLdqke3Qw8DI.IMFw8XozppureHSVTcnVm0l5cJHLRXK');

--
-- Contraintes pour les tables déchargées
--

--
-- Contraintes pour la table `comment`
--
ALTER TABLE `comment`
  ADD CONSTRAINT `comment_ibfk_1` FOREIGN KEY (`id_user`) REFERENCES `user` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
