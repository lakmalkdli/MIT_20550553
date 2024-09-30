-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1:3306
-- Generation Time: Sep 30, 2024 at 07:01 AM
-- Server version: 10.4.28-MariaDB
-- PHP Version: 8.2.4

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `itformmanagement`
--

-- --------------------------------------------------------

--
-- Table structure for table `departmentmaster`
--

CREATE TABLE `departmentmaster` (
  `id` int(11) NOT NULL,
  `name` varchar(100) NOT NULL,
  `status` varchar(1) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `departmentmaster`
--

INSERT INTO `departmentmaster` (`id`, `name`, `status`) VALUES
(1, 'Internet Banking', '1'),
(2, 'General Applications', '1'),
(3, 'Core Bank Development', '0'),
(4, 'IT Security', '1'),
(5, 'Network', '1'),
(6, 'Technical Team', '1'),
(7, 'ATM', '1'),
(8, 'QA', '1'),
(9, 'Product Development', '1'),
(10, 'Card Center', '1');

-- --------------------------------------------------------

--
-- Table structure for table `designationmaster`
--

CREATE TABLE `designationmaster` (
  `desig_id` int(11) NOT NULL,
  `desig_name` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `designationmaster`
--

INSERT INTO `designationmaster` (`desig_id`, `desig_name`) VALUES
(1, 'Executive Officer'),
(2, 'Assistant Manager'),
(3, 'Manager'),
(4, 'Chief Manager'),
(5, 'AGM'),
(6, 'Intern');

-- --------------------------------------------------------

--
-- Table structure for table `firewallrequestmaster`
--

CREATE TABLE `firewallrequestmaster` (
  `req_id` int(11) NOT NULL,
  `staffmember` varchar(100) NOT NULL,
  `pfno` varchar(20) NOT NULL,
  `email` varchar(100) NOT NULL,
  `mobile` int(11) NOT NULL,
  `extention` int(11) NOT NULL,
  `date` date DEFAULT current_timestamp(),
  `department` varchar(50) NOT NULL,
  `position` int(11) NOT NULL,
  `typeofchange` varchar(100) NOT NULL,
  `category` varchar(50) NOT NULL,
  `effectdate` date DEFAULT current_timestamp(),
  `expiredate` date DEFAULT current_timestamp(),
  `explanation` varchar(200) NOT NULL,
  `source` varchar(50) DEFAULT NULL,
  `destination` varchar(50) DEFAULT NULL,
  `protocol` varchar(200) DEFAULT NULL,
  `ports` varchar(500) DEFAULT NULL,
  `direction` varchar(50) DEFAULT NULL,
  `action` varchar(20) DEFAULT NULL,
  `userid` int(11) DEFAULT 0,
  `approvedby` varchar(100) DEFAULT NULL,
  `net_exe_date` date NOT NULL DEFAULT current_timestamp(),
  `mng_apr` int(10) NOT NULL DEFAULT 0 COMMENT '0-pending\r\n1-approve\r\n2-reject',
  `mng_apr_date` date NOT NULL DEFAULT current_timestamp(),
  `sec_apr` int(10) NOT NULL DEFAULT 0 COMMENT '0-pending\r\n1-approve\r\n2-reject',
  `auth_by` int(11) NOT NULL DEFAULT 0,
  `sec_apr_date` datetime NOT NULL DEFAULT current_timestamp(),
  `managercommnt` varchar(250) NOT NULL,
  `itseccomment` varchar(100) NOT NULL,
  `isntwrkdeployed` int(10) NOT NULL COMMENT '0-pending\r\n1-approve\r\n2-reject',
  `apply_by` int(11) NOT NULL DEFAULT 0,
  `itsecnetwrkcmapp` varchar(100) NOT NULL,
  `loged_user` int(11) NOT NULL DEFAULT 0,
  `CritiLevel` int(11) NOT NULL DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `firewallrequestmaster`
--

INSERT INTO `firewallrequestmaster` (`req_id`, `staffmember`, `pfno`, `email`, `mobile`, `extention`, `date`, `department`, `position`, `typeofchange`, `category`, `effectdate`, `expiredate`, `explanation`, `source`, `destination`, `protocol`, `ports`, `direction`, `action`, `userid`, `approvedby`, `net_exe_date`, `mng_apr`, `mng_apr_date`, `sec_apr`, `auth_by`, `sec_apr_date`, `managercommnt`, `itseccomment`, `isntwrkdeployed`, `apply_by`, `itsecnetwrkcmapp`, `loged_user`, `CritiLevel`) VALUES
(1, 'Mihirini', '207392', 'mihirinib@boc.lk', 776028310, 13561, '2024-03-17', '1', 2, 'Add', 'Permanent', '2024-03-17', '2024-03-31', '', '172.20.106.216', '172.23.32.9', 'TCP', '22(SSH)', 'uni-dir', 'permit', 2, 'IT', '0000-00-00', 0, '2024-03-19', 0, 0, '2024-03-19 04:13:40', '', '', 0, 0, '', 0, 0),
(2, 'Mihirini', '207392', 'mihirinib@boc.lk', 776028310, 13561, '2024-03-17', '1', 2, 'Add', 'Permanent', '2024-03-17', '2024-03-17', 'Communicate with ICBS Server', '172.20.106.229', '172.23.32.9', 'TCP', '22', 'uni-dir', 'permit', 2, '0', '0000-00-00', 0, '2024-03-20', 0, 0, '2024-03-19 04:50:06', '', '', 0, 0, '', 1, 0),
(3, 'Mihirini', '207392', 'mihirinib@boc.lk', 776028310, 13561, '2024-03-18', '1', 2, 'Add', 'Test/Temp', '2024-03-18', '2024-03-19', 'Communicate with ICBS', '172.20.106.236', '172.23.32.9', 'TCP', '22', 'uni-dir', 'permit', 2, '0', '0000-00-00', 0, '2024-03-19', 0, 0, '2024-03-19 04:55:05', '', '', 0, 0, '', 2, 0),
(4, 'Mihirini', '207392', 'mihirinib@boc.lk', 776028310, 13561, '2024-03-18', '1', 2, 'Add', 'Test/Temp', '2024-03-18', '2024-03-19', 'Access Rabbit mq', '172.20.106.216', '172.24.28.112', 'TCP', '5672', 'uni-dir', 'permit', 2, '0', '0000-00-00', 0, '2024-03-19', 0, 0, '2024-03-19 05:47:11', '', '', 0, 0, '', 2, 0),
(5, 'Mihirini', '207392', 'mihirinib@boc.lk', 776028310, 13561, '2024-03-19', '1', 2, 'Add', 'Test/Temp', '2024-03-19', '2024-03-31', 'Access to Rabbit MQ', '172.20.106.229', '172.24.28.112', 'TCP', '5672', 'bi-dir', 'permit', 2, '0', '0000-00-00', 0, '2024-03-19', 0, 0, '2024-03-19 08:37:46', '', '', 0, 0, '', 2, 0),
(6, 'Madushi', '207397', 'madushi@boc.lk', 776028315, 3562, '2024-03-19', '2', 2, 'Add', 'Test/Temp', '2024-03-19', '2024-03-25', 'Remote connect to SQL server', '172.20.106.216', '172.24.28.112', 'TCP', '1433\n1434', 'uni-dir', 'permit', 7, '1', '2024-03-22', 1, '2024-03-20', 1, 1, '2024-03-20 00:00:00', 'Details Are correct', 'No Risk', 1, 14, 'Complete', 14, 0),
(7, 'Madushi', '207397', 'madushi@boc.lk', 776028315, 3562, '2024-03-19', '2', 2, 'Add', 'Permanent', '2024-03-19', '2024-03-25', 'Remote Connect to the SQL Server', '172.20.106.229', '172.24.28.112', 'UDP', '1433\n1434', 'uni-dir', 'permit', 7, '0', '0000-00-00', 0, '2024-03-19', 0, 0, '2024-03-19 10:22:12', '', '', 0, 0, '', 7, 0),
(8, 'Madushi', '207397', 'madushi@boc.lk', 776028315, 3562, '2024-03-20', '2', 2, 'Add', 'Test/Temp', '2024-03-20', '2024-03-22', 'RDP', '172.20.106.159', '172.24.28.131', 'TCP', '3389', 'uni-dir', 'permit', 7, '1', '2024-03-20', 2, '2024-03-20', 0, 0, '2024-03-20 20:35:39', 'Explanation Unclear', '', 0, 0, '', 7, 0),
(9, 'Madushi', '207397', 'madushi@boc.lk', 776028315, 3562, '2024-03-20', '2', 2, 'Add', 'Test/Temp', '2024-03-20', '2024-03-22', 'To Get Remote Desktop Connection For Development', '172.20.106.159', '172.24.28.131', 'TCP', '3389', 'uni-dir', 'permit', 7, '9', '2024-03-20', 1, '2024-03-22', 1, 10, '2024-03-22 00:00:00', 'Details are correct', 'Do the need full', 0, 0, '', 10, 0),
(10, 'Madushi', '207397', 'madushi@boc.lk', 776028315, 3562, '2024-03-20', '2', 2, 'Add', 'Permanent', '2024-03-20', '2024-03-22', 'RDP', '172.20.106.224', '172.24.28.132', 'TCP', '3389', 'uni-dir', 'permit', 7, '1', '2024-03-20', 2, '2024-03-20', 0, 0, '2024-03-20 20:44:32', 'Please give detailed Explanation', '', 0, 0, '', 1, 0),
(11, 'Madushi', '207397', 'madushi@boc.lk', 776028315, 3562, '2024-03-20', '2', 2, 'Add', 'Test/Temp', '2024-03-20', '2024-03-25', 'Enable debugging for DB2', '172.20.106.216', '172.23.28.44', 'TCP', '4554\n4555', 'uni-dir', 'permit', 7, '0', '2024-03-20', 0, '2024-03-20', 0, 0, '2024-03-20 23:25:37', '', '', 0, 0, '', 7, 0),
(12, 'Madushi', '207397', 'madushi@boc.lk', 776028315, 3562, '2024-03-20', '2', 2, 'Add', 'Test/Temp', '2024-03-20', '2024-03-25', 'Enable debugging for DB2', '172.20.106.229', '172.23.28.44', 'TCP', '4554\n4555', 'uni-dir', 'permit', 7, '0', '2024-03-20', 0, '2024-03-20', 0, 0, '2024-03-20 23:27:05', '', '', 0, 0, '', 7, 0),
(13, 'Madushi', '207397', 'madushi@boc.lk', 776028315, 3562, '2024-03-20', '2', 2, 'Add', 'Test/Temp', '2024-03-20', '2024-03-25', 'Enable debugging for DB2', '172.20.106.232', '172.23.28.44', 'TCP', '4554', 'uni-dir', 'permit', 7, '9', '2024-03-20', 1, '2024-03-22', 1, 10, '2024-03-22 00:00:00', 'Check', 'Checked', 0, 0, '', 10, 0),
(14, 'Madushi', '207397', 'madushi@boc.lk', 776028315, 3562, '2024-03-20', '2', 2, 'Add', 'Permanent', '2024-03-20', '2024-04-25', 'Enable debugging for DB2', '172.20.106.236', '172.23.28.44', 'TCP', '4555\n4554', 'uni-dir', 'permit', 7, '1', '2024-03-20', 1, '2024-03-20', 0, 0, '2024-03-20 23:31:13', 'checked', '', 0, 0, '', 1, 0),
(15, 'Madushi', '207397', 'madushi@boc.lk', 776028315, 3562, '2024-03-21', '2', 2, 'Add', 'Test/Temp', '2024-03-21', '2024-03-25', '', '172.20.106.233', '172.23.32.9', 'TCP', '22(SSH)', 'uni-dir', 'permit', 7, '1', '2024-03-21', 1, '2024-03-20', 2, 1, '2024-03-20 00:00:00', 'OK', 'No explanation', 0, 0, '', 1, 0),
(16, 'Divanika', '207396', 'divanika@boc.lk', 776028314, 3562, '2024-03-22', '2', 2, 'Add', 'Test/Temp', '2024-03-22', '2024-03-25', 'RDP', '172.20.106.69', '172.24.28.131', 'TCP', '3389', 'uni-dir', 'permit', 6, '0', '2024-03-22', 0, '2024-03-22', 0, 0, '2024-03-22 13:54:58', '', '', 0, 0, '', 6, 0),
(17, 'Divanika', '207396', 'divanika@boc.lk', 776028314, 3562, '2024-03-22', '2', 2, 'Add', 'Test/Temp', '2024-03-22', '2024-03-25', 'RDP', '172.20.106.69', '172.24.28.131', 'UDP', '3389', 'uni-dir', 'permit', 6, '0', '2024-03-22', 0, '2024-03-22', 0, 0, '2024-03-22 13:55:53', '', '', 0, 0, '', 6, 0),
(18, 'Thilanga', '207395', 'thilanga@boc.lk', 776028313, 3562, '2024-03-22', '2', 2, 'Add', 'Permanent', '2024-03-22', '2025-03-25', 'Enable debugging for DB 2', '172.20.106.131', '172.23.28.44', 'TCP', '4554', 'uni-dir', 'permit', 5, '0', '2024-03-22', 0, '2024-03-22', 0, 0, '2024-03-22 13:57:35', '', '', 0, 0, '', 5, 0),
(19, 'Thilanga', '207395', 'thilanga@boc.lk', 776028313, 3562, '2024-03-22', '2', 2, 'Modify', 'Permanent', '2024-03-22', '2025-03-25', 'Enable debugging for DB 2', '172.20.106.131', '172.23.28.44', 'TCP', '4555', 'uni-dir', 'deny', 5, '0', '2024-03-22', 0, '2024-03-22', 0, 0, '2024-03-22 13:58:21', '', '', 0, 0, '', 5, 0),
(20, 'Divanika', '207396', 'divanika@boc.lk', 776028314, 3562, '2024-03-22', '2', 2, 'Add', 'Permanent', '2024-03-22', '2024-03-30', 'Vm Server', '172.20.106.232', '172.24.28.112', 'TCP', '1434', 'bi-dir', 'permit', 6, '0', '2024-03-22', 0, '2024-03-22', 0, 0, '2024-03-22 20:26:45', '', '', 0, 0, '', 6, 0),
(21, 'Madushi', '207397', 'madushi@boc.lk', 776028315, 3562, '2024-03-23', '2', 2, 'Add', 'Permanent', '2024-03-23', '2024-03-26', 'For Viva', '172.20.106.39', '172.20.8.16', 'UDP', '8012', 'bi-dir', 'permit', 7, '0', '2024-03-23', 0, '2024-03-23', 0, 0, '2024-03-23 08:33:23', '', '', 0, 0, '', 7, 0),
(22, 'Madushi', '207397', 'madushi@boc.lk', 776028315, 3562, '2024-03-23', '2', 2, 'Add', 'Permanent', '2024-03-23', '2024-03-26', 'For Viva', '172.20.106.39', '172.20.8.16', 'UDP', '8012', 'bi-dir', 'permit', 7, '0', '2024-03-23', 0, '2024-03-23', 0, 0, '2024-03-23 08:33:32', '', '', 0, 0, '', 7, 0),
(23, 'Madushi', '207397', 'madushi@boc.lk', 776028315, 3562, '2024-03-23', '2', 2, 'Add', 'Permanent', '2024-03-23', '2024-03-26', 'For Viva', '172.20.106.39', '172.20.8.16', 'UDP', '8012', 'bi-dir', 'permit', 7, '9', '2024-03-23', 1, '2024-03-23', 0, 0, '2024-03-23 08:33:42', 'Approve BY Man Issue Check 12.07', '', 0, 0, '', 9, 0),
(24, 'Madushi', '207397', 'madushi@boc.lk', 776028315, 3562, '2024-03-23', '2', 2, 'Add', 'Permanent', '2024-03-23', '2024-03-25', 'Viva 2', '172.20.106.159', '172.24.28.32', 'UDP', '8015', 'uni-dir', 'permit', 7, '0', '2024-03-23', 0, '2024-03-23', 0, 0, '2024-03-23 08:40:07', '', '', 0, 0, '', 7, 0),
(25, 'Madushi', '207397', 'madushi@boc.lk', 776028315, 3562, '2024-03-23', '2', 2, 'Modify', 'Permanent', '2024-03-23', '2024-03-24', 'VIVa 3', '172.20.106.169', '172.20.106.159', '8080', '553', 'uni-dir', 'permit', 7, '0', '2024-03-23', 0, '2024-03-23', 0, 0, '2024-03-23 08:44:42', '', '', 0, 0, '', 7, 0),
(26, 'Madushi', '207397', 'madushi@boc.lk', 776028315, 3562, '2024-03-23', '2', 2, 'Modify', 'Permanent', '2024-03-23', '2024-03-24', 'VIVa 3', '172.20.106.169', '172.20.106.159', '8080', '553', 'uni-dir', 'permit', 7, '0', '2024-03-23', 0, '2024-03-23', 0, 0, '2024-03-23 08:44:44', '', '', 0, 0, '', 7, 0),
(27, 'Madushi', '207397', 'madushi@boc.lk', 776028315, 3562, '2024-03-23', '2', 2, 'Modify', 'Permanent', '2024-03-23', '2024-03-24', 'VIVa 3', '172.20.106.169', '172.20.106.159', '8080', '553', 'uni-dir', 'permit', 7, '9', '2024-03-23', 0, '2024-03-23', 0, 0, '2024-03-23 08:44:50', 'approve by manager issue check', '', 0, 0, '', 9, 0),
(28, 'Lelum', '207391', 'lelumlakmal@boc.lk', 776028309, 13562, '2024-03-23', '2', 1, 'Add', 'Test/Temp', '2024-03-23', '2024-03-25', 'aaa', '172.20.106.259', '172.20.102.155', 'UDP', '08080', 'uni-dir', 'permit', 1, '0', '2024-03-23', 0, '2024-03-23', 0, 0, '2024-03-23 08:52:31', '', '', 0, 0, '', 1, 0),
(29, 'Lelum', '207391', 'lelumlakmal@boc.lk', 776028309, 13562, '2024-03-22', '2', 1, 'Modify', 'Permanent', '2024-03-23', '2024-03-25', 'ch viva 4', '172.20.106.159', '172.20.245.444', 'TCP', '8080', 'bi-dir', 'permit', 1, '0', '2024-03-23', 0, '2024-03-23', 0, 0, '2024-03-23 09:00:29', '', '', 0, 0, '', 1, 0),
(30, 'Lelum', '207391', 'lelumlakmal@boc.lk', 776028309, 13562, '2024-03-28', '2', 1, 'Add', 'Permanent', '2024-03-23', '2024-03-25', 'ch v', '172.20.106.555', '172.20.159.147', 'TCP', '8080', 'bi-dir', 'permit', 1, '0', '2024-03-23', 0, '2024-03-23', 0, 0, '2024-03-23 09:02:58', '', '', 0, 0, '', 1, 0),
(31, 'Lelum', '207391', 'lelumlakmal@boc.lk', 776028309, 13562, '2024-03-28', '2', 1, 'Add', 'Permanent', '2024-03-23', '2024-03-25', 'ch v', '172.20.106.555', '172.20.159.147', 'TCP', '8080', 'bi-dir', 'permit', 1, '0', '2024-03-23', 0, '2024-03-23', 0, 0, '2024-03-23 09:03:02', '', '', 0, 0, '', 1, 0),
(32, 'Madushi', '207397', 'madush@gmail.com', 776028315, 3562, '2024-03-23', '2', 2, 'Add', 'Permanent', '2024-03-23', '2024-03-25', 'Check Viva', '172.20.106.159', '172.20.8.32', 'TCP', '8005', 'uni-dir', 'permit', 7, '9', '2024-03-22', 1, '2024-03-22', 1, 10, '2024-03-22 00:00:00', 'Checked', 'ok', 1, 14, 'OK', 14, 0),
(33, 'Madushi', '207397', 'madushi@boc.lk', 776028315, 3562, '2024-03-23', '2', 2, 'Add', 'Permanent', '0000-00-00', '0000-00-00', 'Viva Fix error', '172.20.106.159', '172.20.8.32', 'TCP', '5050', 'bi-dir', 'permit', 7, '9', '2024-03-23', 1, '2024-03-23', 0, 0, '2024-03-23 10:45:15', 'approve error', '', 0, 0, '', 9, 0),
(34, 'Divanika', '207396', 'divanika@boc.lk', 776028314, 3562, '2024-03-23', '2', 2, 'Add', 'Permanent', '2024-03-23', '2024-03-24', 'aa', '172.20.106.159', '172.20.8.16', 'TCP', '222', 'bi-dir', 'permit', 6, '0', '2024-03-23', 0, '2024-03-23', 0, 0, '2024-03-23 11:01:04', '', '', 0, 0, '', 6, 2),
(35, 'Divanika', '207396', 'divanika@boc.lk', 776028314, 3562, '2024-03-23', '2', 2, 'Add', 'Permanent', '2024-03-23', '2024-03-24', 'Critical level2', '172.20.106.159', '172.20.8.32', 'tcp', 'x', 'bi-dir', 'permit', 6, '0', '2024-03-23', 0, '2024-03-23', 0, 0, '2024-03-23 11:04:16', '', '', 0, 0, '', 6, 1),
(36, 'Madushi', '207397', 'madushi@boc.lk', 776028315, 3562, '2024-03-23', '2', 2, 'Add', 'Permanent', '2024-03-23', '2024-03-24', 'Task 2', '172.20.156.33', '172.52.123.6', 'tcp', 'TCP', 'bi-dir', 'permit', 7, '0', '2024-03-23', 0, '2024-03-23', 0, 0, '2024-03-23 11:48:57', '', '', 0, 0, '', 7, 3),
(37, 'Madushi', '207397', 'madushi@boc.lk', 776028315, 3562, '0000-00-00', '2', 2, 'Modify', 'Test/Temp', '2024-03-23', '2024-03-25', 'task 2 ch2', '172.20.106.159', '172.45.65.58', 'TCP', '8080', 'bi-dir', 'permit', 7, '0', '2024-03-23', 0, '2024-03-23', 0, 0, '2024-03-23 11:50:07', '', '', 0, 0, '', 7, 3),
(38, 'Madushi', '207397', 'madushi@boc.lk', 776028315, 3562, '2024-03-23', '2', 2, 'Add', 'Permanent', '2024-03-23', '2024-03-25', 'Check task one', '172.20.106.159', '172.25.654.321', 'TCP', '8080', 'bi-dir', 'permit', 7, '0', '2024-03-23', 0, '2024-03-23', 0, 0, '2024-03-23 11:56:25', '', '', 0, 0, '', 7, 2),
(39, 'Madushi', '207397', 'madushi@boc.lk', 776028315, 3562, '2024-03-23', '2', 2, 'Modify', 'Test/Temp', '2024-03-23', '2024-03-24', 'Task one check 2', '172.20.059.23', '1.1.1.1', 'aa', '50', 'bi-dir', 'permit', 7, '0', '2024-03-23', 0, '2024-03-23', 0, 0, '2024-03-23 11:57:08', '', '', 0, 0, '', 7, 3),
(40, 'Madushi', '207397', 'madushi@boc.lk', 776028315, 3562, '2024-03-25', '2', 2, 'Add', 'Permanent', '2024-03-25', '2024-03-28', 'after viva', '172.20.106.159', '172.20.106.160', 'TCP', '5000', 'bi-dir', 'permit', 7, '0', '2024-03-25', 0, '2024-03-25', 0, 0, '2024-03-25 17:17:27', '', '', 0, 0, '', 7, 0);

--
-- Triggers `firewallrequestmaster`
--
DELIMITER $$
CREATE TRIGGER `AddFireWall` AFTER INSERT ON `firewallrequestmaster` FOR EACH ROW BEGIN 
INSERT INTO requestlog
(req_id,loged_usr,req_type)
	VALUES(NEW.req_id,NEW.loged_user,'FW_REQ');
    END
$$
DELIMITER ;
DELIMITER $$
CREATE TRIGGER `FireWallApp` AFTER UPDATE ON `firewallrequestmaster` FOR EACH ROW BEGIN 
INSERT INTO requestlog
(req_id,loged_usr,app_st,auth_status,exe_status,req_type)
	VALUES(NEW.req_id,NEW.loged_user,NEW.mng_apr,NEW.sec_apr,NEW.isntwrkdeployed,'FW_REQ');
    END
$$
DELIMITER ;

-- --------------------------------------------------------

--
-- Table structure for table `internetrequestmaster`
--

CREATE TABLE `internetrequestmaster` (
  `intreq_id` int(11) NOT NULL,
  `user_id` varchar(100) NOT NULL,
  `pfno` varchar(100) NOT NULL,
  `email` varchar(100) NOT NULL,
  `mobile` int(12) NOT NULL,
  `extention` int(12) NOT NULL,
  `req_date` date NOT NULL,
  `department` varchar(50) NOT NULL,
  `position` int(11) NOT NULL,
  `ip_address` varchar(50) NOT NULL,
  `access_type` varchar(50) NOT NULL,
  `category` varchar(50) NOT NULL,
  `effective_from` date NOT NULL,
  `expire_on` date NOT NULL,
  `purpose` varchar(500) NOT NULL,
  `managercomment` varchar(250) NOT NULL,
  `mng_apr_date` date NOT NULL DEFAULT current_timestamp(),
  `app_by` int(11) NOT NULL DEFAULT 0,
  `mstatus` int(2) NOT NULL DEFAULT 0 COMMENT '0-pending\r\n1-approve\r\n2-reject',
  `itsecstatus` int(2) NOT NULL DEFAULT 0 COMMENT '0-pending\r\n1-approve\r\n2-reject',
  `itseccomment` varchar(250) NOT NULL,
  `auth_by` int(11) NOT NULL DEFAULT 0,
  `sec_apr_date` date NOT NULL DEFAULT current_timestamp(),
  `isnetworkdeployed` int(2) NOT NULL DEFAULT 0 COMMENT '0-pending\r\n1-approve\r\n2-reject',
  `apply_by` int(11) NOT NULL DEFAULT 0,
  `netwrkcomment` varchar(255) NOT NULL,
  `net_exe_date` date NOT NULL DEFAULT current_timestamp(),
  `loged_user` int(11) NOT NULL DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `internetrequestmaster`
--

INSERT INTO `internetrequestmaster` (`intreq_id`, `user_id`, `pfno`, `email`, `mobile`, `extention`, `req_date`, `department`, `position`, `ip_address`, `access_type`, `category`, `effective_from`, `expire_on`, `purpose`, `managercomment`, `mng_apr_date`, `app_by`, `mstatus`, `itsecstatus`, `itseccomment`, `auth_by`, `sec_apr_date`, `isnetworkdeployed`, `apply_by`, `netwrkcomment`, `net_exe_date`, `loged_user`) VALUES
(1, '7', '207397', 'madushi@boc.lk', 776028315, 3562, '2024-03-19', '2', 2, '172.24.28.112', 'w_proxy', 'Test/Temp', '2024-03-19', '2024-03-25', 'Required Internet access to debugging process', 'Checked and approve.', '2024-03-22', 9, 1, 1, 'Complete', 15, '2024-03-22', 0, 0, '', '2024-03-19', 15),
(2, '7', '207397', 'madushi@boc.lk', 776028315, 3562, '2024-03-19', '2', 2, '172.20.106.31', 'f_internet', 'Permanent', '2024-03-19', '2024-03-31', 'For Developing purpose', 'Describe the Development', '2024-03-20', 1, 2, 0, '', 0, '2024-03-19', 0, 0, '', '2024-03-19', 1),
(3, '7', '207397', 'madushi@boc.lk', 776028315, 3562, '2024-03-19', '2', 2, '172.20.106.231', 'internet', 'Permanent', '2024-03-19', '2026-03-19', 'Laraval Development', 'details are correct', '2024-03-20', 1, 1, 0, '', 0, '2024-03-19', 0, 0, '', '2024-03-19', 1),
(4, '2', '207392', 'mihirinib@boc.lk', 776028310, 13561, '2024-03-20', '1', 2, '172.24.28.159', 'f_internet', 'Test/Temp', '2024-03-20', '2024-03-22', 'Update The OS', '', '2024-03-20', 0, 0, 0, '', 0, '2024-03-20', 0, 0, '', '2024-03-20', 2),
(5, '2', '207392', 'mihirinib@boc.lk', 776028310, 13561, '2024-03-20', '1', 2, '172.24.28.160', 'internet', 'Test/Temp', '2024-03-20', '2024-03-22', 'Download Lib', '', '2024-03-20', 0, 0, 0, '', 0, '2024-03-20', 0, 0, '', '2024-03-20', 2),
(6, '2', '207392', 'mihirinib@boc.lk', 776028310, 13561, '2024-03-20', '1', 2, '172.20.106.224', 'w_proxy', 'Test/Temp', '2024-03-20', '2024-03-31', 'Teams meetings', '', '2024-03-20', 0, 0, 0, '', 0, '2024-03-20', 0, 0, '', '2024-03-20', 2),
(7, '7', '207397', 'madushi@boc.lk', 776028315, 3562, '2024-03-20', '2', 2, '172.24.28.113', 'f_internet', 'Test/Temp', '2024-03-20', '2024-03-25', 'Install security patches', 'No manager comment. Have a risk', '2024-03-20', 1, 2, 0, '', 0, '2024-03-20', 0, 0, '', '2024-03-20', 1),
(8, '7', '207397', 'madushi@boc.lk', 776028315, 3562, '2024-03-21', '2', 2, '172.20.106.224', 'f_internet', 'Test/Temp', '2024-03-21', '2024-03-25', '', '', '2024-03-21', 0, 0, 0, '', 0, '2024-03-21', 0, 0, '', '2024-03-21', 7),
(9, '6', '207396', 'divanika@boc.lk', 776028314, 3562, '2024-03-22', '2', 2, '172.24.28.69', 'w_proxy', 'Test/Temp', '2024-03-22', '2024-03-24', 'Debugging process', '', '2024-03-22', 0, 0, 0, '', 0, '2024-03-22', 0, 0, '', '2024-03-22', 6),
(10, '6', '207396', 'divanika@boc.lk', 776028314, 3562, '2024-03-22', '2', 2, '172.24.28.135', 'w_proxy', 'Test/Temp', '2024-03-22', '2024-03-25', 'To Install drivers', '', '2024-03-22', 0, 0, 0, '', 0, '2024-03-22', 0, 0, '', '2024-03-22', 6),
(11, '7', '207397', 'madushi@boc.lk', 776028315, 3562, '2024-03-23', '2', 2, '172.20.6.159', 'w_proxy', 'Test/Temp', '2024-03-23', '2024-03-24', 'for Viva', '', '2024-03-23', 0, 0, 0, '', 0, '2024-03-23', 0, 0, '', '2024-03-23', 7),
(12, '7', '207397', 'madushi@boc.lk', 776028315, 3562, '2024-03-23', '2', 2, '172.20.6.159', 'w_proxy', 'Test/Temp', '2024-03-23', '2024-03-24', 'for Viva', '', '2024-03-23', 0, 0, 0, '', 0, '2024-03-23', 0, 0, '', '2024-03-23', 7),
(13, '1', '207391', 'lelumlakmal@boc.lk', 776028309, 13562, '2024-03-23', '2', 1, '172.20.106.159', 'w_proxy', 'Permanent', '2024-03-23', '2024-03-25', 'check viva', '', '2024-03-23', 0, 0, 0, '', 0, '2024-03-23', 0, 0, '', '2024-03-23', 1),
(14, '1', '207391', 'lelumlakmal@boc.lk', 776028309, 13562, '2024-03-23', '2', 1, '172.20.106.31', 'w_proxy', 'Permanent', '2024-03-23', '2024-03-25', 'Vi5', '', '2024-03-23', 0, 0, 0, '', 0, '2024-03-23', 0, 0, '', '2024-03-23', 1);

--
-- Triggers `internetrequestmaster`
--
DELIMITER $$
CREATE TRIGGER `AddIntReq` AFTER INSERT ON `internetrequestmaster` FOR EACH ROW BEGIN 
INSERT INTO requestlog
(req_id,loged_usr,req_type)
	VALUES(NEW.intreq_id,NEW.loged_user,'INT_REQ');
    END
$$
DELIMITER ;
DELIMITER $$
CREATE TRIGGER `Int_App` AFTER UPDATE ON `internetrequestmaster` FOR EACH ROW BEGIN 
INSERT INTO requestlog
(req_id,loged_usr,app_st,auth_status,exe_status,req_type)
	VALUES(NEW.intreq_id,NEW.loged_user,NEW.mstatus,NEW.itsecstatus,NEW.isnetworkdeployed,'INT_REQ');
    END
$$
DELIMITER ;

-- --------------------------------------------------------

--
-- Table structure for table `masteralterlog`
--

CREATE TABLE `masteralterlog` (
  `id` int(11) NOT NULL,
  `activity` varchar(255) NOT NULL,
  `is_pwchang` int(11) NOT NULL DEFAULT 0 COMMENT '1-no pwd chng\r\n2-pwd chng\r\n3-status chng',
  `u_id` int(11) NOT NULL,
  `date` datetime NOT NULL DEFAULT current_timestamp(),
  `mod_recid` int(11) NOT NULL,
  `read_st` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `masteralterlog`
--

INSERT INTO `masteralterlog` (`id`, `activity`, `is_pwchang`, `u_id`, `date`, `mod_recid`, `read_st`) VALUES
(1, 'ALT_USR', 0, 1, '2024-03-18 00:00:00', 1, 0),
(2, 'ALT_USR', 0, 1, '2024-03-18 00:00:00', 11, 0),
(3, 'ALT_USR', 0, 1, '2024-03-18 21:28:28', 2, 0),
(4, 'ALT_USR', 0, 1, '2024-03-18 21:29:30', 2, 0),
(5, 'ALT_USR', 0, 1, '2024-03-20 11:21:06', 14, 0),
(6, 'ALT_USR', 0, 1, '2024-03-22 09:29:55', 14, 0),
(7, 'ALT_USR', 2, 1, '2024-03-22 11:26:36', 15, 0),
(8, 'ALT_USR', 2, 1, '2024-03-22 13:32:32', 6, 0);

-- --------------------------------------------------------

--
-- Table structure for table `masterlog`
--

CREATE TABLE `masterlog` (
  `id` int(11) NOT NULL,
  `activity` varchar(255) NOT NULL,
  `rec_id` int(11) NOT NULL,
  `u_id` int(11) NOT NULL,
  `date` datetime NOT NULL DEFAULT current_timestamp(),
  `read_st` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `masterlog`
--

INSERT INTO `masterlog` (`id`, `activity`, `rec_id`, `u_id`, `date`, `read_st`) VALUES
(1, 'IN_USR', 1, 15, '2024-03-18 00:00:00', 0),
(2, 'IN_USR', 2, 1, '2024-03-18 00:00:00', 0),
(3, 'IN_USR', 3, 1, '2024-03-18 00:00:00', 0),
(4, 'IN_USR', 4, 1, '2024-03-18 00:00:00', 0),
(5, 'IN_USR', 5, 1, '2024-03-18 00:00:00', 0),
(6, 'IN_USR', 6, 1, '2024-03-18 00:00:00', 0),
(7, 'IN_USR', 7, 1, '2024-03-18 00:00:00', 0),
(8, 'IN_USR', 8, 1, '2024-03-18 00:00:00', 0),
(9, 'IN_USR', 9, 1, '2024-03-18 00:00:00', 0),
(10, 'IN_USR', 10, 1, '2024-03-18 00:00:00', 0),
(11, 'IN_USR', 11, 1, '2024-03-18 00:00:00', 0),
(12, 'IN_USR', 12, 1, '2024-03-18 00:00:00', 0),
(13, 'IN_USR', 13, 1, '2024-03-18 00:00:00', 0),
(14, 'IN_USR', 14, 1, '2024-03-18 00:00:00', 0),
(15, 'IN_USR', 15, 1, '2024-03-22 11:16:39', 0);

-- --------------------------------------------------------

--
-- Table structure for table `mastertransactionlog`
--

CREATE TABLE `mastertransactionlog` (
  `id` int(11) NOT NULL,
  `reqtyp` int(11) NOT NULL,
  `activity` varchar(255) NOT NULL,
  `u_id` int(11) NOT NULL,
  `date` date NOT NULL DEFAULT current_timestamp(),
  `mod_recid` int(11) NOT NULL DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `passwordreqmaster`
--

CREATE TABLE `passwordreqmaster` (
  `pwdreq_id` int(11) NOT NULL,
  `req_type` varchar(50) NOT NULL COMMENT 'CR-Create User\r\nRP-Reset password',
  `user_type` varchar(50) NOT NULL,
  `resetreason` varchar(50) NOT NULL COMMENT 'FOR-Forgotten\r\nADIS-Account Dissable',
  `namewithini` varchar(250) NOT NULL,
  `position` int(11) NOT NULL,
  `pfno` int(12) NOT NULL,
  `mobile` int(12) NOT NULL,
  `email` varchar(100) NOT NULL,
  `extention` int(12) NOT NULL,
  `reqdate` date NOT NULL,
  `id_num` varchar(50) NOT NULL,
  `d_contrct_trmnt` date NOT NULL DEFAULT current_timestamp(),
  `branch` varchar(100) NOT NULL,
  `bcode` int(20) NOT NULL,
  `mngcomm` varchar(250) NOT NULL,
  `mstatus` int(2) NOT NULL DEFAULT 0 COMMENT '0-pending\r\n1-approve\r\n3-reject',
  `f_status` int(2) NOT NULL DEFAULT 0 COMMENT '0-pending\r\n1-approve\r\n3-reject'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `passwordreqmaster`
--

INSERT INTO `passwordreqmaster` (`pwdreq_id`, `req_type`, `user_type`, `resetreason`, `namewithini`, `position`, `pfno`, `mobile`, `email`, `extention`, `reqdate`, `id_num`, `d_contrct_trmnt`, `branch`, `bcode`, `mngcomm`, `mstatus`, `f_status`) VALUES
(1, 'RP', 'Lakmal', 'FOR', 'K.D.L.I Lakmal', 10, 207391, 776028309, 'lelumlakmal@boc.lk', 13562, '2024-02-25', '198904300511', '2024-02-25', 'Head Office', 3230, '', 0, 0),
(2, 'reset_pwd', 'stf_mem', 'forgotten', 'R.T.M.P. Seneviratne', 2, 231902, 711234543, 'madushi@boc.lk', 3562, '2024-03-15', '961263549v', '0000-00-00', 'hghd', 686, '', 0, 0),
(3, 'reset_pwd', 'stf_mem', '', 'PRODUSER', 2, 231902, 711234543, 'madushika@boc.lk', 3562, '2024-03-15', '967020591V', '0000-00-00', 'hghd', 686, '', 0, 0),
(4, 'new_user', 'stf_mem', '', 'R.T.M.P. Seneviratne', 3, 231902, 711234543, 'madushika@boc.lk', 3562, '2024-03-15', '961263549v', '0000-00-00', 'hghd', 686, '', 0, 0),
(5, 'reset_pwd', 'stf_mem', 'forgotten', 'R.T.M.P. Seneviratne', 2, 231902, 711234543, 'madushi@boc.lk', 3562, '2024-03-15', '967020591V', '0000-00-00', 'hghd', 686, '', 0, 0),
(6, 'new_user', 'stf_mem', '', 'Madushi Seneviratne', 2, 0, 711234543, 'dasuntharuka5@gmail.com', 3562, '2024-03-15', '967020591V', '0000-00-00', 'hghd', 686, '', 0, 0),
(7, 'reset_pwd', 'stf_mem', 'disabled', 'Kamal Madura', 2, 177589, 778596456, 'kamal@gmail.com', 3533, '2024-03-22', '856123544V', '0000-00-00', 'Personal', 3230, '', 0, 0);

-- --------------------------------------------------------

--
-- Table structure for table `permissionmaster`
--

CREATE TABLE `permissionmaster` (
  `id` int(11) NOT NULL,
  `featurename` varchar(100) NOT NULL,
  `displayname` varchar(255) NOT NULL,
  `is_show` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `permissionmaster`
--

INSERT INTO `permissionmaster` (`id`, `featurename`, `displayname`, `is_show`) VALUES
(1, 'FR_add', 'Add Firewall Request', 1),
(2, 'FR_app', 'Pending Firewall Request', 1),
(3, 'FR_auth', 'Authorize Firewall Request', 1),
(4, 'FR_exe', 'Execute Firewall Request', 1),
(5, 'INT_add', 'Add Internet Request ', 1),
(6, 'INT_app', 'Pending Internet Request', 1),
(7, 'INT_auth', 'Authorize Internet Request', 1),
(8, 'INT_exe', 'Execute Internet Request', 1),
(9, 'VA_add', 'Vulnerability Assesment Request', 1),
(10, 'VA_app', 'Vulnerability Assesment Approval', 1),
(11, 'VA_exe', 'Vulnerability Assesment Execute', 1),
(12, 'PW_add', 'Password Request', 1),
(13, 'PW_app', 'Password Request Approval', 1),
(14, 'PW_exe', 'Password Request Execute', 1),
(15, 'REP_M', 'Master Reports', 1),
(16, 'REP_FR', 'Firewall Detail Report', 1),
(17, 'REP_VA', 'Vulnerability Assesment Report', 1),
(18, 'REP_INT', 'Internet Request Report', 1),
(19, 'REP_PWD', 'Password Detail Report', 1),
(20, 'USR_ADD', 'Add User', 1),
(21, 'USR_edit', 'Edit Profile', 1),
(22, 'PWD_reset', 'Reset user & Password', 1),
(23, 'Role_add', 'Role Add', 1),
(24, 'Role_edit', 'Role Edit', 1),
(25, 'Role_access', 'Role Group Access', 1),
(26, 'INT_auth', '0', 1),
(27, 'VA_app', '0', 1),
(28, 'VA_auth', 'Authorize Vulnerability Assesment Reques', 1),
(29, 'MY_flst', 'My firewall request List', 1),
(30, 'MY_ilst', 'My internet request List', 1),
(31, 'MY_vlst', 'My VA request List', 1);

-- --------------------------------------------------------

--
-- Table structure for table `requestlog`
--

CREATE TABLE `requestlog` (
  `reqlog_id` int(11) NOT NULL,
  `req_id` int(11) NOT NULL DEFAULT 0,
  `loged_usr` int(11) NOT NULL DEFAULT 0,
  `app_st` int(11) NOT NULL DEFAULT 0 COMMENT '0-pending\r\n1-approved\r\n2-reject',
  `auth_status` int(11) NOT NULL DEFAULT 0 COMMENT '0-pending\r\n1-approved\r\n2-reject',
  `exe_status` int(11) NOT NULL DEFAULT 0 COMMENT '0-pending\r\n1-approved\r\n2-reject',
  `req_type` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `requestlog`
--

INSERT INTO `requestlog` (`reqlog_id`, `req_id`, `loged_usr`, `app_st`, `auth_status`, `exe_status`, `req_type`) VALUES
(1, 1, 0, 0, 0, 0, 'FW_REQ'),
(2, 2, 2, 0, 0, 0, 'FW_REQ'),
(3, 3, 2, 0, 0, 0, 'FW_REQ'),
(4, 4, 2, 0, 0, 0, 'FW_REQ'),
(5, 5, 2, 0, 0, 0, 'FW_REQ'),
(6, 1, 0, 0, 0, 0, 'FW_REQ'),
(7, 1, 0, 0, 0, 0, 'FW_REQ'),
(8, 1, 0, 0, 0, 0, 'FW_REQ'),
(9, 2, 2, 0, 0, 0, 'FW_REQ'),
(10, 2, 2, 0, 0, 0, 'FW_REQ'),
(11, 2, 2, 0, 0, 0, 'FW_REQ'),
(12, 3, 2, 0, 0, 0, 'FW_REQ'),
(13, 3, 2, 0, 0, 0, 'FW_REQ'),
(14, 4, 2, 0, 0, 0, 'FW_REQ'),
(15, 3, 2, 0, 0, 0, 'FW_REQ'),
(16, 4, 2, 0, 0, 0, 'FW_REQ'),
(17, 3, 2, 0, 0, 0, 'FW_REQ'),
(18, 3, 2, 0, 0, 0, 'FW_REQ'),
(19, 4, 2, 0, 0, 0, 'FW_REQ'),
(20, 4, 2, 0, 0, 0, 'FW_REQ'),
(21, 6, 7, 0, 0, 0, 'FW_REQ'),
(22, 6, 7, 0, 0, 0, 'FW_REQ'),
(23, 2, 2, 0, 0, 0, 'FW_REQ'),
(24, 7, 7, 0, 0, 0, 'FW_REQ'),
(25, 1, 0, 0, 0, 0, 'INT_REQ'),
(26, 1, 7, 0, 0, 0, 'INT_REQ'),
(27, 2, 7, 0, 0, 0, 'INT_REQ'),
(28, 3, 7, 0, 0, 0, 'INT_REQ'),
(29, 4, 2, 0, 0, 0, 'INT_REQ'),
(30, 4, 2, 0, 0, 0, 'INT_REQ'),
(31, 1, 7, 0, 0, 0, 'INT_REQ'),
(32, 2, 7, 0, 0, 0, 'INT_REQ'),
(33, 3, 7, 0, 0, 0, 'INT_REQ'),
(34, 5, 2, 0, 0, 0, 'INT_REQ'),
(35, 6, 2, 0, 0, 0, 'INT_REQ'),
(36, 6, 1, 1, 0, 0, 'FW_REQ'),
(37, 8, 7, 0, 0, 0, 'FW_REQ'),
(38, 8, 1, 2, 0, 0, 'FW_REQ'),
(39, 9, 7, 0, 0, 0, 'FW_REQ'),
(40, 10, 7, 0, 0, 0, 'FW_REQ'),
(41, 10, 1, 2, 0, 0, 'FW_REQ'),
(42, 2, 1, 2, 0, 0, 'FW_REQ'),
(43, 2, 1, 2, 0, 0, 'FW_REQ'),
(44, 2, 1, 0, 0, 0, 'FW_REQ'),
(45, 2, 1, 0, 0, 0, 'FW_REQ'),
(46, 2, 1, 2, 0, 0, 'INT_REQ'),
(47, 3, 1, 1, 0, 0, 'INT_REQ'),
(48, 11, 7, 0, 0, 0, 'FW_REQ'),
(49, 12, 7, 0, 0, 0, 'FW_REQ'),
(50, 13, 7, 0, 0, 0, 'FW_REQ'),
(51, 14, 7, 0, 0, 0, 'FW_REQ'),
(52, 7, 7, 0, 0, 0, 'INT_REQ'),
(53, 14, 1, 1, 0, 0, 'FW_REQ'),
(54, 7, 1, 1, 0, 0, 'INT_REQ'),
(55, 6, 1, 1, 1, 0, 'FW_REQ'),
(56, 7, 1, 2, 0, 0, 'INT_REQ'),
(57, 8, 7, 0, 0, 0, 'INT_REQ'),
(58, 15, 7, 0, 0, 0, 'FW_REQ'),
(59, 15, 1, 1, 0, 0, 'FW_REQ'),
(60, 15, 1, 1, 2, 0, 'FW_REQ'),
(61, 1, 0, 0, 0, 0, 'FW_REQ'),
(62, 2, 1, 0, 0, 0, 'FW_REQ'),
(63, 3, 2, 0, 0, 0, 'FW_REQ'),
(64, 4, 2, 0, 0, 0, 'FW_REQ'),
(65, 5, 2, 0, 0, 0, 'FW_REQ'),
(66, 6, 1, 1, 1, 0, 'FW_REQ'),
(67, 7, 7, 0, 0, 0, 'FW_REQ'),
(68, 8, 7, 2, 0, 0, 'FW_REQ'),
(69, 9, 7, 0, 0, 0, 'FW_REQ'),
(70, 10, 1, 2, 0, 0, 'FW_REQ'),
(71, 11, 7, 0, 0, 0, 'FW_REQ'),
(72, 12, 7, 0, 0, 0, 'FW_REQ'),
(73, 13, 7, 0, 0, 0, 'FW_REQ'),
(74, 14, 1, 1, 0, 0, 'FW_REQ'),
(75, 15, 1, 1, 2, 0, 'FW_REQ'),
(76, 1, 0, 0, 0, 0, 'FW_REQ'),
(77, 2, 1, 0, 0, 0, 'FW_REQ'),
(78, 3, 2, 0, 0, 0, 'FW_REQ'),
(79, 4, 2, 0, 0, 0, 'FW_REQ'),
(80, 5, 2, 0, 0, 0, 'FW_REQ'),
(81, 9, 6, 0, 0, 0, 'INT_REQ'),
(82, 16, 6, 0, 0, 0, 'FW_REQ'),
(83, 17, 6, 0, 0, 0, 'FW_REQ'),
(84, 18, 5, 0, 0, 0, 'FW_REQ'),
(85, 19, 5, 0, 0, 0, 'FW_REQ'),
(86, 13, 9, 1, 0, 0, 'FW_REQ'),
(87, 9, 9, 1, 0, 0, 'FW_REQ'),
(88, 9, 10, 1, 1, 0, 'FW_REQ'),
(89, 6, 14, 1, 1, 1, 'FW_REQ'),
(90, 1, 9, 1, 0, 0, 'INT_REQ'),
(91, 1, 10, 1, 1, 0, 'INT_REQ'),
(92, 1, 15, 1, 1, 0, 'INT_REQ'),
(93, 17, 6, 0, 0, 0, 'FW_REQ'),
(94, 18, 5, 0, 0, 0, 'FW_REQ'),
(95, 12, 7, 0, 0, 0, 'FW_REQ'),
(96, 13, 9, 1, 0, 0, 'FW_REQ'),
(97, 10, 6, 0, 0, 0, 'INT_REQ'),
(98, 20, 6, 0, 0, 0, 'FW_REQ'),
(99, 21, 7, 0, 0, 0, 'FW_REQ'),
(100, 22, 7, 0, 0, 0, 'FW_REQ'),
(101, 23, 7, 0, 0, 0, 'FW_REQ'),
(102, 11, 7, 0, 0, 0, 'INT_REQ'),
(103, 12, 7, 0, 0, 0, 'INT_REQ'),
(104, 24, 7, 0, 0, 0, 'FW_REQ'),
(105, 25, 7, 0, 0, 0, 'FW_REQ'),
(106, 26, 7, 0, 0, 0, 'FW_REQ'),
(107, 27, 7, 0, 0, 0, 'FW_REQ'),
(108, 13, 10, 1, 1, 0, 'FW_REQ'),
(109, 28, 1, 0, 0, 0, 'FW_REQ'),
(110, 13, 1, 0, 0, 0, 'INT_REQ'),
(111, 29, 1, 0, 0, 0, 'FW_REQ'),
(112, 30, 1, 0, 0, 0, 'FW_REQ'),
(113, 31, 1, 0, 0, 0, 'FW_REQ'),
(114, 14, 1, 0, 0, 0, 'INT_REQ'),
(115, 32, 7, 0, 0, 0, 'FW_REQ'),
(116, 32, 9, 1, 0, 0, 'FW_REQ'),
(117, 32, 10, 1, 1, 0, 'FW_REQ'),
(118, 32, 14, 1, 1, 1, 'FW_REQ'),
(119, 33, 7, 0, 0, 0, 'FW_REQ'),
(120, 34, 6, 0, 0, 0, 'FW_REQ'),
(121, 34, 6, 0, 0, 0, 'FW_REQ'),
(122, 35, 6, 0, 0, 0, 'FW_REQ'),
(123, 36, 7, 0, 0, 0, 'FW_REQ'),
(124, 37, 7, 0, 0, 0, 'FW_REQ'),
(125, 27, 9, 0, 0, 0, 'FW_REQ'),
(126, 27, 9, 0, 0, 0, 'FW_REQ'),
(127, 27, 9, 0, 0, 0, 'FW_REQ'),
(128, 38, 7, 0, 0, 0, 'FW_REQ'),
(129, 39, 7, 0, 0, 0, 'FW_REQ'),
(130, 33, 9, 0, 0, 0, 'FW_REQ'),
(131, 33, 9, 1, 0, 0, 'FW_REQ'),
(132, 23, 9, 1, 0, 0, 'FW_REQ'),
(133, 40, 7, 0, 0, 0, 'FW_REQ');

-- --------------------------------------------------------

--
-- Table structure for table `rolepermissionmng`
--

CREATE TABLE `rolepermissionmng` (
  `id` int(11) NOT NULL,
  `per_id` int(11) NOT NULL,
  `role_id` int(11) NOT NULL,
  `is_access` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `rolepermissionmng`
--

INSERT INTO `rolepermissionmng` (`id`, `per_id`, `role_id`, `is_access`) VALUES
(1, 1, 1, 1),
(2, 2, 1, 1),
(3, 3, 1, 1),
(4, 4, 1, 1),
(5, 5, 1, 1),
(6, 6, 1, 1),
(7, 7, 1, 1),
(8, 8, 1, 1),
(9, 9, 1, 1),
(10, 10, 1, 1),
(11, 11, 1, 1),
(12, 12, 1, 1),
(13, 13, 1, 1),
(14, 14, 1, 1),
(15, 15, 1, 1),
(16, 16, 1, 1),
(17, 17, 1, 1),
(18, 18, 1, 1),
(19, 19, 1, 1),
(20, 20, 1, 1),
(21, 21, 1, 1),
(22, 22, 1, 1),
(23, 23, 1, 1),
(24, 24, 1, 1),
(25, 25, 1, 1),
(26, 1, 2, 1),
(27, 2, 2, 0),
(28, 3, 2, 0),
(29, 4, 2, 0),
(30, 5, 2, 1),
(31, 6, 2, 0),
(32, 7, 2, 0),
(33, 8, 2, 0),
(34, 9, 2, 0),
(35, 10, 2, 0),
(36, 11, 2, 0),
(37, 12, 2, 1),
(38, 13, 2, 0),
(39, 14, 2, 0),
(40, 15, 2, 0),
(41, 16, 2, 0),
(42, 17, 2, 0),
(43, 18, 2, 0),
(44, 19, 2, 0),
(45, 20, 2, 1),
(46, 21, 2, 1),
(47, 22, 2, 0),
(48, 23, 2, 0),
(49, 24, 2, 0),
(50, 25, 2, 0),
(51, 1, 3, 1),
(52, 2, 3, 1),
(53, 3, 3, 1),
(54, 4, 3, 1),
(55, 5, 3, 1),
(56, 6, 3, 1),
(57, 7, 3, 1),
(58, 8, 3, 1),
(59, 9, 3, 1),
(60, 10, 3, 1),
(61, 11, 3, 1),
(62, 12, 3, 1),
(63, 13, 3, 1),
(64, 14, 3, 1),
(65, 15, 3, 1),
(66, 16, 3, 1),
(67, 17, 3, 1),
(68, 18, 3, 1),
(69, 19, 3, 1),
(70, 20, 3, 1),
(71, 21, 3, 1),
(72, 22, 3, 1),
(73, 23, 3, 1),
(74, 24, 3, 1),
(75, 25, 3, 1),
(76, 1, 4, 1),
(77, 2, 4, 1),
(78, 3, 4, 1),
(79, 4, 4, 1),
(80, 5, 4, 1),
(81, 6, 4, 1),
(82, 7, 4, 1),
(83, 8, 4, 1),
(84, 9, 4, 1),
(85, 10, 4, 1),
(86, 11, 4, 1),
(87, 12, 4, 1),
(88, 13, 4, 1),
(89, 14, 4, 1),
(90, 15, 4, 1),
(91, 16, 4, 1),
(92, 17, 4, 1),
(93, 18, 4, 1),
(94, 19, 4, 1),
(95, 20, 4, 1),
(96, 21, 4, 1),
(97, 22, 4, 1),
(98, 23, 4, 1),
(99, 24, 4, 1),
(100, 25, 4, 1),
(101, 1, 5, 1),
(102, 2, 5, 1),
(103, 3, 5, 1),
(104, 4, 5, 1),
(105, 5, 5, 1),
(106, 6, 5, 1),
(107, 7, 5, 1),
(108, 8, 5, 1),
(109, 9, 5, 1),
(110, 10, 5, 1),
(111, 11, 5, 1),
(112, 12, 5, 1),
(113, 13, 5, 1),
(114, 14, 5, 1),
(115, 15, 5, 1),
(116, 16, 5, 1),
(117, 17, 5, 1),
(118, 18, 5, 1),
(119, 19, 5, 1),
(120, 20, 5, 1),
(121, 21, 5, 1),
(122, 22, 5, 1),
(123, 23, 5, 1),
(124, 24, 5, 1),
(125, 25, 5, 1),
(126, 1, 6, 1),
(127, 2, 6, 1),
(128, 3, 6, 1),
(129, 4, 6, 1),
(130, 5, 6, 1),
(131, 6, 6, 1),
(132, 7, 6, 1),
(133, 8, 6, 1),
(134, 9, 6, 1),
(135, 10, 6, 1),
(136, 11, 6, 1),
(137, 12, 6, 1),
(138, 13, 6, 1),
(139, 14, 6, 1),
(140, 15, 6, 1),
(141, 16, 6, 1),
(142, 17, 6, 1),
(143, 18, 6, 1),
(144, 19, 6, 1),
(145, 20, 6, 1),
(146, 21, 6, 1),
(147, 22, 6, 1),
(148, 23, 6, 1),
(149, 24, 6, 1),
(150, 25, 6, 1),
(151, 1, 7, 1),
(152, 2, 7, 1),
(153, 3, 7, 1),
(154, 4, 7, 1),
(155, 5, 7, 1),
(156, 6, 7, 1),
(157, 7, 7, 1),
(158, 8, 7, 1),
(159, 9, 7, 1),
(160, 10, 7, 1),
(161, 11, 7, 1),
(162, 12, 7, 1),
(163, 13, 7, 1),
(164, 14, 7, 1),
(165, 15, 7, 1),
(166, 16, 7, 1),
(167, 17, 7, 1),
(168, 18, 7, 1),
(169, 19, 7, 1),
(170, 20, 7, 1),
(171, 21, 7, 1),
(172, 22, 7, 1),
(173, 23, 7, 1),
(174, 24, 7, 1),
(175, 25, 7, 1),
(176, 29, 1, 1),
(177, 29, 2, 1),
(178, 29, 3, 1),
(179, 29, 4, 1),
(180, 29, 5, 1),
(181, 29, 6, 1),
(182, 29, 7, 1),
(183, 30, 1, 1),
(184, 30, 2, 1),
(185, 30, 3, 1),
(186, 30, 4, 1),
(187, 30, 5, 1),
(188, 30, 6, 1),
(189, 30, 7, 1),
(190, 31, 1, 1),
(191, 31, 2, 1),
(192, 31, 3, 1),
(193, 31, 4, 1),
(194, 31, 5, 1),
(195, 31, 6, 1),
(196, 31, 7, 1),
(197, 28, 1, 1),
(198, 28, 2, 0),
(199, 28, 3, 1),
(200, 28, 4, 1),
(201, 28, 5, 1),
(202, 28, 6, 1),
(203, 28, 7, 1);

-- --------------------------------------------------------

--
-- Table structure for table `unitmaster`
--

CREATE TABLE `unitmaster` (
  `unit_id` int(11) NOT NULL,
  `unitn_name` varchar(50) NOT NULL,
  `unit_status` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `unitmaster`
--

INSERT INTO `unitmaster` (`unit_id`, `unitn_name`, `unit_status`) VALUES
(1, 'Genaral Applications', 1),
(2, 'Internet Banking', 1),
(3, 'Core Banking Development', 1),
(4, 'Core Banking Maintenance', 1);

-- --------------------------------------------------------

--
-- Table structure for table `usermaster`
--

CREATE TABLE `usermaster` (
  `u_id` int(11) NOT NULL,
  `u_fname` varchar(100) NOT NULL,
  `u_lname` varchar(50) NOT NULL,
  `u_username` varchar(50) NOT NULL DEFAULT '000000',
  `u_pfno` varchar(50) NOT NULL,
  `u_email` varchar(100) NOT NULL,
  `u_extention` int(50) NOT NULL,
  `u_mobile` varchar(15) NOT NULL,
  `u_password` varchar(255) NOT NULL,
  `u_status` int(1) NOT NULL,
  `u_lockst` int(11) NOT NULL,
  `u_regdate` date DEFAULT current_timestamp(),
  `u_roleid` int(50) NOT NULL,
  `u_depid` int(50) NOT NULL,
  `u_desigid` int(11) NOT NULL,
  `u_avatar` varchar(255) NOT NULL DEFAULT '0.jpg',
  `logusr_id` int(11) NOT NULL DEFAULT 0,
  `is_pwchng` int(11) NOT NULL DEFAULT 0 COMMENT '0-no pwd change\r\n1-pw change\r\n2-pw reset\r\n3-statuschng'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `usermaster`
--

INSERT INTO `usermaster` (`u_id`, `u_fname`, `u_lname`, `u_username`, `u_pfno`, `u_email`, `u_extention`, `u_mobile`, `u_password`, `u_status`, `u_lockst`, `u_regdate`, `u_roleid`, `u_depid`, `u_desigid`, `u_avatar`, `logusr_id`, `is_pwchng`) VALUES
(1, 'Lelum', 'Lakmal', 'PF207391', '207391', 'lelumlakmal@boc.lk', 13562, '0776028309', '$2y$10$KKtXGK33khwVJpjZKNJQv.P7hMBatdz7qUIj1SGE7DXvhssQDxHCq', 1, 0, '2024-03-18', 1, 2, 2, '3.png', 1, 0),
(2, 'Mihirini', 'Buddhakorala', 'PF207392', '207392', 'mihirinib@boc.lk', 13561, '0776028310', '$2y$10$P4AhEXg3rcQFuDa0m2lppOKQYJd/GQl1RqdZSIh9JQTSql2qjyHYa', 1, 0, '2024-03-18', 2, 1, 2, '4.png', 1, 0),
(3, 'Saminda', 'Jayakodi', 'PF207393', '207393', 'saminda@boc.lk', 1355, '0774585311', '$2y$10$rJ1nqdwjrT9OPUtQaiCyleF0BnHs5jcsdxMC1F9AfHUiWgYh2mIMO', 1, 0, '2024-03-18', 2, 1, 2, '7.png', 1, 0),
(4, 'Thilina', 'Chathuranga', 'PF207394', '207394', 'thilina@boc.lk', 13558, '0776028312', '$2y$10$tyauAYFmdOgK4q/1n6w4QOoXWKJhaX636eXATPwfXjE0Uxi43fw1W', 1, 0, '2024-03-18', 2, 1, 2, '7.png', 1, 0),
(5, 'Thilanga', 'Attanayake', 'PF207395', '207395', 'thilanga@boc.lk', 3562, '0776028313', '$2y$10$9tqYAekNzo9EcRGHxK8wh.WnP1l..aU4FfJzRbffMHqYD3jEMcx2G', 1, 0, '2024-03-18', 2, 2, 1, '8.png', 1, 0),
(6, 'Divanika', 'Ravichandra', 'PF207396', '207396', 'divanika@boc.lk', 3562, '0776028314', '$2y$10$yyocHYJ..fSiFuR9ebBIhuJadh6q9.AbkpE0J34nCZHeioLcphQH2', 1, 0, '2024-03-18', 2, 2, 1, '2.png', 1, 2),
(7, 'Madushi', 'Senevirathne', 'PF207397', '207397', 'madushi@boc.lk', 3562, '0776028315', '$2y$10$dXSWspjXjRXIavtjIGGOx.OlwczICBz1DLwPlziCtfu78GnmAfICC', 1, 0, '2024-03-18', 2, 2, 1, '2.png', 1, 0),
(8, 'Shailika', 'Wijerathne', 'PF177000', '177000', 'shailika@boc.lk', 13563, '0776028320', '$2y$10$gELe9uEeD6ecLxv8TlY2r.YvWMhx78j5dA2G.E7iGiH4eLwUDOgze', 1, 0, '2024-03-18', 3, 1, 3, '2.png', 1, 0),
(9, 'Sashika', 'Gurusinghe', 'PF177001', '177001', 'sashika@boc.lk', 13523, '0776028458', '$2y$10$Wj4PtmHhbTAimw2wtScdru2OURSlYR6eHBw93jqLQtTE8D9r7byX6', 1, 0, '2024-03-18', 3, 2, 3, '9.png', 1, 0),
(10, 'Sachin', 'Perera', 'PF231000', '231000', 'sachin@boc.lk', 3537, '0776028320', '$2y$10$tsLkAqJfHAE94BKMASeQjuRnGCRZ8yHlwGD/Yr2kgURKqWlUqFBjm', 1, 0, '2024-03-18', 4, 4, 3, '6.png', 1, 0),
(11, 'Sachith', 'Wijerathne', 'PF231001', '177002', 'sachith@boc.lk', 13537, '0776028366', '$2y$10$JcpePy9g4TDp2YkWkJYY1OE/APK1aKgHiiMmSZ2VZv1FWhjT4F3pe', 1, 0, '2024-03-18', 4, 6, 3, '8.png', 1, 0),
(12, 'Achini', 'Perera', 'PF207398', '207398', 'achini@boc.lk', 13558, '0776025789', '$2y$10$tt6nV6NkwlW.xgPJT..nV.Fi2/u8KEttJsxq2VNNRruTIYtYg7qX2', 0, 0, '2024-03-18', 2, 1, 2, '5.png', 1, 0),
(13, 'Gehan', 'Atapattu', 'PF231001', '231001', 'gehan@boc.lk', 3579, '0775647896', '$2y$10$Isnd9WzgDm.34N9Q4OlWqOnyyaTKn93OGvIS3MD8i0T8SgFlpX28C', 0, 0, '2024-03-18', 3, 2, 3, '9.png', 1, 0),
(14, 'Nadana', 'Kodippili', 'PF231002', '231002', 'nadana@boc.lk', 3525, '0775289635', '$2y$10$bLDDgUnKe.dQxq8XEvNeNONmxkL7lS1YV0KCkNa3PepVhx3mw6ntS', 1, 0, '2024-03-18', 5, 5, 3, '3.png', 1, 0),
(15, 'Thilini', 'Nirmani', 'PF231003', '231003', 'thilini@boc.lk', 3527, '0778596456', '$2y$10$yr5gRdEZMVSvfFdrPUVjQOmfnFSjs8POslwCgqucgp67mA/5yYCey', 1, 0, '2024-03-22', 5, 4, 2, '2.png', 1, 2);

--
-- Triggers `usermaster`
--
DELIMITER $$
CREATE TRIGGER `User_Add_Log` AFTER INSERT ON `usermaster` FOR EACH ROW BEGIN 
INSERT INTO masterlog
(activity,rec_id,u_id,read_st)
	VALUES('IN_USR',NEW.u_id,NEW.logusr_id,0);
    END
$$
DELIMITER ;
DELIMITER $$
CREATE TRIGGER `User_Alter_Log` AFTER UPDATE ON `usermaster` FOR EACH ROW BEGIN 
INSERT INTO masteralterlog
(activity,is_pwchang,u_id,mod_recid,read_st)
	VALUES('ALT_USR',NEW.is_pwchng,NEW.logusr_id,NEW.u_id,0);
    END
$$
DELIMITER ;

-- --------------------------------------------------------

--
-- Table structure for table `userrolemaster`
--

CREATE TABLE `userrolemaster` (
  `roleid` int(11) NOT NULL,
  `rolename` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `userrolemaster`
--

INSERT INTO `userrolemaster` (`roleid`, `rolename`) VALUES
(1, 'Supper Admin'),
(2, 'User'),
(3, 'Manager'),
(4, 'Authorize Manager'),
(5, 'Execute Officer'),
(6, 'Admin'),
(7, 'Higher Management'),
(11, 'Higher Managementt');

-- --------------------------------------------------------

--
-- Table structure for table `varequestmaster`
--

CREATE TABLE `varequestmaster` (
  `req_id` int(11) NOT NULL,
  `user_id` varchar(100) NOT NULL,
  `pfno` varchar(20) NOT NULL,
  `email` varchar(100) NOT NULL,
  `mobile` int(10) NOT NULL,
  `extention` int(11) NOT NULL,
  `department` varchar(100) NOT NULL,
  `position` int(11) NOT NULL,
  `date` date NOT NULL,
  `server_os` varchar(50) NOT NULL,
  `server_ip` varchar(50) NOT NULL,
  `criticality` varchar(50) NOT NULL,
  `explanation` varchar(100) NOT NULL,
  `app_by` int(11) NOT NULL DEFAULT 0,
  `mng_apr` int(10) NOT NULL DEFAULT 0 COMMENT '0-pending 1-approve 2-reject	',
  `app_date` date NOT NULL DEFAULT current_timestamp(),
  `sec_apr` int(10) NOT NULL DEFAULT 0 COMMENT '0-pending 1-approve 2-reject	',
  `is_execute` int(11) NOT NULL DEFAULT 0 COMMENT '0-pending 1-approve 2-reject',
  `auth_by` int(11) NOT NULL DEFAULT 0,
  `exe_by` int(11) NOT NULL DEFAULT 0,
  `auth_date` date NOT NULL DEFAULT current_timestamp(),
  `exe_date` date NOT NULL DEFAULT current_timestamp(),
  `managercommnt` varchar(250) NOT NULL,
  `itseccomment` varchar(100) NOT NULL,
  `execomment` varchar(255) NOT NULL DEFAULT 'No',
  `loged_user` int(11) NOT NULL DEFAULT 0,
  `filename` varchar(800) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `varequestmaster`
--

INSERT INTO `varequestmaster` (`req_id`, `user_id`, `pfno`, `email`, `mobile`, `extention`, `department`, `position`, `date`, `server_os`, `server_ip`, `criticality`, `explanation`, `app_by`, `mng_apr`, `app_date`, `sec_apr`, `is_execute`, `auth_by`, `exe_by`, `auth_date`, `exe_date`, `managercommnt`, `itseccomment`, `execomment`, `loged_user`, `filename`) VALUES
(1, '1', 'it231902', 'madushi@boc.lk', 711234543, 3562, '2', 1, '2024-02-22', 'Windows', '172.20.106.173', 'value1', 'vb', 0, 0, '2024-03-21', 0, 0, 0, 0, '2024-03-21', '2024-03-22', '', '', 'No', 0, ''),
(2, '6', '207396', 'divanika@boc.lk', 776028314, 3562, '2', 1, '2024-03-21', 'Windows', '172.24.28.145', 'value2', 'UAT Server', 9, 1, '2024-03-22', 2, 0, 10, 0, '2024-03-22', '2024-03-22', 'No Risk. Conduct the VA.', 'UAT environment not stable.', 'No', 10, ''),
(3, '6', '207396', 'divanika@boc.lk', 776028314, 3562, '2', 1, '2024-03-21', 'Ubuntu', '172.24.28.162', 'value1', 'Live Server', 9, 2, '2024-03-22', 0, 0, 0, 0, '2024-03-21', '2024-03-22', 'Critical server.', '', 'No', 9, ''),
(4, '6', '207396', 'divanika@boc.lk', 776028314, 3562, '2', 1, '2024-03-21', 'Red Hat', '172.20.8.32', 'value1', 'HCM Server Live', 9, 1, '2024-03-22', 1, 1, 10, 15, '2024-03-22', '2024-03-22', 'Checked and agree', 'No Issue. Permission granted for VA', 'Complete', 15, ''),
(5, '5', '207395', 'thilanga@boc.lk', 776028313, 3562, '2', 1, '2024-03-21', 'Linux', '172.24.28.165', 'value2', 'Smart Rep App UAT', 0, 0, '2024-03-21', 0, 0, 0, 0, '2024-03-21', '2024-03-22', '', '', 'No', 0, ''),
(6, '5', '207395', 'thilanga@boc.lk', 776028313, 3562, '2', 1, '2024-03-21', 'Red Hat', '172.24.28.142', 'value1', 'Smart Envoy Live', 0, 0, '2024-03-21', 0, 0, 0, 0, '2024-03-21', '2024-03-22', '', '', 'No', 0, ''),
(7, '6', '207396', 'divanika@boc.lk', 776028314, 3562, '2', 1, '2024-03-22', 'Ubuntu', '172.20.106.231', 'value2', 'UAT server', 0, 0, '2024-03-22', 0, 0, 0, 0, '2024-03-22', '2024-03-22', '', '', 'No', 0, ''),
(8, '6', '207396', 'divanika@boc.lk', 776028314, 3562, '2', 1, '2024-03-22', 'Windows', '172.20.106.31', 'value2', 'Development PC', 9, 1, '2024-03-22', 1, 1, 10, 15, '2024-03-22', '2024-03-22', 'Checked', 'Approved for VA', 'Complete The VA', 15, '1711120323_6d6a1f4fc504803a583c.html'),
(9, '1', '207391', 'lelumlakmal@boc.lk', 776028309, 13562, '2', 1, '2024-03-23', 'Ubuntu', '172.24.28.32', 'value2', 'check viva', 1, 1, '2024-03-23', 1, 0, 1, 0, '2024-03-23', '2024-03-23', 'checked', 'Do The VA Test', 'No', 1, ''),
(10, '1', '207391', 'lelumlakmal@boc.lk', 776028309, 13562, '2', 1, '2024-03-23', 'Linux', '172.24.28.132', 'value2', 'AAA', 0, 0, '2024-03-23', 0, 0, 0, 0, '2024-03-23', '2024-03-23', '', '', 'No', 0, '');

-- --------------------------------------------------------

--
-- Table structure for table `viewmaster`
--

CREATE TABLE `viewmaster` (
  `view_id` int(11) NOT NULL,
  `view_name` varchar(100) NOT NULL,
  `display_name` varchar(100) NOT NULL,
  `is_show` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `departmentmaster`
--
ALTER TABLE `departmentmaster`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `designationmaster`
--
ALTER TABLE `designationmaster`
  ADD PRIMARY KEY (`desig_id`);

--
-- Indexes for table `firewallrequestmaster`
--
ALTER TABLE `firewallrequestmaster`
  ADD PRIMARY KEY (`req_id`);

--
-- Indexes for table `internetrequestmaster`
--
ALTER TABLE `internetrequestmaster`
  ADD PRIMARY KEY (`intreq_id`);

--
-- Indexes for table `masteralterlog`
--
ALTER TABLE `masteralterlog`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `masterlog`
--
ALTER TABLE `masterlog`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `mastertransactionlog`
--
ALTER TABLE `mastertransactionlog`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `passwordreqmaster`
--
ALTER TABLE `passwordreqmaster`
  ADD PRIMARY KEY (`pwdreq_id`);

--
-- Indexes for table `permissionmaster`
--
ALTER TABLE `permissionmaster`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `requestlog`
--
ALTER TABLE `requestlog`
  ADD PRIMARY KEY (`reqlog_id`);

--
-- Indexes for table `rolepermissionmng`
--
ALTER TABLE `rolepermissionmng`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `unitmaster`
--
ALTER TABLE `unitmaster`
  ADD PRIMARY KEY (`unit_id`);

--
-- Indexes for table `usermaster`
--
ALTER TABLE `usermaster`
  ADD PRIMARY KEY (`u_id`);

--
-- Indexes for table `userrolemaster`
--
ALTER TABLE `userrolemaster`
  ADD PRIMARY KEY (`roleid`);

--
-- Indexes for table `varequestmaster`
--
ALTER TABLE `varequestmaster`
  ADD PRIMARY KEY (`req_id`);

--
-- Indexes for table `viewmaster`
--
ALTER TABLE `viewmaster`
  ADD PRIMARY KEY (`view_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `departmentmaster`
--
ALTER TABLE `departmentmaster`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `designationmaster`
--
ALTER TABLE `designationmaster`
  MODIFY `desig_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `firewallrequestmaster`
--
ALTER TABLE `firewallrequestmaster`
  MODIFY `req_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=41;

--
-- AUTO_INCREMENT for table `internetrequestmaster`
--
ALTER TABLE `internetrequestmaster`
  MODIFY `intreq_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- AUTO_INCREMENT for table `masteralterlog`
--
ALTER TABLE `masteralterlog`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `masterlog`
--
ALTER TABLE `masterlog`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;

--
-- AUTO_INCREMENT for table `mastertransactionlog`
--
ALTER TABLE `mastertransactionlog`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `passwordreqmaster`
--
ALTER TABLE `passwordreqmaster`
  MODIFY `pwdreq_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `permissionmaster`
--
ALTER TABLE `permissionmaster`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=32;

--
-- AUTO_INCREMENT for table `requestlog`
--
ALTER TABLE `requestlog`
  MODIFY `reqlog_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=134;

--
-- AUTO_INCREMENT for table `rolepermissionmng`
--
ALTER TABLE `rolepermissionmng`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=204;

--
-- AUTO_INCREMENT for table `unitmaster`
--
ALTER TABLE `unitmaster`
  MODIFY `unit_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `usermaster`
--
ALTER TABLE `usermaster`
  MODIFY `u_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;

--
-- AUTO_INCREMENT for table `userrolemaster`
--
ALTER TABLE `userrolemaster`
  MODIFY `roleid` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT for table `varequestmaster`
--
ALTER TABLE `varequestmaster`
  MODIFY `req_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `viewmaster`
--
ALTER TABLE `viewmaster`
  MODIFY `view_id` int(11) NOT NULL AUTO_INCREMENT;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
