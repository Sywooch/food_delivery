-- phpMyAdmin SQL Dump
-- version 4.4.15.7
-- http://www.phpmyadmin.net
--
-- Хост: 127.0.0.1:3306
-- Время создания: Фев 15 2018 г., 16:20
-- Версия сервера: 5.6.31
-- Версия PHP: 5.6.23

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- База данных: `bbq`
--

-- --------------------------------------------------------

--
-- Структура таблицы `auth_assignment`
--

CREATE TABLE IF NOT EXISTS `auth_assignment` (
  `item_name` varchar(64) COLLATE utf8_unicode_ci NOT NULL,
  `user_id` varchar(64) COLLATE utf8_unicode_ci NOT NULL,
  `created_at` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Дамп данных таблицы `auth_assignment`
--

INSERT INTO `auth_assignment` (`item_name`, `user_id`, `created_at`) VALUES
('Администратор', '1', 1517858871),
('Администратор', '14', 1530535758),
('Администратор', '21', 1538478133);

-- --------------------------------------------------------

--
-- Структура таблицы `auth_item`
--

CREATE TABLE IF NOT EXISTS `auth_item` (
  `name` varchar(64) COLLATE utf8_unicode_ci NOT NULL,
  `type` smallint(6) NOT NULL,
  `description` text COLLATE utf8_unicode_ci,
  `rule_name` varchar(64) COLLATE utf8_unicode_ci DEFAULT NULL,
  `data` blob,
  `created_at` int(11) DEFAULT NULL,
  `updated_at` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Дамп данных таблицы `auth_item`
--

INSERT INTO `auth_item` (`name`, `type`, `description`, `rule_name`, `data`, `created_at`, `updated_at`) VALUES
('/category/*', 2, NULL, NULL, NULL, 1518003365, 1518003365),
('/city-area/*', 2, NULL, NULL, NULL, 1518695448, 1518695448),
('/debug/*', 2, NULL, NULL, NULL, 1518428732, 1518428732),
('/products/*', 2, NULL, NULL, NULL, 1518078634, 1518078634),
('/site-settings/*', 2, NULL, NULL, NULL, 1518285050, 1518285050),
('/site/*', 2, NULL, NULL, NULL, 1518334805, 1518334805),
('/staff/*', 2, NULL, NULL, NULL, 1517912440, 1517912440),
('Администратор', 1, NULL, NULL, NULL, 1517858831, 1518695452),
('Менеджер', 1, NULL, NULL, NULL, 1517858840, 1517858840);

-- --------------------------------------------------------

--
-- Структура таблицы `auth_item_child`
--

CREATE TABLE IF NOT EXISTS `auth_item_child` (
  `parent` varchar(64) COLLATE utf8_unicode_ci NOT NULL,
  `child` varchar(64) COLLATE utf8_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Дамп данных таблицы `auth_item_child`
--

INSERT INTO `auth_item_child` (`parent`, `child`) VALUES
('Администратор', '/category/*'),
('Администратор', '/city-area/*'),
('Администратор', '/debug/*'),
('Администратор', '/products/*'),
('Администратор', '/site-settings/*'),
('Администратор', '/site/*'),
('Администратор', '/staff/*');

-- --------------------------------------------------------

--
-- Структура таблицы `auth_rule`
--

CREATE TABLE IF NOT EXISTS `auth_rule` (
  `name` varchar(64) COLLATE utf8_unicode_ci NOT NULL,
  `data` blob,
  `created_at` int(11) DEFAULT NULL,
  `updated_at` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Структура таблицы `category`
--

CREATE TABLE IF NOT EXISTS `category` (
  `id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `description` text NOT NULL,
  `picture` varchar(255) DEFAULT NULL,
  `meta_title` varchar(255) DEFAULT NULL,
  `meta_description` text,
  `status` int(11) NOT NULL DEFAULT '1',
  `created_at` timestamp NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB AUTO_INCREMENT=8 DEFAULT CHARSET=utf8;

--
-- Дамп данных таблицы `category`
--

INSERT INTO `category` (`id`, `name`, `description`, `picture`, `meta_title`, `meta_description`, `status`, `created_at`) VALUES
(1, 'Бургеры', '<p><strong>Очень вкусные бургеры</strong></p>\r\n', '/backend/web/storage/category_images/5a7c02354bd63.jpg', 'Мета заголовок', 'Мета описание', 1, '2018-02-07 12:57:47'),
(2, 'Гриль', '<p>Очень вкусно!</p>\r\n', '/backend/web/storage/category_images/5a7c02401e40e.jpeg', '', '', 1, '2018-02-08 07:49:33'),
(3, 'Салаты', '<p>Вкусные салаты</p>\r\n', '/backend/web/storage/category_images/5a7c024d0c725.jpg', '', '', 1, '2018-02-08 07:50:00'),
(4, 'Супы', '<p>Вкусные супы</p>\r\n', '/backend/web/storage/category_images/5a7c026b03eaf.jpg', '', '', 1, '2018-02-08 07:50:17'),
(5, 'Десерты', '<p>Вкусные десерты</p>\r\n', '/backend/web/storage/category_images/5a7c028195765.jpg', '', '', 1, '2018-02-08 07:51:10'),
(6, 'Напитки', '<p>Вкусные напитки</p>\r\n', '/backend/web/storage/category_images/5a7c028bacc22.jpg', '', '', 1, '2018-02-08 07:51:26');

-- --------------------------------------------------------

--
-- Структура таблицы `city_area`
--

CREATE TABLE IF NOT EXISTS `city_area` (
  `id` int(11) NOT NULL,
  `region` varchar(255) NOT NULL,
  `delivery_price` decimal(10,2) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=9 DEFAULT CHARSET=utf8;

--
-- Дамп данных таблицы `city_area`
--

INSERT INTO `city_area` (`id`, `region`, `delivery_price`) VALUES
(1, 'Центр', '50.00'),
(2, 'Правый берег', '65.00'),
(3, 'Бабурка', '80.00'),
(4, 'Павло-Кичкас', '70.00'),
(5, 'Шевченковский', '80.00'),
(6, 'Космос', '85.00'),
(7, 'Пески', '75.00');

-- --------------------------------------------------------

--
-- Структура таблицы `payment_system`
--

CREATE TABLE IF NOT EXISTS `payment_system` (
  `id` int(11) NOT NULL,
  `public_key` text NOT NULL,
  `private_key` text NOT NULL,
  `payment_name` varchar(255) NOT NULL,
  `sandbox` int(11) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8;

--
-- Дамп данных таблицы `payment_system`
--

INSERT INTO `payment_system` (`id`, `public_key`, `private_key`, `payment_name`, `sandbox`) VALUES
(1, 'ZmdqbmZ5Njdodmc0NWh5ZjRmaDdm', 'c2RmZ3NkZmczNDV3Y3R3dGM0Y3Q=', 'Оплата заказа', 0);

-- --------------------------------------------------------

--
-- Структура таблицы `products`
--

CREATE TABLE IF NOT EXISTS `products` (
  `id` int(11) NOT NULL,
  `category_id` int(11) NOT NULL,
  `title` varchar(255) NOT NULL,
  `description` text NOT NULL,
  `composition` text NOT NULL,
  `picture` varchar(255) DEFAULT NULL,
  `price` decimal(10,2) NOT NULL,
  `discount_price` decimal(10,2) DEFAULT NULL,
  `meta_title` varchar(255) DEFAULT NULL,
  `meta_description` text,
  `status` int(11) DEFAULT '1',
  `created_at` timestamp NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8;

--
-- Дамп данных таблицы `products`
--

INSERT INTO `products` (`id`, `category_id`, `title`, `description`, `composition`, `picture`, `price`, `discount_price`, `meta_title`, `meta_description`, `status`, `created_at`) VALUES
(1, 1, 'Сочный бургер', '<p><strong>Супер бургер!</strong></p>\r\n', '<p>Состоит из:</p>\r\n\r\n<ol>\r\n	<li>Мяса</li>\r\n	<li>булки</li>\r\n</ol>\r\n', '/backend/web/storage/product_images/5a7c1920c7301.jpg', '115.50', '78.99', 'Мета заголовок', 'Мета описание', 1, '2018-02-08 09:32:16');

-- --------------------------------------------------------

--
-- Структура таблицы `profile`
--

CREATE TABLE IF NOT EXISTS `profile` (
  `id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `surname` varchar(255) NOT NULL,
  `avatar` varchar(255) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT CURRENT_TIMESTAMP,
  `user_id` int(11) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=19 DEFAULT CHARSET=utf8;

--
-- Дамп данных таблицы `profile`
--

INSERT INTO `profile` (`id`, `name`, `surname`, `avatar`, `created_at`, `user_id`) VALUES
(1, 'Влад', 'Батькович', '/backend/web/storage/user_avatars/5a7ffaf410b8d.jpg', '2018-02-06 09:25:13', 1),
(11, 'Name', 'Surname', '/backend/web/storage/user_avatars/5a7ad97187a94.jpg', '2018-02-07 09:49:18', 14),
(18, 'Администратор', 'Администраторович', '/backend/web/storage/user_avatars/5a7f4fc58ab35.jpg', '2018-02-10 20:02:13', 21);

-- --------------------------------------------------------

--
-- Структура таблицы `site_settings`
--

CREATE TABLE IF NOT EXISTS `site_settings` (
  `id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `logo` varchar(255) DEFAULT NULL,
  `time_from` varchar(10) NOT NULL,
  `time_to` varchar(10) NOT NULL,
  `score` int(11) NOT NULL,
  `facebook_url` varchar(255) DEFAULT NULL,
  `instagram_url` varchar(255) DEFAULT NULL,
  `facebook_status` int(11) DEFAULT '1',
  `instagram_status` int(11) DEFAULT '1',
  `page_title` varchar(255) DEFAULT NULL,
  `meta_title` varchar(255) DEFAULT NULL,
  `meta_description` text
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8;

--
-- Дамп данных таблицы `site_settings`
--

INSERT INTO `site_settings` (`id`, `name`, `logo`, `time_from`, `time_to`, `score`, `facebook_url`, `instagram_url`, `facebook_status`, `instagram_status`, `page_title`, `meta_title`, `meta_description`) VALUES
(1, 'BBQ delivery', '/backend/web/storage/site_logo/5a856fe254585.jpg', '08:00', '20:00', 50, 'https://www.facebook.com/', 'https://www.instagram.com/?hl=ru', 1, 0, 'BBQ', 'BBQ Запорожье', 'Лучшая доставка в городе!');

-- --------------------------------------------------------

--
-- Структура таблицы `user`
--

CREATE TABLE IF NOT EXISTS `user` (
  `id` int(11) NOT NULL,
  `username` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `auth_key` varchar(32) COLLATE utf8_unicode_ci NOT NULL,
  `password_hash` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `password_reset_token` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `email` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `status` smallint(6) NOT NULL DEFAULT '10',
  `created_at` int(11) NOT NULL,
  `updated_at` int(11) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=22 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Дамп данных таблицы `user`
--

INSERT INTO `user` (`id`, `username`, `auth_key`, `password_hash`, `password_reset_token`, `email`, `status`, `created_at`, `updated_at`) VALUES
(1, 'admin', 't4lPoUKAyP63FC2CV5f-luTIfNiG-Fls', '$2y$13$CtBVxEo9es.RqgXe2cfL8unNx0hMNNmwrr4htzQAzM/J/4dobSS6.', NULL, 'prybylov.v@gmail.com', 10, 1517858167, 1518343937),
(14, 'Name_5a7ada7999d35', 'SZRkgQ9jmer26fw0LlOwhU6UF6ce126s', '$2y$13$rH4fWuW.0EzM99gN.suQe.l.vJzSh97tMbMSvUna/1uTvXkHuYDwG', NULL, 'some@gmail.com', 10, 1517996958, 1518599021),
(21, 'Администратор_5a7f4fc4cb663', 'uLZN4fiSohSioetHOLqhoL3bTSx9X6Hi', '$2y$13$QSBMC9snjDNwYgDOV5alJ.tyizLsjJ35eJhD0KpvvPWZyIY6Q.a7K', NULL, 'prybylov2.v@gmail.com', 10, 1518292933, 1518445847);

--
-- Индексы сохранённых таблиц
--

--
-- Индексы таблицы `auth_assignment`
--
ALTER TABLE `auth_assignment`
  ADD PRIMARY KEY (`item_name`,`user_id`),
  ADD KEY `auth_assignment_user_id_idx` (`user_id`);

--
-- Индексы таблицы `auth_item`
--
ALTER TABLE `auth_item`
  ADD PRIMARY KEY (`name`),
  ADD KEY `rule_name` (`rule_name`),
  ADD KEY `idx-auth_item-type` (`type`);

--
-- Индексы таблицы `auth_item_child`
--
ALTER TABLE `auth_item_child`
  ADD PRIMARY KEY (`parent`,`child`),
  ADD KEY `child` (`child`);

--
-- Индексы таблицы `auth_rule`
--
ALTER TABLE `auth_rule`
  ADD PRIMARY KEY (`name`);

--
-- Индексы таблицы `category`
--
ALTER TABLE `category`
  ADD PRIMARY KEY (`id`);

--
-- Индексы таблицы `city_area`
--
ALTER TABLE `city_area`
  ADD PRIMARY KEY (`id`);

--
-- Индексы таблицы `payment_system`
--
ALTER TABLE `payment_system`
  ADD PRIMARY KEY (`id`);

--
-- Индексы таблицы `products`
--
ALTER TABLE `products`
  ADD PRIMARY KEY (`id`),
  ADD KEY `products_ibfk_1` (`category_id`);

--
-- Индексы таблицы `profile`
--
ALTER TABLE `profile`
  ADD PRIMARY KEY (`id`),
  ADD KEY `profile_ibfk_1` (`user_id`);

--
-- Индексы таблицы `site_settings`
--
ALTER TABLE `site_settings`
  ADD PRIMARY KEY (`id`);

--
-- Индексы таблицы `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `email` (`email`),
  ADD UNIQUE KEY `username` (`username`),
  ADD UNIQUE KEY `password_reset_token` (`password_reset_token`);

--
-- AUTO_INCREMENT для сохранённых таблиц
--

--
-- AUTO_INCREMENT для таблицы `category`
--
ALTER TABLE `category`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=8;
--
-- AUTO_INCREMENT для таблицы `city_area`
--
ALTER TABLE `city_area`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=9;
--
-- AUTO_INCREMENT для таблицы `payment_system`
--
ALTER TABLE `payment_system`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT для таблицы `products`
--
ALTER TABLE `products`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT для таблицы `profile`
--
ALTER TABLE `profile`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=19;
--
-- AUTO_INCREMENT для таблицы `site_settings`
--
ALTER TABLE `site_settings`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT для таблицы `user`
--
ALTER TABLE `user`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=22;
--
-- Ограничения внешнего ключа сохраненных таблиц
--

--
-- Ограничения внешнего ключа таблицы `auth_assignment`
--
ALTER TABLE `auth_assignment`
  ADD CONSTRAINT `auth_assignment_ibfk_1` FOREIGN KEY (`item_name`) REFERENCES `auth_item` (`name`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Ограничения внешнего ключа таблицы `auth_item`
--
ALTER TABLE `auth_item`
  ADD CONSTRAINT `auth_item_ibfk_1` FOREIGN KEY (`rule_name`) REFERENCES `auth_rule` (`name`) ON DELETE SET NULL ON UPDATE CASCADE;

--
-- Ограничения внешнего ключа таблицы `auth_item_child`
--
ALTER TABLE `auth_item_child`
  ADD CONSTRAINT `auth_item_child_ibfk_1` FOREIGN KEY (`parent`) REFERENCES `auth_item` (`name`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `auth_item_child_ibfk_2` FOREIGN KEY (`child`) REFERENCES `auth_item` (`name`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Ограничения внешнего ключа таблицы `products`
--
ALTER TABLE `products`
  ADD CONSTRAINT `products_ibfk_1` FOREIGN KEY (`category_id`) REFERENCES `category` (`id`) ON DELETE CASCADE;

--
-- Ограничения внешнего ключа таблицы `profile`
--
ALTER TABLE `profile`
  ADD CONSTRAINT `profile_ibfk_1` FOREIGN KEY (`user_id`) REFERENCES `user` (`id`) ON DELETE CASCADE;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
