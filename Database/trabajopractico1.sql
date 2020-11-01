-- phpMyAdmin SQL Dump
-- version 5.0.2
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 31-10-2020 a las 07:28:27
-- Versión del servidor: 10.4.14-MariaDB
-- Versión de PHP: 7.2.33

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `trabajopractico1`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `amigos`
--

CREATE TABLE `amigos` (
  `id_usuario1` varchar(50) NOT NULL,
  `id_usuario2` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `categoria`
--

CREATE TABLE `categoria` (
  `id_categoria` int(11) NOT NULL,
  `descripcion` varchar(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COMMENT='Categoria de los juegos';

--
-- Volcado de datos para la tabla `categoria`
--

INSERT INTO `categoria` (`id_categoria`, `descripcion`) VALUES
(1, 'Disparos'),
(2, 'Competitivos'),
(3, 'MOBA'),
(4, 'Multijugador'),
(5, 'Estrategia'),
(6, 'Terror'),
(7, 'Mundo abierto'),
(8, 'Supervivencia'),
(9, 'Battle Royale'),
(10, 'Zoombies'),
(11, 'Accion'),
(12, 'Sandbox'),
(13, 'Aventura'),
(14, 'Medievales'),
(15, 'RPG'),
(16, 'Gratis');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `juegos`
--

CREATE TABLE `juegos` (
  `Id_juego` varchar(5) NOT NULL COMMENT 'acronimo de juego',
  `nombre` varchar(50) DEFAULT NULL,
  `descripcion` varchar(400) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COMMENT='contiene los juegos';

--
-- Volcado de datos para la tabla `juegos`
--

INSERT INTO `juegos` (`Id_juego`, `nombre`, `descripcion`) VALUES
('4HONO', 'For Honor', 'Crea un camino de destrucción a través de un campo de batalla intenso y creíble en For Honor.'),
('4nite', 'Fortnite', 'Un juego gratuito donde hasta cien jugadores luchan en una isla, en espacios cada vez más pequeños debido a la tormenta, para ser la última persona en pie.'),
('AOE2', 'Age of Empires II', 'conmemora el 20 aniversario de uno de los juegos de estrategia más aclamados de todos los tiempos, en una versión que ofrece impactantes gráficos 4K Ultra HD, una pista sonora completamente remasterizada y contenido totalmente nuevo'),
('ARK', 'ARK: Survival Evolved', 'Varado en las costas de una isla misteriosa, debes aprender a sobrevivir. Usa tu astucia para matar o domesticar a las criaturas primigenias que deambulan por la tierra y encuentra a otros jugadores para sobrevivir, dominar ... ¡y escapar!'),
('BTLE4', 'Batterfield 4', 'Sumergete en el caos de la guerra total, en una serie de experiencias impredecibles y alucinantes, posibles gracias a la potencia de Frostbite 3.'),
('CSGO', 'Counter Strike Global Offencive', 'amplía el juego de acción por equipos que fue pionero cuando se lanzó hace 19 años. CS: GO presenta nuevos mapas, personajes, armas y modos de juego Disparios en primera persona'),
('DBD', 'Death by Daylight', 'Dead by Daylight es un juego de terror multijugador (4vs1) en el que un jugador asume el papel del asesino salvaje, y los otros cuatro jugadores juegan como supervivientes, tratando de escapar del asesino y evitar ser atrapado y asesinado.'),
('Dota2', 'Dota 2', 'Todos los días, millones de jugadores de todo el mundo entran en combate como uno de los más de cien héroes de Dota. Y no importa si es su décima hora de juego o su milésima, siempre hay algo nuevo por descubrir. Con actualizaciones periódicas que garantizan una evolución constante de la jugabilidad, las funciones y los héroes, Dota 2 ha cobrado vida propia.'),
('GTAV', 'Grand Theft Auto V', 'Grand Theft Auto V para PC ofrece a los jugadores la opción de explorar el galardonado mundo de Los Santos y el condado de Blaine con una resolución de 4K y disfrutar del juego a 60 fotogramas por segundo.'),
('L4D2', 'Left 4 Dead 2', 'Este FPS cooperativo de acción terrorífica lleva a tus amigos y a ti a través de ciudades, pantanos y cementerios del Profundo Sur de EE. UU.'),
('LOL', 'League of Legends', 'League of Legends es un juego de estrategia por equipos en el que dos equipos de cinco campeones se enfrentan para ver quién destruye antes la base del otro. Elige de entre un elenco de 140 campeones para realizar jugadas épicas, asesinar rivales y derribar torretas para alzarte con la victoria.'),
('POE', 'Path of Exile', 'Eres un exiliado, luchando por sobrevivir en el continente oscuro de Wraeclast, mientras luchas por ganar poder que te permitirá vengarte de aquellos que te hicieron daño. Creado por jugadores incondicionales, Path of Exile es un juego de rol de acción en línea ambientado en un oscuro mundo de fantasía.'),
('TERRA', 'Terraria', '¡Excava, lucha, explora, construye! Nada es imposible en este juego lleno de aventura. ¡Four Pack también disponible!'),
('TOPO', 'Minecraft', 'Explora tu propio mundo unico, sobrevive a la noche y crea todo lo que puedas imaginar');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `juegos_categoria`
--

CREATE TABLE `juegos_categoria` (
  `id_juego` varchar(5) NOT NULL,
  `id_categoria` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `juegos_categoria`
--

INSERT INTO `juegos_categoria` (`id_juego`, `id_categoria`) VALUES
('4HONO', 4),
('4HONO', 11),
('4HONO', 14),
('4nite', 7),
('4nite', 8),
('4nite', 9),
('AOE2', 4),
('AOE2', 5),
('ARK', 4),
('ARK', 7),
('ARK', 8),
('ARK', 13),
('BTLE4', 1),
('BTLE4', 2),
('BTLE4', 4),
('CSGO', 1),
('CSGO', 2),
('CSGO', 4),
('DBD', 4),
('DBD', 6),
('Dota2', 2),
('Dota2', 3),
('Dota2', 4),
('Dota2', 5),
('GTAV', 4),
('GTAV', 7),
('GTAV', 11),
('L4D2', 1),
('L4D2', 4),
('L4D2', 10),
('LOL', 2),
('LOL', 3),
('LOL', 4),
('LOL', 5),
('POE', 15),
('POE', 16),
('TERRA', 7),
('TERRA', 8),
('TERRA', 12),
('TOPO', 7),
('TOPO', 8),
('TOPO', 12);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `telefonos`
--

CREATE TABLE `telefonos` (
  `numero` varchar(15) NOT NULL,
  `cod_area` varchar(5) NOT NULL,
  `id_usuario` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COMMENT='guarda los numeros de los usuarios, estos solo pueden tener ';

--
-- Volcado de datos para la tabla `telefonos`
--

INSERT INTO `telefonos` (`numero`, `cod_area`, `id_usuario`) VALUES
('4975141', '3100', 'fcytuader@edu.gob.ar'),
('156227924', '3100', 'prueba@gmail.com');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `ubicaciones`
--

CREATE TABLE `ubicaciones` (
  `id_ubicacion` int(11) NOT NULL,
  `acronimo` varchar(2) NOT NULL,
  `nombre` varchar(15) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `ubicaciones`
--

INSERT INTO `ubicaciones` (`id_ubicacion`, `acronimo`, `nombre`) VALUES
(1, 'BS', 'Buenos Aires'),
(2, 'CA', 'Catamarca'),
(3, 'CH', 'Chaco'),
(4, 'CT', 'Chubut'),
(5, 'CB', 'Cordoba'),
(6, 'CR', 'Corrientes'),
(7, 'ER', 'Entre Rios'),
(8, 'FO', 'Formosa'),
(9, 'JY', 'Jujuy'),
(10, 'LP', 'La Pampa'),
(11, 'LR', 'La Rioja'),
(12, 'MZ', 'Mendoza'),
(13, 'Mi', 'Misiones'),
(14, 'NQ', 'Neuquen'),
(15, 'RN', 'Rio Negro'),
(16, 'SA', 'Salta'),
(17, 'SJ', 'San Juan'),
(18, 'SL', 'San Luis'),
(19, 'SC', 'Santa Cruz'),
(20, 'SF', 'Santa Fe'),
(21, 'SE', 'Santiago del Es'),
(22, 'TF', 'Tierra del Fueg'),
(23, 'TU', 'Tucuman');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `usuarios`
--

CREATE TABLE `usuarios` (
  `correo` varchar(50) NOT NULL,
  `nombre` varchar(15) NOT NULL COMMENT 'nombre del usaurio',
  `contraseña` varchar(150) NOT NULL,
  `id_ubicacion` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `usuarios`
--

INSERT INTO `usuarios` (`correo`, `nombre`, `contraseña`, `id_ubicacion`) VALUES
('fcytuader@edu.gob.ar', 'fcytuader', '3372089fdaf1b8a60cc6790b01909bb6d0b6e6683a90645dee81bf451cf6ce68', 7),
('prueba@gmail.com', 'prueba', 'a665a45920422f9d417e4867efdc4fb8a04a1f3fff1fa07e998e86f7f7a27ae3', 7);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `usuario_juego`
--

CREATE TABLE `usuario_juego` (
  `id_juego` varchar(5) NOT NULL,
  `id_usuario` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `usuario_juego`
--

INSERT INTO `usuario_juego` (`id_juego`, `id_usuario`) VALUES
('4nite', 'prueba@gmail.com');

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `amigos`
--
ALTER TABLE `amigos`
  ADD PRIMARY KEY (`id_usuario1`,`id_usuario2`),
  ADD KEY `id_usuario2` (`id_usuario2`);

--
-- Indices de la tabla `categoria`
--
ALTER TABLE `categoria`
  ADD PRIMARY KEY (`id_categoria`);

--
-- Indices de la tabla `juegos`
--
ALTER TABLE `juegos`
  ADD PRIMARY KEY (`Id_juego`);

--
-- Indices de la tabla `juegos_categoria`
--
ALTER TABLE `juegos_categoria`
  ADD PRIMARY KEY (`id_juego`,`id_categoria`),
  ADD KEY `id_categoria` (`id_categoria`);

--
-- Indices de la tabla `telefonos`
--
ALTER TABLE `telefonos`
  ADD PRIMARY KEY (`id_usuario`);

--
-- Indices de la tabla `ubicaciones`
--
ALTER TABLE `ubicaciones`
  ADD PRIMARY KEY (`id_ubicacion`),
  ADD UNIQUE KEY `acronimo` (`acronimo`);

--
-- Indices de la tabla `usuarios`
--
ALTER TABLE `usuarios`
  ADD PRIMARY KEY (`correo`),
  ADD UNIQUE KEY `nombre` (`nombre`),
  ADD UNIQUE KEY `ubicacion` (`correo`,`nombre`,`id_ubicacion`),
  ADD KEY `id_ubicacion` (`id_ubicacion`);

--
-- Indices de la tabla `usuario_juego`
--
ALTER TABLE `usuario_juego`
  ADD PRIMARY KEY (`id_juego`,`id_usuario`),
  ADD KEY `id_usuario` (`id_usuario`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `ubicaciones`
--
ALTER TABLE `ubicaciones`
  MODIFY `id_ubicacion` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=83;

--
-- Restricciones para tablas volcadas
--

--
-- Filtros para la tabla `amigos`
--
ALTER TABLE `amigos`
  ADD CONSTRAINT `amigos_ibfk_1` FOREIGN KEY (`id_usuario1`) REFERENCES `usuarios` (`correo`),
  ADD CONSTRAINT `amigos_ibfk_2` FOREIGN KEY (`id_usuario2`) REFERENCES `usuarios` (`correo`);

--
-- Filtros para la tabla `juegos_categoria`
--
ALTER TABLE `juegos_categoria`
  ADD CONSTRAINT `juegos_categoria_ibfk_1` FOREIGN KEY (`id_juego`) REFERENCES `juegos` (`Id_juego`),
  ADD CONSTRAINT `juegos_categoria_ibfk_2` FOREIGN KEY (`id_categoria`) REFERENCES `categoria` (`id_categoria`);

--
-- Filtros para la tabla `telefonos`
--
ALTER TABLE `telefonos`
  ADD CONSTRAINT `telefonos_ibfk_1` FOREIGN KEY (`id_usuario`) REFERENCES `usuarios` (`correo`);

--
-- Filtros para la tabla `usuarios`
--
ALTER TABLE `usuarios`
  ADD CONSTRAINT `usuarios_ibfk_2` FOREIGN KEY (`id_ubicacion`) REFERENCES `ubicaciones` (`id_ubicacion`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Filtros para la tabla `usuario_juego`
--
ALTER TABLE `usuario_juego`
  ADD CONSTRAINT `usuario_juego_ibfk_1` FOREIGN KEY (`id_usuario`) REFERENCES `usuarios` (`correo`),
  ADD CONSTRAINT `usuario_juego_ibfk_2` FOREIGN KEY (`id_juego`) REFERENCES `juegos` (`Id_juego`) ON DELETE NO ACTION ON UPDATE NO ACTION;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
