-- phpMyAdmin SQL Dump
-- version 4.9.0.1
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 20-07-2019 a las 19:44:26
-- Versión del servidor: 10.3.15-MariaDB
-- Versión de PHP: 7.1.30

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `alwayson`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `cuentas`
--

CREATE TABLE `cuentas` (
  `id_cuentas` int(11) NOT NULL,
  `id_usuario` int(11) NOT NULL,
  `n_cuenta` varchar(100) NOT NULL,
  `saldo` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `cuentas`
--

INSERT INTO `cuentas` (`id_cuentas`, `id_usuario`, `n_cuenta`, `saldo`) VALUES
(1, 1, '123456789', 1401000),
(2, 2, '987654321', 54580);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `historicodeposito`
--

CREATE TABLE `historicodeposito` (
  `id_historico` int(11) NOT NULL,
  `id_usuario` int(11) NOT NULL,
  `rut_destino` varchar(25) NOT NULL,
  `cuenta_destino` varchar(500) NOT NULL,
  `monto` int(11) NOT NULL,
  `comentario` varchar(250) NOT NULL,
  `fecha` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `historicodeposito`
--

INSERT INTO `historicodeposito` (`id_historico`, `id_usuario`, `rut_destino`, `cuenta_destino`, `monto`, `comentario`, `fecha`) VALUES
(1, 1, '65432456', '1214235345346456', 50000, 'Deposito de servicios', '2019-07-01'),
(2, 1, '45443', '124235346677', 10000, 'Deposito de Cuentas', '2019-07-03'),
(3, 1, '26511677-9', '123456', 1000, '', '2019-07-20'),
(4, 1, '26511677-9', '123456', 1000, '', '2019-07-20'),
(5, 1, '26511677-9', '1234567', 5000, '', '2019-07-20'),
(6, 1, '26511677-9', '1234567', 5000, '', '2019-07-20'),
(7, 1, '26511677-9', '1234567', 5000, '', '2019-07-20'),
(8, 1, '26511677-9', '1234567', 5000, '', '2019-07-20'),
(9, 1, '26511677-9', '1234567', 5000, '', '2019-07-20'),
(10, 1, '26511677-9', '1234567', 5000, '', '2019-07-20'),
(11, 1, '26511677-9', '1234567', 5000, '', '2019-07-20'),
(12, 1, '26511677-9', '1234567', 5000, '', '2019-07-20'),
(13, 1, '26511677-9', '76543456787654', 10000, 'depositado ', '2019-07-20'),
(14, 1, '26511677-9', '76543456787654', 10000, 'depositado ', '2019-07-20'),
(15, 1, '26511677-9', '1234322', 100, '', '2019-07-20'),
(16, 1, '26511677-9', '9876543211', 0, '', '2019-07-20'),
(17, 1, '26511677-9', '987654321', 0, '', '2019-07-20'),
(18, 1, '26511677-9', '987654321', 100, '', '2019-07-20');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `historicotransferencia`
--

CREATE TABLE `historicotransferencia` (
  `id_historico` int(11) NOT NULL,
  `id_usuario` int(11) NOT NULL,
  `rut_destino` varchar(25) NOT NULL,
  `cuenta_destino` varchar(500) NOT NULL,
  `monto` int(11) NOT NULL,
  `comentario` varchar(250) NOT NULL,
  `fecha` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `historicotransferencia`
--

INSERT INTO `historicotransferencia` (`id_historico`, `id_usuario`, `rut_destino`, `cuenta_destino`, `monto`, `comentario`, `fecha`) VALUES
(1, 1, '123453', '123453245', 10, '', '2019-07-12'),
(2, 1, '26511677-9', '987654321', 10, '', '2019-07-20'),
(3, 1, '26511677-9', '987654321', 1000, '', '2019-07-20'),
(4, 1, '26511677-9', '987654321', 1000, '', '2019-07-20'),
(5, 1, '26511677-9', '987654321', 1000, '', '2019-07-20'),
(6, 1, '26511677-9', '987654321', 1000, '', '2019-07-20'),
(7, 1, '26511677-9', '987654321', 18790, '', '2019-07-20'),
(8, 1, '26511677-9', '987654321', 18790, '', '2019-07-20');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `usuarios`
--

CREATE TABLE `usuarios` (
  `id_usuario` int(11) NOT NULL,
  `rut_usuario` varchar(500) NOT NULL,
  `contra_usuario` varchar(250) NOT NULL,
  `nombre_usuario` varchar(100) NOT NULL,
  `apellido_usuario` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `usuarios`
--

INSERT INTO `usuarios` (`id_usuario`, `rut_usuario`, `contra_usuario`, `nombre_usuario`, `apellido_usuario`) VALUES
(1, 'e2f109f6d002a9f6a427e2549728f98e', '81dc9bdb52d04dc20036dbd8313ed055', 'Kevin', 'Moreno'),
(2, 'dd05e6f4406180a28376d2ea4ab2b098', '81dc9bdb52d04dc20036dbd8313ed055', 'Paul', 'Ferrada');

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `cuentas`
--
ALTER TABLE `cuentas`
  ADD PRIMARY KEY (`id_cuentas`);

--
-- Indices de la tabla `historicodeposito`
--
ALTER TABLE `historicodeposito`
  ADD PRIMARY KEY (`id_historico`);

--
-- Indices de la tabla `historicotransferencia`
--
ALTER TABLE `historicotransferencia`
  ADD PRIMARY KEY (`id_historico`);

--
-- Indices de la tabla `usuarios`
--
ALTER TABLE `usuarios`
  ADD PRIMARY KEY (`id_usuario`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `cuentas`
--
ALTER TABLE `cuentas`
  MODIFY `id_cuentas` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT de la tabla `historicodeposito`
--
ALTER TABLE `historicodeposito`
  MODIFY `id_historico` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=19;

--
-- AUTO_INCREMENT de la tabla `historicotransferencia`
--
ALTER TABLE `historicotransferencia`
  MODIFY `id_historico` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT de la tabla `usuarios`
--
ALTER TABLE `usuarios`
  MODIFY `id_usuario` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
