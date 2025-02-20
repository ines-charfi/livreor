-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Hôte : 127.0.0.1:3306
-- Généré le : mer. 19 fév. 2025 à 13:50
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
  `id_user` int NOT NULL,
  `comment` text NOT NULL,
  `date` datetime NOT NULL,
  PRIMARY KEY (`id`),
  KEY `id_user` (`id_user`)
) ENGINE=InnoDB AUTO_INCREMENT=34 DEFAULT CHARSET=utf16le;

--
-- Déchargement des données de la table `comment`
--

INSERT INTO `comment` (`id`, `id_user`, `comment`, `date`) VALUES
(1, 1, 'Ceci est un commentaire d\'Alice.', '2025-02-17 09:00:00'),
(2, 1, 'Alice partage ses réflexions ici.', '2025-02-17 09:05:00'),
(3, 1, 'Un autre commentaire d\'Alice sur un sujet important.', '2025-02-17 09:10:00'),
(4, 1, 'Alice a encore des choses à dire!', '2025-02-17 09:15:00'),
(5, 1, 'Voici un dernier commentaire d\'Alice.', '2025-02-17 09:20:00'),
(6, 2, 'Voici un commentaire de Bob sur ce sujet.', '2025-02-17 09:25:00'),
(7, 2, 'Bob donne son avis sur la situation actuelle.', '2025-02-17 09:30:00'),
(8, 2, 'Un autre point de vue de Bob.', '2025-02-17 09:35:00'),
(9, 2, 'Bob pense que ce sujet mérite plus d\'attention.', '2025-02-17 09:40:00'),
(10, 2, 'Bob ajoute encore un autre commentaire.', '2025-02-17 09:45:00'),
(11, 3, 'Carol a une opinion sur ce sujet aussi.', '2025-02-17 09:50:00'),
(12, 3, 'Carol pense que ce sujet peut être amélioré.', '2025-02-17 09:55:00'),
(13, 3, 'Un autre commentaire de Carol à propos de ce sujet.', '2025-02-17 10:00:00'),
(14, 3, 'Carol est d\'accord avec certaines propositions.', '2025-02-17 10:05:00'),
(15, 3, 'Un commentaire constructif de Carol.', '2025-02-17 10:10:00'),
(16, 1, 'Alice propose une idée intéressante.', '2025-02-17 10:15:00'),
(17, 1, 'Un autre avis d\'Alice sur un sujet très populaire.', '2025-02-17 10:20:00'),
(18, 1, 'Alice exprime son désaccord avec certaines opinions.', '2025-02-17 10:25:00'),
(19, 1, 'Alice trouve que des changements sont nécessaires.', '2025-02-17 10:30:00'),
(20, 1, 'Un dernier point de vue d\'Alice sur la question.', '2025-02-17 10:35:00'),
(21, 2, 'Bob pense que des solutions doivent être trouvées.', '2025-02-17 10:40:00'),
(22, 2, 'Bob analyse les différentes perspectives.', '2025-02-17 10:45:00'),
(25, 1, 'bonjour tout le monde', '2025-02-18 09:42:34'),
(29, 1, 'bonjour Alex!\r\n', '2025-02-19 08:39:04'),
(31, 1, 'CC TOUT LE MONDE\r\n', '2025-02-19 09:04:28'),
(32, 28, 'bonne journnée!', '2025-02-19 11:00:51'),
(33, 30, 'CC', '2025-02-19 13:39:22');

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
) ENGINE=InnoDB AUTO_INCREMENT=31 DEFAULT CHARSET=utf16le;

--
-- Déchargement des données de la table `user`
--

INSERT INTO `user` (`id`, `login`, `password`) VALUES
(1, 'ines.charfi@laplateforme.io', '$2y$10$QKj7sGjUTaKoJFYCV6KBE.pl/R4coCTQj/NGPADTAuIZsqMU/MSGW'),
(2, 'meriam.goudadi@laplateforme.io', '1234'),
(3, 'alex.bachir@laplateforme.io', '1234'),
(4, 'ines.charfi@laplateforme.io', '$2y$10$0iCZD3Ht.bYK848ZqxRZfeXfrOrb7Z1HAcDIjXOWnQpDxzKUVfH.K'),
(5, 'ines.charfi@laplateforme.io', '$2y$10$57zRGKiGPfmjM2ewKbN.9eybU.ZAFSotvc0rfu8HiTHbL7dNL9wv2'),
(6, 'ines.charfi@laplateforme.io', '$2y$10$xxC.Ij/XbzpwargdDVvaueqKjWMg2TrvQDGte9BXz9HlL52Ko9lSS'),
(7, 'ines.charfi@laplateforme.io', '$2y$10$QRxf6CfUiUXGT/nEzm/0keDgygjlhg8BhNt1ZQi9/gLG/1WN8hUGq'),
(8, 'ines.charfi@laplateforme.io', '$2y$10$p/LUC1G4MiCknOM09fV1n.TD3DartAzyfa.C.Ika9PQTd0fcqu5/2'),
(9, 'alex.bachir@laplateforme.io', '$2y$10$mxqaspk7Bd9FE6id0wtHl.JK8bWhvPxc75C3PGEAZwAJ6mM/0FhJe'),
(10, 'ines.charfi@laplateforme.io', '$2y$10$U5FISRXUtCWKg9pUN7hyd.OqyzR8jT8/P2fJdC4o2CvB86xbWpJS6'),
(11, 'ines.charfi@laplateforme.io', '$2y$10$Lr6MLkPoXFvwW4yB/LiOdO9ZZ6zIHVsLIryVWto0px/VwQgq6GMHy'),
(12, 'ines.charfi@laplateforme.io', '$2y$10$9lkVyU3inz0IJmkfSXF9yuNqbcV.5FkUlC6Y0ma3k1v.KuyjaejW2'),
(13, 'meriam.goudadi@laplateforme.io', '$2y$10$5lme6.bkWdH99bI9PN8wCesB.MsfFiqQfUxn5NowvcSLoZLdSOyuG'),
(14, 'alex.bachir@laplateforme.io', '$2y$10$jEopCDzFX20ehaEwsd3Nf.mS/KtqU6.odrzuIjQiteQ5LPaLtiDG2'),
(15, 'ines.charfi@laplateforme.io', '$2y$10$0HEwg4OOgxrUWWN8kgQyB.ARpZGsDzMRRityJHGWcFrypTjYuDEC.'),
(16, 'ines.charfi@laplateforme.io', '$2y$10$RrwJ6CcTytX/vM9GpSGvAuefJ/qYUItzouIpD/Uw8tnFHvZ6CpSb2'),
(17, 'ines.charfi@laplateforme.io', '$2y$10$OPJZqtezF.CVStMX/l.BIeRIlIY8t0DCRk4dVL8H5UO139uLfijQO'),
(18, 'saja.charfi@laplateforme.io', '$2y$10$G5atuoSz0aILMVODhx2cQuH0BXTAV1642inblyJEXKXnaKR5ZJQ.W'),
(19, 'ines.charfi@laplateforme.io', '$2y$10$Wm2aICWcNgBLImZ9XP.2N.K3LwB5BsGLKMoktxhhgwSboebzol7IO'),
(20, 'ines.charfi@laplateforme.io', '$2y$10$QsTAOG6HGRWyDzWfuGH..O6XQB4tv97kzLEpY/91ge9lKX/NUJ0Ue'),
(21, 'chahd.charfi@laplateforme.io', '$2y$10$VGz5QFIABNo2yGsejd89cODCjFMN3XE.wYqEUybobRMmyYhF3kq.2'),
(22, 'alex.bachir@laplateforme.io', '1234'),
(23, 'jihad.charfi@laplateforme.io', '$2y$10$O/DROE8YwWzRe5ggzAKkEeUuVYRA7axydcsbrZqPFGahIewiR7IZ2'),
(24, 'jihad.charfi@laplateforme.io', '$2y$10$drnwo5nerpk.rnz7lWdGKOS57SahPgFJ0T0BUHi6DGMkPZi9Sq5Xe'),
(25, 'momo.charfi@gmail.com', '$2y$10$LL0yexst5Q7z51BFIEkiw.zu/1ZmUXEDgMp5BHnSK29F85D0Z4uI6'),
(26, 'walid.charfi@laplateforme.io', '$2y$10$uO1omqfN9VG0.Dpujd7KmOmxR0o8e7psA.F.ShnqaqH8L924F2ZB6'),
(27, 'ines.charfi@laplateforme.io', '$2y$10$ZoiEX.9QrF7BoCronKIY.OmsNHYyUJVsAB3xpptiqrc0txghxpNTW'),
(28, 'sara.charfi@laplateforme.io', '$2y$10$uMWHv71lfK68j2IA.CYOOudE4qYSNEc/FlssWpBAQwo2ECXBWAy.a'),
(29, 'ines.charfi@laplateforme.io', '$2y$10$hWWOZG/IH7hqZhAIURWgr.vI/l3M2RGZRQTMat36LtyomzMlre7M6'),
(30, 'lili.charfi@laplateforme.io', '$2y$10$4lgCSl46LC/SJjAtgnKV3Oi5xoBqFUT0qI1igzYVTHXalzTD7z6U6');

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
