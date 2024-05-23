-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: localhost:3306
-- Gegenereerd op: 11 apr 2024 om 20:24
-- Serverversie: 8.0.30
-- PHP-versie: 8.1.10

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `vegas@home`
--

-- --------------------------------------------------------

--
-- Tabelstructuur voor tabel `nbateams`
--

CREATE TABLE `nbateams` (
  `teamId` bigint UNSIGNED NOT NULL,
  `teamName` varchar(255) DEFAULT NULL,
  `teamConference` varchar(255) DEFAULT NULL,
  `teamWins` int DEFAULT NULL,
  `teamLosses` int DEFAULT NULL,
  `madePlayoff` tinyint(1) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Gegevens worden geëxporteerd voor tabel `nbateams`
--

INSERT INTO `nbateams` (`teamId`, `teamName`, `teamConference`, `teamWins`, `teamLosses`, `madePlayoff`) VALUES
(1, 'Atlanta Hawks', 'East', 41, 31, 1),
(2, 'Boston Celtics', 'East', 36, 36, 1),
(3, 'Brooklyn Nets', 'East', 48, 24, 1),
(4, 'Charlotte Hornets', 'East', 33, 39, 1),
(5, 'Chicago Bulls', 'East', 31, 41, 0),
(6, 'Cleveland Cavaliers', 'East', 22, 50, 0),
(7, 'Detroit Pistons', 'East', 20, 52, 0),
(8, 'Indiana Pacers', 'East', 34, 38, 1),
(9, 'Miami Heat', 'East', 40, 32, 1),
(10, 'Milwaukee Bucks', 'East', 46, 26, 1),
(11, 'New York Knicks', 'East', 41, 31, 1),
(12, 'Orlando Magic', 'East', 21, 51, 0),
(13, 'Philadelphia 76ers', 'East', 49, 23, 1),
(14, 'Toronto Raptors', 'East', 27, 45, 0),
(15, 'Washington Wizards', 'East', 34, 38, 1),
(16, 'Dallas Mavericks', 'West', 42, 30, 1),
(17, 'Denver Nuggets', 'West', 47, 25, 1),
(18, 'Golden State Warriors', 'West', 39, 33, 0),
(19, 'Houston Rockets', 'West', 17, 55, 0),
(20, 'LA Clippers', 'West', 47, 25, 1),
(21, 'Los Angeles Lakers', 'West', 42, 30, 1),
(22, 'Memphis Grizzlies', 'West', 38, 34, 1),
(23, 'Minnesota Timberwolves', 'West', 23, 49, 0),
(24, 'New Orleans Pelicans', 'West', 31, 41, 0),
(25, 'Oklahoma City Thunder', 'West', 22, 50, 0),
(26, 'Phoenix Suns', 'West', 51, 21, 1),
(27, 'Portland Trail Blazers', 'West', 42, 30, 1),
(28, 'Sacramento Kings', 'West', 31, 41, 0),
(29, 'San Antonio Spurs', 'West', 33, 39, 0),
(30, 'Utah Jazz', 'West', 52, 20, 1);

--
-- Indexen voor geëxporteerde tabellen
--

--
-- Indexen voor tabel `nbateams`
--
ALTER TABLE `nbateams`
  ADD PRIMARY KEY (`teamId`),
  ADD UNIQUE KEY `teamId` (`teamId`);

--
-- AUTO_INCREMENT voor geëxporteerde tabellen
--

--
-- AUTO_INCREMENT voor een tabel `nbateams`
--
ALTER TABLE `nbateams`
  MODIFY `teamId` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=31;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
