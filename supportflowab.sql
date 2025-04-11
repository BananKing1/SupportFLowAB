-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Apr 11, 2025 at 01:38 PM
-- Server version: 10.4.32-MariaDB
-- PHP Version: 8.2.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `supportflowab`
--

-- --------------------------------------------------------

--
-- Table structure for table `tblmatters`
--

CREATE TABLE `tblmatters` (
  `id` int(11) NOT NULL,
  `matters` text NOT NULL,
  `beskrivning` text NOT NULL,
  `status` enum('open','ongoing','pending','complete') NOT NULL,
  `priority` enum('low','medium','high','critical') NOT NULL,
  `rapport` int(11) NOT NULL,
  `shared` int(11) NOT NULL,
  `contact` text NOT NULL,
  `comment` text NOT NULL,
  `created` date NOT NULL DEFAULT current_timestamp(),
  `update` date DEFAULT current_timestamp(),
  `end` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `tblmatters`
--

INSERT INTO `tblmatters` (`id`, `matters`, `beskrivning`, `status`, `priority`, `rapport`, `shared`, `contact`, `comment`, `created`, `update`, `end`) VALUES
(1, 'ärenden1', 'beskrivning1', 'open', 'low', 1, 2, 'contact', 'no comment', '2025-03-28', '2025-03-28', '2025-03-31'),
(2, 'ärende 23', 'ärende', '', '', 0, 0, '', '', '2025-03-28', '0000-00-00', '0000-00-00'),
(3, 'Hjälp med laptop', 'Jag kan inte logga in på min laptop, den håller på att sprängas.', 'open', 'critical', 0, 0, '', '', '2025-03-28', '0000-00-00', '0000-00-00'),
(4, 'ärenden 10', 'fdsffadsg', 'complete', 'medium', 1, 2, 'fdwsfsadfg', 'fdsfafsadf', '2025-04-11', '2025-03-19', '2025-04-30'),
(5, 'ärenden 11', 'fewfearg', 'complete', 'high', 1, 2, 'fewfgrewyrty', 'gtrwytwturey', '2025-04-11', '2025-03-19', '2025-05-10'),
(6, 'ärenden 12', 'dsfdfggfdagdf', 'complete', 'critical', 1, 2, 'feagerahgrtshrt', 'htrhrtehytehty', '2025-04-11', '2025-04-17', '2025-04-30'),
(7, 'ärenden 13', 'edfsaggreahr', 'complete', 'medium', 1, 2, 'rewtgerterwatr', 'treatreatrert', '2025-04-11', '2025-04-30', '2025-05-10'),
(8, 'ärenden 14', 'fgdasefaf', 'complete', 'high', 1, 2, 'rewweREWEWREWR', 'EWREARTERETERT', '2025-04-11', '2025-04-01', '2025-06-14'),
(9, 'ärenden 15', 'rewarwrerewa', 'complete', 'low', 1, 2, 'rewrwarweR', 'REWRWEArewr', '2025-04-11', '2025-04-19', '2025-04-30'),
(10, 'ärenden 16', 'fdwfwearerteat', 'complete', 'low', 1, 2, 'fgdafgfgd', 'dsgfdfgdfsgf', '2025-04-11', '2025-04-19', '2025-04-29'),
(11, 'ärenden 17', 'rewagdfsgftffd', 'complete', 'high', 1, 2, 'fgddfgsfdg', 'fgddfgfdgfdg', '2025-04-11', '2025-04-19', '2025-04-28'),
(12, 'ärenden 18', 'fdserwttwe', 'complete', 'low', 1, 2, 'rewerwewrwer', 'ewrwerewrwewe', '2025-04-11', '2025-04-30', '2025-06-13'),
(13, 'ärenden 19', 'errewerwerwerw', 'complete', 'high', 1, 2, 'ewrewrewrewr', 'rewewrerwerw', '2025-04-11', '2025-04-01', '2025-04-11'),
(14, 'ärenden 20', 'fdsdfgfgdgs', 'complete', 'medium', 1, 2, 'dsdsgfsdg', 'fgdfggfdag', '2025-04-11', '2025-04-01', '2025-04-05'),
(15, 'ärenden 2', 'sdfdfdsf', 'open', 'critical', 1, 2, 'dfsfdfsdafdsfsdf', 'dfsdsdsfadfsa', '2025-04-11', '2025-04-11', '2025-04-30'),
(16, 'ärenden 3', 'dffdssfsdfdsfdsf', 'open', 'critical', 1, 2, 'fdsdsfsdsafdfs', 'fdsafdsdsfdf', '2025-04-11', '2025-04-18', '2025-04-30'),
(17, 'ärenden 4', 'fdsdfdasfdfs', 'open', 'high', 1, 2, 'fdfdsfdsaf', 'dfsdsdfsdsf', '2025-04-11', '2025-04-11', '2025-04-30'),
(18, 'ärenden 5', 'dsffsfsdagdsaf', 'open', 'low', 1, 2, 'fdsdsfsd', 'fdfsdsdf', '2025-04-11', '2025-04-16', '2025-04-30'),
(19, 'ärenden 21', 'dfgadfgadf', 'ongoing', 'critical', 1, 2, 'ertrgeter', 'ergrgergereg', '2025-04-11', '2025-04-11', '2025-04-30'),
(20, 'ärenden 6', 'fdsfsddsfa', 'open', 'medium', 1, 1, 'dsfds', 'fdsdsfdfs', '2025-04-11', '2025-04-11', '2025-04-17'),
(21, 'skapad ärenden', 'fdsdfsdasf', 'open', 'medium', 0, 1, 'rewrrweqr@gmail.com', 'rewqrr', '2025-04-11', '2025-04-11', '0000-00-00');

-- --------------------------------------------------------

--
-- Table structure for table `tbluser`
--

CREATE TABLE `tbluser` (
  `id` int(11) NOT NULL,
  `username` text NOT NULL,
  `name` text NOT NULL,
  `role` int(11) NOT NULL DEFAULT 100,
  `password` mediumtext NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `tbluser`
--

INSERT INTO `tbluser` (`id`, `username`, `name`, `role`, `password`) VALUES
(1, 'username1', 'firstname lastname', 100, 'password1'),
(2, 'username2', 'firstname1 lastname2', 10, 'password2');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `tblmatters`
--
ALTER TABLE `tblmatters`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tbluser`
--
ALTER TABLE `tbluser`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `tblmatters`
--
ALTER TABLE `tblmatters`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=22;

--
-- AUTO_INCREMENT for table `tbluser`
--
ALTER TABLE `tbluser`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
