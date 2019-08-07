-- phpMyAdmin SQL Dump
-- version 4.8.5
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 07-08-2019 a las 18:40:49
-- Versión del servidor: 10.1.38-MariaDB
-- Versión de PHP: 7.3.4

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `registro`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `equipo`
--

CREATE TABLE `equipo` (
  `id_equipo` int(11) NOT NULL,
  `cod_patrimonio` varchar(100) COLLATE utf8_spanish_ci DEFAULT NULL,
  `des_equipo` varchar(255) COLLATE utf8_spanish_ci DEFAULT NULL,
  `id_tipo_equipo` smallint(6) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `estado`
--

CREATE TABLE `estado` (
  `id_estado` smallint(6) NOT NULL,
  `estado` varchar(20) COLLATE utf8_spanish_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `incidencia`
--

CREATE TABLE `incidencia` (
  `id_incidencia` int(11) NOT NULL,
  `resp_incidencia` varchar(50) COLLATE utf8_spanish_ci NOT NULL,
  `desc_incidencia` varchar(255) COLLATE utf8_spanish_ci DEFAULT NULL,
  `cod_usuario` smallint(6) NOT NULL,
  `id_equipo` int(11) NOT NULL,
  `fecha_incidencia` datetime DEFAULT CURRENT_TIMESTAMP,
  `fmod_incidencia` datetime DEFAULT NULL,
  `id_estado` smallint(6) DEFAULT NULL,
  `id_ubicacion` smallint(6) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `mantenimiento`
--

CREATE TABLE `mantenimiento` (
  `id_mantenimiento` int(11) NOT NULL,
  `diag_mantenimiento` varchar(255) COLLATE utf8_spanish_ci NOT NULL,
  `desc_mantenimiento` varchar(255) COLLATE utf8_spanish_ci NOT NULL,
  `rec_mantenimiento` varchar(255) COLLATE utf8_spanish_ci DEFAULT NULL,
  `fecha_mantenimiento` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `id_incidencia` int(11) NOT NULL,
  `id_tipo_mantenimiento` smallint(6) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tipo_equipo`
--

CREATE TABLE `tipo_equipo` (
  `id_tipo_equipo` smallint(6) NOT NULL,
  `tipo_equipo` varchar(50) COLLATE utf8_spanish_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tipo_mantenimiento`
--

CREATE TABLE `tipo_mantenimiento` (
  `id_tipo_mantenimiento` smallint(6) NOT NULL,
  `tipo_mantenimiento` varchar(20) COLLATE utf8_spanish_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `ubicacion`
--

CREATE TABLE `ubicacion` (
  `id_ubicacion` smallint(6) NOT NULL,
  `ubicacion` varchar(50) COLLATE utf8_spanish_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `usuario`
--

CREATE TABLE `usuario` (
  `cod_usuario` smallint(6) NOT NULL,
  `nom_usuario` varchar(50) COLLATE utf8_spanish_ci NOT NULL,
  `ape_usuario` varchar(50) COLLATE utf8_spanish_ci NOT NULL,
  `dni_usuario` char(8) COLLATE utf8_spanish_ci NOT NULL,
  `cel_usuario` char(9) COLLATE utf8_spanish_ci DEFAULT NULL,
  `correo_usuario` varchar(255) COLLATE utf8_spanish_ci NOT NULL,
  `pas_usuario` varchar(100) COLLATE utf8_spanish_ci NOT NULL,
  `tipo_usuario` tinyint(1) NOT NULL DEFAULT '0' COMMENT '1:administrador 0:personal',
  `fecha_registro` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

--
-- Volcado de datos para la tabla `usuario`
--

INSERT INTO `usuario` (`cod_usuario`, `nom_usuario`, `ape_usuario`, `dni_usuario`, `cel_usuario`, `correo_usuario`, `pas_usuario`, `tipo_usuario`, `fecha_registro`) VALUES
(1, 'Josue Aldair', 'Mamani Cariapaza', '75896055', '993560867', 'admin@user.com', 'baa71c911a13f9347ad2e07ea33bd882', 1, '2019-07-15 00:00:00'),
(2, 'Jhon', 'Mendoza Chino', '45690203', '924905745', 'JHON.MENDOZA@GMAIL.COM', '827ccb0eea8a706c4c34a16891f84e7b', 0, '2019-08-03 17:49:37'),
(3, 'Luis', 'Neyra', '10191919', '989999999', 'LUIS@NEYRA.COM', '202cb962ac59075b964b07152d234b70', 0, '2019-08-03 18:37:04');

-- --------------------------------------------------------

--
-- Estructura Stand-in para la vista `v_incidencia`
-- (Véase abajo para la vista actual)
--
CREATE TABLE `v_incidencia` (
`codInc` int(11)
,`resInc` varchar(50)
,`fecInc` datetime
,`desInc` varchar(255)
,`nomInc` varchar(50)
,`apeInc` varchar(50)
,`deqInc` varchar(255)
,`teqInc` varchar(50)
,`cpaInc` varchar(100)
,`estInc` varchar(20)
,`ubiInc` varchar(50)
);

-- --------------------------------------------------------

--
-- Estructura para la vista `v_incidencia`
--
DROP TABLE IF EXISTS `v_incidencia`;

CREATE ALGORITHM=UNDEFINED DEFINER=`root`@`localhost` SQL SECURITY DEFINER VIEW `v_incidencia`  AS  select `i`.`id_incidencia` AS `codInc`,`i`.`resp_incidencia` AS `resInc`,`i`.`fecha_incidencia` AS `fecInc`,`i`.`desc_incidencia` AS `desInc`,`u`.`nom_usuario` AS `nomInc`,`u`.`ape_usuario` AS `apeInc`,`e`.`des_equipo` AS `deqInc`,`te`.`tipo_equipo` AS `teqInc`,`e`.`cod_patrimonio` AS `cpaInc`,`es`.`estado` AS `estInc`,`ub`.`ubicacion` AS `ubiInc` from (((((`incidencia` `i` join `equipo` `e` on((`e`.`id_equipo` = `i`.`id_equipo`))) join `usuario` `u` on((`i`.`cod_usuario` = `u`.`cod_usuario`))) join `tipo_equipo` `te` on((`te`.`id_tipo_equipo` = `e`.`id_tipo_equipo`))) join `ubicacion` `ub` on((`i`.`id_ubicacion` = `ub`.`id_ubicacion`))) join `estado` `es` on((`i`.`id_estado` = `es`.`id_estado`))) ;

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `equipo`
--
ALTER TABLE `equipo`
  ADD PRIMARY KEY (`id_equipo`),
  ADD KEY `R_5` (`id_tipo_equipo`);

--
-- Indices de la tabla `estado`
--
ALTER TABLE `estado`
  ADD PRIMARY KEY (`id_estado`);

--
-- Indices de la tabla `incidencia`
--
ALTER TABLE `incidencia`
  ADD PRIMARY KEY (`id_incidencia`),
  ADD KEY `R_17` (`cod_usuario`),
  ADD KEY `R_18` (`id_equipo`),
  ADD KEY `R_21` (`id_estado`),
  ADD KEY `R_25` (`id_ubicacion`);

--
-- Indices de la tabla `mantenimiento`
--
ALTER TABLE `mantenimiento`
  ADD PRIMARY KEY (`id_mantenimiento`),
  ADD KEY `R_20` (`id_incidencia`),
  ADD KEY `R_23` (`id_tipo_mantenimiento`);

--
-- Indices de la tabla `tipo_equipo`
--
ALTER TABLE `tipo_equipo`
  ADD PRIMARY KEY (`id_tipo_equipo`);

--
-- Indices de la tabla `tipo_mantenimiento`
--
ALTER TABLE `tipo_mantenimiento`
  ADD PRIMARY KEY (`id_tipo_mantenimiento`);

--
-- Indices de la tabla `ubicacion`
--
ALTER TABLE `ubicacion`
  ADD PRIMARY KEY (`id_ubicacion`);

--
-- Indices de la tabla `usuario`
--
ALTER TABLE `usuario`
  ADD PRIMARY KEY (`cod_usuario`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `equipo`
--
ALTER TABLE `equipo`
  MODIFY `id_equipo` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `estado`
--
ALTER TABLE `estado`
  MODIFY `id_estado` smallint(6) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `incidencia`
--
ALTER TABLE `incidencia`
  MODIFY `id_incidencia` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `mantenimiento`
--
ALTER TABLE `mantenimiento`
  MODIFY `id_mantenimiento` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `tipo_equipo`
--
ALTER TABLE `tipo_equipo`
  MODIFY `id_tipo_equipo` smallint(6) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `tipo_mantenimiento`
--
ALTER TABLE `tipo_mantenimiento`
  MODIFY `id_tipo_mantenimiento` smallint(6) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `ubicacion`
--
ALTER TABLE `ubicacion`
  MODIFY `id_ubicacion` smallint(6) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `usuario`
--
ALTER TABLE `usuario`
  MODIFY `cod_usuario` smallint(6) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- Restricciones para tablas volcadas
--

--
-- Filtros para la tabla `equipo`
--
ALTER TABLE `equipo`
  ADD CONSTRAINT `R_5` FOREIGN KEY (`id_tipo_equipo`) REFERENCES `tipo_equipo` (`id_tipo_equipo`);

--
-- Filtros para la tabla `incidencia`
--
ALTER TABLE `incidencia`
  ADD CONSTRAINT `R_17` FOREIGN KEY (`cod_usuario`) REFERENCES `usuario` (`cod_usuario`),
  ADD CONSTRAINT `R_18` FOREIGN KEY (`id_equipo`) REFERENCES `equipo` (`id_equipo`),
  ADD CONSTRAINT `R_21` FOREIGN KEY (`id_estado`) REFERENCES `estado` (`id_estado`),
  ADD CONSTRAINT `R_25` FOREIGN KEY (`id_ubicacion`) REFERENCES `ubicacion` (`id_ubicacion`);

--
-- Filtros para la tabla `mantenimiento`
--
ALTER TABLE `mantenimiento`
  ADD CONSTRAINT `R_20` FOREIGN KEY (`id_incidencia`) REFERENCES `incidencia` (`id_incidencia`),
  ADD CONSTRAINT `R_23` FOREIGN KEY (`id_tipo_mantenimiento`) REFERENCES `tipo_mantenimiento` (`id_tipo_mantenimiento`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
