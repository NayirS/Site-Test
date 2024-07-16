-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Hôte : 127.0.0.1
-- Généré le : jeu. 20 juin 2024 à 09:57
-- Version du serveur : 10.4.32-MariaDB
-- Version de PHP : 8.2.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de données : `formation`
--

-- --------------------------------------------------------

--
-- Structure de la table `pharmacie`
--

CREATE TABLE `pharmacie` (
  `id` int(11) NOT NULL,
  `nom_produit` varchar(100) NOT NULL,
  `description` text DEFAULT NULL,
  `prix` decimal(10,2) NOT NULL,
  `quantite` int(11) NOT NULL,
  `date_expiration` date DEFAULT NULL,
  `fournisseur` varchar(100) DEFAULT NULL,
  `fabricant` varchar(100) DEFAULT NULL,
  `categorie` varchar(50) DEFAULT NULL,
  `date_entree` date DEFAULT NULL,
  `date_sortie` date DEFAULT NULL,
  `lieu_stockage` varchar(100) DEFAULT NULL,
  `pharmacien_responsable` varchar(100) DEFAULT NULL,
  `client` varchar(100) DEFAULT NULL,
  `adresse_client` varchar(255) DEFAULT NULL,
  `telephone_client` varchar(20) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Déchargement des données de la table `pharmacie`
--

INSERT INTO `pharmacie` (`id`, `nom_produit`, `description`, `prix`, `quantite`, `date_expiration`, `fournisseur`, `fabricant`, `categorie`, `date_entree`, `date_sortie`, `lieu_stockage`, `pharmacien_responsable`, `client`, `adresse_client`, `telephone_client`) VALUES
(1, 'Paracétamol', 'Antipyrétique, antalgique et antiprurigineux', 5.99, 100, '2025-12-31', 'Fournisseur Pharma', 'Fabricant MedLab', 'Médicament', '2023-01-15', NULL, 'Pharmacie Centrale', 'Dr. Jean Dupont', 'Clinique ABC', '12 rue des Fleurs', '123-456-7890'),
(2, 'Ibuprofène', 'Anti-inflammatoire non stéroïdien', 8.49, 80, '2024-10-31', 'Fournisseur Pharma', 'Fabricant Biomed', 'Médicament', '2023-02-20', NULL, 'Pharmacie Nord', 'Dr. Marie Leclerc', 'Hôpital XYZ', '45 avenue des Étoiles', '234-567-8901'),
(3, 'Amoxicilline', 'Antibiotique', 12.75, 50, '2023-09-30', 'Fournisseur MédiSanté', 'Fabricant Pharmatech', 'Médicament', '2022-12-10', NULL, 'Pharmacie Sud', 'Dr. Pierre Martin', 'Cabinet Médical Alpha', '78 boulevard du Soleil', '345-678-9012');

--
-- Index pour les tables déchargées
--

--
-- Index pour la table `pharmacie`
--
ALTER TABLE `pharmacie`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT pour les tables déchargées
--

--
-- AUTO_INCREMENT pour la table `pharmacie`
--
ALTER TABLE `pharmacie`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
