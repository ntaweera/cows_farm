-- phpMyAdmin SQL Dump
-- version 4.9.3
-- https://www.phpmyadmin.net/
--
-- Host: localhost:8889
-- Generation Time: May 28, 2020 at 05:44 AM
-- Server version: 5.7.26
-- PHP Version: 7.4.2

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";

--
-- Database: `cows_farm`
--

-- --------------------------------------------------------

--
-- Table structure for table `breeding`
--

CREATE TABLE `breeding` (
  `breeding_id` int(4) NOT NULL,
  `breeding_name` varchar(200) COLLATE utf8_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `breeding`
--

INSERT INTO `breeding` (`breeding_id`, `breeding_name`) VALUES
(1, 'พื้นเมือง 100%'),
(2, 'ชาโรเลห์ 100%'),
(3, 'แองกัส 100%'),
(4, 'บรามัน 100%');

-- --------------------------------------------------------

--
-- Table structure for table `breeding_method`
--

CREATE TABLE `breeding_method` (
  `method_id` int(2) NOT NULL,
  `method` varchar(20) COLLATE utf8_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `breeding_method`
--

INSERT INTO `breeding_method` (`method_id`, `method`) VALUES
(1, 'ผสมเทียม'),
(2, 'ธรรมชาติ');

-- --------------------------------------------------------

--
-- Table structure for table `cows`
--

CREATE TABLE `cows` (
  `cow_label` varchar(15) COLLATE utf8_unicode_ci NOT NULL,
  `cow_name` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `gender` varchar(10) COLLATE utf8_unicode_ci NOT NULL,
  `breeding_id` int(4) NOT NULL,
  `ox_breeder` varchar(15) COLLATE utf8_unicode_ci NOT NULL,
  `cow_breeder` varchar(15) COLLATE utf8_unicode_ci NOT NULL,
  `date_of_birth` date NOT NULL,
  `farm_id` varchar(10) COLLATE utf8_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `cows`
--

INSERT INTO `cows` (`cow_label`, `cow_name`, `gender`, `breeding_id`, `ox_breeder`, `cow_breeder`, `date_of_birth`, `farm_id`) VALUES
('1234', 'แดง', 'M', 1, '1234', '2123', '2020-02-01', '47');

-- --------------------------------------------------------

--
-- Table structure for table `cows_breeding`
--

CREATE TABLE `cows_breeding` (
  `cow_label` varchar(10) COLLATE utf8_unicode_ci NOT NULL,
  `seq` int(2) NOT NULL,
  `breeding_date` date NOT NULL,
  `ox_label` varchar(10) COLLATE utf8_unicode_ci NOT NULL,
  `breeding_method` int(2) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `cows_breeding`
--

INSERT INTO `cows_breeding` (`cow_label`, `seq`, `breeding_date`, `ox_label`, `breeding_method`) VALUES
('', 0, '0000-00-00', '', 1),
('1234', 2, '2020-02-06', '1245', 1);

-- --------------------------------------------------------

--
-- Table structure for table `cows_calving`
--

CREATE TABLE `cows_calving` (
  `cow_label` varchar(10) COLLATE utf8_unicode_ci NOT NULL,
  `calving_date` date NOT NULL,
  `calf_label` varchar(10) COLLATE utf8_unicode_ci NOT NULL,
  `gender` varchar(10) COLLATE utf8_unicode_ci NOT NULL,
  `weight` double(6,2) NOT NULL,
  `height` int(4) NOT NULL,
  `lenght` int(4) NOT NULL,
  `chest` int(4) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `cows_calving`
--

INSERT INTO `cows_calving` (`cow_label`, `calving_date`, `calf_label`, `gender`, `weight`, `height`, `lenght`, `chest`) VALUES
('1234', '2020-02-06', '645756', 'M', 10.50, 45, 55, 54),
('5676', '2020-02-06', '3423', 'M', 45.55, 10, 20, 20);

-- --------------------------------------------------------

--
-- Table structure for table `farm`
--

CREATE TABLE `farm` (
  `farm_id` int(3) NOT NULL COMMENT 'รหัสพนักงาน',
  `farm_name` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `owner_name` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `address1` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `address2` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `phone_no` varchar(10) COLLATE utf8_unicode_ci NOT NULL,
  `line_id` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `facebook` varchar(200) COLLATE utf8_unicode_ci NOT NULL,
  `username` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `password` varchar(64) COLLATE utf8_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `farm`
--

INSERT INTO `farm` (`farm_id`, `farm_name`, `owner_name`, `address1`, `address2`, `phone_no`, `line_id`, `facebook`, `username`, `password`) VALUES
(1, '', 'สมชาย', '', '', '654678907', '', '', '654678907', '$2y$10$eKMP.lzJyGpPNcj7f3eAy.ztFCa7dYjgK1z1.rNvY4JFR2RpSMYbS'),
(28, '', 'Taweerat Nualchuay', '', '', '074312726', '', '', '074312726', '$2y$10$dSjbi34SfulphkS51/iVVu5I3JNCX.mOf85P0th5oY2NAJvZvQR0.'),
(29, '', 'Taweerat Nualchuay', '', '', 'test', '', '', 'test', '$2y$10$fo6tCMDOyYk54Es1An0RKejpxuuqr5kYUY3G91mXm71FAsQVse6fm'),
(31, '', 'wrerewre', '', '', 'sdfsfds', '', '', 'sdfsfds', '$2y$10$xu2efivEfiNWnoXtBt7GD.p1UGB.3uWME8JDFHA6EsZ9iVbGCeZd.'),
(37, '', 'Test Test2', '', '', '112321324', '', '', '112321324', '$2y$10$HQnYS0KPHAK/6M8F53LfQOxeuZlfX5FTGfQIMDXsJQ926xp9p9IKy'),
(39, '', 'Twqeqweqw', '', '', 'wrwerewr', '', '', 'wrwerewr', '$2y$10$9RrjTyUvB593puBTxO5sHubo7LrdonK.OfuyzzE0wZL4B/4qGrUW2'),
(41, '', '12312', '', '', 'wrewrewr', '', '', 'wrewrewr', '$2y$10$gACZSFs68RXf9EKbw57vAeBNzkc6J5uIufEtMQnMMj.Cb021zfUSu'),
(43, '', '876876', '', '', 'rtuytrutyu', '', '', 'rtuytrutyu', '$2y$10$9ipX7cphLmnRTOG6baoVgOJj5YD9SFN6mSGrFjY72p13/L8jGXthO'),
(44, 'สมศักดิ์ฟาร์มวัวเนื้อ', 'สมศักดิ์', '160 Kanjanawanitch Rd.', 'Tumbol Khoroupchang', '0891234556', '0816982565', 'ntaweera', '0891234556', '$2y$10$luqkoVyIgoM3NZpoAS9SAucT7fNVxNqFVLkFISuFVidOdASDLDn52'),
(45, '', 'สมชาย แซ่ตั้ง', '', '', '1231232134', '', '', '1231232134234', '$2y$10$dQlX3YDPT/12a7oNqe0uj.aj.YOqaoBMgGtQxI3zlDedkcuVnnONi'),
(47, 'สมศักดิ์ฟาร์มวัวเนื้อ', '756756', '160 Kanjanawanitch Rd.', 'Tumbol Khoroupchang', '6546576576', '0816982565', '', '654657657656', '$2y$10$FIat.UdGzAafrS4ZbwFIvuWq9Hrhep.aW7a0YhXYXJ9hy2ZjFOUee'),
(48, 'สมศักดิ์ฟาร์มวัวเนื้อ', 'Taweerat Nualchuay', '160 Kanjanawanitch Rd.', 'Tumbol Khoroupchang', '074312765', '0816982565', 'ntaweera', '074312765', '$2y$10$eeNPKlnat9y00Ffo4B3Qku5VhJKEMdjlf8F5GhzctisUCKFXs32EO');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `breeding`
--
ALTER TABLE `breeding`
  ADD PRIMARY KEY (`breeding_id`);

--
-- Indexes for table `breeding_method`
--
ALTER TABLE `breeding_method`
  ADD PRIMARY KEY (`method_id`);

--
-- Indexes for table `cows`
--
ALTER TABLE `cows`
  ADD PRIMARY KEY (`cow_label`);

--
-- Indexes for table `cows_breeding`
--
ALTER TABLE `cows_breeding`
  ADD PRIMARY KEY (`cow_label`,`seq`);

--
-- Indexes for table `cows_calving`
--
ALTER TABLE `cows_calving`
  ADD PRIMARY KEY (`cow_label`,`calving_date`);

--
-- Indexes for table `farm`
--
ALTER TABLE `farm`
  ADD PRIMARY KEY (`farm_id`),
  ADD UNIQUE KEY `username` (`username`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `breeding`
--
ALTER TABLE `breeding`
  MODIFY `breeding_id` int(4) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `breeding_method`
--
ALTER TABLE `breeding_method`
  MODIFY `method_id` int(2) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `farm`
--
ALTER TABLE `farm`
  MODIFY `farm_id` int(3) NOT NULL AUTO_INCREMENT COMMENT 'รหัสพนักงาน', AUTO_INCREMENT=49;