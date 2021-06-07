-- phpMyAdmin SQL Dump
-- version 5.0.4
-- https://www.phpmyadmin.net/
--
-- Хост: 127.0.0.1:3306
-- Время создания: Июн 07 2021 г., 16:04
-- Версия сервера: 8.0.19
-- Версия PHP: 8.0.1

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- База данных: `diplomawork`
--

-- --------------------------------------------------------

--
-- Структура таблицы `id_group_id_user`
--

CREATE TABLE `id_group_id_user` (
  `id_user` int NOT NULL,
  `id_group` varchar(15) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Дамп данных таблицы `id_group_id_user`
--

INSERT INTO `id_group_id_user` (`id_user`, `id_group`) VALUES
(12, '3719');

-- --------------------------------------------------------

--
-- Структура таблицы `roles`
--

CREATE TABLE `roles` (
  `id` int NOT NULL,
  `role` varchar(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Дамп данных таблицы `roles`
--

INSERT INTO `roles` (`id`, `role`) VALUES
(1, 'Администратор'),
(2, 'Студент');

-- --------------------------------------------------------

--
-- Структура таблицы `users`
--

CREATE TABLE `users` (
  `id` int NOT NULL,
  `login` varchar(50) NOT NULL,
  `password` varchar(256) NOT NULL,
  `fio` varchar(50) NOT NULL,
  `id_role` int NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Дамп данных таблицы `users`
--

INSERT INTO `users` (`id`, `login`, `password`, `fio`, `id_role`) VALUES
(7, 'new-admin', '$2y$10$V4Mmnx0lHQvH05H0efXoIum7uBOVyGp4WAk3/19PYZGYz5QzJUhX2', 'Гордеев Платон Матвеевич', 1),
(12, 'user', '$2y$10$chhtg1wjMZi9WLORZ3uiU.LzfYgZtIQH/34A5NovRSThLk2/3QIFq', 'Белов Исак Яковлевич', 2),
(13, 'admin', '$2y$10$ju00YLgmVY1EWGxIvliZXuew8Z9UBrShQtX0ynmbFBdueWMwI/L2a', 'Комаров Алан Семенович', 1);

-- --------------------------------------------------------

--
-- Структура таблицы `wordssets`
--

CREATE TABLE `wordssets` (
  `id` int NOT NULL,
  `name` varchar(20) NOT NULL,
  `words` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Дамп данных таблицы `wordssets`
--

INSERT INTO `wordssets` (`id`, `name`, `words`) VALUES
(1, 'Набор слов 1', 'paper line year few new find eat play America grow may along will need before head place know read idea follow sentence without men also play walk light close paid able all reports companies car home quality command At corporate often certain received Last looking best doesn\'t Last example line too carry work she an both been three these paper close be line air thing year river way'),
(2, 'Набор слов 2', 'text energy similar drug requirements can\'t And trying It On cents created you basis July also received isn\'t DOS fall ago gain market drive around began file which annual conditions nation\'s North within P three their When exchange ever nuclear total rather Mr. until was bid security any central commercial prices of workers T speed needs be needed but know decided t potentialechnical Mr cent German income toward America stocks such applications uses taking within authorities She potential believe yen I\'m management'),
(3, 'Набор слов 3', 'On cents also received market which North exchange until was commercial needs be cent German stocks such within believe yen');

--
-- Индексы сохранённых таблиц
--

--
-- Индексы таблицы `id_group_id_user`
--
ALTER TABLE `id_group_id_user`
  ADD KEY `id_user` (`id_user`);

--
-- Индексы таблицы `roles`
--
ALTER TABLE `roles`
  ADD PRIMARY KEY (`id`);

--
-- Индексы таблицы `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD KEY `id_role` (`id_role`);

--
-- Индексы таблицы `wordssets`
--
ALTER TABLE `wordssets`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT для сохранённых таблиц
--

--
-- AUTO_INCREMENT для таблицы `roles`
--
ALTER TABLE `roles`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT для таблицы `users`
--
ALTER TABLE `users`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- AUTO_INCREMENT для таблицы `wordssets`
--
ALTER TABLE `wordssets`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- Ограничения внешнего ключа сохраненных таблиц
--

--
-- Ограничения внешнего ключа таблицы `id_group_id_user`
--
ALTER TABLE `id_group_id_user`
  ADD CONSTRAINT `id_group_id_user_ibfk_1` FOREIGN KEY (`id_user`) REFERENCES `users` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Ограничения внешнего ключа таблицы `users`
--
ALTER TABLE `users`
  ADD CONSTRAINT `users_ibfk_1` FOREIGN KEY (`id_role`) REFERENCES `roles` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
