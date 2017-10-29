-- phpMyAdmin SQL Dump
-- version 4.7.4
-- https://www.phpmyadmin.net/
--
-- Hôte : 127.0.0.1:3306
-- Généré le :  Dim 29 oct. 2017 à 22:35
-- Version du serveur :  5.7.19
-- Version de PHP :  5.6.31

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de données :  `boutique`
--

-- --------------------------------------------------------

--
-- Structure de la table `administrateur`
--

DROP TABLE IF EXISTS `administrateur`;
CREATE TABLE IF NOT EXISTS `administrateur` (
  `idAdministrateur` int(11) NOT NULL AUTO_INCREMENT,
  `nom` varchar(45) DEFAULT NULL,
  `prenom` varchar(45) DEFAULT NULL,
  `email` varchar(45) DEFAULT NULL,
  `adresse` varchar(255) DEFAULT NULL,
  `valide` tinyint(4) DEFAULT NULL,
  PRIMARY KEY (`idAdministrateur`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Structure de la table `article`
--

DROP TABLE IF EXISTS `article`;
CREATE TABLE IF NOT EXISTS `article` (
  `idArticle` int(11) NOT NULL AUTO_INCREMENT,
  `designation` varchar(255) NOT NULL,
  `imageUrl` varchar(255) DEFAULT NULL,
  `idCategorie` int(11) NOT NULL,
  `description` text NOT NULL,
  PRIMARY KEY (`idArticle`),
  KEY `FK_Article_Categorie_idx` (`idCategorie`)
) ENGINE=InnoDB AUTO_INCREMENT=54 DEFAULT CHARSET=utf8;

--
-- Déchargement des données de la table `article`
--

INSERT INTO `article` (`idArticle`, `designation`, `imageUrl`, `idCategorie`, `description`) VALUES
(37, 'titi', NULL, 1, ''),
(38, 'toto', 'images/article/b8626f33764d024d7a6e88a903563726.jpg', 1, ''),
(39, 'Rere', NULL, 1, ''),
(40, 'mloi', 'images/article/541ff01c4b692c440e3fe2373de44f85.jpg', 1, ''),
(41, 'zeaz', 'images/article/00f76aee3da9fca57283c0c8b53d2273.jpg', 1, ''),
(42, 'mere', 'images/article/899482c0b97b4814160538880dbd56ca.jpg', 1, ''),
(43, 'Moljs', 'images/article/cd4552f58f6faa46b6c27bb9ac8def22.jpg', 1, ''),
(44, 'fere', NULL, 2, ''),
(45, 'plmoi', 'images/article/a0197a4bdff7bcf7a8b9d150b6ff7fbe.jpg', 2, ''),
(46, 'Aear', 'images/article/150651811771a703a523a5ae66d70269.jpg', 2, ''),
(47, 'lose', 'images/article/13703c04cf08f89796488f8ecc76fca9.jpg', 2, ''),
(48, 'Nery', 'images/article/e2d8ed38b6f89c5fe14a870126adfdfc.jpg', 1, ''),
(49, 'olk', 'images/article/4f60971a8142e1f1220f941ad1fcd12d.jpg', 2, ''),
(50, 'Nos', 'images/article/93723e28c9d14b793f0c9f39ec6c9826.jpg', 1, ''),
(51, 'tuta', 'images/article/89faa5623c2bdd45b93ba09be6d862f0.jpg', 2, ''),
(52, 'mlnj', 'images/article/7327249b0bca717d4da1f5312ce1f251.jpg', 2, ''),
(53, 'poiri', 'images/article/3e245a8c7ab7d16b9e218a0dd6348676.jpg', 2, ' Vestibulum non sagittis nunc. In quis felis nibh. Etiam malesuada purus nec risus efficitur, aliquet cursus dolor porttitor. Suspendisse semper metus sed vehicula rutrum. Nam porta orci sit amet massa pulvinar, in egestas elit eleifend. Integer in facilisis arcu. Vestibulum ut fringilla risus, eu posuere ex. Praesent magna dolor, lobortis ut elit ac, vulputate luctus elit. Cras posuere tellus in erat bibendum sodales. Lorem ipsum dolor sit amet, consectetur adipiscing elit. Donec faucibus ipsum \r\nAjoutermi, fringilla sagittis leo accumsan vitae. Phasellus varius enim ac arcu finibus tempor. Pellentesque mattis faucibus venenatis. Sed consectetur tortor nec sagittis porta. In eget enim vel nunc vestibulum fringilla. Vestibulum ante ipsum primis in faucibus orci luctus et ultrices posuere cubilia Curae;');

-- --------------------------------------------------------

--
-- Structure de la table `articlevendeur`
--

DROP TABLE IF EXISTS `articlevendeur`;
CREATE TABLE IF NOT EXISTS `articlevendeur` (
  `idArticle` int(11) NOT NULL,
  `idVendeur` int(11) NOT NULL,
  `quantite` int(11) NOT NULL,
  `payableNFois` int(11) DEFAULT NULL,
  `prix` float NOT NULL,
  PRIMARY KEY (`idArticle`,`idVendeur`),
  KEY `FK_ArticleVendeur_Vedeur_idx` (`idVendeur`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Déchargement des données de la table `articlevendeur`
--

INSERT INTO `articlevendeur` (`idArticle`, `idVendeur`, `quantite`, `payableNFois`, `prix`) VALUES
(37, 1, 123, 0, 987),
(38, 1, 98, 0, 23),
(39, 1, 123, 0, 234),
(40, 1, 87, 0, 32),
(41, 1, 987, 0, 87),
(42, 1, 123, 0, 23),
(43, 1, 23, 0, 134),
(44, 1, 123, 0, 23),
(45, 1, 143, 0, 123),
(46, 1, 345, 0, 98),
(47, 1, 89, 0, 123),
(48, 1, 477, 0, 1234),
(49, 1, 56, 0, 32),
(50, 1, 98, 0, 67),
(51, 1, 123, 0, 74),
(52, 1, 210, 0, 32),
(53, 1, 89, 0, 234),
(53, 2, 214, 0, 214);

-- --------------------------------------------------------

--
-- Structure de la table `categorie`
--

DROP TABLE IF EXISTS `categorie`;
CREATE TABLE IF NOT EXISTS `categorie` (
  `idCategorie` int(11) NOT NULL AUTO_INCREMENT,
  `nom` varchar(45) NOT NULL,
  PRIMARY KEY (`idCategorie`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8;

--
-- Déchargement des données de la table `categorie`
--

INSERT INTO `categorie` (`idCategorie`, `nom`) VALUES
(1, 'Informatique'),
(2, 'Jeux');

-- --------------------------------------------------------

--
-- Structure de la table `client`
--

DROP TABLE IF EXISTS `client`;
CREATE TABLE IF NOT EXISTS `client` (
  `idClient` int(11) NOT NULL AUTO_INCREMENT,
  `nom` varchar(45) DEFAULT NULL,
  `prenom` varchar(45) DEFAULT NULL,
  `email` varchar(45) NOT NULL,
  `password` varchar(255) NOT NULL,
  `adresse` varchar(45) DEFAULT NULL,
  `valide` tinyint(4) DEFAULT NULL,
  `token` varchar(255) NOT NULL,
  PRIMARY KEY (`idClient`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8;

--
-- Déchargement des données de la table `client`
--

INSERT INTO `client` (`idClient`, `nom`, `prenom`, `email`, `password`, `adresse`, `valide`, `token`) VALUES
(1, 'azerty', 'azerty', 'azerty@mlk.fr', '8d969eef6ecad3c29a3a629280e686cf0c3f5d5a86aff3ca12020c923adc6c92', '', 1, 'f4918f181fd27e57d852e341f15096e1e1c37ce9'),
(3, 'azerty', 'azer', 'azerty@mlk.frze', '8d969eef6ecad3c29a3a629280e686cf0c3f5d5a86aff3ca12020c923adc6c92', '', 0, '474ab8ae7b16aa13e0ee391dcbd6f9305545c5b9');

-- --------------------------------------------------------

--
-- Structure de la table `commande`
--

DROP TABLE IF EXISTS `commande`;
CREATE TABLE IF NOT EXISTS `commande` (
  `idCommande` int(11) NOT NULL AUTO_INCREMENT,
  `date` tinyint(4) DEFAULT NULL,
  `etat` varchar(45) DEFAULT NULL,
  `idClient` int(11) DEFAULT NULL,
  PRIMARY KEY (`idCommande`),
  KEY `FK_Commande_Client_idx` (`idClient`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Structure de la table `commandearticle`
--

DROP TABLE IF EXISTS `commandearticle`;
CREATE TABLE IF NOT EXISTS `commandearticle` (
  `idCommande` int(11) NOT NULL,
  `idArticle` int(11) NOT NULL,
  `quantite` int(11) DEFAULT NULL,
  PRIMARY KEY (`idCommande`,`idArticle`),
  KEY `FK_CommandeArticle_Article_idx` (`idArticle`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Structure de la table `message`
--

DROP TABLE IF EXISTS `message`;
CREATE TABLE IF NOT EXISTS `message` (
  `idMessage` int(11) NOT NULL AUTO_INCREMENT,
  `date` datetime NOT NULL,
  `contenu` longtext,
  `vendeur` tinyint(4) DEFAULT NULL,
  `reclamation` tinyint(4) DEFAULT NULL,
  `idPersonne` int(11) DEFAULT NULL,
  `idArticle` int(11) DEFAULT NULL,
  PRIMARY KEY (`idMessage`),
  KEY `FK_Message_Article_idx` (`idArticle`),
  KEY `FK_Message_Vendeur_idx` (`idPersonne`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8;

--
-- Déchargement des données de la table `message`
--

INSERT INTO `message` (`idMessage`, `date`, `contenu`, `vendeur`, `reclamation`, `idPersonne`, `idArticle`) VALUES
(2, '2017-10-18 05:17:00', 'coucou', NULL, NULL, 3, 53);

-- --------------------------------------------------------

--
-- Structure de la table `reduction`
--

DROP TABLE IF EXISTS `reduction`;
CREATE TABLE IF NOT EXISTS `reduction` (
  `idReduction` int(11) NOT NULL AUTO_INCREMENT,
  `idCategorie` int(11) NOT NULL,
  `idClient` int(11) NOT NULL,
  `pourcentage` float NOT NULL,
  PRIMARY KEY (`idReduction`),
  KEY `FK_Reduction_Categorie_idx` (`idCategorie`),
  KEY `FK_Reduction_Client_idx` (`idClient`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Structure de la table `reservation`
--

DROP TABLE IF EXISTS `reservation`;
CREATE TABLE IF NOT EXISTS `reservation` (
  `idArticle` int(11) NOT NULL,
  `idClient` int(11) NOT NULL,
  `quantite` int(11) DEFAULT NULL,
  `date` date DEFAULT NULL,
  PRIMARY KEY (`idArticle`,`idClient`),
  KEY `FK_Reservation_Client_idx` (`idClient`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Structure de la table `retour`
--

DROP TABLE IF EXISTS `retour`;
CREATE TABLE IF NOT EXISTS `retour` (
  `idRetour` int(11) NOT NULL,
  `date` datetime DEFAULT NULL,
  `etat` varchar(45) DEFAULT NULL,
  `idArticle` int(11) NOT NULL,
  `idClient` int(11) NOT NULL,
  PRIMARY KEY (`idRetour`),
  KEY `FK_Retour_Article_idx` (`idArticle`),
  KEY `FK_Retour_Client_idx` (`idClient`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Structure de la table `vendeur`
--

DROP TABLE IF EXISTS `vendeur`;
CREATE TABLE IF NOT EXISTS `vendeur` (
  `idVendeur` int(11) NOT NULL AUTO_INCREMENT,
  `nom` varchar(45) DEFAULT NULL,
  `prenom` varchar(45) DEFAULT NULL,
  `email` varchar(45) DEFAULT NULL,
  `adresse` varchar(255) DEFAULT NULL,
  `valide` tinyint(4) DEFAULT NULL,
  `adresseVendeur` varchar(255) DEFAULT NULL,
  `nomVendeur` varchar(255) DEFAULT NULL,
  PRIMARY KEY (`idVendeur`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8;

--
-- Déchargement des données de la table `vendeur`
--

INSERT INTO `vendeur` (`idVendeur`, `nom`, `prenom`, `email`, `adresse`, `valide`, `adresseVendeur`, `nomVendeur`) VALUES
(1, 'Ahamada', 'Tamou', 'sdfd@mlh.com', '12 rue kjhfd ssd', 1, '123 rue delaboutique', 'MarketShop'),
(2, 'test', 'test', 'tzts@jh.fr', 'sdf dfe ef', NULL, 'df df21 fdf', 'MyBoutique');

--
-- Contraintes pour les tables déchargées
--

--
-- Contraintes pour la table `article`
--
ALTER TABLE `article`
  ADD CONSTRAINT `FK_Article_Categorie` FOREIGN KEY (`idCategorie`) REFERENCES `categorie` (`idCategorie`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Contraintes pour la table `articlevendeur`
--
ALTER TABLE `articlevendeur`
  ADD CONSTRAINT `FK_ArticleVendeur_Article` FOREIGN KEY (`idArticle`) REFERENCES `article` (`idArticle`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `FK_ArticleVendeur_Vedeur` FOREIGN KEY (`idVendeur`) REFERENCES `vendeur` (`idVendeur`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Contraintes pour la table `commande`
--
ALTER TABLE `commande`
  ADD CONSTRAINT `FK_Commande_Client` FOREIGN KEY (`idClient`) REFERENCES `client` (`idClient`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Contraintes pour la table `commandearticle`
--
ALTER TABLE `commandearticle`
  ADD CONSTRAINT `FK_CommandeArticle_Article` FOREIGN KEY (`idArticle`) REFERENCES `article` (`idArticle`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `FK_CommandeArticle_Commande` FOREIGN KEY (`idCommande`) REFERENCES `commande` (`idCommande`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Contraintes pour la table `message`
--
ALTER TABLE `message`
  ADD CONSTRAINT `FK_Message_Article` FOREIGN KEY (`idArticle`) REFERENCES `article` (`idArticle`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `FK_Message_Client` FOREIGN KEY (`idPersonne`) REFERENCES `client` (`idClient`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Contraintes pour la table `reduction`
--
ALTER TABLE `reduction`
  ADD CONSTRAINT `FK_Reduction_Categorie` FOREIGN KEY (`idCategorie`) REFERENCES `categorie` (`idCategorie`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `FK_Reduction_Client` FOREIGN KEY (`idClient`) REFERENCES `client` (`idClient`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Contraintes pour la table `reservation`
--
ALTER TABLE `reservation`
  ADD CONSTRAINT `FK_Reservation_Article` FOREIGN KEY (`idArticle`) REFERENCES `article` (`idArticle`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `FK_Reservation_Client` FOREIGN KEY (`idClient`) REFERENCES `client` (`idClient`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Contraintes pour la table `retour`
--
ALTER TABLE `retour`
  ADD CONSTRAINT `FK_Retour_Article` FOREIGN KEY (`idArticle`) REFERENCES `article` (`idArticle`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `FK_Retour_Client` FOREIGN KEY (`idClient`) REFERENCES `client` (`idClient`) ON DELETE NO ACTION ON UPDATE NO ACTION;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
