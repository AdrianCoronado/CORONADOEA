-- phpMyAdmin SQL Dump
-- version 5.0.3
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Aug 17, 2021 at 06:06 AM
-- Server version: 10.4.14-MariaDB
-- PHP Version: 7.4.11

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `coronado`
--

-- --------------------------------------------------------

--
-- Table structure for table `detallenota`
--

CREATE TABLE `detallenota` (
  `idDetalle` int(11) NOT NULL,
  `folionota` int(11) DEFAULT NULL,
  `concepto` varchar(60) COLLATE utf8_unicode_ci DEFAULT NULL,
  `unitario` decimal(8,2) DEFAULT NULL,
  `cantidad` int(11) DEFAULT NULL,
  `total` decimal(8,2) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `detalleord`
--

CREATE TABLE `detalleord` (
  `idDetalle` int(11) NOT NULL,
  `folio` int(11) DEFAULT NULL,
  `concepto` varchar(60) COLLATE utf8_unicode_ci DEFAULT NULL,
  `unitario` decimal(8,2) DEFAULT NULL,
  `cantidad` int(11) DEFAULT NULL,
  `total` decimal(8,2) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `detalleord`
--

INSERT INTO `detalleord` (`idDetalle`, `folio`, `concepto`, `unitario`, `cantidad`, `total`) VALUES
(48, 8, 'regulador', '200.00', 1, '200.00'),
(50, 9, 'Conector', '150.00', 2, '300.00'),
(51, 9, 'Alternador', '1200.00', 1, '1200.00'),
(52, 10, 'Alternador', '1200.00', 1, '1200.00'),
(53, 10, 'Servicio de taller', '550.00', 1, '550.00'),
(54, 15, 'regulador', '250.00', 1, '250.00'),
(55, 18, 'Alternador', '2000.00', 1, '2000.00'),
(56, 19, 'Switch de llave', '500.00', 1, '500.00'),
(57, 23, 'regulador', '230.00', 1, '230.00'),
(58, 22, 'regulador', '100.00', 2, '200.00');

-- --------------------------------------------------------

--
-- Table structure for table `mecanico`
--

CREATE TABLE `mecanico` (
  `idMecanico` int(11) NOT NULL,
  `nombre` varchar(30) COLLATE utf8_unicode_ci DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `mecanico`
--

INSERT INTO `mecanico` (`idMecanico`, `nombre`) VALUES
(2, 'Zotico'),
(3, 'Pedro'),
(4, 'Ranulfo');

-- --------------------------------------------------------

--
-- Table structure for table `notas`
--

CREATE TABLE `notas` (
  `folionota` int(11) NOT NULL,
  `tipo` varchar(15) COLLATE utf8_unicode_ci DEFAULT NULL,
  `fecha` date DEFAULT NULL,
  `hora` varchar(10) COLLATE utf8_unicode_ci DEFAULT NULL,
  `total` decimal(8,2) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `ordenes`
--

CREATE TABLE `ordenes` (
  `folio` int(11) NOT NULL,
  `nombre` varchar(60) COLLATE utf8_unicode_ci DEFAULT NULL,
  `telefono` varchar(15) COLLATE utf8_unicode_ci DEFAULT NULL,
  `marca` varchar(20) COLLATE utf8_unicode_ci DEFAULT NULL,
  `modelo` varchar(15) COLLATE utf8_unicode_ci DEFAULT NULL,
  `mecanico` varchar(30) COLLATE utf8_unicode_ci DEFAULT NULL,
  `autorizados` varchar(100) COLLATE utf8_unicode_ci DEFAULT NULL,
  `fecha` date DEFAULT NULL,
  `hora` varchar(10) COLLATE utf8_unicode_ci DEFAULT NULL,
  `fechasalida` date DEFAULT NULL,
  `estatus` varchar(15) COLLATE utf8_unicode_ci DEFAULT NULL,
  `tipo` varchar(15) COLLATE utf8_unicode_ci DEFAULT NULL,
  `garantiadate` date DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `ordenes`
--

INSERT INTO `ordenes` (`folio`, `nombre`, `telefono`, `marca`, `modelo`, `mecanico`, `autorizados`, `fecha`, `hora`, `fechasalida`, `estatus`, `tipo`, `garantiadate`) VALUES
(6, 'perlaaaa', '6566112188', 'Ford', 'F150', 'Pedro', '', '2021-08-02', '2021-08-02', NULL, 'Pagado', 'camioneta', NULL),
(8, 'Jose antonio', '6566112188', 'Ford', 'F150', 'Zotico', '', '2021-08-02', '2021-08-02', NULL, 'Pagado', 'troca', NULL),
(9, 'Maria morelos', '6112188', 'Ford', 'F150', 'Pedro', '', '2021-08-04', '2021-08-04', NULL, 'Pagado', 'camioneta', NULL),
(10, 'Servicios motrices', '65619187', 'Honda', 'civic 2005', 'Seleccionar...', '', '2021-08-04', '2021-08-04', '0000-00-00', 'Pagado', 'carro', NULL),
(11, 'perl', '6566112188', 'Honda', 'F150', 'Ranulfo', '', '2021-08-10', '2021-08-10', '2021-08-12', 'Pagado', 'camioneta', '1969-12-31'),
(12, 'Jose antonio', '65', 'Ford', 'F150', 'Zotico', '', '2021-08-10', '2021-08-10', '2021-08-12', 'Pagado', 'camioneta', '0000-00-00'),
(13, 'p', '6566112188', 'Honda', 'altima', 'Ranulfo', '', '0000-00-00', '2021-08-10', '2021-08-10', 'Pagado', 'camioneta', NULL),
(14, 'perla', '65645789', 'Ford', 'civic 2005', 'Zotico', '', '2021-08-10', '4:13-pm', NULL, 'Pagado', 'carro', NULL),
(15, 'perlita', '123', 'Honda', 'Acord ', 'Pedro', 'no hay detalles', '2021-08-10', '10:20-pm', '2021-08-11', 'Pagado', 'camioneta', NULL),
(16, 'oooo', '9999999999', 'Ford', 'F150', 'Ranulfo', '', '2021-08-10', '10:21-pm', '2021-08-12', 'Pagado', 'camioneta', '0000-00-00'),
(18, 'Adrian coronado', '6567494948', 'Nissa', 'Expedition', 'Ranulfo', 'Ninguno                                     ', '2021-08-11', '2:03-pm', '2021-08-12', 'Pagado', 'camioneta', '0000-00-00'),
(19, 'Pedro olivares', '6566112188', 'Nissan', 'Expedition', 'Pedro', '                Ninguno                     ', '2021-08-12', '1:19-pm', '2021-08-12', 'Pagado', 'camioneta', '1969-12-31'),
(20, 'Elena Guitierrez', '65645789', 'Nissan ', 'Altima', 'Ranulfo', '                                                     ', '2021-08-12', '1:28-pm', '2021-08-12', 'Pagado', 'carro', '0000-00-00'),
(21, 'Brandon ortíz', '6566112188', 'Nissan', 'Versa', 'Ranulfo', '                                                        ', '2021-08-12', '1:33-pm', '2021-08-12', 'Pagado', 'carro', '2021-11-09'),
(22, 'maria ', '656', 'ford', 'focus', 'Ranulfo', '                                                        ', '2021-08-12', '3:46-pm', NULL, NULL, 'camioneta', NULL),
(23, 'antonio', '6566', 'ford', 'amarillo', '--Seleccionar', '                            ', '2021-08-12', '3:47-pm', NULL, 'Listo', 'carro', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `usuarios`
--

CREATE TABLE `usuarios` (
  `idUsuario` int(11) NOT NULL,
  `usuario` varchar(20) COLLATE utf8_unicode_ci DEFAULT NULL,
  `password` varchar(15) COLLATE utf8_unicode_ci DEFAULT NULL,
  `rol` varchar(10) COLLATE utf8_unicode_ci DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `usuarios`
--

INSERT INTO `usuarios` (`idUsuario`, `usuario`, `password`, `rol`) VALUES
(1, 'user', '123', 'Admin');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `detallenota`
--
ALTER TABLE `detallenota`
  ADD PRIMARY KEY (`idDetalle`),
  ADD KEY `folionota` (`folionota`);

--
-- Indexes for table `detalleord`
--
ALTER TABLE `detalleord`
  ADD PRIMARY KEY (`idDetalle`),
  ADD KEY `folio` (`folio`);

--
-- Indexes for table `mecanico`
--
ALTER TABLE `mecanico`
  ADD PRIMARY KEY (`idMecanico`);

--
-- Indexes for table `notas`
--
ALTER TABLE `notas`
  ADD PRIMARY KEY (`folionota`);

--
-- Indexes for table `ordenes`
--
ALTER TABLE `ordenes`
  ADD PRIMARY KEY (`folio`);

--
-- Indexes for table `usuarios`
--
ALTER TABLE `usuarios`
  ADD PRIMARY KEY (`idUsuario`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `detallenota`
--
ALTER TABLE `detallenota`
  MODIFY `idDetalle` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `detalleord`
--
ALTER TABLE `detalleord`
  MODIFY `idDetalle` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=59;

--
-- AUTO_INCREMENT for table `mecanico`
--
ALTER TABLE `mecanico`
  MODIFY `idMecanico` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `notas`
--
ALTER TABLE `notas`
  MODIFY `folionota` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `ordenes`
--
ALTER TABLE `ordenes`
  MODIFY `folio` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=24;

--
-- AUTO_INCREMENT for table `usuarios`
--
ALTER TABLE `usuarios`
  MODIFY `idUsuario` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `detallenota`
--
ALTER TABLE `detallenota`
  ADD CONSTRAINT `detallenota_ibfk_1` FOREIGN KEY (`folionota`) REFERENCES `notas` (`folionota`);

--
-- Constraints for table `detalleord`
--
ALTER TABLE `detalleord`
  ADD CONSTRAINT `fk_orden` FOREIGN KEY (`folio`) REFERENCES `ordenes` (`folio`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
