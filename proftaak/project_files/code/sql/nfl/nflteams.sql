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
-- Tabelstructuur voor tabel `nflteams`
--

CREATE TABLE `nflteams` (
  `teamId` bigint UNSIGNED NOT NULL,
  `teamName` varchar(50) DEFAULT NULL,
  `teamConference` varchar(10) DEFAULT NULL,
  `teamWins` int DEFAULT NULL,
  `teamLosses` int DEFAULT NULL,
  `madePlayoff` tinyint(1) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Gegevens worden geëxporteerd voor tabel `nflteams`
--

INSERT INTO `nflteams` (`teamId`, `teamName`, `teamConference`, `teamWins`, `teamLosses`, `madePlayoff`) VALUES
(1, 'Buffalo Bills', 'AFC East', 11, 6, 1),
(2, 'Miami Dolphins', 'AFC East', 9, 8, 0),
(3, 'New England Patriots', 'AFC East', 10, 7, 1),
(4, 'New York Jets', 'AFC East', 4, 13, 0),
(5, 'Baltimore Ravens', 'AFC North', 8, 9, 0),
(6, 'Cincinnati Bengals', 'AFC North', 10, 7, 1),
(7, 'Cleveland Browns', 'AFC North', 8, 9, 0),
(8, 'Pittsburgh Steelers', 'AFC North', 9, 7, 1),
(9, 'Houston Texans', 'AFC South', 4, 13, 0),
(10, 'Indianapolis Colts', 'AFC South', 9, 8, 0),
(11, 'Jacksonville Jaguars', 'AFC South', 3, 14, 0),
(12, 'Tennessee Titans', 'AFC South', 12, 5, 1),
(13, 'Denver Broncos', 'AFC West', 7, 10, 0),
(14, 'Kansas City Chiefs', 'AFC West', 12, 5, 1),
(15, 'Las Vegas Raiders', 'AFC West', 6, 11, 0),
(16, 'Los Angeles Chargers', 'AFC West', 9, 8, 1),
(17, 'Dallas Cowboys', 'NFC East', 12, 5, 1),
(18, 'New York Giants', 'NFC East', 4, 13, 0),
(19, 'Philadelphia Eagles', 'NFC East', 9, 8, 1),
(20, 'Washington Football Team', 'NFC East', 7, 10, 0),
(21, 'Chicago Bears', 'NFC North', 6, 11, 0),
(22, 'Detroit Lions', 'NFC North', 3, 13, 0),
(23, 'Green Bay Packers', 'NFC North', 13, 4, 1),
(24, 'Minnesota Vikings', 'NFC North', 8, 9, 0),
(25, 'Atlanta Falcons', 'NFC South', 7, 10, 0),
(26, 'Carolina Panthers', 'NFC South', 5, 12, 0),
(27, 'New Orleans Saints', 'NFC South', 9, 8, 0),
(28, 'Tampa Bay Buccaneers', 'NFC South', 13, 4, 1),
(29, 'Arizona Cardinals', 'NFC West', 11, 6, 1),
(30, 'Los Angeles Rams', 'NFC West', 12, 5, 1),
(31, 'San Francisco 49ers', 'NFC West', 10, 7, 1),
(32, 'Seattle Seahawks', 'NFC West', 7, 10, 0);

--
-- Indexen voor geëxporteerde tabellen
--

--
-- Indexen voor tabel `nflteams`
--
ALTER TABLE `nflteams`
  ADD PRIMARY KEY (`teamId`),
  ADD UNIQUE KEY `teamId` (`teamId`);

--
-- AUTO_INCREMENT voor geëxporteerde tabellen
--

--
-- AUTO_INCREMENT voor een tabel `nflteams`
--
ALTER TABLE `nflteams`
  MODIFY `teamId` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=33;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
