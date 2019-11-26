-- phpMyAdmin SQL Dump
-- version 4.9.0.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Nov 11, 2019 at 06:05 AM
-- Server version: 10.3.15-MariaDB
-- PHP Version: 7.3.6

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `jalanin`
--

-- --------------------------------------------------------

--
-- Table structure for table `accommodations`
--

CREATE TABLE `accommodations` (
  `accommodation_id` int(3) NOT NULL,
  `accommodation_name` varchar(100) NOT NULL,
  `photo` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `accommodations`
--

INSERT INTO `accommodations` (`accommodation_id`, `accommodation_name`, `photo`) VALUES
(1, 'Toyota Avanza', '274688.jpg'),
(2, 'Honda Jazz', '1200px-2018_Honda_Jazz_(GK5_MY18)_VTi-S_hatchback_(2018-08-06)_01.jpg'),
(3, 'Toyota Agya', 'Agya_Front.jpg');

-- --------------------------------------------------------

--
-- Table structure for table `admin`
--

CREATE TABLE `admin` (
  `admin_id` int(2) NOT NULL,
  `username` varchar(20) NOT NULL,
  `password` varchar(50) NOT NULL,
  `fullname` varchar(50) NOT NULL,
  `avatar` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `admin`
--

INSERT INTO `admin` (`admin_id`, `username`, `password`, `fullname`, `avatar`) VALUES
(1, 'admin', '21232f297a57a5a743894a0e4a801fc3', 'Admin Jalanin', 'default.png');

-- --------------------------------------------------------

--
-- Table structure for table `bank_option`
--

CREATE TABLE `bank_option` (
  `bank_id` int(3) NOT NULL,
  `bank_name` varchar(50) NOT NULL,
  `logo` varchar(100) NOT NULL,
  `rekening_number` varchar(50) NOT NULL,
  `fullname` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `bank_option`
--

INSERT INTO `bank_option` (`bank_id`, `bank_name`, `logo`, `rekening_number`, `fullname`) VALUES
(2, 'BNI', 'bni.png', '1826-1865-9865445-985', 'Muhammad Salman Ridlo'),
(3, 'Mandiri', 'mandiri.png', '1826-1865-9865445-985', 'Muhammad Salman Ridlo'),
(4, 'BCA', 'bca.png', '1826-1865-9865445-985', 'Muhammad Salman Ridlo'),
(5, 'BRI', 'bri.png', '56756-87655-65456', 'Ari Baskara');

-- --------------------------------------------------------

--
-- Table structure for table `booking_package`
--

CREATE TABLE `booking_package` (
  `kode_booking_package` varchar(8) NOT NULL,
  `package_id` int(11) NOT NULL,
  `user_id` int(5) NOT NULL,
  `start_tour` date NOT NULL,
  `price_id` int(11) NOT NULL,
  `address_start` varchar(255) NOT NULL,
  `booking_date` datetime NOT NULL,
  `sale` double NOT NULL,
  `payment_option` enum('','dp20','full') NOT NULL,
  `attachment` varchar(255) NOT NULL,
  `tour_guide_id` int(4) NOT NULL,
  `status` enum('99','0','1','11','2','3') NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `booking_package`
--

INSERT INTO `booking_package` (`kode_booking_package`, `package_id`, `user_id`, `start_tour`, `price_id`, `address_start`, `booking_date`, `sale`, `payment_option`, `attachment`, `tour_guide_id`, `status`) VALUES
('JLN00001', 1, 1, '2018-12-30', 1, 'Jalan Ahmad Yani No. 78, Jenggawah, Jember', '2018-12-17 20:10:52', 10, 'dp20', '766742694-73Ilustrasi-KTP.jpg,2039919452-KTP-600x416.jpg', 6, '3'),
('JLN00002', 1, 7, '2019-01-02', 2, 'Jalan Ahmad Yani No. 78, Jenggawah, Jember', '2018-12-17 20:45:29', 10, 'dp20', '207745847-73Ilustrasi-KTP.jpg,1613058148-download.jpg,647143506-KTP-600x416.jpg', 0, '3'),
('JLN00003', 1, 1, '2019-01-05', 2, 'Jalan Ahmad Yani No. 78, Jenggawah, Jember', '2018-12-18 12:05:36', 10, 'dp20', '1183164828-download.jpg,1907584270-KTP-600x416.jpg', 0, '3'),
('JLN00004', 1, 8, '2018-12-24', 2, 'Jalan Ahmad Yani No. 78, Jenggawah, Jember', '2018-12-18 20:36:58', 10, 'dp20', '2003097470-73Ilustrasi-KTP.jpg,245960807-download.jpg,630810555-KTP-600x416.jpg', 2, '3'),
('JLN00005', 1, 7, '2019-01-08', 2, 'Jalan Ahmad Yani No. 78, Jenggawah, Jember', '2018-12-19 09:38:21', 10, 'dp20', '749448822-73Ilustrasi-KTP.jpg', 5, '3'),
('JLN00006', 3, 1, '2018-12-13', 6, 'Jalan Ahmad Yani No. 78, Jenggawah, Jember', '2018-12-19 14:12:13', 5, 'dp20', '235422263-73Ilustrasi-KTP.jpg', 6, '3'),
('JLN00007', 1, 1, '2019-01-30', 2, 'Jalan Ahmad Yani No. 78, Jenggawah, Jember', '2019-01-17 07:15:19', 10, 'dp20', '1424711357-KTP-600x416.jpg', 3, '3'),
('JLN00008', 1, 1, '2019-01-27', 2, 'Jalan Ahmad Yani No. 78, Jenggawah, Jember', '2019-01-17 09:16:51', 10, 'dp20', '2000626691-KTP-600x416.jpg', 6, '3'),
('JLN00009', 1, 1, '2019-02-02', 1, 'Jalan Ahmad Yani No. 78, Jenggawah, Jember', '2019-01-17 10:05:58', 10, 'dp20', '1169265000-KTP-600x416.jpg', 6, '3'),
('JLN00010', 1, 1, '2019-01-21', 1, 'Jalan Ahmad Yani No. 78, Jenggawah, Jember', '2019-01-17 10:42:21', 10, 'dp20', '1199185861-KTP-600x416.jpg', 6, '3'),
('JLN00011', 1, 1, '2019-02-05', 1, 'Jalan Ahmad Yani No. 78, Jenggawah, Jember', '2019-01-17 10:54:38', 10, 'dp20', '1140539568-KTP-600x416.jpg', 4, '3'),
('JLN00012', 1, 1, '2019-02-08', 1, 'Jalan Ahmad Yani No. 78, Jenggawah, Jember', '2019-01-17 11:19:37', 10, 'dp20', '1825093711-KTP-600x416.jpg', 5, '3'),
('JLN00013', 2, 1, '2019-01-21', 3, 'Jalan Ahmad Yani No. 78, Jenggawah, Jember', '2019-01-17 12:08:03', 0, 'full', '777187248-KTP-600x416.jpg', 4, '3'),
('JLN00014', 1, 1, '2019-02-11', 1, 'Jalan Ahmad Yani No. 78, Jenggawah, Jember', '2019-01-17 13:08:07', 10, 'dp20', '2041362389-KTP-600x416.jpg', 2, '3'),
('JLN00015', 1, 1, '2019-01-24', 1, 'Jalan Ahmad Yani No. 78, Jenggawah, Jember', '2019-01-17 14:25:29', 10, 'full', '1322986199-KTP-600x416.jpg', 3, '3'),
('JLN00016', 1, 9, '2019-02-14', 1, 'Poncogati', '2019-01-31 17:25:38', 10, 'dp20', '1867776871-KTP-600x416.jpg', 6, '3'),
('JLN00017', 2, 10, '2019-06-23', 4, 'Jalan A', '2019-06-29 13:56:13', 0, 'full', '226996590-kiki.jpeg', 6, '3'),
('JLN00018', 2, 11, '2019-07-09', 4, 'Jalan A', '2019-07-01 08:54:28', 0, 'full', '1761847504-kiki.jpeg', 4, '3'),
('JLN00019', 5, 12, '2019-07-06', 9, 'Jalan A', '2019-07-02 22:35:40', 10, 'dp20', '1175500938-business-brochure-template-with-red-geometric-shapes_1201-187.jpg', 2, '3'),
('JLN00020', 5, 12, '2019-07-09', 9, 'Indonesia street', '2019-07-02 23:23:58', 10, '', '1667735509-27630.png', 0, '99'),
('JLN00021', 5, 12, '2019-07-15', 9, 'Indonesia street', '2019-07-03 09:41:29', 10, '', '406766614-ktp.jpg', 0, '99'),
('JLN00022', 5, 12, '2019-07-12', 9, 'Indonesia street', '2019-07-03 09:55:32', 10, '', '386173971-ktp.jpg', 0, '99'),
('JLN00023', 5, 12, '2019-07-18', 9, 'Indonesia street', '2019-07-03 10:09:43', 10, '', '2048852759-ktp.jpg', 0, '99'),
('JLN00024', 5, 12, '2019-07-21', 9, 'Indonesia street', '2019-07-03 10:21:33', 10, '', '1579595873-ktp.jpg', 0, '99'),
('JLN00025', 5, 12, '2019-07-24', 9, 'Indonesia street', '2019-07-03 10:43:24', 10, '', '2070119661-ktp.jpg', 0, '99');

-- --------------------------------------------------------

--
-- Table structure for table `branch_office`
--

CREATE TABLE `branch_office` (
  `office_id` int(3) NOT NULL,
  `city_id` int(3) NOT NULL,
  `address` text NOT NULL,
  `phone_number` varchar(30) NOT NULL,
  `img` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `branch_office`
--

INSERT INTO `branch_office` (`office_id`, `city_id`, `address`, `phone_number`, `img`) VALUES
(1, 1, 'Jalan Kh Ali Sekarputih', '+62 82313972908', '1.jpg'),
(2, 2, 'Jalan Mastrip Perum R-6', '+62 82313972908', '2.jpg');

-- --------------------------------------------------------

--
-- Table structure for table `categories`
--

CREATE TABLE `categories` (
  `category_id` int(3) NOT NULL,
  `category_name` varchar(50) NOT NULL,
  `icon` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `categories`
--

INSERT INTO `categories` (`category_id`, `category_name`, `icon`) VALUES
(1, 'Waterfall', 'waterfall.png'),
(2, 'Island', 'palm.png'),
(3, 'City', 'direction.png'),
(4, 'Mountain', 'mountain.png'),
(5, 'Beach', 'beach.png'),
(6, 'Restaurant', 'cutlery (2).png'),
(7, 'Others', 'map-of-roads.png');

-- --------------------------------------------------------

--
-- Table structure for table `city`
--

CREATE TABLE `city` (
  `city_id` int(3) NOT NULL,
  `province_id` int(3) NOT NULL,
  `city_name` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `city`
--

INSERT INTO `city` (`city_id`, `province_id`, `city_name`) VALUES
(1, 1, 'Bondowoso'),
(2, 1, 'Jember'),
(3, 2, 'Probolinggo');

-- --------------------------------------------------------

--
-- Table structure for table `custom_packages`
--

CREATE TABLE `custom_packages` (
  `custom_id` int(11) NOT NULL,
  `title` varchar(100) NOT NULL,
  `duration_id` int(3) NOT NULL,
  `room_id` int(11) NOT NULL,
  `trans_id` int(3) NOT NULL,
  `departure` datetime NOT NULL,
  `address` text NOT NULL,
  `ktp` varchar(1500) NOT NULL,
  `user_id` int(5) NOT NULL,
  `url` varchar(150) NOT NULL,
  `status` enum('0','1') NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `custom_packages`
--

INSERT INTO `custom_packages` (`custom_id`, `title`, `duration_id`, `room_id`, `trans_id`, `departure`, `address`, `ktp`, `user_id`, `url`, `status`) VALUES
(1, 'Tripku', 3, 3, 2, '2019-01-16 07:00:00', 'Bondowoso, Bondowoso', 'KTP-600x416.jpg', 1, 'tripku', '0'),
(2, 'Ini tripku', 2, 3, 2, '2019-01-19 05:00:00', 'Bondowoso, Bondowoso', 'KTP-600x416.jpg', 1, 'ini-tripku', '0'),
(3, 'Custom tripku keren', 3, 3, 3, '2019-01-19 06:00:00', 'Bondowoso, Bondowoso', 'KTP-600x416.jpg', 1, 'custom-tripku-keren', '0'),
(4, 'Tripku yang keren', 3, 3, 1, '2019-01-23 03:00:00', 'Bondowoso, Bondowoso', 'KTP-600x416.jpg', 1, 'tripku-yang-keren', '0'),
(5, 'Trip bulan madu', 3, 3, 2, '2019-01-26 01:00:00', 'Bondowoso, Bondowoso', 'KTP-600x416.jpg', 1, 'trip-bulan-madu', '0'),
(6, 'Tripku keren', 3, 3, 2, '2019-01-24 01:00:00', 'Bondowoso, Bondowoso', 'KTP-600x416.jpg', 1, 'tripku-keren', '0'),
(7, 'skjf', 1, 0, 1, '2019-01-18 10:15:00', 'Bondowoso, Bondowoso', 'brainly.PNG', 1, 'skjf', '0'),
(8, 'Trip Jalan Jalan', 3, 3, 1, '2019-01-19 03:00:00', 'Bondowoso, Bondowoso', 'KTP-600x416.jpg', 1, 'trip-jalan-jalan', '0'),
(9, 'Custom trip salman', 3, 3, 3, '2019-01-19 11:00:00', 'Jalan kh ali sekarputih', 'KTP-600x416.jpg', 1, 'custom-trip-salman', '0'),
(10, 'Tripku sendiri', 3, 1, 1, '2019-01-19 11:00:00', 'Jalan kh ali sekarputih', 'KTP-600x416.jpg', 1, 'tripku-sendiri', '0'),
(11, 'Trip Keluarga', 3, 3, 2, '2019-01-19 11:00:00', 'Jalan kh ali sekarputih', 'KTP-600x416.jpg', 1, 'trip-keluarga', '0'),
(12, 'Trip Akbar', 3, 3, 2, '2019-02-02 01:00:00', 'Poncogati', 'KTP-600x416.jpg', 9, 'trip-akbar', '0'),
(13, 'Trip Ku', 2, 3, 3, '2019-02-15 11:00:00', 'Jalan Raya Koncer', 'KTP-600x416.jpg', 1, 'trip-ku', '0'),
(14, 'Trip Menyenangkan', 3, 3, 2, '2019-06-30 02:00:00', 'Bondowoso, Bondowoso', 'kiki.jpeg', 10, 'trip-menyenangkan', '0'),
(15, 'My Trip', 3, 3, 3, '2019-07-13 05:00:00', 'Jalan A', 'kiki.jpeg', 11, 'my-trip', '0'),
(16, 'Amazing trip', 2, 2, 1, '2019-07-18 10:00:00', 'Bondowoso, Bondowoso', '1-10305_computer-icons-symbol-web-development-symmetry-email-and.png', 12, 'amazing-trip', '0'),
(17, 'Our trip', 3, 2, 2, '2019-07-13 11:00:00', 'Jember, East Java 68121, Indonesia', 'ktp.jpg', 12, 'our-trip', '0'),
(18, 'Go to papuma', 3, 1, 2, '2019-07-13 10:00:00', 'Jember, East Java 68121, Indonesia', 'ktp.jpg', 12, 'go-to-papuma', '0'),
(19, '', 3, 1, 2, '2019-07-17 14:30:00', '', 'ktp.jpg', 12, '', '0'),
(20, 'Go to papuma', 3, 2, 2, '2019-07-13 11:00:00', 'Jember, East Java 68121, Indonesia', 'ktp.jpg', 12, 'go-to-papuma', '0'),
(21, 'Go to papuma', 3, 3, 2, '2019-07-19 11:00:00', 'Jember, East Java 68121, Indonesia', 'ktp.jpg', 12, 'go-to-papuma', '0'),
(22, '', 2, 2, 1, '2019-07-17 11:00:00', 'Jember, East Java 68121, Indonesia', 'ktp.jpg', 12, '', '0'),
(23, 'my trip', 3, 2, 2, '2019-07-06 11:00:00', 'Jember, East Java 68121, Indonesia', 'ktp.jpg', 12, 'my-trip', '0');

-- --------------------------------------------------------

--
-- Table structure for table `custom_packages_itinerary`
--

CREATE TABLE `custom_packages_itinerary` (
  `itinerary_id` int(11) NOT NULL,
  `custom_id` int(11) NOT NULL,
  `start` time NOT NULL,
  `end` time NOT NULL,
  `title` varchar(100) NOT NULL,
  `description` text NOT NULL,
  `destination_id` int(4) NOT NULL,
  `day` int(2) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `custom_packages_itinerary`
--

INSERT INTO `custom_packages_itinerary` (`itinerary_id`, `custom_id`, `start`, `end`, `title`, `description`, `destination_id`, `day`) VALUES
(1, 1, '11:00:00', '12:00:00', 'Mendaki', 'Menjelajah batu solor', 8, 1),
(2, 1, '08:00:00', '10:00:00', 'Trip Ke Air Terjun Tancak Kembar', 'Rasakan pengalaman tak terlupakan dengan menjelajahi Air Terjun Tancak Kembar', 7, 2),
(3, 1, '08:00:00', '10:00:00', 'Trip Ke Kawah Ijen', 'Rasakan pengalaman tak terlupakan dengan menjelajahi Kawah Ijen', 1, 3),
(4, 2, '08:00:00', '10:00:00', 'Trip Ke Air Terjun Tancak Kembar', 'Rasakan pengalaman tak terlupakan dengan menjelajahi Air Terjun Tancak Kembar', 7, 1),
(5, 2, '08:00:00', '10:00:00', 'Trip Ke Kawah Ijen', 'Rasakan pengalaman tak terlupakan dengan menjelajahi Kawah Ijen', 1, 2),
(6, 2, '11:00:00', '12:00:00', 'Menjelajah Tancak Kembar', 'Sungguh menakjubkan', 7, 2),
(7, 3, '10:00:00', '12:00:00', 'Ngetrip gan', 'ke kawah wurung dulu', 2, 1),
(8, 3, '08:00:00', '10:00:00', 'Trip Ke Air Terjun Tancak Kembar', 'Rasakan pengalaman tak terlupakan dengan menjelajahi Air Terjun Tancak Kembar', 7, 2),
(9, 3, '08:00:00', '10:00:00', 'Trip Ke Kawah Wurung', 'Rasakan pengalaman tak terlupakan dengan menjelajahi Kawah Wurung', 2, 3),
(10, 4, '11:00:00', '12:00:00', 'jelajah', 'jelajahin', 7, 1),
(11, 4, '08:00:00', '10:00:00', 'Trip Ke Air Terjun Tancak Kembar', 'Rasakan pengalaman tak terlupakan dengan menjelajahi Air Terjun Tancak Kembar', 7, 2),
(12, 4, '08:00:00', '10:00:00', 'Trip Ke Kawah Wurung', 'Rasakan pengalaman tak terlupakan dengan menjelajahi Kawah Wurung', 2, 3),
(13, 5, '11:00:00', '13:00:00', 'trip to ijen', 'gg broh', 1, 1),
(14, 5, '08:00:00', '10:00:00', 'Trip Ke Air Terjun Tancak Kembar', 'Rasakan pengalaman tak terlupakan dengan menjelajahi Air Terjun Tancak Kembar', 7, 2),
(15, 5, '08:00:00', '10:00:00', 'Trip Ke Kawah Ijen', 'Rasakan pengalaman tak terlupakan dengan menjelajahi Kawah Ijen', 1, 3),
(16, 6, '16:00:00', '19:00:00', 'trip to tancak', 'sip', 7, 1),
(17, 6, '08:00:00', '10:00:00', 'Trip Ke Air Terjun Tancak Kembar', 'Rasakan pengalaman tak terlupakan dengan menjelajahi Air Terjun Tancak Kembar', 7, 2),
(18, 6, '08:00:00', '10:00:00', 'Trip Ke Kawah Wurung', 'Rasakan pengalaman tak terlupakan dengan menjelajahi Kawah Wurung', 2, 3),
(19, 7, '08:00:00', '10:00:00', 'Trip Ke Kawah Ijen', 'Rasakan pengalaman tak terlupakan dengan menjelajahi Kawah Ijen', 1, 1),
(20, 8, '13:00:00', '15:00:00', 'ke ijen', 'jelajah ijen', 1, 1),
(21, 8, '08:00:00', '10:00:00', 'Trip Ke Air Terjun Tancak Kembar', 'Rasakan pengalaman tak terlupakan dengan menjelajahi Air Terjun Tancak Kembar', 7, 2),
(22, 8, '08:00:00', '10:00:00', 'Trip Ke Kawah Ijen', 'Rasakan pengalaman tak terlupakan dengan menjelajahi Kawah Ijen', 1, 3),
(23, 9, '11:00:00', '12:00:00', 'Tancak Gan', 'mau mandi disini', 7, 1),
(24, 9, '08:00:00', '10:00:00', 'Trip Ke Air Terjun Tancak Kembar', 'Rasakan pengalaman tak terlupakan dengan menjelajahi Air Terjun Tancak Kembar', 7, 2),
(25, 9, '08:00:00', '10:00:00', 'Trip Ke Kawah Ijen', 'Rasakan pengalaman tak terlupakan dengan menjelajahi Kawah Ijen', 1, 3),
(26, 10, '11:00:00', '14:00:00', 'trip tp kawah wurung', 'sip ni', 2, 1),
(27, 10, '08:00:00', '10:00:00', 'Trip Ke Air Terjun Tancak Kembar', 'Rasakan pengalaman tak terlupakan dengan menjelajahi Air Terjun Tancak Kembar', 7, 2),
(28, 10, '08:00:00', '10:00:00', 'Trip Ke Kawah Wurung', 'Rasakan pengalaman tak terlupakan dengan menjelajahi Kawah Wurung', 2, 3),
(29, 11, '11:00:00', '12:00:00', 'Trip ke wurung', 'SIP', 2, 1),
(30, 11, '08:00:00', '10:00:00', 'Trip Ke Air Terjun Tancak Kembar', 'Rasakan pengalaman tak terlupakan dengan menjelajahi Air Terjun Tancak Kembar', 7, 2),
(31, 11, '08:00:00', '10:00:00', 'Trip Ke Kawah Wurung', 'Rasakan pengalaman tak terlupakan dengan menjelajahi Kawah Wurung', 2, 3),
(32, 12, '15:00:00', '18:00:00', 'trip ke wurung', 'ini tripku ke kawah wurung', 2, 1),
(33, 12, '08:00:00', '10:00:00', 'Trip Ke Air Terjun Tancak Kembar', 'Rasakan pengalaman tak terlupakan dengan menjelajahi Air Terjun Tancak Kembar', 7, 2),
(34, 12, '08:00:00', '10:00:00', 'Trip Ke Kawah Wurung', 'Rasakan pengalaman tak terlupakan dengan menjelajahi Kawah Wurung', 2, 3),
(35, 13, '08:00:00', '10:00:00', 'Trip Ke Pemandian Tasnan', 'Rasakan pengalaman tak terlupakan dengan menjelajahi Pemandian Tasnan', 11, 1),
(36, 13, '10:00:00', '12:00:00', 'trip ke air terjun', 'sip', 7, 1),
(37, 14, '08:00:00', '10:00:00', 'Trip Ke Pemandian Tasnan', 'Rasakan pengalaman tak terlupakan dengan menjelajahi Pemandian Tasnan', 11, 1),
(38, 14, '12:00:00', '13:00:00', 'Makan Dulu', 'Makan Yg banyak', 11, 1),
(39, 14, '08:00:00', '10:00:00', 'Trip Ke Air Terjun Tancak Kembar', 'Rasakan pengalaman tak terlupakan dengan menjelajahi Air Terjun Tancak Kembar', 7, 3),
(40, 15, '08:00:00', '10:00:00', 'Trip Ke Pemandian Tasnan', 'Rasakan pengalaman tak terlupakan dengan menjelajahi Pemandian Tasnan', 11, 1),
(41, 15, '11:00:00', '15:00:00', 'Jalan Jalan', 'Trip Menyenangkan', 8, 1),
(42, 15, '08:00:00', '10:00:00', 'Trip Ke Air Terjun Tancak Kembar', 'Rasakan pengalaman tak terlupakan dengan menjelajahi Air Terjun Tancak Kembar', 7, 3),
(43, 16, '08:00:00', '10:00:00', 'Trip to Air Terjun Tancak Kembar', 'Feel an unforgettable experience by exploring Air Terjun Tancak Kembar', 7, 1),
(44, 16, '08:00:00', '10:00:00', 'Trip to Kawah Wurung', 'Feel an unforgettable experience by exploring Kawah Wurung', 2, 2),
(45, 17, '08:00:00', '10:00:00', 'Trip to Pantai Papuma', 'Feel an unforgettable experience by exploring Pantai Papuma', 9, 1),
(46, 17, '08:00:00', '10:00:00', 'Go to papuma', 'enjoyy', 9, 1),
(47, 17, '08:00:00', '10:00:00', 'Trip to Pantai Papuma', 'Feel an unforgettable experience by exploring Pantai Papuma', 9, 2),
(48, 17, '08:00:00', '10:00:00', 'Trip to Pantai Papuma', 'Feel an unforgettable experience by exploring Pantai Papuma', 9, 3),
(49, 18, '08:00:00', '10:00:00', 'Trip to Pantai Papuma', 'Feel an unforgettable experience by exploring Pantai Papuma', 9, 1),
(50, 18, '09:00:00', '11:00:00', 'Go to papuma', 'enjoyyy', 9, 1),
(51, 18, '08:00:00', '10:00:00', 'Trip to Pantai Papuma', 'Feel an unforgettable experience by exploring Pantai Papuma', 9, 2),
(52, 18, '08:00:00', '10:00:00', 'Trip to Pantai Papuma', 'Feel an unforgettable experience by exploring Pantai Papuma', 9, 3),
(53, 19, '08:00:00', '10:00:00', 'Trip to Pemandian Tasnan', 'Feel an unforgettable experience by exploring Pemandian Tasnan', 11, 1),
(54, 20, '08:00:00', '10:00:00', 'Trip to Pantai Papuma', 'Feel an unforgettable experience by exploring Pantai Papuma', 9, 1),
(55, 20, '07:00:00', '10:00:00', 'Go to papuma', 'enjoyy', 9, 1),
(56, 20, '08:00:00', '10:00:00', 'Trip to Pantai Papuma', 'Feel an unforgettable experience by exploring Pantai Papuma', 9, 2),
(57, 20, '08:00:00', '10:00:00', 'Trip to Pantai Papuma', 'Feel an unforgettable experience by exploring Pantai Papuma', 9, 3),
(58, 21, '08:00:00', '10:00:00', 'Trip to Pantai Papuma', 'Feel an unforgettable experience by exploring Pantai Papuma', 9, 1),
(59, 21, '09:00:00', '11:00:00', 'Go to papuma', 'enjoyy', 9, 1),
(60, 21, '08:00:00', '10:00:00', 'Trip to Pantai Papuma', 'Feel an unforgettable experience by exploring Pantai Papuma', 9, 2),
(61, 21, '08:00:00', '10:00:00', 'Trip to Pantai Papuma', 'Feel an unforgettable experience by exploring Pantai Papuma', 9, 3),
(62, 22, '08:00:00', '10:00:00', 'Trip to Air Terjun Tancak Kembar', 'Feel an unforgettable experience by exploring Air Terjun Tancak Kembar', 7, 1),
(63, 22, '08:00:00', '10:00:00', 'Trip to Air Terjun Tancak Kembar', 'Feel an unforgettable experience by exploring Air Terjun Tancak Kembar', 7, 2),
(64, 23, '10:00:00', '11:00:00', 'go to waterfall', 'enjoyy', 7, 1),
(65, 23, '08:00:00', '10:00:00', 'Trip to Air Terjun Tancak Kembar', 'Feel an unforgettable experience by exploring Air Terjun Tancak Kembar', 7, 2),
(66, 23, '08:00:00', '10:00:00', 'Trip to Kawah Wurung', 'Feel an unforgettable experience by exploring Kawah Wurung', 2, 3);

-- --------------------------------------------------------

--
-- Table structure for table `destinations`
--

CREATE TABLE `destinations` (
  `destination_id` int(4) NOT NULL,
  `destination_name` varchar(100) NOT NULL,
  `city_id` int(3) NOT NULL,
  `category_id` int(3) NOT NULL,
  `tour_styles_id` varchar(20) NOT NULL,
  `overview` text NOT NULL,
  `img` varchar(255) NOT NULL,
  `information` text NOT NULL,
  `map` text NOT NULL,
  `url` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `destinations`
--

INSERT INTO `destinations` (`destination_id`, `destination_name`, `city_id`, `category_id`, `tour_styles_id`, `overview`, `img`, `information`, `map`, `url`) VALUES
(1, 'Kawah Ijen', 1, 4, '1,3', 'overview', 'ijen.jpg', 'information', '', 'kawah-ijen'),
(2, 'Kawah Wurung', 1, 4, '1,2,3', 'overview', 'wurung.jpg', 'information', '', 'kawah-wurung'),
(7, 'Air Terjun Tancak Kembar', 1, 1, '3,1', 'Air terjun ini memiliki ketinggian 1.100 mdpl. Uniknya, debit air yang mengalir di air terjun ini tidak pernah berkurang volume nya, meskipun saat musim kemarau. Air Terjun Tancak Kembar dapat dikatakan masih perawan, karena masih belum banyak terjamah oleh tangan manusia. Mengingat tempat nya yang sedikit terpencil, jarang sekali di temukan bangunan bangunan di kawasan ini. Untuk mencapai lokasi, wisatawan harus berjalan kaki kurang lebih selama 1 jam, dari desa terakhir. Karena akses jalan tidak memungkinkan untuk dilewati kendaraan.', '931871810-4.jpg,140567985-2.jpg,88985794-3.jpg,1999034272-1.jpg', '<p style=\"text-align:justify;\">Air Terjun Tancak Kembar dilatar-belakangi oleh kisah Dewi Rengganis, seorang wanita cantik yang merupakan seorang puteri dari Majapahit. Konon, dulunya sang Dewi ini melarikan diri dari kerajaan dikarenakan suatu hal. Dan tempat pelarian yang menjadi pilihan sang Dewi adalah gunung Argopuro. Menurut masyarakat setempat, Dewi ini lah yang menjadi penunggu dari Gunung Argopuro.</p><p style=\"text-align:justify;\">Dalam sehari hari nya, Dewi Rengganis mandi di sebuah air terjun yang berada di lereng Gunung Argopuro, yaitu Air Terjun Tancak Kembar. â€œTancakâ€ dalam bahasa Indonesia berarti air terjun, jadi Tancak kembar berarti Air terjun kembar. Memang ada dua air terjun yang terletak bersebelahan, dan jarak keduanya hanyalah 20 m.</p><p style=\"text-align:justify;\">Karena air terjun ini dulunya sering digunakan sebagai tempat mandi oleh Dewi Rengganis, konon katanya siapapun yang mandi dia Air terjun ini akan terlihat awet muda. Apabila wanita, akan semakin terlihat cantik dan apabila pria akan semakin terlihat tampan.</p>', 'https://www.google.com/maps/embed?pb=!1m14!1m8!1m3!1d15806.487319027161!2d113.6961948!3d-7.9345059!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x0%3A0x87433cc720dc2c85!2sTwin+Falls+Tancak!5e0!3m2!1sen!2sid!4v1543288491838', 'Air-Terjun-Tancak-Kembar'),
(8, 'Betoh So\'on Solor', 1, 4, '3,1', 'Bagi kamu yang ingin berlibur namun masih bingung mau pergi ke tempat wisata seperti apa, coba deh pergi berlibur ke sebuah tempat wisata yang bernama Batu Soâ€™on ini. Batu unik yang terletak di Desa Solor, Cermee, Solor, Bondowoso, Jawa Timur ini memang sangat cocok digunakan untuk kamu pecinta alam.', '1757810329-Betoh-Soon-Bondowoso.jpg,2100835403-solor_lomba-photograph1ft.jpg,622423973-IMG_9416.JPG,2073606861-22069602_1963851580540330_5516429495034183680_n.jpg', '<p>Bagi kamu yang ingin berlibur namun masih bingung mau pergi ke tempat wisata seperti apa, coba deh pergi berlibur ke sebuah tempat wisata yang bernama Batu Soâ€™on ini.&nbsp;<a href=\"https://www.tempat.me/tag/batu\">Batu</a> unik&nbsp;yang terletak di Desa Solor, Cermee, Solor, Bondowoso, Jawa Timur&nbsp;ini memang sangat cocok digunakan untuk kamu pecinta alam.</p>', 'https://www.google.com/maps/embed?pb=!1m14!1m8!1m3!1d15809.399501805323!2d114.0771382!3d-7.8584042!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x0%3A0xf98c1f84e9be7215!2sSo\'on+stone+Solor!5e0!3m2!1sen!2sid!4v1543630095723', 'betoh-soon-solor'),
(9, 'Pantai Papuma', 2, 5, '4,2,1', 'Pantai Papuma adalah salah satu pantai di Jawa Timur yang patut dikunjungi ditahun 2018 ini. Meskipun masih tergolong objek wisata baru, tapi pantai ini sudah tak diragukan lagi keindahannya.', '1461533780-tanjung-papuma-jember-pantai.jpg,674418298-maxresdefault.jpg,648903988-trip-hemat-pantai-pap-travel-paket-wisata-3947033.jpg,1532182068-IMG_9085.jpg', '<p><strong>Lokasi Alamat :</strong> Letaknya di Desa Lojejer, Kecamatan Wuluhan, Kabupaten Jember<br><strong>Rute Koordinat GPS Google Maps, Klik :</strong> <a href=\"https://www.google.co.id/maps/place/Pantai+Papuma/@-8.4310054,113.5515929,16z/data=!3m1!4b1!4m2!3m1!1s0x2dd682a6a4b5cd8d:0xb9c242f3a09e2d2e\">Petunjuk Arah Pantai Papuma Jember Jawa Timur</a><br><strong>Range Biaya / Harga Tiket Masuk (HTM) :</strong> Rp.15.000 / orang*. Parkir Motor Rp.5.000 dan Mobil Rp.10.000*<br><strong>Jam Operasional (Jam Buka / Jam Tutup) :</strong> â€“<br><strong>Nomer Telepon :</strong> â€“<br>*Harga bisa saja berubah sewaktu-waktu.</p><figure class=\"image ck-widget\" contenteditable=\"false\"><img src=\"https://atikofianti.files.wordpress.com/2013/05/papuma4.jpg?w=645&amp;resize=303%2C227\" alt=\"Pantai papuma jember jawa timur harga tiket masuk 2018 peta lokasi dimanfaatkan penduduk untuk kegiatan of east java photos map jatim indonesia wikipedia tanjung foto hotel lumajang banyuwangi ambulu malang penginapan asal usul\"><figcaption class=\"ck-editor__editable ck-editor__nested-editable\" contenteditable=\"true\" data-placeholder=\"Enter image caption\"><br><br><br><br><br><br data-cke-filler=\"true\"></figcaption></figure><p>Pantai Papuma adalah salah satu pantai di Jawa Timur yang patut dikunjungi ditahun 2018 ini. Meskipun masih tergolong objek wisata baru, tapi pantai ini sudah tak diragukan lagi keindahannya.</p><p>Pantai yang berlokasi di Desa Lojejer, Kecamatan Wuluhan, Kabupaten Jember ini memiliki keunikan tersendiri dengan batuan karang yang berada tepat di tengah laut.</p><p>Untuk mencapai Papuma, anda harus menempuh perjalanan sekitar 45 kilometer ke arah selatan kota Jember. Jika anda sedang mencari destinasi liburan di Jawa Timur, pantai ini bisa menjadi alternatif yang tepat.</p><p>Akses menuju pantai ini pun sudah bagus dengan jalanan beraspal. Anda dapat menempuhnya menggunakan kendaraan bermotor maupun mobil.</p><p>Begitu sampai di Papuma, anda akan melihat adanya batu karang yang cukup tinggi di tengah lautan. Batu karang yang memiliki ketinggian 50 mdpl ini dikenal dengan nama Siti Hinggil. Anda dapat menyaksikan keindahan laut lepas Pantai Papuma dari atas Siti Hinggil.<br><br><br><br><br><br><br data-cke-filler=\"true\"></p><figure class=\"image ck-widget\" contenteditable=\"false\"><img src=\"https://pignfrog.files.wordpress.com/2010/10/002.jpg?resize=1148%2C764\"><figcaption class=\"ck-editor__editable ck-editor__nested-editable\" contenteditable=\"true\" data-placeholder=\"Enter image caption\"><br><br><br><br><br><br data-cke-filler=\"true\"></figcaption></figure><p><br>Untuk mencapainya, anda bisa menyewa perahu nelayan. Selain melihat keindahan laut lepas, dari Siti Hinggil anda juga dapat menyaksikan pemandangan objek wisata lainnya yaitu Gua Lawa yang kedalamannya lebih dari 30 mdpl.</p><p><br><br><br><br><br><br data-cke-filler=\"true\"></p><p>Gua yang konon menjadi tempat bertapanya Kyai Mataram ini dapat dicapai saat air sedang surut.</p><p>Selain deretan karang yang unik, hamparan pasir putih dan keindahan sunset atau matahari terbenam menjadi daya tarik tersendiri bagi para wisatawan yang mengunjungi Papuma. Bahkan banyak orang yang mengatakan keindahan Papuma hampir menyerupai pantai di Hawaii.<br><br><br><br><br><br><br data-cke-filler=\"true\"></p><figure class=\"image ck-widget\" contenteditable=\"false\"><img src=\"https://lintangsasmita.files.wordpress.com/2014/05/csc_8875.jpg?resize=900%2C600\"><figcaption class=\"ck-editor__editable ck-editor__nested-editable\" contenteditable=\"true\" data-placeholder=\"Enter image caption\"><br><br><br><br><br><br data-cke-filler=\"true\"></figcaption></figure><p><br>Pantai ini sangat sejuk, dengan suhu udara antara 25 hingga 32 derajat celcius. Ombak lautnya yang tidak terlalu besar bisa dimanfaatkan untuk berenang sepuasnya.</p><p>Di sekeliling pantai juga terdapat cagar alam hutan tropis dimana terdapat monyet-monyet hutan yang semakin menambah semaraknya pantai ini.</p><p>Lokasi pantai juga biasa digunakan sebagai tempat untuk mengadakan acara Pekan Raya setiap tanggal 1-10 Syawal dan larung sesaji.</p><p>Pada waktu-waktu tersebut bisa dipastikan akan semakin banyak pengunjung yang bertandang ke Papuma untuk menyaksikan pagelaran acara tersebut sambil menikmati keindahan pantai.</p>', 'https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d7893.401791841375!2d113.55159292423966!3d-8.431005375748196!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x2dd682a6a4b5cd8d%3A0xb9c242f3a09e2d2e!2sPapuma+Beach!5e0!3m2!1sen!2sid!4v1543637623808', 'pantai-papuma'),
(10, 'Gunung Bromo', 3, 4, '5,4,3,2', 'Gunung Bromo atau dalam bahasa Tengger dieja \"Brama\", adalah sebuah gunung berapi aktif di Jawa Timur, Indonesia. Gunung ini memiliki ketinggian 2.329 meter di atas permukaan laut dan berada dalam empat wilayah kabupaten, yakni Kabupaten Probolinggo, Kabupaten Pasuruan, Kabupaten Lumajang, dan Kabupaten Malang.', '550210316-bromotourandtravel1.jpg,290656573-bromo_maulid.jpg,1460328494-gunung-bromo.jpg,615609589-P1010334.JPG', '<h2 style=\"text-align:center;\"><strong>Sejarah Gunung Bromo</strong></h2><p>Jaman dahulu&nbsp;ketika&nbsp;kerajaan majapahit menerima&nbsp;banyak serangan dari berbagai daerah, banyak penduduk pribumi jadi bingung&nbsp;mencari tempat tinggal baru sampai akhirnya mereka pisah jadi 2 bagian. Satu&nbsp;menuju ke Bali, dua menuju Gunung Bromo. Kedua tempat ini sampai sekarang memiliki&nbsp;kesamaan yaitu sama-sama menganut Agama Hindu.</p><p>Nama â€œTenggerâ€&nbsp;diyakini berasal dari&nbsp;Legenda Roro Anteng&nbsp;dan&nbsp;Joko Seger. â€œTengâ€ merupakan akhiran nama Roro An-â€œtengâ€ dan â€œgerâ€ merupakan akhiran nama dari Joko Se-â€œgerâ€ dan Gunung Bromo&nbsp;juga&nbsp;dipercaya sebagai gunung suci. Masyarakat Hindu menyebutnya dengan nama&nbsp;Gunung Brahma.&nbsp;Sedangkan&nbsp;orang Jawa menyebutnya Gunung Bromo.&nbsp;Kurang lebih seperti itulah&nbsp;asal â€“ usul dari legenda Gunung Bromo.</p><figure class=\"image ck-widget\" contenteditable=\"false\"><img src=\"https://www.yoshiwafa.com/wp-content/uploads/2014/12/Legenda-Roro-Anteng-dan-Joko-Seger.jpg\" alt=\"Legenda Roro Anteng dan Joko Seger\" srcset=\"https://www.yoshiwafa.com/wp-content/uploads/2014/12/Legenda-Roro-Anteng-dan-Joko-Seger.jpg 640w, https://www.yoshiwafa.com/wp-content/uploads/2014/12/Legenda-Roro-Anteng-dan-Joko-Seger-300x190.jpg 300w\" sizes=\"100vw\" width=\"560\"><figcaption class=\"ck-editor__editable ck-editor__nested-editable ck-hidden ck-placeholder\" contenteditable=\"true\" data-placeholder=\"Enter image caption\"><br data-cke-filler=\"true\"></figcaption></figure><h2 style=\"text-align:center;\"><strong>Tempat Wisata di Gunung Bromo</strong></h2><p><strong>Kawah Gunung Bromo</strong></p><figure class=\"image ck-widget\" contenteditable=\"false\"><img src=\"https://www.yoshiwafa.com/wp-content/uploads/2014/12/Kawah-gunung-bromo.jpg\" alt=\"Kawah Gunung Bromo\" srcset=\"https://www.yoshiwafa.com/wp-content/uploads/2014/12/Kawah-gunung-bromo.jpg 600w, https://www.yoshiwafa.com/wp-content/uploads/2014/12/Kawah-gunung-bromo-300x200.jpg 300w\" sizes=\"100vw\" width=\"560\"><figcaption class=\"ck-editor__editable ck-editor__nested-editable ck-hidden ck-placeholder\" contenteditable=\"true\" data-placeholder=\"Enter image caption\"><br data-cke-filler=\"true\"></figcaption></figure><p>Untuk dapat sampai di&nbsp;lokasi&nbsp;wisata Kawah Gunung Bromo, dari tempat parki Jeep para pengunjung dapat menggunakan jasa sewa kuda atau&nbsp;berjalan kaki kurang lebih sekitar 1,5 km untuk sampai di anak tangga yang jumlahnya&nbsp;sekitar 250. Jalan yang dilewati&nbsp;berpasir dan melewati Pura Suci Suku Tengger yang biasa di fungsikan untuk&nbsp;melaksanakn&nbsp;perayaan Yadya Kasada atau biasa disebut dengan nama Upacara Kasodo, menurut legendanya&nbsp;Kawah Bromo asalnya dari letusan gunung Tengger . Dengan garis tengah lebih kurang 800 meter (utara-selatan) dan lebih kurang 600 meter (timur-barat). Sedangkan&nbsp;kawasan yang berbahaya&nbsp;berupa lingkaran dengan jari-jari 4 km dari pusat kawah Gunung Bromo.</p><p><strong>Bukit Teletubies Gunung Bromo</strong></p><figure class=\"image ck-widget\" contenteditable=\"false\"><img src=\"https://www.yoshiwafa.com/wp-content/uploads/2014/12/Bukit-Teletubies-savanah-Gunung-Bromo.jpg\" alt=\"Bukit Teletubies savanah Gunung Bromo\" srcset=\"https://www.yoshiwafa.com/wp-content/uploads/2014/12/Bukit-Teletubies-savanah-Gunung-Bromo.jpg 600w, https://www.yoshiwafa.com/wp-content/uploads/2014/12/Bukit-Teletubies-savanah-Gunung-Bromo-300x188.jpg 300w\" sizes=\"100vw\" width=\"560\"><figcaption class=\"ck-editor__editable ck-editor__nested-editable ck-hidden ck-placeholder\" contenteditable=\"true\" data-placeholder=\"Enter image caption\"><br data-cke-filler=\"true\"></figcaption></figure><p>Merupakan sebuah padang-savanah yang&nbsp;biasa disebut dengan nama&nbsp;Bukit Teletubies Gunung Bromo&nbsp;dan&nbsp;dikelilingi deretan perbukitan. Sebuah pemandangan alam yang sangat sempurna, bisa dikatakan&nbsp;Gunung Bromo mempunyai&nbsp;pesona alam yang sangat komplit, mulai dari pemandangan matahari terbit yang indah, kemegahan kawah Wisata&nbsp;bromo, kaldera atau lautan padang pasir dan hamparan rumput yang terdapat di padang savanah ini.</p><p><strong>Pasir Berbisik Gunung Bromo</strong></p><figure class=\"image ck-widget\" contenteditable=\"false\"><img src=\"https://www.yoshiwafa.com/wp-content/uploads/2014/12/Pasir-Berbisik-Gunung-Bromo.jpg\" alt=\"Pasir Berbisik Gunung Bromo\" srcset=\"https://www.yoshiwafa.com/wp-content/uploads/2014/12/Pasir-Berbisik-Gunung-Bromo.jpg 640w, https://www.yoshiwafa.com/wp-content/uploads/2014/12/Pasir-Berbisik-Gunung-Bromo-300x199.jpg 300w\" sizes=\"100vw\" width=\"560\"><figcaption class=\"ck-editor__editable ck-editor__nested-editable ck-hidden ck-placeholder\" contenteditable=\"true\" data-placeholder=\"Enter image caption\"><br data-cke-filler=\"true\"></figcaption></figure><p>Merupakan&nbsp;hamparan lautan padang pasir hitam yang luas dan indah, lokasinya berada di sekitar Kaldera Gunung Bromo tepat pada bagian timur kawasan wisata Gunung Bromo .&nbsp;Tempat ini sekarang&nbsp;jadi populer sejak pernah dijadikan sebagai lokasi shooting film Pasir Berbisik yang dibintangi oleh dian Sastro Wardoyo. Berada ditengah lautan pasir terdapat sebuah pure yang biasa dijadikan sebagai tempat sembahyang masyarakat suku Tengger.</p><p><strong>Penanjakan Gunung Bromo</strong></p><figure class=\"image ck-widget\" contenteditable=\"false\"><img src=\"https://www.yoshiwafa.com/wp-content/uploads/2014/12/penanjakan-gunung-bromo.jpg\" alt=\"Penanjakan Gunung Bromo\" srcset=\"https://www.yoshiwafa.com/wp-content/uploads/2014/12/penanjakan-gunung-bromo.jpg 1200w, https://www.yoshiwafa.com/wp-content/uploads/2014/12/penanjakan-gunung-bromo-300x194.jpg 300w, https://www.yoshiwafa.com/wp-content/uploads/2014/12/penanjakan-gunung-bromo-1024x663.jpg 1024w\" sizes=\"100vw\" width=\"560\"><figcaption class=\"ck-editor__editable ck-editor__nested-editable ck-hidden ck-placeholder\" contenteditable=\"true\" data-placeholder=\"Enter image caption\"><br data-cke-filler=\"true\"></figcaption></figure><p>Gunung Bromo&nbsp;adalah&nbsp;lokasi terbaik di Indonesia untuk melihat matahari terbit yang sangat indah dan menawan. Untuk dapat mencapai Penanjakan Gunung Bromo, wisatawan bisa&nbsp;menggunakan&nbsp;jasa sewa&nbsp;jeep Bromo&nbsp;untuk mengantarkan sampai ke lokasi-lokasi wisata menarik di Gunung Bromo. Berangkat menuju&nbsp;Puncak Pananjakan Gunung Bromo harus&nbsp;dilakukan pada&nbsp;di dini hari pagi sekitar pukul 03.00 dan&nbsp;perjalanan&nbsp;dapat dimulai dari penginapan&nbsp;tempat Anda menginap&nbsp;di gunung bromo, supaya Anda tidak ketinggalan matahari terbit di kawasan wisata Gunung Bromo.</p><p><strong>Kebun Strawberry di Gunung Bromo</strong></p><figure class=\"image ck-widget\" contenteditable=\"false\"><img src=\"https://www.yoshiwafa.com/wp-content/uploads/2014/12/Kebun-Strawberry-di-Gunung-Bromo.jpg\" alt=\"Kebun Strawberry di Gunung Bromo\" srcset=\"https://www.yoshiwafa.com/wp-content/uploads/2014/12/Kebun-Strawberry-di-Gunung-Bromo.jpg 533w, https://www.yoshiwafa.com/wp-content/uploads/2014/12/Kebun-Strawberry-di-Gunung-Bromo-300x225.jpg 300w\" sizes=\"100vw\" width=\"560\"><figcaption class=\"ck-editor__editable ck-editor__nested-editable ck-hidden ck-placeholder\" contenteditable=\"true\" data-placeholder=\"Enter image caption\"><br data-cke-filler=\"true\"></figcaption></figure><p>Gunung Bromo tidak hanya menawarkan Anda&nbsp;pemandangan alam yang indah dan&nbsp;kebudayaan saja,&nbsp;dalam&nbsp;bidang Agrowisata Anda juga dapat menemukan kawasan&nbsp;wisata yang memiliki&nbsp;nuansa beda untuk&nbsp;di Gunung Bromo. Di kawasan wisata yang satu ini, Anda dapat langsung&nbsp;memetik buah strawberry sendiri langsung dari tangkai&nbsp;pohonnya. Lebih dari itu Anda juga dapat secara langsung menikmati&nbsp;manisnya strawbery khas Gunung Bromo.</p><p>Buah Strawbery yang tumbuh di Gunung&nbsp;Bromo ini beda dengan yang ada di daerah lain.&nbsp;Yang membuatnya berbeda,&nbsp;strawberry yang tumbuh di Gunung&nbsp;Bromo&nbsp;ini mempunyai&nbsp;cita&nbsp;rasa khas yang legit, dan berwarna merah merona. Jika Anda sedang berkunjung ke salah satu gunung yang tercantik di dunia ini, tidak ada salahnya mencoba untuk&nbsp;nikmati sensasi manis dan legitnya buah strawberry lereng Gunung Bromo.</p>', 'https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d31612.360113083476!2d112.93550256877971!3d-7.942493083851207!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x2dd637aaab794a41%3A0xada40d36ecd2a5dd!2sMt+Bromo!5e0!3m2!1sen!2sid!4v1545191421394', 'gunung-bromo'),
(11, 'Pemandian Tasnan', 1, 3, '5,3,2,1', 'Bagi kamu yang suka berenang dengan berbagai wahana air serta fasilitas lain yang menunjang keberadaan sebuah kolam renang kamu bisa datang ke Kolam Renang Tasnan Bondowoso, selain menyediakan kolam renang areanya yang berada di kawasan alam membuat lain dengan pemandangan khas Tasnan.', '1554128511-tasnan1.jpg,653728152-tasnan2.jpg,2082494180-tasnan3.jpg,2036143800-tasnan4.jpg', '<p>Bagi kamu yang suka berenang dengan berbagai wahana air serta fasilitas lain yang menunjang keberadaan sebuah kolam renang kamu bisa datang ke Kolam Renang Tasnan Bondowoso, selain menyediakan kolam renang areanya yang berada di kawasan alam membuat lain dengan pemandangan khas Tasnan.</p><p>Baca Juga:<a href=\"https://www.tripjalanjalan.com/kolam-renang-di-jakarta/\">Daftar Kolam Renang di Jakarta Beserta Tiket Masuk</a></p><p>Selain kamu berenang di kawasan kolam yang tidak jauh ada wisata baru yaitu Tasnan Forest, jadi jika kurang puas berenang kamu bisa mampir kesana. Kolam renang tasnan sangat segar karena air berasal dari sumber jadi jangan takut akan kaporit seperti kolam yang ada di kota pada umunya kamu disini aman mau kamu minum juga boleh tapi tidak disarankan ia heee. Selai kolam renang Bondowoso juga memilik tempat wisata menarik lainya seperti Air Terjun atau pendakian <a href=\"https://www.tripjalanjalan.com/gunung-di-jawa-timur/\">gunung argopuro.</a></p><figure class=\"image ck-widget\" contenteditable=\"false\"><img src=\"https://www.tripjalanjalan.com/wp-content/uploads/2018/03/kolam-renang-tasnan-bondowoso.jpg\" alt=\"\" srcset=\"https://www.tripjalanjalan.com/wp-content/uploads/2018/03/kolam-renang-tasnan-bondowoso.jpg 867w, https://www.tripjalanjalan.com/wp-content/uploads/2018/03/kolam-renang-tasnan-bondowoso-768x418.jpg 768w\" sizes=\"100vw\" width=\"867\"><figcaption class=\"ck-editor__editable ck-editor__nested-editable ck-hidden ck-placeholder\" contenteditable=\"true\" data-placeholder=\"Enter image caption\"><br data-cke-filler=\"true\"></figcaption></figure><p>Baca Juga:<a href=\"https://www.tripjalanjalan.com/lokasi-honeymoon-di-indonesia-yang-paling-romantis-yang-patut-kamu-kunjungi/\">Lokasi Honeymoon di Indonesia Yang Paling Romantis</a></p><p>Untuk lebih detail perihal harga tiket masuk kolam renang kolam tasnandan segala apa yang ada didalamnya dibawah ini beberapa point yang wajib kamu baca yang sobat Triper:</p><p>Berikut Lokasi dan Harga tiket masuk pemandian Tasnan:</p><h2>Fasilitas Kolam Renang Tasnan Bondowoso:</h2><ul><li>Kamar Mandi</li><li>Penyewaan Pelampung</li><li>Toilet</li><li>Parkir</li><li>Mushola</li><li>Taman</li><li>Joging Area</li><li>Dll</li></ul>', 'https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3951.1970768128363!2d113.80055876477928!3d-7.97857164425372!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x2dd6c25198969b55%3A0xe1a3a7adcb22b30d!2sPemandian+Tasnan!5e0!3m2!1sen!2sid!4v1548930971241', 'pemandian-tasnan');

-- --------------------------------------------------------

--
-- Table structure for table `durations`
--

CREATE TABLE `durations` (
  `duration_id` int(3) NOT NULL,
  `duration_time` int(2) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `durations`
--

INSERT INTO `durations` (`duration_id`, `duration_time`) VALUES
(1, 1),
(2, 2),
(3, 3),
(4, 4);

-- --------------------------------------------------------

--
-- Table structure for table `history_harga_custom`
--

CREATE TABLE `history_harga_custom` (
  `price_id` int(11) NOT NULL,
  `custom_id` int(11) NOT NULL,
  `price` int(11) NOT NULL,
  `acc` enum('0','1') NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `hotels`
--

CREATE TABLE `hotels` (
  `hotel_id` int(3) NOT NULL,
  `hotel_name` varchar(100) NOT NULL,
  `photo` varchar(100) NOT NULL,
  `star` int(1) NOT NULL,
  `address` varchar(200) NOT NULL,
  `descriptions` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `hotels`
--

INSERT INTO `hotels` (`hotel_id`, `hotel_name`, `photo`, `star`, `address`, `descriptions`) VALUES
(1, 'Hotel Palm', '5546_ho_01_p_2048x1536.jpg', 5, 'Jl. A. Yani No. 32', 'hotel palm'),
(2, 'Ijen View', 'hotel.jpg', 5, 'Jl. A. Yani No. 32', '');

-- --------------------------------------------------------

--
-- Table structure for table `itinerary`
--

CREATE TABLE `itinerary` (
  `itinerary_id` int(11) NOT NULL,
  `detail_package_id` int(11) NOT NULL,
  `destination_id` int(4) NOT NULL,
  `title` varchar(150) NOT NULL,
  `category_id` int(3) NOT NULL,
  `tour_styles_id` varchar(20) NOT NULL,
  `start_time` time NOT NULL,
  `end_time` time NOT NULL,
  `description` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `itinerary`
--

INSERT INTO `itinerary` (`itinerary_id`, `detail_package_id`, `destination_id`, `title`, `category_id`, `tour_styles_id`, `start_time`, `end_time`, `description`) VALUES
(1, 1, 0, 'Makan di Resto My Soto', 3, '2', '07:00:00', '08:00:00', 'Sarapan pagi untuk memulai trip!'),
(2, 1, 0, 'Wisata Kuliner', 4, '2', '16:00:00', '17:30:00', 'Wisata kuliner di gunung solor, makan khas yang sangat lezat'),
(3, 1, 0, 'Kembali Ke Hotel', 4, '3,2', '18:00:00', '21:00:00', 'Kembali ke hotel untuk beristirahat'),
(4, 2, 0, 'sarapan di hotel', 5, '3,2,1', '07:00:00', '08:00:00', 'sarapan di hotel dan juga persiapan perjalanan'),
(5, 2, 2, 'menaiki gunung kawah wurung', 4, '3,2', '08:00:00', '13:00:00', 'berpetualang di kawah wurung dan juga edukasi mengenal asal mula kawah wurung'),
(6, 2, 0, 'isoma', 4, '2', '13:00:00', '13:30:00', 'istirahat, sholat dan mandi'),
(7, 3, 0, 'Berangkat Dari Hotel', 3, '3', '00:00:00', '02:00:00', 'Berangkat tengah malam dari hotel'),
(8, 3, 1, 'Mendaki Gunung Kawah Ijen', 4, '3,1', '02:30:00', '03:30:00', 'Rasakan pengalaman tak terlupakan mendaki Destinasi wisata terindah di Bondowoso'),
(9, 3, 1, 'BLUE FIRE!', 4, '3,2,1', '03:45:00', '05:00:00', 'Menikmati Indahnya Blue Fire di kawah ijen'),
(10, 1, 8, 'Mendaki Gunung Solor', 4, '3,2,1', '09:00:00', '15:30:00', 'Gak bakal nyesel, gunung ini menantang. Pasti ketagihan'),
(11, 4, 9, 'mantai', 5, '4,3,1', '08:00:00', '12:00:00', 'mantai dulu'),
(12, 4, 9, 'mantai lagi', 5, '3', '13:00:00', '15:00:00', 'mantai lagi gan'),
(13, 5, 7, 'terjun air', 1, '3', '08:00:00', '19:00:00', 'disini kita mandi'),
(14, 6, 9, 'Mantai', 5, '5,4,3', '07:00:00', '12:00:00', 'mengenal tanaman organik, memanen'),
(15, 6, 0, 'Makan Di Restaurant', 6, '1', '14:00:00', '15:00:00', 'mengenal pertanian organik'),
(16, 7, 10, 'First Day - Wonderful Mount Bromo', 4, '3,2', '05:00:00', '10:00:00', 'Enjoy the beauty of the sunrise on Mount Bromo'),
(17, 8, 2, 'Second Day - Wonderful Kawah Wurung', 4, '3,2', '08:00:00', '12:00:00', 'Wurung Bondowoso Crater Tourism is a wilderness tour with a vast expanse of land overgrown with grass.'),
(18, 8, 1, 'Second Day - Wonderful Kawah ijen', 4, '3,2', '13:00:00', '17:00:00', 'The Ijen volcano complex is a group of composite volcanoes located on the border between ... The active crater at Kawah Ijen has a diameter of 722 metres (2,369 ft) and a surface area of 0.41 square kilometres (0.16 sq mi)'),
(19, 9, 9, 'Last Day - Wonderful Papuma Beach', 5, '2', '15:00:00', '18:00:00', 'Beside Watu Ulo beach, there is Papuma beach with its white sands that make it more interesting. The beautiful white sand is pleasure to see and to walk on.'),
(20, 10, 2, 'First Day - Wonderful Mount Bromo', 3, '5', '04:15:00', '06:05:00', 'kbhhcjbhjdahsj'),
(21, 11, 2, 'Second Day - Wonderful Kawah Wurung', 4, '4', '03:20:00', '21:05:00', 'nxcbxmcbzmcnxbmn'),
(22, 12, 10, 'First Day - Wonderful Mount Bromo', 4, '5,3,2', '05:00:00', '10:00:00', 'Mount Bromo, is an active volcano and part of the Tengger massif, in East Java, Indonesia. At 2,329 meters it is not the highest peak of the massif, but is the most well known.'),
(23, 12, 2, 'First Day - Wonderful Kawah Wurung', 4, '3,2', '20:00:00', '22:00:00', 'Wurung Bondowoso Crater Tourism is a wilderness tour with a vast expanse of land overgrown with grass.'),
(24, 13, 2, 'Second Day - Wonderful Kawah Wurung', 4, '5,3,2', '06:00:00', '11:00:00', 'Wurung Bondowoso Crater Tourism is a wilderness tour with a vast expanse of land overgrown with grass.'),
(25, 13, 1, 'Second Day - Wonderful Kawah ijen', 4, '3,2', '06:00:00', '11:00:00', 'Mount Ijen is an active volcano located on the border between Banyuwangi Regency and Bondowoso Regency, East Java, Indonesia. This mountain has an altitude of 2,779 masl and is located side by side with Mount Merapi. Mount Ijen last erupted in 1999.'),
(26, 14, 9, 'Last Day - Wonderful Papuma Beach', 5, '4,2', '08:00:00', '15:00:00', 'Papuma Beach is a beach that is a tourist spot in Jember Regency, East Java province, Indonesia.'),
(27, 14, 0, 'Las Day - Enjoy  East Java', 6, '2', '15:00:00', '18:00:00', 'Dinner Tradisional Food With Family');

-- --------------------------------------------------------

--
-- Table structure for table `list_pax`
--

CREATE TABLE `list_pax` (
  `kode_booking_package` varchar(8) NOT NULL,
  `pax_category_id` int(2) NOT NULL,
  `pax` int(1) NOT NULL,
  `ttl` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `list_pax`
--

INSERT INTO `list_pax` (`kode_booking_package`, `pax_category_id`, `pax`, `ttl`) VALUES
('JLN00001', 2, 1, 270000),
('JLN00001', 4, 5, 1250000),
('JLN00002', 2, 3, 900000),
('JLN00002', 4, 3, 810000),
('JLN00003', 2, 1, 300000),
('JLN00003', 4, 5, 1350000),
('JLN00004', 1, 1, 350000),
('JLN00004', 2, 2, 600000),
('JLN00004', 4, 3, 810000),
('JLN00005', 2, 1, 300000),
('JLN00005', 4, 2, 540000),
('JLN00006', 2, 1, 120000),
('JLN00006', 4, 1, 110000),
('JLN00007', 1, 1, 350000),
('JLN00007', 2, 3, 900000),
('JLN00007', 4, 1, 270000),
('JLN00008', 1, 1, 350000),
('JLN00008', 2, 2, 600000),
('JLN00008', 4, 3, 810000),
('JLN00009', 1, 1, 300000),
('JLN00009', 2, 2, 540000),
('JLN00009', 4, 3, 750000),
('JLN00010', 1, 1, 300000),
('JLN00010', 2, 2, 540000),
('JLN00010', 4, 3, 750000),
('JLN00011', 1, 1, 300000),
('JLN00011', 2, 2, 540000),
('JLN00011', 4, 3, 750000),
('JLN00012', 1, 1, 300000),
('JLN00012', 2, 2, 540000),
('JLN00012', 4, 3, 750000),
('JLN00013', 1, 1, 100000),
('JLN00013', 2, 2, 220000),
('JLN00013', 4, 3, 360000),
('JLN00014', 1, 1, 300000),
('JLN00014', 2, 2, 540000),
('JLN00014', 4, 3, 750000),
('JLN00015', 1, 1, 300000),
('JLN00015', 2, 2, 540000),
('JLN00015', 4, 3, 750000),
('JLN00016', 1, 1, 300000),
('JLN00016', 2, 2, 540000),
('JLN00016', 4, 3, 750000),
('JLN00017', 1, 1, 120000),
('JLN00017', 2, 2, 280000),
('JLN00017', 4, 3, 450000),
('JLN00018', 1, 2, 240000),
('JLN00018', 2, 3, 420000),
('JLN00018', 4, 4, 600000),
('JLN00019', 1, 10, 500000),
('JLN00019', 2, 1, 150000),
('JLN00019', 4, 1, 200000),
('JLN00020', 1, 4, 200000),
('JLN00020', 2, 4, 600000),
('JLN00020', 4, 4, 800000),
('JLN00021', 1, 2, 100000),
('JLN00021', 2, 2, 300000),
('JLN00021', 4, 4, 800000),
('JLN00022', 1, 2, 100000),
('JLN00022', 2, 3, 450000),
('JLN00022', 4, 4, 800000),
('JLN00023', 1, 2, 100000),
('JLN00023', 2, 3, 450000),
('JLN00023', 4, 2, 400000),
('JLN00024', 1, 2, 100000),
('JLN00024', 2, 3, 450000),
('JLN00024', 4, 4, 800000),
('JLN00025', 1, 2, 100000),
('JLN00025', 2, 3, 450000),
('JLN00025', 4, 3, 600000);

-- --------------------------------------------------------

--
-- Table structure for table `notif_admin`
--

CREATE TABLE `notif_admin` (
  `notif_id` int(11) NOT NULL,
  `kode_booking_package` varchar(8) NOT NULL,
  `status` enum('99','0','11','1','2','3') NOT NULL,
  `view` enum('0','1') NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `notif_admin`
--

INSERT INTO `notif_admin` (`notif_id`, `kode_booking_package`, `status`, `view`) VALUES
(1, 'JLN00002', '11', '1'),
(2, 'JLN00002', '2', '1'),
(5, 'JLN00001', '99', '1'),
(6, 'JLN00001', '11', '1'),
(7, 'JLN00003', '99', '1'),
(8, 'JLN00003', '11', '1'),
(9, 'JLN00003', '2', '1'),
(10, 'JLN00004', '99', '1'),
(11, 'JLN00004', '99', '1'),
(12, 'JLN00004', '11', '1'),
(13, 'JLN00004', '2', '1'),
(14, 'JLN00001', '2', '1'),
(15, 'JLN00005', '99', '1'),
(16, 'JLN00005', '11', '1'),
(17, 'JLN00005', '2', '1'),
(18, 'JLN00006', '99', '1'),
(19, 'JLN00006', '99', '1'),
(20, 'JLN00006', '11', '1'),
(21, 'JLN00006', '2', '1'),
(22, 'JLN00007', '99', '1'),
(23, 'JLN00007', '11', '1'),
(24, 'JLN00007', '2', '1'),
(25, 'JLN00008', '99', '1'),
(26, 'JLN00008', '99', '1'),
(27, 'JLN00008', '11', '1'),
(28, 'JLN00008', '2', '1'),
(29, 'JLN00009', '99', '1'),
(30, 'JLN00009', '99', '1'),
(31, 'JLN00009', '11', '1'),
(32, 'JLN00009', '2', '1'),
(33, 'JLN00010', '99', '1'),
(34, 'JLN00010', '99', '1'),
(35, 'JLN00010', '11', '1'),
(36, 'JLN00010', '2', '1'),
(37, 'JLN00011', '99', '1'),
(38, 'JLN00011', '99', '1'),
(39, 'JLN00011', '11', '1'),
(40, 'JLN00011', '2', '1'),
(41, 'JLN00012', '99', '1'),
(42, 'JLN00012', '99', '1'),
(43, 'JLN00012', '11', '1'),
(44, 'JLN00012', '2', '1'),
(45, 'JLN00013', '99', '1'),
(46, 'JLN00013', '99', '1'),
(47, 'JLN00013', '2', '1'),
(48, 'JLN00014', '99', '1'),
(49, 'JLN00014', '99', '1'),
(50, 'JLN00014', '11', '1'),
(51, 'JLN00014', '2', '1'),
(52, 'JLN00015', '99', '1'),
(53, 'JLN00015', '99', '1'),
(54, 'JLN00015', '2', '1'),
(55, 'JLN00016', '99', '1'),
(56, 'JLN00016', '99', '1'),
(57, 'JLN00016', '11', '1'),
(58, 'JLN00016', '2', '1'),
(59, 'JLN00017', '99', '1'),
(60, 'JLN00017', '99', '1'),
(61, 'JLN00017', '2', '1'),
(62, 'JLN00018', '99', '1'),
(63, 'JLN00018', '99', '1'),
(64, 'JLN00018', '2', '1'),
(65, 'JLN00019', '99', '1'),
(66, 'JLN00019', '11', '1'),
(67, 'JLN00019', '2', '1'),
(68, 'JLN00020', '99', '0'),
(69, 'JLN00021', '99', '0'),
(70, 'JLN00022', '99', '0'),
(71, 'JLN00023', '99', '0'),
(72, 'JLN00024', '99', '0'),
(73, 'JLN00025', '99', '0');

-- --------------------------------------------------------

--
-- Table structure for table `notif_user`
--

CREATE TABLE `notif_user` (
  `notif_id` int(11) NOT NULL,
  `user_id` int(5) NOT NULL,
  `kode_booking_package` varchar(8) NOT NULL,
  `status` enum('99','0','1','11','3') NOT NULL,
  `view` enum('0','1') NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `notif_user`
--

INSERT INTO `notif_user` (`notif_id`, `user_id`, `kode_booking_package`, `status`, `view`) VALUES
(2, 7, 'JLN00002', '0', '1'),
(3, 7, 'JLN00002', '1', '1'),
(4, 7, 'JLN00002', '3', '1'),
(6, 1, 'JLN00001', '99', '1'),
(7, 1, 'JLN00001', '0', '1'),
(8, 1, 'JLN00001', '11', '1'),
(9, 1, 'JLN00003', '99', '1'),
(10, 1, 'JLN00003', '0', '1'),
(11, 1, 'JLN00003', '1', '1'),
(12, 1, 'JLN00003', '3', '1'),
(13, 8, 'JLN00004', '99', '1'),
(14, 8, 'JLN00004', '0', '1'),
(15, 8, 'JLN00004', '1', '1'),
(16, 8, 'JLN00004', '3', '1'),
(17, 1, 'JLN00001', '1', '1'),
(18, 1, 'JLN00001', '3', '1'),
(19, 7, 'JLN00005', '0', '1'),
(20, 7, 'JLN00005', '1', '1'),
(21, 7, 'JLN00005', '3', '1'),
(22, 1, 'JLN00006', '99', '1'),
(23, 1, 'JLN00006', '0', '1'),
(24, 1, 'JLN00006', '1', '1'),
(25, 1, 'JLN00006', '3', '1'),
(26, 1, 'JLN00007', '0', '1'),
(27, 1, 'JLN00007', '1', '1'),
(28, 1, 'JLN00007', '3', '1'),
(29, 1, 'JLN00008', '99', '1'),
(30, 1, 'JLN00008', '0', '1'),
(31, 1, 'JLN00008', '1', '1'),
(32, 1, 'JLN00008', '3', '1'),
(33, 1, 'JLN00009', '99', '1'),
(34, 1, 'JLN00009', '0', '1'),
(35, 1, 'JLN00009', '1', '1'),
(36, 1, 'JLN00009', '3', '1'),
(37, 1, 'JLN00010', '99', '1'),
(38, 1, 'JLN00010', '0', '1'),
(39, 1, 'JLN00010', '1', '1'),
(40, 1, 'JLN00010', '3', '1'),
(41, 1, 'JLN00011', '99', '1'),
(42, 1, 'JLN00011', '0', '1'),
(43, 1, 'JLN00011', '1', '1'),
(44, 1, 'JLN00011', '3', '1'),
(45, 1, 'JLN00012', '99', '1'),
(46, 1, 'JLN00012', '0', '1'),
(47, 1, 'JLN00012', '1', '1'),
(48, 1, 'JLN00012', '3', '1'),
(49, 1, 'JLN00013', '99', '1'),
(50, 1, 'JLN00013', '0', '1'),
(51, 1, 'JLN00013', '3', '1'),
(52, 1, 'JLN00014', '99', '1'),
(53, 1, 'JLN00014', '0', '1'),
(54, 1, 'JLN00014', '1', '1'),
(55, 1, 'JLN00014', '3', '1'),
(56, 1, 'JLN00015', '99', '1'),
(57, 1, 'JLN00015', '0', '1'),
(58, 1, 'JLN00015', '3', '1'),
(59, 9, 'JLN00016', '99', '1'),
(60, 9, 'JLN00016', '0', '1'),
(61, 9, 'JLN00016', '1', '1'),
(62, 9, 'JLN00016', '3', '1'),
(63, 10, 'JLN00017', '99', '1'),
(64, 10, 'JLN00017', '0', '1'),
(65, 10, 'JLN00017', '3', '1'),
(66, 11, 'JLN00018', '99', '1'),
(67, 11, 'JLN00018', '0', '1'),
(68, 11, 'JLN00018', '3', '1'),
(69, 12, 'JLN00019', '0', '1'),
(70, 12, 'JLN00019', '1', '1'),
(71, 12, 'JLN00019', '3', '1');

-- --------------------------------------------------------

--
-- Table structure for table `packages`
--

CREATE TABLE `packages` (
  `package_id` int(11) NOT NULL,
  `package_name` varchar(150) NOT NULL,
  `duration_id` int(3) NOT NULL,
  `categories_id` varchar(30) NOT NULL,
  `tour_styles_id` varchar(30) NOT NULL,
  `img` varchar(255) NOT NULL,
  `overview` text NOT NULL,
  `others` text NOT NULL,
  `min_pax` int(3) NOT NULL,
  `max_pax` int(3) NOT NULL,
  `room_hotel_id` int(11) NOT NULL,
  `sale` double NOT NULL,
  `url` varchar(200) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `packages`
--

INSERT INTO `packages` (`package_id`, `package_name`, `duration_id`, `categories_id`, `tour_styles_id`, `img`, `overview`, `others`, `min_pax`, `max_pax`, `room_hotel_id`, `sale`, `url`) VALUES
(1, 'Jalanin Bondowoso', 3, '2,3,4,5', '3,2,1', '1757810329-Betoh-Soon-Bondowoso.jpg', 'Kami menyediakan paket cinta keluarga untuk keluarga yang ingin bertamasya sekaligus edukasi untuk orang tua mauoun anak-anak', '', 1, 6, 2, 10, 'Cinta-Keluarga'),
(2, 'Jalanin Jember', 2, '1,2,3,4,5', '4,3,2,1', '1782373668-674418298-maxresdefault.jpg', 'Kabupaten Jember adalah kabupaten di Provinsi Jawa Timur, Indonesia yang beribukota di Jember. Kabupaten ini berbatasan dengan Kabupaten Probolinggo dan Kabupaten Bondowoso di utara, Kabupaten Banyuwangi di timur, Samudera Hindia di selatan, dan Kabupaten Lumajang di barat. Kabupaten Jember terdiri dari 31 kecamatan.', '', 1, 10, 2, 0, 'jalanin-jember'),
(3, 'Kebun Polije', 1, '3', '2,1', 'kebun.jpg', 'panen sayur organik', '', 1, 3, 3, 5, 'kebun-polije'),
(4, 'asdasd', 2, '4', '5', '1968476306-bali.jpg', 'assjkgjagjvcgu', '', 1, 12, 1, 10, 'asdasd'),
(5, 'Wonderful East Java', 3, '4,5', '5,3,2', '311472224-east java.jpg', 'Explore East Java holidays and discover the best time and places to visit. ', '', 2, 12, 2, 10, 'wonderful-east-java');

-- --------------------------------------------------------

--
-- Table structure for table `packages_price`
--

CREATE TABLE `packages_price` (
  `price_id` int(11) NOT NULL,
  `package_id` int(11) NOT NULL,
  `office_id` int(3) NOT NULL,
  `day_departure` varchar(3) NOT NULL,
  `time_departure` time NOT NULL,
  `accommodation_id` int(3) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `packages_price`
--

INSERT INTO `packages_price` (`price_id`, `package_id`, `office_id`, `day_departure`, `time_departure`, `accommodation_id`) VALUES
(1, 1, 1, 'h-0', '05:00:00', 1),
(2, 1, 2, 'h-0', '05:00:00', 2),
(3, 2, 1, 'h-0', '06:00:00', 1),
(4, 2, 2, 'h-0', '05:00:00', 2),
(5, 3, 1, 'h-0', '04:00:00', 3),
(6, 3, 2, 'h-0', '06:00:00', 2),
(7, 4, 1, 'h-1', '13:00:00', 1),
(8, 4, 1, 'h-1', '00:05:00', 1),
(9, 5, 1, 'h-1', '13:00:00', 1);

-- --------------------------------------------------------

--
-- Table structure for table `packages_price_detail`
--

CREATE TABLE `packages_price_detail` (
  `detail_id` int(11) NOT NULL,
  `price_id` int(11) NOT NULL,
  `pax_category_id` int(2) NOT NULL,
  `price` int(11) NOT NULL,
  `sale` double NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `packages_price_detail`
--

INSERT INTO `packages_price_detail` (`detail_id`, `price_id`, `pax_category_id`, `price`, `sale`) VALUES
(1, 1, 4, 250000, 0),
(2, 1, 2, 270000, 0),
(3, 1, 1, 300000, 0),
(4, 2, 4, 270000, 0),
(5, 2, 2, 300000, 0),
(6, 2, 1, 350000, 0),
(7, 3, 4, 120000, 0),
(8, 3, 2, 110000, 0),
(9, 3, 1, 100000, 0),
(10, 4, 4, 150000, 0),
(11, 4, 2, 140000, 0),
(12, 4, 1, 120000, 0),
(13, 5, 4, 100000, 0),
(14, 5, 2, 110000, 0),
(15, 5, 1, 120000, 0),
(16, 6, 4, 110000, 0),
(17, 6, 2, 120000, 0),
(18, 6, 1, 130000, 0),
(19, 7, 4, 350000, 0),
(20, 7, 2, 250000, 0),
(21, 7, 1, 50000, 0),
(22, 8, 4, 120000, 0),
(23, 8, 2, 10000, 0),
(24, 8, 1, 5000, 0),
(25, 9, 4, 200000, 0),
(26, 9, 2, 150000, 0),
(27, 9, 1, 50000, 0);

-- --------------------------------------------------------

--
-- Table structure for table `package_detail`
--

CREATE TABLE `package_detail` (
  `detail_package_id` int(11) NOT NULL,
  `package_id` int(11) NOT NULL,
  `day` int(2) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `package_detail`
--

INSERT INTO `package_detail` (`detail_package_id`, `package_id`, `day`) VALUES
(1, 1, 1),
(2, 1, 2),
(3, 1, 3),
(4, 2, 1),
(5, 2, 2),
(6, 3, 1),
(7, 4, 1),
(8, 4, 2),
(9, 4, 3),
(10, 4, 1),
(11, 4, 2),
(12, 5, 1),
(13, 5, 2),
(14, 5, 3);

-- --------------------------------------------------------

--
-- Table structure for table `pax_categories`
--

CREATE TABLE `pax_categories` (
  `pax_category_id` int(2) NOT NULL,
  `name_pax_category` varchar(20) NOT NULL,
  `range_age` varchar(6) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `pax_categories`
--

INSERT INTO `pax_categories` (`pax_category_id`, `name_pax_category`, `range_age`) VALUES
(1, 'Child', '0-12'),
(2, 'Teenager', '13-17'),
(4, 'Adult', '18-+');

-- --------------------------------------------------------

--
-- Table structure for table `payment`
--

CREATE TABLE `payment` (
  `payment_id` int(11) NOT NULL,
  `kode_booking_package` varchar(8) NOT NULL,
  `nominal` int(11) NOT NULL,
  `bukti` varchar(100) NOT NULL,
  `tgl_bayar` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `payment`
--

INSERT INTO `payment` (`payment_id`, `kode_booking_package`, `nominal`, `bukti`, `tgl_bayar`) VALUES
(3, 'JLN00002', 307800, '8317-btn_8.png', '2018-12-19 00:00:00'),
(5, 'JLN00002', 1368000, '9158-mandiri_11.png', '2018-12-18 05:00:00'),
(6, 'JLN00001', 273600, '27586-btn_8.png', '2018-12-18 06:06:00'),
(7, 'JLN00003', 297000, '25355-btn_8.png', '2018-12-17 00:00:00'),
(8, 'JLN00003', 1320000, '21435-mandiri_11.png', '2018-12-17 05:00:00'),
(9, 'JLN00004', 316800, '17335-btn_8.png', '2018-12-19 04:00:00'),
(10, 'JLN00004', 1408000, '18212-mandiri_11.png', '2018-12-18 18:00:00'),
(11, 'JLN00001', 1216000, '32458-mandiri_11.png', '2018-12-13 00:00:00'),
(12, 'JLN00005', 151200, '4095-btn_8.png', '2018-12-19 09:38:56'),
(13, 'JLN00005', 672000, '27731-mandiri_11.png', '2018-12-19 09:41:07'),
(14, 'JLN00006', 43700, '7068-btn_8.png', '2018-12-19 14:14:04'),
(15, 'JLN00006', 184000, '31141-mandiri_11.png', '2018-12-19 14:14:59'),
(16, 'JLN00007', 273600, '7276-btn_8.png', '2019-01-17 07:23:11'),
(17, 'JLN00007', 1216000, '15864-btn_8.png', '2019-01-17 07:36:38'),
(18, 'JLN00008', 316800, '18012-btn_8.png', '2019-01-17 09:19:12'),
(19, 'JLN00008', 1408000, '11621-btn_8.png', '2019-01-17 09:19:39'),
(20, 'JLN00009', 286200, '19002-btn_8.png', '2019-01-17 10:07:09'),
(21, 'JLN00009', 1272000, '7309-btn_8.png', '2019-01-17 10:07:28'),
(22, 'JLN00010', 286200, '18319-btn_8.png', '2019-01-17 10:43:37'),
(23, 'JLN00010', 1272000, '30443-btn_8.png', '2019-01-17 10:43:58'),
(24, 'JLN00011', 286200, '27720-btn_8.png', '2019-01-17 10:55:55'),
(25, 'JLN00011', 1272000, '14876-btn_8.png', '2019-01-17 10:56:22'),
(26, 'JLN00012', 286200, '12344-btn_8.png', '2019-01-17 11:20:38'),
(27, 'JLN00012', 1272000, '18449-btn_8.png', '2019-01-17 11:20:59'),
(28, 'JLN00013', 680000, '15073-btn_8.png', '2019-01-17 12:09:31'),
(29, 'JLN00014', 286200, '15260-btn_8.png', '2019-01-17 13:09:43'),
(30, 'JLN00014', 1272000, '3446-btn_8.png', '2019-01-17 13:10:09'),
(31, 'JLN00015', 1431000, '20034-btn_8.png', '2019-01-17 14:26:31'),
(32, 'JLN00016', 286200, '31536-btn_8.png', '2019-01-31 17:27:54'),
(33, 'JLN00016', 1272000, '17321-btn_8.png', '2019-01-31 17:28:31'),
(34, 'JLN00017', 850000, '163718332-LOGO AJR TOUR & TRANSPORT CIRC..png', '2019-06-29 13:58:32'),
(35, 'JLN00018', 1260000, '387361982-LOGO AJR TOUR & TRANSPORT CIRC..png', '2019-07-01 08:57:01'),
(36, 'JLN00019', 153000, '1739765566-1-10305_computer-icons-symbol-web-development-symmetry-email-and.png', '2019-07-02 22:50:46'),
(37, 'JLN00019', 680000, '201087687-27630.png', '2019-07-02 22:52:44');

-- --------------------------------------------------------

--
-- Table structure for table `province`
--

CREATE TABLE `province` (
  `province_id` int(3) NOT NULL,
  `province_name` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `province`
--

INSERT INTO `province` (`province_id`, `province_name`) VALUES
(1, 'East Java'),
(2, 'Central Java'),
(3, 'Bali');

-- --------------------------------------------------------

--
-- Table structure for table `room_hotel`
--

CREATE TABLE `room_hotel` (
  `room_hotel_id` int(11) NOT NULL,
  `room_type` enum('Duluxe','Family','Superior') NOT NULL,
  `hotel_id` int(3) NOT NULL,
  `room_description` text NOT NULL,
  `img` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `room_hotel`
--

INSERT INTO `room_hotel` (`room_hotel_id`, `room_type`, `hotel_id`, `room_description`, `img`) VALUES
(1, 'Duluxe', 1, 'f', 'room-palm.jpg'),
(2, 'Family', 2, 'g', 'room-ijen.jpg'),
(3, 'Superior', 1, 'Room dengan kemewahan dan kelengkapan fasilitasnya', 'room.jpg');

-- --------------------------------------------------------

--
-- Table structure for table `tour_guide`
--

CREATE TABLE `tour_guide` (
  `tour_guide_id` int(4) NOT NULL,
  `tour_guide_name` varchar(50) NOT NULL,
  `photo` varchar(50) NOT NULL,
  `nomor_handphone` varchar(50) NOT NULL,
  `address` varchar(50) NOT NULL,
  `description` varchar(255) NOT NULL,
  `Tarif` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tour_guide`
--

INSERT INTO `tour_guide` (`tour_guide_id`, `tour_guide_name`, `photo`, `nomor_handphone`, `address`, `description`, `Tarif`) VALUES
(2, 'Fathan Ridlo', '1.jpg', '082313986532', 'Jalan Raya Maesan Bondowoso', 'Teruslah bermimpi, walau kenyataannya jauh berbeda. Percayalah, lelah ini hanya sebentar saja. Jangan menyerah, walaupun tak mudah meraihnya.', 150000),
(3, 'Galih Bagus', '2.jpg', '082313986588', 'Jalan Raya Koncer', 'Ini hidupku. Sekarang atau tidak sama sekali. Aku tak akan hidup selamanya. Aku hanya ingin benar-benar hidup saat aku masih punya nyawa.', 140000),
(4, 'Chandra Kurniawan', '3.jpg', '085398986537', 'Jalan Raya Badean', 'Apa yang tidak membunuhmu akan membuatmu semakin kuat.', 160000),
(5, 'Adi Cahya', '4.jpg', '082313986532', 'Jalan Rambutan', 'Kau bisa menyebutku bodoh, dan aku akan tersenyum. Aku tak ingin sukses dengan melakukan hal-hal yang tak ingin kulakukan.', 150000),
(6, 'Kevin Harlis', '5.jpg', '083313666131', 'Jalan Raya Koncer', 'Kau bisa menyebutku bodoh, dan aku akan tersenyum. Aku tak ingin sukses dengan melakukan hal-hal yang tak ingin kulakukan.', 120000);

-- --------------------------------------------------------

--
-- Table structure for table `tour_style`
--

CREATE TABLE `tour_style` (
  `tour_style_id` int(3) NOT NULL,
  `tour_style_name` varchar(100) NOT NULL,
  `icon` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tour_style`
--

INSERT INTO `tour_style` (`tour_style_id`, `tour_style_name`, `icon`) VALUES
(1, 'Education', 'knowledge.png'),
(2, 'Family', 'insurance.png'),
(3, 'Adventure', 'trekking.png'),
(4, 'Honey Moon', 'island.png'),
(5, 'Sport', 'bicycle.png');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `user_id` int(5) NOT NULL,
  `email` varchar(50) NOT NULL,
  `password` varchar(100) NOT NULL,
  `first_name` varchar(50) NOT NULL,
  `last_name` varchar(50) NOT NULL,
  `avatar` varchar(150) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`user_id`, `email`, `password`, `first_name`, `last_name`, `avatar`) VALUES
(1, 'davidsetya24@gmail.com', '172522ec1028ab781d9dfd17eaca4427', 'David Setya', 'Ainur Hakiki', 'default.png'),
(7, 'ck@gmail.com', 'd5a5b3dd1ccb90d30360f0c068fd43fc', 'Chandra', 'Kurniawan', 'default.png'),
(8, 'winda@gmail.com', 'aed2aec41bfd7ddb55b21f3ce206c66b', 'Winda', 'Kurniawati', 'default.png'),
(9, 'akbarjaya@gmail.com', '4f033a0a2bf2fe0b68800a3079545cd1', 'Akbar', 'Jaya', 'default.png'),
(10, 'nguyen@gmail.com', '27ff2ffe376b2edcc7c2de309173f0d8', 'Nguyen', 'Min A', 'default.png'),
(11, 'andis@gmail.com', 'c0d1ddd8785ebb1f33740b45efaa394f', 'Andis', 'A', 'default.png'),
(12, 'rakhmatfadilah@gmil.cum', 'd0503276f86a627d6c29bc963106570e', 'fadil', 'ah', 'default.png');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `accommodations`
--
ALTER TABLE `accommodations`
  ADD PRIMARY KEY (`accommodation_id`);

--
-- Indexes for table `admin`
--
ALTER TABLE `admin`
  ADD PRIMARY KEY (`admin_id`);

--
-- Indexes for table `bank_option`
--
ALTER TABLE `bank_option`
  ADD PRIMARY KEY (`bank_id`);

--
-- Indexes for table `booking_package`
--
ALTER TABLE `booking_package`
  ADD PRIMARY KEY (`kode_booking_package`);

--
-- Indexes for table `branch_office`
--
ALTER TABLE `branch_office`
  ADD PRIMARY KEY (`office_id`);

--
-- Indexes for table `categories`
--
ALTER TABLE `categories`
  ADD PRIMARY KEY (`category_id`);

--
-- Indexes for table `city`
--
ALTER TABLE `city`
  ADD PRIMARY KEY (`city_id`);

--
-- Indexes for table `custom_packages`
--
ALTER TABLE `custom_packages`
  ADD PRIMARY KEY (`custom_id`);

--
-- Indexes for table `custom_packages_itinerary`
--
ALTER TABLE `custom_packages_itinerary`
  ADD PRIMARY KEY (`itinerary_id`);

--
-- Indexes for table `destinations`
--
ALTER TABLE `destinations`
  ADD PRIMARY KEY (`destination_id`);

--
-- Indexes for table `durations`
--
ALTER TABLE `durations`
  ADD PRIMARY KEY (`duration_id`);

--
-- Indexes for table `history_harga_custom`
--
ALTER TABLE `history_harga_custom`
  ADD PRIMARY KEY (`price_id`);

--
-- Indexes for table `hotels`
--
ALTER TABLE `hotels`
  ADD PRIMARY KEY (`hotel_id`);

--
-- Indexes for table `itinerary`
--
ALTER TABLE `itinerary`
  ADD PRIMARY KEY (`itinerary_id`);

--
-- Indexes for table `notif_admin`
--
ALTER TABLE `notif_admin`
  ADD PRIMARY KEY (`notif_id`);

--
-- Indexes for table `notif_user`
--
ALTER TABLE `notif_user`
  ADD PRIMARY KEY (`notif_id`);

--
-- Indexes for table `packages`
--
ALTER TABLE `packages`
  ADD PRIMARY KEY (`package_id`);

--
-- Indexes for table `packages_price`
--
ALTER TABLE `packages_price`
  ADD PRIMARY KEY (`price_id`);

--
-- Indexes for table `packages_price_detail`
--
ALTER TABLE `packages_price_detail`
  ADD PRIMARY KEY (`detail_id`);

--
-- Indexes for table `package_detail`
--
ALTER TABLE `package_detail`
  ADD PRIMARY KEY (`detail_package_id`);

--
-- Indexes for table `pax_categories`
--
ALTER TABLE `pax_categories`
  ADD PRIMARY KEY (`pax_category_id`);

--
-- Indexes for table `payment`
--
ALTER TABLE `payment`
  ADD PRIMARY KEY (`payment_id`);

--
-- Indexes for table `province`
--
ALTER TABLE `province`
  ADD PRIMARY KEY (`province_id`);

--
-- Indexes for table `room_hotel`
--
ALTER TABLE `room_hotel`
  ADD PRIMARY KEY (`room_hotel_id`);

--
-- Indexes for table `tour_guide`
--
ALTER TABLE `tour_guide`
  ADD PRIMARY KEY (`tour_guide_id`);

--
-- Indexes for table `tour_style`
--
ALTER TABLE `tour_style`
  ADD PRIMARY KEY (`tour_style_id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`user_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `accommodations`
--
ALTER TABLE `accommodations`
  MODIFY `accommodation_id` int(3) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `admin`
--
ALTER TABLE `admin`
  MODIFY `admin_id` int(2) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `bank_option`
--
ALTER TABLE `bank_option`
  MODIFY `bank_id` int(3) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `branch_office`
--
ALTER TABLE `branch_office`
  MODIFY `office_id` int(3) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `categories`
--
ALTER TABLE `categories`
  MODIFY `category_id` int(3) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `city`
--
ALTER TABLE `city`
  MODIFY `city_id` int(3) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `custom_packages`
--
ALTER TABLE `custom_packages`
  MODIFY `custom_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=24;

--
-- AUTO_INCREMENT for table `custom_packages_itinerary`
--
ALTER TABLE `custom_packages_itinerary`
  MODIFY `itinerary_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=67;

--
-- AUTO_INCREMENT for table `destinations`
--
ALTER TABLE `destinations`
  MODIFY `destination_id` int(4) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT for table `durations`
--
ALTER TABLE `durations`
  MODIFY `duration_id` int(3) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `history_harga_custom`
--
ALTER TABLE `history_harga_custom`
  MODIFY `price_id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `hotels`
--
ALTER TABLE `hotels`
  MODIFY `hotel_id` int(3) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `itinerary`
--
ALTER TABLE `itinerary`
  MODIFY `itinerary_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=28;

--
-- AUTO_INCREMENT for table `notif_admin`
--
ALTER TABLE `notif_admin`
  MODIFY `notif_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=74;

--
-- AUTO_INCREMENT for table `notif_user`
--
ALTER TABLE `notif_user`
  MODIFY `notif_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=72;

--
-- AUTO_INCREMENT for table `packages`
--
ALTER TABLE `packages`
  MODIFY `package_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `packages_price`
--
ALTER TABLE `packages_price`
  MODIFY `price_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `packages_price_detail`
--
ALTER TABLE `packages_price_detail`
  MODIFY `detail_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=28;

--
-- AUTO_INCREMENT for table `package_detail`
--
ALTER TABLE `package_detail`
  MODIFY `detail_package_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- AUTO_INCREMENT for table `pax_categories`
--
ALTER TABLE `pax_categories`
  MODIFY `pax_category_id` int(2) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `payment`
--
ALTER TABLE `payment`
  MODIFY `payment_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=38;

--
-- AUTO_INCREMENT for table `province`
--
ALTER TABLE `province`
  MODIFY `province_id` int(3) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `room_hotel`
--
ALTER TABLE `room_hotel`
  MODIFY `room_hotel_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `tour_guide`
--
ALTER TABLE `tour_guide`
  MODIFY `tour_guide_id` int(4) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `tour_style`
--
ALTER TABLE `tour_style`
  MODIFY `tour_style_id` int(3) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `user_id` int(5) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
