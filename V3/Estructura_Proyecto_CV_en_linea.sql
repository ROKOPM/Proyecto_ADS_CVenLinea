-- phpMyAdmin SQL Dump
-- version 5.0.2
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 23-06-2024 a las 03:30:26
-- Versión del servidor: 10.4.11-MariaDB
-- Versión de PHP: 7.4.6

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `cv_en_linea_bd`
--
CREATE DATABASE IF NOT EXISTS `cv_en_linea_bd` DEFAULT CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci;
USE `cv_en_linea_bd`;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `alergias`
--

CREATE TABLE `alergias` (
  `id_alergia` int(11) NOT NULL,
  `nombre` int(11) NOT NULL,
  `id_datosmedicos` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `contacto`
--

CREATE TABLE `contacto` (
  `id_contacto` int(11) NOT NULL,
  `tipo` varchar(20) NOT NULL,
  `contacto` text NOT NULL,
  `id_profesionista` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `datosmedicos`
--

CREATE TABLE `datosmedicos` (
  `id_profesionista` int(11) NOT NULL,
  `tipo_sangre` int(11) NOT NULL,
  `peso` int(11) NOT NULL,
  `altura` int(11) NOT NULL,
  `CE_nombre` varchar(100) NOT NULL,
  `CE_telefono` int(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `exp_profesional`
--

CREATE TABLE `exp_profesional` (
  `id_experiencia` int(11) NOT NULL,
  `empresa` varchar(100) NOT NULL,
  `cargo` varchar(100) NOT NULL,
  `descripcion` text DEFAULT NULL,
  `inicio` year(4) NOT NULL,
  `fin` year(4) NOT NULL,
  `id_portafolio` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `formacademica`
--

CREATE TABLE `formacademica` (
  `id_Academica` int(11) NOT NULL,
  `Nombre` int(11) NOT NULL,
  `Carrera` int(11) NOT NULL,
  `Inicio` year(4) NOT NULL,
  `Fin` year(4) NOT NULL,
  `Descripcion` text DEFAULT NULL,
  `id_portafolio` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `habilidades`
--

CREATE TABLE `habilidades` (
  `id_habilidad` int(11) NOT NULL,
  `habilidad` varchar(100) DEFAULT NULL,
  `nivel` varchar(20) NOT NULL,
  `descripcion` text NOT NULL,
  `id_portafolio` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `imagenes`
--

CREATE TABLE `imagenes` (
  `id_imagen` int(11) NOT NULL,
  `titulo` varchar(100) NOT NULL,
  `fecha_subida` datetime NOT NULL,
  `archivo` blob NOT NULL,
  `descripcion` int(11) DEFAULT NULL,
  `id_portafolio` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `logros`
--

CREATE TABLE `logros` (
  `id_logro` int(11) NOT NULL,
  `titulo` varchar(200) NOT NULL,
  `año` int(4) NOT NULL,
  `descripcion` text DEFAULT NULL,
  `id_portafolio` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `mensajes`
--

CREATE TABLE `mensajes` (
  `id_mensaje` int(11) NOT NULL,
  `id_destinatario` int(11) NOT NULL,
  `id_remitente` int(11) NOT NULL,
  `titulo` varchar(100) NOT NULL,
  `mensaje` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `pasatiempos`
--

CREATE TABLE `pasatiempos` (
  `id_pasatiempos` int(11) NOT NULL,
  `nombre` varchar(100) NOT NULL,
  `descripcion` text DEFAULT NULL,
  `id_portafolio` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `portafolio`
--

CREATE TABLE `portafolio` (
  `id_portafolio` int(11) NOT NULL,
  `id_profesionista` int(11) NOT NULL,
  `profesion` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `reclutador`
--

CREATE TABLE `reclutador` (
  `id_reclutador` int(11) NOT NULL,
  `nombre` varchar(100) NOT NULL,
  `cargo` varchar(100) DEFAULT NULL,
  `empresa` varchar(200) DEFAULT NULL,
  `correo` varchar(200) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `usuarios`
--

CREATE TABLE `usuarios` (
  `id_usuario` int(11) NOT NULL,
  `nombre_completo` varchar(50) NOT NULL,
  `correo` varchar(100) NOT NULL,
  `usuario` varchar(50) NOT NULL,
  `contrasena` varchar(129) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `alergias`
--
ALTER TABLE `alergias`
  ADD PRIMARY KEY (`id_alergia`),
  ADD KEY `datosmedicos_alergias` (`id_datosmedicos`);

--
-- Indices de la tabla `contacto`
--
ALTER TABLE `contacto`
  ADD PRIMARY KEY (`id_contacto`),
  ADD KEY `profesionista_contacto` (`id_profesionista`);

--
-- Indices de la tabla `datosmedicos`
--
ALTER TABLE `datosmedicos`
  ADD PRIMARY KEY (`id_profesionista`);

--
-- Indices de la tabla `exp_profesional`
--
ALTER TABLE `exp_profesional`
  ADD PRIMARY KEY (`id_experiencia`),
  ADD KEY `expprofesional_profesionista` (`id_portafolio`);

--
-- Indices de la tabla `formacademica`
--
ALTER TABLE `formacademica`
  ADD PRIMARY KEY (`id_Academica`),
  ADD KEY `portafolio_formacademica` (`id_portafolio`);

--
-- Indices de la tabla `habilidades`
--
ALTER TABLE `habilidades`
  ADD PRIMARY KEY (`id_habilidad`),
  ADD KEY `portafolio_habilidades` (`id_portafolio`);

--
-- Indices de la tabla `imagenes`
--
ALTER TABLE `imagenes`
  ADD PRIMARY KEY (`id_imagen`),
  ADD KEY `portafolio_imagen` (`id_portafolio`);

--
-- Indices de la tabla `logros`
--
ALTER TABLE `logros`
  ADD PRIMARY KEY (`id_logro`),
  ADD KEY `portafolio_logros` (`id_portafolio`);

--
-- Indices de la tabla `mensajes`
--
ALTER TABLE `mensajes`
  ADD PRIMARY KEY (`id_mensaje`),
  ADD KEY `de_profesionista` (`id_remitente`),
  ADD KEY `a_reclutador` (`id_destinatario`);

--
-- Indices de la tabla `pasatiempos`
--
ALTER TABLE `pasatiempos`
  ADD PRIMARY KEY (`id_pasatiempos`),
  ADD KEY `portafolio_pasatiempos` (`id_portafolio`);

--
-- Indices de la tabla `portafolio`
--
ALTER TABLE `portafolio`
  ADD PRIMARY KEY (`id_portafolio`),
  ADD KEY `usuario_portafolio` (`id_profesionista`);

--
-- Indices de la tabla `reclutador`
--
ALTER TABLE `reclutador`
  ADD PRIMARY KEY (`id_reclutador`);

--
-- Indices de la tabla `usuarios`
--
ALTER TABLE `usuarios`
  ADD PRIMARY KEY (`id_usuario`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `alergias`
--
ALTER TABLE `alergias`
  MODIFY `id_alergia` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `contacto`
--
ALTER TABLE `contacto`
  MODIFY `id_contacto` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `exp_profesional`
--
ALTER TABLE `exp_profesional`
  MODIFY `id_experiencia` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `formacademica`
--
ALTER TABLE `formacademica`
  MODIFY `id_Academica` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `habilidades`
--
ALTER TABLE `habilidades`
  MODIFY `id_habilidad` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `imagenes`
--
ALTER TABLE `imagenes`
  MODIFY `id_imagen` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `logros`
--
ALTER TABLE `logros`
  MODIFY `id_logro` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `mensajes`
--
ALTER TABLE `mensajes`
  MODIFY `id_mensaje` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `pasatiempos`
--
ALTER TABLE `pasatiempos`
  MODIFY `id_pasatiempos` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `usuarios`
--
ALTER TABLE `usuarios`
  MODIFY `id_usuario` int(11) NOT NULL AUTO_INCREMENT;

--
-- Restricciones para tablas volcadas
--

--
-- Filtros para la tabla `alergias`
--
ALTER TABLE `alergias`
  ADD CONSTRAINT `datosmedicos_alergias` FOREIGN KEY (`id_datosmedicos`) REFERENCES `datosmedicos` (`id_profesionista`);

--
-- Filtros para la tabla `contacto`
--
ALTER TABLE `contacto`
  ADD CONSTRAINT `profesionista_contacto` FOREIGN KEY (`id_profesionista`) REFERENCES `portafolio` (`id_profesionista`);

--
-- Filtros para la tabla `datosmedicos`
--
ALTER TABLE `datosmedicos`
  ADD CONSTRAINT `profesionista_datosmedicos` FOREIGN KEY (`id_profesionista`) REFERENCES `portafolio` (`id_profesionista`);

--
-- Filtros para la tabla `exp_profesional`
--
ALTER TABLE `exp_profesional`
  ADD CONSTRAINT `expprofesional_profesionista` FOREIGN KEY (`id_portafolio`) REFERENCES `portafolio` (`id_portafolio`);

--
-- Filtros para la tabla `formacademica`
--
ALTER TABLE `formacademica`
  ADD CONSTRAINT `portafolio_formacademica` FOREIGN KEY (`id_portafolio`) REFERENCES `portafolio` (`id_portafolio`);

--
-- Filtros para la tabla `habilidades`
--
ALTER TABLE `habilidades`
  ADD CONSTRAINT `portafolio_habilidades` FOREIGN KEY (`id_portafolio`) REFERENCES `portafolio` (`id_portafolio`);

--
-- Filtros para la tabla `imagenes`
--
ALTER TABLE `imagenes`
  ADD CONSTRAINT `portafolio_imagen` FOREIGN KEY (`id_portafolio`) REFERENCES `portafolio` (`id_portafolio`);

--
-- Filtros para la tabla `logros`
--
ALTER TABLE `logros`
  ADD CONSTRAINT `portafolio_logros` FOREIGN KEY (`id_portafolio`) REFERENCES `portafolio` (`id_portafolio`);

--
-- Filtros para la tabla `mensajes`
--
ALTER TABLE `mensajes`
  ADD CONSTRAINT `a_profesionista` FOREIGN KEY (`id_destinatario`) REFERENCES `portafolio` (`id_profesionista`),
  ADD CONSTRAINT `a_reclutador` FOREIGN KEY (`id_destinatario`) REFERENCES `reclutador` (`id_reclutador`),
  ADD CONSTRAINT `de_profesionista` FOREIGN KEY (`id_remitente`) REFERENCES `portafolio` (`id_profesionista`),
  ADD CONSTRAINT `de_reclutador` FOREIGN KEY (`id_remitente`) REFERENCES `reclutador` (`id_reclutador`);

--
-- Filtros para la tabla `pasatiempos`
--
ALTER TABLE `pasatiempos`
  ADD CONSTRAINT `portafolio_pasatiempos` FOREIGN KEY (`id_portafolio`) REFERENCES `portafolio` (`id_portafolio`);

--
-- Filtros para la tabla `portafolio`
--
ALTER TABLE `portafolio`
  ADD CONSTRAINT `usuario_portafolio` FOREIGN KEY (`id_profesionista`) REFERENCES `usuarios` (`id_usuario`);

--
-- Filtros para la tabla `reclutador`
--
ALTER TABLE `reclutador`
  ADD CONSTRAINT `usuario_reclutador` FOREIGN KEY (`id_reclutador`) REFERENCES `usuarios` (`id_usuario`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
