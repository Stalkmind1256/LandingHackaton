-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Хост: mariadb
-- Время создания: Апр 04 2024 г., 19:39
-- Версия сервера: 10.11.7-MariaDB-1:10.11.7+maria~ubu2204
-- Версия PHP: 8.2.16

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- База данных: `zvezdaopros`
--

-- --------------------------------------------------------

--
-- Структура таблицы `objects`
--

CREATE TABLE `objects` (
  `id` int(11) NOT NULL,
  `name` varchar(255) DEFAULT NULL,
  `img` varchar(100) DEFAULT NULL,
  `description` varchar(100) DEFAULT NULL,
  `price` int(11) DEFAULT NULL,
  `visname` varchar(100) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Дамп данных таблицы `objects`
--

INSERT INTO `objects` (`id`, `name`, `img`, `description`, `price`, `visname`) VALUES
(1, 'besedka_4', 'assets/besedka_4.jpg', NULL, 650000, 'Беседка'),
(2, 'besedka_6', 'assets/besedka_6.jpg', NULL, 450000, 'Беседка'),
(3, 'WC_1', 'assets/WC_1.jpg', NULL, 350000, 'Туалет'),
(4, 'art_object_1', 'assets/art_object_1.jpg', NULL, 3000000, 'Арт объект'),
(5, 'zone_chill_3', 'assets/zone_chill_3.jpg', 'Зона отдыха вдоль торпинок, тротуаров', 65000, 'Зона отдыха'),
(6, 'lijn_baza_2', 'assets/lijn_baza_2.jpg', '', 25000000, 'Лыжная база'),
(7, 'prud_1', 'assets/prud_1.jpg', NULL, 12500000, 'Пруд'),
(8, 'zone_chill_1', 'assets/zone_chill_1.jpg', 'Зона отдыха вдоль торпинок, тротуаров', 65000, 'Зона отдыха'),
(9, 'glemping_3', 'assets/glemping_3.jpg', 'Реализуется за счет средств инвестора', 0, 'Глемпинг'),
(10, 'workout_2', 'assets/workout_2.jpg', 'Покрытие песок', 500000, 'Площадка для воркаута'),
(11, 'amfiteatr_1', 'assets/amfiteatr_1.jpg', NULL, 1000000, 'Амфитеатр'),
(12, 'camping_2', 'assets/camping_2.jpg', 'Реализуется за счет средств инвестора', 0, 'Кэмпинг'),
(13, 'trassa_tubing_3', 'assets/trassa_tubing_3.jpg', 'сходы по подготовке зимой', 0, 'Трасса для тюбингов'),
(14, 'stadion_2', 'assets/stadion_2.jpg', NULL, 25000000, 'Биатлонный стадион'),
(15, 'mini_zoo_3', 'assets/mini_zoo_3.jpg', 'Реализуется за счет средств инвестора', 0, 'Мини зоопарк'),
(16, 'rodnik_2', 'assets/rodnik_2.jpg', NULL, 4000000, 'Родник'),
(17, 'lijn_baza_1', 'assets/lijn_baza_1.jpg', '', 25000000, 'Лыжная база'),
(18, 'glemping_2', 'assets/glemping_2.jpg', 'Реализуется за счет средств инвестора', 0, 'Глемпинг'),
(19, 'art_object_3', 'assets/art_object_3.jpg', 'Скульптуры обитателей Увалов', 3000000, 'Арт объект'),
(20, 'ecoshkila_2', 'assets/ecoshkila_2.jpg', NULL, 10000000, 'Эко школа'),
(21, 'camping_1', 'assets/camping_1.jpg', 'Реализуется за счет средств инвестора', 0, 'Кэмпинг'),
(22, 'ecoshkila_1', 'assets/ecoshkila_1.jpg', NULL, 10000000, 'Эко школа'),
(23, 'det_plosh_2', 'assets/det_plosh_2.jpg', NULL, 30000000, 'Детская площадка'),
(24, 'trassa_downhill_1', 'assets/trassa_downhill_1.jpg', NULL, 2500000, 'Трасса даунхилла'),
(25, 'rodnik_1', 'assets/rodnik_1.jpg', NULL, 4000000, 'Родник'),
(26, 'trassa_tubing_1', 'assets/trassa_tubing_1.jpg', 'Трасса 10млн. Подъемник 8млн.', 18000000, 'Трасса для тюбингов'),
(27, 'amfiteatr_2', 'assets/amfiteatr_2.jpg', NULL, 1000000, 'Амфитеатр'),
(28, 'det_plosh_1', 'assets/det_plosh_1.jpg', NULL, 20000000, 'Детская площадка'),
(29, 'zone_chill_4', 'assets/zone_chill_4.jpg', 'Зона отдыха вдоль торпинок, тротуаров', 65000, 'Зона отдыха'),
(30, 'zone_chill_2', 'assets/zone_chill_2.jpg', 'Зона отдыха вдоль торпинок, тротуаров', 65000, 'Зона отдыха'),
(31, 'workout_1', 'assets/workout_1.jpg', 'Резиновое покрытие', 4000000, 'Площадка для воркаута'),
(32, 'art_object_4', 'assets/art_object_4.jpg', 'Скульптуры обитателей Увалов', 3000000, 'Арт объект'),
(33, 'besedka_2', 'assets/besedka_2.jpg', NULL, 300000, 'Беседка'),
(34, 'prud_2', 'assets/prud_2.jpg', NULL, 12500000, 'Пруд'),
(35, 'liji_trassa_1', 'assets/liji_trassa_1.jpg', 'Протяженность 3км.', 17000000, 'Лыжероллерная трасса'),
(36, 'glemping_1', 'assets/glemping_1.jpg', 'Реализуется за счет средств инвестора', 0, 'Глемпинг'),
(37, 'picnic_place_2', 'assets/picnic_place_2.jpg', NULL, 150000, 'Место для пикника'),
(38, 'Pris-transformed', 'assets/Pris-transformed.png', NULL, NULL, NULL),
(39, 'smotr_plosh_1', 'assets/smotr_plosh_1.jpg', 'площадка, с которой открывается вид на город', 20000000, 'Смотровая площадка'),
(40, 'fon', 'assets/fon.jpg', NULL, NULL, NULL),
(41, 'det_plosh_4', 'assets/det_plosh_4.jpg', NULL, 4000000, 'Детская площадка'),
(42, 'picnic_place_3', 'assets/picnic_place_3.jpg', NULL, 150000, 'Место для пикника'),
(43, 'mini_zoo_2', 'assets/mini_zoo_2.jpg', 'Реализуется за счет средств инвестора', 0, 'Мини зоопарк'),
(44, 'oranj_2', 'assets/oranj_2.jpg', NULL, 300000, 'Оранжерея'),
(45, 'oranj_1', 'assets/oranj_1.jpg', NULL, 300000, 'Оранжерея'),
(46, 'det_plosh_3', 'assets/det_plosh_3.jpg', NULL, 5000000, 'Детская площадка'),
(47, 'art_object_2', 'assets/art_object_2.jpg', NULL, 3000000, 'Арт объект'),
(48, 'trassa_downhill_2', 'assets/trassa_downhill_2.jpg', NULL, 1000000, 'Трасса даунхилла'),
(49, 'verevka', 'assets/verevka.png', NULL, NULL, NULL),
(50, 'Xwf0R1nVy_0', 'assets/Xwf0R1nVy_0.jpg', NULL, NULL, NULL),
(51, 'peshi_1', 'assets/peshi_1.jpg', 'Цена за 1км', 4000000, 'Пешиходные дорожки'),
(52, 'mini_zoo_1', 'assets/mini_zoo_1.png', 'Реализуется за счет средств инвестора', 0, 'Мини зоопарк'),
(53, 'podemnik_1', 'assets/podemnik_1.jpg', NULL, 11000000, 'Подъемник'),
(54, 'besedka_5', 'assets/besedka_5.jpg', NULL, 350000, 'Беседка'),
(55, 'picnic_place_1', 'assets/picnic_place_1.jpg', NULL, 150000, 'Место для пикника'),
(56, 'besedka_1', 'assets/besedka_1.jpg', NULL, 300000, 'Беседка'),
(57, 'trassa_tubing_2', 'assets/trassa_tubing_2.jpg', 'Подъемник 8млн.', 8000000, 'Трасса для тюбингов'),
(58, 'stadion_1', 'assets/stadion_1.png', NULL, 25000000, 'Биатлонный стадион'),
(59, 'besedka_3', 'assets/besedka_3.jpg', NULL, 450000, 'Беседка');

-- --------------------------------------------------------

--
-- Структура таблицы `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `login` varchar(100) DEFAULT NULL,
  `password` varchar(100) DEFAULT NULL,
  `role` varchar(100) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Дамп данных таблицы `users`
--

INSERT INTO `users` (`id`, `login`, `password`, `role`) VALUES
(1, 'qwe', 'qwe', 'admin');

-- --------------------------------------------------------

--
-- Структура таблицы `voters`
--

CREATE TABLE `voters` (
  `id` int(11) NOT NULL,
  `firstname` varchar(255) DEFAULT NULL,
  `birthday` date DEFAULT NULL,
  `gender` varchar(100) DEFAULT NULL,
  `predlozheniya` varchar(400) DEFAULT NULL,
  `lastname` varchar(100) DEFAULT NULL,
  `patronymic` varchar(100) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Дамп данных таблицы `voters`
--

INSERT INTO `voters` (`id`, `firstname`, `birthday`, `gender`, `predlozheniya`, `lastname`, `patronymic`) VALUES
(12, 'Максим', '2002-01-18', 'male', '', 'Пономарев', 'Сергеевич'),
(13, 'Андрей', '2007-07-13', 'male', '', 'Стерхов', 'Анатолий'),
(14, 'Иван', '2002-03-05', 'male', 'Курилку сделайте', 'Истомин', 'Бумбум'),
(15, 'Виктория', '2002-09-18', 'female', '', 'Кожевникова', 'тутуру');

-- --------------------------------------------------------

--
-- Структура таблицы `voter_selections`
--

CREATE TABLE `voter_selections` (
  `user_id` int(11) DEFAULT NULL,
  `votingdate` date DEFAULT NULL,
  `id` int(11) NOT NULL,
  `object_id` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Дамп данных таблицы `voter_selections`
--

INSERT INTO `voter_selections` (`user_id`, `votingdate`, `id`, `object_id`) VALUES
(12, '2024-04-04', 10, 11),
(12, '2024-04-04', 11, 19),
(12, '2024-04-04', 12, 33),
(12, '2024-04-04', 13, 21),
(12, '2024-04-04', 14, 28),
(12, '2024-04-04', 15, 20),
(12, '2024-04-04', 16, 18),
(12, '2024-04-04', 17, 35),
(12, '2024-04-04', 18, 6),
(12, '2024-04-04', 19, 43),
(12, '2024-04-04', 20, 44),
(12, '2024-04-04', 21, 51),
(12, '2024-04-04', 22, 42),
(12, '2024-04-04', 23, 53),
(12, '2024-04-04', 24, 34),
(12, '2024-04-04', 25, 16),
(12, '2024-04-04', 26, 39),
(12, '2024-04-04', 27, 48),
(12, '2024-04-04', 28, 13),
(12, '2024-04-04', 29, 3),
(12, '2024-04-04', 30, 31),
(12, '2024-04-04', 31, 5),
(12, '2024-04-04', 32, 8),
(13, '2024-04-04', 33, 27),
(13, '2024-04-04', 34, 32),
(13, '2024-04-04', 35, 21),
(13, '2024-04-04', 36, 41),
(13, '2024-04-04', 37, 36),
(13, '2024-04-04', 38, 35),
(13, '2024-04-04', 39, 17),
(13, '2024-04-04', 40, 52),
(13, '2024-04-04', 41, 51),
(13, '2024-04-04', 42, 42),
(13, '2024-04-04', 43, 53),
(13, '2024-04-04', 44, 7),
(13, '2024-04-04', 45, 25),
(13, '2024-04-04', 46, 39),
(13, '2024-04-04', 47, 48),
(13, '2024-04-04', 48, 3),
(13, '2024-04-04', 49, 31),
(13, '2024-04-04', 50, 5),
(13, '2024-04-04', 51, 8),
(14, '2024-04-04', 52, 27),
(14, '2024-04-04', 53, 32),
(14, '2024-04-04', 54, 21),
(14, '2024-04-04', 55, 41),
(14, '2024-04-04', 56, 36),
(14, '2024-04-04', 57, 35),
(14, '2024-04-04', 58, 17),
(14, '2024-04-04', 59, 52),
(14, '2024-04-04', 60, 51),
(14, '2024-04-04', 61, 42),
(14, '2024-04-04', 62, 53),
(14, '2024-04-04', 63, 7),
(14, '2024-04-04', 64, 25),
(14, '2024-04-04', 65, 39),
(14, '2024-04-04', 66, 48),
(14, '2024-04-04', 67, 3),
(14, '2024-04-04', 68, 31),
(14, '2024-04-04', 69, 5),
(14, '2024-04-04', 70, 8),
(15, '2024-04-04', 71, 27),
(15, '2024-04-04', 72, 19),
(15, '2024-04-04', 73, 32),
(15, '2024-04-04', 74, 47),
(15, '2024-04-04', 75, 2),
(15, '2024-04-04', 76, 59),
(15, '2024-04-04', 77, 28),
(15, '2024-04-04', 78, 41),
(15, '2024-04-04', 79, 22),
(15, '2024-04-04', 80, 9),
(15, '2024-04-04', 81, 36),
(15, '2024-04-04', 82, 35),
(15, '2024-04-04', 83, 17),
(15, '2024-04-04', 84, 15),
(15, '2024-04-04', 85, 45),
(15, '2024-04-04', 86, 51),
(15, '2024-04-04', 87, 55),
(15, '2024-04-04', 88, 34),
(15, '2024-04-04', 89, 39),
(15, '2024-04-04', 90, 24),
(15, '2024-04-04', 91, 3),
(15, '2024-04-04', 92, 10),
(15, '2024-04-04', 93, 8),
(15, '2024-04-04', 94, 30);

--
-- Индексы сохранённых таблиц
--

--
-- Индексы таблицы `objects`
--
ALTER TABLE `objects`
  ADD PRIMARY KEY (`id`);

--
-- Индексы таблицы `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`);

--
-- Индексы таблицы `voters`
--
ALTER TABLE `voters`
  ADD PRIMARY KEY (`id`);

--
-- Индексы таблицы `voter_selections`
--
ALTER TABLE `voter_selections`
  ADD UNIQUE KEY `id` (`id`),
  ADD KEY `voter_selections_voters_FK` (`user_id`),
  ADD KEY `voter_selections_objects_FK` (`object_id`);

--
-- AUTO_INCREMENT для сохранённых таблиц
--

--
-- AUTO_INCREMENT для таблицы `objects`
--
ALTER TABLE `objects`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=60;

--
-- AUTO_INCREMENT для таблицы `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT для таблицы `voters`
--
ALTER TABLE `voters`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;

--
-- AUTO_INCREMENT для таблицы `voter_selections`
--
ALTER TABLE `voter_selections`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=95;

--
-- Ограничения внешнего ключа сохраненных таблиц
--

--
-- Ограничения внешнего ключа таблицы `voter_selections`
--
ALTER TABLE `voter_selections`
  ADD CONSTRAINT `voter_selections_objects_FK` FOREIGN KEY (`object_id`) REFERENCES `objects` (`id`),
  ADD CONSTRAINT `voter_selections_voters_FK` FOREIGN KEY (`user_id`) REFERENCES `voters` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
