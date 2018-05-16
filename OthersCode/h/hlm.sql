-- phpMyAdmin SQL Dump
-- version 4.0.10deb1
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: Dec 11, 2017 at 07:09 AM
-- Server version: 5.5.57-0ubuntu0.14.04.1
-- PHP Version: 5.5.9-1ubuntu4.22

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `hlm`
--

-- --------------------------------------------------------

--
-- Table structure for table `products`
--

CREATE TABLE IF NOT EXISTS `products` (
  `productId` int(11) NOT NULL AUTO_INCREMENT,
  `products` varchar(20) NOT NULL,
  PRIMARY KEY (`productId`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=10 ;

--
-- Dumping data for table `products`
--

INSERT INTO `products` (`productId`, `products`) VALUES
(1, 'Carpet'),
(2, 'Carpet Tile'),
(3, 'VCT'),
(4, 'Sheet Vinyl'),
(5, 'Base'),
(6, 'Linoleum'),
(7, 'Underlayment'),
(8, 'Sundries'),
(9, 'Adhesives');

-- --------------------------------------------------------

--
-- Table structure for table `receiving`
--

CREATE TABLE IF NOT EXISTS `receiving` (
  `receiverId` int(11) NOT NULL AUTO_INCREMENT,
  `date_received` date NOT NULL,
  `shipper` varchar(20) NOT NULL,
  `product` varchar(15) NOT NULL,
  `manufacturer` varchar(15) NOT NULL,
  `style` varchar(40) NOT NULL,
  `color` varchar(40) NOT NULL,
  `dylot` varchar(10) NOT NULL,
  `size` varchar(10) NOT NULL,
  `roll_number` varchar(10) NOT NULL,
  `cartons` varchar(10) NOT NULL,
  `sidemark` varchar(40) NOT NULL,
  `po` varchar(15) NOT NULL,
  `received_by` varchar(20) NOT NULL,
  `current_date` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `userId` int(5) NOT NULL,
  PRIMARY KEY (`receiverId`),
  KEY `userId` (`userId`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=24 ;

--
-- Dumping data for table `receiving`
--

INSERT INTO `receiving` (`receiverId`, `date_received`, `shipper`, `product`, `manufacturer`, `style`, `color`, `dylot`, `size`, `roll_number`, `cartons`, `sidemark`, `po`, `received_by`, `current_date`, `userId`) VALUES
(1, '2017-09-25', 'Xpress Global', 'Carpet Tile', 'Mohawk', 'By The Book', 'Expert 218', 'n/a', '24" x 24"', 'n/a', '12', 'Sandpiper School', 'CS-23569-0018', 'Matthew C.', '2017-12-05 09:45:52', 2),
(2, '2017-09-25', 'BR Funsten', 'VCT', 'Armstrong', 'Granette', 'Battleship LT002', '', '12" x 12"', 'n/a', '13', 'De Anza College', 'SDS-23626-0008', 'Matthew C.', '2017-12-05 09:46:50', 2),
(3, '2017-09-25', 'BR Funsten', 'VCT', 'Armstrong', 'Imperial Texture', '51911 Classic White', 'Y249B', '12" x 12"', 'n/a', '1', '3100 De La Cruz', 'NC-23626-A', 'Matthew C.', '2017-12-05 09:46:50', 2),
(4, '2017-09-25', 'Tom Duffy', 'Base', 'Burke', 'topset', '103P Espresso', '', '4"', '', '500 LF', 'Central Park', 'SS-23301-25615', 'Matthew C.', '2017-09-26 10:10:27', 2),
(5, '2017-09-25', 'Tom Duffy', 'Underlayment', 'n/a', 'Versashield MBX Underlayment', 'n/a', 'n/a', 'n/a', 'n/a', '2 rolls', 'Raynor', 'CS-23385-0001', 'Matthew C.', '2017-09-26 09:30:09', 2),
(8, '2017-09-26', 'Xpress Global', 'Carpet', 'Mohawk', 'Horsepower', 'Victory Lane', 'n/a', '12'' x 188.', '09261701', 'n/a', 'Oster ES', 'BJ-23445-25502', 'Steve G.', '2017-09-27 08:10:53', 4),
(9, '2017-09-26', 'Xpress Global', 'Carpet', 'Mohawk', 'Horsepower', 'Victory Lane', 'n/a', '12'' x 100''', '09261702', 'n/a', 'Oster ES', 'BJ-23445-25502', 'Steve G.', '2017-09-27 09:13:33', 4),
(10, '2017-09-26', 'Mannington Mills', 'Sheet Vinyl', 'Mannington', 'Intersect', 'Foundation', 'n/a', '12'' x 63''', '09261703', 'n/a', '1st Northern CCU', 'NC-23068-0012', 'Steve G.', '2017-09-27 13:08:28', 4),
(11, '2017-09-26', 'BR Funsten', 'Linoleum', 'Armstrong', 'Marmorette', 'LS059 Charcoal Gray', 'n/a', '6.5'' x 73.', '09261701', 'n/a', 'SJUSD District Office', 'CS-23017-0001', 'Steve G.', '2017-09-27 12:20:48', 4),
(12, '2017-12-26', 'Diamond W', 'Base', 'Johnsonite', 'topset', 'DC121 Cement', 'n/a', '6"', 'n/a', '500 LF', 'Kaiser WCR', 'DS-23311-25390', 'Ismael G.', '2017-12-28 12:18:43', 5),
(13, '2017-10-04', 'Xpress Global', 'Carpet', 'Bolye', 'Absolute', 'Gold Blue', 'n/a', '12'' x 35''', '10041701', 'n/a', '37390-Suite C', 'CS-23686-0001', 'Scott W.', '2017-10-05 08:21:14', 7),
(14, '2017-10-19', 'Shaw Ind.', 'Carpet', 'Shaw Ind.', 'Opportunity', 'Breakthrough', 'n/a', '12'' x 96''', '10041701', 'n/a', 'Suite #200', 'NC-23692-0001', 'Ismael G.', '2017-10-22 08:21:14', 4),
(15, '2017-11-15', 'Xpress Global', 'Carpet Tile', 'Mannington', 'Switchback', 'Native', 'n/a', '12" x 48"', 'n/a', '128 SY', 'Mattson TI', 'NC-23684-0001', 'Steve G.', '2017-11-16 09:16:00', 4),
(16, '2017-11-20', 'Shaw Ind.', 'Carpet Tile', 'Shaw', 'Solitude 0648V', 'Urban Ash 48540', 'n/a', '24" x 24"', 'n/a', '124', 'MLK Dist Office', 'SS-23492-0001', 'Matthew C.', '2017-11-22 09:16:00', 2),
(17, '2017-11-22', 'Old Dominion', 'Sheet Vinyl', 'Nora', 'Environcare', '2949 Sage', 'n/a', '4 x 49.22', '11221701', 'n/a', 'Kaiser WCR Basement', 'DS-23345-0001', 'Conrad S.', '2017-11-23 10:16:00', 3),
(19, '2017-12-04', 'Xpress Global', 'Adhesive', 'n/a', 'Taylor 2033', 'n/a', '4 gal', 'n/a', 'n/a', '5 buckets', 'STOCK', 'SG-STOCK-25365', 'Steve G.', '2017-12-05 09:18:38', 4),
(20, '2017-12-04', 'Tom Duffy', 'Sundries', 'Burke', 'Outside Corners', '701 Black', 'n/a', '4"', 'n/a', '1', 'GGHS', 'DS-25123-26875', 'Ismael G.', '2017-12-05 10:32:30', 5),
(21, '2017-12-05', 'Nora', 'Adhesives', 'Nora', 'Nora Adhesive', 'n/a', 'n/a', '4 gal', 'n/a', '1 bucket', 'AOES', 'CS-24589-25426', 'Scott W.', '2017-12-10 14:22:27', 7),
(22, '2017-12-06', 'Xpress Global', 'Sundries', 'Johnsonite', 'Weld Rods', 'pearl white 558', 'n/a', 'n/a', 'n/a', '1 spool', 'Kaiser WCR', 'DS-23565-25855', 'Matt C.', '2017-12-05 10:15:00', 2),
(23, '2017-12-06', 'BR Funsten', 'VCT', 'Armstrong', 'Imperial Texture', '51511 Clear White', 'A156C', '12" x 12"', 'n/a', '5', 'Bishop HS', 'CS-25456-23658', 'Conrad S.', '2017-12-07 11:26:00', 3);

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE IF NOT EXISTS `users` (
  `userId` int(11) NOT NULL AUTO_INCREMENT,
  `username` varchar(20) NOT NULL,
  `password` varchar(40) NOT NULL,
  `fName` varchar(20) NOT NULL,
  `lName` varchar(20) NOT NULL,
  PRIMARY KEY (`userId`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=8 ;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`userId`, `username`, `password`, `fName`, `lName`) VALUES
(1, 'admin', '25ab86bed149ca6ca9c1c0d5db7c9a91388ddeab', 'HLM', 'ADMIN'),
(2, 'mattc', '0ac5ecbf3d581190458c7af6a63a67c9c1dcb2e9', 'Matthew', 'Connolly'),
(3, 'conrads', '78621977a7dacebe03d664eac334eca03b591920', 'Conrad', 'Sotelo'),
(4, 'steveg', '05323457183e83c11b99167e97c34112ba62b00d', 'Steve', 'Gomez'),
(5, 'ismaelg', 'a7ccdf51ba31f6945c8c26071839bc21c183f1f0', 'Ismael', 'Gomez'),
(6, 'brianj', 'dc713e053e9cdfed01b593ae853fdb78e064c0fb', 'Brian ', 'Johnson'),
(7, 'scottw', '5a0f146c2e1eff6aa5e8c505bcd4707133734329', 'Scott', 'Willard');

--
-- Constraints for dumped tables
--

--
-- Constraints for table `receiving`
--
ALTER TABLE `receiving`
  ADD CONSTRAINT `receiving_ibfk_1` FOREIGN KEY (`userId`) REFERENCES `users` (`userId`);

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
