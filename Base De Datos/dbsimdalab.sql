-- phpMyAdmin SQL Dump
-- version 4.8.3
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 03-12-2018 a las 15:28:51
-- Versión del servidor: 10.1.36-MariaDB
-- Versión de PHP: 5.6.38

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `dbsimdalab`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `analisis_muestra`
--

CREATE TABLE `analisis_muestra` (
  `id_Analisis_Muestra` bigint(20) NOT NULL,
  `Fecha` date NOT NULL,
  `id_Recepcion_Muestra` bigint(20) NOT NULL,
  `ws` varchar(16) NOT NULL,
  `wa` varchar(16) NOT NULL,
  `wsw` varchar(16) NOT NULL,
  `ww` varchar(16) NOT NULL,
  `dw` varchar(16) NOT NULL,
  `t_Grados` varchar(16) NOT NULL,
  `Resul_mg_l` varchar(16) NOT NULL,
  `Pss` varchar(16) NOT NULL,
  `Pssp` varchar(16) NOT NULL,
  `Vd` varchar(16) NOT NULL,
  `Resul_a` varchar(16) NOT NULL,
  `factor_Correcion_T1` varchar(16) NOT NULL,
  `temperatura_1` varchar(16) NOT NULL,
  `densidad_1` varchar(16) NOT NULL,
  `peso_Muestra_1` varchar(16) NOT NULL,
  `Resul_3` varchar(16) NOT NULL,
  `factor_Correcion_T2` varchar(16) NOT NULL,
  `temperatura_2` varchar(16) NOT NULL,
  `densidad_2` varchar(16) NOT NULL,
  `peso_Muestra_2` varchar(16) NOT NULL,
  `Resul_4` varchar(16) NOT NULL,
  `arena` varchar(16) NOT NULL,
  `arcilla` varchar(16) NOT NULL,
  `Resul_5` varchar(16) NOT NULL,
  `Textura` varchar(16) NOT NULL,
  `CarbonO` varchar(16) NOT NULL,
  `Resul_c` varchar(16) NOT NULL,
  `pH_Calcular` varchar(16) NOT NULL,
  `temperaturaPh` varchar(16) NOT NULL,
  `VolumenM` varchar(16) NOT NULL,
  `VolumenB` varchar(16) NOT NULL,
  `PesoM` varchar(16) NOT NULL,
  `NormalidadT` varchar(16) NOT NULL,
  `Resul_6` varchar(16) NOT NULL,
  `densi_real` varchar(16) NOT NULL,
  `densi_apa` varchar(16) NOT NULL,
  `resul_porosidad` varchar(16) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `departamentos`
--

CREATE TABLE `departamentos` (
  `id_Departamento` bigint(20) NOT NULL,
  `nombre_Departamento` varchar(30) CHARACTER SET utf8mb4 COLLATE utf8mb4_spanish_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_spanish_ci;

--
-- Volcado de datos para la tabla `departamentos`
--

INSERT INTO `departamentos` (`id_Departamento`, `nombre_Departamento`) VALUES
(1, 'AMAZONAS'),
(2, 'ANTIOQUIA'),
(3, 'ARAUCA'),
(4, 'ATLÃNTICO '),
(5, 'BOLÃVAR '),
(6, 'BOYACA '),
(7, 'CALDAS'),
(8, 'CAQUETÃ'),
(9, 'CASANARE'),
(10, 'CAUCA'),
(11, 'CESAR'),
(12, 'CHOCÃ“'),
(13, 'CÃ“RDOBA '),
(14, 'CUNDINAMARCA'),
(15, 'GUAINÃA'),
(16, 'GUAVIARE'),
(17, 'HUILA'),
(18, 'LA GUAJIRA'),
(19, 'MAGDALENA'),
(20, 'META'),
(21, 'NARIÃ‘O'),
(22, 'NORTE DE SANTANDER'),
(23, 'PUTUMAYO'),
(24, 'QUINDÃO'),
(25, 'RISARALDA'),
(26, 'SAN ANDRES Y PROVIDENCIA'),
(27, 'SANTANDER'),
(28, 'SUCRE'),
(29, 'TOLIMA'),
(30, 'VALLE DEL CAUCA'),
(31, 'VAUPÃ‰S'),
(32, 'VICHADA');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `fichas`
--

CREATE TABLE `fichas` (
  `id_Ficha` bigint(20) NOT NULL,
  `id_Programa` bigint(20) NOT NULL,
  `numero_Ficha` varchar(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `fincas`
--

CREATE TABLE `fincas` (
  `id_Finca` bigint(20) NOT NULL,
  `id_Vereda` bigint(20) NOT NULL,
  `nombre_Finca` varchar(60) NOT NULL,
  `Tamano` float NOT NULL COMMENT 'Tamaño por hectáreas ',
  `numero_Telefono` varchar(20) NOT NULL,
  `correo_Electronico` varchar(100) NOT NULL,
  `codigoFinca` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `instructores`
--

CREATE TABLE `instructores` (
  `id_Instructor` bigint(20) NOT NULL,
  `numero_Documento` varchar(20) NOT NULL,
  `nombre_Instructor` varchar(60) NOT NULL,
  `Correo_Electronico` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `lotes`
--

CREATE TABLE `lotes` (
  `id_Lote` bigint(20) NOT NULL,
  `id_Finca` bigint(20) NOT NULL,
  `nombre_Lote` varchar(60) NOT NULL,
  `Tamano` float NOT NULL COMMENT 'Tamaño por hectáreas '
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `municipios`
--

CREATE TABLE `municipios` (
  `id_Municipio` bigint(20) NOT NULL,
  `id_Departamento` bigint(20) NOT NULL,
  `nombre_Municipio` varchar(30) CHARACTER SET utf8mb4 COLLATE utf8mb4_spanish_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_spanish_ci;

--
-- Volcado de datos para la tabla `municipios`
--

INSERT INTO `municipios` (`id_Municipio`, `id_Departamento`, `nombre_Municipio`) VALUES
(1, 1, 'EL ENCANTO'),
(2, 1, 'LA CHORRERA'),
(3, 1, 'LA PEDRERA'),
(4, 1, 'LA VICTORIA'),
(5, 1, 'LETICIA'),
(6, 1, 'MIRITI'),
(7, 1, 'PUERTO ALEGRIA'),
(8, 1, 'PUERTO ARICA'),
(9, 1, 'PUERTO NARIÃ‘O'),
(10, 1, 'PUERTO SANTANDER'),
(11, 1, 'TURAPACA'),
(12, 2, 'ABEJORRAL'),
(13, 2, 'ABRIAQUI'),
(14, 2, 'ALEJANDRIA'),
(15, 2, 'AMAGA'),
(16, 2, 'AMALFI'),
(17, 2, 'ANDES'),
(18, 2, 'ANGELOPOLIS'),
(19, 2, 'ANGOSTURA'),
(20, 2, 'ANORI'),
(21, 2, 'ANTIOQUIA'),
(22, 2, 'ANZA'),
(23, 2, 'APARTADO'),
(24, 2, 'ARBOLETES'),
(25, 2, 'ARGELIA'),
(26, 2, 'ARMENIA'),
(27, 2, 'BARBOSA'),
(28, 2, 'BELLO'),
(29, 2, 'BELMIRA'),
(30, 2, 'BETANIA'),
(31, 2, 'BETULIA'),
(32, 2, 'BOLIVAR'),
(33, 2, 'BRICEÑO'),
(34, 2, 'BURITICA'),
(35, 2, 'CACERES'),
(36, 2, 'CAICEDO'),
(37, 2, 'CALDAS'),
(38, 2, 'CAMPAMENTO'),
(39, 2, 'CANASGORDAS'),
(40, 2, 'CARACOLI'),
(41, 2, 'CARAMANTA'),
(42, 2, 'CAREPA'),
(43, 2, 'CARMEN DE VIBORAL'),
(44, 2, 'CAROLINA DEL PRINCIPE'),
(45, 2, 'CAUCASIA'),
(46, 2, 'CHIGORODO'),
(47, 2, 'CISNEROS'),
(48, 2, 'COCORNA'),
(49, 2, 'CONCEPCION'),
(50, 2, 'CONCORDIA'),
(51, 2, 'COPACABANA'),
(52, 2, 'DABEIBA'),
(53, 2, 'DONMATIAS'),
(54, 2, 'EBEJICO'),
(55, 2, 'EL BAGRE'),
(56, 2, 'EL PENOL'),
(57, 2, 'EL RETIRO'),
(58, 2, 'ENTRERRIOS'),
(59, 2, 'ENVIGADO'),
(60, 2, 'FREDONIA'),
(61, 2, 'FRONTINO'),
(62, 2, 'GIRALDO'),
(63, 2, 'GIRARDOTA'),
(64, 2, 'GOMEZ PLATA'),
(65, 2, 'GRANADA'),
(66, 2, 'GUADALUPE'),
(67, 2, 'GUARNE'),
(68, 2, 'GUATAQUE'),
(69, 2, 'HELICONIA'),
(70, 2, 'HISPANIA'),
(71, 2, 'ITAGUI'),
(72, 2, 'ITUANGO'),
(73, 2, 'JARDIN'),
(74, 2, 'JERICO'),
(75, 2, 'LA CEJA'),
(76, 2, 'LA ESTRELLA'),
(77, 2, 'LA PINTADA'),
(78, 2, 'LA UNION'),
(79, 2, 'LIBORINA'),
(80, 2, 'MACEO'),
(81, 2, 'MARINILLA'),
(82, 2, 'MEDELLIN'),
(83, 2, 'MONTEBELLO'),
(84, 2, 'MURINDO'),
(85, 2, 'MUTATA'),
(86, 2, 'NARINO'),
(87, 2, 'NECHI'),
(88, 2, 'NECOCLI'),
(89, 2, 'OLAYA'),
(90, 2, 'PEQUE'),
(91, 2, 'PUEBLORRICO'),
(92, 2, 'PUERTO BERRIO'),
(93, 2, 'PUERTO NARE'),
(94, 2, 'PUERTO TRIUNFO'),
(95, 2, 'REMEDIOS'),
(96, 2, 'RIONEGRO'),
(97, 2, 'SABANALARGA'),
(98, 2, 'SABANETA'),
(99, 2, 'SALGAR'),
(100, 2, 'SAN ANDRES DE CUERQUIA'),
(101, 2, 'SAN CARLOS'),
(102, 2, 'SAN FRANCISCO'),
(103, 2, 'SAN JERONIMO'),
(104, 2, 'SAN JOSE DE LA MONTAÃ‘A'),
(105, 2, 'SAN JUAN DE URABA'),
(106, 2, 'SAN LUIS'),
(107, 2, 'SAN PEDRO DE LOS MILAGROS'),
(108, 2, 'SAN PEDRO DE URABA'),
(109, 2, 'SAN RAFAEL'),
(110, 2, 'SAN ROQUE'),
(111, 2, 'SAN VICENTE'),
(112, 2, 'SANTA BARBARA'),
(113, 2, 'SANTA ROSA DE OSOS'),
(114, 2, 'SANTO DOMINGO'),
(115, 2, 'SANTUARIO'),
(116, 2, 'SEGOVIA'),
(117, 2, 'SONSON'),
(118, 2, 'SOPETRAN'),
(119, 2, 'TAMESIS'),
(120, 2, 'TARAZA'),
(121, 2, 'TARSO'),
(122, 2, 'TITIRIBI'),
(123, 2, 'TOLEDO'),
(124, 2, 'TURBO'),
(125, 2, 'URAMITA'),
(126, 2, 'URRAO'),
(127, 2, 'VALDIVIA'),
(128, 2, 'VALPARAISO'),
(129, 2, 'VEGACHI'),
(130, 2, 'VENECIA'),
(131, 2, 'VIGIA DEL FUERTE'),
(132, 2, 'YALI'),
(133, 2, 'YARUMAL'),
(134, 2, 'YOLOMBO'),
(135, 2, 'YONDO'),
(136, 2, 'ZARAGOZA'),
(137, 3, 'ARAUCA'),
(138, 3, 'ARAUQUITA'),
(139, 3, 'CRAVO NORTE'),
(140, 3, 'FORTUL'),
(141, 3, 'PUERTO RONDON'),
(142, 3, 'SARAVENA'),
(143, 3, 'TAME'),
(144, 4, 'BARANOA'),
(145, 4, 'BARRANQUILLA'),
(146, 4, 'CAMPO DE LA CRUZ'),
(147, 4, 'CANDELARIA'),
(148, 4, 'GALAPA'),
(149, 4, 'JUAN DE ACOSTA'),
(150, 4, 'LURUACO'),
(151, 4, 'MALAMBO'),
(152, 4, 'MANATI'),
(153, 4, 'PALMAR DE VARELA'),
(154, 4, 'PIOJO'),
(155, 4, 'POLO NUEVO'),
(156, 4, 'PONEDERA'),
(157, 4, 'PUERTO COLOMBIA'),
(158, 4, 'REPELON'),
(159, 4, 'SABANAGRANDE'),
(160, 4, 'SABANALARGA'),
(161, 4, 'SANTA LUCIA'),
(162, 4, 'SANTO TOMAS'),
(163, 4, 'SOLEDAD'),
(164, 4, 'SUAN'),
(165, 4, 'TUBARA'),
(166, 4, 'USIACURI'),
(167, 5, 'ACHI'),
(168, 5, 'ALTOS DEL ROSARIO'),
(169, 5, 'ARENAL'),
(170, 5, 'ARJONA'),
(171, 5, 'ARROYOHONDO'),
(172, 5, 'BARRANCO DE LOBA'),
(173, 5, 'BRAZUELO DE PAPAYAL'),
(174, 5, 'CALAMAR'),
(175, 5, 'CANTAGALLO'),
(176, 5, 'CARTAGENA DE INDIAS'),
(177, 5, 'CICUCO'),
(178, 5, 'CLEMENCIA'),
(179, 5, 'CORDOBA'),
(180, 5, 'EL CARMEN DE BOLIVAR'),
(181, 5, 'EL GUAMO'),
(182, 5, 'EL PENION'),
(183, 5, 'HATILLO DE LOBA'),
(184, 5, 'MAGANGUE'),
(185, 5, 'MAHATES'),
(186, 5, 'MARGARITA'),
(187, 5, 'MARIA LA BAJA'),
(188, 5, 'MONTECRISTO'),
(189, 5, 'MORALES'),
(190, 5, 'MORALES'),
(191, 5, 'NOROSI'),
(192, 5, 'PINILLOS'),
(193, 5, 'REGIDOR'),
(194, 5, 'RIO VIEJO'),
(195, 5, 'SAN CRISTOBAL'),
(196, 5, 'SAN ESTANISLAO'),
(197, 5, 'SAN FERNANDO'),
(198, 5, 'SAN JACINTO'),
(199, 5, 'SAN JACINTO DEL CAUCA'),
(200, 5, 'SAN JUAN DE NEPOMUCENO'),
(201, 5, 'SAN MARTIN DE LOBA'),
(202, 5, 'SAN PABLO'),
(203, 5, 'SAN PABLO NORTE'),
(204, 5, 'SANTA CATALINA'),
(205, 5, 'SANTA CRUZ DE MOMPOX'),
(206, 5, 'SANTA ROSA'),
(207, 5, 'SANTA ROSA DEL SUR'),
(208, 5, 'SIMITI'),
(209, 5, 'SOPLAVIENTO'),
(210, 5, 'TALAIGUA NUEVO'),
(211, 5, 'TUQUISIO'),
(212, 5, 'TURBACO'),
(213, 5, 'TURBANA'),
(214, 5, 'VILLANUEVA'),
(215, 5, 'ZAMBRANO'),
(216, 6, 'AQUITANIA'),
(217, 6, 'ARCABUCO'),
(218, 6, 'BELÉN'),
(219, 6, 'BERBEO'),
(220, 6, 'BETÉITIVA'),
(221, 6, 'BOAVITA'),
(222, 6, 'BOYACÁ'),
(223, 6, 'BRICEÑO'),
(224, 6, 'BUENAVISTA'),
(225, 6, 'BUSBANZÁ'),
(226, 6, 'CALDAS'),
(227, 6, 'CAMPO HERMOSO'),
(228, 6, 'CERINZA'),
(229, 6, 'CHINAVITA'),
(230, 6, 'CHIQUINQUIRÁ'),
(231, 6, 'CHÍQUIZA'),
(232, 6, 'CHISCAS'),
(233, 6, 'CHITA'),
(234, 6, 'CHITARAQUE'),
(235, 6, 'CHIVATÁ'),
(236, 6, 'CIÉNEGA'),
(237, 6, 'CÓMBITA'),
(238, 6, 'COPER'),
(239, 6, 'CORRALES'),
(240, 6, 'COVARACHÍA'),
(241, 6, 'CUBARA'),
(242, 6, 'CUCAITA'),
(243, 6, 'CUITIVA'),
(244, 6, 'DUITAMA'),
(245, 6, 'EL COCUY'),
(246, 6, 'EL ESPINO'),
(247, 6, 'FIRAVITOBA'),
(248, 6, 'FLORESTA'),
(249, 6, 'GACHANTIVÁ'),
(250, 6, 'GÁMEZA'),
(251, 6, 'GARAGOA'),
(252, 6, 'GUACAMAYAS'),
(253, 6, 'GÜICÁN'),
(254, 6, 'IZA'),
(255, 6, 'JENESANO'),
(256, 6, 'JERICÓ'),
(257, 6, 'LA UVITA'),
(258, 6, 'LA VICTORIA'),
(259, 6, 'LABRANZA GRANDE'),
(260, 6, 'MACANAL'),
(261, 6, 'MARIPÍ'),
(262, 6, 'MIRAFLORES'),
(263, 6, 'MONGUA'),
(264, 6, 'MONGUÍ'),
(265, 6, 'MONIQUIRÁ'),
(266, 6, 'MOTAVITA'),
(267, 6, 'MUZO'),
(268, 6, 'NOBSA'),
(269, 6, 'NUEVO COLÓN'),
(270, 6, 'OICATÁ'),
(271, 6, 'OTANCHE'),
(272, 6, 'PACHAVITA'),
(273, 6, 'PÁEZ'),
(274, 6, 'PAIPA'),
(275, 6, 'PAJARITO'),
(276, 6, 'PANQUEBA'),
(277, 6, 'PAUNA'),
(278, 6, 'PAYA'),
(279, 6, 'PAZ DE RÍO'),
(280, 6, 'PESCA'),
(281, 6, 'PISBA'),
(282, 6, 'PUERTO BOYACA'),
(283, 6, 'QUÍPAMA'),
(284, 6, 'RAMIRIQUÍ'),
(285, 6, 'RÁQUIRA'),
(286, 6, 'RONDÓN'),
(287, 6, 'SABOYÁ'),
(288, 6, 'SÁCHICA'),
(289, 6, 'SAMACÁ'),
(290, 6, 'SAN EDUARDO'),
(291, 6, 'SAN JOSÉ DE PARE'),
(292, 6, 'SAN LUÍS DE GACENO'),
(293, 6, 'SAN MATEO'),
(294, 6, 'SAN MIGUEL DE SEMA'),
(295, 6, 'SAN PABLO DE BORBUR'),
(296, 6, 'SANTA MARÍA'),
(297, 6, 'SANTA ROSA DE VITERBO'),
(298, 6, 'SANTA SOFÍA'),
(299, 6, 'SANTANA'),
(300, 6, 'SATIVANORTE'),
(301, 6, 'SATIVASUR'),
(302, 6, 'SIACHOQUE'),
(303, 6, 'SOATÁ'),
(304, 6, 'SOCHA'),
(305, 6, 'SOCOTÁ'),
(306, 6, 'SOGAMOSO'),
(307, 6, 'SORA'),
(308, 6, 'SORACÁ'),
(309, 6, 'SOTAQUIRÁ'),
(310, 6, 'SUSACÓN'),
(311, 6, 'SUTARMACHÁN'),
(312, 6, 'TASCO'),
(313, 6, 'TIBANÁ'),
(314, 6, 'TIBASOSA'),
(315, 6, 'TINJACÁ'),
(316, 6, 'TIPACOQUE'),
(317, 6, 'TOCA'),
(318, 6, 'TOGÜÍ'),
(319, 6, 'TÓPAGA'),
(320, 6, 'TOTA'),
(321, 6, 'TUNJA'),
(322, 6, 'TUNUNGUÁ'),
(323, 6, 'TURMEQUÉ'),
(324, 6, 'TUTA'),
(325, 6, 'TUTAZÁ'),
(326, 6, 'UMBITA'),
(327, 6, 'VENTA QUEMADA'),
(328, 6, 'VILLA DE LEYVA'),
(329, 6, 'VIRACACHÁ'),
(330, 6, 'ZETAQUIRA'),
(331, 7, 'AGUADAS'),
(332, 7, 'ANSERMA'),
(333, 7, 'ARANZAZU'),
(334, 7, 'BELALCAZAR'),
(335, 7, 'CHINCHINÁ'),
(336, 7, 'FILADELFIA'),
(337, 7, 'LA DORADA'),
(338, 7, 'LA MERCED'),
(339, 7, 'MANIZALES'),
(340, 7, 'MANZANARES'),
(341, 7, 'MARMATO'),
(342, 7, 'MARQUETALIA'),
(343, 7, 'MARULANDA'),
(344, 7, 'NEIRA'),
(345, 7, 'NORCASIA'),
(346, 7, 'PACORA'),
(347, 7, 'PALESTINA'),
(348, 7, 'PENSILVANIA'),
(349, 7, 'RIOSUCIO'),
(350, 7, 'RISARALDA'),
(351, 7, 'SALAMINA'),
(352, 7, 'SAMANA'),
(353, 7, 'SAN JOSE'),
(354, 7, 'SUPÍA'),
(355, 7, 'VICTORIA'),
(356, 7, 'VILLAMARÍA'),
(357, 7, 'VITERBO'),
(358, 8, 'ALBANIA'),
(359, 8, 'BELÉN ANDAQUIES'),
(360, 8, 'CARTAGENA DEL CHAIRA'),
(361, 8, 'CURILLO'),
(362, 8, 'EL DONCELLO'),
(363, 8, 'EL PAUJIL'),
(364, 8, 'FLORENCIA'),
(365, 8, 'LA MONTAÑITA'),
(366, 8, 'MILÁN'),
(367, 8, 'MORELIA'),
(368, 8, 'PUERTO RICO'),
(369, 8, 'SAN  VICENTE DEL CAGUAN'),
(370, 8, 'SAN JOSÉ DE FRAGUA'),
(371, 8, 'SOLANO'),
(372, 8, 'SOLITA'),
(373, 8, 'VALPARAÍSO'),
(374, 9, 'AGUAZUL'),
(375, 9, 'CHAMEZA'),
(376, 9, 'HATO COROZAL'),
(377, 9, 'LA SALINA'),
(378, 9, 'MANÍ'),
(379, 9, 'MONTERREY'),
(380, 9, 'NUNCHIA'),
(381, 9, 'OROCUE'),
(382, 9, 'PAZ DE ARIPORO'),
(383, 9, 'PORE'),
(384, 9, 'RECETOR'),
(385, 9, 'SABANA LARGA'),
(386, 9, 'SACAMA'),
(387, 9, 'SAN LUIS DE PALENQUE'),
(388, 9, 'TAMARA'),
(389, 9, 'TAURAMENA'),
(390, 9, 'TRINIDAD'),
(391, 9, 'VILLANUEVA'),
(392, 9, 'YOPAL'),
(393, 10, 'ALMAGUER'),
(394, 10, 'ARGELIA'),
(395, 10, 'BALBOA'),
(396, 10, 'BOLÍVAR'),
(397, 10, 'BUENOS AIRES'),
(398, 10, 'CAJIBIO'),
(399, 10, 'CALDONO'),
(400, 10, 'CALOTO'),
(401, 10, 'CORINTO'),
(402, 10, 'EL TAMBO'),
(403, 10, 'FLORENCIA'),
(404, 10, 'GUAPI'),
(405, 10, 'INZA'),
(406, 10, 'JAMBALÓ'),
(407, 10, 'LA SIERRA'),
(408, 10, 'LA VEGA'),
(409, 10, 'LÓPEZ'),
(410, 10, 'MERCADERES'),
(411, 10, 'MIRANDA'),
(412, 10, 'MORALES'),
(413, 10, 'PADILLA'),
(414, 10, 'PÁEZ'),
(415, 10, 'PATIA (EL BORDO)'),
(416, 10, 'PIAMONTE'),
(417, 10, 'PIENDAMO'),
(418, 10, 'POPAYÁN'),
(419, 10, 'PUERTO TEJADA'),
(420, 10, 'PURACE'),
(421, 10, 'ROSAS'),
(422, 10, 'SAN SEBASTIÁN'),
(423, 10, 'SANTA ROSA'),
(424, 10, 'SANTANDER DE QUILICHAO'),
(425, 10, 'SILVIA'),
(426, 10, 'SOTARA'),
(427, 10, 'SUÁREZ'),
(428, 10, 'SUCRE'),
(429, 10, 'TIMBÍO'),
(430, 10, 'TIMBIQUÍ'),
(431, 10, 'TORIBIO'),
(432, 10, 'TOTORO'),
(433, 10, 'VILLA RICA'),
(434, 11, 'AGUACHICA'),
(435, 11, 'AGUSTÍN CODAZZI'),
(436, 11, 'ASTREA'),
(437, 11, 'BECERRIL'),
(438, 11, 'BOSCONIA'),
(439, 11, 'CHIMICHAGUA'),
(440, 11, 'CHIRIGUANÁ'),
(441, 11, 'CURUMANÍ'),
(442, 11, 'EL COPEY'),
(443, 11, 'EL PASO'),
(444, 11, 'GAMARRA'),
(445, 11, 'GONZÁLEZ'),
(446, 11, 'LA GLORIA'),
(447, 11, 'LA JAGUA IBIRICO'),
(448, 11, 'MANAURE BALCÓN DEL CESAR'),
(449, 11, 'PAILITAS'),
(450, 11, 'PELAYA'),
(451, 11, 'PUEBLO BELLO'),
(452, 11, 'RÍO DE ORO'),
(453, 11, 'ROBLES (LA PAZ)'),
(454, 11, 'SAN ALBERTO'),
(455, 11, 'SAN DIEGO'),
(456, 11, 'SAN MARTÍN'),
(457, 11, 'TAMALAMEQUE'),
(458, 11, 'VALLEDUPAR'),
(459, 12, 'ACANDI'),
(460, 12, 'ALTO BAUDO (PIE DE PATO)'),
(461, 12, 'ATRATO'),
(462, 12, 'BAGADO'),
(463, 12, 'BAHIA SOLANO (MUTIS)'),
(464, 12, 'BAJO BAUDO (PIZARRO)'),
(465, 12, 'BOJAYA (BELLAVISTA)'),
(466, 12, 'CANTON DE SAN PABLO'),
(467, 12, 'CARMEN DEL DARIEN'),
(468, 12, 'CERTEGUI'),
(469, 12, 'CONDOTO'),
(470, 12, 'EL CARMEN'),
(471, 12, 'ISTMINA'),
(472, 12, 'JURADO'),
(473, 12, 'LITORAL DEL SAN JUAN'),
(474, 12, 'LLORO'),
(475, 12, 'MEDIO ATRATO'),
(476, 12, 'MEDIO BAUDO (BOCA DE PEPE)'),
(477, 12, 'MEDIO SAN JUAN'),
(478, 12, 'NOVITA'),
(479, 12, 'NUQUI'),
(480, 12, 'QUIBDO'),
(481, 12, 'RIO IRO'),
(482, 12, 'RIO QUITO'),
(483, 12, 'RIOSUCIO'),
(484, 12, 'SAN JOSE DEL PALMAR'),
(485, 12, 'SIPI'),
(486, 12, 'TADO'),
(487, 12, 'UNGUIA'),
(488, 12, 'UNIÓN PANAMERICANA'),
(489, 13, 'AYAPEL'),
(490, 13, 'BUENAVISTA'),
(491, 13, 'CANALETE'),
(492, 13, 'CERETÉ'),
(493, 13, 'CHIMA'),
(494, 13, 'CHINÚ'),
(495, 13, 'CIENAGA DE ORO'),
(496, 13, 'COTORRA'),
(497, 13, 'LA APARTADA'),
(498, 13, 'LORICA'),
(499, 13, 'LOS CÓRDOBAS'),
(500, 13, 'MOMIL'),
(501, 13, 'MONTELÍBANO'),
(502, 13, 'MONTERÍA'),
(503, 13, 'MOÑITOS'),
(504, 13, 'PLANETA RICA'),
(505, 13, 'PUEBLO NUEVO'),
(506, 13, 'PUERTO ESCONDIDO'),
(507, 13, 'PUERTO LIBERTADOR'),
(508, 13, 'PURÍSIMA'),
(509, 13, 'SAHAGÚN'),
(510, 13, 'SAN ANDRÉS SOTAVENTO'),
(511, 13, 'SAN ANTERO'),
(512, 13, 'SAN BERNARDO VIENTO'),
(513, 13, 'SAN CARLOS'),
(514, 13, 'SAN PELAYO'),
(515, 13, 'TIERRALTA'),
(516, 13, 'VALENCIA'),
(517, 14, 'AGUA DE DIOS'),
(518, 14, 'ALBAN'),
(519, 14, 'ANAPOIMA'),
(520, 14, 'ANOLAIMA'),
(521, 14, 'ARBELAEZ'),
(522, 14, 'BELTRÁN'),
(523, 14, 'BITUIMA'),
(524, 14, 'BOGOTÁ DC'),
(525, 14, 'BOJACÁ'),
(526, 14, 'CABRERA'),
(527, 14, 'CACHIPAY'),
(528, 14, 'CAJICÁ'),
(529, 14, 'CAPARRAPÍ'),
(530, 14, 'CAQUEZA'),
(531, 14, 'CARMEN DE CARUPA'),
(532, 14, 'CHAGUANÍ'),
(533, 14, 'CHIA'),
(534, 14, 'CHIPAQUE'),
(535, 14, 'CHOACHÍ'),
(536, 14, 'CHOCONTÁ'),
(537, 14, 'COGUA'),
(538, 14, 'COTA'),
(539, 14, 'CUCUNUBÁ'),
(540, 14, 'EL COLEGIO'),
(541, 14, 'EL PEÑÓN'),
(542, 14, 'EL ROSAL1'),
(543, 14, 'FACATATIVA'),
(544, 14, 'FÓMEQUE'),
(545, 14, 'FOSCA'),
(546, 14, 'FUNZA'),
(547, 14, 'FÚQUENE'),
(548, 14, 'FUSAGASUGA'),
(549, 14, 'GACHALÁ'),
(550, 14, 'GACHANCIPÁ'),
(551, 14, 'GACHETA'),
(552, 14, 'GAMA'),
(553, 14, 'GIRARDOT'),
(554, 14, 'GRANADA2'),
(555, 14, 'GUACHETÁ'),
(556, 14, 'GUADUAS'),
(557, 14, 'GUASCA'),
(558, 14, 'GUATAQUÍ'),
(559, 14, 'GUATAVITA'),
(560, 14, 'GUAYABAL DE SIQUIMA'),
(561, 14, 'GUAYABETAL'),
(562, 14, 'GUTIÉRREZ'),
(563, 14, 'JERUSALÉN'),
(564, 14, 'JUNÍN'),
(565, 14, 'LA CALERA'),
(566, 14, 'LA MESA'),
(567, 14, 'LA PALMA'),
(568, 14, 'LA PEÑA'),
(569, 14, 'LA VEGA'),
(570, 14, 'LENGUAZAQUE'),
(571, 14, 'MACHETÁ'),
(572, 14, 'MADRID'),
(573, 14, 'MANTA'),
(574, 14, 'MEDINA'),
(575, 14, 'MOSQUERA'),
(576, 14, 'NARIÑO'),
(577, 14, 'NEMOCÓN'),
(578, 14, 'NILO'),
(579, 14, 'NIMAIMA'),
(580, 14, 'NOCAIMA'),
(581, 14, 'OSPINA PÉREZ'),
(582, 14, 'PACHO'),
(583, 14, 'PAIME'),
(584, 14, 'PANDI'),
(585, 14, 'PARATEBUENO'),
(586, 14, 'PASCA'),
(587, 14, 'PUERTO SALGAR'),
(588, 14, 'PULÍ'),
(589, 14, 'QUEBRADANEGRA'),
(590, 14, 'QUETAME'),
(591, 14, 'QUIPILE'),
(592, 14, 'RAFAEL REYES'),
(593, 14, 'RICAURTE'),
(594, 14, 'SAN  ANTONIO DEL  TEQUENDAMA'),
(595, 14, 'SAN BERNARDO'),
(596, 14, 'SAN CAYETANO'),
(597, 14, 'SAN FRANCISCO'),
(598, 14, 'SAN JUAN DE RIOSECO'),
(599, 14, 'SASAIMA'),
(600, 14, 'SESQUILÉ'),
(601, 14, 'SIBATÉ'),
(602, 14, 'SILVANIA'),
(603, 14, 'SIMIJACA'),
(604, 14, 'SOACHA'),
(605, 14, 'SOPO'),
(606, 14, 'SUBACHOQUE'),
(607, 14, 'SUESCA'),
(608, 14, 'SUPATÁ'),
(609, 14, 'SUSA'),
(610, 14, 'SUTATAUSA'),
(611, 14, 'TABIO'),
(612, 14, 'TAUSA'),
(613, 14, 'TENA'),
(614, 14, 'TENJO'),
(615, 14, 'TIBACUY'),
(616, 14, 'TIBIRITA'),
(617, 14, 'TOCAIMA'),
(618, 14, 'TOCANCIPÁ'),
(619, 14, 'TOPAIPÍ'),
(620, 14, 'UBALÁ'),
(621, 14, 'UBAQUE'),
(622, 14, 'UBATÉ'),
(623, 14, 'UNE'),
(624, 14, 'UTICA'),
(625, 14, 'VERGARA'),
(626, 14, 'VIANI'),
(627, 14, 'VILLA GOMEZ'),
(628, 14, 'VILLA PINZÓN'),
(629, 14, 'VILLETA'),
(630, 14, 'VIOTA'),
(631, 14, 'YACOPÍ'),
(632, 14, 'ZIPACÓN'),
(633, 14, 'ZIPAQUIRÁ'),
(634, 15, 'BARRANCO MINAS'),
(635, 15, 'CACAHUAL'),
(636, 15, 'INÍRIDA'),
(637, 15, 'LA GUADALUPE'),
(638, 15, 'MAPIRIPANA'),
(639, 15, 'MORICHAL'),
(640, 15, 'PANA PANA'),
(641, 15, 'PUERTO COLOMBIA'),
(642, 15, 'SAN FELIPE'),
(643, 16, 'CALAMAR'),
(644, 16, 'EL RETORNO'),
(645, 16, 'MIRAFLOREZ'),
(646, 16, 'SAN JOSÉ DEL GUAVIARE'),
(647, 17, 'ACEVEDO'),
(648, 17, 'AGRADO'),
(649, 17, 'AIPE'),
(650, 17, 'ALGECIRAS'),
(651, 17, 'ALTAMIRA'),
(652, 17, 'BARAYA'),
(653, 17, 'CAMPO ALEGRE'),
(654, 17, 'COLOMBIA'),
(655, 17, 'ELIAS'),
(656, 17, 'GARZÓN'),
(657, 17, 'GIGANTE'),
(658, 17, 'GUADALUPE'),
(659, 17, 'HOBO'),
(660, 17, 'IQUIRA'),
(661, 17, 'ISNOS'),
(662, 17, 'LA ARGENTINA'),
(663, 17, 'LA PLATA'),
(664, 17, 'NATAGA'),
(665, 17, 'NEIVA'),
(666, 17, 'OPORAPA'),
(667, 17, 'PAICOL'),
(668, 17, 'PALERMO'),
(669, 17, 'PALESTINA'),
(670, 17, 'PITAL'),
(671, 17, 'PITALITO'),
(672, 17, 'RIVERA'),
(673, 17, 'SALADO BLANCO'),
(674, 17, 'SAN AGUSTÍN'),
(675, 17, 'SANTA MARIA'),
(676, 17, 'SUAZA'),
(677, 17, 'TARQUI'),
(678, 17, 'TELLO'),
(679, 17, 'TERUEL'),
(680, 17, 'TESALIA'),
(681, 17, 'TIMANA'),
(682, 17, 'VILLAVIEJA'),
(683, 17, 'YAGUARA'),
(684, 18, 'ALBANIA'),
(685, 18, 'BARRANCAS'),
(686, 18, 'DIBULLA'),
(687, 18, 'DISTRACCIÓN'),
(688, 18, 'EL MOLINO'),
(689, 18, 'FONSECA'),
(690, 18, 'HATO NUEVO'),
(691, 18, 'LA JAGUA DEL PILAR'),
(692, 18, 'MAICAO'),
(693, 18, 'MANAURE'),
(694, 18, 'RIOHACHA'),
(695, 18, 'SAN JUAN DEL CESAR'),
(696, 18, 'URIBIA'),
(697, 18, 'URUMITA'),
(698, 18, 'VILLANUEVA'),
(699, 19, 'ALGARROBO'),
(700, 19, 'ARACATACA'),
(701, 19, 'ARIGUANI'),
(702, 19, 'CERRO SAN ANTONIO'),
(703, 19, 'CHIVOLO'),
(704, 19, 'CIENAGA'),
(705, 19, 'CONCORDIA'),
(706, 19, 'EL BANCO'),
(707, 19, 'EL PIÑON'),
(708, 19, 'EL RETEN'),
(709, 19, 'FUNDACION'),
(710, 19, 'GUAMAL'),
(711, 19, 'NUEVA GRANADA'),
(712, 19, 'PEDRAZA'),
(713, 19, 'PIJIÑO DEL CARMEN'),
(714, 19, 'PIVIJAY'),
(715, 19, 'PLATO'),
(716, 19, 'PUEBLO VIEJO'),
(717, 19, 'REMOLINO'),
(718, 19, 'SABANAS DE SAN ANGEL'),
(719, 19, 'SALAMINA'),
(720, 19, 'SAN SEBASTIAN DE BUENAVISTA'),
(721, 19, 'SAN ZENON'),
(722, 19, 'SANTA ANA'),
(723, 19, 'SANTA BARBARA DE PINTO'),
(724, 19, 'SANTA MARTA'),
(725, 19, 'SITIONUEVO'),
(726, 19, 'TENERIFE'),
(727, 19, 'ZAPAYAN'),
(728, 19, 'ZONA BANANERA'),
(729, 20, 'ACACIAS'),
(730, 20, 'BARRANCA DE UPIA'),
(731, 20, 'CABUYARO'),
(732, 20, 'CASTILLA LA NUEVA'),
(733, 20, 'CUBARRAL'),
(734, 20, 'CUMARAL'),
(735, 20, 'EL CALVARIO'),
(736, 20, 'EL CASTILLO'),
(737, 20, 'EL DORADO'),
(738, 20, 'FUENTE DE ORO'),
(739, 20, 'GRANADA'),
(740, 20, 'GUAMAL'),
(741, 20, 'LA MACARENA'),
(742, 20, 'LA URIBE'),
(743, 20, 'LEJANÍAS'),
(744, 20, 'MAPIRIPÁN'),
(745, 20, 'MESETAS'),
(746, 20, 'PUERTO CONCORDIA'),
(747, 20, 'PUERTO GAITÁN'),
(748, 20, 'PUERTO LLERAS'),
(749, 20, 'PUERTO LÓPEZ'),
(750, 20, 'PUERTO RICO'),
(751, 20, 'RESTREPO'),
(752, 20, 'SAN  JUAN DE ARAMA'),
(753, 20, 'SAN CARLOS GUAROA'),
(754, 20, 'SAN JUANITO'),
(755, 20, 'SAN MARTÍN'),
(756, 20, 'VILLAVICENCIO'),
(757, 20, 'VISTA HERMOSA'),
(758, 21, 'ALBAN'),
(759, 21, 'ALDAÑA'),
(760, 21, 'ANCUYA'),
(761, 21, 'ARBOLEDA'),
(762, 21, 'BARBACOAS'),
(763, 21, 'BELEN'),
(764, 21, 'BUESACO'),
(765, 21, 'CHACHAGUI'),
(766, 21, 'COLON (GENOVA)'),
(767, 21, 'CONSACA'),
(768, 21, 'CONTADERO'),
(769, 21, 'CORDOBA'),
(770, 21, 'CUASPUD'),
(771, 21, 'CUMBAL'),
(772, 21, 'CUMBITARA'),
(773, 21, 'EL CHARCO'),
(774, 21, 'EL PEÑOL'),
(775, 21, 'EL ROSARIO'),
(776, 21, 'EL TABLÓN'),
(777, 21, 'EL TAMBO'),
(778, 21, 'FUNES'),
(779, 21, 'GUACHUCAL'),
(780, 21, 'GUAITARILLA'),
(781, 21, 'GUALMATAN'),
(782, 21, 'ILES'),
(783, 21, 'IMUES'),
(784, 21, 'IPIALES'),
(785, 21, 'LA CRUZ'),
(786, 21, 'LA FLORIDA'),
(787, 21, 'LA LLANADA'),
(788, 21, 'LA TOLA'),
(789, 21, 'LA UNION'),
(790, 21, 'LEIVA'),
(791, 21, 'LINARES'),
(792, 21, 'LOS ANDES'),
(793, 21, 'MAGUI'),
(794, 21, 'MALLAMA'),
(795, 21, 'MOSQUEZA'),
(796, 21, 'NARIÑO'),
(797, 21, 'OLAYA HERRERA'),
(798, 21, 'OSPINA'),
(799, 21, 'PASTO'),
(800, 21, 'PIZARRO'),
(801, 21, 'POLICARPA'),
(802, 21, 'POTOSI'),
(803, 21, 'PROVIDENCIA'),
(804, 21, 'PUERRES'),
(805, 21, 'PUPIALES'),
(806, 21, 'RICAURTE'),
(807, 21, 'ROBERTO PAYAN'),
(808, 21, 'SAMANIEGO'),
(809, 21, 'SAN BERNARDO'),
(810, 21, 'SAN LORENZO'),
(811, 21, 'SAN PABLO'),
(812, 21, 'SAN PEDRO DE CARTAGO'),
(813, 21, 'SANDONA'),
(814, 21, 'SANTA BARBARA'),
(815, 21, 'SANTACRUZ'),
(816, 21, 'SAPUYES'),
(817, 21, 'TAMINANGO'),
(818, 21, 'TANGUA'),
(819, 21, 'TUMACO'),
(820, 21, 'TUQUERRES'),
(821, 21, 'YACUANQUER'),
(822, 22, 'ABREGO'),
(823, 22, 'ARBOLEDAS'),
(824, 22, 'BOCHALEMA'),
(825, 22, 'BUCARASICA'),
(826, 22, 'CÁCHIRA'),
(827, 22, 'CÁCOTA'),
(828, 22, 'CHINÁCOTA'),
(829, 22, 'CHITAGÁ'),
(830, 22, 'CONVENCIÓN'),
(831, 22, 'CÚCUTA'),
(832, 22, 'CUCUTILLA'),
(833, 22, 'DURANIA'),
(834, 22, 'EL CARMEN'),
(835, 22, 'EL TARRA'),
(836, 22, 'EL ZULIA'),
(837, 22, 'GRAMALOTE'),
(838, 22, 'HACARI'),
(839, 22, 'HERRÁN'),
(840, 22, 'LA ESPERANZA'),
(841, 22, 'LA PLAYA'),
(842, 22, 'LABATECA'),
(843, 22, 'LOS PATIOS'),
(844, 22, 'LOURDES'),
(845, 22, 'MUTISCUA'),
(846, 22, 'OCAÑA'),
(847, 22, 'PAMPLONA'),
(848, 22, 'PAMPLONITA'),
(849, 22, 'PUERTO SANTANDER'),
(850, 22, 'RAGONVALIA'),
(851, 22, 'SALAZAR'),
(852, 22, 'SAN CALIXTO'),
(853, 22, 'SAN CAYETANO'),
(854, 22, 'SANTIAGO'),
(855, 22, 'SARDINATA'),
(856, 22, 'SILOS'),
(857, 22, 'TEORAMA'),
(858, 22, 'TIBÚ'),
(859, 22, 'TOLEDO'),
(860, 22, 'VILLA CARO'),
(861, 22, 'VILLA DEL ROSARIO'),
(862, 23, 'COLÓN'),
(863, 23, 'MOCOA'),
(864, 23, 'ORITO'),
(865, 23, 'PUERTO ASÍS'),
(866, 23, 'PUERTO CAYCEDO'),
(867, 23, 'PUERTO GUZMÁN'),
(868, 23, 'PUERTO LEGUÍZAMO'),
(869, 23, 'SAN FRANCISCO'),
(870, 23, 'SAN MIGUEL'),
(871, 23, 'SANTIAGO'),
(872, 23, 'SIBUNDOY'),
(873, 23, 'VALLE DEL GUAMUEZ'),
(874, 23, 'VILLAGARZÓN'),
(875, 24, 'ARMENIA'),
(876, 24, 'BUENAVISTA'),
(877, 24, 'CALARCÁ'),
(878, 24, 'CIRCASIA'),
(879, 24, 'CÓRDOBA'),
(880, 24, 'FILANDIA'),
(881, 24, 'GÉNOVA'),
(882, 24, 'LA TEBAIDA'),
(883, 24, 'MONTENEGRO'),
(884, 24, 'PIJAO'),
(885, 24, 'QUIMBAYA'),
(886, 24, 'SALENTO'),
(887, 25, 'APIA'),
(888, 25, 'BALBOA'),
(889, 25, 'BELÉN DE UMBRÍA'),
(890, 25, 'DOS QUEBRADAS'),
(891, 25, 'GUATICA'),
(892, 25, 'LA CELIA'),
(893, 25, 'LA VIRGINIA'),
(894, 25, 'MARSELLA'),
(895, 25, 'MISTRATO'),
(896, 25, 'PEREIRA'),
(897, 25, 'PUEBLO RICO'),
(898, 25, 'QUINCHÍA'),
(899, 25, 'SANTA ROSA DE CABAL'),
(900, 25, 'SANTUARIO'),
(901, 26, 'PROVIDENCIA'),
(902, 26, 'SAN ANDRES'),
(903, 26, 'SANTA CATALINA'),
(904, 27, 'AGUADA'),
(905, 27, 'ALBANIA'),
(906, 27, 'ARATOCA'),
(907, 27, 'BARBOSA'),
(908, 27, 'BARICHARA'),
(909, 27, 'BARRANCABERMEJA'),
(910, 27, 'BETULIA'),
(911, 27, 'BOLÍVAR'),
(912, 27, 'BUCARAMANGA'),
(913, 27, 'CABRERA'),
(914, 27, 'CALIFORNIA'),
(915, 27, 'CAPITANEJO'),
(916, 27, 'CARCASI'),
(917, 27, 'CEPITA'),
(918, 27, 'CERRITO'),
(919, 27, 'CHARALÁ'),
(920, 27, 'CHARTA'),
(921, 27, 'CHIMA'),
(922, 27, 'CHIPATÁ'),
(923, 27, 'CIMITARRA'),
(924, 27, 'CONCEPCIÓN'),
(925, 27, 'CONFINES'),
(926, 27, 'CONTRATACIÓN'),
(927, 27, 'COROMORO'),
(928, 27, 'CURITÍ'),
(929, 27, 'EL CARMEN'),
(930, 27, 'EL GUACAMAYO'),
(931, 27, 'EL PEÑÓN'),
(932, 27, 'EL PLAYÓN'),
(933, 27, 'ENCINO'),
(934, 27, 'ENCISO'),
(935, 27, 'FLORIÁN'),
(936, 27, 'FLORIDABLANCA'),
(937, 27, 'GALÁN'),
(938, 27, 'GAMBITA'),
(939, 27, 'GIRÓN'),
(940, 27, 'GUACA'),
(941, 27, 'GUADALUPE'),
(942, 27, 'GUAPOTA'),
(943, 27, 'GUAVATÁ'),
(944, 27, 'GUEPSA'),
(945, 27, 'HATO'),
(946, 27, 'JESÚS MARIA'),
(947, 27, 'JORDÁN'),
(948, 27, 'LA BELLEZA'),
(949, 27, 'LA PAZ'),
(950, 27, 'LANDAZURI'),
(951, 27, 'LEBRIJA'),
(952, 27, 'LOS SANTOS'),
(953, 27, 'MACARAVITA'),
(954, 27, 'MÁLAGA'),
(955, 27, 'MATANZA'),
(956, 27, 'MOGOTES'),
(957, 27, 'MOLAGAVITA'),
(958, 27, 'OCAMONTE'),
(959, 27, 'OIBA'),
(960, 27, 'ONZAGA'),
(961, 27, 'PALMAR'),
(962, 27, 'PALMAS DEL SOCORRO'),
(963, 27, 'PÁRAMO'),
(964, 27, 'PIEDECUESTA'),
(965, 27, 'PINCHOTE'),
(966, 27, 'PUENTE NACIONAL'),
(967, 27, 'PUERTO PARRA'),
(968, 27, 'PUERTO WILCHES'),
(969, 27, 'RIONEGRO'),
(970, 27, 'SABANA DE TORRES'),
(971, 27, 'SAN ANDRÉS'),
(972, 27, 'SAN BENITO'),
(973, 27, 'SAN GIL'),
(974, 27, 'SAN JOAQUÍN'),
(975, 27, 'SAN JOSÉ DE MIRANDA'),
(976, 27, 'SAN MIGUEL'),
(977, 27, 'SAN VICENTE DE CHUCURÍ'),
(978, 27, 'SANTA BÁRBARA'),
(979, 27, 'SANTA HELENA'),
(980, 27, 'SIMACOTA'),
(981, 27, 'SOCORRO'),
(982, 27, 'SUAITA'),
(983, 27, 'SUCRE'),
(984, 27, 'SURATA'),
(985, 27, 'TONA'),
(986, 27, 'VALLE SAN JOSÉ'),
(987, 27, 'VÉLEZ'),
(988, 27, 'VETAS'),
(989, 27, 'VILLANUEVA'),
(990, 27, 'ZAPATOCA'),
(991, 28, 'BUENAVISTA'),
(992, 28, 'CAIMITO'),
(993, 28, 'CHALÁN'),
(994, 28, 'COLOSO'),
(995, 28, 'COROZAL'),
(996, 28, 'EL ROBLE'),
(997, 28, 'GALERAS'),
(998, 28, 'GUARANDA'),
(999, 28, 'LA UNIÓN'),
(1000, 28, 'LOS PALMITOS'),
(1001, 28, 'MAJAGUAL'),
(1002, 28, 'MORROA'),
(1003, 28, 'OVEJAS'),
(1004, 28, 'PALMITO'),
(1005, 28, 'SAMPUES'),
(1006, 28, 'SAN BENITO ABAD'),
(1007, 28, 'SAN JUAN DE BETULIA'),
(1008, 28, 'SAN MARCOS'),
(1009, 28, 'SAN ONOFRE'),
(1010, 28, 'SAN PEDRO'),
(1011, 28, 'SINCÉ'),
(1012, 28, 'SINCELEJO'),
(1013, 28, 'SUCRE'),
(1014, 28, 'TOLÚ'),
(1015, 28, 'TOLUVIEJO'),
(1016, 29, 'ALPUJARRA'),
(1017, 29, 'ALVARADO'),
(1018, 29, 'AMBALEMA'),
(1019, 29, 'ANZOATEGUI'),
(1020, 29, 'ARMERO (GUAYABAL)'),
(1021, 29, 'ATACO'),
(1022, 29, 'CAJAMARCA'),
(1023, 29, 'CARMEN DE APICALÁ'),
(1024, 29, 'CASABIANCA'),
(1025, 29, 'CHAPARRAL'),
(1026, 29, 'COELLO'),
(1027, 29, 'COYAIMA'),
(1028, 29, 'CUNDAY'),
(1029, 29, 'DOLORES'),
(1030, 29, 'ESPINAL'),
(1031, 29, 'FALÁN'),
(1032, 29, 'FLANDES'),
(1033, 29, 'FRESNO'),
(1034, 29, 'GUAMO'),
(1035, 29, 'HERVEO'),
(1036, 29, 'HONDA'),
(1037, 29, 'IBAGUE'),
(1038, 29, 'ICONONZO'),
(1039, 29, 'LÉRIDA'),
(1040, 29, 'LÍBANO'),
(1041, 29, 'MARIQUITA'),
(1042, 29, 'MELGAR'),
(1043, 29, 'MURILLO'),
(1044, 29, 'NATAGAIMA'),
(1045, 29, 'ORTEGA'),
(1046, 29, 'PALOCABILDO'),
(1047, 29, 'PIEDRAS PLANADAS'),
(1048, 29, 'PRADO'),
(1049, 29, 'PURIFICACIÓN'),
(1050, 29, 'RIOBLANCO'),
(1051, 29, 'RONCESVALLES'),
(1052, 29, 'ROVIRA'),
(1053, 29, 'SALDAÑA'),
(1054, 29, 'SAN ANTONIO'),
(1055, 29, 'SAN LUIS'),
(1056, 29, 'SANTA ISABEL'),
(1057, 29, 'SUÁREZ'),
(1058, 29, 'VALLE DE SAN JUAN'),
(1059, 29, 'VENADILLO'),
(1060, 29, 'VILLAHERMOSA'),
(1061, 29, 'VILLARRICA'),
(1062, 30, 'ALCALÁ'),
(1063, 30, 'ANDALUCÍA'),
(1064, 30, 'ANSERMA NUEVO'),
(1065, 30, 'ARGELIA'),
(1066, 30, 'BOLÍVAR'),
(1067, 30, 'BUENAVENTURA'),
(1068, 30, 'BUGA'),
(1069, 30, 'BUGALAGRANDE'),
(1070, 30, 'CAICEDONIA'),
(1071, 30, 'CALI'),
(1072, 30, 'CALIMA (DARIEN)'),
(1073, 30, 'CANDELARIA'),
(1074, 30, 'CARTAGO'),
(1075, 30, 'DAGUA'),
(1076, 30, 'EL AGUILA'),
(1077, 30, 'EL CAIRO'),
(1078, 30, 'EL CERRITO'),
(1079, 30, 'EL DOVIO'),
(1080, 30, 'FLORIDA'),
(1081, 30, 'GINEBRA GUACARI'),
(1082, 30, 'JAMUNDÍ'),
(1083, 30, 'LA CUMBRE'),
(1084, 30, 'LA UNIÓN'),
(1085, 30, 'LA VICTORIA'),
(1086, 30, 'OBANDO'),
(1087, 30, 'PALMIRA'),
(1088, 30, 'PRADERA'),
(1089, 30, 'RESTREPO'),
(1090, 30, 'RIO FRÍO'),
(1091, 30, 'ROLDANILLO'),
(1092, 30, 'SAN PEDRO'),
(1093, 30, 'SEVILLA'),
(1094, 30, 'TORO'),
(1095, 30, 'TRUJILLO'),
(1096, 30, 'TULÚA'),
(1097, 30, 'ULLOA'),
(1098, 30, 'VERSALLES'),
(1099, 30, 'VIJES'),
(1100, 30, 'YOTOCO'),
(1101, 30, 'YUMBO'),
(1102, 30, 'ZARZAL'),
(1103, 31, 'CARURÚ'),
(1104, 31, 'MITÚ'),
(1105, 31, 'PACOA'),
(1106, 31, 'PAPUNAUA'),
(1107, 31, 'TARAIRA'),
(1108, 31, 'YAVARATÉ'),
(1109, 32, 'CUMARIBO'),
(1110, 32, 'LA PRIMAVERA'),
(1111, 32, 'PUERTO CARREÑO'),
(1112, 32, 'SANTA ROSALIA');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `programas`
--

CREATE TABLE `programas` (
  `id_Programa` bigint(20) NOT NULL,
  `id_Tipo_Programa` bigint(20) NOT NULL,
  `nombre_Programa` varchar(60) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `recepcion_muestra`
--

CREATE TABLE `recepcion_muestra` (
  `id_Recepcion_Muestra` bigint(20) NOT NULL,
  `Fecha` date NOT NULL,
  `Hora` time NOT NULL,
  `id_Toma_Muestra` bigint(20) NOT NULL,
  `Humedad` varchar(11) NOT NULL,
  `Textura` varchar(11) NOT NULL,
  `ph_Muestra` varchar(11) NOT NULL,
  `densidad_Aderente` varchar(11) NOT NULL,
  `densidad_Real` varchar(11) NOT NULL,
  `porosidad` varchar(11) NOT NULL,
  `retencion_Humedad` varchar(11) NOT NULL,
  `distrubucion_tamanos` varchar(11) NOT NULL,
  `cationes_Intercambiables` varchar(20) NOT NULL,
  `elementos_Menores` varchar(20) NOT NULL,
  `materia_Organica` varchar(11) NOT NULL,
  `carbono_organico` varchar(11) NOT NULL,
  `CIC` varchar(20) NOT NULL,
  `Otros` varchar(20) NOT NULL,
  `muestra_Entregada_Por` varchar(20) NOT NULL,
  `muestra_Recibida_Por` varchar(20) NOT NULL,
  `Observaciones` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tipo_programa`
--

CREATE TABLE `tipo_programa` (
  `id_Tipo_Programa` bigint(20) NOT NULL,
  `Tipo` varchar(15) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `tipo_programa`
--

INSERT INTO `tipo_programa` (`id_Tipo_Programa`, `Tipo`) VALUES
(1, 'TECNICO'),
(2, 'TECNOLOGO'),
(3, 'ESPECIALIZACION');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `toma_muestra`
--

CREATE TABLE `toma_muestra` (
  `id_Toma_Muestra` bigint(20) NOT NULL,
  `fecha_Toma` date NOT NULL,
  `Hora` time NOT NULL,
  `id_Ficha` bigint(20) NOT NULL,
  `Proyecto` varchar(100) NOT NULL,
  `id_Instructor` bigint(20) NOT NULL COMMENT 'responsable de la muestra',
  `identificacion_Muestra` varchar(20) NOT NULL,
  `id_Lote` bigint(20) NOT NULL,
  `tipo_Topografia` varchar(30) NOT NULL,
  `profundidad_Muestra` float NOT NULL,
  `Humedad` float NOT NULL,
  `fuerza_penetracion` float NOT NULL,
  `profundidad_Campo` float NOT NULL,
  `Norte` double NOT NULL,
  `Occidente` double NOT NULL,
  `Altura` double NOT NULL,
  `responsable_Toma` varchar(60) NOT NULL,
  `Empresa` varchar(60) NOT NULL,
  `correo_Electronico` varchar(100) NOT NULL,
  `Telefono` varchar(20) NOT NULL,
  `responsable_Recibido` varchar(60) NOT NULL,
  `Observaciones` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `usuarios`
--

CREATE TABLE `usuarios` (
  `id_Usuario` bigint(20) NOT NULL,
  `rol` varchar(15) CHARACTER SET utf8mb4 COLLATE utf8mb4_spanish2_ci NOT NULL,
  `nombre_Usuario` varchar(60) CHARACTER SET utf8mb4 COLLATE utf8mb4_spanish2_ci NOT NULL,
  `usuario` varchar(30) CHARACTER SET utf8mb4 COLLATE utf8mb4_spanish2_ci NOT NULL,
  `contrasena` varchar(100) CHARACTER SET utf8mb4 COLLATE utf8mb4_spanish2_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_spanish_ci;

--
-- Volcado de datos para la tabla `usuarios`
--

INSERT INTO `usuarios` (`id_Usuario`, `rol`, `nombre_Usuario`, `usuario`, `contrasena`) VALUES
(1, 'ADMINISTRADOR', 'Instructor', 'admin', '9adcb29710e807607b683f62e555c22dc5659713'),
(5, 'consultar', 'consultar', 'consultar', 'eb4c6a079b9c1d1adff6ab3fd129bf2f8970ae0b'),
(6, 'registrar', 'registro', 'registro', 'b3435b893dc264b01b953d2214312ac4dba62857'),
(7, 'Analista', 'Analista', 'analista', '454e9a00203e6a1a05e5c93b54af937e51d1bed8');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `veredas`
--

CREATE TABLE `veredas` (
  `id_Vereda` bigint(20) NOT NULL,
  `id_Municipio` bigint(20) NOT NULL,
  `nombre_Vereda` varchar(60) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `analisis_muestra`
--
ALTER TABLE `analisis_muestra`
  ADD PRIMARY KEY (`id_Analisis_Muestra`),
  ADD KEY `id_Recepcion_Muestra` (`id_Recepcion_Muestra`);

--
-- Indices de la tabla `departamentos`
--
ALTER TABLE `departamentos`
  ADD PRIMARY KEY (`id_Departamento`);

--
-- Indices de la tabla `fichas`
--
ALTER TABLE `fichas`
  ADD PRIMARY KEY (`id_Ficha`),
  ADD KEY `id_Programa` (`id_Programa`);

--
-- Indices de la tabla `fincas`
--
ALTER TABLE `fincas`
  ADD PRIMARY KEY (`id_Finca`),
  ADD KEY `id_Vereda` (`id_Vereda`);

--
-- Indices de la tabla `instructores`
--
ALTER TABLE `instructores`
  ADD PRIMARY KEY (`id_Instructor`);

--
-- Indices de la tabla `lotes`
--
ALTER TABLE `lotes`
  ADD PRIMARY KEY (`id_Lote`),
  ADD KEY `id_Finca` (`id_Finca`);

--
-- Indices de la tabla `municipios`
--
ALTER TABLE `municipios`
  ADD PRIMARY KEY (`id_Municipio`),
  ADD KEY `id_Departamento` (`id_Departamento`);

--
-- Indices de la tabla `programas`
--
ALTER TABLE `programas`
  ADD PRIMARY KEY (`id_Programa`),
  ADD KEY `id_Tipo_Programa` (`id_Tipo_Programa`);

--
-- Indices de la tabla `recepcion_muestra`
--
ALTER TABLE `recepcion_muestra`
  ADD PRIMARY KEY (`id_Recepcion_Muestra`),
  ADD KEY `id_Toma_Muestra` (`id_Toma_Muestra`);

--
-- Indices de la tabla `tipo_programa`
--
ALTER TABLE `tipo_programa`
  ADD PRIMARY KEY (`id_Tipo_Programa`);

--
-- Indices de la tabla `toma_muestra`
--
ALTER TABLE `toma_muestra`
  ADD PRIMARY KEY (`id_Toma_Muestra`),
  ADD KEY `id_Ficha` (`id_Ficha`,`id_Instructor`,`id_Lote`),
  ADD KEY `id_Instructor` (`id_Instructor`),
  ADD KEY `id_Lote` (`id_Lote`);

--
-- Indices de la tabla `usuarios`
--
ALTER TABLE `usuarios`
  ADD PRIMARY KEY (`id_Usuario`);

--
-- Indices de la tabla `veredas`
--
ALTER TABLE `veredas`
  ADD PRIMARY KEY (`id_Vereda`),
  ADD KEY `id_Municipio` (`id_Municipio`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `analisis_muestra`
--
ALTER TABLE `analisis_muestra`
  MODIFY `id_Analisis_Muestra` bigint(20) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `departamentos`
--
ALTER TABLE `departamentos`
  MODIFY `id_Departamento` bigint(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=33;

--
-- AUTO_INCREMENT de la tabla `fichas`
--
ALTER TABLE `fichas`
  MODIFY `id_Ficha` bigint(20) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `fincas`
--
ALTER TABLE `fincas`
  MODIFY `id_Finca` bigint(20) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `instructores`
--
ALTER TABLE `instructores`
  MODIFY `id_Instructor` bigint(20) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `lotes`
--
ALTER TABLE `lotes`
  MODIFY `id_Lote` bigint(20) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `municipios`
--
ALTER TABLE `municipios`
  MODIFY `id_Municipio` bigint(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=1113;

--
-- AUTO_INCREMENT de la tabla `programas`
--
ALTER TABLE `programas`
  MODIFY `id_Programa` bigint(20) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `recepcion_muestra`
--
ALTER TABLE `recepcion_muestra`
  MODIFY `id_Recepcion_Muestra` bigint(20) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `tipo_programa`
--
ALTER TABLE `tipo_programa`
  MODIFY `id_Tipo_Programa` bigint(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT de la tabla `toma_muestra`
--
ALTER TABLE `toma_muestra`
  MODIFY `id_Toma_Muestra` bigint(20) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `usuarios`
--
ALTER TABLE `usuarios`
  MODIFY `id_Usuario` bigint(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT de la tabla `veredas`
--
ALTER TABLE `veredas`
  MODIFY `id_Vereda` bigint(20) NOT NULL AUTO_INCREMENT;

--
-- Restricciones para tablas volcadas
--

--
-- Filtros para la tabla `analisis_muestra`
--
ALTER TABLE `analisis_muestra`
  ADD CONSTRAINT `analisis_muestra_ibfk_1` FOREIGN KEY (`id_Recepcion_Muestra`) REFERENCES `recepcion_muestra` (`id_Recepcion_Muestra`);

--
-- Filtros para la tabla `fichas`
--
ALTER TABLE `fichas`
  ADD CONSTRAINT `fichas_ibfk_1` FOREIGN KEY (`id_Programa`) REFERENCES `programas` (`id_Programa`);

--
-- Filtros para la tabla `fincas`
--
ALTER TABLE `fincas`
  ADD CONSTRAINT `fincas_ibfk_1` FOREIGN KEY (`id_Vereda`) REFERENCES `veredas` (`id_Vereda`);

--
-- Filtros para la tabla `lotes`
--
ALTER TABLE `lotes`
  ADD CONSTRAINT `lotes_ibfk_1` FOREIGN KEY (`id_Finca`) REFERENCES `fincas` (`id_Finca`);

--
-- Filtros para la tabla `municipios`
--
ALTER TABLE `municipios`
  ADD CONSTRAINT `municipios_ibfk_1` FOREIGN KEY (`id_Departamento`) REFERENCES `departamentos` (`id_Departamento`);

--
-- Filtros para la tabla `programas`
--
ALTER TABLE `programas`
  ADD CONSTRAINT `programas_ibfk_1` FOREIGN KEY (`id_Tipo_Programa`) REFERENCES `tipo_programa` (`id_Tipo_Programa`);

--
-- Filtros para la tabla `recepcion_muestra`
--
ALTER TABLE `recepcion_muestra`
  ADD CONSTRAINT `recepcion_muestra_ibfk_1` FOREIGN KEY (`id_Toma_Muestra`) REFERENCES `toma_muestra` (`id_Toma_Muestra`);

--
-- Filtros para la tabla `toma_muestra`
--
ALTER TABLE `toma_muestra`
  ADD CONSTRAINT `toma_muestra_ibfk_1` FOREIGN KEY (`id_Instructor`) REFERENCES `instructores` (`id_Instructor`),
  ADD CONSTRAINT `toma_muestra_ibfk_2` FOREIGN KEY (`id_Lote`) REFERENCES `lotes` (`id_Lote`),
  ADD CONSTRAINT `toma_muestra_ibfk_3` FOREIGN KEY (`id_Ficha`) REFERENCES `fichas` (`id_Ficha`);

--
-- Filtros para la tabla `veredas`
--
ALTER TABLE `veredas`
  ADD CONSTRAINT `veredas_ibfk_1` FOREIGN KEY (`id_Municipio`) REFERENCES `municipios` (`id_Municipio`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;