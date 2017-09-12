-- phpMyAdmin SQL Dump
-- version 4.6.4
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Erstellungszeit: 12. Sep 2017 um 13:06
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
-- Tabellenstruktur für Tabelle `event`
--

CREATE TABLE `event` (
  `eventId` varchar(200) NOT NULL,
  `name` varchar(200) NOT NULL,
  `eventDate` datetime NOT NULL,
  `facebookLink` varchar(400) DEFAULT NULL,
  `newsId` varchar(200) DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

--
-- Daten für Tabelle `event`
--

INSERT INTO `event` (`eventId`, `name`, `eventDate`, `facebookLink`, `newsId`) VALUES
('2aaee567-5f80-4e05-b384-103e68305311', 'TestEvent', '2017-09-27 12:29:00', NULL, '2aaee567-5f80-4e05-b384-103e68305329');

-- --------------------------------------------------------

--
-- Tabellenstruktur für Tabelle `news`
--

CREATE TABLE `news` (
  `newsId` varchar(100) NOT NULL,
  `title` varchar(200) NOT NULL,
  `image` varchar(200) NOT NULL,
  `text` text NOT NULL,
  `facebookLink` varchar(400) DEFAULT NULL,
  `newsDate` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `eventId` varchar(200) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

--
-- Daten für Tabelle `news`
--

INSERT INTO `news` (`newsId`, `title`, `image`, `text`, `facebookLink`, `newsDate`, `eventId`) VALUES
('2aaee567-5f80-4e05-b384-103e68305329', 'Testnews', 'data/img/news/testNews.jpg', 's dis parturient montes, nascetur ridiculus mus. Donec quam felis, ultricies nec, pellentesque eu, pretium quis, sem. Nulla consequat massa quis enim. Donec pede justo, fringilla vel, aliquet nec, vulputate eget, arcu. In enim justo, rhoncus ut, imperdiet a, venenatis vitae, justo. Nullam dictum felis eu pede mollis pretium. Integer tincidunt. Cras dapibus. Vivamus elementum semper nisi. Aenean vulputate eleifend tellus. Aenean leo ligula, porttitor eu, consequat vitae, eleifend ac, enim. Aliquam lorem ante, dapibus in, viverra quis, feugiat a, tellus. Phasellus viverra nulla ut metus varius laoreet. Quisque rutrum. Aenean imperdiet. Etiam ultricies nisi vel augue. Curabitur ullamcorper ultricies nisi. Nam eget dui. Etiam rhoncus. Maecenas tempus, tellus eget condimentum rhoncus, sem quam semper libero, sit amet adipiscing sem neque sed ipsum. Nam quam nunc, blandit vel, luctus pulvinar, hendrerit id, lorem. Maecenas nec odio et an', 'https://www.facebook.com/Wilhelm7ieben/photos/a.1487255428016187.1073741833.1093245414083859/1679897758751952/?type=3&theater', '2017-09-01 15:56:57', '2aaee567-5f80-4e05-b384-103e68305311');

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
('2aaee567-5f80-4e05-b384-101568305329', 'Pilzeintopf', '2017-09-12'),
('2aaee567-5f80-4a15-b384-101568305329', 'Spargel Creme Suppe', '2017-09-12');

--
-- Indizes der exportierten Tabellen
--

--
-- Indizes für die Tabelle `event`
--
ALTER TABLE `event`
  ADD PRIMARY KEY (`eventId`);

--
-- Indizes für die Tabelle `news`
--
ALTER TABLE `news`
  ADD PRIMARY KEY (`newsId`);

--
-- Indizes für die Tabelle `soupcalendar`
--
ALTER TABLE `soupcalendar`
  ADD PRIMARY KEY (`soupCalendarId`);

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
