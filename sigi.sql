-- phpMyAdmin SQL Dump
-- version 5.0.4
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 05-12-2021 a las 06:45:08
-- Versión del servidor: 10.4.17-MariaDB
-- Versión de PHP: 7.4.15

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `sigi`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `alquiler`
--

CREATE TABLE `alquiler` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `precio_alquiler` decimal(12,2) NOT NULL,
  `forma_pago` varchar(25) COLLATE utf8mb4_unicode_ci NOT NULL,
  `fecha_inicio` date NOT NULL,
  `fecha_fin` date NOT NULL,
  `id_inmueble` bigint(20) UNSIGNED NOT NULL,
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Volcado de datos para la tabla `alquiler`
--

INSERT INTO `alquiler` (`id`, `precio_alquiler`, `forma_pago`, `fecha_inicio`, `fecha_fin`, `id_inmueble`, `remember_token`, `created_at`, `updated_at`) VALUES
(1, '500000.00', 'Transferencia', '2021-11-27', '2021-11-28', 1, NULL, '2021-10-19 14:36:18', '2021-10-19 14:36:18'),
(2, '1000000.00', 'Efectivo', '2021-11-29', '2021-11-30', 2, NULL, '2021-11-28 16:46:40', '2021-11-28 16:46:40'),
(3, '1500000.00', 'Cheque', '2021-12-01', '2021-12-02', 3, NULL, '2021-11-28 16:47:53', '2021-11-28 16:47:53');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `cliente`
--

CREATE TABLE `cliente` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `nombre` varchar(25) COLLATE utf8mb4_unicode_ci NOT NULL,
  `apellido` varchar(25) COLLATE utf8mb4_unicode_ci NOT NULL,
  `correo` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `direccion` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `telefono` varchar(15) COLLATE utf8mb4_unicode_ci NOT NULL,
  `cuenta_bancaria` varchar(15) COLLATE utf8mb4_unicode_ci NOT NULL,
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Volcado de datos para la tabla `cliente`
--

INSERT INTO `cliente` (`id`, `nombre`, `apellido`, `correo`, `direccion`, `telefono`, `cuenta_bancaria`, `remember_token`, `created_at`, `updated_at`) VALUES
(1, 'miguel enrique', 'romero penaranda', 'miguelromero@hotmail.com', 'turbaco, alto prado mz 6 lt14b', '123', 'miguelsena', NULL, '2021-10-19 14:32:35', '2021-10-19 14:32:35'),
(2, 'juan fernando', 'chica medina', 'juanfernando@hotmail.com', 'turbaco, alto prado mz 3 lt14b', '3002661261', 'juansena', NULL, '2021-11-16 19:34:10', '2021-11-16 19:34:10'),
(3, 'jose luis', 'soleno arias', 'josesoleno@hotmail.com', 'turbaco, alto prado mz 9 lt14b', '321', 'josesena', NULL, '2021-11-28 16:25:48', '2021-11-28 16:25:48');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `facturacion`
--

CREATE TABLE `facturacion` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `mes_a_pagar` varchar(20) COLLATE utf8mb4_unicode_ci NOT NULL,
  `concepto` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `valor` decimal(12,2) NOT NULL,
  `deducciones` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `total_pagar` decimal(12,2) NOT NULL,
  `id_alquiler` bigint(20) UNSIGNED NOT NULL,
  `id_cliente` bigint(20) UNSIGNED NOT NULL,
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Volcado de datos para la tabla `facturacion`
--

INSERT INTO `facturacion` (`id`, `mes_a_pagar`, `concepto`, `valor`, `deducciones`, `total_pagar`, `id_alquiler`, `id_cliente`, `remember_token`, `created_at`, `updated_at`) VALUES
(1, 'enero', 'aaaa', '500000.00', 'bbbb', '500000.00', 1, 1, NULL, '2021-10-19 14:36:47', '2021-10-19 14:36:47'),
(2, 'febrero', 'cccc', '1000000.00', 'dddd', '1000000.00', 2, 2, NULL, '2021-11-28 16:49:28', '2021-11-28 16:49:28'),
(3, 'marzo', 'eeee', '1500000.00', 'ffff', '1500000.00', 3, 3, NULL, '2021-11-28 16:50:52', '2021-11-28 16:50:52');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `failed_jobs`
--

CREATE TABLE `failed_jobs` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `connection` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `queue` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `payload` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `exception` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `failed_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `inmueble`
--

CREATE TABLE `inmueble` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `nombre_inmueble` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL,
  `direccion` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `tipo` varchar(25) COLLATE utf8mb4_unicode_ci NOT NULL,
  `precio_venta` decimal(12,2) NOT NULL,
  `precio_alquiler` decimal(12,2) NOT NULL,
  `descripcion` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `estado` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `id_cliente` bigint(20) UNSIGNED NOT NULL,
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Volcado de datos para la tabla `inmueble`
--

INSERT INTO `inmueble` (`id`, `nombre_inmueble`, `direccion`, `tipo`, `precio_venta`, `precio_alquiler`, `descripcion`, `estado`, `id_cliente`, `remember_token`, `created_at`, `updated_at`) VALUES
(1, 'apartamento c.c. verona 111', 'turbaco, alto prado mz 3 lt14b', 'Casa', '1000000.00', '500000.00', 'asasasasasassasasasasasasasasasasasasasasaas', 'Alquilado', 1, NULL, '2021-10-19 14:34:00', '2021-10-19 14:34:00'),
(2, 'apartamento la bombita 222', 'turbaco, alto prado mz 6 lt14b', 'Local Comercial', '2000000.00', '1000000.00', 'cvcvcvcvcvcvcvcvcvcvcvcvcvcvcvcvcvcvcvcvcvcv', 'Alquiler/Venta', 2, NULL, '2021-11-28 16:18:29', '2021-11-28 16:18:29'),
(3, 'apartamento c.c. verona 333', 'turbaco, alto prado mz 9 lt14b', 'Apartamento', '3000000.00', '2000000.00', 'bnbnbnbnbnbnbnbnbnbnbnbnbnbnbnbnbnbn', 'Vendido', 3, NULL, '2021-11-28 16:23:12', '2021-11-28 16:23:12');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `migrations`
--

CREATE TABLE `migrations` (
  `id` int(10) UNSIGNED NOT NULL,
  `migration` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `batch` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Volcado de datos para la tabla `migrations`
--

INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES
(1, '2014_10_12_000000_create_users_table', 1),
(2, '2014_10_12_100000_create_password_resets_table', 1),
(3, '2019_08_19_000000_create_failed_jobs_table', 1),
(4, '2021_02_18_212333_cliente', 1),
(5, '2021_02_18_213435_inmueble', 1),
(6, '2021_02_18_213536_pago', 1),
(7, '2021_02_18_214213_venta', 1),
(8, '2021_02_18_215206_alquiler', 1),
(9, '2021_02_18_221829_facturacion', 1);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `pago`
--

CREATE TABLE `pago` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `fecha` date NOT NULL,
  `valor` decimal(12,2) NOT NULL,
  `total_pago` decimal(12,2) NOT NULL,
  `comentarios` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL,
  `id_cliente` bigint(20) UNSIGNED NOT NULL,
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Volcado de datos para la tabla `pago`
--

INSERT INTO `pago` (`id`, `fecha`, `valor`, `total_pago`, `comentarios`, `id_cliente`, `remember_token`, `created_at`, `updated_at`) VALUES
(1, '2021-11-27', '1000000.00', '1000000.00', 'ababababababababa', 1, NULL, '2021-10-19 14:34:58', '2021-10-19 14:34:58'),
(2, '2021-11-28', '2000000.00', '2000000.00', 'cdcdcdcdcdcdcdcdcd', 2, NULL, '2021-11-28 16:38:29', '2021-11-28 16:38:29'),
(3, '2021-11-29', '3000000.00', '3000000.00', 'efefefefefefefefef', 3, NULL, '2021-11-28 16:39:17', '2021-11-28 16:39:17');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `password_resets`
--

CREATE TABLE `password_resets` (
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `users`
--

CREATE TABLE `users` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `password` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Volcado de datos para la tabla `users`
--

INSERT INTO `users` (`id`, `name`, `email`, `email_verified_at`, `password`, `remember_token`, `created_at`, `updated_at`) VALUES
(1, 'juan fernando', 'juanfernando@hotmail.com', NULL, '$2y$10$8LvUlmMpJLXTqsl5gSVHF.92R2TX1gQ.EV.WyaEC.wpEG6tJ7TI7i', NULL, '2021-10-19 14:30:47', '2021-10-19 14:30:47');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `venta`
--

CREATE TABLE `venta` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `precio` decimal(12,2) NOT NULL,
  `forma_pago` varchar(25) COLLATE utf8mb4_unicode_ci NOT NULL,
  `nombre_comprador` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL,
  `correo` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `direccion` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `telefono` varchar(15) COLLATE utf8mb4_unicode_ci NOT NULL,
  `referencia_catastral` varchar(30) COLLATE utf8mb4_unicode_ci NOT NULL,
  `id_inmueble` bigint(20) UNSIGNED NOT NULL,
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Volcado de datos para la tabla `venta`
--

INSERT INTO `venta` (`id`, `precio`, `forma_pago`, `nombre_comprador`, `correo`, `direccion`, `telefono`, `referencia_catastral`, `id_inmueble`, `remember_token`, `created_at`, `updated_at`) VALUES
(1, '1000000.00', 'Transferencia', 'miguel romero', 'miguelromero@hotmail.com', 'turbaco, alto prado mz 3 lt14b', '123', '121212', 1, NULL, '2021-10-19 14:35:43', '2021-10-19 14:35:43'),
(2, '2000000.00', 'Efectivo', 'juan fernando', 'juanfernando@hotmail.com', 'turbaco, alto prado mz 6 lt14b', '321', '212121', 2, NULL, '2021-11-28 16:41:21', '2021-11-28 16:41:21'),
(3, '3000000.00', 'Cheque', 'jose luis', 'josesoleno@hotmail.com', 'turbaco, alto prado mz 9 lt14b', '1234', '4444', 3, NULL, '2021-11-28 16:43:04', '2021-11-28 16:43:04');

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `alquiler`
--
ALTER TABLE `alquiler`
  ADD PRIMARY KEY (`id`),
  ADD KEY `alquiler_id_inmueble_foreign` (`id_inmueble`);

--
-- Indices de la tabla `cliente`
--
ALTER TABLE `cliente`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `facturacion`
--
ALTER TABLE `facturacion`
  ADD PRIMARY KEY (`id`),
  ADD KEY `facturacion_id_alquiler_foreign` (`id_alquiler`),
  ADD KEY `facturacion_id_cliente_foreign` (`id_cliente`);

--
-- Indices de la tabla `failed_jobs`
--
ALTER TABLE `failed_jobs`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `inmueble`
--
ALTER TABLE `inmueble`
  ADD PRIMARY KEY (`id`),
  ADD KEY `inmueble_id_cliente_foreign` (`id_cliente`);

--
-- Indices de la tabla `migrations`
--
ALTER TABLE `migrations`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `pago`
--
ALTER TABLE `pago`
  ADD PRIMARY KEY (`id`),
  ADD KEY `pago_id_cliente_foreign` (`id_cliente`);

--
-- Indices de la tabla `password_resets`
--
ALTER TABLE `password_resets`
  ADD KEY `password_resets_email_index` (`email`);

--
-- Indices de la tabla `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `users_email_unique` (`email`);

--
-- Indices de la tabla `venta`
--
ALTER TABLE `venta`
  ADD PRIMARY KEY (`id`),
  ADD KEY `venta_id_inmueble_foreign` (`id_inmueble`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `alquiler`
--
ALTER TABLE `alquiler`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT de la tabla `cliente`
--
ALTER TABLE `cliente`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT de la tabla `facturacion`
--
ALTER TABLE `facturacion`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT de la tabla `failed_jobs`
--
ALTER TABLE `failed_jobs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `inmueble`
--
ALTER TABLE `inmueble`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT de la tabla `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT de la tabla `pago`
--
ALTER TABLE `pago`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT de la tabla `users`
--
ALTER TABLE `users`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT de la tabla `venta`
--
ALTER TABLE `venta`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- Restricciones para tablas volcadas
--

--
-- Filtros para la tabla `alquiler`
--
ALTER TABLE `alquiler`
  ADD CONSTRAINT `alquiler_id_inmueble_foreign` FOREIGN KEY (`id_inmueble`) REFERENCES `inmueble` (`id`);

--
-- Filtros para la tabla `facturacion`
--
ALTER TABLE `facturacion`
  ADD CONSTRAINT `facturacion_id_alquiler_foreign` FOREIGN KEY (`id_alquiler`) REFERENCES `alquiler` (`id`),
  ADD CONSTRAINT `facturacion_id_cliente_foreign` FOREIGN KEY (`id_cliente`) REFERENCES `cliente` (`id`);

--
-- Filtros para la tabla `inmueble`
--
ALTER TABLE `inmueble`
  ADD CONSTRAINT `inmueble_id_cliente_foreign` FOREIGN KEY (`id_cliente`) REFERENCES `cliente` (`id`);

--
-- Filtros para la tabla `pago`
--
ALTER TABLE `pago`
  ADD CONSTRAINT `pago_id_cliente_foreign` FOREIGN KEY (`id_cliente`) REFERENCES `cliente` (`id`);

--
-- Filtros para la tabla `venta`
--
ALTER TABLE `venta`
  ADD CONSTRAINT `venta_id_inmueble_foreign` FOREIGN KEY (`id_inmueble`) REFERENCES `inmueble` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
