-- phpMyAdmin SQL Dump
-- version 4.7.4
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1:3306
-- Generation Time: Dec 05, 2018 at 04:59 PM
-- Server version: 5.7.19
-- PHP Version: 5.6.31

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `vpatel52`
--

-- --------------------------------------------------------

--
-- Table structure for table `car`
--

DROP TABLE IF EXISTS `car`;
CREATE TABLE IF NOT EXISTS `car` (
  `CarID` varchar(3) NOT NULL,
  `Car` text,
  `Dates` date DEFAULT NULL,
  `Location` text,
  `Available` text,
  `Price` decimal(10,0) DEFAULT NULL,
  PRIMARY KEY (`CarID`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `car`
--

INSERT INTO `car` (`CarID`, `Car`, `Dates`, `Location`, `Available`, `Price`) VALUES
('C01', 'Honda Civic', '2018-11-30', 'Atlanta', 'yes', '75'),
('C02', 'Toyota Camry', '2018-12-30', 'Atlanta', 'yes', '85'),
('CO3', 'Lincoln Navigator', '2018-12-22', 'Atlanta', 'yes', '90'),
('CO4', 'Hyundai Santa Fe', '2018-12-15', 'Atlanta', 'yes', '55'),
('CO5', 'Lincoln Navigator', '2018-12-22', 'Atlanta', 'yes', '90'),
('CO6', 'Chevy Suburban', '2018-12-19', 'Atlanta', 'yes', '70'),
('CO7', 'Chevy Tahoe', '2018-12-14', 'Atlanta', 'yes', '50');

-- --------------------------------------------------------

--
-- Table structure for table `cart`
--

DROP TABLE IF EXISTS `cart`;
CREATE TABLE IF NOT EXISTS `cart` (
  `UserID` int(11) NOT NULL,
  `Car` varchar(3) DEFAULT NULL,
  `Spot` varchar(3) DEFAULT NULL,
  `Plane` varchar(4) DEFAULT NULL,
  `Price` decimal(10,0) DEFAULT NULL,
  PRIMARY KEY (`UserID`) USING BTREE
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `cart`
--

INSERT INTO `cart` (`UserID`, `Car`, `Spot`, `Plane`, `Price`) VALUES
(884, NULL, NULL, 'FL4A', '295');

-- --------------------------------------------------------

--
-- Table structure for table `checkout`
--

DROP TABLE IF EXISTS `checkout`;
CREATE TABLE IF NOT EXISTS `checkout` (
  `UserID` varchar(11) NOT NULL,
  `Car` varchar(3) DEFAULT NULL,
  `Spot` varchar(3) DEFAULT NULL,
  `Plane` varchar(4) DEFAULT NULL,
  `Price` decimal(10,0) DEFAULT NULL,
  PRIMARY KEY (`UserID`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `checkout`
--

INSERT INTO `checkout` (`UserID`, `Car`, `Spot`, `Plane`, `Price`) VALUES
('884', NULL, NULL, 'Fl1A', '200');

-- --------------------------------------------------------

--
-- Table structure for table `parking`
--

DROP TABLE IF EXISTS `parking`;
CREATE TABLE IF NOT EXISTS `parking` (
  `ParkingID` varchar(3) NOT NULL,
  `Spot` text,
  `Dates` date DEFAULT NULL,
  `Location` text,
  `Available` text,
  `Price` decimal(10,0) DEFAULT NULL,
  PRIMARY KEY (`ParkingID`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `parking`
--

INSERT INTO `parking` (`ParkingID`, `Spot`, `Dates`, `Location`, `Available`, `Price`) VALUES
('PA', 'Parking Spot A', '2018-12-30', 'Atlanta', 'yes', '10'),
('PB', 'Parking Spot B', '2018-12-30', 'Atlanta', 'yes', '8'),
('PL', 'PARKING SPOT L', '2018-12-23', 'Atlanta', 'yes', '8'),
('PC', 'PARKING SPOT C', '2018-12-22', 'Atlanta', 'yes', '10'),
('PD', 'PARKING SPOT D', '2018-12-28', 'Atlanta', 'yes', '10'),
('PE', 'PARKING SPOT E', '2018-12-28', 'Atlanta', 'yes', '8'),
('PF', 'PARKING SPOT F', '2018-12-28', 'Atlanta', 'yes', '8'),
('PG', 'PARKING SPOT G', '2018-12-06', 'Atlanta', 'yes', '10'),
('PH', 'PARKING SPOT H', '2018-12-06', 'Atlanta', 'yes', '8'),
('PI', 'PARKING SPOT I', '2018-12-08', 'Atlanta', 'yes', '10'),
('PJ', 'PARKING SPOT J', '2018-12-09', 'Atlanta', 'yes', '8'),
('PK', 'PARKING SPOT K', '2018-12-09', 'Atlanta', 'yes', '10'),
('PCA', 'PARKING SPOT A', '2018-12-21', 'Chicago','yes', '8'),
('PCB', 'PARKING SPOT B', '2018-12-21', 'Chicago','yes', '8'),
('PCC', 'PARKING SPOT C', '2018-12-23', 'Chicago','yes', '10'),
('PDA', 'PARKING SPOT A', '2018-12-21', 'Denver', 'yes', '8'),
('PDB', 'PARKING SPOT B', '2018-12-23', 'Denver', 'yes', '8'),
('PDC', 'PARKING SPOT C', '2018-12-21', 'Denver', 'yes', '12'),
('PSA', 'PARKING SPOT A', '2018-12-23', 'Seattle','yes', '8'),
('PSB', 'PARKING SPOT B', '2018-12-21', 'Seattle','yes', '10'),
('PSC', 'PARKING SPOT C', '2018-12-23', 'Seattle','yes', '8'),
('PHA', 'PARKING SPOT A', '2018-12-21', 'Houston','yes', '8'),
('PBA', 'PARKING SPOT A', '2018-12-23', 'Boston', 'yes', '8'),
('PMA', 'PARKING SPOT A', '2018-12-21', 'Miami', 'yes', '15'),
('PMB', 'PARKING SPOT B', '2018-12-23', 'Miami', 'yes', '12');

-- --------------------------------------------------------

--
-- Table structure for table `plane`
--

DROP TABLE IF EXISTS `plane`;
CREATE TABLE IF NOT EXISTS `plane` (
  `SeatID` varchar(4) NOT NULL,
  `Seat` text,
  `Dates` date DEFAULT NULL,
  `Available`text,
  `Location` text,
  `Price` decimal(10,0) DEFAULT NULL,
  PRIMARY KEY (`SeatID`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `plane`
--

INSERT INTO `plane` (`SeatID`, `Seat`, `Dates`, `Available`, `Location`, `Price`) VALUES
('Fl1A', 'Plane 1 Seat A ', '2018-12-20','no', 'Atlanta', '200'),
('Fl1B', 'Plane 1 Seat B', '2018-12-20', 'yes', 'Atlanta', '295'),
('Fl2A', 'Plane 2 Seat B', '2018-12-21', 'yes', 'Chicago', '200'),
('FL4A', 'PLANE 4 SEAT A', '2018-12-31', 'yes', 'Atlanta', '295'),
('FL2B', 'PLANE 2 SEAT B', '2018-12-23', 'yes', 'Atlanta', '300'),
('FL3A', 'PLANE 3 SEAT A', '2018-12-25', 'yes', 'Atlanta', '302'),
('FL5A', 'PLANE 4 SEAT A', '2018-12-28', 'yes', 'Atlanta', '300'),
('FL6A', 'PLANE 6 SEAT A', '2018-12-21', 'yes', 'Chicago', '450'),
('FL7A', 'PLANE 7 SEAT A', '2018-12-21', 'yes', 'Chicago', '450'),
('FL6B', 'PLANE 6 SEAT B', '2018-12-29', 'yes', 'Chicago', '400'),
('FL7B', 'PLANE 7 SEAT B', '2018-12-23', 'yes', 'Chicago', '500'),
('FL8A', 'PLANE 8 SEAT A', '2018-12-31', 'yes', 'Atlanta', '200'),
('FL9A', 'PLANE 6 SEAT A', '2018-12-21', 'yes', 'Chicago', '450'),
('FS1A', 'PLANE 1 SEAT A', '2019-01-11', 'yes', 'SAN FRANCISCO', '250'),
('FS1B', 'PLANE 1 SEAT B', '2018-12-21', 'yes', 'SAN FRANCISCO', '310'),
('FS2A', 'PLANE 2 SEAT A', '2018-12-30', 'yes', 'SAN FRANCISCO', '300'),
('FD1A', 'PLANE 1 SEAT A', '2018-12-21', 'yes', 'DENVER', '200'),
('FD1B', 'PLANE 1 SEAT B', '2018-12-22', 'yes', 'DENVER', '200'),
('FW1A', 'PLANE 1 SEAT A', '2018-12-23', 'yes', 'SEATTLE', '400'),
('FW1B', 'PLANE 1 SEAT B', '2018-12-27', 'yes', 'SEATTLE', '450'),
('FW2A', 'PLANE 2 SEAT A', '2018-12-25', 'yes', 'SEATTLE', '500'),
('FW2B', 'PLANE 2 SEAT B', '2018-12-13', 'yes', 'DENVER', '500'),
('FW3A', 'PLANE 3 SEAT A', '2019-01-05', 'yes', 'SEATTLE', '350'),
('FH1A', 'PLANE 1 SEAT A', '2018-12-22', 'yes', 'HOUSTON', '300'),
('FH1B', 'PLANE 1 SEAT B', '2018-12-29', 'yes', 'HOUSTON', '300'),
('FH2A', 'PLANE 2 SEAT A', '2018-12-16', 'yes', 'HOUSTON', '350'),
('FB1A', 'PLANE 1 SEAT A', '2018-12-22', 'yes', 'BOSTON', '250'),
('FB1B', 'PLANE 1 SEAT B', '2018-12-26', 'yes', 'BOSTON', '275'),
('FM1A', 'PLANE 1 SEAT A', '2019-01-11', 'yes', 'MIAMI', '250'),
('FM1B', 'PLANE 1 SEAT B', '2018-12-21', 'yes', 'MIAMI', '310'),
('FM2A', 'PLANE 2 SEAT A', '2018-12-30', 'yes', 'MIAMI', '300');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

DROP TABLE IF EXISTS `users`;
CREATE TABLE IF NOT EXISTS `users` (
  `UserID` int(11) NOT NULL AUTO_INCREMENT,
  `Username` text,
  `Password` text,
  `Firstname` text,
  `Lastname` text,
  PRIMARY KEY (`UserID`)
) ENGINE=MyISAM AUTO_INCREMENT=885 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`UserID`, `Username`, `Password`, `Firstname`, `Lastname`) VALUES
(137, 'user137', 'pass137', 'Bob', 'Jones'),
(881, 'user881', 'pass881', 'Bob', 'Barker'),
(883, 'a', 'a', 'vib', 'a'),
(884, 'cn', 'yn', 'CHANDRA', 'NEOPANE');
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
