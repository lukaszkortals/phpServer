-- phpMyAdmin SQL Dump
-- version 4.7.4
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Czas generowania: 09 Gru 2017, 09:41
-- Wersja serwera: 10.1.28-MariaDB
-- Wersja PHP: 7.1.10

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Baza danych: `master`
--
CREATE DATABASE IF NOT EXISTS `master` DEFAULT CHARACTER SET latin1 COLLATE latin1_swedish_ci;
USE `master`;

-- --------------------------------------------------------

--
-- Struktura tabeli dla tabeli `bazy`
--

CREATE TABLE `bazy` (
  `id` int(11) NOT NULL,
  `name` text CHARACTER SET utf8 COLLATE utf8_polish_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Zrzut danych tabeli `bazy`
--

INSERT INTO `bazy` (`id`, `name`) VALUES
(1, 'test'),
(2, 'test2');

-- --------------------------------------------------------

--
-- Struktura tabeli dla tabeli `uzytkownicy`
--

CREATE TABLE `uzytkownicy` (
  `id` int(11) NOT NULL,
  `user` text NOT NULL,
  `pass` text NOT NULL,
  `email` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Zrzut danych tabeli `uzytkownicy`
--

INSERT INTO `uzytkownicy` (`id`, `user`, `pass`, `email`) VALUES
(1, 'lxx', '$2y$10$CFKA307.1yjm5sRFq69bPOY2KZb3uIgdfF8kTIgJCIXJpHkXrmroy', 'lx@lx.pl');

-- --------------------------------------------------------

--
-- Struktura tabeli dla tabeli `wlasciciele`
--

CREATE TABLE `wlasciciele` (
  `userid` int(11) NOT NULL,
  `bazaid` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Zrzut danych tabeli `wlasciciele`
--

INSERT INTO `wlasciciele` (`userid`, `bazaid`) VALUES
(1, 1),
(1, 2);

--
-- Indeksy dla zrzutów tabel
--

--
-- Indexes for table `bazy`
--
ALTER TABLE `bazy`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `uzytkownicy`
--
ALTER TABLE `uzytkownicy`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT dla tabeli `bazy`
--
ALTER TABLE `bazy`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT dla tabeli `uzytkownicy`
--
ALTER TABLE `uzytkownicy`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
--
-- Baza danych: `test`
--
CREATE DATABASE IF NOT EXISTS `test` DEFAULT CHARACTER SET latin1 COLLATE latin1_swedish_ci;
USE `test`;

-- --------------------------------------------------------

--
-- Struktura tabeli dla tabeli `test_ba1`
--

CREATE TABLE `test_ba1` (
  `id` int(11) NOT NULL,
  `dsffds` int(11) NOT NULL,
  `dasd` int(11) NOT NULL,
  `addda` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Struktura tabeli dla tabeli `test_ba2`
--

CREATE TABLE `test_ba2` (
  `id` int(11) NOT NULL,
  `ituierow` int(11) NOT NULL,
  `fdhfdh` int(11) NOT NULL,
  `hgbvcx` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Indeksy dla zrzutów tabel
--

--
-- Indexes for table `test_ba1`
--
ALTER TABLE `test_ba1`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `test_ba2`
--
ALTER TABLE `test_ba2`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT dla tabeli `test_ba1`
--
ALTER TABLE `test_ba1`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT dla tabeli `test_ba2`
--
ALTER TABLE `test_ba2`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
--
-- Baza danych: `test2`
--
CREATE DATABASE IF NOT EXISTS `test2` DEFAULT CHARACTER SET latin1 COLLATE latin1_swedish_ci;
USE `test2`;

-- --------------------------------------------------------

--
-- Struktura tabeli dla tabeli `taberrr1`
--

CREATE TABLE `taberrr1` (
  `id` int(11) NOT NULL,
  `t4rt` int(11) NOT NULL,
  `nvcnv` int(11) NOT NULL,
  `cvnx` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Struktura tabeli dla tabeli `tabrestr`
--

CREATE TABLE `tabrestr` (
  `id` int(11) NOT NULL,
  `blabla` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Indeksy dla zrzutów tabel
--

--
-- Indexes for table `taberrr1`
--
ALTER TABLE `taberrr1`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tabrestr`
--
ALTER TABLE `tabrestr`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT dla tabeli `taberrr1`
--
ALTER TABLE `taberrr1`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT dla tabeli `tabrestr`
--
ALTER TABLE `tabrestr`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
