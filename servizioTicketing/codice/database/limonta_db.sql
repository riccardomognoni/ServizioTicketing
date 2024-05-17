-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Creato il: Mag 17, 2024 alle 09:35
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
  `password` varchar(64) NOT NULL,
  `email` varchar(64) NOT NULL,
  `idCode` varchar(8) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

--
-- Dump dei dati per la tabella `customers`
--

INSERT INTO `customers` (`ID`, `nome`, `cognome`, `username`, `password`, `email`, `idCode`) VALUES
(2, '', '', 'tizio_', 'b133a0c0e9bee3be20163d2ad31d6248db292aa6dcb1ee087a2aa50e0fc75ae2', 'sempronio@ciao.sbuci', NULL),
(7, 'Asd', 'Asd', 'asd_', '688787d8ff144c502c7f5cffaafe2cc588d86079f9de88304c26b0cb99ce91c6', 'non_la_mia_mail@mgail.com', 'S0000001');

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
(2, 'Sss', 'Sss', 'sss.', 'a871c47a7f48a12b38a994e48a9659fab5d6376f3dbce37559bcb617efe8662d', 'sdf@sdf.sdf', NULL, 'admin');

-- --------------------------------------------------------

--
-- Struttura della tabella `tickets`
--

DROP TABLE IF EXISTS `tickets`;
CREATE TABLE `tickets` (
  `ID` int(11) NOT NULL,
  `id_customer` int(11) NOT NULL,
  `possibleAction` varchar(16) NOT NULL,
  `state` int(11) NOT NULL,
  `area` int(11) DEFAULT NULL,
  `id_operator` int(11) DEFAULT NULL,
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

--
-- Dump dei dati per la tabella `tickets`
--

INSERT INTO `tickets` (`ID`, `id_customer`, `possibleAction`, `state`, `area`, `id_operator`, `description`, `openDate`, `effectiveStart`, `closeDate`, `customerDescription`, `solutionDescription`, `eventualNotes`, `referenceEmail`, `assignedFrom`, `attached`) VALUES
(1, 7, 'Open', 1, 1, 2, 'Network issues reported in building A.', '2024-05-01 08:30:00', '2024-05-01 09:00:00', '2024-05-01 12:00:00', 'Customer reported intermittent connectivity problems.', 'Replaced faulty switch.', NULL, 'customer1@example.com', '2', 'network_issue.jpg'),
(2, 7, 'In Progress', 2, 3, 2, 'Error in the payment processing module.', '2024-05-02 09:00:00', '2024-05-02 10:00:00', '0000-00-00 00:00:00', 'Customer unable to process payments.', 'Identified and fixed a bug in the transaction handling.', NULL, 'customer2@example.com', '1', 'payment_error_log.txt'),
(3, 2, 'Closed', 3, 4, 2, 'Discrepancies in the quarterly financial report.', '2024-05-03 10:00:00', '2024-05-03 11:00:00', '2024-05-03 15:00:00', 'Quarterly report figures do not match.', 'Corrected the data entry errors in the financial system.', 'Reviewed by finance team.', 'customer3@example.com', '2', 'financial_report_issues.pdf'),
(4, 7, 'Open', 1, 2, 2, 'System upgrade required for AS400 server.', '2024-05-04 11:00:00', '2024-05-04 11:30:00', '0000-00-00 00:00:00', 'System performance has degraded.', 'Planning and scheduling upgrade.', NULL, 'customer4@example.com', '2', 'upgrade_plan.docx'),
(5, 2, 'Closed', 3, 6, 2, 'Issue with the Derma software update.', '2024-05-05 12:00:00', '2024-05-05 13:00:00', '2024-05-05 17:00:00', 'Update caused software crash.', 'Rolled back the update and applied a fix.', 'Update re-scheduled.', 'customer5@example.com', '2', 'derma_update_fix.zip');

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
  ADD PRIMARY KEY (`ID`),
  ADD UNIQUE KEY `email` (`email`),
  ADD UNIQUE KEY `username` (`username`);

--
-- Indici per le tabelle `tickets`
--
ALTER TABLE `tickets`
  ADD PRIMARY KEY (`ID`),
  ADD KEY `area` (`area`),
  ADD KEY `id_operator` (`id_operator`),
  ADD KEY `state` (`state`);

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
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

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

--
-- Limiti per le tabelle scaricate
--

--
-- Limiti per la tabella `tickets`
--
ALTER TABLE `tickets`
  ADD CONSTRAINT `tickets_ibfk_1` FOREIGN KEY (`state`) REFERENCES `ticket_state` (`ID`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
