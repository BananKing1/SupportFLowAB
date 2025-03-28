-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Värd: 127.0.0.1
-- Tid vid skapande: 28 mars 2025 kl 13:33
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
-- Databas: `supportflowab`
--

-- --------------------------------------------------------

--
-- Tabellstruktur `tblmatters`
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
  `update` date NOT NULL,
  `end` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumpning av Data i tabell `tblmatters`
--

INSERT INTO `tblmatters` (`id`, `matters`, `beskrivning`, `status`, `priority`, `rapport`, `shared`, `contact`, `comment`, `created`, `update`, `end`) VALUES
(1, 'ärenden1', 'beskrivning1', 'open', 'low', 1, 2, 'contact', 'no comment', '2025-03-28', '2025-03-28', '2025-03-31'),
(2, 'ärende 23', 'ärende', '', '', 0, 0, '', '', '2025-03-28', '0000-00-00', '0000-00-00'),
(3, 'Hjälp med laptop', 'Jag kan inte logga in på min laptop, den håller på att sprängas.', 'open', 'critical', 0, 0, '', '', '2025-03-28', '0000-00-00', '0000-00-00');

-- --------------------------------------------------------

--
-- Tabellstruktur `tbluser`
--

CREATE TABLE `tbluser` (
  `id` int(11) NOT NULL,
  `username` text NOT NULL,
  `name` text NOT NULL,
  `role` int(11) NOT NULL DEFAULT 100
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumpning av Data i tabell `tbluser`
--

INSERT INTO `tbluser` (`id`, `username`, `name`, `role`) VALUES
(1, 'username', 'firstname lastname', 100),
(2, 'username2', 'firstname1 lastname2', 100);

--
-- Index för dumpade tabeller
--

--
-- Index för tabell `tblmatters`
--
ALTER TABLE `tblmatters`
  ADD PRIMARY KEY (`id`);

--
-- Index för tabell `tbluser`
--
ALTER TABLE `tbluser`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT för dumpade tabeller
--

--
-- AUTO_INCREMENT för tabell `tblmatters`
--
ALTER TABLE `tblmatters`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT för tabell `tbluser`
--
ALTER TABLE `tbluser`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
