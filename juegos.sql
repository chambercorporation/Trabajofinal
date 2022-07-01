-- phpMyAdmin SQL Dump
-- version 4.8.0
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 01-07-2022 a las 16:43:48
-- Versión del servidor: 10.1.31-MariaDB
-- Versión de PHP: 7.2.4

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `juegos`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `categoria`
--

CREATE TABLE `categoria` (
  `ID_categoria` tinyint(4) NOT NULL,
  `Tipo_categoria` varchar(12) DEFAULT NULL,
  `Valor_categoria` decimal(4,2) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `categoria`
--

INSERT INTO `categoria` (`ID_categoria`, `Tipo_categoria`, `Valor_categoria`) VALUES
(1, 'Accion', '1.10'),
(2, 'Aventura', '2.09'),
(3, 'Conduccion', '3.08'),
(4, 'Deportes', '4.07'),
(5, 'Estrategias', '5.06'),
(6, 'Rol', '6.05'),
(7, 'Puzzle', '7.04'),
(8, 'Shooter', '8.03'),
(9, 'Simulacion', '9.02'),
(10, 'Vuelo', '10.01');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `dedicacion`
--

CREATE TABLE `dedicacion` (
  `ID_dedicacion` tinyint(4) NOT NULL,
  `Tipo_dedicacion` varchar(17) DEFAULT NULL,
  `Valor_dedicacion` decimal(4,2) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `dedicacion`
--

INSERT INTO `dedicacion` (`ID_dedicacion`, `Tipo_dedicacion`, `Valor_dedicacion`) VALUES
(1, 'de 0 a 1 horas', '1.00'),
(2, 'de 1 a 3 horas', '2.00'),
(3, 'de 4 a 6 horas', '3.00'),
(4, 'de 7 a  8 horas', '4.00'),
(5, 'mas de 8 horas', '5.00');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `experiencia`
--

CREATE TABLE `experiencia` (
  `ID_externos` tinyint(4) NOT NULL,
  `Tipo_experiencia` varchar(35) DEFAULT NULL,
  `Valor_experiencia` decimal(4,2) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COMMENT='	';

--
-- Volcado de datos para la tabla `experiencia`
--

INSERT INTO `experiencia` (`ID_externos`, `Tipo_experiencia`, `Valor_experiencia`) VALUES
(1, 'no tiene experiencia previa', '0.25'),
(2, 'Tiene experiencia con playstation', '0.45'),
(3, 'tiene experiencia con xbox', '0.65'),
(4, 'tiene experiencia con pc gaming', '0.85');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `historial`
--

CREATE TABLE `historial` (
  `ID_historial` tinyint(4) NOT NULL,
  `Tipo_historial` varchar(16) DEFAULT NULL,
  `Valor_historial` decimal(4,2) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `historial`
--

INSERT INTO `historial` (`ID_historial`, `Tipo_historial`, `Valor_historial`) VALUES
(1, 'de 0 a 1 mes', '0.51'),
(2, 'de 1 a 3 meses', '0.62'),
(3, 'de 4 a 6 meses', '0.73'),
(4, 'de 6 a 9 meses', '0.84'),
(5, '10 meses o más', '0.95');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `historico_usuario`
--

CREATE TABLE `historico_usuario` (
  `ID_crear` int(11) NOT NULL,
  `Nombre` varchar(30) DEFAULT NULL,
  `Contrasenna` varchar(20) DEFAULT NULL,
  `Correo` varchar(30) DEFAULT NULL,
  `Hora` time DEFAULT NULL,
  `Fecha` date DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `historico_usuario`
--

INSERT INTO `historico_usuario` (`ID_crear`, `Nombre`, `Contrasenna`, `Correo`, `Hora`, `Fecha`) VALUES
(1, 'bryan', 'asd', 'hola.cftl.cl', '00:52:34', '2022-07-01'),
(2, 'claudio', 'asd', 'asd@gmail.com', '01:06:15', '2022-07-01'),
(3, 'bryanjara', 'asd', 'asd123@2asd.com', '01:08:13', '2022-07-01'),
(4, 'moises', 'asd', 'moises@asd.cl', '01:47:25', '2022-07-01'),
(5, 'kevin', 'asd', 'kevin123@gmail.cl', '01:57:56', '2022-07-01'),
(6, 'eduardo', 'asd', 'asd123@2asd.com', '02:08:15', '2022-07-01'),
(7, 'kevinalarcon', 'asd', 'asd@gmail.com', '03:33:22', '2022-07-01'),
(8, 'papa', 'asd', 'bryjara@cftla.cl', '04:04:36', '2022-07-01'),
(9, 'bryjara', 'asd', 'bryjara@cftla.cl', '04:17:13', '2022-07-01'),
(10, 'kevin', 'asd', 'ksolar@cftla.cl', '10:04:02', '2022-07-01'),
(11, 'wladimir', '123456', 'wladimir@gmail.com', '10:05:25', '2022-07-01'),
(12, 'eduardo', '123', 'eduparedes@cftla.cl', '10:12:10', '2022-07-01'),
(13, 'bryan', '123', 'bryjara@cftla.cl', '10:12:24', '2022-07-01'),
(14, 'claudio', '123', 'cguerra@cftla.cl', '10:12:40', '2022-07-01');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `jugador`
--

CREATE TABLE `jugador` (
  `usuario_ID_usuario` int(11) NOT NULL,
  `dedicacion_ID_dedicacion` tinyint(4) NOT NULL,
  `tipo_jugador_ID_Tipo` tinyint(4) NOT NULL,
  `preferencias_personales_ID_preferencias` tinyint(4) NOT NULL,
  `historial_ID_historial` tinyint(4) NOT NULL,
  `experiencia_ID_externos` tinyint(4) NOT NULL,
  `pericia_ID_pericia` tinyint(4) NOT NULL,
  `categoria_ID_categoria` tinyint(4) NOT NULL,
  `resultado_ID_resultado` tinyint(4) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `jugador`
--

INSERT INTO `jugador` (`usuario_ID_usuario`, `dedicacion_ID_dedicacion`, `tipo_jugador_ID_Tipo`, `preferencias_personales_ID_preferencias`, `historial_ID_historial`, `experiencia_ID_externos`, `pericia_ID_pericia`, `categoria_ID_categoria`, `resultado_ID_resultado`) VALUES
(10, 1, 1, 1, 1, 1, 1, 1, 1),
(13, 5, 5, 5, 5, 1, 5, 1, 5);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `pericia`
--

CREATE TABLE `pericia` (
  `ID_pericia` tinyint(4) NOT NULL,
  `Tipo_pericia` varchar(13) DEFAULT NULL,
  `Valor_pericia` decimal(4,2) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `pericia`
--

INSERT INTO `pericia` (`ID_pericia`, `Tipo_pericia`, `Valor_pericia`) VALUES
(1, 'Neofito', '1.00'),
(2, 'Novato', '2.00'),
(3, 'Amateur', '3.00'),
(4, 'Training', '4.00'),
(5, 'Intermedio', '5.00'),
(6, 'Rooki', '6.00'),
(7, 'Senior', '7.00'),
(8, 'SemiPro', '8.00'),
(9, 'Experto', '9.00'),
(10, 'Profesional', '10.00'),
(11, 'Veterano', '11.00');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `preferencias_personales`
--

CREATE TABLE `preferencias_personales` (
  `ID_preferencias` tinyint(4) NOT NULL,
  `Preferencias` varchar(20) DEFAULT NULL,
  `Valor_preferencias` decimal(4,2) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `preferencias_personales`
--

INSERT INTO `preferencias_personales` (`ID_preferencias`, `Preferencias`, `Valor_preferencias`) VALUES
(1, 'Juega individual', '0.15'),
(2, 'Juega en duos', '0.30'),
(3, 'Juega en trios', '0.45'),
(4, 'Juega en escuadras', '0.60'),
(5, 'Juega Offline', '0.75'),
(6, 'Juega Teclado', '0.90'),
(7, 'Juega Joystick', '1.05'),
(8, 'Juega PC', '1.20'),
(9, 'Juega Consola', '1.35'),
(10, 'Juega Clasicos', '1.50'),
(11, 'Juega Modernos', '1.65');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `resultado`
--

CREATE TABLE `resultado` (
  `ID_resultado` tinyint(4) NOT NULL,
  `Juego_resultado` varchar(55) DEFAULT NULL,
  `Valor_final` decimal(4,2) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `resultado`
--

INSERT INTO `resultado` (`ID_resultado`, `Juego_resultado`, `Valor_final`) VALUES
(1, 'Command & Conquer™ Remastered Collection', '5.01'),
(2, 'Dead Space™', '8.47'),
(3, 'Dead Space™ 2', '11.93'),
(4, 'Dead Space™ 3', '15.39'),
(5, 'Dungeon Keeper™', '18.05'),
(6, 'Dungeon Keeper™ 2', '10.96'),
(7, 'Mirror\'s Edge (2009)', '14.42'),
(8, 'Mirror\'s Edge™ Catalyst', '17.88'),
(9, 'Rocket Arena', '20.54'),
(10, 'STAR WARS™: Squadrons', '24.00'),
(11, 'Syndicate™ (1993)', '16.91'),
(12, 'A Way Out', '8.71'),
(13, 'Alice: Madness Returns™', '11.37'),
(14, 'Genchin Impact', '14.83'),
(15, 'It Takes Two', '18.29'),
(16, 'Jade Empire™: Edición Especial', '11.20'),
(17, 'Lost in Random™', '13.86'),
(18, 'Watch Dogs', '17.32'),
(19, 'Rebel Galaxy', '20.78'),
(20, 'Sea of Solitude', '24.24'),
(21, 'The Saboteur™', '16.35'),
(22, 'STAR WARS Jedi: Fallen Order™', '19.81'),
(23, 'Burnout™ Paradise Remastered', '11.61'),
(24, 'Need for Speed™', '15.07'),
(25, 'Need for Speed™ Heat', '17.73'),
(26, 'Need for Speed™ Hot Pursuit Remastered', '10.64'),
(27, 'Need for Speed™ Most Wanted', '14.10'),
(28, 'Need for Speed™ Payback', '17.56'),
(29, 'Need for Speed™ Rivals', '20.22'),
(30, 'FIFA 20', '24.67'),
(31, 'FIFA 21', '17.58'),
(32, 'Knockout City™', '21.04'),
(33, 'Madden NFL 21', '23.70'),
(34, 'Madden NFL 22', '14.51'),
(35, 'Super Mega Baseball 3', '17.97'),
(36, 'X-COM 2', '11.87'),
(37, 'Gears of War', '14.53'),
(38, 'Plantas contra Zombis™ edición juego del año', '17.99'),
(39, 'Plants vs. Zombies™ Garden Warfare', '21.45'),
(40, 'Plants vs. Zombies™ Garden Warfare 2: Edición Estándar', '24.91'),
(41, 'Populous™', '17.02'),
(42, 'Populous™ II: Trials of the Olympian Gods', '20.48'),
(43, 'SPORE™', '23.94'),
(44, 'Anthem™', '28.39'),
(45, 'Dragon Age™ II', '18.40'),
(46, 'Dragon Age™: Inquisition', '11.31'),
(47, 'Dragon Age™: Origins', '14.77'),
(48, 'HIVESWAP: Act 1', '18.23'),
(49, 'World of Warcraft', '20.89'),
(50, 'The Bard’s Tale Trilogy', '24.35'),
(51, 'Ultima™ Underworld 1', '17.26'),
(52, 'Ultima™ Underworld 2', '20.72'),
(53, 'Peggle®', '24.37'),
(54, 'Peggle® Nights', '27.83'),
(55, 'Unravel™', '31.29'),
(56, 'Unravel Two', '11.55'),
(57, 'Battlefield™ 1', '15.20'),
(58, 'Battlefield 3™', '18.66'),
(59, 'Battlefield 4™', '22.12'),
(60, 'Battlefield: Bad Company™ 2', '25.58'),
(61, 'Battlefield™ Hardline', '17.69'),
(62, 'Battlefield™ V', '21.15'),
(63, 'Crysis® (2007)', '24.61'),
(64, 'Crysis® 2 Maximum Edition', '28.07'),
(65, 'Crysis® 3', '30.73'),
(66, 'Crysis Remastered', '23.64'),
(67, 'Mass Effect™ (2007)', '14.45'),
(68, 'Mass Effect™ 2 (2010)', '17.91'),
(69, 'Mass Effect™ 3 (2012)', '20.57'),
(70, 'Mass Effect™: Andromeda', '24.03'),
(71, 'Mass Effect™ Legendary Edition', '16.94'),
(72, 'Plants vs. Zombies™: La Batalla de Neighborville', '20.40'),
(73, 'Call of Duty: Advance Warfare', '23.06'),
(74, 'Counter Strike: Global Offensive', '26.52'),
(75, 'STAR WARS™ Battlefront™ II', '29.98'),
(76, 'STAR WARS™ Battlefront™ Ultimate Edition', '22.89'),
(77, 'Escape From Tarkov', '25.55'),
(78, 'Titanfall™ 2', '16.36'),
(79, 'SimCity™', '20.81'),
(80, 'SimCity 2000™ Special Edition', '24.27'),
(81, 'SimCity™ 4 Deluxe Edition', '16.38'),
(82, 'SUPER HOT', '19.84'),
(83, 'Apex Legends', '23.30'),
(84, 'Los Sims™ 4', '26.76'),
(85, 'Medal of Honor Airborne™', '30.41'),
(86, 'Warhawk', '29.32');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tipo_jugador`
--

CREATE TABLE `tipo_jugador` (
  `ID_tipo` tinyint(4) NOT NULL,
  `Tipo_jugador` varchar(14) DEFAULT NULL,
  `Valor_tipo` decimal(4,2) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `tipo_jugador`
--

INSERT INTO `tipo_jugador` (`ID_tipo`, `Tipo_jugador`, `Valor_tipo`) VALUES
(1, 'Socializador', '1.00'),
(2, 'Anarquista', '2.00'),
(3, 'Conquistador', '3.00'),
(4, 'Competidor', '4.00'),
(5, 'Explorador', '5.00');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `usuario`
--

CREATE TABLE `usuario` (
  `ID_usuario` int(11) NOT NULL,
  `Nombre` varchar(30) DEFAULT NULL,
  `Contrasenna` varchar(20) DEFAULT NULL,
  `Correo` varchar(30) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `usuario`
--

INSERT INTO `usuario` (`ID_usuario`, `Nombre`, `Contrasenna`, `Correo`) VALUES
(10, 'kevin', 'asd', 'ksolar@cftla.cl'),
(11, 'wladimir', '123456', 'wladimir@gmail.com'),
(12, 'eduardo', '123', 'eduparedes@cftla.cl'),
(13, 'bryan', '123', 'bryjara@cftla.cl'),
(14, 'claudio', '123', 'cguerra@cftla.cl');

--
-- Disparadores `usuario`
--
DELIMITER $$
CREATE TRIGGER `registro_eliminaciones` BEFORE DELETE ON `usuario` FOR EACH ROW BEGIN
    INSERT INTO usuarios_eliminados SELECT * , curtime(), curdate() FROM usuario 
    WHERE ID_Usuario = old.ID_usuario;
END
$$
DELIMITER ;
DELIMITER $$
CREATE TRIGGER `registro_usuarios` AFTER INSERT ON `usuario` FOR EACH ROW BEGIN
        INSERT INTO historico_usuario(Nombre, Contrasenna, Correo, Hora, Fecha) VALUES (NEW.Nombre, NEW.Contrasenna, NEW.Correo, curtime(), curdate());
    END
$$
DELIMITER ;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `usuarios_eliminados`
--

CREATE TABLE `usuarios_eliminados` (
  `ID_eliminar` int(11) NOT NULL,
  `Nombre` varchar(30) DEFAULT NULL,
  `Contrasenna` varchar(20) DEFAULT NULL,
  `Correo` varchar(30) DEFAULT NULL,
  `Hora` time DEFAULT NULL,
  `Fecha` date DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `usuarios_eliminados`
--

INSERT INTO `usuarios_eliminados` (`ID_eliminar`, `Nombre`, `Contrasenna`, `Correo`, `Hora`, `Fecha`) VALUES
(1, 'bryan', 'asd', 'hola.cftl.cl', '00:57:08', '2022-07-01'),
(2, 'claudio', 'asd', 'asd@gmail.com', '04:44:23', '2022-07-01'),
(3, 'bryanjara', 'asd', 'asd123@2asd.com', '04:44:23', '2022-07-01'),
(4, 'moises', 'asd', 'moises@asd.cl', '04:44:23', '2022-07-01'),
(5, 'kevin', 'asd', 'kevin123@gmail.cl', '04:44:23', '2022-07-01'),
(6, 'eduardo', 'asd', 'asd123@2asd.com', '04:44:23', '2022-07-01'),
(7, 'kevinalarcon', 'asd', 'asd@gmail.com', '04:44:23', '2022-07-01'),
(8, 'papa', 'asd', 'bryjara@cftla.cl', '04:44:23', '2022-07-01'),
(9, 'bryjara', 'asd', 'bryjara@cftla.cl', '04:44:23', '2022-07-01');

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `categoria`
--
ALTER TABLE `categoria`
  ADD PRIMARY KEY (`ID_categoria`);

--
-- Indices de la tabla `dedicacion`
--
ALTER TABLE `dedicacion`
  ADD PRIMARY KEY (`ID_dedicacion`);

--
-- Indices de la tabla `experiencia`
--
ALTER TABLE `experiencia`
  ADD PRIMARY KEY (`ID_externos`);

--
-- Indices de la tabla `historial`
--
ALTER TABLE `historial`
  ADD PRIMARY KEY (`ID_historial`);

--
-- Indices de la tabla `historico_usuario`
--
ALTER TABLE `historico_usuario`
  ADD PRIMARY KEY (`ID_crear`);

--
-- Indices de la tabla `jugador`
--
ALTER TABLE `jugador`
  ADD KEY `fk_jugador_usuario_idx` (`usuario_ID_usuario`),
  ADD KEY `fk_jugador_dedicacion1_idx` (`dedicacion_ID_dedicacion`),
  ADD KEY `fk_jugador_tipo_jugador1_idx` (`tipo_jugador_ID_Tipo`),
  ADD KEY `fk_jugador_preferencias_personales1_idx` (`preferencias_personales_ID_preferencias`),
  ADD KEY `fk_jugador_historial1_idx` (`historial_ID_historial`),
  ADD KEY `fk_jugador_experiencia1_idx` (`experiencia_ID_externos`),
  ADD KEY `fk_jugador_pericia1_idx` (`pericia_ID_pericia`),
  ADD KEY `fk_jugador_categoria1_idx` (`categoria_ID_categoria`),
  ADD KEY `fk_jugador_resultado1_idx` (`resultado_ID_resultado`);

--
-- Indices de la tabla `pericia`
--
ALTER TABLE `pericia`
  ADD PRIMARY KEY (`ID_pericia`);

--
-- Indices de la tabla `preferencias_personales`
--
ALTER TABLE `preferencias_personales`
  ADD PRIMARY KEY (`ID_preferencias`);

--
-- Indices de la tabla `resultado`
--
ALTER TABLE `resultado`
  ADD PRIMARY KEY (`ID_resultado`);

--
-- Indices de la tabla `tipo_jugador`
--
ALTER TABLE `tipo_jugador`
  ADD PRIMARY KEY (`ID_tipo`);

--
-- Indices de la tabla `usuario`
--
ALTER TABLE `usuario`
  ADD PRIMARY KEY (`ID_usuario`),
  ADD UNIQUE KEY `Nombre` (`Nombre`);

--
-- Indices de la tabla `usuarios_eliminados`
--
ALTER TABLE `usuarios_eliminados`
  ADD PRIMARY KEY (`ID_eliminar`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `historico_usuario`
--
ALTER TABLE `historico_usuario`
  MODIFY `ID_crear` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- AUTO_INCREMENT de la tabla `usuario`
--
ALTER TABLE `usuario`
  MODIFY `ID_usuario` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- AUTO_INCREMENT de la tabla `usuarios_eliminados`
--
ALTER TABLE `usuarios_eliminados`
  MODIFY `ID_eliminar` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- Restricciones para tablas volcadas
--

--
-- Filtros para la tabla `jugador`
--
ALTER TABLE `jugador`
  ADD CONSTRAINT `fk_jugador_categoria1` FOREIGN KEY (`categoria_ID_categoria`) REFERENCES `categoria` (`ID_categoria`),
  ADD CONSTRAINT `fk_jugador_dedicacion1` FOREIGN KEY (`dedicacion_ID_dedicacion`) REFERENCES `dedicacion` (`ID_dedicacion`),
  ADD CONSTRAINT `fk_jugador_experiencia1` FOREIGN KEY (`experiencia_ID_externos`) REFERENCES `experiencia` (`ID_externos`),
  ADD CONSTRAINT `fk_jugador_historial1` FOREIGN KEY (`historial_ID_historial`) REFERENCES `historial` (`ID_historial`),
  ADD CONSTRAINT `fk_jugador_pericia1` FOREIGN KEY (`pericia_ID_pericia`) REFERENCES `pericia` (`ID_pericia`),
  ADD CONSTRAINT `fk_jugador_preferencias_personales1` FOREIGN KEY (`preferencias_personales_ID_preferencias`) REFERENCES `preferencias_personales` (`ID_preferencias`),
  ADD CONSTRAINT `fk_jugador_resultado1` FOREIGN KEY (`resultado_ID_resultado`) REFERENCES `resultado` (`ID_resultado`),
  ADD CONSTRAINT `fk_jugador_tipo_jugador1` FOREIGN KEY (`tipo_jugador_ID_Tipo`) REFERENCES `tipo_jugador` (`ID_tipo`),
  ADD CONSTRAINT `fk_jugador_usuario` FOREIGN KEY (`usuario_ID_usuario`) REFERENCES `usuario` (`ID_usuario`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
