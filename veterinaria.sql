-- phpMyAdmin SQL Dump
-- version 5.1.0
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 12-05-2024 a las 23:21:01
-- Versión del servidor: 10.4.19-MariaDB
-- Versión de PHP: 8.0.6

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `magerit`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `activo`
--

CREATE TABLE `activo` (
  `idActivo` int(11) NOT NULL,
  `idTipoActivo` int(11) NOT NULL,
  `activo` varchar(100) NOT NULL,
  `confidencialidad` varchar(100) NOT NULL,
  `integridad` varchar(100) NOT NULL,
  `disponibilidad` varchar(100) NOT NULL,
  `trazabilidad` varchar(100) NOT NULL,
  `autenticidad` varchar(100) NOT NULL,
  `valor` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `activo`
--

INSERT INTO `activo` (`idActivo`, `idTipoActivo`, `activo`, `confidencialidad`, `integridad`, `disponibilidad`, `trazabilidad`, `autenticidad`, `valor`) VALUES
(1, 1, 'Nomina de empleados', 'Alto', 'Medio', 'Bajo', 'Alto', 'Bajo', 4),
(2, 1, 'Base de datos clientes', 'Medio', 'Alto', 'Alto', 'Alto', 'Medio', 4),
(11, 5, 'Red Local', 'Bajo', 'Bajo', 'Medio', 'Medio', 'Bajo', 2),
(17, 6, 'Modem', 'Bajo', 'Bajo', 'Bajo', 'Bajo', 'Bajo', 2),
(18, 6, 'Servidor', 'Medio', 'Medio', 'Alto', 'Medio', 'Medio', 4),
(19, 1, 'Camioneta', 'Bajo', 'Bajo', 'Bajo', 'Medio', 'Medio', 4);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `amenaza`
--

CREATE TABLE `amenaza` (
  `idAmenaza` int(11) NOT NULL,
  `idTipoAmenaza` int(11) NOT NULL,
  `idProbabilidad` int(11) NOT NULL,
  `amenaza` int(11) NOT NULL,
  `confidencialidad` int(11) DEFAULT NULL,
  `integridad` int(11) DEFAULT NULL,
  `disponibilidad` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `amenaza`
--

INSERT INTO `amenaza` (`idAmenaza`, `idTipoAmenaza`, `idProbabilidad`, `amenaza`, `confidencialidad`, `integridad`, `disponibilidad`) VALUES
(1, 1, 5, 3, 0, 0, 1),
(2, 3, 2, 17, 3, 2, 1),
(3, 4, 2, 34, 0, 2, 0),
(4, 3, 3, 26, 0, 0, 3),
(5, 3, 2, 27, 2, 0, 0),
(14, 4, 4, 52, 3, 0, 3),
(25, 3, 2, 27, 2, 0, 0),
(27, 4, 2, 36, 2, 2, 2),
(31, 3, 3, 31, 0, 0, 1),
(35, 2, 1, 4, 0, 0, 3),
(36, 3, 3, 32, 1, 0, 1),
(37, 4, 2, 50, 1, 0, 1),
(39, 1, 1, 1, 0, 0, 3),
(40, 3, 2, 17, 3, 2, 1),
(41, 4, 3, 52, 3, 0, 3),
(42, 1, 1, 1, 0, 0, 3),
(43, 4, 5, 38, 1, 1, 1);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `amenazaactivo`
--

CREATE TABLE `amenazaactivo` (
  `idAmenazaActivo` int(11) NOT NULL,
  `idActivo` int(11) NOT NULL,
  `idAmenaza` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `amenazaactivo`
--

INSERT INTO `amenazaactivo` (`idAmenazaActivo`, `idActivo`, `idAmenaza`) VALUES
(1, 1, 1),
(2, 1, 2),
(3, 1, 3),
(4, 2, 4),
(5, 2, 5),
(14, 1, 14),
(26, 11, 25),
(28, 11, 27),
(32, 11, 31),
(36, 17, 35),
(37, 17, 36),
(38, 17, 37),
(40, 18, 39),
(41, 18, 40),
(42, 18, 41),
(43, 19, 42),
(44, 19, 43);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `amenazas`
--

CREATE TABLE `amenazas` (
  `idAmenazas` int(11) NOT NULL,
  `amenaza` varchar(200) NOT NULL,
  `idTipoAmenaza` int(11) NOT NULL,
  `confidencialidad` tinyint(1) NOT NULL,
  `integridad` tinyint(1) NOT NULL,
  `disponibilidad` tinyint(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `amenazas`
--

INSERT INTO `amenazas` (`idAmenazas`, `amenaza`, `idTipoAmenaza`, `confidencialidad`, `integridad`, `disponibilidad`) VALUES
(1, 'Fuego', 1, 0, 0, 1),
(2, 'Daños por agua', 1, 0, 0, 1),
(3, 'Desastres naturales', 1, 0, 0, 1),
(4, 'Fuego', 2, 0, 0, 1),
(5, 'Daños por agua', 2, 0, 0, 1),
(6, 'Desastres industriales', 2, 0, 0, 1),
(7, 'Contaminación mecánica', 2, 0, 0, 1),
(8, 'Contaminación electromagnética', 2, 0, 0, 1),
(9, 'Avería de origen físico o lógico', 2, 0, 0, 1),
(10, 'Corte del suministro eléctrico', 2, 0, 0, 1),
(11, 'Condiciones inadecuadas de temperatura o humedad', 2, 0, 0, 1),
(12, 'Fallo de servicios de comunicaciones', 2, 0, 0, 1),
(13, 'Interrupción de otros servicios y suministros esenciales', 2, 0, 0, 1),
(14, 'Degradación de los soportes de almacenamiento de la información', 2, 0, 0, 1),
(15, 'Emanaciones electromagnéticas', 2, 1, 0, 0),
(16, 'Errores de los usuarios', 3, 1, 1, 1),
(17, 'Errores del administrador', 3, 1, 1, 1),
(18, 'Errores de monitorización (log)', 3, 0, 1, 0),
(19, 'Errores de configuración', 3, 0, 1, 0),
(20, 'Deficiencias en la organización ', 3, 0, 0, 1),
(21, 'Difusión de software dañino', 3, 1, 1, 1),
(22, 'Errores de [re-]encaminamiento', 3, 1, 0, 0),
(23, 'Errores de secuencia', 3, 0, 1, 0),
(24, 'Escapes de información', 3, 1, 0, 0),
(25, 'Alteración accidental de la información', 3, 0, 1, 0),
(26, 'Destrucción de información', 3, 0, 0, 1),
(27, 'Fugas de información', 3, 1, 0, 0),
(28, 'Vulnerabilidades de los programas (software)', 3, 1, 1, 1),
(29, 'Errores de mantenimiento / actualización de programas (software) ', 3, 0, 1, 1),
(30, 'Errores de mantenimiento / actualización de equipos (hardware)', 3, 0, 0, 1),
(31, 'Caída del sistema por agotamiento de recursos', 3, 0, 0, 1),
(32, 'Pérdida de equipos', 3, 1, 0, 1),
(33, 'Indisponibilidad del personal', 3, 0, 0, 1),
(34, 'Manipulación de los registros de actividad (log)', 4, 0, 1, 0),
(35, 'Manipulación de la configuración', 4, 1, 1, 1),
(36, 'Suplantación de la identidad del usuario ', 4, 1, 1, 1),
(37, 'Abuso de privilegios de acceso', 4, 1, 1, 1),
(38, 'Uso no previsto', 4, 1, 1, 1),
(39, 'Difusión de software dañino', 4, 1, 1, 1),
(40, '[Re-]encaminamiento de mensajes', 4, 1, 0, 0),
(41, 'Alteración de secuencia', 4, 0, 1, 0),
(42, 'Acceso no autorizado', 4, 1, 1, 0),
(43, 'Análisis de tráfico', 4, 1, 0, 0),
(44, 'Repudio', 4, 0, 1, 0),
(45, 'Interceptación de información (escucha)', 4, 1, 0, 0),
(46, 'Modificación deliberada de la información', 4, 0, 1, 0),
(47, 'Destrucción de información', 4, 0, 0, 1),
(48, 'Divulgación de información', 4, 1, 0, 0),
(49, 'Manipulación de programas', 4, 1, 1, 1),
(50, 'Manipulación de los equipos', 4, 1, 0, 1),
(51, 'Denegación de servicio', 4, 0, 0, 1),
(52, 'Robo', 4, 1, 0, 1),
(53, 'Ataque destructivo', 4, 0, 0, 1),
(54, 'Ocupación enemiga', 4, 1, 0, 1),
(55, 'Indisponibilidad del personal', 4, 0, 0, 1),
(56, 'Extorsión', 4, 1, 1, 1),
(57, 'Ingeniería social (picaresca)', 4, 1, 1, 1);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `amenazasalvaguarda`
--

CREATE TABLE `amenazasalvaguarda` (
  `idActivoSalvaguarda` int(11) NOT NULL,
  `idAmenaza` int(11) NOT NULL,
  `idSalvaguarda` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `amenazasalvaguarda`
--

INSERT INTO `amenazasalvaguarda` (`idActivoSalvaguarda`, `idAmenaza`, `idSalvaguarda`) VALUES
(1, 1, 1),
(4, 2, 2),
(5, 3, 3),
(6, 4, 4),
(7, 5, 5),
(14, 14, 14),
(26, 25, 26),
(28, 27, 28),
(32, 31, 32),
(36, 35, 36),
(37, 36, 37),
(38, 37, 38),
(40, 39, 40),
(41, 40, 41),
(42, 41, 42),
(43, 42, 43),
(44, 43, 44);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `probabilidad`
--

CREATE TABLE `probabilidad` (
  `idProbabilidad` int(11) NOT NULL,
  `probabilidad` varchar(100) NOT NULL,
  `valor` float NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `probabilidad`
--

INSERT INTO `probabilidad` (`idProbabilidad`, `probabilidad`, `valor`) VALUES
(1, 'Muy Poco Frecuente(MPF)', 0.01),
(2, 'Poco Frecuente(PF)', 0.1),
(3, 'Normal(N)', 1),
(4, 'Frecuente(F)', 10),
(5, 'Muy Frecuente(MF)', 100);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `proteccion`
--

CREATE TABLE `proteccion` (
  `idProteccion` int(11) NOT NULL,
  `nivel` varchar(100) NOT NULL,
  `proteccion` double NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `proteccion`
--

INSERT INTO `proteccion` (`idProteccion`, `nivel`, `proteccion`) VALUES
(1, 'Inexistente', 0),
(2, 'Inicial', 0.2),
(3, 'Reproducible', 0.4),
(4, 'Proceso Definido', 0.6),
(5, 'Gestionado y Medible', 0.8),
(6, 'Optimizado', 1);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `salvaguarda`
--

CREATE TABLE `salvaguarda` (
  `idSalvaguarda` int(11) NOT NULL,
  `idTipoSalvaguarda` int(11) NOT NULL,
  `idProteccion` int(11) NOT NULL,
  `salvaguarda` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `salvaguarda`
--

INSERT INTO `salvaguarda` (`idSalvaguarda`, `idTipoSalvaguarda`, `idProteccion`, `salvaguarda`) VALUES
(1, 1, 2, 8),
(2, 1, 5, 4),
(3, 1, 4, 3),
(4, 4, 6, 30),
(5, 5, 2, 43),
(14, 2, 5, 19),
(26, 4, 3, 33),
(28, 4, 4, 37),
(32, 4, 5, 32),
(36, 6, 6, 53),
(37, 6, 5, 55),
(38, 1, 4, 1),
(40, 1, 5, 16),
(41, 6, 4, 52),
(42, 6, 5, 53),
(43, 11, 5, 90),
(44, 11, 3, 91);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `salvaguardas`
--

CREATE TABLE `salvaguardas` (
  `idSalvaguardas` int(11) NOT NULL,
  `salvaguarda` varchar(150) NOT NULL,
  `idTipoSalva` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `salvaguardas`
--

INSERT INTO `salvaguardas` (`idSalvaguardas`, `salvaguarda`, `idTipoSalva`) VALUES
(1, 'Protecciones Generales', 1),
(2, 'Identificación y autenticación', 1),
(3, 'Control de acceso lógico ', 1),
(4, 'Segregación de tareas', 1),
(5, 'Gestión de incidencias', 1),
(6, 'Herramientas de seguridad ', 1),
(7, 'Herramienta contra código dañino', 1),
(8, 'IDS/IPS: Herramienta de detección / prevención de intrusión', 1),
(9, 'Herramienta de chequeo de configuración', 1),
(10, 'Herramienta de análisis de vulnerabilidades', 1),
(11, 'Herramienta de monitorización de tráfico', 1),
(12, 'DLP: Herramienta de monitorización de contenidos', 1),
(13, 'Herramienta para análisis de logs', 1),
(14, 'Honey net / honey pot', 1),
(15, 'Verificación de las funciones de seguridad', 1),
(16, 'Gestión de vulnerabilidades', 1),
(17, 'Registro y auditoría', 1),
(18, 'Protección de la Información', 2),
(19, 'Copias de seguridad de los datos (backup)', 2),
(20, 'Aseguramiento de la integridad', 2),
(21, 'Cifrado de la información', 2),
(22, 'Uso de firmas electrónicas', 2),
(23, 'Uso de servicios de fechado electrónico (time stamping)', 2),
(24, 'Gestión de claves criptográficas', 3),
(25, 'Gestión de claves de cifra de información', 3),
(26, 'Gestión de claves de firma de información', 3),
(27, 'Gestión de claves para contenedores criptográficos', 3),
(28, 'Gestión de claves de comunicaciones', 3),
(29, 'Gestión de certificados', 3),
(30, 'Protección de los Servicios', 4),
(31, 'Aseguramiento de la disponibilidad', 4),
(32, 'Aceptación y puesta en operación', 4),
(33, 'Se aplican perfiles de seguridad', 4),
(34, 'Explotación', 4),
(35, 'Gestión de cambios (mejoras y sustituciones)', 4),
(36, 'Terminación', 4),
(37, 'Protección de servicios y aplicaciones web', 4),
(38, 'Protección del correo electrónico', 4),
(39, 'Protección del directorio', 4),
(40, 'Protección del servidor de nombres de dominio (DNS)', 4),
(41, 'Teletrabajo', 4),
(42, 'Voz sobre IP', 4),
(43, 'Protección de las Aplicaciones Informáticas', 5),
(44, 'Copias de seguridad (backup)', 5),
(45, 'Puesta en producción', 5),
(46, 'Se aplican perfiles de seguridad', 5),
(47, 'Explotación / Producción', 5),
(48, 'Cambios (actualizaciones y mantenimiento)', 5),
(49, 'Terminación', 5),
(50, 'Protección de los Equipos Informáticos', 6),
(51, 'Puesta en producción', 6),
(52, 'Se aplican perfiles de seguridad', 6),
(53, 'Aseguramiento de la disponibilidad', 6),
(54, 'Operación', 6),
(55, 'Cambios (actualizaciones y mantenimiento)', 6),
(56, 'Terminación', 6),
(57, 'Informática móvil', 6),
(58, 'Reproducción de documentos', 6),
(59, 'Protección de la centralita telefónica (PABX)', 6),
(60, 'Protección de las Comunicaciones', 7),
(61, 'Entrada en servicio', 7),
(62, 'Se aplican perfiles de seguridad', 7),
(63, 'Aseguramiento de la disponibilidad', 7),
(64, 'Autenticación del canal', 7),
(65, 'Protección de la integridad de los datos intercambiados', 7),
(66, 'Protección criptográfica de la confidencialidad de los datos intercambiados', 7),
(67, 'Operación', 7),
(68, 'Cambios (actualizaciones y mantenimiento)', 7),
(69, 'Terminación', 7),
(70, 'Internet: uso de ? acceso a', 7),
(71, 'Seguridad Wireless (WiFi)', 7),
(72, 'Telefonía móvil', 7),
(73, 'Segregación de las redes en dominios', 7),
(74, 'Puntos de interconexión: conexiones entre zonas de confianza', 8),
(75, 'Sistema de protección perimetral', 8),
(76, 'Protección de los equipos de frontera', 8),
(77, 'Protección de los Soportes de Información', 9),
(78, 'Aseguramiento de la disponibilidad', 9),
(79, 'Protección criptográfica del contenido', 9),
(80, 'Limpieza de contenidos', 9),
(81, 'Destrucción de soportes', 9),
(82, 'Elementos Auxiliares', 10),
(83, 'Aseguramiento de la disponibilidad', 10),
(84, 'Instalación', 10),
(85, 'Suministro eléctrico', 10),
(86, 'Climatización', 10),
(87, 'Protección del cableado', 10),
(88, 'Protección de las Instalaciones', 11),
(89, 'Diseño', 11),
(90, 'Defensa en profundidad', 11),
(91, 'Control de los accesos físicos', 11),
(92, 'Aseguramiento de la disponibilidad', 11),
(93, 'Terminación', 11),
(94, 'Gestión del Personal', 12),
(95, 'Formación y concienciación', 12),
(96, 'Aseguramiento de la disponibilidad', 12),
(97, 'Organización', 13),
(98, 'Gestión de riesgos', 13),
(99, 'Planificación de la seguridad', 13),
(100, 'Inspecciones de seguridad', 13),
(101, 'Continuidad del negocio', 14),
(102, 'Análisis de impacto (BIA)', 14),
(103, 'Plan de Recuperación de Desastres (DRP) ', 14),
(104, 'Relaciones Externas', 15),
(105, 'Acuerdos para intercambio de información y software', 15),
(106, 'Acceso externo', 15),
(107, 'Servicios proporcionados por otras organizaciones', 15),
(108, 'Personal subcontratado', 15),
(109, 'Adquisición / desarrollo', 16),
(110, 'Productos certificados o acreditados', 16),
(111, 'Servicios: Adquisición o desarrollo', 16),
(112, 'Aplicaciones: Adquisición o desarrollo', 16),
(113, 'Equipos: Adquisición o desarrollo', 16),
(114, 'Comunicaciones: Adquisición o contratación', 16),
(115, 'Soportes de Información: Adquisición', 16);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tipoactivo`
--

CREATE TABLE `tipoactivo` (
  `idTipoActivo` int(11) NOT NULL,
  `tipoActivo` varchar(100) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `tipoactivo`
--

INSERT INTO `tipoactivo` (`idTipoActivo`, `tipoActivo`) VALUES
(1, 'Datos'),
(2, 'Recursos Administrativos'),
(3, 'Aplicaciones de Software'),
(4, 'Servicios'),
(5, 'Comunicaciones'),
(6, 'Equipos(Hardware)'),
(7, 'Recursos Fisicos'),
(8, 'Recursos Humanos');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tipoamenaza`
--

CREATE TABLE `tipoamenaza` (
  `idTipoAmenaza` int(11) NOT NULL,
  `tipoAmenaza` varchar(200) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `tipoamenaza`
--

INSERT INTO `tipoamenaza` (`idTipoAmenaza`, `tipoAmenaza`) VALUES
(1, 'Desastres Naturales'),
(2, 'De Origen Industrial'),
(3, 'Errores y Fallos no Intencionados'),
(4, 'Ataques Intencionados');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tiposalvaguarda`
--

CREATE TABLE `tiposalvaguarda` (
  `idTipoSalvaguarda` int(11) NOT NULL,
  `tipoSalvaguarda` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `tiposalvaguarda`
--

INSERT INTO `tiposalvaguarda` (`idTipoSalvaguarda`, `tipoSalvaguarda`) VALUES
(1, 'Protecciones generales u horizontales'),
(2, 'Protección de los datos/información'),
(3, ' Protección de las claves criptográficas '),
(4, 'Protección de los servicios'),
(5, 'Protección de las aplicaciones (software) '),
(6, 'Protección de los equipos (hardware)'),
(7, 'Protección de las comunicaciones '),
(8, 'Protección en los puntos de interconexión con otros sistemas '),
(9, 'Protección de los soportes de información'),
(10, 'Protección de los elementos auxiliares'),
(11, 'Seguridad física – Protección de las instalaciones'),
(12, 'Salvaguardas relativas al personal '),
(13, 'Salvaguardas de tipo organizativo '),
(14, 'Continuidad de operaciones'),
(15, 'Externalización '),
(16, 'Adquisición y desarrollo');

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `activo`
--
ALTER TABLE `activo`
  ADD PRIMARY KEY (`idActivo`),
  ADD KEY `idTipoActivo` (`idTipoActivo`);

--
-- Indices de la tabla `amenaza`
--
ALTER TABLE `amenaza`
  ADD PRIMARY KEY (`idAmenaza`),
  ADD KEY `idTipoAmenaza` (`idTipoAmenaza`),
  ADD KEY `idProbabilidad` (`idProbabilidad`),
  ADD KEY `amenaza` (`amenaza`);

--
-- Indices de la tabla `amenazaactivo`
--
ALTER TABLE `amenazaactivo`
  ADD PRIMARY KEY (`idAmenazaActivo`),
  ADD KEY `idActivo` (`idActivo`),
  ADD KEY `idAmenaza` (`idAmenaza`);

--
-- Indices de la tabla `amenazas`
--
ALTER TABLE `amenazas`
  ADD PRIMARY KEY (`idAmenazas`),
  ADD KEY `idTipoAmenaza` (`idTipoAmenaza`);

--
-- Indices de la tabla `amenazasalvaguarda`
--
ALTER TABLE `amenazasalvaguarda`
  ADD PRIMARY KEY (`idActivoSalvaguarda`),
  ADD KEY `idActivo` (`idAmenaza`),
  ADD KEY `idSalvaguarda` (`idSalvaguarda`);

--
-- Indices de la tabla `probabilidad`
--
ALTER TABLE `probabilidad`
  ADD PRIMARY KEY (`idProbabilidad`);

--
-- Indices de la tabla `proteccion`
--
ALTER TABLE `proteccion`
  ADD PRIMARY KEY (`idProteccion`);

--
-- Indices de la tabla `salvaguarda`
--
ALTER TABLE `salvaguarda`
  ADD PRIMARY KEY (`idSalvaguarda`),
  ADD KEY `idTipoSalvaguarda` (`idTipoSalvaguarda`),
  ADD KEY `idTipoProteccion` (`idProteccion`),
  ADD KEY `salvaguarda` (`salvaguarda`);

--
-- Indices de la tabla `salvaguardas`
--
ALTER TABLE `salvaguardas`
  ADD PRIMARY KEY (`idSalvaguardas`),
  ADD KEY `idTipoSalva` (`idTipoSalva`);

--
-- Indices de la tabla `tipoactivo`
--
ALTER TABLE `tipoactivo`
  ADD PRIMARY KEY (`idTipoActivo`);

--
-- Indices de la tabla `tipoamenaza`
--
ALTER TABLE `tipoamenaza`
  ADD PRIMARY KEY (`idTipoAmenaza`);

--
-- Indices de la tabla `tiposalvaguarda`
--
ALTER TABLE `tiposalvaguarda`
  ADD PRIMARY KEY (`idTipoSalvaguarda`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `activo`
--
ALTER TABLE `activo`
  MODIFY `idActivo` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=22;

--
-- AUTO_INCREMENT de la tabla `amenaza`
--
ALTER TABLE `amenaza`
  MODIFY `idAmenaza` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=46;

--
-- AUTO_INCREMENT de la tabla `amenazaactivo`
--
ALTER TABLE `amenazaactivo`
  MODIFY `idAmenazaActivo` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=47;

--
-- AUTO_INCREMENT de la tabla `amenazas`
--
ALTER TABLE `amenazas`
  MODIFY `idAmenazas` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=78;

--
-- AUTO_INCREMENT de la tabla `amenazasalvaguarda`
--
ALTER TABLE `amenazasalvaguarda`
  MODIFY `idActivoSalvaguarda` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=47;

--
-- AUTO_INCREMENT de la tabla `probabilidad`
--
ALTER TABLE `probabilidad`
  MODIFY `idProbabilidad` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT de la tabla `proteccion`
--
ALTER TABLE `proteccion`
  MODIFY `idProteccion` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT de la tabla `salvaguarda`
--
ALTER TABLE `salvaguarda`
  MODIFY `idSalvaguarda` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=47;

--
-- AUTO_INCREMENT de la tabla `salvaguardas`
--
ALTER TABLE `salvaguardas`
  MODIFY `idSalvaguardas` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=657;

--
-- AUTO_INCREMENT de la tabla `tipoactivo`
--
ALTER TABLE `tipoactivo`
  MODIFY `idTipoActivo` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT de la tabla `tipoamenaza`
--
ALTER TABLE `tipoamenaza`
  MODIFY `idTipoAmenaza` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT de la tabla `tiposalvaguarda`
--
ALTER TABLE `tiposalvaguarda`
  MODIFY `idTipoSalvaguarda` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=19;

--
-- Restricciones para tablas volcadas
--

--
-- Filtros para la tabla `activo`
--
ALTER TABLE `activo`
  ADD CONSTRAINT `activo_ibfk_1` FOREIGN KEY (`idTipoActivo`) REFERENCES `tipoactivo` (`idTipoActivo`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Filtros para la tabla `amenaza`
--
ALTER TABLE `amenaza`
  ADD CONSTRAINT `amenaza_ibfk_1` FOREIGN KEY (`idTipoAmenaza`) REFERENCES `tipoamenaza` (`idTipoAmenaza`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `amenaza_ibfk_2` FOREIGN KEY (`idProbabilidad`) REFERENCES `probabilidad` (`idProbabilidad`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `amenaza_ibfk_3` FOREIGN KEY (`amenaza`) REFERENCES `amenazas` (`idAmenazas`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Filtros para la tabla `amenazaactivo`
--
ALTER TABLE `amenazaactivo`
  ADD CONSTRAINT `amenazaactivo_ibfk_1` FOREIGN KEY (`idActivo`) REFERENCES `activo` (`idActivo`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `amenazaactivo_ibfk_2` FOREIGN KEY (`idAmenaza`) REFERENCES `amenaza` (`idAmenaza`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Filtros para la tabla `amenazas`
--
ALTER TABLE `amenazas`
  ADD CONSTRAINT `amenazas_ibfk_1` FOREIGN KEY (`idTipoAmenaza`) REFERENCES `tipoamenaza` (`idTipoAmenaza`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Filtros para la tabla `amenazasalvaguarda`
--
ALTER TABLE `amenazasalvaguarda`
  ADD CONSTRAINT `amenazasalvaguarda_ibfk_2` FOREIGN KEY (`idSalvaguarda`) REFERENCES `salvaguarda` (`idSalvaguarda`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `amenazasalvaguarda_ibfk_3` FOREIGN KEY (`idAmenaza`) REFERENCES `amenaza` (`idAmenaza`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Filtros para la tabla `salvaguarda`
--
ALTER TABLE `salvaguarda`
  ADD CONSTRAINT `salvaguarda_ibfk_1` FOREIGN KEY (`idProteccion`) REFERENCES `proteccion` (`idProteccion`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `salvaguarda_ibfk_2` FOREIGN KEY (`idTipoSalvaguarda`) REFERENCES `tiposalvaguarda` (`idTipoSalvaguarda`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `salvaguarda_ibfk_3` FOREIGN KEY (`salvaguarda`) REFERENCES `salvaguardas` (`idSalvaguardas`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Filtros para la tabla `salvaguardas`
--
ALTER TABLE `salvaguardas`
  ADD CONSTRAINT `salvaguardas_ibfk_1` FOREIGN KEY (`idTipoSalva`) REFERENCES `tiposalvaguarda` (`idTipoSalvaguarda`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
