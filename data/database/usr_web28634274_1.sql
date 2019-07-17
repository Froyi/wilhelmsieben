-- phpMyAdmin SQL Dump
-- version 4.5.2
-- http://www.phpmyadmin.net
--
-- Host: localhost
-- Erstellungszeit: 10. Mrz 2018 um 22:00
-- Server-Version: 5.7.19
-- PHP-Version: 5.6.33

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Datenbank: `usr_web28634274_1`
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
('02f0a5dd-3fed-497f-92cd-52380edba106', 'Sushi im W7', '2017-12-11'),
('239205fc-78df-4b31-a166-316a6f4c097b', 'Weihnachten im W7', '2017-12-11'),
('2cca4c61-f067-40fd-9f03-3a1d8569958c', 'Sonntagsbrunch 21.01.2018', '2018-01-25'),
('2e4740ba-9967-4252-8018-b289f93a9aea', 'Holzbasteln im W7', '2017-12-19'),
('64801e2d-6d58-4eb1-aba0-d1f19f83647e', 'Canapes', '2018-02-25'),
('eb1930ff-837a-43c0-ab24-6e2adc2c1949', 'Winterkarte 2017', '2017-12-11');

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
('3cbc5f4a-ba07-457f-899f-a88a7f51da02', 'Adventsbrunch', '2017-12-17 10:00:00', 'https://m.facebook.com/Wilhelm7ieben/photos/gm.529777994054727/1804943009580759/?type=3&source=44&ref=page_internal', NULL),
('c3ab2c45-5728-46e6-bd5a-ed7eab67a9d8', 'Holzbasteln FÃ¼r Kinder', '2017-12-15 15:00:00', 'https://m.facebook.com/events/174526496473227?acontext=%7B%22action_history%22%3A%22%5B%7B%5C%22surface%5C%22%3A%5C%22page%5C%22%2C%5C%22mechanism%5C%22%3A%5C%22main_list%5C%22%2C%5C%22extra_data%5C%22%3A%5B%5D%7D%5D%22%7D&aref=0&ref=page_internal', NULL),
('a1325337-cba3-40e5-bcb6-1fea1f6970ac', 'Sonntagsbrunch', '2018-01-21 10:00:00', 'https://m.facebook.com/events/153695572060691?acontext=%7B%22action_history%22%3A%22%5B%7B%5C%22surface%5C%22%3A%5C%22page%5C%22%2C%5C%22mechanism%5C%22%3A%5C%22main_list%5C%22%2C%5C%22extra_data%5C%22%3A%5B%5D%7D%5D%22%7D&aref=0&ref=page_internal', NULL),
('4758e44d-7ebc-43d0-a37c-e75872eeb8be', 'Lesung Mit Cellobegleitung', '2018-01-13 14:00:00', 'https://www.facebook.com/events/853688311479636/', NULL),
('03392694-0fb3-4a58-b467-6e6462466e9f', 'Sonntagsbrunch', '2018-02-04 10:00:00', 'https://m.facebook.com/events/1116200615216109?acontext=%7B%22action_history%22%3A%22%5B%7B%5C%22surface%5C%22%3A%5C%22page%5C%22%2C%5C%22mechanism%5C%22%3A%5C%22main_list%5C%22%2C%5C%22extra_data%5C%22%3A%5B%5D%7D%5D%22%7D&aref=0&ref=page_internal', NULL),
('909d619d-39ed-4ea9-8d8f-7fea3281e8cf', 'Sonntagsbrunch', '2018-02-18 10:00:00', 'https://m.facebook.com/events/1573857776055659?acontext=%7B%22action_history%22%3A%22%5B%7B%5C%22surface%5C%22%3A%5C%22page%5C%22%2C%5C%22mechanism%5C%22%3A%5C%22main_list%5C%22%2C%5C%22extra_data%5C%22%3A%5B%5D%7D%5D%22%7D&aref=0&ref=page_internal', NULL),
('ad248e4b-81bc-48da-ae50-da03f8e239e4', 'Spielenachmiitag FÃ¼r GroÃŸ Und Klein', '2018-02-09 14:00:00', 'https://m.facebook.com/events/295741454283563?acontext=%7B%22action_history%22%3A%22%5B%7B%5C%22surface%5C%22%3A%5C%22create_dialog%5C%22%2C%5C%22mechanism%5C%22%3A%5C%22page_create_dialog%5C%22%2C%5C%22extra_data%5C%22%3A%5B%5D%7D%5D%22%7D&ref=page_internal&_rdr', NULL),
('aa73eebc-6b48-49d4-be46-8a688bc68deb', 'Sonntagsbrunch', '2018-03-18 10:00:00', 'https://www.facebook.com/events/2057255384563635/', NULL),
('67f52e0d-aeff-4ea7-94b4-e7d158f636f7', 'Konzert Mit "spotlight"', '2018-03-24 17:00:00', 'https://m.facebook.com/events/1931940040182009?acontext=%7B%22action_history%22%3A%22%5B%7B%5C%22surface%5C%22%3A%5C%22create_dialog%5C%22%2C%5C%22mechanism%5C%22%3A%5C%22page_create_dialog%5C%22%2C%5C%22extra_data%5C%22%3A%5B%5D%7D%5D%22%7D&ref=page_internal&_rdr', NULL);

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
('125307da-d7be-4cf8-b6c9-8390db0883e2', 'data/img/galerie/IMAG0687.jpg', 'Das Sushi-Tierchen', '02f0a5dd-3fed-497f-92cd-52380edba106'),
('165f28cb-5110-4e44-9310-3635b7f9b53b', 'data/img/galerie/472dcc2f-f6ce-4eac-985b-c4fb69300eff.jpg', 'Bild4', '2e4740ba-9967-4252-8018-b289f93a9aea'),
('19b74075-10dc-4d55-bcd4-7e6d96482d02', 'data/img/galerie/69484532-d74e-42e9-a062-87b2807e887a.jpg', 'Bild 2', '64801e2d-6d58-4eb1-aba0-d1f19f83647e'),
('1df312eb-7743-4e76-adce-f4102e766c87', 'data/img/galerie/IMAG0685.jpg', 'Eine tolle Platte', '02f0a5dd-3fed-497f-92cd-52380edba106'),
('1ecc1379-a2ec-4288-b0b7-f522c903dfdd', 'data/img/galerie/905ef222-e0e7-44f4-8b4e-c3904132b321.jpg', 'Bild 1', '64801e2d-6d58-4eb1-aba0-d1f19f83647e'),
('33d9d2fb-21b5-426d-94e5-9771d48351ca', 'data/img/galerie/24293878_1795509350524125_4178588356674866331_n.jpg', 'Winterkarte 2017', 'eb1930ff-837a-43c0-ab24-6e2adc2c1949'),
('42874036-33fa-42d7-b8dc-6941958c26a7', 'data/img/galerie/1c2b3980-0a6f-407a-b6ee-63d6642589d3.jpg', 'Bild6', '2e4740ba-9967-4252-8018-b289f93a9aea'),
('49e2214d-ca0e-489f-aca7-392e1386bdf6', 'data/img/galerie/fff14020-08fe-4573-96e4-964334be96b8.jpg', 'Bild5', '2cca4c61-f067-40fd-9f03-3a1d8569958c'),
('4e28abb4-2ece-4adc-8b81-754172a1eca5', 'data/img/galerie/IMAG0692.jpg', 'Gruppenbild', '02f0a5dd-3fed-497f-92cd-52380edba106'),
('523d1e49-5f4a-4ce9-926f-fb508f4080f6', 'data/img/galerie/21147d1b-f868-4490-856d-b0ddfef4aa01.jpg', 'Bild1', '2cca4c61-f067-40fd-9f03-3a1d8569958c'),
('53e4f427-0efd-4034-b277-17ceb40f0d0d', 'data/img/galerie/9ff2b937-efe1-49e7-98ff-fd99ba8ea7a5.jpg', 'Bild 4', '64801e2d-6d58-4eb1-aba0-d1f19f83647e'),
('58909670-43c3-4333-8871-ead5978ef724', 'data/img/galerie/IMAG6298_1.jpg', 'Beleuchtung', '239205fc-78df-4b31-a166-316a6f4c097b'),
('58dafc44-52fb-44bb-800b-179b72305002', 'data/img/galerie/IMAG6303.jpg', 'Schaufenster 2', '239205fc-78df-4b31-a166-316a6f4c097b'),
('7bc28075-c01b-4be8-b72c-790fb7db3104', 'data/img/galerie/d9432f59-6478-46df-baa6-ad3e56475303.jpg', 'Bild2', '2e4740ba-9967-4252-8018-b289f93a9aea'),
('821c1cf5-464a-4557-a1ca-0aa9717704d4', 'data/img/galerie/4c606fa6-edbd-473d-bd91-17268e90959a.jpg', 'Bild3', '2cca4c61-f067-40fd-9f03-3a1d8569958c'),
('8b021ec9-5bef-4962-a795-84128cbc8906', 'data/img/galerie/IMAG0689.jpg', 'Gedeckte Tafel', '02f0a5dd-3fed-497f-92cd-52380edba106'),
('8b7e836f-6e10-490d-8006-e36f760ff0a3', 'data/img/galerie/IMAG0680.jpg', 'Kompositionen', '02f0a5dd-3fed-497f-92cd-52380edba106'),
('9711c614-3d1c-4e10-aede-88a03447e3b6', 'data/img/galerie/24068144_1795509393857454_3382802405610431972_n.jpg', 'Flammkuchen Wiener Walzer', 'eb1930ff-837a-43c0-ab24-6e2adc2c1949'),
('988fcff1-984f-4c4a-a816-0dd9adf4f075', 'data/img/galerie/1d063017-0a47-4fd5-b001-b272f85b7dfc.jpg', 'Bild 3', '64801e2d-6d58-4eb1-aba0-d1f19f83647e'),
('c24760a2-471e-4c3f-82c0-995e8aa2fc01', 'data/img/galerie/31ab2192-52be-4758-bcba-53e1d4f15249.jpg', '', '2e4740ba-9967-4252-8018-b289f93a9aea'),
('c517c56d-584d-41a7-9922-2a3b8e721168', 'data/img/galerie/IMAG0682.jpg', 'Eifrig dabei', '02f0a5dd-3fed-497f-92cd-52380edba106'),
('c7713f25-92e5-4246-8fe5-0ffb3a43733a', 'data/img/galerie/cc85a2fb-25c3-4c12-b91c-ed56e3b4dcb7.jpg', 'Bild5', '2e4740ba-9967-4252-8018-b289f93a9aea'),
('cf8f2507-d1e0-45a6-9d16-714e9ceef004', 'data/img/galerie/e69f6b68-a922-4a84-adce-8938a72d26ab.jpg', 'Bild2', '2cca4c61-f067-40fd-9f03-3a1d8569958c'),
('d24c043e-3bb0-4ff5-bb88-924423bc0621', 'data/img/galerie/a700eb32-2284-406d-b4ec-9b9c8617e1f3.jpg', 'Bild3', '2e4740ba-9967-4252-8018-b289f93a9aea'),
('d65b4a30-068e-43ec-8267-7a342eec31a2', 'data/img/galerie/c0ec90be-a66d-4883-8c4d-1d941843fb75.jpg', 'Bild 5', '64801e2d-6d58-4eb1-aba0-d1f19f83647e'),
('ddf4f622-5ba6-40de-9e4d-4ee007a592ad', 'data/img/galerie/IMAG6311_1_1.jpg', 'Schaufenster', '239205fc-78df-4b31-a166-316a6f4c097b'),
('e110a1f3-2065-46be-88f5-788b4a352a0d', 'data/img/galerie/680f285d-b813-4f70-8262-25739adc0aec.jpg', 'Bild4', '2cca4c61-f067-40fd-9f03-3a1d8569958c'),
('e7bd6c63-b33d-4d85-b742-1016810866c6', 'data/img/galerie/IMAG6301.jpg', 'BegrÃ¼ÃŸung', '239205fc-78df-4b31-a166-316a6f4c097b'),
('e99b0230-00a2-4d95-ad6a-8808de5e60eb', 'data/img/galerie/IMAG6314_1.jpg', 'HÃ¤uschen', '239205fc-78df-4b31-a166-316a6f4c097b'),
('ed96e67f-becf-489c-9bd1-09c2893b82db', 'data/img/galerie/IMAG6305_1.jpg', 'Tischdeko', '239205fc-78df-4b31-a166-316a6f4c097b'),
('ee7e8ae2-38fa-4f65-973a-c1f459df7c04', 'data/img/galerie/24174602_1795509370524123_6333790072467512157_n.jpg', 'Eierkuchen Bratapfel', 'eb1930ff-837a-43c0-ab24-6e2adc2c1949');

-- --------------------------------------------------------

--
-- Tabellenstruktur für Tabelle `news`
--

CREATE TABLE `news` (
  `newsId` varchar(100) NOT NULL,
  `title` varchar(200) NOT NULL,
  `image` varchar(200) DEFAULT NULL,
  `text` text NOT NULL,
  `facebookLink` varchar(400) DEFAULT NULL,
  `newsDate` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `eventId` varchar(200) DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

--
-- Daten für Tabelle `news`
--

INSERT INTO `news` (`newsId`, `title`, `image`, `text`, `facebookLink`, `newsDate`, `eventId`) VALUES
('92b58ac8-5713-466e-8766-70cc796739a9', 'Holzbasteln', 'data/img/news/24313239_1798483620226698_4963911932086605118_o.jpg', 'Am 15.12. kÃ¶nnen Kinder im CafÃ© Wilhelm 7ieben ihr eigenes Holzspielzeug bauen. Erfahrene HolzpÃ¤dagogen helfen am groÃŸen Werktisch ein eigenes Unikat herzustellen.\r\n\r\nDas Spielzeug ist auch hervorragend als Weihnachtsgeschenk geeignet.', 'https://www.facebook.com/events/174526496473227/', '2017-12-11 11:48:00', 'c3ab2c45-5728-46e6-bd5a-ed7eab67a9d8'),
('59446ef7-4570-430b-b6c7-54a28b79b6eb', 'Winterkarte 2017', 'data/img/news/24293878_1795509350524125_4178588356674866331_n.jpg', 'Ab sofort gibt es im CafÃ© Wilhelm 7ieben die neue Saisonkarte fÃ¼r den Winter.<div><br></div><div>NatÃ¼rlich mit dabei ist selbstgemachter GlÃ¼hwein mit und ohne Schuss, aber auch Eierkuchen in Wintervarianten wie Bratapfel oder Marzipan. Auch der Flammkuchen Wiener Walzer mit WÃ¼rstchen und bunten Paprikastreifen bittet zum Tanz.Kommt vorbei und probiert doch mal.</div>', NULL, '2017-12-13 16:32:00', NULL),
('ca55e1be-1375-4510-aa4f-e931c483cf3e', 'Adventsbrunch', 'data/img/news/Brunch.jpg', '<span class="_4n-j _3cht fsl" data-testid="event-permalink-details">Startet entspannt in euren freien Tag und schlemmt am Buffet!<br>\r\n Neben einem reichhaltigem FrÃ¼hstÃ¼cksbuffet mit einer Auswahl an \r\nfrischem Obst und GemÃ¼se, gibts unsere beliebten W7-Eierkuchen zum \r\nSelberbelegen.<br> AuÃŸerdem erwarten euch natÃ¼rlich hausgemachte Suppen und EintÃ¶pfe.<br> <br> Preis pro Person: 11,90 â‚¬ (o. GetrÃ¤nke)<br>                                 Kinder bis 6 Jahre 1/2 Preis<br> <br> Eine telefonische Reservierung (01525-5366682) wÃ¤re von Vorteil.</span>', 'https://m.facebook.com/events/529777944054732?acontext=%7B%22action_history%22%3A%22%5B%7B%5C%22surface%5C%22%3A%5C%22page%5C%22%2C%5C%22mechanism%5C%22%3A%5C%22main_list%5C%22%2C%5C%22extra_data%5C%22%3A%5B%5D%7D%5D%22%7D&aref=0&ref=page_internal', '2017-12-13 17:09:00', '3cbc5f4a-ba07-457f-899f-a88a7f51da02'),
('921d22fc-976a-4a14-89bf-b87a80a591b0', 'Holzbasteln im W7', 'data/img/news/88a6bfc0-ffe6-4bf5-908d-43a1430265b5.jpg', '<p>Am Freitag war es so weit:</p><p>Die Jungs von Kinderhand waren bei uns und haben mit Kindern Holzspielzeug in unserem CafÃ© gebastelt.</p><p>Wir bedanken uns noch einmal ganz herzlich bei den Dreien fÃ¼r diese tolle Aktion, die so viele Kinderaugen zum GlÃ¤nzen gebracht hat.</p><p>Bei den Impressionen haben wir euch ein paar Bilder zusammen gestellt.</p>', 'https://m.facebook.com/story.php?story_fbid=1813750732033320&id=1093245414083859', '2017-12-18 09:40:00', NULL),
('aafad59e-03a6-4acb-b58d-839330cf756b', 'Sonntagsbrunch', 'data/img/news/ad1e5d3d-548f-4b2d-ad40-779f24a45106.jpg', '<p><span style="color: rgb(75, 79, 86); font-family: Roboto, &quot;Droid Sans&quot;, Helvetica, sans-serif; font-size: 14px; background-color: rgb(255, 255, 255);">Startet entspannt in den Tag beim W7-Sonntagsbrun</span><wbr style="color: rgb(75, 79, 86); font-family: Roboto, &quot;Droid Sans&quot;, Helvetica, sans-serif; font-size: 14px; background-color: rgb(255, 255, 255);"><span class="word_break" style="display: inline-block; color: rgb(75, 79, 86); font-family: Roboto, &quot;Droid Sans&quot;, Helvetica, sans-serif; font-size: 14px; background-color: rgb(255, 255, 255);"></span><span style="color: rgb(75, 79, 86); font-family: Roboto, &quot;Droid Sans&quot;, Helvetica, sans-serif; font-size: 14px; background-color: rgb(255, 255, 255);">ch!</span><br style="color: rgb(75, 79, 86); font-family: Roboto, &quot;Droid Sans&quot;, Helvetica, sans-serif; font-size: 14px; background-color: rgb(255, 255, 255);"><span style="color: rgb(75, 79, 86); font-family: Roboto, &quot;Droid Sans&quot;, Helvetica, sans-serif; font-size: 14px; background-color: rgb(255, 255, 255);">Neben einem reichhaltigem FrÃ¼hstÃ¼cksbuffe</span><wbr style="color: rgb(75, 79, 86); font-family: Roboto, &quot;Droid Sans&quot;, Helvetica, sans-serif; font-size: 14px; background-color: rgb(255, 255, 255);"><span class="word_break" style="display: inline-block; color: rgb(75, 79, 86); font-family: Roboto, &quot;Droid Sans&quot;, Helvetica, sans-serif; font-size: 14px; background-color: rgb(255, 255, 255);"></span><span style="color: rgb(75, 79, 86); font-family: Roboto, &quot;Droid Sans&quot;, Helvetica, sans-serif; font-size: 14px; background-color: rgb(255, 255, 255);">t mit einer Auswahl an frischem Obst und</span><span class="text_exposed_show" style="display: inline; color: rgb(75, 79, 86); font-family: Roboto, &quot;Droid Sans&quot;, Helvetica, sans-serif; font-size: 14px; background-color: rgb(255, 255, 255);">&nbsp;GemÃ¼se, gibts unsere beliebten W7-Eierkuchen zum Selberbelegen.<br>AuÃŸerdem erwarten euch natÃ¼rlich hausgemachte Suppen und EintÃ¶pfe.<br><br>Preis pro Person: 11,90 â‚¬ (o. GetrÃ¤nke)<br>Kinder bis 6 Jahre 1/2 Preis<br><br>Eine telefonische Reservierung (01525-5366682)<wbr><span class="word_break" style="display: inline-block;"></span>&nbsp;wÃ¤re von Vorteil.</span><br></p>', 'https://m.facebook.com/events/153695572060691?acontext=%7B%22action_history%22%3A%22%5B%7B%5C%22surface%5C%22%3A%5C%22page%5C%22%2C%5C%22mechanism%5C%22%3A%5C%22main_list%5C%22%2C%5C%22extra_data%5C%22%3A%5B%5D%7D%5D%22%7D&aref=0&ref=page_internal', '2017-12-19 12:32:00', 'a1325337-cba3-40e5-bcb6-1fea1f6970ac'),
('a5dc8274-b3b2-4665-8132-ab34e92d80eb', 'Ã–ffnungszeiten', 'data/img/news/4683d9e0-7e81-4915-94a6-34282f63a36d.png', '<p>Wir mÃ¶chten noch einmal auf die geÃ¤nderten Ã–ffnungszeiten zu Weihnachten und dem Jahreswechsel hinweisen:</p><p><br></p><p>24.12.2017&nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; geschlossen</p><p>25./26.12.2017&nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp;11:00 - 18:00 Uhr</p><p>27.12.2017 - 03.01.2018&nbsp; &nbsp; &nbsp;geschlossen</p><p><br></p><p>Ab dem 04.01.2018 sind wir wieder wie gewohnt fÃ¼r euch da !!</p>', 'https://m.facebook.com/Wilhelm7ieben/photos/a.1098145130260554.1073741829.1093245414083859/1734550173286710/?type=3&source=48', '2017-12-18 10:29:00', NULL),
('ccf67375-e3fb-4cf6-ba77-0d932a905697', 'Ã–ffnungszeiten', 'data/img/news/ae9ea2a1-992b-4644-a32a-b4121cc7f0de.png', '<p>Hallo liebe Freunde des CafÃ© Wilhelm 7ieben,</p><p> ab sofort gelten unsere geÃ¤nderten WinterÃ¶ffnungszeiten.</p><p><br></p><p> Montag - Sonntag<span class="text_exposed_show"></span></p><p><span class="text_exposed_show"> 10Uhr - 18 Uhr</span></p><div class="text_exposed_show"><p> Mittwoch bleibt Ruhetag</p><p><br></p><p> Bitte beachtet das. <br> Wir mÃ¶chten ja nicht, dass Ihr uns nur von auÃŸen seht...<span class="_5mfr _47e3"><img class="img" role="presentation" src="https://static.xx.fbcdn.net/images/emoji.php/v9/fce/1/16/1f600.png" alt="" width="16" height="16"></span><br><br></p><p> Liebe GrÃ¼ÃŸe<br> Euer W7-Duo</p></div><p><br><br clear="all"></p>', NULL, '2018-01-03 11:21:00', NULL),
('97d88fc1-21a1-4547-854f-654b951e53e0', 'Lesung mit Cellobegleitung', 'data/img/news/8dad9e22-c3df-4587-bcf1-a1f7c998932c.jpg', '<p><span class="_4n-j _3cht fsl" data-testid="event-permalink-details">Seid\r\n eingeladen zu einer heimeligen Buchlesung mit Cellobegleitung zum Thema\r\n "WINTERFREUDE - WILLKOMMEN IM NEUEN JAHR" im CafÃ© W7.<br> Hannelore Auer liest verschiedene Texte zum Thema und wird begleitet von Anja Hamblyn am Cello mit ausgewÃ¤hlten StÃ¼cken.</span></p>', 'https://www.facebook.com/events/853688311479636/', '2018-01-04 20:17:00', '4758e44d-7ebc-43d0-a37c-e75872eeb8be'),
('bc4e0d98-2173-471f-ba4a-b8fee62df7bb', 'Sonntagsbrunch', 'data/img/news/800ff43d-681b-4a0b-869c-3a50a82a3f99.jpg', '<p><span style="color: rgb(75, 79, 86); font-family: Roboto, &quot;Droid Sans&quot;, Helvetica, sans-serif; font-size: 14px; background-color: rgb(255, 255, 255);">Startet entspannt in den Tag beim W7-Sonntagsbrun</span><wbr style="color: rgb(75, 79, 86); font-family: Roboto, &quot;Droid Sans&quot;, Helvetica, sans-serif; font-size: 14px; background-color: rgb(255, 255, 255);"><span class="word_break" style="display: inline-block; color: rgb(75, 79, 86); font-family: Roboto, &quot;Droid Sans&quot;, Helvetica, sans-serif; font-size: 14px; background-color: rgb(255, 255, 255);"></span><span style="color: rgb(75, 79, 86); font-family: Roboto, &quot;Droid Sans&quot;, Helvetica, sans-serif; font-size: 14px; background-color: rgb(255, 255, 255);">ch!</span><br style="color: rgb(75, 79, 86); font-family: Roboto, &quot;Droid Sans&quot;, Helvetica, sans-serif; font-size: 14px; background-color: rgb(255, 255, 255);"><span style="color: rgb(75, 79, 86); font-family: Roboto, &quot;Droid Sans&quot;, Helvetica, sans-serif; font-size: 14px; background-color: rgb(255, 255, 255);">Neben einem reichhaltigem FrÃ¼hstÃ¼cksbuffe</span><wbr style="color: rgb(75, 79, 86); font-family: Roboto, &quot;Droid Sans&quot;, Helvetica, sans-serif; font-size: 14px; background-color: rgb(255, 255, 255);"><span class="word_break" style="display: inline-block; color: rgb(75, 79, 86); font-family: Roboto, &quot;Droid Sans&quot;, Helvetica, sans-serif; font-size: 14px; background-color: rgb(255, 255, 255);"></span><span style="color: rgb(75, 79, 86); font-family: Roboto, &quot;Droid Sans&quot;, Helvetica, sans-serif; font-size: 14px; background-color: rgb(255, 255, 255);">t mit einer Auswahl an frischem Obst und</span><span class="text_exposed_show" style="display: inline; color: rgb(75, 79, 86); font-family: Roboto, &quot;Droid Sans&quot;, Helvetica, sans-serif; font-size: 14px; background-color: rgb(255, 255, 255);">&nbsp;GemÃ¼se, gibts unsere beliebten W7-Eierkuchen zum Selberbelegen.<br>AuÃŸerdem erwarten euch natÃ¼rlich hausgemachte Suppen und EintÃ¶pfe.<br><br>Preis pro Person: 11,90 â‚¬ (o. GetrÃ¤nke)<br>Kinder bis 6 Jahre 1/2 Preis<br><br>Eine telefonische Reservierung (01525-5366682)<wbr><span class="word_break" style="display: inline-block;"></span>&nbsp;wÃ¤re von Vorteil.</span><br></p>', 'https://m.facebook.com/events/1116200615216109?acontext=%7B%22action_history%22%3A%22%5B%7B%5C%22surface%5C%22%3A%5C%22page%5C%22%2C%5C%22mechanism%5C%22%3A%5C%22main_list%5C%22%2C%5C%22extra_data%5C%22%3A%5B%5D%7D%5D%22%7D&aref=0&ref=page_internal', '2018-01-18 15:27:00', '03392694-0fb3-4a58-b467-6e6462466e9f'),
('ee097267-f57b-43be-ab37-390902772847', 'Sonntagsbrunch', 'data/img/news/d5b51380-80dc-4fd3-8fa4-450c85dfa237.jpg', '<p><span style="color: rgb(75, 79, 86); font-family: Roboto, &quot;Droid Sans&quot;, Helvetica, sans-serif; font-size: 14px; background-color: rgb(255, 255, 255);">Startet entspannt in den Tag beim W7-Sonntagsbrun</span><wbr style="color: rgb(75, 79, 86); font-family: Roboto, &quot;Droid Sans&quot;, Helvetica, sans-serif; font-size: 14px; background-color: rgb(255, 255, 255);"><span class="word_break" style="display: inline-block; color: rgb(75, 79, 86); font-family: Roboto, &quot;Droid Sans&quot;, Helvetica, sans-serif; font-size: 14px; background-color: rgb(255, 255, 255);"></span><span style="color: rgb(75, 79, 86); font-family: Roboto, &quot;Droid Sans&quot;, Helvetica, sans-serif; font-size: 14px; background-color: rgb(255, 255, 255);">ch!</span><br style="color: rgb(75, 79, 86); font-family: Roboto, &quot;Droid Sans&quot;, Helvetica, sans-serif; font-size: 14px; background-color: rgb(255, 255, 255);"><span style="color: rgb(75, 79, 86); font-family: Roboto, &quot;Droid Sans&quot;, Helvetica, sans-serif; font-size: 14px; background-color: rgb(255, 255, 255);">Neben einem reichhaltigem FrÃ¼hstÃ¼cksbuffe</span><wbr style="color: rgb(75, 79, 86); font-family: Roboto, &quot;Droid Sans&quot;, Helvetica, sans-serif; font-size: 14px; background-color: rgb(255, 255, 255);"><span class="word_break" style="display: inline-block; color: rgb(75, 79, 86); font-family: Roboto, &quot;Droid Sans&quot;, Helvetica, sans-serif; font-size: 14px; background-color: rgb(255, 255, 255);"></span><span style="color: rgb(75, 79, 86); font-family: Roboto, &quot;Droid Sans&quot;, Helvetica, sans-serif; font-size: 14px; background-color: rgb(255, 255, 255);">t mit einer Auswahl an frischem Obst und</span><span class="text_exposed_show" style="display: inline; color: rgb(75, 79, 86); font-family: Roboto, &quot;Droid Sans&quot;, Helvetica, sans-serif; font-size: 14px; background-color: rgb(255, 255, 255);">&nbsp;GemÃ¼se, gibts unsere beliebten W7-Eierkuchen zum Selberbelegen.<br>AuÃŸerdem erwarten euch natÃ¼rlich hausgemachte Suppen und EintÃ¶pfe.<br><br>Preis pro Person: 11,90 â‚¬ (o. GetrÃ¤nke)<br>Kinder bis 6 Jahre 1/2 Preis<br><br>Eine telefonische Reservierung (01525-5366682)<wbr><span class="word_break" style="display: inline-block;"></span>&nbsp;wÃ¤re von Vorteil.</span><br></p>', 'https://m.facebook.com/events/1573857776055659?acontext=%7B%22action_history%22%3A%22%5B%7B%5C%22surface%5C%22%3A%5C%22page%5C%22%2C%5C%22mechanism%5C%22%3A%5C%22main_list%5C%22%2C%5C%22extra_data%5C%22%3A%5B%5D%7D%5D%22%7D&aref=0&ref=page_internal', '2018-01-25 10:53:00', '909d619d-39ed-4ea9-8d8f-7fea3281e8cf'),
('49bd2d71-1ff4-438b-ab3c-9a931ad0bc01', 'Spielenachmittag fÃ¼r GroÃŸ und Klein', 'data/img/news/bf01748e-3853-4578-be8d-2e45e4372fbf.jpg', '<p><span style="color: rgb(75, 79, 86); font-family: Roboto, &quot;Droid Sans&quot;, Helvetica, sans-serif; font-size: 14px; background-color: rgb(255, 255, 255);">Das CafÃ© Wilhelm 7ieben lÃ¤dt zum Spielenachmitta</span><wbr style="color: rgb(75, 79, 86); font-family: Roboto, &quot;Droid Sans&quot;, Helvetica, sans-serif; font-size: 14px; background-color: rgb(255, 255, 255);"><span class="word_break" style="display: inline-block; color: rgb(75, 79, 86); font-family: Roboto, &quot;Droid Sans&quot;, Helvetica, sans-serif; font-size: 14px; background-color: rgb(255, 255, 255);"></span><span style="color: rgb(75, 79, 86); font-family: Roboto, &quot;Droid Sans&quot;, Helvetica, sans-serif; font-size: 14px; background-color: rgb(255, 255, 255);">g ein.</span><br style="color: rgb(75, 79, 86); font-family: Roboto, &quot;Droid Sans&quot;, Helvetica, sans-serif; font-size: 14px; background-color: rgb(255, 255, 255);"><span style="color: rgb(75, 79, 86); font-family: Roboto, &quot;Droid Sans&quot;, Helvetica, sans-serif; font-size: 14px; background-color: rgb(255, 255, 255);">Willkommen ist jeder, der SpaÃŸ am Spielen und lustiger Gesellschaft hat.</span><br style="color: rgb(75, 79, 86); font-family: Roboto, &quot;Droid Sans&quot;, Helvetica, sans-serif; font-size: 14px; background-color: rgb(255, 255, 255);"><span style="color: rgb(75, 79, 86); font-family: Roboto, &quot;Droid Sans&quot;, Helvetica, sans-serif; font-size: 14px; background-color: rgb(255, 255, 255);">Wir stellen<span class="text_exposed_show" style="display: inline;">&nbsp;eine Auswahl an verschiedenen Gesellschaftssp</span></span><span class="text_exposed_show" style="display: inline; color: rgb(75, 79, 86); font-family: Roboto, &quot;Droid Sans&quot;, Helvetica, sans-serif; font-size: 14px; background-color: rgb(255, 255, 255);"><wbr><span class="word_break" style="display: inline-block;"></span>ielen zur VerfÃ¼gung (s. Bild u.a.). Es kÃ¶nnen aber auch gerne eigene Spiele mitgebracht werden!&nbsp;<br>FÃ¼r die Kleinen gibt es eine groÃŸe Holzbahn zum gemeinsamen Aufbauen und Spielen.<br>FÃ¼r Knabberei sorgen wir!&nbsp;<br>Die Veranstaltung darf gerne geteilt und Freunde und Bekannte eingeladen werden.&nbsp;<br>Der Eintritt ist frei!</span><br></p>', 'https://m.facebook.com/events/295741454283563?acontext=%7B%22action_history%22%3A%22%5B%7B%5C%22surface%5C%22%3A%5C%22create_dialog%5C%22%2C%5C%22mechanism%5C%22%3A%5C%22page_create_dialog%5C%22%2C%5C%22extra_data%5C%22%3A%5B%5D%7D%5D%22%7D&ref=page_internal&_rdr', '2018-02-02 10:53:00', 'ad248e4b-81bc-48da-ae50-da03f8e239e4'),
('f0222e1a-202e-45ce-96f2-fa1238f3feda', 'Sonntagsbrunch', 'data/img/news/01e078c7-faa8-4639-b1fd-0801b2ce5ac4.jpg', '<p><span style="color: rgb(75, 79, 86); font-family: Roboto, &quot;Droid Sans&quot;, Helvetica, sans-serif; font-size: 14px; background-color: rgb(255, 255, 255);">Startet entspannt in den Tag beim W7-Sonntagsbrun</span><wbr style="color: rgb(75, 79, 86); font-family: Roboto, &quot;Droid Sans&quot;, Helvetica, sans-serif; font-size: 14px; background-color: rgb(255, 255, 255);"><span class="word_break" style="display: inline-block; color: rgb(75, 79, 86); font-family: Roboto, &quot;Droid Sans&quot;, Helvetica, sans-serif; font-size: 14px; background-color: rgb(255, 255, 255);"></span><span style="color: rgb(75, 79, 86); font-family: Roboto, &quot;Droid Sans&quot;, Helvetica, sans-serif; font-size: 14px; background-color: rgb(255, 255, 255);">ch!</span><br style="color: rgb(75, 79, 86); font-family: Roboto, &quot;Droid Sans&quot;, Helvetica, sans-serif; font-size: 14px; background-color: rgb(255, 255, 255);"><span style="color: rgb(75, 79, 86); font-family: Roboto, &quot;Droid Sans&quot;, Helvetica, sans-serif; font-size: 14px; background-color: rgb(255, 255, 255);">Neben einem reichhaltigem FrÃ¼hstÃ¼cksbuffe</span><wbr style="color: rgb(75, 79, 86); font-family: Roboto, &quot;Droid Sans&quot;, Helvetica, sans-serif; font-size: 14px; background-color: rgb(255, 255, 255);"><span class="word_break" style="display: inline-block; color: rgb(75, 79, 86); font-family: Roboto, &quot;Droid Sans&quot;, Helvetica, sans-serif; font-size: 14px; background-color: rgb(255, 255, 255);"></span><span style="color: rgb(75, 79, 86); font-family: Roboto, &quot;Droid Sans&quot;, Helvetica, sans-serif; font-size: 14px; background-color: rgb(255, 255, 255);">t mit einer Auswahl an frischem Obst und</span><span class="text_exposed_show" style="display: inline; color: rgb(75, 79, 86); font-family: Roboto, &quot;Droid Sans&quot;, Helvetica, sans-serif; font-size: 14px; background-color: rgb(255, 255, 255);">&nbsp;GemÃ¼se, gibts unsere beliebten W7-Eierkuchen zum Selberbelegen.<br>AuÃŸerdem erwarten euch natÃ¼rlich hausgemachte Suppen und EintÃ¶pfe.<br><br>Preis pro Person: 11,90 â‚¬ (o. GetrÃ¤nke)<br>Kinder bis 6 Jahre 1/2 Preis<br><br>Eine telefonische Reservierung (01525-5366682)<wbr><span class="word_break" style="display: inline-block;"></span>&nbsp;wÃ¤re von Vorteil.</span><br></p>', 'https://www.facebook.com/events/2057255384563635/', '2018-03-03 10:52:00', 'aa73eebc-6b48-49d4-be46-8a688bc68deb'),
('85ca632c-e657-4d8f-baca-715f62a92e77', 'Konzert mit "Spotlight"', 'data/img/news/736b6c57-b4c7-4301-9ff5-5ec22e1e589a.jpg', '<p><span style="color: rgb(75, 79, 86); font-family: Roboto, &quot;Droid Sans&quot;, Helvetica, sans-serif; font-size: 14px; background-color: rgb(255, 255, 255);">Die Band "Spotlight" von der Musikschulke Bernburg covert Songs aus den Bereichen Pop und Rock und interpretieren sie auf Ihre Weise ganz neu. Lasst euch von dem Sextett musikalisch begeistern. Der Eintritt ist frei!</span><br></p>', 'https://m.facebook.com/events/1931940040182009?acontext=%7B%22action_history%22%3A%22%5B%7B%5C%22surface%5C%22%3A%5C%22create_dialog%5C%22%2C%5C%22mechanism%5C%22%3A%5C%22page_create_dialog%5C%22%2C%5C%22extra_data%5C%22%3A%5B%5D%7D%5D%22%7D&ref=page_internal&_rdr', '2018-03-04 10:15:00', '67f52e0d-aeff-4ea7-94b4-e7d158f636f7');

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
('2aaee567-5f80-4e05-b384-101568305329', 'konrad.auer@hotmail.de', '$2y$10$AdIjpPRtvOCD6Hzt5JwcyeTl31w5C2FGcFqr77gft8/NefblxTP7a');

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
