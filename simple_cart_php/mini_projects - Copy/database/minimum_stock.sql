-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Apr 06, 2023 at 08:31 AM
-- Server version: 10.4.25-MariaDB
-- PHP Version: 7.4.30

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `minimum_stock`
--

-- --------------------------------------------------------

--
-- Table structure for table `cart`
--

CREATE TABLE `cart` (
  `id` varchar(20) NOT NULL,
  `user_id` varchar(20) NOT NULL,
  `product_id` varchar(20) NOT NULL,
  `qty` varchar(2) NOT NULL DEFAULT '1'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `cart`
--

INSERT INTO `cart` (`id`, `user_id`, `product_id`, `qty`) VALUES
('5yL0ShVJwFe5mywsb7UY', 'KOJBisYMeqI8AkwMPqxr', 'pnB8ceaaILWD65hz1Jdk', '10'),
('phWUAnuZBIoC37V8L3xW', 'ZUh5Dg6aa7NxeOefyc7p', 'rRNNcBEW3XKbP0FQn2XL', '2'),
('2NCp37d4OOAy9fqRT2d3', 'ZUh5Dg6aa7NxeOefyc7p', 'qga5g0ry1IBEQtRpja2S', '5'),
('r5Opi9C102pRora618QT', 'ZUh5Dg6aa7NxeOefyc7p', '3wTiewHujAAMsTAtgAmY', '1'),
('ZfJOPjjQfNaJ525erHhU', 'ZUh5Dg6aa7NxeOefyc7p', 'H2TKvTLaTc1sFJHIbNmt', '1');

-- --------------------------------------------------------

--
-- Table structure for table `products`
--

CREATE TABLE `products` (
  `id` varchar(20) NOT NULL,
  `name` varchar(50) NOT NULL,
  `price` varchar(10) NOT NULL,
  `stock` int(100) NOT NULL,
  `image` varchar(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `products`
--

INSERT INTO `products` (`id`, `name`, `price`, `stock`, `image`) VALUES
('rRNNcBEW3XKbP0FQn2XL', 'herbal tea', '30', 18, 'K8S90b4mRqmAhM8yW1wz.webp'),
('qga5g0ry1IBEQtRpja2S', 'Lipton Honey Lemon Green', '50', 0, 'RddVJ7g0gXHKhsj0qsZy.jpg'),
('3wTiewHujAAMsTAtgAmY', 'Lipton Honey ', '35', 19, 'X4I7VRQEDICDoQr70uJu.jpg'),
('H2TKvTLaTc1sFJHIbNmt', 'Lemon Green tea', '65', 2, 'lhrvcKpJcxaNSPY7Tbxu.webp'),
('nf6ONvCCFBlqRS1jakPO', 'lipton green tea', '100', 5, 'XKkLdHPRd1OCW2NUqOhy.webp'),
('e4wNaC3e6zBnZ0tcg2qX', 'black tea', '54', 20, 'nOqbGnNhCa4iRXSZytlr.jpg'),
('Roe1L91BzeDgUG7z97F8', 'green tea', '43', 40, 'kvnBKoKoCrdNWrA7uLsC.jpg'),
('kW3DlGW6Xi6LjorEgP42', 'green tea', '50', 2, '3tfbZRISs0IQVTcwdq2c.png'),
('U05HHIIm2XxMm6eeH3eZ', 'herbal tea', '35', 6, 'yH63eIuspkFuiX3m4xbK.png');
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
