-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Servidor: localhost
-- Tiempo de generación: 02-01-2023 a las 13:12:35
-- Versión del servidor: 10.4.27-MariaDB
-- Versión de PHP: 7.4.33

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `biblioteca`
--
CREATE DATABASE IF NOT EXISTS `biblioteca` DEFAULT CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci;
USE `biblioteca`;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `admin`
--

CREATE TABLE `admin` (
  `correo` varchar(100) NOT NULL,
  `nombre` varchar(25) NOT NULL,
  `clave` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `admin`
--

INSERT INTO `admin` (`correo`, `nombre`, `clave`) VALUES
('administrador@gmail.com', 'Administrador', '827ccb0eea8a706c4c34a16891f84e7b');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `articulo`
--

CREATE TABLE `articulo` (
  `id_articulo` int(11) NOT NULL,
  `fk_id_genero` int(11) NOT NULL,
  `isbn` int(13) NOT NULL,
  `nombre` varchar(100) NOT NULL,
  `descripcion_short` varchar(255) NOT NULL,
  `descripcion` varchar(10000) NOT NULL,
  `stock` int(11) NOT NULL,
  `precio_venta` float NOT NULL,
  `imagen` varchar(50) NOT NULL,
  `destacado` tinyint(1) NOT NULL DEFAULT 0,
  `estado` tinyint(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `articulo`
--

INSERT INTO `articulo` (`id_articulo`, `fk_id_genero`, `isbn`, `nombre`, `descripcion_short`, `descripcion`, `stock`, `precio_venta`, `imagen`, `destacado`, `estado`) VALUES
(1, 6, 98142536, 'El arte de ser Raffaella Carrà', 'Un manual para ser libres y felices. Y para hacer el amor con quien quieras tú.', 'Raffaella cantaba, bailaba, brillaba. Peleaba, reía, conmovía. Se arriesgaba, cometía errores. Y todos, sin excepción, llegamos a amarla. Es el mayor legado de una artista que, creyendo firmemente en sí misma, nos dio confianza y nos liberó.', 54, 18.99, 'img/libros/98142536.jpg', 1, 1),
(2, 2, 984152637, 'La revolución rusa', 'La obra fundamental sobre la revolución rusa, un acontecimiento que marcó decisivamente el siglo XX.', 'Richard Pipes, historiador de máximo prestigio especializado en la Rusia contemporánea, publicó en 1992 este volumen sobre la revolución rusa que aún no ha sido superado.  Monumental y apasionante por la narración de un movimiento cuyo fin era «volver el mundo del revés», tal y como pretendía Trotski, el libro de Pipes presenta una revolución intelectual más que de clase, marcada desde el comienzo por el terror y con elementos propios de un golpe de estado. Una obra fundamental.', 149, 40.75, 'img/libros/984152637.jpg', 1, 0),
(3, 1, 2147483647, 'La amante del populismo', 'Margherita Sarfatti (1880-1961), periodista e italiana', 'Margherita Sarfatti (1880-1961), periodista e intelectual italiana, hija de una rica familia veneciana de origen judío, fue biógrafa de Benito Mussolini -además de su amante durante veinte años- y compartió con él momentos decisivos en la fundación y el crecimiento del movimiento fascista, que es la evidente raíz del populismo, tanto de derechas como de izquierdas. Marcos Aguinis, tras una extensa y rigurosa investigación, recupera su voz y la despliega en un notable reportaje histórico en el que, a partir de la obra escrita de Margherita, y a través del ensamble de historia, crítica, ensayo y novela, construye una entrevista singular y en más de un sentido reveladora. La conversación, siempre amable pero nunca complaciente, se desarrolla ágil, aguda, inteligente y desparpajada en su decurso ningún aspecto de la vida privada y de la acción pública del hombre que impuso a Italia un régimen totalitario y autocrático es dejado de lado, ningún detalle es eludido. Por estas páginas desfilan las primeras armas de Mussolini como periodista, su carrera militar, su ascenso político, su vínculo con Adolf Hitler y su decisiva participación en la Segunda Guerra Mundial, pero también su volcánica intimidad y los aspectos más oscuros de su personalidad. Auténtica obra maestra, La amante del populismo ratifica a Aguinis como uno de los intelectuales más lúcidos de nuestro tiempo.', 50, 19.95, 'img/libros/9874125344.jpg', 1, 1),
(4, 5, 2147483647, 'Enola Holmes 2', '¡Enola ha vuelto con una nueva y distinguida aventura!', 'En esta entrega, Enola Holmes se ve obligada a garantizar la seguridad de Lady Cecily, y también su libertad. El detestable Sir Eustace Alistair ha encerrado a su hija zurda en su dormitorio. Enola llevará a cabo una arriesgada pero exitosa maniobra de fuga a altas horas de la noche, y acogerá a Cecily en su propio alojamiento secreto. Sin embargo, alguien le pisa los talones: ¡Sherlock!  Así da comienzo una emocionante aventura. ¿Cómo podrá Enola proteger a Lady Cecily de su padre? ¿Y qué hará Lady Cecily, plantarle cara o regresar a su personalidad diestra y obediente?  Reseñas:  «Una chica empoderada, capaz y muy lista. La serie Enola Holmes transmite el potente mensaje de que puedes hacer lo que quieras si te lo propones. ¡Y lo muestra con mucha emoción y grandes dosis de aventura!».  Millie Bobby Brown  «Ha pasado una década desde que Springer escribió el primer caso de Enola, y este es un excelente puerto de entrada tanto para los ya fans como para los recién llegados. La voz de Enola, con una afición desmesurada por hacer listas, es encantadora: humorística y sarcástica en su justa medida».', 50, 15.2, 'img/libros/9876543652.jpg', 1, 1),
(5, 5, 98546552, 'Cosas de tetras', 'Que se te rompan las alas no es motivo suficiente para dejar de volar.', 'A Alan le encantaban el deporte y las piruetas aéreas. Pero un buen día de 2018, la vida decidió ponerle un enorme obstáculo: una mala caída le produjo una lesión medular y las piernas dejaron de responderle.  Ahora es tetrapléjico. Y también un modelo de superación, de no rendirse, de darle a su vida una nueva perspectiva para continuar adelante, experiencias que cuenta en sus redes sociales.  En este libro, Alan nos demuestra que la vida es un alud imparable y que, a pesar de los obstáculos, puede seguir siendo él mismo.', 50, 16.1, 'img/libros/98546552.jpg', 1, 1),
(6, 4, 98569858, 'Historia disparatada', 'Un repaso visual y en clave de humor a la historia de la monarquía.', 'Tanto si no te pierdes un desfile real como si eres un republicano acérrimo, tal vez conozcas un montón de datos aleatorios sobre reyes y reinas. Pero ¿sabes cómo ha sobrevivido la monarquía hasta nuestros días?', 130, 18.9, 'img/libros/98569858.jpg', 1, 1),
(7, 1, 142536989, 'La Marato sempre batega', 'Un llibre solidari dirigit a tots els públics.', 'Alguns dels millors il·lustradors de Catalunya han ajuntat per crear aquest preciós volum artístic dedicat a les malalties del cor, el tema de la Marató de TV3 de aquest any 2022, sota el lema: La Marató sempre batega. Un llibre solidari dirigit a tots els públics.', 201, 11.4, 'img/libros142536989.jpg', 0, 1);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `detalle_factura`
--

CREATE TABLE `detalle_factura` (
  `id_detallepedido` int(11) NOT NULL,
  `fk_id_factura` int(11) NOT NULL,
  `fk_id_articulo` int(11) NOT NULL,
  `cantidad` int(11) NOT NULL,
  `precio` float NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `detalle_factura`
--

INSERT INTO `detalle_factura` (`id_detallepedido`, `fk_id_factura`, `fk_id_articulo`, `cantidad`, `precio`) VALUES
(1, 2, 1, 2, 300),
(3, 2, 2, 5, 99),
(4, 3, 2, 1, 40.75);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `estado_factura`
--

CREATE TABLE `estado_factura` (
  `id_estado` int(11) NOT NULL,
  `estado` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `estado_factura`
--

INSERT INTO `estado_factura` (`id_estado`, `estado`) VALUES
(1, 'pendiente'),
(2, 'enviado'),
(3, 'entregado');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `factura`
--

CREATE TABLE `factura` (
  `id_factura` int(11) NOT NULL,
  `fk_id_usuario` int(11) DEFAULT NULL,
  `fecha` date NOT NULL,
  `total` float NOT NULL,
  `estado` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `factura`
--

INSERT INTO `factura` (`id_factura`, `fk_id_usuario`, `fecha`, `total`, `estado`) VALUES
(2, 1, '2022-11-09', 200, 3),
(3, 1, '2022-12-28', 45.75, 1);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `generos`
--

CREATE TABLE `generos` (
  `id_genero` int(11) NOT NULL,
  `nombre` varchar(50) NOT NULL,
  `estado` tinyint(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `generos`
--

INSERT INTO `generos` (`id_genero`, `nombre`, `estado`) VALUES
(0, 'Sin genero', 1),
(1, 'Suspense', 1),
(2, 'Terror', 1),
(4, 'Policíaca', 1),
(5, 'Humor', 1),
(6, 'Biografia', 1),
(7, 'Ficción', 1),
(8, 'Infantil', 1),
(9, 'Novela', 1),
(10, 'Cómic', 1);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `usuario`
--

CREATE TABLE `usuario` (
  `id_usuario` int(20) NOT NULL,
  `nombre` varchar(100) NOT NULL,
  `apellidos` varchar(100) NOT NULL,
  `direccion` varchar(70) NOT NULL,
  `email` varchar(50) NOT NULL,
  `clave` varchar(200) NOT NULL,
  `foto` varchar(60) NOT NULL,
  `estado` tinyint(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `usuario`
--

INSERT INTO `usuario` (`id_usuario`, `nombre`, `apellidos`, `direccion`, `email`, `clave`, `foto`, `estado`) VALUES
(1, 'Vlad', 'Pasichnyk', 'C/VisualStudio', 'vlad@gmail.com', '827ccb0eea8a706c4c34a16891f84e7b', 'img/usuarios/1.jpg', 1),
(2, 'Pepe', 'Garcia', 'Mi casa', 'pepe@gmail.com', '827ccb0eea8a706c4c34a16891f84e7b', '', 1),
(8, 'Pepe', 'sdada', '321', '123@gmail.com', '202cb962ac59075b964b07152d234b70', '', 1),
(9, 'Pepe', 'sdada', '321', '1234@gmail.com', '81dc9bdb52d04dc20036dbd8313ed055', '', 1),
(10, 'Gerard', 'Bejarano', 'C/Visual Paradigm', 'gerard@gmail.com', '64d8be661d8a79416eb6662db51e7118', '', 1);

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `articulo`
--
ALTER TABLE `articulo`
  ADD PRIMARY KEY (`id_articulo`),
  ADD KEY `FK_articulo_generos` (`fk_id_genero`);

--
-- Indices de la tabla `detalle_factura`
--
ALTER TABLE `detalle_factura`
  ADD PRIMARY KEY (`id_detallepedido`) USING BTREE,
  ADD KEY `FK_detalle_factura_articulo` (`fk_id_articulo`),
  ADD KEY `FK_detalle_factura_factura` (`fk_id_factura`) USING BTREE;

--
-- Indices de la tabla `estado_factura`
--
ALTER TABLE `estado_factura`
  ADD PRIMARY KEY (`id_estado`),
  ADD KEY `id_estado` (`id_estado`);

--
-- Indices de la tabla `factura`
--
ALTER TABLE `factura`
  ADD PRIMARY KEY (`id_factura`) USING BTREE,
  ADD KEY `FK_factura_usuario` (`fk_id_usuario`),
  ADD KEY `estado` (`estado`),
  ADD KEY `estado_2` (`estado`);

--
-- Indices de la tabla `generos`
--
ALTER TABLE `generos`
  ADD PRIMARY KEY (`id_genero`) USING BTREE;

--
-- Indices de la tabla `usuario`
--
ALTER TABLE `usuario`
  ADD PRIMARY KEY (`id_usuario`),
  ADD UNIQUE KEY `email` (`email`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `articulo`
--
ALTER TABLE `articulo`
  MODIFY `id_articulo` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT de la tabla `detalle_factura`
--
ALTER TABLE `detalle_factura`
  MODIFY `id_detallepedido` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT de la tabla `factura`
--
ALTER TABLE `factura`
  MODIFY `id_factura` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT de la tabla `generos`
--
ALTER TABLE `generos`
  MODIFY `id_genero` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT de la tabla `usuario`
--
ALTER TABLE `usuario`
  MODIFY `id_usuario` int(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- Restricciones para tablas volcadas
--

--
-- Filtros para la tabla `articulo`
--
ALTER TABLE `articulo`
  ADD CONSTRAINT `FK_articulo_generos` FOREIGN KEY (`fk_id_genero`) REFERENCES `generos` (`id_genero`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Filtros para la tabla `detalle_factura`
--
ALTER TABLE `detalle_factura`
  ADD CONSTRAINT `FK_detalle_factura_articulo` FOREIGN KEY (`fk_id_articulo`) REFERENCES `articulo` (`id_articulo`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `FK_detalle_factura_factura` FOREIGN KEY (`fk_id_factura`) REFERENCES `factura` (`id_factura`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Filtros para la tabla `factura`
--
ALTER TABLE `factura`
  ADD CONSTRAINT `FK_factura_usuario` FOREIGN KEY (`fk_id_usuario`) REFERENCES `usuario` (`id_usuario`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `factura_ibfk_1` FOREIGN KEY (`estado`) REFERENCES `estado_factura` (`id_estado`) ON DELETE NO ACTION ON UPDATE NO ACTION;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
