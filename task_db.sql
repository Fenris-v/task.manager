-- phpMyAdmin SQL Dump
-- version 5.0.2
-- https://www.phpmyadmin.net/
--
-- Хост: localhost
-- Время создания: Май 04 2020 г., 22:32
-- Версия сервера: 10.4.11-MariaDB
-- Версия PHP: 7.4.4

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- База данных: `task_db`
--

-- --------------------------------------------------------

--
-- Структура таблицы `colors`
--

CREATE TABLE `colors` (
  `name` varchar(45) COLLATE utf8mb4_unicode_ci NOT NULL,
  `code` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Дамп данных таблицы `colors`
--

INSERT INTO `colors` (`name`, `code`) VALUES
('Аквамарин', '#66cdaa'),
('Зеленый', '#008000'),
('Красный', '#ff0000');

-- --------------------------------------------------------

--
-- Структура таблицы `groups`
--

CREATE TABLE `groups` (
  `id` int(11) NOT NULL,
  `name` varchar(45) COLLATE utf8mb4_unicode_ci NOT NULL,
  `description` text COLLATE utf8mb4_unicode_ci DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Дамп данных таблицы `groups`
--

INSERT INTO `groups` (`id`, `name`, `description`) VALUES
(1, 'Зарегистрированный пользователь', NULL),
(2, 'Пользователь имеющий право писать сообщения', NULL);

-- --------------------------------------------------------

--
-- Структура таблицы `messages`
--

CREATE TABLE `messages` (
  `id` int(11) NOT NULL,
  `title` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `date` datetime DEFAULT NULL,
  `sender_id` int(11) NOT NULL,
  `recipient_id` int(11) NOT NULL,
  `text` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `read` tinyint(1) NOT NULL DEFAULT 0,
  `section_id` int(11) NOT NULL DEFAULT 1
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Дамп данных таблицы `messages`
--

INSERT INTO `messages` (`id`, `title`, `date`, `sender_id`, `recipient_id`, `text`, `read`, `section_id`) VALUES
(1, 'Первое сообщение', '2020-02-02 00:45:13', 3, 1, 'Текст первого сообщения', 0, 1),
(2, 'Второе сообщение', '2019-08-02 00:45:40', 4, 1, 'Текст второго сообщения', 0, 1),
(3, 'Третье сообщение', '2020-01-02 00:45:47', 2, 1, 'Текст третьего сообщения', 0, 1),
(4, 'Четвертое сообщение', '2019-07-02 00:45:55', 5, 1, 'Текст четвертого сообщения', 1, 1),
(31, 'Это тест', '2020-05-03 00:29:01', 1, 4, 'Это основной тест', 0, 1),
(32, 'Это тест', '2020-05-03 00:30:17', 1, 4, 'Это основной тест', 0, 1),
(33, 'Письма Иванову', '2020-05-03 00:38:50', 2, 1, 'Это - важная информация для Ивана', 1, 1),
(34, 'Test', '2020-05-03 12:34:03', 1, 5, 'TEXT TEXT TEXT TEXT TEXT TEXT ', 0, 1),
(35, 'New test', '2020-05-03 18:31:40', 1, 2, 'TEXT TEXT TEXT TEXT TEXT TEXT TEXT TEXT TEXT TEXT TEXT TEXT TEXT TEXT ', 0, 4);

-- --------------------------------------------------------

--
-- Структура таблицы `section`
--

CREATE TABLE `section` (
  `id` int(11) NOT NULL,
  `name` varchar(45) COLLATE utf8mb4_unicode_ci NOT NULL,
  `color` varchar(10) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `date` datetime DEFAULT NULL,
  `creator_id` int(11) NOT NULL,
  `path` varchar(20) COLLATE utf8mb4_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Дамп данных таблицы `section`
--

INSERT INTO `section` (`id`, `name`, `color`, `date`, `creator_id`, `path`) VALUES
(1, 'Основные', 'Зеленый', NULL, 1, '1'),
(2, 'по работе', 'Зеленый', NULL, 1, '1.1'),
(3, 'личные', 'Зеленый', NULL, 1, '1.2'),
(4, 'Оповещения', 'Аквамарин', NULL, 1, '2'),
(5, 'форумы', 'Аквамарин', NULL, 1, '2.1'),
(6, 'магазины', 'Аквамарин', NULL, 1, '2.2'),
(7, 'подписки', 'Аквамарин', NULL, 1, '2.3'),
(8, 'Спам', 'Красный', NULL, 1, '3');

-- --------------------------------------------------------

--
-- Структура таблицы `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `login` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `phone` varchar(20) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `password` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `notification` tinyint(1) NOT NULL DEFAULT 0,
  `activity` tinyint(1) NOT NULL DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Дамп данных таблицы `users`
--

INSERT INTO `users` (`id`, `name`, `login`, `email`, `phone`, `password`, `notification`, `activity`) VALUES
(1, 'Иванов Иван Иванович', 'user', 'user@gmail.com', '+7 999 123-45-01', '$2y$10$l8jHLMNxfeztXhLQgrerhOyi6UW2xkkSFGp6BCCTQXjGMCEn.Gp3G', 1, 1),
(2, 'Петров Петр Петрович', 'admin', 'admin@gmail.com', '+7 999 123-45-02', '$2y$10$m6QAgcOvjyTbJiWsnUKMqeilo5vRSFnPdzmlSCHv6xxIEiLatFlGy', 0, 1),
(3, 'Александров Александр Александрович', 'superUser', 'superUser@gmail.com', '+7 999 123-45-03', '$2y$10$LG18XVK7bhploSn2gFd1QegI2x3tqnckpz.l/kVBH5P1vDJwldH5O', 0, 0),
(4, 'Сидоров Сидор Сидорович', 'superVisor', 'superVisor@gmail.com', '+7 999 123-45-04', '$2y$10$47IUvppZfWrS.HS9Ub4gQuBUqKE0fwcCgbimLWPJ6OSlcMeG310am', 1, 0),
(5, 'Тестов Тест Тестович', 'root', 'root@gmail.com', '+7 999 123-45-05', '$2y$10$Sbnqu9qI6bYe30qpJ8G9R.s1Ba5BhVpjBHE8q3LnYpBI55.MemLfe', 1, 1);

-- --------------------------------------------------------

--
-- Структура таблицы `user_group`
--

CREATE TABLE `user_group` (
  `user_id` int(11) NOT NULL,
  `group_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Дамп данных таблицы `user_group`
--

INSERT INTO `user_group` (`user_id`, `group_id`) VALUES
(1, 1),
(1, 2),
(2, 1),
(3, 1),
(3, 2),
(4, 1),
(5, 1),
(5, 2);

--
-- Индексы сохранённых таблиц
--

--
-- Индексы таблицы `colors`
--
ALTER TABLE `colors`
  ADD PRIMARY KEY (`name`,`code`),
  ADD UNIQUE KEY `colors_code_uindex` (`code`),
  ADD UNIQUE KEY `colors_name_uindex` (`name`);

--
-- Индексы таблицы `groups`
--
ALTER TABLE `groups`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `users_groups_name_uindex` (`name`);

--
-- Индексы таблицы `messages`
--
ALTER TABLE `messages`
  ADD PRIMARY KEY (`id`),
  ADD KEY `messages_users_id_fk` (`recipient_id`),
  ADD KEY `messages_users_id_fk_2` (`sender_id`);

--
-- Индексы таблицы `section`
--
ALTER TABLE `section`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `section_path_uindex` (`path`),
  ADD KEY `section_colors_name_fk` (`color`),
  ADD KEY `section_users_id_fk` (`creator_id`);

--
-- Индексы таблицы `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `users_email_uindex` (`email`),
  ADD UNIQUE KEY `users_phone_uindex` (`phone`);

--
-- Индексы таблицы `user_group`
--
ALTER TABLE `user_group`
  ADD PRIMARY KEY (`user_id`,`group_id`),
  ADD KEY `user_group_groups_id_fk` (`group_id`);

--
-- AUTO_INCREMENT для сохранённых таблиц
--

--
-- AUTO_INCREMENT для таблицы `groups`
--
ALTER TABLE `groups`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT для таблицы `messages`
--
ALTER TABLE `messages`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=36;

--
-- AUTO_INCREMENT для таблицы `section`
--
ALTER TABLE `section`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT для таблицы `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- Ограничения внешнего ключа сохраненных таблиц
--

--
-- Ограничения внешнего ключа таблицы `messages`
--
ALTER TABLE `messages`
  ADD CONSTRAINT `messages_users_id_fk` FOREIGN KEY (`recipient_id`) REFERENCES `users` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `messages_users_id_fk_2` FOREIGN KEY (`sender_id`) REFERENCES `users` (`id`) ON UPDATE CASCADE;

--
-- Ограничения внешнего ключа таблицы `section`
--
ALTER TABLE `section`
  ADD CONSTRAINT `section_colors_name_fk` FOREIGN KEY (`color`) REFERENCES `colors` (`name`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `section_users_id_fk` FOREIGN KEY (`creator_id`) REFERENCES `users` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Ограничения внешнего ключа таблицы `user_group`
--
ALTER TABLE `user_group`
  ADD CONSTRAINT `user_group_groups_id_fk` FOREIGN KEY (`group_id`) REFERENCES `groups` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `user_group_users_id_fk` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
