-- phpMyAdmin SQL Dump
-- version 4.5.1
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: Oct 18, 2016 at 12:09 AM
-- Server version: 10.1.16-MariaDB
-- PHP Version: 5.6.24

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `answerskart`
--

-- --------------------------------------------------------

--
-- Table structure for table `answers_table`
--

CREATE TABLE `answers_table` (
  `answer_id` int(11) NOT NULL,
  `question_id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `answer` longtext NOT NULL,
  `marks` tinyint(1) NOT NULL DEFAULT '0',
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `answers_table`
--

INSERT INTO `answers_table` (`answer_id`, `question_id`, `user_id`, `answer`, `marks`, `created_at`) VALUES
(1, 1, 2, 'INSERT INTO table_name\nVALUES (value1,value2,value3,...);', 1, '2016-10-16 02:05:58'),
(3, 1, 3, 'It is better to refer w3schools for this.', 0, '2016-10-16 04:46:08'),
(5, 5, 6, 'foreach ($array as $value) {\r\n    code to be executed;\r\n}', 0, '2016-10-16 04:48:00'),
(6, 6, 9, '.btn-primary, .btn-primary:hover, .btn-primary:active, .btn-primary:visited {\r\n    background-color: #8064A2 !important;\r\n}', 1, '2016-10-16 04:51:56'),
(7, 7, 12, 'f = open(''myfile'',''w'')\r\nf.write(''hi there\\n'') # python will convert \\n to os.linesep\r\nf.close() # you can omit in most cases as the destructor will call it', 0, '2016-10-16 04:52:43'),
(8, 0, 1, 'hi my name is dinesh', 0, '2016-10-17 02:48:38'),
(9, 0, 1, 'Post your Answer here', 0, '2016-10-17 02:50:30'),
(10, 0, 1, 'Post your Answer here', 0, '2016-10-17 02:51:12'),
(11, 0, 1, 'Post your Answer here', 0, '2016-10-17 02:55:07'),
(12, 0, 1, 'Post your Answer here', 0, '2016-10-17 02:56:14'),
(13, 0, 1, 'Post your Answer here', 0, '2016-10-17 03:31:20'),
(14, 0, 1, 'Post your Answer here', 0, '2016-10-17 03:33:29'),
(15, 57, 1, 'Post your Answer here', 0, '2016-10-17 03:34:58'),
(16, 57, 1, 'Post your Answer here', 1, '2016-10-17 03:35:02'),
(17, 4, 1, '<span style="box-sizing: inherit; font-family: Consolas, &quot;courier new&quot;; font-size: 16px; color: brown;"><span style="box-sizing: inherit; color: mediumblue;">&lt;</span>form<span style="box-sizing: inherit; color: mediumblue;">&gt;</span></span><br style="box-sizing: inherit; font-family: Consolas, &quot;courier new&quot;; font-size: 16px;"><span style="box-sizing: inherit; font-family: Consolas, &quot;courier new&quot;; font-size: 16px; color: brown;"><span style="box-sizing: inherit; color: mediumblue;">&lt;</span>select<span style="box-sizing: inherit; color: red;">&nbsp;name<span style="box-sizing: inherit; color: mediumblue;">="users"</span>&nbsp;onchange<span style="box-sizing: inherit; color: mediumblue;">="showUser(this.value)"</span></span><span style="box-sizing: inherit; color: mediumblue;">&gt;</span></span><br style="box-sizing: inherit; font-family: Consolas, &quot;courier new&quot;; font-size: 16px;"><span style="font-family: Consolas, &quot;courier new&quot;; font-size: 16px;">&nbsp;&nbsp;</span><span style="box-sizing: inherit; font-family: Consolas, &quot;courier new&quot;; font-size: 16px; color: brown;"><span style="box-sizing: inherit; color: mediumblue;">&lt;</span>option<span style="box-sizing: inherit; color: red;">&nbsp;value<span style="box-sizing: inherit; color: mediumblue;">=""</span></span><span style="box-sizing: inherit; color: mediumblue;">&gt;</span></span><span style="font-family: Consolas, &quot;courier new&quot;; font-size: 16px;">Select a person:</span><span style="box-sizing: inherit; font-family: Consolas, &quot;courier new&quot;; font-size: 16px; color: brown;"><span style="box-sizing: inherit; color: mediumblue;">&lt;</span>/option<span style="box-sizing: inherit; color: mediumblue;">&gt;</span></span><br style="box-sizing: inherit; font-family: Consolas, &quot;courier new&quot;; font-size: 16px;"><span style="font-family: Consolas, &quot;courier new&quot;; font-size: 16px;">&nbsp;&nbsp;</span><span style="box-sizing: inherit; font-family: Consolas, &quot;courier new&quot;; font-size: 16px; color: brown;"><span style="box-sizing: inherit; color: mediumblue;">&lt;</span>option<span style="box-sizing: inherit; color: red;">&nbsp;value<span style="box-sizing: inherit; color: mediumblue;">="1"</span></span><span style="box-sizing: inherit; color: mediumblue;">&gt;</span></span><span style="font-family: Consolas, &quot;courier new&quot;; font-size: 16px;">Peter Griffin</span><span style="box-sizing: inherit; font-family: Consolas, &quot;courier new&quot;; font-size: 16px; color: brown;"><span style="box-sizing: inherit; color: mediumblue;">&lt;</span>/option<span style="box-sizing: inherit; color: mediumblue;">&gt;</span></span><br style="box-sizing: inherit; font-family: Consolas, &quot;courier new&quot;; font-size: 16px;"><span style="font-family: Consolas, &quot;courier new&quot;; font-size: 16px;">&nbsp;&nbsp;</span><span style="box-sizing: inherit; font-family: Consolas, &quot;courier new&quot;; font-size: 16px; color: brown;"><span style="box-sizing: inherit; color: mediumblue;">&lt;</span>option<span style="box-sizing: inherit; color: red;">&nbsp;value<span style="box-sizing: inherit; color: mediumblue;">="2"</span></span><span style="box-sizing: inherit; color: mediumblue;">&gt;</span></span><span style="font-family: Consolas, &quot;courier new&quot;; font-size: 16px;">Lois Griffin</span><span style="box-sizing: inherit; font-family: Consolas, &quot;courier new&quot;; font-size: 16px; color: brown;"><span style="box-sizing: inherit; color: mediumblue;">&lt;</span>/option<span style="box-sizing: inherit; color: mediumblue;">&gt;</span></span><br style="box-sizing: inherit; font-family: Consolas, &quot;courier new&quot;; font-size: 16px;"><span style="font-family: Consolas, &quot;courier new&quot;; font-size: 16px;">&nbsp;&nbsp;</span><span style="box-sizing: inherit; font-family: Consolas, &quot;courier new&quot;; font-size: 16px; color: brown;"><span style="box-sizing: inherit; color: mediumblue;">&lt;</span>option<span style="box-sizing: inherit; color: red;">&nbsp;value<span style="box-sizing: inherit; color: mediumblue;">="3"</span></span><span style="box-sizing: inherit; color: mediumblue;">&gt;</span></span><span style="font-family: Consolas, &quot;courier new&quot;; font-size: 16px;">Joseph Swanson</span><span style="box-sizing: inherit; font-family: Consolas, &quot;courier new&quot;; font-size: 16px; color: brown;"><span style="box-sizing: inherit; color: mediumblue;">&lt;</span>/option<span style="box-sizing: inherit; color: mediumblue;">&gt;</span></span><br style="box-sizing: inherit; font-family: Consolas, &quot;courier new&quot;; font-size: 16px;"><span style="font-family: Consolas, &quot;courier new&quot;; font-size: 16px;">&nbsp;&nbsp;</span><span style="box-sizing: inherit; font-family: Consolas, &quot;courier new&quot;; font-size: 16px; color: brown;"><span style="box-sizing: inherit; color: mediumblue;">&lt;</span>option<span style="box-sizing: inherit; color: red;">&nbsp;value<span style="box-sizing: inherit; color: mediumblue;">="4"</span></span><span style="box-sizing: inherit; color: mediumblue;">&gt;</span></span><span style="font-family: Consolas, &quot;courier new&quot;; font-size: 16px;">Glenn Quagmire</span><span style="box-sizing: inherit; font-family: Consolas, &quot;courier new&quot;; font-size: 16px; color: brown;"><span style="box-sizing: inherit; color: mediumblue;">&lt;</span>/option<span style="box-sizing: inherit; color: mediumblue;">&gt;</span></span><br style="box-sizing: inherit; font-family: Consolas, &quot;courier new&quot;; font-size: 16px;"><span style="font-family: Consolas, &quot;courier new&quot;; font-size: 16px;">&nbsp;&nbsp;</span><span style="box-sizing: inherit; font-family: Consolas, &quot;courier new&quot;; font-size: 16px; color: brown;"><span style="box-sizing: inherit; color: mediumblue;">&lt;</span>/select<span style="box-sizing: inherit; color: mediumblue;">&gt;</span></span><br style="box-sizing: inherit; font-family: Consolas, &quot;courier new&quot;; font-size: 16px;"><span style="box-sizing: inherit; font-family: Consolas, &quot;courier new&quot;; font-size: 16px; color: brown;"><span style="box-sizing: inherit; color: mediumblue;">&lt;</span>/form<span style="box-sizing: inherit; color: mediumblue;">&gt;</span></span>', 0, '2016-10-17 03:51:09'),
(18, 4, 1, '<span style="box-sizing: inherit; font-family: Consolas, &quot;courier new&quot;; font-size: 16px; color: brown;"><span style="box-sizing: inherit; color: mediumblue;">&lt;</span>form<span style="box-sizing: inherit; color: mediumblue;">&gt;</span></span><br style="box-sizing: inherit; font-family: Consolas, &quot;courier new&quot;; font-size: 16px;"><span style="box-sizing: inherit; font-family: Consolas, &quot;courier new&quot;; font-size: 16px; color: brown;"><span style="box-sizing: inherit; color: mediumblue;">&lt;</span>select<span style="box-sizing: inherit; color: red;">&nbsp;name<span style="box-sizing: inherit; color: mediumblue;">="users"</span>&nbsp;onchange<span style="box-sizing: inherit; color: mediumblue;">="showUser(this.value)"</span></span><span style="box-sizing: inherit; color: mediumblue;">&gt;</span></span><br style="box-sizing: inherit; font-family: Consolas, &quot;courier new&quot;; font-size: 16px;"><span style="font-family: Consolas, &quot;courier new&quot;; font-size: 16px;">&nbsp;&nbsp;</span><span style="box-sizing: inherit; font-family: Consolas, &quot;courier new&quot;; font-size: 16px; color: brown;"><span style="box-sizing: inherit; color: mediumblue;">&lt;</span>option<span style="box-sizing: inherit; color: red;">&nbsp;value<span style="box-sizing: inherit; color: mediumblue;">=""</span></span><span style="box-sizing: inherit; color: mediumblue;">&gt;</span></span><span style="font-family: Consolas, &quot;courier new&quot;; font-size: 16px;">Select a person:</span><span style="box-sizing: inherit; font-family: Consolas, &quot;courier new&quot;; font-size: 16px; color: brown;"><span style="box-sizing: inherit; color: mediumblue;">&lt;</span>/option<span style="box-sizing: inherit; color: mediumblue;">&gt;</span></span><br style="box-sizing: inherit; font-family: Consolas, &quot;courier new&quot;; font-size: 16px;"><span style="font-family: Consolas, &quot;courier new&quot;; font-size: 16px;">&nbsp;&nbsp;</span><span style="box-sizing: inherit; font-family: Consolas, &quot;courier new&quot;; font-size: 16px; color: brown;"><span style="box-sizing: inherit; color: mediumblue;">&lt;</span>option<span style="box-sizing: inherit; color: red;">&nbsp;value<span style="box-sizing: inherit; color: mediumblue;">="1"</span></span><span style="box-sizing: inherit; color: mediumblue;">&gt;</span></span><span style="font-family: Consolas, &quot;courier new&quot;; font-size: 16px;">Peter Griffin</span><span style="box-sizing: inherit; font-family: Consolas, &quot;courier new&quot;; font-size: 16px; color: brown;"><span style="box-sizing: inherit; color: mediumblue;">&lt;</span>/option<span style="box-sizing: inherit; color: mediumblue;">&gt;</span></span><br style="box-sizing: inherit; font-family: Consolas, &quot;courier new&quot;; font-size: 16px;"><span style="font-family: Consolas, &quot;courier new&quot;; font-size: 16px;">&nbsp;&nbsp;</span><span style="box-sizing: inherit; font-family: Consolas, &quot;courier new&quot;; font-size: 16px; color: brown;"><span style="box-sizing: inherit; color: mediumblue;">&lt;</span>option<span style="box-sizing: inherit; color: red;">&nbsp;value<span style="box-sizing: inherit; color: mediumblue;">="2"</span></span><span style="box-sizing: inherit; color: mediumblue;">&gt;</span></span><span style="font-family: Consolas, &quot;courier new&quot;; font-size: 16px;">Lois Griffin</span><span style="box-sizing: inherit; font-family: Consolas, &quot;courier new&quot;; font-size: 16px; color: brown;"><span style="box-sizing: inherit; color: mediumblue;">&lt;</span>/option<span style="box-sizing: inherit; color: mediumblue;">&gt;</span></span><br style="box-sizing: inherit; font-family: Consolas, &quot;courier new&quot;; font-size: 16px;"><span style="font-family: Consolas, &quot;courier new&quot;; font-size: 16px;">&nbsp;&nbsp;</span><span style="box-sizing: inherit; font-family: Consolas, &quot;courier new&quot;; font-size: 16px; color: brown;"><span style="box-sizing: inherit; color: mediumblue;">&lt;</span>option<span style="box-sizing: inherit; color: red;">&nbsp;value<span style="box-sizing: inherit; color: mediumblue;">="3"</span></span><span style="box-sizing: inherit; color: mediumblue;">&gt;</span></span><span style="font-family: Consolas, &quot;courier new&quot;; font-size: 16px;">Joseph Swanson</span><span style="box-sizing: inherit; font-family: Consolas, &quot;courier new&quot;; font-size: 16px; color: brown;"><span style="box-sizing: inherit; color: mediumblue;">&lt;</span>/option<span style="box-sizing: inherit; color: mediumblue;">&gt;</span></span><br style="box-sizing: inherit; font-family: Consolas, &quot;courier new&quot;; font-size: 16px;"><span style="font-family: Consolas, &quot;courier new&quot;; font-size: 16px;">&nbsp;&nbsp;</span><span style="box-sizing: inherit; font-family: Consolas, &quot;courier new&quot;; font-size: 16px; color: brown;"><span style="box-sizing: inherit; color: mediumblue;">&lt;</span>option<span style="box-sizing: inherit; color: red;">&nbsp;value<span style="box-sizing: inherit; color: mediumblue;">="4"</span></span><span style="box-sizing: inherit; color: mediumblue;">&gt;</span></span><span style="font-family: Consolas, &quot;courier new&quot;; font-size: 16px;">Glenn Quagmire</span><span style="box-sizing: inherit; font-family: Consolas, &quot;courier new&quot;; font-size: 16px; color: brown;"><span style="box-sizing: inherit; color: mediumblue;">&lt;</span>/option<span style="box-sizing: inherit; color: mediumblue;">&gt;</span></span><br style="box-sizing: inherit; font-family: Consolas, &quot;courier new&quot;; font-size: 16px;"><span style="font-family: Consolas, &quot;courier new&quot;; font-size: 16px;">&nbsp;&nbsp;</span><span style="box-sizing: inherit; font-family: Consolas, &quot;courier new&quot;; font-size: 16px; color: brown;"><span style="box-sizing: inherit; color: mediumblue;">&lt;</span>/select<span style="box-sizing: inherit; color: mediumblue;">&gt;</span></span><br style="box-sizing: inherit; font-family: Consolas, &quot;courier new&quot;; font-size: 16px;"><span style="box-sizing: inherit; font-family: Consolas, &quot;courier new&quot;; font-size: 16px; color: brown;"><span style="box-sizing: inherit; color: mediumblue;">&lt;</span>/form<span style="box-sizing: inherit; color: mediumblue;">&gt;</span></span>', 0, '2016-10-17 03:51:58'),
(19, 58, 1, 'Post your Answer here', 0, '2016-10-17 03:58:29'),
(20, 57, 1, 'answer 20', 0, '2016-10-17 07:11:44'),
(21, 7, 1, 'Post your Answer here', 1, '2016-10-17 08:16:38'),
(22, 5, 2, 'I dont&nbsp;know', 0, '2016-10-17 10:25:27'),
(23, 5, 2, 'I will not tell', 1, '2016-10-17 17:28:20'),
(24, 4, 1, '<div>"&lt;?php&nbsp;</div><div>for ($x = 0; $x &lt;= 10; $x++) {</div><div>&nbsp; &nbsp; echo "The number is: $x &lt;br&gt;";</div><div>}"&nbsp;</div><div>?&gt;</div>', 0, '2016-10-18 00:24:42'),
(25, 7, 1, 'vamshi''s', 0, '2016-10-18 02:31:13');

-- --------------------------------------------------------

--
-- Table structure for table `login_details`
--

CREATE TABLE `login_details` (
  `admin` varchar(256) NOT NULL,
  `password` varchar(256) NOT NULL,
  `user_id` int(100) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `login_details`
--

INSERT INTO `login_details` (`admin`, `password`, `user_id`, `created_at`) VALUES
('admin', 'cs518pa$$', 1, '2016-10-15 22:51:02'),
('jbrunelle', 'M0n@rch$', 2, '2016-10-15 22:51:02'),
('pvenkman', 'imadoctor', 3, '2016-10-15 22:51:02'),
('rstantz', '"; INSERT INTO Customers (CustomerName,Address,City) Values(@0,@1,@2); --', 4, '2016-10-15 22:51:02'),
('dbarrett', 'fr1ed3GGS', 5, '2016-10-15 22:51:02'),
('ltully', '<!--<i>', 7, '2016-10-15 22:51:02'),
('espengler', 'don''t cross the streams', 8, '2016-10-15 22:51:02'),
('janine', '--!drop tables;', 9, '2016-10-15 22:51:02'),
('winston', 'zeddM0r3', 10, '2016-10-15 22:51:02'),
('gozer', 'd3$truct0R', 11, '2016-10-15 22:51:02'),
('slimer', 'f33dM3', 12, '2016-10-15 22:51:02'),
('zuul', '105"; DROP TABLE', 13, '2016-10-15 22:51:02'),
('keymaster', 'n0D@na', 14, '2016-10-15 22:51:02'),
('gatekeeper', '$l0r', 15, '2016-10-15 22:51:02'),
('staypuft', 'm@r$hM@ll0w', 16, '2016-10-15 22:51:02');

-- --------------------------------------------------------

--
-- Table structure for table `questions_table`
--

CREATE TABLE `questions_table` (
  `question_id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `title` longtext NOT NULL,
  `content` longtext NOT NULL,
  `tags` varchar(255) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `questions_table`
--

INSERT INTO `questions_table` (`question_id`, `user_id`, `title`, `content`, `tags`, `created_at`) VALUES
(1, 1, 'Inserting into sql database', 'How to insert into sql database ?', 'sql', '2016-10-16 01:58:43'),
(4, 1, 'php for loop', 'I need a sample example which shows php for loop', 'php', '2016-10-16 04:27:22'),
(5, 2, 'php foreach loop', 'Please show me how to write basic foreach loop', 'php', '2016-10-16 04:29:40'),
(6, 1, 'How to change btn color in Bootstrap', 'Is there a way to change all .btn properties in Bootstrap? I have tried below ones, but still sometimes it shows the default blue color (say after clicking and removing the mouse etc).', 'bootstrap,css', '2016-10-16 04:34:10'),
(7, 3, 'Correct way to write line to file in Python', 'I''m used to doing print >>f, "hi there"\n\nHowever, it seems that print >> is getting deprecated. What is the recommended way to do the line above?', 'python', '2016-10-16 04:36:08');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `answers_table`
--
ALTER TABLE `answers_table`
  ADD PRIMARY KEY (`answer_id`),
  ADD UNIQUE KEY `answer_id` (`answer_id`),
  ADD KEY `user_id` (`user_id`),
  ADD KEY `question_id` (`question_id`);

--
-- Indexes for table `login_details`
--
ALTER TABLE `login_details`
  ADD PRIMARY KEY (`user_id`),
  ADD UNIQUE KEY `user_id` (`user_id`);

--
-- Indexes for table `questions_table`
--
ALTER TABLE `questions_table`
  ADD PRIMARY KEY (`question_id`),
  ADD UNIQUE KEY `question_id` (`question_id`),
  ADD KEY `user_id` (`user_id`) USING BTREE;

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `answers_table`
--
ALTER TABLE `answers_table`
  MODIFY `answer_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=26;
--
-- AUTO_INCREMENT for table `login_details`
--
ALTER TABLE `login_details`
  MODIFY `user_id` int(100) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;
--
-- AUTO_INCREMENT for table `questions_table`
--
ALTER TABLE `questions_table`
  MODIFY `question_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=70;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
