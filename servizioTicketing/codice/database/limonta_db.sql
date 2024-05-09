-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Creato il: Mag 07, 2024 alle 12:52
-- Versione del server: 10.4.32-MariaDB
-- Versione PHP: 8.2.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `limonta_db`
--

-- --------------------------------------------------------

--
-- Struttura della tabella `customers`
--
DROP TABLE IF EXISTS `customers`;
CREATE TABLE `customers` (
  `ID` int(11) NOT NULL,
  `nome` varchar(32) NOT NULL,
  `cognome` varchar(32) NOT NULL,
  `username` varchar(32) NOT NULL,
  `password` varchar(32) NOT NULL,
  `email` varchar(64) NOT NULL,
  `idCode` varchar(8) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

--
-- Dump dei dati per la tabella `customers`
--

INSERT INTO `customers` (`ID`, `nome`, `cognome`, `username`, `password`, `email`, `idCode`) VALUES
(2, '', '', 'tizio', 'caio', 'sempronio@ciao.sbuci', NULL),
(7, 'Asd', 'Asd', 'asd_', '7815696ecbf1c96e6894b779456d330e', 'brandovardipietro@gmail.com', 'S0000001');

-- --------------------------------------------------------

--
-- Struttura della tabella `employees`
--
DROP TABLE IF EXISTS `employees`;
CREATE TABLE `employees` (
  `ID` int(11) NOT NULL,
  `nome` varchar(32) DEFAULT NULL,
  `cognome` varchar(32) DEFAULT NULL,
  `username` varchar(32) NOT NULL,
  `password` varchar(32) NOT NULL,
  `email` varchar(64) NOT NULL,
  `phoneNumber` varchar(20) DEFAULT NULL,
  `role` varchar(32) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

--
-- Dump dei dati per la tabella `employees`
--

INSERT INTO `employees` (`ID`, `nome`, `cognome`, `username`, `password`, `email`, `phoneNumber`, `role`) VALUES
(1, NULL, NULL, 'admin', '21232f297a57a5a743894a0e4a801fc3', 'test@gmail.com', NULL, 'admin');

-- --------------------------------------------------------

--
-- Struttura della tabella `tickets`
--
DROP TABLE IF EXISTS `tickets`;
CREATE TABLE `tickets` (
  `ID` int(11) NOT NULL,
  `possibleAction` varchar(16) NOT NULL,
  `state` int(11) NOT NULL,
  `area` enum('Area PC e reti','AS400','Java','Contabilità','Formatori','Derma','Terzisti','Commerciali') DEFAULT NULL,
  `operator` varchar(32) DEFAULT NULL,
  `description` text NOT NULL,
  `openDate` datetime NOT NULL,
  `effectiveStart` datetime NOT NULL,
  `closeDate` datetime NOT NULL,
  `customerDescription` text NOT NULL,
  `solutionDescription` text NOT NULL,
  `eventualNotes` text DEFAULT NULL,
  `referenceEmail` varchar(64) NOT NULL,
  `assignedTo` varchar(32) DEFAULT NULL,
  `attached` varchar(128) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

-- --------------------------------------------------------

--
-- Struttura della tabella `ticket_area`
--
DROP TABLE IF EXISTS `ticket_area`;
CREATE TABLE `ticket_area` (
  `ID` int(11) NOT NULL,
  `area` varchar(16) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

--
-- Dump dei dati per la tabella `ticket_area`
--

INSERT INTO `ticket_area` (`ID`, `area`) VALUES
(1, 'Area PC e reti'),
(2, 'AS400'),
(3, 'Java'),
(4, 'Contabilità'),
(5, 'Formatori'),
(6, 'Derma'),
(7, 'Terzisti'),
(8, 'Commerciali');

-- --------------------------------------------------------

--
-- Struttura della tabella `ticket_state`
--
DROP TABLE IF EXISTS `ticket_state`;
CREATE TABLE `ticket_state` (
  `ID` int(11) NOT NULL,
  `state` varchar(16) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

--
-- Dump dei dati per la tabella `ticket_state`
--

INSERT INTO `ticket_state` (`ID`, `state`) VALUES
(1, 'Aperto'),
(2, 'Chiuso'),
(3, 'Sospeso'),
(4, 'Annullato');

--
-- Indici per le tabelle scaricate
--

--
-- Indici per le tabelle `customers`
--
ALTER TABLE `customers`
  ADD PRIMARY KEY (`ID`),
  ADD UNIQUE KEY `email` (`email`),
  ADD UNIQUE KEY `idCode` (`idCode`);

--
-- Indici per le tabelle `employees`
--
ALTER TABLE `employees`
  ADD PRIMARY KEY (`ID`);

--
-- Indici per le tabelle `tickets`
--
ALTER TABLE `tickets`
  ADD PRIMARY KEY (`ID`);

--
-- Indici per le tabelle `ticket_area`
--
ALTER TABLE `ticket_area`
  ADD PRIMARY KEY (`ID`);

--
-- Indici per le tabelle `ticket_state`
--
ALTER TABLE `ticket_state`
  ADD PRIMARY KEY (`ID`);

--
-- AUTO_INCREMENT per le tabelle scaricate
--

--
-- AUTO_INCREMENT per la tabella `customers`
--
ALTER TABLE `customers`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT per la tabella `employees`
--
ALTER TABLE `employees`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT per la tabella `tickets`
--
ALTER TABLE `tickets`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT per la tabella `ticket_area`
--
ALTER TABLE `ticket_area`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT per la tabella `ticket_state`
--
ALTER TABLE `ticket_state`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
