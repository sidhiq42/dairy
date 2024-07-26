-- phpMyAdmin SQL Dump
-- version 4.0.4.1
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: Jul 15, 2024 at 07:44 PM
-- Server version: 5.5.32
-- PHP Version: 5.4.19

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `dairy`
--
CREATE DATABASE IF NOT EXISTS `dairy` DEFAULT CHARACTER SET latin1 COLLATE latin1_swedish_ci;
USE `dairy`;

-- --------------------------------------------------------

--
-- Table structure for table `bank`
--

CREATE TABLE IF NOT EXISTS `bank` (
  `id` int(10) NOT NULL AUTO_INCREMENT,
  `bakey` char(8) NOT NULL,
  `name` varchar(30) NOT NULL,
  `brname` varchar(30) NOT NULL,
  `ifsc` varchar(30) NOT NULL,
  `accno` varchar(15) NOT NULL,
  `accholdname` varchar(30) NOT NULL,
  `cardno` varchar(30) NOT NULL,
  `cvv` varchar(4) NOT NULL,
  `expmonth` varchar(2) NOT NULL,
  `expyear` varchar(4) NOT NULL,
  `totalamount` varchar(15) NOT NULL,
  `contact` varchar(15) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=4 ;

--
-- Dumping data for table `bank`
--

INSERT INTO `bank` (`id`, `bakey`, `name`, `brname`, `ifsc`, `accno`, `accholdname`, `cardno`, `cvv`, `expmonth`, `expyear`, `totalamount`, `contact`) VALUES
(1, 'akas1304', 'SBI', 'ayoor', 'SBIN1234567', '123456789', 'akash', '1234567891234567', '123', '12', '2026', '47812', '8854325754'),
(2, 'akas0113', 'CBI', 'ayoor', 'CBIN1234567', '123456789', 'aswin', '1234567891234568', '111', '11', '2025', '108094', '7654325788'),
(3, 'shin0113', 'FEDERAL', 'ayoor', 'FEDN1234567', '12345678', 'arun', '111222333444', '333', '10', '2024', '70150', '9845236850');

-- --------------------------------------------------------

--
-- Table structure for table `complaints`
--

CREATE TABLE IF NOT EXISTS `complaints` (
  `id` int(10) NOT NULL AUTO_INCREMENT,
  `ckey` char(8) NOT NULL,
  `complaint` text NOT NULL,
  `login_id` int(10) NOT NULL,
  `currentdate` date NOT NULL,
  `reply` varchar(255) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=5 ;

--
-- Dumping data for table `complaints`
--

INSERT INTO `complaints` (`id`, `ckey`, `complaint`, `login_id`, `currentdate`, `reply`) VALUES
(3, 'd8da0d1d', 'need to increase the products quality', 11, '2022-07-23', 'we will try our best to rectify it'),
(4, 'd1e57ecb', 'not good', 11, '2022-10-13', '');

-- --------------------------------------------------------

--
-- Table structure for table `farmreg`
--

CREATE TABLE IF NOT EXISTS `farmreg` (
  `id` int(10) NOT NULL AUTO_INCREMENT,
  `fkey` char(8) NOT NULL,
  `name` varchar(30) NOT NULL,
  `address` varchar(50) NOT NULL,
  `pincode` int(6) NOT NULL,
  `contact` varchar(12) NOT NULL,
  `district` varchar(50) NOT NULL,
  `city` varchar(30) NOT NULL,
  `regid` varchar(10) NOT NULL,
  `loginid` int(8) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=8 ;

--
-- Dumping data for table `farmreg`
--

INSERT INTO `farmreg` (`id`, `fkey`, `name`, `address`, `pincode`, `contact`, `district`, `city`, `regid`, `loginid`) VALUES
(7, '6a994e8e', 'akash', 'akash bhavan triruvananthapuram', 236559, '7298234786', 'Trivandrum', 'trivandrum', '1', 18);

-- --------------------------------------------------------

--
-- Table structure for table `jobvacancy`
--

CREATE TABLE IF NOT EXISTS `jobvacancy` (
  `id` int(10) NOT NULL AUTO_INCREMENT,
  `jkey` char(8) NOT NULL,
  `jobcategory` varchar(100) NOT NULL,
  `jobname` varchar(100) NOT NULL,
  `jobdescription` varchar(100) NOT NULL,
  `salary` int(10) NOT NULL,
  `lastdateforapply` varchar(10) NOT NULL,
  `qualification` varchar(100) NOT NULL,
  `currentdate` date NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=9 ;

--
-- Dumping data for table `jobvacancy`
--

INSERT INTO `jobvacancy` (`id`, `jkey`, `jobcategory`, `jobname`, `jobdescription`, `salary`, `lastdateforapply`, `qualification`, `currentdate`) VALUES
(8, 'd752cfe8', 'product sale', 'sale', 'need to sale products', 15000, '13-10-2022', 'BBA', '2022-10-11');

-- --------------------------------------------------------

--
-- Table structure for table `login`
--

CREATE TABLE IF NOT EXISTS `login` (
  `id` int(10) NOT NULL AUTO_INCREMENT,
  `lkey` char(8) NOT NULL,
  `email` varchar(30) NOT NULL,
  `password` varchar(32) NOT NULL,
  `status` enum('0','1','2') NOT NULL,
  `type` enum('0','1','2') NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=19 ;

--
-- Dumping data for table `login`
--

INSERT INTO `login` (`id`, `lkey`, `email`, `password`, `status`, `type`) VALUES
(7, 'aade82b3', 'admin@gmail.com', '87e5976fecbe11a7c6cb117bc89fec92', '2', '0'),
(17, 'a9b17ca1', 'leodas@gmail.com', '657b298b04e033810343842f993c9817', '1', '1'),
(18, '6977dc3b', 'akash@gmail.com', 'cb7c5f69ff356ecca55b7d08df877991', '1', '2');

-- --------------------------------------------------------

--
-- Table structure for table `notification`
--

CREATE TABLE IF NOT EXISTS `notification` (
  `id` int(10) NOT NULL AUTO_INCREMENT,
  `nkey` char(8) NOT NULL,
  `notification` varchar(100) NOT NULL,
  `login_id` int(10) NOT NULL,
  `currentdate` date NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=2 ;

--
-- Dumping data for table `notification`
--

INSERT INTO `notification` (`id`, `nkey`, `notification`, `login_id`, `currentdate`) VALUES
(1, '6cd5365a', 'new job vacancy available, visit the farm for more info', 0, '2022-07-17');

-- --------------------------------------------------------

--
-- Table structure for table `path`
--

CREATE TABLE IF NOT EXISTS `path` (
  `id` int(10) NOT NULL AUTO_INCREMENT,
  `bkey` char(8) NOT NULL,
  `loginid` int(10) NOT NULL,
  `productid` int(10) NOT NULL,
  `quantity` varchar(50) NOT NULL,
  `currentdate` date NOT NULL,
  `amount` varchar(20) NOT NULL,
  `status` enum('0','1') NOT NULL,
  `cancel_status` enum('0','1') NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=32 ;

--
-- Dumping data for table `path`
--

INSERT INTO `path` (`id`, `bkey`, `loginid`, `productid`, `quantity`, `currentdate`, `amount`, `status`, `cancel_status`) VALUES
(25, 'dccd6b7a', 11, 19, '4', '2022-10-12', '1000', '1', '0'),
(26, 'fa01f42e', 11, 18, '10', '2022-10-12', '240', '1', '0'),
(27, '837bffc4', 11, 0, '1', '2022-10-13', '0', '1', '0'),
(28, '7a896e6f', 11, 18, '4', '2022-10-13', '96', '0', '1'),
(29, 'd2d9c81d', 11, 18, '2', '2022-10-13', '48', '1', '1'),
(30, '66ab4a1e', 17, 18, '5', '2024-06-18', '120', '0', '0'),
(31, '1508492e', 17, 18, '5', '2024-06-18', '120', '0', '0');

-- --------------------------------------------------------

--
-- Table structure for table `payment`
--

CREATE TABLE IF NOT EXISTS `payment` (
  `id` int(10) NOT NULL AUTO_INCREMENT,
  `pakey` char(8) NOT NULL,
  `name` varchar(15) NOT NULL,
  `cardno` varchar(15) NOT NULL,
  `cvv` varchar(5) NOT NULL,
  `expmonth` varchar(10) NOT NULL,
  `expyear` varchar(10) NOT NULL,
  `totalamount` varchar(15) NOT NULL,
  `loginid` varchar(10) NOT NULL,
  `currentdate` date NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=26 ;

--
-- Dumping data for table `payment`
--

INSERT INTO `payment` (`id`, `pakey`, `name`, `cardno`, `cvv`, `expmonth`, `expyear`, `totalamount`, `loginid`, `currentdate`) VALUES
(5, '1b222092', 'Aswin J', '123456789123456', '333', '6', '1988', '3000', '11', '2022-09-05'),
(6, 'f929b6b7', 'akash', '123456789123456', '123', '12', '2026', '3000', '11', '2022-09-05'),
(7, 'bd47f22b', 'akash', '123456789123456', '123', '12', '2026', '120', '11', '2022-09-05'),
(8, '259e58d3', 'akash', '123456789123456', '123', '6', '1988', '140', '11', '2022-09-05'),
(9, '7e078ac9', 'akash', '123456789123456', '123', '6', '1988', '60', '11', '2022-09-05'),
(10, '11835e97', 'shino', '123456789123456', '333', '6', '1988', '2500', '11', '2022-09-05'),
(11, '442d9ce0', 'shino', '123456789123456', '333', '10', '2024', '5000', '11', '2022-09-05'),
(12, '9b3deb86', 'akash', '123456789123456', '123', '6', '1988', '0', '11', '2022-09-17'),
(13, '471fd022', 'akash', '123456789123456', '123', '6', '1988', '150', '11', '2022-09-17'),
(14, '73b5b5ab', 'akash', '123456789123456', '123', '6', '1988', '150', '11', '2022-09-17'),
(15, 'ab545d39', 'akash j', '123456789123456', '123', '6', '1988', '100', '10', '2022-09-21'),
(16, '84d3c7b2', 'akash j', '123456789123456', '123', '6', '1988', '100', '10', '2022-09-21'),
(17, '9fc79127', 'Aswin J', '123456789123456', '111', '11', '2025', '250', '10', '2022-09-21'),
(18, '41c903d4', 'Shino', '123456789123456', '333', '10', '2024', '100', '11', '2022-09-21'),
(19, '8cbb8793', 'arun', '111222333444', '333', '6', '1988', '150', '12', '2022-09-21'),
(20, '60dd8dca', 'arun', '111222333444', '333', '6', '1988', '150', '12', '2022-09-21'),
(21, '1c655ee3', 'akash', '123456789123456', '123', '6', '1988', '1000', '11', '2022-10-12'),
(22, '46ed509b', 'akash', '123456789123456', '123', '6', '1988', '1000', '11', '2022-10-12'),
(23, '09340a90', 'akash', '123456789123456', '123', '6', '1988', '240', '11', '2022-10-12'),
(24, 'c63ccca2', 'akash', '123456789123456', '123', '6', '2026', '0', '11', '2022-10-13'),
(25, '05aa125b', 'akash', '123456789123456', '123', '12', '2026', '48', '11', '2022-10-13');

-- --------------------------------------------------------

--
-- Table structure for table `product`
--

CREATE TABLE IF NOT EXISTS `product` (
  `id` int(10) NOT NULL AUTO_INCREMENT,
  `pkey` char(8) NOT NULL,
  `loginid` int(10) NOT NULL,
  `currentdate` date NOT NULL,
  `productcat` varchar(50) NOT NULL,
  `productname` varchar(50) NOT NULL,
  `details` varchar(100) NOT NULL,
  `quantity` varchar(50) NOT NULL,
  `image` text NOT NULL,
  `amount` varchar(30) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=21 ;

--
-- Dumping data for table `product`
--

INSERT INTO `product` (`id`, `pkey`, `loginid`, `currentdate`, `productcat`, `productname`, `details`, `quantity`, `image`, `amount`) VALUES
(18, 'e7b6ab41', 10, '2022-10-03', 'milk', 'toned milk', 'fat content minimal', '250ml', 'milk.jpg', '24'),
(19, '182c25cb', 10, '2022-10-03', 'dairy', 'paneer', 'It is a non-aged, non-melting soft cheese made by curdling milk with a fruit- or vegetable-derived a', '250g', 'paneer.jpg', '250'),
(20, 'e2ffb8cf', 10, '2022-10-13', 'dairy', 'curd', 'orginal curd', '1', 'Screenshot 2022-08-03 174043.png', '25');

-- --------------------------------------------------------

--
-- Table structure for table `product_feedback`
--

CREATE TABLE IF NOT EXISTS `product_feedback` (
  `id` int(10) NOT NULL AUTO_INCREMENT,
  `fekey` char(8) NOT NULL,
  `product_id` int(10) NOT NULL,
  `login_id` int(10) NOT NULL,
  `rating` varchar(10) NOT NULL,
  `comment` varchar(80) NOT NULL,
  `currentdate` date NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=4 ;

--
-- Dumping data for table `product_feedback`
--

INSERT INTO `product_feedback` (`id`, `fekey`, `product_id`, `login_id`, `rating`, `comment`, `currentdate`) VALUES
(1, 'e38b4af9', 15, 11, '4', 'very good', '2022-09-18'),
(2, '8a858231', 15, 11, '3', 'good', '2022-09-21'),
(3, '06b4ec7c', 15, 10, '5', 'good', '2022-09-21');

-- --------------------------------------------------------

--
-- Table structure for table `qualification`
--

CREATE TABLE IF NOT EXISTS `qualification` (
  `id` int(10) NOT NULL AUTO_INCREMENT,
  `qkey` char(8) NOT NULL,
  `fileupload` text NOT NULL,
  `currentdate` date NOT NULL,
  `jobid` int(10) NOT NULL,
  `loginid` int(10) NOT NULL,
  `status` enum('0','1','2') NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=8 ;

--
-- Dumping data for table `qualification`
--

INSERT INTO `qualification` (`id`, `qkey`, `fileupload`, `currentdate`, `jobid`, `loginid`, `status`) VALUES
(6, 'a86e596e', 'admin.png', '2022-10-12', 8, 11, '1'),
(7, '8a95a862', 'Screenshot 2022-08-02 165548.png', '2022-10-13', 8, 11, '0');

-- --------------------------------------------------------

--
-- Table structure for table `userreg`
--

CREATE TABLE IF NOT EXISTS `userreg` (
  `id` int(10) NOT NULL AUTO_INCREMENT,
  `ukey` char(8) NOT NULL,
  `name` varchar(30) NOT NULL,
  `address` varchar(50) NOT NULL,
  `pincode` int(6) NOT NULL,
  `district` varchar(30) NOT NULL,
  `city` varchar(30) NOT NULL,
  `gender` char(10) NOT NULL,
  `contact` varchar(12) NOT NULL,
  `loginid` int(10) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=10 ;

--
-- Dumping data for table `userreg`
--

INSERT INTO `userreg` (`id`, `ukey`, `name`, `address`, `pincode`, `district`, `city`, `gender`, `contact`, `loginid`) VALUES
(9, '66e3194d', 'leodas', 'leo vilas kollam', 907856, 'Kollam', 'kollam', 'male', '9078563426', 17);

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
