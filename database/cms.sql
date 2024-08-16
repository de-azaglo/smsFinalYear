-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: localhost:3306
-- Generation Time: Aug 16, 2024 at 02:59 PM
-- Server version: 8.0.30
-- PHP Version: 8.3.4

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
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
-- Table structure for table `academic_year`
--

CREATE TABLE `academic_year` (
  `id` int NOT NULL,
  `year` varchar(10) NOT NULL,
  `start_date` date NOT NULL,
  `end_date` date NOT NULL,
  `number_of_terms` int NOT NULL,
  `status` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `academic_year`
--

INSERT INTO `academic_year` (`id`, `year`, `start_date`, `end_date`, `number_of_terms`, `status`) VALUES
(1, '2023/2024', '2024-03-25', '2024-04-18', 3, 'active');

-- --------------------------------------------------------

--
-- Table structure for table `attendance`
--

CREATE TABLE `attendance` (
  `id` int NOT NULL,
  `student_id` varchar(20) NOT NULL,
  `class_id` varchar(10) NOT NULL,
  `academic_year` varchar(20) NOT NULL,
  `term_id` int NOT NULL,
  `date` date NOT NULL,
  `status` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `attendance`
--

INSERT INTO `attendance` (`id`, `student_id`, `class_id`, `academic_year`, `term_id`, `date`, `status`) VALUES
(1, 'STU001', '3', '2023/2024', 3, '2024-05-07', 'Present'),
(2, 'STU001', '3', '2023/2024', 3, '2024-08-12', 'Present'),
(3, 'STU003', '1', '2023/2024', 3, '2024-08-15', 'Present'),
(4, 'STU004', '1', '2023/2024', 3, '2024-08-15', 'Absent'),
(18, 'STU003', '1', '2023/2024', 3, '2024-08-16', 'Present'),
(19, 'STU004', '1', '2023/2024', 3, '2024-08-16', 'Present'),
(20, 'STU005', '1', '2023/2024', 3, '2024-08-16', 'Absent');

-- --------------------------------------------------------

--
-- Table structure for table `class_teachers`
--

CREATE TABLE `class_teachers` (
  `id` int NOT NULL,
  `user_number` varchar(10) COLLATE utf8mb4_general_ci NOT NULL,
  `class_id` int NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `class_teachers`
--

INSERT INTO `class_teachers` (`id`, `user_number`, `class_id`) VALUES
(1, 'TEA001', 1),
(3, 'TEA003', 4),
(4, 'TEA008', 2),
(5, 'TEA011', 5),
(6, 'TEA012', 3),
(7, 'TEA013', 8);

-- --------------------------------------------------------

--
-- Table structure for table `events`
--

CREATE TABLE `events` (
  `id` int NOT NULL,
  `year` varchar(20) NOT NULL,
  `event_name` varchar(255) NOT NULL,
  `start_date` date NOT NULL,
  `end_date` date NOT NULL,
  `event_type` varchar(20) NOT NULL,
  `school_status` varchar(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `events`
--

INSERT INTO `events` (`id`, `year`, `event_name`, `start_date`, `end_date`, `event_type`, `school_status`) VALUES
(1, '2023/2024', 'Mid-Term Break', '2024-02-09', '2024-02-13', 'School Event', 'closed'),
(2, '2023/2024', 'May Day', '2024-05-01', '2024-05-01', 'Public Holiday', 'closed'),
(3, '2023/2024', 'Graduation', '2024-08-11', '2024-08-11', 'School Event', 'open'),
(4, '2023/2024', 'Founder\'s Day', '2024-08-11', '2024-08-12', 'Public Holiday', 'closed');

-- --------------------------------------------------------

--
-- Table structure for table `grades`
--

CREATE TABLE `grades` (
  `id` int NOT NULL,
  `number_of_student` int NOT NULL,
  `grade_name` varchar(255) COLLATE utf8mb4_general_ci NOT NULL,
  `class_teacher_number` varchar(10) COLLATE utf8mb4_general_ci DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `grades`
--

INSERT INTO `grades` (`id`, `number_of_student`, `grade_name`, `class_teacher_number`) VALUES
(1, 3, 'Grade 1', 'TEA001'),
(2, 0, 'Grade 2', 'TEA008'),
(3, 1, 'Grade 3', 'TEA012'),
(4, 1, 'Grade 4', 'TEA003'),
(5, 0, 'Grade 5', 'TEA011'),
(6, 0, 'Grade 6', NULL),
(7, 0, 'Grade 7', NULL),
(8, 0, 'Grade 8', 'TEA013'),
(9, 0, 'Grade 9', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `guardians`
--

CREATE TABLE `guardians` (
  `id` int NOT NULL,
  `user_number` varchar(20) COLLATE utf8mb4_general_ci NOT NULL,
  `guardian_name` varchar(300) COLLATE utf8mb4_general_ci NOT NULL,
  `guardian_type` varchar(255) COLLATE utf8mb4_general_ci NOT NULL,
  `contact` varchar(10) COLLATE utf8mb4_general_ci NOT NULL,
  `occupation` varchar(300) COLLATE utf8mb4_general_ci NOT NULL,
  `email` varchar(255) COLLATE utf8mb4_general_ci NOT NULL,
  `address` varchar(300) COLLATE utf8mb4_general_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `guardians`
--

INSERT INTO `guardians` (`id`, `user_number`, `guardian_name`, `guardian_type`, `contact`, `occupation`, `email`, `address`) VALUES
(2, 'PAR001', 'Seidu Saeed Rahman', 'father', '0549457934', 'father', 'rahman@gmail.com', 'GA-267-7897'),
(3, 'PAR003', 'Seidu Saeed Rahman', 'father', '0549457934', 'father', 'rahman@gmail.com', 'GA-267-7897'),
(4, 'PAR004', 'Gillian Frimpong', 'father', 'Margaret', 'father', 'Rashad', 'GA-555-5584'),
(5, 'PAR005', 'Daniel Kwabena Alorsor', 'mother', '0245656566', 'mother', 'daniel@gmail.com', 'GA-123-5849'),
(6, 'PAR006', 'Azaglo Micheal', 'father', '0549632604', 'father', 'micheal@gmail.com', 'GA-000-0000'),
(7, 'PAR007', 'Kwakye Joseph', 'father', '0267358363', 'father', 'joe@gmail.com', 'GA-212-8898');

-- --------------------------------------------------------

--
-- Table structure for table `lesson_periods`
--

CREATE TABLE `lesson_periods` (
  `id` int NOT NULL,
  `time_slot` int NOT NULL,
  `day` int NOT NULL,
  `subject` int NOT NULL,
  `grade` int NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `lesson_periods`
--

INSERT INTO `lesson_periods` (`id`, `time_slot`, `day`, `subject`, `grade`) VALUES
(1, 1, 1, 1, 1),
(2, 2, 1, 1, 1),
(3, 3, 1, 1, 1),
(4, 4, 1, 1, 1),
(5, 5, 1, 1, 1),
(6, 6, 1, 1, 1),
(7, 7, 1, 1, 1),
(8, 8, 1, 1, 1),
(9, 9, 1, 1, 1),
(10, 1, 2, 1, 1),
(11, 2, 2, 1, 1),
(12, 3, 2, 1, 1),
(13, 4, 2, 1, 1),
(14, 5, 2, 1, 1),
(15, 6, 2, 1, 1),
(16, 7, 2, 1, 1),
(17, 8, 2, 1, 1),
(18, 9, 2, 1, 1),
(19, 1, 3, 1, 1),
(20, 2, 3, 1, 1),
(21, 3, 3, 1, 1),
(22, 4, 3, 1, 1),
(23, 5, 3, 1, 1),
(24, 6, 3, 1, 1),
(25, 7, 3, 1, 1),
(26, 8, 3, 1, 1),
(27, 9, 3, 1, 1),
(28, 1, 4, 1, 1),
(29, 2, 4, 1, 1),
(30, 3, 4, 1, 1),
(31, 4, 4, 1, 1),
(32, 5, 4, 1, 1),
(33, 6, 4, 1, 1),
(34, 7, 4, 1, 1),
(35, 8, 4, 1, 1),
(36, 9, 4, 1, 1),
(37, 1, 5, 1, 1),
(38, 2, 5, 1, 1),
(39, 3, 5, 1, 1),
(40, 4, 5, 1, 1),
(41, 5, 5, 1, 1),
(42, 6, 5, 1, 1),
(43, 7, 5, 1, 1),
(44, 8, 5, 1, 1),
(45, 9, 5, 1, 1),
(46, 1, 1, 1, 1),
(47, 2, 1, 1, 1),
(48, 3, 1, 1, 1),
(49, 4, 1, 1, 1),
(50, 5, 1, 1, 1),
(51, 6, 1, 1, 1),
(52, 7, 1, 1, 1),
(53, 8, 1, 1, 1),
(54, 9, 1, 1, 1),
(55, 1, 2, 1, 1),
(56, 2, 2, 1, 1),
(57, 3, 2, 1, 1),
(58, 4, 2, 1, 1),
(59, 5, 2, 1, 1),
(60, 6, 2, 1, 1),
(61, 7, 2, 1, 1),
(62, 8, 2, 1, 1),
(63, 9, 2, 1, 1),
(64, 1, 3, 1, 1),
(65, 2, 3, 1, 1),
(66, 3, 3, 1, 1),
(67, 4, 3, 1, 1),
(68, 5, 3, 1, 1),
(69, 6, 3, 1, 1),
(70, 7, 3, 1, 1),
(71, 8, 3, 1, 1),
(72, 9, 3, 1, 1),
(73, 1, 4, 1, 1),
(74, 2, 4, 1, 1),
(75, 3, 4, 1, 1),
(76, 4, 4, 1, 1),
(77, 5, 4, 1, 1),
(78, 6, 4, 1, 1),
(79, 7, 4, 1, 1),
(80, 8, 4, 1, 1),
(81, 9, 4, 1, 1),
(82, 1, 5, 1, 1),
(83, 2, 5, 1, 1),
(84, 3, 5, 1, 1),
(85, 4, 5, 1, 1),
(86, 5, 5, 1, 1),
(87, 6, 5, 1, 1),
(88, 7, 5, 1, 1),
(89, 8, 5, 1, 1),
(90, 9, 5, 1, 1);

-- --------------------------------------------------------

--
-- Table structure for table `school_days`
--

CREATE TABLE `school_days` (
  `id` int NOT NULL,
  `day` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `school_days`
--

INSERT INTO `school_days` (`id`, `day`) VALUES
(1, 'Monday'),
(2, 'Tuesday'),
(3, 'Wednesday'),
(4, 'Thursday'),
(5, 'Friday');

-- --------------------------------------------------------

--
-- Table structure for table `students`
--

CREATE TABLE `students` (
  `id` int NOT NULL,
  `user_number` varchar(20) COLLATE utf8mb4_general_ci NOT NULL,
  `first_name` varchar(255) COLLATE utf8mb4_general_ci NOT NULL,
  `other_name` varchar(255) COLLATE utf8mb4_general_ci DEFAULT NULL,
  `last_name` varchar(255) COLLATE utf8mb4_general_ci NOT NULL,
  `date_of_birth` date NOT NULL,
  `class_id` int NOT NULL,
  `gender` varchar(20) COLLATE utf8mb4_general_ci NOT NULL,
  `address` varchar(15) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `parent_id` varchar(20) COLLATE utf8mb4_general_ci NOT NULL,
  `date_of_admission` date NOT NULL,
  `height` int NOT NULL,
  `blood_group` varchar(10) COLLATE utf8mb4_general_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `students`
--

INSERT INTO `students` (`id`, `user_number`, `first_name`, `other_name`, `last_name`, `date_of_birth`, `class_id`, `gender`, `address`, `parent_id`, `date_of_admission`, `height`, `blood_group`) VALUES
(1, 'STU001', 'Rahim', 'Saeed', 'Seidu', '2023-11-15', 3, 'Male', 'GA-267-7897', 'PAR003', '2024-04-25', 54, 'A+'),
(2, 'STU002', 'Mina', 'Abena', 'Frimpong', '2013-12-06', 4, 'Female', 'GA-555-5584', 'PAR004', '2022-01-10', 80, 'A+'),
(3, 'STU003', 'Godslove', 'Kwadwo', 'Alorsor', '2022-03-14', 1, 'Male', 'GA-123-5849', 'PAR005', '2024-08-14', 70, 'A+'),
(4, 'STU004', 'Derrick', 'Kwabena', 'Azaglo', '2024-07-29', 1, 'Male', 'GA-000-0000', 'PAR006', '2024-08-13', 70, 'A+'),
(5, 'STU005', 'Joy', 'Abena', 'Kwakye', '2019-08-12', 1, 'Female', 'GA-212-8898', 'PAR007', '2024-08-14', 80, 'A+');

-- --------------------------------------------------------

--
-- Table structure for table `subjects`
--

CREATE TABLE `subjects` (
  `id` int NOT NULL,
  `subject_title` varchar(255) NOT NULL,
  `teacher_id` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `subjects`
--

INSERT INTO `subjects` (`id`, `subject_title`, `teacher_id`) VALUES
(1, 'Composition', NULL),
(2, 'Mathematics', NULL),
(3, 'Creative Arts', NULL),
(4, 'Comprehension', NULL),
(5, 'French', NULL),
(6, 'I.C.T', NULL),
(7, 'OWOP', NULL),
(8, 'Grammar', NULL),
(9, 'History', NULL),
(10, 'Science', NULL),
(11, 'R.M.E', NULL),
(12, 'Worship', NULL),
(13, 'Twi', NULL),
(14, 'Peenmanship', NULL),
(15, 'C.B.S', NULL),
(16, 'Spelling & Vocabulary', NULL),
(17, 'Club Meeting', NULL),
(18, 'P.E', NULL),
(19, 'Career Tech', NULL),
(20, 'Snack', NULL),
(21, 'Lunch', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `subject_teachers`
--

CREATE TABLE `subject_teachers` (
  `id` int NOT NULL,
  `user_number` varchar(10) COLLATE utf8mb4_general_ci NOT NULL,
  `subject_id` int NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `teachers`
--

CREATE TABLE `teachers` (
  `id` int NOT NULL,
  `user_number` varchar(255) NOT NULL,
  `first_name` varchar(255) NOT NULL,
  `other_name` varchar(255) NOT NULL,
  `last_name` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `date_of_birth` date NOT NULL,
  `contact` varchar(11) NOT NULL,
  `address` varchar(255) NOT NULL,
  `date_of_employment` varchar(255) NOT NULL,
  `qualification` varchar(255) NOT NULL,
  `cv` varchar(300) NOT NULL,
  `teacher_type` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `teachers`
--

INSERT INTO `teachers` (`id`, `user_number`, `first_name`, `other_name`, `last_name`, `email`, `date_of_birth`, `contact`, `address`, `date_of_employment`, `qualification`, `cv`, `teacher_type`) VALUES
(1, 'TEA001', 'William', 'Bosiako', 'Antwi', 'william@gmail.com', '2024-03-18', '0535599916', 'GA-267-7897', '2024-03-18', 'HND IN COMPUTER SCIENCE', '\'E:\\\\Backup\\\\CMS\\\\public/../public/resource/document/TEA001List.pdf\'', 'Class Teacher'),
(7, 'TEA003', 'Micheal', 'Kwesi', 'Alorsor', 'micheal@gmail.coom', '2024-02-26', '0548938948', 'GA-232-2343', '2024-02-28', 'HND IN COMPUTER SCIENCE', '\'E:\\\\Backup\\\\CMS\\\\public/../public/resource/document/TEA003CONRAD EBO TURKSON  CV.pdf\'', 'Class Teacher'),
(8, 'TEA008', 'Gafaru', 'Abdul', 'Rafiu', 'raf@gmail.com', '2023-01-03', '0503403490', 'GA-234-5344', '2024-03-25', 'HND IN COMPUTER SCIENCE', '\'E:\\\\Backup\\\\CMS\\\\public/../public/resource/document/TEA008ECG.pdf\'', 'Class Teacher'),
(11, 'TEA011', 'Conrad', 'Ebo', 'Turkson', 'conrad@gmail.com', '2024-03-18', '0539458290', 'GA-324-4939', '2024-03-13', 'HND IN COMPUTER SCIENCE', '\'C:\\\\Users\\\\big-daddy\\\\Desktop\\\\CMS\\\\smsFinalYear\\\\smsFinalYear\\\\public/../public/resource/document/TEA011progit.pdf\'', 'Class Teacher'),
(12, 'TEA012', 'Francis', 'Kwesi', 'Aboagye', 'francis@gmail.com', '2024-04-08', '0545455455', 'GA-123-9359', '2024-04-15', 'HND IN COMPUTER SCIENCE', '\'C:\\\\Users\\\\big-daddy\\\\Desktop\\\\CMS\\\\smsFinalYear\\\\smsFinalYear\\\\public/../public/resource/document/TEA012Derrick K.pdf\'', 'Class Teacher'),
(13, 'TEA013', 'Scott', 'Kwadwo', 'Acquah', 'scott@gmail.com', '2023-10-04', '0534934934', 'GA-884-9273', '2024-04-15', 'HND IN COMPUTER SCIENCE', '\'C:\\\\Users\\\\big-daddy\\\\Desktop\\\\CMS\\\\smsFinalYear\\\\smsFinalYear\\\\public/../public/resource/document/TEA013progit.pdf\'', 'Class Teacher');

-- --------------------------------------------------------

--
-- Table structure for table `terms`
--

CREATE TABLE `terms` (
  `id` int NOT NULL,
  `year` varchar(10) NOT NULL,
  `term_name` varchar(50) NOT NULL,
  `start_date` date NOT NULL,
  `end_date` date NOT NULL,
  `status` varchar(200) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `terms`
--

INSERT INTO `terms` (`id`, `year`, `term_name`, `start_date`, `end_date`, `status`) VALUES
(1, '2023/2024', 'Term 1', '2024-03-25', '2024-03-25', ''),
(2, '2023/2024', 'Term 2', '2024-03-25', '2024-04-16', ''),
(3, '2023/2024', 'Term 3', '2024-03-26', '2024-04-18', 'active');

-- --------------------------------------------------------

--
-- Table structure for table `time_periods`
--

CREATE TABLE `time_periods` (
  `id` int NOT NULL,
  `start_time` varchar(20) NOT NULL,
  `end_time` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `time_periods`
--

INSERT INTO `time_periods` (`id`, `start_time`, `end_time`) VALUES
(1, '7:30am', '8:30am'),
(2, '8:30am', '9:30am'),
(3, '9:30am', '10:30am'),
(4, '10:30am', '10:45am'),
(5, '10:45am', '11:45am'),
(6, '11:45am', '12:45am'),
(7, '12:45am', '1:30am'),
(8, '1:30am', '2:30am'),
(9, '2:30am', '3:30am');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `user_id` int NOT NULL,
  `user_number` varchar(10) COLLATE utf8mb4_general_ci NOT NULL,
  `last_name` varchar(255) COLLATE utf8mb4_general_ci NOT NULL,
  `user_type` varchar(25) COLLATE utf8mb4_general_ci NOT NULL,
  `email` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci DEFAULT NULL,
  `password` varchar(255) COLLATE utf8mb4_general_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`user_id`, `user_number`, `last_name`, `user_type`, `email`, `password`) VALUES
(1, '', 'Azaglo', 'admin', 'derrickazaglo123@gmail.com', '123456789'),
(7, 'TEA001', 'Antwi', 'facilitator', 'william@gmail.com', 'default'),
(8, 'TEA002', 'Azaglo', 'facilitator', 'derrick@gmail.com', 'default'),
(9, 'TEA003', 'Alorsor', 'facilitator', 'micheal@gmail.coom', 'default'),
(14, 'TEA008', 'Rafiu', 'facilitator', 'raf@gmail.com', 'default'),
(16, 'TEA009', 'Asante', 'facilitator', 'rich@gmail.com', 'default'),
(17, 'TEA011', 'Turkson', 'facilitator', 'conrad@gmail.com', 'default'),
(18, 'PAR003', 'rahman@gmail.com', 'parent', 'default', 'Seidu Saeed Rahman'),
(19, 'STU001', 'Seidu', 'student', NULL, 'default'),
(20, 'TEA012', 'Aboagye', 'facilitator', 'francis@gmail.com', 'default'),
(21, 'TEA013', 'Acquah', 'facilitator', 'scott@gmail.com', 'default'),
(22, 'TEA014', 'Adjei', 'facilitator', 'moses@gmail.com', 'default'),
(23, 'PAR004', 'Gillian Frimpong', 'parent', 'Rashad', 'default'),
(24, 'STU002', 'Frimpong', 'student', NULL, 'default'),
(25, 'PAR005', 'Daniel Kwabena Alorsor', 'parent', 'daniel@gmail.com', 'default'),
(26, 'STU003', 'Alorsor', 'student', NULL, 'default'),
(27, 'PAR006', 'Azaglo Micheal', 'parent', 'micheal@gmail.com', 'default'),
(28, 'STU004', 'Azaglo', 'student', NULL, 'default'),
(29, 'PAR007', 'Kwakye Joseph', 'parent', 'joe@gmail.com', 'default'),
(30, 'STU005', 'Joy', 'student', NULL, 'default');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `academic_year`
--
ALTER TABLE `academic_year`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `attendance`
--
ALTER TABLE `attendance`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `class_teachers`
--
ALTER TABLE `class_teachers`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `events`
--
ALTER TABLE `events`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `grades`
--
ALTER TABLE `grades`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `guardians`
--
ALTER TABLE `guardians`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `lesson_periods`
--
ALTER TABLE `lesson_periods`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `school_days`
--
ALTER TABLE `school_days`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `students`
--
ALTER TABLE `students`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `subjects`
--
ALTER TABLE `subjects`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `subject_teachers`
--
ALTER TABLE `subject_teachers`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `teachers`
--
ALTER TABLE `teachers`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `terms`
--
ALTER TABLE `terms`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `time_periods`
--
ALTER TABLE `time_periods`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`user_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `academic_year`
--
ALTER TABLE `academic_year`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `attendance`
--
ALTER TABLE `attendance`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=21;

--
-- AUTO_INCREMENT for table `class_teachers`
--
ALTER TABLE `class_teachers`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `events`
--
ALTER TABLE `events`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `grades`
--
ALTER TABLE `grades`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `guardians`
--
ALTER TABLE `guardians`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `lesson_periods`
--
ALTER TABLE `lesson_periods`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=91;

--
-- AUTO_INCREMENT for table `school_days`
--
ALTER TABLE `school_days`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `students`
--
ALTER TABLE `students`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `subjects`
--
ALTER TABLE `subjects`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=22;

--
-- AUTO_INCREMENT for table `subject_teachers`
--
ALTER TABLE `subject_teachers`
  MODIFY `id` int NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `teachers`
--
ALTER TABLE `teachers`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- AUTO_INCREMENT for table `terms`
--
ALTER TABLE `terms`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `time_periods`
--
ALTER TABLE `time_periods`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `user_id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=31;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
