-- phpMyAdmin SQL Dump
-- version 5.0.2
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 15-11-2023 a las 23:29:57
-- Versión del servidor: 10.4.13-MariaDB
-- Versión de PHP: 7.4.8

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `canineworld`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `mascotas`
--

CREATE TABLE `mascotas` (
  `id` int(11) NOT NULL,
  `nombrePropietario` varchar(255) NOT NULL,
  `edadPropietario` int(11) NOT NULL,
  `telefono` varchar(255) NOT NULL,
  `nombreMascota` varchar(255) NOT NULL,
  `razaMascota` varchar(255) NOT NULL,
  `genero` varchar(20) DEFAULT NULL,
  `fecha` date DEFAULT NULL,
  `alergias` varchar(255) DEFAULT NULL,
  `total` int(11) DEFAULT NULL,
  `pago` int(11) DEFAULT NULL,
  `cambio` int(11) DEFAULT NULL,
  `servicio1` varchar(100) DEFAULT NULL,
  `servicio2` varchar(255) DEFAULT NULL,
  `servicio3` varchar(255) DEFAULT NULL,
  `servicio4` varchar(255) DEFAULT NULL,
  `servicio5` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `mascotas`
--

INSERT INTO `mascotas` (`id`, `nombrePropietario`, `edadPropietario`, `telefono`, `nombreMascota`, `razaMascota`, `genero`, `fecha`, `alergias`, `total`, `pago`, `cambio`, `servicio1`, `servicio2`, `servicio3`, `servicio4`, `servicio5`) VALUES
(37, 'Felipa', 66, '1234567890', 'Maguis', 'Chihuahua', 'Femenino', '2022-02-14', 'Ninguna', 580, 300, 280, 'Baño', 'Corte de pelo', 'Corte de uñas', 'Limpieza oídos y/u ojos', 'Cepillado dental'),
(40, 'Gricelda', 35, '4651141125', 'Chocolate', 'Doberman', 'Femenino', '2023-08-20', 'Ninguna', 580, 500, -80, 'Baño', 'Corte de pelo', 'Corte de uñas', 'Limpieza oídos y/u ojos', 'Cepillado dental'),
(41, 'Bruno', 19, '541541521', 'Brunito', 'Chihuahua', 'Masculino', '2023-02-08', 'Todas', 580, 500, 80, 'Baño', 'Corte de pelo', 'Corte de uñas', 'Limpieza oídos y/u ojos', 'Cepillado dental'),
(42, 'Miguel', 19, '4494942164', 'Ody', 'Chihuahua', 'Masculino', '2023-02-08', 'Ninguna', 580, 500, 80, 'Baño', 'Corte de pelo', 'Corte de uñas', 'Limpieza oídos y/u ojos', 'Cepillado dental');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `mensajes`
--

CREATE TABLE `mensajes` (
  `numeroregistro` int(10) NOT NULL,
  `usuario` varchar(30) NOT NULL,
  `genero` varchar(10) NOT NULL,
  `correo` varchar(30) NOT NULL,
  `mensaje` varchar(150) NOT NULL,
  `edad` int(2) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `mensajes`
--

INSERT INTO `mensajes` (`numeroregistro`, `usuario`, `genero`, `correo`, `mensaje`, `edad`) VALUES
(2, 'Juan', 'Masculino', 'sdfsdf@gmail.com', 'kkkkkkkkhhhhhhhhhh', 32),
(9, 'Ibarra', 'Masculino', 'puto@gmail.com', 'Hola', 0),
(10, '14TIDSM04A', 'Femenino', '213600087@gmail.coml', 'jhdhsf', 0);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `usuarios`
--

CREATE TABLE `usuarios` (
  `id` int(11) NOT NULL,
  `nombre` varchar(20) NOT NULL,
  `email` varchar(50) NOT NULL,
  `password` varchar(150) NOT NULL,
  `nivel` varchar(20) NOT NULL,
  `telefono` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `usuarios`
--

INSERT INTO `usuarios` (`id`, `nombre`, `email`, `password`, `nivel`, `telefono`) VALUES
(45, 'Julia', 'julio@gmail.com', '$2y$10$VjIv/qARfhGms7KX2kyAdugwvpsOofe9PXCHXph0UrhLo0poXtEAK', 'Cliente', 1234567890),
(50, 'Miguel', 'miguel@gmail.com', '$2y$10$GxkfseU.Y9Xsa1oDfxeIhOwx1pYVSUfoZORfY0CrR6.90jRc1DtYy', 'Administrador', 0),
(55, 'Felipa', '2136000087@utna.edu.mx', '$2y$10$lpIJ2G9.reFfLARBdf4eceJtxv8twfQwVQDMeIFRLu/2Aa3wu0Vwi', 'Cliente', 2147483647),
(56, 'Jorge A', '2136000087@utna.edu.mx', '$2y$10$piNJJNcpmAEBgp2WwS.w5u3cHkxRrmrkbu1VOIaH56gtjhSJgV/X6', 'Administrador', 2147483647),
(57, 'Omar', 'omar@gmail.com', '$2y$10$aFMm3MpgIskzDTLDzzQ3FuTKxUtDp1nq/f8IhyqurklgfgF6z0u32', 'Administrador', 2147483647),
(58, 'Fer', 'fer@gmail.com', '$2y$10$rPVFxQCcp6Yfew1J8CENuuC7YlIT6ATjF7QMsi0DmGAWyM.trDzna', 'Cliente', 4841521);

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `mascotas`
--
ALTER TABLE `mascotas`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `mensajes`
--
ALTER TABLE `mensajes`
  ADD PRIMARY KEY (`numeroregistro`);

--
-- Indices de la tabla `usuarios`
--
ALTER TABLE `usuarios`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `mascotas`
--
ALTER TABLE `mascotas`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=43;

--
-- AUTO_INCREMENT de la tabla `mensajes`
--
ALTER TABLE `mensajes`
  MODIFY `numeroregistro` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT de la tabla `usuarios`
--
ALTER TABLE `usuarios`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=59;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
