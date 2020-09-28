-- phpMyAdmin SQL Dump
-- version 4.9.2
-- https://www.phpmyadmin.net/
--
-- Hôte : 127.0.0.1:3306
-- Généré le :  lun. 14 sep. 2020 à 20:40
-- Version du serveur :  8.0.18
-- Version de PHP :  7.3.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de données :  `app_ticket`
--

-- --------------------------------------------------------

--
-- Structure de la table `tickets`
--

DROP TABLE IF EXISTS `tickets`;
CREATE TABLE IF NOT EXISTS `tickets` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `dating` date NOT NULL,
  `titled` text CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci NOT NULL,
  `amount` int(11) NOT NULL,
  UNIQUE KEY `id` (`id`),
  UNIQUE KEY `date` (`dating`)
) ENGINE=MyISAM AUTO_INCREMENT=32 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Déchargement des données de la table `tickets`
--

INSERT INTO `tickets` (`id`, `dating`, `titled`, `amount`) VALUES
(1, '2020-09-01', '1 botte x carrote,\r\n1x botte x radis,\r\n1 x jambon 250g ', 28),
(3, '2020-09-03', '1 x pizza 4 fromages,\r\n2 x glace en pot', 15),
(2, '2020-09-02', '1 x poulet,\r\n1 x yaourt - 6', 20),
(4, '2020-09-04', '1 x couteau,\r\n1 x bache transparente,\r\n1 x pelle,\r\n1 x bidon d\'essence 10L,\r\n1 x scotch indéchirable\r\n', 100),
(11, '2020-09-06', '1 x menotte,\r\n1 x tronçonneuse', 200),
(31, '2020-09-14', 'chat²', 20);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
