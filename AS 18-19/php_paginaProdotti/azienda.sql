-- phpMyAdmin SQL Dump
-- version 4.7.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Creato il: Mar 16, 2020 alle 12:26
-- Versione del server: 5.7.17
-- Versione PHP: 5.6.30

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `aziendapapasettembrese`
--

-- --------------------------------------------------------

--
-- Struttura della tabella `articoli`
--

CREATE TABLE `articoli` (
  `idArt` bigint(20) NOT NULL,
  `Descrizione` varchar(250) NOT NULL,
  `Prezzo` int(11) NOT NULL,
  `Foto` varchar(100) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dump dei dati per la tabella `articoli`
--

INSERT INTO `articoli` (`idArt`, `Descrizione`, `Prezzo`, `Foto`) VALUES
(1, 'Televisore 4k 60hz', 999, 'tv4k'),
(2, 'Cassa audio blu', 50, 'cassaaudioblu'),
(3, 'Microfono Samson Meteor', 50, 'samsonmeteor'),
(4, 'Surface Pro X', 799, 'surfaceprox'),
(5, 'Surface Buds ', 199, 'surfacebuds');

-- --------------------------------------------------------

--
-- Struttura della tabella `dettagliordini`
--

CREATE TABLE `dettagliordini` (
  `numOrdine` bigint(20) NOT NULL,
  `idArt` bigint(20) NOT NULL,
  `quantita` int(5) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Struttura della tabella `ordine`
--

CREATE TABLE `ordine` (
  `numOrdine` bigint(20) NOT NULL,
  `DataOrdine` date DEFAULT NULL,
  `DataEvasione` date DEFAULT NULL,
  `idUtente` bigint(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Struttura della tabella `utenti`
--

CREATE TABLE `utenti` (
  `id` bigint(20) NOT NULL,
  `username` varchar(50) NOT NULL,
  `mail` varchar(50) NOT NULL,
  `password` varchar(12) NOT NULL,
  `telefono` varchar(12) NOT NULL,
  `sesso` varchar(10) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dump dei dati per la tabella `utenti`
--

INSERT INTO `utenti` (`id`, `username`, `mail`, `password`, `telefono`, `sesso`) VALUES
(29, 'asdfasdg', 'dasfdasfdas@dasfasdf.com', 'dfasdgasdgad', '6654646', 'Altro'),
(28, 'sdgfdsfg', 'martolini@mail.com', 'dgfsdhfs', '654654646754', 'Donna'),
(27, 'ciaone', 'test@test.test', 'test', '1234567', 'Uomo'),
(30, 'Giuseppino', 'giuseppe@gmail.com', 'asdasdasd', '535136413466', 'on'),
(32, 'giorgino', 'piergiorgio@gmail.com', 'vongola', '', 'on');

--
-- Indici per le tabelle scaricate
--

--
-- Indici per le tabelle `articoli`
--
ALTER TABLE `articoli`
  ADD PRIMARY KEY (`idArt`);

--
-- Indici per le tabelle `dettagliordini`
--
ALTER TABLE `dettagliordini`
  ADD PRIMARY KEY (`numOrdine`);

--
-- Indici per le tabelle `ordine`
--
ALTER TABLE `ordine`
  ADD PRIMARY KEY (`numOrdine`);

--
-- Indici per le tabelle `utenti`
--
ALTER TABLE `utenti`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT per le tabelle scaricate
--

--
-- AUTO_INCREMENT per la tabella `articoli`
--
ALTER TABLE `articoli`
  MODIFY `idArt` bigint(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;
--
-- AUTO_INCREMENT per la tabella `ordine`
--
ALTER TABLE `ordine`
  MODIFY `numOrdine` bigint(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=19;
--
-- AUTO_INCREMENT per la tabella `utenti`
--
ALTER TABLE `utenti`
  MODIFY `id` bigint(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=33;COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
