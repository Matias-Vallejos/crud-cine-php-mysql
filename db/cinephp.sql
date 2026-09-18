-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 14-07-2026 a las 01:34:45
-- Versión del servidor: 10.4.32-MariaDB
-- Versión de PHP: 8.2.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `cinephp`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `peliculas`
--

CREATE TABLE `peliculas` (
  `id` int(10) UNSIGNED NOT NULL,
  `titulo` varchar(255) NOT NULL,
  `director` varchar(255) NOT NULL,
  `genero` varchar(255) NOT NULL,
  `poster` varchar(255) NOT NULL,
  `duracion` int(10) UNSIGNED NOT NULL,
  `sinopsis` text NOT NULL,
  `horarios` varchar(255) DEFAULT NULL,
  `anio` int(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `peliculas`
--

INSERT INTO `peliculas` (`id`, `titulo`, `director`, `genero`, `poster`, `duracion`, `sinopsis`, `horarios`, `anio`) VALUES
(1, 'The Shawshank Redemption', 'Frank Darabont', 'Drama', 'shawshank.jpg', 142, 'Dos hombres encarcelados entablan una fuerte amistad a lo largo de los años, encontrando consuelo y redención eventual a través de actos de decencia común.', '15:00 18:30 21:00', 1994),
(2, 'El Padrino', 'Francis Ford Coppola', 'Crimen, Drama', 'padrino.jpg', 175, 'El envejecido patriarca de una dinastía del crimen organizado traslada el control de su imperio clandestino a su hijo reacio.', '', 1972),
(3, 'The Dark Knight', 'Christopher Nolan', 'Acción, Crimen, Drama', 'dark_knight.jpg', 152, 'Cuando la amenaza conocida como el Joker causa estragos y caos en Gotham, Batman debe aceptar una de las mayores pruebas psicológicas y físicas para combatir la injusticia.', '14:00 17:15 20:30 23:45', 2008),
(4, 'El Padrino Parte II', 'Francis Ford Coppola', 'Crimen, Drama', 'padrino2.jpg', 202, 'Se retratan los inicios de la vida y el gobierno de Vito Corleone en la ciudad de Nueva York en la década de 1920, mientras su hijo Michael se expande y aprieta su control sobre el sindicato del crimen familiar.', '16:30 21:15', 1974),
(5, '12 Angry Men', 'Sidney Lumet', 'Crimen, Drama', '12_angry_men.jpg', 96, 'Un miembro del jurado de un juicio por asesinato intenta evitar un error judicial obligando a sus compañeros a reconsiderar las pruebas.', '18:00 20:00 22:00', 1957),
(6, 'La lista de Schindler', 'Steven Spielberg', 'Biografía, Drama, Historia', 'schindler.jpg', 195, 'En la Polonia ocupada por los alemanes durante la Segunda Guerra Mundial, el industrial Oskar Schindler se preocupa por sus trabajadores judíos tras presenciar su persecución por los nazis.', '15:30 19:45', 1993),
(7, 'The Lord of the Rings: The Return of the King', 'Peter Jackson', 'Acción, Aventura, Drama', 'lotr3.jpg', 201, 'Gandalf y Aragorn lideran el Mundo de los Hombres contra el ejército de Sauron para distorsionar su mirada de Frodo y Sam mientras se acercan al Monte del Destino con el Anillo Único.', '14:30 19:00 23:00', 2003),
(8, 'Pulp Fiction', 'Quentin Tarantino', 'Crimen, Drama', 'pulp_fiction.jpg', 154, 'Las vidas de dos asesinos a sueldo, un boxeador, un gángster y su esposa, y un par de bandidos de poca monta se entrelazan en cuatro historias de violencia y redención.', '17:00 20:00 23:00', 1994),
(9, 'The Lord of the Rings: The Fellowship of the Ring', 'Peter Jackson', 'Acción, Aventura, Drama', 'lotr1.jpg', 178, 'Un humilde hobbit de la Comarca y ocho compañeros parten en un viaje para destruir el poderoso Anillo Único y salvar a la Tierra Media del Señor Oscuro Sauron.', '15:00 18:45 22:15', 2001),
(10, 'The Good, the Bad and the Ugly', 'Sergio Leone', 'Aventura, Western', 'good_bad_ugly.jpg', 178, 'Un cazarrecompensas se alía con un hombre mexicano en una búsqueda incómoda y tensa para encontrar una fortuna en oro escondida en un cementerio remoto.', '16:00 19:30', 1966),
(11, 'Forrest Gump', 'Robert Zemeckis', 'Drama, Romance', 'forrest_gump.jpg', 142, 'Las presidencias de Kennedy y Johnson, los acontecimientos de Vietnam, Watergate y otras historias históricas se desarrollan a través de la perspectiva de un hombre de Alabama con un coeficiente intelectual de 75.', '14:00 16:30 19:00 21:30', 1994),
(12, 'Fight Club', 'David Fincher', 'Drama', 'fight_club.jpg', 139, 'Un oficinista insomne y un desinteresado fabricante de jabones forman un club de lucha clandestino que evoluciona hacia algo mucho más grande.', '18:15 21:00 23:30', 1999),
(13, 'The Lord of the Rings: The Two Towers', 'Peter Jackson', 'Acción, Aventura, Drama', 'lotr2.jpg', 179, 'Mientras Frodo y Sam se acercan a Mordor con la ayuda del astuto Gollum, la confraternidad dividida se enfrenta al nuevo aliado de Sauron, Saruman, y a sus hordas de Isengard.', '14:30 18:00 21:30', 2002),
(14, 'Inception', 'Christopher Nolan', 'Acción, Ciencia Ficción', 'inception.jpg', 148, 'A un ladrón que roba secretos corporativos a través del uso de la tecnología de compartir sueños se le da la tarea inversa de plantar una idea en la mente de un director ejecutivo.', '15:00 18:00 21:00 23:45', 2010),
(15, 'Star Wars: Episode V - The Empire Strikes Back', 'Irvin Kershner', 'Acción, Aventura, Fantasía', 'star_wars5.jpg', 124, 'Después de que los rebeldes sean brutalmente superados por el Imperio en el planeta de hielo Hoth, Luke Skywalker comienza su entrenamiento Jedi con Yoda.', '14:00 16:45 19:30 22:15', 1980),
(16, 'The Matrix', 'Lana Wachowski, Lilly Wachowski', 'Acción, Ciencia Ficción', 'matrix.jpg', 136, 'Cuando un hermoso extraño lleva al hacker informático Neo a un inframundo sombrío, descubre la impactante verdad: la vida que conoce es el engaño elaborado de una ciberinteligencia malvada.', '16:00 19:00 22:00', 1999),
(17, 'Goodfellas', 'Martin Scorsese', 'Biografía, Crimen, Drama', 'goodfellas.jpg', 145, 'La historia de Henry Hill y su vida en la mafia, cubriendo su relación con su esposa Karen Hill y sus socios mafiosos Jimmy Conway y Tommy DeVito.', '17:30 20:30 23:15', 1990),
(18, 'One Flew Over the Cuckoo\'s Nest', 'Milos Forman', 'Drama', 'cuckoos_nest.jpg', 133, 'Un criminal de mente ágil simula locura para ser trasladado a una institución mental, donde se rebela contra la autoritaria enfermera jefe.', '16:00 18:45 21:30', 1975),
(19, 'Se7en', 'David Fincher', 'Crimen, Drama, Misterio', 'seven.jpg', 127, 'Dos detectives, uno novato y otro veterano, cazan a un asesino en serie que utiliza los siete pecados capitales como sus motivos principales.', '19:00 21:30 23:45', 1995),
(20, 'It\'s a Wonderful Life', 'Frank Capra', 'Drama, Familiar, Fantasía', 'wonderful_life.jpg', 130, 'Un ángel ayuda a un compasivo pero desesperado hombre de negocios mostrándole cómo habría sido la vida si él nunca hubiera existido.', '15:00 17:30 20:00', 1946);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `usuarios`
--

CREATE TABLE `usuarios` (
  `id` int(10) UNSIGNED NOT NULL,
  `email` varchar(255) NOT NULL,
  `nombre` varchar(30) NOT NULL,
  `apellido` varchar(30) NOT NULL,
  `fechaNacimiento` date NOT NULL,
  `contrasenia` varchar(255) NOT NULL,
  `rol` tinyint(3) UNSIGNED NOT NULL,
  `entradasGratis` tinyint(2) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `usuarios`
--

INSERT INTO `usuarios` (`id`, `email`, `nombre`, `apellido`, `fechaNacimiento`, `contrasenia`, `rol`, `entradasGratis`) VALUES
(1, 'admin@admin.com', 'juan', 'admin', '2008-07-08', '$2y$10$OFrTPPzV7S3UYAFyLMgGpegWrN4wsnTpWmhkdFT5P4ygUhVBugSUS', 2, 10),
(2, 'premium@premium.com', 'carlos', 'premium', '2004-09-14', '$2y$10$sl5FcNw4QaoPi3tnMH3kS.kYuUHKkCGsvONfwUgar.UDIYGDbKh.K', 1, 2),
(3, 'comun@comun.com', 'mati', 'comun', '1997-12-09', '$2y$10$ZlnW/VyOGzgpf/2CYup2oOvXPuEwh0DcF8vD5m061S1uOD4ODmzhC', 0, 0);

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `peliculas`
--
ALTER TABLE `peliculas`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `usuarios`
--
ALTER TABLE `usuarios`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `unique_email` (`email`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `peliculas`
--
ALTER TABLE `peliculas`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=30;

--
-- AUTO_INCREMENT de la tabla `usuarios`
--
ALTER TABLE `usuarios`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
