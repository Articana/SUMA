-- phpMyAdmin SQL Dump
-- version 4.6.5.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Mar 22, 2021 at 06:18 PM
-- Server version: 10.1.21-MariaDB
-- PHP Version: 5.6.30

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `suma`
--

-- --------------------------------------------------------

--
-- Table structure for table `academia`
--

CREATE TABLE `academia` (
  `aca_id` int(11) NOT NULL,
  `aca_nombre` varchar(64) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `academia_miembros`
--

CREATE TABLE `academia_miembros` (
  `aca_mie_id` int(11) NOT NULL,
  `tipoperi_id` int(11) NOT NULL,
  `aca_id` int(11) NOT NULL,
  `doc_id` int(11) NOT NULL COMMENT 'Miembro de la academia',
  `aca_mie_estatus` tinyint(1) NOT NULL DEFAULT '1',
  `anio` smallint(6) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `area`
--

CREATE TABLE `area` (
  `are_id` int(11) NOT NULL,
  `are_nombre` varchar(64) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

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
  `docform_estatus` tinyint(1) NOT NULL DEFAULT '1'
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

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

-- --------------------------------------------------------

--
-- Table structure for table `estado`
--

CREATE TABLE `estado` (
  `est_id` int(11) NOT NULL,
  `est_nombre` varchar(64) NOT NULL,
  `est_codigo` tinyint(4) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

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
  `inst_nombre` varchar(64) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

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

-- --------------------------------------------------------

--
-- Table structure for table `nivel`
--

CREATE TABLE `nivel` (
  `nivel_id` int(11) NOT NULL,
  `nivel_desc` varchar(32) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

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

-- --------------------------------------------------------

--
-- Table structure for table `tipo_categoria`
--

CREATE TABLE `tipo_categoria` (
  `tipocat_id` int(11) NOT NULL,
  `tipocat_nombre` varchar(32) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `tipo_formacion`
--

CREATE TABLE `tipo_formacion` (
  `tipoform_id` int(11) NOT NULL,
  `tipoform_nombre` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `tipo_miembro_ca`
--

CREATE TABLE `tipo_miembro_ca` (
  `tmc_id` int(11) NOT NULL,
  `tmc_tipomiembro` varchar(64) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `tipo_modalidad_formacion`
--

CREATE TABLE `tipo_modalidad_formacion` (
  `tmf_id` int(11) NOT NULL,
  `tmf_descripcion` varchar(16) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `tipo_nivel_habilitacion`
--

CREATE TABLE `tipo_nivel_habilitacion` (
  `tnh_id` int(11) NOT NULL,
  `tnh_descripcion` varchar(32) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `tipo_nombramiento`
--

CREATE TABLE `tipo_nombramiento` (
  `tiponomb_id` int(11) NOT NULL,
  `tiponomb_nombre` varchar(32) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `tipo_periodo`
--

CREATE TABLE `tipo_periodo` (
  `tipoperi_id` int(11) NOT NULL,
  `tipoperi_periodo` varchar(32) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `tipo_titulo`
--

CREATE TABLE `tipo_titulo` (
  `tipotitulo_id` int(11) NOT NULL,
  `tipotitulo_nombre` varchar(32) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

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
  MODIFY `aca_mie_id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `area`
--
ALTER TABLE `area`
  MODIFY `are_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;
--
-- AUTO_INCREMENT for table `carga`
--
ALTER TABLE `carga`
  MODIFY `car_id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `carrera`
--
ALTER TABLE `carrera`
  MODIFY `carr_id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `contacto`
--
ALTER TABLE `contacto`
  MODIFY `con_id` int(11) NOT NULL AUTO_INCREMENT;
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
  MODIFY `cam_id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `disciplinas`
--
ALTER TABLE `disciplinas`
  MODIFY `dis_id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `docente`
--
ALTER TABLE `docente`
  MODIFY `doc_id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `docente_carrera`
--
ALTER TABLE `docente_carrera`
  MODIFY `docar_id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `docente_categoria`
--
ALTER TABLE `docente_categoria`
  MODIFY `doccat_id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `docente_formacion`
--
ALTER TABLE `docente_formacion`
  MODIFY `docform_id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `domicilio`
--
ALTER TABLE `domicilio`
  MODIFY `dom_id` int(11) NOT NULL AUTO_INCREMENT;
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
  MODIFY `inst_id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `lgac`
--
ALTER TABLE `lgac`
  MODIFY `lgac_id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `municipio`
--
ALTER TABLE `municipio`
  MODIFY `mun_id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `nivel`
--
ALTER TABLE `nivel`
  MODIFY `nivel_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;
--
-- AUTO_INCREMENT for table `responsable`
--
ALTER TABLE `responsable`
  MODIFY `res_id` int(11) NOT NULL AUTO_INCREMENT;
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
  MODIFY `usu_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
