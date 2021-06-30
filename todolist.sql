-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Creato il: Giu 30, 2021 alle 18:56
-- Versione del server: 10.4.17-MariaDB
-- Versione PHP: 8.0.2

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `todolist`
--

-- --------------------------------------------------------

--
-- Struttura della tabella `todo`
--

CREATE TABLE `todo` (
  `ID` int(11) NOT NULL,
  `name` varchar(50) COLLATE utf8_bin NOT NULL,
  `surname` varchar(50) COLLATE utf8_bin NOT NULL,
  `day` varchar(50) COLLATE utf8_bin NOT NULL,
  `activity` varchar(100) COLLATE utf8_bin NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin;

--
-- Dump dei dati per la tabella `todo`
--

INSERT INTO `todo` (`ID`, `name`, `surname`, `day`, `activity`) VALUES
(28, 'giovanni', '', '', 'basket'),
(30, 'marcello rossi', 'de marco rossi', 'thursd', ''),
(38, '', '', 'monday', ''),
(41, 'Marianna ', '', '', ''),
(47, '', '', '', ''),
(48, 'Marianna Natale', 'de marco', 'monday', ''),
(49, 'giovanni', '', '', ''),
(51, 'giovanni', '', '', ''),
(54, 'pasquale', '', '', ''),
(55, 'marcello', '', '', ''),
(57, 'marcello', '', '', ''),
(59, 'marcello ', 'de marco', 'wednesday', 'soccer'),
(60, 'pasquale', '', '', ''),
(62, 'Marcello', 'Rogly', 'Friday', 'Hockey'),
(63, 'giovanni', 'kkkkkkkkkkkkkkkkkkkkkkkkkkkkkkkkkkkkkkkkkkkkkooooo', 'monday', 'basket');

--
-- Indici per le tabelle scaricate
--

--
-- Indici per le tabelle `todo`
--
ALTER TABLE `todo`
  ADD PRIMARY KEY (`ID`);

--
-- AUTO_INCREMENT per le tabelle scaricate
--

--
-- AUTO_INCREMENT per la tabella `todo`
--
ALTER TABLE `todo`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=64;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
