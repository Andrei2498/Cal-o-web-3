-- phpMyAdmin SQL Dump
-- version 4.8.5
-- https://www.phpmyadmin.net/
--
-- Gazdă: 127.0.0.1
-- Timp de generare: mai 31, 2019 la 02:55 PM
-- Versiune server: 10.1.38-MariaDB
-- Versiune PHP: 7.3.3

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Bază de date: `test`
--

-- --------------------------------------------------------

--
-- Structură tabel pentru tabel `cantitati`
--

CREATE TABLE `cantitati` (
  `id_reteta` int(11) NOT NULL,
  `id_produs` int(11) NOT NULL,
  `cantitate` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Structură tabel pentru tabel `produse`
--

CREATE TABLE `produse` (
  `id` int(11) NOT NULL,
  `nume` varchar(32) NOT NULL,
  `valoare_calorica` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Eliminarea datelor din tabel `produse`
--

INSERT INTO `produse` (`id`, `nume`, `valoare_calorica`) VALUES
(1, 'Ulei masline', 200),
(2, 'Ulei de masline', 500);

-- --------------------------------------------------------

--
-- Structură tabel pentru tabel `profile`
--

CREATE TABLE `profile` (
  `id` int(11) NOT NULL,
  `firstname` varchar(100) NOT NULL,
  `lastname` varchar(100) NOT NULL,
  `email` varchar(150) NOT NULL,
  `inaltime` int(11) NOT NULL,
  `greutate` int(11) NOT NULL,
  `varsta` int(11) NOT NULL,
  `sex` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Eliminarea datelor din tabel `profile`
--

INSERT INTO `profile` (`id`, `firstname`, `lastname`, `email`, `inaltime`, `greutate`, `varsta`, `sex`) VALUES
(1, 'andre', 'miron', 'andrei.miron@Caloweb.ro', 156, 100, 20, 'masculin');

-- --------------------------------------------------------

--
-- Structură tabel pentru tabel `retete`
--

CREATE TABLE `retete` (
  `id` int(11) NOT NULL,
  `nume` varchar(64) NOT NULL,
  `id_creator` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Structură tabel pentru tabel `testare`
--

CREATE TABLE `testare` (
  `id` int(11) NOT NULL,
  `nume` varchar(30) NOT NULL,
  `nota` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Eliminarea datelor din tabel `testare`
--

INSERT INTO `testare` (`id`, `nume`, `nota`) VALUES
(1, 'Serial', 9);

-- --------------------------------------------------------

--
-- Structură tabel pentru tabel `users`
--

CREATE TABLE `users` (
  `id_persoana` int(11) NOT NULL,
  `username` varchar(32) NOT NULL,
  `password` varchar(32) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Eliminarea datelor din tabel `users`
--

INSERT INTO `users` (`id_persoana`, `username`, `password`) VALUES
(1, 'andrei', 'miron');

--
-- Indexuri pentru tabele eliminate
--

--
-- Indexuri pentru tabele `cantitati`
--
ALTER TABLE `cantitati`
  ADD KEY `fk_idProdus` (`id_produs`),
  ADD KEY `fk_idCreator` (`id_reteta`);

--
-- Indexuri pentru tabele `produse`
--
ALTER TABLE `produse`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `nume_unic` (`nume`);

--
-- Indexuri pentru tabele `profile`
--
ALTER TABLE `profile`
  ADD PRIMARY KEY (`id`);

--
-- Indexuri pentru tabele `retete`
--
ALTER TABLE `retete`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `nme_unic` (`nume`),
  ADD KEY `FK_idCreators` (`id_creator`);

--
-- Indexuri pentru tabele `testare`
--
ALTER TABLE `testare`
  ADD PRIMARY KEY (`id`);

--
-- Indexuri pentru tabele `users`
--
ALTER TABLE `users`
  ADD UNIQUE KEY `username` (`username`),
  ADD KEY `fk_id_pers` (`id_persoana`);

--
-- AUTO_INCREMENT pentru tabele eliminate
--

--
-- AUTO_INCREMENT pentru tabele `produse`
--
ALTER TABLE `produse`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT pentru tabele `profile`
--
ALTER TABLE `profile`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT pentru tabele `retete`
--
ALTER TABLE `retete`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT pentru tabele `testare`
--
ALTER TABLE `testare`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- Constrângeri pentru tabele eliminate
--

--
-- Constrângeri pentru tabele `cantitati`
--
ALTER TABLE `cantitati`
  ADD CONSTRAINT `fk_idCreator` FOREIGN KEY (`id_reteta`) REFERENCES `retete` (`id`),
  ADD CONSTRAINT `fk_idProdus` FOREIGN KEY (`id_produs`) REFERENCES `produse` (`id`);

--
-- Constrângeri pentru tabele `retete`
--
ALTER TABLE `retete`
  ADD CONSTRAINT `FK_idCreators` FOREIGN KEY (`id_creator`) REFERENCES `profile` (`id`);

--
-- Constrângeri pentru tabele `users`
--
ALTER TABLE `users`
  ADD CONSTRAINT `fk_id_pers` FOREIGN KEY (`id_persoana`) REFERENCES `profile` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
