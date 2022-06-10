-- phpMyAdmin SQL Dump
-- version 4.9.0.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Sep 07, 2019 at 07:18 PM
-- Server version: 10.4.6-MariaDB
-- PHP Version: 7.3.8

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `cms`
--

-- --------------------------------------------------------

--
-- Table structure for table `appointments`
--

CREATE TABLE `appointments` (
  `id` int(11) NOT NULL,
  `p_id` varchar(15) NOT NULL,
  `appointment_date` varchar(20) NOT NULL COMMENT 'Appointment Date',
  `appointment_time` varchar(20) NOT NULL COMMENT 'Appointment Time',
  `specialty` varchar(100) NOT NULL,
  `doctor` varchar(200) NOT NULL,
  `type_of_patient` varchar(100) NOT NULL COMMENT 'Visiting or In-house',
  `request_date` datetime NOT NULL,
  `request_status` varchar(50) NOT NULL,
  `date_updated` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `appointments`
--

INSERT INTO `appointments` (`id`, `p_id`, `appointment_date`, `appointment_time`, `specialty`, `doctor`, `type_of_patient`, `request_date`, `request_status`, `date_updated`) VALUES
(6, 'Patient-e26', '2019-08-22', '12:50', 'General Health', 'Dr. Ubyjude Josh', 'Inhouse', '2019-08-01 23:47:28', 'awaiting payment', '2019-08-15 12:01:02'),
(7, 'Patient-c77', '2019-08-19', '10:00', 'General Health', 'Dr. Ubyjude Josh', 'Visiting', '2019-08-02 02:46:50', 'booked', '2019-08-03 22:15:21');

-- --------------------------------------------------------

--
-- Table structure for table `contacts`
--

CREATE TABLE `contacts` (
  `id` int(11) NOT NULL,
  `name` varchar(50) NOT NULL,
  `email` varchar(50) NOT NULL,
  `phone` varchar(20) NOT NULL,
  `message` varchar(700) NOT NULL,
  `reply` int(1) NOT NULL,
  `date_added` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `contacts`
--

INSERT INTO `contacts` (`id`, `name`, `email`, `phone`, `message`, `reply`, `date_added`) VALUES
(2, 'Ubyjude Josh', 'officialuby@gmail.com', '+2348119334926', 'QXRoZWJlIGRocyBzZGRoamMgY2pkIGpzZGsgZGpzZGpkIGRmIGRqIHNqIGpkZG5rZGtkayBzZGpkc24gZG5zbiBkZG5kbmMgZmhmamQgZHNqZGpkIGNqZGpjZiBjbmNuYyBjbmJjbmNuIHNiY25jIGNobmQgZGhkIGRoZmQgZmhmbmNqIGtrbSBqZGpzbnNqbnNqIGNuZCBkbmRjIGMgY25hc2puY2ogY2pkbmRqbmMgY2hkIGMgY2hjIGRlaHd3ZWlyb2luY2pjIGogamNqZG4gbS4=', 1, '2019-07-20 22:52:34'),
(3, 'Ubyjude Josh', 'officialuby@gmail.com', '+2348119334926', 'V2UgYXJlIGhlcmUgdG8gcHJvdmlkZSByZWxpYWJsZSBzZXJ2aWNlcyB0byBvdXIgc3R1ZGVudHMgYW5kIHN0YWZmLCB3aXRoIG91ciByZW5vd25lZCBkb2N0b3JzIGFuZCB3b3JsZCBjbGFzcyBmYWNpbGl0aWVzLiBXZSBhcmUgc2ltcGx5IHRoZSBiZXN0IGF0IHdoYXQgd2UgZG8uV2UgYXJlIGhlcmUgdG8gcHJvdmlkZSByZWxpYWJsZSBzZXJ2aWNlcyB0byBvdXIgc3R1ZGVudHMgYW5kIHN0YWZmLCB3aXRoIG91ciByZW5vd25lZCBkb2N0b3JzIGFuZCB3b3JsZCBjbGFzcyBmYWNpbGl0aWVzLiBXZSBhcmUgc2ltcGx5IHRoZSBiZXN0IGF0IHdoYXQgd2UgZG8ucm5XZSBhcmUgaGVyZSB0byBwcm92aWRlIHJlbGlhYmxlIHNlcnZpY2VzIHRvIG91ciBzdHVkZW50cyBhbmQgc3RhZmYsIHdpdGggb3VyIHJlbm93bmVkIGRvY3RvcnMgYW5kIHdvcmxkIGNsYXNzIGZhY2lsaXRpZXMuIFdlIGFyZSBzaW1wbHkgdGhlIGJlc3QgYXQgd2hhdCB3ZSBkby4=', 1, '2019-08-09 00:05:27'),
(4, 'Jude Ubon Joshua', 'ubyjude54@gmail.com', '08119334926', 'SGVsbG8sIEl0cyBtZSBhZ2Fpbi4gSSB3YW50IHRvIHNlZSBpZiB0aGlzIGVtYWlsIHdvcmtzIGFzIGl0J3Mgc3VwcG9zZSB0by4gdGhhbmsgeW91IGluIGFkdmFuY2UgdG8geW91ciBmZWVkYmFjay4=', 0, '2019-09-07 08:02:27');

-- --------------------------------------------------------

--
-- Table structure for table `contact_info`
--

CREATE TABLE `contact_info` (
  `about` varchar(1000) NOT NULL,
  `location` varchar(30) NOT NULL,
  `city` varchar(30) NOT NULL,
  `state` varchar(40) NOT NULL,
  `country` varchar(40) NOT NULL,
  `email` varchar(50) NOT NULL,
  `phone` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `contact_info`
--

INSERT INTO `contact_info` (`about`, `location`, `city`, `state`, `country`, `email`, `phone`) VALUES
('a2pvbmpia2pia2pia2pia2poaGJqa2prYmprYmtqYmtqYmprYmtramJramJramJramJram5qa2Jqa25ramJoamJram5qaCBua2Jia2xua2pua2piaHJuIHdlIGhhYmQgYSBkZWxpY2VyYXRlIGF0dGVtcHQgaW4gdHJ5aW5nIHRvIGtpbGwgQWxlYW5kZXIgYW5zIGFzIHN1Y2ggQWxleGFuZGVyIHdpbGwgbm90IGJlIGpvaW5pbmcgdXMgZm9yIGRpbm5lciB0b2RheS4gV2hhdCB3ZSBwYWxuIG9uIGRvaW5nIHJhdGhlciBpcyB0byBzZW5kIHNvbWVvbmUgdG8gcmlwIGhpcyBwaWVjZXMgYXBhcnQgYW5kIHNlbmQgaXQgdG8gaGk5cyBmYW1pbHkgc28gdGhleSdsbCBsZWFybiB0aGF0IG5leHQgdGltZSwgbm8gb25lIHNob3VsZCB0cnkgdG8gbWVzcyB3aXRoIHRoZSBDb21wdG9tJ3MgZmFtaWx5Lg==', 'No. 30 Parklane Street', 'Uyo', 'Akwa Ibom State', 'Nigeria', 'officialuby@gmail.com', '+2348119334926');

-- --------------------------------------------------------

--
-- Table structure for table `doctor`
--

CREATE TABLE `doctor` (
  `id` int(11) NOT NULL,
  `name` varchar(50) NOT NULL,
  `state_of_origin` varchar(50) NOT NULL,
  `nationality` varchar(50) NOT NULL,
  `address` varchar(50) NOT NULL,
  `state_of_residence` varchar(50) NOT NULL,
  `country_of_residence` varchar(30) NOT NULL,
  `position` varchar(50) NOT NULL,
  `specialty` varchar(150) NOT NULL,
  `license_number` varchar(20) NOT NULL,
  `photo_name` longtext NOT NULL,
  `photo_loc` longtext NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `doctor`
--

INSERT INTO `doctor` (`id`, `name`, `state_of_origin`, `nationality`, `address`, `state_of_residence`, `country_of_residence`, `position`, `specialty`, `license_number`, `photo_name`, `photo_loc`) VALUES
(1, 'Dr. Ubyjude Josh', 'Akwa Ibom State', 'Nigeria', 'Christ the King School, Barracks road,uyo', 'Akwa Ibom State', 'Nigeria', 'Intern', 'General Health', 'MDCN-2345tf', '4965c303937a4902ae996782e980d3a2.jpg', 'Li4vLi4vLi4vY29uZmlnL2Fzc2V0cy91cGxvYWRzLw=='),
(3, 'Dr. Theresa Jane', 'Abuja', 'Nigeria', '10b Enugu street', 'Enugu', 'Nigeria', 'Specialist', 'Dermatology', 'MDCN-2345tg', 'depositphotos_212299986-stock-video-business-people-man-and-woman.jpg', 'Li4vLi4vLi4vY29uZmlnL2Fzc2V0cy91cGxvYWRzLw==');

-- --------------------------------------------------------

--
-- Table structure for table `inhouse`
--

CREATE TABLE `inhouse` (
  `id` int(11) NOT NULL,
  `p_id` varchar(15) NOT NULL,
  `student_or_staff` varchar(20) NOT NULL,
  `department` varchar(30) NOT NULL,
  `faculty` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `inhouse`
--

INSERT INTO `inhouse` (`id`, `p_id`, `student_or_staff`, `department`, `faculty`) VALUES
(1, 'Patient-6de', 'Staff', 'Chemical Engineering', 'Engineering'),
(2, 'Patient-286', 'Student', 'computer science', 'natural science'),
(3, 'Patient-a65', 'Student', 'computer engineering', 'engineering');

-- --------------------------------------------------------

--
-- Table structure for table `management`
--

CREATE TABLE `management` (
  `s/n` int(11) NOT NULL,
  `name` varchar(50) NOT NULL,
  `sex` varchar(8) NOT NULL,
  `email` varchar(50) NOT NULL,
  `phone` varchar(20) NOT NULL,
  `staff_id` varchar(50) NOT NULL,
  `verified` int(1) NOT NULL,
  `role` varchar(30) NOT NULL,
  `password` varchar(255) NOT NULL,
  `date_created` datetime NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `management`
--

INSERT INTO `management` (`s/n`, `name`, `sex`, `email`, `phone`, `staff_id`, `verified`, `role`, `password`, `date_created`) VALUES
(1, 'Dr. Ubyjude Josh', 'Male', 'officialuby@gmail.com', '+2348119334926', '740-Admin', 1, 'Doctor', '$2y$10$8lImp7Jzuw7mgDBZHTexM.xcZitsxVXXY3Es9c44lVmgJbOOMAOk6', '2019-08-01 23:52:48'),
(3, 'Sandra Leeh', 'Female', 'sandylee@mail.com', '09024493425', '6a0-Admin', 1, 'Receptionist', '$2y$10$0c9bNlMZX12Imv0DvJVWs.GqEfP3xMhL/KfX9.9dhcZQ1EvLt1yrK', '2019-08-02 00:17:03'),
(4, 'Dr. Theresa Jane', 'Female', 'Theres@mail.com', '09012234445', '389-Admin', 1, 'Doctor', '$2y$10$j/oEPQN.CIqs.8ti69SS3uE2IugS8B7.mMmzxXrzK9RoYjQr3sIaO', '2019-08-02 00:33:58'),
(5, 'Sophia E', 'Female', 'sophi@mail.com', '+2348024495743', '3c9-Admin', 1, 'Receptionist', '$2y$10$NGup7n5Z/kGuGlJjCxZc5OQwvfakGZL40.I3fwdpFV65sop1TidUC', '2019-08-02 01:39:35');

-- --------------------------------------------------------

--
-- Table structure for table `otp_requests`
--

CREATE TABLE `otp_requests` (
  `id` int(11) NOT NULL,
  `name` varchar(100) NOT NULL,
  `patient_id` varchar(30) NOT NULL,
  `otp` varchar(100) NOT NULL,
  `requested` int(1) NOT NULL,
  `received` int(1) NOT NULL,
  `date` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `otp_requests`
--

INSERT INTO `otp_requests` (`id`, `name`, `patient_id`, `otp`, `requested`, `received`, `date`) VALUES
(2, 'Dr. David Samuel', '002-patient', 'gscvdhsvsx', 1, 0, '2019-07-24 14:20:45');

-- --------------------------------------------------------

--
-- Table structure for table `patients`
--

CREATE TABLE `patients` (
  `id` int(11) NOT NULL,
  `p_id` varchar(15) NOT NULL,
  `name` varchar(100) NOT NULL,
  `email` varchar(100) NOT NULL,
  `phone` varchar(30) NOT NULL,
  `date_of_birth` varchar(10) NOT NULL,
  `sex` varchar(10) NOT NULL,
  `blood group` varchar(5) NOT NULL,
  `genotype` varchar(5) NOT NULL,
  `height` varchar(11) NOT NULL,
  `password` varchar(100) NOT NULL,
  `date_updated` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `patients`
--

INSERT INTO `patients` (`id`, `p_id`, `name`, `email`, `phone`, `date_of_birth`, `sex`, `blood group`, `genotype`, `height`, `password`, `date_updated`) VALUES
(4, 'Patient-c77', 'Samuel Okon', 'samueldaniel@outlook.com', '+2348024495743', '2019-07-31', 'Male', 'A-Neg', 'AA', '4\"7', '$2y$10$crN8Z4pQkC4gJtNlFhLBf.odrKKB3BZFak0k8DkyR57PgUpVlHdyq', '2019-07-31 00:49:56'),
(5, 'Patient-6de', 'Carl Rick', 'carlrick@gmail.com', '+2348119334926', '2019-08-14', 'Male', 'B-Pos', 'AS', '5\"11', '$2y$10$9S1j./BLd3i/gAAJFNAWzusqrM/3hvQMc8MfSwwoWWwCnYthRlS.S', '2019-08-20 13:17:27'),
(6, 'Patient-286', 'nweke ogechukwu cynthia', 'cnweke355@gamil.com', '08072844669', '1975-05-27', 'Female', 'O-Pos', 'AA', '5\"5', '$2y$10$JVwW3hKj3xyVowEcwaK9SuVT8fpijbYgpkHaeSUGkd2AmnRFwRJHu', '2019-08-20 13:50:06'),
(7, 'Patient-a65', 'Jude Ubon Joshua', 'ubyjude54@gmail.com', '08119334926', '1996-05-20', 'Male', 'O-Pos', 'AA', '5\"7', '$2y$10$f93baoAhzSIDMKMcPCzdbeW0qhRAoPSczPNshOGq3Lp72Sza1uRTO', '2019-09-06 20:50:47');

-- --------------------------------------------------------

--
-- Table structure for table `plans_info`
--

CREATE TABLE `plans_info` (
  `id` int(11) NOT NULL,
  `name` varchar(50) NOT NULL,
  `price` varchar(10) NOT NULL,
  `duration` varchar(20) NOT NULL,
  `benefit` varchar(200) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `plans_info`
--

INSERT INTO `plans_info` (`id`, `name`, `price`, `duration`, `benefit`) VALUES
(1, '', ' NGN', '', ''),
(2, '', ' NGN', '', '');

-- --------------------------------------------------------

--
-- Table structure for table `receptionist`
--

CREATE TABLE `receptionist` (
  `id` int(11) NOT NULL,
  `name` varchar(50) NOT NULL,
  `state_of_origin` varchar(50) NOT NULL,
  `nationality` varchar(50) NOT NULL,
  `address` varchar(50) NOT NULL,
  `state_of_residence` varchar(50) NOT NULL,
  `country_of_residence` varchar(30) NOT NULL,
  `photo_name` longtext NOT NULL,
  `photo_loc` longtext NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `receptionist`
--

INSERT INTO `receptionist` (`id`, `name`, `state_of_origin`, `nationality`, `address`, `state_of_residence`, `country_of_residence`, `photo_name`, `photo_loc`) VALUES
(2, 'Sandra Leeh', 'Enugu', 'Nigeria', 'Catholic montesaorri schools', 'Lagos', 'Nigeria', '17ae043903d566271357588b36405bfd.jpg', 'Li4vLi4vLi4vY29uZmlnL2Fzc2V0cy91cGxvYWRzLw=='),
(3, 'Sophia E', 'Akwa Ibom State', 'Nigeria', 'Christ the King School, Barracks road,uyo', 'Akwa Ibom State', 'Nigeria', '2a0688ed56c24a72a4595d4027d8bb3d.jpg', 'Li4vLi4vLi4vY29uZmlnL2Fzc2V0cy91cGxvYWRzLw==');

-- --------------------------------------------------------

--
-- Table structure for table `reviews`
--

CREATE TABLE `reviews` (
  `id` int(11) NOT NULL,
  `name` varchar(50) NOT NULL,
  `email` varchar(50) NOT NULL,
  `review` varchar(255) NOT NULL,
  `date_added` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `services_info`
--

CREATE TABLE `services_info` (
  `id` int(11) NOT NULL,
  `icon` varchar(50) NOT NULL,
  `title` varchar(255) NOT NULL,
  `text` varchar(1000) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `services_info`
--

INSERT INTO `services_info` (`id`, `icon`, `title`, `text`) VALUES
(10, 'mdi mdi-message-text', 'Consultation Services', 'SXQncyBhIHdpbiBmb3IgdXM='),
(11, 'mdi mdi-stethoscope', 'General Treatment', 'V2UgaGFkIGEgZGVsaWJlcmF0ZSBhdHRlbXB0IGluIHRyeWluZyB0byBraWxsIEFsZWFuZGVyIGFucyBhcyBzdWNoIEFsZXhhbmRlciB3aWxsIG5vdCBiZSBqb2luaW5nIHVzIGZvciBkaW5uZXIgdG9kYXkuIFdoYXQgd2UgcGFsbiBvbiBkb2luZyByYXRoZXIgaXMgdG8gc2VuZCBzb21lb25lIHRvIHJpcCBoaXMgcGllY2VzIGFwYXJ0IGFuZCBzZW5kIGl0IHQuIFdlIGhhZCBhIGRlbGliZXJhdGUgYXR0ZW1wdCBpbiB0cnlpbmcgdG8ga2lsbCBBbGVhbmRlciBhbnMgYXMgc3VjaCBBbGV4YW5kZXIgd2lsbCBub3QgYmUgam9pbmluZyB1cyBmb3IgZGlubmVyIHRvZGF5LiBXaGF0IHdlIHBhbG4gb24gZG9pbmcgcmF0aGVyIGlzIHRvIHNlbmQgc29tZW9uZSB0byByaXAgaGlzIHBpZWNlcyBhcGFydCBhbmQgc2VuZCBpdCB0LiBXZSBoYWQgYSBkZWxpYmVyYXRlIGF0dGVtcHQgaW4gdHJ5aW5nIHRvIGtpbGwgQWxlYW5kZXIgYW5zIGFzIHN1Y2ggQWxleGFuZGVyIHdpbGwgbm90IGJlIGpvaW5pbmcgdXMgZm9yIGRpbm5lciB0b2RheS4gV2hhdCB3ZSBwYWxuIG9uIGRvaW5nIHJhdGhlciBpcyB0byBzZW5kIHNvbWVvbmUgdG8gcmlwIGhpcyBwaWVjZXMgYXBhcnQgYW5kIHNlbmQgaXQgdA=='),
(12, 'mdi mdi-ambulance', 'Emergency Services', 'a2pvbmpia2pia2pia2pia2poaGJqa2prYmprYmtqYmtqYmprYmtramJramJramJramJram5qa2Jqa25ramJoamJram5qaCBua2Jia2xua2pua2piaHJuIHdlIGhhYmQgYSBkZWxpY2VyYXRlIGF0dGVtcHQgaW4gdHJ5aW5nIHRvIGtpbGwgQWxlYW5kZXIgYW5zIGFzIHN1Y2ggQWxleGFuZGVyIHdpbGwgbm90IGJlIGpvaW5pbmcgdXMgZm9yIGRpbm5lciB0b2RheS4gV2hhdCB3ZSBwYWxuIG9uIGRvaW5nIHJhdGhlciBpcyB0byBzZW5kIHNvbWVvbmUgdG8gcmlwIGhpcyBwaWVjZXMgYXBhcnQgYW5kIHNlbmQgaXQgdG8gaGk5cyBmYW1pbHkgc28gdGhleSdsbCBsZWFybiB0aGF0IG5leHQgdGltZSwgbm8gb25lIHNob3VsZCB0cnkgdG8gbWVzcyB3aXRoIHRoZSBDb21wdG9tJ3MgZmFtaWx5Lg==');

-- --------------------------------------------------------

--
-- Table structure for table `specialties`
--

CREATE TABLE `specialties` (
  `id` int(11) NOT NULL,
  `specialty` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `specialties`
--

INSERT INTO `specialties` (`id`, `specialty`) VALUES
(1, 'Gynaceology'),
(2, 'Oncology'),
(3, 'Parasitology'),
(4, 'General Health'),
(5, 'Dermatology'),
(6, 'Pathology');

-- --------------------------------------------------------

--
-- Table structure for table `system`
--

CREATE TABLE `system` (
  `s/n` int(11) NOT NULL,
  `user` varchar(50) NOT NULL,
  `password` varchar(255) NOT NULL,
  `date_updated` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `system`
--

INSERT INTO `system` (`s/n`, `user`, `password`, `date_updated`) VALUES
(1, 'system', '$2y$08$A6VcghglyG5Sf0VI1H0tqedjx9wWfByu8M62GAKpcucsi0S3eai8G', '2019-07-16 00:02:57');

-- --------------------------------------------------------

--
-- Table structure for table `transactions`
--

CREATE TABLE `transactions` (
  `id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `visiting`
--

CREATE TABLE `visiting` (
  `id` int(11) NOT NULL,
  `p_id` varchar(15) NOT NULL,
  `city` varchar(50) NOT NULL,
  `state` varchar(50) NOT NULL,
  `nationality` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `visiting`
--

INSERT INTO `visiting` (`id`, `p_id`, `city`, `state`, `nationality`) VALUES
(1, 'Patient-c77', 'Uyo', 'Akwa Ibom State', 'Nigeria');

-- --------------------------------------------------------

--
-- Table structure for table `work_info`
--

CREATE TABLE `work_info` (
  `id` int(11) NOT NULL,
  `days` varchar(100) NOT NULL,
  `closed` int(1) NOT NULL,
  `start_time` varchar(30) NOT NULL,
  `endtime` varchar(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `work_info`
--

INSERT INTO `work_info` (`id`, `days`, `closed`, `start_time`, `endtime`) VALUES
(1, 'Monday', 0, '06:30', '21:00'),
(2, 'Tuesday', 0, '07:00', '21:00'),
(3, 'Wednesday', 0, '09:00', '20:00'),
(4, 'Thursday', 0, '09:00', '17:00'),
(5, 'Friday', 0, '10:00', '18:00'),
(6, 'Saturday', 1, 'CLOSED', 'CLOSED'),
(7, 'Sunday', 1, 'CLOSED', 'CLOSED');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `appointments`
--
ALTER TABLE `appointments`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `contacts`
--
ALTER TABLE `contacts`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `doctor`
--
ALTER TABLE `doctor`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `inhouse`
--
ALTER TABLE `inhouse`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `management`
--
ALTER TABLE `management`
  ADD PRIMARY KEY (`s/n`),
  ADD UNIQUE KEY `user` (`name`),
  ADD UNIQUE KEY `password` (`password`),
  ADD UNIQUE KEY `id` (`staff_id`),
  ADD UNIQUE KEY `email` (`email`);

--
-- Indexes for table `otp_requests`
--
ALTER TABLE `otp_requests`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `patients`
--
ALTER TABLE `patients`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `plans_info`
--
ALTER TABLE `plans_info`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `receptionist`
--
ALTER TABLE `receptionist`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `reviews`
--
ALTER TABLE `reviews`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `services_info`
--
ALTER TABLE `services_info`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `specialties`
--
ALTER TABLE `specialties`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `system`
--
ALTER TABLE `system`
  ADD PRIMARY KEY (`s/n`),
  ADD UNIQUE KEY `user` (`user`),
  ADD UNIQUE KEY `password` (`password`);

--
-- Indexes for table `transactions`
--
ALTER TABLE `transactions`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `visiting`
--
ALTER TABLE `visiting`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `work_info`
--
ALTER TABLE `work_info`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `appointments`
--
ALTER TABLE `appointments`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `contacts`
--
ALTER TABLE `contacts`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `doctor`
--
ALTER TABLE `doctor`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `inhouse`
--
ALTER TABLE `inhouse`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `management`
--
ALTER TABLE `management`
  MODIFY `s/n` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `otp_requests`
--
ALTER TABLE `otp_requests`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `patients`
--
ALTER TABLE `patients`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `plans_info`
--
ALTER TABLE `plans_info`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `receptionist`
--
ALTER TABLE `receptionist`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `reviews`
--
ALTER TABLE `reviews`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `services_info`
--
ALTER TABLE `services_info`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT for table `specialties`
--
ALTER TABLE `specialties`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `system`
--
ALTER TABLE `system`
  MODIFY `s/n` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `transactions`
--
ALTER TABLE `transactions`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `visiting`
--
ALTER TABLE `visiting`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `work_info`
--
ALTER TABLE `work_info`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
