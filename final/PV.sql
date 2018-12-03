-- phpMyAdmin SQL Dump
-- version 4.6.6deb5
-- https://www.phpmyadmin.net/
--
-- Host: localhost:3306
-- Generation Time: Dec 03, 2018 at 10:48 AM
-- Server version: 10.1.34-MariaDB-0ubuntu0.18.04.1
-- PHP Version: 7.2.10-0ubuntu0.18.04.1

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `PV Database`
--

-- --------------------------------------------------------

--
-- Table structure for table `PV`
--

CREATE TABLE `PV` (
  `pv_id` int(11) NOT NULL,
  `name` varchar(20) DEFAULT NULL,
  `address` varchar(40) DEFAULT NULL,
  `zip_code` varchar(5) DEFAULT NULL,
  `city` varchar(20) DEFAULT NULL,
  `country` varchar(20) DEFAULT NULL,
  `coordinate_x` varchar(100) DEFAULT NULL,
  `coordinate_y` varchar(100) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `PV`
--

INSERT INTO `PV` (`pv_id`, `name`, `address`, `zip_code`, `city`, `country`, `coordinate_x`, `coordinate_y`) VALUES
(17, 'Pv Atlanta', 'Atlamta address', '4045', 'Atlanta City', 'USA', '34.488447837809', '-84.638671875'),
(18, 'EriasPV', 'EriasAddress', '29229', 'Larnaca', 'Cyprus', '34.95076270229', '33.583595752716'),
(26, 'xcxccxvx', 'ca', 'zx', 'xc', 'xc', '-78.630005567748', '177.53934015614'),
(38, 'LimassolPv', 'Lemesou 12', '9229', 'Limassol', 'Cyprus', '34.608345207316', '32.957611083984'),
(39, 'PaphosPvSystem', 'Pafou23', '1918', 'Paphos', 'Cyprus', '34.766435216842', '32.459106445313'),
(40, 'Mountain PV', 'Troodos Avenue', '2323', 'Nicosia', 'Cyprus', '34.926474935846', '32.958984375'),
(41, 'StrovolosPV', 'Stovolos Avenue', '2334', 'Nicosia', 'Cyprus', '35.123278350923', '33.364105224609'),
(42, 'Polis PV System', 'Polis Avenue 12', '9898', 'Paphos', 'Cyprus', '35.017625695397', '32.424774169922'),
(43, 'Yermasoyias PV', 'Yermasogia Avenue 12', '2345', 'Limassol', 'Cyprus', '34.705493410225', '33.070220947266'),
(44, 'My PV System', 'Loukias Papageorgiou 6A', '3055', 'Limassol', 'Cyprus', '34.668714397038', '32.998820543289'),
(59, 'Christias PV System', 'Akaki Avenue', '9876', 'Nicosia', 'Cyprus', '35.133035885581', '33.137319087982'),
(60, 'Pantelina', 'Dios 7', '4187', 'Limassol', 'Cyprus', '34.686453113835', '32.969563007355');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `PV`
--
ALTER TABLE `PV`
  ADD PRIMARY KEY (`pv_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `PV`
--
ALTER TABLE `PV`
  MODIFY `pv_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=108;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
