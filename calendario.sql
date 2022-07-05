--
-- Base de datos: `calendario`
--
CREATE DATABASE calendario;
USE calendario;
-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `evento`
--

CREATE TABLE `evento` (
  `ID_Evento` int(11) NOT NULL,
  `Titulo` varchar(50) NOT NULL,
  `Descripcion` varchar(45) DEFAULT NULL,
  `Fecha` date DEFAULT NULL,
  `Hora_inicio` time DEFAULT NULL,
  `Hora_termino` time DEFAULT NULL,
  `Tipo` varchar(100) NOT NULL,
  `Ubicacion` varchar(100) NOT NULL,
  `idpersona_` int(11) NOT NULL,
  `idPublico_` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `persona`
--

CREATE TABLE `persona` (
  `idpersona` int(11) NOT NULL,
  `Run` varchar(13) NOT NULL,
  `Nombre` varchar(45) DEFAULT NULL,
  `Apellido` varchar(45) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `persona`
--

INSERT INTO `persona` (`idpersona`, `Run`, `Nombre`, `Apellido`) VALUES
(1, '20961576-2', 'bryan', 'jara');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `publico`
--

CREATE TABLE `publico` (
  `idpublico` int(11) NOT NULL,
  `Tipo` varchar(45) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `publico`
--

INSERT INTO `publico` (`idpublico`, `Tipo`) VALUES
(1, 'Estudiantes'),
(2, 'Profesores'),
(3, 'Directiva'),
(4, 'Todo publico');

-- --------------------------------------------------------

--
-- Estructura Stand-in para la vista `ver_datos`
-- (Véase abajo para la vista actual)
--
CREATE TABLE `ver_datos` (
`ID_Evento` int(11)
,`Titulo` varchar(50)
,`Descripcion` varchar(45)
,`Fecha` date
,`Hora_inicio` time
,`Hora_termino` time
,`Tipo` varchar(100)
,`Ubicacion` varchar(100)
,`Nombre` varchar(45)
,`Apellido` varchar(45)
,`Tipo_publico` varchar(45)
);

-- --------------------------------------------------------

--
-- Estructura para la vista `ver_datos`
--
DROP TABLE IF EXISTS `ver_datos`;

CREATE ALGORITHM=UNDEFINED DEFINER=`root`@`localhost` SQL SECURITY DEFINER VIEW `ver_datos`  AS SELECT `e`.`ID_Evento` AS `ID_Evento`, `e`.`Titulo` AS `Titulo`, `e`.`Descripcion` AS `Descripcion`, `e`.`Fecha` AS `Fecha`, `e`.`Hora_inicio` AS `Hora_inicio`, `e`.`Hora_termino` AS `Hora_termino`, `e`.`Tipo` AS `Tipo`, `e`.`Ubicacion` AS `Ubicacion`, `p`.`Nombre` AS `Nombre`, `p`.`Apellido` AS `Apellido`, `pu`.`Tipo` AS `Tipo_publico` FROM ((`evento` `e` join `persona` `p` on(`p`.`idpersona` = `e`.`idpersona_`)) join `publico` `pu` on(`pu`.`idpublico` = `e`.`idPublico_`))  ;

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `evento`
--
ALTER TABLE `evento`
  ADD PRIMARY KEY (`ID_Evento`),
  ADD KEY `fk_Evento_Persona_idx` (`idpersona_`),
  ADD KEY `fk_Evento_publico_idx` (`idPublico_`);

--
-- Indices de la tabla `persona`
--
ALTER TABLE `persona`
  ADD PRIMARY KEY (`idpersona`);

--
-- Indices de la tabla `publico`
--
ALTER TABLE `publico`
  ADD PRIMARY KEY (`idpublico`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `evento`
--
ALTER TABLE `evento`
  MODIFY `ID_Evento` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=1;

--
-- AUTO_INCREMENT de la tabla `persona`
--
ALTER TABLE `persona`
  MODIFY `idpersona` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT de la tabla `publico`
--
ALTER TABLE `publico`
  MODIFY `idpublico` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- Restricciones para tablas volcadas
--

--
-- Filtros para la tabla `evento`
--
ALTER TABLE `evento`
  ADD CONSTRAINT `fk_Evento_Persona` FOREIGN KEY (`idpersona_`) REFERENCES `persona` (`idpersona`) ON DELETE CASCADE,
  ADD CONSTRAINT `fk_Evento_publico` FOREIGN KEY (`idPublico_`) REFERENCES `publico` (`idpublico`);

