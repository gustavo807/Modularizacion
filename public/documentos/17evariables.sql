-- phpMyAdmin SQL Dump
-- version 4.5.1
-- http://www.phpmyadmin.net
--
-- Servidor: 127.0.0.1
-- Tiempo de generaci�n: 05-01-2017 a las 16:20:23
-- Versi�n del servidor: 10.1.13-MariaDB
-- Versi�n de PHP: 5.6.23

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES latin1 */;

--
-- Base de datos: `modularizacion`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `evariables`
--

CREATE TABLE `evariables` (
  `id` int(10) UNSIGNED NOT NULL,
  `opcion` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `categoria` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `variable` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `porcentaje` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Volcado de datos para la tabla `evariables`
--

INSERT INTO `evariables` (`id`, `opcion`, `categoria`, `variable`, `porcentaje`, `created_at`, `updated_at`) VALUES
(1, 'Tecnolog�a ya disponible en la empresa', 'Disponibilidad de la tecnolog�a (producto y proceso)', 'RIESGO T�CNICO', '5', NULL, NULL),
(2, 'Tecnolog�a disponible pero fuera de la empresa', 'Disponibilidad de la tecnolog�a (producto y proceso)', 'RIESGO T�CNICO', '25', NULL, NULL),
(3, 'Nueva tecnolog�a con factibilidad demostrada', 'Disponibilidad de la tecnolog�a (producto y proceso)', 'RIESGO T�CNICO', '50', NULL, NULL),
(4, 'Nueva tecnolog�a, factibilidad no demostrada', 'Disponibilidad de la tecnolog�a (producto y proceso)', 'RIESGO T�CNICO', '75', NULL, NULL),
(5, 'Nueva invenci�n, nunca se ha llevado a la pr�ctica', 'Disponibilidad de la tecnolog�a (producto y proceso)', 'RIESGO T�CNICO', '100', NULL, NULL),
(6, 'Gran experiencia en la  tecnolog�a existente', 'Sinergias tecnol�gicas', 'RIESGO T�CNICO', '10', NULL, NULL),
(7, 'Experiencia con la tecnolog�a ya existente', 'Sinergias tecnol�gicas', 'RIESGO T�CNICO', '40', NULL, NULL),
(8, 'Alguna experiencia y expertise en esta tecnolog�a, requiere adquirir algunas nuevas capacidades.', 'Sinergias tecnol�gicas', 'RIESGO T�CNICO', '70', NULL, NULL),
(9, 'Poca o nula experiencia en esta tecnolog�a, requiere de contratar o adquirir nuevas capacidades.', 'Sinergias tecnol�gicas', 'RIESGO T�CNICO', '100', NULL, NULL),
(10, 'Factibilidad t�cnica claramente demostrada', 'Factibilidad t�cnica demostrada del producto o proceso', 'RIESGO T�CNICO', '10', NULL, NULL),
(11, 'Casi ha sido posible demostrar su uso en la etapa temprana del desarrollo', 'Factibilidad t�cnica demostrada del producto o proceso', 'RIESGO T�CNICO', '40', NULL, NULL),
(12, 'Demostraci�n limitada', 'Factibilidad t�cnica demostrada del producto o proceso', 'RIESGO T�CNICO', '70', NULL, NULL),
(13, 'No ha sido posible la demostraci�n de factibilidad', 'Factibilidad t�cnica demostrada del producto o proceso', 'RIESGO T�CNICO', '100', NULL, NULL),
(14, 'La soluci�n est� bien definida t�cnicamente y se puede alcanzar', 'Incertidumbre t�cnica', 'RIESGO T�CNICO', '10', NULL, NULL),
(15, 'Se puede definir la soluci�n t�cnica, pero permanecen las incertidumbres', 'Incertidumbre t�cnica', 'RIESGO T�CNICO', '40', NULL, NULL),
(16, 'Algunas incertidumbres t�cnicas significativas', 'Incertidumbre t�cnica', 'RIESGO T�CNICO', '70', NULL, NULL),
(17, 'Numerosas y grandes incertidumbres t�cnicas, se dificulta definir la soluci�n', 'Incertidumbre t�cnica', 'RIESGO T�CNICO', '100', NULL, NULL),
(18, 'Gran experiencia en esta �rea, puede usar la infraestructura existente con modificaciones m�nimas', 'Sinergias producci�n', 'RIESGO DE PRODUCCI�N', '10', NULL, NULL),
(19, 'Experiencia en esta �rea, requiere modificaciones simples', 'Sinergias producci�n', 'RIESGO DE PRODUCCI�N', '40', NULL, NULL),
(20, 'Alguna experiencia en esta �rea, requiere de grandes modificaciones a la infraestructura actual', 'Sinergias producci�n', 'RIESGO DE PRODUCCI�N', '70', NULL, NULL),
(21, 'Peque�a o nula experiencia en esta �rea, requiere de una nueva planta, reestructura y entrenamiento', 'Sinergias producci�n', 'RIESGO DE PRODUCCI�N', '100', NULL, NULL),
(22, 'Sin dificultad', 'Complejidad de la fabricaci�n del producto', 'RIESGO DE PRODUCCI�N', '10', NULL, NULL),
(23, 'Representa un reto pero que se puede alcanzar', 'Complejidad de la fabricaci�n del producto', 'RIESGO DE PRODUCCI�N', '40', NULL, NULL),
(24, 'Algunos obst�culos', 'Complejidad de la fabricaci�n del producto', 'RIESGO DE PRODUCCI�N', '70', NULL, NULL),
(25, 'Muchos obst�culos', 'Complejidad de la fabricaci�n del producto', 'RIESGO DE PRODUCCI�N', '100', NULL, NULL),
(26, 'Altas competencias y experiencia del personal de producci�n para la nueva tecnolog�a', 'Competencias del personal para la producci�n', 'RIESGO DE PRODUCCI�N', '10', NULL, NULL),
(27, 'Media competencias y experiencia del personal de producci�n para la nueva tecnolog�a', 'Competencias del personal para la producci�n', 'RIESGO DE PRODUCCI�N', '40', NULL, NULL),
(28, 'Baja competencias y experiencia del personal de producci�n para la nueva tecnolog�a', 'Competencias del personal para la producci�n', 'RIESGO DE PRODUCCI�N', '70', NULL, NULL),
(29, 'Nulas competencias y experiencia del personal para la fabricaci�n del nuevo proyecto', 'Competencias del personal para la producci�n', 'RIESGO DE PRODUCCI�N', '100', NULL, NULL),
(30, 'Mejora de lo que ya se produce en la empresa', 'Tama�o de la brecha tecnol�gica', 'RIESGO DE PRODUCCI�N', '10', NULL, NULL),
(31, 'El cambio es peque�o con respecto a lo que se hace en la empresa', 'Tama�o de la brecha tecnol�gica', 'RIESGO DE PRODUCCI�N', '40', NULL, NULL),
(32, 'El cambio propuesto es muy diferente a lo que actualmente se hace en la empresa', 'Tama�o de la brecha tecnol�gica', 'RIESGO DE PRODUCCI�N', '70', NULL, NULL),
(33, 'Abismo entre el conocimiento pr�ctico actual y el objetivo del proyecto', 'Tama�o de la brecha tecnol�gica', 'RIESGO DE PRODUCCI�N', '100', NULL, NULL),
(34, 'Extensi�n modesta de los requerimientos de desempe�o y especificaciones existentes', 'Cumplimiento de especificaciones del cliente', 'RIESGO DE PRODUCCI�N', '5', NULL, NULL),
(35, 'Extensi�n mayor de especificaciones o desempe�o', 'Cumplimiento de especificaciones del cliente', 'RIESGO DE PRODUCCI�N', '25', NULL, NULL),
(36, 'Especificaciones nuevas en un dominio nuevo de desempe�o', 'Cumplimiento de especificaciones del cliente', 'RIESGO DE PRODUCCI�N', '50', NULL, NULL),
(37, 'Algunas especificaciones son desconocidas o incomprensibles', 'Cumplimiento de especificaciones del cliente', 'RIESGO DE PRODUCCI�N', '75', NULL, NULL),
(38, 'No existen especificaciones conocidas', 'Cumplimiento de especificaciones del cliente', 'RIESGO DE PRODUCCI�N', '100', NULL, NULL),
(39, 'El producto es el mejor en todos los atributos', 'Vector de diferenciaci�n del producto', 'RIESGO COMERCIAL', '5', NULL, NULL),
(40, 'El producto es el mejor en algunos atributos pero no en todos', 'Vector de diferenciaci�n del producto', 'RIESGO COMERCIAL', '25', NULL, NULL),
(41, 'El producto ofrece ventajas en uno o dos atributos', 'Vector de diferenciaci�n del producto', 'RIESGO COMERCIAL', '50', NULL, NULL),
(42, 'El producto tiene el mismo perfil', 'Vector de diferenciaci�n del producto', 'RIESGO COMERCIAL', '75', NULL, NULL),
(43, 'El producto ofrece ventajas en uno o dos atributos, pero es peor en todos los otros', 'Vector de diferenciaci�n del producto', 'RIESGO COMERCIAL', '100', NULL, NULL),
(44, 'El producto es claramente superior a los competidores', 'Diferenciaci�n con respecto a la competencia', 'RIESGO COMERCIAL', '10', NULL, NULL),
(45, 'El producto es mejor que los competidores', 'Diferenciaci�n con respecto a la competencia', 'RIESGO COMERCIAL', '40', NULL, NULL),
(46, 'El producto es marginalmente mejor que los competidores', 'Diferenciaci�n con respecto a la competencia', 'RIESGO COMERCIAL', '70', NULL, NULL),
(47, 'El producto es igual a los competidores', 'Diferenciaci�n con respecto a la competencia', 'RIESGO COMERCIAL', '100', NULL, NULL),
(48, 'El producto ofrece beneficios y caracter�sticas positivas y �nicas', 'Beneficios al cliente', 'RIESGO COMERCIAL', '10', NULL, NULL),
(49, 'El producto ofrece caracter�sticas y beneficios �nicos', 'Beneficios al cliente', 'RIESGO COMERCIAL', '40', NULL, NULL),
(50, 'El producto ofrece algunos beneficios pero no son importantes para el cliente', 'Beneficios al cliente', 'RIESGO COMERCIAL', '70', NULL, NULL),
(51, 'El producto no ofrece beneficios ni tiene caracter�sticas especiales', 'Beneficios al cliente', 'RIESGO COMERCIAL', '100', NULL, NULL),
(65, 'El producto es claramente superior a los competidores en cubrir las necesidades del cliente', 'Cubre las necesidades del cliente', 'RIESGO COMERCIAL', '10', NULL, NULL),
(66, 'El producto es mejor que los competidores en cubrir las necesidades del cliente', 'Cubre las necesidades del cliente', 'RIESGO COMERCIAL', '40', NULL, NULL),
(67, 'El producto es marginalmente mejor que los competidores en cubrir las necesidades del cliente', 'Cubre las necesidades del cliente', 'RIESGO COMERCIAL', '70', NULL, NULL),
(68, 'El producto es igual a los competidores en lo referente a cubrir las necesidades del cliente', 'Cubre las necesidades del cliente', 'RIESGO COMERCIAL', '100', NULL, NULL),
(69, 'El producto tiene claramente un excelente valor monetario para el cliente', 'Valor monetario para el cliente', 'RIESGO COMERCIAL', '10', NULL, NULL),
(70, 'El producto tiene un buen valor monetario para el cliente', 'Valor monetario para el cliente', 'RIESGO COMERCIAL', '40', NULL, NULL),
(71, 'El producto ofrece un mejor valor monetario al cliente', 'Valor monetario para el cliente', 'RIESGO COMERCIAL', '70', NULL, NULL),
(72, 'El producto es igual que los competidores, valor bajo para el cliente', 'Valor monetario para el cliente', 'RIESGO COMERCIAL', '100', NULL, NULL),
(73, 'Muy buen apalancamiento con la experiencia de marketing, expertise y recursos disponibles', 'Sinergias de marketing (distribuci�n, fuerza de ventas)', 'RIESGO COMERCIAL', '10', NULL, NULL),
(74, 'Experiencia considerable de marketing y recursos amplios para el proyecto', 'Sinergias de marketing (distribuci�n, fuerza de ventas)', 'RIESGO COMERCIAL', '40', NULL, NULL),
(75, 'Alguna experiencia de mercado y recursos limitados para el proyecto', 'Sinergias de marketing (distribuci�n, fuerza de ventas)', 'RIESGO COMERCIAL', '70', NULL, NULL),
(76, 'No experiencia en marketing ni en disponibilidad de recursos para el proyecto', 'Sinergias de marketing (distribuci�n, fuerza de ventas)', 'RIESGO COMERCIAL', '100', NULL, NULL),
(77, 'La cadena de valor est� disponible para la empresa', 'Disponibilidad de elementos de la cadena de valor', 'RIESGO ESTRAT�GICO', '5', NULL, NULL),
(78, 'Se deben desarrollar algunos elementos en la cadena de valor ', 'Disponibilidad de elementos de la cadena de valor', 'RIESGO ESTRAT�GICO', '25', NULL, NULL),
(79, 'La cadena de valor est� rota, muchos elementos no est�n disponibles', 'Disponibilidad de elementos de la cadena de valor', 'RIESGO ESTRAT�GICO', '50', NULL, NULL),
(80, 'No existen elementos en la cadena de valor', 'Disponibilidad de elementos de la cadena de valor', 'RIESGO ESTRAT�GICO', '75', NULL, NULL),
(81, 'No existen en ninguna parte los elementos cr�ticos de la cadena de valor', 'Disponibilidad de elementos de la cadena de valor', 'RIESGO ESTRAT�GICO', '100', NULL, NULL),
(82, 'Alineaci�n fuerte con varios elementos claves de la estrategia', 'Alineaci�n con la estrategia de negocio por elementos clave', 'RIESGO ESTRAT�GICO', '10', NULL, NULL),
(83, 'Buena alineaci�n, se considera un elemento clave de la estrategia', 'Alineaci�n con la estrategia de negocio por elementos clave', 'RIESGO ESTRAT�GICO', '40', NULL, NULL),
(84, 'Alineaci�n modesta, pero no es un elemento clave de la estrategia', 'Alineaci�n con la estrategia de negocio por elementos clave', 'RIESGO ESTRAT�GICO', '70', NULL, NULL),
(85, 'El producto tiene una alineaci�n perif�rica con la estrategia del negocio', 'Alineaci�n con la estrategia de negocio por elementos clave', 'RIESGO ESTRAT�GICO', '100', NULL, NULL),
(86, 'Impacto m�nimo, no se notar� el da�o si el producto se desecha', 'Impacto estrat�gico en la empresa', 'RIESGO ESTRAT�GICO', '10', NULL, NULL),
(87, 'Impacto moderado, pone en riesgo el presupuesto asignado.', 'Impacto estrat�gico en la empresa', 'RIESGO ESTRAT�GICO', '40', NULL, NULL),
(88, 'Impacto significativo en la empresa, pone en riesgo los activos de la empresa.', 'Impacto estrat�gico en la empresa', 'RIESGO ESTRAT�GICO', '70', NULL, NULL),
(89, 'Impacto  muy fuerte en el negocio, pone en riesgo la existencia de la empresa.', 'Impacto estrat�gico en la empresa', 'RIESGO ESTRAT�GICO', '100', NULL, NULL),
(90, 'La compa��a est� en el mercado', 'Modelo de negociaci�n y aceptaci�n en el mercado', 'RIESGO ESTRAT�GICO', '5', NULL, NULL),
(91, 'La compa��a tiene contacto con clientes pero no est� en el mercado', 'Modelo de negociaci�n y aceptaci�n en el mercado', 'RIESGO ESTRAT�GICO', '25', NULL, NULL),
(92, 'La compa��a est� activa en un mercado cercanamente relacionado', 'Modelo de negociaci�n y aceptaci�n en el mercado', 'RIESGO ESTRAT�GICO', '50', NULL, NULL),
(93, 'El mercado existe pero s�lo como un "nicho", no se tiene establecido un modelo de negocio', 'Modelo de negociaci�n y aceptaci�n en el mercado', 'RIESGO ESTRAT�GICO', '75', NULL, NULL),
(94, 'El mercado y el modelo de negocio no existen', 'Modelo de negociaci�n y aceptaci�n en el mercado', 'RIESGO ESTRAT�GICO', '100', NULL, NULL),
(95, 'Muy peque�o', 'Tama�o de mercado', 'RIESGO DE MERCADO', '100', NULL, NULL),
(96, 'Peque�o', 'Tama�o de mercado', 'RIESGO DE MERCADO', '70', NULL, NULL),
(97, 'De tama�o moderado', 'Tama�o de mercado', 'RIESGO DE MERCADO', '40', NULL, NULL),
(98, 'Muy grande', 'Tama�o de mercado', 'RIESGO DE MERCADO', '10', NULL, NULL),
(99, 'Crecimiento muy r�pido', 'Crecimiento del mercado', 'RIESGO DE MERCADO', '10', NULL, NULL),
(100, 'Buen crecimiento, mejor que el PIB', 'Crecimiento del mercado', 'RIESGO DE MERCADO', '40', NULL, NULL),
(101, 'Crecimiento lento, similar al PIB', 'Crecimiento del mercado', 'RIESGO DE MERCADO', '70', NULL, NULL),
(102, 'Sin crecimiento o crecimiento negativo', 'Crecimiento del mercado', 'RIESGO DE MERCADO', '100', NULL, NULL),
(103, 'M�rgenes de utilidad muy grandes', 'M�rgenes de utilidad en este mercado', 'RIESGO DE MERCADO', '10', NULL, NULL),
(104, 'Buenos m�rgenes de utilidad', 'M�rgenes de utilidad en este mercado', 'RIESGO DE MERCADO', '40', NULL, NULL),
(105, 'M�rgenes de utilidad moderados', 'M�rgenes de utilidad en este mercado', 'RIESGO DE MERCADO', '70', NULL, NULL),
(106, 'M�rgenes de utilidad muy peque�os', 'M�rgenes de utilidad en este mercado', 'RIESGO DE MERCADO', '100', NULL, NULL),
(107, 'Competencia peque�a o inexistente, situaci�n competitiva muy positiva', 'Situaci�n competitiva', 'RIESGO DE MERCADO', '10', NULL, NULL),
(108, 'Pocos competidores, competencia no intensa', 'Situaci�n competitiva', 'RIESGO DE MERCADO', '40', NULL, NULL),
(109, 'Algunos competidores, competencia relativamente intensa', 'Situaci�n competitiva', 'RIESGO DE MERCADO', '70', NULL, NULL),
(110, 'Muchos competidores, competencia intensa', 'Situaci�n competitiva', 'RIESGO DE MERCADO', '100', NULL, NULL),
(111, 'TIR mayor al 30%', 'Tasa de retorno sobre la inversi�n', 'RIESGO FINANCIERO', '10', NULL, NULL),
(112, 'TIR entre el 15% y el 30%', 'Tasa de retorno sobre la inversi�n', 'RIESGO FINANCIERO', '40', NULL, NULL),
(113, 'TIR entre el 5% y el 15%', 'Tasa de retorno sobre la inversi�n', 'RIESGO FINANCIERO', '70', NULL, NULL),
(114, 'TIR menor al 5%', 'Tasa de retorno sobre la inversi�n', 'RIESGO FINANCIERO', '100', NULL, NULL),
(115, 'menor a un a�o', 'Periodo de recuperaci�n de la inversi�n', 'RIESGO FINANCIERO', '10', NULL, NULL),
(116, 'entre 1 y 2 a�os', 'Periodo de recuperaci�n de la inversi�n', 'RIESGO FINANCIERO', '40', NULL, NULL),
(117, 'entre 2 y 3 a�os', 'Periodo de recuperaci�n de la inversi�n', 'RIESGO FINANCIERO', '70', NULL, NULL),
(118, 'mayor a 3 a�os', 'Periodo de recuperaci�n de la inversi�n', 'RIESGO FINANCIERO', '100', NULL, NULL),
(119, 'Gran certeza en la estimaci�n', 'Certeza en las estimaciones de retorno/utilidad', 'RIESGO FINANCIERO', '10', NULL, NULL),
(120, 'Buena certeza', 'Certeza en las estimaciones de retorno/utilidad', 'RIESGO FINANCIERO', '40', NULL, NULL),
(121, 'Resultados moderadamente inciertos', 'Certeza en las estimaciones de retorno/utilidad', 'RIESGO FINANCIERO', '70', NULL, NULL),
(122, 'Resultados inciertos', 'Certeza en las estimaciones de retorno/utilidad', 'RIESGO FINANCIERO', '100', NULL, NULL),
(123, 'menor a un a�o', 'Tiempo para arranque de comercializaci�n', 'RIESGO FINANCIERO', '10', NULL, NULL),
(124, 'entre 1 y 2 a�os', 'Tiempo para arranque de comercializaci�n', 'RIESGO FINANCIERO', '40', NULL, NULL),
(125, 'entre 2 y 3 a�os', 'Tiempo para arranque de comercializaci�n', 'RIESGO FINANCIERO', '70', NULL, NULL),
(126, 'mayor a 3 a�os', 'Tiempo para arranque de comercializaci�n', 'RIESGO FINANCIERO', '100', NULL, NULL),
(127, 'Alineaci�n fuerte con varios elementos claves de la estrategia', ' Alineaci�n con la estrategia de negocio por elementos clave', 'RIESGO ESTRAT�GICO', '10', NULL, NULL),
(128, 'Buena alineaci�n, se considera un elemento clave de la estrategia', ' Alineaci�n con la estrategia de negocio por elementos clave', 'RIESGO ESTRAT�GICO', '40', NULL, NULL),
(129, 'Alineaci�n modesta, pero no es un elemento clave de la estrategia', ' Alineaci�n con la estrategia de negocio por elementos clave', 'RIESGO ESTRAT�GICO', '70', NULL, NULL),
(130, 'El producto tiene una alineaci�n perif�rica con la estrategia del negocio', ' Alineaci�n con la estrategia de negocio por elementos clave', 'RIESGO ESTRAT�GICO', '100', NULL, NULL);

--
-- �ndices para tablas volcadas
--

--
-- Indices de la tabla `evariables`
--
ALTER TABLE `evariables`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `evariables`
--
ALTER TABLE `evariables`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=131;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
