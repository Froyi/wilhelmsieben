-- phpMyAdmin SQL Dump
-- version 4.6.4
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Erstellungszeit: 14. Sep 2017 um 13:10
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
('2aaee567-5f80-4e05-b384-103e68305311', 'Das Glueck kommt durch das Gartentor - Lesung und Cellobegleitung', '2017-09-27 12:29:00', 'https://www.facebook.com/events/117955455520100/?acontext=%7B%22source%22%3A5%2C%22page_id_source%22%3A1093245414083859%2C%22action_history%22%3A[%7B%22surface%22%3A%22page%22%2C%22mechanism%22%3A%22main_list%22%2C%22extra_data%22%3A%22%7B%5C%22page_id%5C%22%3A1093245414083859%2C%5C%22tour_id%5C%22%3Anull%7D%22%7D]%2C%22has_source%22%3Atrue%7D', '2aaee567-5f80-4e05-b384-103e68305329'),
('2aaee567-5f80-4e05-b384-103e68305322', 'TestEvent2', '2017-09-29 12:43:00', NULL, NULL),
('2aaee567-5f80-4e05-b384-103e68305304', 'TestEvent3', '2017-10-16 16:12:00', 'https://www.facebook.com/events/117955455520100/?acontext=%7B%22source%22%3A5%2C%22page_id_source%22%3A1093245414083859%2C%22action_history%22%3A[%7B%22surface%22%3A%22page%22%2C%22mechanism%22%3A%22main_list%22%2C%22extra_data%22%3A%22%7B%5C%22page_id%5C%22%3A1093245414083859%2C%5C%22tour_id%5C%22%3Anull%7D%22%7D]%2C%22has_source%22%3Atrue%7D', '2aaee567-5f80-4e05-b384-103e68305329'),
('2aaee567-5f80-4e05-b384-103e68305319', 'TestEvent4', '2017-09-27 20:29:00', 'https://www.facebook.com/events/117955455520100/?acontext=%7B%22source%22%3A5%2C%22page_id_source%22%3A1093245414083859%2C%22action_history%22%3A[%7B%22surface%22%3A%22page%22%2C%22mechanism%22%3A%22main_list%22%2C%22extra_data%22%3A%22%7B%5C%22page_id%5C%22%3A1093245414083859%2C%5C%22tour_id%5C%22%3Anull%7D%22%7D]%2C%22has_source%22%3Atrue%7D', '');

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
  `eventId` varchar(200) DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

--
-- Daten für Tabelle `news`
--

INSERT INTO `news` (`newsId`, `title`, `image`, `text`, `facebookLink`, `newsDate`, `eventId`) VALUES
('2aaee567-5f80-4e05-b384-103e68305329', 'Testnews', 'data/img/news/testNews.jpg', 's dis parturient montes, nascetur ridiculus mus. Donec quam felis, ultricies nec, pellentesque eu, pretium quis, sem. Nulla consequat massa quis enim. Donec pede justo, fringilla vel, aliquet nec, vulputate eget, arcu. In enim justo, rhoncus ut, imperdiet a, venenatis vitae, justo. Nullam dictum felis eu pede mollis pretium. Integer tincidunt. Cras dapibus. Vivamus elementum semper nisi. Aenean vulputate eleifend tellus. Aenean leo ligula, porttitor eu, consequat vitae, eleifend ac, enim. Aliquam lorem ante, dapibus in, viverra quis, feugiat a, tellus. Phasellus viverra nulla ut metus varius laoreet. Quisque rutrum. Aenean imperdiet. Etiam ultricies nisi vel augue. Curabitur ullamcorper ultricies nisi. Nam eget dui. Etiam rhoncus. Maecenas tempus, tellus eget condimentum rhoncus, sem quam semper libero, sit amet adipiscing sem neque sed ipsum. Nam quam nunc, blandit vel, luctus pulvinar, hendrerit id, lorem. Maecenas nec odio et an', 'https://www.facebook.com/Wilhelm7ieben/photos/a.1487255428016187.1073741833.1093245414083859/1679897758751952/?type=3&theater', '2017-09-11 15:56:57', '2aaee567-5f80-4e05-b384-103e68305311'),
('2aaee567-5f80-4e05-b384-103e68305333', 'Testnews', 'data/img/news/testNews.jpg', 's dis parturient montes, nascetur ridiculus mus. Donec quam felis, ultricies nec, pellentesque eu, pretium quis, sem. Nulla consequat massa quis enim. Donec pede justo, fringilla vel, aliquet nec, vulputate eget, arcu. In enim justo, rhoncus ut, imperdiet a, venenatis vitae, jus', NULL, '2017-09-02 07:56:57', NULL),
('2aaee567-5f80-4e05-b384-103e68305344', 'Testnews', 'data/img/news/testNews.jpg', 's dis parturient montes, nascetur ridiculus mus. Donec quam felis, ultricies nec, pellentesque eu, pretium quis, sem. Nulla consequat massa quis enim. Donec pede justo, fringilla vel, aliquet nec, vulputate eget, arcu. In enim justo, rhoncus ut, imperdiet a, venenatis vitae, justo. Nullam dictum felis eu pede mollis pretium. Integer tincidunt. Cras dapibus. Vivamus elementum semper nisi. Aenean vulputate eleifend tellus. Aenean leo ligula, porttitor eu, consequat vitae, eleifend ac, enim. Aliquam lorem ante, dapibus in, viverra quis, feugiat a, tellus. Phasellus viverra nulla ut metus varius laoreet. Quisque rutrum. Aenean imperdiet. Etiam ultricies nisi vel augue. Curabitur ullamcorper ultricies nisi. Nam eget dui. Etiam rhoncus. Maecenas tempus, tellus eget condimentum rhoncus, sem quam semper libero, sit amet adipiscing sem neque sed ipsum. Nam quam nunc, blandit vel, luctus pulvinar, hendrerit id, lorem. Maecenas nec odio et an', 'https://www.facebook.com/Wilhelm7ieben/photos/a.1487255428016187.1073741833.1093245414083859/1679897758751952/?type=3&theater', '2017-09-01 15:56:57', '2aaee567-5f80-4e05-b384-103e68305311');

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
