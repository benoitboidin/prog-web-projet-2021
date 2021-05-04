-- phpMyAdmin SQL Dump
-- version 4.9.5
-- https://www.phpmyadmin.net/
--
-- Host: localhost:3306
-- Generation Time: May 04, 2021 at 06:09 PM
-- Server version: 5.7.24
-- PHP Version: 7.4.1

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `escalade-db`
--

-- --------------------------------------------------------

--
-- Table structure for table `grimpeur`
--

CREATE TABLE `grimpeur` (
  `idgrimpeur` int(11) NOT NULL,
  `login` varchar(12) NOT NULL,
  `passwd` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `grimpeur`
--

INSERT INTO `grimpeur` (`idgrimpeur`, `login`, `passwd`) VALUES
(1, 'Antoine', 'mdpantoine'),
(3, 'michel', 'test'),
(4, 'ben', 'ben'),
(6, 'bruno', 'mars'),
(7, 'jean michel', 'aaa');

-- --------------------------------------------------------

--
-- Table structure for table `message`
--

CREATE TABLE `message` (
  `idmessage` int(11) NOT NULL,
  `date` date NOT NULL,
  `contenu` varchar(200) NOT NULL,
  `idsite` int(11) NOT NULL,
  `idgrimpeur` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `message`
--

INSERT INTO `message` (`idmessage`, `date`, `contenu`, `idsite`, `idgrimpeur`) VALUES
(1, '2021-05-04', 'Très bon site !', 2, 1),
(2, '2021-05-04', 'J\'adore !', 2, 4),
(3, '2021-05-04', 'Excellent pour tout niveau', 3, 1);

-- --------------------------------------------------------

--
-- Table structure for table `site`
--

CREATE TABLE `site` (
  `idsite` int(11) NOT NULL,
  `nomsite` varchar(50) NOT NULL,
  `localisation` varchar(50) NOT NULL,
  `niveau` varchar(12) NOT NULL,
  `nbvoies` int(11) NOT NULL,
  `image` varchar(30) NOT NULL,
  `idype` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `site`
--

INSERT INTO `site` (`idsite`, `nomsite`, `localisation`, `niveau`, `nbvoies`, `image`, `idype`) VALUES
(1, 'Curis', 'Curis-au-Mont-d\'Or ', '3c/6b+', 26, 'curis.jpg', 1),
(2, 'La croix du Ban', 'Pollionnay', '3c/6c', 60, 'la-croix-du-ban.jpg', 1),
(3, 'Limas, Buissante', 'Limas', '4b/7a', 32, 'limas.jpg', 1),
(4, 'Lyon - Quais du Rhône', 'Lyon', '4a/7b', 62, 'lyon.jpg', 2),
(5, 'Pin Bouchain', 'Les Sauvages', '4c/6c', 20, 'pin-bouchain.jpg', 1),
(6, 'Riverie', 'Riverie', '4b/6a', 42, 'riverie.jpg', 1),
(7, 'Roche d\'Hérode', 'Saint-Romain-en-Gal', '3b/7a', 37, 'roche-d-herode.jpg', 3),
(8, 'Roche Mazura', 'Saint-Laurent-de-Vaux', '4c/7a', 12, 'roche-mazura.jpg', 1),
(9, 'Saint-Genis-les-ollieres', 'Saint-Genis-les-ollieres', '4a/7a', 22, 'saint-genis-les-ollieres.jpg', 2),
(10, 'Saint-Symphorien-sur-Coise', 'Saint-Symphorien-sur-Coise', '4a/6a', 36, 'saint-symphorien-sur-coise.jpg', 1),
(11, 'Viaduc de Charbonnières', 'Charbonnières-les-Bains', '5c/6c', 15, 'viaduc-de-charbonnieres.jpg', 3),
(12, 'Yzeron, Py-Froid', 'Yzeron', '2a/7b', 250, 'yzeron-py-froid.jpg', 2),
(13, 'Le Charmeil - Daladom', 'Presles', '5a/7c', 11, 'le-charmeil-daladom.jpg', 1),
(14, 'Le Charmeil - Dalarhum', 'Presles', '5a/7b+', 7, 'le-charmeil-dalarhum.jpg', 1),
(15, 'Le Charmeil - Festival', 'Presles', '5b/7c', 13, 'le-charmeil-festival.jpg', 1),
(16, 'Les Nugues', 'Presles, St-André-en-Royans', '4b-7a', 18, 'les-nugues.jpg', 3),
(17, 'Presles', 'Presles & Choranche', '5a/7c', 218, 'presles.jpg', 3),
(18, 'Rochers du Ranc', 'Presles & Choranche', '6b/6b', 3, 'rochers-du-ranc.jpg', 3),
(19, 'Tina Dalle', 'Presles, St-André-en-Royans', '3a/8b', 51, 'tina-dalle.jpg', 3);

-- --------------------------------------------------------

--
-- Table structure for table `type`
--

CREATE TABLE `type` (
  `idtype` int(11) NOT NULL,
  `nomtype` varchar(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `type`
--

INSERT INTO `type` (`idtype`, `nomtype`) VALUES
(1, 'Site sportif'),
(2, 'Site de bloc'),
(3, 'Terrain d\'aventure');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `grimpeur`
--
ALTER TABLE `grimpeur`
  ADD PRIMARY KEY (`idgrimpeur`);

--
-- Indexes for table `message`
--
ALTER TABLE `message`
  ADD PRIMARY KEY (`idmessage`),
  ADD KEY `idgrimpeur` (`idgrimpeur`),
  ADD KEY `idsite` (`idsite`);

--
-- Indexes for table `site`
--
ALTER TABLE `site`
  ADD PRIMARY KEY (`idsite`),
  ADD KEY `idype` (`idype`);

--
-- Indexes for table `type`
--
ALTER TABLE `type`
  ADD PRIMARY KEY (`idtype`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `grimpeur`
--
ALTER TABLE `grimpeur`
  MODIFY `idgrimpeur` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `message`
--
ALTER TABLE `message`
  MODIFY `idmessage` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `site`
--
ALTER TABLE `site`
  MODIFY `idsite` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=20;

--
-- AUTO_INCREMENT for table `type`
--
ALTER TABLE `type`
  MODIFY `idtype` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `message`
--
ALTER TABLE `message`
  ADD CONSTRAINT `message_ibfk_1` FOREIGN KEY (`idsite`) REFERENCES `site` (`idsite`),
  ADD CONSTRAINT `message_ibfk_2` FOREIGN KEY (`idgrimpeur`) REFERENCES `grimpeur` (`idgrimpeur`);

--
-- Constraints for table `site`
--
ALTER TABLE `site`
  ADD CONSTRAINT `site_ibfk_1` FOREIGN KEY (`idype`) REFERENCES `type` (`idtype`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
