-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Hôte : 127.0.0.1:3306
-- Généré le : ven. 13 déc. 2024 à 10:38
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
-- Base de données : `la_quizzine`
--

-- --------------------------------------------------------

--
-- Structure de la table `answer`
--

DROP TABLE IF EXISTS `answer`;
CREATE TABLE IF NOT EXISTS `answer` (
  `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT,
  `idQuestion` int NOT NULL,
  `textReponse` varchar(255) NOT NULL,
  `isCorrect` tinyint(1) NOT NULL,
  PRIMARY KEY (`id`),
  KEY `answer_idquestion_foreign` (`idQuestion`)
) ENGINE=MyISAM AUTO_INCREMENT=25 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Déchargement des données de la table `answer`
--

INSERT INTO `answer` (`id`, `idQuestion`, `textReponse`, `isCorrect`) VALUES
(1, 1, 'Un pompier?', 0),
(2, 1, 'Un infirmier?', 0),
(3, 1, 'Un flic?', 1),
(4, 1, 'Un militaire?', 0),
(5, 2, 'Un oiseau?', 0),
(6, 2, 'Un 747?', 1),
(7, 2, 'Un ecureuil?', 0),
(8, 2, 'Un 38 tonnes?', 0),
(9, 3, '4L?', 0),
(10, 3, '3L?', 0),
(11, 3, '2L?', 0),
(12, 3, '1L?', 1),
(13, 4, 'Un café noir?', 1),
(14, 4, 'Un ricard?', 0),
(15, 4, 'Un jambon-beurre?', 0),
(16, 4, 'Un whisky coca?', 0),
(17, 5, 'Mistral Gagnant?', 0),
(18, 5, 'Dès que le vent soufflera?', 1),
(19, 5, 'Manatthan Kaboul?', 0),
(20, 5, 'Laisse Béton?', 0),
(21, 6, '2h?', 0),
(22, 6, 'Une journée?', 0),
(23, 6, '5 minutes?', 1),
(24, 6, '5h?', 0);

-- --------------------------------------------------------

--
-- Structure de la table `question`
--

DROP TABLE IF EXISTS `question`;
CREATE TABLE IF NOT EXISTS `question` (
  `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT,
  `questionName` varchar(255) NOT NULL,
  `idTheme` bigint NOT NULL,
  PRIMARY KEY (`id`),
  KEY `question_idtheme_foreign` (`idTheme`)
) ENGINE=MyISAM AUTO_INCREMENT=7 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Déchargement des données de la table `question`
--

INSERT INTO `question` (`id`, `questionName`, `idTheme`) VALUES
(1, 'Qui Renaud a embrassé?', 2),
(2, 'Qu\'est ce qui s\'est ecrasé dans ses fenêtres?', 2),
(3, 'Combien de litres de Pastis Renaud buvait-il par jour?', 2),
(4, 'Qu\'est ce qu\'a commandé le type dans le bar dans \"Laisse béton\"?', 2),
(5, 'Quelle chanson de Renaud commence par les paroles : \"C\'est pas l\'homme qui prend la mer, c\'est la mer qui prend l\'homme\" ?', 2),
(6, 'Dans Mistral Gagnant, combien de temps Renaud s\'assoit sur un banc?', 2);

-- --------------------------------------------------------

--
-- Structure de la table `theme`
--

DROP TABLE IF EXISTS `theme`;
CREATE TABLE IF NOT EXISTS `theme` (
  `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT,
  `themeName` varchar(255) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=3 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Déchargement des données de la table `theme`
--

INSERT INTO `theme` (`id`, `themeName`) VALUES
(2, 'Renaud');

-- --------------------------------------------------------

--
-- Structure de la table `user`
--

DROP TABLE IF EXISTS `user`;
CREATE TABLE IF NOT EXISTS `user` (
  `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT,
  `pseudo` varchar(255) NOT NULL,
  `score` int NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
