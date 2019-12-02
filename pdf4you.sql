-- phpMyAdmin SQL Dump
-- version 4.8.3
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 01-12-2019 a las 20:26:44
-- Versión del servidor: 10.1.36-MariaDB
-- Versión de PHP: 7.2.10

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `pdf4you`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `pdf`
--

CREATE TABLE `pdf` (
  `idPdf` int(11) NOT NULL,
  `imgPortada` varchar(255) NOT NULL DEFAULT 'vacio.png',
  `infoPdf` text NOT NULL,
  `nombrePdf` varchar(50) DEFAULT NULL,
  `downloadPdf` varchar(255) DEFAULT NULL,
  `premium` tinyint(1) DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `pdf`
--

INSERT INTO `pdf` (`idPdf`, `imgPortada`, `infoPdf`, `nombrePdf`, `downloadPdf`, `premium`) VALUES
(1, '/Control1_práctico-page-001.jpg', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Cras pellentesque tincidunt sem ac consectetur. Nunc scelerisque sagittis pharetra. Pellentesque efficitur, nibh ac tempor lobortis, ipsum libero varius est, non dictum orci eros vel mi. In sit amet arcu in erat tempor dignissim. Fusce in sapien tincidunt dolor consequat facilisis. Sed aliquam dignissim condimentum. Aenean condimentum odio tellus, vulputate finibus eros congue sit amet.', 'Examen01', '/Control1_práctico.pdf', 0),
(2, '/EJEMPLO_DE_CONSULTAS_PARA_LA_PRÁCTICA_INICIAL-page-001.jpg', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Cras pellentesque tincidunt sem ac consectetur. Nunc scelerisque sagittis pharetra. Pellentesque efficitur, nibh ac tempor lobortis, ipsum libero varius est, non dictum orci eros vel mi. In sit amet arcu in erat tempor dignissim. Fusce in sapien tincidunt dolor consequat facilisis. Sed aliquam dignissim condimentum. Aenean condimentum odio tellus, vulputate finibus eros congue sit amet.', 'EJEMPLO_DE_CONSULTAS_PARA_LA_PRÁCTICA_INICIAL', '/EJEMPLO_DE_CONSULTAS_PARA_LA_PRÁCTICA_INICIAL.pdf', 0),
(3, '/Ejemplos_organización_y_modos_de_acceso_a_los_ficheros-page-001.jpg', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Cras pellentesque tincidunt sem ac consectetur. Nunc scelerisque sagittis pharetra. Pellentesque efficitur, nibh ac tempor lobortis, ipsum libero varius est, non dictum orci eros vel mi. In sit amet arcu in erat tempor dignissim. Fusce in sapien tincidunt dolor consequat facilisis. Sed aliquam dignissim condimentum. Aenean condimentum odio tellus, vulputate finibus eros congue sit amet.', 'Ejemplos ficheros', '/Ejemplos_organización_y_modos_de_acceso_a_los_ficheros.pdf', 1),
(4, '/Ejercicio_11-page-001.jpg', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Cras pellentesque tincidunt sem ac consectetur. Nunc scelerisque sagittis pharetra. Pellentesque efficitur, nibh ac tempor lobortis, ipsum libero varius est, non dictum orci eros vel mi. In sit amet arcu in erat tempor dignissim. Fusce in sapien tincidunt dolor consequat facilisis. Sed aliquam dignissim condimentum. Aenean condimentum odio tellus, vulputate finibus eros congue sit amet.', 'Ejercicio 11', '/Ejercicio_11.pdf', 0),
(5, '/Ejercicio_12-page-001.jpg', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Cras pellentesque tincidunt sem ac consectetur. Nunc scelerisque sagittis pharetra. Pellentesque efficitur, nibh ac tempor lobortis, ipsum libero varius est, non dictum orci eros vel mi. In sit amet arcu in erat tempor dignissim. Fusce in sapien tincidunt dolor consequat facilisis. Sed aliquam dignissim condimentum. Aenean condimentum odio tellus, vulputate finibus eros congue sit amet.', 'Ejercicio 12', '/Ejercicio_12.pdf', 1),
(6, '/Ejercicios del 1 al 5-page-001.jpg', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Cras pellentesque tincidunt sem ac consectetur. Nunc scelerisque sagittis pharetra. Pellentesque efficitur, nibh ac tempor lobortis, ipsum libero varius est, non dictum orci eros vel mi. In sit amet arcu in erat tempor dignissim. Fusce in sapien tincidunt dolor consequat facilisis. Sed aliquam dignissim condimentum. Aenean condimentum odio tellus, vulputate finibus eros congue sit amet.', 'Ejercicios del 1 al 5', '/Ejercicios del 1 al 5.pdf', 0),
(7, '/Ejercicios_6_y_ 7-page-001.jpg', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Cras pellentesque tincidunt sem ac consectetur. Nunc scelerisque sagittis pharetra. Pellentesque efficitur, nibh ac tempor lobortis, ipsum libero varius est, non dictum orci eros vel mi. In sit amet arcu in erat tempor dignissim. Fusce in sapien tincidunt dolor consequat facilisis. Sed aliquam dignissim condimentum. Aenean condimentum odio tellus, vulputate finibus eros congue sit amet.', 'Ejercicios del 6 al 7', '/Ejercicios_6_y_ 7.pdf', 0),
(8, '/Ejercicios_8_y_9-page-001.jpg', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Cras pellentesque tincidunt sem ac consectetur. Nunc scelerisque sagittis pharetra. Pellentesque efficitur, nibh ac tempor lobortis, ipsum libero varius est, non dictum orci eros vel mi. In sit amet arcu in erat tempor dignissim. Fusce in sapien tincidunt dolor consequat facilisis. Sed aliquam dignissim condimentum. Aenean condimentum odio tellus, vulputate finibus eros congue sit amet.', 'Ejercicios 8 y 9', '/Ejercicios_8_y_9.pdf', 1),
(9, '/Ejercicios_de_Repaso_de_Tipos_de_Correspondencia-page-001.jpg', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Cras pellentesque tincidunt sem ac consectetur. Nunc scelerisque sagittis pharetra. Pellentesque efficitur, nibh ac tempor lobortis, ipsum libero varius est, non dictum orci eros vel mi. In sit amet arcu in erat tempor dignissim. Fusce in sapien tincidunt dolor consequat facilisis. Sed aliquam dignissim condimentum. Aenean condimentum odio tellus, vulputate finibus eros congue sit amet.', 'Ejercicios de repaso de tipos de correspondencia', '/Ejercicios_de_Repaso_de_Tipos_de_Correspondencia.pdf', 0),
(10, '/Nota-page-001.jpg', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Cras pellentesque tincidunt sem ac consectetur. Nunc scelerisque sagittis pharetra. Pellentesque efficitur, nibh ac tempor lobortis, ipsum libero varius est, non dictum orci eros vel mi. In sit amet arcu in erat tempor dignissim. Fusce in sapien tincidunt dolor consequat facilisis. Sed aliquam dignissim condimentum. Aenean condimentum odio tellus, vulputate finibus eros congue sit amet.', 'Nota para alumnos', '/Nota.pdf', 0),
(11, '/TEMA_1_ALMACENAMIENTO_DE_LA_INFORMACIÓN_(Parte_I).jpg', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Cras pellentesque tincidunt sem ac consectetur. Nunc scelerisque sagittis pharetra. Pellentesque efficitur, nibh ac tempor lobortis, ipsum libero varius est, non dictum orci eros vel mi. In sit amet arcu in erat tempor dignissim. Fusce in sapien tincidunt dolor consequat facilisis. Sed aliquam dignissim condimentum. Aenean condimentum odio tellus, vulputate finibus eros congue sit amet.', 'Tema 1: Almacenamiento de la información (1ª parte', '/TEMA_1_ALMACENAMIENTO_DE_LA_INFORMACIÓN_(Parte_I).pdf', 0),
(12, '/TEMA_1_ALMACENAMIENTO_DE_LA_INFORMACIÓN_(Parte_II).jpg', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Cras pellentesque tincidunt sem ac consectetur. Nunc scelerisque sagittis pharetra. Pellentesque efficitur, nibh ac tempor lobortis, ipsum libero varius est, non dictum orci eros vel mi. In sit amet arcu in erat tempor dignissim. Fusce in sapien tincidunt dolor consequat facilisis. Sed aliquam dignissim condimentum. Aenean condimentum odio tellus, vulputate finibus eros congue sit amet.', 'Tema 1: Almacenamiento de la información (1ª parte', '/TEMA_1_ALMACENAMIENTO_DE_LA_INFORMACIÓN_(Parte_II).pdf', 1),
(13, '/TEMA_2._Diagramas_ER_y_DED_(Parte_I)-page-001.jpg', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Cras pellentesque tincidunt sem ac consectetur. Nunc scelerisque sagittis pharetra. Pellentesque efficitur, nibh ac tempor lobortis, ipsum libero varius est, non dictum orci eros vel mi. In sit amet arcu in erat tempor dignissim. Fusce in sapien tincidunt dolor consequat facilisis. Sed aliquam dignissim condimentum. Aenean condimentum odio tellus, vulputate finibus eros congue sit amet.', 'Tema 2: Diagramas ER y DED (1ª parte)', '/TEMA_2._Diagramas_ER_y_DED_(Parte_I).pdf', 0),
(14, '/TEMA_2._Diagramas_ER_y_DED_(Parte_II)-page-001.jpg', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Cras pellentesque tincidunt sem ac consectetur. Nunc scelerisque sagittis pharetra. Pellentesque efficitur, nibh ac tempor lobortis, ipsum libero varius est, non dictum orci eros vel mi. In sit amet arcu in erat tempor dignissim. Fusce in sapien tincidunt dolor consequat facilisis. Sed aliquam dignissim condimentum. Aenean condimentum odio tellus, vulputate finibus eros congue sit amet.', 'Tema 2: Diagramas ER y DED (2ª parte)', '/TEMA_2._Diagramas_ER_y_DED_(Parte_II).pdf', 0),
(15, '/Tema1_Pt1-page-001.jpg', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Cras pellentesque tincidunt sem ac consectetur. Nunc scelerisque sagittis pharetra. Pellentesque efficitur, nibh ac tempor lobortis, ipsum libero varius est, non dictum orci eros vel mi. In sit amet arcu in erat tempor dignissim. Fusce in sapien tincidunt dolor consequat facilisis. Sed aliquam dignissim condimentum. Aenean condimentum odio tellus, vulputate finibus eros congue sit amet.', 'Tema 1 (1ª parte)', '/Tema1_Pt1.pdf', 0),
(16, '/Tema1_Pt2-page-001.jpg', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Cras pellentesque tincidunt sem ac consectetur. Nunc scelerisque sagittis pharetra. Pellentesque efficitur, nibh ac tempor lobortis, ipsum libero varius est, non dictum orci eros vel mi. In sit amet arcu in erat tempor dignissim. Fusce in sapien tincidunt dolor consequat facilisis. Sed aliquam dignissim condimentum. Aenean condimentum odio tellus, vulputate finibus eros congue sit amet.', 'Tema 1 (2ª parte)', '/Tema1_Pt2.pdf', 1);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `usuario`
--

CREATE TABLE `usuario` (
  `idUsu` int(11) NOT NULL,
  `email` varchar(255) NOT NULL,
  `password` varchar(32) NOT NULL,
  `nombre` varchar(100) NOT NULL,
  `apellidos` varchar(100) NOT NULL,
  `permisos` bit(1) NOT NULL DEFAULT b'0'
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `usuario`
--

INSERT INTO `usuario` (`idUsu`, `email`, `password`, `nombre`, `apellidos`, `permisos`) VALUES
(0, 'admin@admin.com', '827ccb0eea8a706c4c34a16891f84e7b', 'Jony', 'Walker', b'0'),
(7, 'mail@mail.com', '040b7cf4a55014e185813e0644502ea9', 'Jony', 'Walker', b'0'),
(8, 'user@user.com', 'ee11cbb19052e40b07aac0ca060c23ee', 'Cindy', 'Nero', b'0');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `usuario_pdf`
--

CREATE TABLE `usuario_pdf` (
  `idUsu` int(11) NOT NULL,
  `idPdf` int(11) NOT NULL,
  `puntuacion` int(11) NOT NULL DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `pdf`
--
ALTER TABLE `pdf`
  ADD PRIMARY KEY (`idPdf`);

--
-- Indices de la tabla `usuario`
--
ALTER TABLE `usuario`
  ADD PRIMARY KEY (`idUsu`);

--
-- Indices de la tabla `usuario_pdf`
--
ALTER TABLE `usuario_pdf`
  ADD PRIMARY KEY (`idUsu`,`idPdf`) USING BTREE,
  ADD KEY `fk_usuario_pdf` (`idPdf`) USING BTREE;

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `pdf`
--
ALTER TABLE `pdf`
  MODIFY `idPdf` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;

--
-- AUTO_INCREMENT de la tabla `usuario`
--
ALTER TABLE `usuario`
  MODIFY `idUsu` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- Restricciones para tablas volcadas
--

--
-- Filtros para la tabla `usuario_pdf`
--
ALTER TABLE `usuario_pdf`
  ADD CONSTRAINT `usuario_pdf_ibfk_1` FOREIGN KEY (`idUsu`) REFERENCES `usuario` (`idUsu`),
  ADD CONSTRAINT `usuario_pdf_ibfk_2` FOREIGN KEY (`idPdf`) REFERENCES `pdf` (`idPdf`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
