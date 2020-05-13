-- phpMyAdmin SQL Dump
-- version 5.0.1
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 13-05-2020 a las 19:12:41
-- Versión del servidor: 10.4.11-MariaDB
-- Versión de PHP: 7.2.28

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `proyectos-luisvcardo`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `app_comic`
--

CREATE TABLE `app_comic` (
  `id_comic` int(11) NOT NULL,
  `editorial` varchar(50) CHARACTER SET utf8 NOT NULL,
  `titulo` varchar(50) CHARACTER SET utf8 NOT NULL,
  `cod_nom` varchar(50) CHARACTER SET utf8 NOT NULL,
  `year` int(11) NOT NULL,
  `guionista` varchar(50) CHARACTER SET utf8 NOT NULL,
  `dibujante` varchar(50) CHARACTER SET utf8 NOT NULL,
  `descripcion` varchar(2000) CHARACTER SET utf8 NOT NULL,
  `nombre_img` varchar(30) NOT NULL,
  `valor_rate` int(11) NOT NULL,
  `num_valoraciones` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `app_comic`
--

INSERT INTO `app_comic` (`id_comic`, `editorial`, `titulo`, `cod_nom`, `year`, `guionista`, `dibujante`, `descripcion`, `nombre_img`, `valor_rate`, `num_valoraciones`) VALUES
(1, 'Marvel', 'Born Again', 'BornAgain', 1986, 'Frank Miller', 'David Mazzucchelli', 'La historia detalla el descenso a la locura y la destitución de Matt a manos de Kingpin, y la lucha para construirse una nueva vida tras esto.', 'born_again.jpg', 0, 0),
(8, 'Marvel', 'El Guantelete del Infinito', 'ElGuanteletedelInfinito', 1992, 'Jim Starlin', 'George Perez', 'Para Thanos, el Guantelete del Infinito es el Santo Grial, el premio definitivo por su adoración hacia la muerte. Con él, lo controla todo. Liderados por Adam Warlock, los superhéroes de la Tierra representan la última esperanza del Universo.', 'guantelete.jpg', 0, 0),
(9, 'Marvel', 'Civil War', 'CivilWar', 2010, 'Mark Millar', 'Steve McNiven', '¡El mayor evento de la historia del cómic, al fin recopilado en un volumen imprescindible y plagado de extras! El Universo Marvel está cambiando. Es tiempo de elegir: ¿De qué lado estás? Un conflicto que se ha estado larvado durante años estalla al fin, rompiendo en dos a la comunidad superheroica, y enfrentando a amigo contra amigo, hermano contra hermano. Spiderman, Los Vengadores, La Patrulla-X, Los Cuatro Fantásticos... todos se verán afectados. Todos deberán elegir su lugar en la guerra. Nadie está a salvo en la saga que cambió para siempre las reglas del juego.', 'civil_war.jpg', 0, 0),
(13, 'DC', 'Batman Begins', 'BatmanBegins', 2005, 'Scott Beatty', 'Serge LaPointe', 'Un especial de 64 páginas en formato prestigio.', 'batman.jpg', 0, 0),
(14, 'DC', 'La Cosa del Pantano', 'LaCosadelPantano', 2018, 'Alan Moore', 'Alfredo Alcala', 'Tras un horrible accidente, el doctor Alec Holland se convirtió en la Cosa del Pantano, una criatura elemental que lucha contra la autodestrucción de un mundo dominado por la contaminación.', 'cosa.jpg', 0, 0),
(16, 'NORMA', 'SIN CITY', 'SINCITY', 2001, 'Frank Miller', 'Frank Miller', 'Oscuras historias se entremezclan en la ciudad del pecado. Violencia, alcohol, sexo y venganza es el día a día en esta ciudad.', 'sincity.jpg', 0, 0),
(17, 'DC', 'Superman Returns', 'SupermanReturns', 1999, 'juan dos', 'Pedro tre', 'Superman guelve!!', 'superman_returns.jpg', 0, 0),
(18, 'NORMA', '300', '300', 2005, 'Frank Miller', 'Lynn Varley', 'Lo del paso de las Termopilas!!', '300.jpg', 0, 0),
(19, 'MARVEL', 'Secret Wars', 'SecretWars', 2006, 'Jonathan Hickman', 'Paul renaud', 'Quién es quién Death Version', 'secret_wars.jpg', 0, 0);

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `app_comic`
--
ALTER TABLE `app_comic`
  ADD PRIMARY KEY (`id_comic`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `app_comic`
--
ALTER TABLE `app_comic`
  MODIFY `id_comic` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=20;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
