-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Servidor: localhost
-- Tiempo de generación: 08-05-2024 a las 07:00:44
-- Versión del servidor: 11.3.2-MariaDB
-- Versión de PHP: 8.3.3

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `banco`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `cuentas_bancarias`
--

CREATE TABLE `cuentas_bancarias` (
  `id_cuenta` int(11) NOT NULL,
  `id_persona` int(11) DEFAULT NULL,
  `tipo` varchar(20) DEFAULT NULL,
  `saldo` decimal(10,2) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Volcado de datos para la tabla `cuentas_bancarias`
--

INSERT INTO `cuentas_bancarias` (`id_cuenta`, `id_persona`, `tipo`, `saldo`) VALUES
(4, 4, 'Cuenta de Ahorro', 500.00),
(6, 22, 'Cuenta de Inversión', 300.00),
(7, 23, '', 400.00),
(8, 24, 'Cuenta de Inversión', 200.00),
(9, 25, 'Cuenta de Inversión', 90000.00);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `personas`
--

CREATE TABLE `personas` (
  `id_persona` int(11) NOT NULL,
  `nombre` varchar(50) DEFAULT NULL,
  `ci` varchar(50) DEFAULT NULL,
  `apellidoPaterno` varchar(50) DEFAULT NULL,
  `apellidoMaterno` varchar(50) DEFAULT NULL,
  `celular` varchar(50) DEFAULT NULL,
  `departamento` varchar(50) DEFAULT NULL,
  `activo` tinyint(1) DEFAULT 1
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Volcado de datos para la tabla `personas`
--

INSERT INTO `personas` (`id_persona`, `nombre`, `ci`, `apellidoPaterno`, `apellidoMaterno`, `celular`, `departamento`, `activo`) VALUES
(3, 'Pedro', '567890', 'García', 'Hernández', '65543210', 'LA PAZ', 1),
(4, 'Laura', '456789', 'Rodríguez', 'Fernández', '63456789', 'TARIJA', 1),
(6, 'kattya', '1000', 'Torrez', 'Yanique', '15487855', 'COCHABAMBA', 1),
(20, 'Alejandro', '158446', 'Marin', 'Romero', '67895423', 'SANTA CRUZ', 1),
(21, 'Alejandro', '10', 'Marin', 'Romero', '67895423', 'BENI', 1),
(22, 'Alejandro', '18489', 'MArin', 'Toledo', '678545', 'BENI', 1),
(23, 'Juan ', '1856974', 'MArt', 'Lopez', '678549', 'LA PAZ', 1),
(24, 'Maria', '1855698', 'Ton', 'RE', '67894592', 'ORURO', 1),
(25, 'mARIA', '255556', 'tAOR', 'CRUZ', '7895462', 'SUCRE', 1);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `roles`
--

CREATE TABLE `roles` (
  `id_rol` int(11) NOT NULL,
  `id_persona` int(11) DEFAULT NULL,
  `rol` varchar(50) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Volcado de datos para la tabla `roles`
--

INSERT INTO `roles` (`id_rol`, `id_persona`, `rol`) VALUES
(1, 20, 'supervisor'),
(2, 21, 'usuario'),
(3, 3, 'supervisor'),
(4, 4, 'usuario'),
(5, 22, 'usuario'),
(6, 6, 'director'),
(7, 23, 'director');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `transacciones`
--

CREATE TABLE `transacciones` (
  `id` int(11) NOT NULL,
  `cuenta_id` int(11) DEFAULT NULL,
  `fecha` date DEFAULT NULL,
  `tipo` varchar(50) DEFAULT NULL,
  `monto` decimal(10,2) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Volcado de datos para la tabla `transacciones`
--

INSERT INTO `transacciones` (`id`, `cuenta_id`, `fecha`, `tipo`, `monto`) VALUES
(43, 4, '2024-05-08', 'Depósito', 1000.00),
(44, 6, '2024-05-07', 'Retiro', 200.00),
(45, 7, '2024-05-06', 'Depósito', 500.00),
(46, 8, '2024-05-05', 'Retiro', 300.00),
(47, 6, '2024-05-04', 'Depósito', 700.00),
(48, 7, '2024-05-03', 'Retiro', 400.00),
(49, 8, '2024-05-02', 'Depósito', 800.00),
(50, 6, '2024-05-01', 'Retiro', 100.00);

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `cuentas_bancarias`
--
ALTER TABLE `cuentas_bancarias`
  ADD PRIMARY KEY (`id_cuenta`),
  ADD KEY `id_persona` (`id_persona`);

--
-- Indices de la tabla `personas`
--
ALTER TABLE `personas`
  ADD PRIMARY KEY (`id_persona`);

--
-- Indices de la tabla `roles`
--
ALTER TABLE `roles`
  ADD PRIMARY KEY (`id_rol`),
  ADD KEY `id_persona` (`id_persona`);

--
-- Indices de la tabla `transacciones`
--
ALTER TABLE `transacciones`
  ADD PRIMARY KEY (`id`),
  ADD KEY `cuenta_id` (`cuenta_id`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `cuentas_bancarias`
--
ALTER TABLE `cuentas_bancarias`
  MODIFY `id_cuenta` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT de la tabla `personas`
--
ALTER TABLE `personas`
  MODIFY `id_persona` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=26;

--
-- AUTO_INCREMENT de la tabla `roles`
--
ALTER TABLE `roles`
  MODIFY `id_rol` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT de la tabla `transacciones`
--
ALTER TABLE `transacciones`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=51;

--
-- Restricciones para tablas volcadas
--

--
-- Filtros para la tabla `cuentas_bancarias`
--
ALTER TABLE `cuentas_bancarias`
  ADD CONSTRAINT `cuentas_bancarias_ibfk_1` FOREIGN KEY (`id_persona`) REFERENCES `personas` (`id_persona`);

--
-- Filtros para la tabla `roles`
--
ALTER TABLE `roles`
  ADD CONSTRAINT `roles_ibfk_1` FOREIGN KEY (`id_persona`) REFERENCES `personas` (`id_persona`);

--
-- Filtros para la tabla `transacciones`
--
ALTER TABLE `transacciones`
  ADD CONSTRAINT `transacciones_ibfk_1` FOREIGN KEY (`cuenta_id`) REFERENCES `cuentas_bancarias` (`id_cuenta`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
