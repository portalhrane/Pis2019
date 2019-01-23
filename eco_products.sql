-- phpMyAdmin SQL Dump
-- version 4.8.4
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jan 23, 2019 at 01:53 PM
-- Server version: 10.1.37-MariaDB
-- PHP Version: 7.3.0

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `eco_products`
--

-- --------------------------------------------------------

--
-- Table structure for table `categories`
--

CREATE TABLE `categories` (
  `id` int(11) NOT NULL,
  `name` varchar(50) NOT NULL,
  `img` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `categories`
--

INSERT INTO `categories` (`id`, `name`, `img`) VALUES
(1, 'Bilje i zacini', 'bilje-zacini.jpg'),
(2, 'Eko proizvodi', 'eko-proiz.jpg'),
(3, 'Mlijeko i mlijecni proizvodi', 'mlijeko.jpeg'),
(4, 'Gljive', 'gljive.jpg'),
(5, 'Pcelarski proizvodi', 'pcelinji-proizvodi.jpg');

-- --------------------------------------------------------

--
-- Table structure for table `products`
--

CREATE TABLE `products` (
  `id` int(11) NOT NULL,
  `id_user` int(11) NOT NULL,
  `id_category` int(11) NOT NULL,
  `name` varchar(50) NOT NULL,
  `img` varchar(255) NOT NULL,
  `description` varchar(255) NOT NULL,
  `price` float NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `products`
--

INSERT INTO `products` (`id`, `id_user`, `id_category`, `name`, `img`, `description`, `price`) VALUES
(1, 2, 1, 'Caj od aronije', 'darvitalis-caj-od-aronije.jpg', 'Osim što je prirodnog, ugodnog i opuštaju?eg okusa i mirisa, ne sadrži tein i mogu ga piti i djeca i odrasli. Izuzetno je bogat anitoksidansima i vitaminom C tako da je prava vitaminska bomba za detoksikaciju i ja?anje imuniteta. ?aj sadrži sve vrijedne n', 2.5),
(2, 1, 1, 'Zeleni caj', 'Zelen_caj.jpg', 'Ovaj mo?an napitak smanjuje rizik od sr?anih bolesti i karcinoma, snižava kolesterol, popravlja raspoloženje, a i odli?na je zamjena za jutarnju kavu. Najbolje ga je piti svježe pripremljenog\r\n\r\nOvaj mo?an napitak smanjuje rizik od sr?anih bolesti i karci', 2.3),
(7, 2, 3, 'Domace mlijeko', 'mlijeko-kravlje-casa-flasa-vrc.jpg', 'Cijena organskog mlijeka naj?eš?e je dvostruko viša od konvencionalne. Jedan od razloga je taj što je uzgoj krava koje daju organsko mlijeko puno skuplji. Naime, u potpunosti se poštuju pravila organskog uzgoja – od ispaše i hrane pa do korištenja isklju?', 6.5),
(8, 2, 2, 'Brasno od ljesnjaka', 'brasno-ljesnjaka.jpg', 'Prodajemo brašno od lješnjaka dobiveno hladnim prešanjem jezgre lješnjaka uzgojenih na vlastitom OPG-u i mljeveno mlinom za finu strukturu.  Brašno se koristi za pripremu kola?a, peciva, kruha, pala?inki i ostalih slastica.  Pogodan je za osobe netolerant', 10),
(9, 2, 4, 'Suseni vrganji', 's-vrganji.JPG', 'Vrganj poznat i kao \"kralj gljiva\" jedna je od najkvalitetnijih i vrlo ukusnih gljiva. Nutritivno vrganj se može svrstati izme?u visoko rangiranih biljaka i nisko rangiranog mesa. Iako ne mogu isklju?ivo zamijeniti meso, ribu ili jaja, mogu doprinijeti sp', 100),
(10, 3, 5, 'Domaci bagremov med', 'Bagremov-med-za-sajt.jpg', 'Bagremov med prirodni je proizvod koji se proizvodi od so?nog soka bagremovog cvijeta. Zahvaljuju?i ljekovitim svojstvima, med od bagrema pomaže nam kod raznih zdravstvenih problema.', 25);

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `username` varchar(50) NOT NULL,
  `password` varchar(255) NOT NULL,
  `name` varchar(50) NOT NULL,
  `company` varchar(50) NOT NULL,
  `phone_number` varchar(50) NOT NULL,
  `address` varchar(50) NOT NULL,
  `email` varchar(50) NOT NULL,
  `role` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `username`, `password`, `name`, `company`, `phone_number`, `address`, `email`, `role`) VALUES
(1, 'admin', '202cb962ac59075b964b07152d234b70', 'Admin', '', '123456789', 'Mostar', 'admin@gmail.com', 1),
(2, 'marko', '202cb962ac59075b964b07152d234b70', 'Marko Markovic', 'Eko proizvodi', '123456789', 'Zagreb', 'marko@gmail.com', 0),
(3, 'ivo', '202cb962ac59075b964b07152d234b70', 'Ivo Ivic', 'Eko Ivic company', '+385123456789', 'Split ', 'ivo@gmail.com', 0);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `categories`
--
ALTER TABLE `categories`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `products`
--
ALTER TABLE `products`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `categories`
--
ALTER TABLE `categories`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `products`
--
ALTER TABLE `products`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
