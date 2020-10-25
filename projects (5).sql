-- phpMyAdmin SQL Dump
-- version 4.7.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Oct 28, 2019 at 06:57 AM
-- Server version: 10.1.24-MariaDB
-- PHP Version: 7.1.6

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `projects`
--

-- --------------------------------------------------------

--
-- Table structure for table `anc_reg`
--

CREATE TABLE `anc_reg` (
  `ANC_id` int(11) NOT NULL,
  `ANC_no` varchar(255) DEFAULT NULL,
  `name1` varchar(255) NOT NULL,
  `age` int(100) NOT NULL,
  `address1` varchar(255) NOT NULL,
  `marital_status` varchar(255) NOT NULL,
  `phone` bigint(20) NOT NULL,
  `date_of_visit` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `weight1` int(11) NOT NULL,
  `height` int(11) NOT NULL,
  `sex` varchar(100) NOT NULL,
  `state1` varchar(200) NOT NULL,
  `image` varchar(255) NOT NULL,
  `user_no` varchar(255) NOT NULL,
  `pass` varchar(255) NOT NULL,
  `role` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `anc_reg`
--

INSERT INTO `anc_reg` (`ANC_id`, `ANC_no`, `name1`, `age`, `address1`, `marital_status`, `phone`, `date_of_visit`, `weight1`, `height`, `sex`, `state1`, `image`, `user_no`, `pass`, `role`) VALUES
(1, 'ANC/19/1', 'FOLAYAN ADESOLA', 17, 'iperin strre', 'single', 8133762201, '2019-08-31 13:13:19', 66, 89, 'FEMALE', 'OYO', '6tanike 20170717_175408.jpg', 'OPT201903', '12b3638553c1f4a535a047e7003d9ac4', 'Mother'),
(2, 'ANC/19/2', 'FOLAYAN ADENIKE', 29, 'iperin strre', 'married', 8133762201, '2019-08-31 13:14:37', 88, 101, 'FEMALE', 'EKITI', '6tanike 20170717_175408.jpg', 'OPT201903', 'fcea920f7412b5da7be0cf42b8c93759', 'Mother'),
(3, 'ANC/19/3', 'RACHEAL CELINDA', 34, 'testing....', 'married', 7045223022, '2019-10-24 18:35:52', 66, 101, 'FEMALE', 'ONDO', '080-736-56934 20171228_190026.jpg', 'OPT201902', 'fcea920f7412b5da7be0cf42b8c93759', '');

-- --------------------------------------------------------

--
-- Table structure for table `drugs`
--

CREATE TABLE `drugs` (
  `id` int(11) NOT NULL,
  `ANC_no` varchar(255) NOT NULL,
  `tt_dos` int(11) NOT NULL,
  `tt_date` date NOT NULL,
  `fan_q` int(11) NOT NULL,
  `fan_date` date NOT NULL,
  `meb` date NOT NULL,
  `itn` date NOT NULL,
  `deworm` date NOT NULL,
  `iron` date NOT NULL,
  `user_no` varchar(255) NOT NULL,
  `date_of_visit` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `age` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `drugs`
--

INSERT INTO `drugs` (`id`, `ANC_no`, `tt_dos`, `tt_date`, `fan_q`, `fan_date`, `meb`, `itn`, `deworm`, `iron`, `user_no`, `date_of_visit`, `age`) VALUES
(1, 'ANC/19/1', 1, '2019-08-08', 2, '2019-08-13', '2019-08-08', '2019-08-07', '2019-08-14', '2019-08-07', 'OPT201902', '2019-08-31 13:01:45', 17),
(2, 'ANC/19/2', 2, '2019-08-15', 3, '2019-08-08', '2019-08-16', '2019-08-07', '2019-08-13', '2019-08-08', 'OPT201904', '2019-08-31 13:01:45', 29);

-- --------------------------------------------------------

--
-- Table structure for table `obsectric`
--

CREATE TABLE `obsectric` (
  `id` int(11) NOT NULL,
  `ANC_no` varchar(255) NOT NULL,
  `gradity` int(11) NOT NULL,
  `parity` int(11) NOT NULL,
  `no_child` int(11) NOT NULL,
  `lmp` date NOT NULL,
  `edd` int(11) NOT NULL,
  `gest_age` int(11) NOT NULL,
  `stillbirth` int(11) NOT NULL,
  `abortion` int(11) NOT NULL,
  `c_section` int(11) NOT NULL,
  `user_no` varchar(255) NOT NULL,
  `date_of_visit` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `age` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `obsectric`
--

INSERT INTO `obsectric` (`id`, `ANC_no`, `gradity`, `parity`, `no_child`, `lmp`, `edd`, `gest_age`, `stillbirth`, `abortion`, `c_section`, `user_no`, `date_of_visit`, `age`) VALUES
(1, 'ANC/19/1', 1, 1, 1, '2019-08-06', 42, 23, 1, -1, 1, 'OPT201902', '2019-08-31 13:02:40', 17),
(2, 'ANC/19/2', 2, 1, 1, '2019-06-06', 44, 24, 1, 1, 1, 'OPT201904', '2019-08-31 13:02:40', 29);

-- --------------------------------------------------------

--
-- Table structure for table `pregna_out`
--

CREATE TABLE `pregna_out` (
  `id` int(11) NOT NULL,
  `ANC_no` varchar(255) NOT NULL,
  `complication` varchar(255) NOT NULL,
  `delivery` varchar(255) NOT NULL,
  `user_no` varchar(255) NOT NULL,
  `date_of_visit` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `age` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `pregna_out`
--

INSERT INTO `pregna_out` (`id`, `ANC_no`, `complication`, `delivery`, `user_no`, `date_of_visit`, `age`) VALUES
(1, 'ANC/19/1', 'PPH', '2019-08-13', 'OPT201902', '2019-08-31 13:04:20', 17),
(29, 'ANC/19/2', 'PS', '2019-08-16', 'OPT201904', '2019-08-31 13:04:20', 29);

-- --------------------------------------------------------

--
-- Table structure for table `risk_factors`
--

CREATE TABLE `risk_factors` (
  `rk_id` int(11) NOT NULL,
  `ANC_no` varchar(255) NOT NULL,
  `date1` date NOT NULL,
  `gestation_age` int(11) NOT NULL,
  `hb` varchar(255) NOT NULL,
  `ANC_RF` varchar(255) NOT NULL,
  `visit_week` int(11) NOT NULL,
  `user_no` varchar(255) NOT NULL,
  `date_of_visit` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `age` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `risk_factors`
--

INSERT INTO `risk_factors` (`rk_id`, `ANC_no`, `date1`, `gestation_age`, `hb`, `ANC_RF`, `visit_week`, `user_no`, `date_of_visit`, `age`) VALUES
(1, 'ANC/19/1', '2019-08-06', 23, 'high', 'A', 1, 'OPT201902', '2019-08-31 13:04:47', 17),
(2, 'ANC/19/1', '2019-08-14', 27, 'high', 'A', 2, 'OPT201902', '2019-08-31 13:04:47', 17),
(3, 'ANC/19/1', '2019-08-16', 33, 'high', 'O', 3, 'OPT201902', '2019-08-31 13:04:47', 17),
(4, 'ANC/19/1', '2019-11-22', 40, 'high', 'A', 4, 'OPT201902', '2019-08-31 13:04:47', 17),
(5, 'ANC/19/2', '2019-09-10', 32, 'low', 'O', 1, 'OPT201904', '2019-08-31 13:04:47', 29),
(6, 'ANC/19/2', '2019-10-15', 36, 'high', 'O', 2, 'OPT201904', '2019-08-31 13:04:47', 29),
(7, 'ANC/19/2', '2019-12-11', 40, 'high', 'P', 3, 'OPT201904', '2019-08-31 13:04:47', 29),
(8, 'ANC/19/2', '2020-02-12', 45, 'high', 'A', 4, 'OPT201904', '2019-08-31 13:04:47', 29);

-- --------------------------------------------------------

--
-- Table structure for table `test`
--

CREATE TABLE `test` (
  `test_id` int(11) NOT NULL,
  `ANC_no` varchar(255) NOT NULL,
  `hiv` varchar(100) NOT NULL,
  `test_hiv` varchar(100) NOT NULL,
  `bp` bigint(20) NOT NULL,
  `rh` varchar(100) NOT NULL,
  `ultra` varchar(100) NOT NULL,
  `ARV` varchar(100) NOT NULL,
  `urine` varchar(255) NOT NULL,
  `user_no` varchar(255) NOT NULL,
  `date_of_visit` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `age` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `test`
--

INSERT INTO `test` (`test_id`, `ANC_no`, `hiv`, `test_hiv`, `bp`, `rh`, `ultra`, `ARV`, `urine`, `user_no`, `date_of_visit`, `age`) VALUES
(1, 'ANC/19/1', 'yes', 'negative', 20, 'negative', 'yes', 'yes', '', 'OPT201902', '2019-08-31 13:05:14', 17),
(2, 'ANC/19/2', 'yes', 'negative', 26, 'negative', 'yes', 'yes', '', 'OPT201904', '2019-08-31 13:05:14', 29);

-- --------------------------------------------------------

--
-- Table structure for table `user_all`
--

CREATE TABLE `user_all` (
  `user_id` int(11) NOT NULL,
  `user_no` varchar(255) NOT NULL,
  `name` varchar(255) NOT NULL,
  `address` varchar(255) NOT NULL,
  `role` varchar(255) NOT NULL,
  `phone` varchar(255) NOT NULL,
  `pass` varchar(255) NOT NULL,
  `image` varchar(255) NOT NULL,
  `age` int(11) NOT NULL,
  `status` varchar(255) NOT NULL,
  `gender` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `user_all`
--

INSERT INTO `user_all` (`user_id`, `user_no`, `name`, `address`, `role`, `phone`, `pass`, `image`, `age`, `status`, `gender`) VALUES
(1, 'OPT201901', 'FOLAYAN ADESOLA', '    iperin str, osun state', 'Administrator', '08138467941', 'f4eeb831ce1635a4688316d5320a7e71', 'â€ª+234 807 436 6815â€¬ 20170717_175038.jpg', 20, 'Married', 'Female'),
(2, 'OPT201902', 'ADE FOLAYAN', '        osan ekiti ora', 'Doctor', '08132303932', '12b3638553c1f4a535a047e7003d9ac4', 'â€ª+234 813 846 7941â€¬ 20170818_195038.jpg', 33, 'Married', 'Male'),
(3, 'OPT201903', 'ADENIBO JAMES', '    odo-ofa kwara state', 'Doctor', '0813476983', '12b3638553c1f4a535a047e7003d9ac4', 'â€ª+234 814 397 3323â€¬ 20170713_050540.jpg', 30, 'Married', 'Male'),
(7, 'OPT201907', 'JOHNSON OPEYEMI', 'odo-ota', 'Receptionist', '08166956505', 'f4eeb831ce1635a4688316d5320a7e71', 'Bro Segun2 20170718_183611.jpg', 24, 'married', 'MALE');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `anc_reg`
--
ALTER TABLE `anc_reg`
  ADD PRIMARY KEY (`ANC_id`),
  ADD UNIQUE KEY `ANC_id` (`ANC_no`);

--
-- Indexes for table `drugs`
--
ALTER TABLE `drugs`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `ANC_no` (`ANC_no`);

--
-- Indexes for table `obsectric`
--
ALTER TABLE `obsectric`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `ANC_no` (`ANC_no`);

--
-- Indexes for table `pregna_out`
--
ALTER TABLE `pregna_out`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `ANC_no` (`ANC_no`);

--
-- Indexes for table `risk_factors`
--
ALTER TABLE `risk_factors`
  ADD PRIMARY KEY (`rk_id`);

--
-- Indexes for table `test`
--
ALTER TABLE `test`
  ADD PRIMARY KEY (`test_id`),
  ADD KEY `ANC_no` (`ANC_no`);

--
-- Indexes for table `user_all`
--
ALTER TABLE `user_all`
  ADD PRIMARY KEY (`user_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `anc_reg`
--
ALTER TABLE `anc_reg`
  MODIFY `ANC_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
--
-- AUTO_INCREMENT for table `drugs`
--
ALTER TABLE `drugs`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT for table `obsectric`
--
ALTER TABLE `obsectric`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT for table `pregna_out`
--
ALTER TABLE `pregna_out`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=30;
--
-- AUTO_INCREMENT for table `risk_factors`
--
ALTER TABLE `risk_factors`
  MODIFY `rk_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;
--
-- AUTO_INCREMENT for table `test`
--
ALTER TABLE `test`
  MODIFY `test_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT for table `user_all`
--
ALTER TABLE `user_all`
  MODIFY `user_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
