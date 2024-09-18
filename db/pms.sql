-- phpMyAdmin SQL Dump
-- version 4.5.0.2
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: Jan 01, 2019 at 10:11 AM
-- Server version: 10.0.17-MariaDB
-- PHP Version: 5.6.14

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `pms`
--

-- --------------------------------------------------------

--
-- Table structure for table `admin`
--

CREATE TABLE `admin` (
  `ID` int(255) NOT NULL,
  `FName` varchar(255) NOT NULL,
  `LName` varchar(255) NOT NULL,
  `uname` varchar(255) NOT NULL,
  `pass` varchar(255) NOT NULL,
  `rank` int(255) NOT NULL,
  `theme` varchar(50) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

--
-- Dumping data for table `admin`
--

INSERT INTO `admin` (`ID`, `FName`, `LName`, `uname`, `pass`, `rank`, `theme`) VALUES
(1, 'Admin', 'rahman', 'admin', 'e10adc3949ba59abbe56e057f20f883e', 1, 'united');

-- --------------------------------------------------------

--
-- Table structure for table `assign_user`
--

CREATE TABLE `assign_user` (
  `assign_user_id` int(11) NOT NULL,
  `project_id` int(11) DEFAULT NULL,
  `department_id` int(11) DEFAULT NULL,
  `user_id` int(11) DEFAULT NULL,
  `user_type` enum('1','2','3','4') DEFAULT '1' COMMENT '1=Admin;2=PM;3=Monitor;4=Moderator;',
  `created_by` int(11) DEFAULT NULL,
  `created` date DEFAULT NULL,
  `modified` date DEFAULT NULL,
  `is_active` int(11) DEFAULT NULL,
  `is_delete` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `contractor`
--

CREATE TABLE `contractor` (
  `contractor_id` int(11) NOT NULL,
  `fullname` varchar(50) DEFAULT NULL,
  `address` varchar(150) DEFAULT NULL,
  `phone` varchar(20) DEFAULT NULL,
  `image` varchar(150) DEFAULT NULL,
  `created_by` int(11) DEFAULT NULL,
  `created` date DEFAULT NULL,
  `modified` date DEFAULT NULL,
  `is_delete` tinyint(1) DEFAULT '0',
  `is_active` tinyint(1) DEFAULT '1',
  `email` varchar(150) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `contractor`
--

INSERT INTO `contractor` (`contractor_id`, `fullname`, `address`, `phone`, `image`, `created_by`, `created`, `modified`, `is_delete`, `is_active`, `email`) VALUES
(1, 'Mr James', 'Mirpur,Dhaka', '01920933650', NULL, 1, '2018-12-19', NULL, 1, 0, 'khan@gmail.com'),
(2, 'Md Alauddin', 'Mirpur,Dhaka', '019209336504555', NULL, 1, '2018-12-19', '2018-12-19', 1, 0, 'alauddin1@4axiz.com'),
(3, 'Md Alauddin', 'Mirpur,Dhaka', '019209336505', NULL, 1, '2018-12-19', '2018-12-26', 0, 1, 'alauddin@4axiz.com'),
(4, 'Md Alauddin', 'Mirpur,Dhaka', '019209336504555', NULL, 1, '2018-12-19', NULL, 1, 0, 'faisal@4axiz.com');

-- --------------------------------------------------------

--
-- Table structure for table `currencies`
--

CREATE TABLE `currencies` (
  `currencies_id` int(11) NOT NULL,
  `title` varchar(32) COLLATE utf8_unicode_ci NOT NULL DEFAULT '',
  `code` char(3) COLLATE utf8_unicode_ci NOT NULL DEFAULT '',
  `symbol_left` varchar(24) COLLATE utf8_unicode_ci DEFAULT NULL,
  `symbol_right` varchar(24) COLLATE utf8_unicode_ci DEFAULT NULL,
  `decimal_point` char(1) COLLATE utf8_unicode_ci DEFAULT NULL,
  `thousands_point` char(1) COLLATE utf8_unicode_ci DEFAULT NULL,
  `decimal_places` char(1) COLLATE utf8_unicode_ci DEFAULT NULL,
  `decimal_precise` char(1) COLLATE utf8_unicode_ci NOT NULL DEFAULT '2',
  `value` float(13,8) DEFAULT NULL,
  `last_updated` datetime DEFAULT NULL,
  `is_delete` tinyint(1) DEFAULT '0',
  `is_active` tinyint(1) DEFAULT '1'
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `currencies`
--

INSERT INTO `currencies` (`currencies_id`, `title`, `code`, `symbol_left`, `symbol_right`, `decimal_point`, `thousands_point`, `decimal_places`, `decimal_precise`, `value`, `last_updated`, `is_delete`, `is_active`) VALUES
(1, 'US Dollar', 'USD', '$', '', '.', ',', '2', '2', 0.01200000, '2018-12-16 04:22:25', 0, 1),
(2, 'Euro', 'EUR', '€', 'EUR', '.', ',', '2', '2', 0.01100000, '2018-12-16 04:22:25', 0, 1),
(3, 'MYR', 'MYR', 'RM', '', '.', ',', '2', '2', 0.05000000, '2018-12-16 04:22:25', 0, 1),
(4, 'TAKA', 'BDT', '৳', '/=', '.', ',', '2', '2', 1.00000000, '2018-12-16 15:34:15', 0, 1);

-- --------------------------------------------------------

--
-- Table structure for table `department`
--

CREATE TABLE `department` (
  `dept_id` int(11) NOT NULL,
  `dept_name` varchar(255) DEFAULT NULL,
  `dept_value` double DEFAULT NULL,
  `project_id` int(11) DEFAULT NULL,
  `created_by` int(11) DEFAULT NULL,
  `created` date DEFAULT NULL,
  `modified` date DEFAULT NULL,
  `is_delete` int(11) DEFAULT '0',
  `is_active` int(11) DEFAULT '1',
  `progress` float DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `department_task`
--

CREATE TABLE `department_task` (
  `dept_task_id` int(11) NOT NULL,
  `task_id` int(11) DEFAULT NULL,
  `dept_id` int(11) DEFAULT NULL,
  `project_id` int(11) DEFAULT NULL,
  `created_by` int(11) DEFAULT NULL,
  `created` date DEFAULT NULL,
  `modified` date DEFAULT NULL,
  `percentage` float DEFAULT NULL,
  `start_date` date DEFAULT NULL,
  `end_date` date DEFAULT NULL,
  `moderator` int(11) DEFAULT NULL,
  `critical_task` enum('No','Yes') DEFAULT 'No',
  `status` enum('incomplete','complete','reset') DEFAULT 'incomplete'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `projects`
--

CREATE TABLE `projects` (
  `project_id` int(11) NOT NULL,
  `project_name` varchar(255) NOT NULL,
  `package_no` varchar(30) DEFAULT NULL,
  `project_owner` int(11) DEFAULT NULL,
  `country` varchar(20) DEFAULT NULL,
  `division` varchar(20) DEFAULT NULL,
  `district` varchar(20) DEFAULT NULL,
  `zone` varchar(20) DEFAULT NULL,
  `type` varchar(20) DEFAULT NULL,
  `contractor` int(11) DEFAULT NULL,
  `contract_date` date DEFAULT NULL,
  `execution_start_date` date DEFAULT NULL,
  `construction_time` varchar(10) DEFAULT NULL,
  `handover_date` date DEFAULT NULL,
  `scheduled_completion_date` date DEFAULT NULL,
  `actual_completion_date` date DEFAULT NULL,
  `equivalent_currency` int(11) DEFAULT NULL,
  `project_value` double DEFAULT NULL,
  `created_by` int(11) DEFAULT NULL,
  `is_delete` tinyint(1) DEFAULT '0',
  `created` date DEFAULT NULL,
  `modified` date DEFAULT NULL,
  `is_active` tinyint(1) DEFAULT '1',
  `currency_rate` float DEFAULT NULL,
  `progress` float DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `projects`
--

INSERT INTO `projects` (`project_id`, `project_name`, `package_no`, `project_owner`, `country`, `division`, `district`, `zone`, `type`, `contractor`, `contract_date`, `execution_start_date`, `construction_time`, `handover_date`, `scheduled_completion_date`, `actual_completion_date`, `equivalent_currency`, `project_value`, `created_by`, `is_delete`, `created`, `modified`, `is_active`, `currency_rate`, `progress`) VALUES
(1, 'test', 'P-1', 3, '1', 'Dhaka', 'Dhaka', 'Dhaka', 'test', 3, '1970-01-01', '1970-01-01', '2', '1970-01-01', '1970-01-01', '1970-01-01', 1, 1000, 1, 1, '2018-12-27', NULL, 0, NULL, NULL),
(2, 'Test1', 'P-1', 3, '1', 'Dhaka', 'Dhaka', 'Dhaka', 'test', 3, '1970-01-01', '1970-01-01', '3', '1970-01-01', '1970-01-01', '1970-01-01', 4, 1000, 1, 1, '2018-12-27', NULL, 0, NULL, NULL),
(3, 'Lalbag Project', '234', 5, 'Bangladesh', 'Dhaka', 'Manikganj', 'Manikganj', 'test', 3, '1970-01-01', '1970-01-01', '365', '1970-01-01', '1970-01-01', '1970-01-01', 1, 1000, 1, 0, '2019-01-01', NULL, 1, NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `project_currency`
--

CREATE TABLE `project_currency` (
  `project_currency_id` int(11) NOT NULL,
  `project_id` int(11) DEFAULT NULL,
  `currency_id` int(11) DEFAULT NULL,
  `created_by` int(11) DEFAULT NULL,
  `created` date DEFAULT NULL,
  `modified` date DEFAULT NULL,
  `currency_rate` float DEFAULT NULL,
  `equivalant_value` float DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `project_currency`
--

INSERT INTO `project_currency` (`project_currency_id`, `project_id`, `currency_id`, `created_by`, `created`, `modified`, `currency_rate`, `equivalant_value`) VALUES
(1, 1, 4, 1, '2018-12-27', NULL, 80, 80000),
(2, 1, 3, 1, '2018-12-27', NULL, 70, 70000),
(3, 2, 4, 1, '2018-12-27', NULL, 80, 80000),
(4, 2, 3, 1, '2018-12-27', NULL, 70, 70000),
(5, 3, 4, 1, '2019-01-01', NULL, 80, 80000);

-- --------------------------------------------------------

--
-- Table structure for table `project_owner`
--

CREATE TABLE `project_owner` (
  `project_owner_id` int(11) NOT NULL,
  `fullname` varchar(50) DEFAULT NULL,
  `address` varchar(150) DEFAULT NULL,
  `phone` varchar(20) DEFAULT NULL,
  `image` varchar(150) DEFAULT NULL,
  `created_by` int(11) DEFAULT NULL,
  `created` date DEFAULT NULL,
  `modified` date DEFAULT NULL,
  `is_delete` tinyint(1) DEFAULT '0',
  `is_active` tinyint(1) DEFAULT '1',
  `email` varchar(150) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `project_owner`
--

INSERT INTO `project_owner` (`project_owner_id`, `fullname`, `address`, `phone`, `image`, `created_by`, `created`, `modified`, `is_delete`, `is_active`, `email`) VALUES
(1, 'Md Alauddin23', 'Mirpur,Dhaka', '019209336504555', NULL, 1, '2018-12-19', '2018-12-19', 1, 0, 'alauddin@4axiz.com'),
(2, 'Md Alauddin', 'Mirpur,Dhaka', '019209336504555', NULL, 1, '2018-12-19', NULL, 1, 0, 'alauddin1@4axiz.com'),
(3, 'Md Alauddin', 'Mirpur,Dhaka', '0192093365045556778', NULL, 1, '2018-12-19', '2018-12-23', 0, 1, 'alauddin@4axiz.com'),
(4, 'Md Alauddin', 'Mirpur,Dhaka', '01920933650', NULL, 1, '2018-12-23', NULL, 1, 0, 'alauddin@4axiz.com'),
(5, 'Mr James', 'Manikganj', '3455', NULL, 1, '2018-12-24', '2018-12-26', 0, 1, 'baker@gmail.com'),
(6, NULL, NULL, NULL, NULL, 1, '2018-12-26', NULL, 1, 0, NULL),
(7, NULL, NULL, NULL, NULL, 1, '2018-12-26', NULL, 1, 0, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `project_status`
--

CREATE TABLE `project_status` (
  `status_id` int(11) NOT NULL,
  `status_name` varchar(255) DEFAULT NULL,
  `dept_id` int(11) DEFAULT NULL,
  `project_id` int(11) DEFAULT NULL,
  `created_by` int(11) DEFAULT NULL,
  `created` date DEFAULT NULL,
  `modified` date DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `setting`
--

CREATE TABLE `setting` (
  `fieldoption` varchar(100) NOT NULL,
  `value` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `setting`
--

INSERT INTO `setting` (`fieldoption`, `value`) VALUES
('address', '4th Floor, House No # 589, Road No# 09, Avenue 04, Mirpur DOHS, Mirpur-12, Dhaka-1216.'),
('email', 'shaheen@4axiz.com'),
('facebook', '0'),
('footer', 'Copyright &copy; 4axiz IT Ltd'),
('phone', '01841552567'),
('photo', '533a1e0606ba5691a0a31a3a0e801270c8331001614ee20d304ef74df467fe2298a64e3e58cd99ce267e482a58bda24ab792c55405dbaacb9aa9251fdef6ffe2.png'),
('title', 'Power China Hubei Electric Engineering Corporation'),
('twitter', '0'),
('youtube', '0');

-- --------------------------------------------------------

--
-- Table structure for table `task`
--

CREATE TABLE `task` (
  `task_id` int(11) NOT NULL,
  `project_id` int(11) DEFAULT NULL,
  `parent_task_id` int(11) DEFAULT NULL,
  `sub_task_id` int(11) DEFAULT NULL,
  `task_name` varchar(255) DEFAULT NULL,
  `origin` varchar(120) DEFAULT NULL,
  `unit` varchar(120) DEFAULT NULL,
  `quantity` float DEFAULT NULL,
  `task_value` float DEFAULT NULL,
  `created_by` int(11) DEFAULT NULL,
  `created` date DEFAULT NULL,
  `modified` date DEFAULT NULL,
  `is_active` tinyint(1) DEFAULT '1',
  `is_delete` tinyint(1) DEFAULT '0',
  `status` enum('ongoing','completed') DEFAULT 'ongoing',
  `progress` float DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `task`
--

INSERT INTO `task` (`task_id`, `project_id`, `parent_task_id`, `sub_task_id`, `task_name`, `origin`, `unit`, `quantity`, `task_value`, `created_by`, `created`, `modified`, `is_active`, `is_delete`, `status`, `progress`) VALUES
(1, 3, NULL, NULL, 'test', 'Bangladesh', 'set', 2, 3456, 1, '2019-01-01', NULL, 1, 0, 'ongoing', NULL),
(2, 3, NULL, NULL, 'test1', 'Bangladesh', 'set1', 3, 545, 1, '2019-01-01', NULL, 1, 0, 'ongoing', NULL),
(3, 3, 1, NULL, 'test sub task', 'Bangladesh', 'set', 1, 23, 1, '2019-01-01', NULL, 1, 0, 'ongoing', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `task_comment`
--

CREATE TABLE `task_comment` (
  `comment_id` int(11) NOT NULL,
  `project_id` int(11) DEFAULT NULL,
  `task_id` int(11) DEFAULT NULL,
  `comment` varchar(255) DEFAULT NULL,
  `created` date DEFAULT NULL,
  `created_by` int(11) DEFAULT NULL,
  `modified` date DEFAULT NULL,
  `is_delete` int(11) DEFAULT NULL,
  `is_active` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `task_currency`
--

CREATE TABLE `task_currency` (
  `task_currency_id` int(11) NOT NULL,
  `project_id` int(11) DEFAULT NULL,
  `task_id` int(11) DEFAULT NULL,
  `currency_id` int(11) DEFAULT NULL,
  `equivalant_value` float DEFAULT NULL,
  `created_by` int(11) DEFAULT NULL,
  `created` date DEFAULT NULL,
  `modified` date DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `task_file`
--

CREATE TABLE `task_file` (
  `file_id` int(11) NOT NULL,
  `project_id` int(11) DEFAULT NULL,
  `task_id` int(11) DEFAULT NULL,
  `file_name` varchar(255) DEFAULT NULL,
  `created` date DEFAULT NULL,
  `created_by` int(11) DEFAULT NULL,
  `modified` date DEFAULT NULL,
  `is_delete` int(11) DEFAULT NULL,
  `is_active` int(11) DEFAULT NULL,
  `status` enum('Active','Reset') DEFAULT 'Active'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `task_risk_lavel`
--

CREATE TABLE `task_risk_lavel` (
  `task_risk_id` int(11) NOT NULL,
  `dept_task_id` int(11) DEFAULT NULL,
  `rist_lavel` enum('Critical','High','Moderate','Low') DEFAULT 'Critical',
  `above` float DEFAULT NULL,
  `below` float DEFAULT NULL,
  `created` date DEFAULT NULL,
  `created_by` int(11) DEFAULT NULL,
  `modified_by` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `user_id` int(11) NOT NULL,
  `username` varchar(20) NOT NULL,
  `fullname` varchar(50) DEFAULT NULL,
  `dob` date DEFAULT NULL,
  `joining_date` date DEFAULT NULL,
  `designation` varchar(30) DEFAULT NULL,
  `address` varchar(150) DEFAULT NULL,
  `phone` varchar(20) DEFAULT NULL,
  `image` varchar(150) DEFAULT NULL,
  `usertype` enum('Admin','User') DEFAULT 'User',
  `password` varchar(255) DEFAULT NULL,
  `created_by` int(11) DEFAULT NULL,
  `modified` date DEFAULT NULL,
  `created` date DEFAULT NULL,
  `is_delete` tinyint(1) DEFAULT '0',
  `is_active` tinyint(1) DEFAULT '1',
  `email` varchar(50) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`user_id`, `username`, `fullname`, `dob`, `joining_date`, `designation`, `address`, `phone`, `image`, `usertype`, `password`, `created_by`, `modified`, `created`, `is_delete`, `is_active`, `email`) VALUES
(1, 'admin', 'Md Alauddin', NULL, NULL, 'Senior Software Engineer', NULL, '01920933650', NULL, 'Admin', 'e10adc3949ba59abbe56e057f20f883e', NULL, NULL, NULL, 0, 1, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `user_activity`
--

CREATE TABLE `user_activity` (
  `id` int(11) NOT NULL,
  `user_id` int(11) DEFAULT NULL,
  `section` varchar(255) DEFAULT NULL,
  `activity` text,
  `date` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `user_activity`
--

INSERT INTO `user_activity` (`id`, `user_id`, `section`, `activity`, `date`) VALUES
(1, 1, 'Login', 'Login Successfull', '2018-12-08 18:12:43'),
(2, 1, 'Logout', 'Logout Successfull', '2018-12-08 18:13:39'),
(3, 1, 'Login', 'Login Successfull', '2018-12-08 18:13:50'),
(4, 1, 'Login', 'Login Successfull', '2018-12-12 10:39:10'),
(5, 1, 'Logout', 'Logout Successfull', '2018-12-12 10:44:48'),
(6, 1, 'Login', 'Login Successfull', '2018-12-12 10:44:53');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admin`
--
ALTER TABLE `admin`
  ADD PRIMARY KEY (`ID`),
  ADD UNIQUE KEY `uname` (`uname`) USING BTREE;

--
-- Indexes for table `assign_user`
--
ALTER TABLE `assign_user`
  ADD PRIMARY KEY (`assign_user_id`);

--
-- Indexes for table `contractor`
--
ALTER TABLE `contractor`
  ADD PRIMARY KEY (`contractor_id`);

--
-- Indexes for table `currencies`
--
ALTER TABLE `currencies`
  ADD PRIMARY KEY (`currencies_id`);

--
-- Indexes for table `department`
--
ALTER TABLE `department`
  ADD PRIMARY KEY (`dept_id`);

--
-- Indexes for table `department_task`
--
ALTER TABLE `department_task`
  ADD PRIMARY KEY (`dept_task_id`);

--
-- Indexes for table `projects`
--
ALTER TABLE `projects`
  ADD PRIMARY KEY (`project_id`);

--
-- Indexes for table `project_currency`
--
ALTER TABLE `project_currency`
  ADD PRIMARY KEY (`project_currency_id`);

--
-- Indexes for table `project_owner`
--
ALTER TABLE `project_owner`
  ADD PRIMARY KEY (`project_owner_id`);

--
-- Indexes for table `project_status`
--
ALTER TABLE `project_status`
  ADD PRIMARY KEY (`status_id`);

--
-- Indexes for table `setting`
--
ALTER TABLE `setting`
  ADD PRIMARY KEY (`fieldoption`);

--
-- Indexes for table `task`
--
ALTER TABLE `task`
  ADD PRIMARY KEY (`task_id`);

--
-- Indexes for table `task_comment`
--
ALTER TABLE `task_comment`
  ADD PRIMARY KEY (`comment_id`);

--
-- Indexes for table `task_currency`
--
ALTER TABLE `task_currency`
  ADD PRIMARY KEY (`task_currency_id`);

--
-- Indexes for table `task_file`
--
ALTER TABLE `task_file`
  ADD PRIMARY KEY (`file_id`);

--
-- Indexes for table `task_risk_lavel`
--
ALTER TABLE `task_risk_lavel`
  ADD PRIMARY KEY (`task_risk_id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`user_id`);

--
-- Indexes for table `user_activity`
--
ALTER TABLE `user_activity`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `admin`
--
ALTER TABLE `admin`
  MODIFY `ID` int(255) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT for table `assign_user`
--
ALTER TABLE `assign_user`
  MODIFY `assign_user_id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `contractor`
--
ALTER TABLE `contractor`
  MODIFY `contractor_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
--
-- AUTO_INCREMENT for table `currencies`
--
ALTER TABLE `currencies`
  MODIFY `currencies_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
--
-- AUTO_INCREMENT for table `department`
--
ALTER TABLE `department`
  MODIFY `dept_id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `department_task`
--
ALTER TABLE `department_task`
  MODIFY `dept_task_id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `projects`
--
ALTER TABLE `projects`
  MODIFY `project_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
--
-- AUTO_INCREMENT for table `project_currency`
--
ALTER TABLE `project_currency`
  MODIFY `project_currency_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;
--
-- AUTO_INCREMENT for table `project_owner`
--
ALTER TABLE `project_owner`
  MODIFY `project_owner_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;
--
-- AUTO_INCREMENT for table `project_status`
--
ALTER TABLE `project_status`
  MODIFY `status_id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `task`
--
ALTER TABLE `task`
  MODIFY `task_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
--
-- AUTO_INCREMENT for table `task_comment`
--
ALTER TABLE `task_comment`
  MODIFY `comment_id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `task_currency`
--
ALTER TABLE `task_currency`
  MODIFY `task_currency_id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `task_file`
--
ALTER TABLE `task_file`
  MODIFY `file_id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `task_risk_lavel`
--
ALTER TABLE `task_risk_lavel`
  MODIFY `task_risk_id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `user_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT for table `user_activity`
--
ALTER TABLE `user_activity`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
