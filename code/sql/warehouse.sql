-- phpMyAdmin SQL Dump
-- version 4.5.2
-- http://www.phpmyadmin.net
--
-- Host: localhost
-- Generation Time: Apr 25, 2016 at 01:42 PM
-- Server version: 10.1.10-MariaDB
-- PHP Version: 5.5.33

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `warehouse`
--

-- --------------------------------------------------------

--
-- Table structure for table `employers`
--

CREATE TABLE `employers` (
  `id` int(11) NOT NULL,
  `fname` varchar(120) NOT NULL,
  `lname` varchar(120) NOT NULL,
  `email` varchar(120) NOT NULL,
  `pnumber` varchar(120) NOT NULL,
  `address` varchar(120) NOT NULL,
  `username` varchar(120) NOT NULL,
  `password` varchar(120) NOT NULL,
  `photo_path` varchar(120) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `employers`
--

INSERT INTO `employers` (`id`, `fname`, `lname`, `email`, `pnumber`, `address`, `username`, `password`, `photo_path`) VALUES
(1, 'Amine', 'Mansouri', 'test8@email.com', '07957659428', 'Example, Address, London, EC1V', 'Employer1', '123', '../assets/images/user.png');

-- --------------------------------------------------------

--
-- Table structure for table `job`
--

CREATE TABLE `job` (
  `id` int(11) NOT NULL,
  `username` varchar(120) NOT NULL,
  `login_time` varchar(120) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `mail`
--

CREATE TABLE `mail` (
  `id` int(11) NOT NULL,
  `username_from` varchar(120) NOT NULL,
  `username` varchar(120) NOT NULL,
  `message` text NOT NULL,
  `pnumber` varchar(120) NOT NULL,
  `date_added` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `mail_to_employer`
--

CREATE TABLE `mail_to_employer` (
  `id` int(11) NOT NULL,
  `from_username` varchar(120) NOT NULL,
  `username` varchar(120) NOT NULL,
  `message` text NOT NULL,
  `pnumber` varchar(120) NOT NULL,
  `date_added` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `mail_to_manager`
--

CREATE TABLE `mail_to_manager` (
  `id` int(11) NOT NULL,
  `from_username` varchar(120) NOT NULL,
  `username` varchar(120) NOT NULL,
  `message` text NOT NULL,
  `pnumber` varchar(120) NOT NULL,
  `date_added` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `managers`
--

CREATE TABLE `managers` (
  `id` int(11) NOT NULL,
  `fname` varchar(120) NOT NULL,
  `lname` varchar(120) NOT NULL,
  `email` varchar(120) NOT NULL,
  `pnumber` varchar(120) NOT NULL,
  `address` varchar(120) NOT NULL,
  `username` varchar(120) NOT NULL,
  `password` varchar(120) NOT NULL,
  `photo_path` varchar(120) NOT NULL,
  `rota_path` varchar(120) NOT NULL,
  `role` varchar(120) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `managers`
--

INSERT INTO `managers` (`id`, `fname`, `lname`, `email`, `pnumber`, `address`, `username`, `password`, `photo_path`, `rota_path`, `role`) VALUES
(1000, 'Amine', 'Mansouri', 'test@email.com', '07957659428', 'Example, Address, London, EC1V', 'Manager1', '123', '../assets/images/user.png', '../assets/rotas/rota_example_1_htm.htm', 'DPS Management');

-- --------------------------------------------------------

--
-- Table structure for table `positions`
--

CREATE TABLE `positions` (
  `id` int(11) NOT NULL,
  `username` varchar(120) NOT NULL,
  `role` varchar(120) NOT NULL,
  `workstation` int(120) NOT NULL,
  `pnumber` varchar(120) NOT NULL,
  `target_gross` int(120) NOT NULL,
  `shift` varchar(120) NOT NULL,
  `breaktimes` varchar(120) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `positions`
--

INSERT INTO `positions` (`id`, `username`, `role`, `workstation`, `pnumber`, `target_gross`, `shift`, `breaktimes`) VALUES
(111, 'Employee1', 'DPS(Dynamic Picking System)', 50, '07957659428', 100, 'Middle', 'Normal'),
(222, 'Employee2', 'EPS(Ergonomic Picking System)', 12, '07957659428', 170, 'Late', 'Covering');

-- --------------------------------------------------------

--
-- Table structure for table `rotas`
--

CREATE TABLE `rotas` (
  `id` int(11) NOT NULL,
  `username` varchar(120) NOT NULL,
  `rota_path` varchar(120) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `rotas`
--

INSERT INTO `rotas` (`id`, `username`, `rota_path`) VALUES
(1, 'Test', '../assets/rotas/rota_example_1_htm.htm'),
(2, 'Manager1', '../assets/rotas/rota_example_1_htm.htm');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `fname` varchar(120) NOT NULL,
  `lname` varchar(120) NOT NULL,
  `email` varchar(120) NOT NULL,
  `pnumber` varchar(120) NOT NULL,
  `address` varchar(120) NOT NULL,
  `username` varchar(120) NOT NULL,
  `password` varchar(120) NOT NULL,
  `photo_path` varchar(120) NOT NULL,
  `rota_path` varchar(120) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `fname`, `lname`, `email`, `pnumber`, `address`, `username`, `password`, `photo_path`, `rota_path`) VALUES
(111, 'Amine', 'Mansouri', 'test@email.com', '07957659428', 'Example, Address, London, EC1V', 'Employee1', '123', '../assets/images/user.png', '../assets/rotas/rota_example_1_htm.htm'),
(222, 'Bob', 'Smith', 'test@email.com', '07957659428', 'Example, Address, London, EC1V', 'Employee2', '123', '../assets/images/user.png', '../assets/rotas/rota_example_1_htm.htm');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `employers`
--
ALTER TABLE `employers`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `job`
--
ALTER TABLE `job`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `mail`
--
ALTER TABLE `mail`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `mail_to_employer`
--
ALTER TABLE `mail_to_employer`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `mail_to_manager`
--
ALTER TABLE `mail_to_manager`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `managers`
--
ALTER TABLE `managers`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `positions`
--
ALTER TABLE `positions`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `rotas`
--
ALTER TABLE `rotas`
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
-- AUTO_INCREMENT for table `employers`
--
ALTER TABLE `employers`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT for table `job`
--
ALTER TABLE `job`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `mail`
--
ALTER TABLE `mail`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;
--
-- AUTO_INCREMENT for table `mail_to_employer`
--
ALTER TABLE `mail_to_employer`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
--
-- AUTO_INCREMENT for table `mail_to_manager`
--
ALTER TABLE `mail_to_manager`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `managers`
--
ALTER TABLE `managers`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT for table `positions`
--
ALTER TABLE `positions`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=223;
--
-- AUTO_INCREMENT for table `rotas`
--
ALTER TABLE `rotas`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
