-- phpMyAdmin SQL Dump
-- version 4.8.2
-- https://www.phpmyadmin.net/
--
-- Gép: 127.0.0.1
-- Létrehozás ideje: 2021. Nov 19. 14:00
-- Kiszolgáló verziója: 10.1.34-MariaDB
-- PHP verzió: 7.2.8

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Adatbázis: `rajzfilmek`
--

-- --------------------------------------------------------

--
-- Tábla szerkezet ehhez a táblához `rajzfilmek`
--

CREATE TABLE `rajzfilmek` (
  `id` int(11) NOT NULL,
  `cim` varchar(1000) COLLATE utf8mb4_hungarian_ci NOT NULL,
  `hossz` int(11) NOT NULL,
  `kiadasi_ev` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_hungarian_ci;

--
-- A tábla adatainak kiíratása `rajzfilmek`
--

INSERT INTO `rajzfilmek` (`id`, `cim`, `hossz`, `kiadasi_ev`) VALUES
(1, 'Lion king', 92, 1991),
(2, 'Shrek', 115, 2001),
(3, 'Aladdin', 92, 1991),
(4, 'Harry Potter and the Philosophers\' stone', 120, 2001),
(5, 'Wonderwoman', 136, 2018);

--
-- Indexek a kiírt táblákhoz
--

--
-- A tábla indexei `rajzfilmek`
--
ALTER TABLE `rajzfilmek`
  ADD PRIMARY KEY (`id`);

--
-- A kiírt táblák AUTO_INCREMENT értéke
--

--
-- AUTO_INCREMENT a táblához `rajzfilmek`
--
ALTER TABLE `rajzfilmek`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
