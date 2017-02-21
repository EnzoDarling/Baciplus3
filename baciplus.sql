-- phpMyAdmin SQL Dump
-- version 3.2.4
-- http://www.phpmyadmin.net
--
-- Servidor: localhost
-- Tiempo de generación: 20-10-2014 a las 22:25:56
-- Versión del servidor: 5.1.41
-- Versión de PHP: 5.3.1

SET SQL_MODE="NO_AUTO_VALUE_ON_ZERO";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Base de datos: `baciplus`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `cultivos`
--

CREATE TABLE IF NOT EXISTS `cultivos` (
  `num_cultivo` int(20) NOT NULL,
  `fecha_primera_lectura` int(10) NOT NULL,
  `primera_lectura` varchar(10) NOT NULL,
  `fecha_segunda_lectura` int(10) NOT NULL,
  `segunda_lectura` varchar(10) NOT NULL,
  `sol_cultivo` varchar(10) NOT NULL,
  `resultado` varchar(10) NOT NULL,
  `num_muestra` int(20) NOT NULL,
  PRIMARY KEY (`num_cultivo`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Volcar la base de datos para la tabla `cultivos`
--


-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `informes`
--

CREATE TABLE IF NOT EXISTS `informes` (
  `num_informe` int(11) NOT NULL,
  `fecha` int(11) NOT NULL,
  `num_muestra` int(11) NOT NULL,
  `tipo_muestra` int(11) NOT NULL,
  `sol_cultivo` varchar(15) NOT NULL,
  `fecha_primera_lectura` int(11) NOT NULL,
  `primera_lectura` int(11) NOT NULL,
  `fecha_segunda_lectura` int(11) NOT NULL,
  `segunda_lectura` int(11) NOT NULL,
  PRIMARY KEY (`num_informe`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Volcar la base de datos para la tabla `informes`
--


-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `muestra`
--

CREATE TABLE IF NOT EXISTS `muestra` (
  `num_muestra` int(10) NOT NULL AUTO_INCREMENT,
  `lectura` varchar(10) NOT NULL,
  `tipo_muestra` varchar(20) NOT NULL,
  `sol_cultivo` varchar(20) NOT NULL,
  `num_orden` int(50) NOT NULL,
  `num_cultivo` int(50) NOT NULL,
  PRIMARY KEY (`num_muestra`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

--
-- Volcar la base de datos para la tabla `muestra`
--


-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `ordenes`
--

CREATE TABLE IF NOT EXISTS `ordenes` (
  `num_orden` int(20) NOT NULL AUTO_INCREMENT,
  `apellido` varchar(10) NOT NULL,
  `nombre` varchar(10) NOT NULL,
  `sol_cultivo` varchar(15) NOT NULL,
  PRIMARY KEY (`num_orden`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

--
-- Volcar la base de datos para la tabla `ordenes`
--


-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `paciente`
--

CREATE TABLE IF NOT EXISTS `paciente` (
  `dni` int(8) NOT NULL,
  `dire` varchar(50) NOT NULL,
  `telefono` int(15) NOT NULL,
  `num_orden` int(15) NOT NULL,
  PRIMARY KEY (`dni`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Volcar la base de datos para la tabla `paciente`
--


-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `turnos`
--

CREATE TABLE IF NOT EXISTS `turnos` (
  `id_turno` int(100) NOT NULL AUTO_INCREMENT,
  `apellido` varchar(15) NOT NULL,
  `nombre` varchar(15) NOT NULL,
  `fecha` int(15) NOT NULL,
  `hora` int(8) NOT NULL,
  PRIMARY KEY (`id_turno`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

--
-- Volcar la base de datos para la tabla `turnos`
--


/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
