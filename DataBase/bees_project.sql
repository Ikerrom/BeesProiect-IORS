-- phpMyAdmin SQL Dump
-- version 5.1.0
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 20-05-2021 a las 10:24:12
-- Versión del servidor: 10.4.18-MariaDB
-- Versión de PHP: 8.0.3

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `bees_project`
--
DROP DATABASE IF EXISTS `bees_project`;
CREATE DATABASE IF NOT EXISTS `bees_project` DEFAULT CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci;
USE `bees_project`;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `compras`
--

CREATE TABLE `compras` (
  `numeroCompra` int(25) NOT NULL,
  `id_producto` int(5) NOT NULL,
  `precio` decimal(65,2) NOT NULL,
  `cantidad` int(25) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `compras`
--

INSERT INTO `compras` (`numeroCompra`, `id_producto`, `precio`, `cantidad`) VALUES
(23, 1, '2.00', 20),
(51, 2, '1.00', 7),
(61, 3, '5.00', 6),
(14151241, 6, '5.00', 8),
(4123, 2, '3.00', 3),
(12, 3, '3.00', 4),
(45354, 3, '2.00', 5);

--
-- Disparadores `compras`
--
DELIMITER $$
CREATE TRIGGER `añadir_inventario` AFTER INSERT ON `compras` FOR EACH ROW BEGIN
    UPDATE inventario 
    SET inventario.cantidad = inventario.cantidad + new.cantidad 
    WHERE new.id_producto = id_producto;
    
    END
$$
DELIMITER ;
DELIMITER $$
CREATE TRIGGER `elkarte_dinero_compras` AFTER INSERT ON `compras` FOR EACH ROW BEGIN 
UPDATE ELKARTE 
SET elkarte.dinero_total = elkarte.dinero_total - (new.precio * new.cantidad);
END
$$
DELIMITER ;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `elkarte`
--

CREATE TABLE `elkarte` (
  `dinero_total` decimal(65,2) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `elkarte`
--

INSERT INTO `elkarte` (`dinero_total`) VALUES
('378.00');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `inventario`
--

CREATE TABLE `inventario` (
  `id_producto` int(5) NOT NULL,
  `nombre` varchar(25) NOT NULL,
  `cantidad` int(25) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `inventario`
--

INSERT INTO `inventario` (`id_producto`, `nombre`, `cantidad`) VALUES
(1, 'jar', 20),
(2, 'botes', 15),
(3, 'X', 20),
(6, 'miel', 10);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `latas`
--

CREATE TABLE `latas` (
  `lata_id` int(5) NOT NULL,
  `capacidad` varchar(25) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `latas`
--

INSERT INTO `latas` (`lata_id`, `capacidad`) VALUES
(1, '250'),
(2, '150');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `pagos`
--

CREATE TABLE `pagos` (
  `dni` varchar(9) NOT NULL,
  `dinero` decimal(65,2) NOT NULL,
  `fecha` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `pagos`
--

INSERT INTO `pagos` (`dni`, `dinero`, `fecha`) VALUES
('12345678G', '30.00', '2021-05-04 15:05:10'),
('12345678A', '400.00', '2021-05-11 10:26:00'),
('45167495H', '10.00', '2021-05-17 09:25:24'),
('12345678A', '100.00', '2021-05-17 09:28:02'),
('12345678A', '50.00', '2021-05-17 09:54:58'),
('12345678G', '2.00', '2021-05-17 10:07:35'),
('12345678G', '25.00', '2021-05-17 10:20:16'),
('12345678G', '40.00', '2021-05-17 11:50:38'),
('12345678G', '30.00', '2021-05-19 13:07:56'),
('45167495H', '5.00', '2021-05-20 10:22:29');

--
-- Disparadores `pagos`
--
DELIMITER $$
CREATE TRIGGER `elkarte_dinero_pagos` AFTER INSERT ON `pagos` FOR EACH ROW BEGIN
UPDATE elkarte
SET elkarte.dinero_total = elkarte.dinero_total + new.dinero; 
END
$$
DELIMITER ;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `personas`
--

CREATE TABLE `personas` (
  `dni` varchar(9) NOT NULL,
  `nombre` varchar(15) NOT NULL,
  `apellido` varchar(25) NOT NULL,
  `gmail` varchar(50) NOT NULL,
  `contraseña` varchar(50) NOT NULL,
  `admin` tinyint(1) NOT NULL,
  `dinero_pagar` decimal(65,2) NOT NULL,
  `dinero_cuenta` decimal(65,2) NOT NULL,
  `foto` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `personas`
--

INSERT INTO `personas` (`dni`, `nombre`, `apellido`, `gmail`, `contraseña`, `admin`, `dinero_pagar`, `dinero_cuenta`, `foto`) VALUES
('12345678A', 'oscar', 'garcia', 'o.garcia@gmail.com', '1234', 1, '25.00', '20.00', 'resources/images/perfiles/perfil-empresario-dibujos-animados_18591-58479.jpg'),
('12345678G', 'Julio Sebastian', 'Zevallos', 'zevallos.julio@uni.eus', '123456789', 1, '30.00', '1000.00', 'resources/images/perfiles/Captura.PNG'),
('45167495H', 'Raul', 'Parra', 'parra.raul@uni.eus', '76543210', 1, '5.00', '1000000.00', 'resources/images/perfiles/perfil-empresario-dibujos-animados_18591-58479.jpg');

--
-- Disparadores `personas`
--
DELIMITER $$
CREATE TRIGGER `personas_pagos` AFTER UPDATE ON `personas` FOR EACH ROW BEGIN 
IF new.dinero_pagar < old.dinero_pagar THEN 
INSERT INTO pagos (dni,dinero,fecha) 
VALUES (old.dni , old.dinero_pagar - new.dinero_pagar , NOW());
END IF;
END
$$
DELIMITER ;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `reservas`
--

CREATE TABLE `reservas` (
  `dni` varchar(9) NOT NULL,
  `dia_reservado` date NOT NULL,
  `lata_id` int(5) DEFAULT NULL,
  `dia_dereserva` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `elkarte`
--
ALTER TABLE `elkarte`
  ADD PRIMARY KEY (`dinero_total`);

--
-- Indices de la tabla `inventario`
--
ALTER TABLE `inventario`
  ADD PRIMARY KEY (`id_producto`);

--
-- Indices de la tabla `latas`
--
ALTER TABLE `latas`
  ADD PRIMARY KEY (`lata_id`);

--
-- Indices de la tabla `pagos`
--
ALTER TABLE `pagos`
  ADD PRIMARY KEY (`fecha`),
  ADD KEY `dni` (`dni`);

--
-- Indices de la tabla `personas`
--
ALTER TABLE `personas`
  ADD PRIMARY KEY (`dni`);

--
-- Indices de la tabla `reservas`
--
ALTER TABLE `reservas`
  ADD PRIMARY KEY (`dia_reservado`),
  ADD KEY `dni` (`dni`),
  ADD KEY `lata_id` (`lata_id`);

--
-- Restricciones para tablas volcadas
--

--
-- Filtros para la tabla `pagos`
--
ALTER TABLE `pagos`
  ADD CONSTRAINT `pagos_ibfk_1` FOREIGN KEY (`dni`) REFERENCES `personas` (`dni`);

--
-- Filtros para la tabla `reservas`
--
ALTER TABLE `reservas`
  ADD CONSTRAINT `Reservas_ibfk_2` FOREIGN KEY (`lata_id`) REFERENCES `latas` (`lata_id`),
  ADD CONSTRAINT `reservas_ibfk_1` FOREIGN KEY (`dni`) REFERENCES `personas` (`dni`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
