-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Hôte : 127.0.0.1:3306
-- Généré le : lun. 17 juin 2024 à 10:04
-- Version du serveur : 8.3.0
-- Version de PHP : 8.2.18

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de données : `quiz`
--

-- --------------------------------------------------------

--
-- Structure de la table `categorie`
--

DROP TABLE IF EXISTS `categorie`;
CREATE TABLE IF NOT EXISTS `categorie` (
  `id_categorie` int NOT NULL AUTO_INCREMENT,
  `nom` varchar(100) NOT NULL,
  PRIMARY KEY (`id_categorie`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

-- --------------------------------------------------------

--
-- Structure de la table `question`
--

DROP TABLE IF EXISTS `question`;
CREATE TABLE IF NOT EXISTS `question` (
  `id_question` int NOT NULL AUTO_INCREMENT,
  `question` varchar(255) NOT NULL,
  `options` varchar(255) NOT NULL,
  `correctAnswer` int NOT NULL,
  `difficulte` int NOT NULL,
  `id_categorie` int DEFAULT NULL,
  PRIMARY KEY (`id_question`),
  KEY `id_categorie` (`id_categorie`)
) ENGINE=InnoDB AUTO_INCREMENT=11 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Déchargement des données de la table `question`
--

INSERT INTO `question` (`id_question`, `question`, `options`, `correctAnswer`, `difficulte`, `id_categorie`) VALUES
(1, 'Quel Pokémon est une souris électrique ?', '[\"Salamèche\", \"Pikachu\", \"Bulbizarre\", \"Carapuce\"]', 2, 0, NULL),
(2, 'Quel type est le Pokémon Rondoudou ?', '[\"Eau\", \"Feu\", \"Fée\", \"Électrique\"]', 3, 0, NULL),
(3, 'Quel Pokémon évolue en Dracaufeu ?', '[\"Reptincel\", \"Bulbizarre\", \"Carapuce\", \"Roucoups\"]', 1, 0, NULL),
(4, 'Quel Pokémon est numéro 1 dans le Pokédex ?', '[\"Bulbizarre\", \"Herbizarre\", \"Florizarre\", \"Salamèche\"]', 1, 0, NULL),
(5, 'De quelle couleur est Léviator shiny ?', '[\"Bleu\", \"Rouge\", \"Vert\", \"Jaune\"]', 2, 0, NULL),
(6, 'Quel Pokémon est connu pour dire \'Carapuce, à l\'attaque\' ?', '[\"Salamèche\", \"Pikachu\", \"Bulbizarre\", \"Carapuce\"]', 4, 0, NULL),
(7, 'Quel est le type principal de Dracolosse ?', '[\"Dragon\", \"Vol\", \"Eau\", \"Feu\"]', 1, 0, NULL),
(8, 'Quelle est l\'évolution de Pikachu ?', '[\"Raichu\", \"Evoli\", \"Voltali\", \"Roucarnage\"]', 1, 0, NULL),
(9, 'Quel Pokémon est le partenaire principal de Sacha dans l\'anime ?', '[\"Bulbizarre\", \"Pikachu\", \"Carapuce\", \"Salamèche\"]', 2, 0, NULL),
(10, 'Quel type de Pokémon est Arcanin ?', '[\"Feu\", \"Eau\", \"Électrique\", \"Plante\"]', 1, 0, NULL);

-- --------------------------------------------------------

--
-- Structure de la table `quiz`
--

DROP TABLE IF EXISTS `quiz`;
CREATE TABLE IF NOT EXISTS `quiz` (
  `id_quiz` int NOT NULL AUTO_INCREMENT,
  `titre` varchar(100) NOT NULL,
  PRIMARY KEY (`id_quiz`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

-- --------------------------------------------------------

--
-- Structure de la table `quiz_question`
--

DROP TABLE IF EXISTS `quiz_question`;
CREATE TABLE IF NOT EXISTS `quiz_question` (
  `id_quiz_question` int NOT NULL AUTO_INCREMENT,
  `id_quiz` int NOT NULL,
  `id_question` int NOT NULL,
  PRIMARY KEY (`id_quiz_question`),
  KEY `id_quiz` (`id_quiz`),
  KEY `id_question` (`id_question`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

-- --------------------------------------------------------

--
-- Structure de la table `score`
--

DROP TABLE IF EXISTS `score`;
CREATE TABLE IF NOT EXISTS `score` (
  `id_score` int NOT NULL AUTO_INCREMENT,
  `id_quiz` int NOT NULL,
  PRIMARY KEY (`id_score`),
  KEY `id_quiz` (`id_quiz`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Contraintes pour les tables déchargées
--

--
-- Contraintes pour la table `question`
--
ALTER TABLE `question`
  ADD CONSTRAINT `question_ibfk_1` FOREIGN KEY (`id_categorie`) REFERENCES `categorie` (`id_categorie`);

--
-- Contraintes pour la table `quiz_question`
--
ALTER TABLE `quiz_question`
  ADD CONSTRAINT `quiz_question_ibfk_1` FOREIGN KEY (`id_quiz`) REFERENCES `quiz` (`id_quiz`),
  ADD CONSTRAINT `quiz_question_ibfk_2` FOREIGN KEY (`id_question`) REFERENCES `question` (`id_question`);

--
-- Contraintes pour la table `score`
--
ALTER TABLE `score`
  ADD CONSTRAINT `score_ibfk_1` FOREIGN KEY (`id_quiz`) REFERENCES `quiz` (`id_quiz`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
