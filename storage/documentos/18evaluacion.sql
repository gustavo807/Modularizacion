-- phpMyAdmin SQL Dump
-- version 4.5.1
-- http://www.phpmyadmin.net
--
-- Servidor: 127.0.0.1
-- Tiempo de generaci�n: 05-01-2017 a las 16:21:42
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
-- Estructura de tabla para la tabla `evaluacion`
--

CREATE TABLE `evaluacion` (
  `id` int(10) UNSIGNED NOT NULL,
  `pregunta` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `variable` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `tipo` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Volcado de datos para la tabla `evaluacion`
--

INSERT INTO `evaluacion` (`id`, `pregunta`, `variable`, `tipo`, `created_at`, `updated_at`) VALUES
(1, '�Cu�nta con m�s de 10 clientes fijos?', 'Mercado y Ventas', 'competitividad', NULL, NULL),
(2, '�Cuenta con personal dedicado a las ventas?', 'Mercado y Ventas', 'competitividad', NULL, NULL),
(3, '�Tiene estandarizado su proceso de ventas?', 'Mercado y Ventas', 'competitividad', NULL, NULL),
(4, '�Tiene identificada a su competencia?', 'Mercado y Ventas', 'competitividad', NULL, NULL),
(5, '�Tiene identificada sus ventajas competitivas?', 'Mercado y Ventas', 'competitividad', NULL, NULL),
(6, '�Cuenta con alg�n software para el manejo de relaciones con sus clientes?', 'Mercado y Ventas', 'competitividad', NULL, NULL),
(7, '�El a�o pasado se capacit�/actualiz� a  su personal en ventas?', 'Mercado y Ventas', 'competitividad', NULL, NULL),
(8, '�Cuenta con p�gina web?', 'Mercado y Ventas', 'competitividad', NULL, NULL),
(9, '�Sus ventas del a�o pasado superan los 5millones de pesos?', 'Mercado y Ventas', 'competitividad', NULL, NULL),
(10, '�El incremento de ventas del a�o pasado fue mayor al 10%?', 'Mercado y Ventas', 'competitividad', NULL, NULL),
(11, '�Cuenta con disponibilidad de insumos adecuada?', 'Insumos, Productos  y Servicios', 'competitividad', NULL, NULL),
(12, '�Cuenta con proveedores establecidos y confiables?', 'Insumos, Productos  y Servicios', 'competitividad', NULL, NULL),
(13, '�Recibe la entrega de sus solicitudes en tiempo?', 'Insumos, Productos  y Servicios', 'competitividad', NULL, NULL),
(14, '�Sus proveedores tienen precios competitivos a nivel nacional?', 'Insumos, Productos  y Servicios', 'competitividad', NULL, NULL),
(15, '�Tiene acciones planeadas para satisfacer los huecos de proveedur�a que existen?', 'Insumos, Productos  y Servicios', 'competitividad', NULL, NULL),
(16, '�Genera alg�n producto de l�nea bien identificado? ', 'Insumos, Productos  y Servicios', 'competitividad', NULL, NULL),
(17, '�Cuenta con 5 o m�s productos o servicios diferentes?', 'Insumos, Productos  y Servicios', 'competitividad', NULL, NULL),
(18, '�Su cliente principal representa menos del 50% de sus ventas?', 'Insumos, Productos  y Servicios', 'competitividad', NULL, NULL),
(19, '�Su principal clientes es del sector automotriz, electrodom�sticos, aeroespacial o agroindustrial?', 'Insumos, Productos  y Servicios', 'competitividad', NULL, NULL),
(20, '�Sabe qu� necesitar�a cumplir su producto para ampliar su mercado?', 'Insumos, Productos  y Servicios', 'competitividad', NULL, NULL),
(21, '�Cuenta con la maquinaria y equipo id�neos para realizar sus procesos?', 'Procesos y Sistema de Gesti�n de la Calidad', 'competitividad', NULL, NULL),
(22, '�Cuenta con equipo de laboratorio adecuado?', 'Procesos y Sistema de Gesti�n de la Calidad', 'competitividad', NULL, NULL),
(23, '�Cuenta con personal suficiente y capacitado para realizar su trabajo?', 'Procesos y Sistema de Gesti�n de la Calidad', 'competitividad', NULL, NULL),
(24, '�Cuenta con instalaciones adecuadas?', 'Procesos y Sistema de Gesti�n de la Calidad', 'competitividad', NULL, NULL),
(25, '�Tiene adecuada distribuci�n de planta y layout?', 'Procesos y Sistema de Gesti�n de la Calidad', 'competitividad', NULL, NULL),
(26, '�Est� estandarizada la manera de trabajar en operaci�n?', 'Procesos y Sistema de Gesti�n de la Calidad', 'competitividad', NULL, NULL),
(27, '�Cuenta con procedimientos, instructivos de trabajo y registros?', 'Procesos y Sistema de Gesti�n de la Calidad', 'competitividad', NULL, NULL),
(28, '�Cuenta con alguna certificaci�n de calidad?', 'Procesos y Sistema de Gesti�n de la Calidad', 'competitividad', NULL, NULL),
(29, '�Ha recibido alg�n reconocimiento de sus clientes?', 'Procesos y Sistema de Gesti�n de la Calidad', 'competitividad', NULL, NULL),
(30, '�Cuenta con encuesta de satisfacci�n de clientes?', 'Procesos y Sistema de Gesti�n de la Calidad', 'competitividad', NULL, NULL),
(31, '�Existe una persona encargada o �rea de recursos humanos en su empresa?', 'Recursos humanos y Desarrollo Empresarial', 'competitividad', NULL, NULL),
(32, '�Cuenta con organigrama escrito de su empresa?', 'Recursos humanos y Desarrollo Empresarial', 'competitividad', NULL, NULL),
(33, '�Existe definici�n clara de funciones y responsabilidades por puesto?', 'Recursos humanos y Desarrollo Empresarial', 'competitividad', NULL, NULL),
(34, '�Existe definici�n del plan de  desarrollo del personal en su empresa?', 'Recursos humanos y Desarrollo Empresarial', 'competitividad', NULL, NULL),
(35, '�El a�o pasado capacit� a su personal?', 'Recursos humanos y Desarrollo Empresarial', 'competitividad', NULL, NULL),
(36, '�La empresa tiene m�s de 3 a�os trabajando de manera estable?', 'Recursos humanos y Desarrollo Empresarial', 'competitividad', NULL, NULL),
(37, '�Cuenta  la empresa con una forma estable de financiamiento?', 'Recursos humanos y Desarrollo Empresarial', 'competitividad', NULL, NULL),
(38, '�El gerente de planta cuenta con capacitaci�n en habilidades gerenciales?', 'Recursos humanos y Desarrollo Empresarial', 'competitividad', NULL, NULL),
(39, '�El gerente de planta cuenta con capacitaci�n en planeaci�n estrat�gica?', 'Recursos humanos y Desarrollo Empresarial', 'competitividad', NULL, NULL),
(40, '�Cuenta con una planeaci�n estrat�gica en su empresa a corto, mediano y largo plazo?', 'Recursos humanos y Desarrollo Empresarial', 'competitividad', NULL, NULL),
(41, '�Cu�nta con un �rea o persona dedicada a la innovaci�n en su empresa?', 'Desarrollo en Innovaci�n', 'competitividad', NULL, NULL),
(42, '�Ha gestionado alg�n fondo de gobierno para su empresa?', 'Desarrollo en Innovaci�n', 'competitividad', NULL, NULL),
(43, '�Dise�� y desarrollo nuevos productos el a�o pasado?', 'Desarrollo en Innovaci�n', 'competitividad', NULL, NULL),
(44, ' �Dise�� e implement� nuevos procesos en su empresa  el a�o pasado?', 'Desarrollo en Innovaci�n', 'competitividad', NULL, NULL),
(45, '�Tiene identificadas oportunidades de innovaci�n que pudieran generar una ventaja competitiva a su empresa?', 'Desarrollo en Innovaci�n', 'competitividad', NULL, NULL),
(46, '�Considera que su empresa tiene capacidad de innovar en productos o procesos?', 'Desarrollo en Innovaci�n', 'competitividad', NULL, NULL),
(47, '�Considera que el personal con el que cuenta tiene capacidad de innovar?', 'Desarrollo en Innovaci�n', 'competitividad', NULL, NULL),
(48, '�Forma parte de alguna agrupaci�n empresarial?', 'Desarrollo en Innovaci�n', 'competitividad', NULL, NULL),
(49, '�Asiste a eventos o foros de innovaci�n?', 'Desarrollo en Innovaci�n', 'competitividad', NULL, NULL),
(50, '�Cuenta con alianzas con centros de investigaci�n o universidades?', 'Desarrollo en Innovaci�n', 'competitividad', NULL, NULL),
(51, '�Las utilidades de la empresa han sido satisfactorias para todos los socios?', 'SOCIOS', 'competitividad', NULL, NULL),
(52, '�Los socios realizan reuniones directivas para determinar el rumbo del negocio?', 'SOCIOS', 'competitividad', NULL, NULL),
(53, '�Se cuenta con misi�n, visi�n y valores de la empresa?', 'SOCIOS', 'competitividad', NULL, NULL),
(54, '�Se cuenta con filosof�a y pol�ticas de calidad de la empresa?', 'SOCIOS', 'competitividad', NULL, NULL),
(55, '�Los socios est�n comprometidos con el desarrollo tecnol�gico de la empresa?', 'SOCIOS', 'competitividad', NULL, NULL),
(56, '�Los socios est�n comprometidos con el desarrollo empresarial de la empresa?', 'SOCIOS', 'competitividad', NULL, NULL),
(57, '�Los socios est�n comprometidos con el desarrollo econ�mico de la empresa?', 'SOCIOS', 'competitividad', NULL, NULL),
(58, '�Los socios realizan planeaci�n estrat�gica anual que es difundida en la organizaci�n?', 'SOCIOS', 'competitividad', NULL, NULL),
(59, '�Cuentan con un plan de desarrollo tecnol�gico de la empresa?', 'SOCIOS', 'competitividad', NULL, NULL),
(60, '�Cuentan con un plan de comunicaci�n en la empresa?', 'SOCIOS', 'competitividad', NULL, NULL),
(61, '�La rotaci�n en su empresa es baja?', 'TRABAJADORES', 'competitividad', NULL, NULL),
(62, '�Cu�nta con programas de capacitaci�n para sus empleados?', 'TRABAJADORES', 'competitividad', NULL, NULL),
(63, '�Cuenta con programas de seguridad e higiene en la empresa?', 'TRABAJADORES', 'competitividad', NULL, NULL),
(64, '�Brinda las prestaciones de ley a sus empleados?', 'TRABAJADORES', 'competitividad', NULL, NULL),
(65, '�Cuenta con un programa de comunicaci�n en la empresa?', 'TRABAJADORES', 'competitividad', NULL, NULL),
(66, '�Cuenta la empresa con pol�tica de equidad de g�nero?', 'TRABAJADORES', 'competitividad', NULL, NULL),
(67, '�Considera que tiene un buen ambiente de trabajo?', 'TRABAJADORES', 'competitividad', NULL, NULL),
(68, '�Ha empleado a gente que por falta de oportunidades pensaba irse a trabajar fuera de su comunidad?', 'TRABAJADORES', 'competitividad', NULL, NULL),
(69, '�Ha posibilitado/apoyado a sus trabajadores a seguir estudiando?', 'TRABAJADORES', 'competitividad', NULL, NULL),
(70, '�Ofrece prestaciones superiores a las de la ley?', 'TRABAJADORES', 'competitividad', NULL, NULL),
(71, '�Sus clientes lo perciben como un proveedor confiable?', 'CLIENTES', 'competitividad', NULL, NULL),
(72, '�El ambiente de negocios de la regi�n es de confianza?', 'CLIENTES', 'competitividad', NULL, NULL),
(73, '�Ha recibido alg�n reconocimiento por parte de sus clientes?', 'CLIENTES', 'competitividad', NULL, NULL),
(74, '�Ha conservado clientes por m�s de 2 a�os?', 'CLIENTES', 'competitividad', NULL, NULL),
(75, '�Ha conservado clientes por m�s de 5 a�os?', 'CLIENTES', 'competitividad', NULL, NULL),
(76, '�Ha conservado clientes por m�s de 10 a�os?', 'CLIENTES', 'competitividad', NULL, NULL),
(77, '�Cuenta con un �rea o persona dedicada a servicio al cliente?', 'CLIENTES', 'competitividad', NULL, NULL),
(78, '�Cuenta con las certificaciones necesarias para garantizar la calidad de sus productos?', 'CLIENTES', 'competitividad', NULL, NULL),
(79, '�Cuenta con un cuestionario de satisfacci�n al cliente y lo aplica?', 'CLIENTES', 'competitividad', NULL, NULL),
(80, '�Cuenta con buz�n de sugerencias para la mejora de la calidad de sus productos y/o servicios?', 'CLIENTES', 'competitividad', NULL, NULL),
(81, '�Cu�nta con empleados que tengan beneficio del programa oportunidades?', 'COMUNIDAD', 'competitividad', NULL, NULL),
(82, '�Cu�nta con empleados de sectores marginados como lo son: mujeres, madres solteras, familiares de migrantes, ind�genas?', 'COMUNIDAD', 'competitividad', NULL, NULL),
(83, '�Considera que su empresa a apoyado a incrementar el nivel de vida de su comunidad?', 'COMUNIDAD', 'competitividad', NULL, NULL),
(84, '�Ha apoyado al desarrollo econ�mico de sectores marginados?', 'COMUNIDAD', 'competitividad', NULL, NULL),
(85, '�Ha realizado donativos a asociaciones civiles?', 'COMUNIDAD', 'competitividad', NULL, NULL),
(86, '�Realiza actividades en apoyo de su comunidad?', 'COMUNIDAD', 'competitividad', NULL, NULL),
(87, '�Realiza pl�ticas de concientizaci�n con su personal de la importancia del apoyo a la comunidad?', 'COMUNIDAD', 'competitividad', NULL, NULL),
(88, '�Cuenta con alg�n reconocimiento de alguna instituci�n gobierno, empresas, personas por su su participaci�n social?', 'COMUNIDAD', 'competitividad', NULL, NULL),
(89, '�Cuenta con alg�n distintivo o certificaci�n de responsabilidad social?', 'COMUNIDAD', 'competitividad', NULL, NULL),
(90, '�Pertence a alguna asociaci�n civil que apoye a la comunidad?', 'COMUNIDAD', 'competitividad', NULL, NULL),
(91, '�Ha capacitado a su personal en temas de cuidado del medio ambiente?', 'AMBIENTAL', 'competitividad', NULL, NULL),
(92, '�Cuenta con politica medioambiental en su empresa?', 'AMBIENTAL', 'competitividad', NULL, NULL),
(93, '�Cuenta en su empresa con alg�n programa de separaci�n de la basura y/o reducci�n de la misma?', 'AMBIENTAL', 'competitividad', NULL, NULL),
(94, '�Cuenta en su empresa con focos ahorradores, p�neles solares o tecnolog�a para la reducci�n de consumo de electricidad?', 'AMBIENTAL', 'competitividad', NULL, NULL),
(95, '�Cuenta en su empresa con alg�n programa para reducir el consumo de papel?', 'AMBIENTAL', 'competitividad', NULL, NULL),
(96, '�Cuenta en su empresa con alg�n programa o tecnolog�a para la reducci�n de uso del agua?', 'AMBIENTAL', 'competitividad', NULL, NULL),
(97, '�Cuenta en su empresa con alg�n programa o tecnolog�a para la disposici�n de residuos peligrosos?', 'AMBIENTAL', 'competitividad', NULL, NULL),
(98, '�Se encuentra a�adido a alguna asociaci�n que comparta buenas pr�cticas para el cuidado del medio ambiente?', 'AMBIENTAL', 'competitividad', NULL, NULL),
(99, '�Ha participado en alg�n programa de cuidado de medio ambiente en su comunidad?', 'AMBIENTAL', 'competitividad', NULL, NULL),
(100, '�Cuenta con alguna certificaci�n medioambiental?', 'AMBIENTAL', 'competitividad', NULL, NULL),
(101, 'Disponibilidad de la tecnolog�a (producto y proceso)', 'RIESGO T�CNICO', 'tecnico', NULL, NULL),
(102, 'Sinergias tecnol�gicas', 'RIESGO T�CNICO', 'tecnico', NULL, NULL),
(103, 'Factibilidad t�cnica demostrada del producto o proceso', 'RIESGO T�CNICO', 'tecnico', NULL, NULL),
(104, 'Incertidumbre t�cnica', 'RIESGO T�CNICO', 'tecnico', NULL, NULL),
(105, 'Sinergias producci�n', 'RIESGO DE PRODUCCI�N', 'tecnico', NULL, NULL),
(106, 'Complejidad de la fabricaci�n del producto', 'RIESGO DE PRODUCCI�N', 'tecnico', NULL, NULL),
(107, 'Competencias del personal para la producci�n', 'RIESGO DE PRODUCCI�N', 'tecnico', NULL, NULL),
(108, 'Tama�o de la brecha tecnol�gica', 'RIESGO DE PRODUCCI�N', 'tecnico', NULL, NULL),
(109, 'Cumplimiento de especificaciones del cliente', 'RIESGO DE PRODUCCI�N', 'tecnico', NULL, NULL),
(110, 'Vector de diferenciaci�n del producto', 'RIESGO COMERCIAL', 'tecnico', NULL, NULL),
(111, 'Diferenciaci�n con respecto a la competencia', 'RIESGO COMERCIAL', 'tecnico', NULL, NULL),
(112, 'Beneficios al cliente', 'RIESGO COMERCIAL', 'tecnico', NULL, NULL),
(113, 'Cubre las necesidades del cliente', 'RIESGO COMERCIAL', 'tecnico', NULL, NULL),
(114, 'Valor monetario para el cliente', 'RIESGO COMERCIAL', 'tecnico', NULL, NULL),
(115, 'Sinergias de marketing (distribuci�n, fuerza de ventas)', 'RIESGO COMERCIAL', 'tecnico', NULL, NULL),
(116, 'Disponibilidad de elementos de la cadena de valor', 'RIESGO ESTRAT�GICO', 'tecnico', NULL, NULL),
(117, ' Alineaci�n con la estrategia de negocio por elementos clave', 'RIESGO ESTRAT�GICO', 'tecnico', NULL, NULL),
(118, 'Impacto estrat�gico en la empresa', 'RIESGO ESTRAT�GICO', 'tecnico', NULL, NULL),
(119, 'Modelo de negociaci�n y aceptaci�n en el mercado', 'RIESGO ESTRAT�GICO', 'tecnico', NULL, NULL),
(120, 'Tama�o de mercado', 'RIESGO DE MERCADO', 'tecnico', NULL, NULL),
(121, 'Crecimiento del mercado', 'RIESGO DE MERCADO', 'tecnico', NULL, NULL),
(122, 'M�rgenes de utilidad en este mercado', 'RIESGO DE MERCADO', 'tecnico', NULL, NULL),
(123, 'Situaci�n competitiva', 'RIESGO DE MERCADO', 'tecnico', NULL, NULL),
(124, 'Tasa de retorno sobre la inversi�n', 'RIESGO FINANCIERO', 'tecnico', NULL, NULL),
(125, 'Periodo de recuperaci�n de la inversi�n', 'RIESGO FINANCIERO', 'tecnico', NULL, NULL),
(126, 'Certeza en las estimaciones de retorno/utilidad', 'RIESGO FINANCIERO', 'tecnico', NULL, NULL),
(127, 'Tiempo para arranque de comercializaci�n', 'RIESGO FINANCIERO', 'tecnico', NULL, NULL);

--
-- �ndices para tablas volcadas
--

--
-- Indices de la tabla `evaluacion`
--
ALTER TABLE `evaluacion`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `evaluacion`
--
ALTER TABLE `evaluacion`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=128;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
