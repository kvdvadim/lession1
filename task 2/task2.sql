-- phpMyAdmin SQL Dump
-- version 3.5.1
-- http://www.phpmyadmin.net
--
-- Хост: 127.0.0.1
-- Время создания: Янв 29 2017 г., 23:40
-- Версия сервера: 5.5.25
-- Версия PHP: 5.3.13

SET SQL_MODE="NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- База данных: `task2`
--

-- --------------------------------------------------------

--
-- Структура таблицы `director`
--

CREATE TABLE IF NOT EXISTS `director` (
  `director_id` int(11) NOT NULL AUTO_INCREMENT,
  `Director_name` varchar(50) NOT NULL,
  `Date_Birthday` date NOT NULL,
  `Date_Death` date NOT NULL,
  `Citizenship` varchar(50) NOT NULL,
  PRIMARY KEY (`director_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=10 ;

--
-- Дамп данных таблицы `director`
--

INSERT INTO `director` (`director_id`, `Director_name`, `Date_Birthday`, `Date_Death`, `Citizenship`) VALUES
(8, 'Томі Брейдон', '2017-01-29', '0000-00-00', 'США'),
(9, 'Стівен спілберг', '1967-01-12', '0000-00-00', 'США');

-- --------------------------------------------------------

--
-- Структура таблицы `movie`
--

CREATE TABLE IF NOT EXISTS `movie` (
  `movie_id` int(11) NOT NULL AUTO_INCREMENT,
  `director_id` int(11) NOT NULL,
  `movie_name` varchar(100) NOT NULL,
  `Genre` varchar(50) NOT NULL,
  `Duration` varchar(50) NOT NULL,
  `Budget` varchar(15) NOT NULL,
  `studio_id` int(11) NOT NULL,
  `Production_year` date NOT NULL,
  `Prokat_Year` date NOT NULL,
  PRIMARY KEY (`movie_id`),
  KEY `director_id` (`director_id`,`studio_id`),
  KEY `director_id_2` (`director_id`,`studio_id`),
  KEY `studio_id` (`studio_id`),
  KEY `studio_id_2` (`studio_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=17 ;

--
-- Дамп данных таблицы `movie`
--

INSERT INTO `movie` (`movie_id`, `director_id`, `movie_name`, `Genre`, `Duration`, `Budget`, `studio_id`, `Production_year`, `Prokat_Year`) VALUES
(15, 8, 'Однажды в Нью-Йорку', 'комедія', '1 год 25хв', '1500000 дол', 8, '2017-01-28', '2017-02-21'),
(16, 9, 'Челюсті', 'Жахи', '1 год 40хв', '2000000 дол', 9, '2007-08-10', '2007-09-12');

-- --------------------------------------------------------

--
-- Структура таблицы `studio`
--

CREATE TABLE IF NOT EXISTS `studio` (
  `studio_id` int(11) NOT NULL AUTO_INCREMENT,
  `Studio_name` varchar(50) NOT NULL,
  `address` varchar(50) NOT NULL,
  `Contact_person` varchar(50) NOT NULL,
  PRIMARY KEY (`studio_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=10 ;

--
-- Дамп данных таблицы `studio`
--

INSERT INTO `studio` (`studio_id`, `Studio_name`, `address`, `Contact_person`) VALUES
(8, 'парамаунт', 'голівуд', 'Джек Річард'),
(9, 'Універсал', 'США', 'Томмі Ліі');

--
-- Ограничения внешнего ключа сохраненных таблиц
--

--
-- Ограничения внешнего ключа таблицы `movie`
--
ALTER TABLE `movie`
  ADD CONSTRAINT `movie_ibfk_1` FOREIGN KEY (`director_id`) REFERENCES `director` (`director_id`),
  ADD CONSTRAINT `movie_ibfk_2` FOREIGN KEY (`studio_id`) REFERENCES `studio` (`studio_id`);

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
