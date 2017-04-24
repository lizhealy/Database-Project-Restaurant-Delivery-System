-- phpMyAdmin SQL Dump
-- version 4.0.10.18
-- https://www.phpmyadmin.net
--
-- Host: localhost:3306
-- Generation Time: Apr 18, 2017 at 05:03 PM
-- Server version: 5.6.28-76.1-log
-- PHP Version: 5.6.30

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `lizh1851_finalproject`
--

DELIMITER $$
--
-- Procedures
--
CREATE DEFINER=`lizh1851`@`localhost` PROCEDURE `goldcustomers`(IN `mostRewards` INT)
    NO SQL
INSERT INTO gold_customers(SELECT * FROM rewards WHERE rewards > mostRewards)$$

CREATE DEFINER=`lizh1851`@`localhost` PROCEDURE `raiseprice`()
begin
end$$

DELIMITER ;

-- --------------------------------------------------------

--
-- Table structure for table `drink_menu`
--

CREATE TABLE IF NOT EXISTS `drink_menu` (
  `title` char(60) NOT NULL,
  `description` char(60) NOT NULL,
  `price` float NOT NULL,
  PRIMARY KEY (`title`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `drink_menu`
--

INSERT INTO `drink_menu` (`title`, `description`, `price`) VALUES
('Amber', 'Palmetto Brewing', 5),
('Margarita', 'Tequila, Triple Sec, Sours', 10),
('Martini', 'Vodka, Vermouth, Olives', 12),
('Pilsner', 'Palmetto Brewing', 5);

-- --------------------------------------------------------

--
-- Table structure for table `driver`
--

CREATE TABLE IF NOT EXISTS `driver` (
  `name` varchar(255) NOT NULL,
  `zone` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `driver`
--

INSERT INTO `driver` (`name`, `zone`) VALUES
('Joe', '1'),
('John', '2'),
('Mike', '3'),
('Liz', '4'),
('Tom', '5'),
('Mark', '7');

-- --------------------------------------------------------

--
-- Table structure for table `driver2`
--

CREATE TABLE IF NOT EXISTS `driver2` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(25) NOT NULL,
  `zone` int(11) NOT NULL DEFAULT '0',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `food_menu`
--

CREATE TABLE IF NOT EXISTS `food_menu` (
  `title` char(50) NOT NULL,
  `description` char(50) NOT NULL,
  `price` float NOT NULL,
  PRIMARY KEY (`title`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `food_menu`
--

INSERT INTO `food_menu` (`title`, `description`, `price`) VALUES
('Burger', 'Cheese, Lettuce, Tomato, Onion', 10),
('Cheese Fries', 'Fries with melted cheese', 8),
('Chicken Sandwich', 'LTO', 10),
('Pretzels', 'Warm Pretzel with cheese and mustard', 7),
('Quesadilla', 'Chicken, Cheese, Pico, Sour Cream', 9),
('Soup of the day', 'Daily Feature', 7),
('Wings', 'mild, medium, hot, bbq', 12);

-- --------------------------------------------------------

--
-- Table structure for table `gold_customers`
--

CREATE TABLE IF NOT EXISTS `gold_customers` (
  `name` varchar(255) NOT NULL,
  `reward` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `gold_customers`
--

INSERT INTO `gold_customers` (`name`, `reward`) VALUES
('liz', 15),
('test', 23);

-- --------------------------------------------------------

--
-- Table structure for table `merchandise_menu`
--

CREATE TABLE IF NOT EXISTS `merchandise_menu` (
  `title` char(60) NOT NULL,
  `description` char(60) NOT NULL,
  `price` float NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `merchandise_menu`
--

INSERT INTO `merchandise_menu` (`title`, `description`, `price`) VALUES
('Shirt', 'S, M, L, XL', 20),
('Hat', 'Hat with Logo', 10),
('Tank top', 'S, M, L, XL', 15),
('Magnet', 'Magnet with logo', 5);

-- --------------------------------------------------------

--
-- Table structure for table `orders`
--

CREATE TABLE IF NOT EXISTS `orders` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `customer_name` varchar(20) DEFAULT NULL,
  `title` varchar(255) DEFAULT NULL,
  `price` float DEFAULT NULL,
  `driver` varchar(255) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=83 ;

--
-- Dumping data for table `orders`
--

INSERT INTO `orders` (`id`, `customer_name`, `title`, `price`, `driver`) VALUES
(71, 'liz', 'Pretzels - 7, Soup of the day - 7, Wings - 12', 10, ''),
(77, 'test', 'Cheese Fries - 8, Quesadilla - 9', 0, ''),
(78, 'test', 'Cheese Fries - 8, Fried Green Tomatoes - 9', 0, ''),
(79, 'test', 'Cheese Fries - 8, Fried Green Tomatoes - 9', 0, ''),
(80, 'testt', 'Burger - 10, Pretzels - 7, Soup of the day - 7', 0, ''),
(81, 'liz', 'Chicken Sandwich - 10, Quesadilla - 9, Wings - 12', 0, ''),
(82, 'liz', 'Burger - 10, Chicken Sandwich - 10, Pretzels - 7', 0, '');

-- --------------------------------------------------------

--
-- Table structure for table `rewards`
--

CREATE TABLE IF NOT EXISTS `rewards` (
  `username` varchar(255) NOT NULL,
  `rewards` int(11) NOT NULL,
  PRIMARY KEY (`username`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `rewards`
--

INSERT INTO `rewards` (`username`, `rewards`) VALUES
('', 1),
('liz', 15),
('test', 23),
('testt', 2);

--
-- Triggers `rewards`
--
DROP TRIGGER IF EXISTS `discountAdded`;
DELIMITER //
CREATE TRIGGER `discountAdded` AFTER UPDATE ON `rewards`
 FOR EACH ROW IF (new.rewards > 50)
THEN UPDATE user Set discount = discount+10 
where username = new.username;
end if
//
DELIMITER ;

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE IF NOT EXISTS `user` (
  `username` varchar(40) DEFAULT NULL,
  `email` varchar(80) DEFAULT NULL,
  `password` varchar(40) DEFAULT NULL,
  `id` mediumint(9) NOT NULL AUTO_INCREMENT,
  `zip` int(10) NOT NULL,
  `discount` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=12 ;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`username`, `email`, `password`, `id`, `zip`, `discount`) VALUES
('liz', 'liz', 'liz', 7, 29401, 0),
('test', 'test', 'test', 8, 29403, 0),
('test2', 'test2', 'test2', 9, 0, 0),
('testt', 'testt', 'testt', 10, 0, 0),
('liz2', 'liz2', 'liz2', 11, 0, 0);

-- --------------------------------------------------------

--
-- Stand-in structure for view `whatZip`
--
CREATE TABLE IF NOT EXISTS `whatZip` (
`name` varchar(255)
,`zip` int(10)
);
-- --------------------------------------------------------

--
-- Stand-in structure for view `whatZone`
--
CREATE TABLE IF NOT EXISTS `whatZone` (
`username` varchar(40)
);
-- --------------------------------------------------------

--
-- Table structure for table `zone`
--

CREATE TABLE IF NOT EXISTS `zone` (
  `zip` int(10) NOT NULL,
  `id` int(11) NOT NULL AUTO_INCREMENT,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=8 ;

--
-- Dumping data for table `zone`
--

INSERT INTO `zone` (`zip`, `id`) VALUES
(29401, 1),
(29402, 2),
(29403, 3),
(29404, 4),
(29405, 5),
(29406, 6),
(29407, 7);

-- --------------------------------------------------------

--
-- Structure for view `whatZip`
--
DROP TABLE IF EXISTS `whatZip`;

CREATE ALGORITHM=UNDEFINED DEFINER=`lizh1851`@`localhost` SQL SECURITY DEFINER VIEW `whatZip` AS select `driver`.`name` AS `name`,`zone`.`zip` AS `zip` from (`driver` join `zone`) where (`driver`.`zone` = `zone`.`id`);

-- --------------------------------------------------------

--
-- Structure for view `whatZone`
--
DROP TABLE IF EXISTS `whatZone`;

CREATE ALGORITHM=UNDEFINED DEFINER=`lizh1851`@`localhost` SQL SECURITY DEFINER VIEW `whatZone` AS select `user`.`username` AS `username` from (`user` join `zone`) where (`user`.`zip` = `zone`.`zip`);

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
