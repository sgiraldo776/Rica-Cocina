-- phpMyAdmin SQL Dump
-- version 5.0.2
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 12-01-2021 a las 02:29:24
-- Versión del servidor: 10.4.13-MariaDB
-- Versión de PHP: 7.4.8

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `rica_cocina`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tblcuenta`
--

CREATE TABLE `tblcuenta` (
  `cuentaid` int(11) NOT NULL,
  `correoelectronico` varchar(50) NOT NULL,
  `password` varchar(150) NOT NULL,
  `tiporolid` tinyint(4) NOT NULL,
  `estado` bit(1) NOT NULL,
  `usuarioid` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tblpadecimiento`
--

CREATE TABLE `tblpadecimiento` (
  `padecimientoid` int(11) NOT NULL,
  `nombre` varchar(45) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tblpais`
--

CREATE TABLE `tblpais` (
  `paisid` int(11) NOT NULL,
  `nombre` varchar(45) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tblreceta`
--

CREATE TABLE `tblreceta` (
  `recetaid` int(11) NOT NULL,
  `titulo` varchar(45) NOT NULL,
  `imagen` longblob DEFAULT NULL,
  `ingrediente` varchar(1000) NOT NULL,
  `pasos` varchar(5000) NOT NULL,
  `cantidadpersonas` varchar(45) NOT NULL,
  `tiempopreparacion` varchar(45) NOT NULL,
  `ocacion` varchar(45) DEFAULT NULL,
  `tiporeceta` varchar(45) NOT NULL,
  `tipocomidaid` int(11) NOT NULL,
  `padecimientoid` int(11) NOT NULL,
  `tipodietaid` int(11) NOT NULL,
  `validar` varchar(45) NOT NULL,
  `usuarioid` int(11) NOT NULL,
  `paisid` int(11) NOT NULL,
  `votacionacomulada` int(11) DEFAULT NULL,
  `tags` varchar(250) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tblrecetautensilio`
--

CREATE TABLE `tblrecetautensilio` (
  `utensilioid` int(11) NOT NULL,
  `recetaid` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tblretroalimentacion`
--

CREATE TABLE `tblretroalimentacion` (
  `retroalimentacionid` int(11) NOT NULL,
  `texto` varchar(300) DEFAULT NULL,
  `recetaid` int(11) NOT NULL,
  `fecha` date NOT NULL,
  `usuarioid` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tblroles`
--

CREATE TABLE `tblroles` (
  `tiporolid` tinyint(4) NOT NULL,
  `nombre` varchar(45) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tbltipocomida`
--

CREATE TABLE `tbltipocomida` (
  `tipocomidaid` int(11) NOT NULL,
  `nombre` varchar(45) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tbltipodieta`
--

CREATE TABLE `tbltipodieta` (
  `tipodietaid` int(11) NOT NULL,
  `nombre` varchar(45) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tblusuario`
--

CREATE TABLE `tblusuario` (
  `usuarioid` int(11) NOT NULL,
  `Nombres` varchar(50) NOT NULL,
  `apellidos` varchar(50) NOT NULL,
  `fechanacimiento` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tblutensilios`
--

CREATE TABLE `tblutensilios` (
  `utensilioid` int(11) NOT NULL,
  `nombre` varchar(45) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `tblcuenta`
--
ALTER TABLE `tblcuenta`
  ADD PRIMARY KEY (`cuentaid`),
  ADD UNIQUE KEY `correoelectronico_UNIQUE` (`correoelectronico`),
  ADD KEY `fk_tblcuenta_tblusuario1` (`usuarioid`),
  ADD KEY `fk_tblcuenta_tblroles1` (`tiporolid`);

--
-- Indices de la tabla `tblpadecimiento`
--
ALTER TABLE `tblpadecimiento`
  ADD PRIMARY KEY (`padecimientoid`),
  ADD UNIQUE KEY `nombre_UNIQUE` (`nombre`);

--
-- Indices de la tabla `tblpais`
--
ALTER TABLE `tblpais`
  ADD PRIMARY KEY (`paisid`),
  ADD UNIQUE KEY `nombre_UNIQUE` (`nombre`);

--
-- Indices de la tabla `tblreceta`
--
ALTER TABLE `tblreceta`
  ADD PRIMARY KEY (`recetaid`),
  ADD KEY `fk_tblreceta_tblpais1` (`paisid`),
  ADD KEY `fk_tblreceta_tblusuario1` (`usuarioid`),
  ADD KEY `fk_tblreceta_tbltipodieta1` (`tipodietaid`),
  ADD KEY `fk_tblreceta_tblpadecimiento1` (`padecimientoid`),
  ADD KEY `fk_tblreceta_tbltipocomida1` (`tipocomidaid`);
ALTER TABLE `tblreceta` ADD FULLTEXT KEY `titulo` (`titulo`);
ALTER TABLE `tblreceta` ADD FULLTEXT KEY `ingrediente` (`ingrediente`);
ALTER TABLE `tblreceta` ADD FULLTEXT KEY `ingrediente_2` (`ingrediente`,`titulo`);
ALTER TABLE `tblreceta` ADD FULLTEXT KEY `tags` (`tags`);
ALTER TABLE `tblreceta` ADD FULLTEXT KEY `tags_2` (`tags`,`titulo`,`ingrediente`);

--
-- Indices de la tabla `tblrecetautensilio`
--
ALTER TABLE `tblrecetautensilio`
  ADD PRIMARY KEY (`utensilioid`,`recetaid`),
  ADD KEY `fk_tblutensilios_has_tblreceta_tblreceta1` (`recetaid`);

--
-- Indices de la tabla `tblretroalimentacion`
--
ALTER TABLE `tblretroalimentacion`
  ADD PRIMARY KEY (`retroalimentacionid`),
  ADD KEY `fk_tblretroalimentacion_tblreceta` (`recetaid`),
  ADD KEY `fk_tblretroalimentacion_tblusuario1` (`usuarioid`);

--
-- Indices de la tabla `tblroles`
--
ALTER TABLE `tblroles`
  ADD PRIMARY KEY (`tiporolid`);

--
-- Indices de la tabla `tbltipocomida`
--
ALTER TABLE `tbltipocomida`
  ADD PRIMARY KEY (`tipocomidaid`),
  ADD UNIQUE KEY `nombre_UNIQUE` (`nombre`);

--
-- Indices de la tabla `tbltipodieta`
--
ALTER TABLE `tbltipodieta`
  ADD PRIMARY KEY (`tipodietaid`),
  ADD UNIQUE KEY `nombre_UNIQUE` (`nombre`);

--
-- Indices de la tabla `tblusuario`
--
ALTER TABLE `tblusuario`
  ADD PRIMARY KEY (`usuarioid`);

--
-- Indices de la tabla `tblutensilios`
--
ALTER TABLE `tblutensilios`
  ADD PRIMARY KEY (`utensilioid`),
  ADD UNIQUE KEY `nombre` (`nombre`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `tblcuenta`
--
ALTER TABLE `tblcuenta`
  MODIFY `cuentaid` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `tblpadecimiento`
--
ALTER TABLE `tblpadecimiento`
  MODIFY `padecimientoid` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `tblpais`
--
ALTER TABLE `tblpais`
  MODIFY `paisid` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `tblreceta`
--
ALTER TABLE `tblreceta`
  MODIFY `recetaid` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `tblretroalimentacion`
--
ALTER TABLE `tblretroalimentacion`
  MODIFY `retroalimentacionid` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `tbltipocomida`
--
ALTER TABLE `tbltipocomida`
  MODIFY `tipocomidaid` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `tbltipodieta`
--
ALTER TABLE `tbltipodieta`
  MODIFY `tipodietaid` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `tblusuario`
--
ALTER TABLE `tblusuario`
  MODIFY `usuarioid` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `tblutensilios`
--
ALTER TABLE `tblutensilios`
  MODIFY `utensilioid` int(11) NOT NULL AUTO_INCREMENT;

--
-- Restricciones para tablas volcadas
--

--
-- Filtros para la tabla `tblcuenta`
--
ALTER TABLE `tblcuenta`
  ADD CONSTRAINT `fk_tblcuenta_tblroles1` FOREIGN KEY (`tiporolid`) REFERENCES `tblroles` (`tiporolid`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `fk_tblcuenta_tblusuario1` FOREIGN KEY (`usuarioid`) REFERENCES `tblusuario` (`usuarioid`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Filtros para la tabla `tblreceta`
--
ALTER TABLE `tblreceta`
  ADD CONSTRAINT `fk_tblreceta_tblpadecimiento1` FOREIGN KEY (`padecimientoid`) REFERENCES `tblpadecimiento` (`padecimientoid`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `fk_tblreceta_tblpais1` FOREIGN KEY (`paisid`) REFERENCES `tblpais` (`paisid`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `fk_tblreceta_tbltipocomida1` FOREIGN KEY (`tipocomidaid`) REFERENCES `tbltipocomida` (`tipocomidaid`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `fk_tblreceta_tbltipodieta1` FOREIGN KEY (`tipodietaid`) REFERENCES `tbltipodieta` (`tipodietaid`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `fk_tblreceta_tblusuario1` FOREIGN KEY (`usuarioid`) REFERENCES `tblusuario` (`usuarioid`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Filtros para la tabla `tblrecetautensilio`
--
ALTER TABLE `tblrecetautensilio`
  ADD CONSTRAINT `fk_tblutensilios_has_tblreceta_tblreceta1` FOREIGN KEY (`recetaid`) REFERENCES `tblreceta` (`recetaid`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `fk_tblutensilios_has_tblreceta_tblutensilios1` FOREIGN KEY (`utensilioid`) REFERENCES `tblutensilios` (`utensilioid`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Filtros para la tabla `tblretroalimentacion`
--
ALTER TABLE `tblretroalimentacion`
  ADD CONSTRAINT `fk_tblretroalimentacion_tblreceta` FOREIGN KEY (`recetaid`) REFERENCES `tblreceta` (`recetaid`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `fk_tblretroalimentacion_tblusuario1` FOREIGN KEY (`usuarioid`) REFERENCES `tblusuario` (`usuarioid`) ON DELETE NO ACTION ON UPDATE NO ACTION;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
