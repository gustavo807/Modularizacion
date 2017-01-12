-- phpMyAdmin SQL Dump
-- version 4.5.1
-- http://www.phpmyadmin.net
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 05-01-2017 a las 16:21:42
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
(1, '¿Cuénta con más de 10 clientes fijos?', 'Mercado y Ventas', 'competitividad', NULL, NULL),
(2, '¿Cuenta con personal dedicado a las ventas?', 'Mercado y Ventas', 'competitividad', NULL, NULL),
(3, '¿Tiene estandarizado su proceso de ventas?', 'Mercado y Ventas', 'competitividad', NULL, NULL),
(4, '¿Tiene identificada a su competencia?', 'Mercado y Ventas', 'competitividad', NULL, NULL),
(5, '¿Tiene identificada sus ventajas competitivas?', 'Mercado y Ventas', 'competitividad', NULL, NULL),
(6, '¿Cuenta con algún software para el manejo de relaciones con sus clientes?', 'Mercado y Ventas', 'competitividad', NULL, NULL),
(7, '¿El año pasado se capacitó/actualizó a  su personal en ventas?', 'Mercado y Ventas', 'competitividad', NULL, NULL),
(8, '¿Cuenta con página web?', 'Mercado y Ventas', 'competitividad', NULL, NULL),
(9, '¿Sus ventas del año pasado superan los 5millones de pesos?', 'Mercado y Ventas', 'competitividad', NULL, NULL),
(10, '¿El incremento de ventas del año pasado fue mayor al 10%?', 'Mercado y Ventas', 'competitividad', NULL, NULL),
(11, '¿Cuenta con disponibilidad de insumos adecuada?', 'Insumos, Productos  y Servicios', 'competitividad', NULL, NULL),
(12, '¿Cuenta con proveedores establecidos y confiables?', 'Insumos, Productos  y Servicios', 'competitividad', NULL, NULL),
(13, '¿Recibe la entrega de sus solicitudes en tiempo?', 'Insumos, Productos  y Servicios', 'competitividad', NULL, NULL),
(14, '¿Sus proveedores tienen precios competitivos a nivel nacional?', 'Insumos, Productos  y Servicios', 'competitividad', NULL, NULL),
(15, '¿Tiene acciones planeadas para satisfacer los huecos de proveeduría que existen?', 'Insumos, Productos  y Servicios', 'competitividad', NULL, NULL),
(16, '¿Genera algún producto de línea bien identificado? ', 'Insumos, Productos  y Servicios', 'competitividad', NULL, NULL),
(17, '¿Cuenta con 5 o más productos o servicios diferentes?', 'Insumos, Productos  y Servicios', 'competitividad', NULL, NULL),
(18, '¿Su cliente principal representa menos del 50% de sus ventas?', 'Insumos, Productos  y Servicios', 'competitividad', NULL, NULL),
(19, '¿Su principal clientes es del sector automotriz, electrodomésticos, aeroespacial o agroindustrial?', 'Insumos, Productos  y Servicios', 'competitividad', NULL, NULL),
(20, '¿Sabe qué necesitaría cumplir su producto para ampliar su mercado?', 'Insumos, Productos  y Servicios', 'competitividad', NULL, NULL),
(21, '¿Cuenta con la maquinaria y equipo idóneos para realizar sus procesos?', 'Procesos y Sistema de Gestión de la Calidad', 'competitividad', NULL, NULL),
(22, '¿Cuenta con equipo de laboratorio adecuado?', 'Procesos y Sistema de Gestión de la Calidad', 'competitividad', NULL, NULL),
(23, '¿Cuenta con personal suficiente y capacitado para realizar su trabajo?', 'Procesos y Sistema de Gestión de la Calidad', 'competitividad', NULL, NULL),
(24, '¿Cuenta con instalaciones adecuadas?', 'Procesos y Sistema de Gestión de la Calidad', 'competitividad', NULL, NULL),
(25, '¿Tiene adecuada distribución de planta y layout?', 'Procesos y Sistema de Gestión de la Calidad', 'competitividad', NULL, NULL),
(26, '¿Está estandarizada la manera de trabajar en operación?', 'Procesos y Sistema de Gestión de la Calidad', 'competitividad', NULL, NULL),
(27, '¿Cuenta con procedimientos, instructivos de trabajo y registros?', 'Procesos y Sistema de Gestión de la Calidad', 'competitividad', NULL, NULL),
(28, '¿Cuenta con alguna certificación de calidad?', 'Procesos y Sistema de Gestión de la Calidad', 'competitividad', NULL, NULL),
(29, '¿Ha recibido algún reconocimiento de sus clientes?', 'Procesos y Sistema de Gestión de la Calidad', 'competitividad', NULL, NULL),
(30, '¿Cuenta con encuesta de satisfacción de clientes?', 'Procesos y Sistema de Gestión de la Calidad', 'competitividad', NULL, NULL),
(31, '¿Existe una persona encargada o área de recursos humanos en su empresa?', 'Recursos humanos y Desarrollo Empresarial', 'competitividad', NULL, NULL),
(32, '¿Cuenta con organigrama escrito de su empresa?', 'Recursos humanos y Desarrollo Empresarial', 'competitividad', NULL, NULL),
(33, '¿Existe definición clara de funciones y responsabilidades por puesto?', 'Recursos humanos y Desarrollo Empresarial', 'competitividad', NULL, NULL),
(34, '¿Existe definición del plan de  desarrollo del personal en su empresa?', 'Recursos humanos y Desarrollo Empresarial', 'competitividad', NULL, NULL),
(35, '¿El año pasado capacitó a su personal?', 'Recursos humanos y Desarrollo Empresarial', 'competitividad', NULL, NULL),
(36, '¿La empresa tiene más de 3 años trabajando de manera estable?', 'Recursos humanos y Desarrollo Empresarial', 'competitividad', NULL, NULL),
(37, '¿Cuenta  la empresa con una forma estable de financiamiento?', 'Recursos humanos y Desarrollo Empresarial', 'competitividad', NULL, NULL),
(38, '¿El gerente de planta cuenta con capacitación en habilidades gerenciales?', 'Recursos humanos y Desarrollo Empresarial', 'competitividad', NULL, NULL),
(39, '¿El gerente de planta cuenta con capacitación en planeación estratégica?', 'Recursos humanos y Desarrollo Empresarial', 'competitividad', NULL, NULL),
(40, '¿Cuenta con una planeación estratégica en su empresa a corto, mediano y largo plazo?', 'Recursos humanos y Desarrollo Empresarial', 'competitividad', NULL, NULL),
(41, '¿Cuénta con un área o persona dedicada a la innovación en su empresa?', 'Desarrollo en Innovación', 'competitividad', NULL, NULL),
(42, '¿Ha gestionado algún fondo de gobierno para su empresa?', 'Desarrollo en Innovación', 'competitividad', NULL, NULL),
(43, '¿Diseñó y desarrollo nuevos productos el año pasado?', 'Desarrollo en Innovación', 'competitividad', NULL, NULL),
(44, ' ¿Diseñó e implementó nuevos procesos en su empresa  el año pasado?', 'Desarrollo en Innovación', 'competitividad', NULL, NULL),
(45, '¿Tiene identificadas oportunidades de innovación que pudieran generar una ventaja competitiva a su empresa?', 'Desarrollo en Innovación', 'competitividad', NULL, NULL),
(46, '¿Considera que su empresa tiene capacidad de innovar en productos o procesos?', 'Desarrollo en Innovación', 'competitividad', NULL, NULL),
(47, '¿Considera que el personal con el que cuenta tiene capacidad de innovar?', 'Desarrollo en Innovación', 'competitividad', NULL, NULL),
(48, '¿Forma parte de alguna agrupación empresarial?', 'Desarrollo en Innovación', 'competitividad', NULL, NULL),
(49, '¿Asiste a eventos o foros de innovación?', 'Desarrollo en Innovación', 'competitividad', NULL, NULL),
(50, '¿Cuenta con alianzas con centros de investigación o universidades?', 'Desarrollo en Innovación', 'competitividad', NULL, NULL),
(51, '¿Las utilidades de la empresa han sido satisfactorias para todos los socios?', 'SOCIOS', 'competitividad', NULL, NULL),
(52, '¿Los socios realizan reuniones directivas para determinar el rumbo del negocio?', 'SOCIOS', 'competitividad', NULL, NULL),
(53, '¿Se cuenta con misión, visión y valores de la empresa?', 'SOCIOS', 'competitividad', NULL, NULL),
(54, '¿Se cuenta con filosofía y políticas de calidad de la empresa?', 'SOCIOS', 'competitividad', NULL, NULL),
(55, '¿Los socios están comprometidos con el desarrollo tecnológico de la empresa?', 'SOCIOS', 'competitividad', NULL, NULL),
(56, '¿Los socios están comprometidos con el desarrollo empresarial de la empresa?', 'SOCIOS', 'competitividad', NULL, NULL),
(57, '¿Los socios están comprometidos con el desarrollo económico de la empresa?', 'SOCIOS', 'competitividad', NULL, NULL),
(58, '¿Los socios realizan planeación estratégica anual que es difundida en la organización?', 'SOCIOS', 'competitividad', NULL, NULL),
(59, '¿Cuentan con un plan de desarrollo tecnológico de la empresa?', 'SOCIOS', 'competitividad', NULL, NULL),
(60, '¿Cuentan con un plan de comunicación en la empresa?', 'SOCIOS', 'competitividad', NULL, NULL),
(61, '¿La rotación en su empresa es baja?', 'TRABAJADORES', 'competitividad', NULL, NULL),
(62, '¿Cuénta con programas de capacitación para sus empleados?', 'TRABAJADORES', 'competitividad', NULL, NULL),
(63, '¿Cuenta con programas de seguridad e higiene en la empresa?', 'TRABAJADORES', 'competitividad', NULL, NULL),
(64, '¿Brinda las prestaciones de ley a sus empleados?', 'TRABAJADORES', 'competitividad', NULL, NULL),
(65, '¿Cuenta con un programa de comunicación en la empresa?', 'TRABAJADORES', 'competitividad', NULL, NULL),
(66, '¿Cuenta la empresa con política de equidad de género?', 'TRABAJADORES', 'competitividad', NULL, NULL),
(67, '¿Considera que tiene un buen ambiente de trabajo?', 'TRABAJADORES', 'competitividad', NULL, NULL),
(68, '¿Ha empleado a gente que por falta de oportunidades pensaba irse a trabajar fuera de su comunidad?', 'TRABAJADORES', 'competitividad', NULL, NULL),
(69, '¿Ha posibilitado/apoyado a sus trabajadores a seguir estudiando?', 'TRABAJADORES', 'competitividad', NULL, NULL),
(70, '¿Ofrece prestaciones superiores a las de la ley?', 'TRABAJADORES', 'competitividad', NULL, NULL),
(71, '¿Sus clientes lo perciben como un proveedor confiable?', 'CLIENTES', 'competitividad', NULL, NULL),
(72, '¿El ambiente de negocios de la región es de confianza?', 'CLIENTES', 'competitividad', NULL, NULL),
(73, '¿Ha recibido algún reconocimiento por parte de sus clientes?', 'CLIENTES', 'competitividad', NULL, NULL),
(74, '¿Ha conservado clientes por más de 2 años?', 'CLIENTES', 'competitividad', NULL, NULL),
(75, '¿Ha conservado clientes por más de 5 años?', 'CLIENTES', 'competitividad', NULL, NULL),
(76, '¿Ha conservado clientes por más de 10 años?', 'CLIENTES', 'competitividad', NULL, NULL),
(77, '¿Cuenta con un área o persona dedicada a servicio al cliente?', 'CLIENTES', 'competitividad', NULL, NULL),
(78, '¿Cuenta con las certificaciones necesarias para garantizar la calidad de sus productos?', 'CLIENTES', 'competitividad', NULL, NULL),
(79, '¿Cuenta con un cuestionario de satisfacción al cliente y lo aplica?', 'CLIENTES', 'competitividad', NULL, NULL),
(80, '¿Cuenta con buzón de sugerencias para la mejora de la calidad de sus productos y/o servicios?', 'CLIENTES', 'competitividad', NULL, NULL),
(81, '¿Cuénta con empleados que tengan beneficio del programa oportunidades?', 'COMUNIDAD', 'competitividad', NULL, NULL),
(82, '¿Cuénta con empleados de sectores marginados como lo son: mujeres, madres solteras, familiares de migrantes, indígenas?', 'COMUNIDAD', 'competitividad', NULL, NULL),
(83, '¿Considera que su empresa a apoyado a incrementar el nivel de vida de su comunidad?', 'COMUNIDAD', 'competitividad', NULL, NULL),
(84, '¿Ha apoyado al desarrollo económico de sectores marginados?', 'COMUNIDAD', 'competitividad', NULL, NULL),
(85, '¿Ha realizado donativos a asociaciones civiles?', 'COMUNIDAD', 'competitividad', NULL, NULL),
(86, '¿Realiza actividades en apoyo de su comunidad?', 'COMUNIDAD', 'competitividad', NULL, NULL),
(87, '¿Realiza pláticas de concientización con su personal de la importancia del apoyo a la comunidad?', 'COMUNIDAD', 'competitividad', NULL, NULL),
(88, '¿Cuenta con algún reconocimiento de alguna institución gobierno, empresas, personas por su su participación social?', 'COMUNIDAD', 'competitividad', NULL, NULL),
(89, '¿Cuenta con algún distintivo o certificación de responsabilidad social?', 'COMUNIDAD', 'competitividad', NULL, NULL),
(90, '¿Pertence a alguna asociación civil que apoye a la comunidad?', 'COMUNIDAD', 'competitividad', NULL, NULL),
(91, '¿Ha capacitado a su personal en temas de cuidado del medio ambiente?', 'AMBIENTAL', 'competitividad', NULL, NULL),
(92, '¿Cuenta con politica medioambiental en su empresa?', 'AMBIENTAL', 'competitividad', NULL, NULL),
(93, '¿Cuenta en su empresa con algún programa de separación de la basura y/o reducción de la misma?', 'AMBIENTAL', 'competitividad', NULL, NULL),
(94, '¿Cuenta en su empresa con focos ahorradores, páneles solares o tecnología para la reducción de consumo de electricidad?', 'AMBIENTAL', 'competitividad', NULL, NULL),
(95, '¿Cuenta en su empresa con algún programa para reducir el consumo de papel?', 'AMBIENTAL', 'competitividad', NULL, NULL),
(96, '¿Cuenta en su empresa con algún programa o tecnología para la reducción de uso del agua?', 'AMBIENTAL', 'competitividad', NULL, NULL),
(97, '¿Cuenta en su empresa con algún programa o tecnología para la disposición de residuos peligrosos?', 'AMBIENTAL', 'competitividad', NULL, NULL),
(98, '¿Se encuentra añadido a alguna asociación que comparta buenas prácticas para el cuidado del medio ambiente?', 'AMBIENTAL', 'competitividad', NULL, NULL),
(99, '¿Ha participado en algún programa de cuidado de medio ambiente en su comunidad?', 'AMBIENTAL', 'competitividad', NULL, NULL),
(100, '¿Cuenta con alguna certificación medioambiental?', 'AMBIENTAL', 'competitividad', NULL, NULL),
(101, 'Disponibilidad de la tecnología (producto y proceso)', 'RIESGO TÉCNICO', 'tecnico', NULL, NULL),
(102, 'Sinergias tecnológicas', 'RIESGO TÉCNICO', 'tecnico', NULL, NULL),
(103, 'Factibilidad técnica demostrada del producto o proceso', 'RIESGO TÉCNICO', 'tecnico', NULL, NULL),
(104, 'Incertidumbre técnica', 'RIESGO TÉCNICO', 'tecnico', NULL, NULL),
(105, 'Sinergias producción', 'RIESGO DE PRODUCCIÓN', 'tecnico', NULL, NULL),
(106, 'Complejidad de la fabricación del producto', 'RIESGO DE PRODUCCIÓN', 'tecnico', NULL, NULL),
(107, 'Competencias del personal para la producción', 'RIESGO DE PRODUCCIÓN', 'tecnico', NULL, NULL),
(108, 'Tamaño de la brecha tecnológica', 'RIESGO DE PRODUCCIÓN', 'tecnico', NULL, NULL),
(109, 'Cumplimiento de especificaciones del cliente', 'RIESGO DE PRODUCCIÓN', 'tecnico', NULL, NULL),
(110, 'Vector de diferenciación del producto', 'RIESGO COMERCIAL', 'tecnico', NULL, NULL),
(111, 'Diferenciación con respecto a la competencia', 'RIESGO COMERCIAL', 'tecnico', NULL, NULL),
(112, 'Beneficios al cliente', 'RIESGO COMERCIAL', 'tecnico', NULL, NULL),
(113, 'Cubre las necesidades del cliente', 'RIESGO COMERCIAL', 'tecnico', NULL, NULL),
(114, 'Valor monetario para el cliente', 'RIESGO COMERCIAL', 'tecnico', NULL, NULL),
(115, 'Sinergias de marketing (distribución, fuerza de ventas)', 'RIESGO COMERCIAL', 'tecnico', NULL, NULL),
(116, 'Disponibilidad de elementos de la cadena de valor', 'RIESGO ESTRATÉGICO', 'tecnico', NULL, NULL),
(117, ' Alineación con la estrategia de negocio por elementos clave', 'RIESGO ESTRATÉGICO', 'tecnico', NULL, NULL),
(118, 'Impacto estratégico en la empresa', 'RIESGO ESTRATÉGICO', 'tecnico', NULL, NULL),
(119, 'Modelo de negociación y aceptación en el mercado', 'RIESGO ESTRATÉGICO', 'tecnico', NULL, NULL),
(120, 'Tamaño de mercado', 'RIESGO DE MERCADO', 'tecnico', NULL, NULL),
(121, 'Crecimiento del mercado', 'RIESGO DE MERCADO', 'tecnico', NULL, NULL),
(122, 'Márgenes de utilidad en este mercado', 'RIESGO DE MERCADO', 'tecnico', NULL, NULL),
(123, 'Situación competitiva', 'RIESGO DE MERCADO', 'tecnico', NULL, NULL),
(124, 'Tasa de retorno sobre la inversión', 'RIESGO FINANCIERO', 'tecnico', NULL, NULL),
(125, 'Periodo de recuperación de la inversión', 'RIESGO FINANCIERO', 'tecnico', NULL, NULL),
(126, 'Certeza en las estimaciones de retorno/utilidad', 'RIESGO FINANCIERO', 'tecnico', NULL, NULL),
(127, 'Tiempo para arranque de comercialización', 'RIESGO FINANCIERO', 'tecnico', NULL, NULL);

--
-- Índices para tablas volcadas
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
