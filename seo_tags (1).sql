-- phpMyAdmin SQL Dump
-- version 5.0.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Czas generowania: 09 Lut 2020, 18:26
-- Wersja serwera: 10.4.11-MariaDB
-- Wersja PHP: 7.4.1

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Baza danych: `seo_tags`
--

-- --------------------------------------------------------

--
-- Struktura tabeli dla tabeli `promostop`
--

CREATE TABLE `promostop` (
  `id` int(11) NOT NULL,
  `default` tinyint(1) NOT NULL,
  `start_at` date NOT NULL,
  `end_at` date NOT NULL,
  `description` text CHARACTER SET utf8 COLLATE utf8_polish_ci NOT NULL,
  `link` varchar(255) CHARACTER SET utf8 COLLATE utf8_polish_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Zrzut danych tabeli `promostop`
--

INSERT INTO `promostop` (`default`, `start_at`, `end_at`, `description`, `link`) VALUES
(0, '', '', '', '');


-- --------------------------------------------------------

--
-- Struktura tabeli dla tabeli `seotags`
--

CREATE TABLE `seotags` (
  `id` int(11) NOT NULL,
  `parameters` varchar(255) COLLATE utf8_polish_ci NOT NULL,
  `head_title` varchar(255) COLLATE utf8_polish_ci NOT NULL,
  `head_description` varchar(255) COLLATE utf8_polish_ci NOT NULL,
  `set_canonical` tinyint(1) NOT NULL,
  `body_h1` varchar(255) COLLATE utf8_polish_ci NOT NULL,
  `body_description` text COLLATE utf8_polish_ci NOT NULL,
  `custom_url` varchar(255) CHARACTER SET utf16 COLLATE utf16_polish_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_polish_ci;

--
-- Zrzut danych tabeli `seotags`
--

INSERT INTO `seotags` (`parameters`, `head_title`, `head_description`, `set_canonical`, `body_h1`, `body_description`, `custom_url`) VALUES
('', '', '', 0, '', '', '');

--
-- Indeksy dla zrzutów tabel
--

--
-- Indeksy dla tabeli `promostop`
--
ALTER TABLE `promostop`
  ADD PRIMARY KEY (`id`);

--
-- Indeksy dla tabeli `seotags`
--
ALTER TABLE `seotags`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `parameters` (`parameters`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT dla tabeli `promostop`
--
ALTER TABLE `promostop`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT dla tabeli `seotags`
--
ALTER TABLE `seotags`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
