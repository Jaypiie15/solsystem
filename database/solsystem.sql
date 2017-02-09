-- phpMyAdmin SQL Dump
-- version 4.5.1
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: Jan 30, 2017 at 08:30 AM
-- Server version: 10.1.13-MariaDB
-- PHP Version: 5.6.23

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `solsystem`
--

-- --------------------------------------------------------

--
-- Table structure for table `admin`
--

CREATE TABLE `admin` (
  `id` int(11) NOT NULL,
  `lastname` varchar(255) NOT NULL,
  `firstname` varchar(255) NOT NULL,
  `username` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `role` varchar(255) NOT NULL,
  `image` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `admin`
--

INSERT INTO `admin` (`id`, `lastname`, `firstname`, `username`, `password`, `role`, `image`) VALUES
(7, 'Bobila', 'John Paul', 'Jaypiiie15', '$2y$10$NlNQBU1.QRzkn.MDYfYSCufUJzA47/cqrJdffyQgrLeehZwO5rWsK', '0', 'images/user.png'),
(9, 'demo', 'demo', 'demo', '$2y$10$GGmPpPPSPOOja.cnDEow4.0Yiv34K.GOcRT0KCrtyZYpYPfn8jEBe', '1', 'images/img.jpg');

-- --------------------------------------------------------

--
-- Table structure for table `net_leaders`
--

CREATE TABLE `net_leaders` (
  `id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `net_leaders`
--

INSERT INTO `net_leaders` (`id`, `name`) VALUES
(1, 'Emerde Dequina'),
(2, 'James De Leon'),
(3, 'Ike Torres'),
(4, 'Val'),
(5, 'Raymond Ipaniz'),
(6, 'Dennis Sison'),
(7, 'Jerome Abogado'),
(8, 'Mark Padida'),
(9, 'Hermar Garcia'),
(10, 'Mj Rosete'),
(11, 'Vernon Armoreda'),
(12, 'Vandamme Armoreda'),
(13, 'Meriam Batan'),
(14, 'Shella Damian'),
(15, 'Linda'),
(16, 'Vanessa Armoreda'),
(17, 'Marra Canaoay'),
(18, 'Shiela Gonzales'),
(19, 'Mary Holanda'),
(20, 'Rowena Piacca'),
(21, 'Denzel Marantan'),
(22, 'Joy Tugay'),
(23, 'Geraldine Hapita'),
(24, 'Chem Bocal');

-- --------------------------------------------------------

--
-- Table structure for table `students`
--

CREATE TABLE `students` (
  `id` int(11) NOT NULL,
  `lastname` varchar(255) NOT NULL,
  `firstname` varchar(255) NOT NULL,
  `middlename` varchar(255) NOT NULL,
  `encounter_batch` varchar(255) NOT NULL,
  `sol_batch` varchar(255) NOT NULL,
  `cell_leader` varchar(255) NOT NULL,
  `net_leader` varchar(255) NOT NULL,
  `contact` varchar(11) NOT NULL,
  `training_level` varchar(255) NOT NULL,
  `status` varchar(255) NOT NULL,
  `disciples` varchar(255) NOT NULL,
  `remarks` varchar(255) NOT NULL,
  `show_tbl` varchar(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `students`
--

INSERT INTO `students` (`id`, `lastname`, `firstname`, `middlename`, `encounter_batch`, `sol_batch`, `cell_leader`, `net_leader`, `contact`, `training_level`, `status`, `disciples`, `remarks`, `show_tbl`) VALUES
(5, 'Bobila', 'Jaypiiie', 'Soliven', 'Nehemiah', 'Pending', 'Kuya Utoy', 'Vernon Armoreda', '0919339906', 'Post', 'celllead', 'Pending', 'Active', '1');

-- --------------------------------------------------------

--
-- Table structure for table `title`
--

CREATE TABLE `title` (
  `id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `title`
--

INSERT INTO `title` (`id`, `name`) VALUES
(1, 'School of Leaders');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admin`
--
ALTER TABLE `admin`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `net_leaders`
--
ALTER TABLE `net_leaders`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `students`
--
ALTER TABLE `students`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `title`
--
ALTER TABLE `title`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `admin`
--
ALTER TABLE `admin`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;
--
-- AUTO_INCREMENT for table `net_leaders`
--
ALTER TABLE `net_leaders`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=25;
--
-- AUTO_INCREMENT for table `students`
--
ALTER TABLE `students`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;
--
-- AUTO_INCREMENT for table `title`
--
ALTER TABLE `title`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
