-- phpMyAdmin SQL Dump
-- version 4.5.2
-- http://www.phpmyadmin.net
--
-- Host: localhost
-- Gegenereerd op: 22 jun 2017 om 11:23
-- Serverversie: 10.1.16-MariaDB
-- PHP-versie: 5.6.24

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `books_db`
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
(1, 'Informatico'),
(2, 'Computers'),
(3, 'Hardware'),
(4, 'Computer Networks');

-- --------------------------------------------------------

--
-- Tabelstructuur voor tabel `klant`
--

CREATE TABLE `klant` (
  `klant_id` int(11) NOT NULL,
  `username` varchar(45) DEFAULT NULL,
  `password` varchar(45) DEFAULT NULL,
  `email` varchar(45) DEFAULT NULL,
  `full_name` varchar(45) DEFAULT NULL,
  `phone_number` int(11) DEFAULT NULL,
  `street` varchar(45) DEFAULT NULL,
  `house_number` varchar(45) DEFAULT NULL,
  `zip_code` varchar(45) DEFAULT NULL,
  `city` varchar(45) DEFAULT NULL,
  `country` varchar(45) DEFAULT NULL,
  `group_id` tinyint(1) DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Gegevens worden geëxporteerd voor tabel `klant`
--

INSERT INTO `klant` (`klant_id`, `username`, `password`, `email`, `full_name`, `phone_number`, `street`, `house_number`, `zip_code`, `city`, `country`, `group_id`) VALUES
(1, 'Sami', '601f1889667efaebb33b8c12572835da3f027f78', 'sami@mail.com', 'Sami Sami', 6545353, 'straat', '33', '3245 FL', 'Breda', 'Nederland', 1),
(2, 'Dyli', '123456', 'dyli@mail.com', 'Dylan Dylan', 63453452, 'wegstraat', '32', '2233 LN', 'Den Haag', 'Nederland', 0),
(3, 'Ralphi', '123321', 'rali@mail.com', 'Ralph Ralph', 640542341, 'landstraat', '76', '4030 KN', 'Leiden', 'Nederland', 0);

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
  `price` float DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Gegevens worden geëxporteerd voor tabel `product`
--

INSERT INTO `product` (`product_id`, `isbn`, `title`, `author`, `edition`, `release_date`, `product_img`, `stock`, `publisher_id`, `price`) VALUES
(14, 134291255, 'PHP', 'Larry Ullman', 2, '2017-05-09', 'product.jpg', 20, 1, 32),
(18, 2147483647, 'Murach''s PHP & MySQL', ' Joel Murach', 2, '2014-02-05', NULL, 7, 1, 49.5),
(19, 2147483647, 'Test', 'test', 2, '2017-06-02', NULL, 5, 2, 50),
(21, 2147483647, 'Computer Networks', ' Andrew Tanenbaum', 4, '2002-06-25', NULL, 2, 3, 14),
(22, 2147483647, 'PHP for Absolute Beginner', 'Jason Lengstorf', 2, '2014-08-03', 'php-absolute.jpg', 3, 2, 31.99),
(23, 2147483647, 'Learning PHP, MySQL & JavaScript', 'Robin Nixon', 3, '2014-03-02', 'robinson.jpg', 8, 1, 34.99),
(24, 2147483647, 'Learning PHP', 'David Sklar', 2, '2015-01-01', 'learnphp.jpg', 14, 1, 29.99);

-- --------------------------------------------------------

--
-- Tabelstructuur voor tabel `product_has_category`
--

CREATE TABLE `product_has_category` (
  `product_id` int(11) NOT NULL,
  `category_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Gegevens worden geëxporteerd voor tabel `product_has_category`
--

INSERT INTO `product_has_category` (`product_id`, `category_id`) VALUES
(14, 1),
(19, 1),
(21, 4),
(22, 1),
(23, 1),
(24, 2);

-- --------------------------------------------------------

--
-- Tabelstructuur voor tabel `product_order`
--

CREATE TABLE `product_order` (
  `product_order_id` int(11) NOT NULL,
  `product_id` int(11) NOT NULL,
  `order_id` int(11) NOT NULL,
  `order_klant_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

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
(1, 'O'' Reilly'),
(2, 'Apress'),
(3, 'Prentice Hall');

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
  ADD PRIMARY KEY (`product_id`,`category_id`),
  ADD KEY `fk_product_has_category_category1_idx` (`category_id`),
  ADD KEY `fk_product_has_category_product1_idx` (`product_id`);

--
-- Indexen voor tabel `product_order`
--
ALTER TABLE `product_order`
  ADD PRIMARY KEY (`product_order_id`,`product_id`,`order_id`,`order_klant_id`),
  ADD KEY `fk_product_bestelling_product1_idx` (`product_id`),
  ADD KEY `fk_product_bestelling_bestelling1_idx` (`order_id`,`order_klant_id`);

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
  MODIFY `category_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
--
-- AUTO_INCREMENT voor een tabel `klant`
--
ALTER TABLE `klant`
  MODIFY `klant_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
--
-- AUTO_INCREMENT voor een tabel `klant_fav`
--
ALTER TABLE `klant_fav`
  MODIFY `klant_fav_id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT voor een tabel `order`
--
ALTER TABLE `order`
  MODIFY `order_id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT voor een tabel `product`
--
ALTER TABLE `product`
  MODIFY `product_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=25;
--
-- AUTO_INCREMENT voor een tabel `product_order`
--
ALTER TABLE `product_order`
  MODIFY `product_order_id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT voor een tabel `publisher`
--
ALTER TABLE `publisher`
  MODIFY `publisher_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
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
  ADD CONSTRAINT `fk_product_has_category_category1` FOREIGN KEY (`category_id`) REFERENCES `category` (`category_id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `fk_product_has_category_product1` FOREIGN KEY (`product_id`) REFERENCES `product` (`product_id`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Beperkingen voor tabel `product_order`
--
ALTER TABLE `product_order`
  ADD CONSTRAINT `fk_product_bestelling_bestelling1` FOREIGN KEY (`order_id`,`order_klant_id`) REFERENCES `order` (`order_id`, `klant_id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
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
