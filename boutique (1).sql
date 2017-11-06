-- phpMyAdmin SQL Dump
-- version 4.7.4
-- https://www.phpmyadmin.net/
--
-- Hôte : 127.0.0.1:3306
-- Généré le :  lun. 06 nov. 2017 à 15:56
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
) ENGINE=InnoDB AUTO_INCREMENT=55 DEFAULT CHARSET=utf8;

--
-- Déchargement des données de la table `article`
--

INSERT INTO `article` (`idArticle`, `designation`, `imageUrl`, `idCategorie`, `description`) VALUES
(37, 'Apple MacBook Air 13.3\'\' LED 128 Go SSD 8 Go RAM Intel Core i5 bicœur à 1.8 Ghz MQD32FN ', 'images/article/azertyu321654.png', 1, ''),
(38, 'PC Portable Asus R540UP-GO112T 15.6\"', 'images/article/2315sdfsdf654.png', 1, ''),
(39, 'PC Portable HP Omen 15-ax242nf 15.6\"', 'images/article/qffdsdf3215sdf48z56ef1.png', 1, ''),
(40, 'PC Portable Lenovo IdeaPad 320-17AST 80XW000SFR 17', 'images/article/sqgvs23dsfg1sdfhg1sdfh321fdg32.png', 1, ''),
(41, 'PC Portable HP 15-bw035nf 15.6', 'images/article/321564s6g54g65r4g65r1gfgf.png', 1, ''),
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
(53, 'poiri', 'images/article/3e245a8c7ab7d16b9e218a0dd6348676.jpg', 2, ' Vestibulum non sagittis nunc. In quis felis nibh. Etiam malesuada purus nec risus efficitur, aliquet cursus dolor porttitor. Suspendisse semper metus sed vehicula rutrum. Nam porta orci sit amet massa pulvinar, in egestas elit eleifend. Integer in facilisis arcu. Vestibulum ut fringilla risus, eu posuere ex. Praesent magna dolor, lobortis ut elit ac, vulputate luctus elit. Cras posuere tellus in erat bibendum sodales. Lorem ipsum dolor sit amet, consectetur adipiscing elit. Donec faucibus ipsum \r\nAjoutermi, fringilla sagittis leo accumsan vitae. Phasellus varius enim ac arcu finibus tempor. Pellentesque mattis faucibus venenatis. Sed consectetur tortor nec sagittis porta. In eget enim vel nunc vestibulum fringilla. Vestibulum ante ipsum primis in faucibus orci luctus et ultrices posuere cubilia Curae;'),
(54, 'refoil', 'images/article/be3598d3ff07be0248f52f2103b3cd08.jpg', 1, ' nteger sagittis, nulla vel auctor congue, erat lorem lacinia urna, sit amet efficitur lectus quam vel sem. Aenean mattis posuere erat quis porta. Pellentesque at accumsan neque. Ut feugiat sed metus et aliquam. Phasellus eget porttitor massa, sed accumsan arcu. Cras mollis urna id sem consectetur euismod. Suspendisse pharetra est laoreet, interdum justo non, luctus neque. Nam luctus velit non malesuada mattis. Quisque vitae enim luctus felis mattis eleifend vel quis lectus. Morbi nisl massa, pellentesque ut dictum vel, imperdiet vitae turpis. Vestibulum sodales, ex sed feugiat varius, augue ligula molestie ante, ut fringilla libero urna et neque. Phasellus iaculis venenatis diam, quis viverra dui lobortis in.');

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
(37, 1, 123, 0, 1099),
(38, 1, 45, 0, 679),
(39, 1, 123, 0, 899.99),
(40, 1, 87, 0, 349.99),
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
(53, 2, 214, 0, 214),
(54, 1, 32, 0, 124);

-- --------------------------------------------------------

--
-- Structure de la table `categorie`
--

DROP TABLE IF EXISTS `categorie`;
CREATE TABLE IF NOT EXISTS `categorie` (
  `idCategorie` int(11) NOT NULL AUTO_INCREMENT,
  `nom` varchar(45) NOT NULL,
  PRIMARY KEY (`idCategorie`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=utf8;

--
-- Déchargement des données de la table `categorie`
--

INSERT INTO `categorie` (`idCategorie`, `nom`) VALUES
(1, 'Ordinateur'),
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
  `telephone` varchar(20) DEFAULT NULL,
  PRIMARY KEY (`idClient`)
) ENGINE=InnoDB AUTO_INCREMENT=10 DEFAULT CHARSET=utf8;

--
-- Déchargement des données de la table `client`
--

INSERT INTO `client` (`idClient`, `nom`, `prenom`, `email`, `password`, `adresse`, `valide`, `token`, `telephone`) VALUES
(1, 'azertyii', 'azerty', 'azerty@mlk.fr', '8d969eef6ecad3c29a3a629280e686cf0c3f5d5a86aff3ca12020c923adc6c92', '2 rue du moul', 1, 'f4918f181fd27e57d852e341f15096e1e1c37ce9', ''),
(3, 'azerty', 'azer', 'azerty@mlk.frze', '8d969eef6ecad3c29a3a629280e686cf0c3f5d5a86aff3ca12020c923adc6c92', '', 0, '474ab8ae7b16aa13e0ee391dcbd6f9305545c5b9', ''),
(4, 'toto', 'toto', 'tamoo@yopmail.com', '8d969eef6ecad3c29a3a629280e686cf0c3f5d5a86aff3ca12020c923adc6c92', '', 1, '572aa2935d9c1d22c08b634bd45881b78a110add', NULL),
(5, 'toto', 'toto', 'toto@yopmail.com', '8d969eef6ecad3c29a3a629280e686cf0c3f5d5a86aff3ca12020c923adc6c92', '', 0, '684312138e3e6d397c326916bc505534a858dcc1', NULL),
(6, 'toto', 'toto', 'tamoo2@yopmail.com', '8d969eef6ecad3c29a3a629280e686cf0c3f5d5a86aff3ca12020c923adc6c92', '', 1, 'ec86d7170900ea4fb54c73d47903a6749e1a5a2f', NULL),
(7, 'titu', 'tutu', 'tamoo6@yopmail.com', '8d969eef6ecad3c29a3a629280e686cf0c3f5d5a86aff3ca12020c923adc6c92', '', 1, '3f39ef7300d23f1fb72e083fb0c0a6b288230766', ''),
(8, 'Ahamada', 'Tamou', 'vendeur@vendeur.com', '8d969eef6ecad3c29a3a629280e686cf0c3f5d5a86aff3ca12020c923adc6c92', '12 rue kjhfd ssd', 1, '', NULL),
(9, 'test', 'test', 'tzts@jh.fr', '8d969eef6ecad3c29a3a629280e686cf0c3f5d5a86aff3ca12020c923adc6c92', 'sdf dfe ef', 1, '', NULL);

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
  `datePrevue` datetime DEFAULT NULL,
  `dateRecue` int(11) DEFAULT NULL,
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
  `idVendeur` int(11) NOT NULL,
  `quantite` int(11) DEFAULT NULL,
  `datePrevue` datetime DEFAULT NULL,
  `dateRecue` datetime DEFAULT NULL,
  `etat` varchar(100) DEFAULT NULL,
  PRIMARY KEY (`idCommande`,`idArticle`,`idVendeur`),
  KEY `FK_CommandeArticle_Article_idx` (`idArticle`),
  KEY `FK_CommandeArticle_Article` (`idArticle`,`idVendeur`)
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
  `visible` tinyint(4) NOT NULL DEFAULT '1',
  PRIMARY KEY (`idMessage`),
  KEY `FK_Message_Article_idx` (`idArticle`),
  KEY `FK_Message_Vendeur_idx` (`idPersonne`)
) ENGINE=InnoDB AUTO_INCREMENT=10 DEFAULT CHARSET=utf8;

--
-- Déchargement des données de la table `message`
--

INSERT INTO `message` (`idMessage`, `date`, `contenu`, `vendeur`, `reclamation`, `idPersonne`, `idArticle`, `visible`) VALUES
(2, '2017-10-18 05:17:00', 'coucou', NULL, NULL, 3, 53, 1),
(3, '2017-10-30 20:38:25', 'coucou aussi\n	', NULL, NULL, 1, 53, 1),
(4, '2017-11-04 18:51:12', 'mpil jjio\n	', NULL, NULL, 1, 42, 1),
(5, '2017-11-05 15:06:20', 'dert		\n	', NULL, NULL, 1, 40, 1),
(6, '2017-11-05 19:23:01', 'test\n	', NULL, NULL, 1, 38, 1),
(7, '2017-11-06 08:34:58', 'tr', NULL, NULL, 1, 48, 1),
(8, '2017-11-06 08:35:05', '		\n	bncf', NULL, NULL, 1, 48, 1),
(9, '2017-11-06 09:24:55', 'mpo', NULL, NULL, 1, 38, 1);

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
  `datePrevue` datetime DEFAULT NULL,
  `dateRecue` datetime DEFAULT NULL,
  `etat` varchar(100) DEFAULT NULL,
  PRIMARY KEY (`idArticle`,`idClient`),
  KEY `FK_Reservation_Client_idx` (`idClient`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Déchargement des données de la table `reservation`
--

INSERT INTO `reservation` (`idArticle`, `idClient`, `quantite`, `date`, `datePrevue`, `dateRecue`, `etat`) VALUES
(38, 1, 46, '2017-11-06', NULL, NULL, 'Attente du vendeur'),
(40, 1, 120, '2017-11-06', NULL, NULL, 'Attente du vendeur'),
(42, 1, 135, '2017-11-04', NULL, NULL, 'Attente du vendeur'),
(51, 1, 199, '2017-11-05', NULL, NULL, 'Attente du vendeur');

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
  `idClient` int(11) NOT NULL,
  `adresseVendeur` varchar(255) DEFAULT NULL,
  `nomVendeur` varchar(255) DEFAULT NULL,
  PRIMARY KEY (`idVendeur`),
  KEY `FK_Vendeur_Client` (`idClient`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8;

--
-- Déchargement des données de la table `vendeur`
--

INSERT INTO `vendeur` (`idVendeur`, `idClient`, `adresseVendeur`, `nomVendeur`) VALUES
(1, 8, '123 rue delaboutique', 'Fnac'),
(2, 9, 'df df21 fdf', 'MyBoutique');

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
  ADD CONSTRAINT `FK_CommandeArticle_Article` FOREIGN KEY (`idArticle`,`idVendeur`) REFERENCES `articlevendeur` (`idArticle`, `idVendeur`) ON DELETE NO ACTION ON UPDATE NO ACTION,
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

--
-- Contraintes pour la table `vendeur`
--
ALTER TABLE `vendeur`
  ADD CONSTRAINT `FK_Vendeur_Client` FOREIGN KEY (`idClient`) REFERENCES `client` (`idClient`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
