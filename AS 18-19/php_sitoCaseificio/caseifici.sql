-- phpMyAdmin SQL Dump
-- version 4.7.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Creato il: Mag 25, 2020 alle 15:25
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
-- Database: `caseificipapasettembrese`
--

-- --------------------------------------------------------

--
-- Struttura della tabella `caseificio`
--

CREATE TABLE `caseificio` (
  `id_caseificio` int(11) NOT NULL,
  `nome` varchar(255) NOT NULL,
  `indirizzo` varchar(255) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dump dei dati per la tabella `caseificio`
--

INSERT INTO `caseificio` (`id_caseificio`, `nome`, `indirizzo`) VALUES
(1111, 'Biancolatte', 'Via mucca 72 Trento'),
(2222, 'Gottardo', 'Via caprette 12 Scelbiville'),
(3333, 'Pezzana', 'Via fontina 1 Termoli'),
(4444, 'Sabbionara', 'via lattosio 5 Topazia');

-- --------------------------------------------------------

--
-- Struttura della tabella `immagine`
--

CREATE TABLE `immagine` (
  `id_immagine` int(11) NOT NULL,
  `id_caseificio` int(11) NOT NULL,
  `descrizione` varchar(255) NOT NULL,
  `url` varchar(255) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dump dei dati per la tabella `immagine`
--

INSERT INTO `immagine` (`id_immagine`, `id_caseificio`, `descrizione`, `url`) VALUES
(1, 1111, 'Caseificio Bianco Latte (Fuori)', '1111_1'),
(2, 1111, 'Caseificio Biancolatte al lavoro', '1111_2'),
(3, 1111, 'Caseificio Biancolatte (negozio)', '1111_3'),
(4, 1111, 'Caseificio Biancolatte mozzarelle', '1111_4'),
(1, 2222, 'Caseificio Gottardo (fuori)', '2222_1'),
(2, 2222, 'Caseificio Gottardo (negozio)', '2222_2'),
(3, 2222, 'Caseificio Gottardo (magazzino)', '2222_3'),
(4, 2222, 'Caseificio Gottardo (specialiata)', '2222_4'),
(1, 3333, 'Caseificio Pezzana (fuori)', '3333_1'),
(2, 3333, 'Caseificio Pezzana (mozzarelle)', '3333_2'),
(3, 3333, 'Caseificio Pezzana (magazzino)', '3333_3'),
(4, 3333, 'Caseificio Pezzana (lavorazione)', '3333_4'),
(1, 4444, 'Caseificio Sabbionara (fuori)', '4444_1'),
(2, 4444, 'Caseificio Sabbionara (famiglia)', '4444_2'),
(3, 4444, 'Caseificio Sabbionara (caglio)', '4444_3'),
(4, 4444, 'Caseificio Sabbioanra (fiera)', '4444_4');

--
-- Indici per le tabelle scaricate
--

--
-- Indici per le tabelle `caseificio`
--
ALTER TABLE `caseificio`
  ADD PRIMARY KEY (`id_caseificio`);

--
-- Indici per le tabelle `immagine`
--
ALTER TABLE `immagine`
  ADD PRIMARY KEY (`id_caseificio`,`id_immagine`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
