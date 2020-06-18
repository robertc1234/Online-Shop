-- phpMyAdmin SQL Dump
-- version 4.9.1
-- https://www.phpmyadmin.net/
--
-- Gazdă: 127.0.0.1
-- Timp de generare: iun. 18, 2020 la 12:25 PM
-- Versiune server: 10.4.8-MariaDB
-- Versiune PHP: 7.3.10

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Bază de date: `proiect bd`
--

-- --------------------------------------------------------

--
-- Structură tabel pentru tabel `angajati`
--

CREATE TABLE `angajati` (
  `ID_angajat` int(100) NOT NULL,
  `Nume` varchar(50) NOT NULL,
  `Prenume` varchar(50) NOT NULL,
  `CNP` char(13) NOT NULL,
  `SEX` char(1) NOT NULL,
  `Data_nasterii` date NOT NULL,
  `Strada` varchar(50) NOT NULL,
  `Nr` varchar(10) NOT NULL,
  `Oras` varchar(50) NOT NULL,
  `Judet` varchar(50) NOT NULL,
  `User` varchar(50) NOT NULL,
  `Parola` varchar(50) NOT NULL,
  `Nr_telefon` char(10) NOT NULL,
  `Email` varchar(25) NOT NULL,
  `Functie` char(1) NOT NULL,
  `ID_Departament` int(4) NOT NULL,
  `ID_masina` int(4) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Structură tabel pentru tabel `clienti`
--

CREATE TABLE `clienti` (
  `ID_client` int(100) NOT NULL,
  `Nume` varchar(50) NOT NULL,
  `Prenume` varchar(50) NOT NULL,
  `CNP` char(13) DEFAULT NULL,
  `Nr_telefon` char(10) NOT NULL,
  `email` varchar(50) NOT NULL,
  `Strada` varchar(50) NOT NULL,
  `Nr` varchar(20) NOT NULL,
  `Oras` varchar(50) NOT NULL,
  `Judet` varchar(50) NOT NULL,
  `User` varchar(50) NOT NULL,
  `Parola` varchar(50) NOT NULL,
  `SEX` char(1) NOT NULL,
  `Data_nastere` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Structură tabel pentru tabel `clienti_produse`
--

CREATE TABLE `clienti_produse` (
  `Cod_comanda` int(4) NOT NULL,
  `ID_client` int(4) NOT NULL,
  `ID_produs` int(4) NOT NULL,
  `ID_angajat` int(4) DEFAULT NULL,
  `Data_comenzii` date NOT NULL,
  `Status` varchar(15) NOT NULL DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Structură tabel pentru tabel `departamente`
--

CREATE TABLE `departamente` (
  `Nume` varchar(50) NOT NULL,
  `Cod` varchar(20) NOT NULL,
  `ID_departament` int(100) NOT NULL,
  `ID_Manager` int(100) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Structură tabel pentru tabel `masini_livrare`
--

CREATE TABLE `masini_livrare` (
  `Marca_masina` varchar(20) NOT NULL,
  `Nr_inmatriculare` varchar(15) NOT NULL,
  `ID_masina` int(4) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Structură tabel pentru tabel `produse`
--

CREATE TABLE `produse` (
  `ID_produs` int(4) NOT NULL,
  `Producator` varchar(50) NOT NULL,
  `Model` varchar(50) NOT NULL,
  `ID_spec` int(100) NOT NULL,
  `Pret` varchar(10) NOT NULL,
  `Imagine_produs` varchar(100) DEFAULT NULL,
  `Stoc` varchar(5) NOT NULL DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Structură tabel pentru tabel `specificatii tehnice`
--

CREATE TABLE `specificatii tehnice` (
  `ID_specificatii` int(4) NOT NULL,
  `Procesor` varchar(50) NOT NULL,
  `RAM` varchar(10) NOT NULL,
  `Cap_stocare` varchar(10) NOT NULL,
  `Tip_stocare` varchar(10) NOT NULL,
  `Placa_video` varchar(20) NOT NULL,
  `Software` varchar(20) NOT NULL,
  `Memorie_video` varchar(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Indexuri pentru tabele eliminate
--

--
-- Indexuri pentru tabele `angajati`
--
ALTER TABLE `angajati`
  ADD PRIMARY KEY (`ID_angajat`),
  ADD UNIQUE KEY `CNP` (`CNP`),
  ADD UNIQUE KEY `User` (`User`),
  ADD UNIQUE KEY `Email` (`Email`),
  ADD KEY `ID_Departament` (`ID_Departament`),
  ADD KEY `ID_masina` (`ID_masina`);

--
-- Indexuri pentru tabele `clienti`
--
ALTER TABLE `clienti`
  ADD PRIMARY KEY (`ID_client`),
  ADD UNIQUE KEY `email` (`email`),
  ADD UNIQUE KEY `User` (`User`),
  ADD UNIQUE KEY `CNP` (`CNP`);

--
-- Indexuri pentru tabele `clienti_produse`
--
ALTER TABLE `clienti_produse`
  ADD PRIMARY KEY (`Cod_comanda`),
  ADD KEY `ID_angajat` (`ID_angajat`),
  ADD KEY `ID_client` (`ID_client`),
  ADD KEY `ID_produs` (`ID_produs`);

--
-- Indexuri pentru tabele `departamente`
--
ALTER TABLE `departamente`
  ADD PRIMARY KEY (`ID_departament`);

--
-- Indexuri pentru tabele `masini_livrare`
--
ALTER TABLE `masini_livrare`
  ADD PRIMARY KEY (`ID_masina`),
  ADD UNIQUE KEY `Nr_inmatriculare` (`Nr_inmatriculare`);

--
-- Indexuri pentru tabele `produse`
--
ALTER TABLE `produse`
  ADD PRIMARY KEY (`ID_produs`),
  ADD KEY `ID_spec` (`ID_spec`);

--
-- Indexuri pentru tabele `specificatii tehnice`
--
ALTER TABLE `specificatii tehnice`
  ADD PRIMARY KEY (`ID_specificatii`);

--
-- AUTO_INCREMENT pentru tabele eliminate
--

--
-- AUTO_INCREMENT pentru tabele `angajati`
--
ALTER TABLE `angajati`
  MODIFY `ID_angajat` int(100) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT pentru tabele `clienti`
--
ALTER TABLE `clienti`
  MODIFY `ID_client` int(100) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT pentru tabele `clienti_produse`
--
ALTER TABLE `clienti_produse`
  MODIFY `Cod_comanda` int(4) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT pentru tabele `departamente`
--
ALTER TABLE `departamente`
  MODIFY `ID_departament` int(100) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT pentru tabele `masini_livrare`
--
ALTER TABLE `masini_livrare`
  MODIFY `ID_masina` int(4) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT pentru tabele `produse`
--
ALTER TABLE `produse`
  MODIFY `ID_produs` int(4) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT pentru tabele `specificatii tehnice`
--
ALTER TABLE `specificatii tehnice`
  MODIFY `ID_specificatii` int(4) NOT NULL AUTO_INCREMENT;

--
-- Constrângeri pentru tabele eliminate
--

--
-- Constrângeri pentru tabele `angajati`
--
ALTER TABLE `angajati`
  ADD CONSTRAINT `angajati_ibfk_1` FOREIGN KEY (`ID_Departament`) REFERENCES `departamente` (`ID_departament`),
  ADD CONSTRAINT `angajati_ibfk_2` FOREIGN KEY (`ID_masina`) REFERENCES `masini_livrare` (`ID_masina`);

--
-- Constrângeri pentru tabele `clienti_produse`
--
ALTER TABLE `clienti_produse`
  ADD CONSTRAINT `clienti_produse_ibfk_1` FOREIGN KEY (`ID_angajat`) REFERENCES `angajati` (`ID_angajat`),
  ADD CONSTRAINT `clienti_produse_ibfk_2` FOREIGN KEY (`ID_client`) REFERENCES `clienti` (`ID_client`),
  ADD CONSTRAINT `clienti_produse_ibfk_3` FOREIGN KEY (`ID_produs`) REFERENCES `produse` (`ID_produs`);

--
-- Constrângeri pentru tabele `produse`
--
ALTER TABLE `produse`
  ADD CONSTRAINT `produse_ibfk_1` FOREIGN KEY (`ID_spec`) REFERENCES `specificatii tehnice` (`ID_specificatii`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
