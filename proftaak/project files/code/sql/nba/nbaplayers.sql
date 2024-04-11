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

--
-- Indexen voor geëxporteerde tabellen
--

--
-- Indexen voor tabel `nbaplayers`
--
ALTER TABLE `nbaplayers`
  ADD PRIMARY KEY (`playerId`);

--
-- AUTO_INCREMENT voor geëxporteerde tabellen
--

--
-- AUTO_INCREMENT voor een tabel `nbaplayers`
--
ALTER TABLE `nbaplayers`
  MODIFY `playerId` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=18;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
