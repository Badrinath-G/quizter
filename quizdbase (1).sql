-- phpMyAdmin SQL Dump
-- version 5.0.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jul 21, 2020 at 05:20 AM
-- Server version: 10.4.13-MariaDB
-- PHP Version: 7.4.7

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `quizdbase`
--

-- --------------------------------------------------------

--
-- Table structure for table `answers`
--

CREATE TABLE `answers` (
  `aid` int(250) NOT NULL,
  `answer` varchar(250) NOT NULL,
  `ans_id` int(250) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `answers`
--

INSERT INTO `answers` (`aid`, `answer`, `ans_id`) VALUES
(1, ' Mysqldbcopy', 1),
(2, 'Mysqlcopydb', 1),
(3, 'Mysqlflushdb', 1),
(4, 'Mysqldbflush', 1),
(5, 'SELECT', 2),
(6, 'CREATE', 2),
(7, 'INSERT', 2),
(8, 'UPDATE', 2),
(9, 'Column Name', 3),
(10, 'Row Name', 3),
(11, 'Table Name', 3),
(12, 'Database Name', 3),
(13, 'Fetchrow_arrayref()', 4),
(14, 'Fetch()', 4),
(15, 'Fetchrow_array()', 4),
(16, ' Fetchrow_hashref()', 4),
(17, 'Relay Log', 5),
(18, 'Error Log', 5),
(19, 'Binary Log', 5),
(20, 'General Query Log', 5),
(21, '255 Bytes', 6),
(22, '65, 535 Bytes', 6),
(23, '256 Bytes', 6),
(24, 'None Of The Mentioned', 6),
(25, 'SHOW CHARACTER SET;', 7),
(26, 'SHOW;', 7),
(27, 'CHARACTER SET;', 7),
(28, 'None Of The Mentioned', 7),
(29, 'Varchar(20) Character Set Utf8;', 8),
(30, 'Varchar(20);', 8),
(31, 'Varchar(20) Character Set;', 8),
(32, 'None Of The Mentioned', 8),
(33, 'Text Type', 9),
(34, 'Varchar', 9),
(35, 'Char', 9),
(36, 'Both Varchar And Char', 9),
(37, 'Michael Widenius', 10),
(38, 'Bill Joy', 10),
(39, 'Bill Gates', 10),
(40, 'Stephanie Wall', 10),
(41, 'Some Sort Of Client Program To Access The Databases', 11),
(42, 'Perl, PHP Or Java', 11),
(43, 'A Browser', 11),
(44, 'FTP And Telnet', 11),
(45, 'Mysqld', 12),
(46, 'Mysql', 12),
(47, 'Mysql.exe', 12),
(48, 'Httpd', 12),
(49, 'Master To Slave Replication', 13),
(50, 'Multiple-master Replication', 13),
(51, 'Single File Based Clustering', 13),
(52, 'MySQL Doesn\'t Support Replication', 13),
(53, 'The Structured Query Language', 14),
(54, 'English', 14),
(55, 'Swedish', 14),
(56, 'Your Choice From Perl, PHP, Java Or Some Other Languages', 14),
(57, 'Unix, Linux, Windows And Others', 15),
(58, 'Unix And Linux Only', 15),
(59, ' Linux And Mac OS-X Only', 15),
(60, 'Any Operating System At All', 15),
(61, 'Stored Procedures', 16),
(62, 'Temporary (Hash) Tables', 16),
(63, 'Table Joining', 16),
(64, 'Regular Expression Matching', 16),
(65, 'Edgar Codd', 17),
(66, 'Xigang Koi', 17),
(67, 'William Crawford', 17),
(68, 'Mahatma Coate', 17),
(69, 'CONCAT ( \"A\" , \"B\" )', 18),
(70, 'CONCAT( \"A\"  \"B\" )', 18),
(71, 'CONCAT ( A  B )', 18),
(72, 'CONCAT ( A , B )', 18),
(73, 'REVOKE', 19),
(74, 'UNDO', 19),
(75, 'UNGRANT', 19),
(76, ' DELETE', 19),
(77, '65535', 20),
(78, '255', 20),
(79, '7', 20),
(80, '2 (True And False)', 20);

-- --------------------------------------------------------

--
-- Table structure for table `level1`
--

CREATE TABLE `level1` (
  `qid` int(250) NOT NULL,
  `question` varchar(250) NOT NULL,
  `ans_id` int(250) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `level1`
--

INSERT INTO `level1` (`qid`, `question`, `ans_id`) VALUES
(1, 'Which Program Copies The Databases From One Server To Another?', 1),
(2, 'To Use \'mysqldbcopy\' Which Privileges Are Required On The Source Server?', 5),
(3, 'The Function \'fetchrow_hashref()\' Returns Reference To Hash Of Row Values Keyed By', 9),
(4, 'Which Function Returns Reference To Array Of Row Values?', 13),
(5, 'Which Is The Log In Which Data Changes Received From A Replication Master Server Are Written?', 17);

-- --------------------------------------------------------

--
-- Table structure for table `level2`
--

CREATE TABLE `level2` (
  `qid` int(250) NOT NULL,
  `question` varchar(250) NOT NULL,
  `ans_id` int(250) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `level2`
--

INSERT INTO `level2` (`qid`, `question`, `ans_id`) VALUES
(6, 'The Maximum Length Of The Char Columns Is', 21),
(7, 'Mysql Support Different Character Sets, Which Command Is Used To Display All Character Sets?', 25),
(8, 'Which One Is The Correct Declaration For Choosing The Character Set Other Than Default?', 29),
(9, 'Which Among The Following Have The Maximum Bytes?', 33),
(10, 'The \"father\" Of MySQL Is ______.', 37);

-- --------------------------------------------------------

--
-- Table structure for table `level3`
--

CREATE TABLE `level3` (
  `qid` int(250) NOT NULL,
  `question` varchar(250) NOT NULL,
  `ans_id` int(250) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `level3`
--

INSERT INTO `level3` (`qid`, `question`, `ans_id`) VALUES
(11, 'To Use MySQL On Your Computer, You\'ll Need', 41),
(12, 'The Main MySQL Program That Does All The Data Handling Is Called', 45),
(13, 'What Kind Of Replication Is Supported By The MySQL Server?', 49),
(14, 'Commands Passed To The MySQL Daemon Are Written In', 53),
(15, 'MySQL Runs On Which Operating Systems?', 57);

-- --------------------------------------------------------

--
-- Table structure for table `level4`
--

CREATE TABLE `level4` (
  `qid` int(250) NOT NULL,
  `question` varchar(250) NOT NULL,
  `ans_id` int(250) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `level4`
--

INSERT INTO `level4` (`qid`, `question`, `ans_id`) VALUES
(16, 'Which Of The Following Is NOT Supported By MySQL', 61),
(17, 'One Of The Early Proponents Of Relational Database Who Laid Down Many Of The Principles We Use To This Day Was:', 65),
(18, 'Which Of These Is A Valid Call To A Function (watch The Spaces Carefully!)', 69),
(19, 'If You Want To Undo A GRANT, You Should Use', 73),
(20, 'How Many Distinct, Different Values Can You Hold In An Enum Field?', 77);

-- --------------------------------------------------------

--
-- Table structure for table `scores`
--

CREATE TABLE `scores` (
  `id` int(250) NOT NULL,
  `uname` varchar(250) NOT NULL,
  `s1` int(250) NOT NULL,
  `s2` int(250) NOT NULL,
  `s3` int(250) NOT NULL,
  `s4` int(250) NOT NULL,
  `ptr` varchar(250) NOT NULL,
  `total` int(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `scores`
--

INSERT INTO `scores` (`id`, `uname`, `s1`, `s2`, `s3`, `s4`, `ptr`, `total`) VALUES
(20, 'rahul', 2, 2, 2, 1, '', 7),
(21, 'akhil', 3, 3, 4, 2, '', 12);

-- --------------------------------------------------------

--
-- Table structure for table `signup`
--

CREATE TABLE `signup` (
  `id` int(250) NOT NULL,
  `username` varchar(250) NOT NULL,
  `pass` varchar(250) NOT NULL,
  `confirmpass` varchar(250) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `signup`
--

INSERT INTO `signup` (`id`, `username`, `pass`, `confirmpass`) VALUES
(8, 'Badrinath', 'none', ''),
(9, 'abhishek', '123', ''),
(10, 'rahul', '123', ''),
(11, 'siri', '12', ''),
(12, 'akhil', '321', '');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `uid` int(250) NOT NULL,
  `username` varchar(250) NOT NULL,
  `totques` int(250) NOT NULL,
  `anscrt` int(250) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `answers`
--
ALTER TABLE `answers`
  ADD PRIMARY KEY (`aid`);

--
-- Indexes for table `level1`
--
ALTER TABLE `level1`
  ADD PRIMARY KEY (`qid`);

--
-- Indexes for table `level2`
--
ALTER TABLE `level2`
  ADD PRIMARY KEY (`qid`);

--
-- Indexes for table `level3`
--
ALTER TABLE `level3`
  ADD PRIMARY KEY (`qid`);

--
-- Indexes for table `level4`
--
ALTER TABLE `level4`
  ADD PRIMARY KEY (`qid`);

--
-- Indexes for table `scores`
--
ALTER TABLE `scores`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `signup`
--
ALTER TABLE `signup`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`uid`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `answers`
--
ALTER TABLE `answers`
  MODIFY `aid` int(250) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=81;

--
-- AUTO_INCREMENT for table `level1`
--
ALTER TABLE `level1`
  MODIFY `qid` int(250) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `level2`
--
ALTER TABLE `level2`
  MODIFY `qid` int(250) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT for table `level3`
--
ALTER TABLE `level3`
  MODIFY `qid` int(250) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;

--
-- AUTO_INCREMENT for table `level4`
--
ALTER TABLE `level4`
  MODIFY `qid` int(250) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=22;

--
-- AUTO_INCREMENT for table `scores`
--
ALTER TABLE `scores`
  MODIFY `id` int(250) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=22;

--
-- AUTO_INCREMENT for table `signup`
--
ALTER TABLE `signup`
  MODIFY `id` int(250) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `uid` int(250) NOT NULL AUTO_INCREMENT;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
