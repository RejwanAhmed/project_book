-- phpMyAdmin SQL Dump
-- version 5.0.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Dec 03, 2022 at 02:14 PM
-- Server version: 10.4.13-MariaDB
-- PHP Version: 7.3.20

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `project_book`
--

-- --------------------------------------------------------

--
-- Table structure for table `add_teacher`
--

CREATE TABLE `add_teacher` (
  `id` int(50) NOT NULL,
  `name` varchar(50) NOT NULL,
  `designation` varchar(50) NOT NULL,
  `email` varchar(50) NOT NULL,
  `password` varchar(50) NOT NULL,
  `repeat_password` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `add_teacher`
--

INSERT INTO `add_teacher` (`id`, `name`, `designation`, `email`, `password`, `repeat_password`) VALUES
(19, 'AHM Kamal', 'Professor', 'ahmkctg@yahoo.com', 'YWhtMTIz', 'YWhtMTIz'),
(20, 'Md Mijanur Rahman', 'Professor', 'mijanjkkniu@gmail.com', 'bWlqMTIz', 'bWlqMTIz'),
(21, 'Md Saiful Islam', 'Associate Professor', 'saifulmath@yahoo.com', 'c2FpMTIz', 'c2FpMTIz'),
(22, 'Sheikh Sujan Ali', 'Associate Professor', 'msujanali@gmail.com', 'c2hlMTIz', 'c2hlMTIz'),
(23, 'Mst Jannatul Ferdous', 'Associate Professor', 'mjannatul@gmail.com', 'bXN0MTIz', 'bXN0MTIz'),
(24, 'Uzzal Kumar Prodhan', 'Associate Professor', 'uzzal_bagerhat@yahoo.com', 'dXp6MTIz', 'dXp6MTIz'),
(25, 'Md Selim Al Mamun', 'Associate Professor', 'mamun0013@yahoo.com', 'c2VsMTIz', 'c2VsMTIz'),
(26, 'Subrata Kumar Das', 'Associate Professor', 'sdas_ce@yahoo.com', 'c3ViMTIz', 'c3ViMTIz'),
(27, 'Tushar Kanti Saha', 'Associate Professor', 'tusharcsebd@gmail.com', 'dHVzMTIz', 'dHVzMTIz'),
(28, 'Indrani Mandal', 'Assistant Professor', 'indranicsedu@yahoo.com', 'aW5kMTIz', 'aW5kMTIz'),
(29, 'Pronab Kumar Mondal', 'Assistant Professor', 'bappycseru@gmail.com', 'cHJvMTIz', 'cHJvMTIz'),
(30, 'Rubya Shaharin', 'Assistant Professor', 'sunshinerr1@gmail.com', 'cnViMTIz', 'cnViMTIz'),
(31, 'Habiba Sultana', 'Assistant Profrssor', 'srity.cse@gmail.com', 'aGFiMTIz', 'aGFiMTIz'),
(32, 'Kazi Mahmudul Hassan', 'Lecturer', 'munnakazi92@gmail.com', 'a2F6MTIz', 'a2F6MTIz'),
(33, 'Mahbubun Nahar', 'Lecturer', 'mahbuba.knu@gmail.com', 'bWFoMTIz', 'bWFoMTIz'),
(34, 'Poly Rani Ghosh', 'Assistant Professor', 'polyghosh_cse@yahoo.com', 'cG9sMTIz', 'cG9sMTIz'),
(37, 'Rejwan Ahmed', 'Lecturer', 'rejwancse10@gmail.com', 'MTIzNDU2Nzg5', 'MTIzNDU2Nzg5');

-- --------------------------------------------------------

--
-- Table structure for table `admin_log_in`
--

CREATE TABLE `admin_log_in` (
  `id` int(50) NOT NULL,
  `username` varchar(50) NOT NULL,
  `password` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `admin_log_in`
--

INSERT INTO `admin_log_in` (`id`, `username`, `password`) VALUES
(11, 'jkkniu', 'MTIzNDU=');

-- --------------------------------------------------------

--
-- Table structure for table `exam_committee`
--

CREATE TABLE `exam_committee` (
  `id` int(50) NOT NULL,
  `teacher_name` varchar(50) NOT NULL,
  `session` varchar(50) NOT NULL,
  `year` varchar(50) NOT NULL,
  `status` varchar(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `exam_committee`
--

INSERT INTO `exam_committee` (`id`, `teacher_name`, `session`, `year`, `status`) VALUES
(3, '25', '2010-2011', 'B.Sc. 3rd', '1'),
(4, '21', '2011-2012', 'B.Sc. 4th', '1'),
(5, '19', '2012-2013', 'B.Sc. 4th', '1'),
(8, '28', '2016-2017', 'B.Sc. 1st', '1'),
(9, '31', '2016-2017', 'B.Sc. 2nd', '0'),
(10, '29', '2014-2015', 'B.Sc. 3rd', '0'),
(11, '22', '2013-2014', 'B.Sc. 4th', '1'),
(12, '31', '2017-2018', 'B.Sc. 1st', '1'),
(17, '27', '2015-2016', 'B.Sc. 3rd', '1'),
(18, '19', '2015-2016', 'M.Sc. 1st', '1'),
(20, '37', '2021-2022', 'B.Sc. 1st', '1');

-- --------------------------------------------------------

--
-- Table structure for table `project_information`
--

CREATE TABLE `project_information` (
  `id` int(50) NOT NULL,
  `project_name` varchar(60) NOT NULL,
  `session` varchar(20) NOT NULL,
  `year` varchar(50) NOT NULL,
  `semester` varchar(20) NOT NULL,
  `supervisor` varchar(50) NOT NULL,
  `co_supervisor` varchar(50) NOT NULL,
  `member1` varchar(50) NOT NULL,
  `member2` varchar(50) NOT NULL,
  `member3` varchar(50) NOT NULL,
  `project_des` varchar(1000) NOT NULL,
  `pdf` varchar(1000) NOT NULL,
  `project_image` varchar(1000) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `project_information`
--

INSERT INTO `project_information` (`id`, `project_name`, `session`, `year`, `semester`, `supervisor`, `co_supervisor`, `member1`, `member2`, `member3`, `project_des`, `pdf`, `project_image`) VALUES
(1, 'University Result Management System', '2010-2011', 'B.Sc. 4th', 'B.Sc. 7th Semester', 'Md Mijanur Rahman', '', 'Md Abdullah Al Mamun', 'Nusrat Jahan Nadia', '', 'This project is for managing result of whole university', '', ''),
(2, 'A Comparative Study and Implementation of Popular Steganogra', '2010-2011', 'B.Sc. 4th', 'B.Sc. 7th Semester', 'Indrani Mandal', '', 'Fatema Akhter', '', '', 'I dont know', '', ''),
(3, 'Image and Audio Steganography', '2010-2011', 'B.Sc. 4th', 'B.Sc. 7th Semester', 'Pronab Kumar Mondal', '', 'Md Mosnat Ahmed Nayeem', 'Md Shah Pran Tareq', '', 'Image and audio related project', '', ''),
(4, 'Kids Self Learning System', '2010-2011', 'B.Sc. 4th', 'B.Sc. 7th Semester', 'Subrata Kumar Das', '', 'Rokhtim Chandra Sarker', 'Md Fayes Uddin', '', 'This project is for self learning for kids', '', ''),
(5, 'Bengali Literature Portal', '2010-2011', 'B.Sc. 4th', 'B.Sc. 7th Semester', 'Poly Rani Ghosh', '', 'Sony Biswas', 'Somnath Nayak', '', 'About bengali literature portal', '', ''),
(6, 'Digital Companion (A Smart Device)', '2010-2011', 'B.Sc. 4th', 'B.Sc. 7th Semester', 'Pronab Kumar Mondal', '', 'Md Shihab Rahman', 'Rasel Mia', 'Kamrun Nahar', 'This project is for making a digital device', '', ''),
(8, 'Foreign Education Consultants', '2011-2012', 'M.Sc. 1st', 'M.Sc. Final semester', 'Md Saiful Islam', '', '121020103', '', '', 'Foreign Education Consultants', '', ''),
(9, 'Face Recognition using Viola Jones Algorithm', '2011-2012', 'M.Sc. 1st', 'M.Sc. Final semester', 'Md Selim Al Mamun', '', '121020104', '', '', 'This project is for face recognition', '', ''),
(10, 'Digital Filter by using Window', '2011-2012', 'M.Sc. 1st', 'M.Sc. Final semester', 'Sheikh Sujan Ali', '', '121020107', '', '', 'Digital Filter by using Window', '', ''),
(11, 'Human Face Classification using Genetic Algorithm', '2011-2012', 'M.Sc. 1st', 'M.Sc. Final semester', 'Indrani Mandal', '', '121020106', '', '', 'I dont know', '', ''),
(12, 'Bangla Speech Sentence Recognition using HMM', '2011-2012', 'M.Sc. 1st', 'M.Sc. Final semester', 'Tushar Kanti Saha', '', '121020110', '', '', 'I dont know', '', ''),
(13, 'Quiz Examination', '2010-2011', 'B.Sc. 3rd', 'B.Sc. 6th Semester', 'Md Saiful Islam', '', 'Shahidul Islam', 'Anna Das', 'Abul Bashar', 'This is for online quiz ', '', ''),
(14, 'Developing Biometric Student Identification System', '2010-2011', 'B.Sc. 3rd', 'B.Sc. 6th Semester', 'Md Mijanur Rahman', '', 'Sifat Nur Rahman', 'Firoz Haider Real', 'Mahabur Rahman', 'Biometric Student Identification', '', ''),
(15, 'A Business Automation System', '2010-2011', 'B.Sc. 3rd', 'B.Sc. 6th Semester', 'Md Mijanur Rahman', '', 'Sharmin Sultana', 'Md Ashraful Haque', 'Riyad Ahmed', 'A business Automation System', '', ''),
(16, 'Newspaper Hawker Management', '2010-2011', 'B.Sc. 3rd', 'B.Sc. 6th Semester', 'Indrani Mandal', '', 'Md Zahirul Islam', 'Prity Ranjon Sarker ', 'Helena Khatun', 'Newspaper Hawker Management', '', ''),
(17, 'College Management System', '2010-2011', 'B.Sc. 3rd', 'B.Sc. 6th Semester', 'Pronab Kumar Mondal', '', 'Younus Jamail Rana', 'Kangsajit Roy', 'Md Habibur Rahman', 'College Management System', '', ''),
(18, 'Vehicle Tracking System', '2010-2011', 'B.Sc. 3rd', 'B.Sc. 6th Semester', 'Pronab Kumar Mondal', '', 'Deluar Hossen', 'Rumana Jahan Rimpy', 'Asamaul Husna Tania', 'Vehicle Training System', '', ''),
(19, 'Computer Science Inforamtion Portal', '2010-2011', 'B.Sc. 3rd', 'B.Sc. 6th Semester', 'Pronab Kumar Mondal', '', 'Syed Zenith Rayhan', 'Md Iqbal Hossain', 'Mouri Akter', 'Computer Science', '', ''),
(20, 'Bangla Spell Checker For Search Engine', '2011-2012', 'B.Sc. 4th', 'B.Sc. 7th Semester', 'Md Mijanur Rahman', '', 'Hasan Mahmud', 'Razia Sultana', 'Rumana Jahan Rimpy', 'Bangla Spell Checker For Search Engine', '', ''),
(21, 'A Business Automation System', '2011-2012', 'B.Sc. 4th', 'B.Sc. 7th Semester', 'Md Mijanur Rahman', '', 'Md Ashraful Haque', 'Sharmin Sultana', 'Riyad Ahmed', 'A Business Automation System', '', ''),
(22, 'Developing Biometric Student Attendence System using Biometr', '2011-2012', 'B.Sc. 4th', 'B.Sc. 7th Semester', 'Md Mijanur Rahman', '', 'Sifat Nur Rahman', 'Mahbubur Rahman', '', 'Developing Biometric Student Attendence System using Biometric', '', ''),
(23, 'Design, Build and Test a Creative Unnamed Aerial Vehicle', '2011-2012', 'B.Sc. 4th', 'B.Sc. 7th Semester', 'Md Mijanur Rahman', '', 'Sourav Simanta', 'Firoz Haider Real', '', 'Design, Build and Test a Creative Unnamed Aerial Vehicle', '', ''),
(24, 'Digital Management & Monitoring System for Government Projec', '2011-2012', 'B.Sc. 4th', 'B.Sc. 7th Semester', 'Indrani Mandal', '', 'Deluar Hossen', '', '', 'Digital Management & Monitoring System for Government Project', '', ''),
(25, 'Hospital Management System', '2011-2012', 'B.Sc. 4th', 'B.Sc. 7th Semester', 'Indrani Mandal', '', 'Fahmida Haque', 'Bibi Hazera Eva', '', 'Hospital Management System', '', ''),
(26, 'Online Homecraft Marketing', '2011-2012', 'B.Sc. 4th', 'B.Sc. 7th Semester', 'Indrani Mandal', '', 'Asmaul Husna Tania', 'Anna Das', '', 'Online Homecraft Marketing', '', ''),
(27, 'Shrambazar', '2011-2012', 'B.Sc. 4th', 'B.Sc. 7th Semester', 'Pronab Kumar Mondal', '', 'Onika Akter', 'Ataur Rahman', 'Lucky Akhter', 'Shrambazar', '', ''),
(28, 'Blind Helper Stick', '2011-2012', 'B.Sc. 4th', 'B.Sc. 7th Semester', 'Pronab Kumar Mondal', '', 'Younus Jamail Rana', 'Kangsajit Roy', 'Md Habibur Rahman', 'Blind Helper Stick', '', ''),
(29, 'Online Communication System', '2011-2012', 'B.Sc. 4th', 'B.Sc. 7th Semester', 'Pronab Kumar Mondal', '', 'Syed Zenith Rayhan', 'Md Iqbal Hossain', 'Mouri Akter', 'Online Communication System', '', ''),
(30, 'Fishery Mangement System', '2012-2013', 'B.Sc. 4th', 'B.Sc. 7th Semester', 'A H M Kamal', '', 'Chamely Akter', 'Shahadat Alam', 'Jannatul Ferdous', 'Fishery Mangement System about Fishes', '', ''),
(31, 'Displaying Text Information From Digital Image', '2012-2013', 'B.Sc. 4th', 'B.Sc. 8th Semester', 'Md Mijanur Rahman', '', 'Mahnuma Rahman Rinty', 'Fouzia Risdin', '', 'Displaying Text Information From Digital Image', '', ''),
(32, 'Police Station Management System', '2012-2013', 'B.Sc. 4th', 'B.Sc. 8th Semester', 'Sheikh Sujan Ali', '', 'Sadia Afrin Tania', 'Jannate Naim', 'Sudarshan Aich', 'Police Station Management System', '', ''),
(33, 'Disease Detector', '2012-2013', 'B.Sc. 4th', 'B.Sc. 8th Semester', 'Mst Jannatul Ferdous', '', 'Umme Farhana', 'Tridib Datta', 'Ovi Akanda', 'Disease Detector', '', ''),
(34, 'E-commerece Webstie', '2012-2013', 'B.Sc. 4th', 'B.Sc. 8th Semester', 'Indrani Mandal', '', 'Md Nizam Uddin', 'Md Abdul Aziz', 'Kazi Zehan Uddin Tiash', 'E-commerece Website', '', ''),
(35, 'Solar Home System', '2012-2013', 'B.Sc. 4th', 'B.Sc. 8th Semester', 'Pronab Kumar Mondal', '', 'Towfiqul Hasan', 'Sefaty Jahan Oeishe', 'Anik Basak', 'Solar Home System', '', ''),
(36, 'Home Monitoring and Security System with GSM Notification', '2012-2013', 'B.Sc. 4th', 'B.Sc. 8th Semester', 'Subrata Kumar Das', '', 'Md Shafiqul Islam', 'Khandaker Mahedi Sharif', 'Tanvir Hossain', 'Home Monitoring and Security System with GSM Notification', '', ''),
(37, 'Online Bus Ticket Reservation System', '2012-2013', 'B.Sc. 4th', 'B.Sc. 8th Semester', 'Poly Rani Ghosh', '', 'Md Muhaiminul Haque', 'Rubya Khatun', 'Naiema Khanom', 'Online Bus Ticket Reservation System', '', ''),
(38, 'Digital Notice Board', '2012-2013', 'B.Sc. 4th', 'B.Sc. 8th Semester', 'Mahbubun Nahar', '', 'Md Nasir Uddin', '', '', 'Digital Notice Board', '', ''),
(39, 'A Study of Steganalysis of lsb Replacement in Color Image', '2014-2015', 'M.Sc. 1st', 'M.Sc. Final semester', 'Pronab Kumar Mondal', '', '151020101', '', '', 'A Study of Steganalysis of lsb Replacement in Color Image', '', ''),
(40, 'IoT Smart Home 1', '2014-2015', 'M.Sc. 1st', 'M.Sc. Final semester', 'Pronab Kumar Mondal', '', '151020102', '', '', 'IoT Smart Home', '', ''),
(41, 'Android Tourist Guide Project', '2014-2015', 'M.Sc. 1st', 'M.Sc. Final semester', 'Subrata Kumar Das', '', '151020103', '', '', 'Android Tourist Guide Project', '', ''),
(42, 'Shop Management System', '2014-2015', 'M.Sc. 1st', 'M.Sc. Final semester', 'Mst Jannatul Ferdous', '', '151020104', '', '', 'Shop Management System', '', ''),
(43, 'Inventory Management System', '2014-2015', 'M.Sc. 1st', 'M.Sc. Final semester', 'Subrata Kumar Das', '', '151020105', '', '', 'Inventory Management System', '', ''),
(44, 'Investement Projection of Dhaka Stock Exchanges', '2014-2015', 'M.Sc. 1st', 'M.Sc. Final semester', 'A H M Kamal', '', '151020106', '', '', 'Investement Projection of Dhaka Stock Exchanges', '', ''),
(45, 'Patient Management System', '2014-2015', 'M.Sc. 1st', 'M.Sc. Final semester', 'A H M Kamal', '', '151020107', '', '', 'Patient Management System', '', ''),
(46, 'Secure Biometric Fingerprint Authentication System', '2014-2015', 'M.Sc. 1st', 'M.Sc. Final semester', 'Md Mijanur Rahman', '', '151020109', '', '', 'Secure Biometric Fingerprint Authentication System', '', ''),
(47, 'Education Guideling Bangladesh (EGB) app', '2014-2015', 'M.Sc. 1st', 'M.Sc. Final semester', 'Sheikh Sujan Ali', '', '151020110', '', '', 'Education Guideling Bangladesh (EGB) app', '', ''),
(48, 'Weather Station', '2014-2015', 'M.Sc. 1st', 'M.Sc. Final semester', 'Indrani Mandal', '', '151020111', '', '', 'Weather Station', '', ''),
(49, 'To Require the Fuel Economy of a Car', '2016-2017', 'B.Sc. 1st', 'B.Sc. 2nd Semester', 'AHM Kamal', '', 'Md Kaosar Ali', 'Rakibul Islam Ontor', '', 'To Require the Fuel Economy of a Car', '', ''),
(50, 'Development of Universal Calender', '2016-2017', 'B.Sc. 1st', 'B.Sc. 2nd Semester', 'Md Mijanur Rahman', '', 'Kanis Fatema', 'Monisha Dey', '', 'Development of Universal Calender', '', ''),
(51, 'Conversion of Different Units and Number System', '2016-2017', 'B.Sc. 1st', 'B.Sc. 2nd Semester', 'Sheikh Sujan Ali', '', 'Polash Mahmud', 'Md Deloear Hossen', '', 'Conversion of Different Units and Number System', '', ''),
(52, 'Database of Date and Set Plan of Admission Test', '2016-2017', 'B.Sc. 1st', 'B.Sc. 2nd Semester', 'Mst Jannatul Ferdous', '', 'ABM Suaib Mahmud Palash', 'Bidhan Krishna Roy', '', 'Database of Date and Set Plan of Admission Test', '', ''),
(53, 'Online Bus Reservation System', '2016-2017', 'B.Sc. 1st', 'B.Sc. 2nd Semester', 'Md Selim Al Mamun', '', 'Mst Farjana Haque', 'Jakia Akter', '', 'Online Bus Reservation System', '', ''),
(54, 'Development of Hungman Game (Word Guessing Game)', '2016-2017', 'B.Sc. 1st', 'B.Sc. 2nd Semester', 'Indrani Mandal', '', 'Deena Faria', 'Mahmuda Akter', '', 'Development of Hungman Game (Word Guessing Game)', '', ''),
(55, 'Development of Tic Tac Toe Game', '2016-2017', 'B.Sc. 1st', 'B.Sc. 2nd Semester', 'Pronab Kumar Mondal', '', 'Mehzabin Akter Khadiza', 'Mst Sabrina Sultana', '', 'Development of Tic Tac Toe Game', '', ''),
(56, 'Development of Sudoku Game', '2016-2017', 'B.Sc. 1st', 'B.Sc. 2nd Semester', 'Subrata Kumar Das', '', 'Komal Chandra Banik', 'Tipu Khan', '', 'Development of Sudoku Game', '', ''),
(57, 'Project on Calender in C++', '2016-2017', 'B.Sc. 1st', 'B.Sc. 2nd Semester', 'Subrata Kumar Das', '', 'Tammana Hossen', 'Mahmuda Akter', '', 'Project on Calender in C++', '', ''),
(58, 'Word Justifying Game ', '2016-2017', 'B.Sc. 2nd', 'B.Sc. 4th Semester', 'AHM Kamal', '', '17102017', '17102023', '', 'Word Justifying Game', '', ' '),
(59, 'Web Browser', '2016-2017', 'B.Sc. 2nd', 'B.Sc. 4th Semester', 'AHM Kamal', '', '17102004', '17102019', '', '								Web Browser', '', ''),
(60, 'My Doctor', '2016-2017', 'B.Sc. 2nd', 'B.Sc. 4th Semester', 'Md Mijanur Rahman', '', '17102020', '17102044', '', 'My Doctor', '', ''),
(61, 'ATM Management System', '2016-2017', 'B.Sc. 2nd', 'B.Sc. 4th Semester', 'Sheikh Sujan Ali', '', '17102038', '16102006', '', 'ATM Management System', '', ''),
(62, 'Multi Calculator', '2016-2017', 'B.Sc. 2nd', 'B.Sc. 4th Semester', 'Mst Jannatul Ferdous', '', '17102001', '16102004', '', 'Multi Calculator', '', ''),
(63, 'Student Management System', '2016-2017', 'B.Sc. 2nd', 'B.Sc. 4th Semester', 'Mst Jannatul Ferdous', '', '17102037', '16102025', '', 'Student Management System', '', ''),
(64, 'Development of Phone Book', '2016-2017', 'B.Sc. 2nd', 'B.Sc. 4th Semester', 'Uzzal Kumar Prodhan', '', '17102002', '17102045', '', 'Development of Phone Book', '', ''),
(65, 'Exchange of Information', '2016-2017', 'B.Sc. 2nd', 'B.Sc. 4th Semester', 'Uzzal Kumar Prodhan', '', '17102011', '16102033', '', 'Exchange of Information', '', ''),
(66, 'Making an Android', '2014-2015', 'B.Sc. 3rd', 'B.Sc. 6th Semester', 'AHM Kamal', '', '151020102', '15102012', '', 'Making an Android Game', '', ''),
(67, 'Snake Ludo Android Game', '2014-2015', 'B.Sc. 3rd', 'B.Sc. 6th Semester', 'AHM Kamal', '', '151020101', '13102017', '', 'Snake Ludo Android Game', '', ''),
(68, 'Alumni Directory Android App', '2014-2015', 'B.Sc. 3rd', 'B.Sc. 6th Semester', 'Md Mijanur Rahman', '', '151020105', '13102012', '', 'Alumni Directory Android App', '', ''),
(69, 'CSE Department Official Communication Android App (Link Up)', '2014-2015', 'B.Sc. 3rd', 'B.Sc. 6th Semester', 'Sheikh Sujan Ali', '', '15102024', '14102017', '', 'CSE Department Official Communication Android App (Link Up)', '', ''),
(70, 'Online Doctor Appointment and Prescription', '2014-2015', 'B.Sc. 3rd', 'B.Sc. 6th Semester', 'Mst Jannatul Ferdous', '', '15102010', '15102029', '', 'Online Doctor Appointment and Prescription', '', ''),
(71, 'Arduino Based Color Sorter Project', '2014-2015', 'B.Sc. 3rd', 'B.Sc. 6th Semester', 'Uzzal Kumar Prodhan', '', '151020108', '14102030', '', 'Arduino Based Color Sorter Project', '', ''),
(72, 'A GUI for Lab Control System', '2014-2015', 'B.Sc. 3rd', 'B.Sc. 6th Semester', 'Md Selim Al Mamun', '', '151020117', '13102013', '', 'Arduino Based Color Sorter Project', '', ''),
(73, 'E-Classroom Web Application', '2013-2014', 'B.Sc. 4th', 'B.Sc. 8th Semester', 'AHM Kamal', '', '14102010', '14102024', '', 'E-Classroom Web Application', '', ''),
(74, 'IoT Based Smart Irrigation System', '2013-2014', 'B.Sc. 4th', 'B.Sc. 8th Semester', 'Md Mijanur Rahman', '', '14102021', '14102023', '', 'IoT Based Smart Irrigation System', '', ''),
(75, 'Generate the Biometric Random Proxy Code', '2013-2014', 'B.Sc. 4th', 'B.Sc. 8th Semester', 'Md Mijanur Rahman', '', '11102043', '', '', 'Generate the Biometric Random Proxy Code', '', ''),
(76, 'Jkkniu Diary', '2013-2014', 'B.Sc. 4th', 'B.Sc. 8th Semester', 'Sheikh Sujan Ali', '', '14102012', '14102006', '', 'Jkkniu Diary', '', ''),
(77, 'Hybrid Power Generation System (Vertical Axis Wind Turbine a', '2013-2014', 'B.Sc. 4th', 'B.Sc. 8th Semester', 'Mst Jannatul Ferdous', '', '14102005', '14102026', '', 'Hybrid Power Generation System (Vertical Axis Wind Turbine and Sun Tracking Solar Panel)', '', ''),
(78, 'Humidity Based Smart Room Heater', '2013-2014', 'B.Sc. 4th', 'B.Sc. 8th Semester', 'Uzzal Kumar Prodhan', '', '14102011', '14102025', '', 'Humidity Based Smart Room Heater', '', ''),
(79, 'Web Fiction Writing & Publishsing Community', '2013-2014', 'B.Sc. 4th', 'B.Sc. 8th Semester', 'Md Selim Al Mamun', '', '14102018', '14102028', '', 'Web Fiction Writing & Publishsing Community', '', ''),
(80, 'Contact Management 1', '2017-2018', 'B.Sc. 1st', 'B.Sc. 2nd Semester', 'AHM Kamal', '', '18102016', '17102026', '', '																								Contact Management', '', ''),
(81, 'Student Database Management System', '2017-2018', 'B.Sc. 1st', 'B.Sc. 2nd Semester', 'Md Mijanur Rahman', '', '18102014', '17102014', '', '								Student Database Management System', '', ''),
(82, 'Colour Changing of Text', '2017-2018', 'B.Sc. 1st', 'B.Sc. 2nd Semester', 'Md Mijanur Rahman', '', '18102007', '18102008', '', 'Colour Changing of Text', '', ''),
(83, 'BMI Calculator', '2017-2018', 'B.Sc. 1st', 'B.Sc. 2nd Semester', 'Sheikh Sujan Ali', '', '17102025', '17102029', '', 'BMI Calculator', '', ''),
(84, 'My Personal Diary', '2017-2018', 'B.Sc. 1st', 'B.Sc. 2nd Semester', 'Sheikh Sujan Ali', '', '18102017', '18102023', '', 'My Personal Diary', '', ''),
(85, 'Mess Management System', '2017-2018', 'B.Sc. 1st', 'B.Sc. 2nd Semester', 'Mst Jannatul Ferdous', '', '18102037', '18102041', '', 'Mess Management System', '', ''),
(86, 'Hotel Booking System', '2017-2018', 'B.Sc. 1st', 'B.Sc. 2nd Semester', 'Mst Jannatul Ferdous', '', '18102021', '18102035', '', 'Hotel Booking System', '', ''),
(87, 'Money Management System', '2017-2018', 'B.Sc. 1st', 'B.Sc. 2nd Semester', 'Uzzal Kumar Prodhan', '', '18102036', '17102007', '', 'Money Management System', '', ''),
(88, 'School Billing System', '2017-2018', 'B.Sc. 1st', 'B.Sc. 2nd Semester', 'Uzzal Kumar Prodhan', '', '16102005', '15102009', '', 'School Billing System', '', ''),
(89, 'Development of Library Management', '2017-2018', 'B.Sc. 1st', 'B.Sc. 2nd Semester', 'Md Selim Al Mamun', '', '18102038', '18102043', '', 'Development of Library Management', '', ''),
(90, 'Parking Management System', '2017-2018', 'B.Sc. 1st', 'B.Sc. 2nd Semester', 'Md Selim Al Mamun', '', '18102005', '', 'Parking Management System', 'Parking Management System', '', ''),
(91, 'Simple Scientific Calculator', '2017-2018', 'B.Sc. 1st', 'B.Sc. 2nd Semester', 'Subrata Kumar Das', '', '18102002', '17102031', '', 'Simple Scientific Calculator', '', ''),
(92, 'Telecom Billing System', '2017-2018', 'B.Sc. 1st', 'B.Sc. 2nd Semester', 'Tushar Kanti Saha', '', '18102003', '18102023', '', 'Telecom Billing System', '', ''),
(94, 'Quiz Game', '2016-2017', 'B.Sc. 2nd', 'B.Sc. 4th Semester', 'Md Selim Al Mamun', '', '17102018', '17102021', '', 'Quiz Game', '', ''),
(95, 'Password Manager', '2016-2017', 'B.Sc. 2nd', 'B.Sc. 4th Semester', 'Subrata Kumar Das', '', '17102008', '17102009', '', 'Password Manager', '', ''),
(96, 'Bank Account Management System', '2016-2017', 'B.Sc. 2nd', 'B.Sc. 4th Semester', 'Subrata Kumar Das', '', '17102012', '16102014', '', 'Bank Account Management System', '', ''),
(104, 'E-Ticket (Android Application)', '2014-2015', 'M.Sc. 1st', 'M.Sc. Final semester', 'Mst Jannatul Ferdous', '', '151020112', '', '', 'E-Ticket', '', ''),
(107, 'Bus Reservation', '2017-2018', 'B.Sc. 1st', 'B.Sc. 2nd Semester', 'Tushar Kanti Saha', '', '18102001', '18102012', '', 'Bus Reservation System', '', ''),
(109, 'Development of World Clock', '2016-2017', 'B.Sc. 2nd', 'B.Sc. 4th Semester', 'Tushar Kanti Saha', '', '17102005', '17102027', '', 'Development of World Clock', '', ''),
(110, 'Home Rent Management System', '2017-2018', 'B.Sc. 1st', 'B.Sc. 2nd Semester', 'Indrani Mandal', '', '18102033', '18102040', '', 'Home Rent Management System', '', '1558162739.png'),
(111, 'Library Management System', '2016-2017', 'B.Sc. 2nd', 'B.Sc. 4th Semester', 'Indrani Mandal', '', '17102003', '17102043', '', 'Library Management System', '', ''),
(112, 'IQ Test Game', '2017-2018', 'B.Sc. 1st', 'B.Sc. 2nd Semester', 'Indrani Mandal', '', '18102028', '18102032', '', 'This is like a game', '', '1558161083.jpg'),
(113, 'Snake Game', '2017-2018', 'B.Sc. 1st', 'B.Sc. 2nd Semester', 'Pronab Kumar Mondal', '', '18102009', '18102027', '', 'This a game of snake moving. It is an enjoyable game.', '', '1558162652.jpg'),
(115, 'Online Voting System', '2021-2022', 'B.Sc. 1st', 'B.Sc. 2nd Semester', 'Tushar Kanti Saha', '', '20102001', '', '', 'This is a web based system for teachers election', 'Final Year Project Report  Main.pdf', '1670073149.PNG');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `add_teacher`
--
ALTER TABLE `add_teacher`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `admin_log_in`
--
ALTER TABLE `admin_log_in`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `exam_committee`
--
ALTER TABLE `exam_committee`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `project_information`
--
ALTER TABLE `project_information`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `add_teacher`
--
ALTER TABLE `add_teacher`
  MODIFY `id` int(50) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=38;

--
-- AUTO_INCREMENT for table `admin_log_in`
--
ALTER TABLE `admin_log_in`
  MODIFY `id` int(50) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT for table `exam_committee`
--
ALTER TABLE `exam_committee`
  MODIFY `id` int(50) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=21;

--
-- AUTO_INCREMENT for table `project_information`
--
ALTER TABLE `project_information`
  MODIFY `id` int(50) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=116;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
