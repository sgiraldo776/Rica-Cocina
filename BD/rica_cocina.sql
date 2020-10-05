-- phpMyAdmin SQL Dump
-- version 5.0.2
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 05-10-2020 a las 18:07:12
-- Versión del servidor: 10.4.14-MariaDB
-- Versión de PHP: 7.4.9

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
CREATE DATABASE IF NOT EXISTS `rica_cocina` DEFAULT CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci;
USE `rica_cocina`;

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

--
-- Volcado de datos para la tabla `tblpais`
--

INSERT INTO `tblpais` (`paisid`, `nombre`) VALUES
(144, 'Afganistán'),
(114, 'Albania'),
(18, 'Alemania'),
(98, 'Argelia'),
(145, 'Andorra'),
(119, 'Angola'),
(4, 'Anguilla'),
(147, 'Antigua y Barbuda'),
(207, 'Antillas Holandesas'),
(91, 'Arabia Saudita'),
(5, 'Argentina'),
(6, 'Armenia'),
(142, 'Aruba'),
(1, 'Australia'),
(2, 'Austria'),
(3, 'Azerbaiyán'),
(80, 'Bahamas'),
(127, 'Bahrein'),
(149, 'Bangladesh'),
(128, 'Barbados'),
(9, 'Bélgica'),
(8, 'Belice'),
(151, 'Benín'),
(10, 'Bermudas'),
(7, 'Bielorrusia'),
(123, 'Bolivia'),
(79, 'Bosnia y Herzegovina'),
(100, 'Botsuana'),
(12, 'Brasil'),
(155, 'Brunéi'),
(11, 'Bulgaria'),
(156, 'Burkina Faso'),
(157, 'Burundi'),
(152, 'Bután'),
(159, 'Cabo Verde'),
(158, 'Camboya'),
(31, 'Camerún'),
(32, 'Canadá'),
(130, 'Chad'),
(81, 'Chile'),
(35, 'China'),
(33, 'Chipre'),
(82, 'Colombia'),
(164, 'Comores'),
(112, 'Congo (Brazzaville)'),
(165, 'Congo (Kinshasa)'),
(166, 'Cook, Islas'),
(84, 'Corea del Norte'),
(69, 'Corea del Sur'),
(168, 'Costa de Marfil'),
(36, 'Costa Rica'),
(71, 'Croacia'),
(113, 'Cuba'),
(22, 'Dinamarca'),
(169, 'Djibouti, Yibuti'),
(103, 'Ecuador'),
(23, 'Egipto'),
(51, 'El Salvador'),
(93, 'Emiratos árabes Unidos'),
(173, 'Eritrea'),
(52, 'Eslovaquia'),
(53, 'Eslovenia'),
(28, 'España'),
(55, 'Estados Unidos'),
(68, 'Estonia'),
(121, 'Etiopía'),
(175, 'Feroe, Islas'),
(90, 'Filipinas'),
(63, 'Finlandia'),
(176, 'Fiyi'),
(64, 'Francia'),
(180, 'Gabón'),
(181, 'Gambia'),
(21, 'Georgia'),
(105, 'Ghana'),
(143, 'Gibraltar'),
(184, 'Granada'),
(20, 'Grecia'),
(94, 'Groenlandia'),
(17, 'Guadalupe'),
(185, 'Guatemala'),
(186, 'Guernsey'),
(187, 'Guinea'),
(172, 'Guinea Ecuatorial'),
(188, 'Guinea-Bissau'),
(189, 'Guyana'),
(16, 'Haiti'),
(137, 'Honduras'),
(73, 'Hong Kong'),
(14, 'Hungría'),
(25, 'India'),
(74, 'Indonesia'),
(140, 'Irak'),
(26, 'Irán'),
(27, 'Irlanda'),
(215, 'Isla Pitcairn'),
(83, 'Islandia'),
(228, 'Islas Salomón'),
(58, 'Islas Turcas y Caicos'),
(154, 'Islas Virgenes Británicas'),
(24, 'Israel'),
(29, 'Italia'),
(132, 'Jamaica'),
(70, 'Japón'),
(193, 'Jersey'),
(75, 'Jordania'),
(30, 'Kazajstán'),
(97, 'Kenia'),
(34, 'Kirguistán'),
(195, 'Kiribati'),
(37, 'Kuwait'),
(196, 'Laos'),
(197, 'Lesotho'),
(38, 'Letonia'),
(99, 'Líbano'),
(198, 'Liberia'),
(39, 'Libia'),
(126, 'Liechtenstein'),
(40, 'Lituania'),
(41, 'Luxemburgo'),
(85, 'Macedonia'),
(134, 'Madagascar'),
(76, 'Malasia'),
(125, 'Malawi'),
(200, 'Maldivas'),
(133, 'Malí'),
(86, 'Malta'),
(131, 'Man, Isla de'),
(104, 'Marruecos'),
(201, 'Martinica'),
(202, 'Mauricio'),
(108, 'Mauritania'),
(42, 'México'),
(43, 'Moldavia'),
(44, 'Mónaco'),
(139, 'Mongolia'),
(117, 'Mozambique'),
(205, 'Myanmar'),
(102, 'Namibia'),
(206, 'Nauru'),
(107, 'Nepal'),
(209, 'Nicaragua'),
(210, 'Níger'),
(115, 'Nigeria'),
(212, 'Norfolk Island'),
(46, 'Noruega'),
(208, 'Nueva Caledonia'),
(45, 'Nueva Zelanda'),
(213, 'Omán'),
(19, 'Países Bajos, Holanda'),
(87, 'Pakistán'),
(124, 'Panamá'),
(88, 'Papúa-Nueva Guinea'),
(110, 'Paraguay'),
(89, 'Perú'),
(178, 'Polinesia Francesa'),
(47, 'Polonia'),
(48, 'Portugal'),
(246, 'Puerto Rico'),
(216, 'Qatar'),
(13, 'Reino Unido'),
(65, 'República Checa'),
(138, 'República Dominicana'),
(49, 'Reunión'),
(217, 'Ruanda'),
(72, 'Rumanía'),
(50, 'Rusia'),
(242, 'Sáhara Occidental'),
(223, 'Samoa'),
(219, 'San Cristobal y Nevis'),
(224, 'San Marino'),
(221, 'San Pedro y Miquelón'),
(225, 'San Tomé y Príncipe'),
(222, 'San Vincente y Granadinas'),
(218, 'Santa Elena'),
(220, 'Santa Lucía'),
(135, 'Senegal'),
(226, 'Serbia y Montenegro'),
(109, 'Seychelles'),
(227, 'Sierra Leona'),
(77, 'Singapur'),
(106, 'Siria'),
(229, 'Somalia'),
(120, 'Sri Lanka'),
(141, 'Sudáfrica'),
(232, 'Sudán'),
(67, 'Suecia'),
(66, 'Suiza'),
(54, 'Surinam'),
(234, 'Swazilandia'),
(56, 'Tadjikistan'),
(92, 'Tailandia'),
(78, 'Taiwan'),
(101, 'Tanzania'),
(171, 'Timor Oriental'),
(136, 'Togo'),
(235, 'Tokelau'),
(236, 'Tonga'),
(237, 'Trinidad y Tobago'),
(122, 'Túnez'),
(57, 'Turkmenistan'),
(59, 'Turquía'),
(239, 'Tuvalu'),
(62, 'Ucrania'),
(60, 'Uganda'),
(111, 'Uruguay'),
(61, 'Uzbekistán'),
(240, 'Vanuatu'),
(95, 'Venezuela'),
(15, 'Vietnam'),
(241, 'Wallis y Futuna'),
(243, 'Yemen'),
(116, 'Zambia'),
(96, 'Zimbabwe');

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
  `votacionacomulada` int(11) DEFAULT NULL
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
  MODIFY `paisid` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=247;

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
