-- phpMyAdmin SQL Dump
-- version 5.1.0
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 13-05-2021 a las 10:47:14
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
  `numero compra` int(25) NOT NULL,
  `id_producto` int(5) NOT NULL,
  `precio` varchar(25) NOT NULL,
  `cantidad` int(25) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `compras`
--

INSERT INTO `compras` (`numero compra`, `id_producto`, `precio`, `cantidad`) VALUES
(23, 1, '2€', 20),
(51, 2, '1€', 7),
(61, 3, '5€', 6),
(14151241, 6, '5€', 8);

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
CREATE TRIGGER `elkarte_dinero` AFTER INSERT ON `compras` FOR EACH ROW BEGIN
UPDATE elkarte 
SET dinero = dinero - (new.precio * new.cantidad);
END
$$
DELIMITER ;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `elkarte`
--

CREATE TABLE `elkarte` (
  `dinero_total` int(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `elkarte`
--

INSERT INTO `elkarte` (`dinero_total`) VALUES
(300);

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
(2, 'botes', 12),
(3, 'X', 11),
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
  `dinero` varchar(255) NOT NULL,
  `fecha` date DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `pagos`
--

INSERT INTO `pagos` (`dni`, `dinero`, `fecha`) VALUES
('12345678A', '400', '2021-05-11'),
('12345678G', '30', '2021-05-04'),
('45167495H', '200', '2021-05-10');

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
  `dinero_pagar` int(100) NOT NULL,
  `dinero_cuenta` int(100) NOT NULL,
  `foto` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `personas`
--

INSERT INTO `personas` (`dni`, `nombre`, `apellido`, `gmail`, `contraseña`, `admin`, `dinero_pagar`, `dinero_cuenta`, `foto`) VALUES
('12345678A', 'oscar', 'garcia', 'o.garcia@gmail.com', '1234', 1, 200, 20, ''),
('12345678G', 'Julio Sebastian', 'Zevallos', 'zevallos.julio@uni.eus', '123456789', 1, 52, 1000, ''),
('45167495H', 'Raul', 'Parra', 'parra.raul@uni.eus', '7654321', 1, 0, 1000000, '');

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
-- Volcado de datos para la tabla `reservas`
--

INSERT INTO `reservas` (`dni`, `dia_reservado`, `lata_id`, `dia_dereserva`) VALUES
('12345678G', '2021-05-28', 1, '2021-05-05');

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
  ADD PRIMARY KEY (`dni`);

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
