-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Nov 15, 2022 at 10:40 PM
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
  `Puntuacion` float(11,0) NOT NULL,
  `Serie` varchar(45) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `episodios`
--

INSERT INTO `episodios` (`ID_episodio`, `Titulo`, `Duracion`, `Temporada`, `Descripcion`, `Puntuacion`, `Serie`) VALUES
(33, 'Be Right Back', 48, 2, ' After learning about a new service that lets people stay in touch with the deceased, a lonely, grieving Martha reconnects with her late lover.', 8, 'Black Mirror'),
(34, 'USS Callister', 76, 4, 'Capt. Robert Daly presides over his crew with wisdom and courage. But a new recruit will soon discover nothing on this spaceship is what it seems.', 8, 'Black Mirror'),
(46, 'titulasoo', 3, 3, 'desc', 3, 'Dark'),
(47, 'dsadas', 3, 3, 'dsadasd', 5, 'Black Mirror'),
(48, 'dddddddadw', 55, 4, 'ddas3hht', 2, 'Black Mirror'),
(49, 'fhythnuy', 54, 6, 'ujygdfgf', 4, 'Rick_And_Morty'),
(50, 'kopñjgf', 21, 1, 'jufgdasdqw', 2, 'Rick_And_Morty');

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
(25, 'South_Park', 'Follows the misadventures of four irreverent grade-schoolers in the quiet, dysfunctional town of South Park, Colorado.', 8.7, 'Trey Parker - Matt Stone - Brian Graden', 'Comedy', 'img/serie/6349bb8bac8e9.jpg'),
(26, 'Black Mirror', 'An anthology series exploring a twisted, high-tech multiverse where humanity\'s greatest innovations and darkest instincts collide.', 8.8, ' Charlie Brooker', 'Drama - Mystery', 'img/serie/6349bbfcdf9d2.jpg'),
(30, 'Dark', 'descripcion', 2, 'Trey Parker - Matt Stone - Brian Graden', 'dwq', 'img/serie/636aa98c2bf81.jpg'),
(32, 'cccc', 'dasd', 3, 'dasdas', 'dsadas', 'img/serie/636bb7c1b750c.png'),
(34, 'Rick_And_Morty', 'las aventudsada', 9.9, 'justin roiland', 'cyfi', ''),
(35, 'Rick_And_Morty', 'las aventudsada', 9.9, 'justin roiland', 'cyfi', '');

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
  MODIFY `ID_episodio` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=51;

--
-- AUTO_INCREMENT for table `series`
--
ALTER TABLE `series`
  MODIFY `ID_serie` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=36;

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
