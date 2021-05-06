-- phpMyAdmin SQL Dump
-- version 4.9.7
-- https://www.phpmyadmin.net/
--
-- Host: localhost:3306
-- Generation Time: Apr 21, 2021 at 12:18 PM
-- Server version: 5.7.32
-- PHP Version: 7.4.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";

--
-- Database: `prog-web-projet-db`
--

-- --------------------------------------------------------

--
-- Table structure for table `SITE`
--

CREATE TABLE `SITE` (
  `id_site` int(11) NOT NULL,
  `nom_site` text NOT NULL,
  `com_site` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `TYPE`
--

CREATE TABLE `TYPE` (
  `id_type` int(11) NOT NULL,
  `nom_type` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `VILLE`
--

CREATE TABLE `VILLE` (
  `id_ville` int(11) NOT NULL,
  `nom_ville` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `SITE`
--
ALTER TABLE `SITE`
  ADD PRIMARY KEY (`id_site`);

--
-- Indexes for table `TYPE`
--
ALTER TABLE `TYPE`
  ADD PRIMARY KEY (`id_type`);

--
-- Indexes for table `VILLE`
--
ALTER TABLE `VILLE`
  ADD PRIMARY KEY (`id_ville`);
