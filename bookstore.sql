-- phpMyAdmin SQL Dump
-- version 4.6.5.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Gegenereerd op: 22 jun 2017 om 13:07
-- Serverversie: 10.1.21-MariaDB
-- PHP-versie: 5.6.30

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `bookstore`
--

-- --------------------------------------------------------

--
-- Tabelstructuur voor tabel `category`
--

CREATE TABLE `category` (
  `category_id` int(11) NOT NULL,
  `category_name` varchar(45) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Gegevens worden geëxporteerd voor tabel `category`
--

INSERT INTO `category` (`category_id`, `category_name`) VALUES
(1, 'Informatica'),
(2, 'Computer');

-- --------------------------------------------------------

--
-- Tabelstructuur voor tabel `klant`
--

CREATE TABLE `klant` (
  `klant_id` int(11) NOT NULL,
  `username` varchar(45) DEFAULT NULL,
  `password` varchar(300) DEFAULT NULL,
  `email` varchar(45) DEFAULT NULL,
  `full_name` varchar(45) DEFAULT NULL,
  `phone_number` int(11) DEFAULT NULL,
  `street` varchar(45) DEFAULT NULL,
  `house_number` varchar(45) DEFAULT NULL,
  `zip_code` varchar(45) DEFAULT NULL,
  `city` varchar(45) DEFAULT NULL,
  `country` varchar(45) DEFAULT NULL,
  `group_id` varchar(45) DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Gegevens worden geëxporteerd voor tabel `klant`
--

INSERT INTO `klant` (`klant_id`, `username`, `password`, `email`, `full_name`, `phone_number`, `street`, `house_number`, `zip_code`, `city`, `country`, `group_id`) VALUES
(1, 'Sami', '601f1889667efaebb33b8c12572835da3f027f78', 'sami@mail.com', 'Sami Sami', 6545353, 'straat', '33', '3245 FL', 'Breda', 'Nederland', '1'),
(2, NULL, '$2y$10$Tjo4O/NsUWriaHsPdcLCVusQy0s582wDaqcklh', 'rcomanne@avans.nl', 'Drekhoertej', 12345678, '500', 'Dylan', '1111aa', NULL, NULL, '0'),
(3, NULL, '$2y$10$hMCehzqt9CnT9WnnzCUJFe3Q8rRBbsTRkEONTEhT8hoVaoAdkroLW', 'ralph@comanne.eu', 'a', 0, 'c', 'b', 'd', NULL, NULL, '0');

-- --------------------------------------------------------

--
-- Tabelstructuur voor tabel `klant_fav`
--

CREATE TABLE `klant_fav` (
  `klant_fav_id` int(11) NOT NULL,
  `klant_id` int(11) NOT NULL,
  `product_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COMMENT='Klant favoriete producten';

-- --------------------------------------------------------

--
-- Tabelstructuur voor tabel `order`
--

CREATE TABLE `order` (
  `order_id` int(11) NOT NULL,
  `order_date` date DEFAULT NULL,
  `quantity` int(11) DEFAULT NULL,
  `amount` float DEFAULT NULL,
  `klant_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Gegevens worden geëxporteerd voor tabel `order`
--

INSERT INTO `order` (`order_id`, `order_date`, `quantity`, `amount`, `klant_id`) VALUES
(23, '2017-06-22', 1, 29.99, 3),
(24, '2017-06-22', 1, 19.99, 3),
(25, '2017-06-22', 1, 19.99, 3);

-- --------------------------------------------------------

--
-- Tabelstructuur voor tabel `product`
--

CREATE TABLE `product` (
  `product_id` int(11) NOT NULL,
  `isbn` int(11) DEFAULT NULL,
  `title` varchar(45) DEFAULT NULL,
  `author` varchar(45) DEFAULT NULL,
  `edition` tinyint(2) DEFAULT NULL,
  `release_date` date DEFAULT NULL,
  `product_img` varchar(45) DEFAULT NULL,
  `stock` int(11) DEFAULT NULL,
  `publisher_id` int(11) NOT NULL,
  `price` float DEFAULT NULL,
  `info` varchar(400) CHARACTER SET latin1 NOT NULL DEFAULT 'Onbekend, neem contact op met de beheerder'
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Gegevens worden geëxporteerd voor tabel `product`
--

INSERT INTO `product` (`product_id`, `isbn`, `title`, `author`, `edition`, `release_date`, `product_img`, `stock`, `publisher_id`, `price`, `info`) VALUES
(111, 134291255, 'PHP', 'Larry Ullman', 5, '2016-01-01', 'layout/img/product1.jpg', 3, 1, 29.99, 'Onbekend, neem contact op met de beheerder'),
(222, 134291255, 'PHP for the Web', 'Larry Ullman', 5, '2016-01-01', 'layout/img/product2.jpg', 3, 1, 19.99, 'Onbekend, neem contact op met de beheerder'),
(333, 134245623, 'PhP: Learn PHP Programming Quick & Easy', 'Troy Dimes', 1, '2016-01-01', 'layout/img/product3.jpg', 3, 1, 19.99, 'Onbekend, neem contact op met de beheerder'),
(444, 132350882, 'Clean Code', 'Robert C. Martin', 1, '2014-01-01', 'layout/img/product4.jpg', 3, 1, 34.99, 'Onbekend, neem contact op met de beheerder'),
(555, 132350882, 'The Clean Coder', 'Robert C. Martin', 1, '2014-01-01', 'layout/img/product5.jpg', 3, 1, 34.99, 'Onbekend, neem contact op met de beheerder'),
(666, 596009208, 'Head First Java', 'Kathy Sierra', 2, '2016-01-01', 'layout/img/product6.jpg', 3, 1, 29.99, 'Onbekend, neem contact op met de beheerder');

-- --------------------------------------------------------

--
-- Tabelstructuur voor tabel `product_has_category`
--

CREATE TABLE `product_has_category` (
  `product_id` int(11) NOT NULL,
  `category_category_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Tabelstructuur voor tabel `product_order`
--

CREATE TABLE `product_order` (
  `product_order_id` int(11) NOT NULL,
  `product_id` int(11) NOT NULL,
  `order_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Gegevens worden geëxporteerd voor tabel `product_order`
--

INSERT INTO `product_order` (`product_order_id`, `product_id`, `order_id`) VALUES
(27, 111, 23),
(28, 222, 24),
(29, 333, 25);

-- --------------------------------------------------------

--
-- Tabelstructuur voor tabel `publisher`
--

CREATE TABLE `publisher` (
  `publisher_id` int(11) NOT NULL,
  `publisher` varchar(45) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Gegevens worden geëxporteerd voor tabel `publisher`
--

INSERT INTO `publisher` (`publisher_id`, `publisher`) VALUES
(1, 'O\' Reilly'),
(2, 'Apress');

-- --------------------------------------------------------

--
-- Tabelstructuur voor tabel `rating`
--

CREATE TABLE `rating` (
  `rating_id` int(11) NOT NULL,
  `rating` tinyint(1) DEFAULT NULL,
  `rating_description` varchar(45) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Tabelstructuur voor tabel `review`
--

CREATE TABLE `review` (
  `review_id` int(11) NOT NULL,
  `review` mediumtext,
  `review_date` date DEFAULT NULL,
  `klant_id` int(11) NOT NULL,
  `product_id` int(11) NOT NULL,
  `product_publisher_id` int(11) NOT NULL,
  `rating_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Indexen voor geëxporteerde tabellen
--

--
-- Indexen voor tabel `category`
--
ALTER TABLE `category`
  ADD PRIMARY KEY (`category_id`);

--
-- Indexen voor tabel `klant`
--
ALTER TABLE `klant`
  ADD PRIMARY KEY (`klant_id`),
  ADD UNIQUE KEY `username_UNIQUE` (`username`);

--
-- Indexen voor tabel `klant_fav`
--
ALTER TABLE `klant_fav`
  ADD PRIMARY KEY (`klant_fav_id`,`klant_id`,`product_id`),
  ADD KEY `fk_klant_fav_klant1_idx` (`klant_id`),
  ADD KEY `fk_klant_fav_product1_idx` (`product_id`);

--
-- Indexen voor tabel `order`
--
ALTER TABLE `order`
  ADD PRIMARY KEY (`order_id`,`klant_id`),
  ADD KEY `fk_bestelling_klant_idx` (`klant_id`);

--
-- Indexen voor tabel `product`
--
ALTER TABLE `product`
  ADD PRIMARY KEY (`product_id`,`publisher_id`),
  ADD KEY `fk_product_uitgever1_idx` (`publisher_id`);

--
-- Indexen voor tabel `product_has_category`
--
ALTER TABLE `product_has_category`
  ADD PRIMARY KEY (`product_id`,`category_category_id`),
  ADD KEY `fk_product_has_category_category1_idx` (`category_category_id`),
  ADD KEY `fk_product_has_category_product1_idx` (`product_id`);

--
-- Indexen voor tabel `product_order`
--
ALTER TABLE `product_order`
  ADD PRIMARY KEY (`product_order_id`,`product_id`,`order_id`),
  ADD KEY `fk_product_bestelling_product1_idx` (`product_id`),
  ADD KEY `fk_product_bestelling_bestelling1_idx` (`order_id`);

--
-- Indexen voor tabel `publisher`
--
ALTER TABLE `publisher`
  ADD PRIMARY KEY (`publisher_id`);

--
-- Indexen voor tabel `rating`
--
ALTER TABLE `rating`
  ADD PRIMARY KEY (`rating_id`);

--
-- Indexen voor tabel `review`
--
ALTER TABLE `review`
  ADD PRIMARY KEY (`review_id`,`klant_id`,`product_id`,`product_publisher_id`,`rating_id`),
  ADD KEY `fk_beoordeling_klant1_idx` (`klant_id`),
  ADD KEY `fk_beoordeling_product1_idx` (`product_id`,`product_publisher_id`),
  ADD KEY `fk_beoordeling_beoordeling_ster1_idx` (`rating_id`);

--
-- AUTO_INCREMENT voor geëxporteerde tabellen
--

--
-- AUTO_INCREMENT voor een tabel `category`
--
ALTER TABLE `category`
  MODIFY `category_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT voor een tabel `klant`
--
ALTER TABLE `klant`
  MODIFY `klant_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
--
-- AUTO_INCREMENT voor een tabel `klant_fav`
--
ALTER TABLE `klant_fav`
  MODIFY `klant_fav_id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT voor een tabel `order`
--
ALTER TABLE `order`
  MODIFY `order_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=26;
--
-- AUTO_INCREMENT voor een tabel `product`
--
ALTER TABLE `product`
  MODIFY `product_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=671;
--
-- AUTO_INCREMENT voor een tabel `product_order`
--
ALTER TABLE `product_order`
  MODIFY `product_order_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=30;
--
-- AUTO_INCREMENT voor een tabel `publisher`
--
ALTER TABLE `publisher`
  MODIFY `publisher_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT voor een tabel `rating`
--
ALTER TABLE `rating`
  MODIFY `rating_id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT voor een tabel `review`
--
ALTER TABLE `review`
  MODIFY `review_id` int(11) NOT NULL AUTO_INCREMENT;
--
-- Beperkingen voor geëxporteerde tabellen
--

--
-- Beperkingen voor tabel `klant_fav`
--
ALTER TABLE `klant_fav`
  ADD CONSTRAINT `fk_klant_fav_klant1` FOREIGN KEY (`klant_id`) REFERENCES `klant` (`klant_id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `fk_klant_fav_product1` FOREIGN KEY (`product_id`) REFERENCES `product` (`product_id`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Beperkingen voor tabel `order`
--
ALTER TABLE `order`
  ADD CONSTRAINT `fk_bestelling_klant` FOREIGN KEY (`klant_id`) REFERENCES `klant` (`klant_id`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Beperkingen voor tabel `product`
--
ALTER TABLE `product`
  ADD CONSTRAINT `fk_product_uitgever1` FOREIGN KEY (`publisher_id`) REFERENCES `publisher` (`publisher_id`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Beperkingen voor tabel `product_has_category`
--
ALTER TABLE `product_has_category`
  ADD CONSTRAINT `fk_product_has_category_category1` FOREIGN KEY (`category_category_id`) REFERENCES `category` (`category_id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `fk_product_has_category_product1` FOREIGN KEY (`product_id`) REFERENCES `product` (`product_id`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Beperkingen voor tabel `product_order`
--
ALTER TABLE `product_order`
  ADD CONSTRAINT `fk_product_bestelling_bestelling1` FOREIGN KEY (`order_id`) REFERENCES `order` (`order_id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `fk_product_bestelling_product1` FOREIGN KEY (`product_id`) REFERENCES `product` (`product_id`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Beperkingen voor tabel `review`
--
ALTER TABLE `review`
  ADD CONSTRAINT `fk_beoordeling_beoordeling_ster1` FOREIGN KEY (`rating_id`) REFERENCES `rating` (`rating_id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `fk_beoordeling_klant1` FOREIGN KEY (`klant_id`) REFERENCES `klant` (`klant_id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `fk_beoordeling_product1` FOREIGN KEY (`product_id`,`product_publisher_id`) REFERENCES `product` (`product_id`, `publisher_id`) ON DELETE NO ACTION ON UPDATE NO ACTION;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
