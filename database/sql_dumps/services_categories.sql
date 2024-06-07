-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Хост: MySQL-8.2
-- Время создания: Июн 07 2024 г., 18:59
-- Версия сервера: 8.2.0
-- Версия PHP: 8.2.18

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- База данных: `domovkin`
--

-- --------------------------------------------------------

--
-- Структура таблицы `services_categories`
--

CREATE TABLE `services_categories` (
  `id` bigint UNSIGNED NOT NULL,
  `name` text COLLATE utf8mb4_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Дамп данных таблицы `services_categories`
--

INSERT INTO `services_categories` (`id`, `name`) VALUES
(1, 'Подготовительные работы'),
(2, 'Разбивочные и геодезические работы'),
(3, 'Земляные работы'),
(4, 'Гидроизоляция'),
(5, 'Теплоизоляция'),
(6, 'Устройство опалубки'),
(7, 'Армирование'),
(8, 'Бетонирование'),
(9, 'Устройство стяжек, бетонных полов'),
(10, 'Сборные железобетонные конструкции'),
(11, 'Стены: конструкции из кирпича и блоков'),
(12, 'Стены: устройство вентканалов и дымоходов'),
(13, 'Стены: теплоизоляция'),
(14, 'Стены: закладные детали'),
(15, 'Стены: рубка, каркас'),
(16, 'Стены: перекрытия'),
(17, 'Стены: прочие работы'),
(18, 'Крыша: устройство стропильных конструкций, обрешетки'),
(19, 'Крыша: теплоизоляция'),
(20, 'Крыша: устройство покрытия кровли'),
(21, 'Крыша: водосточная система, софиты и прочие');

--
-- Индексы сохранённых таблиц
--

--
-- Индексы таблицы `services_categories`
--
ALTER TABLE `services_categories`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT для сохранённых таблиц
--

--
-- AUTO_INCREMENT для таблицы `services_categories`
--
ALTER TABLE `services_categories`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=22;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
