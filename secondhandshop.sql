-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Värd: 127.0.0.1
-- Tid vid skapande: 21 feb 2024 kl 08:28
-- Serverversion: 10.4.32-MariaDB
-- PHP-version: 8.2.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Databas: `secondhandshop`
--

-- --------------------------------------------------------

--
-- Tabellstruktur `accounts`
--

CREATE TABLE `accounts` (
  `id` int(11) NOT NULL,
  `account_name` varchar(64) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL,
  `password` text CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL,
  `email` varchar(32) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL,
  `phone_number` int(20) NOT NULL,
  `address` varchar(225) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Tabellstruktur `product`
--

CREATE TABLE `product` (
  `id` int(11) NOT NULL,
  `prod_id` varchar(32) NOT NULL,
  `subject` int(11) NOT NULL,
  `type` int(11) NOT NULL,
  `title` varchar(64) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL,
  `img` longblob NOT NULL,
  `description` text CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL,
  `price` float NOT NULL,
  `publisher` varchar(64) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL,
  `publish_date` date NOT NULL,
  `cart_date` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumpning av Data i tabell `product`
--

INSERT INTO `product` (`id`, `prod_id`, `subject`, `type`, `title`, `img`, `description`, `price`, `publisher`, `publish_date`, `cart_date`) VALUES
(1, 'wagkjhakjahwwbawbjh', 1, 1, 'a', '', 'b', 0, '', '2024-02-19', NULL);

-- --------------------------------------------------------

--
-- Tabellstruktur `recite`
--

CREATE TABLE `recite` (
  `id` int(11) NOT NULL,
  `customer_sess_id` varchar(32) NOT NULL,
  `customer_name` varchar(64) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL,
  `customer_phone` int(20) NOT NULL,
  `customer_email` varchar(128) NOT NULL,
  `products` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Tabellstruktur `shoppertrack`
--

CREATE TABLE `shoppertrack` (
  `id` int(11) NOT NULL,
  `sess_id` varchar(32) NOT NULL,
  `prod_id` varchar(32) NOT NULL,
  `prod_title` varchar(64) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL,
  `prod_img` longblob NOT NULL,
  `prod_price` float NOT NULL,
  `prod_publisher` varchar(64) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL,
  `prod_added_date` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Tabellstruktur `subjects`
--

CREATE TABLE `subjects` (
  `id` int(11) NOT NULL,
  `subject_title` int(11) NOT NULL,
  `subject_description` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Tabellstruktur `types`
--

CREATE TABLE `types` (
  `id` int(11) NOT NULL,
  `type` int(11) NOT NULL,
  `description` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Index för dumpade tabeller
--

--
-- Index för tabell `product`
--
ALTER TABLE `product`
  ADD PRIMARY KEY (`id`);

--
-- Index för tabell `recite`
--
ALTER TABLE `recite`
  ADD PRIMARY KEY (`id`);

--
-- Index för tabell `shoppertrack`
--
ALTER TABLE `shoppertrack`
  ADD PRIMARY KEY (`id`);

--
-- Index för tabell `subjects`
--
ALTER TABLE `subjects`
  ADD PRIMARY KEY (`id`);

--
-- Index för tabell `types`
--
ALTER TABLE `types`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT för dumpade tabeller
--

--
-- AUTO_INCREMENT för tabell `product`
--
ALTER TABLE `product`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT för tabell `recite`
--
ALTER TABLE `recite`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT för tabell `shoppertrack`
--
ALTER TABLE `shoppertrack`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT för tabell `subjects`
--
ALTER TABLE `subjects`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT för tabell `types`
--
ALTER TABLE `types`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
