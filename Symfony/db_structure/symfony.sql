-- phpMyAdmin SQL Dump
-- version 3.5.1
-- http://www.phpmyadmin.net
--
-- Хост: 127.0.0.1
-- Время создания: Июл 16 2013 г., 20:03
-- Версия сервера: 5.5.25
-- Версия PHP: 5.3.13

SET SQL_MODE="NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- База данных: `symfony`
--

-- --------------------------------------------------------

--
-- Структура таблицы `category`
--

CREATE TABLE IF NOT EXISTS `category` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `info` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=4 ;

--
-- Дамп данных таблицы `category`
--

INSERT INTO `category` (`id`, `name`, `info`) VALUES
(1, 'Peshkom', 'topaem nogami'),
(2, 'bus', 'yedem na avtobuse'),
(3, 'Museum', 'hodim po museyu');

-- --------------------------------------------------------

--
-- Структура таблицы `categtourcon`
--

CREATE TABLE IF NOT EXISTS `categtourcon` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `category` int(11) NOT NULL,
  `city` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=3 ;

--
-- Дамп данных таблицы `categtourcon`
--

INSERT INTO `categtourcon` (`id`, `category`, `city`) VALUES
(1, 1, 1),
(2, 2, 2);

-- --------------------------------------------------------

--
-- Структура таблицы `city`
--

CREATE TABLE IF NOT EXISTS `city` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `info` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=4 ;

--
-- Дамп данных таблицы `city`
--

INSERT INTO `city` (`id`, `name`, `info`) VALUES
(1, 'Krivoy Rog', 'Krivbass'),
(2, 'Kiev', 'The Capital of Ukraine'),
(3, 'Cherkassy', 'Bogdan Khmelnytsky places etc');

-- --------------------------------------------------------

--
-- Структура таблицы `tour`
--

CREATE TABLE IF NOT EXISTS `tour` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `city` int(11) NOT NULL,
  `category` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=20 ;

--
-- Дамп данных таблицы `tour`
--

INSERT INTO `tour` (`id`, `name`, `city`, `category`) VALUES
(1, 'Lavra', 2, 1),
(2, 'Shahta', 1, 2),
(9, 'lsdfkfj', 1, 1),
(10, 'PamyatkamyGetmanskoyDoby', 3, 2),
(19, 'NovyTurvCherkassy', 3, 0);

-- --------------------------------------------------------

--
-- Структура таблицы `tourcategoryconn`
--

CREATE TABLE IF NOT EXISTS `tourcategoryconn` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `tour` int(11) NOT NULL,
  `category` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Структура таблицы `tourcategoryconn1`
--

CREATE TABLE IF NOT EXISTS `tourcategoryconn1` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `tour` int(11) NOT NULL,
  `category` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=7 ;

--
-- Дамп данных таблицы `tourcategoryconn1`
--

INSERT INTO `tourcategoryconn1` (`id`, `tour`, `category`) VALUES
(1, 18, 1),
(2, 18, 2),
(3, 18, 3),
(4, 19, 1),
(5, 19, 2),
(6, 19, 3);

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
