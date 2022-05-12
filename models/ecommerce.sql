-- phpMyAdmin SQL Dump
-- version 5.0.3
-- https://www.phpmyadmin.net/
--
-- Hôte : 127.0.0.1
-- Généré le : jeu. 24 mars 2022 à 16:50
-- Version du serveur :  10.4.14-MariaDB
-- Version de PHP : 7.4.11

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de données : `ecommerce`
--

-- --------------------------------------------------------

--
-- Structure de la table `aliment`
--

CREATE TABLE `aliment` (
  `id` int(11) NOT NULL,
  `nom` varchar(30) NOT NULL,
  `description` varchar(150) NOT NULL,
  `quantite` int(11) NOT NULL,
  `disponibilite` tinyint(1) DEFAULT NULL,
  `categorie_id` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Déchargement des données de la table `aliment`
--

INSERT INTO `aliment` (`id`, `nom`, `description`, `quantite`, `disponibilite`, `categorie_id`) VALUES
(1, 'Croquettes de Poulets', 'Fait avec des poulets élevées avec Amour', 22, 0, 1),
(2, 'Croquettes de Corneille', 'Corneilles élevés en liberté', 12, 1, 2),
(3, 'Croquettes de Pissenlit', 'Idéal pour un souper amoureux à la St-Valentin', 222, 1, 1),
(4, 'Croquettes d\'araignée', 'Délicieuses crues', 2, 1, 3);

-- --------------------------------------------------------

--
-- Structure de la table `aliment_commerce`
--

CREATE TABLE `aliment_commerce` (
  `id` int(11) NOT NULL,
  `aliment_id` int(11) NOT NULL,
  `commerce_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Déchargement des données de la table `aliment_commerce`
--

INSERT INTO `aliment_commerce` (`id`, `aliment_id`, `commerce_id`) VALUES
(1, 1, 2),
(2, 4, 2),
(6, 3, 2);

-- --------------------------------------------------------

--
-- Structure de la table `categorie`
--

CREATE TABLE `categorie` (
  `id` int(11) NOT NULL,
  `categorie` varchar(30) COLLATE utf8mb4_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Déchargement des données de la table `categorie`
--

INSERT INTO `categorie` (`id`, `categorie`) VALUES
(1, 'Fruits'),
(2, 'Congelé'),
(3, 'Viande'),
(4, 'En canne');

-- --------------------------------------------------------

--
-- Structure de la table `commerce`
--

CREATE TABLE `commerce` (
  `id` int(11) NOT NULL,
  `commerce` varchar(30) COLLATE utf8mb4_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Déchargement des données de la table `commerce`
--

INSERT INTO `commerce` (`id`, `commerce`) VALUES
(1, 'Supermarché IGA'),
(2, 'Cafétéria du CÉGEP'),
(3, 'MAXI'),
(4, 'PROVIGO'),
(5, 'SUPER C');

-- --------------------------------------------------------

--
-- Structure de la table `utilisateur`
--

CREATE TABLE `utilisateur` (
  `id` int(11) NOT NULL,
  `usager` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `motDePasse` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Déchargement des données de la table `utilisateur`
--

INSERT INTO `utilisateur` (`id`, `usager`, `motDePasse`) VALUES
(1, 'yvon@cegeprdl.ca', '$2y$10$QBrY.bx3rR1ZWG1eFuHWZ.v9npHMEOBvfKNlp/m3cjOf1Ll.Z0s12');

--
-- Index pour les tables déchargées
--

--
-- Index pour la table `aliment`
--
ALTER TABLE `aliment`
  ADD PRIMARY KEY (`id`),
  ADD KEY `categorie_id` (`categorie_id`);

--
-- Index pour la table `aliment_commerce`
--
ALTER TABLE `aliment_commerce`
  ADD PRIMARY KEY (`id`),
  ADD KEY `aliment_id` (`aliment_id`),
  ADD KEY `commerce_id` (`commerce_id`);

--
-- Index pour la table `categorie`
--
ALTER TABLE `categorie`
  ADD PRIMARY KEY (`id`);

--
-- Index pour la table `commerce`
--
ALTER TABLE `commerce`
  ADD PRIMARY KEY (`id`);

--
-- Index pour la table `utilisateur`
--
ALTER TABLE `utilisateur`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT pour les tables déchargées
--

--
-- AUTO_INCREMENT pour la table `aliment`
--
ALTER TABLE `aliment`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=49;

--
-- AUTO_INCREMENT pour la table `aliment_commerce`
--
ALTER TABLE `aliment_commerce`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=144;

--
-- AUTO_INCREMENT pour la table `categorie`
--
ALTER TABLE `categorie`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT pour la table `commerce`
--
ALTER TABLE `commerce`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT pour la table `utilisateur`
--
ALTER TABLE `utilisateur`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- Contraintes pour les tables déchargées
--

--
-- Contraintes pour la table `aliment`
--
ALTER TABLE `aliment`
  ADD CONSTRAINT `aliment_ibfk_1` FOREIGN KEY (`categorie_id`) REFERENCES `categorie` (`id`);

--
-- Contraintes pour la table `aliment_commerce`
--
ALTER TABLE `aliment_commerce`
  ADD CONSTRAINT `aliment_commerce_ibfk_1` FOREIGN KEY (`aliment_id`) REFERENCES `aliment` (`id`),
  ADD CONSTRAINT `aliment_commerce_ibfk_2` FOREIGN KEY (`commerce_id`) REFERENCES `commerce` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
