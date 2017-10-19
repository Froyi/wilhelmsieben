-- phpMyAdmin SQL Dump
-- version 4.6.4
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Erstellungszeit: 19. Okt 2017 um 06:30
-- Server-Version: 5.7.14
-- PHP-Version: 5.6.25

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
-- Tabellenstruktur für Tabelle `album`
--

CREATE TABLE `album` (
  `albumId` varchar(200) CHARACTER SET utf8 NOT NULL,
  `title` varchar(100) CHARACTER SET utf8 NOT NULL,
  `albumDate` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Daten für Tabelle `album`
--

INSERT INTO `album` (`albumId`, `title`, `albumDate`) VALUES
('2aaee567-5f80-4e05-b384-101568305329', 'Testalbum III', '2017-09-20');

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
('2aaee567-5f80-4e05-b384-103e68305311', 'Testevent', '2017-10-15 12:30:00', NULL, NULL),
('2aaee567-5f80-4e05-b384-103e68305312', 'Testevent', '2017-11-02 17:30:00', NULL, NULL);

-- --------------------------------------------------------

--
-- Tabellenstruktur für Tabelle `image`
--

CREATE TABLE `image` (
  `imageId` varchar(200) NOT NULL,
  `imageUrl` varchar(400) NOT NULL,
  `title` varchar(100) NOT NULL,
  `albumId` varchar(200) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Daten für Tabelle `image`
--

INSERT INTO `image` (`imageId`, `imageUrl`, `title`, `albumId`) VALUES
('2aaee567-5f80-4e05-b384-101568305321', 'data/img/galerie/image1.jpg', 'testtitle', '2aaee567-5f80-4e05-b384-101568305329'),
('2aaee567-5f80-4e05-b384-101568305322', 'data/img/galerie/image2.jpg', 'testtitle2', '2aaee567-5f80-4e05-b384-101568305329');

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
('2aaee567-5f80-4e05-b384-103e68305329', 'Testnews', 'data/img/news/testNews.jpg', 's dis parturient montes, nascetur ridiculus mus. Donec quam felis, ultricies nec, pellentesque eu, pretium quis, sem. Nulla consequat massa quis enim. Donec pede justo, fringilla vel, aliquet nec, vulputate eget, arcu. In enim justo, rhoncus ut, imperdiet a, venenatis vitae, justo. Nullam dictum felis eu pede mollis pretium. Integer tincidunt. Cras dapibus. Vivamus elementum semper nisi. Aenean vulputate eleifend tellus. Aenean leo ligula, porttitor eu, consequat vitae, eleifend ac, enim. Aliquam lorem ante, dapibus in, viverra quis, feugiat a, tellus. Phasellus viverra nulla ut metus varius laoreet. Quisque rutrum. Aenean imperdiet. Etiam ultricies nisi vel augue. Curabitur ullamcorper ultricies nisi. Nam eget dui. Etiam rhoncus. Maecenas tempus, tellus eget condimentum rhoncus, sem quam semper libero, sit amet adipiscing sem neque sed ipsum. Nam quam nunc, blandit vel, luctus pulvinar, hendrerit id, lorem. Maecenas nec odio et an', 'https://www.facebook.com/Wilhelm7ieben/photos/a.1487255428016187.1073741833.1093245414083859/1679897758751952/?type=3&theater', '2017-10-06 00:00:00', '2aaee567-5f80-4e05-b384-103e68305311'),
('5e60af0d-3509-4bcc-9715-bd9711d0e5ef', 'Sdfaddfasdgdfg', '', 'dfdgfagfmdkglmfa dgfglksdfgmkfdsÃ¶gdfhg fd\r\nfdhogdfkhofgph\r\nofghkogfhkgph\r\nghifh gfihjfdgohjsfdph+s\r\nghjfsihgkfgs\r\nhgfshigjfg#jnplfg', 'https://www.facebook.com/photo.php?fbid=1449934158406486&set=a.255422491190998.58146.100001697468051&type=3&theater', '2017-10-11 12:41:00', ''),
('e54a112e-6526-41a0-98c7-55eb895486b5', 'Testnews', '', 'tzjtjdglkghmd ghjoi dfhgphkg j gfohijdfhoij gfhojk dfhogjidfh op hfdgjdfphjidfp+hjfoÃ¼h fdhj odfh ojghÃ¼o op+fdjishj gfdg jidfsjgdfp+ijgdspfoi gdsfj g', 'https://www.facebook.com/faktastisch/posts/1780942471970090?notif_id=1506420337886345&notif_t=notify_me_page', '2017-10-11 12:40:00', '');

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
('2aaee567-5f80-4e05-b384-101568305329', 'Pilzeintopf', '2017-09-13'),
('2aaee567-5f80-4a15-b384-101568305329', 'Spargel Creme Suppe', '2017-09-13');

-- --------------------------------------------------------

--
-- Tabellenstruktur für Tabelle `user`
--

CREATE TABLE `user` (
  `userId` varchar(200) NOT NULL,
  `email` varchar(100) NOT NULL,
  `passwordHash` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Daten für Tabelle `user`
--

INSERT INTO `user` (`userId`, `email`, `passwordHash`) VALUES
('2aaee567-5f80-4e05-b384-101568305329', 'ms2002@onlinehome.de', '$2y$10$VMdrTeOUIQ2iKSbpEek6c.HAr6ffTdL.OGjZ6ZF1cTqAOqi.W82gW');

--
-- Indizes der exportierten Tabellen
--

--
-- Indizes für die Tabelle `album`
--
ALTER TABLE `album`
  ADD PRIMARY KEY (`albumId`);

--
-- Indizes für die Tabelle `event`
--
ALTER TABLE `event`
  ADD PRIMARY KEY (`eventId`);

--
-- Indizes für die Tabelle `image`
--
ALTER TABLE `image`
  ADD PRIMARY KEY (`imageId`);

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

--
-- Indizes für die Tabelle `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`userId`);

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
