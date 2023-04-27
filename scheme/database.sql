-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 27-04-2023 a las 02:39:33
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

DELIMITER $$
--
-- Procedimientos
--
CREATE DEFINER=`root`@`localhost` PROCEDURE `get_ambitos` ()   BEGIN
  SELECT aid, nombre_ambito FROM ambitos;
END$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `get_distritos` ()   BEGIN
  SELECT did, nombre_distrito FROM distritos;
END$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `get_process_card` ()   BEGIN
  SELECT titulo_proceso, fecha_inicio_proceso, fecha_fin_proceso, nombre_ambito, nombre_distrito, titulo_fase FROM procesos, fases, ambitos, distritos WHERE procesos.pid=fases.pid and fase_actual = n_fase and procesos.aid = ambitos.aid and procesos.did = distritos.did;
END$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `get_process_featured_1` ()   BEGIN
  SELECT titulo_proceso, subtitulo_proceso, titulo_fase, descripcion_proceso, COUNT(participaciones.pid) as total FROM procesos, participaciones, fases WHERE procesos.pid = participaciones.pid and fases.pid = procesos.pid and fase_actual = n_fase GROUP BY procesos.pid ORDER BY total DESC LIMIT 1;
END$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `get_process_featured_2` ()   BEGIN
  SELECT titulo_proceso, subtitulo_proceso, titulo_fase, descripcion_proceso, COUNT(participaciones.pid) as total FROM procesos, participaciones, fases WHERE procesos.pid = participaciones.pid and fases.pid = procesos.pid and fase_actual = n_fase GROUP BY procesos.pid ORDER BY total DESC LIMIT 2;
END$$

DELIMITER ;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `ambitos`
--

CREATE TABLE `ambitos` (
  `aid` int(11) NOT NULL,
  `nombre_ambito` varchar(256) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `ambitos`
--

INSERT INTO `ambitos` (`aid`, `nombre_ambito`) VALUES
(1, 'Ambito 1'),
(2, 'Ambito 2'),
(3, 'Ambito 3'),
(4, 'Ambito 4'),
(5, 'Ambito 5'),
(6, 'Ambito 6'),
(7, 'Ambito 7'),
(8, 'Ambito 8'),
(9, 'Ambito 9'),
(10, 'Ambito 10'),
(11, 'Ambito 11'),
(12, 'Ambito 12');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `distritos`
--

CREATE TABLE `distritos` (
  `did` int(11) NOT NULL,
  `nombre_distrito` varchar(256) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `distritos`
--

INSERT INTO `distritos` (`did`, `nombre_distrito`) VALUES
(1, 'Distrito 1'),
(2, 'Distrito 2'),
(3, 'Distrito 3'),
(4, 'Distrito 4'),
(5, 'Distrito 5'),
(6, 'Distrito 6'),
(7, 'Distrito 7'),
(8, 'Distrito 8'),
(9, 'Distrito 9'),
(10, 'Distrito 10'),
(11, 'Distrito 11'),
(12, 'Distrito 12');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `fases`
--

CREATE TABLE `fases` (
  `pid` int(11) NOT NULL,
  `n_fase` int(11) NOT NULL,
  `titulo_fase` varchar(256) DEFAULT NULL,
  `descripcion_fase` varchar(2048) DEFAULT NULL,
  `estado` varchar(16) DEFAULT NULL,
  `fecha_inicio_fases` date DEFAULT NULL,
  `fecha_fin_fases` date DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `fases`
--

INSERT INTO `fases` (`pid`, `n_fase`, `titulo_fase`, `descripcion_fase`, `estado`, `fecha_inicio_fases`, `fecha_fin_fases`) VALUES
(1, 2, 'Validación de Registro de Participantes Y Propuestas', 'Validación de la documentación de las personas registradas a participar como Juez o Jueza Auxiliar en la Consulta Extraordinaria.', 'activo', '2023-04-19', '2023-04-29'),
(2, 3, 'Validación de Consulta', 'Etapa para la Validación de la votación emitida por la población de Monterrey que participó en la Consulta Extraordinaria.', 'activo', '2023-04-28', '2023-04-29');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `favoritos`
--

CREATE TABLE `favoritos` (
  `pid` int(11) NOT NULL,
  `uid` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `favoritos`
--

INSERT INTO `favoritos` (`pid`, `uid`) VALUES
(1, 1),
(2, 1);

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
  `did` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `participaciones`
--

INSERT INTO `participaciones` (`pid`, `uid`, `titulo_registro`, `propuesta`, `fecha_creacion`, `did`) VALUES
(1, 1, 'Propuesta 1', 'Texto de propuesta 1', '2023-04-26', 1),
(2, 1, 'Propuesta 2', 'Texto Propuesta 2', '2023-04-26', 2);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `procesos`
--

CREATE TABLE `procesos` (
  `pid` int(11) NOT NULL,
  `estatus` tinyint(1) NOT NULL,
  `fase_actual` int(11) NOT NULL,
  `titulo_proceso` varchar(256) NOT NULL,
  `subtitulo_proceso` varchar(256) DEFAULT NULL,
  `descripcion_proceso` varchar(2048) NOT NULL,
  `descripcion_c_proceso` mediumtext NOT NULL,
  `fecha_inicio_proceso` date NOT NULL,
  `fecha_fin_proceso` date NOT NULL,
  `aid` int(11) NOT NULL,
  `did` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `procesos`
--

INSERT INTO `procesos` (`pid`, `estatus`, `fase_actual`, `titulo_proceso`, `subtitulo_proceso`, `descripcion_proceso`, `descripcion_c_proceso`, `fecha_inicio_proceso`, `fecha_fin_proceso`, `aid`, `did`) VALUES
(1, 1, 2, 'Convocatoria para integrar el Consejo Municipal de Mejora Regulatoria', '¡Forma parte del Consejo de Mejora Regulatoria de Monterrey!', '<p class=\"process-featured-text\">Si tienes alguno de estos perfiles postúlate aquí:</p>\r\n                  <ol class=\"process-featured-list\">\r\n                      <li>Cámaras empresariales</li>\r\n                      <li>Centros de estudios o universidades</li>\r\n                      <li>Ciudadanos que se hayan destacado por su contribución a la transparencia, la rendición de cuentas o el combate a la corrupción, al desarrollo económico o social de la localidad</li>\r\n                      <li>Representantes de Asociaciones u Organizaciones No Gubernamentales</li>\r\n                  </ol>\r\n                  <p class=\"process-featured-t-footer\"><strong>Conoce toda la convocatoria</strong> y asegúrate de tener todo listo para tu registro.</p>', '<p><b>¡Ven y ayúdanos a sembrar paz en Monterrey!</b></p>\r\n                <p>Participa a partir del 10 de Abril en la Consulta Extraordinaria para elegir a tu Juez o Jueza Auxiliar. Consulta las bases y alista tu documentación para iniciar el proceso de postulación. Puedes hacerlo en línea desde tu casa o acercándote a alguno de los Centros de Atención Ciudadana o diferentes puntos que instalaremos en todo el municipio para ayudarte en tu registro.</p>\r\n\r\n                   <p> Las candidaturas podrán registrarse a partir del 21 de Marzo y hasta el 09 de Abril. Entre más pronto te inscribas como candidato y cumplas con los requisitos para validar tu candidatura, podrás iniciar campaña en tu colonia y sección en el plazo antes descrito.</p>\r\n                    \r\n                   <p>Para poder votar por tu candidato o candidata, podrás hacerlo a partir del 24 Abril y hasta el 21 de Mayo.\r\n                    Participa e invita a que participen tus conocidos. No olvides que la historia de Monterrey la escribimos juntos las vecinos y vecinos en sus calles, colonias y barrios.</p>\r\n                <br>\r\n                <p><b>Requisitos</b></p>\r\n                <ul>\r\n                    <li>Ser ciudadano mexicano.</li>\r\n                    <li>Ser mayor de edad.</li>\r\n                    <li>Ser residente de la sección en la cual desarrollará el cargo.</li>\r\n                    <li>Estar en pleno uso de sus derechos civiles.</li>\r\n                    <li>Tener vocación de servicio</li>\r\n                    <li>No ser servidor público.</li>\r\n                    <li>No formar parte de algún partido político.</li>\r\n                </ul>\r\n                <br>\r\n                <p><b>¿Cómo participar?</b></p>\r\n                <ol>\r\n                    <li><b>REGISTRATE COMO ASPIRANTE DE TU SECCIÓN</b> en la plataforma https://decidimos.monterrey.gob.mx/processes/juecesauxiliares2023/f/72/ (Enlace externo) o en nuestros módulos: Palacio Municipal, Parque Aztlán, Parque Tucán, CAM Garza Sada de 8:00 a 16:00 hrs. Podrás hacerlo a partir del 21 de Marzo y hasta el 9 de Abril.</li>\r\n                    <li><b>SUBE TUS 3 PROPUESTAS</b> después de registrar tu candidatura, si deseas compartir tus ideas, postulalas en la sección de Propuestas Link</li>\r\n                    <li><b>ESPERA A QUE SE CONFIRME TU POSTULACIÓN</b> y se publique en el sitio tu Perfil.</li>\r\n                    <li><b>HAZ DIFUSIÓN EN TU COLONIA DE TU POSTULACIÓN E INVITA A QUE SE REGISTREN PARA VOTAR A TUS VECINOS Y VECINAS.</b> Promueve tus ideas de mejora de tu comunidad entre tus vecinos y vecinas. No olvides invitar a tus vecinos y vecinas para hacer que participen el mayor número de personas</li>\r\n                    <li><b>REGISTRO PARA VOTAR.</b> A partir del 21 de Marzo y hasta el 09 de Abril, deben registrarse los vecinos y vecinas para eligir y votar por la persona que más los represente como Juez o Jueza Auxiliar de su sección.</li>\r\n                    <li><b>RESULTADOS DE CONSULTA.</b> El día 5 de Junio se darán a conocer los resultados de la consulta.</li>\r\n                </ol>', '2023-04-12', '2023-04-29', 1, 1),
(2, 1, 3, 'Primer Presupuesto Participativo', NULL, '<p class=\"process-featured-text\">Por primera vez Monterrey tendrá un Presupuesto Participativo ¡Ya se armó!<br>\r\n                    Esta es tu plataforma Decidimos Monterrey, aquí se llevará acabo el primer presupuesto participativo de la ciudad.</p>\r\n                <ul class=\"process-featured-list\">\r\n                    <li>Del 7 al 29 de mayo recibimos las ideas de la ciudadanía.</li>\r\n                    <li>Del 30 de mayo al 22 de junio, revisamos tu propuesta.</li>\r\n                    <li>Del 4 al 13 de julio, ¡Fue momento de votar!</li>\r\n                    <li>Del 14 al 17, hicimos el recuento de los votos en la plataforma y en boletas físicas.</li>\r\n                    <li><strong>Los resultados finales</strong> se publicaron el lunes 18 de julio.</li>\r\n                </ul>\r\n                <p class=\"process-featured-t-footer\"><strong>Conoce toda la convocatoria</strong> y asegúrate de tener todo listo para tu registro.</p>', '<p><b>¡Ven y ayúdanos a sembrar paz en Monterrey!</b></p>\r\n                <p>Participa a partir del 10 de Abril en la Consulta Extraordinaria para elegir a tu Juez o Jueza Auxiliar. Consulta las bases y alista tu documentación para iniciar el proceso de postulación. Puedes hacerlo en línea desde tu casa o acercándote a alguno de los Centros de Atención Ciudadana o diferentes puntos que instalaremos en todo el municipio para ayudarte en tu registro.</p>\r\n\r\n                   <p> Las candidaturas podrán registrarse a partir del 21 de Marzo y hasta el 09 de Abril. Entre más pronto te inscribas como candidato y cumplas con los requisitos para validar tu candidatura, podrás iniciar campaña en tu colonia y sección en el plazo antes descrito.</p>\r\n                    \r\n                   <p>Para poder votar por tu candidato o candidata, podrás hacerlo a partir del 24 Abril y hasta el 21 de Mayo.\r\n                    Participa e invita a que participen tus conocidos. No olvides que la historia de Monterrey la escribimos juntos las vecinos y vecinos en sus calles, colonias y barrios.</p>\r\n                <br>\r\n                <p><b>Requisitos</b></p>\r\n                <ul>\r\n                    <li>Ser ciudadano mexicano.</li>\r\n                    <li>Ser mayor de edad.</li>\r\n                    <li>Ser residente de la sección en la cual desarrollará el cargo.</li>\r\n                    <li>Estar en pleno uso de sus derechos civiles.</li>\r\n                    <li>Tener vocación de servicio</li>\r\n                    <li>No ser servidor público.</li>\r\n                    <li>No formar parte de algún partido político.</li>\r\n                </ul>\r\n                <br>\r\n                <p><b>¿Cómo participar?</b></p>\r\n                <ol>\r\n                    <li><b>REGISTRATE COMO ASPIRANTE DE TU SECCIÓN</b> en la plataforma https://decidimos.monterrey.gob.mx/processes/juecesauxiliares2023/f/72/ (Enlace externo) o en nuestros módulos: Palacio Municipal, Parque Aztlán, Parque Tucán, CAM Garza Sada de 8:00 a 16:00 hrs. Podrás hacerlo a partir del 21 de Marzo y hasta el 9 de Abril.</li>\r\n                    <li><b>SUBE TUS 3 PROPUESTAS</b> después de registrar tu candidatura, si deseas compartir tus ideas, postulalas en la sección de Propuestas Link</li>\r\n                    <li><b>ESPERA A QUE SE CONFIRME TU POSTULACIÓN</b> y se publique en el sitio tu Perfil.</li>\r\n                    <li><b>HAZ DIFUSIÓN EN TU COLONIA DE TU POSTULACIÓN E INVITA A QUE SE REGISTREN PARA VOTAR A TUS VECINOS Y VECINAS.</b> Promueve tus ideas de mejora de tu comunidad entre tus vecinos y vecinas. No olvides invitar a tus vecinos y vecinas para hacer que participen el mayor número de personas</li>\r\n                    <li><b>REGISTRO PARA VOTAR.</b> A partir del 21 de Marzo y hasta el 09 de Abril, deben registrarse los vecinos y vecinas para eligir y votar por la persona que más los represente como Juez o Jueza Auxiliar de su sección.</li>\r\n                    <li><b>RESULTADOS DE CONSULTA.</b> El día 5 de Junio se darán a conocer los resultados de la consulta.</li>\r\n                </ol>', '2023-04-12', '2023-04-29', 3, 2);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `usuarios`
--

CREATE TABLE `usuarios` (
  `uid` int(11) NOT NULL,
  `nombre` varchar(50) NOT NULL,
  `contraseña` varchar(10) NOT NULL,
  `telefono` int(11) DEFAULT NULL,
  `permiso` tinyint(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `usuarios`
--

INSERT INTO `usuarios` (`uid`, `nombre`, `contraseña`, `telefono`, `permiso`) VALUES
(1, 'admin', 'admin', NULL, 1),
(2, 'admin', 'admin', NULL, 1);

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `ambitos`
--
ALTER TABLE `ambitos`
  ADD PRIMARY KEY (`aid`);

--
-- Indices de la tabla `distritos`
--
ALTER TABLE `distritos`
  ADD PRIMARY KEY (`did`);

--
-- Indices de la tabla `fases`
--
ALTER TABLE `fases`
  ADD PRIMARY KEY (`pid`,`n_fase`);

--
-- Indices de la tabla `favoritos`
--
ALTER TABLE `favoritos`
  ADD PRIMARY KEY (`pid`,`uid`),
  ADD KEY `uid` (`uid`);

--
-- Indices de la tabla `participaciones`
--
ALTER TABLE `participaciones`
  ADD PRIMARY KEY (`pid`,`uid`),
  ADD KEY `uid` (`uid`),
  ADD KEY `did` (`did`);

--
-- Indices de la tabla `procesos`
--
ALTER TABLE `procesos`
  ADD PRIMARY KEY (`pid`),
  ADD KEY `aid` (`aid`),
  ADD KEY `did` (`did`);

--
-- Indices de la tabla `usuarios`
--
ALTER TABLE `usuarios`
  ADD PRIMARY KEY (`uid`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `ambitos`
--
ALTER TABLE `ambitos`
  MODIFY `aid` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT de la tabla `distritos`
--
ALTER TABLE `distritos`
  MODIFY `did` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT de la tabla `procesos`
--
ALTER TABLE `procesos`
  MODIFY `pid` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT de la tabla `usuarios`
--
ALTER TABLE `usuarios`
  MODIFY `uid` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- Restricciones para tablas volcadas
--

--
-- Filtros para la tabla `fases`
--
ALTER TABLE `fases`
  ADD CONSTRAINT `fases_ibfk_1` FOREIGN KEY (`pid`) REFERENCES `procesos` (`pid`);

--
-- Filtros para la tabla `favoritos`
--
ALTER TABLE `favoritos`
  ADD CONSTRAINT `favoritos_ibfk_1` FOREIGN KEY (`pid`) REFERENCES `procesos` (`pid`),
  ADD CONSTRAINT `favoritos_ibfk_2` FOREIGN KEY (`uid`) REFERENCES `usuarios` (`uid`);

--
-- Filtros para la tabla `participaciones`
--
ALTER TABLE `participaciones`
  ADD CONSTRAINT `participaciones_ibfk_1` FOREIGN KEY (`pid`) REFERENCES `procesos` (`pid`),
  ADD CONSTRAINT `participaciones_ibfk_2` FOREIGN KEY (`uid`) REFERENCES `usuarios` (`uid`),
  ADD CONSTRAINT `participaciones_ibfk_3` FOREIGN KEY (`did`) REFERENCES `distritos` (`did`);

--
-- Filtros para la tabla `procesos`
--
ALTER TABLE `procesos`
  ADD CONSTRAINT `procesos_ibfk_1` FOREIGN KEY (`aid`) REFERENCES `ambitos` (`aid`),
  ADD CONSTRAINT `procesos_ibfk_2` FOREIGN KEY (`did`) REFERENCES `distritos` (`did`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
