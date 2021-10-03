-- phpMyAdmin SQL Dump
-- version 5.1.0
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 03-10-2021 a las 20:33:54
-- Versión del servidor: 10.4.18-MariaDB
-- Versión de PHP: 8.0.3

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `concursosofka`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `categorias`
--

CREATE TABLE `categorias` (
  `idCategoria` int(11) NOT NULL,
  `nombreCategoria` varchar(45) NOT NULL,
  `puntos` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `categorias`
--

INSERT INTO `categorias` (`idCategoria`, `nombreCategoria`, `puntos`) VALUES
(1, 'Muy fácil', 10),
(2, 'Fácil', 15),
(3, 'Intermedio', 20),
(4, 'Difícil', 25),
(5, 'Muy difícil', 30);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `preguntas`
--

CREATE TABLE `preguntas` (
  `idPregunta` int(11) NOT NULL,
  `idCategoria` int(11) NOT NULL,
  `pregunta` varchar(500) NOT NULL,
  `numPregunta` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `preguntas`
--

INSERT INTO `preguntas` (`idPregunta`, `idCategoria`, `pregunta`, `numPregunta`) VALUES
(1, 1, '¿Resultado de 3+6-4?', 1),
(2, 1, '¿Resultado de -4-5+10', 2),
(3, 1, '¿Resultado de 2+2-1', 3),
(4, 1, '¿Resultado de 9+2-0+5?', 4),
(5, 1, '¿Resultado de 1+1?', 5),
(6, 1, '¿Resultado de 7+8?', 6),
(7, 1, '¿Resultado de 6-2+5?', 7),
(8, 2, '¿Resultado de 5x3?', 1),
(9, 2, '¿Resultado de 6x2?', 2),
(10, 2, '¿Resultado de 2x2x2?', 3),
(11, 2, '¿Resultado 4x2x2?', 4),
(12, 2, '¿Resultado de 2x3x2?', 5),
(13, 2, '¿Resultado de 5x3x2?', 6),
(14, 2, '¿Resultado de 2x4?', 7),
(15, 3, '¿Resultado de 2/2?', 1),
(16, 3, '¿Resultado de 42/7?', 2),
(17, 3, '¿Resultado de 15/5?', 3),
(18, 3, '¿Resultado de 110/11?', 4),
(19, 3, '¿Resultado de 1/0?', 5),
(20, 3, '¿Resultado de 63/3?', 6),
(21, 3, '¿Resultado de 65/5?', 7),
(22, 3, '¿Resultado de 54/6?', 8),
(23, 4, '¿Resultado de 2(2+2)?', 1),
(24, 4, '¿Resultado de 3(1/0)?', 2),
(25, 4, '¿Resultado de 5(1+2+3)?', 3),
(26, 4, '¿Resultado de 3(4/0)?', 4),
(27, 4, '¿Resultado de 1(2+2)', 5),
(28, 4, '¿Resultado de 6(0/1)?', 6),
(29, 4, '¿Resultado de 8(2*2);', 7),
(30, 5, '¿Resultado de 2(1/2)(1+1)?', 1),
(31, 5, '¿Resultado de 2(10/2) (5+5)?', 2),
(32, 5, '¿Resultado de 4(2/2)(1/0)?', 3),
(33, 5, '¿Resultado de 4(2/2)(1/0)?', 4),
(34, 5, '¿Resultado de 6(2+2)(-1+5-4)?', 5),
(35, 5, '¿Resultado de 1^120', 6),
(36, 5, '¿Resultado de 0^2?', 7);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `respuestas`
--

CREATE TABLE `respuestas` (
  `idRespuesta` int(11) NOT NULL,
  `idPregunta` int(11) NOT NULL,
  `respuesta` varchar(255) NOT NULL,
  `correcta` tinyint(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `respuestas`
--

INSERT INTO `respuestas` (`idRespuesta`, `idPregunta`, `respuesta`, `correcta`) VALUES
(1, 1, '5', 1),
(2, 1, '6', 0),
(3, 1, '8', 0),
(4, 1, '4', 0),
(5, 2, '19', 0),
(6, 2, '-9', 0),
(7, 2, '10', 0),
(8, 2, '1', 1),
(9, 3, '4', 0),
(10, 3, '3', 1),
(11, 3, '2', 0),
(12, 3, '1', 0),
(13, 4, '16', 1),
(14, 4, '14', 0),
(15, 4, '6', 0),
(16, 4, '9205', 0),
(17, 5, '2', 1),
(18, 5, '3', 0),
(19, 5, '1', 0),
(20, 5, '0', 0),
(21, 6, '16', 0),
(22, 6, '14', 0),
(23, 6, '15', 1),
(24, 6, '20', 0),
(25, 7, '9', 1),
(26, 7, '8', 0),
(27, 7, '6', 0),
(28, 7, '4', 0),
(29, 8, '15', 1),
(30, 8, '20', 0),
(31, 8, '10', 0),
(32, 8, '12', 0),
(33, 9, '12', 1),
(34, 9, '9', 0),
(35, 9, '62', 0),
(36, 9, '8', 0),
(37, 10, '6', 0),
(38, 10, '4', 0),
(39, 10, '8', 1),
(40, 10, '10', 0),
(41, 11, '8', 0),
(42, 11, '422', 0),
(43, 11, '44', 0),
(44, 11, '16', 1),
(45, 12, '6', 0),
(46, 12, '12', 1),
(47, 12, '8', 0),
(48, 12, '7', 0),
(49, 13, '10', 0),
(50, 13, '30', 1),
(51, 13, '17', 0),
(52, 13, '15', 0),
(53, 14, '4', 0),
(54, 14, '8', 1),
(55, 14, '6', 0),
(56, 14, '24', 0),
(57, 15, '1', 1),
(58, 15, '2', 0),
(59, 15, '4', 0),
(60, 15, 'Ninguna es correcta', 0),
(61, 16, '6', 1),
(62, 16, '49', 0),
(63, 16, '3', 0),
(64, 16, 'Ninguna es correcta', 0),
(65, 17, '3', 1),
(66, 17, '20', 0),
(67, 17, '5', 0),
(68, 17, '10', 0),
(69, 18, '10', 1),
(70, 18, '121', 0),
(71, 18, '99', 0),
(72, 18, 'Ninguna es correcta', 0),
(73, 19, '1', 0),
(74, 19, '0', 0),
(75, 19, '10', 0),
(76, 19, 'Ninguna es correcta', 1),
(77, 20, '21', 1),
(78, 20, '66', 0),
(79, 20, '63', 0),
(80, 20, '11', 0),
(81, 21, '13', 1),
(82, 21, '70', 0),
(83, 21, '60', 0),
(84, 21, '10', 0),
(85, 22, '9', 1),
(86, 22, '60', 0),
(87, 22, '5', 0),
(88, 22, 'Ninguna es correcta', 0),
(89, 23, '8', 1),
(90, 23, '6', 0),
(91, 23, '4', 0),
(92, 23, '2', 0),
(93, 24, '0', 0),
(94, 24, '3', 0),
(95, 24, 'Ninguna es correcta', 1),
(96, 24, '1', 0),
(97, 25, '11', 0),
(98, 25, '30', 1),
(99, 25, '1', 0),
(100, 25, 'Ninguna es correcta', 0),
(101, 26, '0', 0),
(102, 26, '12', 0),
(103, 26, 'Indeterminado', 1),
(104, 26, 'Ninguna es correcta', 0),
(105, 27, '4', 1),
(106, 27, '8', 0),
(107, 27, '2', 0),
(108, 27, 'Ninguna es correcta', 0),
(109, 28, '0', 1),
(110, 28, '6', 0),
(111, 28, 'Indeterminado', 0),
(112, 28, 'Ninguna es correcta', 0),
(113, 29, '24', 1),
(114, 29, '16', 0),
(115, 29, '8', 0),
(116, 29, 'Ninguna es correcta', 0),
(117, 30, '1', 0),
(118, 30, '2', 1),
(119, 30, '0', 0),
(120, 30, 'Ninguna es correcta', 0),
(121, 31, '100', 1),
(122, 31, '10', 0),
(123, 31, '15', 0),
(124, 31, '20', 0),
(125, 32, 'Indeterminado', 1),
(126, 32, '0', 0),
(127, 32, '4', 0),
(128, 32, 'Ninguna es correcta', 0),
(129, 33, 'Indeterminado', 0),
(130, 33, '4', 0),
(131, 33, '0', 1),
(132, 33, 'Ninguna es correcta', 0),
(133, 34, '0', 1),
(134, 34, '240', 0),
(135, 34, '24', 0),
(136, 34, 'Ninguna es correcta', 0),
(137, 35, '120', 0),
(138, 35, '1', 1),
(139, 35, '0', 0),
(140, 35, '1120', 0),
(141, 36, '0', 1),
(142, 36, '2', 0),
(143, 36, '1', 0),
(144, 36, 'Ninguna es correcta', 0);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `usuarios`
--

CREATE TABLE `usuarios` (
  `idUsuario` int(11) NOT NULL,
  `nombreUsuario` varchar(45) NOT NULL,
  `correo` varchar(45) NOT NULL,
  `contrasena` varchar(45) NOT NULL,
  `admin` tinyint(1) NOT NULL,
  `puntosUsuario` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `usuarios`
--

INSERT INTO `usuarios` (`idUsuario`, `nombreUsuario`, `correo`, `contrasena`, `admin`, `puntosUsuario`) VALUES
(1, 'Administrador', 'admin@admin.com', 'admin2021', 1, 0),
(2, 'Usuario prueba', 'usuario@usuario.com', 'usuario2021', 0, 0);

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `categorias`
--
ALTER TABLE `categorias`
  ADD PRIMARY KEY (`idCategoria`);

--
-- Indices de la tabla `preguntas`
--
ALTER TABLE `preguntas`
  ADD PRIMARY KEY (`idPregunta`),
  ADD KEY `fk_idCategoria` (`idCategoria`);

--
-- Indices de la tabla `respuestas`
--
ALTER TABLE `respuestas`
  ADD PRIMARY KEY (`idRespuesta`),
  ADD KEY `fk_idPregunta` (`idPregunta`);

--
-- Indices de la tabla `usuarios`
--
ALTER TABLE `usuarios`
  ADD PRIMARY KEY (`idUsuario`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `categorias`
--
ALTER TABLE `categorias`
  MODIFY `idCategoria` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT de la tabla `preguntas`
--
ALTER TABLE `preguntas`
  MODIFY `idPregunta` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=37;

--
-- AUTO_INCREMENT de la tabla `respuestas`
--
ALTER TABLE `respuestas`
  MODIFY `idRespuesta` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=145;

--
-- AUTO_INCREMENT de la tabla `usuarios`
--
ALTER TABLE `usuarios`
  MODIFY `idUsuario` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- Restricciones para tablas volcadas
--

--
-- Filtros para la tabla `preguntas`
--
ALTER TABLE `preguntas`
  ADD CONSTRAINT `fk_idCategoria` FOREIGN KEY (`idCategoria`) REFERENCES `categorias` (`idCategoria`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Filtros para la tabla `respuestas`
--
ALTER TABLE `respuestas`
  ADD CONSTRAINT `fk_idRespuesta` FOREIGN KEY (`idPregunta`) REFERENCES `preguntas` (`idPregunta`) ON DELETE NO ACTION ON UPDATE NO ACTION;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
