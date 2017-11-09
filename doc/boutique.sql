-- phpMyAdmin SQL Dump
-- version 4.7.4
-- https://www.phpmyadmin.net/
--
-- Hôte : 127.0.0.1:3306
-- Généré le :  mer. 08 nov. 2017 à 13:30
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
) ENGINE=InnoDB AUTO_INCREMENT=61 DEFAULT CHARSET=utf8;

--
-- Déchargement des données de la table `article`
--

INSERT INTO `article` (`idArticle`, `designation`, `imageUrl`, `idCategorie`, `description`) VALUES
(37, 'Apple MacBook Air 13.3\'\' LED 128 Go SSD 8 Go RAM Intel Core i5 bicœur à 1.8 Ghz MQD32FN ', 'images/article/azertyu321654.png', 1, ''),
(38, 'PC Portable Asus R540UP-GO112T 15.6\"', 'images/article/2315sdfsdf654.png', 1, ''),
(39, 'PC Portable HP Omen 15-ax242nf 15.6\"', 'images/article/qffdsdf3215sdf48z56ef1.png', 1, ''),
(40, 'PC Portable Lenovo IdeaPad 320-17AST 80XW000SFR 17', 'images/article/sqgvs23dsfg1sdfhg1sdfh321fdg32.png', 1, ''),
(41, 'PC Portable HP 15-bw035nf 15.6', 'images/article/321564s6g54g65r4g65r1gfgf.png', 1, ''),
(42, 'PC Ultra-Portable Asus VivoBook Flip TP410UA-EC243T 14\" Tactile', 'images/article/sgdsg2s1dgs2dg1sdgs2dzfghtth22y1.png', 1, ''),
(43, 'PC Ultra-Portable Asus VivoBook E402NA-GA029T 14', 'images/article/kdfjhsd2sfsqs2th1h3n5rf21bt1.png', 1, ''),
(44, 'VTT semi rigide 26pouces Carnivore blanc TC 52 cm KS Cycling', 'images/article/df6g5dgd4g6df65gs132s1fgsf4gsqgdq1g.png', 2, ''),
(45, 'Vélo dame 28\"\" Casino 3 vitesses rose vif TC 54 cm KS Cycling', 'images/article/dg5df4gdsf54ds8d7gdsdsf98g65d1f2sssddfh.png', 2, ''),
(46, 'Vélo électrique pliant BIZOBIKE MIESTY BELLO gris - Batterie : Li-ION Panasonic 36V, 14,5Ah', 'images/article/sdgsdg546sqd5f21dfqs6d45fqsdf123.png', 2, ''),
(47, 'vidaXL Vélo électrique pliant en alliage d\'aluminium et batterie lithium-ion', 'images/article/sfsdf865qs21fddqs86f5dsq2f1ds6f521ds.png', 2, ''),
(48, 'Tablette PC Asus Transformer Book T101HA-GR030T 10.1', 'images/article/jhglkjh554uhgdskl4jhfhjkllj24h.png', 1, ''),
(49, 'vélo électrique Wayscral Sporty 655 36V 11,6Ah Noir', 'images/article/dsgdgsd65s1dgfs6dg5412sg3sdfg5421.png', 2, ''),
(50, 'PC Portable Asus ROG GL753VE-GC030T 17.3', 'images/article/kuhdf32g1gdh5s4df86fd5gs2fd4hsf6d5g4.png', 1, ''),
(51, 'VTT semi-rigide ATB Twentyniner 29“ Heist blanc TC 51 cm KS Cycling', 'images/article/kjsdfs6d5f98zef461s2dfsdf7454s.png', 2, ''),
(52, 'VTT semi-rigide ATB Twentyniner 29“ Heist noir TC 51 cm KS Cycling', 'images/article/dfgdf8645dgsdf9g846521sfdg86452.png', 2, ''),
(53, 'Vélo électrique de ville 36V 10AH Mecer Noir', 'images/article/sdf5q4685dsf1qsdf856qsd1f2sqdf5421.png', 2, ' Vestibulum non sagittis nunc. In quis felis nibh. Etiam malesuada purus nec risus efficitur, aliquet cursus dolor porttitor. Suspendisse semper metus sed vehicula rutrum. Nam porta orci sit amet massa pulvinar, in egestas elit eleifend. Integer in facilisis arcu. Vestibulum ut fringilla risus, eu posuere ex. Praesent magna dolor, lobortis ut elit ac, vulputate luctus elit. Cras posuere tellus in erat bibendum sodales. Lorem ipsum dolor sit amet, consectetur adipiscing elit. Donec faucibus ipsum \r\nAjoutermi, fringilla sagittis leo accumsan vitae. Phasellus varius enim ac arcu finibus tempor. Pellentesque mattis faucibus venenatis. Sed consectetur tortor nec sagittis porta. In eget enim vel nunc vestibulum fringilla. Vestibulum ante ipsum primis in faucibus orci luctus et ultrices posuere cubilia Curae;'),
(54, 'PC Ultra-portable Asus ZenBook UX430UA-GV305T ', 'images/article/sf5ds4fsddsf8645sdf1sdf8s6df54f.png', 1, ' nteger sagittis, nulla vel auctor congue, erat lorem lacinia urna, sit amet efficitur lectus quam vel sem. Aenean mattis posuere erat quis porta. Pellentesque at accumsan neque. Ut feugiat sed metus et aliquam. Phasellus eget porttitor massa, sed accumsan arcu. Cras mollis urna id sem consectetur euismod. Suspendisse pharetra est laoreet, interdum justo non, luctus neque. Nam luctus velit non malesuada mattis. Quisque vitae enim luctus felis mattis eleifend vel quis lectus. Morbi nisl massa, pellentesque ut dictum vel, imperdiet vitae turpis. Vestibulum sodales, ex sed feugiat varius, augue ligula molestie ante, ut fringilla libero urna et neque. Phasellus iaculis venenatis diam, quis viverra dui lobortis in.'),
(55, 'PC Portable HP 17-bs007nf 17.3\"', 'images/article/34d904fc64490247f66a3954c3c8675a.png', 1, ' Taille de l\'écran	17,3 \"\r\nPoids du produit	2,71 Kg\r\nProcesseur	Intel Core i7\r\nSystème d\'exploitation	Microsoft Windows 10'),
(56, 'ASUS PC Portable X705UV-BX134T 17,3\" - 8Go de RAM - Windows 10 - Intel Pentium - NVIDIA® GeForce 920MX - Disque Dur 1To', 'images/article/fc02d256dfc29443de74d82249fcca3c.jpg', 1, ' CPU : Intel Pentium 4405U - 2.1 GHz\r\n17.3\" - 1600 x 900 (HD+)\r\nRAM : 8 Go\r\n1 To HDD SATA - 5400 tours-min\r\nProcesseur graphique : NVIDIA GeForce 920MX\r\nInterfaces : Prise combo casque-microphone, USB 3.0, 2 x USB 2.0, USB-C 3.1 Gen 1, HDMI, LAN\r\nSans fil : 802.11b-g-n, Bluetooth 4.0\r\nSystème d\'exploitation : Windows 10 Edition Familiale 64 bits\r\nGarantie (²) : 2 ans - pièces, main d’œuvre'),
(57, 'Samsung Galaxy J3 2016 Or', 'images/article/c3342239ae5e1d3f26647b8510ae922d.jpg', 5, ' 5\" - HD Super AMOLED\r\nRésolution du capteur : 8 mégapixels\r\nCapacité : 2600 mAh\r\nCapacité de la mémoire interne : 8 Go\r\n1.5 GHz - Quadruple coeur\r\nRAM : 1.5 Go\r\nGénération à haut débit mobile : 4G\r\nCartes mémoire flash prises en charge : microSDXC - jusqu\'à 128 Go'),
(58, 'TEENO Smartphone 4G Débloqué 6 Pouces 1280 x 720 IPS HD Écran 1.3GHz Quad Core Android 5.1 Double SIM Caméras 8.0MP', 'images/article/d584f7f785a587b8312220915948c221.jpg', 5, ' 6\" - Tactile\r\nGénération à haut débit mobile : 4G\r\nSystème d\'exploitation : Android 5.1\r\nCouleur du boitier : Or'),
(59, 'SONY Xperia XA1 Plus Bleu 32 Go', 'images/article/bea228d57da6f70db42765e2b24c7d54.jpg', 5, ' Ecran 5.5\" Full HD - Dual SIM - Stockage 32 Go - RAM 4Go - Lecteur empreinte - 4G cat 4 - Processeur Octa-core 64bit - Appareil photo 23 Mpx+Caméra frontal 8 Mpx - Capteur vidéo Full HD avec stabilisation optique SteadyShot - Batterie 3430 mAh - USB type C - WiFi - NFC - Bluetooth 4.2 - Recharge rapide : Technologie Pump Express+ 2.0 - Garantie 2 ans'),
(60, 'APPLE iPhone X 64Go Gris sidéral', 'images/article/dee49cc87e741cca6701c9657766d141.jpg', 5, ' 5.8\" - Super Retina HD\r\nRésolution du capteur : 12 mégapixels\r\nCapacité de la mémoire interne : 64 Go\r\nGénération à haut débit mobile : 4G\r\nProtection : Revêtement oléophobe résistant aux empreintes digitales\r\nSystème d\'exploitation : iOS 11\r\nFonctions du téléphone : Téléphone à haut parleur, commande vocale, compteur d\'appels, téléconférence, mode avion, numérotation vocale, vibreur');

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
(41, 1, 987, 0, 399.99),
(42, 1, 123, 0, 899.99),
(43, 1, 23, 0, 299.99),
(44, 1, 123, 0, 271.91),
(45, 1, 143, 0, 123),
(46, 1, 345, 0, 1979),
(47, 1, 89, 0, 562.99),
(48, 1, 477, 0, 349.99),
(49, 1, 56, 0, 1449),
(50, 1, 98, 0, 1439.99),
(51, 1, 123, 0, 266.23),
(52, 1, 210, 0, 266.23),
(53, 1, 89, 0, 699),
(53, 2, 214, 0, 899),
(54, 1, 32, 0, 999.99),
(55, 1, 32, 0, 902.51),
(56, 2, 13, 0, 499.99),
(57, 2, 21, 0, 134.99),
(58, 2, 13, 0, 86.99),
(59, 2, 21, 0, 329.99),
(60, 2, 4, 0, 1159);

-- --------------------------------------------------------

--
-- Structure de la table `categorie`
--

DROP TABLE IF EXISTS `categorie`;
CREATE TABLE IF NOT EXISTS `categorie` (
  `idCategorie` int(11) NOT NULL AUTO_INCREMENT,
  `nom` varchar(45) NOT NULL,
  PRIMARY KEY (`idCategorie`)
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=utf8;

--
-- Déchargement des données de la table `categorie`
--

INSERT INTO `categorie` (`idCategorie`, `nom`) VALUES
(1, 'Ordinateur'),
(2, 'Cyclisme'),
(5, 'Téléphone');

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
  `password` varchar(255) DEFAULT NULL,
  `adresse` varchar(45) DEFAULT NULL,
  `valide` tinyint(4) DEFAULT NULL,
  `token` varchar(255) DEFAULT NULL,
  `telephone` varchar(20) DEFAULT NULL,
  `googleIdentifier` varchar(255) DEFAULT NULL,
  PRIMARY KEY (`idClient`)
) ENGINE=InnoDB AUTO_INCREMENT=15 DEFAULT CHARSET=utf8;

--
-- Déchargement des données de la table `client`
--

INSERT INTO `client` (`idClient`, `nom`, `prenom`, `email`, `password`, `adresse`, `valide`, `token`, `telephone`, `googleIdentifier`) VALUES
(1, 'azertyii', 'azerty', 'azerty@mlk.fr', '8d969eef6ecad3c29a3a629280e686cf0c3f5d5a86aff3ca12020c923adc6c92', '2 rue du moul', 1, 'f4918f181fd27e57d852e341f15096e1e1c37ce9', '', NULL),
(3, 'azerty', 'azer', 'azerty@mlk.frze', '8d969eef6ecad3c29a3a629280e686cf0c3f5d5a86aff3ca12020c923adc6c92', '', 0, '474ab8ae7b16aa13e0ee391dcbd6f9305545c5b9', '', NULL),
(4, 'toto', 'toto', 'tamoo@yopmail.com', '8d969eef6ecad3c29a3a629280e686cf0c3f5d5a86aff3ca12020c923adc6c92', '', 1, '572aa2935d9c1d22c08b634bd45881b78a110add', NULL, NULL),
(5, 'toto', 'toto', 'toto@yopmail.com', '8d969eef6ecad3c29a3a629280e686cf0c3f5d5a86aff3ca12020c923adc6c92', '', 0, '684312138e3e6d397c326916bc505534a858dcc1', NULL, NULL),
(6, 'toto', 'toto', 'tamoo2@yopmail.com', '8d969eef6ecad3c29a3a629280e686cf0c3f5d5a86aff3ca12020c923adc6c92', '', 1, 'ec86d7170900ea4fb54c73d47903a6749e1a5a2f', NULL, NULL),
(7, 'titu', 'tutu', 'tamoo6@yopmail.com', '8d969eef6ecad3c29a3a629280e686cf0c3f5d5a86aff3ca12020c923adc6c92', '', 1, '3f39ef7300d23f1fb72e083fb0c0a6b288230766', '', NULL),
(8, 'Ahamada', 'Tamou', 'fnac@vendeur.com', '8d969eef6ecad3c29a3a629280e686cf0c3f5d5a86aff3ca12020c923adc6c92', '12 rue kjhfd ssd', 1, '', NULL, NULL),
(9, 'test', 'test', 'cdiscount@vendeur.com', '8d969eef6ecad3c29a3a629280e686cf0c3f5d5a86aff3ca12020c923adc6c92', 'sdf dfe ef', 1, '', NULL, NULL),
(12, 'Mr', 'Boutique', 'mymarketboutique@gmail.com', NULL, '', 1, NULL, '', NULL),
(13, 'tamoo', 'tamoo', 'tamoo8@yopmail.com', '481f6cc0511143ccdd7e2d1b1b94faf0a700a8b49cd13922a70b5ae28acaa8c5', '', 1, '1a922567a3b4e0efdb2f487baa40422e282b0582', '', NULL),
(14, NULL, NULL, 'mymarketboutique@gmail.com', NULL, NULL, NULL, NULL, NULL, 'https://www.google.com/profiles/108103601829176386765');

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
) ENGINE=InnoDB AUTO_INCREMENT=15 DEFAULT CHARSET=utf8;

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
(9, '2017-11-06 09:24:55', 'mpo', NULL, NULL, 1, 38, 1),
(10, '2017-11-06 21:32:35', 'slt', NULL, NULL, 9, 59, 1),
(11, '2017-11-06 21:32:52', 're', NULL, NULL, 9, 59, 1),
(12, '2017-11-06 21:37:07', 'test', NULL, NULL, 1, 37, 1),
(13, '2017-11-07 08:21:27', 'très bon produit', NULL, NULL, 8, 59, 1),
(14, '2017-11-08 12:48:40', 'azerty', NULL, NULL, 12, 39, 1);

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
(2, 9, 'df df21 fdf', 'Cdiscount');

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
