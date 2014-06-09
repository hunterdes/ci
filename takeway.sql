-- phpMyAdmin SQL Dump
-- version 4.1.6
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: Jun 09, 2014 at 04:41 AM
-- Server version: 5.6.16
-- PHP Version: 5.5.9

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `takeway`
--

-- --------------------------------------------------------

--
-- Table structure for table `dish`
--

CREATE TABLE IF NOT EXISTS `dish` (
  `id` int(255) NOT NULL AUTO_INCREMENT,
  `name` varchar(255) NOT NULL,
  `chinese_name` varchar(255) NOT NULL,
  `description` text NOT NULL,
  `price` varchar(255) NOT NULL,
  `image` text NOT NULL,
  `active` varchar(30) NOT NULL,
  `today` varchar(30) NOT NULL,
  `available_ordertime_start` datetime NOT NULL,
  `available_ordertime_end` datetime NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=14 ;

--
-- Dumping data for table `dish`
--

INSERT INTO `dish` (`id`, `name`, `chinese_name`, `description`, `price`, `image`, `active`, `today`, `available_ordertime_start`, `available_ordertime_end`) VALUES
(3, 'dish1', '好吃的菜', '', '10', '/uploads/90031401576885ships-sail_00418886.jpg', 'true', 'false', '2014-05-31 10:00:00', '2014-05-31 10:00:00'),
(4, 'dish2', '菜2', '', '10', '/uploads/2.jpg', 'true', 'false', '2014-05-18 10:00:00', '2014-06-05 10:00:00'),
(5, 'dish3', '菜3', '', '10', '/uploads/3.jpg', 'true', 'false', '2014-05-01 00:00:00', '0000-00-00 00:00:00'),
(9, 'dish4', '菜4', '', '10', '/uploads/4.jpg', 'true', 'false', '2014-05-02 00:00:00', '0000-00-00 00:00:00'),
(10, 'dish5', '菜5', '', '10', '/uploads/5.jpg', 'true', 'false', '2014-05-03 00:00:00', '0000-00-00 00:00:00'),
(12, '123124', '马坡', '', 'awefwa', '/uploads/62431399730233brithish_war_ship-wide.jpg', 'true', '', '2014-05-10 10:00:00', '2014-05-10 10:00:00'),
(13, 'awefwaef', 'dfaefa', 'waefwaef', 'wafewae', '/uploads/79571399781463a.jpg', 'true', '', '2014-05-11 10:00:00', '2014-05-19 10:00:00');

-- --------------------------------------------------------

--
-- Table structure for table `dish_order`
--

CREATE TABLE IF NOT EXISTS `dish_order` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `dish_id` int(11) NOT NULL,
  `order_id` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=43 ;

--
-- Dumping data for table `dish_order`
--

INSERT INTO `dish_order` (`id`, `dish_id`, `order_id`) VALUES
(1, 2, 1),
(2, 2, 2),
(3, 2, 3),
(4, 3, 1),
(5, 3, 2),
(6, 3, 3),
(7, 2, 4),
(8, 2, 4),
(9, 2, 4),
(10, 2, 4),
(11, 2, 4),
(12, 2, 4),
(13, 3, 4),
(14, 3, 4),
(15, 3, 4),
(16, 3, 4),
(17, 3, 4),
(18, 3, 4),
(19, 2, 5),
(20, 2, 5),
(21, 2, 5),
(22, 2, 5),
(23, 2, 6),
(24, 2, 6),
(25, 2, 6),
(26, 2, 6),
(27, 2, 7),
(28, 2, 7),
(29, 2, 7),
(30, 2, 7),
(31, 2, 9),
(32, 2, 10),
(33, 2, 11),
(34, 2, 12),
(35, 2, 13),
(36, 2, 14),
(37, 2, 15),
(38, 2, 16),
(39, 2, 17),
(40, 2, 18),
(41, 2, 19),
(42, 2, 20);

-- --------------------------------------------------------

--
-- Table structure for table `order`
--

CREATE TABLE IF NOT EXISTS `order` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `datetime` datetime NOT NULL,
  `email` varchar(255) NOT NULL,
  `telephone` varchar(255) NOT NULL,
  `name` varchar(255) NOT NULL,
  `extra` text NOT NULL,
  `address` text NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=21 ;

--
-- Dumping data for table `order`
--

INSERT INTO `order` (`id`, `datetime`, `email`, `telephone`, `name`, `extra`, `address`) VALUES
(1, '0000-00-00 00:00:00', 'hunterdes@gmail.com', '0431044799', 'nn', '		waefawe			', '			waef		'),
(2, '0000-00-00 00:00:00', 'hunterdes@gmail.com', '0431044799', 'Cong Liu', '					', 'qweawegraerg	'),
(3, '2014-05-04 10:42:44', 'hunterdes@gmail.com', '61431044799', 'Cong Liu', 'waefawef					', 'weafwe					'),
(4, '2014-05-04 10:52:35', 'hunterdes@gmail.com', '61431044799', 'cong liu', '	waefawe				', '	awfafe'),
(5, '2014-05-11 03:22:39', 'hunterdes@gmail.com', '61431044799', 'Cong Liu', '					ergsergesrgesr', '	serfgaerg				'),
(6, '2014-05-11 05:18:56', 'hunterdes@gmail.com', '61431044799', 'Cong Liu', 'hhhh				', 'jhjjjj'),
(7, '2014-05-11 05:19:58', 'hunterdes@gmail.com', '61431044799', 'awfeawe', '			mbghj		', '		ascascsa'),
(8, '2014-05-19 01:10:00', 'hunterdes@gmail.com', '61431044799', 'dzfgsdf', '			wafefwaefw		', '				asfeawefasedf	'),
(9, '2014-05-19 01:11:56', 'hunterdes@gmail.com', '61431044799', 'waefawefwa', '		awefawfe			', '		awefwafewafe			'),
(10, '2014-05-19 01:11:56', 'hunterdes@gmail.com', '61431044799', 'waefawefwa', '		awefawfe			', '		awefwafewafe			'),
(11, '2014-05-19 01:11:56', 'hunterdes@gmail.com', '61431044799', 'waefawefwa', '		awefawfe			', '		awefwafewafe			'),
(12, '2014-05-19 01:11:57', 'hunterdes@gmail.com', '61431044799', 'waefawefwa', '		awefawfe			', '		awefwafewafe			'),
(13, '2014-05-19 01:11:57', 'hunterdes@gmail.com', '61431044799', 'waefawefwa', '		awefawfe			', '		awefwafewafe			'),
(14, '2014-05-19 01:11:57', 'hunterdes@gmail.com', '61431044799', 'waefawefwa', '		awefawfe			', '		awefwafewafe			'),
(15, '2014-05-19 01:11:57', 'hunterdes@gmail.com', '61431044799', 'waefawefwa', '		awefawfe			', '		awefwafewafe			'),
(16, '2014-05-19 01:11:57', 'hunterdes@gmail.com', '61431044799', 'waefawefwa', '		awefawfe			', '		awefwafewafe			'),
(17, '2014-05-19 01:11:57', 'hunterdes@gmail.com', '61431044799', 'waefawefwa', '		awefawfe			', '		awefwafewafe			'),
(18, '2014-05-19 01:11:57', 'hunterdes@gmail.com', '61431044799', 'waefawefwa', '		awefawfe			', '		awefwafewafe			'),
(19, '2014-05-19 01:11:57', 'hunterdes@gmail.com', '61431044799', 'waefawefwa', '		awefawfe			', '		awefwafewafe			'),
(20, '2014-05-19 01:11:58', 'hunterdes@gmail.com', '61431044799', 'waefawefwa', '		awefawfe			', '		awefwafewafe			');

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
