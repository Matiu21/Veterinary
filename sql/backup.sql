-- phpMyAdmin SQL Dump
-- version 5.0.4
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1:3306
-- Tiempo de generación: 21-05-2021 a las 21:02:08
-- Versión del servidor: 10.4.17-MariaDB
-- Versión de PHP: 8.0.2

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `veterinaria`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `especialidades`
--

CREATE TABLE `especialidades` (
  `id_especialidades` int(11) NOT NULL,
  `tipo_especialidades` varchar(100) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `historial`
--

CREATE TABLE `historial` (
  `idhistorial` int(11) NOT NULL,
  `fecha` datetime DEFAULT NULL,
  `tipo_visita` varchar(100) DEFAULT NULL,
  `pago` double DEFAULT NULL,
  `causa_visita` varchar(100) DEFAULT NULL,
  `mascota_id_mascota` int(11) NOT NULL,
  `Receta_idReceta` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `mascota`
--

CREATE TABLE `mascota` (
  `id_mascota` int(11) NOT NULL,
  `nombra_mascota` varchar(100) DEFAULT NULL,
  `peso_mascota` varchar(100) DEFAULT NULL,
  `tamaño_mascota` varchar(100) DEFAULT NULL,
  `raza_mascota` varchar(100) DEFAULT NULL,
  `fecha_nacimiento_mascota` date DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `mascota_has_personas`
--

CREATE TABLE `mascota_has_personas` (
  `mascota_id_mascota` int(11) NOT NULL,
  `personas_id_personas` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `personas`
--

CREATE TABLE `personas` (
  `id_personas` int(11) NOT NULL,
  `identificacion_per` bigint(20) DEFAULT NULL,
  `nombre_per` varchar(100) DEFAULT NULL,
  `apellido_per` varchar(100) DEFAULT NULL,
  `direccion_per` varchar(45) DEFAULT NULL,
  `telefono_per` varchar(45) DEFAULT NULL,
  `email` varchar(45) DEFAULT NULL,
  `Tipo` varchar(45) DEFAULT NULL,
  `especialidades_id_especialidades` int(11) NOT NULL,
  `mascota_id_mascota` int(11) NOT NULL,
  `Tipo identificacion_idTipo identificacion` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `personas_has_historial`
--

CREATE TABLE `personas_has_historial` (
  `personas_id_personas` int(11) NOT NULL,
  `historial_idhistorial` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `receta`
--

CREATE TABLE `receta` (
  `idReceta` int(11) NOT NULL,
  `tipo_medicina` varchar(45) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `registered_users`
--

CREATE TABLE `registered_users` (
  `id` int(8) NOT NULL,
  `user_name` varchar(255) NOT NULL,
  `display_name` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `usuarios_id_personas` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `registered_users`
--

INSERT INTO `registered_users` (`id`, `user_name`, `display_name`, `password`, `email`, `usuarios_id_personas`) VALUES
(4, 'prueba', 'prueba', 'c893bad68927b457dbed39460e6afd62', 'prueba@prueba.com', '');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tipo_identificacion`
--

CREATE TABLE `tipo_identificacion` (
  `idtipo_identificacion` int(11) NOT NULL,
  `tipo_identificacion` varchar(45) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `tipo_identificacion`
--

INSERT INTO `tipo_identificacion` (`idtipo_identificacion`, `tipo_identificacion`) VALUES
(1, 'Cédula de Ciudadanía'),
(2, 'Tarjeta de identificación');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `usuarios`
--

CREATE TABLE `usuarios` (
  `idusuarios` int(11) NOT NULL,
  `nombre_usuario` varchar(45) DEFAULT NULL,
  `password` varchar(100) DEFAULT NULL,
  `personas_id_personas` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `especialidades`
--
ALTER TABLE `especialidades`
  ADD PRIMARY KEY (`id_especialidades`);

--
-- Indices de la tabla `historial`
--
ALTER TABLE `historial`
  ADD PRIMARY KEY (`idhistorial`),
  ADD KEY `receta` (`Receta_idReceta`),
  ADD KEY `mascota_id_mascota` (`mascota_id_mascota`);

--
-- Indices de la tabla `mascota`
--
ALTER TABLE `mascota`
  ADD PRIMARY KEY (`id_mascota`);

--
-- Indices de la tabla `mascota_has_personas`
--
ALTER TABLE `mascota_has_personas`
  ADD PRIMARY KEY (`mascota_id_mascota`,`personas_id_personas`),
  ADD KEY `personas_id_personas` (`personas_id_personas`);

--
-- Indices de la tabla `personas`
--
ALTER TABLE `personas`
  ADD PRIMARY KEY (`id_personas`),
  ADD KEY `fk_especialidades` (`especialidades_id_especialidades`),
  ADD KEY `mascota` (`mascota_id_mascota`),
  ADD KEY `tipo_identificacion` (`Tipo identificacion_idTipo identificacion`);

--
-- Indices de la tabla `personas_has_historial`
--
ALTER TABLE `personas_has_historial`
  ADD PRIMARY KEY (`personas_id_personas`,`historial_idhistorial`),
  ADD KEY `historial_idhistorial` (`historial_idhistorial`) USING BTREE;

--
-- Indices de la tabla `receta`
--
ALTER TABLE `receta`
  ADD PRIMARY KEY (`idReceta`);

--
-- Indices de la tabla `registered_users`
--
ALTER TABLE `registered_users`
  ADD PRIMARY KEY (`id`),
  ADD KEY `usuarios_id_personas` (`usuarios_id_personas`);

--
-- Indices de la tabla `tipo_identificacion`
--
ALTER TABLE `tipo_identificacion`
  ADD PRIMARY KEY (`idtipo_identificacion`);

--
-- Indices de la tabla `usuarios`
--
ALTER TABLE `usuarios`
  ADD PRIMARY KEY (`idusuarios`),
  ADD KEY `personas_id_personas` (`personas_id_personas`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `especialidades`
--
ALTER TABLE `especialidades`
  MODIFY `id_especialidades` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT de la tabla `historial`
--
ALTER TABLE `historial`
  MODIFY `idhistorial` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT de la tabla `mascota`
--
ALTER TABLE `mascota`
  MODIFY `id_mascota` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT de la tabla `personas`
--
ALTER TABLE `personas`
  MODIFY `id_personas` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT de la tabla `receta`
--
ALTER TABLE `receta`
  MODIFY `idReceta` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT de la tabla `registered_users`
--
ALTER TABLE `registered_users`
  MODIFY `id` int(8) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT de la tabla `tipo_identificacion`
--
ALTER TABLE `tipo_identificacion`
  MODIFY `idtipo_identificacion` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT de la tabla `usuarios`
--
ALTER TABLE `usuarios`
  MODIFY `idusuarios` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- Restricciones para tablas volcadas
--

--
-- Filtros para la tabla `historial`
--
ALTER TABLE `historial`
  ADD CONSTRAINT `mascota_id_mascota` FOREIGN KEY (`mascota_id_mascota`) REFERENCES `mascota` (`id_mascota`) ON UPDATE CASCADE,
  ADD CONSTRAINT `receta` FOREIGN KEY (`Receta_idReceta`) REFERENCES `receta` (`idReceta`) ON UPDATE CASCADE;

--
-- Filtros para la tabla `mascota_has_personas`
--
ALTER TABLE `mascota_has_personas`
  ADD CONSTRAINT `mascota_id_mascota	` FOREIGN KEY (`mascota_id_mascota`) REFERENCES `mascota` (`id_mascota`) ON UPDATE CASCADE,
  ADD CONSTRAINT `personas_id_personas` FOREIGN KEY (`personas_id_personas`) REFERENCES `personas` (`id_personas`) ON UPDATE CASCADE;

--
-- Filtros para la tabla `personas`
--
ALTER TABLE `personas`
  ADD CONSTRAINT `especialidades` FOREIGN KEY (`especialidades_id_especialidades`) REFERENCES `especialidades` (`id_especialidades`) ON UPDATE CASCADE,
  ADD CONSTRAINT `mascota` FOREIGN KEY (`mascota_id_mascota`) REFERENCES `mascota` (`id_mascota`) ON UPDATE CASCADE,
  ADD CONSTRAINT `tipo_identificacion` FOREIGN KEY (`Tipo identificacion_idTipo identificacion`) REFERENCES `tipo_identificacion` (`idtipo_identificacion`);

--
-- Filtros para la tabla `personas_has_historial`
--
ALTER TABLE `personas_has_historial`
  ADD CONSTRAINT `historial_idhistorial` FOREIGN KEY (`historial_idhistorial`) REFERENCES `historial` (`idhistorial`) ON UPDATE CASCADE,
  ADD CONSTRAINT `personas` FOREIGN KEY (`personas_id_personas`) REFERENCES `personas` (`id_personas`) ON UPDATE CASCADE;

--
-- Filtros para la tabla `usuarios`
--
ALTER TABLE `usuarios`
  ADD CONSTRAINT `usuarios_ibfk_1` FOREIGN KEY (`personas_id_personas`) REFERENCES `personas` (`id_personas`) ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
