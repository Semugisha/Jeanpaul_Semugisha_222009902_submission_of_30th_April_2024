-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Apr 29, 2024 at 06:15 PM
-- Server version: 10.4.28-MariaDB
-- PHP Version: 8.0.28

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `online_learning_platform`
--

-- --------------------------------------------------------

--
-- Table structure for table `course`
--

CREATE TABLE `course` (
  `course_id` int(15) NOT NULL,
  `course_name` varchar(220) NOT NULL,
  `instructor` varchar(220) NOT NULL,
  `description_text` varchar(220) NOT NULL,
  `credit` varchar(220) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `course`
--

INSERT INTO `course` (`course_id`, `course_name`, `instructor`, `description_text`, `credit`) VALUES
(1, 'MATH', 'ALL DOMAAIN', 'WELCOME', '20'),
(2, 'kiswa', 'all student', 'level one', '20'),
(3, 'java', 'all', 'for mine', '23'),
(4, 'geograph', 'online', 'all of you', '20'),
(5, 'wertyuiooiuytrew', 'iuytrew', '', '12'),
(7, 'jhgfd', 'fghj', 'jhgf', '23'),
(8, 'INTERMEDIATE', 'ALL BUSINESS SCHOOL', 'COMMON', '15'),
(9, 'research', 'all student', 'become', '20'),
(17, 'kinya', 'wasrdtfugi', 'gsdhfjgkhjk', '16'),
(18, '4awerdtfyguhoi', 'a\\szdxfcgvh', 'ztxycukvlio', '30'),
(19, '', '', '', ''),
(20, 'yyyyy', 'gggggg', 'kkkkkkkk', '20'),
(21, 'waesudtfyguhiojpok', 'aETSTDRYIGYUHIJPOL]', 'ASDTTGYUIJOP', '49'),
(22, 'w4e5r6t7yuio', 'asdfyghjk', 'aesrdtfyghuo', 'qwertyu'),
(23, 'kinya', 'munini', 'wanna join class', '12'),
(24, 'kinya', 'munini', 'wanna join class', '12'),
(26, 'kinya', 'aETSTDRYIGYUHIJPOL]', 'kkkkkkkk', '20'),
(27, 'java', 'all', 'for mine', '23'),
(28, 'java', 'all', 'for mine', '23'),
(29, 'java', 'all', 'for mine', '23'),
(30, 'ja', 'all', 'fo', '23'),
(31, 'ja', 'all', 'fo', '23'),
(32, 'ja', 'all', 'fo', '23'),
(33, 'ja', 'all', 'fo', '23'),
(34, 'jhgfd', 'sdfghj', 'jhgfd', '13');

-- --------------------------------------------------------

--
-- Table structure for table `examination`
--

CREATE TABLE `examination` (
  `examination_id` int(20) NOT NULL,
  `examination_name` varchar(220) NOT NULL,
  `examination_date` varchar(220) NOT NULL,
  `subject` varchar(202) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `examination`
--

INSERT INTO `examination` (`examination_id`, `examination_name`, `examination_date`, `subject`) VALUES
(3, 'economics', '2024-04-24', 'ubukungu'),
(18, 'maths', '20/6/2024', 'math'),
(19, 'mahoro wa mukotanyi', '12/04', 'math'),
(21, 'basicmaths', '20/04/2025', 'maths'),
(27, 'Geo', '2024-04-02', 'math');

-- --------------------------------------------------------

--
-- Table structure for table `lecture`
--

CREATE TABLE `lecture` (
  `lecture_id` int(15) NOT NULL,
  `first_name` varchar(220) NOT NULL,
  `last_name` varchar(220) NOT NULL,
  `specialization` varchar(220) NOT NULL,
  `email` varchar(220) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `lecture`
--

INSERT INTO `lecture` (`lecture_id`, `first_name`, `last_name`, `specialization`, `email`) VALUES
(1, 'df', 'cvbbbbbbbbbbbb', 'Eating', 'cvbnm@gmail.com'),
(6, 'mummy', 'medecine', ' dcfcvb', 'sdfgh@gmail.com'),
(8, 'werty', 'uytre', 'hgfd', ''),
(24, 'semugisha', 'jean', 'programmer', 'jean@gmail.com');

-- --------------------------------------------------------

--
-- Table structure for table `student`
--

CREATE TABLE `student` (
  `student_id` int(11) NOT NULL,
  `first_name` varchar(220) NOT NULL,
  `last_name` varchar(220) NOT NULL,
  `email` varchar(202) NOT NULL,
  `age` int(202) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `student`
--

INSERT INTO `student` (`student_id`, `first_name`, `last_name`, `email`, `age`) VALUES
(1, 'xdfgh', 'mine', 'fds@gmail.com', 16),
(3, 'abcdefghijklmn', 'nmlkjihgfedcba', 'abcdefghijklmn@gmail.com', 59),
(5, 'chris', 'brown', 'chris@gmail.com', 32),
(8, 'kezawa@gmail.com', 'sdfghj', 'kezawaaaaaaaaaa', 12),
(59, 'kamana', 'Loic', 'loick@gmail.com', 23);

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE `user` (
  `id` int(11) NOT NULL,
  `firstname` varchar(50) DEFAULT NULL,
  `lastname` varchar(50) DEFAULT NULL,
  `username` varchar(50) DEFAULT NULL,
  `email` varchar(100) DEFAULT NULL,
  `telephone` varchar(20) DEFAULT NULL,
  `password` varchar(100) DEFAULT NULL,
  `creationdate` timestamp NOT NULL DEFAULT current_timestamp(),
  `activation_code` varchar(50) DEFAULT NULL,
  `is_activated` tinyint(1) DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`id`, `firstname`, `lastname`, `username`, `email`, `telephone`, `password`, `creationdate`, `activation_code`, `is_activated`) VALUES
(1, 'mbabazi', 'diane', 'Danox', 'mbabazi@gmail.com', '0787666117', '$2y$10$/6ZBFjiByju.k6ILYU77celaFjuPCKUk2xdlijVZvGdwsQ1J7pRVu', '2024-04-27 16:53:01', '66677', 0);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `course`
--
ALTER TABLE `course`
  ADD PRIMARY KEY (`course_id`);

--
-- Indexes for table `examination`
--
ALTER TABLE `examination`
  ADD PRIMARY KEY (`examination_id`);

--
-- Indexes for table `lecture`
--
ALTER TABLE `lecture`
  ADD PRIMARY KEY (`lecture_id`);

--
-- Indexes for table `student`
--
ALTER TABLE `student`
  ADD PRIMARY KEY (`student_id`);

--
-- Indexes for table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `username` (`username`),
  ADD UNIQUE KEY `email` (`email`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `course`
--
ALTER TABLE `course`
  MODIFY `course_id` int(15) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=35;

--
-- AUTO_INCREMENT for table `examination`
--
ALTER TABLE `examination`
  MODIFY `examination_id` int(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=33;

--
-- AUTO_INCREMENT for table `lecture`
--
ALTER TABLE `lecture`
  MODIFY `lecture_id` int(15) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=32;

--
-- AUTO_INCREMENT for table `student`
--
ALTER TABLE `student`
  MODIFY `student_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=334;

--
-- AUTO_INCREMENT for table `user`
--
ALTER TABLE `user`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
