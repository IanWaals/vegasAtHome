-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: localhost:3306
-- Gegenereerd op: 11 apr 2024 om 20:23
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
-- Tabelstructuur voor tabel `mlbteams`
--

CREATE TABLE `mlbteams` (
  `teamId` int NOT NULL,
  `teamName` varchar(50) DEFAULT NULL,
  `teamLeague` varchar(10) DEFAULT NULL,
  `teamWins` int DEFAULT NULL,
  `teamLosses` int DEFAULT NULL,
  `madePlayoff` bit(1) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Gegevens worden geëxporteerd voor tabel `mlbteams`
--

INSERT INTO `mlbteams` (`teamId`, `teamName`, `teamLeague`, `teamWins`, `teamLosses`, `madePlayoff`) VALUES
(1, 'Baltimore Orioles', 'AL', 52, 110, b'0'),
(2, 'Boston Red Sox', 'AL', 92, 70, b'1'),
(3, 'New York Yankees', 'AL', 92, 70, b'1'),
(4, 'Tampa Bay Rays', 'AL', 100, 62, b'1'),
(5, 'Toronto Blue Jays', 'AL', 91, 71, b'1'),
(6, 'Chicago White Sox', 'AL', 93, 69, b'1'),
(7, 'Cleveland Guardians', 'AL', 80, 82, b'0'),
(8, 'Detroit Tigers', 'AL', 77, 85, b'0'),
(9, 'Kansas City Royals', 'AL', 74, 88, b'0'),
(10, 'Minnesota Twins', 'AL', 73, 89, b'0'),
(11, 'Houston Astros', 'AL', 95, 67, b'1'),
(12, 'Los Angeles Angels', 'AL', 77, 85, b'0'),
(13, 'Oakland Athletics', 'AL', 86, 76, b'0'),
(14, 'Seattle Mariners', 'AL', 90, 72, b'1'),
(15, 'Texas Rangers', 'AL', 60, 102, b'0'),
(16, 'Atlanta Braves', 'NL', 88, 73, b'1'),
(17, 'Miami Marlins', 'NL', 67, 95, b'0'),
(18, 'New York Mets', 'NL', 77, 85, b'0'),
(19, 'Philadelphia Phillies', 'NL', 82, 80, b'0'),
(20, 'Washington Nationals', 'NL', 65, 97, b'0'),
(21, 'Chicago Cubs', 'NL', 71, 91, b'0'),
(22, 'Cincinnati Reds', 'NL', 83, 79, b'0'),
(23, 'Milwaukee Brewers', 'NL', 95, 67, b'1'),
(24, 'Pittsburgh Pirates', 'NL', 61, 101, b'0'),
(25, 'St. Louis Cardinals', 'NL', 90, 72, b'1'),
(26, 'Arizona Diamondbacks', 'NL', 52, 110, b'0'),
(27, 'Colorado Rockies', 'NL', 74, 87, b'0'),
(28, 'Los Angeles Dodgers', 'NL', 106, 56, b'1'),
(29, 'San Diego Padres', 'NL', 79, 83, b'0'),
(30, 'San Francisco Giants', 'NL', 107, 55, b'1');

--
-- Indexen voor geëxporteerde tabellen
--

--
-- Indexen voor tabel `mlbteams`
--
ALTER TABLE `mlbteams`
  ADD PRIMARY KEY (`teamId`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
