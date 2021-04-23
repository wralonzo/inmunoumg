-- phpMyAdmin SQL Dump
-- version 4.9.0.1
-- https://www.phpmyadmin.net/
--
-- Servidor: sql307.byetcluster.com
-- Tiempo de generación: 23-04-2021 a las 18:45:43
-- Versión del servidor: 5.6.48-88.0
-- Versión de PHP: 7.2.22

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `frsiv_27980718_diaco`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `company`
--

CREATE TABLE `company` (
  `id_company` int(11) NOT NULL,
  `nombre_company` varchar(100) NOT NULL,
  `propietario_company` varchar(100) NOT NULL,
  `region_company` int(11) NOT NULL,
  `municipio_company` int(100) DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `company`
--

INSERT INTO `company` (`id_company`, `nombre_company`, `propietario_company`, `region_company`, `municipio_company`) VALUES
(14, 'Coca Cola', 'Kevin Cortez', 4, 50);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `departamento`
--

CREATE TABLE `departamento` (
  `id_departamento` int(11) NOT NULL,
  `nombre_departamento` varchar(100) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `departamento`
--

INSERT INTO `departamento` (`id_departamento`, `nombre_departamento`) VALUES
(1, 'Alta Verapaz'),
(2, 'Baja Verapaz'),
(3, 'Chimaltenango'),
(4, 'Chiquimula'),
(5, 'El Progreso'),
(6, 'Escuintla'),
(7, 'Guatemala'),
(8, 'Huehuetenango'),
(9, 'Izabal'),
(10, 'Jalapa'),
(11, 'Jutiapa'),
(12, 'Petén'),
(13, 'Quetzaltenango'),
(14, 'Quiché'),
(15, 'Retalhuleu'),
(16, 'Sacatepéquez'),
(17, 'San Marcos'),
(18, 'Santa Rosa'),
(19, 'Solola'),
(20, 'Suchitepéquez'),
(21, 'Totonicapán'),
(22, 'Zacapa');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `empleado`
--

CREATE TABLE `empleado` (
  `id_empleado` int(11) NOT NULL,
  `nombres` varchar(100) NOT NULL,
  `apellidos` varchar(100) NOT NULL,
  `correo` varchar(100) NOT NULL,
  `direccion` varchar(100) NOT NULL,
  `telefono` varchar(15) NOT NULL,
  `fecha` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `empleado`
--

INSERT INTO `empleado` (`id_empleado`, `nombres`, `apellidos`, `correo`, `direccion`, `telefono`, `fecha`) VALUES
(5, 'Kevin', 'Cortez', 'diaco@gmail.com', 'Chiquimula, Chiquimula', '30661056', '2021-04-14 03:56:15'),
(12, 'PAGINA WEB', '', 'sincorreo@gmail.com', 'Pagina web ', '2222 2222', '2021-04-18 02:15:13');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `municipio`
--

CREATE TABLE `municipio` (
  `id_municipio` int(11) NOT NULL,
  `nombre_municipio` varchar(100) NOT NULL,
  `deparmaneto_municipio` int(11) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `municipio`
--

INSERT INTO `municipio` (`id_municipio`, `nombre_municipio`, `deparmaneto_municipio`) VALUES
(1, 'Chahal', 1),
(2, 'Chisec', 1),
(3, 'Cobán', 1),
(4, 'Fray Bartolomé de las Casas', 1),
(5, 'La Tinta', 1),
(6, 'Lanquín', 1),
(7, 'Panzós', 1),
(8, 'Raxruhá', 1),
(9, 'San Cristóbal Verapaz', 1),
(10, 'San Juan Chamelco', 1),
(11, 'San Pedro Carchá', 1),
(12, 'Santa Cruz Verapaz', 1),
(13, 'Santa María Cahabón', 1),
(14, 'Senahú', 1),
(15, 'Tamahú', 1),
(16, 'Tactic', 1),
(17, 'Tucurú', 1),
(18, 'Cubulco', 2),
(19, 'Granados', 2),
(20, 'Purulhá', 2),
(21, 'Rabinal', 2),
(22, 'Salamá', 2),
(23, 'San Jerónimo', 2),
(24, 'San Miguel Chicaj', 2),
(25, 'Santa Cruz el Chol', 2),
(26, 'Acatenango', 3),
(27, 'Chimaltenango', 3),
(28, 'El Tejar', 3),
(29, 'Parramos', 3),
(30, 'Patzicía', 3),
(31, 'Patzún', 3),
(32, 'Pochuta', 3),
(33, 'San Andrés Itzapa', 3),
(34, 'San José Poaquíl', 3),
(35, 'San Juan Comalapa', 3),
(36, 'San Martín Jilotepeque', 3),
(37, 'Santa Apolonia', 3),
(38, 'Santa Cruz Balanyá', 3),
(39, 'Tecpán', 3),
(40, 'Yepocapa', 3),
(41, 'Zaragoza', 3),
(42, 'Camotán', 4),
(43, 'Chiquimula', 4),
(44, 'Concepción Las Minas', 4),
(45, 'Esquipulas', 4),
(46, 'Ipala', 4),
(47, 'Jocotán', 4),
(48, 'Olopa', 4),
(49, 'Quezaltepeque', 4),
(50, 'San Jacinto', 4),
(51, 'San José la Arada', 4),
(52, 'San Juan Ermita', 4),
(53, 'El Jícaro', 5),
(54, 'Guastatoya', 5),
(55, 'Morazán', 5),
(56, 'San Agustín Acasaguastlán', 5),
(57, 'San Antonio La Paz', 5),
(58, 'San Cristóbal Acasaguastlán', 5),
(59, 'Sanarate', 5),
(60, 'Sansare', 5),
(61, 'Escuintla', 6),
(62, 'Guanagazapa', 6),
(63, 'Iztapa', 6),
(64, 'La Democracia', 6),
(65, 'La Gomera', 6),
(66, 'Masagua', 6),
(67, 'Nueva Concepción', 6),
(68, 'Palín', 6),
(69, 'San José', 6),
(70, 'San Vicente Pacaya', 6),
(71, 'Santa Lucía Cotzumalguapa', 6),
(72, 'Siquinalá', 6),
(73, 'Tiquisate', 6),
(74, 'Amatitlán', 7),
(75, 'Chinautla', 7),
(76, 'Chuarrancho', 7),
(77, 'Guatemala', 7),
(78, 'Fraijanes', 7),
(79, 'Mixco', 7),
(80, 'Palencia', 7),
(81, 'San José del Golfo', 7),
(82, 'San José Pinula', 7),
(83, 'San Juan Sacatepéquez', 7),
(84, 'San Miguel Petapa', 7),
(85, 'San Pedro Ayampuc', 7),
(86, 'San Pedro Sacatepéquez', 7),
(87, 'San Raymundo', 7),
(88, 'Santa Catarina Pinula', 7),
(89, 'Villa Canales', 7),
(90, 'Villa Nueva', 7),
(91, 'Aguacatán', 8),
(92, 'Chiantla', 8),
(93, 'Colotenango', 8),
(94, 'Concepción Huista', 8),
(95, 'Cuilco', 8),
(96, 'Huehuetenango', 8),
(97, 'Jacaltenango', 8),
(98, 'La Democracia', 8),
(99, 'La Libertad', 8),
(100, 'Malacatancito', 8),
(101, 'Nentón', 8),
(102, 'San Antonio Huista', 8),
(103, 'San Gaspar Ixchil', 8),
(104, 'San Ildefonso Ixtahuacán', 8),
(105, 'San Juan Atitán', 8),
(106, 'San Juan Ixcoy', 8),
(107, 'San Mateo Ixtatán', 8),
(108, 'San Miguel Acatán', 8),
(109, 'San Pedro Nécta', 8),
(110, 'San Pedro Soloma', 8),
(111, 'San Rafael La Independencia', 8),
(112, 'San Rafael Pétzal', 8),
(113, 'San Sebastián Coatán', 8),
(114, 'San Sebastián Huehuetenango', 8),
(115, 'Santa Ana Huista', 8),
(116, 'Santa Bárbara', 8),
(117, 'Santa Cruz Barillas', 8),
(118, 'Santa Eulalia', 8),
(119, 'Santiago Chimaltenango', 8),
(120, 'Tectitán', 8),
(121, 'Todos Santos Cuchumatán', 8),
(122, 'Unión Cantinil', 8),
(123, 'El Estor', 9),
(124, 'Livingston', 9),
(125, 'Los Amates', 9),
(126, 'Morales', 9),
(127, 'Puerto Barrios', 9),
(128, 'Jalapa', 10),
(129, 'Mataquescuintla', 10),
(130, 'Monjas', 10),
(131, 'San Carlos Alzatate', 10),
(132, 'San Luis Jilotepeque', 10),
(133, 'San Manuel Chaparrón', 10),
(134, 'San Pedro Pinula', 10),
(135, 'Agua Blanca', 11),
(136, 'Asunción Mita', 11),
(137, 'Atescatempa', 11),
(138, 'Comapa', 11),
(139, 'Conguaco', 11),
(140, 'El Adelanto', 11),
(141, 'El Progreso', 11),
(142, 'Jalpatagua', 11),
(143, 'Jerez', 11),
(144, 'Jutiapa', 11),
(145, 'Moyuta', 11),
(146, 'Pasaco', 11),
(147, 'Quesada', 11),
(148, 'San José Acatempa', 11),
(149, 'Santa Catarina Mita', 11),
(150, 'Yupiltepeque', 11),
(151, 'Zapotitlán', 11),
(152, 'Dolores', 12),
(153, 'El Chal', 12),
(154, 'Ciudad Flores', 12),
(155, 'La Libertad', 12),
(156, 'Las Cruces', 12),
(157, 'Melchor de Mencos', 12),
(158, 'Poptún', 12),
(159, 'San Andrés', 12),
(160, 'San Benito', 12),
(161, 'San Francisco', 12),
(162, 'San José', 12),
(163, 'San Luis', 12),
(164, 'Santa Ana', 12),
(165, 'Sayaxché', 12),
(166, 'Almolonga', 13),
(167, 'Cabricán', 13),
(168, 'Cajolá', 13),
(169, 'Cantel', 13),
(170, 'Coatepeque', 13),
(171, 'Colomba Costa Cuca', 13),
(172, 'Concepción Chiquirichapa', 13),
(173, 'El Palmar', 13),
(174, 'Flores Costa Cuca', 13),
(175, 'Génova', 13),
(176, 'Huitán', 13),
(177, 'La Esperanza', 13),
(178, 'Olintepeque', 13),
(179, 'Palestina de Los Altos', 13),
(180, 'Quetzaltenango', 13),
(181, 'Salcajá', 13),
(182, 'San Carlos Sija', 13),
(183, 'San Francisco La Unión', 13),
(184, 'San Juan Ostuncalco', 13),
(185, 'San Martín Sacatepéquez', 13),
(186, 'San Mateo', 13),
(187, 'San Miguel Sigüilá', 13),
(188, 'Sibilia', 13),
(189, 'Zunil', 13),
(190, 'Canillá', 14),
(191, 'Chajul', 14),
(192, 'Chicamán', 14),
(193, 'Chiché', 14),
(194, 'Chichicastenango', 14),
(195, 'Chinique', 14),
(196, 'Cunén', 14),
(197, 'Ixcán Playa Grande', 14),
(198, 'Joyabaj', 14),
(199, 'Nebaj', 14),
(200, 'Pachalum', 14),
(201, 'Patzité', 14),
(202, 'Sacapulas', 14),
(203, 'San Andrés Sajcabajá', 14),
(204, 'San Antonio Ilotenango', 14),
(205, 'San Bartolomé Jocotenango', 14),
(206, 'San Juan Cotzal', 14),
(207, 'San Pedro Jocopilas', 14),
(208, 'Santa Cruz del Quiché', 14),
(209, 'Uspantán', 14),
(210, 'Zacualpa', 14),
(211, 'Champerico', 15),
(212, 'El Asintal', 15),
(213, 'Nuevo San Carlos', 15),
(214, 'Retalhuleu', 15),
(215, 'San Andrés Villa Seca', 15),
(216, 'San Felipe Reu', 15),
(217, 'San Martín Zapotitlán', 15),
(218, 'San Sebastián', 15),
(219, 'Santa Cruz Muluá', 15),
(220, 'Alotenango', 16),
(221, 'Ciudad Vieja', 16),
(222, 'Jocotenango', 16),
(223, 'Antigua Guatemala', 16),
(224, 'Magdalena Milpas Altas', 16),
(225, 'Pastores', 16),
(226, 'San Antonio Aguas Calientes', 16),
(227, 'San Bartolomé Milpas Altas', 16),
(228, 'San Lucas Sacatepéquez', 16),
(229, 'San Miguel Dueñas', 16),
(230, 'Santa Catarina Barahona', 16),
(231, 'Santa Lucía Milpas Altas', 16),
(232, 'Santa María de Jesús', 16),
(233, 'Santiago Sacatepéquez', 16),
(234, 'Santo Domingo Xenacoj', 16),
(235, 'Sumpango', 16),
(236, 'Ayutla', 17),
(237, 'Catarina', 17),
(238, 'Comitancillo', 17),
(239, 'Concepción Tutuapa', 17),
(240, 'El Quetzal', 17),
(241, 'El Tumbador', 17),
(242, 'Esquipulas Palo Gordo', 17),
(243, 'Ixchiguán', 17),
(244, 'La Blanca', 17),
(245, 'La Reforma', 17),
(246, 'Malacatán', 17),
(247, 'Nuevo Progreso', 17),
(248, 'Ocós', 17),
(249, 'Pajapita', 17),
(250, 'Río Blanco', 17),
(251, 'San Antonio Sacatepéquez', 17),
(252, 'San Cristóbal Cucho', 17),
(253, 'San José El Rodeo', 17),
(254, 'San José Ojetenam', 17),
(255, 'San Lorenzo', 17),
(256, 'San Marcos', 17),
(257, 'San Miguel Ixtahuacán', 17),
(258, 'San Pablo', 17),
(259, 'San Pedro Sacatepéquez', 17),
(260, 'San Rafael Pie de la Cuesta', 17),
(261, 'Sibinal', 17),
(262, 'Sipacapa', 17),
(263, 'Tacaná', 17),
(264, 'Tajumulco', 17),
(265, 'Tejutla', 17),
(266, 'Barberena', 18),
(267, 'Casillas', 18),
(268, 'Chiquimulilla', 18),
(269, 'Cuilapa', 18),
(270, 'Guazacapán', 18),
(271, 'Nueva Santa Rosa', 18),
(272, 'Oratorio', 18),
(273, 'Pueblo Nuevo Viñas', 18),
(274, 'San Juan Tecuaco', 18),
(275, 'San Rafael las Flores', 18),
(276, 'Santa Cruz Naranjo', 18),
(277, 'Santa María Ixhuatán', 18),
(278, 'Santa Rosa de Lima', 18),
(279, 'Taxisco', 18),
(280, 'Concepción', 19),
(281, 'Nahualá', 19),
(282, 'Panajachel', 19),
(283, 'San Andrés Semetabaj', 19),
(284, 'San Antonio Palopó', 19),
(285, 'San José Chacayá', 19),
(286, 'San Juan La Laguna', 19),
(287, 'San Lucas Tolimán', 19),
(288, 'San Marcos La Laguna', 19),
(289, 'San Pablo La Laguna', 19),
(290, 'San Pedro La Laguna', 19),
(291, 'Santa Catarina Ixtahuacán', 19),
(292, 'Santa Catarina Palopó', 19),
(293, 'Santa Clara La Laguna', 19),
(294, 'Santa Cruz La Laguna', 19),
(295, 'Santa Lucía Utatlán', 19),
(296, 'Santa María Visitación', 19),
(297, 'Santiago Atitlán', 19),
(298, 'Sololá', 19),
(299, 'Chicacao', 20),
(300, 'Cuyotenango', 20),
(301, 'Mazatenango', 20),
(302, 'Patulul', 20),
(303, 'Pueblo Nuevo', 20),
(304, 'Río Bravo', 20),
(305, 'Samayac', 20),
(306, 'San Antonio Suchitepéquez', 20),
(307, 'San Bernardino', 20),
(308, 'San Francisco Zapotitlán', 20),
(309, 'San Gabriel', 20),
(310, 'San José El Idolo', 20),
(311, 'San José La Maquina', 20),
(312, 'San Juan Bautista', 20),
(313, 'San Lorenzo', 20),
(314, 'San Miguel Panán', 20),
(315, 'San Pablo Jocopilas', 20),
(316, 'Santa Bárbara', 20),
(317, 'Santo Domingo Suchitepéquez', 20),
(318, 'Santo Tomás La Unión', 20),
(319, 'Zunilito', 20),
(320, 'Momostenango', 21),
(321, 'San Andrés Xecul', 21),
(322, 'San Bartolo', 21),
(323, 'San Cristóbal Totonicapán', 21),
(324, 'San Francisco El Alto', 21),
(325, 'Santa Lucía La Reforma', 21),
(326, 'Santa María Chiquimula', 21),
(327, 'Totonicapán', 21),
(328, 'Cabañas', 22),
(329, 'Estanzuela', 22),
(330, 'Gualán', 22),
(331, 'Huité', 22),
(332, 'La Unión', 22),
(333, 'Río Hondo', 22),
(334, 'San Diego', 22),
(335, 'San Jorge', 22),
(336, 'Teculután', 22),
(337, 'Usumatlán', 22),
(338, 'Zacapa', 22);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `queja`
--

CREATE TABLE `queja` (
  `id_queja` int(11) NOT NULL,
  `concepto_queja` text NOT NULL,
  `descripcion_queja` text NOT NULL,
  `sucursal_queja` int(11) DEFAULT NULL,
  `empleado_queja` int(11) NOT NULL,
  `fecha` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `queja`
--

INSERT INTO `queja` (`id_queja`, `concepto_queja`, `descripcion_queja`, `sucursal_queja`, `empleado_queja`, `fecha`) VALUES
(8, 'Producto dañado', 'El envase esta roto y se encuentra en mal estado', 9, 12, '2021-04-17 22:25:11'),
(9, 'Mala atención al cliente', 'Hice una llamada a Coca-Cola y ellos me trataron muy mal.', 9, 12, '2021-04-20 23:58:08');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `region`
--

CREATE TABLE `region` (
  `id_region` int(11) NOT NULL,
  `nombre` varchar(100) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `region`
--

INSERT INTO `region` (`id_region`, `nombre`) VALUES
(1, 'Norte'),
(3, 'Metropolitana'),
(4, 'Nororiente'),
(5, 'Suroriente'),
(6, 'Central'),
(7, 'Suroccidente'),
(8, 'Noroccidente'),
(9, 'Petén');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `sucursal`
--

CREATE TABLE `sucursal` (
  `id_sucursal` int(11) NOT NULL,
  `nombre_sucursal` varchar(100) NOT NULL,
  `encargado_sucursal` varchar(100) NOT NULL,
  `municipio_sucursal` int(11) NOT NULL,
  `fecha_sucursal` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `company` int(11) NOT NULL,
  `region_sucursal` int(11) NOT NULL,
  `telefono_sucursal` varchar(20) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `sucursal`
--

INSERT INTO `sucursal` (`id_sucursal`, `nombre_sucursal`, `encargado_sucursal`, `municipio_sucursal`, `fecha_sucursal`, `company`, `region_sucursal`, `telefono_sucursal`) VALUES
(9, 'Pradera', 'Pedro Ramirez', 63, '2021-04-18 02:22:59', 14, 1, '2234 3232');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `usuario` varchar(100) NOT NULL,
  `clave` varchar(200) NOT NULL,
  `empleado` int(11) NOT NULL,
  `status` int(11) NOT NULL,
  `date` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `users`
--

INSERT INTO `users` (`id`, `usuario`, `clave`, `empleado`, `status`, `date`) VALUES
(2, 'diaco@gmail.com', '$2y$12$fyFE029jjHYSawuibVtcoOmfDVTB6wp78TA5CioofQlhzs6AfB1uK', 5, 1, '2021-04-13 21:56:15');

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `company`
--
ALTER TABLE `company`
  ADD PRIMARY KEY (`id_company`),
  ADD KEY `fk_company_municipio` (`municipio_company`),
  ADD KEY `fk_region_company` (`region_company`);

--
-- Indices de la tabla `departamento`
--
ALTER TABLE `departamento`
  ADD PRIMARY KEY (`id_departamento`);

--
-- Indices de la tabla `empleado`
--
ALTER TABLE `empleado`
  ADD PRIMARY KEY (`id_empleado`);

--
-- Indices de la tabla `municipio`
--
ALTER TABLE `municipio`
  ADD PRIMARY KEY (`id_municipio`),
  ADD KEY `fk_muncipio_departamento` (`deparmaneto_municipio`);

--
-- Indices de la tabla `queja`
--
ALTER TABLE `queja`
  ADD PRIMARY KEY (`id_queja`),
  ADD KEY `fk_sucursal_queja` (`sucursal_queja`),
  ADD KEY `fk_empleado_queja` (`empleado_queja`);

--
-- Indices de la tabla `region`
--
ALTER TABLE `region`
  ADD PRIMARY KEY (`id_region`);

--
-- Indices de la tabla `sucursal`
--
ALTER TABLE `sucursal`
  ADD PRIMARY KEY (`id_sucursal`),
  ADD KEY `fk_sucursal_municipio` (`municipio_sucursal`),
  ADD KEY `fk_sucursal_company` (`company`),
  ADD KEY `fk_sucursal_region` (`region_sucursal`);

--
-- Indices de la tabla `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD KEY `fk_empleado_usuario` (`empleado`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `company`
--
ALTER TABLE `company`
  MODIFY `id_company` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;

--
-- AUTO_INCREMENT de la tabla `departamento`
--
ALTER TABLE `departamento`
  MODIFY `id_departamento` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=23;

--
-- AUTO_INCREMENT de la tabla `empleado`
--
ALTER TABLE `empleado`
  MODIFY `id_empleado` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT de la tabla `municipio`
--
ALTER TABLE `municipio`
  MODIFY `id_municipio` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=339;

--
-- AUTO_INCREMENT de la tabla `queja`
--
ALTER TABLE `queja`
  MODIFY `id_queja` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT de la tabla `region`
--
ALTER TABLE `region`
  MODIFY `id_region` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT de la tabla `sucursal`
--
ALTER TABLE `sucursal`
  MODIFY `id_sucursal` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT de la tabla `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
