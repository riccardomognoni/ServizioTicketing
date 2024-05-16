-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Creato il: Mag 09, 2024 alle 22:32
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

CREATE TABLE `customers` (
  `ID` int(11) NOT NULL,
  `nome` varchar(32) NOT NULL,
  `cognome` varchar(32) NOT NULL,
  `username` varchar(32) NOT NULL,
  `password` varchar(64) NOT NULL,
  `email` varchar(64) NOT NULL,
  `idCode` varchar(8) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

--
-- Dump dei dati per la tabella `customers`
--

INSERT INTO `customers` (`ID`, `nome`, `cognome`, `username`, `password`, `email`, `idCode`) VALUES
(2, '', '', 'tizio', 'b133a0c0e9bee3be20163d2ad31d6248db292aa6dcb1ee087a2aa50e0fc75ae2', 'sempronio@ciao.sbuci', NULL),
(7, 'Asd', 'Asd', 'asd_', '688787d8ff144c502c7f5cffaafe2cc588d86079f9de88304c26b0cb99ce91c6', 'non_la_mia_mail@mgail.com', 'S0000001');

-- --------------------------------------------------------

--
-- Struttura della tabella `employees`
--

CREATE TABLE `employees` (
  `ID` int(11) NOT NULL,
  `nome` varchar(32) DEFAULT NULL,
  `cognome` varchar(32) DEFAULT NULL,
  `username` varchar(32) NOT NULL,
  `password` varchar(64) NOT NULL,
  `email` varchar(64) NOT NULL,
  `phoneNumber` varchar(20) DEFAULT NULL,
  `role` varchar(32) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

--
-- Dump dei dati per la tabella `employees`
--

INSERT INTO `employees` (`ID`, `nome`, `cognome`, `username`, `password`, `email`, `phoneNumber`, `role`) VALUES
(1, NULL, NULL, 'admin', '8c6976e5b5410415bde908bd4dee15dfb167a9c873fc4bb8a81f6f2ab448a918', 'test@gmail.com', NULL, 'admin'),
(2, 'Sss', 'Sss', 'sss', 'a871c47a7f48a12b38a994e48a9659fab5d6376f3dbce37559bcb617efe8662d', 'sdf@sdf.sdf', NULL, 'admin');

-- --------------------------------------------------------

--
-- Struttura della tabella `tickets`
--

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
  `assignedFrom` varchar(32) DEFAULT NULL,
  `attached` varchar(128) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

-- --------------------------------------------------------

--
-- Struttura della tabella `ticket_area`
--

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
  ADD PRIMARY KEY (`ID`),
  ADD UNIQUE KEY `email` (`email`),
  ADD UNIQUE KEY `username` (`username`);

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
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT per la tabella `employees`
--
ALTER TABLE `employees`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

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
