-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- 생성 시간: 21-11-23 17:14
-- 서버 버전: 10.4.21-MariaDB
-- PHP 버전: 7.3.31

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- 데이터베이스: `notice_board`
--

-- --------------------------------------------------------

--
-- 테이블 구조 `notice_cate`
--

CREATE TABLE `notice_cate` (
  `id` int(11) NOT NULL,
  `name` varchar(255) CHARACTER SET utf8 NOT NULL,
  `kind` text CHARACTER SET utf8 NOT NULL,
  `p_enter` int(11) NOT NULL,
  `p_read` int(11) NOT NULL,
  `p_write` int(11) NOT NULL,
  `p_update` int(11) NOT NULL,
  `p_delete` int(11) NOT NULL,
  `n_enter` int(11) NOT NULL,
  `n_read` int(11) NOT NULL,
  `n_write` int(11) NOT NULL,
  `n_update` int(11) NOT NULL,
  `n_delete` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- 테이블의 덤프 데이터 `notice_cate`
--

INSERT INTO `notice_cate` (`id`, `name`, `kind`, `p_enter`, `p_read`, `p_write`, `p_update`, `p_delete`, `n_enter`, `n_read`, `n_write`, `n_update`, `n_delete`) VALUES
(1, '자유게시판', 'free', 1, 1, 1, 1, 1, 1, 1, 1, 1, 1),
(2, 'PHP게시판', 'php', 1, 1, 1, 1, 1, 1, 1, 0, 0, 0),
(3, '토론게시판', 'debate', 1, 1, 1, 1, 1, 0, 0, 0, 0, 0),
(4, '박제게시판', 'fixed', 1, 1, 1, 1, 1, 0, 0, 0, 0, 0),
(5, '공지사항', 'alert', 1, 1, 0, 0, 0, 1, 1, 0, 0, 0);

-- --------------------------------------------------------

--
-- 테이블 구조 `notice_file`
--

CREATE TABLE `notice_file` (
  `id` int(11) NOT NULL,
  `route` text NOT NULL,
  `file_name` text NOT NULL,
  `type` text NOT NULL,
  `size` int(11) NOT NULL,
  `idx` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- 테이블의 덤프 데이터 `notice_file`
--

INSERT INTO `notice_file` (`id`, `route`, `file_name`, `type`, `size`, `idx`) VALUES
(1, 'server/imageS/AllFuck.jpg', 'AllFuck.jpg', 'image/jpeg', 8895, 412),
(2, 'server/imageS/monkey.jpg', 'monkey.jpg', 'image/jpeg', 5002, 429),
(18, 'server/imageS/monkey.jpg', 'monkey.jpg', 'image/jpeg', 5002, 436),
(19, 'server/imageS/AllFuck.jpg', 'AllFuck.jpg', 'image/jpeg', 8895, 436),
(26, 'server/imageS/NoListen.png', 'NoListen.png', 'image/png', 17861, 441),
(58, 'server/imageS/monkey.jpg', 'monkey.jpg', 'image/jpeg', 5002, 434),
(63, 'server/imageS/EggMoney.png', 'EggMoney.png', 'image/png', 15667, 441),
(64, 'server/imageS/NoDo.png', 'NoDo.png', 'image/png', 16631, 441),
(65, 'server/imageS/monkey.jpg', 'monkey.jpg', 'image/jpeg', 5002, 439),
(67, 'server/imageS/EggMoney.jpg', 'EggMoney.jpg', 'image/jpeg', 5902, 451),
(68, 'server/imageS/monkey.jpg', 'monkey.jpg', 'image/jpeg', 5002, 451),
(69, 'server/imageS/never.png', 'never.png', 'image/png', 5350, 451),
(70, 'server/imageS/NoDo.png', 'NoDo.png', 'image/png', 16631, 451),
(71, 'server/imageS/NoListen.png', 'NoListen.png', 'image/png', 17861, 451),
(72, 'server/imageS/NoThink.png', 'NoThink.png', 'image/png', 5618, 451),
(73, 'server/imageS/ques.png', 'ques.png', 'image/png', 176634, 452),
(76, 'server/imageS/monkey.jpg', 'monkey.jpg', 'image/jpeg', 5002, 453),
(77, 'server/imageS/AllFuck.jpg', 'AllFuck.jpg', 'image/jpeg', 8895, 465),
(79, 'server/imageS/never.png', 'never.png', 'image/png', 5350, 468),
(80, 'server/imageS/AllFuck.jpg', 'AllFuck.jpg', 'image/jpeg', 8895, 0),
(81, 'server/imageS/??1.PNG', '??1.PNG', 'image/png', 461771, 0),
(82, 'server/imageS/AllFuck.png', 'AllFuck.png', 'image/png', 17883, 476);

-- --------------------------------------------------------

--
-- 테이블 구조 `notice_info`
--

CREATE TABLE `notice_info` (
  `id` int(11) NOT NULL,
  `usname` varchar(10) NOT NULL,
  `title` varchar(50) NOT NULL,
  `des` text NOT NULL,
  `date` varchar(30) NOT NULL,
  `hit` int(11) NOT NULL,
  `Bulletin` int(1) NOT NULL,
  `password` text NOT NULL,
  `cateid` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- 테이블의 덤프 데이터 `notice_info`
--

INSERT INTO `notice_info` (`id`, `usname`, `title`, `des`, `date`, `hit`, `Bulletin`, `password`, `cateid`) VALUES
(1, 'Admin', 'Analog Circuit Design manager', 'Universidade Federal do Vale do São Francisco', '2021-01-18 20:14:35', 0, 0, '', 0),
(2, 'Admin', 'Software Engineer II', 'Université Catholique de l\' Ouest', '2020-11-08 22:23:12', 0, 0, '', 0),
(3, 'Admin', 'Compensation Analyst', 'Al al-Bayt University', '2020-10-05 22:00:19', 0, 0, '', 0),
(4, 'Admin', 'Engineer IV', 'Inner Mongolia Agricultural University', '2021-02-09 09:35:10', 0, 0, '', 0),
(5, 'Admin', 'Dental Hygienist', 'Chongqing University of Science and Technology ', '2021-08-12 02:50:37', 0, 0, '', 0),
(6, 'Admin', 'Compensation Analyst', 'Nishikyushu University', '2021-01-21 13:20:53', 0, 0, '', 0),
(7, 'Admin', 'Senior Quality Engineer', 'International Buddhist University', '2021-01-29 15:24:16', 0, 0, '', 0),
(8, 'Admin', 'Budget/Accounting Analyst I', 'Escuela Superior Politécnica del Litoral', '2021-02-15 15:03:11', 0, 0, '', 0),
(9, 'Admin', 'Financial Analyst', 'Universidad Nacional Andrés Bello', '2020-10-20 23:27:49', 0, 0, '', 0),
(10, 'Admin', 'Compensation Analyst', 'Shaw University', '2021-09-15 01:51:16', 1, 0, '', 0),
(11, 'Admin', 'Media Manager II', 'Teikyo University of Science and Technology', '2021-01-06 00:32:31', 0, 0, '', 0),
(12, 'Admin', 'Account Representative II', 'Kunsan National University', '2021-02-02 10:23:16', 0, 0, '', 0),
(13, 'Admin', 'Budget/Accounting Analyst II', 'University of Stavanger', '2021-07-30 15:38:29', 0, 0, '', 0),
(14, 'Admin', 'Community Outreach Specialist', 'Midway College', '2020-11-19 09:50:36', 0, 0, '', 0),
(15, 'Admin', 'Geological Engineer', 'Universidad de León', '2021-07-11 00:02:07', 0, 0, '', 0),
(16, 'Admin', 'General Manager', 'Osaka University of Arts', '2020-10-26 23:31:17', 0, 0, '', 0),
(17, 'Admin', 'Software Test Engineer II', 'University of Qatar', '2021-08-15 02:15:43', 0, 0, '', 0),
(18, 'Admin', 'Account Coordinator', 'Universitas Jambi', '2020-09-26 16:39:01', 0, 0, '', 0),
(19, 'Admin', 'Senior Cost Accountant', 'Universidad de Los Andes', '2020-09-30 14:53:21', 0, 0, '', 0),
(20, 'Admin', 'Software Engineer IV', 'Islamic Azad University, Tabriz', '2020-10-08 06:53:50', 0, 0, '', 0),
(21, 'Admin', 'Biostatistician I', 'Central Institute of English and Foreign Languages', '2020-12-11 21:40:05', 0, 0, '', 0),
(22, 'Admin', 'Account Executive', 'Universidad Andina Simón Bolívar', '2021-08-15 23:48:47', 0, 0, '', 0),
(23, 'Admin', 'Environmental Tech', 'Benha University', '2020-09-23 20:20:42', 0, 0, '', 0),
(24, 'Admin', 'Graphic Designer', 'Evangelische Theologische Faculteit, Leuven', '2021-08-02 05:54:52', 0, 0, '', 0),
(25, 'Admin', 'Human Resources Assistant I', 'Judson College Marion', '2021-01-31 08:36:01', 0, 0, '', 0),
(26, 'Admin', 'Safety Technician III', 'Université de Buéa', '2021-07-29 08:26:04', 0, 0, '', 0),
(27, 'Admin', 'Legal Assistant', 'Madonna University', '2021-01-15 18:31:20', 0, 0, '', 0),
(28, 'Admin', 'Business Systems Development Analyst', 'Private Fachhochschule Göttingen', '2021-08-30 22:07:58', 0, 0, '', 0),
(29, 'Admin', 'Safety Technician I', 'Midway College', '2020-11-04 00:23:00', 0, 0, '', 0),
(30, 'Admin', 'Geologist IV', 'Mulungushi University', '2021-07-08 08:44:34', 0, 0, '', 0),
(31, 'Admin', 'Mechanical Systems Engineer', 'King\'s University College', '2021-01-27 11:40:19', 0, 0, '', 0),
(32, 'Admin', 'Help Desk Technician', 'Islamic Azad University, Yazd', '2021-05-09 21:26:49', 0, 0, '', 0),
(33, 'Admin', 'Product Engineer', 'University of the Western Cape', '2021-08-10 07:13:16', 0, 0, '', 0),
(34, 'Admin', 'Account Representative IV', 'Université de Kolwezi', '2021-09-09 08:13:37', 1, 0, '', 0),
(35, 'Admin', 'Cost Accountant', 'West Coast University', '2021-05-25 02:00:30', 0, 0, '', 0),
(36, 'Admin', 'Software Test Engineer IV', 'Kansas City Art Institute', '2020-09-23 14:49:36', 0, 0, '', 0),
(37, 'Admin', 'Human Resources Manager', 'Universidad Pedagogica Nacional', '2021-06-12 02:36:46', 0, 0, '', 0),
(38, 'Admin', 'Office Assistant I', 'Fomic Polytechnic', '2021-06-21 06:22:35', 0, 0, '', 0),
(39, 'Admin', 'Automation Specialist II', 'Universidade Paulista', '2021-04-14 02:34:39', 0, 0, '', 0),
(40, 'Admin', 'Data Coordiator', 'University of Cincinnati', '2020-12-29 23:14:32', 0, 0, '', 0),
(41, 'Admin', 'Mechanical Systems Engineer', 'Sinte Gleska University', '2020-11-04 19:23:47', 0, 0, '', 0),
(42, 'Admin', 'Developer II', 'Reykjavík University', '2021-09-17 04:47:05', 2, 0, '', 0),
(43, 'Admin', 'Associate Professor', 'Kitami Institute of Technology', '2021-04-26 14:12:06', 0, 0, '', 0),
(44, 'Admin', 'Accounting Assistant II', 'Kirchliche Hochschule Wuppertal', '2021-03-23 14:16:40', 1, 0, '', 0),
(45, 'Admin', 'Internal Auditor', 'Universitas Islam Bandung', '2021-02-15 06:21:44', 0, 0, '', 0),
(46, 'Admin', 'Financial Analyst', 'Thomas University', '2021-06-01 23:49:37', 0, 0, '', 0),
(47, 'Admin', 'Clinical Specialist', 'Universidade do Vale do Itajaí', '2021-04-28 15:56:18', 0, 0, '', 0),
(48, 'Admin', 'Help Desk Operator', 'Osaka College of Music', '2021-02-13 10:15:52', 0, 0, '', 0),
(49, 'Admin', 'Quality Engineer', 'Sapporo Medical University', '2021-04-20 21:12:11', 0, 0, '', 0),
(50, 'Admin', 'GIS Technical Architect', 'Newberry College', '2021-04-18 13:46:21', 0, 0, '', 0),
(51, 'Admin', 'Marketing Manager', 'University of El Imam El Mahdi University', '2021-06-08 03:54:19', 0, 0, '', 0),
(52, 'Admin', 'Electrical Engineer', 'St. Clair College', '2021-04-18 02:36:03', 0, 0, '', 0),
(53, 'Admin', 'Electrical Engineer', 'Laboratory Institute of Merchandising', '2021-03-30 04:41:36', 0, 0, '', 0),
(54, 'Admin', 'Electrical Engineer', 'Osaka International University for Women', '2021-07-17 21:46:01', 0, 0, '', 0),
(55, 'Admin', 'Cost Accountant', 'Indiana State University', '2020-11-28 11:03:52', 0, 0, '', 0),
(56, 'Admin', 'Account Representative II', 'Massachusetts Institute of Technology', '2021-03-09 19:37:10', 0, 0, '', 0),
(57, 'Admin', 'Software Test Engineer III', 'Instituto Superior de Ciências Educativas', '2021-07-11 15:06:27', 0, 0, '', 0),
(58, 'Admin', 'Senior Quality Engineer', 'International Blacksea University', '2020-11-13 18:04:50', 0, 0, '', 0),
(59, 'Admin', 'Automation Specialist I', 'Douglas College', '2021-03-11 13:17:30', 0, 0, '', 0),
(60, 'Admin', 'VP Product Management', 'Lycoming College', '2020-11-07 18:35:24', 0, 0, '', 0),
(61, 'Admin', 'Physical Therapy Assistant', 'Spertus Institute of Jewish Studies', '2021-09-09 13:59:42', 0, 0, '', 0),
(62, 'Admin', 'Structural Engineer', 'New Economic School', '2021-07-31 05:51:08', 0, 0, '', 0),
(63, 'Admin', 'Operator', 'Lebanon Valley College', '2021-09-13 13:39:14', 1, 0, '', 0),
(64, 'Admin', 'Administrative Officer', 'Korea University', '2021-06-19 18:09:41', 0, 0, '', 0),
(65, 'Admin', 'Quality Engineer', 'Misamis University', '2020-12-14 10:32:28', 0, 0, '', 0),
(66, 'Admin', 'Computer Systems Analyst I', 'Toccoa Falls College', '2021-07-24 03:40:43', 0, 0, '', 0),
(67, 'Admin', 'Data Coordiator', 'Pan-African University', '2021-06-29 04:04:29', 0, 0, '', 0),
(68, 'Admin', 'Assistant Manager', 'University of Santo Tomas', '2020-11-12 22:24:33', 0, 0, '', 0),
(69, 'Admin', 'Speech Pathologist', 'University of Kabianga', '2021-08-23 00:49:01', 1, 0, '', 0),
(70, 'Admin', 'Media Manager I', 'University of Aberdeen', '2021-08-21 18:01:39', 0, 0, '', 0),
(71, 'Admin', 'Health Coach IV', 'Hanseo University', '2021-02-22 04:50:32', 0, 0, '', 0),
(72, 'Admin', 'Assistant Manager', 'Gift University', '2020-12-20 00:07:45', 0, 0, '', 0),
(73, 'Admin', 'Professor', 'Linfield College', '2021-01-29 03:05:22', 0, 0, '', 0),
(74, 'Admin', 'Payment Adjustment Coordinator', 'Kolej Universiti Insaniah', '2021-04-22 06:00:54', 0, 0, '', 0),
(75, 'Admin', 'Human Resources Manager', 'Institute of Accountancy Arusha', '2021-01-29 02:34:55', 0, 0, '', 0),
(76, 'Admin', 'Environmental Specialist', 'Instituto Politécnico da Guarda', '2021-03-07 03:11:50', 0, 0, '', 0),
(77, 'Admin', 'Accounting Assistant III', 'Institute of Teachers Education, Raja Melewar', '2021-06-15 21:55:54', 0, 0, '', 0),
(78, 'Admin', 'Statistician III', 'Universidad Autónoma de Nuevo León', '2020-11-02 21:30:27', 0, 0, '', 0),
(79, 'Admin', 'Legal Assistant', 'EPF Ecole d\'Ingénieurs', '2020-10-11 12:43:51', 0, 0, '', 0),
(80, 'Admin', 'Biostatistician II', 'University of Central Greece', '2021-02-14 10:20:22', 0, 0, '', 0),
(81, 'Admin', 'Nurse Practicioner', 'University of Prince Edward Island', '2021-04-13 03:23:16', 0, 0, '', 0),
(82, 'Admin', 'VP Accounting', 'Ecole Nationale Supérieure de Chimie de Clermont-Ferrand', '2020-11-30 19:39:38', 0, 0, '', 0),
(83, 'Admin', 'Information Systems Manager', 'Lithunian Veterinary Academy', '2021-01-02 20:57:43', 0, 0, '', 0),
(84, 'Admin', 'Actuary', 'Silpakorn University', '2020-10-18 22:47:43', 0, 0, '', 0),
(85, 'Admin', 'Project Manager', 'Universidad Autónoma Latinoamericana', '2020-09-29 12:56:26', 0, 0, '', 0),
(86, 'Admin', 'Financial Analyst', 'Prescott College', '2021-04-29 05:56:16', 0, 0, '', 0),
(87, 'Admin', 'Internal Auditor', 'Kanto Gakuen University', '2021-05-21 03:07:50', 0, 0, '', 0),
(88, 'Admin', 'Civil Engineer', 'Ecole Nationale Supérieure de Chimie de Paris', '2021-04-10 08:38:06', 0, 0, '', 0),
(89, 'Admin', 'Operator', 'Morioka College', '2020-10-28 05:02:30', 0, 0, '', 0),
(90, 'Admin', 'Software Test Engineer IV', 'Universidad Austral Buenos Aires', '2021-03-13 13:43:56', 0, 0, '', 0),
(91, 'Admin', 'Dental Hygienist', 'Mimar Sinan University', '2021-06-11 03:38:12', 0, 0, '', 0),
(92, 'Admin', 'Research Associate', 'Ferghana Politechnical Institute', '2020-11-16 00:29:20', 0, 0, '', 0),
(93, 'Admin', 'Accountant IV(수정됨)', 'Integral University', '2021-05-31 19:50:45', 1, 0, '', 0),
(94, 'Admin', 'Chief Design Engineer', 'Universidad de Oriente', '2021-01-31 15:10:15', 0, 0, '', 0),
(95, 'Admin', 'Senior Cost Accountant', 'Instituto de Enseñanza Superior Oteima', '2021-03-22 10:43:27', 0, 0, '', 0),
(96, 'Admin', 'Legal Assistant', 'Business School Lausanne (BSL)', '2020-10-04 18:14:14', 0, 0, '', 0),
(97, 'Admin', 'Internal Auditor', 'Dr. Babasaheb Ambedkar Marathwada Universtiy', '2021-09-20 18:19:26', 0, 0, '', 0),
(98, 'Admin', 'Project Manager', 'Schiller International University, Madrid', '2021-02-03 16:26:10', 0, 0, '', 0),
(99, 'Admin', 'Registered Nurse', 'Bankura University', '2021-08-19 13:52:55', 0, 0, '', 0),
(100, 'Admin', 'Financial Advisor', 'Fayetteville State University', '2020-12-27 00:04:47', 0, 0, '', 0),
(101, 'Admin', 'Human Resources Assistant IV', 'Truman College', '2021-05-13 08:15:59', 2, 0, '', 0),
(102, 'Admin', 'Legal Assistant', 'Shandong University of Triaditional Chinese Medicine', '2020-11-08 09:24:11', 0, 0, '', 0),
(103, 'Admin', 'Registered Nurse', 'Tongji University', '2021-03-01 16:58:56', 0, 0, '', 0),
(104, 'Admin', 'Software Test Engineer II', 'National University of Ireland', '2021-06-17 15:43:26', 0, 0, '', 0),
(105, 'Admin', 'Accountant I', 'Okinawa University', '2021-09-07 03:30:09', 1, 0, '', 0),
(106, 'Admin', 'Automation Specialist IV', 'Renaissance University', '2021-03-12 16:00:50', 0, 0, '', 0),
(107, 'Admin', 'GIS Technical Architect', 'University of Nova Gorica', '2021-08-15 08:49:44', 0, 0, '', 0),
(108, 'Admin', 'Staff Accountant I', 'University of the Punjab', '2021-03-29 04:19:44', 0, 0, '', 0),
(109, 'Admin', 'VP Product Management', 'Universidade Federal de Lavras', '2021-04-19 03:15:19', 0, 0, '', 0),
(110, 'Admin', 'Engineer III', 'Ecole Nationale de l\'Aviation Civile', '2021-02-09 11:18:28', 0, 0, '', 0),
(111, 'Admin', 'Nuclear Power Engineer', 'Universidade Catolica Portuguesa', '2020-12-26 06:58:34', 0, 0, '', 0),
(112, 'Admin', 'Dental Hygienist', 'Pikeville College', '2021-06-11 00:51:54', 0, 0, '', 0),
(113, 'Admin', 'VP Sales', 'University of Texas at Dallas', '2021-02-15 16:38:39', 0, 0, '', 0),
(114, 'Admin', 'Electrical Engineer', 'Northwest Nazarene University', '2021-04-25 21:49:58', 0, 0, '', 0),
(115, 'Admin', 'Payment Adjustment Coordinator', 'Palm Beach Atlantic University', '2021-04-25 13:49:29', 0, 0, '', 0),
(116, 'Admin', 'Director of Sales', 'Escuela Nacional de Estudios Superiores Unidad León', '2021-05-03 05:59:08', 0, 0, '', 0),
(117, 'Admin', 'Sales Representative', 'Universidad de Cartago Florencio del Castillo', '2020-09-28 08:07:15', 0, 0, '', 0),
(118, 'Admin', 'Developer I', 'Catholic University of Malawi', '2021-02-26 18:19:35', 0, 0, '', 0),
(119, 'Admin', 'Nuclear Power Engineer', 'Armenian State Agrarian University', '2021-06-01 23:51:58', 0, 0, '', 0),
(120, 'Admin', 'Dental Hygienist', 'Kobe University', '2021-08-26 12:06:32', 0, 0, '', 0),
(121, 'Admin', 'Software Consultant', 'Universidad Juárez del Estado de Durango', '2020-09-28 05:00:19', 0, 0, '', 0),
(122, 'Admin', 'Mechanical Systems Engineer', 'Brenau University', '2021-08-23 11:39:20', 0, 0, '', 0),
(123, 'Admin', 'ðŸ˜<br>(ìˆ˜ì •ë¨)', 'ðŸ˜', '2020-10-01 10:21:47', 0, 0, '', 0),
(124, 'Admin', 'Human Resources Manager', 'Philosophisch-Theologisches Studium Erfurt, Staatlich anerkannte Wissenschaftliche Hochschule', '2020-12-19 02:25:06', 0, 0, '', 0),
(125, 'Admin', 'Chief Design Engineer', 'Shandong Medical University', '2021-07-27 11:30:13', 0, 0, '', 0),
(126, 'Admin', 'VP Product Management', 'Akrofi-Christaller Institute of Theeology, Mission and  Culture', '2021-07-08 20:01:58', 0, 0, '', 0),
(127, 'Admin', 'Project Manager', 'University of Mississippi Medical Center', '2021-01-04 05:58:59', 0, 0, '', 0),
(128, 'Admin', 'VP Sales', 'European University', '2020-10-15 22:09:18', 0, 0, '', 0),
(129, 'Admin', 'Help Desk Technician', 'Udmurt State University', '2021-05-08 11:39:20', 0, 0, '', 0),
(130, 'Admin', 'Accountant I', 'Kigali Institute of Science & Technology', '2021-07-17 14:43:13', 0, 0, '', 0),
(131, 'Admin', 'Actuary', 'Adler School of Professional Psychology', '2020-12-02 00:04:36', 0, 0, '', 0),
(132, 'Admin', 'Teacher', 'Boise State University', '2021-06-29 07:37:14', 0, 0, '', 0),
(133, 'Admin', 'Chemical Engineer', 'Institute of Teachers Education, Temenggong Ibrahim', '2021-03-17 09:50:18', 0, 0, '', 0),
(134, 'Admin', 'Quality Engineer', 'Kent State University - East Liverpool', '2021-05-21 13:02:13', 0, 0, '', 0),
(135, 'Admin', 'Help Desk Technician', 'Nagoya Economics University', '2021-08-09 06:27:56', 1, 0, '', 0),
(136, 'Admin', 'Nurse', 'Allianze College of Medical Sciences (ACMS)', '2021-05-26 07:33:24', 0, 0, '', 0),
(137, 'Admin', 'Biostatistician I', 'University of Maryland University College', '2021-03-22 03:37:43', 0, 0, '', 0),
(138, 'Admin', 'Tax Accountant', 'Matej Bel University in Banská Bystrica', '2021-07-14 04:37:59', 0, 0, '', 0),
(139, 'Admin', 'Programmer Analyst I', 'Omsk State University', '2021-08-28 22:02:27', 0, 0, '', 0),
(140, 'Admin', 'Nurse Practicioner', 'Northwest Normal University Lanzhou', '2020-10-16 12:42:44', 0, 0, '', 0),
(141, 'Admin', 'Software Consultant', 'Instituto Superior D. Afonso III - INUAF', '2021-07-27 01:35:29', 0, 0, '', 0),
(142, 'Admin', 'Media Manager II', 'Swinburne University of Technology', '2021-08-19 08:42:48', 0, 0, '', 0),
(143, 'Admin', 'VP Marketing', 'Université du Québec à Trois-Rivières', '2020-12-14 01:58:57', 0, 0, '', 0),
(144, 'Admin', 'Budget/Accounting Analyst I', 'Oita University', '2021-04-06 22:06:01', 0, 0, '', 0),
(145, 'Admin', 'Structural Analysis Engineer', 'Shuchiin College', '2020-12-21 16:11:13', 0, 0, '', 0),
(146, 'Admin', 'Operator', 'Universidad Latina de Costa Rica', '2021-08-25 15:17:35', 0, 0, '', 0),
(147, 'Admin', 'Media Manager III', 'Tecnologico de Baja California, Universidad', '2021-06-29 20:32:02', 1, 0, '', 0),
(148, 'Admin', 'Clinical Specialist', 'Darul Quran Islamic College University', '2020-12-03 19:57:44', 0, 0, '', 0),
(149, 'Admin', 'VP Quality Control', ' Huaihua University', '2021-04-14 13:29:30', 0, 0, '', 0),
(150, 'Admin', 'Senior Cost Accountant', 'Pontificia Universidad Católica del Ecuador', '2021-06-17 23:16:12', 1, 0, '', 0),
(151, 'Admin', 'Human Resources Assistant I', 'Private Hanseuniversität', '2021-07-03 11:11:57', 0, 0, '', 0),
(152, 'Admin', 'Information Systems Manager', 'Université des Sciences et Technologies de Lille (Lille I)', '2020-10-30 01:51:08', 0, 0, '', 0),
(153, 'Admin', 'VP Product Management', 'Olabisi Onabanjo University ', '2021-02-22 15:49:45', 0, 0, '', 0),
(158, 'qetqet910', 'qetqet', 'qetqetqetqet', '2021-10-12 09:03:10', 1, 0, '', 0),
(159, 'admin', '135135   (ìˆ˜ì •ë¨)', '135135135<br />\r\nížˆížˆ<br />\r\nglgl<br />\r\nížˆížˆížˆ<br />\r\nížˆã…£<br />\r\nã…ã„´ã…‡ã„´ã…ã…‡ã…ã„´ã…‡<br />\r\n<br />\r\nã…ã„´ã…‡', '2021-10-12 17:29:14', 2, 0, '', 0),
(161, 'admin', '1234123123', '1234', '2021-10-13 00:10:24', 1, 0, '', 0),
(167, 'admin', '123', '123123', '2021-10-13 10:16:33', 1, 0, '', 0),
(170, 'admin', '135135', '135135', '2021-10-13 10:18:54', 0, 0, '', 0),
(182, 'admin', '315135135ã„´ã…ã…ã…ã…', '1351351351351513', '2021-10-13 10:34:22', 3, 0, '', 0),
(183, 'admin', '1135', '135135', '2021-10-13 10:35:29', 1, 0, '', 0),
(319, 'admin', '1', '1', '2021-10-14 13:13:03', 1, 0, '', 0),
(321, 'admin', '123123', '123123', '2021-10-14 13:18:09', 0, 0, '', 0),
(328, '1234', '123123', '1234', '2021-10-14 14:01:08', 1, 0, '', 0),
(335, 'zxc12', '135135135', '13513153135', '2021-10-14 15:10:26', 0, 0, '', 0),
(336, 'zxc12', '1234', '1234', '2021-10-14 15:11:50', 1, 0, '', 0),
(337, 'zxc12', '1351', '135', '2021-10-14 15:25:18', 0, 0, '', 0),
(338, 'zxc12', '1', '1', '2021-10-14 15:36:20', 1, 0, '', 0),
(339, 'zxc12', '123', '123', '2021-10-14 15:53:34', 0, 0, '', 0),
(340, 'zxc12', '1', '1', '2021-10-14 15:55:21', 0, 0, '', 0),
(343, 'admin', '123', '123', '2021-10-14 15:58:51', 0, 0, '', 0),
(344, 'admin', '123', '123', '2021-10-14 15:59:33', 0, 0, '', 0),
(345, 'admin', '123<br>(수정됨)', '123<br />\r\n113123<br />\r\n123123<br />\r\n123<br />\r\n123', '2021-10-14 15:59:48', 1, 0, '', 0),
(346, 'admin', '123<br>(수정됨)', '123123<br />\r\n123<br />\r\n123123<br />\r\n123<br />\r\n123123<br />\r\n', '2021-10-14 16:00:32', 3, 0, '', 0),
(347, 'admin', '12', '3123', '2021-10-14 16:01:36', 0, 0, '', 0),
(348, 'admin', '12', '3123', '2021-10-14 16:01:46', 2, 0, '', 0),
(349, 'admin', '123', '123', '2021-10-14 16:14:42', 1, 0, '', 0),
(408, 'admin', '123123', '1213<br />\r\n123', '2021-11-03 11:07:03', 0, 0, '', 0),
(409, 'admin', '12323123123', '13123', '2021-11-03 11:08:22', 0, 0, '', 0),
(410, 'admin', '123123', '123', '2021-11-03 11:14:24', 0, 0, '', 0),
(411, 'admin', '123123(수정됨)', '12312', '2021-11-03 11:14:46', 1, 0, '', 1),
(412, 'admin', '123<br>(수정됨)', '5', '2021-11-03 11:14:59', 1, 0, '', 0),
(413, '비회원', '123', '123', '2021-11-03 11:24:17', 1, 0, '1234', 0),
(414, '비회원', '11', '1', '2021-11-03 11:25:16', 0, 0, '1234', 0),
(415, '비회원', '11', '1', '2021-11-03 11:25:16', 0, 0, '1234', 0),
(416, '비회원', '11', '11', '2021-11-03 11:32:44', 1, 0, '11', 0),
(447, '어드민', '13', '123', '2021-11-10 17:11:25', 0, 0, '', 1),
(448, '어드민', '11(수정됨)', '11', '2021-11-10 17:12:58', 1, 0, '', 4),
(450, '비회원', '산불조심1(수정됨)', '산불조심', '2021-11-10 17:41:18', 3, 0, '0080', 1),
(451, '비회원', '10111010010(수정됨)', 'q12312', '2021-11-11 10:01:38', 1, 0, '0012', 4),
(452, '비회원', 'PHP 코드 질문(수정됨)', '구라입니다', '2021-11-11 10:36:19', 2, 0, '0012', 2),
(453, '히힛', '원숭이 박제', '123', '2021-11-11 10:38:35', 2, 0, '', 4),
(455, '어드민', '공지입니다', '구라입니다', '2021-11-11 10:41:50', 10001, 0, '', 3),
(458, '어드민', '1213513', '135135', '2021-11-11 16:53:16', 0, 0, '', 1),
(459, '어드민', '212351251235135', '35153125151235', '2021-11-11 16:53:25', 1, 0, '', 1),
(460, '어드민', '12351235125', '1235125125', '2021-11-11 16:53:33', 0, 0, '', 1),
(461, '어드민', '121512351235135', '13513515135135', '2021-11-11 16:53:40', 1, 0, '', 1),
(462, '어드민', '12351251251235125135', '1325123513512351', '2021-11-11 16:53:49', 1, 0, '', 1),
(463, '어드민', '123512512341234123512', '1234123412341234', '2021-11-11 16:53:58', 2, 0, '', 1),
(464, '123', '124123412412412341', '12341341341241412341234', '2021-11-11 16:54:07', 1, 0, '', 1),
(465, '어드민', '히힛(수정됨)', '안농하세여 행님들', '2021-11-11 17:26:00', 3, 0, '', 3),
(467, '비회원', '312313', '12312313', '2021-11-17 13:57:06', 1, 0, '1111', 1),
(469, '비회원', '데이터 PHP 비회원1(수정됨)', '1', '2021-11-17 14:05:58', 2, 0, '0000', 1),
(470, '비회원', '데이터 토론 비회원', '1', '2021-11-17 14:06:13', 1, 0, '0000', 3),
(471, '비회원', '데이터 박제 비회원', '1234', '2021-11-17 14:06:33', 2, 0, '0000', 4),
(472, '1231131', '데이터 자유 회원(수정됨)', '11', '2021-11-17 14:08:54', 2, 0, '', 1),
(473, '1231131', '데이터 PHP 회원', '1', '2021-11-17 14:09:09', 1, 0, '', 2),
(474, '1231131', '데이터 토론 회원', '1', '2021-11-17 14:09:23', 1, 0, '', 3),
(475, '1231131', '데이터 박제 회원(수정됨)', '1', '2021-11-17 14:09:33', 1, 0, '', 1),
(476, '어드민', '공지(수정됨)', '공공제', '2021-11-17 14:22:17', 2, 1, '', 1),
(480, '어드민', '11', '11', '2021-11-17 17:05:01', 0, 0, '', 1),
(481, '어드민', '1', '1', '2021-11-17 17:44:45', 0, 0, '', 1),
(482, '어드민', 'ㄹㄹㄹㄹㄹㄹㄹㄹㄹㄹ', 'ㄹㄹㄹㄹㄹㄹㄹㄹ', '2021-11-17 18:08:17', 2, 0, '', 1);

-- --------------------------------------------------------

--
-- 테이블 구조 `notice_user`
--

CREATE TABLE `notice_user` (
  `userid` varchar(20) NOT NULL,
  `password` text NOT NULL,
  `username` varchar(10) NOT NULL,
  `gender` text NOT NULL,
  `age` int(3) NOT NULL,
  `birthday` text NOT NULL,
  `id` int(11) NOT NULL,
  `authority` int(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- 테이블의 덤프 데이터 `notice_user`
--

INSERT INTO `notice_user` (`userid`, `password`, `username`, `gender`, `age`, `birthday`, `id`, `authority`) VALUES
('13@13.com', '1234', '123511', '고자', 190, '2004-01-01', 23, 1),
('admin@admin.com', '1234', '어드민', '남자', 18, '2004-09-09', 24, 2),
('1@1.com', '12', 'ㅎ힛', '', 0, 'none-none-none', 25, 1),
('123@123.com', '123', '1', '', 0, 'none-none-none', 26, 1),
('qetqetqet@naver.com', 'rlagusals12', 'qetqet910', '남자', 18, '1903-09-none', 27, 1),
('1234@1234.com', '1234', '1234', '', 10, 'none-none-none', 28, 1),
('qetqet123@naver.com', '1234', '히힛', '', 0, 'none-none-none', 29, 1),
('qetqet910@gmail.com', 'zxc1208@', 'SoHot', '남자', 0, 'none-none-none', 30, 1),
('rlagusals0012@naver.', '12341234', '쿠루쿠', '', 0, 'none-none-none', 31, 1),
('qetqet910@naver.com', '1234', '1231131', '', 0, 'none-none-none', 32, 1);

--
-- 덤프된 테이블의 인덱스
--

--
-- 테이블의 인덱스 `notice_cate`
--
ALTER TABLE `notice_cate`
  ADD PRIMARY KEY (`id`);

--
-- 테이블의 인덱스 `notice_file`
--
ALTER TABLE `notice_file`
  ADD PRIMARY KEY (`id`);

--
-- 테이블의 인덱스 `notice_info`
--
ALTER TABLE `notice_info`
  ADD PRIMARY KEY (`id`);

--
-- 테이블의 인덱스 `notice_user`
--
ALTER TABLE `notice_user`
  ADD PRIMARY KEY (`id`);

--
-- 덤프된 테이블의 AUTO_INCREMENT
--

--
-- 테이블의 AUTO_INCREMENT `notice_cate`
--
ALTER TABLE `notice_cate`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;

--
-- 테이블의 AUTO_INCREMENT `notice_file`
--
ALTER TABLE `notice_file`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=83;

--
-- 테이블의 AUTO_INCREMENT `notice_info`
--
ALTER TABLE `notice_info`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=483;

--
-- 테이블의 AUTO_INCREMENT `notice_user`
--
ALTER TABLE `notice_user`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=33;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
