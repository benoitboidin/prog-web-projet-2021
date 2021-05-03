-- phpMyAdmin SQL Dump
-- version 4.9.7
-- https://www.phpmyadmin.net/
--
-- Host: localhost:3306
-- Generation Time: May 03, 2021 at 01:04 PM
-- Server version: 5.7.32
-- PHP Version: 7.4.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";

--
-- Database: `escalade-db`
--

-- --------------------------------------------------------

--
-- Table structure for table `grimpeur`
--

CREATE TABLE `grimpeur` (
  `idgrimpeur` int(11) NOT NULL,
  `login` text NOT NULL,
  `passwd` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `grimpeur`
--

INSERT INTO `grimpeur` (`idgrimpeur`, `login`, `passwd`) VALUES
(1, 'ben', 'ben');

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
(1, 'Curis', 'Curis-au-Mont-d\'Or ', '3c/6b+', 26, 'curis-au-mont-d-or.jpg', 1),
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

--
-- Indexes for dumped tables
--

--
-- Indexes for table `grimpeur`
--
ALTER TABLE `grimpeur`
  ADD PRIMARY KEY (`idgrimpeur`);

--
-- Indexes for table `site`
--
ALTER TABLE `site`
  ADD PRIMARY KEY (`idsite`),
  ADD KEY `idype` (`idype`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `site`
--
ALTER TABLE `site`
  MODIFY `idsite` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=20;
