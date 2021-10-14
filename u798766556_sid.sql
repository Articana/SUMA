-- phpMyAdmin SQL Dump
-- version 4.9.5
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1:3306
-- Generation Time: May 19, 2021 at 06:28 PM
-- Server version: 10.4.15-MariaDB-cll-lve
-- PHP Version: 7.2.34

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `u798766556_sid`
--

-- --------------------------------------------------------

--
-- Table structure for table `academia`
--

CREATE TABLE `academia` (
  `aca_id` int(11) NOT NULL,
  `aca_nombre` varchar(64) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `academia`
--

INSERT INTO `academia` (`aca_id`, `aca_nombre`) VALUES
(1, 'Sistemas de Manufactura Flexible'),
(2, 'Automatización - Robótica'),
(3, 'Calidad de Ahorro de Energía'),
(4, 'Ciencias Básicas (Matemáticas y Estadías, Física y Química)'),
(5, 'Expresión Oral y Escrita y Formación Sociocultural'),
(6, 'Academia de Mercadotecnia'),
(7, 'Academia Económico-Administrativa'),
(8, 'Academia Financiera y Contable'),
(9, 'Academia de Matemáticas y Estadística'),
(10, 'Academia Informática y Comunicación'),
(11, 'Academia de Humanística'),
(12, 'Academias de Informática'),
(13, 'Academia de Contabilidad'),
(14, 'Academia de Administración'),
(15, 'Academia de Desarrollo Humano'),
(16, 'Academia de Seguridad Social'),
(17, 'Academia de Mercadotecnia'),
(18, 'Academia de Inglés'),
(19, 'Matemáticas y Estadísticas'),
(20, 'Expresión Oral y Escrita'),
(21, 'Redes y Telecomunicaciones'),
(22, 'Ingeniería de Software'),
(23, 'Administración del Mantenimiento'),
(24, 'Maquinaria Pesada'),
(25, 'Sistemas Eléctricos'),
(26, 'Ciencias Básicas'),
(27, 'Desarrollo Humano'),
(28, 'Procesos Industriales'),
(29, 'Manufactura y Materiales'),
(30, 'Minería');

-- --------------------------------------------------------

--
-- Table structure for table `academia_miembros`
--

CREATE TABLE `academia_miembros` (
  `aca_mie_id` int(11) NOT NULL,
  `tipoperi_id` int(11) NOT NULL,
  `aca_id` int(11) NOT NULL,
  `doc_id` int(11) NOT NULL COMMENT 'Miembro de la academia',
  `aca_mie_estatus` tinyint(1) NOT NULL DEFAULT 1,
  `anio` smallint(6) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `academia_miembros`
--

INSERT INTO `academia_miembros` (`aca_mie_id`, `tipoperi_id`, `aca_id`, `doc_id`, `aca_mie_estatus`, `anio`) VALUES
(1, 1, 2, 2, 1, 2020),
(2, 1, 22, 1, 1, 2021);

-- --------------------------------------------------------

--
-- Table structure for table `area`
--

CREATE TABLE `area` (
  `are_id` int(11) NOT NULL,
  `are_nombre` varchar(64) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `area`
--

INSERT INTO `area` (`are_id`, `are_nombre`) VALUES
(1, 'Rectoría'),
(2, 'Planeación'),
(3, 'Coordinación Académica'),
(4, 'Administración y Finanzas'),
(5, 'Recursos Materiales'),
(6, 'Recursos Humanos'),
(7, 'Prensa y Difusión'),
(8, 'Prácticas y Estadías'),
(9, 'Actividades Culturales y Deportivas  de Pruebas '),
(10, 'Servicios Escolares'),
(11, 'Vinculación'),
(12, 'Sistema de Gestión de Calidad'),
(13, 'Departamento de Emprendedurizmo'),
(14, 'Académico Empresarial'),
(15, 'N/A'),
(16, 'Departamento de soporte Técnico');

-- --------------------------------------------------------

--
-- Table structure for table `carga`
--

CREATE TABLE `carga` (
  `car_id` int(11) NOT NULL,
  `doc_id` int(11) NOT NULL,
  `tipoperi_id` int(11) NOT NULL,
  `are_id` int(11) NOT NULL,
  `car_grupo_tutorado` varchar(48) NOT NULL,
  `car_hrs_frente_grupo` int(11) NOT NULL,
  `car_hrs_estadia` int(11) NOT NULL,
  `car_hrs_desarrollo_mat_didactico` int(11) NOT NULL,
  `car_hrs_academia_ca` int(11) NOT NULL,
  `car_hrs_apoyo_academ_admin` int(11) NOT NULL,
  `car_hrs_total_hsm` int(11) NOT NULL,
  `car_entrega_pro_rep_direccion` date NOT NULL,
  `car_anio` smallint(6) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `carga`
--

INSERT INTO `carga` (`car_id`, `doc_id`, `tipoperi_id`, `are_id`, `car_grupo_tutorado`, `car_hrs_frente_grupo`, `car_hrs_estadia`, `car_hrs_desarrollo_mat_didactico`, `car_hrs_academia_ca`, `car_hrs_apoyo_academ_admin`, `car_hrs_total_hsm`, `car_entrega_pro_rep_direccion`, `car_anio`) VALUES
(1, 1, 1, 15, 'N/A', 6, 0, 0, 4, 0, 10, '2021-04-30', 2021),
(2, 12, 1, 14, '2A TM', 20, 4, 4, 2, 10, 40, '2021-05-20', 2021),
(3, 1, 1, 14, '2A TM', 20, 4, 4, 2, 10, 40, '2021-05-04', 2021);

-- --------------------------------------------------------

--
-- Table structure for table `carrera`
--

CREATE TABLE `carrera` (
  `carr_id` int(11) NOT NULL,
  `carr_nombre` varchar(64) NOT NULL,
  `carr_abreviatura` varchar(16) NOT NULL,
  `res_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `carrera`
--

INSERT INTO `carrera` (`carr_id`, `carr_nombre`, `carr_abreviatura`, `res_id`) VALUES
(1, 'Tecnologías de la Información', 'TI', 1),
(2, 'Desarrollo de Negocios', 'DDN', 1);

-- --------------------------------------------------------

--
-- Table structure for table `contacto`
--

CREATE TABLE `contacto` (
  `con_id` int(11) NOT NULL,
  `doc_id` int(11) NOT NULL,
  `con_emailparti` varchar(48) NOT NULL,
  `con_emailinsti` varchar(48) NOT NULL,
  `con_teleparti` varchar(13) NOT NULL,
  `con_teleinsti` varchar(13) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `contacto`
--

INSERT INTO `contacto` (`con_id`, `doc_id`, `con_emailparti`, `con_emailinsti`, `con_teleparti`, `con_teleinsti`) VALUES
(1, 1, 'itebmiranda@gmail.com', 'bmiranda@utzac.edu.mx', '4922191303', '4928707603'),
(2, 2, 'maypao83@gmail.com', 'mpacheco@utzac.edu.mx', '4929090147', '4929090147'),
(3, 3, 'jrodriguez@utzac.edu.mx', 'jrodriguez@utzac.edu.mx', '4921248474', '9256220'),
(4, 4, 'perez@gmail.com', 'jperez@utzac.edu.mx', '4929090765', '4929879098'),
(5, 5, 'resquivel@gmail.com', 'resquivel@utzac.edu.mx', '4921234567', '4921234567'),
(6, 6, 'lmontes@gmail.com', 'lmontes@utzac.edu.mx', '4921234567', '4921234567'),
(7, 7, 'maypao83@gmail.com', 'mpacheco@utzac.edu.mx', '4929090147', ''),
(8, 8, 'jbarrios@gmail.com', 'jbarrios@utzac.edu.mx', '4921234567', '4921234567'),
(9, 9, 'mbanuelos@gmail.com', 'mbanuelos@utzac.edu.mx', '4921234567', '4921234567'),
(10, 10, 'jose@mail.com', 'jose@utzac.edu.mx', '4921234567', '4921234567'),
(11, 11, 'arosales@gmail.com', 'arosales@utzac.edu.mx', '4921234567', '4921234567'),
(12, 12, 'jperez@gmail.com', 'jperez@utzac.edu.mx', '4929090148', '4929090148'),
(13, 13, 'mayra@gmail.com', 'mjuarez@utzac.edu.mx', '4923005002', '4929090145'),
(14, 14, 'brenda@gmail.com', 'balcala@utzac.edu.mx', '4929090187', '4929090458');

-- --------------------------------------------------------

--
-- Table structure for table `cuerpo_academico`
--

CREATE TABLE `cuerpo_academico` (
  `cue_id` int(11) NOT NULL,
  `tnh_id` int(11) NOT NULL,
  `carr_id` int(11) DEFAULT NULL,
  `cue_nombre` varchar(128) NOT NULL,
  `cue_clave` varchar(32) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `cuerpo_academico`
--

INSERT INTO `cuerpo_academico` (`cue_id`, `tnh_id`, `carr_id`, `cue_nombre`, `cue_clave`) VALUES
(1, 1, 1, 'Tecnologías de la Información Aplicadas a la Ingeniería del Software', ''),
(2, 1, 1, 'Diseño e Implementación de Ambientes de Aprendizaje Colaborativo, Apoyado en las Tecnologías de la Información y Comunicación', ''),
(3, 2, 1, 'Investigación y Gestión Educativa para el Desarrollo de Estrategias Comerciales  ', ''),
(4, 1, 12, 'Servicios Tecnológicos para el Desarrollo e Innovación Organizacional', ''),
(5, 1, 8, 'Estudio y Aplicación de Materiales Metálicos', ''),
(6, 1, 8, 'Administración del Mantenimiento', ''),
(7, 1, 2, 'Desarrollo Tecnológico Enfocado al Aprovechamiento de Recursos Naturales', ''),
(8, 1, 2, 'Energías Renovables con Apoyo en la Agricultura y en la Mectrónica', '');

-- --------------------------------------------------------

--
-- Table structure for table `cuerpo_academico_disciplinas`
--

CREATE TABLE `cuerpo_academico_disciplinas` (
  `cad_id` int(11) NOT NULL,
  `cue_id` int(11) NOT NULL,
  `dis_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `cuerpo_academico_lgac`
--

CREATE TABLE `cuerpo_academico_lgac` (
  `cal_id` int(11) NOT NULL,
  `cue_id` int(11) NOT NULL,
  `lgac_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `cuerpo_academico_miembros`
--

CREATE TABLE `cuerpo_academico_miembros` (
  `cam_id` int(11) NOT NULL,
  `cue_id` int(11) NOT NULL,
  `doc_id` int(11) NOT NULL,
  `tmc_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `cuerpo_academico_miembros`
--

INSERT INTO `cuerpo_academico_miembros` (`cam_id`, `cue_id`, `doc_id`, `tmc_id`) VALUES
(1, 2, 1, 1);

-- --------------------------------------------------------

--
-- Table structure for table `disciplinas`
--

CREATE TABLE `disciplinas` (
  `dis_id` int(11) NOT NULL,
  `dis_nombre` varchar(64) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `docente`
--

CREATE TABLE `docente` (
  `doc_id` int(11) NOT NULL,
  `usu_id` int(11) NOT NULL,
  `doc_nombres` varchar(32) NOT NULL,
  `doc_paterno` varchar(32) NOT NULL,
  `doc_materno` varchar(32) NOT NULL,
  `doc_fechanac` date NOT NULL,
  `doc_fechain` date NOT NULL,
  `doc_numemp` int(11) NOT NULL,
  `doc_fotografia` varchar(32) NOT NULL,
  `doc_explab` tinyint(4) NOT NULL,
  `doc_estatus` tinyint(1) NOT NULL,
  `doc_cv` varchar(16) DEFAULT NULL,
  `doc_cvdir` varchar(32) NOT NULL,
  `carr_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `docente`
--

INSERT INTO `docente` (`doc_id`, `usu_id`, `doc_nombres`, `doc_paterno`, `doc_materno`, `doc_fechanac`, `doc_fechain`, `doc_numemp`, `doc_fotografia`, `doc_explab`, `doc_estatus`, `doc_cv`, `doc_cvdir`, `carr_id`) VALUES
(1, 3, 'BRAULIO ELEAZAR', 'MIRANDA', 'GUTIÉRREZ', '1986-08-29', '2012-01-09', 422, '422.jpg', 9, 1, NULL, '9f1a20746ccfda20f657672fec394b72', 1),
(2, 4, 'MAYRA PAOLA', 'PACHECO', 'DELGADO', '1983-06-29', '2010-05-03', 393, '393.jpg', 11, 1, NULL, '83464c44ded52796cbc9e3839c1a26ca', 1),
(3, 5, 'JESÚS SALVADOR', 'RODRÍGUEZ', 'CARDIEL', '1981-02-12', '2007-09-07', 274, '274.jpg', 6, 1, NULL, '61e84bddfdf5d008e80569206564acf9', 1),
(12, 16, 'JUAN ', 'PEREZ', 'PEREZ', '1967-06-19', '2018-05-19', 500, '500.jpg', 4, 1, NULL, 'f51c48dca0104a46e98449884e00de30', 2),
(13, 17, 'MAYRA YANETH', 'JUAREZ', 'JUAREZ', '2012-06-19', '2010-01-19', 400, '400.jpg', 8, 1, NULL, 'f7bf7404329dadad58ad9c5a75dda37b', 2),
(14, 18, 'BRENDA', 'ALCALA', 'GUERRERO', '1989-03-08', '2000-05-19', 410, '410.jpg', 11, 1, NULL, '4d0fafd08dc0a6f01c3c7c459f23b3a5', 2);

-- --------------------------------------------------------

--
-- Table structure for table `docente_carrera`
--

CREATE TABLE `docente_carrera` (
  `docar_id` int(11) NOT NULL,
  `doc_id` int(11) NOT NULL,
  `carr_id` int(11) NOT NULL,
  `tipoperi_id` int(11) NOT NULL,
  `anio` smallint(6) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `docente_categoria`
--

CREATE TABLE `docente_categoria` (
  `doccat_id` int(11) NOT NULL,
  `doc_id` int(11) NOT NULL,
  `tiponomb_id` int(11) NOT NULL,
  `tipocat_id` int(11) NOT NULL,
  `doccat_fecha` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `docente_categoria`
--

INSERT INTO `docente_categoria` (`doccat_id`, `doc_id`, `tiponomb_id`, `tipocat_id`, `doccat_fecha`) VALUES
(1, 1, 1, 7, '2012-01-09'),
(2, 2, 1, 7, '2010-06-03'),
(3, 12, 1, 7, '2021-05-05');

-- --------------------------------------------------------

--
-- Table structure for table `docente_formacion`
--

CREATE TABLE `docente_formacion` (
  `docform_id` int(11) NOT NULL,
  `doc_id` int(11) NOT NULL,
  `inst_id` int(11) NOT NULL,
  `tipoform_id` int(11) NOT NULL,
  `tipotitulo_id` int(11) NOT NULL,
  `tmf_id` int(11) NOT NULL,
  `docform_rama` varchar(128) NOT NULL,
  `docform_fechaing` date NOT NULL,
  `docform_ident` varchar(32) DEFAULT NULL,
  `docform_fechaeg` date NOT NULL,
  `docform_estatus` tinyint(1) NOT NULL DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `docente_formacion`
--

INSERT INTO `docente_formacion` (`docform_id`, `doc_id`, `inst_id`, `tipoform_id`, `tipotitulo_id`, `tmf_id`, `docform_rama`, `docform_fechaing`, `docform_ident`, `docform_fechaeg`, `docform_estatus`) VALUES
(1, 1, 1, 3, 4, 3, 'Tecnologías de la Información y Comunicación', '2009-09-01', '7613583', '2011-04-22', 1),
(2, 1, 2, 4, 1, 3, 'Tecnologías de Información: Desarrollo de Aplicaciones', '2015-09-01', '', '2017-04-01', 1),
(3, 2, 2, 6, 2, 1, 'seguridad', '2020-11-21', '', '2020-11-30', 0),
(4, 3, 1, 1, 4, 3, 'Tecnologías de Información', '2006-09-09', 'cedula', '2008-09-09', 0),
(5, 3, 1, 3, 4, 3, 'Tecnologías de Información', '2010-09-09', 'cedula', '2012-09-09', 0);

-- --------------------------------------------------------

--
-- Table structure for table `domicilio`
--

CREATE TABLE `domicilio` (
  `dom_id` int(11) NOT NULL,
  `doc_id` int(11) NOT NULL,
  `dom_calle` varchar(64) NOT NULL,
  `dom_numero` int(11) NOT NULL,
  `dom_postal` int(11) NOT NULL,
  `mun_id` int(11) NOT NULL,
  `dom_fraccionamiento` varchar(64) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `domicilio`
--

INSERT INTO `domicilio` (`dom_id`, `doc_id`, `dom_calle`, `dom_numero`, `dom_postal`, `mun_id`, `dom_fraccionamiento`) VALUES
(1, 1, 'Artillería', 205, 98057, 1, 'La Toma de Zacatecas'),
(2, 2, 'BONIFACIO FALCON ', 205, 98087, 3, 'GONZALEZ ORTEGA 1ER SECCION'),
(3, 3, 'Auxiliadoras', 105, 98058, 1, 'Villas del Padre');

-- --------------------------------------------------------

--
-- Table structure for table `estado`
--

CREATE TABLE `estado` (
  `est_id` int(11) NOT NULL,
  `est_nombre` varchar(64) NOT NULL,
  `est_codigo` tinyint(4) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `estado`
--

INSERT INTO `estado` (`est_id`, `est_nombre`, `est_codigo`) VALUES
(1, 'Zacatecas', 32),
(2, 'Aguascalientes', 1),
(3, 'Baja California', 2),
(4, 'Sinaloa', 25),
(5, 'San Luis Potosí', 24),
(7, 'Baja California Sur', 3),
(8, 'Coahuila de Zaragoza', 5),
(9, 'Colima', 6),
(10, 'Chiapas', 7),
(11, 'Chihuahua', 8),
(12, 'Distrito Federal', 9),
(13, 'Durango', 10),
(14, 'Guanajuato', 11),
(15, 'Guerrero', 12),
(16, 'Hidalgo', 13),
(17, 'Campeche', 4),
(18, 'Jalisco', 14),
(19, 'Mexico', 15),
(20, 'Michoacán de Ocampo', 16),
(21, 'Morelos', 17),
(22, 'Nayarit', 18),
(23, 'Nuevo León', 19),
(24, 'Oaxaca', 20),
(25, 'Puebla', 21),
(26, 'Querétaro', 22),
(27, 'Quintana Roo', 23),
(28, 'Sonora', 26),
(29, 'Tabasco', 27),
(30, 'Tamaulipas', 28),
(31, 'Tlaxcala', 29),
(32, 'Veracruz de Ignacio de la Llave', 30),
(33, 'Yucatán', 31);

-- --------------------------------------------------------

--
-- Table structure for table `evaluacion`
--

CREATE TABLE `evaluacion` (
  `eval_id` int(11) NOT NULL,
  `nivel_id` int(11) NOT NULL,
  `tipoperiodo_peri` int(11) NOT NULL,
  `eval_result` float NOT NULL,
  `anio` smallint(6) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `institucion`
--

CREATE TABLE `institucion` (
  `inst_id` int(11) NOT NULL,
  `inst_nombre` varchar(96) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `institucion`
--

INSERT INTO `institucion` (`inst_id`, `inst_nombre`) VALUES
(1, 'UNIVERSIDAD TECNOLÓGICA DEL ESTADO DE ZACATECAS (UTZAC)'),
(2, 'UNIVERSIDAD INTERAMERICANA PARA EL DESARROLLO (UNID)'),
(3, 'INSTITUTO TECNOLÓGICO DEL ESTADO DE ZACATECAS (ITZ)');

-- --------------------------------------------------------

--
-- Table structure for table `lgac`
--

CREATE TABLE `lgac` (
  `lgac_id` int(11) NOT NULL,
  `lgac_nombre` varchar(96) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `municipio`
--

CREATE TABLE `municipio` (
  `mun_id` int(11) NOT NULL,
  `mun_nombre` varchar(128) NOT NULL,
  `est_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `municipio`
--

INSERT INTO `municipio` (`mun_id`, `mun_nombre`, `est_id`) VALUES
(1, 'Zacatecas', 1),
(2, 'Guadalupe', 1);

-- --------------------------------------------------------

--
-- Table structure for table `nivel`
--

CREATE TABLE `nivel` (
  `nivel_id` int(11) NOT NULL,
  `nivel_desc` varchar(32) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `nivel`
--

INSERT INTO `nivel` (`nivel_id`, `nivel_desc`) VALUES
(1, 'Técnico Superior Universitario'),
(2, 'Licencia Profesional'),
(3, 'Ingeniería'),
(5, 'Maestría Sin Grado'),
(6, 'Maestría con Grado'),
(7, 'Doctorado con Grado'),
(8, 'Doctorado sin Grado'),
(9, 'Licenciatura');

-- --------------------------------------------------------

--
-- Table structure for table `responsable`
--

CREATE TABLE `responsable` (
  `res_id` int(11) NOT NULL,
  `usu_id` int(11) NOT NULL,
  `res_nombres` varchar(32) NOT NULL,
  `res_paterno` varchar(32) NOT NULL,
  `res_materno` varchar(32) NOT NULL,
  `res_numemp` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `responsable`
--

INSERT INTO `responsable` (`res_id`, `usu_id`, `res_nombres`, `res_paterno`, `res_materno`, `res_numemp`) VALUES
(1, 2, 'TIRZO NOEL', 'PACHECO', 'DELGADO', 176);

-- --------------------------------------------------------

--
-- Table structure for table `tipo_categoria`
--

CREATE TABLE `tipo_categoria` (
  `tipocat_id` int(11) NOT NULL,
  `tipocat_nombre` varchar(32) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `tipo_categoria`
--

INSERT INTO `tipo_categoria` (`tipocat_id`, `tipocat_nombre`) VALUES
(1, 'PTC Asociado A'),
(2, 'PTC Asociado B'),
(3, 'PTC Asociado C'),
(4, 'PTC Titular A'),
(5, 'PTC Titular B'),
(6, 'PTC Titular C'),
(7, 'Profesor de Asignatura'),
(9, 'Técnico Docente');

-- --------------------------------------------------------

--
-- Table structure for table `tipo_formacion`
--

CREATE TABLE `tipo_formacion` (
  `tipoform_id` int(11) NOT NULL,
  `tipoform_nombre` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `tipo_formacion`
--

INSERT INTO `tipo_formacion` (`tipoform_id`, `tipoform_nombre`) VALUES
(1, 'Técnico Superior Universitario'),
(2, 'Licenciatura'),
(3, 'Ingeniería'),
(4, 'Maestría'),
(5, 'Doctorado'),
(6, 'Curso'),
(7, 'Diplomado'),
(8, 'Seminario'),
(9, 'Certificación'),
(10, 'Taller'),
(11, 'Capacitación');

-- --------------------------------------------------------

--
-- Table structure for table `tipo_miembro_ca`
--

CREATE TABLE `tipo_miembro_ca` (
  `tmc_id` int(11) NOT NULL,
  `tmc_tipomiembro` varchar(64) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `tipo_miembro_ca`
--

INSERT INTO `tipo_miembro_ca` (`tmc_id`, `tmc_tipomiembro`) VALUES
(1, 'Colaborador'),
(2, 'Miembro'),
(3, 'Responsable');

-- --------------------------------------------------------

--
-- Table structure for table `tipo_modalidad_formacion`
--

CREATE TABLE `tipo_modalidad_formacion` (
  `tmf_id` int(11) NOT NULL,
  `tmf_descripcion` varchar(16) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `tipo_modalidad_formacion`
--

INSERT INTO `tipo_modalidad_formacion` (`tmf_id`, `tmf_descripcion`) VALUES
(1, 'En línea'),
(2, 'Semi presencial'),
(3, 'Presencial');

-- --------------------------------------------------------

--
-- Table structure for table `tipo_nivel_habilitacion`
--

CREATE TABLE `tipo_nivel_habilitacion` (
  `tnh_id` int(11) NOT NULL,
  `tnh_descripcion` varchar(32) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `tipo_nivel_habilitacion`
--

INSERT INTO `tipo_nivel_habilitacion` (`tnh_id`, `tnh_descripcion`) VALUES
(1, 'En formación'),
(2, 'En consolidación'),
(3, 'Consolidado');

-- --------------------------------------------------------

--
-- Table structure for table `tipo_nombramiento`
--

CREATE TABLE `tipo_nombramiento` (
  `tiponomb_id` int(11) NOT NULL,
  `tiponomb_nombre` varchar(32) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `tipo_nombramiento`
--

INSERT INTO `tipo_nombramiento` (`tiponomb_id`, `tiponomb_nombre`) VALUES
(1, 'Promoción'),
(2, 'Convenio');

-- --------------------------------------------------------

--
-- Table structure for table `tipo_periodo`
--

CREATE TABLE `tipo_periodo` (
  `tipoperi_id` int(11) NOT NULL,
  `tipoperi_periodo` varchar(32) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `tipo_periodo`
--

INSERT INTO `tipo_periodo` (`tipoperi_id`, `tipoperi_periodo`) VALUES
(1, 'Enero - Abril'),
(2, 'Mayo - Agosto'),
(3, 'Septiembre - Diciembre');

-- --------------------------------------------------------

--
-- Table structure for table `tipo_titulo`
--

CREATE TABLE `tipo_titulo` (
  `tipotitulo_id` int(11) NOT NULL,
  `tipotitulo_nombre` varchar(32) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `tipo_titulo`
--

INSERT INTO `tipo_titulo` (`tipotitulo_id`, `tipotitulo_nombre`) VALUES
(1, 'Certificado'),
(2, 'Constancia'),
(3, 'Diploma'),
(4, 'Titulo');

-- --------------------------------------------------------

--
-- Table structure for table `usuario`
--

CREATE TABLE `usuario` (
  `usu_id` int(11) NOT NULL,
  `usu_nombre` varchar(8) NOT NULL,
  `usu_contrasena` varchar(8) NOT NULL,
  `usu_permiso` tinyint(4) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `usuario`
--

INSERT INTO `usuario` (`usu_id`, `usu_nombre`, `usu_contrasena`, `usu_permiso`) VALUES
(1, 'UTCA2021', 'UTCA2021', 5),
(2, 'UTDR176', 'UTDR176', 11),
(3, 'UTDC422', '2af77e28', 1),
(4, 'UTDC393', '26ee6f23', 1),
(5, 'UTDC274', 'dba25775', 1),
(11, 'UTRC2021', 'UTRC2021', 3),
(12, 'UTRH2021', 'UTRH2021', 9),
(16, 'UTDC500', 'dd889d1c', 1),
(17, 'UTDC400', 'a28d9205', 1),
(18, 'UTDC410', '47c73234', 1);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `academia`
--
ALTER TABLE `academia`
  ADD PRIMARY KEY (`aca_id`);

--
-- Indexes for table `academia_miembros`
--
ALTER TABLE `academia_miembros`
  ADD PRIMARY KEY (`aca_mie_id`);

--
-- Indexes for table `area`
--
ALTER TABLE `area`
  ADD PRIMARY KEY (`are_id`);

--
-- Indexes for table `carga`
--
ALTER TABLE `carga`
  ADD PRIMARY KEY (`car_id`);

--
-- Indexes for table `carrera`
--
ALTER TABLE `carrera`
  ADD PRIMARY KEY (`carr_id`);

--
-- Indexes for table `contacto`
--
ALTER TABLE `contacto`
  ADD PRIMARY KEY (`con_id`);

--
-- Indexes for table `cuerpo_academico`
--
ALTER TABLE `cuerpo_academico`
  ADD PRIMARY KEY (`cue_id`);

--
-- Indexes for table `cuerpo_academico_disciplinas`
--
ALTER TABLE `cuerpo_academico_disciplinas`
  ADD PRIMARY KEY (`cad_id`);

--
-- Indexes for table `cuerpo_academico_lgac`
--
ALTER TABLE `cuerpo_academico_lgac`
  ADD PRIMARY KEY (`cal_id`);

--
-- Indexes for table `cuerpo_academico_miembros`
--
ALTER TABLE `cuerpo_academico_miembros`
  ADD PRIMARY KEY (`cam_id`);

--
-- Indexes for table `disciplinas`
--
ALTER TABLE `disciplinas`
  ADD PRIMARY KEY (`dis_id`);

--
-- Indexes for table `docente`
--
ALTER TABLE `docente`
  ADD PRIMARY KEY (`doc_id`);

--
-- Indexes for table `docente_carrera`
--
ALTER TABLE `docente_carrera`
  ADD PRIMARY KEY (`docar_id`),
  ADD KEY `doc_id` (`doc_id`,`carr_id`),
  ADD KEY `car_id` (`carr_id`);

--
-- Indexes for table `docente_categoria`
--
ALTER TABLE `docente_categoria`
  ADD PRIMARY KEY (`doccat_id`),
  ADD KEY `doc_id` (`doc_id`),
  ADD KEY `nom_id` (`tiponomb_id`);

--
-- Indexes for table `docente_formacion`
--
ALTER TABLE `docente_formacion`
  ADD PRIMARY KEY (`docform_id`),
  ADD KEY `doc_id` (`doc_id`),
  ADD KEY `inst_id` (`inst_id`),
  ADD KEY `v` (`tipoform_id`);

--
-- Indexes for table `domicilio`
--
ALTER TABLE `domicilio`
  ADD PRIMARY KEY (`dom_id`);

--
-- Indexes for table `estado`
--
ALTER TABLE `estado`
  ADD PRIMARY KEY (`est_id`);

--
-- Indexes for table `evaluacion`
--
ALTER TABLE `evaluacion`
  ADD PRIMARY KEY (`eval_id`);

--
-- Indexes for table `institucion`
--
ALTER TABLE `institucion`
  ADD PRIMARY KEY (`inst_id`);

--
-- Indexes for table `lgac`
--
ALTER TABLE `lgac`
  ADD PRIMARY KEY (`lgac_id`);

--
-- Indexes for table `municipio`
--
ALTER TABLE `municipio`
  ADD PRIMARY KEY (`mun_id`);

--
-- Indexes for table `nivel`
--
ALTER TABLE `nivel`
  ADD PRIMARY KEY (`nivel_id`);

--
-- Indexes for table `responsable`
--
ALTER TABLE `responsable`
  ADD PRIMARY KEY (`res_id`);

--
-- Indexes for table `tipo_categoria`
--
ALTER TABLE `tipo_categoria`
  ADD PRIMARY KEY (`tipocat_id`);

--
-- Indexes for table `tipo_formacion`
--
ALTER TABLE `tipo_formacion`
  ADD PRIMARY KEY (`tipoform_id`);

--
-- Indexes for table `tipo_miembro_ca`
--
ALTER TABLE `tipo_miembro_ca`
  ADD PRIMARY KEY (`tmc_id`);

--
-- Indexes for table `tipo_modalidad_formacion`
--
ALTER TABLE `tipo_modalidad_formacion`
  ADD PRIMARY KEY (`tmf_id`);

--
-- Indexes for table `tipo_nivel_habilitacion`
--
ALTER TABLE `tipo_nivel_habilitacion`
  ADD PRIMARY KEY (`tnh_id`);

--
-- Indexes for table `tipo_nombramiento`
--
ALTER TABLE `tipo_nombramiento`
  ADD PRIMARY KEY (`tiponomb_id`);

--
-- Indexes for table `tipo_periodo`
--
ALTER TABLE `tipo_periodo`
  ADD PRIMARY KEY (`tipoperi_id`);

--
-- Indexes for table `tipo_titulo`
--
ALTER TABLE `tipo_titulo`
  ADD PRIMARY KEY (`tipotitulo_id`);

--
-- Indexes for table `usuario`
--
ALTER TABLE `usuario`
  ADD PRIMARY KEY (`usu_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `academia`
--
ALTER TABLE `academia`
  MODIFY `aca_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=31;

--
-- AUTO_INCREMENT for table `academia_miembros`
--
ALTER TABLE `academia_miembros`
  MODIFY `aca_mie_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `area`
--
ALTER TABLE `area`
  MODIFY `are_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;

--
-- AUTO_INCREMENT for table `carga`
--
ALTER TABLE `carga`
  MODIFY `car_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `carrera`
--
ALTER TABLE `carrera`
  MODIFY `carr_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `contacto`
--
ALTER TABLE `contacto`
  MODIFY `con_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- AUTO_INCREMENT for table `cuerpo_academico`
--
ALTER TABLE `cuerpo_academico`
  MODIFY `cue_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `cuerpo_academico_disciplinas`
--
ALTER TABLE `cuerpo_academico_disciplinas`
  MODIFY `cad_id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `cuerpo_academico_lgac`
--
ALTER TABLE `cuerpo_academico_lgac`
  MODIFY `cal_id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `cuerpo_academico_miembros`
--
ALTER TABLE `cuerpo_academico_miembros`
  MODIFY `cam_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `disciplinas`
--
ALTER TABLE `disciplinas`
  MODIFY `dis_id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `docente`
--
ALTER TABLE `docente`
  MODIFY `doc_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- AUTO_INCREMENT for table `docente_carrera`
--
ALTER TABLE `docente_carrera`
  MODIFY `docar_id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `docente_categoria`
--
ALTER TABLE `docente_categoria`
  MODIFY `doccat_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `docente_formacion`
--
ALTER TABLE `docente_formacion`
  MODIFY `docform_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `domicilio`
--
ALTER TABLE `domicilio`
  MODIFY `dom_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `estado`
--
ALTER TABLE `estado`
  MODIFY `est_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=34;

--
-- AUTO_INCREMENT for table `evaluacion`
--
ALTER TABLE `evaluacion`
  MODIFY `eval_id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `institucion`
--
ALTER TABLE `institucion`
  MODIFY `inst_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `lgac`
--
ALTER TABLE `lgac`
  MODIFY `lgac_id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `municipio`
--
ALTER TABLE `municipio`
  MODIFY `mun_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `nivel`
--
ALTER TABLE `nivel`
  MODIFY `nivel_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `responsable`
--
ALTER TABLE `responsable`
  MODIFY `res_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `tipo_categoria`
--
ALTER TABLE `tipo_categoria`
  MODIFY `tipocat_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `tipo_formacion`
--
ALTER TABLE `tipo_formacion`
  MODIFY `tipoform_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT for table `tipo_miembro_ca`
--
ALTER TABLE `tipo_miembro_ca`
  MODIFY `tmc_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `tipo_modalidad_formacion`
--
ALTER TABLE `tipo_modalidad_formacion`
  MODIFY `tmf_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `tipo_nivel_habilitacion`
--
ALTER TABLE `tipo_nivel_habilitacion`
  MODIFY `tnh_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `tipo_nombramiento`
--
ALTER TABLE `tipo_nombramiento`
  MODIFY `tiponomb_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `tipo_periodo`
--
ALTER TABLE `tipo_periodo`
  MODIFY `tipoperi_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `tipo_titulo`
--
ALTER TABLE `tipo_titulo`
  MODIFY `tipotitulo_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `usuario`
--
ALTER TABLE `usuario`
  MODIFY `usu_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=19;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
