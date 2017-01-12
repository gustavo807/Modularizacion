-- phpMyAdmin SQL Dump
-- version 4.5.1
-- http://www.phpmyadmin.net
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 05-01-2017 a las 16:20:23
-- Versión del servidor: 10.1.13-MariaDB
-- Versión de PHP: 5.6.23

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
(1, 'Tecnología ya disponible en la empresa', 'Disponibilidad de la tecnología (producto y proceso)', 'RIESGO TÉCNICO', '5', NULL, NULL),
(2, 'Tecnología disponible pero fuera de la empresa', 'Disponibilidad de la tecnología (producto y proceso)', 'RIESGO TÉCNICO', '25', NULL, NULL),
(3, 'Nueva tecnología con factibilidad demostrada', 'Disponibilidad de la tecnología (producto y proceso)', 'RIESGO TÉCNICO', '50', NULL, NULL),
(4, 'Nueva tecnología, factibilidad no demostrada', 'Disponibilidad de la tecnología (producto y proceso)', 'RIESGO TÉCNICO', '75', NULL, NULL),
(5, 'Nueva invención, nunca se ha llevado a la práctica', 'Disponibilidad de la tecnología (producto y proceso)', 'RIESGO TÉCNICO', '100', NULL, NULL),
(6, 'Gran experiencia en la  tecnología existente', 'Sinergias tecnológicas', 'RIESGO TÉCNICO', '10', NULL, NULL),
(7, 'Experiencia con la tecnología ya existente', 'Sinergias tecnológicas', 'RIESGO TÉCNICO', '40', NULL, NULL),
(8, 'Alguna experiencia y expertise en esta tecnología, requiere adquirir algunas nuevas capacidades.', 'Sinergias tecnológicas', 'RIESGO TÉCNICO', '70', NULL, NULL),
(9, 'Poca o nula experiencia en esta tecnología, requiere de contratar o adquirir nuevas capacidades.', 'Sinergias tecnológicas', 'RIESGO TÉCNICO', '100', NULL, NULL),
(10, 'Factibilidad técnica claramente demostrada', 'Factibilidad técnica demostrada del producto o proceso', 'RIESGO TÉCNICO', '10', NULL, NULL),
(11, 'Casi ha sido posible demostrar su uso en la etapa temprana del desarrollo', 'Factibilidad técnica demostrada del producto o proceso', 'RIESGO TÉCNICO', '40', NULL, NULL),
(12, 'Demostración limitada', 'Factibilidad técnica demostrada del producto o proceso', 'RIESGO TÉCNICO', '70', NULL, NULL),
(13, 'No ha sido posible la demostración de factibilidad', 'Factibilidad técnica demostrada del producto o proceso', 'RIESGO TÉCNICO', '100', NULL, NULL),
(14, 'La solución está bien definida técnicamente y se puede alcanzar', 'Incertidumbre técnica', 'RIESGO TÉCNICO', '10', NULL, NULL),
(15, 'Se puede definir la solución técnica, pero permanecen las incertidumbres', 'Incertidumbre técnica', 'RIESGO TÉCNICO', '40', NULL, NULL),
(16, 'Algunas incertidumbres técnicas significativas', 'Incertidumbre técnica', 'RIESGO TÉCNICO', '70', NULL, NULL),
(17, 'Numerosas y grandes incertidumbres técnicas, se dificulta definir la solución', 'Incertidumbre técnica', 'RIESGO TÉCNICO', '100', NULL, NULL),
(18, 'Gran experiencia en esta área, puede usar la infraestructura existente con modificaciones mínimas', 'Sinergias producción', 'RIESGO DE PRODUCCIÓN', '10', NULL, NULL),
(19, 'Experiencia en esta área, requiere modificaciones simples', 'Sinergias producción', 'RIESGO DE PRODUCCIÓN', '40', NULL, NULL),
(20, 'Alguna experiencia en esta área, requiere de grandes modificaciones a la infraestructura actual', 'Sinergias producción', 'RIESGO DE PRODUCCIÓN', '70', NULL, NULL),
(21, 'Pequeña o nula experiencia en esta área, requiere de una nueva planta, reestructura y entrenamiento', 'Sinergias producción', 'RIESGO DE PRODUCCIÓN', '100', NULL, NULL),
(22, 'Sin dificultad', 'Complejidad de la fabricación del producto', 'RIESGO DE PRODUCCIÓN', '10', NULL, NULL),
(23, 'Representa un reto pero que se puede alcanzar', 'Complejidad de la fabricación del producto', 'RIESGO DE PRODUCCIÓN', '40', NULL, NULL),
(24, 'Algunos obstáculos', 'Complejidad de la fabricación del producto', 'RIESGO DE PRODUCCIÓN', '70', NULL, NULL),
(25, 'Muchos obstáculos', 'Complejidad de la fabricación del producto', 'RIESGO DE PRODUCCIÓN', '100', NULL, NULL),
(26, 'Altas competencias y experiencia del personal de producción para la nueva tecnología', 'Competencias del personal para la producción', 'RIESGO DE PRODUCCIÓN', '10', NULL, NULL),
(27, 'Media competencias y experiencia del personal de producción para la nueva tecnología', 'Competencias del personal para la producción', 'RIESGO DE PRODUCCIÓN', '40', NULL, NULL),
(28, 'Baja competencias y experiencia del personal de producción para la nueva tecnología', 'Competencias del personal para la producción', 'RIESGO DE PRODUCCIÓN', '70', NULL, NULL),
(29, 'Nulas competencias y experiencia del personal para la fabricación del nuevo proyecto', 'Competencias del personal para la producción', 'RIESGO DE PRODUCCIÓN', '100', NULL, NULL),
(30, 'Mejora de lo que ya se produce en la empresa', 'Tamaño de la brecha tecnológica', 'RIESGO DE PRODUCCIÓN', '10', NULL, NULL),
(31, 'El cambio es pequeño con respecto a lo que se hace en la empresa', 'Tamaño de la brecha tecnológica', 'RIESGO DE PRODUCCIÓN', '40', NULL, NULL),
(32, 'El cambio propuesto es muy diferente a lo que actualmente se hace en la empresa', 'Tamaño de la brecha tecnológica', 'RIESGO DE PRODUCCIÓN', '70', NULL, NULL),
(33, 'Abismo entre el conocimiento práctico actual y el objetivo del proyecto', 'Tamaño de la brecha tecnológica', 'RIESGO DE PRODUCCIÓN', '100', NULL, NULL),
(34, 'Extensión modesta de los requerimientos de desempeño y especificaciones existentes', 'Cumplimiento de especificaciones del cliente', 'RIESGO DE PRODUCCIÓN', '5', NULL, NULL),
(35, 'Extensión mayor de especificaciones o desempeño', 'Cumplimiento de especificaciones del cliente', 'RIESGO DE PRODUCCIÓN', '25', NULL, NULL),
(36, 'Especificaciones nuevas en un dominio nuevo de desempeño', 'Cumplimiento de especificaciones del cliente', 'RIESGO DE PRODUCCIÓN', '50', NULL, NULL),
(37, 'Algunas especificaciones son desconocidas o incomprensibles', 'Cumplimiento de especificaciones del cliente', 'RIESGO DE PRODUCCIÓN', '75', NULL, NULL),
(38, 'No existen especificaciones conocidas', 'Cumplimiento de especificaciones del cliente', 'RIESGO DE PRODUCCIÓN', '100', NULL, NULL),
(39, 'El producto es el mejor en todos los atributos', 'Vector de diferenciación del producto', 'RIESGO COMERCIAL', '5', NULL, NULL),
(40, 'El producto es el mejor en algunos atributos pero no en todos', 'Vector de diferenciación del producto', 'RIESGO COMERCIAL', '25', NULL, NULL),
(41, 'El producto ofrece ventajas en uno o dos atributos', 'Vector de diferenciación del producto', 'RIESGO COMERCIAL', '50', NULL, NULL),
(42, 'El producto tiene el mismo perfil', 'Vector de diferenciación del producto', 'RIESGO COMERCIAL', '75', NULL, NULL),
(43, 'El producto ofrece ventajas en uno o dos atributos, pero es peor en todos los otros', 'Vector de diferenciación del producto', 'RIESGO COMERCIAL', '100', NULL, NULL),
(44, 'El producto es claramente superior a los competidores', 'Diferenciación con respecto a la competencia', 'RIESGO COMERCIAL', '10', NULL, NULL),
(45, 'El producto es mejor que los competidores', 'Diferenciación con respecto a la competencia', 'RIESGO COMERCIAL', '40', NULL, NULL),
(46, 'El producto es marginalmente mejor que los competidores', 'Diferenciación con respecto a la competencia', 'RIESGO COMERCIAL', '70', NULL, NULL),
(47, 'El producto es igual a los competidores', 'Diferenciación con respecto a la competencia', 'RIESGO COMERCIAL', '100', NULL, NULL),
(48, 'El producto ofrece beneficios y características positivas y únicas', 'Beneficios al cliente', 'RIESGO COMERCIAL', '10', NULL, NULL),
(49, 'El producto ofrece características y beneficios únicos', 'Beneficios al cliente', 'RIESGO COMERCIAL', '40', NULL, NULL),
(50, 'El producto ofrece algunos beneficios pero no son importantes para el cliente', 'Beneficios al cliente', 'RIESGO COMERCIAL', '70', NULL, NULL),
(51, 'El producto no ofrece beneficios ni tiene características especiales', 'Beneficios al cliente', 'RIESGO COMERCIAL', '100', NULL, NULL),
(65, 'El producto es claramente superior a los competidores en cubrir las necesidades del cliente', 'Cubre las necesidades del cliente', 'RIESGO COMERCIAL', '10', NULL, NULL),
(66, 'El producto es mejor que los competidores en cubrir las necesidades del cliente', 'Cubre las necesidades del cliente', 'RIESGO COMERCIAL', '40', NULL, NULL),
(67, 'El producto es marginalmente mejor que los competidores en cubrir las necesidades del cliente', 'Cubre las necesidades del cliente', 'RIESGO COMERCIAL', '70', NULL, NULL),
(68, 'El producto es igual a los competidores en lo referente a cubrir las necesidades del cliente', 'Cubre las necesidades del cliente', 'RIESGO COMERCIAL', '100', NULL, NULL),
(69, 'El producto tiene claramente un excelente valor monetario para el cliente', 'Valor monetario para el cliente', 'RIESGO COMERCIAL', '10', NULL, NULL),
(70, 'El producto tiene un buen valor monetario para el cliente', 'Valor monetario para el cliente', 'RIESGO COMERCIAL', '40', NULL, NULL),
(71, 'El producto ofrece un mejor valor monetario al cliente', 'Valor monetario para el cliente', 'RIESGO COMERCIAL', '70', NULL, NULL),
(72, 'El producto es igual que los competidores, valor bajo para el cliente', 'Valor monetario para el cliente', 'RIESGO COMERCIAL', '100', NULL, NULL),
(73, 'Muy buen apalancamiento con la experiencia de marketing, expertise y recursos disponibles', 'Sinergias de marketing (distribución, fuerza de ventas)', 'RIESGO COMERCIAL', '10', NULL, NULL),
(74, 'Experiencia considerable de marketing y recursos amplios para el proyecto', 'Sinergias de marketing (distribución, fuerza de ventas)', 'RIESGO COMERCIAL', '40', NULL, NULL),
(75, 'Alguna experiencia de mercado y recursos limitados para el proyecto', 'Sinergias de marketing (distribución, fuerza de ventas)', 'RIESGO COMERCIAL', '70', NULL, NULL),
(76, 'No experiencia en marketing ni en disponibilidad de recursos para el proyecto', 'Sinergias de marketing (distribución, fuerza de ventas)', 'RIESGO COMERCIAL', '100', NULL, NULL),
(77, 'La cadena de valor está disponible para la empresa', 'Disponibilidad de elementos de la cadena de valor', 'RIESGO ESTRATÉGICO', '5', NULL, NULL),
(78, 'Se deben desarrollar algunos elementos en la cadena de valor ', 'Disponibilidad de elementos de la cadena de valor', 'RIESGO ESTRATÉGICO', '25', NULL, NULL),
(79, 'La cadena de valor está rota, muchos elementos no están disponibles', 'Disponibilidad de elementos de la cadena de valor', 'RIESGO ESTRATÉGICO', '50', NULL, NULL),
(80, 'No existen elementos en la cadena de valor', 'Disponibilidad de elementos de la cadena de valor', 'RIESGO ESTRATÉGICO', '75', NULL, NULL),
(81, 'No existen en ninguna parte los elementos críticos de la cadena de valor', 'Disponibilidad de elementos de la cadena de valor', 'RIESGO ESTRATÉGICO', '100', NULL, NULL),
(82, 'Alineación fuerte con varios elementos claves de la estrategia', 'Alineación con la estrategia de negocio por elementos clave', 'RIESGO ESTRATÉGICO', '10', NULL, NULL),
(83, 'Buena alineación, se considera un elemento clave de la estrategia', 'Alineación con la estrategia de negocio por elementos clave', 'RIESGO ESTRATÉGICO', '40', NULL, NULL),
(84, 'Alineación modesta, pero no es un elemento clave de la estrategia', 'Alineación con la estrategia de negocio por elementos clave', 'RIESGO ESTRATÉGICO', '70', NULL, NULL),
(85, 'El producto tiene una alineación periférica con la estrategia del negocio', 'Alineación con la estrategia de negocio por elementos clave', 'RIESGO ESTRATÉGICO', '100', NULL, NULL),
(86, 'Impacto mínimo, no se notará el daño si el producto se desecha', 'Impacto estratégico en la empresa', 'RIESGO ESTRATÉGICO', '10', NULL, NULL),
(87, 'Impacto moderado, pone en riesgo el presupuesto asignado.', 'Impacto estratégico en la empresa', 'RIESGO ESTRATÉGICO', '40', NULL, NULL),
(88, 'Impacto significativo en la empresa, pone en riesgo los activos de la empresa.', 'Impacto estratégico en la empresa', 'RIESGO ESTRATÉGICO', '70', NULL, NULL),
(89, 'Impacto  muy fuerte en el negocio, pone en riesgo la existencia de la empresa.', 'Impacto estratégico en la empresa', 'RIESGO ESTRATÉGICO', '100', NULL, NULL),
(90, 'La compañía está en el mercado', 'Modelo de negociación y aceptación en el mercado', 'RIESGO ESTRATÉGICO', '5', NULL, NULL),
(91, 'La compañía tiene contacto con clientes pero no está en el mercado', 'Modelo de negociación y aceptación en el mercado', 'RIESGO ESTRATÉGICO', '25', NULL, NULL),
(92, 'La compañía está activa en un mercado cercanamente relacionado', 'Modelo de negociación y aceptación en el mercado', 'RIESGO ESTRATÉGICO', '50', NULL, NULL),
(93, 'El mercado existe pero sólo como un "nicho", no se tiene establecido un modelo de negocio', 'Modelo de negociación y aceptación en el mercado', 'RIESGO ESTRATÉGICO', '75', NULL, NULL),
(94, 'El mercado y el modelo de negocio no existen', 'Modelo de negociación y aceptación en el mercado', 'RIESGO ESTRATÉGICO', '100', NULL, NULL),
(95, 'Muy pequeño', 'Tamaño de mercado', 'RIESGO DE MERCADO', '100', NULL, NULL),
(96, 'Pequeño', 'Tamaño de mercado', 'RIESGO DE MERCADO', '70', NULL, NULL),
(97, 'De tamaño moderado', 'Tamaño de mercado', 'RIESGO DE MERCADO', '40', NULL, NULL),
(98, 'Muy grande', 'Tamaño de mercado', 'RIESGO DE MERCADO', '10', NULL, NULL),
(99, 'Crecimiento muy rápido', 'Crecimiento del mercado', 'RIESGO DE MERCADO', '10', NULL, NULL),
(100, 'Buen crecimiento, mejor que el PIB', 'Crecimiento del mercado', 'RIESGO DE MERCADO', '40', NULL, NULL),
(101, 'Crecimiento lento, similar al PIB', 'Crecimiento del mercado', 'RIESGO DE MERCADO', '70', NULL, NULL),
(102, 'Sin crecimiento o crecimiento negativo', 'Crecimiento del mercado', 'RIESGO DE MERCADO', '100', NULL, NULL),
(103, 'Márgenes de utilidad muy grandes', 'Márgenes de utilidad en este mercado', 'RIESGO DE MERCADO', '10', NULL, NULL),
(104, 'Buenos márgenes de utilidad', 'Márgenes de utilidad en este mercado', 'RIESGO DE MERCADO', '40', NULL, NULL),
(105, 'Márgenes de utilidad moderados', 'Márgenes de utilidad en este mercado', 'RIESGO DE MERCADO', '70', NULL, NULL),
(106, 'Márgenes de utilidad muy pequeños', 'Márgenes de utilidad en este mercado', 'RIESGO DE MERCADO', '100', NULL, NULL),
(107, 'Competencia pequeña o inexistente, situación competitiva muy positiva', 'Situación competitiva', 'RIESGO DE MERCADO', '10', NULL, NULL),
(108, 'Pocos competidores, competencia no intensa', 'Situación competitiva', 'RIESGO DE MERCADO', '40', NULL, NULL),
(109, 'Algunos competidores, competencia relativamente intensa', 'Situación competitiva', 'RIESGO DE MERCADO', '70', NULL, NULL),
(110, 'Muchos competidores, competencia intensa', 'Situación competitiva', 'RIESGO DE MERCADO', '100', NULL, NULL),
(111, 'TIR mayor al 30%', 'Tasa de retorno sobre la inversión', 'RIESGO FINANCIERO', '10', NULL, NULL),
(112, 'TIR entre el 15% y el 30%', 'Tasa de retorno sobre la inversión', 'RIESGO FINANCIERO', '40', NULL, NULL),
(113, 'TIR entre el 5% y el 15%', 'Tasa de retorno sobre la inversión', 'RIESGO FINANCIERO', '70', NULL, NULL),
(114, 'TIR menor al 5%', 'Tasa de retorno sobre la inversión', 'RIESGO FINANCIERO', '100', NULL, NULL),
(115, 'menor a un año', 'Periodo de recuperación de la inversión', 'RIESGO FINANCIERO', '10', NULL, NULL),
(116, 'entre 1 y 2 años', 'Periodo de recuperación de la inversión', 'RIESGO FINANCIERO', '40', NULL, NULL),
(117, 'entre 2 y 3 años', 'Periodo de recuperación de la inversión', 'RIESGO FINANCIERO', '70', NULL, NULL),
(118, 'mayor a 3 años', 'Periodo de recuperación de la inversión', 'RIESGO FINANCIERO', '100', NULL, NULL),
(119, 'Gran certeza en la estimación', 'Certeza en las estimaciones de retorno/utilidad', 'RIESGO FINANCIERO', '10', NULL, NULL),
(120, 'Buena certeza', 'Certeza en las estimaciones de retorno/utilidad', 'RIESGO FINANCIERO', '40', NULL, NULL),
(121, 'Resultados moderadamente inciertos', 'Certeza en las estimaciones de retorno/utilidad', 'RIESGO FINANCIERO', '70', NULL, NULL),
(122, 'Resultados inciertos', 'Certeza en las estimaciones de retorno/utilidad', 'RIESGO FINANCIERO', '100', NULL, NULL),
(123, 'menor a un año', 'Tiempo para arranque de comercialización', 'RIESGO FINANCIERO', '10', NULL, NULL),
(124, 'entre 1 y 2 años', 'Tiempo para arranque de comercialización', 'RIESGO FINANCIERO', '40', NULL, NULL),
(125, 'entre 2 y 3 años', 'Tiempo para arranque de comercialización', 'RIESGO FINANCIERO', '70', NULL, NULL),
(126, 'mayor a 3 años', 'Tiempo para arranque de comercialización', 'RIESGO FINANCIERO', '100', NULL, NULL),
(127, 'Alineación fuerte con varios elementos claves de la estrategia', ' Alineación con la estrategia de negocio por elementos clave', 'RIESGO ESTRATÉGICO', '10', NULL, NULL),
(128, 'Buena alineación, se considera un elemento clave de la estrategia', ' Alineación con la estrategia de negocio por elementos clave', 'RIESGO ESTRATÉGICO', '40', NULL, NULL),
(129, 'Alineación modesta, pero no es un elemento clave de la estrategia', ' Alineación con la estrategia de negocio por elementos clave', 'RIESGO ESTRATÉGICO', '70', NULL, NULL),
(130, 'El producto tiene una alineación periférica con la estrategia del negocio', ' Alineación con la estrategia de negocio por elementos clave', 'RIESGO ESTRATÉGICO', '100', NULL, NULL);

--
-- Índices para tablas volcadas
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
