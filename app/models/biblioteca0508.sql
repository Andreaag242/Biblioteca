-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Servidor: localhost:3306
-- Tiempo de generación: 06-08-2022 a las 03:57:34
-- Versión del servidor: 5.7.33
-- Versión de PHP: 8.1.7

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `biblioteca`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `cliente`
--

CREATE TABLE `cliente` (
  `idCliente` int(11) NOT NULL,
  `nombre1` varchar(45) NOT NULL,
  `nombre2` varchar(45) DEFAULT NULL,
  `apellido1` varchar(45) NOT NULL,
  `apellido2` varchar(45) DEFAULT NULL,
  `fechaNacimiento` date NOT NULL,
  `telefono` varchar(45) NOT NULL,
  `direccion` varchar(100) NOT NULL,
  `activo` tinyint(4) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `cliente`
--

INSERT INTO `cliente` (`idCliente`, `nombre1`, `nombre2`, `apellido1`, `apellido2`, `fechaNacimiento`, `telefono`, `direccion`, `activo`) VALUES
(1, 'Mario', 'J', 'Gonzalez', 'Hernandez', '2002-08-06', '3172635836', 'calle2 12-3', 0);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `detalleprestamo`
--

CREATE TABLE `detalleprestamo` (
  `idDetalle` int(11) NOT NULL,
  `idLibro` int(11) NOT NULL,
  `cantidad` int(11) NOT NULL,
  `libros_idLibro` int(11) NOT NULL,
  `libros_editorial_idEditorial` int(11) NOT NULL,
  `encabezadoPrestamo_idPrestamo` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `editorial`
--

CREATE TABLE `editorial` (
  `idEditorial` int(11) NOT NULL,
  `nombreEditorial` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `editorial`
--

INSERT INTO `editorial` (`idEditorial`, `nombreEditorial`) VALUES
(1, 'Planeta'),
(2, 'Salamandra'),
(3, 'El faquir'),
(4, 'Barret'),
(5, 'El cuervo');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `encabezadoprestamo`
--

CREATE TABLE `encabezadoprestamo` (
  `idPrestamo` int(11) NOT NULL,
  `fechaPrestamo` date NOT NULL,
  `fechaEntrega` date DEFAULT NULL,
  `cliente_idCliente` int(11) NOT NULL,
  `usuario` varchar(45) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `libros`
--

CREATE TABLE `libros` (
  `idLibro` int(11) NOT NULL,
  `nombreLibro` varchar(100) NOT NULL,
  `autor` varchar(45) NOT NULL,
  `disponible` tinyint(4) NOT NULL,
  `cantidadTotal` varchar(45) NOT NULL,
  `editorial_idEditorial` int(11) NOT NULL,
  `estado` tinyint(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `libros`
--

INSERT INTO `libros` (`idLibro`, `nombreLibro`, `autor`, `disponible`, `cantidadTotal`, `editorial_idEditorial`, `estado`) VALUES
(1, 'Henrry Porras y la rasca filosofal', 'J. K. Rodriguez', 1, '13', 2, 1),
(2, 'Juventud en Extasis', 'Carlos CuauhtÃ©moc', 3, '5', 5, 0);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `penalizacion`
--

CREATE TABLE `penalizacion` (
  `idPenalizacion` int(11) NOT NULL,
  `fechaPenalizacion` date NOT NULL,
  `fechaFinPenalizacion` date NOT NULL,
  `idCliente` int(11) NOT NULL,
  `idPrestamo` int(11) NOT NULL,
  `cliente_idCliente` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `rol`
--

CREATE TABLE `rol` (
  `idRol` int(11) NOT NULL,
  `nombreRol` varchar(45) NOT NULL,
  `opeInsertar` tinyint(4) NOT NULL,
  `opeActualizar` tinyint(4) NOT NULL,
  `opeEliminar` tinyint(4) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `rol`
--

INSERT INTO `rol` (`idRol`, `nombreRol`, `opeInsertar`, `opeActualizar`, `opeEliminar`) VALUES
(1, 'Admin', 1, 1, 1),
(2, 'Bibliotecario', 1, 1, 0),
(3, 'Inactivo', 0, 0, 0);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `usuario`
--

CREATE TABLE `usuario` (
  `idUsuario` int(11) NOT NULL,
  `nombre1` varchar(45) NOT NULL,
  `nombre2` varchar(45) DEFAULT NULL,
  `apellido1` varchar(45) NOT NULL,
  `apellido2` varchar(45) DEFAULT NULL,
  `fechaNacimiento` date NOT NULL,
  `telefono` varchar(45) NOT NULL,
  `direccion` varchar(45) NOT NULL,
  `usuario` varchar(45) NOT NULL,
  `passwordUsuario` varchar(45) NOT NULL,
  `rol_idRol` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `usuario`
--

INSERT INTO `usuario` (`idUsuario`, `nombre1`, `nombre2`, `apellido1`, `apellido2`, `fechaNacimiento`, `telefono`, `direccion`, `usuario`, `passwordUsuario`, `rol_idRol`) VALUES
(12345, 'jhg', 'gdhd', 'nnashudhas', 'sda', '2022-08-18', '312452', 'calle1', 'asfa', '12345', 3),
(123456789, 'Rapha', 'Sueiro', 'Nava', 'Lopez', '1998-11-05', '555666', 'calle 123', 'Rapha', '12345', 2),
(1010087675, 'Juan', NULL, 'Gomez', 'Arias', '2002-07-16', '3127653425', 'calle 5 12-33', 'Juanito', '12345', 1),
(1010098765, 'Jhonier', 'A', 'Mesa', 'V', '2022-08-08', '3126457292', 'Calle 1 a 17-32', 'jhon', '12345', 2),
(1114157263, 'Maria', 'E', 'Gonzales', 'Montes', '2004-06-15', '3016437823', 'Calle 2 12-23', 'Mari', '12345', 2);

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `cliente`
--
ALTER TABLE `cliente`
  ADD PRIMARY KEY (`idCliente`);

--
-- Indices de la tabla `detalleprestamo`
--
ALTER TABLE `detalleprestamo`
  ADD PRIMARY KEY (`idDetalle`,`libros_idLibro`,`libros_editorial_idEditorial`,`encabezadoPrestamo_idPrestamo`),
  ADD KEY `fk_detallePrestamo_libros1` (`libros_idLibro`,`libros_editorial_idEditorial`),
  ADD KEY `fk_detallePrestamo_encabezadoPrestamo1` (`encabezadoPrestamo_idPrestamo`);

--
-- Indices de la tabla `editorial`
--
ALTER TABLE `editorial`
  ADD PRIMARY KEY (`idEditorial`);

--
-- Indices de la tabla `encabezadoprestamo`
--
ALTER TABLE `encabezadoprestamo`
  ADD PRIMARY KEY (`idPrestamo`,`cliente_idCliente`),
  ADD KEY `fk_encabezadoPrestamo_cliente1` (`cliente_idCliente`);

--
-- Indices de la tabla `libros`
--
ALTER TABLE `libros`
  ADD PRIMARY KEY (`idLibro`,`editorial_idEditorial`),
  ADD KEY `fk_libros_editorial` (`editorial_idEditorial`);

--
-- Indices de la tabla `penalizacion`
--
ALTER TABLE `penalizacion`
  ADD PRIMARY KEY (`idPenalizacion`,`cliente_idCliente`),
  ADD KEY `fk_penalizacion_cliente1` (`cliente_idCliente`);

--
-- Indices de la tabla `rol`
--
ALTER TABLE `rol`
  ADD PRIMARY KEY (`idRol`);

--
-- Indices de la tabla `usuario`
--
ALTER TABLE `usuario`
  ADD PRIMARY KEY (`idUsuario`,`rol_idRol`),
  ADD KEY `fk_usuario_rol1` (`rol_idRol`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `editorial`
--
ALTER TABLE `editorial`
  MODIFY `idEditorial` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT de la tabla `encabezadoprestamo`
--
ALTER TABLE `encabezadoprestamo`
  MODIFY `idPrestamo` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `libros`
--
ALTER TABLE `libros`
  MODIFY `idLibro` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT de la tabla `penalizacion`
--
ALTER TABLE `penalizacion`
  MODIFY `idPenalizacion` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `rol`
--
ALTER TABLE `rol`
  MODIFY `idRol` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- Restricciones para tablas volcadas
--

--
-- Filtros para la tabla `detalleprestamo`
--
ALTER TABLE `detalleprestamo`
  ADD CONSTRAINT `fk_detallePrestamo_encabezadoPrestamo1` FOREIGN KEY (`encabezadoPrestamo_idPrestamo`) REFERENCES `encabezadoprestamo` (`idPrestamo`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `fk_detallePrestamo_libros1` FOREIGN KEY (`libros_idLibro`,`libros_editorial_idEditorial`) REFERENCES `libros` (`idLibro`, `editorial_idEditorial`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Filtros para la tabla `encabezadoprestamo`
--
ALTER TABLE `encabezadoprestamo`
  ADD CONSTRAINT `fk_encabezadoPrestamo_cliente1` FOREIGN KEY (`cliente_idCliente`) REFERENCES `cliente` (`idCliente`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Filtros para la tabla `libros`
--
ALTER TABLE `libros`
  ADD CONSTRAINT `fk_libros_editorial` FOREIGN KEY (`editorial_idEditorial`) REFERENCES `editorial` (`idEditorial`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Filtros para la tabla `penalizacion`
--
ALTER TABLE `penalizacion`
  ADD CONSTRAINT `fk_penalizacion_cliente1` FOREIGN KEY (`cliente_idCliente`) REFERENCES `cliente` (`idCliente`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Filtros para la tabla `usuario`
--
ALTER TABLE `usuario`
  ADD CONSTRAINT `fk_usuario_rol1` FOREIGN KEY (`rol_idRol`) REFERENCES `rol` (`idRol`) ON DELETE NO ACTION ON UPDATE NO ACTION;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
