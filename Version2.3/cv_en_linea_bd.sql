-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 28-06-2024 a las 08:26:58
-- Versión del servidor: 10.4.28-MariaDB
-- Versión de PHP: 8.2.4

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

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `alergias`
--

CREATE TABLE `alergias` (
  `id` int(11) NOT NULL,
  `ale` varchar(20) NOT NULL,
  `tale` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `alergias`
--

INSERT INTO `alergias` (`id`, `ale`, `tale`) VALUES
(6, 'no', 'ninguna'),
(7, 'no', 'ninguna'),
(8, 'e', 'e'),
(9, 'e', 'e'),
(10, 'e', 'e');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `contacto`
--

CREATE TABLE `contacto` (
  `ID` int(11) NOT NULL,
  `contacto` varchar(20) NOT NULL,
  `tipo` varchar(20) NOT NULL,
  `fecha` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `contacto`
--

INSERT INTO `contacto` (`ID`, `contacto`, `tipo`, `fecha`) VALUES
(3, 'si', 'Telefonico', '27/06/24'),
(4, 'si', 'Telefonico', '27/06/24'),
(5, 'e', 'e', '28/06/24'),
(6, 'e', 'e', '28/06/24'),
(7, 'e', 'e', '28/06/24');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `datosmedicos`
--

CREATE TABLE `datosmedicos` (
  `id` int(11) NOT NULL,
  `name` varchar(20) NOT NULL,
  `tipos` varchar(20) NOT NULL,
  `peso` int(20) NOT NULL,
  `altura` int(20) NOT NULL,
  `telefono` int(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `datosmedicos`
--

INSERT INTO `datosmedicos` (`id`, `name`, `tipos`, `peso`, `altura`, `telefono`) VALUES
(1, 'Anime', 'O', 12, 12, 12),
(2, '3', 'e', 1, 1, 1),
(3, '3', 'e', 1, 1, 1),
(4, '3', 'e', 1, 1, 1);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `exp_profesional`
--

CREATE TABLE `exp_profesional` (
  `id` int(11) NOT NULL,
  `cargo` varchar(20) NOT NULL,
  `descripcion` varchar(100) NOT NULL,
  `inicio` int(20) NOT NULL,
  `fin` int(20) NOT NULL,
  `empresa` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `exp_profesional`
--

INSERT INTO `exp_profesional` (`id`, `cargo`, `descripcion`, `inicio`, `fin`, `empresa`) VALUES
(1, 'chocolatero', 'Hacia chocolate', 12, 12, 'carlos6'),
(2, 'e', 'e', 1, 1, 'e'),
(3, 'e', 'e', 1, 1, 'e'),
(4, 'e', 'e', 1, 1, 'e');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `formacademica`
--

CREATE TABLE `formacademica` (
  `id` int(11) NOT NULL,
  `carrera` varchar(20) NOT NULL,
  `inicioc` int(20) NOT NULL,
  `finc` int(20) NOT NULL,
  `descr` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `formacademica`
--

INSERT INTO `formacademica` (`id`, `carrera`, `inicioc`, `finc`, `descr`) VALUES
(1, 'chefsito', 12, 12, 'chefsear'),
(2, 'r', 1, 1, 'r'),
(3, 'r', 1, 1, 'r'),
(4, 'r', 1, 1, 'r');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `habilidades`
--

CREATE TABLE `habilidades` (
  `id` int(11) NOT NULL,
  `habilidad` varchar(50) NOT NULL,
  `nivel` varchar(20) NOT NULL,
  `descripcion` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `habilidades`
--

INSERT INTO `habilidades` (`id`, `habilidad`, `nivel`, `descripcion`) VALUES
(1, 'todas', 'maxima', 'en otro momento'),
(2, 'r', 'r', 'r'),
(3, 'r', 'r', 'r'),
(4, 'r', 'r', 'r');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `imagenes`
--

CREATE TABLE `imagenes` (
  `id` int(11) NOT NULL,
  `nombre_imagen` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `logros`
--

CREATE TABLE `logros` (
  `id` int(11) NOT NULL,
  `titulo` varchar(20) NOT NULL,
  `año` int(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `logros`
--

INSERT INTO `logros` (`id`, `titulo`, `año`) VALUES
(1, 'chefcito supremo', 12),
(2, 'r', 1),
(3, 'r', 1),
(4, 'r', 1);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `pasatiempos`
--

CREATE TABLE `pasatiempos` (
  `id` int(11) NOT NULL,
  `nombre` varchar(20) NOT NULL,
  `descripcion` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `pasatiempos`
--

INSERT INTO `pasatiempos` (`id`, `nombre`, `descripcion`) VALUES
(1, '12', 'rt'),
(2, 'r', 'r'),
(3, 'r', 'r'),
(4, 'r', 'r');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `portafolio`
--

CREATE TABLE `portafolio` (
  `id` int(11) NOT NULL,
  `profesion` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `portafolio`
--

INSERT INTO `portafolio` (`id`, `profesion`) VALUES
(1, 'tre'),
(2, 'r'),
(3, 'r'),
(4, 'r');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `r`
--

CREATE TABLE `r` (
  `id` int(11) NOT NULL,
  `name` varchar(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `r`
--

INSERT INTO `r` (`id`, `name`) VALUES
(14, 'Anime');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `reclutador`
--

CREATE TABLE `reclutador` (
  `id` int(11) NOT NULL,
  `cargo` varchar(20) NOT NULL,
  `empresa` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `reclutador`
--

INSERT INTO `reclutador` (`id`, `cargo`, `empresa`) VALUES
(1, 'erty', 'erth'),
(2, 'r', 'r'),
(3, 'r', 'r'),
(4, 'r', 'r');

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
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `usuarios`
--

INSERT INTO `usuarios` (`id_usuario`, `nombre_completo`, `correo`, `usuario`, `contrasena`) VALUES
(1, 'ty', 'ryu@gmail.com', 'uyt', 'b7fd2f91600ffe737dfdce7937fbbaa6038b091d6f8a1ef57198dc7e3ee359b1abb3b044ea3dd95d3ffffbcca98fe20db8745965dca24475aa69786cf5995c60');

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `alergias`
--
ALTER TABLE `alergias`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `contacto`
--
ALTER TABLE `contacto`
  ADD PRIMARY KEY (`ID`);

--
-- Indices de la tabla `datosmedicos`
--
ALTER TABLE `datosmedicos`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `exp_profesional`
--
ALTER TABLE `exp_profesional`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `formacademica`
--
ALTER TABLE `formacademica`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `habilidades`
--
ALTER TABLE `habilidades`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `imagenes`
--
ALTER TABLE `imagenes`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `logros`
--
ALTER TABLE `logros`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `pasatiempos`
--
ALTER TABLE `pasatiempos`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `portafolio`
--
ALTER TABLE `portafolio`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `r`
--
ALTER TABLE `r`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `reclutador`
--
ALTER TABLE `reclutador`
  ADD PRIMARY KEY (`id`);

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
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT de la tabla `contacto`
--
ALTER TABLE `contacto`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT de la tabla `datosmedicos`
--
ALTER TABLE `datosmedicos`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT de la tabla `exp_profesional`
--
ALTER TABLE `exp_profesional`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT de la tabla `formacademica`
--
ALTER TABLE `formacademica`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT de la tabla `habilidades`
--
ALTER TABLE `habilidades`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT de la tabla `imagenes`
--
ALTER TABLE `imagenes`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `logros`
--
ALTER TABLE `logros`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT de la tabla `pasatiempos`
--
ALTER TABLE `pasatiempos`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT de la tabla `portafolio`
--
ALTER TABLE `portafolio`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT de la tabla `r`
--
ALTER TABLE `r`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- AUTO_INCREMENT de la tabla `reclutador`
--
ALTER TABLE `reclutador`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT de la tabla `usuarios`
--
ALTER TABLE `usuarios`
  MODIFY `id_usuario` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
