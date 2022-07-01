-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 01-07-2022 a las 17:31:08
-- Versión del servidor: 10.4.24-MariaDB
-- Versión de PHP: 7.4.29

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `registronotas`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `curso`
--

CREATE TABLE `curso` (
  `IdCurso` int(11) NOT NULL,
  `Nombre` varchar(100) DEFAULT NULL,
  `Descripcion` varchar(100) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `curso`
--

INSERT INTO `curso` (`IdCurso`, `Nombre`, `Descripcion`) VALUES
(1, 'Matematica', 'Ingenieria'),
(2, 'Sociologia', 'Humanidades'),
(3, 'Anatomia ', 'Anatomia Humana Medicina'),
(4, 'Finanzas publicas', ' Ciencias Economicas'),
(5, 'Derecho Civil I', 'Jurisprudencia'),
(6, 'Derecho Penal', 'Jurisprudencia'),
(7, 'Microprogramacion', 'Ingenieria en Sistemas'),
(8, 'Sistemas Operativos', 'Ingenieria en Sistemas'),
(10, 'Desarrollo Web I', 'Ingenieria en Sistemas');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `estudiante`
--

CREATE TABLE `estudiante` (
  `IdEstudiante` int(11) NOT NULL,
  `Nombre` varchar(50) DEFAULT NULL,
  `Correo` varchar(50) DEFAULT NULL,
  `Telefono` int(8) DEFAULT NULL,
  `FechaIngreso` date DEFAULT NULL,
  `Estado` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `estudiante`
--

INSERT INTO `estudiante` (`IdEstudiante`, `Nombre`, `Correo`, `Telefono`, `FechaIngreso`, `Estado`) VALUES
(1, 'Daniela Castro', 'Daniela@hotmail.com', 78526398, '2022-06-04', 1),
(2, 'Juan Carlos Gomez', 'Juanca63@gmail.com', 78635241, '2022-06-19', 1),
(3, 'Juliana Cruz', 'July63@gmail.com', 78362589, '2022-06-19', 1);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `nota`
--

CREATE TABLE `nota` (
  `IdNota` int(11) NOT NULL,
  `Nota1` varchar(50) DEFAULT NULL,
  `Nota2` varchar(50) DEFAULT NULL,
  `Nota3` varchar(50) DEFAULT NULL,
  `IdEstudiante` int(11) DEFAULT NULL,
  `IdCurso` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `nota`
--

INSERT INTO `nota` (`IdNota`, `Nota1`, `Nota2`, `Nota3`, `IdEstudiante`, `IdCurso`) VALUES
(1, '7', '7', '8', 1, 1),
(2, '9', '8', '6', 2, 4),
(3, '9', '9', '9', 3, 2),
(4, '6', '6', '6', 1, 6),
(5, '10', '10', '10', 2, 6);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `testcurso`
--

CREATE TABLE `testcurso` (
  `IdCurso` int(11) NOT NULL,
  `Nombre` varchar(50) NOT NULL,
  `Descripcion` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `testcurso`
--

INSERT INTO `testcurso` (`IdCurso`, `Nombre`, `Descripcion`) VALUES
(1, 'ProgramacionWeb', 'Ingenieria'),
(2, 'DessarrolloMovil', 'Ingenieria'),
(3, 'BaseDatos', 'Ingenieria'),
(4, 'POO', 'Ingenieria');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `usuario`
--

CREATE TABLE `usuario` (
  `IdUsuario` int(11) NOT NULL,
  `Nombre` varchar(50) DEFAULT NULL,
  `Email` varchar(50) DEFAULT NULL,
  `Password` varchar(10) DEFAULT NULL,
  `FechaIngreso` date NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `usuario`
--

INSERT INTO `usuario` (`IdUsuario`, `Nombre`, `Email`, `Password`, `FechaIngreso`) VALUES
(1, 'profesor', 'profesor@gmail.com', '1234', '2022-06-25');

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `curso`
--
ALTER TABLE `curso`
  ADD PRIMARY KEY (`IdCurso`);

--
-- Indices de la tabla `estudiante`
--
ALTER TABLE `estudiante`
  ADD PRIMARY KEY (`IdEstudiante`);

--
-- Indices de la tabla `nota`
--
ALTER TABLE `nota`
  ADD PRIMARY KEY (`IdNota`),
  ADD KEY `IdCurso` (`IdCurso`),
  ADD KEY `IdEstudiante` (`IdEstudiante`);

--
-- Indices de la tabla `testcurso`
--
ALTER TABLE `testcurso`
  ADD PRIMARY KEY (`IdCurso`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `curso`
--
ALTER TABLE `curso`
  MODIFY `IdCurso` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT de la tabla `estudiante`
--
ALTER TABLE `estudiante`
  MODIFY `IdEstudiante` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT de la tabla `nota`
--
ALTER TABLE `nota`
  MODIFY `IdNota` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT de la tabla `testcurso`
--
ALTER TABLE `testcurso`
  MODIFY `IdCurso` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- Restricciones para tablas volcadas
--

--
-- Filtros para la tabla `nota`
--
ALTER TABLE `nota`
  ADD CONSTRAINT `nota_ibfk_1` FOREIGN KEY (`IdEstudiante`) REFERENCES `estudiante` (`IdEstudiante`),
  ADD CONSTRAINT `nota_ibfk_2` FOREIGN KEY (`IdCurso`) REFERENCES `curso` (`IdCurso`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
