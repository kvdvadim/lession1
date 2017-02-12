-- phpMyAdmin SQL Dump
-- version 3.5.1
-- http://www.phpmyadmin.net
--
-- Хост: 127.0.0.1
-- Время создания: Фев 08 2017 г., 15:35
-- Версия сервера: 5.5.25
-- Версия PHP: 5.3.13

SET SQL_MODE="NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- База данных: `task22`
--

-- --------------------------------------------------------

--
-- Структура таблицы `citizenship`
--

CREATE TABLE IF NOT EXISTS `citizenship` (
  `id_Citizenship` int(11) NOT NULL AUTO_INCREMENT,
  `Citizenship` varchar(200) NOT NULL,
  PRIMARY KEY (`id_Citizenship`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=3 ;

--
-- Дамп данных таблицы `citizenship`
--

INSERT INTO `citizenship` (`id_Citizenship`, `Citizenship`) VALUES
(1, 'ukraine'),
(2, 'london');

-- --------------------------------------------------------

--
-- Структура таблицы `city`
--

CREATE TABLE IF NOT EXISTS `city` (
  `city_id` int(11) NOT NULL AUTO_INCREMENT,
  `city` varchar(100) NOT NULL,
  `street` varchar(50) NOT NULL,
  `house` varchar(20) NOT NULL,
  `posts` int(11) NOT NULL,
  PRIMARY KEY (`city_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=2 ;

--
-- Дамп данных таблицы `city`
--

INSERT INTO `city` (`city_id`, `city`, `street`, `house`, `posts`) VALUES
(1, 'смт. Мамаївці', 'вул. Лесі Українки 10', '24', 59000);

-- --------------------------------------------------------

--
-- Структура таблицы `country`
--

CREATE TABLE IF NOT EXISTS `country` (
  `country_id` int(11) NOT NULL AUTO_INCREMENT,
  `country` varchar(200) NOT NULL,
  PRIMARY KEY (`country_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=4 ;

--
-- Дамп данных таблицы `country`
--

INSERT INTO `country` (`country_id`, `country`) VALUES
(1, 'україна'),
(2, 'україна'),
(3, 'лондон');

-- --------------------------------------------------------

--
-- Структура таблицы `director`
--

CREATE TABLE IF NOT EXISTS `director` (
  `director_id` int(11) NOT NULL AUTO_INCREMENT,
  `Director_name` varchar(50) NOT NULL,
  `Date_Birthday` date NOT NULL,
  `Date_Death` date NOT NULL,
  `id_Citizenship` int(11) NOT NULL,
  PRIMARY KEY (`director_id`),
  KEY `id_Citizenship` (`id_Citizenship`),
  KEY `id_Citizenship_2` (`id_Citizenship`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=7 ;

--
-- Дамп данных таблицы `director`
--

INSERT INTO `director` (`director_id`, `Director_name`, `Date_Birthday`, `Date_Death`, `id_Citizenship`) VALUES
(2, 'director', '2017-02-08', '0000-00-00', 0),
(3, 'dfdf', '2017-02-09', '0000-00-00', 2),
(4, 'proba', '2017-02-09', '0000-00-00', 1),
(5, 'арнольд', '2017-02-09', '0000-00-00', 1),
(6, 'proba', '2017-01-30', '0000-00-00', 1);

-- --------------------------------------------------------

--
-- Структура таблицы `genre`
--

CREATE TABLE IF NOT EXISTS `genre` (
  `genre_id` int(11) NOT NULL AUTO_INCREMENT,
  `genre` varchar(250) NOT NULL,
  PRIMARY KEY (`genre_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=4 ;

--
-- Дамп данных таблицы `genre`
--

INSERT INTO `genre` (`genre_id`, `genre`) VALUES
(1, 'комедія'),
(2, 'комедія'),
(3, 'комедія');

-- --------------------------------------------------------

--
-- Структура таблицы `movies`
--

CREATE TABLE IF NOT EXISTS `movies` (
  `movie_id` int(11) NOT NULL AUTO_INCREMENT,
  `id_director` varchar(11) NOT NULL,
  `movie_name` varchar(100) NOT NULL,
  `id_Genre` int(11) NOT NULL,
  `Duration` varchar(50) NOT NULL,
  `Budget` varchar(15) NOT NULL,
  `Production_year` date NOT NULL,
  `id_studio` int(11) NOT NULL,
  `Prokat_Year` date NOT NULL,
  PRIMARY KEY (`movie_id`),
  KEY `id_director` (`id_director`),
  KEY `id_Genre` (`id_Genre`),
  KEY `id_studio` (`id_studio`),
  KEY `id_studio_2` (`id_studio`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=5 ;

--
-- Дамп данных таблицы `movies`
--

INSERT INTO `movies` (`movie_id`, `id_director`, `movie_name`, `id_Genre`, `Duration`, `Budget`, `Production_year`, `id_studio`, `Prokat_Year`) VALUES
(1, '2', 'Гарячі голови', 1, '1 год 45 хв', '15000', '2017-02-09', 1, '2017-02-09'),
(3, '5', 'Гарячі', 1, '1 год 45 хв', '150002', '2017-02-09', 3, '2017-02-09'),
(4, '5', 'Гарячіууу', 1, '1 год 45 хв', '15000', '2017-02-09', 3, '2017-02-09');

-- --------------------------------------------------------

--
-- Структура таблицы `prmanager`
--

CREATE TABLE IF NOT EXISTS `prmanager` (
  `PR_id` int(11) NOT NULL AUTO_INCREMENT,
  `Firs_Last` varchar(250) NOT NULL,
  PRIMARY KEY (`PR_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Структура таблицы `studio`
--

CREATE TABLE IF NOT EXISTS `studio` (
  `studio_id` int(11) NOT NULL AUTO_INCREMENT,
  `Studio_name` varchar(50) NOT NULL,
  `id_country` varchar(255) NOT NULL,
  `id_city` varchar(255) NOT NULL,
  `id_manager` varchar(255) NOT NULL,
  `Contact_person` varchar(50) NOT NULL,
  PRIMARY KEY (`studio_id`),
  KEY `id_country` (`id_country`,`id_city`,`id_manager`),
  KEY `id_city` (`id_city`),
  KEY `id_manager` (`id_manager`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=4 ;

--
-- Дамп данных таблицы `studio`
--

INSERT INTO `studio` (`studio_id`, `Studio_name`, `id_country`, `id_city`, `id_manager`, `Contact_person`) VALUES
(1, 'paramaunt', '1', '', 'Козян вадим', ''),
(2, 'paramaunt', '3', '1', 'Козян вадим', ''),
(3, 'FOX', '3', '1', 'Козян вадим', '');

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
