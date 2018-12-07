-- phpMyAdmin SQL Dump
-- version 4.7.4
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1:3306
-- Generation Time: Dec 05, 2017 at 04:59 PM
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

DROP TABLE IF EXISTS `Car`;
CREATE TABLE IF NOT EXISTS `Car` (
  `CarID` varchar(3) NOT NULL,
  `Car` text,
  `Dates` date DEFAULT NULL,
  `Location` text,
  `Available` bit(1) DEFAULT NULL,
  `Price` decimal(10,0) DEFAULT NULL,
  PRIMARY KEY (`CarID`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `car`
--

INSERT INTO `Car` (`CarID`, `Car`, `Dates`, `Location`, `Available`, `Price`) VALUES
('C01', 'Honda Civic', '2017-11-30', 'Atlanta', b'1', '75'),
('C02', 'Toyota Camry', '2017-12-30', 'Atlanta', b'1', '85'),
('CO3', 'Lincoln Navigator', '2017-12-22', 'Atlanta', b'1', '90'),
('CO4', 'Hyundai Santa Fe', '2017-12-15', 'Atlanta', b'1', '55'),
('CO5', 'Lincoln Navigator', '2017-12-22', 'Atlanta', b'1', '90'),
('CO6', 'Chevy Suburban', '2017-12-19', 'Atlanta', b'1', '70'),
('CO7', 'Chevy Tahoe', '2017-12-14', 'Atlanta', b'1', '50');

-- --------------------------------------------------------

--
-- Table structure for table `cart`
--

DROP TABLE IF EXISTS `Cart`;
CREATE TABLE IF NOT EXISTS `Cart` (
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

INSERT INTO `Cart` (`UserID`, `Car`, `Spot`, `Plane`, `Price`) VALUES
(884, NULL, NULL, 'FL4A', '295');

-- --------------------------------------------------------

--
-- Table structure for table `checkout`
--

DROP TABLE IF EXISTS `Checkout`;
CREATE TABLE IF NOT EXISTS `Checkout` (
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

INSERT INTO `Checkout` (`UserID`, `Car`, `Spot`, `Plane`, `Price`) VALUES
('884', NULL, NULL, 'Fl1A', '200');

-- --------------------------------------------------------

--
-- Table structure for table `parking`
--

DROP TABLE IF EXISTS `Parking`;
CREATE TABLE IF NOT EXISTS `Parking` (
  `ParkingID` varchar(3) NOT NULL,
  `Spot` text,
  `Dates` date DEFAULT NULL,
  `Location` text,
  `Available` bit(1) DEFAULT NULL,
  `Price` decimal(10,0) DEFAULT NULL,
  PRIMARY KEY (`ParkingID`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `parking`
--

INSERT INTO `Parking` (`ParkingID`, `Spot`, `Dates`, `Location`, `Available`, `Price`) VALUES
('PA', 'Parking Spot A', '2017-12-30', 'Atlanta', b'1', '10'),
('PB', 'Parking Spot B', '2017-12-30', 'Atlanta', b'1', '8'),
('PL', 'PARKING SPOT L', '2017-12-23', 'Atlanta', b'1', '8'),
('PC', 'PARKING SPOT C', '2017-12-22', 'Atlanta', b'1', '10'),
('PD', 'PARKING SPOT D', '2017-12-28', 'Atlanta', b'1', '10'),
('PE', 'PARKING SPOT E', '2017-12-28', 'Atlanta', b'1', '8'),
('PF', 'PARKING SPOT F', '2017-12-28', 'Atlanta', b'1', '8'),
('PG', 'PARKING SPOT G', '2017-12-06', 'Atlanta', b'1', '10'),
('PH', 'PARKING SPOT H', '2017-12-06', 'Atlanta', b'1', '8'),
('PI', 'PARKING SPOT I', '2017-12-08', 'Atlanta', b'1', '10'),
('PJ', 'PARKING SPOT J', '2017-12-09', 'Atlanta', b'1', '8'),
('PK', 'PARKING SPOT K', '2017-12-09', 'Atlanta', b'1', '10'),
('PCA', 'PARKING SPOT A', '2017-12-21', 'Chicago', b'1', '8'),
('PCB', 'PARKING SPOT B', '2017-12-21', 'Chicago', b'1', '8'),
('PCC', 'PARKING SPOT C', '2017-12-23', 'Chicago', b'1', '10'),
('PDA', 'PARKING SPOT A', '2017-12-21', 'Denver', b'1', '8'),
('PDB', 'PARKING SPOT B', '2017-12-23', 'Denver', b'1', '8'),
('PDC', 'PARKING SPOT C', '2017-12-21', 'Denver', b'1', '12'),
('PSA', 'PARKING SPOT A', '2017-12-23', 'Seattle', b'1', '8'),
('PSB', 'PARKING SPOT B', '2017-12-21', 'Seattle', b'1', '10'),
('PSC', 'PARKING SPOT C', '2017-12-23', 'Seattle', b'1', '8'),
('PHA', 'PARKING SPOT A', '2017-12-21', 'Houston', b'1', '8'),
('PBA', 'PARKING SPOT A', '2017-12-23', 'Boston', b'1', '8'),
('PMA', 'PARKING SPOT A', '2017-12-21', 'Miami', b'1', '15'),
('PMB', 'PARKING SPOT B', '2017-12-23', 'Miami', b'1', '12');

-- --------------------------------------------------------

--
-- Table structure for table `plane`
--

DROP TABLE IF EXISTS `Plane`;
CREATE TABLE IF NOT EXISTS `Plane` (
  `SeatID` varchar(4) NOT NULL,
  `Seat` text,
  `Dates` date DEFAULT NULL,
  `Available` bit(1) DEFAULT NULL,
  `Location` text,
  `Price` decimal(10,0) DEFAULT NULL,
  PRIMARY KEY (`SeatID`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `plane`
--

INSERT INTO `Plane` (`SeatID`, `Seat`, `Dates`, `Available`, `Location`, `Price`) VALUES
('Fl1A', 'Plane 1 Seat A ', '2017-12-20', b'0', 'Atlanta', '200'),
('Fl1B', 'Plane 1 Seat B', '2017-12-20', b'1', 'Atlanta', '295'),
('Fl2A', 'Plane 2 Seat B', '2017-12-21', b'1', 'Chicago', '200'),
('FL4A', 'PLANE 4 SEAT A', '2017-12-31', b'1', 'Atlanta', '295'),
('FL2B', 'PLANE 2 SEAT B', '2017-12-23', b'1', 'Atlanta', '300'),
('FL3A', 'PLANE 3 SEAT A', '2017-12-25', b'1', 'Atlanta', '302'),
('FL5A', 'PLANE 4 SEAT A', '2017-12-28', b'1', 'Atlanta', '300'),
('FL6A', 'PLANE 6 SEAT A', '2017-12-21', b'1', 'Chicago', '450'),
('FL7A', 'PLANE 7 SEAT A', '2017-12-21', b'1', 'Chicago', '450'),
('FL6B', 'PLANE 6 SEAT B', '2017-12-29', b'1', 'Chicago', '400'),
('FL7B', 'PLANE 7 SEAT B', '2017-12-23', b'1', 'Chicago', '500'),
('FL8A', 'PLANE 8 SEAT A', '2017-12-31', b'1', 'Atlanta', '200'),
('FL9A', 'PLANE 6 SEAT A', '2017-12-21', b'1', 'Chicago', '450'),
('FS1A', 'PLANE 1 SEAT A', '2018-01-11', b'1', 'SAN FRANCISCO', '250'),
('FS1B', 'PLANE 1 SEAT B', '2017-12-21', b'1', 'SAN FRANCISCO', '310'),
('FS2A', 'PLANE 2 SEAT A', '2017-12-30', b'1', 'SAN FRANCISCO', '300'),
('FD1A', 'PLANE 1 SEAT A', '2017-12-21', b'1', 'DENVER', '200'),
('FD1B', 'PLANE 1 SEAT B', '2017-12-22', b'1', 'DENVER', '200'),
('FW1A', 'PLANE 1 SEAT A', '2017-12-23', b'1', 'SEATTLE', '400'),
('FW1B', 'PLANE 1 SEAT B', '2017-12-27', b'1', 'SEATTLE', '450'),
('FW2A', 'PLANE 2 SEAT A', '2017-12-25', b'1', 'SEATTLE', '500'),
('FW2B', 'PLANE 2 SEAT B', '2017-12-13', b'1', 'DENVER', '500'),
('FW3A', 'PLANE 3 SEAT A', '2018-01-05', b'1', 'SEATTLE', '350'),
('FH1A', 'PLANE 1 SEAT A', '2017-12-22', b'1', 'HOUSTON', '300'),
('FH1B', 'PLANE 1 SEAT B', '2017-12-29', b'1', 'HOUSTON', '300'),
('FH2A', 'PLANE 2 SEAT A', '2017-12-16', b'1', 'HOUSTON', '350'),
('FB1A', 'PLANE 1 SEAT A', '2017-12-22', b'1', 'BOSTON', '250'),
('FB1B', 'PLANE 1 SEAT B', '2017-12-26', b'1', 'BOSTON', '275'),
('FM1A', 'PLANE 1 SEAT A', '2018-01-11', b'1', 'MIAMI', '250'),
('FM1B', 'PLANE 1 SEAT B', '2017-12-21', b'1', 'MIAMI', '310'),
('FM2A', 'PLANE 2 SEAT A', '2017-12-30', b'1', 'MIAMI', '300');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

DROP TABLE IF EXISTS `Users`;
CREATE TABLE IF NOT EXISTS `Users` (
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

INSERT INTO `Users` (`UserID`, `Username`, `Password`, `Firstname`, `Lastname`) VALUES
(137, 'user137', 'pass137', 'Bob', 'Jones'),
(881, 'user881', 'pass881', 'Bob', 'Barker'),
(883, 'a', 'a', 'vib', 'a'),
(884, 'cn', 'yn', 'CHANDRA', 'NEOPANE');
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
