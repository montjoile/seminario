-- phpMyAdmin SQL Dump
-- version 4.5.2
-- http://www.phpmyadmin.net
--
-- Servidor: localhost
-- Tiempo de generación: 14-10-2016 a las 10:17:20
-- Versión del servidor: 10.1.16-MariaDB
-- Versión de PHP: 5.6.24

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `seminario`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `banco`
--

CREATE TABLE `banco` (
  `id` int(11) NOT NULL,
  `nombre` varchar(35) NOT NULL,
  `pais_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `contrato`
--

CREATE TABLE `contrato` (
  `id` int(11) NOT NULL,
  `empresa_id` int(11) NOT NULL,
  `empleado_id` int(11) NOT NULL,
  `fecha_contrato` date NOT NULL,
  `fecha_vigencia` date NOT NULL,
  `status_id` int(11) NOT NULL,
  `salario` int(11) NOT NULL,
  `puesto_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `contrato`
--

INSERT INTO `contrato` (`id`, `empresa_id`, `empleado_id`, `fecha_contrato`, `fecha_vigencia`, `status_id`, `salario`, `puesto_id`) VALUES
(1, 1, 10, '2016-05-31', '2016-10-31', 6, 2500, 0),
(2, 1, 4, '2016-06-21', '2016-10-31', 6, 3000, 0),
(3, 1, 11, '2016-10-02', '2016-10-31', 6, 2500, 0);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `cuenta_empleado`
--

CREATE TABLE `cuenta_empleado` (
  `id` int(11) NOT NULL,
  `empleado_id` int(11) NOT NULL,
  `banco_id` int(11) NOT NULL,
  `tipo_cuenta` int(11) NOT NULL COMMENT '1=monetaria; 2=ahorro',
  `numero_cuenta` int(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `empleado`
--

CREATE TABLE `empleado` (
  `id` int(11) NOT NULL,
  `nombre` varchar(50) NOT NULL,
  `apellidos` varchar(50) NOT NULL,
  `direccion` varchar(60) NOT NULL,
  `telefono1` int(10) NOT NULL,
  `telefono2` int(10) NOT NULL,
  `celular` int(10) NOT NULL,
  `email` varchar(40) NOT NULL,
  `email2` varchar(40) NOT NULL,
  `NIT` varchar(12) NOT NULL,
  `fecha_nacimiento` date NOT NULL,
  `genero_id` int(1) NOT NULL,
  `nacionalidad` int(11) NOT NULL,
  `antecedente_penal` int(30) NOT NULL,
  `antecedente_policiaco` int(30) NOT NULL,
  `estado_civil` int(11) NOT NULL,
  `hijos` int(2) NOT NULL,
  `posee_vehiculo` int(1) NOT NULL COMMENT '0=no; 1=si',
  `licencia_conducir` int(10) NOT NULL,
  `pasaporte` int(15) NOT NULL,
  `pais_residencia` int(11) NOT NULL,
  `website` varchar(35) NOT NULL,
  `profesion_id` int(11) NOT NULL,
  `pretension_salarial` int(10) NOT NULL,
  `edad` int(11) NOT NULL,
  `status_id` int(11) NOT NULL,
  `usuario_id` int(11) NOT NULL,
  `nivel_estudio_max` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `empleado`
--

INSERT INTO `empleado` (`id`, `nombre`, `apellidos`, `direccion`, `telefono1`, `telefono2`, `celular`, `email`, `email2`, `NIT`, `fecha_nacimiento`, `genero_id`, `nacionalidad`, `antecedente_penal`, `antecedente_policiaco`, `estado_civil`, `hijos`, `posee_vehiculo`, `licencia_conducir`, `pasaporte`, `pais_residencia`, `website`, `profesion_id`, `pretension_salarial`, `edad`, `status_id`, `usuario_id`, `nivel_estudio_max`) VALUES
(1, 'jose luis', 'perez castillo', 'casa verde, colonia verde, zona verde', 12345678, 32165498, 14725836, 'verde@verde.com', '', '123456-7', '1988-11-04', 2, 1, 0, 0, 2, 0, 1, 0, 0, 1, '', 1, 0, 0, 2, 0, 2),
(2, 'ana', 'contreras', '', 0, 0, 0, '', '', '123450-1', '0000-00-00', 1, 0, 0, 0, 0, 0, 0, 0, 0, 0, '', 0, 0, 0, 0, 0, 0),
(3, 'sara', 'garcia', 'escuintla', 0, 0, 0, '', '', '', '0000-00-00', 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, '', 0, 0, 0, 0, 0, 0),
(4, 'hugo', 'reyes', 'jutiapa', 0, 0, 0, '', '', '', '0000-00-00', 2, 0, 0, 0, 0, 0, 0, 0, 0, 0, '', 0, 0, 0, 0, 0, 0),
(5, 'frank', 'Huerta', 'flores, peten', 0, 0, 0, '', '', '', '0000-00-00', 2, 0, 0, 0, 0, 0, 0, 0, 0, 0, '', 0, 0, 0, 0, 0, 0),
(6, 'juana', 'gonzalez', 'santa rosa', 45678912, 35768415, 25413688, 'juana@mail.com', '', '65477-2', '0000-00-00', 1, 0, 0, 0, 0, 0, 0, 0, 0, 1, '', 4, 0, 23, 0, 0, 0),
(7, 'josue', 'periles', 'peten', 45611247, 123548925, 66587441, 'periles@mail.com', 'josuep@mail.com', '12222-8', '0000-00-00', 2, 0, 0, 0, 0, 0, 0, 0, 0, 1, '', 1, 0, 36, 0, 0, 0),
(8, 'hector', 'santos', 'guatemala', 0, 0, 0, '', '', '', '0000-00-00', 3, 0, 0, 0, 0, 0, 0, 0, 0, 1, '', 3, 0, 33, 0, 0, 0),
(9, 'karla', 'ruano', '', 0, 0, 0, 'kruano@mail.com', '', '', '0000-00-00', 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, '', 0, 0, 0, 0, 0, 0),
(10, 'eladio', 'urrutia', '', 0, 0, 0, 'eurrutia@mail.com', '', '', '0000-00-00', 0, 0, 0, 0, 0, 0, 0, 0, 0, 1, '', 1, 0, 0, 0, 0, 0),
(11, 'tania', 'alvarado', '', 0, 0, 0, 'talvarado@mail.com', '', '', '0000-00-00', 1, 2, 0, 0, 2, 0, 0, 0, 0, 1, '', 4, 0, 0, 2, 13, 0);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `empleador`
--

CREATE TABLE `empleador` (
  `id` int(11) NOT NULL,
  `usuario_id` int(11) NOT NULL,
  `nombre` varchar(40) NOT NULL,
  `apellidos` varchar(40) NOT NULL,
  `telefono` int(12) NOT NULL,
  `celular` int(12) NOT NULL,
  `direccion` varchar(60) NOT NULL,
  `email` varchar(40) NOT NULL,
  `empresa_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `empleador`
--

INSERT INTO `empleador` (`id`, `usuario_id`, `nombre`, `apellidos`, `telefono`, `celular`, `direccion`, `email`, `empresa_id`) VALUES
(1, 12, 'daniel', 'fresco', 23452210, 25521401, 'aguilar batres, guatemala', 'dfresco@mail.com', 1);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `empresa`
--

CREATE TABLE `empresa` (
  `id` int(11) NOT NULL,
  `nombre` varchar(50) NOT NULL,
  `direccion` varchar(50) NOT NULL,
  `telefono` int(12) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `empresa`
--

INSERT INTO `empresa` (`id`, `nombre`, `direccion`, `telefono`) VALUES
(1, 'Farmacia Lucas', 'aguilar batres, guatemala', 23452210),
(2, 'Supermercados La Torre', 'zona 10, guatemala', 22547871);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `estado_civil`
--

CREATE TABLE `estado_civil` (
  `id` int(11) NOT NULL,
  `descripcion` varchar(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `estado_civil`
--

INSERT INTO `estado_civil` (`id`, `descripcion`) VALUES
(1, 'soltero'),
(2, 'casado'),
(3, 'divorciado'),
(4, 'viudo'),
(5, 'sin especificar'),
(6, 'otro');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `estudios_empleado`
--

CREATE TABLE `estudios_empleado` (
  `id` int(11) NOT NULL,
  `empleado_id` int(11) NOT NULL,
  `nivelestudios_id` int(11) NOT NULL,
  `universidad_id` int(11) NOT NULL,
  `finalizado` int(1) NOT NULL COMMENT '0=no; 1=si',
  `fecha_finalizacion` date NOT NULL,
  `fecha_inicio` date NOT NULL,
  `constancia` varchar(40) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `estudios_empleado`
--

INSERT INTO `estudios_empleado` (`id`, `empleado_id`, `nivelestudios_id`, `universidad_id`, `finalizado`, `fecha_finalizacion`, `fecha_inicio`, `constancia`) VALUES
(0, 11, 2, 0, 1, '2016-10-02', '2013-02-12', '');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `genero`
--

CREATE TABLE `genero` (
  `id` int(11) NOT NULL,
  `descripcion` varchar(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `genero`
--

INSERT INTO `genero` (`id`, `descripcion`) VALUES
(1, 'femenino'),
(2, 'masculino'),
(3, 'otro');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `nivel_estudios`
--

CREATE TABLE `nivel_estudios` (
  `id` int(11) NOT NULL,
  `descripcion` varchar(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `nivel_estudios`
--

INSERT INTO `nivel_estudios` (`id`, `descripcion`) VALUES
(1, 'basicos'),
(2, 'diversificado'),
(3, 'estudios universitarios'),
(4, 'licenciatura'),
(5, 'maestria'),
(6, 'doctorado');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `pais`
--

CREATE TABLE `pais` (
  `id` int(11) NOT NULL,
  `descripcion` varchar(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `pais`
--

INSERT INTO `pais` (`id`, `descripcion`) VALUES
(1, 'guatemala'),
(2, 'el salvador'),
(3, 'mexico'),
(4, 'honduras');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `profesion`
--

CREATE TABLE `profesion` (
  `id` int(11) NOT NULL,
  `descripcion` varchar(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `profesion`
--

INSERT INTO `profesion` (`id`, `descripcion`) VALUES
(1, 'maestro'),
(2, 'desarrollador de software'),
(3, 'webmaster'),
(4, 'secretaria');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `puesto`
--

CREATE TABLE `puesto` (
  `id` int(11) NOT NULL,
  `nombre` varchar(40) NOT NULL,
  `descripcion` varchar(200) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `puesto`
--

INSERT INTO `puesto` (`id`, `nombre`, `descripcion`) VALUES
(1, 'Asesor de ventas', ''),
(2, 'Agente de Call center', '');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `rol`
--

CREATE TABLE `rol` (
  `id` int(11) NOT NULL,
  `nombre` varchar(25) NOT NULL,
  `descripcion` varchar(150) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `rol`
--

INSERT INTO `rol` (`id`, `nombre`, `descripcion`) VALUES
(1, 'empleado', 'usuario que desea ser contratado'),
(2, 'empleador', 'empresa contratante'),
(3, 'administrador', 'administrador del sistema');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `status`
--

CREATE TABLE `status` (
  `id` int(11) NOT NULL,
  `descripcion` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `status`
--

INSERT INTO `status` (`id`, `descripcion`) VALUES
(1, 'bloqueado'),
(2, 'activo'),
(3, 'eliminado'),
(4, 'contratado'),
(5, 'despedido'),
(6, 'vigente'),
(7, 'no vigente');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `universidad`
--

CREATE TABLE `universidad` (
  `id` int(11) NOT NULL,
  `nombre` varchar(50) NOT NULL,
  `pais` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `universidad`
--

INSERT INTO `universidad` (`id`, `nombre`, `pais`) VALUES
(1, 'universidad de San Carlos', 1),
(2, 'Universidad Mariano Galvez', 1);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `usuario`
--

CREATE TABLE `usuario` (
  `id` int(11) NOT NULL,
  `nombre` varchar(50) NOT NULL,
  `apellidos` varchar(50) NOT NULL,
  `email` varchar(40) NOT NULL,
  `password` varchar(15) NOT NULL,
  `rol_id` int(11) NOT NULL,
  `status_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `usuario`
--

INSERT INTO `usuario` (`id`, `nombre`, `apellidos`, `email`, `password`, `rol_id`, `status_id`) VALUES
(2, 'felipe', 'alarcon', 'falarcon@email.com', '123', 1, 2),
(3, 'luis', 'cardona', 'luisc@mail.com', '123', 0, 0),
(4, 'walter', 'marcial', 'wmarcial@mail.com', '123', 1, 2),
(5, 'jorge', 'castro', 'jcastro@mail.com', '123', 1, 2),
(6, 'josue', 'fernandez', 'jfernandez@mail.com', '123', 1, 2),
(7, 'dania', 'alvarado', 'dalvarado@mail.com', '123', 1, 2),
(8, 'claudia', 'rodas', 'crodas@mail.com', '123', 1, 2),
(9, 'otto', 'sazo', 'osazo@mail.com', '123', 1, 2),
(10, 'karla', 'ruano', 'kruano@mail.com', '123', 1, 2),
(11, 'eladio', 'urrutia', 'eurrutia@mail.com', '123', 1, 2),
(12, 'daniel', 'fresco', 'dfresco@mail.com', '123', 2, 2),
(13, 'tania', 'alvarado', 'talvarado@mail.com', '123', 1, 2);

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `banco`
--
ALTER TABLE `banco`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `contrato`
--
ALTER TABLE `contrato`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `empleado`
--
ALTER TABLE `empleado`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `empleador`
--
ALTER TABLE `empleador`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `empresa`
--
ALTER TABLE `empresa`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `estado_civil`
--
ALTER TABLE `estado_civil`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `estudios_empleado`
--
ALTER TABLE `estudios_empleado`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `genero`
--
ALTER TABLE `genero`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `nivel_estudios`
--
ALTER TABLE `nivel_estudios`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `pais`
--
ALTER TABLE `pais`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `profesion`
--
ALTER TABLE `profesion`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `puesto`
--
ALTER TABLE `puesto`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `rol`
--
ALTER TABLE `rol`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `status`
--
ALTER TABLE `status`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `universidad`
--
ALTER TABLE `universidad`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `usuario`
--
ALTER TABLE `usuario`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `banco`
--
ALTER TABLE `banco`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT de la tabla `contrato`
--
ALTER TABLE `contrato`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
--
-- AUTO_INCREMENT de la tabla `empleado`
--
ALTER TABLE `empleado`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;
--
-- AUTO_INCREMENT de la tabla `empleador`
--
ALTER TABLE `empleador`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT de la tabla `empresa`
--
ALTER TABLE `empresa`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT de la tabla `estado_civil`
--
ALTER TABLE `estado_civil`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;
--
-- AUTO_INCREMENT de la tabla `genero`
--
ALTER TABLE `genero`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
--
-- AUTO_INCREMENT de la tabla `nivel_estudios`
--
ALTER TABLE `nivel_estudios`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;
--
-- AUTO_INCREMENT de la tabla `pais`
--
ALTER TABLE `pais`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
--
-- AUTO_INCREMENT de la tabla `profesion`
--
ALTER TABLE `profesion`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
--
-- AUTO_INCREMENT de la tabla `puesto`
--
ALTER TABLE `puesto`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT de la tabla `rol`
--
ALTER TABLE `rol`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
--
-- AUTO_INCREMENT de la tabla `status`
--
ALTER TABLE `status`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;
--
-- AUTO_INCREMENT de la tabla `universidad`
--
ALTER TABLE `universidad`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT de la tabla `usuario`
--
ALTER TABLE `usuario`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
