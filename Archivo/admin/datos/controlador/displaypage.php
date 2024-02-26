-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 26-03-2022 a las 00:29:22
-- Versión del servidor: 10.4.22-MariaDB
-- Versión de PHP: 8.1.2

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `restaurant`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `caja`
--

CREATE TABLE `caja` (
  `id` int(11) NOT NULL,
  `sucursal` int(11) DEFAULT NULL,
  `codigo` varchar(50) DEFAULT NULL,
  `cierre` int(11) DEFAULT 0,
  `fecha_apertura` datetime DEFAULT NULL,
  `fecha_de_cierre` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `caracteristica_item`
--

CREATE TABLE `caracteristica_item` (
  `id` int(11) NOT NULL,
  `nombre` varchar(255) DEFAULT NULL,
  `id_item` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `carta`
--

CREATE TABLE `carta` (
  `id` int(11) NOT NULL,
  `nombre` varchar(255) DEFAULT NULL,
  `posicion` int(11) DEFAULT NULL,
  `id_persona` int(11) DEFAULT NULL,
  `id_sucursal` int(11) DEFAULT NULL,
  `estado` tinyint(1) DEFAULT 1,
  `ukr` text DEFAULT NULL,
  `fecha` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `categorias`
--

CREATE TABLE `categorias` (
  `id` int(11) NOT NULL,
  `nombre` varchar(255) DEFAULT NULL,
  `logo` text DEFAULT NULL,
  `codigo` varchar(20) DEFAULT NULL,
  `posicion` int(11) DEFAULT NULL,
  `estado` tinyint(4) DEFAULT 1,
  `sucursal` int(11) DEFAULT NULL,
  `id_carta` int(11) DEFAULT NULL,
  `ukr` text DEFAULT NULL,
  `fecha` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `colores`
--

CREATE TABLE `colores` (
  `id` int(11) NOT NULL,
  `color` varchar(250) DEFAULT NULL,
  `color_primario` varchar(30) DEFAULT NULL,
  `color_segundario` varchar(30) DEFAULT NULL,
  `fecha` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `colores`
--

INSERT INTO `colores` (`id`, `color`, `color_primario`, `color_segundario`, `fecha`) VALUES
(1, '#fff', '#222f3e', '#576574', '2019-11-27 14:21:52'),
(2, '#fff', '#2c3e50', '#34495e', '2019-11-27 14:22:24'),
(3, '#fff', '#7f8c8d', '#95a5a6', '2019-11-27 14:22:37'),
(4, '#fff', '#95a5a6', '#7f8c8d', '2019-11-27 14:22:49'),
(5, '#fff', '#c0392b', '#e74c3c', '2019-11-27 14:23:01'),
(6, '#fff', '#e74c3c', '#c0392b', '2019-11-27 14:23:15'),
(7, '#fff', '#d35400', '#e67e22', '2019-11-27 14:23:28'),
(8, '#fff', '#e67e22', '#d35400', '2019-11-27 14:23:44'),
(9, '#fff', '#f39c12', '#f1c40f', '2019-11-27 14:23:58'),
(10, '#fff', '#f1c40f', '#f39c12', '2019-11-27 14:24:14'),
(11, '#fff', '#8e44ad', '#9b59b6', '2019-11-27 14:24:28'),
(12, '#fff', '#9b59b6', '#8e44ad', '2019-11-27 14:24:45'),
(13, '#fff', '#2980b9', '#3498db', '2019-11-27 14:25:00'),
(14, '#fff', '#3498db', '#2980b9', '2019-11-27 14:25:15'),
(15, '#fff', '#27ae60', '#2ecc71', '2019-11-27 14:25:29'),
(16, '#fff', '#2ecc71', '#27ae60', '2019-11-27 14:25:40'),
(17, '#fff', '#16a085', '#1abc9c', '2019-11-27 14:25:53'),
(18, '#fff', '#1abc9c', '#16a085', '2019-11-27 14:26:08'),
(19, '#fff', '#0abde3', '#48dbfb', '2019-11-27 14:26:21'),
(20, '#fff', '#48dbfb', '#0abde3', '2019-11-27 14:26:36'),
(21, '#fff', '#f368e0', '#ff9ff3', '2020-02-21 14:21:22'),
(22, '#fff', '#ff9ff3', '#f368e0', '2020-02-21 14:23:24'),
(23, '#fff', '#341f97', '#5f27cd', '2020-02-21 14:23:25'),
(24, '#fff', '#5f27cd', '#341f97', '2020-02-21 14:24:04'),
(25, '#fff', '#78e08f', '#b8e994', '2020-02-21 14:25:11'),
(26, '#fff', '#b8e994', '#78e08f', '2020-02-21 14:27:22'),
(27, '#fff', '#0fbcf9', '#4bcffa', '2020-02-21 14:28:22'),
(28, '#fff', '#4bcffa', '#0fbcf9', '2020-02-21 14:29:22'),
(29, '#fff', '#f19066', '#f3a683', '2020-02-21 14:30:19'),
(30, '#fff', '#f3a683', '#f19066', '2020-02-21 14:31:19'),
(31, '#fff', '#c44569', '#cf6a87', '2020-02-21 14:32:24'),
(32, '#fff', '#cf6a87', '#c44569', '2020-02-21 14:33:24'),
(33, '#444', '#FAFAFA', '#888', '2020-03-19 13:54:36');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `configuracion`
--

CREATE TABLE `configuracion` (
  `id` int(11) NOT NULL,
  `nombre` varchar(150) DEFAULT NULL,
  `label` varchar(250) DEFAULT NULL,
  `valor` text DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `configuracion`
--

INSERT INTO `configuracion` (`id`, `nombre`, `label`, `valor`) VALUES
(1, 'luis_base', 'Url pagina', 'https://localhost/'),
(2, 'luis_titulo', 'Titulo pagina', 'Equipos digitales y telecomunicaciones - Mayorista de ordenadores usados'),
(3, 'luis_descripcion', 'Descripcion de pagina', '\nSomos una empresa dedicado a la importacion de ordenadores usados. \nen distitas marcas ventas por mayor y por menor con garantia \ncon mas de 10 años en el mercado'),
(4, 'luis_correo', 'Correo principal', NULL),
(5, 'luis_nombre', 'Nombre de pagina', 'Equipos digitales'),
(6, 'luis_igv', 'IGV', '0'),
(7, 'luis_keywords', 'Keywords', NULL),
(8, 'luis_cuenta_gmail', 'Cuenta gmail para enviar correos', NULL),
(9, 'luis_pd_gmail', 'Password de tu cuenta gmail', NULL),
(10, 'luis_verifica_google', 'Verificacion de google', NULL),
(11, 'luis_google_maps', 'Codigo de google maps', NULL),
(12, 'luis_cuenta_cp', 'Nombre de usuario', NULL),
(13, 'luis_cuenta_cp_p', 'Password', NULL),
(14, 'luis_slogan', 'Eslogan', '-'),
(15, 'luis_logo', 'logo', 'equipos-digitales.png'),
(16, 'luis_icon', 'Icono', 'logo.png');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `departamentos`
--

CREATE TABLE `departamentos` (
  `id` int(11) NOT NULL,
  `nombre` varchar(250) DEFAULT NULL,
  `nombre_corto` varchar(200) DEFAULT NULL,
  `id_pais` int(11) DEFAULT 1,
  `esta_activado` tinyint(1) NOT NULL DEFAULT 0,
  `fecha` datetime DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `departamentos`
--

INSERT INTO `departamentos` (`id`, `nombre`, `nombre_corto`, `id_pais`, `esta_activado`, `fecha`) VALUES
(1, 'AMAZONAS', 'AMAZONAS', 1, 1, NULL),
(2, 'ANCASH', 'AN', 1, 1, NULL),
(3, 'APURIMAC', 'APU', 1, 1, NULL),
(4, 'AREQUIPA', 'AREQUIPA', 1, 1, NULL),
(5, 'AYACUCHO', 'AYACUCHO', 1, 1, NULL),
(6, 'CAJAMARCA', 'CAJAMARCA', 1, 1, NULL),
(7, 'CALLAO', 'CALLAO', 1, 1, NULL),
(8, 'CUSCO', 'CUSCO', 1, 1, NULL),
(9, 'HUANCAVELICA', 'HUANCAVELICA', 1, 1, NULL),
(10, 'HUANUCO', 'HUANUCO', 1, 1, NULL),
(11, 'ICA', 'ICA', 1, 1, NULL),
(12, 'JUNIN', 'JUNIN', 1, 1, NULL),
(13, 'LA LIBERTAD', 'LA-LIBERTAD', 1, 1, NULL),
(14, 'LAMBAYEQUE', 'LAMBAYEQUE', 1, 1, NULL),
(15, 'LIMA', 'LIMA', 1, 1, NULL),
(16, 'LORETO', 'LORETO', 1, 1, NULL),
(17, 'MADRE DE DIOS', 'MADRE-DE-DIOS', 1, 1, NULL),
(18, 'MOQUEGUA', 'MOQUEGUA', 1, 1, NULL),
(19, 'PASCO', 'PASCO', 1, 1, NULL),
(20, 'PIURA', 'PIURA', 1, 1, NULL),
(21, 'PUNO', 'PUNO', 1, 1, NULL),
(22, 'SAN MARTIN', 'SAN-MARTIN', 1, 1, NULL),
(23, 'TACNA', 'TACNA', 1, 1, NULL),
(24, 'TUMBES', 'TUMBES', 1, 1, NULL),
(25, 'UCAYALI', 'UCAYALI', 1, 1, NULL);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `detalles_venta`
--

CREATE TABLE `detalles_venta` (
  `id` int(11) NOT NULL,
  `id_venta` int(11) DEFAULT NULL,
  `id_item` int(11) DEFAULT NULL,
  `codigo` varchar(250) DEFAULT NULL,
  `cantidad` varchar(100) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `detalles_venta_sub`
--

CREATE TABLE `detalles_venta_sub` (
  `id` int(11) NOT NULL,
  `id_venta` int(11) DEFAULT NULL,
  `codigo_item` varchar(250) DEFAULT NULL,
  `id_opcion_sub` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `devoluciones`
--

CREATE TABLE `devoluciones` (
  `id` int(11) NOT NULL,
  `comentario` text DEFAULT NULL,
  `id_cliente` int(11) DEFAULT NULL,
  `id_vendedor` int(11) DEFAULT NULL,
  `documento` int(11) DEFAULT NULL,
  `num_documento` varchar(250) DEFAULT NULL,
  `estado` tinyint(4) DEFAULT 0,
  `fecha` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `diapositiva`
--

CREATE TABLE `diapositiva` (
  `id` int(11) NOT NULL,
  `nombre` varchar(250) DEFAULT NULL,
  `imagen` varchar(255) DEFAULT NULL,
  `codigo` varchar(30) DEFAULT NULL,
  `posicion` int(11) DEFAULT NULL,
  `url` text DEFAULT NULL,
  `fecha` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `diapositiva`
--

INSERT INTO `diapositiva` (`id`, `nombre`, `imagen`, `codigo`, `posicion`, `url`, `fecha`) VALUES
(58, 'Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod   tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam', 'hongkongbynight-2000x400.jp', NULL, NULL, '', '2019-12-18 12:36:19'),
(62, 'GGorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod   tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam', '2000-x-400-_spirited-banner_person_adjusted_right.webp', NULL, NULL, '', '2020-02-01 13:11:14'),
(219, 'f', 'fuente-en-la-ciudad-de-chicago-4619.jp', NULL, NULL, '', '2020-08-16 22:42:49');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `direccion_envio`
--

CREATE TABLE `direccion_envio` (
  `id` int(11) NOT NULL,
  `nombre` varchar(255) DEFAULT NULL,
  `direccion` text DEFAULT NULL,
  `sugerencia` text DEFAULT NULL,
  `id_persona` int(11) DEFAULT NULL,
  `principal` int(11) DEFAULT 0,
  `latitud` varchar(255) DEFAULT NULL,
  `longitud` varchar(255) DEFAULT NULL,
  `costo_envio` varchar(50) DEFAULT '0',
  `km_total` varchar(50) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `distritos`
--

CREATE TABLE `distritos` (
  `id` int(11) NOT NULL,
  `id_provincia` int(11) DEFAULT NULL,
  `nombre` varchar(250) DEFAULT NULL,
  `nombre_corto` varchar(200) DEFAULT NULL,
  `esta_activado` tinyint(1) DEFAULT 0,
  `fecha` datetime DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `distritos`
--

INSERT INTO `distritos` (`id`, `id_provincia`, `nombre`, `nombre_corto`, `esta_activado`, `fecha`) VALUES
(1, 1, 'CHACHAPOYAS', '', 1, NULL),
(2, 1, 'ASUNCION', '', 1, NULL),
(3, 1, 'BALSAS', '', 1, NULL),
(4, 1, 'CHETO', '', 1, NULL),
(5, 1, 'CHILIQUIN', '', 1, NULL),
(6, 1, 'CHUQUIBAMBA', '', 1, NULL),
(7, 1, 'GRANADA', '', 1, NULL),
(8, 1, 'HUANCAS', '', 1, NULL),
(9, 1, 'LA JALCA', '', 1, NULL),
(10, 1, 'LEIMEBAMBA', '', 1, NULL),
(11, 1, 'LEVANTO', '', 1, NULL),
(12, 1, 'MAGDALENA', '', 1, NULL),
(13, 1, 'MARISCAL CASTILLA', '', 1, NULL),
(14, 1, 'MOLINOPAMPA', '', 1, NULL),
(15, 1, 'MONTEVIDEO', '', 1, NULL),
(16, 1, 'OLLEROS', '', 1, NULL),
(17, 1, 'QUINJALCA', '', 1, NULL),
(18, 1, 'SAN FRANCISCO DE DAGUAS', '', 1, NULL),
(19, 1, 'SAN ISIDRO DE MAINO', '', 1, NULL),
(20, 1, 'SOLOCO', '', 1, NULL),
(21, 1, 'SONCHE', '', 1, NULL),
(22, 2, 'LA PECA', '', 1, NULL),
(23, 2, 'ARAMANGO', '', 1, NULL),
(24, 2, 'COPALLIN', '', 1, NULL),
(25, 2, 'EL PARCO', '', 1, NULL),
(26, 2, 'IMAZA', '', 1, NULL),
(27, 2, 'BAGUA', '', 1, NULL),
(28, 3, 'JUMBILLA', '', 1, NULL),
(29, 3, 'CHISQUILLA', '', 1, NULL),
(30, 3, 'CHURUJA', '', 1, NULL),
(31, 3, 'COROSHA', '', 1, NULL),
(32, 3, 'CUISPES', '', 1, NULL),
(33, 3, 'FLORIDA', '', 1, NULL),
(34, 3, 'JAZAN', '', 1, NULL),
(35, 3, 'RECTA', '', 1, NULL),
(36, 3, 'SAN CARLOS', '', 1, NULL),
(37, 3, 'SHIPASBAMBA', '', 1, NULL),
(38, 3, 'VALERA', '', 1, NULL),
(39, 3, 'YAMBRASBAMBA', '', 1, NULL),
(40, 4, 'NIEVA', '', 1, NULL),
(41, 4, 'EL CENEPA', '', 1, NULL),
(42, 4, 'RIO SANTIAGO', '', 1, NULL),
(43, 5, 'LAMUD', '', 1, NULL),
(44, 5, 'CAMPORREDONDO', '', 1, NULL),
(45, 5, 'COCABAMBA', '', 1, NULL),
(46, 5, 'COLCAMAR', '', 1, NULL),
(47, 5, 'CONILA', '', 1, NULL),
(48, 5, 'INGUILPATA', '', 1, NULL),
(49, 5, 'LONGUITA', '', 1, NULL),
(50, 5, 'LONYA CHICO', '', 1, NULL),
(51, 5, 'LUYA', '', 1, NULL),
(52, 5, 'LUYA VIEJO', '', 1, NULL),
(53, 5, 'MARIA', '', 1, NULL),
(54, 5, 'OCALLI', '', 1, NULL),
(55, 5, 'OCUMAL', '', 1, NULL),
(56, 5, 'PISUQUIA', '', 1, NULL),
(57, 5, 'PROVIDENCIA', '', 1, NULL),
(58, 5, 'SAN CRISTOBAL', '', 1, NULL),
(59, 5, 'SAN FRANCISCO DEL YESO', '', 1, NULL),
(60, 5, 'SAN JERONIMO', '', 1, NULL),
(61, 5, 'SAN JUAN DE LOPECANCHA', '', 1, NULL),
(62, 5, 'SANTA CATALINA', '', 1, NULL),
(63, 5, 'SANTO TOMAS', '', 1, NULL),
(64, 5, 'TINGO', '', 1, NULL),
(65, 5, 'TRITA', '', 1, NULL),
(66, 6, 'SAN NICOLAS', '', 1, NULL),
(67, 6, 'CHIRIMOTO', '', 1, NULL),
(68, 6, 'COCHAMAL', '', 1, NULL),
(69, 6, 'HUAMBO', '', 1, NULL),
(70, 6, 'LIMABAMBA', '', 1, NULL),
(71, 6, 'LONGAR', '', 1, NULL),
(72, 6, 'MARISCAL BENAVIDES', '', 1, NULL),
(73, 6, 'MILPUC', '', 1, NULL),
(74, 6, 'OMIA', '', 1, NULL),
(75, 6, 'SANTA ROSA', '', 1, NULL),
(76, 6, 'TOTORA', '', 1, NULL),
(77, 6, 'VISTA ALEGRE', '', 1, NULL),
(78, 7, 'BAGUA GRANDE', '', 1, NULL),
(79, 7, 'CAJARURO', '', 1, NULL),
(80, 7, 'CUMBA', '', 1, NULL),
(81, 7, 'EL MILAGRO', '', 1, NULL),
(82, 7, 'JAMALCA', '', 1, NULL),
(83, 7, 'LONYA GRANDE', '', 1, NULL),
(84, 7, 'YAMON', '', 1, NULL),
(85, 8, 'HUARAZ', '', 1, NULL),
(86, 8, 'COCHABAMBA', '', 1, NULL),
(87, 8, 'COLCABAMBA', '', 1, NULL),
(88, 8, 'HUANCHAY', '', 1, NULL),
(89, 8, 'INDEPENDENCIA', '', 1, NULL),
(90, 8, 'JANGAS', '', 1, NULL),
(91, 8, 'LA LIBERTAD', '', 1, NULL),
(92, 8, 'OLLEROS', '', 1, NULL),
(93, 8, 'PAMPAS', '', 1, NULL),
(94, 8, 'PARIACOTO', '', 1, NULL),
(95, 8, 'PIRA', '', 1, NULL),
(96, 8, 'TARICA', '', 1, NULL),
(97, 9, 'AIJA', '', 1, NULL),
(98, 9, 'CORIS', '', 1, NULL),
(99, 9, 'HUACLLAN', '', 1, NULL),
(100, 9, 'LA MERCED', '', 1, NULL),
(101, 9, 'SUCCHA', '', 1, NULL),
(102, 10, 'LLAMELLIN', '', 1, NULL),
(103, 10, 'ACZO', '', 1, NULL),
(104, 10, 'CHACCHO', '', 1, NULL),
(105, 10, 'CHINGAS', '', 1, NULL),
(106, 10, 'MIRGAS', '', 1, NULL),
(107, 10, 'SAN JUAN DE RONTOY', '', 1, NULL),
(108, 11, 'CHACAS', '', 1, NULL),
(109, 11, 'ACOCHACA', '', 1, NULL),
(110, 12, 'CHIQUIAN', '', 1, NULL),
(111, 12, 'ABELARDO PARDO LEZAMETA', '', 1, NULL),
(112, 12, 'ANTONIO RAYMONDI', '', 1, NULL),
(113, 12, 'AQUIA', '', 1, NULL),
(114, 12, 'CAJACAY', '', 1, NULL),
(115, 12, 'CANIS', '', 1, NULL),
(116, 12, 'COLQUIOC', '', 1, NULL),
(117, 12, 'HUALLANCA', '', 1, NULL),
(118, 12, 'HUASTA', '', 1, NULL),
(119, 12, 'HUAYLLACAYAN', '', 1, NULL),
(120, 12, 'LA PRIMAVERA', '', 1, NULL),
(121, 12, 'MANGAS', '', 1, NULL),
(122, 12, 'PACLLON', '', 1, NULL),
(123, 12, 'SAN MIGUEL DE CORPANQUI', '', 1, NULL),
(124, 12, 'TICLLOS', '', 1, NULL),
(125, 13, 'CARHUAZ', '', 1, NULL),
(126, 13, 'ACOPAMPA', '', 1, NULL),
(127, 13, 'AMASHCA', '', 1, NULL),
(128, 13, 'ANTA', '', 1, NULL),
(129, 13, 'ATAQUERO', '', 1, NULL),
(130, 13, 'MARCARA', '', 1, NULL),
(131, 13, 'PARIAHUANCA', '', 1, NULL),
(132, 13, 'SAN MIGUEL DE ACO', '', 1, NULL),
(133, 13, 'SHILLA', '', 1, NULL),
(134, 13, 'TINCO', '', 1, NULL),
(135, 13, 'YUNGAR', '', 1, NULL),
(136, 14, 'SAN LUIS', '', 1, NULL),
(137, 14, 'SAN NICOLAS', '', 1, NULL),
(138, 14, 'YAUYA', '', 1, NULL),
(139, 15, 'CASMA', '', 1, NULL),
(140, 15, 'BUENA VISTA ALTA', '', 1, NULL),
(141, 15, 'COMANDANTE NOEL', '', 1, NULL),
(142, 15, 'YAUTAN', '', 1, NULL),
(143, 16, 'CORONGO', '', 1, NULL),
(144, 16, 'ACO', '', 1, NULL),
(145, 16, 'BAMBAS', '', 1, NULL),
(146, 16, 'CUSCA', '', 1, NULL),
(147, 16, 'LA PAMPA', '', 1, NULL),
(148, 16, 'YANAC', '', 1, NULL),
(149, 16, 'YUPAN', '', 1, NULL),
(150, 17, 'HUARI', '', 1, NULL),
(151, 17, 'ANRA', '', 1, NULL),
(152, 17, 'CAJAY', '', 1, NULL),
(153, 17, 'CHAVIN DE HUANTAR', '', 1, NULL),
(154, 17, 'HUACACHI', '', 1, NULL),
(155, 17, 'HUACCHIS', '', 1, NULL),
(156, 17, 'HUACHIS', '', 1, NULL),
(157, 17, 'HUANTAR', '', 1, NULL),
(158, 17, 'MASIN', '', 1, NULL),
(159, 17, 'PAUCAS', '', 1, NULL),
(160, 17, 'PONTO', '', 1, NULL),
(161, 17, 'RAHUAPAMPA', '', 1, NULL),
(162, 17, 'RAPAYAN', '', 1, NULL),
(163, 17, 'SAN MARCOS', '', 1, NULL),
(164, 17, 'SAN PEDRO DE CHANA', '', 1, NULL),
(165, 17, 'UCO', '', 1, NULL),
(166, 18, 'HUARMEY', '', 1, NULL),
(167, 18, 'COCHAPETI', '', 1, NULL),
(168, 18, 'CULEBRAS', '', 1, NULL),
(169, 18, 'HUAYAN', '', 1, NULL),
(170, 18, 'MALVAS', '', 1, NULL),
(171, 19, 'CARAZ', '', 1, NULL),
(172, 19, 'HUALLANCA', '', 1, NULL),
(173, 19, 'HUATA', '', 1, NULL),
(174, 19, 'HUAYLAS', '', 1, NULL),
(175, 19, 'MATO', '', 1, NULL),
(176, 19, 'PAMPAROMAS', '', 1, NULL),
(177, 19, 'PUEBLO LIBRE', '', 1, NULL),
(178, 19, 'SANTA CRUZ', '', 1, NULL),
(179, 19, 'SANTO TORIBIO', '', 1, NULL),
(180, 19, 'YURACMARCA', '', 1, NULL),
(181, 20, 'PISCOBAMBA', '', 1, NULL),
(182, 20, 'CASCA', '', 1, NULL),
(183, 20, 'ELEAZAR GUZMAN BARRON', '', 1, NULL),
(184, 20, 'FIDEL OLIVAS ESCUDERO', '', 1, NULL),
(185, 20, 'LLAMA', '', 1, NULL),
(186, 20, 'LLUMPA', '', 1, NULL),
(187, 20, 'LUCMA', '', 1, NULL),
(188, 20, 'MUSGA', '', 1, NULL),
(189, 21, 'OCROS', '', 1, NULL),
(190, 21, 'ACAS', '', 1, NULL),
(191, 21, 'CAJAMARQUILLA', '', 1, NULL),
(192, 21, 'CARHUAPAMPA', '', 1, NULL),
(193, 21, 'COCHAS', '', 1, NULL),
(194, 21, 'CONGAS', '', 1, NULL),
(195, 21, 'LLIPA', '', 1, NULL),
(196, 21, 'SAN CRISTOBAL DE RAJAN', '', 1, NULL),
(197, 21, 'SAN PEDRO', '', 1, NULL),
(198, 21, 'SANTIAGO DE CHILCAS', '', 1, NULL),
(199, 22, 'CABANA', '', 1, NULL),
(200, 22, 'BOLOGNESI', '', 1, NULL),
(201, 22, 'CONCHUCOS', '', 1, NULL),
(202, 22, 'HUACASCHUQUE', '', 1, NULL),
(203, 22, 'HUANDOVAL', '', 1, NULL),
(204, 22, 'LACABAMBA', '', 1, NULL),
(205, 22, 'LLAPO', '', 1, NULL),
(206, 22, 'PALLASCA', '', 1, NULL),
(207, 22, 'PAMPAS', '', 1, NULL),
(208, 22, 'SANTA ROSA', '', 1, NULL),
(209, 22, 'TAUCA', '', 1, NULL),
(210, 23, 'POMABAMBA', '', 1, NULL),
(211, 23, 'HUAYLLAN', '', 1, NULL),
(212, 23, 'PAROBAMBA', '', 1, NULL),
(213, 23, 'QUINUABAMBA', '', 1, NULL),
(214, 24, 'RECUAY', '', 1, NULL),
(215, 24, 'CATAC', '', 1, NULL),
(216, 24, 'COTAPARACO', '', 1, NULL),
(217, 24, 'HUAYLLAPAMPA', '', 1, NULL),
(218, 24, 'LLACLLIN', '', 1, NULL),
(219, 24, 'MARCA', '', 1, NULL),
(220, 24, 'PAMPAS CHICO', '', 1, NULL),
(221, 24, 'PARARIN', '', 1, NULL),
(222, 24, 'TAPACOCHA', '', 1, NULL),
(223, 24, 'TICAPAMPA', '', 1, NULL),
(224, 25, 'CHIMBOTE', '', 1, NULL),
(225, 25, 'CACERES DEL PERU', '', 1, NULL),
(226, 25, 'COISHCO', '', 1, NULL),
(227, 25, 'MACATE', '', 1, NULL),
(228, 25, 'MORO', '', 1, NULL),
(229, 25, 'NEPEÑA', '', 1, NULL),
(230, 25, 'SAMANCO', '', 1, NULL),
(231, 25, 'SANTA', '', 1, NULL),
(232, 25, 'NUEVO CHIMBOTE', '', 1, NULL),
(233, 26, 'SIHUAS', '', 1, NULL),
(234, 26, 'ACOBAMBA', '', 1, NULL),
(235, 26, 'ALFONSO UGARTE', '', 1, NULL),
(236, 26, 'CASHAPAMPA', '', 1, NULL),
(237, 26, 'CHINGALPO', '', 1, NULL),
(238, 26, 'HUAYLLABAMBA', '', 1, NULL),
(239, 26, 'QUICHES', '', 1, NULL),
(240, 26, 'RAGASH', '', 1, NULL),
(241, 26, 'SAN JUAN', '', 1, NULL),
(242, 26, 'SICSIBAMBA', '', 1, NULL),
(243, 27, 'YUNGAY', '', 1, NULL),
(244, 27, 'CASCAPARA', '', 1, NULL),
(245, 27, 'MANCOS', '', 1, NULL),
(246, 27, 'MATACOTO', '', 1, NULL),
(247, 27, 'QUILLO', '', 1, NULL),
(248, 27, 'RANRAHIRCA', '', 1, NULL),
(249, 27, 'SHUPLUY', '', 1, NULL),
(250, 27, 'YANAMA', '', 1, NULL),
(251, 28, 'ABANCAY', '', 1, NULL),
(252, 28, 'CHACOCHE', '', 1, NULL),
(253, 28, 'CIRCA', '', 1, NULL),
(254, 28, 'CURAHUASI', '', 1, NULL),
(255, 28, 'HUANIPACA', '', 1, NULL),
(256, 28, 'LAMBRAMA', '', 1, NULL),
(257, 28, 'PICHIRHUA', '', 1, NULL),
(258, 28, 'SAN PEDRO DE CACHORA', '', 1, NULL),
(259, 28, 'TAMBURCO', '', 1, NULL),
(260, 29, 'ANDAHUAYLAS', '', 1, NULL),
(261, 29, 'ANDARAPA', '', 1, NULL),
(262, 29, 'CHIARA', '', 1, NULL),
(263, 29, 'HUANCARAMA', '', 1, NULL),
(264, 29, 'HUANCARAY', '', 1, NULL),
(265, 29, 'HUAYANA', '', 1, NULL),
(266, 29, 'KISHUARA', '', 1, NULL),
(267, 29, 'PACOBAMBA', '', 1, NULL),
(268, 29, 'PACUCHA', '', 1, NULL),
(269, 29, 'PAMPACHIRI', '', 1, NULL),
(270, 29, 'POMACOCHA', '', 1, NULL),
(271, 29, 'SAN ANTONIO DE CACHI', '', 1, NULL),
(272, 29, 'SAN JERONIMO', '', 1, NULL),
(273, 29, 'SAN MIGUEL DE CHACCRAMPA', '', 1, NULL),
(274, 29, 'SANTA MARIA DE CHICMO', '', 1, NULL),
(275, 29, 'TALAVERA', '', 1, NULL),
(276, 29, 'TUMAY HUARACA', '', 1, NULL),
(277, 29, 'TURPO', '', 1, NULL),
(278, 29, 'KAQUIABAMBA', '', 1, NULL),
(279, 30, 'ANTABAMBA', '', 1, NULL),
(280, 30, 'EL ORO', '', 1, NULL),
(281, 30, 'HUAQUIRCA', '', 1, NULL),
(282, 30, 'JUAN ESPINOZA MEDRANO', '', 1, NULL),
(283, 30, 'OROPESA', '', 1, NULL),
(284, 30, 'PACHACONAS', '', 1, NULL),
(285, 30, 'SABAINO', '', 1, NULL),
(286, 31, 'CHALHUANCA', '', 1, NULL),
(287, 31, 'CAPAYA', '', 1, NULL),
(288, 31, 'CARAYBAMBA', '', 1, NULL),
(289, 31, 'CHAPIMARCA', '', 1, NULL),
(290, 31, 'COLCABAMBA', '', 1, NULL),
(291, 31, 'COTARUSE', '', 1, NULL),
(292, 31, 'HUAYLLO', '', 1, NULL),
(293, 31, 'JUSTO APU SAHUARAURA', '', 1, NULL),
(294, 31, 'LUCRE', '', 1, NULL),
(295, 31, 'POCOHUANCA', '', 1, NULL),
(296, 31, 'SAN JUAN DE CHACÑA', '', 1, NULL),
(297, 31, 'SAÑAYCA', '', 1, NULL),
(298, 31, 'SORAYA', '', 1, NULL),
(299, 31, 'TAPAIRIHUA', '', 1, NULL),
(300, 31, 'TINTAY', '', 1, NULL),
(301, 31, 'TORAYA', '', 1, NULL),
(302, 31, 'YANACA', '', 1, NULL),
(303, 32, 'TAMBOBAMBA', '', 1, NULL),
(304, 32, 'COTABAMBAS', '', 1, NULL),
(305, 32, 'COYLLURQUI', '', 1, NULL),
(306, 32, 'HAQUIRA', '', 1, NULL),
(307, 32, 'MARA', '', 1, NULL),
(308, 32, 'CHALLHUAHUACHO', '', 1, NULL),
(309, 33, 'CHINCHEROS', '', 1, NULL),
(310, 33, 'ANCO_HUALLO', '', 1, NULL),
(311, 33, 'COCHARCAS', '', 1, NULL),
(312, 33, 'HUACCANA', '', 1, NULL),
(313, 33, 'OCOBAMBA', '', 1, NULL),
(314, 33, 'ONGOY', '', 1, NULL),
(315, 33, 'URANMARCA', '', 1, NULL),
(316, 33, 'RANRACANCHA', '', 1, NULL),
(317, 34, 'CHUQUIBAMBILLA', '', 1, NULL),
(318, 34, 'CURPAHUASI', '', 1, NULL),
(319, 34, 'GAMARRA', '', 1, NULL),
(320, 34, 'HUAYLLATI', '', 1, NULL),
(321, 34, 'MAMARA', '', 1, NULL),
(322, 34, 'MICAELA BASTIDAS', '', 1, NULL),
(323, 34, 'PATAYPAMPA', '', 1, NULL),
(324, 34, 'PROGRESO', '', 1, NULL),
(325, 34, 'SAN ANTONIO', '', 1, NULL),
(326, 34, 'SANTA ROSA', '', 1, NULL),
(327, 34, 'TURPAY', '', 1, NULL),
(328, 34, 'VILCABAMBA', '', 1, NULL),
(329, 34, 'VIRUNDO', '', 1, NULL),
(330, 34, 'CURASCO', '', 1, NULL),
(331, 35, 'AREQUIPA', '', 1, NULL),
(332, 35, 'ALTO SELVA ALEGRE', '', 1, NULL),
(333, 35, 'CAYMA', '', 1, NULL),
(334, 35, 'CERRO COLORADO', '', 1, NULL),
(335, 35, 'CHARACATO', '', 1, NULL),
(336, 35, 'CHIGUATA', '', 1, NULL),
(337, 35, 'JACOBO HUNTER', '', 1, NULL),
(338, 35, 'LA JOYA', '', 1, NULL),
(339, 35, 'MARIANO MELGAR', '', 1, NULL),
(340, 35, 'MIRAFLORES', '', 1, NULL),
(341, 35, 'MOLLEBAYA', '', 1, NULL),
(342, 35, 'PAUCARPATA', '', 1, NULL),
(343, 35, 'POCSI', '', 1, NULL),
(344, 35, 'POLOBAYA', '', 1, NULL),
(345, 35, 'QUEQUEÑA', '', 1, NULL),
(346, 35, 'SABANDIA', '', 1, NULL),
(347, 35, 'SACHACA', '', 1, NULL),
(348, 35, 'SAN JUAN DE SIGUAS', '', 1, NULL),
(349, 35, 'SAN JUAN DE TARUCANI', '', 1, NULL),
(350, 35, 'SANTA ISABEL DE SIGUAS', '', 1, NULL),
(351, 35, 'SANTA RITA DE SIGUAS', '', 1, NULL),
(352, 35, 'SOCABAYA', '', 1, NULL),
(353, 35, 'TIABAYA', '', 1, NULL),
(354, 35, 'UCHUMAYO', '', 1, NULL),
(355, 35, 'VITOR', '', 1, NULL),
(356, 35, 'YANAHUARA', '', 1, NULL),
(357, 35, 'YARABAMBA', '', 1, NULL),
(358, 35, 'YURA', '', 1, NULL),
(359, 35, 'JOSE LUIS BUSTAMANTE Y RIVERO', '', 1, NULL),
(360, 36, 'CAMANA', '', 1, NULL),
(361, 36, 'JOSE MARIA QUIMPER', '', 1, NULL),
(362, 36, 'MARIANO NICOLAS VALCARCEL', '', 1, NULL),
(363, 36, 'MARISCAL CACERES', '', 1, NULL),
(364, 36, 'NICOLAS DE PIEROLA', '', 1, NULL),
(365, 36, 'OCOÑA', '', 1, NULL),
(366, 36, 'QUILCA', '', 1, NULL),
(367, 36, 'SAMUEL PASTOR', '', 1, NULL),
(368, 37, 'CARAVELI', '', 1, NULL),
(369, 37, 'ACARI', '', 1, NULL),
(370, 37, 'ATICO', '', 1, NULL),
(371, 37, 'ATIQUIPA', '', 1, NULL),
(372, 37, 'BELLA UNION', '', 1, NULL),
(373, 37, 'CAHUACHO', '', 1, NULL),
(374, 37, 'CHALA', '', 1, NULL),
(375, 37, 'CHAPARRA', '', 1, NULL),
(376, 37, 'HUANUHUANU', '', 1, NULL),
(377, 37, 'JAQUI', '', 1, NULL),
(378, 37, 'LOMAS', '', 1, NULL),
(379, 37, 'QUICACHA', '', 1, NULL),
(380, 37, 'YAUCA', '', 1, NULL),
(381, 38, 'APLAO', '', 1, NULL),
(382, 38, 'ANDAGUA', '', 1, NULL),
(383, 38, 'AYO', '', 1, NULL),
(384, 38, 'CHACHAS', '', 1, NULL),
(385, 38, 'CHILCAYMARCA', '', 1, NULL),
(386, 38, 'CHOCO', '', 1, NULL),
(387, 38, 'HUANCARQUI', '', 1, NULL),
(388, 38, 'MACHAGUAY', '', 1, NULL),
(389, 38, 'ORCOPAMPA', '', 1, NULL),
(390, 38, 'PAMPACOLCA', '', 1, NULL),
(391, 38, 'TIPAN', '', 1, NULL),
(392, 38, 'UÑON', '', 1, NULL),
(393, 38, 'URACA', '', 1, NULL),
(394, 38, 'VIRACO', '', 1, NULL),
(395, 39, 'CHIVAY', '', 1, NULL),
(396, 39, 'ACHOMA', '', 1, NULL),
(397, 39, 'CABANACONDE', '', 1, NULL),
(398, 39, 'CALLALLI', '', 1, NULL),
(399, 39, 'CAYLLOMA', '', 1, NULL),
(400, 39, 'COPORAQUE', '', 1, NULL),
(401, 39, 'HUAMBO', '', 1, NULL),
(402, 39, 'HUANCA', '', 1, NULL),
(403, 39, 'ICHUPAMPA', '', 1, NULL),
(404, 39, 'LARI', '', 1, NULL),
(405, 39, 'LLUTA', '', 1, NULL),
(406, 39, 'MACA', '', 1, NULL),
(407, 39, 'MADRIGAL', '', 1, NULL),
(408, 39, 'SAN ANTONIO DE CHUCA', '', 1, NULL),
(409, 39, 'SIBAYO', '', 1, NULL),
(410, 39, 'TAPAY', '', 1, NULL),
(411, 39, 'TISCO', '', 1, NULL),
(412, 39, 'TUTI', '', 1, NULL),
(413, 39, 'YANQUE', '', 1, NULL),
(414, 39, 'MAJES', '', 1, NULL),
(415, 40, 'CHUQUIBAMBA', '', 1, NULL),
(416, 40, 'ANDARAY', '', 1, NULL),
(417, 40, 'CAYARANI', '', 1, NULL),
(418, 40, 'CHICHAS', '', 1, NULL),
(419, 40, 'IRAY', '', 1, NULL),
(420, 40, 'RIO GRANDE', '', 1, NULL),
(421, 40, 'SALAMANCA', '', 1, NULL),
(422, 40, 'YANAQUIHUA', '', 1, NULL),
(423, 41, 'MOLLENDO', '', 1, NULL),
(424, 41, 'COCACHACRA', '', 1, NULL),
(425, 41, 'DEAN VALDIVIA', '', 1, NULL),
(426, 41, 'ISLAY', '', 1, NULL),
(427, 41, 'MEJIA', '', 1, NULL),
(428, 41, 'PUNTA DE BOMBON', '', 1, NULL),
(429, 42, 'COTAHUASI', '', 1, NULL),
(430, 42, 'ALCA', '', 1, NULL),
(431, 42, 'CHARCANA', '', 1, NULL),
(432, 42, 'HUAYNACOTAS', '', 1, NULL),
(433, 42, 'PAMPAMARCA', '', 1, NULL),
(434, 42, 'PUYCA', '', 1, NULL),
(435, 42, 'QUECHUALLA', '', 1, NULL),
(436, 42, 'SAYLA', '', 1, NULL),
(437, 42, 'TAURIA', '', 1, NULL),
(438, 42, 'TOMEPAMPA', '', 1, NULL),
(439, 42, 'TORO', '', 1, NULL),
(440, 43, 'AYACUCHO', '', 1, NULL),
(441, 43, 'ACOCRO', '', 1, NULL),
(442, 43, 'ACOS VINCHOS', '', 1, NULL),
(443, 43, 'CARMEN ALTO', '', 1, NULL),
(444, 43, 'CHIARA', '', 1, NULL),
(445, 43, 'OCROS', '', 1, NULL),
(446, 43, 'PACAYCASA', '', 1, NULL),
(447, 43, 'QUINUA', '', 1, NULL),
(448, 43, 'SAN JOSE DE TICLLAS', '', 1, NULL),
(449, 43, 'SAN JUAN BAUTISTA', '', 1, NULL),
(450, 43, 'SANTIAGO DE PISCHA', '', 1, NULL),
(451, 43, 'SOCOS', '', 1, NULL),
(452, 43, 'TAMBILLO', '', 1, NULL),
(453, 43, 'VINCHOS', '', 1, NULL),
(454, 43, 'JESUS NAZARENO', '', 1, NULL),
(455, 44, 'CANGALLO', '', 1, NULL),
(456, 44, 'CHUSCHI', '', 1, NULL),
(457, 44, 'LOS MOROCHUCOS', '', 1, NULL),
(458, 44, 'MARIA PARADO DE BELLIDO', '', 1, NULL),
(459, 44, 'PARAS', '', 1, NULL),
(460, 44, 'TOTOS', '', 1, NULL),
(461, 45, 'SANCOS', '', 1, NULL),
(462, 45, 'CARAPO', '', 1, NULL),
(463, 45, 'SACSAMARCA', '', 1, NULL),
(464, 45, 'SANTIAGO DE LUCANAMARCA', '', 1, NULL),
(465, 46, 'HUANTA', '', 1, NULL),
(466, 46, 'AYAHUANCO', '', 1, NULL),
(467, 46, 'HUAMANGUILLA', '', 1, NULL),
(468, 46, 'IGUAIN', '', 1, NULL),
(469, 46, 'LURICOCHA', '', 1, NULL),
(470, 46, 'SANTILLANA', '', 1, NULL),
(471, 46, 'SIVIA', '', 1, NULL),
(472, 46, 'LLOCHEGUA', '', 1, NULL),
(473, 47, 'SAN MIGUEL', '', 1, NULL),
(474, 47, 'ANCO', '', 1, NULL),
(475, 47, 'AYNA', '', 1, NULL),
(476, 47, 'CHILCAS', '', 1, NULL),
(477, 47, 'CHUNGUI', '', 1, NULL),
(478, 47, 'LUIS CARRANZA', '', 1, NULL),
(479, 47, 'SANTA ROSA', '', 1, NULL),
(480, 47, 'TAMBO', '', 1, NULL),
(481, 48, 'PUQUIO', '', 1, NULL),
(482, 48, 'AUCARA', '', 1, NULL),
(483, 48, 'CABANA', '', 1, NULL),
(484, 48, 'CARMEN SALCEDO', '', 1, NULL),
(485, 48, 'CHAVIÑA', '', 1, NULL),
(486, 48, 'CHIPAO', '', 1, NULL),
(487, 48, 'HUAC-HUAS', '', 1, NULL),
(488, 48, 'LARAMATE', '', 1, NULL),
(489, 48, 'LEONCIO PRADO', '', 1, NULL),
(490, 48, 'LLAUTA', '', 1, NULL),
(491, 48, 'LUCANAS', '', 1, NULL),
(492, 48, 'OCAÑA', '', 1, NULL),
(493, 48, 'OTOCA', '', 1, NULL),
(494, 48, 'SAISA', '', 1, NULL),
(495, 48, 'SAN CRISTOBAL', '', 1, NULL),
(496, 48, 'SAN JUAN', '', 1, NULL),
(497, 48, 'SAN PEDRO', '', 1, NULL),
(498, 48, 'SAN PEDRO DE PALCO', '', 1, NULL),
(499, 48, 'SANCOS', '', 1, NULL),
(500, 48, 'SANTA ANA DE HUAYCAHUACHO', '', 1, NULL),
(501, 48, 'SANTA LUCIA', '', 1, NULL),
(502, 49, 'CORACORA', '', 1, NULL),
(503, 49, 'CHUMPI', '', 1, NULL),
(504, 49, 'CORONEL CASTAÑEDA', '', 1, NULL),
(505, 49, 'PACAPAUSA', '', 1, NULL),
(506, 49, 'PULLO', '', 1, NULL),
(507, 49, 'PUYUSCA', '', 1, NULL),
(508, 49, 'SAN FRANCISCO DE RAVACAYCO', '', 1, NULL),
(509, 49, 'UPAHUACHO', '', 1, NULL),
(510, 50, 'PAUSA', '', 1, NULL),
(511, 50, 'COLTA', '', 1, NULL),
(512, 50, 'CORCULLA', '', 1, NULL),
(513, 50, 'LAMPA', '', 1, NULL),
(514, 50, 'MARCABAMBA', '', 1, NULL),
(515, 50, 'OYOLO', '', 1, NULL),
(516, 50, 'PARARCA', '', 1, NULL),
(517, 50, 'SAN JAVIER DE ALPABAMBA', '', 1, NULL),
(518, 50, 'SAN JOSE DE USHUA', '', 1, NULL),
(519, 50, 'SARA SARA', '', 1, NULL),
(520, 51, 'QUEROBAMBA', '', 1, NULL),
(521, 51, 'BELEN', '', 1, NULL),
(522, 51, 'CHALCOS', '', 1, NULL),
(523, 51, 'CHILCAYOC', '', 1, NULL),
(524, 51, 'HUACAÑA', '', 1, NULL),
(525, 51, 'MORCOLLA', '', 1, NULL),
(526, 51, 'PAICO', '', 1, NULL),
(527, 51, 'SAN PEDRO DE LARCAY', '', 1, NULL),
(528, 51, 'SAN SALVADOR DE QUIJE', '', 1, NULL),
(529, 51, 'SANTIAGO DE PAUCARAY', '', 1, NULL),
(530, 51, 'SORAS', '', 1, NULL),
(531, 52, 'HUANCAPI', '', 1, NULL),
(532, 52, 'ALCAMENCA', '', 1, NULL),
(533, 52, 'APONGO', '', 1, NULL),
(534, 52, 'ASQUIPATA', '', 1, NULL),
(535, 52, 'CAYARA', '', 1, NULL),
(536, 52, 'COLCA', '', 1, NULL),
(537, 52, 'HUAMANQUIQUIA', '', 1, NULL),
(538, 52, 'HUANCARAYLLA', '', 1, NULL),
(539, 52, 'HUAYA', '', 1, NULL),
(540, 52, 'SARHUA', '', 1, NULL),
(541, 52, 'VILCANCHOS', '', 1, NULL),
(542, 53, 'CANARIA', '', 1, NULL),
(543, 54, 'VILCAS HUAMAN', '', 1, NULL),
(544, 54, 'ACCOMARCA', '', 1, NULL),
(545, 54, 'CARHUANCA', '', 1, NULL),
(546, 54, 'CONCEPCION', '', 1, NULL),
(547, 54, 'HUAMBALPA', '', 1, NULL),
(548, 54, 'INDEPENDENCIA', '', 1, NULL),
(549, 54, 'SAURAMA', '', 1, NULL),
(550, 54, 'VISCHONGO', '', 1, NULL),
(551, 55, 'CAJAMARCA', '', 1, NULL),
(552, 55, 'ASUNCION', '', 1, NULL),
(553, 55, 'CHETILLA', '', 1, NULL),
(554, 55, 'COSPAN', '', 1, NULL),
(555, 55, 'ENCAÑADA', '', 1, NULL),
(556, 55, 'JESUS', '', 1, NULL),
(557, 55, 'LLACANORA', '', 1, NULL),
(558, 55, 'LOS BAÑOS DEL INCA', '', 1, NULL),
(559, 55, 'MAGDALENA', '', 1, NULL),
(560, 55, 'MATARA', '', 1, NULL),
(561, 55, 'NAMORA', '', 1, NULL),
(562, 55, 'SAN JUAN', '', 1, NULL),
(563, 56, 'CAJABAMBA', '', 1, NULL),
(564, 56, 'CACHACHI', '', 1, NULL),
(565, 56, 'CONDEBAMBA', '', 1, NULL),
(566, 56, 'SITACOCHA', '', 1, NULL),
(567, 57, 'CELENDIN', '', 1, NULL),
(568, 57, 'CHUMUCH', '', 1, NULL),
(569, 57, 'CORTEGANA', '', 1, NULL),
(570, 57, 'HUASMIN', '', 1, NULL),
(571, 57, 'JORGE CHAVEZ', '', 1, NULL),
(572, 57, 'JOSE GALVEZ', '', 1, NULL),
(573, 57, 'MIGUEL IGLESIAS', '', 1, NULL),
(574, 57, 'OXAMARCA', '', 1, NULL),
(575, 57, 'SOROCHUCO', '', 1, NULL),
(576, 57, 'SUCRE', '', 1, NULL),
(577, 57, 'UTCO', '', 1, NULL),
(578, 57, 'LA LIBERTAD DE PALLAN', '', 1, NULL),
(579, 58, 'CHOTA', '', 1, NULL),
(580, 58, 'ANGUIA', '', 1, NULL),
(581, 58, 'CHADIN', '', 1, NULL),
(582, 58, 'CHIGUIRIP', '', 1, NULL),
(583, 58, 'CHIMBAN', '', 1, NULL),
(584, 58, 'CHOROPAMPA', '', 1, NULL),
(585, 58, 'COCHABAMBA', '', 1, NULL),
(586, 58, 'CONCHAN', '', 1, NULL),
(587, 58, 'HUAMBOS', '', 1, NULL),
(588, 58, 'LAJAS', '', 1, NULL),
(589, 58, 'LLAMA', '', 1, NULL),
(590, 58, 'MIRACOSTA', '', 1, NULL),
(591, 58, 'PACCHA', '', 1, NULL),
(592, 58, 'PION', '', 1, NULL),
(593, 58, 'QUEROCOTO', '', 1, NULL),
(594, 58, 'SAN JUAN DE LICUPIS', '', 1, NULL),
(595, 58, 'TACABAMBA', '', 1, NULL),
(596, 58, 'TOCMOCHE', '', 1, NULL),
(597, 58, 'CHALAMARCA', '', 1, NULL),
(598, 59, 'CONTUMAZA', '', 1, NULL),
(599, 59, 'CHILETE', '', 1, NULL),
(600, 59, 'CUPISNIQUE', '', 1, NULL),
(601, 59, 'GUZMANGO', '', 1, NULL),
(602, 59, 'SAN BENITO', '', 1, NULL),
(603, 59, 'SANTA CRUZ DE TOLED', '', 1, NULL),
(604, 59, 'TANTARICA', '', 1, NULL),
(605, 59, 'YONAN', '', 1, NULL),
(606, 60, 'CUTERVO', '', 1, NULL),
(607, 60, 'CALLAYUC', '', 1, NULL),
(608, 60, 'CHOROS', '', 1, NULL),
(609, 60, 'CUJILLO', '', 1, NULL),
(610, 60, 'LA RAMADA', '', 1, NULL),
(611, 60, 'PIMPINGOS', '', 1, NULL),
(612, 60, 'QUEROCOTILLO', '', 1, NULL),
(613, 60, 'SAN ANDRES DE CUTERVO', '', 1, NULL),
(614, 60, 'SAN JUAN DE CUTERVO', '', 1, NULL),
(615, 60, 'SAN LUIS DE LUCMA', '', 1, NULL),
(616, 60, 'SANTA CRUZ', '', 1, NULL),
(617, 60, 'SANTO DOMINGO DE LA CAPILLA', '', 1, NULL),
(618, 60, 'SANTO TOMAS', '', 1, NULL),
(619, 60, 'SOCOTA', '', 1, NULL),
(620, 60, 'TORIBIO CASANOVA', '', 1, NULL),
(621, 61, 'BAMBAMARCA', '', 1, NULL),
(622, 61, 'CHUGUR', '', 1, NULL),
(623, 61, 'HUALGAYOC', '', 1, NULL),
(624, 62, 'JAEN', '', 1, NULL),
(625, 62, 'BELLAVISTA', '', 1, NULL),
(626, 62, 'CHONTALI', '', 1, NULL),
(627, 62, 'COLASAY', '', 1, NULL),
(628, 62, 'HUABAL', '', 1, NULL),
(629, 62, 'LAS PIRIAS', '', 1, NULL),
(630, 62, 'POMAHUACA', '', 1, NULL),
(631, 62, 'PUCARA', '', 1, NULL),
(632, 62, 'SALLIQUE', '', 1, NULL),
(633, 62, 'SAN FELIPE', '', 1, NULL),
(634, 62, 'SAN JOSE DEL ALTO', '', 1, NULL),
(635, 62, 'SANTA ROSA', '', 1, NULL),
(636, 63, 'SAN IGNACIO', '', 1, NULL),
(637, 63, 'CHIRINOS', '', 1, NULL),
(638, 63, 'HUARANGO', '', 1, NULL),
(639, 63, 'LA COIPA', '', 1, NULL),
(640, 63, 'NAMBALLE', '', 1, NULL),
(641, 63, 'SAN JOSE DE LOURDES', '', 1, NULL),
(642, 63, 'TABACONAS', '', 1, NULL),
(643, 64, 'PEDRO GALVEZ', '', 1, NULL),
(644, 64, 'CHANCAY', '', 1, NULL),
(645, 64, 'EDUARDO VILLANUEVA', '', 1, NULL),
(646, 64, 'GREGORIO PITA', '', 1, NULL),
(647, 64, 'ICHOCAN', '', 1, NULL),
(648, 64, 'JOSE MANUEL QUIROZ', '', 1, NULL),
(649, 64, 'JOSE SABOGAL', '', 1, NULL),
(650, 65, 'SAN MIGUEL', '', 1, NULL),
(651, 65, 'BOLIVAR', '', 1, NULL),
(652, 65, 'CALQUIS', '', 1, NULL),
(653, 65, 'CATILLUC', '', 1, NULL),
(654, 65, 'EL PRADO', '', 1, NULL),
(655, 65, 'LA FLORIDA', '', 1, NULL),
(656, 65, 'LLAPA', '', 1, NULL),
(657, 65, 'NANCHOC', '', 1, NULL),
(658, 65, 'NIEPOS', '', 1, NULL),
(659, 65, 'SAN GREGORIO', '', 1, NULL),
(660, 65, 'SAN SILVESTRE DE COCHAN', '', 1, NULL),
(661, 65, 'TONGOD', '', 1, NULL),
(662, 65, 'UNION AGUA BLANCA', '', 1, NULL),
(663, 66, 'SAN PABLO', '', 1, NULL),
(664, 66, 'SAN BERNARDINO', '', 1, NULL),
(665, 66, 'SAN LUIS', '', 1, NULL),
(666, 66, 'TUMBADEN', '', 1, NULL),
(667, 67, 'SANTA CRUZ', '', 1, NULL),
(668, 67, 'ANDABAMBA', '', 1, NULL),
(669, 67, 'CATACHE', '', 1, NULL),
(670, 67, 'CHANCAYBAÑOS', '', 1, NULL),
(671, 67, 'LA ESPERANZA', '', 1, NULL),
(672, 67, 'NINABAMBA', '', 1, NULL),
(673, 67, 'PULAN', '', 1, NULL),
(674, 67, 'SAUCEPAMPA', '', 1, NULL),
(675, 67, 'SEXI', '', 1, NULL),
(676, 67, 'UTICYACU', '', 1, NULL),
(677, 67, 'YAUYUCAN', '', 1, NULL),
(678, 68, 'CALLAO', '', 1, NULL),
(679, 68, 'BELLAVISTA', '', 1, NULL),
(680, 68, 'CARMEN DE LA LEGUA REYNOSO', '', 1, NULL),
(681, 68, 'LA PERLA', '', 1, NULL),
(682, 68, 'LA PUNTA', '', 1, NULL),
(683, 68, 'VENTANILLA', '', 1, NULL),
(684, 69, 'CUSCO', '', 1, NULL),
(685, 69, 'CCORCA', '', 1, NULL),
(686, 69, 'POROY', '', 1, NULL),
(687, 69, 'SAN JERONIMO', '', 1, NULL),
(688, 69, 'SAN SEBASTIAN', '', 1, NULL),
(689, 69, 'SANTIAGO', '', 1, NULL),
(690, 69, 'SAYLLA', '', 1, NULL),
(691, 69, 'WANCHAQ', '', 1, NULL),
(692, 70, 'ACOMAYO', '', 1, NULL),
(693, 70, 'ACOPIA', '', 1, NULL),
(694, 70, 'ACOS', '', 1, NULL),
(695, 70, 'MOSOC LLACTA', '', 1, NULL),
(696, 70, 'POMACANCHI', '', 1, NULL),
(697, 70, 'RONDOCAN', '', 1, NULL),
(698, 70, 'SANGARARA', '', 1, NULL),
(699, 71, 'ANTA', '', 1, NULL),
(700, 71, 'ANCAHUASI', '', 1, NULL),
(701, 71, 'CACHIMAYO', '', 1, NULL),
(702, 71, 'CHINCHAYPUJIO', '', 1, NULL),
(703, 71, 'HUAROCONDO', '', 1, NULL),
(704, 71, 'LIMATAMBO', '', 1, NULL),
(705, 71, 'MOLLEPATA', '', 1, NULL),
(706, 71, 'PUCYURA', '', 1, NULL),
(707, 71, 'ZURITE', '', 1, NULL),
(708, 72, 'CALCA', '', 1, NULL),
(709, 72, 'COYA', '', 1, NULL),
(710, 72, 'LAMAY', '', 1, NULL),
(711, 72, 'LARES', '', 1, NULL),
(712, 72, 'PISAC', '', 1, NULL),
(713, 72, 'SAN SALVADOR', '', 1, NULL),
(714, 72, 'TARAY', '', 1, NULL),
(715, 72, 'YANATILE', '', 1, NULL),
(716, 73, 'YANAOCA', '', 1, NULL),
(717, 73, 'CHECCA', '', 1, NULL),
(718, 73, 'KUNTURKANKI', '', 1, NULL),
(719, 73, 'LANGUI', '', 1, NULL),
(720, 73, 'LAYO', '', 1, NULL),
(721, 73, 'PAMPAMARCA', '', 1, NULL),
(722, 73, 'QUEHUE', '', 1, NULL),
(723, 73, 'TUPAC AMARU', '', 1, NULL),
(724, 74, 'SICUANI', '', 1, NULL),
(725, 74, 'CHECACUPE', '', 1, NULL),
(726, 74, 'COMBAPATA', '', 1, NULL),
(727, 74, 'MARANGANI', '', 1, NULL),
(728, 74, 'PITUMARCA', '', 1, NULL),
(729, 74, 'SAN PABLO', '', 1, NULL),
(730, 74, 'SAN PEDRO', '', 1, NULL),
(731, 74, 'TINTA', '', 1, NULL),
(732, 75, 'SANTO TOMAS', '', 1, NULL),
(733, 75, 'CAPACMARCA', '', 1, NULL),
(734, 75, 'CHAMACA', '', 1, NULL),
(735, 75, 'COLQUEMARCA', '', 1, NULL),
(736, 75, 'LIVITACA', '', 1, NULL),
(737, 75, 'LLUSCO', '', 1, NULL),
(738, 75, 'QUIÑOTA', '', 1, NULL),
(739, 75, 'VELILLE', '', 1, NULL),
(740, 76, 'ESPINAR', '', 1, NULL),
(741, 76, 'CONDOROMA', '', 1, NULL),
(742, 76, 'COPORAQUE', '', 1, NULL),
(743, 76, 'OCORURO', '', 1, NULL),
(744, 76, 'PALLPATA', '', 1, NULL),
(745, 76, 'PICHIGUA', '', 1, NULL),
(746, 76, 'SUYCKUTAMBO', '', 1, NULL),
(747, 76, 'ALTO PICHIGUA', '', 1, NULL),
(748, 77, 'SANTA ANA', '', 1, NULL),
(749, 77, 'ECHARATE', '', 1, NULL),
(750, 77, 'HUAYOPATA', '', 1, NULL),
(751, 77, 'MARANURA', '', 1, NULL),
(752, 77, 'OCOBAMBA', '', 1, NULL),
(753, 77, 'QUELLOUNO', '', 1, NULL),
(754, 77, 'KIMBIRI', '', 1, NULL),
(755, 77, 'SANTA TERESA', '', 1, NULL),
(756, 77, 'VILCABAMBA', '', 1, NULL),
(757, 77, 'PICHARI', '', 1, NULL),
(758, 78, 'PARURO', '', 1, NULL),
(759, 78, 'ACCHA', '', 1, NULL),
(760, 78, 'CCAPI', '', 1, NULL),
(761, 78, 'COLCHA', '', 1, NULL),
(762, 78, 'HUANOQUITE', '', 1, NULL),
(763, 78, 'OMACHA', '', 1, NULL),
(764, 78, 'PACCARITAMBO', '', 1, NULL),
(765, 78, 'PILLPINTO', '', 1, NULL),
(766, 78, 'YAURISQUE', '', 1, NULL),
(767, 79, 'PAUCARTAMBO', '', 1, NULL),
(768, 79, 'CAICAY', '', 1, NULL),
(769, 79, 'CHALLABAMBA', '', 1, NULL),
(770, 79, 'COLQUEPATA', '', 1, NULL),
(771, 79, 'HUANCARANI', '', 1, NULL),
(772, 79, 'KOSÑIPATA', '', 1, NULL),
(773, 80, 'URCOS', '', 1, NULL),
(774, 80, 'ANDAHUAYLILLAS', '', 1, NULL),
(775, 80, 'CAMANTI', '', 1, NULL),
(776, 80, 'CCARHUAYO', '', 1, NULL),
(777, 80, 'CCATCA', '', 1, NULL),
(778, 80, 'CUSIPATA', '', 1, NULL),
(779, 80, 'HUARO', '', 1, NULL),
(780, 80, 'LUCRE', '', 1, NULL),
(781, 80, 'MARCAPATA', '', 1, NULL),
(782, 80, 'OCONGATE', '', 1, NULL),
(783, 80, 'OROPESA', '', 1, NULL),
(784, 80, 'QUIQUIJANA', '', 1, NULL),
(785, 81, 'URUBAMBA', '', 1, NULL),
(786, 81, 'CHINCHERO', '', 1, NULL),
(787, 81, 'HUAYLLABAMBA', '', 1, NULL),
(788, 81, 'MACHUPICCHU', '', 1, NULL),
(789, 81, 'MARAS', '', 1, NULL),
(790, 81, 'OLLANTAYTAMBO', '', 1, NULL),
(791, 81, 'YUCAY', '', 1, NULL),
(792, 82, 'HUANCAVELICA', '', 1, NULL),
(793, 82, 'ACOBAMBILLA', '', 1, NULL),
(794, 82, 'ACORIA', '', 1, NULL),
(795, 82, 'CONAYCA', '', 1, NULL),
(796, 82, 'CUENCA', '', 1, NULL),
(797, 82, 'HUACHOCOLPA', '', 1, NULL),
(798, 82, 'HUAYLLAHUARA', '', 1, NULL),
(799, 82, 'IZCUCHACA', '', 1, NULL),
(800, 82, 'LARIA', '', 1, NULL),
(801, 82, 'MANTA', '', 1, NULL),
(802, 82, 'MARISCAL CACERES', '', 1, NULL),
(803, 82, 'MOYA', '', 1, NULL),
(804, 82, 'NUEVO OCCORO', '', 1, NULL),
(805, 82, 'PALCA', '', 1, NULL),
(806, 82, 'PILCHACA', '', 1, NULL),
(807, 82, 'VILCA', '', 1, NULL),
(808, 82, 'YAULI', '', 1, NULL),
(809, 82, 'ASCENSION', '', 1, NULL),
(810, 82, 'HUANDO', '', 1, NULL),
(811, 83, 'ACOBAMBA', '', 1, NULL),
(812, 83, 'ANDABAMBA', '', 1, NULL),
(813, 83, 'ANTA', '', 1, NULL),
(814, 83, 'CAJA', '', 1, NULL),
(815, 83, 'MARCAS', '', 1, NULL),
(816, 83, 'PAUCARA', '', 1, NULL),
(817, 83, 'POMACOCHA', '', 1, NULL),
(818, 83, 'ROSARIO', '', 1, NULL),
(819, 84, 'LIRCAY', '', 1, NULL),
(820, 84, 'ANCHONGA', '', 1, NULL),
(821, 84, 'CALLANMARCA', '', 1, NULL),
(822, 84, 'CCOCHACCASA', '', 1, NULL),
(823, 84, 'CHINCHO', '', 1, NULL),
(824, 84, 'CONGALLA', '', 1, NULL),
(825, 84, 'HUANCA-HUANCA', '', 1, NULL),
(826, 84, 'HUAYLLAY GRANDE', '', 1, NULL),
(827, 84, 'JULCAMARCA', '', 1, NULL),
(828, 84, 'SAN ANTONIO DE ANTAPARCO', '', 1, NULL),
(829, 84, 'SANTO TOMAS DE PATA', '', 1, NULL),
(830, 84, 'SECCLLA', '', 1, NULL),
(831, 85, 'CASTROVIRREYNA', '', 1, NULL),
(832, 85, 'ARMA', '', 1, NULL),
(833, 85, 'AURAHUA', '', 1, NULL),
(834, 85, 'CAPILLAS', '', 1, NULL),
(835, 85, 'CHUPAMARCA', '', 1, NULL),
(836, 85, 'COCAS', '', 1, NULL),
(837, 85, 'HUACHOS', '', 1, NULL),
(838, 85, 'HUAMATAMBO', '', 1, NULL),
(839, 85, 'MOLLEPAMPA', '', 1, NULL),
(840, 85, 'SAN JUAN', '', 1, NULL),
(841, 85, 'SANTA ANA', '', 1, NULL),
(842, 85, 'TANTARA', '', 1, NULL),
(843, 85, 'TICRAPO', '', 1, NULL),
(844, 86, 'CHURCAMPA', '', 1, NULL),
(845, 86, 'ANCO', '', 1, NULL),
(846, 86, 'CHINCHIHUASI', '', 1, NULL),
(847, 86, 'EL CARMEN', '', 1, NULL),
(848, 86, 'LA MERCED', '', 1, NULL),
(849, 86, 'LOCROJA', '', 1, NULL),
(850, 86, 'PAUCARBAMBA', '', 1, NULL),
(851, 86, 'SAN MIGUEL DE MAYOCC', '', 1, NULL),
(852, 86, 'SAN PEDRO DE CORIS', '', 1, NULL),
(853, 86, 'PACHAMARCA', '', 1, NULL),
(854, 87, 'HUAYTARA', '', 1, NULL),
(855, 87, 'AYAVI', '', 1, NULL),
(856, 87, 'CORDOVA', '', 1, NULL),
(857, 87, 'HUAYACUNDO ARMA', '', 1, NULL),
(858, 87, 'LARAMARCA', '', 1, NULL),
(859, 87, 'OCOYO', '', 1, NULL),
(860, 87, 'PILPICHACA', '', 1, NULL),
(861, 87, 'QUERCO', '', 1, NULL),
(862, 87, 'QUITO-ARMA', '', 1, NULL),
(863, 87, 'SAN ANTONIO DE CUSICANCHA', '', 1, NULL),
(864, 87, 'SAN FRANCISCO DE SANGAYAICO', '', 1, NULL),
(865, 87, 'SAN ISIDRO', '', 1, NULL),
(866, 87, 'SANTIAGO DE CHOCORVOS', '', 1, NULL),
(867, 87, 'SANTIAGO DE QUIRAHUARA', '', 1, NULL),
(868, 87, 'SANTO DOMINGO DE CAPILLAS', '', 1, NULL),
(869, 87, 'TAMBO', '', 1, NULL),
(870, 88, 'PAMPAS', '', 1, NULL),
(871, 88, 'ACOSTAMBO', '', 1, NULL),
(872, 88, 'ACRAQUIA', '', 1, NULL),
(873, 88, 'AHUAYCHA', '', 1, NULL),
(874, 88, 'COLCABAMBA', '', 1, NULL),
(875, 88, 'DANIEL HERNANDEZ', '', 1, NULL),
(876, 88, 'HUACHOCOLPA', '', 1, NULL),
(877, 88, 'HUARIBAMBA', '', 1, NULL),
(878, 88, 'ÑAHUIMPUQUIO', '', 1, NULL),
(879, 88, 'PAZOS', '', 1, NULL),
(880, 88, 'QUISHUAR', '', 1, NULL),
(881, 88, 'SALCABAMBA', '', 1, NULL),
(882, 88, 'SALCAHUASI', '', 1, NULL),
(883, 88, 'SAN MARCOS DE ROCCHAC', '', 1, NULL),
(884, 88, 'SURCUBAMBA', '', 1, NULL),
(885, 88, 'TINTAY PUNCU', '', 1, NULL),
(886, 89, 'HUANUCO', '', 1, NULL),
(887, 89, 'AMARILIS', '', 1, NULL),
(888, 89, 'CHINCHAO', '', 1, NULL),
(889, 89, 'CHURUBAMBA', '', 1, NULL),
(890, 89, 'MARGOS', '', 1, NULL),
(891, 89, 'QUISQUI', '', 1, NULL),
(892, 89, 'SAN FRANCISCO DE CAYRAN', '', 1, NULL),
(893, 89, 'SAN PEDRO DE CHAULAN', '', 1, NULL),
(894, 89, 'SANTA MARIA DEL VALLE', '', 1, NULL),
(895, 89, 'YARUMAYO', '', 1, NULL),
(896, 89, 'PILLCO MARCA', '', 1, NULL),
(897, 90, 'AMBO', '', 1, NULL),
(898, 90, 'CAYNA', '', 1, NULL),
(899, 90, 'COLPAS', '', 1, NULL),
(900, 90, 'CONCHAMARCA', '', 1, NULL),
(901, 90, 'HUACAR', '', 1, NULL),
(902, 90, 'SAN FRANCISCO', '', 1, NULL),
(903, 90, 'SAN RAFAEL', '', 1, NULL),
(904, 90, 'TOMAY KICHWA', '', 1, NULL),
(905, 91, 'LA UNION', '', 1, NULL),
(906, 91, 'CHUQUIS', '', 1, NULL),
(907, 91, 'MARIAS', '', 1, NULL),
(908, 91, 'PACHAS', '', 1, NULL),
(909, 91, 'QUIVILLA', '', 1, NULL),
(910, 91, 'RIPAN', '', 1, NULL),
(911, 91, 'SHUNQUI', '', 1, NULL),
(912, 91, 'SILLAPATA', '', 1, NULL),
(913, 91, 'YANAS', '', 1, NULL),
(914, 92, 'HUACAYBAMBA', '', 1, NULL),
(915, 92, 'CANCHABAMBA', '', 1, NULL),
(916, 92, 'COCHABAMBA', '', 1, NULL),
(917, 92, 'PINRA', '', 1, NULL),
(918, 93, 'LLATA', '', 1, NULL),
(919, 93, 'ARANCAY', '', 1, NULL),
(920, 93, 'CHAVIN DE PARIARCA', '', 1, NULL),
(921, 93, 'JACAS GRANDE', '', 1, NULL),
(922, 93, 'JIRCAN', '', 1, NULL),
(923, 93, 'MIRAFLORES', '', 1, NULL),
(924, 93, 'MONZON', '', 1, NULL),
(925, 93, 'PUNCHAO', '', 1, NULL),
(926, 93, 'PUÑOS', '', 1, NULL),
(927, 93, 'SINGA', '', 1, NULL),
(928, 93, 'TANTAMAYO', '', 1, NULL),
(929, 94, 'RUPA-RUPA', '', 1, NULL),
(930, 94, 'DANIEL ALOMIAS ROBLES', '', 1, NULL),
(931, 94, 'HERMILIO VALDIZAN', '', 1, NULL),
(932, 94, 'JOSE CRESPO Y CASTILLO', '', 1, NULL),
(933, 94, 'LUYANDO', '', 1, NULL),
(934, 94, 'MARIANO DAMASO BERAUN', '', 1, NULL),
(935, 95, 'HUACRACHUCO', '', 1, NULL),
(936, 95, 'CHOLON', '', 1, NULL),
(937, 95, 'SAN BUENAVENTURA', '', 1, NULL),
(938, 96, 'PANAO', '', 1, NULL),
(939, 96, 'CHAGLLA', '', 1, NULL),
(940, 96, 'MOLINO', '', 1, NULL),
(941, 96, 'UMARI', '', 1, NULL),
(942, 97, 'PUERTO INCA', '', 1, NULL),
(943, 97, 'CODO DEL POZUZO', '', 1, NULL),
(944, 97, 'HONORIA', '', 1, NULL),
(945, 97, 'TOURNAVISTA', '', 1, NULL),
(946, 97, 'YUYAPICHIS', '', 1, NULL),
(947, 98, 'JESUS', '', 1, NULL),
(948, 98, 'BAÑOS', '', 1, NULL),
(949, 98, 'JIVIA', '', 1, NULL),
(950, 98, 'QUEROPALCA', '', 1, NULL),
(951, 98, 'RONDOS', '', 1, NULL),
(952, 98, 'SAN FRANCISCO DE ASIS', '', 1, NULL),
(953, 98, 'SAN MIGUEL DE CAURI', '', 1, NULL),
(954, 99, 'CHAVINILLO', '', 1, NULL),
(955, 99, 'CAHUAC', '', 1, NULL),
(956, 99, 'CHACABAMBA', '', 1, NULL),
(957, 99, 'APARICIO POMARES', '', 1, NULL),
(958, 99, 'JACAS CHICO', '', 1, NULL),
(959, 99, 'OBAS', '', 1, NULL),
(960, 99, 'PAMPAMARCA', '', 1, NULL),
(961, 99, 'CHORAS', '', 1, NULL),
(962, 100, 'ICA', '', 1, NULL),
(963, 100, 'LA TINGUIÑA', '', 1, NULL),
(964, 100, 'LOS AQUIJES', '', 1, NULL),
(965, 100, 'OCUCAJE', '', 1, NULL),
(966, 100, 'PACHACUTEC', '', 1, NULL),
(967, 100, 'PARCONA', '', 1, NULL),
(968, 100, 'PUEBLO NUEVO', '', 1, NULL),
(969, 100, 'SALAS', '', 1, NULL),
(970, 100, 'SAN JOSE DE LOS MOLINOS', '', 1, NULL),
(971, 100, 'SAN JUAN BAUTISTA', '', 1, NULL),
(972, 100, 'SANTIAGO', '', 1, NULL),
(973, 100, 'SUBTANJALLA', '', 1, NULL),
(974, 100, 'TATE', '', 1, NULL),
(975, 100, 'YAUCA DEL ROSARIO', '', 1, NULL),
(976, 101, 'CHINCHA ALTA', '', 1, NULL),
(977, 101, 'ALTO LARAN', '', 1, NULL),
(978, 101, 'CHAVIN', '', 1, NULL),
(979, 101, 'CHINCHA BAJA', '', 1, NULL),
(980, 101, 'EL CARMEN', '', 1, NULL),
(981, 101, 'GROCIO PRADO', '', 1, NULL),
(982, 101, 'PUEBLO NUEVO', '', 1, NULL),
(983, 101, 'SAN JUAN DE YANAC', '', 1, NULL),
(984, 101, 'SAN PEDRO DE HUACARPANA', '', 1, NULL),
(985, 101, 'SUNAMPE', '', 1, NULL),
(986, 101, 'TAMBO DE MORA', '', 1, NULL),
(987, 102, 'NAZCA', '', 1, NULL),
(988, 102, 'CHANGUILLO', '', 1, NULL),
(989, 102, 'EL INGENIO', '', 1, NULL),
(990, 102, 'MARCONA', '', 1, NULL),
(991, 102, 'VISTA ALEGRE', '', 1, NULL),
(992, 103, 'PALPA', '', 1, NULL),
(993, 103, 'LLIPATA', '', 1, NULL),
(994, 103, 'RIO GRANDE', '', 1, NULL),
(995, 103, 'SANTA CRUZ', '', 1, NULL),
(996, 103, 'TIBILLO', '', 1, NULL),
(997, 104, 'PISCO', '', 1, NULL),
(998, 104, 'HUANCANO', '', 1, NULL),
(999, 104, 'HUMAY', '', 1, NULL),
(1000, 104, 'INDEPENDENCIA', '', 1, NULL),
(1001, 104, 'PARACAS', '', 1, NULL),
(1002, 104, 'SAN ANDRES', '', 1, NULL),
(1003, 104, 'SAN CLEMENTE', '', 1, NULL),
(1004, 104, 'TUPAC AMARU INCA', '', 1, NULL),
(1005, 105, 'HUANCAYO', '', 1, NULL),
(1006, 105, 'CARHUACALLANGA', '', 1, NULL),
(1007, 105, 'CHACAPAMPA', '', 1, NULL),
(1008, 105, 'CHICCHE', '', 1, NULL),
(1009, 105, 'CHILCA', '', 1, NULL),
(1010, 105, 'CHONGOS ALTO', '', 1, NULL),
(1011, 105, 'CHUPURO', '', 1, NULL),
(1012, 105, 'COLCA', '', 1, NULL),
(1013, 105, 'CULLHUAS', '', 1, NULL),
(1014, 105, 'EL TAMBO', '', 1, NULL),
(1015, 105, 'HUACRAPUQUIO', '', 1, NULL),
(1016, 105, 'HUALHUAS', '', 1, NULL),
(1017, 105, 'HUANCAN', '', 1, NULL),
(1018, 105, 'HUASICANCHA', '', 1, NULL),
(1019, 105, 'HUAYUCACHI', '', 1, NULL),
(1020, 105, 'INGENIO', '', 1, NULL),
(1021, 105, 'PARIAHUANCA', '', 1, NULL),
(1022, 105, 'PILCOMAYO', '', 1, NULL),
(1023, 105, 'PUCARA', '', 1, NULL),
(1024, 105, 'QUICHUAY', '', 1, NULL),
(1025, 105, 'QUILCAS', '', 1, NULL),
(1026, 105, 'SAN AGUSTIN', '', 1, NULL),
(1027, 105, 'SAN JERONIMO DE TUNAN', '', 1, NULL),
(1028, 105, 'SAÑO', '', 1, NULL),
(1029, 105, 'SAPALLANGA', '', 1, NULL),
(1030, 105, 'SICAYA', '', 1, NULL),
(1031, 105, 'SANTO DOMINGO DE ACOBAMBA', '', 1, NULL),
(1032, 105, 'VIQUES', '', 1, NULL),
(1033, 106, 'CONCEPCION', '', 1, NULL),
(1034, 106, 'ACO', '', 1, NULL),
(1035, 106, 'ANDAMARCA', '', 1, NULL),
(1036, 106, 'CHAMBARA', '', 1, NULL),
(1037, 106, 'COCHAS', '', 1, NULL),
(1038, 106, 'COMAS', '', 1, NULL),
(1039, 106, 'HEROINAS TOLEDO', '', 1, NULL),
(1040, 106, 'MANZANARES', '', 1, NULL),
(1041, 106, 'MARISCAL CASTILLA', '', 1, NULL),
(1042, 106, 'MATAHUASI', '', 1, NULL),
(1043, 106, 'MITO', '', 1, NULL),
(1044, 106, 'NUEVE DE JULIO', '', 1, NULL),
(1045, 106, 'ORCOTUNA', '', 1, NULL),
(1046, 106, 'SAN JOSE DE QUERO', '', 1, NULL),
(1047, 106, 'SANTA ROSA DE OCOPA', '', 1, NULL),
(1048, 107, 'CHANCHAMAYO', '', 1, NULL),
(1049, 107, 'PERENE', '', 1, NULL),
(1050, 107, 'PICHANAQUI', '', 1, NULL),
(1051, 107, 'SAN LUIS DE SHUARO', '', 1, NULL),
(1052, 107, 'SAN RAMON', '', 1, NULL),
(1053, 107, 'VITOC', '', 1, NULL),
(1054, 108, 'JAUJA', '', 1, NULL),
(1055, 108, 'ACOLLA', '', 1, NULL),
(1056, 108, 'APATA', '', 1, NULL),
(1057, 108, 'ATAURA', '', 1, NULL),
(1058, 108, 'CANCHAYLLO', '', 1, NULL),
(1059, 108, 'CURICACA', '', 1, NULL),
(1060, 108, 'EL MANTARO', '', 1, NULL),
(1061, 108, 'HUAMALI', '', 1, NULL),
(1062, 108, 'HUARIPAMPA', '', 1, NULL),
(1063, 108, 'HUERTAS', '', 1, NULL),
(1064, 108, 'JANJAILLO', '', 1, NULL),
(1065, 108, 'JULCAN', '', 1, NULL),
(1066, 108, 'LEONOR ORDOÑEZ', '', 1, NULL),
(1067, 108, 'LLOCLLAPAMPA', '', 1, NULL),
(1068, 108, 'MARCO', '', 1, NULL),
(1069, 108, 'MASMA', '', 1, NULL),
(1070, 108, 'MASMA CHICCHE', '', 1, NULL),
(1071, 108, 'MOLINOS', '', 1, NULL),
(1072, 108, 'MONOBAMBA', '', 1, NULL),
(1073, 108, 'MUQUI', '', 1, NULL),
(1074, 108, 'MUQUIYAUYO', '', 1, NULL),
(1075, 108, 'PACA', '', 1, NULL),
(1076, 108, 'PACCHA', '', 1, NULL),
(1077, 108, 'PANCAN', '', 1, NULL),
(1078, 108, 'PARCO', '', 1, NULL),
(1079, 108, 'POMACANCHA', '', 1, NULL),
(1080, 108, 'RICRAN', '', 1, NULL),
(1081, 108, 'SAN LORENZO', '', 1, NULL),
(1082, 108, 'SAN PEDRO DE CHUNAN', '', 1, NULL),
(1083, 108, 'SAUSA', '', 1, NULL),
(1084, 108, 'SINCOS', '', 1, NULL),
(1085, 108, 'TUNAN MARCA', '', 1, NULL),
(1086, 108, 'YAULI', '', 1, NULL),
(1087, 108, 'YAUYOS', '', 1, NULL),
(1088, 109, 'JUNIN', '', 1, NULL),
(1089, 109, 'CARHUAMAYO', '', 1, NULL),
(1090, 109, 'ONDORES', '', 1, NULL),
(1091, 109, 'ULCUMAYO', '', 1, NULL),
(1092, 110, 'SATIPO', '', 1, NULL),
(1093, 110, 'COVIRIALI', '', 1, NULL),
(1094, 110, 'LLAYLLA', '', 1, NULL),
(1095, 110, 'MAZAMARI', '', 1, NULL),
(1096, 110, 'PAMPA HERMOSA', '', 1, NULL),
(1097, 110, 'PANGOA', '', 1, NULL),
(1098, 110, 'RIO NEGRO', '', 1, NULL),
(1099, 110, 'RIO TAMBO', '', 1, NULL),
(1100, 111, 'TARMA', '', 1, NULL),
(1101, 111, 'ACOBAMBA', '', 1, NULL),
(1102, 111, 'HUARICOLCA', '', 1, NULL),
(1103, 111, 'HUASAHUASI', '', 1, NULL),
(1104, 111, 'LA UNION', '', 1, NULL),
(1105, 111, 'PALCA', '', 1, NULL),
(1106, 111, 'PALCAMAYO', '', 1, NULL),
(1107, 111, 'SAN PEDRO DE CAJAS', '', 1, NULL),
(1108, 111, 'TAPO', '', 1, NULL),
(1109, 112, 'LA OROYA', '', 1, NULL),
(1110, 112, 'CHACAPALPA', '', 1, NULL),
(1111, 112, 'HUAY-HUAY', '', 1, NULL),
(1112, 112, 'MARCAPOMACOCHA', '', 1, NULL),
(1113, 112, 'MOROCOCHA', '', 1, NULL),
(1114, 112, 'PACCHA', '', 1, NULL),
(1115, 112, 'SANTA BARBARA DE CARHUACAYAN', '', 1, NULL),
(1116, 112, 'SANTA ROSA DE SACCO', '', 1, NULL),
(1117, 112, 'SUITUCANCHA', '', 1, NULL),
(1118, 112, 'YAULI', '', 1, NULL),
(1119, 113, 'CHUPACA', '', 1, NULL),
(1120, 113, 'AHUAC', '', 1, NULL),
(1121, 113, 'CHONGOS BAJO', '', 1, NULL),
(1122, 113, 'HUACHAC', '', 1, NULL),
(1123, 113, 'HUAMANCACA CHICO', '', 1, NULL),
(1124, 113, 'SAN JUAN DE YSCOS', '', 1, NULL),
(1125, 113, 'SAN JUAN DE JARPA', '', 1, NULL),
(1126, 113, 'TRES DE DICIEMBRE', '', 1, NULL),
(1127, 113, 'YANACANCHA', '', 1, NULL),
(1128, 114, 'TRUJILLO', '', 1, NULL),
(1129, 114, 'EL PORVENIR', '', 1, NULL),
(1130, 114, 'FLORENCIA DE MORA', '', 1, NULL),
(1131, 114, 'HUANCHACO', '', 1, NULL),
(1132, 114, 'LA ESPERANZA', '', 1, NULL),
(1133, 114, 'LAREDO', '', 1, NULL),
(1134, 114, 'MOCHE', '', 1, NULL),
(1135, 114, 'POROTO', '', 1, NULL),
(1136, 114, 'SALAVERRY', '', 1, NULL),
(1137, 114, 'SIMBAL', '', 1, NULL),
(1138, 114, 'VICTOR LARCO HERRERA', '', 1, NULL),
(1139, 115, 'ASCOPE', '', 1, NULL),
(1140, 115, 'CHICAMA', '', 1, NULL),
(1141, 115, 'CHOCOPE', '', 1, NULL),
(1142, 115, 'MAGDALENA DE CAO', '', 1, NULL),
(1143, 115, 'PAIJAN', '', 1, NULL),
(1144, 115, 'RAZURI', '', 1, NULL),
(1145, 115, 'SANTIAGO DE CAO', '', 1, NULL),
(1146, 115, 'CASA GRANDE', '', 1, NULL),
(1147, 116, 'BOLIVAR', '', 1, NULL),
(1148, 116, 'BAMBAMARCA', '', 1, NULL),
(1149, 116, 'CONDORMARCA', '', 1, NULL),
(1150, 116, 'LONGOTEA', '', 1, NULL),
(1151, 116, 'UCHUMARCA', '', 1, NULL),
(1152, 116, 'UCUNCHA', '', 1, NULL),
(1153, 117, 'CHEPEN', '', 1, NULL),
(1154, 117, 'PACANGA', '', 1, NULL),
(1155, 117, 'PUEBLO NUEVO', '', 1, NULL),
(1156, 118, 'JULCAN', '', 1, NULL),
(1157, 118, 'CALAMARCA', '', 1, NULL),
(1158, 118, 'CARABAMBA', '', 1, NULL),
(1159, 118, 'HUASO', '', 1, NULL),
(1160, 119, 'OTUZCO', '', 1, NULL),
(1161, 119, 'AGALLPAMPA', '', 1, NULL),
(1162, 119, 'CHARAT', '', 1, NULL),
(1163, 119, 'HUARANCHAL', '', 1, NULL),
(1164, 119, 'LA CUESTA', '', 1, NULL),
(1165, 119, 'MACHE', '', 1, NULL),
(1166, 119, 'PARANDAY', '', 1, NULL),
(1167, 119, 'SALPO', '', 1, NULL),
(1168, 119, 'SINSICAP', '', 1, NULL),
(1169, 119, 'USQUIL', '', 1, NULL),
(1170, 120, 'SAN PEDRO DE LLOC', '', 1, NULL),
(1171, 120, 'GUADALUPE', '', 1, NULL),
(1172, 120, 'JEQUETEPEQUE', '', 1, NULL),
(1173, 120, 'PACASMAYO', '', 1, NULL),
(1174, 120, 'SAN JOSE', '', 1, NULL),
(1175, 121, 'TAYABAMBA', '', 1, NULL),
(1176, 121, 'BULDIBUYO', '', 1, NULL),
(1177, 121, 'CHILLIA', '', 1, NULL),
(1178, 121, 'HUANCASPATA', '', 1, NULL),
(1179, 121, 'HUAYLILLAS', '', 1, NULL),
(1180, 121, 'HUAYO', '', 1, NULL),
(1181, 121, 'ONGON', '', 1, NULL),
(1182, 121, 'PARCOY', '', 1, NULL),
(1183, 121, 'PATAZ', '', 1, NULL),
(1184, 121, 'PIAS', '', 1, NULL),
(1185, 121, 'SANTIAGO DE CHALLAS', '', 1, NULL),
(1186, 121, 'TAURIJA', '', 1, NULL),
(1187, 121, 'URPAY', '', 1, NULL),
(1188, 122, 'HUAMACHUCO', '', 1, NULL),
(1189, 122, 'CHUGAY', '', 1, NULL),
(1190, 122, 'COCHORCO', '', 1, NULL),
(1191, 122, 'CURGOS', '', 1, NULL),
(1192, 122, 'MARCABAL', '', 1, NULL),
(1193, 122, 'SANAGORAN', '', 1, NULL),
(1194, 122, 'SARIN', '', 1, NULL),
(1195, 122, 'SARTIMBAMBA', '', 1, NULL),
(1196, 123, 'SANTIAGO DE CHUCO', '', 1, NULL),
(1197, 123, 'ANGASMARCA', '', 1, NULL),
(1198, 123, 'CACHICADAN', '', 1, NULL),
(1199, 123, 'MOLLEBAMBA', '', 1, NULL),
(1200, 123, 'MOLLEPATA', '', 1, NULL),
(1201, 123, 'QUIRUVILCA', '', 1, NULL),
(1202, 123, 'SANTA CRUZ DE CHUCA', '', 1, NULL),
(1203, 123, 'SITABAMBA', '', 1, NULL),
(1204, 124, 'CASCAS', '', 1, NULL),
(1205, 124, 'LUCMA', '', 1, NULL),
(1206, 124, 'COMPIN', '', 1, NULL),
(1207, 124, 'SAYAPULLO', '', 1, NULL),
(1208, 125, 'VIRU', '', 1, NULL),
(1209, 125, 'CHAO', '', 1, NULL),
(1210, 125, 'GUADALUPITO', '', 1, NULL),
(1211, 126, 'CHICLAYO', '', 1, NULL),
(1212, 126, 'CHONGOYAPE', '', 1, NULL),
(1213, 126, 'ETEN', '', 1, NULL),
(1214, 126, 'ETEN PUERTO', '', 1, NULL),
(1215, 126, 'JOSE LEONARDO ORTIZ', '', 1, NULL),
(1216, 126, 'LA VICTORIA', '', 1, NULL),
(1217, 126, 'LAGUNAS', '', 1, NULL),
(1218, 126, 'MONSEFU', '', 1, NULL),
(1219, 126, 'NUEVA ARICA', '', 1, NULL),
(1220, 126, 'OYOTUN', '', 1, NULL),
(1221, 126, 'PICSI', '', 1, NULL),
(1222, 126, 'PIMENTEL', '', 1, NULL),
(1223, 126, 'REQUE', '', 1, NULL),
(1224, 126, 'SANTA ROSA', '', 1, NULL),
(1225, 126, 'SAÑA', '', 1, NULL),
(1226, 126, 'CAYALTI', '', 1, NULL),
(1227, 126, 'PATAPO', '', 1, NULL),
(1228, 126, 'POMALCA', '', 1, NULL),
(1229, 126, 'PUCALA', '', 1, NULL),
(1230, 126, 'TUMAN', '', 1, NULL),
(1231, 127, 'FERREÑAFE', '', 1, NULL),
(1232, 127, 'CAÑARIS', '', 1, NULL),
(1233, 127, 'INCAHUASI', '', 1, NULL),
(1234, 127, 'MANUEL ANTONIO MESONES MURO', '', 1, NULL),
(1235, 127, 'PITIPO', '', 1, NULL),
(1236, 127, 'PUEBLO NUEVO', '', 1, NULL),
(1237, 128, 'LAMBAYEQUE', '', 1, NULL),
(1238, 128, 'CHOCHOPE', '', 1, NULL),
(1239, 128, 'ILLIMO', '', 1, NULL),
(1240, 128, 'JAYANCA', '', 1, NULL),
(1241, 128, 'MOCHUMI', '', 1, NULL),
(1242, 128, 'MORROPE', '', 1, NULL),
(1243, 128, 'MOTUPE', '', 1, NULL),
(1244, 128, 'OLMOS', '', 1, NULL),
(1245, 128, 'PACORA', '', 1, NULL),
(1246, 128, 'SALAS', '', 1, NULL),
(1247, 128, 'SAN JOSE', '', 1, NULL),
(1248, 128, 'TUCUME', '', 1, NULL),
(1249, 129, 'LIMA', '', 1, NULL),
(1250, 129, 'ANCON', '', 1, NULL),
(1251, 129, 'ATE', '', 1, NULL),
(1252, 129, 'BARRANCO', '', 1, NULL),
(1253, 129, 'BREÑA', '', 1, NULL),
(1254, 129, 'CARABAYLLO', '', 1, NULL),
(1255, 129, 'CHACLACAYO', '', 1, NULL),
(1256, 129, 'CHORRILLOS', '', 1, NULL),
(1257, 129, 'CIENEGUILLA', '', 1, NULL),
(1258, 129, 'COMAS', '', 1, NULL),
(1259, 129, 'EL AGUSTINO', '', 1, NULL),
(1260, 129, 'INDEPENDENCIA', '', 1, NULL),
(1261, 129, 'JESUS MARIA', '', 1, NULL),
(1262, 129, 'LA MOLINA', '', 1, NULL),
(1263, 129, 'LA VICTORIA', '', 1, NULL),
(1264, 129, 'LINCE', '', 1, NULL),
(1265, 129, 'LOS OLIVOS', '', 1, NULL),
(1266, 129, 'LURIGANCHO', '', 1, NULL),
(1267, 129, 'LURIN', '', 1, NULL),
(1268, 129, 'MAGDALENA DEL MAR', '', 1, NULL),
(1269, 129, 'MAGDALENA VIEJA', '', 1, NULL),
(1270, 129, 'MIRAFLORES', '', 1, NULL),
(1271, 129, 'PACHACAMAC', '', 1, NULL),
(1272, 129, 'PUCUSANA', '', 1, NULL),
(1273, 129, 'PUENTE PIEDRA', '', 1, NULL),
(1274, 129, 'PUNTA HERMOSA', '', 1, NULL),
(1275, 129, 'PUNTA NEGRA', '', 1, NULL),
(1276, 129, 'RIMAC', '', 1, NULL),
(1277, 129, 'SAN BARTOLO', '', 1, NULL),
(1278, 129, 'SAN BORJA', '', 1, NULL),
(1279, 129, 'SAN ISIDRO', '', 1, NULL),
(1280, 129, 'SAN JUAN DE LURIGANCHO', '', 1, NULL),
(1281, 129, 'SAN JUAN DE MIRAFLORES', '', 1, NULL),
(1282, 129, 'SAN LUIS', '', 1, NULL),
(1283, 129, 'SAN MARTIN DE PORRES', '', 1, NULL),
(1284, 129, 'SAN MIGUEL', '', 1, NULL),
(1285, 129, 'SANTA ANITA', '', 1, NULL),
(1286, 129, 'SANTA MARIA DEL MAR', '', 1, NULL),
(1287, 129, 'SANTA ROSA', '', 1, NULL),
(1288, 129, 'SANTIAGO DE SURCO', '', 1, NULL),
(1289, 129, 'SURQUILLO', '', 1, NULL),
(1290, 129, 'VILLA EL SALVADOR', '', 1, NULL),
(1291, 129, 'VILLA MARIA DEL TRIUNFO', '', 1, NULL),
(1292, 130, 'BARRANCA', '', 1, NULL),
(1293, 130, 'PARAMONGA', '', 1, NULL),
(1294, 130, 'PATIVILCA', '', 1, NULL),
(1295, 130, 'SUPE', '', 1, NULL),
(1296, 130, 'SUPE PUERTO', '', 1, NULL),
(1297, 131, 'CAJATAMBO', '', 1, NULL),
(1298, 131, 'COPA', '', 1, NULL),
(1299, 131, 'GORGOR', '', 1, NULL),
(1300, 131, 'HUANCAPON', '', 1, NULL),
(1301, 131, 'MANAS', '', 1, NULL),
(1302, 132, 'CANTA', '', 1, NULL),
(1303, 132, 'ARAHUAY', '', 1, NULL),
(1304, 132, 'HUAMANTANGA', '', 1, NULL),
(1305, 132, 'HUAROS', '', 1, NULL),
(1306, 132, 'LACHAQUI', '', 1, NULL),
(1307, 132, 'SAN BUENAVENTURA', '', 1, NULL),
(1308, 132, 'SANTA ROSA DE QUIVES', '', 1, NULL),
(1309, 133, 'SAN VICENTE DE CAÑETE', '', 1, NULL),
(1310, 133, 'ASIA', '', 1, NULL),
(1311, 133, 'CALANGO', '', 1, NULL),
(1312, 133, 'CERRO AZUL', '', 1, NULL),
(1313, 133, 'CHILCA', '', 1, NULL),
(1314, 133, 'COAYLLO', '', 1, NULL),
(1315, 133, 'IMPERIAL', '', 1, NULL),
(1316, 133, 'LUNAHUANA', '', 1, NULL),
(1317, 133, 'MALA', '', 1, NULL),
(1318, 133, 'NUEVO IMPERIAL', '', 1, NULL),
(1319, 133, 'PACARAN', '', 1, NULL),
(1320, 133, 'QUILMANA', '', 1, NULL),
(1321, 133, 'SAN ANTONIO', '', 1, NULL),
(1322, 133, 'SAN LUIS', '', 1, NULL),
(1323, 133, 'SANTA CRUZ DE FLORES', '', 1, NULL),
(1324, 133, 'ZUÑIGA', '', 1, NULL),
(1325, 134, 'HUARAL', '', 1, NULL),
(1326, 134, 'ATAVILLOS ALTO', '', 1, NULL),
(1327, 134, 'ATAVILLOS BAJO', '', 1, NULL),
(1328, 134, 'AUCALLAMA', '', 1, NULL),
(1329, 134, 'CHANCAY', '', 1, NULL),
(1330, 134, 'IHUARI', '', 1, NULL),
(1331, 134, 'LAMPIAN', '', 1, NULL),
(1332, 134, 'PACARAOS', '', 1, NULL),
(1333, 134, 'SAN MIGUEL DE ACOS', '', 1, NULL),
(1334, 134, 'SANTA CRUZ DE ANDAMARCA', '', 1, NULL),
(1335, 134, 'SUMBILCA', '', 1, NULL),
(1336, 134, 'VEINTISIETE DE NOVIEMBRE', '', 1, NULL),
(1337, 135, 'MATUCANA', '', 1, NULL),
(1338, 135, 'ANTIOQUIA', '', 1, NULL),
(1339, 135, 'CALLAHUANCA', '', 1, NULL),
(1340, 135, 'CARAMPOMA', '', 1, NULL),
(1341, 135, 'CHICLA', '', 1, NULL),
(1342, 135, 'CUENCA', '', 1, NULL),
(1343, 135, 'HUACHUPAMPA', '', 1, NULL),
(1344, 135, 'HUANZA', '', 1, NULL),
(1345, 135, 'HUAROCHIRI', '', 1, NULL),
(1346, 135, 'LAHUAYTAMBO', '', 1, NULL),
(1347, 135, 'LANGA', '', 1, NULL),
(1348, 135, 'LARAOS', '', 1, NULL),
(1349, 135, 'MARIATANA', '', 1, NULL),
(1350, 135, 'RICARDO PALMA', '', 1, NULL),
(1351, 135, 'SAN ANDRES DE TUPICOCHA', '', 1, NULL),
(1352, 135, 'SAN ANTONIO', '', 1, NULL),
(1353, 135, 'SAN BARTOLOME', '', 1, NULL),
(1354, 135, 'SAN DAMIAN', '', 1, NULL),
(1355, 135, 'SAN JUAN DE IRIS', '', 1, NULL),
(1356, 135, 'SAN JUAN DE TANTARANCHE', '', 1, NULL),
(1357, 135, 'SAN LORENZO DE QUINTI', '', 1, NULL),
(1358, 135, 'SAN MATEO', '', 1, NULL),
(1359, 135, 'SAN MATEO DE OTAO', '', 1, NULL),
(1360, 135, 'SAN PEDRO DE CASTA', '', 1, NULL),
(1361, 135, 'SAN PEDRO DE HUANCAYRE', '', 1, NULL),
(1362, 135, 'SANGALLAYA', '', 1, NULL),
(1363, 135, 'SANTA CRUZ DE COCACHACRA', '', 1, NULL),
(1364, 135, 'SANTA EULALIA', '', 1, NULL),
(1365, 135, 'SANTIAGO DE ANCHUCAYA', '', 1, NULL),
(1366, 135, 'SANTIAGO DE TUNA', '', 1, NULL),
(1367, 135, 'SANTO DOMINGO DE LOS OLLEROS', '', 1, NULL),
(1368, 135, 'SURCO', '', 1, NULL),
(1369, 136, 'HUACHO', '', 1, NULL),
(1370, 136, 'AMBAR', '', 1, NULL),
(1371, 136, 'CALETA DE CARQUIN', '', 1, NULL),
(1372, 136, 'CHECRAS', '', 1, NULL),
(1373, 136, 'HUALMAY', '', 1, NULL),
(1374, 136, 'HUAURA', '', 1, NULL),
(1375, 136, 'LEONCIO PRADO', '', 1, NULL),
(1376, 136, 'PACCHO', '', 1, NULL),
(1377, 136, 'SANTA LEONOR', '', 1, NULL),
(1378, 136, 'SANTA MARIA', '', 1, NULL),
(1379, 136, 'SAYAN', '', 1, NULL),
(1380, 136, 'VEGUETA', '', 1, NULL),
(1381, 137, 'OYON', '', 1, NULL),
(1382, 137, 'ANDAJES', '', 1, NULL),
(1383, 137, 'CAUJUL', '', 1, NULL),
(1384, 137, 'COCHAMARCA', '', 1, NULL),
(1385, 137, 'NAVAN', '', 1, NULL),
(1386, 137, 'PACHANGARA', '', 1, NULL),
(1387, 138, 'YAUYOS', '', 1, NULL),
(1388, 138, 'ALIS', '', 1, NULL),
(1389, 138, 'AYAUCA', '', 1, NULL),
(1390, 138, 'AYAVIRI', '', 1, NULL),
(1391, 138, 'AZANGARO', '', 1, NULL),
(1392, 138, 'CACRA', '', 1, NULL),
(1393, 138, 'CARANIA', '', 1, NULL),
(1394, 138, 'CATAHUASI', '', 1, NULL),
(1395, 138, 'CHOCOS', '', 1, NULL),
(1396, 138, 'COCHAS', '', 1, NULL),
(1397, 138, 'COLONIA', '', 1, NULL);
INSERT INTO `distritos` (`id`, `id_provincia`, `nombre`, `nombre_corto`, `esta_activado`, `fecha`) VALUES
(1398, 138, 'HONGOS', '', 1, NULL),
(1399, 138, 'HUAMPARA', '', 1, NULL),
(1400, 138, 'HUANCAYA', '', 1, NULL),
(1401, 138, 'HUANGASCAR', '', 1, NULL),
(1402, 138, 'HUANTAN', '', 1, NULL),
(1403, 138, 'HUAÑEC', '', 1, NULL),
(1404, 138, 'LARAOS', '', 1, NULL),
(1405, 138, 'LINCHA', '', 1, NULL),
(1406, 138, 'MADEAN', '', 1, NULL),
(1407, 138, 'MIRAFLORES', '', 1, NULL),
(1408, 138, 'OMAS', '', 1, NULL),
(1409, 138, 'PUTINZA', '', 1, NULL),
(1410, 138, 'QUINCHES', '', 1, NULL),
(1411, 138, 'QUINOCAY', '', 1, NULL),
(1412, 138, 'SAN JOAQUIN', '', 1, NULL),
(1413, 138, 'SAN PEDRO DE PILAS', '', 1, NULL),
(1414, 138, 'TANTA', '', 1, NULL),
(1415, 138, 'TAURIPAMPA', '', 1, NULL),
(1416, 138, 'TOMAS', '', 1, NULL),
(1417, 138, 'TUPE', '', 1, NULL),
(1418, 138, 'VIÑAC', '', 1, NULL),
(1419, 138, 'VITIS', '', 1, NULL),
(1420, 139, 'IQUITOS', '', 1, NULL),
(1421, 139, 'ALTO NANAY', '', 1, NULL),
(1422, 139, 'FERNANDO LORES', '', 1, NULL),
(1423, 139, 'INDIANA', '', 1, NULL),
(1424, 139, 'LAS AMAZONAS', '', 1, NULL),
(1425, 139, 'MAZAN', '', 1, NULL),
(1426, 139, 'NAPO', '', 1, NULL),
(1427, 139, 'PUNCHANA', '', 1, NULL),
(1428, 139, 'PUTUMAYO', '', 1, NULL),
(1429, 139, 'TORRES CAUSANA', '', 1, NULL),
(1430, 139, 'BELEN', '', 1, NULL),
(1431, 139, 'SAN JUAN BAUTISTA', '', 1, NULL),
(1432, 139, 'TENIENTE MANUEL CLAVERO', '', 1, NULL),
(1433, 140, 'YURIMAGUAS', '', 1, NULL),
(1434, 140, 'BALSAPUERTO', '', 1, NULL),
(1435, 140, 'JEBEROS', '', 1, NULL),
(1436, 140, 'LAGUNAS', '', 1, NULL),
(1437, 140, 'SANTA CRUZ', '', 1, NULL),
(1438, 140, 'TENIENTE CESAR LOPEZ ROJAS', '', 1, NULL),
(1439, 141, 'NAUTA', '', 1, NULL),
(1440, 141, 'PARINARI', '', 1, NULL),
(1441, 141, 'TIGRE', '', 1, NULL),
(1442, 141, 'TROMPETEROS', '', 1, NULL),
(1443, 141, 'URARINAS', '', 1, NULL),
(1444, 142, 'RAMON CASTILLA', '', 1, NULL),
(1445, 142, 'PEBAS', '', 1, NULL),
(1446, 142, 'YAVARI', '', 1, NULL),
(1447, 142, 'SAN PABLO', '', 1, NULL),
(1448, 143, 'REQUENA', '', 1, NULL),
(1449, 143, 'ALTO TAPICHE', '', 1, NULL),
(1450, 143, 'CAPELO', '', 1, NULL),
(1451, 143, 'EMILIO SAN MARTIN', '', 1, NULL),
(1452, 143, 'MAQUIA', '', 1, NULL),
(1453, 143, 'PUINAHUA', '', 1, NULL),
(1454, 143, 'SAQUENA', '', 1, NULL),
(1455, 143, 'SOPLIN', '', 1, NULL),
(1456, 143, 'TAPICHE', '', 1, NULL),
(1457, 143, 'JENARO HERRERA', '', 1, NULL),
(1458, 143, 'YAQUERANA', '', 1, NULL),
(1459, 144, 'CONTAMANA', '', 1, NULL),
(1460, 144, 'INAHUAYA', '', 1, NULL),
(1461, 144, 'PADRE MARQUEZ', '', 1, NULL),
(1462, 144, 'PAMPA HERMOSA', '', 1, NULL),
(1463, 144, 'SARAYACU', '', 1, NULL),
(1464, 144, 'VARGAS GUERRA', '', 1, NULL),
(1465, 145, 'BARRANCA', '', 1, NULL),
(1466, 145, 'CAHUAPANAS', '', 1, NULL),
(1467, 145, 'MANSERICHE', '', 1, NULL),
(1468, 145, 'MORONA', '', 1, NULL),
(1469, 145, 'PASTAZA', '', 1, NULL),
(1470, 145, 'ANDOAS', '', 1, NULL),
(1471, 146, 'TAMBOPATA', '', 1, NULL),
(1472, 146, 'INAMBARI', '', 1, NULL),
(1473, 146, 'LAS PIEDRAS', '', 1, NULL),
(1474, 146, 'LABERINTO', '', 1, NULL),
(1475, 147, 'MANU', '', 1, NULL),
(1476, 147, 'FITZCARRALD', '', 1, NULL),
(1477, 147, 'MADRE DE DIOS', '', 1, NULL),
(1478, 147, 'HUEPETUHE', '', 1, NULL),
(1479, 148, 'IÑAPARI', '', 1, NULL),
(1480, 148, 'IBERIA', '', 1, NULL),
(1481, 148, 'TAHUAMANU', '', 1, NULL),
(1482, 149, 'MOQUEGUA', '', 1, NULL),
(1483, 149, 'CARUMAS', '', 1, NULL),
(1484, 149, 'CUCHUMBAYA', '', 1, NULL),
(1485, 149, 'SAMEGUA', '', 1, NULL),
(1486, 149, 'SAN CRISTOBAL', '', 1, NULL),
(1487, 149, 'TORATA', '', 1, NULL),
(1488, 150, 'OMATE', '', 1, NULL),
(1489, 150, 'CHOJATA', '', 1, NULL),
(1490, 150, 'COALAQUE', '', 1, NULL),
(1491, 150, 'ICHUÑA', '', 1, NULL),
(1492, 150, 'LA CAPILLA', '', 1, NULL),
(1493, 150, 'LLOQUE', '', 1, NULL),
(1494, 150, 'MATALAQUE', '', 1, NULL),
(1495, 150, 'PUQUINA', '', 1, NULL),
(1496, 150, 'QUINISTAQUILLAS', '', 1, NULL),
(1497, 150, 'UBINAS', '', 1, NULL),
(1498, 150, 'YUNGA', '', 1, NULL),
(1499, 151, 'ILO', '', 1, NULL),
(1500, 151, 'EL ALGARROBAL', '', 1, NULL),
(1501, 151, 'PACOCHA', '', 1, NULL),
(1502, 152, 'CHAUPIMARCA', '', 1, NULL),
(1503, 152, 'HUACHON', '', 1, NULL),
(1504, 152, 'HUARIACA', '', 1, NULL),
(1505, 152, 'HUAYLLAY', '', 1, NULL),
(1506, 152, 'NINACACA', '', 1, NULL),
(1507, 152, 'PALLANCHACRA', '', 1, NULL),
(1508, 152, 'PAUCARTAMBO', '', 1, NULL),
(1509, 152, 'SAN FRANCISCO DE ASIS DE YARUSYACAN', '', 1, NULL),
(1510, 152, 'SIMON BOLIVAR', '', 1, NULL),
(1511, 152, 'TICLACAYAN', '', 1, NULL),
(1512, 152, 'TINYAHUARCO', '', 1, NULL),
(1513, 152, 'VICCO', '', 1, NULL),
(1514, 152, 'YANACANCHA', '', 1, NULL),
(1515, 153, 'YANAHUANCA', '', 1, NULL),
(1516, 153, 'CHACAYAN', '', 1, NULL),
(1517, 153, 'GOYLLARISQUIZGA', '', 1, NULL),
(1518, 153, 'PAUCAR', '', 1, NULL),
(1519, 153, 'SAN PEDRO DE PILLAO', '', 1, NULL),
(1520, 153, 'SANTA ANA DE TUSI', '', 1, NULL),
(1521, 153, 'TAPUC', '', 1, NULL),
(1522, 153, 'VILCABAMBA', '', 1, NULL),
(1523, 154, 'OXAPAMPA', '', 1, NULL),
(1524, 154, 'CHONTABAMBA', '', 1, NULL),
(1525, 154, 'HUANCABAMBA', '', 1, NULL),
(1526, 154, 'PALCAZU', '', 1, NULL),
(1527, 154, 'POZUZO', '', 1, NULL),
(1528, 154, 'PUERTO BERMUDEZ', '', 1, NULL),
(1529, 154, 'VILLA RICA', '', 1, NULL),
(1530, 155, 'PIURA', '', 1, NULL),
(1531, 155, 'CASTILLA', '', 1, NULL),
(1532, 155, 'CATACAOS', '', 1, NULL),
(1533, 155, 'CURA MORI', '', 1, NULL),
(1534, 155, 'EL TALLAN', '', 1, NULL),
(1535, 155, 'LA ARENA', '', 1, NULL),
(1536, 155, 'LAS LOMAS', '', 1, NULL),
(1537, 155, 'TAMBO GRANDE', '', 1, NULL),
(1538, 156, 'LA UNION', '', 1, NULL),
(1539, 157, 'AYABACA', '', 1, NULL),
(1540, 157, 'FRIAS', '', 1, NULL),
(1541, 157, 'JILILI', '', 1, NULL),
(1542, 157, 'LAGUNAS', '', 1, NULL),
(1543, 157, 'MONTERO', '', 1, NULL),
(1544, 157, 'PACAIPAMPA', '', 1, NULL),
(1545, 157, 'PAIMAS', '', 1, NULL),
(1546, 157, 'SAPILLICA', '', 1, NULL),
(1547, 157, 'SICCHEZ', '', 1, NULL),
(1548, 157, 'SUYO', '', 1, NULL),
(1549, 158, 'HUANCABAMBA', '', 1, NULL),
(1550, 158, 'CANCHAQUE', '', 1, NULL),
(1551, 158, 'EL CARMEN DE LA FRONTERA', '', 1, NULL),
(1552, 158, 'HUARMACA', '', 1, NULL),
(1553, 158, 'LALAQUIZ', '', 1, NULL),
(1554, 158, 'SAN MIGUEL DE EL FAIQUE', '', 1, NULL),
(1555, 158, 'SONDOR', '', 1, NULL),
(1556, 158, 'SONDORILLO', '', 1, NULL),
(1557, 159, 'CHULUCANAS', '', 1, NULL),
(1558, 159, 'BUENOS AIRES', '', 1, NULL),
(1559, 159, 'CHALACO', '', 1, NULL),
(1560, 159, 'LA MATANZA', '', 1, NULL),
(1561, 159, 'MORROPON', '', 1, NULL),
(1562, 159, 'SALITRAL', '', 1, NULL),
(1563, 159, 'SAN JUAN DE BIGOTE', '', 1, NULL),
(1564, 159, 'SANTA CATALINA DE MOSSA', '', 1, NULL),
(1565, 159, 'SANTO DOMINGO', '', 1, NULL),
(1566, 159, 'YAMANGO', '', 1, NULL),
(1567, 160, 'PAITA', '', 1, NULL),
(1568, 160, 'AMOTAPE', '', 1, NULL),
(1569, 160, 'ARENAL', '', 1, NULL),
(1570, 160, 'COLAN', '', 1, NULL),
(1571, 160, 'LA HUACA', '', 1, NULL),
(1572, 160, 'TAMARINDO', '', 1, NULL),
(1573, 160, 'VICHAYAL', '', 1, NULL),
(1574, 161, 'SULLANA', '', 1, NULL),
(1575, 161, 'BELLAVISTA', '', 1, NULL),
(1576, 161, 'IGNACIO ESCUDERO', '', 1, NULL),
(1577, 161, 'LANCONES', '', 1, NULL),
(1578, 161, 'MARCAVELICA', '', 1, NULL),
(1579, 161, 'MIGUEL CHECA', '', 1, NULL),
(1580, 161, 'QUERECOTILLO', '', 1, NULL),
(1581, 161, 'SALITRAL', '', 1, NULL),
(1582, 162, 'PARIÑAS', '', 1, NULL),
(1583, 162, 'EL ALTO', '', 1, NULL),
(1584, 162, 'LA BREA', '', 1, NULL),
(1585, 162, 'LOBITOS', '', 1, NULL),
(1586, 162, 'LOS ORGANOS', '', 1, NULL),
(1587, 162, 'MANCORA', '', 1, NULL),
(1588, 163, 'SECHURA', '', 1, NULL),
(1589, 163, 'BELLAVISTA DE LA UNION', '', 1, NULL),
(1590, 163, 'BERNAL', '', 1, NULL),
(1591, 163, 'CRISTO NOS VALGA', '', 1, NULL),
(1592, 163, 'VICE', '', 1, NULL),
(1593, 163, 'RINCONADA LLICUAR', '', 1, NULL),
(1594, 164, 'PUNO', '', 1, NULL),
(1595, 164, 'ACORA', '', 1, NULL),
(1596, 164, 'AMANTANI', '', 1, NULL),
(1597, 164, 'ATUNCOLLA', '', 1, NULL),
(1598, 164, 'CAPACHICA', '', 1, NULL),
(1599, 164, 'CHUCUITO', '', 1, NULL),
(1600, 164, 'COATA', '', 1, NULL),
(1601, 164, 'HUATA', '', 1, NULL),
(1602, 164, 'MAÑAZO', '', 1, NULL),
(1603, 164, 'PAUCARCOLLA', '', 1, NULL),
(1604, 164, 'PICHACANI', '', 1, NULL),
(1605, 164, 'PLATERIA', '', 1, NULL),
(1606, 164, 'SAN ANTONIO', '', 1, NULL),
(1607, 164, 'TIQUILLACA', '', 1, NULL),
(1608, 164, 'VILQUE', '', 1, NULL),
(1609, 165, 'AZANGARO', '', 1, NULL),
(1610, 165, 'ACHAYA', '', 1, NULL),
(1611, 165, 'ARAPA', '', 1, NULL),
(1612, 165, 'ASILLO', '', 1, NULL),
(1613, 165, 'CAMINACA', '', 1, NULL),
(1614, 165, 'CHUPA', '', 1, NULL),
(1615, 165, 'JOSE DOMINGO CHOQUEHUANCA', '', 1, NULL),
(1616, 165, 'MUÑANI', '', 1, NULL),
(1617, 165, 'POTONI', '', 1, NULL),
(1618, 165, 'SAMAN', '', 1, NULL),
(1619, 165, 'SAN ANTON', '', 1, NULL),
(1620, 165, 'SAN JOSE', '', 1, NULL),
(1621, 165, 'SAN JUAN DE SALINAS', '', 1, NULL),
(1622, 165, 'SANTIAGO DE PUPUJA', '', 1, NULL),
(1623, 165, 'TIRAPATA', '', 1, NULL),
(1624, 166, 'MACUSANI', '', 1, NULL),
(1625, 166, 'AJOYANI', '', 1, NULL),
(1626, 166, 'AYAPATA', '', 1, NULL),
(1627, 166, 'COASA', '', 1, NULL),
(1628, 166, 'CORANI', '', 1, NULL),
(1629, 166, 'CRUCERO', '', 1, NULL),
(1630, 166, 'ITUATA', '', 1, NULL),
(1631, 166, 'OLLACHEA', '', 1, NULL),
(1632, 166, 'SAN GABAN', '', 1, NULL),
(1633, 166, 'USICAYOS', '', 1, NULL),
(1634, 167, 'JULI', '', 1, NULL),
(1635, 167, 'DESAGUADERO', '', 1, NULL),
(1636, 167, 'HUACULLANI', '', 1, NULL),
(1637, 167, 'KELLUYO', '', 1, NULL),
(1638, 167, 'PISACOMA', '', 1, NULL),
(1639, 167, 'POMATA', '', 1, NULL),
(1640, 167, 'ZEPITA', '', 1, NULL),
(1641, 168, 'ILAVE', '', 1, NULL),
(1642, 168, 'CAPAZO', '', 1, NULL),
(1643, 168, 'PILCUYO', '', 1, NULL),
(1644, 168, 'SANTA ROSA', '', 1, NULL),
(1645, 168, 'CONDURIRI', '', 1, NULL),
(1646, 169, 'HUANCANE', '', 1, NULL),
(1647, 169, 'COJATA', '', 1, NULL),
(1648, 169, 'HUATASANI', '', 1, NULL),
(1649, 169, 'INCHUPALLA', '', 1, NULL),
(1650, 169, 'PUSI', '', 1, NULL),
(1651, 169, 'ROSASPATA', '', 1, NULL),
(1652, 169, 'TARACO', '', 1, NULL),
(1653, 169, 'VILQUE CHICO', '', 1, NULL),
(1654, 170, 'LAMPA', '', 1, NULL),
(1655, 170, 'CABANILLA', '', 1, NULL),
(1656, 170, 'CALAPUJA', '', 1, NULL),
(1657, 170, 'NICASIO', '', 1, NULL),
(1658, 170, 'OCUVIRI', '', 1, NULL),
(1659, 170, 'PALCA', '', 1, NULL),
(1660, 170, 'PARATIA', '', 1, NULL),
(1661, 170, 'PUCARA', '', 1, NULL),
(1662, 170, 'SANTA LUCIA', '', 1, NULL),
(1663, 170, 'VILAVILA', '', 1, NULL),
(1664, 171, 'AYAVIRI', '', 1, NULL),
(1665, 171, 'ANTAUTA', '', 1, NULL),
(1666, 171, 'CUPI', '', 1, NULL),
(1667, 171, 'LLALLI', '', 1, NULL),
(1668, 171, 'MACARI', '', 1, NULL),
(1669, 171, 'NUÑOA', '', 1, NULL),
(1670, 171, 'ORURILLO', '', 1, NULL),
(1671, 171, 'SANTA ROSA', '', 1, NULL),
(1672, 171, 'UMACHIRI', '', 1, NULL),
(1673, 172, 'MOHO', '', 1, NULL),
(1674, 172, 'CONIMA', '', 1, NULL),
(1675, 172, 'HUAYRAPATA', '', 1, NULL),
(1676, 172, 'TILALI', '', 1, NULL),
(1677, 173, 'PUTINA', '', 1, NULL),
(1678, 173, 'ANANEA', '', 1, NULL),
(1679, 173, 'PEDRO VILCA APAZA', '', 1, NULL),
(1680, 173, 'QUILCAPUNCU', '', 1, NULL),
(1681, 173, 'SINA', '', 1, NULL),
(1682, 174, 'JULIACA', '', 1, NULL),
(1683, 174, 'CABANA', '', 1, NULL),
(1684, 174, 'CABANILLAS', '', 1, NULL),
(1685, 174, 'CARACOTO', '', 1, NULL),
(1686, 175, 'SANDIA', '', 1, NULL),
(1687, 175, 'CUYOCUYO', '', 1, NULL),
(1688, 175, 'LIMBANI', '', 1, NULL),
(1689, 175, 'PATAMBUCO', '', 1, NULL),
(1690, 175, 'PHARA', '', 1, NULL),
(1691, 175, 'QUIACA', '', 1, NULL),
(1692, 175, 'SAN JUAN DEL ORO', '', 1, NULL),
(1693, 175, 'YANAHUAYA', '', 1, NULL),
(1694, 175, 'ALTO INAMBARI', '', 1, NULL),
(1695, 175, 'SAN PEDRO DE PUTINA PUNCO', '', 1, NULL),
(1696, 176, 'YUNGUYO', '', 1, NULL),
(1697, 176, 'ANAPIA', '', 1, NULL),
(1698, 176, 'COPANI', '', 1, NULL),
(1699, 176, 'CUTURAPI', '', 1, NULL),
(1700, 176, 'OLLARAYA', '', 1, NULL),
(1701, 176, 'TINICACHI', '', 1, NULL),
(1702, 176, 'UNICACHI', '', 1, NULL),
(1703, 177, 'MOYOBAMBA', '', 1, NULL),
(1704, 177, 'CALZADA', '', 1, NULL),
(1705, 177, 'HABANA', '', 1, NULL),
(1706, 177, 'JEPELACIO', '', 1, NULL),
(1707, 177, 'SORITOR', '', 1, NULL),
(1708, 177, 'YANTALO', '', 1, NULL),
(1709, 178, 'BELLAVISTA', '', 1, NULL),
(1710, 178, 'ALTO BIAVO', '', 1, NULL),
(1711, 178, 'BAJO BIAVO', '', 1, NULL),
(1712, 178, 'HUALLAGA', '', 1, NULL),
(1713, 178, 'SAN PABLO', '', 1, NULL),
(1714, 178, 'SAN RAFAEL', '', 1, NULL),
(1715, 179, 'SAN JOSE DE SISA', '', 1, NULL),
(1716, 179, 'AGUA BLANCA', '', 1, NULL),
(1717, 179, 'SAN MARTIN', '', 1, NULL),
(1718, 179, 'SANTA ROSA', '', 1, NULL),
(1719, 179, 'SHATOJA', '', 1, NULL),
(1720, 180, 'SAPOSOA', '', 1, NULL),
(1721, 180, 'ALTO SAPOSOA', '', 1, NULL),
(1722, 180, 'EL ESLABON', '', 1, NULL),
(1723, 180, 'PISCOYACU', '', 1, NULL),
(1724, 180, 'SACANCHE', '', 1, NULL),
(1725, 180, 'TINGO DE SAPOSOA', '', 1, NULL),
(1726, 181, 'LAMAS', '', 1, NULL),
(1727, 181, 'ALONSO DE ALVARADO', '', 1, NULL),
(1728, 181, 'BARRANQUITA', '', 1, NULL),
(1729, 181, 'CAYNARACHI', '', 1, NULL),
(1730, 181, 'CUÑUMBUQUI', '', 1, NULL),
(1731, 181, 'PINTO RECODO', '', 1, NULL),
(1732, 181, 'RUMISAPA', '', 1, NULL),
(1733, 181, 'SAN ROQUE DE CUMBAZA', '', 1, NULL),
(1734, 181, 'SHANAO', '', 1, NULL),
(1735, 181, 'TABALOSOS', '', 1, NULL),
(1736, 181, 'ZAPATERO', '', 1, NULL),
(1737, 182, 'JUANJUI', '', 1, NULL),
(1738, 182, 'CAMPANILLA', '', 1, NULL),
(1739, 182, 'HUICUNGO', '', 1, NULL),
(1740, 182, 'PACHIZA', '', 1, NULL),
(1741, 182, 'PAJARILLO', '', 1, NULL),
(1742, 183, 'PICOTA', '', 1, NULL),
(1743, 183, 'BUENOS AIRES', '', 1, NULL),
(1744, 183, 'CASPISAPA', '', 1, NULL),
(1745, 183, 'PILLUANA', '', 1, NULL),
(1746, 183, 'PUCACACA', '', 1, NULL),
(1747, 183, 'SAN CRISTOBAL', '', 1, NULL),
(1748, 183, 'SAN HILARION', '', 1, NULL),
(1749, 183, 'SHAMBOYACU', '', 1, NULL),
(1750, 183, 'TINGO DE PONASA', '', 1, NULL),
(1751, 183, 'TRES UNIDOS', '', 1, NULL),
(1752, 184, 'RIOJA', '', 1, NULL),
(1753, 184, 'AWAJUN', '', 1, NULL),
(1754, 184, 'ELIAS SOPLIN VARGAS', '', 1, NULL),
(1755, 184, 'NUEVA CAJAMARCA', '', 1, NULL),
(1756, 184, 'PARDO MIGUEL', '', 1, NULL),
(1757, 184, 'POSIC', '', 1, NULL),
(1758, 184, 'SAN FERNANDO', '', 1, NULL),
(1759, 184, 'YORONGOS', '', 1, NULL),
(1760, 184, 'YURACYACU', '', 1, NULL),
(1761, 185, 'TARAPOTO', '', 1, NULL),
(1762, 185, 'ALBERTO LEVEAU', '', 1, NULL),
(1763, 185, 'CACATACHI', '', 1, NULL),
(1764, 185, 'CHAZUTA', '', 1, NULL),
(1765, 185, 'CHIPURANA', '', 1, NULL),
(1766, 185, 'EL PORVENIR', '', 1, NULL),
(1767, 185, 'HUIMBAYOC', '', 1, NULL),
(1768, 185, 'JUAN GUERRA', '', 1, NULL),
(1769, 185, 'LA BANDA DE SHILCAYO', '', 1, NULL),
(1770, 185, 'MORALES', '', 1, NULL),
(1771, 185, 'PAPAPLAYA', '', 1, NULL),
(1772, 185, 'SAN ANTONIO', '', 1, NULL),
(1773, 185, 'SAUCE', '', 1, NULL),
(1774, 185, 'SHAPAJA', '', 1, NULL),
(1775, 186, 'TOCACHE', '', 1, NULL),
(1776, 186, 'NUEVO PROGRESO', '', 1, NULL),
(1777, 186, 'POLVORA', '', 1, NULL),
(1778, 186, 'SHUNTE', '', 1, NULL),
(1779, 186, 'UCHIZA', '', 1, NULL),
(1780, 187, 'TACNA', '', 1, NULL),
(1781, 187, 'ALTO DE LA ALIANZA', '', 1, NULL),
(1782, 187, 'CALANA', '', 1, NULL),
(1783, 187, 'CIUDAD NUEVA', '', 1, NULL),
(1784, 187, 'INCLAN', '', 1, NULL),
(1785, 187, 'PACHIA', '', 1, NULL),
(1786, 187, 'PALCA', '', 1, NULL),
(1787, 187, 'POCOLLAY', '', 1, NULL),
(1788, 187, 'SAMA', '', 1, NULL),
(1789, 187, 'CORONEL GREGORIO ALBARRACIN LANCHIPA', '', 1, NULL),
(1790, 188, 'CANDARAVE', '', 1, NULL),
(1791, 188, 'CAIRANI', '', 1, NULL),
(1792, 188, 'CAMILACA', '', 1, NULL),
(1793, 188, 'CURIBAYA', '', 1, NULL),
(1794, 188, 'HUANUARA', '', 1, NULL),
(1795, 188, 'QUILAHUANI', '', 1, NULL),
(1796, 189, 'LOCUMBA', '', 1, NULL),
(1797, 189, 'ILABAYA', '', 1, NULL),
(1798, 189, 'ITE', '', 1, NULL),
(1799, 190, 'TARATA', '', 1, NULL),
(1800, 190, 'HEROES ALBARRACIN', '', 1, NULL),
(1801, 190, 'ESTIQUE', '', 1, NULL),
(1802, 190, 'ESTIQUE-PAMPA', '', 1, NULL),
(1803, 190, 'SITAJARA', '', 1, NULL),
(1804, 190, 'SUSAPAYA', '', 1, NULL),
(1805, 190, 'TARUCACHI', '', 1, NULL),
(1806, 190, 'TICACO', '', 1, NULL),
(1807, 191, 'TUMBES', '', 1, NULL),
(1808, 191, 'CORRALES', '', 1, NULL),
(1809, 191, 'LA CRUZ', '', 1, NULL),
(1810, 191, 'PAMPAS DE HOSPITAL', '', 1, NULL),
(1811, 191, 'SAN JACINTO', '', 1, NULL),
(1812, 191, 'SAN JUAN DE LA VIRGEN', '', 1, NULL),
(1813, 192, 'ZORRITOS', '', 1, NULL),
(1814, 192, 'CASITAS', '', 1, NULL),
(1815, 192, 'CANOAS DE PUNTA SAL', '', 1, NULL),
(1816, 193, 'ZARUMILLA', '', 1, NULL),
(1817, 193, 'AGUAS VERDES', '', 1, NULL),
(1818, 193, 'MATAPALO', '', 1, NULL),
(1819, 193, 'PAPAYAL', '', 1, NULL),
(1820, 194, 'CALLERIA', '', 1, NULL),
(1821, 194, 'CAMPOVERDE', '', 1, NULL),
(1822, 194, 'IPARIA', '', 1, NULL),
(1823, 194, 'MASISEA', '', 1, NULL),
(1824, 194, 'YARINACOCHA', '', 1, NULL),
(1825, 194, 'NUEVA REQUENA', '', 1, NULL),
(1826, 195, 'RAYMONDI', '', 1, NULL),
(1827, 195, 'SEPAHUA', '', 1, NULL),
(1828, 195, 'TAHUANIA', '', 1, NULL),
(1829, 195, 'YURUA', '', 1, NULL),
(1830, 196, 'PADRE ABAD', '', 1, NULL),
(1831, 196, 'IRAZOLA', '', 1, NULL),
(1832, 196, 'CURIMANA', '', 1, NULL),
(1833, 197, 'PURUS', '', 1, NULL);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `dni`
--

CREATE TABLE `dni` (
  `id` int(11) NOT NULL,
  `dni` int(9) DEFAULT NULL,
  `nombres` varchar(250) DEFAULT NULL,
  `nombre_a` varchar(40) DEFAULT NULL,
  `nombre_b` varchar(40) DEFAULT NULL,
  `nombre_c` varchar(40) DEFAULT NULL,
  `apellido_paterno` varchar(40) DEFAULT NULL,
  `apellido_materno` varchar(40) DEFAULT NULL,
  `digito` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `dni`
--

INSERT INTO `dni` (`id`, `dni`, `nombres`, `nombre_a`, `nombre_b`, `nombre_c`, `apellido_paterno`, `apellido_materno`, `digito`) VALUES
(1, 77660138, 'JUAN CARLOS', 'JUAN', 'CARLOS', NULL, 'ALANIA', 'BRAVO', 1),
(2, 77660136, 'CARLOS', 'CARLOS', '', NULL, 'ALVAREZ', 'LOZADA', 1),
(3, 77660188, 'ELVIS ALEXIS', 'ELVIS', 'ALEXIS', NULL, 'CHAVARRY', 'LALANGUI', 1),
(4, 77660199, 'OSCAR IVAN', 'OSCAR', 'IVAN', NULL, 'ZAMORA', 'FEIJOO', 1),
(5, 77660197, 'DANNY ELIZABETH', 'DANNY', 'ELIZABETH', NULL, 'BALLENA', 'NIQUIN', 1),
(6, 77660190, 'ANDY YOSEP', 'ANDY', 'YOSEP', NULL, 'SERNAQUE', 'IMAN', 1),
(7, 9732540, 'TERESA', 'TERESA', '', NULL, 'CRUZ', 'LARICO DE PIZARRO', 1),
(8, 42377296, 'GIANCARLO ALEXANDER', 'GIANCARLO', 'ALEXANDER', NULL, 'AGUILAR', 'ROSSI', 1),
(9, 76804067, 'KEWIN RAAY', 'KEWIN', 'RAAY', NULL, 'CONDORI', 'QUILLA', 1),
(10, 4412417, 'MARTIN ALBERTO', 'MARTIN', 'ALBERTO', NULL, 'VIZCARRA', 'CORNEJO', 1),
(11, 77660139, 'JOSE LUIS', 'JOSE', 'LUIS', NULL, 'LOPEZ', 'ESTELA', 5);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `documentos`
--

CREATE TABLE `documentos` (
  `id` int(11) NOT NULL,
  `nombre` varchar(255) NOT NULL,
  `web` int(11) DEFAULT 0,
  `por_defecto_web` int(11) NOT NULL DEFAULT 0,
  `por_defecto` int(11) NOT NULL DEFAULT 0,
  `campo_requerido` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `documentos`
--

INSERT INTO `documentos` (`id`, `nombre`, `web`, `por_defecto_web`, `por_defecto`, `campo_requerido`) VALUES
(1, 'NOTA', 0, 0, 0, NULL),
(2, 'GUIA', 0, 0, 0, NULL),
(3, 'BOLETA', 1, 1, 0, 'dni'),
(4, 'FACTURA', 1, 0, 0, 'ruc'),
(5, 'LOTE', 0, 0, 0, NULL);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `estado_venta`
--

CREATE TABLE `estado_venta` (
  `id` int(11) NOT NULL,
  `nombre` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `estado_venta`
--

INSERT INTO `estado_venta` (`id`, `nombre`) VALUES
(2, 'Cancelado'),
(3, 'Entregado al cliente'),
(4, 'Reservado'),
(5, 'Pendiente'),
(6, 'Recibido'),
(7, 'Listo');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `gastos`
--

CREATE TABLE `gastos` (
  `id` int(11) NOT NULL,
  `id_caja` int(11) DEFAULT NULL,
  `texto` text DEFAULT NULL,
  `monto` varchar(200) DEFAULT NULL,
  `vendedor` int(11) DEFAULT NULL,
  `sucursal` int(11) DEFAULT NULL,
  `fecha` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `header_page`
--

CREATE TABLE `header_page` (
  `id` int(11) NOT NULL,
  `activo` int(11) DEFAULT NULL,
  `vercion` varchar(20) DEFAULT NULL,
  `nombre` text DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `header_page`
--

INSERT INTO `header_page` (`id`, `activo`, `vercion`, `nombre`) VALUES
(1, 0, '0.1', 'header_base'),
(2, 0, '0.1', 'header_duc'),
(3, 1, '0.1', 'header_gog');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `imagen_carta`
--

CREATE TABLE `imagen_carta` (
  `id` int(11) NOT NULL,
  `id_carta` int(11) DEFAULT NULL,
  `imagen` varchar(255) DEFAULT NULL,
  `estado` int(11) DEFAULT 1,
  `fecha` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `imagen_item`
--

CREATE TABLE `imagen_item` (
  `id` int(11) NOT NULL,
  `id_item` int(11) DEFAULT NULL,
  `imagen` varchar(255) DEFAULT NULL,
  `estado` int(11) NOT NULL DEFAULT 1,
  `fecha` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `items`
--

CREATE TABLE `items` (
  `id` int(11) NOT NULL,
  `nombre` varchar(255) DEFAULT NULL,
  `nombre_corto` varchar(250) DEFAULT NULL,
  `codigo` varchar(20) DEFAULT NULL,
  `barcode` varchar(50) DEFAULT NULL,
  `posicion` int(11) DEFAULT NULL,
  `estado` tinyint(4) DEFAULT 1,
  `sucursal` int(11) DEFAULT NULL,
  `usuario` int(11) DEFAULT NULL,
  `descripcion` text DEFAULT NULL,
  `carta` int(11) DEFAULT NULL,
  `categoria` int(11) DEFAULT NULL,
  `subcategoria` int(11) DEFAULT NULL,
  `marca` int(11) DEFAULT NULL,
  `precio_compra` varchar(255) DEFAULT NULL,
  `moneda_a` int(11) DEFAULT NULL,
  `precio` varchar(30) DEFAULT NULL,
  `moneda_b` int(11) DEFAULT NULL,
  `precio_final` varchar(250) DEFAULT NULL,
  `ukr` text DEFAULT NULL,
  `tipo` int(11) DEFAULT NULL,
  `publicar_web` int(11) DEFAULT NULL,
  `en_carrito` tinyint(4) NOT NULL DEFAULT 0,
  `fecha` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `lang`
--

CREATE TABLE `lang` (
  `id` int(11) NOT NULL,
  `lang_key` varchar(200) NOT NULL,
  `type` varchar(100) NOT NULL,
  `spanish` text DEFAULT NULL,
  `ingles` text DEFAULT NULL,
  `frances` text DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `lang`
--

INSERT INTO `lang` (`id`, `lang_key`, `type`, `spanish`, `ingles`, `frances`) VALUES
(1, 'tablero', '', 'Tablero', 'Dashboard', 'Planche'),
(2, 'idiomas', '', 'Idiomas', 'Languages', 'Langues'),
(3, 'agregar_nuevas_palabras', '', 'Agregar nuevas palabras', 'Add new words', 'Ajouter de nouveaux mots'),
(4, 'administrar_idiomas', '', 'Administrar idiomas', 'Manage Languages', 'Gérer les langues'),
(5, 'configurar', '', 'Configurar', 'Set up', 'Mettre en place'),
(6, 'nuevo_idioma', '', 'Nuevo idioma', 'New language', 'Nouveau langage'),
(11, 'agregar_palabras_en_todos_los_idiomas_existentes', '', 'Agregar palabras en todos los idiomas existentes.', 'add words in all existing languages.', 'Ajoutez des mots dans toutes les langues existantes.'),
(12, 'espanol', '', 'Español', 'Spanish', 'Espanol'),
(13, 'agregar_palabra', '', 'Agregar palabra', 'Add word', 'Ajouter un mot'),
(14, 'agregar_nuevo_idioma', '', 'Agregar nuevo idioma.', 'Add new language.', ' Ajouter une nouvelle langue.'),
(15, 'nota', '', 'Nota:', 'Note:', 'Noter:'),
(16, 'esto_puede_tardar_hasta_5_minutos', '', 'esto puede tardar hasta 5 minutos.', 'this may take up to 5 minutes.', 'cela peut prendre jusqu\'à 5 minutes.'),
(17, 'nombre_del_idioma', '', 'Nombre del idioma', 'Language name\r\n', 'Nom de la langue'),
(18, 'agregar_idioma', '', 'Agregar idioma', 'Add language', 'Ajouter une langue'),
(20, 'tienda', '', 'Tienda', 'Shop', 'Boutique'),
(21, 'ver_pagina', '', 'Ver pagina', 'View page', 'Voir la page'),
(22, 'ventas', '', 'Ventas', 'Sales', 'Ventes'),
(23, 'sucursales', '', 'Sucursales', 'Branch offices', 'Succursales'),
(24, 'proveedores', '', 'Proveedores', 'Vendors', 'Vendeurs'),
(25, 'categorias', '', 'Categorías', 'Categories', 'Catégories'),
(26, 'marcas', '', 'Marcas', 'Trademarks', 'Marques'),
(27, 'productos', '', 'Productos', 'Products', 'Produits'),
(28, 'lotes', '', 'Lotes', 'Lots', 'Beaucoup'),
(29, 'usuarios', '', 'Usuarios', 'Users', 'Utilisateurs'),
(30, 'clientes', '', 'Clientes', 'Customers', 'Les clients'),
(31, 'gastos', '', 'Gastos', 'Expenses', 'Dépenses'),
(32, 'devoluciones', '', 'Devoluciones', 'Returns', 'Retour'),
(33, 'cerrar_session', '', 'Cerrar session', 'Close session', 'Fermer la session'),
(34, 'inicio', '', 'Inicio', 'Home', 'Home'),
(35, 'vender', '', 'Vender', 'Sell', 'Vendre'),
(36, 'entregar_venta', '', 'ENTREGAR VENTA.', 'DELIVER SALE.', 'LIVRER LA VENTE.'),
(37, 'venta', '', 'Venta', 'Sale', 'Vendre'),
(38, 'temas', '', 'Temas', 'Themes', 'Thèmes'),
(39, 'colores', '', 'Colores', 'Colors', 'Couleurs'),
(40, 'metodos_de_pago', '', 'Metodos de pago', 'Payment methods', 'Moyen de paiement'),
(41, 'recibidos', '', 'RECIBIDOS', 'RECEIVED', 'A REÇU'),
(42, 'pendientes', '', 'pendientes', 'slopes', 'pentes'),
(43, 'reservados', '', 'reservados', 'reserved', 'réservation'),
(44, 'entregado_al_cliente', '', 'Entregado al cliente', 'Delivered to the customer', 'Livré au client'),
(45, 'orden_cancelada', '', 'orden cancelada', 'Order canceled', 'Commande annulée'),
(46, 'entregar_orden', '', 'Entregar orden', 'Deliver order', 'Livrer la commande'),
(47, 'listo_para_entregar', '', 'Listo para entregar', 'Listo para entregar', 'Listo para entregar'),
(48, 'ventas_recibidos_por_el_vendedor', '', 'Ventas recibidos por el vendedor', 'Ventas recibidos por el vendedor', 'Ventas recibidos por el vendedor'),
(49, 'ventas_recibidos', '', 'Ventas recibidos', 'Ventas recibidos', 'Ventas recibidos'),
(50, 'ventas_listos', '', 'Ventas listos', 'Ventas listos', 'Ventas listos'),
(51, 'ventas_listos_para_entregar_al_cliente', '', 'Ventas listos para entregar al cliente', 'Ventas listos para entregar al cliente', 'Ventas listos para entregar al cliente'),
(52, 'preparar_compra', '', 'Preparar compra', 'Prepare purchase', 'Préparer l\'achat'),
(53, 'cliente', '', 'Cliente', 'Customer', 'Client'),
(54, 'documento', '', 'Documento', 'Document', 'Document'),
(55, 'preparar_venta', '', 'Preparar venta', 'Prepare sale', 'Préparer la vente'),
(56, 'entregar_compras_en_linea', '', 'Entregar compras en linea', 'Deliver online purchases', 'Livrer les achats en ligne'),
(57, 'buscar_la_venta_por_nombre_dni_o_codigo_de_venta', '', 'Buscar la venta por nombre DNI o código de venta', 'Search the sale by DNI name or sales code', 'Rechercher la vente par nom DNI ou code de vente'),
(58, 'bienvenido', '', 'Bienvenido', 'Welcome', 'Bienvenue'),
(59, 'iniciar', '', 'Iniciar', 'Start', 'Démarrer'),
(60, 'todos_los_datos_estan_protegidos_los_datos_seran_verificados_en_tiempo_real_verificacion_de_identidad', '', 'Todos los datos estan protegidos. Los datos seran verificados en tiempo real. verificacion de identidad.', 'All data is protected. The data will be verified in real time. identity verification.', 'Toutes les données sont protégées. Les données seront vérifiées en temps réel. vérification d\'identité.'),
(61, 'los_datos_falsos_seran_verificados_y_reportados', '', 'Los datos falsos seran verificados y reportados.', 'False data will be verified and reported.', 'Les fausses données seront vérifiées et signalées.'),
(62, 'seleccione_un_modelo_y_completa_los_datos', '', 'Seleccione un modelo y completa los datos.', 'Select a model and fill in the data.', 'Sélectionnez un modèle et remplissez les données.'),
(63, 'restaurante', '', 'Restaurante', 'Restaurant', 'Restaurant'),
(64, 'tienda_de_computadoras', '', 'Tienda de computadoras', 'Computer shop', 'Magasin d\'informatique'),
(65, 'tienda_de_ropa', '', 'Tienda de ropa', 'Clothing store', 'Magasin de vêtements'),
(66, 'red_social', '', 'Red social', 'Social network', 'Réseau social'),
(67, 'contactese_con_soporte', '', 'Contactese con soporte.', 'Contact support.', 'Contactez le support.'),
(68, 'error', '', 'Error', 'Error', 'Erreur'),
(69, 'servidor', '', 'SERVIDOR', 'SERVER', 'SERVEUR'),
(70, 'instalar', '', 'Instalar', 'Install', 'Installer'),
(71, 'nombre_de_pagina', '', 'Nombre de pagina', 'Page name.', 'Nom de la page.'),
(72, 'titulo_pagina', '', 'Título página', 'page title', 'titre de la page'),
(73, 'descripcion_pagina', '', 'Descripcion de pagina', 'Page description', 'Description de la page'),
(74, 'eslogan', '', 'Eslogan', 'slogan', 'slogan'),
(75, 'siguiente', '', 'Siguiente', 'Next', 'Suivant'),
(76, 'se_movio_a_la_lista_de_recibidos', '', 'Se movio a la lista de recibidos', 'It was moved to the list of received', 'Il a été déplacé dans la liste des reçus'),
(77, 'ya_existe_el_nombre', '', 'Ya existe el nombre', 'Name already exists', 'le nom existe déjà'),
(78, 'agregado_con_exito', '', 'Agregado con exito', 'Successfully added', 'Ajouté avec succès'),
(79, 'el_campo_esta_vacio', '', 'El campo esta vacio', 'The field is empty', 'Le champ est vide'),
(80, 'un_error_en_los_datos', '', 'Un error en los datos', 'An error in the data', 'Une erreur dans les données'),
(81, 'error_de_datos', '', 'Error de datos', 'Data error', 'Erreur de donnée'),
(82, 'ingresa_el_nombre', '', 'Ingresa el nombre', 'Enter the name', 'Entrez le nom'),
(83, 'ingresa_un_precio', '', 'Ingresa un precio', 'Enter a price', 'Ingres un prix'),
(84, 'un_error_en_los_datos', '', 'Un error en los datos', 'An error in the data', 'Une erreur dans les données'),
(85, 'error_de_datos', '', 'Error de datos', 'Data error', 'Erreur de données'),
(86, 'registrar', '', 'Registrar', 'Register', 'Enregistrer'),
(87, 'escriba_su_dni', '', 'Escriba su DNI', 'Write your ID', 'Écrivez votre identifiant'),
(88, 'escriba_su_nombre', '', 'Escriba su nombre', 'Write your name', 'Écrivez votre nom'),
(89, 'escriba_su_apellido_paterno', '', 'Escriba su apellido paterno', 'Write your father\'s last name', 'Écrivez le nom de famille de votre père'),
(90, 'escriba_su_apellido_materno', '', 'Escriba su apellido materno', 'Write your mother\'s last name', 'Écris le nom de famille de ta mère'),
(91, 'escriba_su_correo_electronico', '', 'Escriba su correo electronico', 'Write your email', 'Écrivez votre e-mail'),
(92, 'escriba_la_contrasena_de_su_cuenta', '', 'Escriba la contrase&ntilde;a de su cuenta', 'Enter your account password', 'Saisissez le mot de passe de votre compte'),
(93, 'confirma_la_contrasena', '', 'Confirma la contrase&ntilde;a', 'Confirm the password', 'Confirmez le mot de passe'),
(94, 'acceder', '', 'Acceder', 'log in', 'Accéder'),
(95, 'genial', '', 'great', 'brillant', NULL),
(96, 'la_contrasena_no_son_iguales', '', 'La contrase&ntilde;a no son iguales.', 'The password are not the same.', 'Le mot de passe n\'est pas le même.'),
(97, 'el_correo_no_es_valido', '', 'El correo no es valido', 'The email is not valid', 'L\'e-mail n\'est pas valide'),
(98, 'crear_sucursal_de_tienda', '', 'Crear sucursal de tienda', 'Create store branch', 'Créer une succursale de magasin'),
(99, 'restaurante', '', 'Restaurante', 'Restaurant', 'Restaurant'),
(100, 'tienda_de_computadoras', '', 'Tienda de computadoras', 'Computer shop', 'Magasin d\'informatique'),
(101, 'caja', '', 'Caja', 'Cash register', 'Caisse'),
(102, 'web', '', 'Web', 'Web', 'La toile'),
(103, 'administrar', '', 'Administrar', 'Manage', 'Faire en sorte'),
(104, 'seleccionado', '', 'Seleccionado', 'Selected', 'Choisi'),
(105, 'seleccionar', '', 'Seleccionar', 'To select', 'Pour sélectionner');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `marcas`
--

CREATE TABLE `marcas` (
  `id` int(11) NOT NULL,
  `nombre` varchar(250) DEFAULT NULL,
  `codigo` varchar(200) DEFAULT NULL,
  `posicion` int(11) DEFAULT NULL,
  `publicado` int(11) DEFAULT 1,
  `fecha` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `menu`
--

CREATE TABLE `menu` (
  `id` int(11) NOT NULL,
  `label_menu` varchar(255) DEFAULT NULL,
  `titulo` varchar(255) DEFAULT NULL,
  `nombre` varchar(250) DEFAULT NULL,
  `nombre_ses` varchar(255) DEFAULT NULL,
  `id_pagina_n` int(11) DEFAULT NULL,
  `subs` tinyint(1) DEFAULT 0,
  `posicion` int(11) DEFAULT NULL,
  `por_defecto` int(11) DEFAULT 0,
  `activado` int(11) DEFAULT 0,
  `url` varchar(255) DEFAULT NULL,
  `ukr` text DEFAULT NULL,
  `home` tinyint(1) DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `menu`
--

INSERT INTO `menu` (`id`, `label_menu`, `titulo`, `nombre`, `nombre_ses`, `id_pagina_n`, `subs`, `posicion`, `por_defecto`, `activado`, `url`, `ukr`, `home`) VALUES
(5, 'EQUIPOS DIGITALES', 'INICIO', NULL, NULL, NULL, 0, 4, 1, 1, NULL, 'inicio', 1),
(27, 'MI CUENTA', 'MI CUENTA', 'acceder', NULL, NULL, 0, 6, 1, 1, NULL, 'acceder', 0),
(28, 'SUCURSALES', 'SUCURSALES', 'sucursales', NULL, NULL, 0, 7, 1, 1, NULL, 'sucursales', 0);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `moneda`
--

CREATE TABLE `moneda` (
  `id` int(11) NOT NULL,
  `nombre` varchar(200) DEFAULT NULL,
  `moneda` varchar(20) DEFAULT NULL,
  `simbolo` varchar(20) DEFAULT NULL,
  `estado` int(11) DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `moneda`
--

INSERT INTO `moneda` (`id`, `nombre`, `moneda`, `simbolo`, `estado`) VALUES
(1, 'Dólar estadounidense', 'USD', '$', 1),
(2, 'Sol peruano ', 'PEN', 'S/', 1);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `monto_caja`
--

CREATE TABLE `monto_caja` (
  `id` int(11) NOT NULL,
  `moneda` varchar(200) NOT NULL,
  `monto_inicial` varchar(250) DEFAULT '0',
  `monto` varchar(250) NOT NULL DEFAULT '0',
  `caja` int(11) NOT NULL,
  `fecha` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `opciones_items`
--

CREATE TABLE `opciones_items` (
  `id` int(11) NOT NULL,
  `nombre` text DEFAULT NULL,
  `ukr` text DEFAULT NULL,
  `precio` varchar(20) DEFAULT NULL,
  `id_opciones_type` int(11) DEFAULT NULL,
  `principal` tinyint(4) NOT NULL DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `opciones_type`
--

CREATE TABLE `opciones_type` (
  `id` int(11) NOT NULL,
  `nombre` text NOT NULL,
  `id_items` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `pagina`
--

CREATE TABLE `pagina` (
  `id` int(11) NOT NULL,
  `nombre` varchar(250) DEFAULT NULL,
  `posicion` int(11) DEFAULT NULL,
  `logo_img` varchar(250) DEFAULT NULL,
  `color_fondo` varchar(30) DEFAULT NULL,
  `color_fondo_menu` varchar(50) DEFAULT NULL,
  `color` varchar(200) DEFAULT NULL,
  `color_b` varchar(20) DEFAULT NULL,
  `clase` varchar(200) DEFAULT NULL,
  `color_titulo_footer` varchar(255) DEFAULT NULL,
  `color_footer` varchar(255) DEFAULT NULL,
  `color_fondo_footer` varchar(255) DEFAULT NULL,
  `activado` int(11) DEFAULT 0,
  `ac_logo` int(11) DEFAULT 1,
  `id_tema` int(11) DEFAULT NULL,
  `color_primario` varchar(50) DEFAULT NULL,
  `color_segundario` varchar(255) DEFAULT NULL,
  `font_family_style` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `pagina`
--

INSERT INTO `pagina` (`id`, `nombre`, `posicion`, `logo_img`, `color_fondo`, `color_fondo_menu`, `color`, `color_b`, `clase`, `color_titulo_footer`, `color_footer`, `color_fondo_footer`, `activado`, `ac_logo`, `id_tema`, `color_primario`, `color_segundario`, `font_family_style`) VALUES
(1, 'header', 1, NULL, '', NULL, '#fff', '#34495e', 'pagina_header', '', '', '', 1, 1, NULL, NULL, NULL, 'Helvetica, Arial, sans-serif'),
(2, 'menu', 3, NULL, '', '', '', NULL, 'pagina_menu', NULL, NULL, NULL, 1, 1, NULL, NULL, NULL, NULL),
(3, 'slide', 2, NULL, NULL, NULL, NULL, NULL, 'pagina_slide', NULL, NULL, NULL, 1, 1, NULL, NULL, NULL, NULL);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `personas`
--

CREATE TABLE `personas` (
  `id` int(11) NOT NULL,
  `correo` varchar(255) DEFAULT NULL,
  `pass` varchar(255) DEFAULT NULL,
  `nombre` varchar(255) DEFAULT NULL,
  `apellido_paterno` varchar(255) DEFAULT NULL,
  `apellido_materno` varchar(255) DEFAULT NULL,
  `celular` varchar(255) DEFAULT NULL,
  `direccion` text DEFAULT NULL,
  `estado` tinyint(4) DEFAULT NULL,
  `sucursal` int(11) DEFAULT NULL,
  `sucursal_compra` varchar(20) DEFAULT NULL,
  `dni` varchar(10) DEFAULT NULL,
  `ruc` varchar(30) DEFAULT NULL,
  `foto` varchar(255) DEFAULT NULL,
  `tipo` int(11) DEFAULT NULL,
  `fecha_nacimiento` date DEFAULT NULL,
  `ukr` text DEFAULT NULL,
  `vendedor` int(11) DEFAULT NULL,
  `codigo` varchar(100) DEFAULT NULL,
  `direecion_envio` int(11) DEFAULT NULL,
  `fecha` datetime DEFAULT NULL,
  `idioma` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `proveedores`
--

CREATE TABLE `proveedores` (
  `id` int(11) NOT NULL,
  `nombre` varchar(255) DEFAULT NULL,
  `celular` varchar(15) DEFAULT NULL,
  `direccion` text DEFAULT NULL,
  `ruc` varchar(20) DEFAULT NULL,
  `ukr` text DEFAULT NULL,
  `fecha` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `provincias`
--

CREATE TABLE `provincias` (
  `id` int(11) NOT NULL,
  `nombre` varchar(250) DEFAULT NULL,
  `id_departamento` int(11) DEFAULT NULL,
  `nombre_corto` varchar(200) DEFAULT NULL,
  `esta_activado` tinyint(1) NOT NULL DEFAULT 0,
  `fecha` datetime DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `provincias`
--

INSERT INTO `provincias` (`id`, `nombre`, `id_departamento`, `nombre_corto`, `esta_activado`, `fecha`) VALUES
(1, 'CHACHAPOYAS', 1, '', 1, NULL),
(2, 'BAGUA', 1, '', 1, NULL),
(3, 'BONGARA', 1, '', 1, NULL),
(4, 'CONDORCANQUI', 1, '', 1, NULL),
(5, 'LUYA', 1, '', 1, NULL),
(6, 'RODRIGUEZ DE MENDOZA', 1, '', 1, NULL),
(7, 'UTCUBAMBA', 1, '', 1, NULL),
(8, 'HUARAZ', 2, '', 1, NULL),
(9, 'AIJA', 2, '', 1, NULL),
(10, 'ANTONIO RAYMONDI', 2, '', 1, NULL),
(11, 'ASUNCION', 2, '', 1, NULL),
(12, 'BOLOGNESI', 2, '', 1, NULL),
(13, 'CARHUAZ', 2, '', 1, NULL),
(14, 'CARLOS FERMIN FITZCARRALD', 2, '', 1, NULL),
(15, 'CASMA', 2, '', 1, NULL),
(16, 'CORONGO', 2, '', 1, NULL),
(17, 'HUARI', 2, '', 1, NULL),
(18, 'HUARMEY', 2, '', 1, NULL),
(19, 'HUAYLAS', 2, '', 1, NULL),
(20, 'MARISCAL LUZURIAGA', 2, '', 1, NULL),
(21, 'OCROS', 2, '', 1, NULL),
(22, 'PALLASCA', 2, '', 1, NULL),
(23, 'POMABAMBA', 2, '', 1, NULL),
(24, 'RECUAY', 2, '', 1, NULL),
(25, 'SANTA', 2, '', 1, NULL),
(26, 'SIHUAS', 2, '', 1, NULL),
(27, 'YUNGAY', 2, '', 1, NULL),
(28, 'ABANCAY', 3, '', 1, NULL),
(29, 'ANDAHUAYLAS', 3, '', 1, NULL),
(30, 'ANTABAMBA', 3, '', 1, NULL),
(31, 'AYMARAES', 3, '', 1, NULL),
(32, 'COTABAMBAS', 3, '', 1, NULL),
(33, 'CHINCHEROS', 3, '', 1, NULL),
(34, 'GRAU', 3, '', 1, NULL),
(35, 'AREQUIPA', 4, '', 1, NULL),
(36, 'CAMANA', 4, '', 1, NULL),
(37, 'CARAVELI', 4, '', 1, NULL),
(38, 'CASTILLA', 4, '', 1, NULL),
(39, 'CAYLLOMA', 4, '', 1, NULL),
(40, 'CONDESUYOS', 4, '', 1, NULL),
(41, 'ISLAY', 4, '', 1, NULL),
(42, 'LA UNION', 4, '', 1, NULL),
(43, 'HUAMANGA', 5, '', 1, NULL),
(44, 'CANGALLO', 5, '', 1, NULL),
(45, 'HUANCA SANCOS', 5, '', 1, NULL),
(46, 'HUANTA', 5, '', 1, NULL),
(47, 'LA MAR', 5, '', 1, NULL),
(48, 'LUCANAS', 5, '', 1, NULL),
(49, 'PARINACOCHAS', 5, '', 1, NULL),
(50, 'PAUCAR DEL SARA SARA', 5, '', 1, NULL),
(51, 'SUCRE', 5, '', 1, NULL),
(52, 'VICTOR FAJARDO', 5, '', 1, NULL),
(53, 'VICTOR FAFARDO', 5, '', 1, NULL),
(54, 'VILCAS HUAMAN', 5, '', 1, NULL),
(55, 'CAJAMARCA', 6, '', 1, NULL),
(56, 'CAJABAMBA', 6, '', 1, NULL),
(57, 'CELENDIN', 6, '', 1, NULL),
(58, 'CHOTA', 6, '', 1, NULL),
(59, 'CONTUMAZA', 6, '', 1, NULL),
(60, 'CUTERVO', 6, '', 1, NULL),
(61, 'HUALGAYOC', 6, '', 1, NULL),
(62, 'JAEN', 6, '', 1, NULL),
(63, 'SAN IGNACIO', 6, '', 1, NULL),
(64, 'SAN MARCOS', 6, '', 1, NULL),
(65, 'SAN MIGUEL', 6, '', 1, NULL),
(66, 'SAN PABLO', 6, '', 1, NULL),
(67, 'SANTA CRUZ', 6, '', 1, NULL),
(68, 'CALLAO', 7, '', 1, NULL),
(69, 'CUSCO', 8, '', 1, NULL),
(70, 'ACOMAYO', 8, '', 1, NULL),
(71, 'ANTA', 8, '', 1, NULL),
(72, 'CALCA', 8, '', 1, NULL),
(73, 'CANAS', 8, '', 1, NULL),
(74, 'CANCHIS', 8, '', 1, NULL),
(75, 'CHUMBIVILCAS', 8, '', 1, NULL),
(76, 'ESPINAR', 8, '', 1, NULL),
(77, 'LA CONVENCION', 8, '', 1, NULL),
(78, 'PARURO', 8, '', 1, NULL),
(79, 'PAUCARTAMBO', 8, '', 1, NULL),
(80, 'QUISPICANCHI', 8, '', 1, NULL),
(81, 'URUBAMBA', 8, '', 1, NULL),
(82, 'HUANCAVELICA', 9, '', 1, NULL),
(83, 'ACOBAMBA', 9, '', 1, NULL),
(84, 'ANGARAES', 9, '', 1, NULL),
(85, 'CASTROVIRREYNA', 9, '', 1, NULL),
(86, 'CHURCAMPA', 9, '', 1, NULL),
(87, 'HUAYTARA', 9, '', 1, NULL),
(88, 'TAYACAJA', 9, '', 1, NULL),
(89, 'HUANUCO', 10, '', 1, NULL),
(90, 'AMBO', 10, '', 1, NULL),
(91, 'DOS DE MAYO', 10, '', 1, NULL),
(92, 'HUACAYBAMBA', 10, '', 1, NULL),
(93, 'HUAMALIES', 10, '', 1, NULL),
(94, 'LEONCIO PRADO', 10, '', 1, NULL),
(95, 'MARAÑON', 10, '', 1, NULL),
(96, 'PACHITEA', 10, '', 1, NULL),
(97, 'PUERTO INCA', 10, '', 1, NULL),
(98, 'LAURICOCHA', 10, '', 1, NULL),
(99, 'YAROWILCA', 10, '', 1, NULL),
(100, 'ICA', 11, '', 1, NULL),
(101, 'CHINCHA', 11, '', 1, NULL),
(102, 'NAZCA', 11, '', 1, NULL),
(103, 'PALPA', 11, '', 1, NULL),
(104, 'PISCO', 11, '', 1, NULL),
(105, 'HUANCAYO', 12, '', 1, NULL),
(106, 'CONCEPCION', 12, '', 1, NULL),
(107, 'CHANCHAMAYO', 12, '', 1, NULL),
(108, 'JAUJA', 12, '', 1, NULL),
(109, 'JUNIN', 12, '', 1, NULL),
(110, 'SATIPO', 12, '', 1, NULL),
(111, 'TARMA', 12, '', 1, NULL),
(112, 'YAULI', 12, '', 1, NULL),
(113, 'CHUPACA', 12, '', 1, NULL),
(114, 'TRUJILLO', 13, '', 1, NULL),
(115, 'ASCOPE', 13, '', 1, NULL),
(116, 'BOLIVAR', 13, '', 1, NULL),
(117, 'CHEPEN', 13, '', 1, NULL),
(118, 'JULCAN', 13, '', 1, NULL),
(119, 'OTUZCO', 13, '', 1, NULL),
(120, 'PACASMAYO', 13, '', 1, NULL),
(121, 'PATAZ', 13, '', 1, NULL),
(122, 'SANCHEZ CARRION', 13, '', 1, NULL),
(123, 'SANTIAGO DE CHUCO', 13, '', 1, NULL),
(124, 'GRAN CHIMU', 13, '', 1, NULL),
(125, 'VIRU', 13, '', 1, NULL),
(126, 'CHICLAYO', 14, '', 1, NULL),
(127, 'FERREÑAFE', 14, '', 1, NULL),
(128, 'LAMBAYEQUE', 14, '', 1, NULL),
(129, 'LIMA', 15, '', 1, NULL),
(130, 'BARRANCA', 15, '', 1, NULL),
(131, 'CAJATAMBO', 15, '', 1, NULL),
(132, 'CANTA', 15, '', 1, NULL),
(133, 'CAÑETE', 15, '', 1, NULL),
(134, 'HUARAL', 15, '', 1, NULL),
(135, 'HUAROCHIRI', 15, '', 1, NULL),
(136, 'HUAURA', 15, '', 1, NULL),
(137, 'OYON', 15, '', 1, NULL),
(138, 'YAUYOS', 15, '', 1, NULL),
(139, 'MAYNAS', 16, '', 1, NULL),
(140, 'ALTO AMAZONAS', 16, '', 1, NULL),
(141, 'LORETO', 16, '', 1, NULL),
(142, 'MARISCAL RAMON CASTILLA', 16, '', 1, NULL),
(143, 'REQUENA', 16, '', 1, NULL),
(144, 'UCAYALI', 16, '', 1, NULL),
(145, 'DATEM DEL MARAÑON', 16, '', 1, NULL),
(146, 'TAMBOPATA', 17, '', 1, NULL),
(147, 'MANU', 17, '', 1, NULL),
(148, 'TAHUAMANU', 17, '', 1, NULL),
(149, 'MARISCAL NIETO', 18, '', 1, NULL),
(150, 'GENERAL SANCHEZ CERRO', 18, '', 1, NULL),
(151, 'ILO', 18, '', 1, NULL),
(152, 'PASCO', 19, '', 1, NULL),
(153, 'DANIEL ALCIDES CARRION', 19, '', 1, NULL),
(154, 'OXAPAMPA', 19, '', 1, NULL),
(155, 'PIURA', 20, '', 1, NULL),
(156, 'PUIRA', 20, '', 1, NULL),
(157, 'AYABACA', 20, '', 1, NULL),
(158, 'HUANCABAMBA', 20, '', 1, NULL),
(159, 'MORROPON', 20, '', 1, NULL),
(160, 'PAITA', 20, '', 1, NULL),
(161, 'SULLANA', 20, '', 1, NULL),
(162, 'TALARA', 20, '', 1, NULL),
(163, 'SECHURA', 20, '', 1, NULL),
(164, 'PUNO', 21, '', 1, NULL),
(165, 'AZANGARO', 21, '', 1, NULL),
(166, 'CARABAYA', 21, '', 1, NULL),
(167, 'CHUCUITO', 21, '', 1, NULL),
(168, 'EL COLLAO', 21, '', 1, NULL),
(169, 'HUANCANE', 21, '', 1, NULL),
(170, 'LAMPA', 21, '', 1, NULL),
(171, 'MELGAR', 21, '', 1, NULL),
(172, 'MOHO', 21, '', 1, NULL),
(173, 'SAN ANTONIO DE PUTINA', 21, '', 1, NULL),
(174, 'SAN ROMAN', 21, '', 1, NULL),
(175, 'SANDIA', 21, '', 1, NULL),
(176, 'YUNGUYO', 21, '', 1, NULL),
(177, 'MOYOBAMBA', 22, '', 1, NULL),
(178, 'BELLAVISTA', 22, '', 1, NULL),
(179, 'EL DORADO', 22, '', 1, NULL),
(180, 'HUALLAGA', 22, '', 1, NULL),
(181, 'LAMAS', 22, '', 1, NULL),
(182, 'MARISCAL CACERES', 22, '', 1, NULL),
(183, 'PICOTA', 22, '', 1, NULL),
(184, 'RIOJA', 22, '', 1, NULL),
(185, 'SAN MARTIN', 22, '', 1, NULL),
(186, 'TOCACHE', 22, '', 1, NULL),
(187, 'TACNA', 23, '', 1, NULL),
(188, 'CANDARAVE', 23, '', 1, NULL),
(189, 'JORGE BASADRE', 23, '', 1, NULL),
(190, 'TARATA', 23, '', 1, NULL),
(191, 'TUMBES', 24, '', 1, NULL),
(192, 'CONTRALMIRANTE VILLAR', 24, '', 1, NULL),
(193, 'ZARUMILLA', 24, '', 1, NULL),
(194, 'CORONEL PORTILLO', 25, '', 1, NULL),
(195, 'ATALAYA', 25, '', 1, NULL),
(196, 'PADRE ABAD', 25, '', 1, NULL),
(197, 'PURUS', 25, '', 1, NULL);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `stock`
--

CREATE TABLE `stock` (
  `id` int(11) NOT NULL,
  `proveedor` int(11) DEFAULT NULL,
  `documento` int(11) DEFAULT NULL,
  `num_documento` varchar(30) DEFAULT NULL,
  `barcode` varchar(255) DEFAULT NULL,
  `make` text DEFAULT NULL,
  `model` text DEFAULT NULL,
  `series` text DEFAULT NULL,
  `form_factor` text DEFAULT NULL,
  `coa` text DEFAULT NULL,
  `cpu` varchar(255) DEFAULT NULL,
  `cpu_speed` varchar(30) DEFAULT NULL,
  `ram` varchar(30) DEFAULT NULL,
  `hard_drive` varchar(50) DEFAULT NULL,
  `drivetype` varchar(20) DEFAULT NULL,
  `aditional_information` text DEFAULT NULL,
  `other_information` text DEFAULT NULL,
  `screen_size` varchar(10) DEFAULT NULL,
  `battery` text DEFAULT NULL,
  `battery_test` varchar(10) DEFAULT NULL,
  `web_cam` text DEFAULT NULL,
  `ac_adapter` varchar(255) DEFAULT 'N',
  `teclado_error` int(11) DEFAULT 0,
  `stock` varchar(255) DEFAULT NULL,
  `id_producto` int(11) DEFAULT NULL,
  `id_sucursal` int(11) DEFAULT NULL,
  `id_usuario` int(11) DEFAULT NULL,
  `sellado` int(11) DEFAULT 0,
  `probado` int(11) DEFAULT 0,
  `en_carrito` tinyint(4) DEFAULT 0,
  `estado` int(11) DEFAULT 0,
  `numero_venta` text DEFAULT NULL,
  `cliente` int(11) DEFAULT NULL,
  `reserva` int(11) DEFAULT 0,
  `codigo_venta` varchar(250) DEFAULT NULL,
  `codigo_item_compra` varchar(255) DEFAULT NULL,
  `fecha` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `stock_venta_cliente`
--

CREATE TABLE `stock_venta_cliente` (
  `id` int(11) NOT NULL,
  `id_venta` int(11) DEFAULT NULL,
  `id_item` int(11) DEFAULT NULL,
  `codigo_item` varchar(250) DEFAULT NULL,
  `barcode` text DEFAULT NULL,
  `listo` int(11) NOT NULL DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `subcategorias`
--

CREATE TABLE `subcategorias` (
  `id` int(11) NOT NULL,
  `nombre` varchar(255) DEFAULT NULL,
  `codigo` varchar(20) DEFAULT NULL,
  `posicion` int(11) DEFAULT NULL,
  `estado` tinyint(4) DEFAULT NULL,
  `categoria` int(11) DEFAULT NULL,
  `sucursal` int(11) DEFAULT NULL,
  `foto` varchar(255) DEFAULT NULL,
  `ukr` text DEFAULT NULL,
  `fecha` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `sub_caracteristica_item`
--

CREATE TABLE `sub_caracteristica_item` (
  `id` int(11) NOT NULL,
  `nombre` varchar(255) DEFAULT NULL,
  `id_caracteristica_item` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `sucursales`
--

CREATE TABLE `sucursales` (
  `id` int(11) NOT NULL,
  `nombre` varchar(255) DEFAULT NULL,
  `codigo` varchar(20) DEFAULT NULL,
  `posicion` int(11) DEFAULT NULL,
  `estado` tinyint(4) DEFAULT NULL,
  `longitud` varchar(255) DEFAULT NULL,
  `latitud` varchar(255) DEFAULT NULL,
  `zoom` varchar(50) DEFAULT NULL,
  `principal` int(11) DEFAULT NULL,
  `departamento` varchar(20) DEFAULT NULL,
  `provincia` varchar(20) DEFAULT NULL,
  `distrito` varchar(20) DEFAULT NULL,
  `direccion` text DEFAULT NULL,
  `referencia` text DEFAULT NULL,
  `encardado` int(11) DEFAULT NULL,
  `fecha` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `sucursales`
--

INSERT INTO `sucursales` (`id`, `nombre`, `codigo`, `posicion`, `estado`, `longitud`, `latitud`, `zoom`, `principal`, `departamento`, `provincia`, `distrito`, `direccion`, `referencia`, `encardado`, `fecha`) VALUES
(5, 'Almacen', NULL, NULL, 1, '-77.065201', '-12.055027', '14', NULL, NULL, NULL, NULL, 'Guillermo Geraldino 1738, Cercado de Lima, Perú', 'por el amauta', NULL, '2022-03-15 17:02:40');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tablas`
--

CREATE TABLE `tablas` (
  `id` int(11) NOT NULL,
  `th0` text DEFAULT NULL,
  `th1` text DEFAULT NULL,
  `th2` text DEFAULT NULL,
  `th3` text DEFAULT NULL,
  `th4` text DEFAULT NULL,
  `th5` text DEFAULT NULL,
  `th6` text DEFAULT NULL,
  `th7` text DEFAULT NULL,
  `th8` text DEFAULT NULL,
  `th9` text DEFAULT NULL,
  `th10` text DEFAULT NULL,
  `th11` text DEFAULT NULL,
  `th12` text DEFAULT NULL,
  `th13` text DEFAULT NULL,
  `th14` text DEFAULT NULL,
  `th15` text DEFAULT NULL,
  `th16` text DEFAULT NULL,
  `th17` text DEFAULT NULL,
  `th18` text DEFAULT NULL,
  `th19` text DEFAULT NULL,
  `th20` text DEFAULT NULL,
  `th21` text DEFAULT NULL,
  `th22` text DEFAULT NULL,
  `th23` text DEFAULT NULL,
  `th24` text DEFAULT NULL,
  `th25` text DEFAULT NULL,
  `th26` text DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `tablas`
--

INSERT INTO `tablas` (`id`, `th0`, `th1`, `th2`, `th3`, `th4`, `th5`, `th6`, `th7`, `th8`, `th9`, `th10`, `th11`, `th12`, `th13`, `th14`, `th15`, `th16`, `th17`, `th18`, `th19`, `th20`, `th21`, `th22`, `th23`, `th24`, `th25`, `th26`) VALUES
(1, 'PROVEEDOR', 'DOC.', 'NUM.', 'BARCODE', 'MAKE', 'MODEL', 'SERIES', 'COA', 'CPU', 'CPU_SPEED', 'RAM', 'DISCO', 'DRIVETYPE', 'INFORMACION_ADICIONAL', 'OTRA_INFORMACION', 'SCREEN_SIZE', 'BATERIA', 'BATTERY_TEST', 'WEB_CAM', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(2, 'PROVEEDOR', 'DOC.', 'NUM.', 'BARCODE', 'MAKE', 'MODEL', 'SERIES', 'COA', 'CPU', 'CPU_SPEED', 'RAM', 'DISCO', 'DRIVETYPE', 'INFORMACION_ADICIONAL', 'OTRA_INFORMACION', 'SCREEN_SIZE', 'WEBCAM?', 'POWER_AC_ADAPTER', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(3, 'PROVEEDOR', 'DOC.', 'NUM.', 'SERIE.', 'CPU', 'CPU_SPEED', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(4, 'PROVEEDOR', 'DOC.', 'NUM.', 'BARCODE', 'MAKE', 'MODEL', 'SERIES', 'FORM_FACTOR', 'COA', 'CPU', 'CPU_SPEED', 'RAM', 'HARD_DRIVE', 'DRIVETYPE', 'INFORMACION_ADICIONAL', 'OTRA_INFORMACION', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `temas`
--

CREATE TABLE `temas` (
  `id` int(11) NOT NULL,
  `nombre_label` varchar(255) DEFAULT NULL,
  `nombre` varchar(255) DEFAULT NULL,
  `foto` varchar(255) DEFAULT NULL,
  `estado` tinyint(4) DEFAULT NULL,
  `color_admin` int(11) DEFAULT NULL,
  `color_page` int(11) DEFAULT NULL,
  `fecha` datetime DEFAULT NULL,
  `version` varchar(30) DEFAULT NULL,
  `nombre_skin` varchar(250) DEFAULT NULL,
  `disponible` int(11) DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `temas`
--

INSERT INTO `temas` (`id`, `nombre_label`, `nombre`, `foto`, `estado`, `color_admin`, `color_page`, `fecha`, `version`, `nombre_skin`, `disponible`) VALUES
(1, 'restaurante', 'restaurante', 'icon.png', 0, NULL, NULL, '2021-01-10 17:02:54', '0.01', 'RES_LUI', 0),
(2, 'tienda_de_computadoras', 'tienda', 'icon.png', 1, 13, NULL, '2021-01-10 17:03:22', '0.02', 'SP_LUI', 1),
(3, 'tienda_de_ropa', 'tienda_dos', 'icon.png', 0, NULL, NULL, '2021-04-20 11:41:55', '0.01', 'ROPS_LUI', 1),
(4, 'red_social', 'red_social', 'icon.png', 0, NULL, NULL, NULL, '0.01', 'LUI_SC', 0);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tipo_clientes`
--

CREATE TABLE `tipo_clientes` (
  `id` int(11) NOT NULL,
  `nombre` varchar(255) NOT NULL,
  `icono` text DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `tipo_clientes`
--

INSERT INTO `tipo_clientes` (`id`, `nombre`, `icono`) VALUES
(1, 'Distribuidor', 'admins.png'),
(2, 'Tecnico', 'vendedor.png'),
(3, 'Usuario final', 'vendedor.png');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tipo_de_pago`
--

CREATE TABLE `tipo_de_pago` (
  `id` int(11) NOT NULL,
  `nombre` varchar(255) DEFAULT NULL,
  `label` varchar(255) DEFAULT NULL,
  `vuelto` int(11) DEFAULT 0,
  `bank` int(11) DEFAULT 0,
  `importante` int(11) DEFAULT 0,
  `visible` int(11) DEFAULT 0,
  `reserva` tinyint(4) DEFAULT 0,
  `web` int(11) NOT NULL DEFAULT 0,
  `activado` int(11) DEFAULT 0,
  `principal` int(11) NOT NULL DEFAULT 0,
  `codigo` varchar(200) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `tipo_de_pago`
--

INSERT INTO `tipo_de_pago` (`id`, `nombre`, `label`, `vuelto`, `bank`, `importante`, `visible`, `reserva`, `web`, `activado`, `principal`, `codigo`) VALUES
(1, 'EFECTIVO', 'Efectivo', 1, 0, 1, 1, 0, 1, 1, 1, 'EFECTIVO001'),
(2, 'TRANSFERENCIA', 'Numero de operacion', 0, 1, 1, 1, 0, 1, 0, 0, 'TRANSFERENCIA001'),
(3, 'TARJETA (contraentrega)', 'Codigo o numero de referencia', 0, 1, 1, 1, 0, 1, 0, 0, 'TARGETA001'),
(4, 'RESERVAR', NULL, 0, 0, 0, 0, 1, 0, 1, 0, 'RESERVAR001'),
(5, 'PAGO EN LINEA', 'Pago en linea', 0, 1, 1, 1, 0, 1, 0, 0, 'PAGOONLINE001');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tipo_items`
--

CREATE TABLE `tipo_items` (
  `id` int(11) NOT NULL,
  `nombre` varchar(255) DEFAULT NULL,
  `id_tabla` int(11) DEFAULT NULL,
  `model_exel` text DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tipo_venta`
--

CREATE TABLE `tipo_venta` (
  `id` int(11) NOT NULL,
  `nombre` varchar(255) DEFAULT NULL,
  `code` varchar(200) DEFAULT NULL,
  `principal` int(11) NOT NULL DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `tipo_venta`
--

INSERT INTO `tipo_venta` (`id`, `nombre`, `code`, `principal`) VALUES
(1, 'RETIRO EN TIENDA', 'TIENDA001', 1),
(2, 'DELIVERY ENVIO', 'DELIVERY001', 0);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `usuarios`
--

CREATE TABLE `usuarios` (
  `id` int(11) NOT NULL,
  `nombre` varchar(250) DEFAULT NULL,
  `apellido_paterno` varchar(255) DEFAULT NULL,
  `apellido_materno` varchar(255) DEFAULT NULL,
  `apellido` varchar(250) DEFAULT NULL,
  `nombre_de_usuario` varchar(200) DEFAULT NULL,
  `correo` varchar(255) DEFAULT NULL,
  `pass` varchar(70) DEFAULT NULL,
  `foto_perfil` varchar(250) DEFAULT NULL,
  `celular` varchar(20) DEFAULT NULL,
  `ruc` varchar(30) DEFAULT NULL,
  `dni` varchar(20) DEFAULT NULL,
  `direccion` varchar(250) DEFAULT NULL,
  `esta_activado` tinyint(1) DEFAULT 0,
  `codigo` varchar(50) DEFAULT NULL,
  `es_administrador` tinyint(1) DEFAULT 0,
  `tipo` int(11) DEFAULT 1,
  `funcion` tinyint(1) DEFAULT 0,
  `sucursal` int(11) DEFAULT NULL,
  `limite` datetime DEFAULT NULL,
  `ukr` text DEFAULT NULL,
  `idioma` varchar(100) DEFAULT NULL,
  `categoria_prod_def` int(11) DEFAULT 0,
  `fecha` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `usuarios`
--

INSERT INTO `usuarios` (`id`, `nombre`, `apellido_paterno`, `apellido_materno`, `apellido`, `nombre_de_usuario`, `correo`, `pass`, `foto_perfil`, `celular`, `ruc`, `dni`, `direccion`, `esta_activado`, `codigo`, `es_administrador`, `tipo`, `funcion`, `sucursal`, `limite`, `ukr`, `idioma`, `categoria_prod_def`, `fecha`) VALUES
(15, 'JOSE LUIS', 'LOPEZ', 'ESTELA', NULL, NULL, 'joseluloes@gmail.com', 'adcd7048512e64b48da55b027577886ee5a36350', NULL, NULL, NULL, '77660139', NULL, 1, '4KIK6NGZM0G', 1, 1, 1, 5, NULL, 'jose-luis_lopez_estela', 'spanish', 0, '2022-03-15 17:00:39');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `ventas`
--

CREATE TABLE `ventas` (
  `id` int(11) NOT NULL,
  `numero_venta` text DEFAULT NULL,
  `barcode` text DEFAULT NULL,
  `sucursal` int(11) DEFAULT NULL,
  `caja` int(11) DEFAULT NULL,
  `documento` varchar(250) DEFAULT NULL,
  `numero_doc` varchar(255) DEFAULT NULL,
  `cliente` int(11) DEFAULT NULL,
  `cliente_doc` varchar(255) DEFAULT NULL,
  `metodo_pago` int(11) DEFAULT NULL,
  `numero_operacion` varchar(100) DEFAULT NULL,
  `cuenta` text DEFAULT NULL,
  `total_compra` varchar(255) DEFAULT NULL,
  `tipo_de_venta` int(11) DEFAULT NULL,
  `vendedor` int(11) DEFAULT NULL,
  `estado_de_venta` int(11) DEFAULT 0,
  `pago_con` varchar(250) DEFAULT NULL,
  `vuelto` varchar(250) DEFAULT NULL,
  `entregar` int(11) DEFAULT 0,
  `numero_venta_reserva` text DEFAULT NULL,
  `web` int(11) DEFAULT NULL,
  `tipo_venta` varchar(20) DEFAULT '0',
  `direccion_envio` int(11) DEFAULT NULL,
  `costo_envio` varchar(250) NOT NULL DEFAULT '0',
  `fecha` datetime DEFAULT NULL,
  `fecha_entrega` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `vista_productos`
--

CREATE TABLE `vista_productos` (
  `id` int(11) NOT NULL,
  `vista_id` int(11) DEFAULT NULL,
  `id_producto` int(11) DEFAULT NULL,
  `fecha` datetime DEFAULT NULL,
  `realip` varchar(20) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `caja`
--
ALTER TABLE `caja`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `caracteristica_item`
--
ALTER TABLE `caracteristica_item`
  ADD PRIMARY KEY (`id`),
  ADD KEY `L_M_item` (`id_item`);

--
-- Indices de la tabla `carta`
--
ALTER TABLE `carta`
  ADD PRIMARY KEY (`id`),
  ADD KEY `Luis_k_persona` (`id_persona`);

--
-- Indices de la tabla `categorias`
--
ALTER TABLE `categorias`
  ADD PRIMARY KEY (`id`),
  ADD KEY `Luis_sucursal_1` (`sucursal`),
  ADD KEY `Luis_carta_a` (`id_carta`);

--
-- Indices de la tabla `colores`
--
ALTER TABLE `colores`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `configuracion`
--
ALTER TABLE `configuracion`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `departamentos`
--
ALTER TABLE `departamentos`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `detalles_venta`
--
ALTER TABLE `detalles_venta`
  ADD PRIMARY KEY (`id`),
  ADD KEY `LK_conect_ventas` (`id_venta`);

--
-- Indices de la tabla `detalles_venta_sub`
--
ALTER TABLE `detalles_venta_sub`
  ADD PRIMARY KEY (`id`),
  ADD KEY `LK_sub_detalles` (`id_venta`);

--
-- Indices de la tabla `devoluciones`
--
ALTER TABLE `devoluciones`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `diapositiva`
--
ALTER TABLE `diapositiva`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `direccion_envio`
--
ALTER TABLE `direccion_envio`
  ADD PRIMARY KEY (`id`),
  ADD KEY `LK_persona_cliente` (`id_persona`);

--
-- Indices de la tabla `distritos`
--
ALTER TABLE `distritos`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `dni`
--
ALTER TABLE `dni`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `documentos`
--
ALTER TABLE `documentos`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `estado_venta`
--
ALTER TABLE `estado_venta`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `header_page`
--
ALTER TABLE `header_page`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `imagen_carta`
--
ALTER TABLE `imagen_carta`
  ADD PRIMARY KEY (`id`),
  ADD KEY `LK_image_carta` (`id_carta`);

--
-- Indices de la tabla `imagen_item`
--
ALTER TABLE `imagen_item`
  ADD PRIMARY KEY (`id`),
  ADD KEY `Luis_item_image` (`id_item`);

--
-- Indices de la tabla `items`
--
ALTER TABLE `items`
  ADD PRIMARY KEY (`id`),
  ADD KEY `Luis_categoria` (`categoria`),
  ADD KEY `Luis_sucursales` (`sucursal`),
  ADD KEY `Luis_carta` (`carta`),
  ADD KEY `Luis_marcas` (`marca`),
  ADD KEY `Luis_sub_categoria` (`subcategoria`),
  ADD KEY `Luis_usuario` (`usuario`);

--
-- Indices de la tabla `lang`
--
ALTER TABLE `lang`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `marcas`
--
ALTER TABLE `marcas`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `menu`
--
ALTER TABLE `menu`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `moneda`
--
ALTER TABLE `moneda`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `monto_caja`
--
ALTER TABLE `monto_caja`
  ADD PRIMARY KEY (`id`),
  ADD KEY `LK_monto_int` (`caja`);

--
-- Indices de la tabla `opciones_items`
--
ALTER TABLE `opciones_items`
  ADD PRIMARY KEY (`id`),
  ADD KEY `LK_type_products` (`id_opciones_type`);

--
-- Indices de la tabla `opciones_type`
--
ALTER TABLE `opciones_type`
  ADD PRIMARY KEY (`id`),
  ADD KEY `LK_item_caract` (`id_items`);

--
-- Indices de la tabla `pagina`
--
ALTER TABLE `pagina`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `personas`
--
ALTER TABLE `personas`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `proveedores`
--
ALTER TABLE `proveedores`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `provincias`
--
ALTER TABLE `provincias`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `stock`
--
ALTER TABLE `stock`
  ADD PRIMARY KEY (`id`),
  ADD KEY `LK_productos` (`id_producto`);

--
-- Indices de la tabla `stock_venta_cliente`
--
ALTER TABLE `stock_venta_cliente`
  ADD PRIMARY KEY (`id`),
  ADD KEY `LK_producto_items` (`id_venta`);

--
-- Indices de la tabla `subcategorias`
--
ALTER TABLE `subcategorias`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `sub_caracteristica_item`
--
ALTER TABLE `sub_caracteristica_item`
  ADD PRIMARY KEY (`id`),
  ADD KEY `L_M_s_item` (`id_caracteristica_item`);

--
-- Indices de la tabla `sucursales`
--
ALTER TABLE `sucursales`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `tablas`
--
ALTER TABLE `tablas`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `temas`
--
ALTER TABLE `temas`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `tipo_clientes`
--
ALTER TABLE `tipo_clientes`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `tipo_de_pago`
--
ALTER TABLE `tipo_de_pago`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `tipo_items`
--
ALTER TABLE `tipo_items`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `tipo_venta`
--
ALTER TABLE `tipo_venta`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `usuarios`
--
ALTER TABLE `usuarios`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `ventas`
--
ALTER TABLE `ventas`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `vista_productos`
--
ALTER TABLE `vista_productos`
  ADD PRIMARY KEY (`id`),
  ADD KEY `producto_vista_luis_2` (`id_producto`),
  ADD KEY `producto_vista_luis_3` (`vista_id`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `caja`
--
ALTER TABLE `caja`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;

--
-- AUTO_INCREMENT de la tabla `caracteristica_item`
--
ALTER TABLE `caracteristica_item`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=19;

--
-- AUTO_INCREMENT de la tabla `carta`
--
ALTER TABLE `carta`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=96;

--
-- AUTO_INCREMENT de la tabla `categorias`
--
ALTER TABLE `categorias`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13467;

--
-- AUTO_INCREMENT de la tabla `colores`
--
ALTER TABLE `colores`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=34;

--
-- AUTO_INCREMENT de la tabla `configuracion`
--
ALTER TABLE `configuracion`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;

--
-- AUTO_INCREMENT de la tabla `departamentos`
--
ALTER TABLE `departamentos`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=27;

--
-- AUTO_INCREMENT de la tabla `detalles_venta`
--
ALTER TABLE `detalles_venta`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=153;

--
-- AUTO_INCREMENT de la tabla `detalles_venta_sub`
--
ALTER TABLE `detalles_venta_sub`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=139;

--
-- AUTO_INCREMENT de la tabla `devoluciones`
--
ALTER TABLE `devoluciones`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT de la tabla `diapositiva`
--
ALTER TABLE `diapositiva`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=221;

--
-- AUTO_INCREMENT de la tabla `direccion_envio`
--
ALTER TABLE `direccion_envio`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT de la tabla `distritos`
--
ALTER TABLE `distritos`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=1834;

--
-- AUTO_INCREMENT de la tabla `dni`
--
ALTER TABLE `dni`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT de la tabla `documentos`
--
ALTER TABLE `documentos`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT de la tabla `estado_venta`
--
ALTER TABLE `estado_venta`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT de la tabla `header_page`
--
ALTER TABLE `header_page`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT de la tabla `imagen_carta`
--
ALTER TABLE `imagen_carta`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=61;

--
-- AUTO_INCREMENT de la tabla `imagen_item`
--
ALTER TABLE `imagen_item`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=164;

--
-- AUTO_INCREMENT de la tabla `items`
--
ALTER TABLE `items`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=70;

--
-- AUTO_INCREMENT de la tabla `lang`
--
ALTER TABLE `lang`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=106;

--
-- AUTO_INCREMENT de la tabla `marcas`
--
ALTER TABLE `marcas`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=43;

--
-- AUTO_INCREMENT de la tabla `menu`
--
ALTER TABLE `menu`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=29;

--
-- AUTO_INCREMENT de la tabla `moneda`
--
ALTER TABLE `moneda`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT de la tabla `monto_caja`
--
ALTER TABLE `monto_caja`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT de la tabla `opciones_items`
--
ALTER TABLE `opciones_items`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=126;

--
-- AUTO_INCREMENT de la tabla `opciones_type`
--
ALTER TABLE `opciones_type`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=110;

--
-- AUTO_INCREMENT de la tabla `pagina`
--
ALTER TABLE `pagina`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT de la tabla `personas`
--
ALTER TABLE `personas`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=20;

--
-- AUTO_INCREMENT de la tabla `proveedores`
--
ALTER TABLE `proveedores`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT de la tabla `provincias`
--
ALTER TABLE `provincias`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=198;

--
-- AUTO_INCREMENT de la tabla `stock`
--
ALTER TABLE `stock`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=1447;

--
-- AUTO_INCREMENT de la tabla `stock_venta_cliente`
--
ALTER TABLE `stock_venta_cliente`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=26;

--
-- AUTO_INCREMENT de la tabla `subcategorias`
--
ALTER TABLE `subcategorias`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `sub_caracteristica_item`
--
ALTER TABLE `sub_caracteristica_item`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `sucursales`
--
ALTER TABLE `sucursales`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT de la tabla `tablas`
--
ALTER TABLE `tablas`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT de la tabla `temas`
--
ALTER TABLE `temas`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT de la tabla `tipo_clientes`
--
ALTER TABLE `tipo_clientes`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT de la tabla `tipo_de_pago`
--
ALTER TABLE `tipo_de_pago`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT de la tabla `tipo_items`
--
ALTER TABLE `tipo_items`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT de la tabla `tipo_venta`
--
ALTER TABLE `tipo_venta`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT de la tabla `usuarios`
--
ALTER TABLE `usuarios`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;

--
-- AUTO_INCREMENT de la tabla `ventas`
--
ALTER TABLE `ventas`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=181;

--
-- AUTO_INCREMENT de la tabla `vista_productos`
--
ALTER TABLE `vista_productos`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=1536;

--
-- Restricciones para tablas volcadas
--

--
-- Filtros para la tabla `caracteristica_item`
--
ALTER TABLE `caracteristica_item`
  ADD CONSTRAINT `L_M_item` FOREIGN KEY (`id_item`) REFERENCES `items` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Filtros para la tabla `carta`
--
ALTER TABLE `carta`
  ADD CONSTRAINT `Luis_k_usuario` FOREIGN KEY (`id_persona`) REFERENCES `usuarios` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Filtros para la tabla `categorias`
--
ALTER TABLE `categorias`
  ADD CONSTRAINT `Luis_carta_a` FOREIGN KEY (`id_carta`) REFERENCES `carta` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `Luis_sucursal_1` FOREIGN KEY (`sucursal`) REFERENCES `sucursales` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Filtros para la tabla `detalles_venta`
--
ALTER TABLE `detalles_venta`
  ADD CONSTRAINT `LK_conect_ventas` FOREIGN KEY (`id_venta`) REFERENCES `ventas` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Filtros para la tabla `detalles_venta_sub`
--
ALTER TABLE `detalles_venta_sub`
  ADD CONSTRAINT `LK_sub_detalles` FOREIGN KEY (`id_venta`) REFERENCES `ventas` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Filtros para la tabla `direccion_envio`
--
ALTER TABLE `direccion_envio`
  ADD CONSTRAINT `LK_persona_cliente` FOREIGN KEY (`id_persona`) REFERENCES `personas` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Filtros para la tabla `imagen_carta`
--
ALTER TABLE `imagen_carta`
  ADD CONSTRAINT `LK_image_carta` FOREIGN KEY (`id_carta`) REFERENCES `carta` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Filtros para la tabla `imagen_item`
--
ALTER TABLE `imagen_item`
  ADD CONSTRAINT `Luis_item_image` FOREIGN KEY (`id_item`) REFERENCES `items` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Filtros para la tabla `items`
--
ALTER TABLE `items`
  ADD CONSTRAINT `Luis_carta` FOREIGN KEY (`carta`) REFERENCES `carta` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `Luis_categoria` FOREIGN KEY (`categoria`) REFERENCES `categorias` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `Luis_marcas` FOREIGN KEY (`marca`) REFERENCES `marcas` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `Luis_sub_categoria` FOREIGN KEY (`subcategoria`) REFERENCES `subcategorias` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `Luis_sucursales` FOREIGN KEY (`sucursal`) REFERENCES `sucursales` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `Luis_usuario` FOREIGN KEY (`usuario`) REFERENCES `usuarios` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Filtros para la tabla `monto_caja`
--
ALTER TABLE `monto_caja`
  ADD CONSTRAINT `LK_monto_int` FOREIGN KEY (`caja`) REFERENCES `caja` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Filtros para la tabla `opciones_items`
--
ALTER TABLE `opciones_items`
  ADD CONSTRAINT `LK_type_products` FOREIGN KEY (`id_opciones_type`) REFERENCES `opciones_type` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Filtros para la tabla `opciones_type`
--
ALTER TABLE `opciones_type`
  ADD CONSTRAINT `LK_item_caract` FOREIGN KEY (`id_items`) REFERENCES `items` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Filtros para la tabla `stock`
--
ALTER TABLE `stock`
  ADD CONSTRAINT `LK_productos` FOREIGN KEY (`id_producto`) REFERENCES `items` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Filtros para la tabla `stock_venta_cliente`
--
ALTER TABLE `stock_venta_cliente`
  ADD CONSTRAINT `LK_producto_items` FOREIGN KEY (`id_venta`) REFERENCES `ventas` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Filtros para la tabla `sub_caracteristica_item`
--
ALTER TABLE `sub_caracteristica_item`
  ADD CONSTRAINT `L_M_s_item` FOREIGN KEY (`id_caracteristica_item`) REFERENCES `caracteristica_item` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
