-- phpMyAdmin SQL Dump
-- version 4.7.4
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Gegenereerd op: 04 nov 2017 om 15:05
-- Serverversie: 10.1.26-MariaDB
-- PHP-versie: 7.1.9

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `mydb`
--

-- --------------------------------------------------------

--
-- Tabelstructuur voor tabel `bestelling`
--

CREATE TABLE `bestelling` (
  `idbestelling` int(11) NOT NULL,
  `besteldatum` date NOT NULL,
  `status` varchar(20) NOT NULL,
  `gebruiker_idgebruiker` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Gegevens worden geëxporteerd voor tabel `bestelling`
--

INSERT INTO `bestelling` (`idbestelling`, `besteldatum`, `status`, `gebruiker_idgebruiker`) VALUES
(1, '2017-11-03', 'Gereed', 0);

-- --------------------------------------------------------

--
-- Tabelstructuur voor tabel `betaling`
--

CREATE TABLE `betaling` (
  `idbetaling` int(11) NOT NULL,
  `status` bit(1) NOT NULL,
  `bestelling_idbestelling` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Tabelstructuur voor tabel `catogorie`
--

CREATE TABLE `catogorie` (
  `idcategorie` int(11) NOT NULL,
  `naam` varchar(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Gegevens worden geëxporteerd voor tabel `catogorie`
--

INSERT INTO `catogorie` (`idcategorie`, `naam`) VALUES
(1, 'Testproducten');

-- --------------------------------------------------------

--
-- Tabelstructuur voor tabel `gebruiker`
--

CREATE TABLE `gebruiker` (
  `idgebruiker` int(11) NOT NULL,
  `naam` varchar(20) NOT NULL,
  `tussenvoegsel` varchar(20) DEFAULT NULL,
  `achternaam` varchar(20) NOT NULL,
  `emailadres` varchar(320) NOT NULL,
  `wachtwoord` varchar(45) NOT NULL,
  `postcode` varchar(6) NOT NULL,
  `woonplaats` varchar(50) NOT NULL,
  `straat` varchar(40) NOT NULL,
  `straatnummer` decimal(10,0) NOT NULL,
  `toevoegsel` text,
  `admin` tinyint(1) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Gegevens worden geëxporteerd voor tabel `gebruiker`
--

INSERT INTO `gebruiker` (`idgebruiker`, `naam`, `tussenvoegsel`, `achternaam`, `emailadres`, `wachtwoord`, `postcode`, `woonplaats`, `straat`, `straatnummer`, `toevoegsel`, `admin`) VALUES
(0, 'Erik ', NULL, 'Smith', 'erik@smithcomputerdiensten.nl', 'test', '9628TA', 'Siddeburen', 'Oostwoldjerweg', '7', NULL, 1);

-- --------------------------------------------------------

--
-- Tabelstructuur voor tabel `producten`
--

CREATE TABLE `producten` (
  `idproducten` int(11) NOT NULL,
  `naam` varchar(50) NOT NULL,
  `afbeelding` varchar(30) DEFAULT NULL,
  `omschrijving` text,
  `specificaties` text,
  `prijs` decimal(10,0) NOT NULL,
  `hoeveelheid` decimal(10,0) DEFAULT NULL,
  `catogorie_idcatogorie` int(11) NOT NULL,
  `bestelling_idbestelling` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Gegevens worden geëxporteerd voor tabel `producten`
--

INSERT INTO `producten` (`idproducten`, `naam`, `afbeelding`, `omschrijving`, `specificaties`, `prijs`, `hoeveelheid`, `catogorie_idcatogorie`, `bestelling_idbestelling`) VALUES
(1, 'Testproduct', '1', 'Testomschrijving', 'Testspecificatie', '20', '20', 1, 1),
(2, 'Testproduct', '2', 'Testomschrijving', 'Testspecificatie', '50', '0', 1, 1);

--
-- Indexen voor geëxporteerde tabellen
--

--
-- Indexen voor tabel `bestelling`
--
ALTER TABLE `bestelling`
  ADD PRIMARY KEY (`idbestelling`),
  ADD KEY `fk_bestelling_gebruiker1_idx` (`gebruiker_idgebruiker`);

--
-- Indexen voor tabel `betaling`
--
ALTER TABLE `betaling`
  ADD PRIMARY KEY (`idbetaling`,`bestelling_idbestelling`),
  ADD KEY `fk_betaling_bestelling1_idx` (`bestelling_idbestelling`);

--
-- Indexen voor tabel `catogorie`
--
ALTER TABLE `catogorie`
  ADD PRIMARY KEY (`idcategorie`);

--
-- Indexen voor tabel `gebruiker`
--
ALTER TABLE `gebruiker`
  ADD PRIMARY KEY (`idgebruiker`);

--
-- Indexen voor tabel `producten`
--
ALTER TABLE `producten`
  ADD PRIMARY KEY (`idproducten`),
  ADD KEY `fk_producten_catogorie_idx` (`catogorie_idcatogorie`),
  ADD KEY `fk_producten_bestelling1_idx` (`bestelling_idbestelling`);

--
-- Beperkingen voor geëxporteerde tabellen
--

--
-- Beperkingen voor tabel `bestelling`
--
ALTER TABLE `bestelling`
  ADD CONSTRAINT `fk_bestelling_gebruiker1` FOREIGN KEY (`gebruiker_idgebruiker`) REFERENCES `gebruiker` (`idgebruiker`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Beperkingen voor tabel `betaling`
--
ALTER TABLE `betaling`
  ADD CONSTRAINT `fk_betaling_bestelling1` FOREIGN KEY (`bestelling_idbestelling`) REFERENCES `bestelling` (`idbestelling`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Beperkingen voor tabel `producten`
--
ALTER TABLE `producten`
  ADD CONSTRAINT `fk_producten_bestelling1` FOREIGN KEY (`bestelling_idbestelling`) REFERENCES `bestelling` (`idbestelling`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `fk_producten_catogorie` FOREIGN KEY (`catogorie_idcatogorie`) REFERENCES `catogorie` (`idcategorie`) ON DELETE NO ACTION ON UPDATE NO ACTION;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
