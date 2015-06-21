-- phpMyAdmin SQL Dump
-- version 4.3.11
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Erstellungszeit: 21. Jun 2015 um 19:58
-- Server-Version: 5.6.24
-- PHP-Version: 5.5.24

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Datenbank: `mybooks`
--

-- --------------------------------------------------------

--
-- Tabellenstruktur für Tabelle `benutzer`
--

CREATE TABLE IF NOT EXISTS `benutzer` (
  `id` int(11) NOT NULL,
  `vorname` varchar(128) NOT NULL,
  `nachname` varchar(128) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=latin1;

--
-- Daten für Tabelle `benutzer`
--

INSERT INTO `benutzer` (`id`, `vorname`, `nachname`) VALUES
(1, 'Matthias', 'Hauf'),
(2, 'Moritz', 'Thomas'),
(3, 'Martina', 'Kraus');

-- --------------------------------------------------------

--
-- Tabellenstruktur für Tabelle `bucharten`
--

CREATE TABLE IF NOT EXISTS `bucharten` (
  `id` int(11) NOT NULL,
  `name` varchar(128) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=7 DEFAULT CHARSET=latin1;

--
-- Daten für Tabelle `bucharten`
--

INSERT INTO `bucharten` (`id`, `name`) VALUES
(1, 'eBook'),
(2, 'Newspaper'),
(3, 'Taschenbuch'),
(4, 'Lexikon'),
(5, 'Hardcover'),
(6, 'Paperback');

-- --------------------------------------------------------

--
-- Tabellenstruktur für Tabelle `buecher`
--

CREATE TABLE IF NOT EXISTS `buecher` (
  `isbn` int(11) NOT NULL,
  `autor` varchar(128) NOT NULL,
  `titel` varchar(128) NOT NULL,
  `kapitel` int(11) NOT NULL,
  `buchart_id` int(11) NOT NULL,
  `genre_id` int(11) NOT NULL,
  `erscheinungsjahr` int(11) NOT NULL,
  `auflage` int(11) NOT NULL,
  `user_id` int(11) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=latin1;

--
-- Daten für Tabelle `buecher`
--

INSERT INTO `buecher` (`isbn`, `autor`, `titel`, `kapitel`, `buchart_id`, `genre_id`, `erscheinungsjahr`, `auflage`, `user_id`) VALUES
(1, 'meh', 'meh2', 1, 2, 3, 4, 5, 0),
(2, 'meh', 'meh', 1, 2, 4, 4, 5, 0);

-- --------------------------------------------------------

--
-- Tabellenstruktur für Tabelle `favoriten`
--

CREATE TABLE IF NOT EXISTS `favoriten` (
  `id` int(11) NOT NULL,
  `isbn` int(11) NOT NULL,
  `user_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Tabellenstruktur für Tabelle `genres`
--

CREATE TABLE IF NOT EXISTS `genres` (
  `id` int(11) NOT NULL,
  `name` varchar(128) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=7 DEFAULT CHARSET=latin1;

--
-- Daten für Tabelle `genres`
--

INSERT INTO `genres` (`id`, `name`) VALUES
(1, 'Horro'),
(2, 'Psycho'),
(3, 'Krimi'),
(4, 'Doku'),
(5, 'Komoedie'),
(6, 'Romanze');

--
-- Indizes der exportierten Tabellen
--

--
-- Indizes für die Tabelle `benutzer`
--
ALTER TABLE `benutzer`
  ADD PRIMARY KEY (`id`);

--
-- Indizes für die Tabelle `bucharten`
--
ALTER TABLE `bucharten`
  ADD PRIMARY KEY (`id`);

--
-- Indizes für die Tabelle `buecher`
--
ALTER TABLE `buecher`
  ADD PRIMARY KEY (`isbn`);

--
-- Indizes für die Tabelle `favoriten`
--
ALTER TABLE `favoriten`
  ADD PRIMARY KEY (`id`);

--
-- Indizes für die Tabelle `genres`
--
ALTER TABLE `genres`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT für exportierte Tabellen
--

--
-- AUTO_INCREMENT für Tabelle `benutzer`
--
ALTER TABLE `benutzer`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=4;
--
-- AUTO_INCREMENT für Tabelle `bucharten`
--
ALTER TABLE `bucharten`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=7;
--
-- AUTO_INCREMENT für Tabelle `buecher`
--
ALTER TABLE `buecher`
  MODIFY `isbn` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT für Tabelle `favoriten`
--
ALTER TABLE `favoriten`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT für Tabelle `genres`
--
ALTER TABLE `genres`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=7;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
