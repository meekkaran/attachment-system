-- phpMyAdmin SQL Dump
-- version 5.0.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1:3306
-- Generation Time: May 09, 2022 at 04:53 PM
-- Server version: 5.7.31
-- PHP Version: 7.3.21

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `dbsupervise`
--

-- --------------------------------------------------------

--
-- Table structure for table `assigned`
--

DROP TABLE IF EXISTS `assigned`;
CREATE TABLE IF NOT EXISTS `assigned` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `student_id` int(11) NOT NULL,
  `lecturer_id` int(11) NOT NULL,
  PRIMARY KEY (`id`),
  KEY `lecturer_id_idx` (`lecturer_id`),
  KEY `student_id_idx` (`student_id`) USING BTREE
) ENGINE=InnoDB AUTO_INCREMENT=14 DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `assigned`
--

INSERT INTO `assigned` (`id`, `student_id`, `lecturer_id`) VALUES
(12, 12, 4),
(13, 14, 4);

-- --------------------------------------------------------

--
-- Table structure for table `assigned_trainer`
--

DROP TABLE IF EXISTS `assigned_trainer`;
CREATE TABLE IF NOT EXISTS `assigned_trainer` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `admission_number` varchar(200) NOT NULL,
  `trainer_id` int(11) NOT NULL,
  PRIMARY KEY (`id`),
  KEY `admission_number_idx` (`admission_number`),
  KEY `trainer_id_idx` (`trainer_id`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `assigned_trainer`
--

INSERT INTO `assigned_trainer` (`id`, `admission_number`, `trainer_id`) VALUES
(4, '1034040', 1);

-- --------------------------------------------------------

--
-- Table structure for table `fileup`
--

DROP TABLE IF EXISTS `fileup`;
CREATE TABLE IF NOT EXISTS `fileup` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `title` varchar(255) NOT NULL,
  `report` varchar(255) NOT NULL,
  `student_id` int(11) NOT NULL,
  `posted_at` varchar(200) NOT NULL,
  PRIMARY KEY (`id`),
  KEY `student_id_idx` (`student_id`)
) ENGINE=InnoDB AUTO_INCREMENT=28 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `fileup`
--

INSERT INTO `fileup` (`id`, `title`, `report`, `student_id`, `posted_at`) VALUES
(16, 'attachment report', '8906-Online Student LMS1.docx', 7, '2022-05-04 23:09:51'),
(17, 'logbook', '6278-MeekKaran (1).docx', 7, '2022-05-04 23:10:13'),
(18, 'logbook', '3097-MeekKaran (1).docx', 7, '2022-05-04 23:14:04'),
(19, 'logbook', '7227-MeekKaran (1).docx', 7, '2022-05-04 23:15:06'),
(20, 'logbook', '3966-MeekKaran (1).docx', 7, '2022-05-04 23:17:15'),
(21, 'logbook', '3313-MeekKaran (1).docx', 7, '2022-05-04 23:17:46'),
(22, 'ict', '3421-134_5_1303299_1645813140_AWS Skill Builder Course Completion Certificate.pdf', 7, '2022-05-04 23:18:02'),
(23, 'reports', '6013-So good they cant ignore you why skills trump passion in the quest for work you love by Cal Newport (z-lib.org).pdf', 7, '2022-05-04 23:22:34'),
(24, 'logreport', '2735-WhatsApp Image 2022-04-09 at 2.45.55 PM.jpeg', 6, '2022-05-05 11:06:09'),
(25, 'stdentid', '1019-data.jpg', 6, '2022-05-05 11:15:20'),
(26, 'badria report', '7108-ORDER OF CARMELITES.docx1.docx', 7, '2022-05-06 22:52:56'),
(27, 'badria report', '1763-ORDER OF CARMELITES.docx1.docx', 7, '2022-05-06 22:54:51');

-- --------------------------------------------------------

--
-- Table structure for table `lecturers`
--

DROP TABLE IF EXISTS `lecturers`;
CREATE TABLE IF NOT EXISTS `lecturers` (
  `lecturer_id` int(11) NOT NULL AUTO_INCREMENT,
  `lecname` varchar(200) NOT NULL,
  `role_id` varchar(200) NOT NULL,
  `email` varchar(200) NOT NULL,
  `phonenumber` int(20) NOT NULL,
  `password` varchar(200) NOT NULL,
  `created_at` varchar(200) NOT NULL,
  `Allocated` varchar(10) NOT NULL DEFAULT 'NO',
  PRIMARY KEY (`lecturer_id`)
) ENGINE=InnoDB AUTO_INCREMENT=11 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `lecturers`
--

INSERT INTO `lecturers` (`lecturer_id`, `lecname`, `role_id`, `email`, `phonenumber`, `password`, `created_at`, `Allocated`) VALUES
(2, 'Philip', 'P001', 'pihu@gmail.com', 789786543, '1234', '2022-05-07 20:42:03', 'NO'),
(3, 'Vincent web dev', 'V001', 'vincent@gmail.com', 723456789, '1234', '2022-05-07 20:52:02', 'NO'),
(4, 'Daniel Ndambuki', 'D001', 'dan@gmail.com', 789675423, '81dc9bdb52d04dc20036dbd8313ed055', '2022-05-08 11:03:15', 'NO'),
(5, 'Ishmael New', 'I001', 'ishnamel@gmail.com', 723456789, '81dc9bdb52d04dc20036dbd8313ed055', '2022-05-08 11:14:10', 'NO'),
(6, 'Marius Tarus', 'M001', 'marius@gmail.com', 756789876, '81dc9bdb52d04dc20036dbd8313ed055', '2022-05-08 14:31:39', 'YES'),
(7, 'Julius Mkubwa', 'J001', 'julius@gmail.com', 767895674, '81dc9bdb52d04dc20036dbd8313ed055', '2022-05-08 21:58:18', 'NO'),
(8, 'Jusper Murume', 'JM09', 'jusper@gmail.com', 767567898, '81dc9bdb52d04dc20036dbd8313ed055', '2022-05-08 22:22:51', 'NO'),
(9, 'Joel Kemei', 'JK01', 'joelkemei@gmail.com', 765432345, '81dc9bdb52d04dc20036dbd8313ed055', '2022-05-09 14:18:13', 'YES'),
(10, 'Wangete Physics', 'W001', 'wangete@gmail.com', 734234567, '81dc9bdb52d04dc20036dbd8313ed055', '2022-05-09 15:29:04', 'NO');

-- --------------------------------------------------------

--
-- Table structure for table `logbookdata`
--

DROP TABLE IF EXISTS `logbookdata`;
CREATE TABLE IF NOT EXISTS `logbookdata` (
  `logbk_id` int(11) NOT NULL AUTO_INCREMENT,
  `week_id` int(11) NOT NULL,
  `day_title` varchar(200) NOT NULL,
  `day_notes` text NOT NULL,
  `created_at` varchar(200) NOT NULL,
  `student_id` int(11) NOT NULL,
  `leccomment` text,
  `trainercomment` text,
  PRIMARY KEY (`logbk_id`),
  KEY `week_id_idx` (`week_id`),
  KEY `student_id_idx` (`student_id`) USING BTREE
) ENGINE=InnoDB AUTO_INCREMENT=172 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `logbookdata`
--

INSERT INTO `logbookdata` (`logbk_id`, `week_id`, `day_title`, `day_notes`, `created_at`, `student_id`, `leccomment`, `trainercomment`) VALUES
(160, 1, 'MONDAY', 'good work', '2022-05-06 18:09:08', 4, 'good work', 'perfect'),
(161, 1, 'MONDAY', 'hello', '2022-05-06 18:48:38', 4, NULL, NULL),
(162, 1, 'TUESDAY', 'really', '2022-05-06 18:56:25', 4, NULL, NULL),
(163, 2, 'MONDAY', 'wow', '2022-05-06 18:56:36', 4, NULL, NULL),
(164, 1, 'MONDAY', 'doing crud', '2022-05-06 19:00:57', 5, 'well done', 'improve'),
(165, 1, 'MONDAY', 'share your journey ', '2022-05-06 21:37:29', 6, NULL, NULL),
(166, 1, 'TUESDAY', 'enjoy every moment of your day', '2022-05-06 21:37:53', 6, NULL, NULL),
(167, 1, 'MONDAY', 'Im perfect', '2022-05-06 21:50:45', 7, NULL, NULL),
(168, 1, 'TUESDAY', 'all is well', '2022-05-06 21:50:55', 7, NULL, NULL),
(169, 1, 'MONDAY', 'learnt about password hashind', '2022-05-09 13:33:58', 20, NULL, NULL),
(170, 1, 'TUESDAY', 'everytthng is fine', '2022-05-09 15:43:18', 20, NULL, NULL),
(171, 1, 'WEDNESDAY', 'all is well here', '2022-05-09 15:44:46', 20, NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `students`
--

DROP TABLE IF EXISTS `students`;
CREATE TABLE IF NOT EXISTS `students` (
  `student_id` int(11) NOT NULL AUTO_INCREMENT,
  `fullname` varchar(200) NOT NULL,
  `admission_number` varchar(200) NOT NULL,
  `email` varchar(200) NOT NULL,
  `phone_number` varchar(200) NOT NULL,
  `company_name` varchar(200) NOT NULL,
  `company_contact` varchar(200) NOT NULL,
  `company_address` varchar(200) NOT NULL,
  `company_email` varchar(200) NOT NULL,
  `password` varchar(200) NOT NULL,
  `created_at` varchar(200) NOT NULL,
  `Allocated` varchar(10) NOT NULL DEFAULT 'NO',
  PRIMARY KEY (`student_id`)
) ENGINE=InnoDB AUTO_INCREMENT=21 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `students`
--

INSERT INTO `students` (`student_id`, `fullname`, `admission_number`, `email`, `phone_number`, `company_name`, `company_contact`, `company_address`, `company_email`, `password`, `created_at`, `Allocated`) VALUES
(8, 'Barrack obama', '1033900', 'obama@gmail.com', '0897654', 'states ke', '098-78', 'ohio street', 'barrack@gmail.com', '1234', '', 'NO'),
(12, 'Kelsey Manyanga', '1034050', 'kelsey@gmail.com', '0789675678', 'Cash Back App', '011234567', 'Delta Rowers, Shell Road', 'cashback@gmail.com', '1234', '2022-05-07 21:22:58', 'NO'),
(13, 'Bramwel Kev', '1033898', 'bramwel@gmail.com', '0789675436', 'Fr.Boyle', '56-09', 'St.Marys', 'frboyle@gmail.com', '12345', '2022-05-07 21:38:00', 'NO'),
(14, 'gillian karan', '1034040', 'gilliankaran@gmail.com', '0726530699', 'Lenana High', '011233', 'Ngong - Road', 'lenana@gmail.com', '1234', '2022-05-07 21:45:45', 'YES'),
(15, 'john doe', '12345', 'johndoe@gmail.com', '08976543', 'john doe ', '1234', '98-09', 'doejohn@gmail.com', '12345', '2022-05-07 23:38:29', 'NO'),
(16, 'Duncan Kigen', '102103', 'duncan@gmail.com', '0723456789', 'Kenya Police', 'n/a', 'Lang\'ata', 'kp@gmail.com', '81dc9bdb52d04dc20036dbd8313ed055', '2022-05-08 10:59:43', 'NO'),
(17, 'Abigail Wairimu', '1034020', 'abi@gmail.com', '0723456789', 'IBM', '098-67', 'Cuea - Lang\'ata', 'ibm@gmail.com', '81dc9bdb52d04dc20036dbd8313ed055', '2022-05-08 22:19:47', 'NO'),
(18, 'Michelle Aduda', '1034021', 'aduda@gmail.com', '0760807986', 'Brighter Monday', '900-23', 'Moi Avenue', 'brighter@gmail.com', '81dc9bdb52d04dc20036dbd8313ed055', '2022-05-08 22:21:46', 'NO'),
(19, 'brian atayi', '1033456', 'atayi@gmail.com', '0767854321', 'Microsoft', '23-45', 'Westlands ABD', 'microfost@gmail.com', '81dc9bdb52d04dc20036dbd8313ed055', '2022-05-09 13:04:12', 'NO'),
(20, 'Kevin Shisanya', '1035060', 'shisanya@gmail.com', '0734567865', 'Kenya Tellecommunications', '76-45', 'Industrial Area', 'kt@gmail.com', '81dc9bdb52d04dc20036dbd8313ed055', '2022-05-09 13:12:11', 'YES');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_weeks`
--

DROP TABLE IF EXISTS `tbl_weeks`;
CREATE TABLE IF NOT EXISTS `tbl_weeks` (
  `week_id` int(11) NOT NULL AUTO_INCREMENT,
  `week_title` varchar(255) NOT NULL,
  PRIMARY KEY (`week_id`)
) ENGINE=InnoDB AUTO_INCREMENT=10 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbl_weeks`
--

INSERT INTO `tbl_weeks` (`week_id`, `week_title`) VALUES
(1, 'week1'),
(2, 'week2'),
(3, 'week3'),
(4, 'week4'),
(5, 'week5'),
(6, 'week6'),
(7, 'week7'),
(8, 'week8'),
(9, 'week9');

-- --------------------------------------------------------

--
-- Table structure for table `trainers`
--

DROP TABLE IF EXISTS `trainers`;
CREATE TABLE IF NOT EXISTS `trainers` (
  `trainer_id` int(11) NOT NULL AUTO_INCREMENT,
  `trainername` varchar(200) NOT NULL,
  `email` varchar(200) NOT NULL,
  `mobile` varchar(200) NOT NULL,
  `title` varchar(200) NOT NULL,
  `password` varchar(200) NOT NULL,
  `created_at` varchar(200) NOT NULL,
  PRIMARY KEY (`trainer_id`)
) ENGINE=InnoDB AUTO_INCREMENT=18 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `trainers`
--

INSERT INTO `trainers` (`trainer_id`, `trainername`, `email`, `mobile`, `title`, `password`, `created_at`) VALUES
(1, 'Paul Makabongooo', 'mabawa@gmail.com', '0722591125', 'Head ict', '81dc9bdb52d04dc20036dbd8313ed055', '2022-04-16 13:14:26'),
(2, 'Kevin Musyoki', 'musyoki@gmail.com', '0710347060', 'Networking Lead', '81dc9bdb52d04dc20036dbd8313ed055', '2022-04-16 13:28:47'),
(3, 'Simon Githinji', 'githinji@gmail.com', '0789879876', 'senior developer', '81dc9bdb52d04dc20036dbd8313ed055', '2022-04-16 15:52:46'),
(4, 'Allan Nthiga', 'allan@gmail.com', '0780896756', 'Operations Officer', '81dc9bdb52d04dc20036dbd8313ed055', '2022-04-16 17:16:56'),
(8, 'paul karan', 'paulkaran@gmail.com', '0789675843', 'BOM Teacher', '1234', '2022-05-07 20:00:25'),
(9, 'james orengo', 'jamesorengo@gmail.com', '09876543', 'Lawyer', '1234', '2022-05-07 20:34:05'),
(13, 'Patrick Muteti', 'muteti@gmail.com', '0768798754', 'Data Scientist', '1234', '2022-05-07 21:44:00'),
(14, 'Daniel Muturi', 'muturi@gmail.com', '0767879765', 'Network Agent', '81dc9bdb52d04dc20036dbd8313ed055', '2022-05-08 12:05:47'),
(16, 'edwin sifuna', 'sifuna@gmail.com', '0765456787', 'Human Resource Lead', '81dc9bdb52d04dc20036dbd8313ed055', '2022-05-08 12:26:23'),
(17, 'Joshua suez', 'joshua@gmail.com', '07654321', 'Cook', '81dc9bdb52d04dc20036dbd8313ed055', '2022-05-08 22:11:05');
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
