-- phpMyAdmin SQL Dump
-- version 4.9.0.1
-- https://www.phpmyadmin.net/
--
-- Хост: 127.0.0.1:3306
-- Время создания: Фев 05 2020 г., 22:37
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
-- База данных: `less7`
--

-- --------------------------------------------------------

--
-- Структура таблицы `goods`
--

CREATE TABLE `goods` (
  `id` int(11) NOT NULL,
  `good` varchar(30) NOT NULL,
  `description` varchar(256) NOT NULL,
  `price` decimal(10,0) NOT NULL,
  `good_img` varchar(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Дамп данных таблицы `goods`
--

INSERT INTO `goods` (`id`, `good`, `description`, `price`, `good_img`) VALUES
(1, 'Мышь', 'Мышь красная', '30', 'mouse.jpg'),
(2, 'Клавиатура', 'Клавиатура русифицированная', '200', 'button.jpg'),
(3, 'Монитор', 'Монитор 21\\\"', '4000', 'monitor.jpg'),
(4, 'macbook', 'macbook белый 12\\\"', '60000', 'macbook.jpg');

-- --------------------------------------------------------

--
-- Структура таблицы `orders`
--

CREATE TABLE `orders` (
  `id` int(11) NOT NULL,
  `products` text NOT NULL,
  `id_user` int(11) NOT NULL,
  `status` int(11) NOT NULL,
  `date` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Дамп данных таблицы `orders`
--

INSERT INTO `orders` (`id`, `products`, `id_user`, `status`, `date`) VALUES
(115, '[{\"id\":\"1\",\"good\":\"\\u041c\\u044b\\u0448\\u044c\",\"description\":\"\\u041c\\u044b\\u0448\\u044c \\u043a\\u0440\\u0430\\u0441\\u043d\\u0430\\u044f\",\"price\":\"30\",\"good_img\":\"mouse.jpg\"}]', 10, 1, '2020-02-05'),
(116, '[{\"id\":\"2\",\"good\":\"\\u041a\\u043b\\u0430\\u0432\\u0438\\u0430\\u0442\\u0443\\u0440\\u0430\",\"description\":\"\\u041a\\u043b\\u0430\\u0432\\u0438\\u0430\\u0442\\u0443\\u0440\\u0430 \\u0440\\u0443\\u0441\\u0438\\u0444\\u0438\\u0446\\u0438\\u0440\\u043e\\u0432\\u0430\\u043d\\u043d\\u0430\\u044f\",\"price\":\"200\",\"good_img\":\"button.jpg\"},{\"id\":\"3\",\"good\":\"\\u041c\\u043e\\u043d\\u0438\\u0442\\u043e\\u0440\",\"description\":\"\\u041c\\u043e\\u043d\\u0438\\u0442\\u043e\\u0440 21\\\\\\\"\",\"price\":\"4000\",\"good_img\":\"monitor.jpg\"}]', 11, 1, '2020-02-05'),
(117, '[{\"id\":\"1\",\"good\":\"\\u041c\\u044b\\u0448\\u044c\",\"description\":\"\\u041c\\u044b\\u0448\\u044c \\u043a\\u0440\\u0430\\u0441\\u043d\\u0430\\u044f\",\"price\":\"30\",\"good_img\":\"mouse.jpg\"}]', 11, 1, '2020-02-05'),
(118, '[{\"id\":\"2\",\"good\":\"\\u041a\\u043b\\u0430\\u0432\\u0438\\u0430\\u0442\\u0443\\u0440\\u0430\",\"description\":\"\\u041a\\u043b\\u0430\\u0432\\u0438\\u0430\\u0442\\u0443\\u0440\\u0430 \\u0440\\u0443\\u0441\\u0438\\u0444\\u0438\\u0446\\u0438\\u0440\\u043e\\u0432\\u0430\\u043d\\u043d\\u0430\\u044f\",\"price\":\"200\",\"good_img\":\"button.jpg\"}]', 11, 1, '2020-02-05');

-- --------------------------------------------------------

--
-- Структура таблицы `status`
--

CREATE TABLE `status` (
  `id` int(11) NOT NULL,
  `name` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Дамп данных таблицы `status`
--

INSERT INTO `status` (`id`, `name`) VALUES
(1, 'start'),
(2, 'reject'),
(3, 'delivery'),
(4, 'success'),
(5, 'reject-user');

-- --------------------------------------------------------

--
-- Структура таблицы `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `login` varchar(30) NOT NULL,
  `pass` varchar(50) NOT NULL,
  `name` varchar(100) NOT NULL,
  `is_admin` int(1) NOT NULL DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Дамп данных таблицы `users`
--

INSERT INTO `users` (`id`, `login`, `pass`, `name`, `is_admin`) VALUES
(10, 'mutedalien', '202cb962ac59075b964b07152d234b70', 'Svyatoslav', 1),
(11, 'sergey', '202cb962ac59075b964b07152d234b70', 'Сергей Герасименко', 0);

--
-- Индексы сохранённых таблиц
--

--
-- Индексы таблицы `goods`
--
ALTER TABLE `goods`
  ADD PRIMARY KEY (`id`);

--
-- Индексы таблицы `orders`
--
ALTER TABLE `orders`
  ADD PRIMARY KEY (`id`);

--
-- Индексы таблицы `status`
--
ALTER TABLE `status`
  ADD PRIMARY KEY (`id`);

--
-- Индексы таблицы `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT для сохранённых таблиц
--

--
-- AUTO_INCREMENT для таблицы `goods`
--
ALTER TABLE `goods`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT для таблицы `orders`
--
ALTER TABLE `orders`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=119;

--
-- AUTO_INCREMENT для таблицы `status`
--
ALTER TABLE `status`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT для таблицы `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
