-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: localhost:3306
-- Gegenereerd op: 11 apr 2024 om 20:22
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

-- --------------------------------------------------------

--
-- Tabelstructuur voor tabel `nbaplayers`
--

CREATE TABLE `nbaplayers` (
  `playerId` int NOT NULL,
  `playerName` varchar(255) NOT NULL,
  `playerTeam` varchar(255) NOT NULL,
  `playerPosition` varchar(255) NOT NULL,
  `playerAge` int NOT NULL,
  `playerHeight` int NOT NULL,
  `playerWeight` int NOT NULL,
  `playerPPG` decimal(3,1) NOT NULL,
  `playerBlocks` decimal(3,1) NOT NULL,
  `playerAssists` decimal(3,1) NOT NULL,
  `playerSteals` decimal(3,1) NOT NULL,
  `playerRebounds` decimal(3,1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Gegevens worden geëxporteerd voor tabel `nbaplayers`
--

INSERT INTO `nbaplayers` (`playerId`, `playerName`, `playerTeam`, `playerPosition`, `playerAge`, `playerHeight`, `playerWeight`, `playerPPG`, `playerBlocks`, `playerAssists`, `playerSteals`, `playerRebounds`) VALUES
(1, 'Trae Young', 'Atlanta Hawks', 'Point Guard', 22, 185, 82, 25.3, 0.2, 9.4, 0.8, 3.9),
(2, 'John Collins', 'Atlanta Hawks', 'Forward', 23, 206, 107, 17.6, 1.0, 1.3, 0.5, 7.4),
(3, 'Clint Capela', 'Atlanta Hawks', 'Center', 26, 208, 109, 15.2, 2.0, 1.2, 0.5, 14.3),
(4, 'Kevin Huerter', 'Atlanta Hawks', 'Guard', 22, 201, 86, 11.9, 0.3, 3.5, 0.8, 3.5),
(5, 'DeAndre Hunter', 'Atlanta Hawks', 'Forward', 23, 203, 102, 15.0, 0.6, 2.0, 0.8, 5.6),
(6, 'Bogdan Bogdanović', 'Atlanta Hawks', 'Guard', 28, 198, 100, 16.4, 0.3, 3.5, 1.0, 3.6),
(7, 'Cam Reddish', 'Atlanta Hawks', 'Guard', 21, 203, 99, 11.2, 0.5, 1.3, 0.9, 4.0),
(8, 'Danilo Gallinari', 'Atlanta Hawks', 'Forward', 32, 208, 106, 13.3, 0.2, 1.3, 0.5, 4.1),
(9, 'Onyeka Okongwu', 'Atlanta Hawks', 'Center', 20, 203, 107, 4.6, 0.7, 0.5, 0.3, 3.3),
(10, 'Tony Snell', 'Atlanta Hawks', 'Forward', 29, 198, 97, 5.3, 0.3, 1.4, 0.4, 2.4),
(11, 'Rajon Rondo', 'Atlanta Hawks', 'Point Guard', 34, 185, 82, 3.9, 0.1, 3.5, 0.9, 2.0),
(12, 'Solomon Hill', 'Atlanta Hawks', 'Forward', 29, 198, 103, 4.5, 0.2, 1.1, 0.4, 2.5),
(13, 'Kris Dunn', 'Atlanta Hawks', 'Point Guard', 27, 191, 93, 5.0, 0.4, 2.0, 0.9, 2.7),
(14, 'Skylar Mays', 'Atlanta Hawks', 'Guard', 23, 193, 93, 3.8, 0.1, 1.1, 0.3, 1.1),
(15, 'Nathan Knight', 'Atlanta Hawks', 'Forward', 23, 208, 115, 3.3, 0.4, 0.8, 0.3, 2.3),
(16, 'Brandon Goodwin', 'Atlanta Hawks', 'Point Guard', 25, 183, 82, 4.9, 0.1, 1.5, 0.6, 1.8),
(17, 'Bruno Fernando', 'Atlanta Hawks', 'Center', 22, 206, 109, 1.5, 0.2, 0.3, 0.2, 2.0);

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
-- Indexen voor tabel `mlbteams`
--
ALTER TABLE `mlbteams`
  ADD PRIMARY KEY (`teamId`);

--
-- Indexen voor tabel `nbaplayers`
--
ALTER TABLE `nbaplayers`
  ADD PRIMARY KEY (`playerId`);

--
-- Indexen voor tabel `nbateams`
--
ALTER TABLE `nbateams`
  ADD PRIMARY KEY (`teamId`),
  ADD UNIQUE KEY `teamId` (`teamId`);

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
-- AUTO_INCREMENT voor een tabel `nbaplayers`
--
ALTER TABLE `nbaplayers`
  MODIFY `playerId` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=18;

--
-- AUTO_INCREMENT voor een tabel `nbateams`
--
ALTER TABLE `nbateams`
  MODIFY `teamId` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=31;

--
-- AUTO_INCREMENT voor een tabel `nflteams`
--
ALTER TABLE `nflteams`
  MODIFY `teamId` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=33;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
