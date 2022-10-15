-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Oct 15, 2022 at 02:52 AM
-- Server version: 10.4.24-MariaDB
-- PHP Version: 8.1.6

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `reviews`
--

-- --------------------------------------------------------

--
-- Table structure for table `episodios`
--

CREATE TABLE `episodios` (
  `ID_episodio` int(11) NOT NULL,
  `Titulo` varchar(45) NOT NULL,
  `Duracion` int(11) NOT NULL,
  `Temporada` int(11) NOT NULL,
  `Descripcion` text NOT NULL,
  `Puntuacion` int(11) NOT NULL,
  `Serie` varchar(45) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `episodios`
--

INSERT INTO `episodios` (`ID_episodio`, `Titulo`, `Duracion`, `Temporada`, `Descripcion`, `Puntuacion`, `Serie`) VALUES
(30, 'Geheimnisse', 55, 1, 'The small German town of Winden is shaken by the disappearance of a teenage boy. While the townsfolk are occupied with secrets of their own, at nightfall a group of teenagers attempts to recover something the missing boy may have left behind.', 8, 'Dark'),
(31, 'Lügen', 44, 1, ' When a grim discovery leaves the police baffled, Ulrich seeks a search warrant for the power plant. A mysterious stranger checks into the hotel.', 8, 'Dark'),
(32, 'Gestern und heute', 45, 1, 'It\'s 1986, and Ulrich\'s brother, Mads, has been missing for a month. Confusion reigns as past and present intertwine.', 9, 'Dark'),
(33, 'Be Right Back', 48, 2, ' After learning about a new service that lets people stay in touch with the deceased, a lonely, grieving Martha reconnects with her late lover.', 8, 'Black Mirror'),
(34, 'USS Callister', 76, 4, 'Capt. Robert Daly presides over his crew with wisdom and courage. But a new recruit will soon discover nothing on this spaceship is what it seems.', 8, 'Black Mirror');

-- --------------------------------------------------------

--
-- Table structure for table `series`
--

CREATE TABLE `series` (
  `ID_serie` int(11) NOT NULL,
  `Nombre` varchar(45) NOT NULL,
  `Descripcion` text NOT NULL,
  `Puntuacion` float NOT NULL,
  `Creadores` varchar(45) NOT NULL,
  `Genero` varchar(45) NOT NULL,
  `img` varchar(500) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `series`
--

INSERT INTO `series` (`ID_serie`, `Nombre`, `Descripcion`, `Puntuacion`, `Creadores`, `Genero`, `img`) VALUES
(24, 'Dark', 'A family saga with a supernatural twist, set in a German town where the disappearance of two young children exposes the relationships among four families.', 8.7, ' Baran bo Odar - Jantje Friese', 'Drama', 'img/serie/6349b43388ccc.jpg'),
(25, 'South Park', 'Follows the misadventures of four irreverent grade-schoolers in the quiet, dysfunctional town of South Park, Colorado.', 8.7, 'Trey Parker - Matt Stone - Brian Graden', 'Comedy', 'img/serie/6349bb8bac8e9.jpg'),
(26, 'Black Mirror', 'An anthology series exploring a twisted, high-tech multiverse where humanity\'s greatest innovations and darkest instincts collide.', 8.8, ' Charlie Brooker', 'Drama - Mystery', 'img/serie/6349bbfcdf9d2.jpg');

-- --------------------------------------------------------

--
-- Table structure for table `usuarios`
--

CREATE TABLE `usuarios` (
  `id` int(11) NOT NULL,
  `email` varchar(200) NOT NULL,
  `password` varchar(200) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `usuarios`
--

INSERT INTO `usuarios` (`id`, `email`, `password`) VALUES
(1, 'email@email.com', '54321');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `episodios`
--
ALTER TABLE `episodios`
  ADD PRIMARY KEY (`ID_episodio`),
  ADD KEY `Serie` (`Serie`);

--
-- Indexes for table `series`
--
ALTER TABLE `series`
  ADD PRIMARY KEY (`ID_serie`),
  ADD KEY `Nombre` (`Nombre`);

--
-- Indexes for table `usuarios`
--
ALTER TABLE `usuarios`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `episodios`
--
ALTER TABLE `episodios`
  MODIFY `ID_episodio` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=35;

--
-- AUTO_INCREMENT for table `series`
--
ALTER TABLE `series`
  MODIFY `ID_serie` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=28;

--
-- AUTO_INCREMENT for table `usuarios`
--
ALTER TABLE `usuarios`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `episodios`
--
ALTER TABLE `episodios`
  ADD CONSTRAINT `episodios_ibfk_1` FOREIGN KEY (`Serie`) REFERENCES `series` (`Nombre`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
