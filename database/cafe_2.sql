-- phpMyAdmin SQL Dump
-- version 4.6.4
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Erstellungszeit: 06. Sep 2017 um 13:31
-- Server-Version: 5.7.14
-- PHP-Version: 7.1.9

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Datenbank: `cafe`
--

-- --------------------------------------------------------

--
-- Tabellenstruktur für Tabelle `soupcalendar`
--

CREATE TABLE `soupcalendar` (
  `soupCalendarId` varchar(200) NOT NULL,
  `soup` varchar(150) NOT NULL,
  `soupDate` date NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

--
-- Daten für Tabelle `soupcalendar`
--

INSERT INTO `soupcalendar` (`soupCalendarId`, `soup`, `soupDate`) VALUES
('2aaee567-5f80-4e05-b384-101568305329', 'Pilzeintopf', '2017-09-06'),
('2aaee567-5f80-4a15-b384-101568305329', 'Spargel Creme Suppe', '2017-09-06');

--
-- Indizes der exportierten Tabellen
--

--
-- Indizes für die Tabelle `soupcalendar`
--
ALTER TABLE `soupcalendar`
  ADD PRIMARY KEY (`soupCalendarId`);

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
