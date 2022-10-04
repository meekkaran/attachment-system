-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1:3306
-- Generation Time: Jul 21, 2022 at 01:07 PM
-- Server version: 8.0.29
-- PHP Version: 7.4.26

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

DELIMITER $$
--
-- Procedures
--
DROP PROCEDURE IF EXISTS `FetAllocatedStudents`$$
CREATE DEFINER=`root`@`localhost` PROCEDURE `FetAllocatedStudents` ()  BEGIN
SELECT * FROM students WHERE Allocated = 'Yes';
END$$

DROP PROCEDURE IF EXISTS `GetAllLecturers`$$
CREATE DEFINER=`root`@`localhost` PROCEDURE `GetAllLecturers` ()  BEGIN
SELECT * FROM lecturers;
END$$

DROP PROCEDURE IF EXISTS `GetAllocatedLecturers`$$
CREATE DEFINER=`root`@`localhost` PROCEDURE `GetAllocatedLecturers` ()  BEGIN
SELECT * FROM lecturers WHERE Allocated = 'Yes';
END$$

DROP PROCEDURE IF EXISTS `GetAllocatedStudents`$$
CREATE DEFINER=`root`@`localhost` PROCEDURE `GetAllocatedStudents` ()  BEGIN
SELECT * FROM students WHERE Allocated = 'Yes';
END$$

DROP PROCEDURE IF EXISTS `GetAllStudents`$$
CREATE DEFINER=`root`@`localhost` PROCEDURE `GetAllStudents` ()  BEGIN
SELECT * FROM students;
END$$

DROP PROCEDURE IF EXISTS `GetAllTrainers`$$
CREATE DEFINER=`root`@`localhost` PROCEDURE `GetAllTrainers` ()  BEGIN
SELECT * FROM trainers;
END$$

DELIMITER ;

-- --------------------------------------------------------

--
-- Table structure for table `assigned`
--

DROP TABLE IF EXISTS `assigned`;
CREATE TABLE IF NOT EXISTS `assigned` (
  `id` int NOT NULL AUTO_INCREMENT,
  `student` int DEFAULT NULL,
  `lecturer` int DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `lecturer_id_idx` (`lecturer`),
  KEY `student_id_idx` (`student`) USING BTREE,
  KEY `id` (`id`,`student`,`lecturer`)
) ENGINE=InnoDB AUTO_INCREMENT=66 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `assigned`
--

INSERT INTO `assigned` (`id`, `student`, `lecturer`) VALUES
(24, 24, 17),
(25, 23, 15),
(26, 15, 6),
(27, 30, 28),
(29, 30, 28),
(33, 92, 42),
(36, 91, 42),
(37, 94, 43),
(38, 93, 43),
(39, 102, 56),
(51, 101, 55),
(53, 100, 55),
(54, 39, 27),
(55, 98, 53),
(56, 82, 41),
(58, 44, 55),
(60, 45, 46),
(61, 62, 42),
(62, 36, 41),
(63, 103, 41),
(64, 63, 45),
(65, 105, 57);

-- --------------------------------------------------------

--
-- Table structure for table `assigned_trainer`
--

DROP TABLE IF EXISTS `assigned_trainer`;
CREATE TABLE IF NOT EXISTS `assigned_trainer` (
  `id` int NOT NULL AUTO_INCREMENT,
  `admission_number` varchar(200) NOT NULL,
  `trainer_id` int NOT NULL,
  PRIMARY KEY (`id`),
  KEY `admission_number_idx` (`admission_number`),
  KEY `trainer_id_idx` (`trainer_id`)
) ENGINE=InnoDB AUTO_INCREMENT=37 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `assigned_trainer`
--

INSERT INTO `assigned_trainer` (`id`, `admission_number`, `trainer_id`) VALUES
(4, '1034040', 1),
(5, '1034020', 18),
(6, '1034020', 18),
(7, '1024560', 21),
(8, '1033980', 22),
(9, '1036032', 23),
(10, '1036032', 23),
(11, '100', 23),
(12, '1020007', 23),
(13, '1032020', 24),
(14, '1034040', 28),
(15, '1032020', 31),
(16, '1033885', 42),
(23, '1033874', 42),
(24, '1033874', 44),
(25, '102345', 44),
(26, '111111111', 44),
(27, '1041050', 44),
(28, '1089090', 44),
(29, '1', 44),
(30, '1047070', 44),
(31, '1033874', 45),
(32, '1034455', 51),
(33, '1065000', 51),
(34, '1056000', 51),
(35, '1067000', 50),
(36, '1078000', 50);

-- --------------------------------------------------------

--
-- Table structure for table `fileup`
--

DROP TABLE IF EXISTS `fileup`;
CREATE TABLE IF NOT EXISTS `fileup` (
  `id` int NOT NULL AUTO_INCREMENT,
  `title` varchar(255) NOT NULL,
  `report` varchar(255) NOT NULL,
  `student_id` int NOT NULL,
  `posted_at` varchar(200) NOT NULL,
  PRIMARY KEY (`id`),
  KEY `student_id_idx` (`student_id`)
) ENGINE=InnoDB AUTO_INCREMENT=40 DEFAULT CHARSET=latin1;

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
(27, 'badria report', '1763-ORDER OF CARMELITES.docx1.docx', 7, '2022-05-06 22:54:51'),
(28, 'attachment report', '3672-Resume.pdf', 29, '2022-05-30 10:16:01'),
(29, 'final year report', '4406-CIAMS.docx', 62, '2022-06-14 23:19:03'),
(30, 'report ', '6240-eer.png', 72, '2022-06-16 11:40:53'),
(31, 'report ', '4154-eer.png', 72, '2022-06-16 12:13:21'),
(32, 'attachment report', '9514-SCH.PROJECT.docx', 72, '2022-06-16 12:13:58'),
(33, 'attachment report', '7193-SCH.PROJECT.docx', 72, '2022-06-16 12:15:01'),
(34, 'report2', '3504-Degree Project Panelist marking scheme.pdf', 72, '2022-06-16 12:15:24'),
(35, 'report2', '6185-Degree Project Panelist marking scheme.pdf', 72, '2022-06-16 12:18:13'),
(36, 'report2', '6777-Degree Project Panelist marking scheme.pdf', 72, '2022-06-16 12:19:40'),
(37, 'reports3', '6323-Example_Title_Page.docx', 72, '2022-06-16 12:20:15'),
(38, 'report4', '1892-Example_Title_Page.docx', 72, '2022-06-16 12:23:36'),
(39, 'attachment report', '3851-CIAMS.docx', 39, '2022-06-20 12:32:45');

-- --------------------------------------------------------

--
-- Table structure for table `lecturerlogs`
--

DROP TABLE IF EXISTS `lecturerlogs`;
CREATE TABLE IF NOT EXISTS `lecturerlogs` (
  `id` int NOT NULL AUTO_INCREMENT,
  `lecturer_id` int NOT NULL,
  `action` varchar(255) DEFAULT NULL,
  `time` varchar(255) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=37 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `lecturerlogs`
--

INSERT INTO `lecturerlogs` (`id`, `lecturer_id`, `action`, `time`) VALUES
(1, 0, 'Deleted Lecturer', '2022-06-14 15:57:57'),
(2, 0, 'Deleted Lecturer', '2022-06-14 16:00:14'),
(3, 0, 'Deleted Lecturer', '2022-06-14 16:01:11'),
(4, 0, 'Deleted Lecturer', '2022-06-14 16:01:50'),
(5, 0, 'Deleted Lecturer', '2022-06-14 16:10:53'),
(6, 0, 'Deleted Lecturer', '2022-06-14 19:29:55'),
(7, 0, 'Deleted Lecturer', '2022-06-14 19:31:56'),
(8, 0, 'Deleted Lecturer', '2022-06-14 19:33:41'),
(9, 0, 'Deleted Lecturer', '2022-06-14 20:03:17'),
(10, 0, 'Deleted Lecturer', '2022-06-15 08:58:29'),
(11, 0, 'Deleted Lecturer', '2022-06-15 09:19:22'),
(12, 32, 'Deleted Lecturer', '2022-06-15 09:40:18'),
(13, 23, 'Deleted Lecturer', '2022-06-15 09:40:44'),
(14, 24, 'Deleted Lecturer', '2022-06-15 09:48:00'),
(15, 40, 'Change password', '2022-06-16 10:55:26'),
(16, 41, 'Login', '2022-06-16 11:40:41'),
(17, 42, 'Login', '2022-06-17 06:23:13'),
(18, 42, 'Login', '2022-06-17 06:24:46'),
(19, 42, 'Login', '2022-06-17 06:30:32'),
(20, 42, 'Login', '2022-06-17 11:23:24'),
(21, 43, 'Login', '2022-06-19 05:36:04'),
(22, 43, 'Login', '2022-06-19 13:35:22'),
(23, 43, 'Change password', '2022-06-19 13:35:49'),
(24, 43, 'Login', '2022-06-19 13:36:02'),
(25, 43, 'Login', '2022-06-19 13:39:38'),
(26, 43, 'Login', '2022-06-19 13:46:09'),
(27, 55, 'Login', '2022-06-20 08:33:19'),
(28, 41, 'Login', '2022-06-20 09:16:25'),
(29, 41, 'Change password', '2022-06-20 09:39:30'),
(30, 41, 'Change password', '2022-06-20 09:44:47'),
(31, 41, 'Login', '2022-06-20 10:28:14'),
(32, 41, 'Login', '2022-06-20 10:30:32'),
(33, 41, 'Login', '2022-06-20 10:40:08'),
(34, 41, 'Login', '2022-06-20 11:17:16'),
(35, 57, 'Login', '2022-06-20 12:55:18'),
(36, 57, 'Login', '2022-06-20 12:56:46');

-- --------------------------------------------------------

--
-- Table structure for table `lecturers`
--

DROP TABLE IF EXISTS `lecturers`;
CREATE TABLE IF NOT EXISTS `lecturers` (
  `lecturer_id` int NOT NULL AUTO_INCREMENT,
  `lecname` varchar(200) NOT NULL,
  `role_id` varchar(200) NOT NULL,
  `email` varchar(200) NOT NULL,
  `phonenumber` int NOT NULL,
  `department` varchar(200) NOT NULL,
  `password` varchar(200) NOT NULL,
  `created_at` varchar(200) NOT NULL,
  `Allocated` varchar(10) NOT NULL DEFAULT 'NO',
  PRIMARY KEY (`lecturer_id`),
  UNIQUE KEY `role_id` (`role_id`,`email`,`phonenumber`)
) ENGINE=InnoDB AUTO_INCREMENT=58 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `lecturers`
--

INSERT INTO `lecturers` (`lecturer_id`, `lecname`, `role_id`, `email`, `phonenumber`, `department`, `password`, `created_at`, `Allocated`) VALUES
(25, 'Jesse Ntalema', 'JN09', 'ntalema@gmail.com', 765432345, 'Community Health and Development', 'e807f1fcf82d132f9bb018ca6738a19f', '2022-06-07 10:00:36', 'YES'),
(26, 'gitl hito', 'teacher', 'git@gmail.com', 789654321, 'Community Health and Development', '81dc9bdb52d04dc20036dbd8313ed055', '2022-06-08 13:43:27', 'YES'),
(27, 'Doreen Smile', 'DS067', 'doreencuea@gmail.com', 76543215, 'Natural Sciences', '81dc9bdb52d04dc20036dbd8313ed055', '2022-06-10 20:08:20', 'NO'),
(29, 'Monca Kemei', 'MKMK09', 'monica@gmail.com', 789765432, 'Natural Sciences', 'e807f1fcf82d132f9bb018ca6738a19f', '2022-06-13 11:59:46', 'NO'),
(33, 'Henry Kate', 'HK07', 'kate@gmail.com', 789654321, 'Community Health and Development', 'e10adc3949ba59abbe56e057f20f883e', '2022-06-15 07:05:05', 'NO'),
(34, 'Edward Kioko', 'EK01', 'kioko@gmail.com', 780908080, 'Computer and Information Science', 'e807f1fcf82d132f9bb018ca6738a19f', '2022-06-15 22:22:22', 'NO'),
(35, 'William Mirugi', 'WM02', 'mirugi@gmail.com', 789676756, 'Computer and Information Science', 'e807f1fcf82d132f9bb018ca6738a19f', '2022-06-15 22:27:32', 'NO'),
(36, 'Vincent web dev', 'VWD03', 'vincent@gmail.com', 767678567, 'Computer and Information Science', 'e807f1fcf82d132f9bb018ca6738a19f', '2022-06-16 00:13:33', 'NO'),
(37, 'Chris Nandasaba', 'CN04', 'chris@gmail.com', 723456789, 'Nursing', 'e807f1fcf82d132f9bb018ca6738a19f', '2022-06-16 00:16:49', 'NO'),
(38, 'Wangete Physics', 'WP006', 'wangete@gmail.com', 765432123, 'Mathematics and Actuarial Science', 'e807f1fcf82d132f9bb018ca6738a19f', '2022-06-16 00:20:01', 'NO'),
(39, 'Mr Mathew Korir', 'MK254', 'matkorir@gmail.com', 707605040, 'Computer and Information Science', 'e807f1fcf82d132f9bb018ca6738a19f', '2022-06-16 09:56:32', 'NO'),
(40, 'Nelly Kisorio', 'NK254', 'nelly@gmail.com', 789675656, 'Nursing', 'c44a471bd78cc6c2fea32b9fe028d30a', '2022-06-16 13:54:24', 'NO'),
(41, 'Burukly boy', 'BBB254', 'buruklyn@gmail.com', 766778899, 'Community Health and Development', 'e807f1fcf82d132f9bb018ca6738a19f', '2022-06-16 14:40:30', 'NO'),
(42, 'Julius Siele', 'JS254', 'siele@gmail.com', 789675432, 'Community Health and Development', 'e807f1fcf82d132f9bb018ca6738a19f', '2022-06-17 09:23:01', 'YES'),
(43, 'Quintox James', 'QJ254', 'quint@gmail.com', 789786543, 'Computer and Information Science', 'a125f852854bff5d6d876183b1a2562c', '2022-06-19 08:35:52', 'YES'),
(44, 'Christopher Letting', 'CL254', 'christopher@gmail.com', 789564321, 'Mathematics and Actuarial Science', 'e807f1fcf82d132f9bb018ca6738a19f', '2022-06-19 18:32:38', 'NO'),
(45, 'George Ouma', 'GO254', 'ouma@gmail.com', 780905634, 'Computer and Information Science', 'e807f1fcf82d132f9bb018ca6738a19f', '2022-06-19 18:33:19', 'NO'),
(46, 'Julius Yego', 'JYJY254', 'yego@gmail.com', 678564321, 'Community Health and Development', 'e807f1fcf82d132f9bb018ca6738a19f', '2022-06-19 18:37:30', 'NO'),
(47, 'Marius Tarus', 'MT254', 'marius@gmail.com', 789561234, 'Natural Sciences', 'e807f1fcf82d132f9bb018ca6738a19f', '2022-06-19 18:39:12', 'NO'),
(48, 'Monca Kemei', 'MKS356', 'kemei@gmail.com', 789564321, 'Computer and Information Science', 'e807f1fcf82d132f9bb018ca6738a19f', '2022-06-19 18:43:12', 'NO'),
(49, 'Ernest Kemei', 'EK254', 'ernest@gmail.com', 767453212, 'Mathematics and Actuarial Science', 'c44a471bd78cc6c2fea32b9fe028d30a', '2022-06-19 18:44:13', 'NO'),
(50, 'Emmanuel Kibet', 'EKEK254', 'emmanuelkibet@gmail.com', 756783412, 'Community Health and Development', 'e807f1fcf82d132f9bb018ca6738a19f', '2022-06-19 18:44:51', 'NO'),
(51, 'Maureen waititu', 'MWMW254', 'waititu@gmail.com', 780121212, 'Natural Sciences', 'e807f1fcf82d132f9bb018ca6738a19f', '2022-06-19 18:45:57', 'NO'),
(52, 'Ian Joseph', 'IJ254', 'ian@gmail.com', 780908090, 'Natural Sciences', 'e807f1fcf82d132f9bb018ca6738a19f', '2022-06-20 10:18:20', 'NO'),
(53, 'Elsie Kisabit', 'EK123', 'elsie@gmail.com', 750607089, 'Natural Sciences', 'e807f1fcf82d132f9bb018ca6738a19f', '2022-06-20 10:19:01', 'NO'),
(54, 'Susa waweru', 'SW254', 'susan@gmail.com', 780123456, 'Computer and Information Science', 'e807f1fcf82d132f9bb018ca6738a19f', '2022-06-20 10:19:36', 'NO'),
(55, 'Rosemary khayendi', 'RK254', 'rosemarykhayendi@gmail.com', 712341234, 'Community Health and Development', 'e807f1fcf82d132f9bb018ca6738a19f', '2022-06-20 10:20:45', 'NO'),
(56, 'Hellen Nyakerario', 'HN254', 'hellen@gmail.com', 723242323, 'Mathematics and Actuarial Science', 'e807f1fcf82d132f9bb018ca6738a19f', '2022-06-20 10:22:10', 'YES'),
(57, 'Doreen Mango', 'DM254', 'doreenmango@gmail.com', 789786543, 'Natural Sciences', 'e807f1fcf82d132f9bb018ca6738a19f', '2022-06-20 15:55:08', 'YES');

-- --------------------------------------------------------

--
-- Table structure for table `logbookdata`
--

DROP TABLE IF EXISTS `logbookdata`;
CREATE TABLE IF NOT EXISTS `logbookdata` (
  `logbk_id` int NOT NULL AUTO_INCREMENT,
  `week_id` int NOT NULL,
  `day_title` varchar(200) NOT NULL,
  `day_notes` text NOT NULL,
  `created_at` varchar(200) NOT NULL,
  `student_id` int NOT NULL,
  PRIMARY KEY (`logbk_id`),
  KEY `week_id_idx` (`week_id`),
  KEY `student_id_idx` (`student_id`) USING BTREE
) ENGINE=InnoDB AUTO_INCREMENT=308 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `logbookdata`
--

INSERT INTO `logbookdata` (`logbk_id`, `week_id`, `day_title`, `day_notes`, `created_at`, `student_id`) VALUES
(160, 1, 'MONDAY', 'good work', '2022-05-06 18:09:08', 4),
(161, 1, 'MONDAY', 'hello', '2022-05-06 18:48:38', 4),
(162, 1, 'TUESDAY', 'really', '2022-05-06 18:56:25', 4),
(163, 2, 'MONDAY', 'wow', '2022-05-06 18:56:36', 4),
(164, 1, 'MONDAY', 'doing crud', '2022-05-06 19:00:57', 5),
(165, 1, 'MONDAY', 'share your journey ', '2022-05-06 21:37:29', 6),
(166, 1, 'TUESDAY', 'enjoy every moment of your day', '2022-05-06 21:37:53', 6),
(167, 1, 'MONDAY', 'Im perfect', '2022-05-06 21:50:45', 7),
(168, 1, 'TUESDAY', 'all is well', '2022-05-06 21:50:55', 7),
(169, 1, 'MONDAY', 'learnt about password hashind', '2022-05-09 13:33:58', 20),
(170, 1, 'TUESDAY', 'everytthng is fine', '2022-05-09 15:43:18', 20),
(171, 1, 'WEDNESDAY', 'all is well here', '2022-05-09 15:44:46', 20),
(172, 1, 'MONDAY', 'hello', '2022-05-11 08:06:26', 21),
(173, 3, 'LEC_COMMENT', 'good work', '2022-05-11 08:06:54', 21),
(174, 1, 'LEC_COMMENT', 'bravo', '2022-05-11 10:24:05', 0),
(175, 1, 'LEC_COMMENT', 'ggfgf', '2022-05-11 10:29:52', 0),
(176, 1, 'LEC_COMMENT', 'sdsad', '2022-05-11 10:37:37', 0),
(177, 1, 'LEC_COMMENT', 'ighihijoj', '2022-05-11 10:40:05', 0),
(178, 1, 'LEC_COMMENT', 'vvvsvsvsvvs', '2022-05-11 10:42:20', 0),
(179, 2, 'LEC_COMMENT', 'dsdsa', '2022-05-11 10:44:55', 0),
(180, 3, 'LEC_COMMENT', 'hhbjj', '2022-05-11 10:46:39', 0),
(181, 4, 'LEC_COMMENT', 'sxfss', '2022-05-11 10:48:59', 0),
(182, 7, 'LEC_COMMENT', 'safsfs', '2022-05-11 10:53:32', 1),
(183, 1, 'LEC_COMMENT', 'eerrrr', '2022-05-11 11:01:03', 21),
(184, 4, 'LEC_COMMENT', 'hello', '2022-05-11 11:01:56', 21),
(185, 2, 'LEC_COMMENT', 'bxccxbcxb', '2022-05-11 11:05:55', 21),
(186, 5, 'LEC_COMMENT', 'zfsdfds', '2022-05-11 11:09:29', 21),
(187, 6, 'LEC_COMMENT', 'hhh', '2022-05-11 11:10:31', 21),
(188, 7, 'LEC_COMMENT', 'sgsdzgdz', '2022-05-11 11:12:04', 21),
(189, 8, 'LEC_COMMENT', 'zDZFSZXFsDzS', '2022-05-11 11:12:17', 21),
(190, 1, 'TRAINER_COMMENT', 'trrrr', '2022-05-11 12:20:54', 21),
(191, 2, 'TRAINER_COMMENT', 'ggg', '2022-05-11 12:21:10', 21),
(192, 1, 'TUESDAY', 'UKGBUB', '2022-05-11 13:11:21', 21),
(193, 1, 'WEDNESDAY', 'LKBLKNK', '2022-05-11 13:11:32', 21),
(194, 3, 'THURSDAY', 'sahfbshabsdfha', '2022-05-11 13:21:14', 21),
(195, 7, 'LEC_COMMENT', 'yffy', '2022-05-11 13:28:54', 21),
(196, 9, 'LEC_COMMENT', 'ghggu', '2022-05-11 13:29:24', 21),
(197, 7, 'LEC_COMMENT', 'sfsfasfs', '2022-05-11 15:17:38', 21),
(198, 1, 'LEC_COMMENT', 'good work natasha', '2022-05-27 14:59:06', 23),
(199, 1, 'MONDAY', 'work on integrating the mpesa app on the company website', '2022-05-28 12:04:38', 24),
(200, 1, 'TUESDAY', 'learning about microsoft nav', '2022-05-28 12:19:15', 24),
(201, 1, 'WEDNESDAY', 'had a meeting to discuss about the cashbackapp', '2022-05-28 12:19:56', 24),
(202, 1, 'THURSDAY', 'good day i installed nav in my latop', '2022-05-28 12:25:05', 24),
(203, 1, 'LEC_COMMENT', 'keep learning about nav it is a good opportunity', '2022-05-28 12:26:42', 24),
(204, 1, 'TRAINER_COMMENT', 'i love the confidence and the enthusiasm ', '2022-05-28 12:42:58', 24),
(205, 1, 'MONDAY', 'started with introduction and being taken through company structures', '2022-05-30 07:03:00', 26),
(206, 1, 'MONDAY', 'went through the cashback mtaani app', '2022-05-30 10:13:02', 29),
(207, 1, 'TUESDAY', 'worked lambdas ', '2022-05-30 10:13:34', 29),
(208, 1, 'LEC_COMMENT', 'what happened fro  wednesday?', '2022-05-30 10:32:09', 29),
(209, 1, 'TRAINER_COMMENT', 'good work good work', '2022-05-30 10:51:12', 29),
(210, 1, 'MONDAY', 'vnfjvnfjv', '2022-06-04 19:05:35', 19),
(211, 1, 'MONDAY', 'fair week met with officials', '2022-06-07 10:13:37', 30),
(212, 1, 'TUESDAY', 'everything is okay, except a cold weather', '2022-06-07 10:13:55', 30),
(213, 1, 'WEDNESDAY', 'fix website', '2022-06-08 11:18:58', 30),
(214, 1, 'MONDAY', 'started with understanding thhe current system', '2022-06-10 07:48:26', 16),
(215, 1, 'TUESDAY', 'went through the templated and the documentation', '2022-06-10 07:48:53', 16),
(216, 1, 'WEDNESDAY', 'had a meeting wth staff', '2022-06-10 07:49:15', 16),
(217, 1, 'THURSDAY', 'met with ceo', '2022-06-10 07:49:24', 16),
(218, 1, 'FRIDAY', 'my fellow students joined me', '2022-06-10 07:49:37', 16),
(219, 1, 'SATURDAY', 'didnt go to work', '2022-06-10 07:49:52', 16),
(220, 1, 'SATURDAY', 'planted trees', '2022-06-10 07:50:10', 16),
(221, 1, 'REMARK', 'its been a good week everyone', '2022-06-10 07:50:28', 16),
(222, 1, 'MONDAY', 'Cme up with good music', '2022-06-11 08:21:22', 47),
(223, 1, 'TUESDAY', 'wokred on album', '2022-06-11 08:21:34', 47),
(224, 1, 'FRIDAY', 'read a book', '2022-06-12 16:47:24', 30),
(225, 1, 'LEC_COMMENT', 'good work noeline', '2022-06-12 16:57:29', 30),
(226, 1, 'MONDAY', 'introduction to the company', '2022-06-13 09:52:50', 50),
(227, 1, 'MONDAY', 'perfect', '2022-06-13 15:48:38', 39),
(228, 1, 'TUESDAY', 'a lot of research', '2022-06-13 15:50:53', 39),
(229, 1, 'WEDNESDAY', 'Docmentation', '2022-06-13 15:51:03', 39),
(230, 1, 'MONDAY', 'Did vocal practice', '2022-06-16 14:11:31', 86),
(231, 1, 'TUESDAY', 'recorded my beats', '2022-06-16 14:11:43', 86),
(232, 1, 'WEDNESDAY', 'met nsg', '2022-06-16 14:11:51', 86),
(233, 1, 'THURSDAY', 'practised choreography', '2022-06-16 14:12:04', 86),
(234, 1, 'FRIDAY', 'met beyonce ', '2022-06-16 14:12:17', 86),
(235, 1, 'SATURDAY', 'didnt go to work today', '2022-06-16 14:12:30', 86),
(236, 1, 'REMARK', 'so far so good', '2022-06-16 14:12:42', 86),
(237, 1, 'MONDAY', 'downloaded excel and all microsoft office products', '2022-06-16 14:24:04', 87),
(238, 1, 'TUESDAY', 'started with intro to excel sheet and how it works', '2022-06-16 14:24:22', 87),
(239, 1, 'MONDAY', 'introduction at the registry', '2022-06-17 09:10:17', 92),
(240, 1, 'TUESDAY', 'took over as the assistant registrar', '2022-06-17 09:10:34', 92),
(241, 1, 'WEDNESDAY', 'all went well, good company', '2022-06-17 09:10:50', 92),
(242, 1, 'THURSDAY', 'went for mass', '2022-06-17 09:11:02', 92),
(243, 1, 'FRIDAY', 'prayed and fasted', '2022-06-17 09:11:16', 92),
(244, 1, 'SATURDAY', 'rest day', '2022-06-17 09:11:27', 92),
(245, 1, 'REMARK', 'its been a fair week ', '2022-06-17 09:11:40', 92),
(246, 2, 'MONDAY', 'registered students into the system', '2022-06-17 09:12:08', 92),
(247, 2, 'TUESDAY', 'admitted new students', '2022-06-17 09:12:26', 92),
(248, 2, 'WEDNESDAY', 'did an orientation for the students', '2022-06-17 09:12:42', 92),
(249, 2, 'THURSDAY', 'went for rosary prayers', '2022-06-17 09:12:58', 92),
(250, 2, 'FRIDAY', 'took  a rest', '2022-06-17 09:13:12', 92),
(251, 3, 'MONDAY', 'was introduced to the vc f the school', '2022-06-17 09:13:39', 92),
(252, 3, 'TUESDAY', 'had a meeting with board', '2022-06-17 09:13:56', 92),
(253, 3, 'WEDNESDAY', 'printed documents for special and supplementary exams', '2022-06-17 09:14:20', 92),
(254, 1, 'LEC_COMMENT', 'You are doing a good job keep up', '2022-06-17 09:25:58', 92),
(255, 2, 'LEC_COMMENT', 'what happenned this saturday?', '2022-06-17 09:26:16', 92),
(256, 1, 'MONDAY', 'intro to the company', '2022-06-17 09:27:42', 91),
(257, 1, 'TUESDAY', 'chose our teams for the rally', '2022-06-17 09:27:55', 91),
(258, 1, 'WEDNESDAY', 'familiarised with the team and the coach', '2022-06-17 09:28:14', 91),
(259, 1, 'THURSDAY', 'started intense practice', '2022-06-17 09:28:43', 91),
(260, 1, 'THURSDAY', 'started intense practice', '2022-06-17 09:28:43', 91),
(261, 1, 'FRIDAY', 'bourgt new jerseys', '2022-06-17 09:29:05', 91),
(262, 2, 'MONDAY', 'stated practise', '2022-06-17 09:29:17', 91),
(263, 2, 'MONDAY', 'stated practise', '2022-06-17 09:29:17', 91),
(264, 2, 'TUESDAY', 'played golf', '2022-06-17 09:29:34', 91),
(265, 1, 'TRAINER_COMMENT', 'you are very ambitious', '2022-06-17 11:50:21', 92),
(266, 2, 'TRAINER_COMMENT', 'keep it up caleb', '2022-06-17 11:50:37', 92),
(267, 1, 'TRAINER_COMMENT', 'You are a strong student', '2022-06-17 12:01:53', 91),
(268, 3, 'THURSDAY', 'logbook details', '2022-06-17 14:22:34', 92),
(269, 3, 'LEC_COMMENT', 'Good work', '2022-06-17 14:24:00', 92),
(270, 1, 'LEC_COMMENT', 'you are lazy', '2022-06-17 14:24:36', 91),
(271, 3, 'TRAINER_COMMENT', 'you are doing a good job', '2022-06-17 14:26:24', 92),
(272, 1, 'MONDAY', 'Bought fish nets', '2022-06-19 16:40:37', 93),
(273, 1, 'TUESDAY', 'Met with out trainer', '2022-06-19 16:40:51', 93),
(274, 1, 'WEDNESDAY', 'yoga and meditation', '2022-06-19 16:41:01', 93),
(275, 1, 'THURSDAY', 'started fishing lessons', '2022-06-19 16:41:15', 93),
(276, 1, 'FRIDAY', 'went for a tour to lake victoria', '2022-06-19 16:41:31', 93),
(277, 1, 'SATURDAY', 'didnt go to work', '2022-06-19 16:41:44', 93),
(278, 1, 'REMARK', 'introduction was good', '2022-06-19 16:44:23', 93),
(279, 1, 'LEC_COMMENT', 'keep up beryl', '2022-06-19 16:46:29', 93),
(280, 1, 'MONDAY', 'background of research', '2022-06-20 11:22:26', 101),
(281, 1, 'TUESDAY', 'problem statement', '2022-06-20 11:23:12', 101),
(282, 1, 'WEDNESDAY', 'aimsof research', '2022-06-20 11:23:43', 101),
(283, 1, 'THURSDAY', 'objectives of research', '2022-06-20 11:23:54', 101),
(284, 1, 'FRIDAY', 'objectives of research', '2022-06-20 11:24:16', 101),
(285, 1, 'SATURDAY', 'didnt show up', '2022-06-20 11:24:38', 101),
(286, 1, 'SATURDAY', 'didnt show up', '2022-06-20 11:24:50', 101),
(287, 2, 'MONDAY', 'scope of the research', '2022-06-20 11:25:30', 101),
(288, 2, 'TUESDAY', 'review of related work', '2022-06-20 11:25:48', 101),
(289, 2, 'WEDNESDAY', 'entity relation diagram', '2022-06-20 11:26:02', 101),
(290, 2, 'THURSDAY', 'conclusions, challenges and future recommendations', '2022-06-20 11:26:26', 101),
(291, 2, 'FRIDAY', 'added comments on css', '2022-06-20 11:26:53', 101),
(292, 3, 'MONDAY', 'submitted to department of cs', '2022-06-20 11:27:45', 101),
(293, 3, 'TUESDAY', 'added users on powerpoint', '2022-06-20 11:28:43', 101),
(294, 3, 'WEDNESDAY', 'clarified on features of the system', '2022-06-20 11:29:06', 101),
(295, 1, 'THURSDAY', 'destroyed all session variables on the system', '2022-06-20 11:29:39', 101),
(296, 3, 'THURSDAY', 'submitted reports ', '2022-06-20 11:30:35', 101),
(297, 3, 'FRIDAY', 'changed passwords for countable users', '2022-06-20 11:31:52', 101),
(298, 1, 'TRAINER_COMMENT', 'good work zamzam', '2022-06-20 11:41:22', 101),
(299, 1, 'THURSDAY', 'did password authentication', '2022-06-20 12:31:47', 39),
(300, 10, 'MONDAY', 'all is bad', '2022-06-20 12:34:58', 39),
(301, 1, 'MONDAY', 'started off by being introduced to all the estates availble', '2022-06-20 13:27:02', 103),
(302, 1, 'TUESDAY', 'meeting with constructors to discuss the innua tujenge project', '2022-06-20 13:27:57', 103),
(303, 1, 'MONDAY', 'started with presenting to the panel', '2022-06-20 14:49:14', 104),
(304, 1, 'TUESDAY', 'designed the ui and ux', '2022-06-20 14:49:37', 104),
(305, 1, 'MONDAY', 'introduction to the company', '2022-06-20 15:52:57', 105),
(306, 1, 'LEC_COMMENT', 'you are lazy', '2022-06-20 15:57:35', 105),
(307, 1, 'TRAINER_COMMENT', 'you are doing good', '2022-06-20 15:59:42', 105);

-- --------------------------------------------------------

--
-- Table structure for table `pdf_data`
--

DROP TABLE IF EXISTS `pdf_data`;
CREATE TABLE IF NOT EXISTS `pdf_data` (
  `id` int NOT NULL AUTO_INCREMENT,
  `admissionumber` int NOT NULL,
  `filename` varchar(255) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

-- --------------------------------------------------------

--
-- Table structure for table `studentlogs`
--

DROP TABLE IF EXISTS `studentlogs`;
CREATE TABLE IF NOT EXISTS `studentlogs` (
  `id` int NOT NULL AUTO_INCREMENT,
  `student_id` int NOT NULL,
  `action` varchar(255) DEFAULT NULL,
  `time` varchar(255) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=35 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `studentlogs`
--

INSERT INTO `studentlogs` (`id`, `student_id`, `action`, `time`) VALUES
(1, 32, 'Deleted student', '2022-06-15 09:40:18'),
(2, 23, 'Deleted student', '2022-06-15 09:40:44'),
(3, 33, 'Deleted student', '2022-06-15 09:46:29'),
(4, 34, 'Deleted student', '2022-06-15 09:48:55'),
(5, 72, 'Change password', '2022-06-16 08:35:58'),
(6, 86, 'Login', '2022-06-16 11:09:53'),
(7, 87, 'Login', '2022-06-16 11:29:11'),
(8, 87, 'Login', '2022-06-17 05:46:37'),
(9, 89, 'Login', '2022-06-17 05:59:20'),
(10, 89, 'Login', '2022-06-17 06:01:05'),
(11, 92, 'Login', '2022-06-17 06:09:55'),
(12, 91, 'Login', '2022-06-17 06:27:24'),
(13, 92, 'Login', '2022-06-17 09:23:05'),
(14, 93, 'Login', '2022-06-17 09:25:20'),
(15, 92, 'Login', '2022-06-17 10:33:19'),
(16, 94, 'Login', '2022-06-17 11:13:31'),
(17, 92, 'Login', '2022-06-17 11:21:47'),
(18, 92, 'Login', '2022-06-17 11:27:21'),
(19, 92, 'Login', '2022-06-17 12:40:45'),
(20, 92, 'Login', '2022-06-18 16:17:27'),
(21, 93, 'Login', '2022-06-19 13:40:18'),
(22, 101, 'Login', '2022-06-20 08:21:50'),
(23, 102, 'Deleted student', '2022-06-20 08:55:14'),
(24, 37, 'Deleted student', '2022-06-20 09:29:03'),
(25, 101, 'Login', '2022-06-20 09:29:51'),
(26, 39, 'Login', '2022-06-20 09:31:20'),
(27, 72, 'Login', '2022-06-20 10:06:56'),
(28, 72, 'Change password', '2022-06-20 10:08:21'),
(29, 72, 'Login', '2022-06-20 10:08:39'),
(30, 103, 'Login', '2022-06-20 10:25:13'),
(31, 104, 'Login', '2022-06-20 11:48:53'),
(32, 104, 'Login', '2022-06-20 12:04:42'),
(33, 104, 'Login', '2022-06-20 12:47:05'),
(34, 105, 'Login', '2022-06-20 12:51:48');

-- --------------------------------------------------------

--
-- Table structure for table `students`
--

DROP TABLE IF EXISTS `students`;
CREATE TABLE IF NOT EXISTS `students` (
  `student_id` int NOT NULL AUTO_INCREMENT,
  `fullname` varchar(200) NOT NULL,
  `admission_number` varchar(200) NOT NULL,
  `email` varchar(200) NOT NULL,
  `phone_number` varchar(200) NOT NULL,
  `department` varchar(200) NOT NULL,
  `company_name` varchar(200) NOT NULL,
  `company_contact` varchar(200) NOT NULL,
  `company_address` varchar(200) NOT NULL,
  `company_email` varchar(200) NOT NULL,
  `startingdate` varchar(200) NOT NULL,
  `password` varchar(200) NOT NULL,
  `created_at` varchar(200) NOT NULL,
  `Allocated` varchar(10) NOT NULL DEFAULT 'NO',
  PRIMARY KEY (`student_id`),
  UNIQUE KEY `email` (`email`,`phone_number`),
  UNIQUE KEY `admission_number` (`admission_number`)
) ENGINE=InnoDB AUTO_INCREMENT=106 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `students`
--

INSERT INTO `students` (`student_id`, `fullname`, `admission_number`, `email`, `phone_number`, `department`, `company_name`, `company_contact`, `company_address`, `company_email`, `startingdate`, `password`, `created_at`, `Allocated`) VALUES
(36, 'Joel Jilani', '1041050', 'evamosero@gmail.com', '0765432345', 'Community Health and Development', 'KaranCo', 'KaranCo', 'Masai Lodge, Rongai', 'karanco@gmail.co.ke', '2022-06-16', 'e807f1fcf82d132f9bb018ca6738a19f', '2022-06-09 09:46:30', 'NO'),
(39, 'Alpha Alphaxard', '1089090', 'alpha@gmail.com', '0767895643', 'Mathematics and Actuarial Science', 'KaranCo', '67890876', 'Masai Lodge, Rongai', 'jum@gmail.com', '2022-06-09', 'e807f1fcf82d132f9bb018ca6738a19f', '2022-06-10 12:32:22', 'NO'),
(43, 'Has Ndegwa', '1047070', 'hans@gmail.com', '0765456789', 'Natural Sciences', 'Kenya Revenue Authority', '08765432345', 'Westlands,Church road', 'kra@gmail.com', '2022-06-09', 'e807f1fcf82d132f9bb018ca6738a19f', '2022-06-10 13:28:03', 'NO'),
(44, 'Sza Joji', '1046060', 'sza@gmail.com', '0765431234', 'Community Health and Development', 'Kenya MusicIndustry', '0789654321', 'Nairobi kicc', 'kmi@gmail.com', '2022-06-09', '25d55ad283aa400af464c76d713c07ad', '2022-06-10 20:07:06', 'NO'),
(45, 'Daniel Kamau', '1035050', 'dante@gmail.com', '0765432167890', 'Natural Sciences', 'Williamson Estate', '12345678', 'Tinderet', 'williamson@gmail.com', '09/07/2022', 'e807f1fcf82d132f9bb018ca6738a19f', '2022-06-11 00:10:00', 'NO'),
(46, 'Chris Brown', '1056060', 'brown@gmail.com', '0789765432', 'Computer and Information Science', 'Americans Got Talent', '0897654321', 'Ohio - Us', 'amg@gmail.com', '03-05-2022', 'e807f1fcf82d132f9bb018ca6738a19f', '2022-06-11 00:21:13', 'NO'),
(47, 'Hillsong United', '1098080', 'hillsong@gmail.com', '0789765432', 'Community Health and Development', 'Gospel Victory', '07896543', 'Dallas-Texas', 'gsp@gmail.com', '09/07/20', 'e807f1fcf82d132f9bb018ca6738a19f', '2022-06-11 08:20:39', 'YES'),
(50, 'Joseph James', '1081010', 'joseph@gmail.com', '0789564321', 'Nursing', 'Swvl', '097865432', 'delta annex westlands', 'swvlkenta@gmail.com', '8/06/2022', 'e807f1fcf82d132f9bb018ca6738a19f', '2022-06-13 09:52:01', 'NO'),
(51, 'Jane Wanja', '1037777', 'wanja@gmail.com', '07654321678', 'Community Health and Development', 'Avenue Hoospital', '09876540', 'Parklands', 'avenue@gmail.com', '5/6/2022', 'e807f1fcf82d132f9bb018ca6738a19f', '2022-06-13 10:10:50', 'NO'),
(52, 'Boniface Mwangi', '1069090', 'boniface@gmail.com', '0765432178', 'Mathematics and Actuarial Science', 'Utalii house', '0897654134', 'Parliament Road', 'utalii@gmail.com', '8/09/2022', 'e807f1fcf82d132f9bb018ca6738a19f', '2022-06-13 11:17:47', 'NO'),
(53, 'Collins Kiprono', '1045656', 'collo@gmail.com', '0765431234', 'Computer and Information Science', 'TopTal', '0789654321', 'Ojijo road', 'toptal@gmail.com', '5/6/2022', 'e807f1fcf82d132f9bb018ca6738a19f', '2022-06-13 14:41:54', 'NO'),
(54, 'Faith Kasuku', '1065555', 'kasuku@gmail.com', '07896543219', 'Computer and Information Science', 'Retirement Authority', '0789654321456', 'KMA Plaza', 'retire@gmail.com', '5/6/2022', 'e807f1fcf82d132f9bb018ca6738a19f', '2022-06-13 14:59:01', 'NO'),
(55, 'Jeremy Cousin', '1057777', 'jeremy@gmail.com', '0789654321', 'Nursing', 'Kenya Theatre', '089765432', 'CBD -Nairobi', 'kt@gmail.com', '2022-06-09', '25d55ad283aa400af464c76d713c07ad', '2022-06-13 15:26:55', 'NO'),
(56, 'Florence Njeri', '1035000', 'florence@gmail.com', '07896754678', 'Natural Sciences', 'PWC Kenya', '0987654321', 'Ring Road', 'pwckenya@gmail.com', '09/07/2022', 'e807f1fcf82d132f9bb018ca6738a19f', '2022-06-14 10:47:35', 'NO'),
(59, 'Victorine Cheruto', '1034000', 'victorine@gmail.com', '0789564321', 'Natural Sciences', 'kmtc kenya - nairobi', '0789564321', 'Uhuru highway', 'kmtc@gmail.com', '5/6/2022', 'e807f1fcf82d132f9bb018ca6738a19f', '2022-06-14 11:15:41', 'YES'),
(60, 'Emma chepkemoi', '1046666', 'emma@gmail.com', '0789564321', 'Community Health and Development', 'KRA Eldoret', '0789541234', 'West Indis', 'kraeldy@gmail.com', '5/6/2022', 'e807f1fcf82d132f9bb018ca6738a19f', '2022-06-14 13:20:04', 'NO'),
(61, 'Zipporah Kering', '101101', 'zippy@gmail.com', '078956432145', 'Community Health and Development', 'Kenya Tailors Association', '0789654321', 'River Road- cbd', 'kta@gmail.com', '14/6/2022', 'e807f1fcf82d132f9bb018ca6738a19f', '2022-06-14 18:19:30', 'NO'),
(62, 'Sharon Okello', '10002000', 'okel@gmail.com', '078956784567', 'Natural Sciences', 'Kenya Fisheries', '078956789089', 'Kisumu Impala', 'fishery@gmail.com', '09/07/2022', 'e807f1fcf82d132f9bb018ca6738a19f', '2022-06-14 23:18:30', 'YES'),
(63, 'Linet Audi', '102102102', 'linet@gmail.com', '0789678989', 'Computer and Information Science', 'Onema Aithority', '0897656789', 'Nyamira -county', 'onema@gmail.com', '5/6/2022', 'e807f1fcf82d132f9bb018ca6738a19f', '2022-06-15 00:27:09', 'NO'),
(64, 'Mercy Samoei', '104104104', 'samoei@gmail.com', '0789675432', 'Nursing', 'Maraba Hospital', '07896785432', 'Tinderet road', 'maraba@gmail.com', '2022-06-08', 'fcea920f7412b5da7be0cf42b8c93759', '2022-06-15 06:58:52', 'NO'),
(65, 'Sharon Kemunto', '103103103', 'kemunto@gmail.com', '0789898989', 'Computer and Information Science', 'AISEC company', '0897656789', 'Times Tower -Nairobi', 'aisec@gmal.com', '07/07/2022', 'e807f1fcf82d132f9bb018ca6738a19f', '2022-06-15 07:16:47', 'NO'),
(66, 'Dennis Karari', '105105105', 'karari@gmail.com', '0789787878', 'Natural Sciences', 'Fenty Beauty', '078989785678', 'Diplomat Mall', 'fenty@gmail.com', '07/07/2022', '6eea9b7ef19179a06954edd0f6c05ceb', '2022-06-15 07:19:43', 'NO'),
(68, 'Laban Tireito', '106106106', 'tireito@gmail.com', '0789678956', 'Natural Sciences', 'Kabarrack University', '089654321', 'Nakuru - Njoro road', 'kabarak@gmail.com', '07/07/2022', '81dc9bdb52d04dc20036dbd8313ed055', '2022-06-15 07:33:13', 'NO'),
(71, 'Rovers Kiprono', '1033875', 'rovers@gmail.com', '0722908406', 'Computer and Information Science', 'DCI Kenya', '07896666666', 'Kiambu Road - Nairobi', 'dcikenya@gmail.com', '8/07/2022', 'e807f1fcf82d132f9bb018ca6738a19f', '2022-06-15 21:49:40', 'NO'),
(72, 'Gilllian Karan', '1033876', 'gillian@gmail.com', '0726530699', 'Nursing', 'Avenue Hoospital', '0789564321', 'Parklands - Nairobi', 'avenue@gmail.com', '07/07/2022', 'e807f1fcf82d132f9bb018ca6738a19f', '2022-06-15 22:03:25', 'NO'),
(73, 'Mitchelle Chepkorir', '1033877', 'mitchy@gmail.com', '0702020240', 'Community Health and Development', 'Kabete Agric', '0789675432', 'Lower Kabete Road', 'kabete@gmail.com', '07/07/2022', 'e807f1fcf82d132f9bb018ca6738a19f', '2022-06-15 22:11:00', 'NO'),
(74, 'Badria Karan', '1033878', 'badria@gmail.com', '074545454567', 'Mathematics and Actuarial Science', 'Victoria Secret', '078989898989', 'Manchester - United Kingdom', 'secrets@gmail.com', '07/07/2022', 'e807f1fcf82d132f9bb018ca6738a19f', '2022-06-15 22:15:18', 'NO'),
(75, 'Emmanuel Kipkoech', '1041000', 'emmanuel@gmail.com', '0789898967', 'Natural Sciences', 'Kenya Aviation', '023466634', 'Jkia - Embakasi', 'aviation@gmail.com', '15/6/2022', 'e807f1fcf82d132f9bb018ca6738a19f', '2022-06-15 22:55:29', 'NO'),
(76, 'Becky Kitony\'', '1042000', 'becky@gmail.com', '0778896744', 'Mathematics and Actuarial Science', 'Kenya Revenue Authority', '0789564321', 'Kicc - nairobi cbd', 'kra@gmail.com', '16/6/2022', 'e807f1fcf82d132f9bb018ca6738a19f', '2022-06-15 23:37:07', 'NO'),
(82, 'Cindy Kipsang', '1034010', 'cindy@gmail.com', '076767675645', 'Mathematics and Actuarial Science', 'Spotify Africa', '0789564321', 'South Acrica - Cape Town', 'spotify@gmail.com', '2022-06-21', 'e807f1fcf82d132f9bb018ca6738a19f', '2022-06-16 00:30:33', 'NO'),
(83, 'Olivia Chumbz', '1034020', 'olivia@gmail.com', '078912345678', 'Community Health and Development', 'Setek Hospital', '0756432156', 'Meteitei - Kenya', 'setek@gmail.com', '20/06/2022', 'e807f1fcf82d132f9bb018ca6738a19f', '2022-06-16 00:35:10', 'NO'),
(84, 'Victor Kipchir', '1034030', 'victor@gmail.com', '0722334455', 'Natural Sciences', 'Technical Institute', '0789654321', 'Sigoria Road', 'techinstitute@gmail.com', '21/06/2022', 'e807f1fcf82d132f9bb018ca6738a19f', '2022-06-16 07:43:24', 'NO'),
(85, 'Susan Mary', '1045555', 'marysusan@gmail.com', '0766778899', 'Natural Sciences', 'kmtc  nairobi', '068653278', 'nairobi west, madaraka', 'kmtckenya@gmail.com', '07/06/2022', 'c44a471bd78cc6c2fea32b9fe028d30a', '2022-06-16 11:25:23', 'NO'),
(86, 'Central Cee', '1033880', 'central@gmail.com', '0712345679', 'Community Health and Development', 'UK drill', '07896754321', 'Switzerlans - Europe', 'drill@gmail.com', '16/06/2022', 'e807f1fcf82d132f9bb018ca6738a19f', '2022-06-16 14:09:41', 'NO'),
(87, 'Newton Simotwo', '1033881', 'simotwo@gmail.com', '0780908090', 'Natural Sciences', 'CashBackApp', '078989898970', 'Nairobi Garage - Delta Corner Annex', 'cashback@gmail.com', '30/06/2022', 'e807f1fcf82d132f9bb018ca6738a19f', '2022-06-16 14:23:28', 'NO'),
(88, 'Belinda Chepkemoi', '1083881', 'belinda@gmail.com', '0723124124', 'Natural Sciences', 'Swvl', '0789678567', 'Information house - cbd', 'swvl@gmail.com', '5/6/2022', 'e807f1fcf82d132f9bb018ca6738a19f', '2022-06-17 08:46:22', 'NO'),
(89, 'Sylvia Chemengen', '1033882', 'chemengen@gmail.com', '0756567788', 'Nursing', 'mbagathi hospital', '0789687746', 'Kenyatta - Nairobi', 'mbagathi@gmail.com', '18/06/2022', 'e807f1fcf82d132f9bb018ca6738a19f', '2022-06-17 08:59:07', 'NO'),
(91, 'Bethwel Kamau', '1033874', 'bethwel@gmail.com', '0707809060', 'Community Health and Development', 'Kenya Basketball', '0789563421', 'Juja Kiambu', 'basketball@gmail.com', '20/06/2022', 'e807f1fcf82d132f9bb018ca6738a19f', '2022-06-17 09:06:48', 'NO'),
(92, 'Caleb Batyem', '1033885', 'batyem@gmail.com', '0780906789', 'Mathematics and Actuarial Science', 'Kabarak university', '0789675432', 'Nakuru - Njoro road', 'kabarak@gmail.com', '18/06/2022', 'e807f1fcf82d132f9bb018ca6738a19f', '2022-06-17 09:09:43', 'YES'),
(93, 'Beryl Onyango', '1033889', 'beryl@gmail.com', '0756453212', 'Computer and Information Science', 'Tumaini Police Station', '078989676746', 'Kapsabet - Nandi Songhor Road', 'tumaini@gmail.com', '21/06/2022', 'e807f1fcf82d132f9bb018ca6738a19f', '2022-06-17 12:25:06', 'NO'),
(94, 'Damian James', '1046767', 'damian@gmail.com', '0787675643', 'Community Health and Development', 'KaranCo', '076854321', 'Masai Lodge, Rongai', 'community@gmail.com', '5/07/2022', 'e807f1fcf82d132f9bb018ca6738a19f', '2022-06-17 14:12:55', 'YES'),
(95, 'Genesis John', '1023344', 'genesis@gmail.com', '0789567843', 'Community Health and Development', 'KaranCo', '0897654321', 'Masai Lodge, Rongai', 'karanco@gmail.co.ke', '5/8/2022', 'e807f1fcf82d132f9bb018ca6738a19f', '2022-06-19 18:11:53', 'NO'),
(96, 'Exodus Cheruiyot', '1024455', 'cheruiyot@gmail.com', '0767564532', 'Mathematics and Actuarial Science', 'Nandi Tea ', '0678453211', 'Nandi hills  town', 'nanditea@gmail.com', '08/07/2022', 'e807f1fcf82d132f9bb018ca6738a19f', '2022-06-19 18:13:14', 'NO'),
(97, 'Mathew Henry', '1025566', 'mathew@gmail.com', '0780907089', 'Mathematics and Actuarial Science', 'Kenya Revenue Authority', '0789756433', 'Lantana ROad - Westands', 'kra@gmail.com', '09/07/2022', 'e807f1fcf82d132f9bb018ca6738a19f', '2022-06-19 18:14:26', 'NO'),
(98, 'Ruth Jeptum', '1026677', 'ruthjeptum@gmail.com', '07896754321', 'Computer and Information Science', 'Kenya Tellecommunications', '07675432167', 'Waiyaki way', 'tellecom@gmail.com', '18/06/2022', 'e807f1fcf82d132f9bb018ca6738a19f', '2022-06-19 18:15:58', 'NO'),
(99, 'Junet Mohhamed', '1027788', 'junet@gmail.com', '0780906754', 'Computer and Information Science', 'Jubillee Govt', '0678945342115', 'Kahawa west - Kenya', 'jubillee@gmail.com', '20/06/2022', 'e807f1fcf82d132f9bb018ca6738a19f', '2022-06-19 18:17:09', 'NO'),
(100, 'Lydia Ngetich', '102888999', 'lydia@gmail.com', '0780907060', 'Computer and Information Science', 'Chemelil Sugar', '0789805643', 'Chemelil - Nandi', 'chemeli@gmail.com', '20/06/2022', 'e807f1fcf82d132f9bb018ca6738a19f', '2022-06-19 18:19:11', 'NO'),
(101, 'Zamzam Bonaya', '1034455', 'zamzam@gmail.com', '0789786543', 'Community Health and Development', 'Badminton Kenya', '07896754321', 'Uhuru highway', 'badminton@gmail.com', '22/06/2022', 'e807f1fcf82d132f9bb018ca6738a19f', '2022-06-19 18:20:42', 'YES'),
(103, 'Cyprian Esogal', '1056000', 'esogal@gmail.com', '0712345699', 'Community Health and Development', 'Real Estate ', '0789345213', 'Kiambu Road - Nairobi', 'realestate@gmail.com', '20/06/2022', 'e807f1fcf82d132f9bb018ca6738a19f', '2022-06-20 13:25:01', 'YES'),
(104, 'Nick White', '1067000', 'nick@gmail.com', '078090809077', 'Nursing', 'Agile Solutions', '0780564321', 'Hurlingham - Nairobi', 'agile@gmail.com', '2022-06-20', 'e807f1fcf82d132f9bb018ca6738a19f', '2022-06-20 14:48:40', 'YES'),
(105, 'Phinneas Kaimenyi', '1078000', 'phineas@gmail.com', '071321345678', 'Natural Sciences', 'Avenue Hoospital', '0789234123', 'Parklands - Nairobi', 'avenuehospital@gmail.com', '2022-06-30', 'e807f1fcf82d132f9bb018ca6738a19f', '2022-06-20 15:51:33', 'YES');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_weeks`
--

DROP TABLE IF EXISTS `tbl_weeks`;
CREATE TABLE IF NOT EXISTS `tbl_weeks` (
  `week_id` int NOT NULL AUTO_INCREMENT,
  `week_title` varchar(255) NOT NULL,
  PRIMARY KEY (`week_id`)
) ENGINE=InnoDB AUTO_INCREMENT=11 DEFAULT CHARSET=latin1;

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
(9, 'week9'),
(10, 'week10');

-- --------------------------------------------------------

--
-- Table structure for table `trainerlogs`
--

DROP TABLE IF EXISTS `trainerlogs`;
CREATE TABLE IF NOT EXISTS `trainerlogs` (
  `id` int NOT NULL AUTO_INCREMENT,
  `trainer_id` int NOT NULL,
  `action` varchar(255) DEFAULT NULL,
  `time` varchar(255) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=43 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `trainerlogs`
--

INSERT INTO `trainerlogs` (`id`, `trainer_id`, `action`, `time`) VALUES
(1, 0, 'Deleted Trainer', '2022-06-14 15:57:57'),
(2, 0, 'Deleted Trainer', '2022-06-14 16:00:14'),
(3, 0, 'Deleted Trainer', '2022-06-14 16:01:11'),
(4, 0, 'Deleted Trainer', '2022-06-14 16:01:50'),
(5, 0, 'Deleted Trainer', '2022-06-14 16:10:53'),
(6, 0, 'Deleted Trainer', '2022-06-14 19:29:55'),
(7, 0, 'Deleted Trainer', '2022-06-14 19:31:56'),
(8, 0, 'Deleted Trainer', '2022-06-14 19:33:41'),
(9, 0, 'Deleted Trainer', '2022-06-14 19:36:44'),
(10, 0, 'Deleted Trainer', '2022-06-14 20:03:17'),
(11, 0, 'Deleted Trainer', '2022-06-15 08:58:29'),
(12, 0, 'Deleted Trainer', '2022-06-15 09:19:22'),
(13, 0, 'Deleted Trainer', '2022-06-15 09:24:57'),
(14, 0, 'Deleted Trainer', '2022-06-15 09:25:52'),
(15, 0, 'Deleted Trainer', '2022-06-15 09:27:59'),
(16, 0, 'Deleted Trainer', '2022-06-15 09:29:03'),
(17, 0, 'Deleted Trainer', '2022-06-15 09:30:49'),
(18, 0, 'Deleted Trainer', '2022-06-15 09:31:56'),
(19, 32, 'Deleted Trainer', '2022-06-15 09:40:18'),
(20, 23, 'Deleted Trainer', '2022-06-15 09:40:44'),
(21, 24, 'Deleted Trainer', '2022-06-15 09:47:25'),
(22, 26, 'Deleted Trainer', '2022-06-15 09:48:09'),
(23, 27, 'Deleted Trainer', '2022-06-15 09:48:44'),
(24, 40, 'Change Password', '2022-06-16 11:01:34'),
(25, 41, 'Login', '2022-06-16 11:46:46'),
(26, 42, 'Login', '2022-06-17 08:49:27'),
(27, 29, 'Deleted Trainer', '2022-06-17 09:39:39'),
(28, 42, 'Login', '2022-06-17 09:58:32'),
(29, 42, 'Login', '2022-06-17 10:01:20'),
(30, 42, 'Login', '2022-06-17 11:25:39'),
(31, 33, 'Deleted Trainer', '2022-06-17 13:02:34'),
(32, 43, 'Login', '2022-06-19 05:47:15'),
(33, 44, 'Login', '2022-06-19 13:50:11'),
(34, 44, 'Login', '2022-06-19 13:57:36'),
(35, 45, 'Login', '2022-06-19 14:19:45'),
(36, 51, 'Login', '2022-06-20 08:20:10'),
(37, 51, 'Login', '2022-06-20 08:37:53'),
(38, 51, 'Login', '2022-06-20 11:18:37'),
(39, 51, 'Login', '2022-06-20 11:26:26'),
(40, 50, 'Login', '2022-06-20 12:05:12'),
(41, 50, 'Login', '2022-06-20 12:15:21'),
(42, 50, 'Login', '2022-06-20 12:58:32');

-- --------------------------------------------------------

--
-- Table structure for table `trainers`
--

DROP TABLE IF EXISTS `trainers`;
CREATE TABLE IF NOT EXISTS `trainers` (
  `trainer_id` int NOT NULL AUTO_INCREMENT,
  `trainername` varchar(200) NOT NULL,
  `email` varchar(200) NOT NULL,
  `mobile` varchar(200) NOT NULL,
  `title` varchar(200) NOT NULL,
  `password` varchar(200) NOT NULL,
  `created_at` varchar(200) NOT NULL,
  PRIMARY KEY (`trainer_id`),
  UNIQUE KEY `email` (`email`,`mobile`)
) ENGINE=InnoDB AUTO_INCREMENT=52 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `trainers`
--

INSERT INTO `trainers` (`trainer_id`, `trainername`, `email`, `mobile`, `title`, `password`, `created_at`) VALUES
(34, 'simon@gmail.com', 'simon@gmail.com', '0789678965432', 'CEO', 'e807f1fcf82d132f9bb018ca6738a19f', '2022-06-15 15:37:02'),
(35, 'Allan Nthiga Cash', 'allan@gmail.com', '0879595959', 'Business Analyst', '6eea9b7ef19179a06954edd0f6c05ceb', '2022-06-15 15:44:05'),
(36, 'Paul Makabongooo', 'makabongo@gmail.com', '076767565645', 'ICT Head', 'c44a471bd78cc6c2fea32b9fe028d30a', '2022-06-16 00:24:48'),
(38, 'Wanyoike mueti', 'wanyoks@gmail.com', '070789897865', 'Security Analyst', 'c44a471bd78cc6c2fea32b9fe028d30a', '2022-06-16 00:26:13'),
(39, 'Jesse Okumu', 'jesse@gmail.com', '0766554433', 'Marketing Lead', 'e807f1fcf82d132f9bb018ca6738a19f', '2022-06-16 10:10:26'),
(40, 'Craig David', 'craig@gmail.com', '0713202678', 'Model', 'c44a471bd78cc6c2fea32b9fe028d30a', '2022-06-16 14:00:44'),
(41, 'Christine Ngendo', 'christine@gmail.com', '0767564523', 'House Keeper', 'e807f1fcf82d132f9bb018ca6738a19f', '2022-06-16 14:46:30'),
(42, 'Monicah Tacho', 'monica@gmail.com', '073421345678', 'Lecturer', 'e807f1fcf82d132f9bb018ca6738a19f', '2022-06-17 11:49:11'),
(43, 'Erick  wainaina', 'waina@gmail.com', '0789675432', 'Criminologist', 'e807f1fcf82d132f9bb018ca6738a19f', '2022-06-19 08:47:04'),
(44, 'kelly tik', 'kelly@gmail.com', '0789564321', 'Choreographer', 'e807f1fcf82d132f9bb018ca6738a19f', '2022-06-19 16:49:56'),
(45, 'Jumanji Weri', 'jumanji@gmail.com', '0789765432', 'King', 'e807f1fcf82d132f9bb018ca6738a19f', '2022-06-19 17:19:32'),
(46, 'Nasty csa', 'nascty@gmail.com', '0767453412', 'Producer', 'e807f1fcf82d132f9bb018ca6738a19f', '2022-06-19 18:47:58'),
(47, 'Runtown', 'runtown@gmail.com', '070780906754', 'Artist', 'e807f1fcf82d132f9bb018ca6738a19f', '2022-06-19 18:48:35'),
(48, 'Davido Chioma', 'davido@gmail.com', '0789674532', 'Farmer', 'e807f1fcf82d132f9bb018ca6738a19f', '2022-06-19 18:49:13'),
(49, 'wizkidayo', 'wizkid@gmail.com', '0702123123', 'Attachment trainer', 'c44a471bd78cc6c2fea32b9fe028d30a', '2022-06-19 18:49:55'),
(50, 'Maphorisa', 'maphorisa@gmail.com', '0708900800', 'Senior Developer', 'e807f1fcf82d132f9bb018ca6738a19f', '2022-06-19 18:50:40'),
(51, 'Khosi Ngema', 'khosi@gmail.com', '0785456456', 'Actress', 'c44a471bd78cc6c2fea32b9fe028d30a', '2022-06-19 18:51:15');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

DROP TABLE IF EXISTS `users`;
CREATE TABLE IF NOT EXISTS `users` (
  `id` int NOT NULL AUTO_INCREMENT,
  `username` varchar(200) NOT NULL,
  `email` varchar(200) NOT NULL,
  `password` varchar(200) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=8 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `username`, `email`, `password`) VALUES
(1, 'karan', 'karan@gmail.com', '81dc9bdb52d04dc20036dbd8313ed055'),
(2, '', '', 'd41d8cd98f00b204e9800998ecf8427e'),
(3, 'meekkaran', 'meekymouse@gmail.com', 'e807f1fcf82d132f9bb018ca6738a19f'),
(4, '', '', ''),
(5, '', '', ''),
(6, '', '', ''),
(7, '', '', '');
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
