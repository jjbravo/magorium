-- phpMyAdmin SQL Dump
-- version 4.0.10deb1
-- http://www.phpmyadmin.net
--
-- Host: localhost
-- Generation Time: Jan 22, 2016 at 08:46 AM
-- Server version: 5.5.46-0ubuntu0.14.04.2
-- PHP Version: 5.5.9-1ubuntu4.14

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `magorium_db`
--

-- --------------------------------------------------------

--
-- Table structure for table `ciudades`
--
CREATE DATABASE magorium_db;
USE magorium_db;

CREATE TABLE IF NOT EXISTS `ciudades` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `ciudad` varchar(45) NOT NULL,
  `departamentos_id` int(11) NOT NULL,
  PRIMARY KEY (`id`),
  KEY `fk_ciudades_departamentos1_idx` (`departamentos_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=4 ;

--
-- Dumping data for table `ciudades`
--

INSERT INTO `ciudades` (`id`, `ciudad`, `departamentos_id`) VALUES
(1, 'Palmira', 1),
(2, 'Cali', 1),
(3, 'Buga', 1);

-- --------------------------------------------------------

--
-- Table structure for table `clientes`
--

CREATE TABLE IF NOT EXISTS `clientes` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `documento` varchar(12) NOT NULL,
  `nombre` varchar(50) NOT NULL,
  `telefono_fijo` varchar(8) DEFAULT NULL,
  `celular` varchar(11) NOT NULL,
  `direccion` varchar(50) NOT NULL,
  `email` varchar(50) NOT NULL,
  `ciudades_id` int(11) NOT NULL,
  `tipo_documento_id` int(11) NOT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `documento_UNIQUE` (`documento`),
  KEY `fk_clientes_ciudades_idx` (`ciudades_id`),
  KEY `fk_clientes_tipo_documento1_idx` (`tipo_documento_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8mb4 AUTO_INCREMENT=12 ;

--
-- Dumping data for table `clientes`
--

INSERT INTO `clientes` (`id`, `documento`, `nombre`, `telefono_fijo`, `celular`, `direccion`, `email`, `ciudades_id`, `tipo_documento_id`) VALUES
(1, '22334455', 'Francisco Camilo Sarmiento', '2808764', '3206178964', 'Calle 50 # 23 - 18', 'francisco@gmail.com', 2, 2),
(2, '3322445', 'Andres Lemos Rojas', '345566', '3208764532', 'Calle 34 # 23-32', 'lemos@gmail.com', 1, 1),
(10, '66778899', 'David  Lizarralde Sarmiento', '2808764', '3206176876', 'Calle 50 # 23 - 18', 'juanandres@gmail.com', 3, 2),
(11, '2345668', 'Maria Camila Figueroa Rengifo', '224456', '3206763423', 'Calle 23 # 24 - 45', 'mariac@gmail.com', 1, 2);

-- --------------------------------------------------------

--
-- Table structure for table `compras`
--

CREATE TABLE IF NOT EXISTS `compras` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `fecha` date NOT NULL,
  `total` double NOT NULL,
  `clientes_id` int(11) NOT NULL,
  PRIMARY KEY (`id`),
  KEY `fk_factura_clientes1_idx` (`clientes_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=21 ;

--
-- Dumping data for table `compras`
--

INSERT INTO `compras` (`id`, `fecha`, `total`, `clientes_id`) VALUES
(1, '2015-11-10', 11600, 1),
(2, '2015-11-18', 60000, 2),
(3, '2015-11-18', 25000, 10),
(4, '2015-11-04', 29800, 10),
(5, '2015-11-19', 16300, 2),
(6, '2015-11-19', 59600, 10),
(7, '2015-11-19', 98800, 11);

-- --------------------------------------------------------

--
-- Stand-in structure for view `compras_view`
--
CREATE TABLE IF NOT EXISTS `compras_view` (
`nombre_cliente` varchar(50)
,`fecha_compra` date
,`total` double
,`cantidad_compra` int(11)
,`nombre_producto` varchar(45)
,`formato_pelicula` varchar(15)
);
-- --------------------------------------------------------

--
-- Table structure for table `departamentos`
--

CREATE TABLE IF NOT EXISTS `departamentos` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `departamento` varchar(45) NOT NULL,
  `paises_id` int(11) NOT NULL,
  PRIMARY KEY (`id`),
  KEY `fk_departamentos_paises1_idx` (`paises_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=2 ;

--
-- Dumping data for table `departamentos`
--

INSERT INTO `departamentos` (`id`, `departamento`, `paises_id`) VALUES
(1, 'Valle del Cauca', 1);

-- --------------------------------------------------------

--
-- Table structure for table `detalle_compra`
--

CREATE TABLE IF NOT EXISTS `detalle_compra` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `cantidad` int(11) NOT NULL,
  `subtotal` double DEFAULT NULL,
  `compras_id` int(11) NOT NULL,
  `productos_id` int(11) NOT NULL,
  PRIMARY KEY (`id`),
  KEY `fk_detalle_factura_factura1_idx` (`compras_id`),
  KEY `fk_detalle_factura_productos1_idx` (`productos_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=30 ;

--
-- Dumping data for table `detalle_compra`
--

INSERT INTO `detalle_compra` (`id`, `cantidad`, `subtotal`, `compras_id`, `productos_id`) VALUES
(1, 2, 11600, 1, 1),
(2, 2, 54000, 1, 2),
(3, 3, 120000, 2, 2),
(4, 3, 28000, 3, 2),
(5, 1, 5800, 7, 1),
(6, 2, 48000, 7, 3);

-- --------------------------------------------------------

--
-- Table structure for table `formato`
--

CREATE TABLE IF NOT EXISTS `formato` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `formato` varchar(15) NOT NULL,
  `tipo` char(1) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=7 ;

--
-- Dumping data for table `formato`
--

INSERT INTO `formato` (`id`, `formato`, `tipo`) VALUES
(1, 'DVD', 'P'),
(2, 'BluRay', 'P'),
(3, 'PlayStation 2', 'V'),
(4, 'PlayStation 3', 'V'),
(5, 'XBOX 360', 'V'),
(6, 'Nintendo WII', 'V');

-- --------------------------------------------------------

--
-- Table structure for table `paises`
--

CREATE TABLE IF NOT EXISTS `paises` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `pais` varchar(45) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=2 ;

--
-- Dumping data for table `paises`
--

INSERT INTO `paises` (`id`, `pais`) VALUES
(1, 'Colombia');

-- --------------------------------------------------------

--
-- Table structure for table `productos`
--

CREATE TABLE IF NOT EXISTS `productos` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `referencia` varchar(5) NOT NULL,
  `nombre` varchar(45) NOT NULL,
  `descripcion` varchar(150) NOT NULL,
  `tipo` char(1) NOT NULL,
  `cantidad` int(10) unsigned NOT NULL,
  `valor` double NOT NULL,
  `estado` tinyint(1) NOT NULL DEFAULT '1',
  `imagen` varchar(50) NOT NULL,
  `formato_id` int(11) NOT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `referencia_UNIQUE` (`referencia`),
  KEY `fk_productos_formato1_idx` (`formato_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=5 ;

--
-- Dumping data for table `productos`
--

INSERT INTO `productos` (`id`, `referencia`, `nombre`, `descripcion`, `tipo`, `cantidad`, `valor`, `estado`, `imagen`, `formato_id`) VALUES
(1, '22334', 'Los Casa Fantasmas', 'Pelicula de drama y ficción', 'P', 10, 5800, 1, '4746casafantasmas.jpg', 2),
(2, '33445', 'Corazon Valiente', 'Pelicula de drama historico de estados unidos, interpretada por Mel Gimpson. ', 'P', 5, 24000, 1, '3537corazonvaliente.jpg', 1),
(3, '34565', 'Titanic', 'Titanic es una pelicula basada en una historia real, donde el transatlantico titanic se choca con un acebert y se unde ne el oceano.', 'P', 10, 24000, 1, '3407titanic.jpg', 2),
(4, '3456', 'Call Off Duty', 'Juego de accion', 'V', 7, 10500, 1, '3711callofduty.jpg', 4);

-- --------------------------------------------------------

--
-- Table structure for table `roles`
--

CREATE TABLE IF NOT EXISTS `roles` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `rol` varchar(20) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=3 ;

--
-- Dumping data for table `roles`
--

INSERT INTO `roles` (`id`, `rol`) VALUES
(1, 'admin'),
(2, 'secretaria');

-- --------------------------------------------------------

--
-- Table structure for table `tipo_documento`
--

CREATE TABLE IF NOT EXISTS `tipo_documento` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `tipo_documento` varchar(25) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=5 ;

--
-- Dumping data for table `tipo_documento`
--

INSERT INTO `tipo_documento` (`id`, `tipo_documento`) VALUES
(1, 'Cedula de Ciudadania'),
(2, 'Tarjeta de Identidad'),
(3, 'Cedula de Extrangeria'),
(4, 'NIT');

-- --------------------------------------------------------

--
-- Table structure for table `usuarios`
--

CREATE TABLE IF NOT EXISTS `usuarios` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `username` varchar(20) NOT NULL,
  `password` varchar(60) NOT NULL,
  `correo` varchar(45) NOT NULL,
  `roles_id` int(11) NOT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `username_UNIQUE` (`username`),
  KEY `fk_usuarios_roles1_idx` (`roles_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=3 ;

--
-- Dumping data for table `usuarios`
--

INSERT INTO `usuarios` (`id`, `username`, `password`, `correo`, `roles_id`) VALUES
(1, 'admin', '21232f297a57a5a743894a0e4a801fc3', 'jhon@gmail.com', 1),
(2, 'maria', '912ec803b2ce49e4a541068d495ab570', 'root@gmail.com', 2);

-- --------------------------------------------------------

--
-- Structure for view `compras_view`
--
DROP TABLE IF EXISTS `compras_view`;

CREATE ALGORITHM=UNDEFINED DEFINER=`root`@`localhost` SQL SECURITY DEFINER VIEW `compras_view` AS select `clientes`.`nombre` AS `nombre_cliente`,`compras`.`fecha` AS `fecha_compra`,`compras`.`total` AS `total`,`detalle_compra`.`cantidad` AS `cantidad_compra`,`productos`.`nombre` AS `nombre_producto`,`formato`.`formato` AS `formato_pelicula` from ((((`clientes` join `compras`) join `detalle_compra`) join `productos`) join `formato`) where ((`clientes`.`id` = `compras`.`clientes_id`) and (`compras`.`id` = `detalle_compra`.`compras_id`) and (`detalle_compra`.`id` = `productos`.`id`) and (`productos`.`formato_id` = `formato`.`id`));

--
-- Constraints for dumped tables
--

--
-- Constraints for table `ciudades`
--
ALTER TABLE `ciudades`
  ADD CONSTRAINT `fk_ciudades_departamentos1` FOREIGN KEY (`departamentos_id`) REFERENCES `departamentos` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Constraints for table `clientes`
--
ALTER TABLE `clientes`
  ADD CONSTRAINT `fk_clientes_ciudades` FOREIGN KEY (`ciudades_id`) REFERENCES `ciudades` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `fk_clientes_tipo_documento1` FOREIGN KEY (`tipo_documento_id`) REFERENCES `tipo_documento` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Constraints for table `compras`
--
ALTER TABLE `compras`
  ADD CONSTRAINT `fk_factura_clientes1` FOREIGN KEY (`clientes_id`) REFERENCES `clientes` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Constraints for table `departamentos`
--
ALTER TABLE `departamentos`
  ADD CONSTRAINT `fk_departamentos_paises1` FOREIGN KEY (`paises_id`) REFERENCES `paises` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Constraints for table `detalle_compra`
--
ALTER TABLE `detalle_compra`
  ADD CONSTRAINT `fk_detalle_factura_factura1` FOREIGN KEY (`compras_id`) REFERENCES `compras` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `fk_detalle_factura_productos1` FOREIGN KEY (`productos_id`) REFERENCES `productos` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Constraints for table `productos`
--
ALTER TABLE `productos`
  ADD CONSTRAINT `fk_productos_formato1` FOREIGN KEY (`formato_id`) REFERENCES `formato` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Constraints for table `usuarios`
--
ALTER TABLE `usuarios`
  ADD CONSTRAINT `fk_usuarios_roles1` FOREIGN KEY (`roles_id`) REFERENCES `roles` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
