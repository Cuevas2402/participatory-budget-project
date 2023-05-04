-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 04-05-2023 a las 07:05:31
-- Versión del servidor: 10.4.25-MariaDB
-- Versión de PHP: 8.1.10

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `presupueto`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `participaciones`
--

CREATE TABLE `participaciones` (
  `pid` int(11) NOT NULL,
  `uid` int(11) NOT NULL,
  `titulo_registro` varchar(256) NOT NULL,
  `propuesta` mediumtext NOT NULL,
  `fecha_creacion` date NOT NULL,
  `did` int(11) NOT NULL,
  `img` varchar(256) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `participaciones`
--

INSERT INTO `participaciones` (`pid`, `uid`, `titulo_registro`, `propuesta`, `fecha_creacion`, `did`, `img`) VALUES
(1, 1, 'Titulo 1', 'Propuesta 1', '2023-04-27', 1, NULL),
(1, 24, 'Titulo 3', 'Propuesta 3', '2023-04-30', 3, NULL),
(2, 1, 'Titulo 2', 'Propuesta 2', '2023-04-27', 2, NULL);

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `participaciones`
--
ALTER TABLE `participaciones`
  ADD PRIMARY KEY (`pid`,`uid`),
  ADD KEY `did` (`did`),
  ADD KEY `uid` (`uid`);

--
-- Restricciones para tablas volcadas
--

--
-- Filtros para la tabla `participaciones`
--
ALTER TABLE `participaciones`
  ADD CONSTRAINT `participaciones_ibfk_1` FOREIGN KEY (`did`) REFERENCES `distritos` (`did`),
  ADD CONSTRAINT `participaciones_ibfk_2` FOREIGN KEY (`uid`) REFERENCES `usuarios` (`uid`),
  ADD CONSTRAINT `participaciones_ibfk_3` FOREIGN KEY (`pid`) REFERENCES `procesos` (`pid`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
