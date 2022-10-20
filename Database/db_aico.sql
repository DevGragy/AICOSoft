-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 20-10-2022 a las 02:16:34
-- Versión del servidor: 10.4.24-MariaDB
-- Versión de PHP: 8.1.6

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `aico`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `projects`
--

CREATE TABLE `projects` (
  `id_project` int(11) NOT NULL,
  `project_name` varchar(255) NOT NULL,
  `url` varchar(50) NOT NULL,
  `id_user` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `projects`
--

INSERT INTO `projects` (`id_project`, `project_name`, `url`, `id_user`) VALUES
(2, '', '72a2310bbffeabb777274b898006e9ec', 19),
(3, 'AICO', '6234a99df8d65ad2895c64f86fb69f65', 19),
(4, 'AICO', '9cd9df81386b4a29193621974eb204d2', 19),
(5, 'Test', '98180d1f0a0760eef628b356951be65a', 19),
(6, 'AICO', '46987e5f4daf12b7f0e7c4b636b701f2', 19),
(7, 'Test', '923002617c63cae96f19975a5b5c1d80', 19),
(8, 'Test', '18739764332c6b4d0b9b210eb958fc5d', 19),
(9, 'Nuevo Test', 'e76ef2d0c29638c471b489174810ca92', 19),
(10, 'Nuevo Test', '7f6c07bc930afe1696627dae5e45cd3c', 19),
(11, 'Nuevo Test', '93204c36386cce1b71117749339b4280', 19),
(12, 'Nuevo Test', '12d0c02130506ef37f79b4c21cb87f37', 19),
(13, 'AICO', '928eb6d02a9c4786c5e4a6409d2413f5', 19),
(14, 'werwe', 'bb7ef801f5bc48141c24382e646b5038', 19),
(15, 'werwe', '5c5858a54a356c0680f8aa16ae901f7d', 19),
(16, '', '46a9ad956c22d4402fadfc1e6925e4e3', 19),
(17, 'La chida', '7c562cd77506b642654378df59463cb3', 19),
(18, '', 'f7f7ca7cc9253080a5beb9926505bb13', 19),
(19, 'Proyecto Dev 2', '03d9ceb7dabe9124103944dc22fb671b', 21),
(20, 'AICO', '6a7daa91505dd05ed58914247c382386', 21),
(21, 'Test', '49d5f53b06c58292ac2349fbf9b9f376', 21),
(22, 'Test', 'c388594505eef63f388c37a2346f2efc', 21),
(23, 'AICO', 'c6bed18c74836161a4f40eefbc624853', 21),
(24, 'AICO', '78a21219b5261e3ff268f026c17c80e3', 21),
(25, 'AICO', '3238c0ad33d12240c679d7dcd1504b37', 21),
(26, 'AICO', 'a6765f85306f48755df6e2825d718aeb', 21),
(27, 'Dev2', '0665b8b0b76260c70f2c591ad3528806', 21),
(28, 'Que hacer', 'fdd782df879ba36fdc0113d4800a50d5', 21);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `roles`
--

CREATE TABLE `roles` (
  `id` int(11) NOT NULL,
  `rol` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `roles`
--

INSERT INTO `roles` (`id`, `rol`) VALUES
(1, 'admin'),
(2, 'usuario');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `username` varchar(50) NOT NULL,
  `email` varchar(100) NOT NULL,
  `password` varchar(255) NOT NULL,
  `id_rol` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `users`
--

INSERT INTO `users` (`id`, `username`, `email`, `password`, `id_rol`) VALUES
(19, 'DevJay', 'dev@mail.com', '$2y$10$2clwtCd5nNJ9j1z07C7mVOWRzOLrUQLra1NhFJt9NHoFgPyJrxtcW', 2),
(21, 'Dev 2', 'dev2@mail.com', '$2y$10$9HvPIzdzgexFoCUCR.E1iOrkna4sWtCpBkJ/ll08pNjNaBO6lKzCq', 1);

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `projects`
--
ALTER TABLE `projects`
  ADD PRIMARY KEY (`id_project`),
  ADD KEY `id_user` (`id_user`);

--
-- Indices de la tabla `roles`
--
ALTER TABLE `roles`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD KEY `id_rol` (`id_rol`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `projects`
--
ALTER TABLE `projects`
  MODIFY `id_project` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=29;

--
-- AUTO_INCREMENT de la tabla `roles`
--
ALTER TABLE `roles`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT de la tabla `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=22;

--
-- Restricciones para tablas volcadas
--

--
-- Filtros para la tabla `projects`
--
ALTER TABLE `projects`
  ADD CONSTRAINT `projects_ibfk_1` FOREIGN KEY (`id_user`) REFERENCES `users` (`id`);

--
-- Filtros para la tabla `users`
--
ALTER TABLE `users`
  ADD CONSTRAINT `users_ibfk_1` FOREIGN KEY (`id_rol`) REFERENCES `roles` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
