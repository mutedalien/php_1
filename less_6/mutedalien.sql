-- phpMyAdmin SQL Dump
-- version 4.9.0.1
-- https://www.phpmyadmin.net/
--
-- Хост: 127.0.0.1:3306
-- Время создания: Фев 02 2020 г., 18:26
-- Версия сервера: 10.3.13-MariaDB-log
-- Версия PHP: 7.1.32

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- База данных: `mutedalien`
--

-- --------------------------------------------------------

--
-- Структура таблицы `feedback`
--

CREATE TABLE `feedback` (
  `id` int(11) NOT NULL,
  `feedback` text NOT NULL,
  `nickname` varchar(64) NOT NULL DEFAULT 'Аноним'
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Дамп данных таблицы `feedback`
--

INSERT INTO `feedback` (`id`, `feedback`, `nickname`) VALUES
(16, 'Тестовый отзыв', 'Святослав'),
(17, 'Отлично =)', 'Святослав');

-- --------------------------------------------------------

--
-- Структура таблицы `gallery_images`
--

CREATE TABLE `gallery_images` (
  `id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `path` varchar(255) NOT NULL,
  `size` int(11) NOT NULL,
  `views` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Дамп данных таблицы `gallery_images`
--

INSERT INTO `gallery_images` (`id`, `name`, `path`, `size`, `views`) VALUES
(1, '1.jpg', 'img/gallery/', 104087, 2),
(2, '2.jpg', 'img/gallery/', 112410, 2),
(3, '3.jpg', 'img/gallery/', 53851, 2),
(4, '4.jpg', 'img/gallery/', 242724, 4);

-- --------------------------------------------------------

--
-- Структура таблицы `products`
--

CREATE TABLE `products` (
  `id` int(11) NOT NULL,
  `name` varchar(250) NOT NULL,
  `price` decimal(6,2) NOT NULL,
  `description` text NOT NULL,
  `image` varchar(250) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Дамп данных таблицы `products`
--

INSERT INTO `products` (`id`, `name`, `price`, `description`, `image`) VALUES
(1, 'HZXVOGEN дуговой сварочный аппарат ', '3195.00', 'HZXVOGEN дуговой сварочный аппарат 3,2 мм 4,0 мм Инвертор Мини ARC200 портативный многофункциональный дуговой сварочный аппарат 220 В для домашнего использования начинающих\r\n', 'HZXVOGEN.jpg'),
(7, 'IGBT инвертор дуговой', '1661.00', 'дуговой IGBT инвертор дуговой Электрический сварочный аппарат 220 В 200A MMA сварочные аппараты для сварки рабочих электрических рабочих электроинструментов', 'IGBT.jpg'),
(8, 'Zx7 серии DC инвертор дуговой сварки', '3195.00', 'Zx7 серии DC инвертор дуговой сварки 220 В IGBT MMA сварочный аппарат 250 ампер для начинающих легкий эффективный\r\n', 'Zx7_serii_DC.jpg'),
(9, 'Zx7-200 Инвертор постоянного тока дуговой аппарат для ручной сварки', '3389.00', 'Новый Zx7-200 Инвертор постоянного тока дуговой аппарат для ручной сварки сварочные инструменты для начинающих легкий эффективный стабилизированный сварочный аппарат\r\n', 'Zx7200.jpg');

--
-- Индексы сохранённых таблиц
--

--
-- Индексы таблицы `feedback`
--
ALTER TABLE `feedback`
  ADD PRIMARY KEY (`id`);

--
-- Индексы таблицы `gallery_images`
--
ALTER TABLE `gallery_images`
  ADD PRIMARY KEY (`id`);

--
-- Индексы таблицы `products`
--
ALTER TABLE `products`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT для сохранённых таблиц
--

--
-- AUTO_INCREMENT для таблицы `feedback`
--
ALTER TABLE `feedback`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=18;

--
-- AUTO_INCREMENT для таблицы `gallery_images`
--
ALTER TABLE `gallery_images`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- AUTO_INCREMENT для таблицы `products`
--
ALTER TABLE `products`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
