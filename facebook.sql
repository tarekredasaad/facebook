-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: May 09, 2022 at 10:19 PM
-- Server version: 10.4.22-MariaDB
-- PHP Version: 8.1.2

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `facebook`
--

-- --------------------------------------------------------

--
-- Table structure for table `comments`
--

CREATE TABLE `comments` (
  `com_id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `post_id` int(11) NOT NULL,
  `comments` varchar(255) NOT NULL,
  `comment_author` varchar(255) NOT NULL,
  `date` timestamp NOT NULL DEFAULT current_timestamp(),
  `likes` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `comments`
--

INSERT INTO `comments` (`com_id`, `user_id`, `post_id`, `comments`, `comment_author`, `date`, `likes`) VALUES
(1, 2147483647, 81915975, '   good post', 'moaaz reda', '2022-04-12 15:01:43', 1),
(3, 23467538, 2147483647, '   good post i will follow you', 'saad ahmed', '2022-04-13 03:06:52', 1),
(4, 2147483647, 169530, '   be carful ', 'moaaz reda', '2022-04-13 11:36:09', 0),
(5, 1109, 169530, '   This is my comment ', 'Fatima Nabeel', '2022-04-16 23:52:02', 1),
(6, 1109, 9344454, '   follow my content if you want more information', 'Fatima Nabeel', '2022-04-16 23:53:13', 1),
(11, 1109, 9344454, 'follow my content if you want more information\r\n', 'Fatima Nabeel', '2022-04-17 00:05:02', 0),
(12, 2, 169530, '   well done', 'HalaSamir', '2022-04-17 01:17:08', 0);

-- --------------------------------------------------------

--
-- Table structure for table `content_i_follow`
--

CREATE TABLE `content_i_follow` (
  `id` bigint(20) NOT NULL,
  `userid` bigint(20) NOT NULL,
  `contentid` bigint(20) NOT NULL,
  `content_type` varchar(10) NOT NULL,
  `disabled` tinyint(1) NOT NULL,
  `date` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `friends`
--

CREATE TABLE `friends` (
  `id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `friend_id` int(11) NOT NULL,
  `friend_name` varchar(20) NOT NULL,
  `friend_img` varchar(20) NOT NULL,
  `user_name` varchar(20) NOT NULL,
  `user_img` varchar(25) NOT NULL,
  `status` varchar(20) NOT NULL,
  `date` datetime NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `friends`
--

INSERT INTO `friends` (`id`, `user_id`, `friend_id`, `friend_name`, `friend_img`, `user_name`, `user_img`, `status`, `date`) VALUES
(1, 1109, 23467538, 'saad ahmed', 'member2.jpg', 'Fatima Nabeel', 'member1.jpg', 'friend', '2022-04-29 00:58:57'),
(2, 8, 1109, 'Fatima Nabeel', 'member1.jpg', 'SaraMostafa', '', 'friend', '2022-04-29 01:45:22'),
(3, 1109, 4, 'NabilAhmed', '', 'Fatima Nabeel', 'member1.jpg', 'friend', '2022-05-02 01:18:44'),
(4, 4, 1, 'EhabMohamed', '', 'NabilAhmed', '', 'friend', '2022-05-02 01:39:36'),
(5, 2, 1109, 'Fatima Nabeel', 'member1.jpg', 'HalaSamir', '', '', '2022-05-02 02:53:49'),
(7, 1109, 2147483647, '', '', '', '', 'pending', '2022-05-03 17:43:02'),
(8, 2147483647, 8, '', '', '', '', 'pending', '2022-05-03 18:07:18'),
(9, 2147483647, 4, '', '', '', '', 'friend', '2022-05-03 18:12:08'),
(10, 2, 4, '', '', '', '', 'pending', '2022-05-03 19:02:19'),
(11, 2, 1109, '', '', '', '', 'pending', '2022-05-03 19:12:42');

-- --------------------------------------------------------

--
-- Table structure for table `friend_request`
--

CREATE TABLE `friend_request` (
  `id` bigint(20) NOT NULL,
  `owner_request` bigint(20) NOT NULL,
  `owner_target` bigint(20) NOT NULL,
  `request_status` varchar(20) NOT NULL,
  `date` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `friend_request`
--

INSERT INTO `friend_request` (`id`, `owner_request`, `owner_target`, `request_status`, `date`) VALUES
(5, 8, 1109, 'friend', '2022-04-29 18:18:59'),
(6, 1109, 23467538, 'friend', '2022-05-01 01:32:32'),
(8, 1109, 2147483647, 'pending', '2022-05-01 01:50:37'),
(9, 1109, 2, 'friend', '2022-05-02 02:59:20');

-- --------------------------------------------------------

--
-- Table structure for table `friend_suggestions`
--

CREATE TABLE `friend_suggestions` (
  `id` int(11) NOT NULL,
  `user_id` bigint(20) NOT NULL,
  `user_name` varchar(20) NOT NULL,
  `other_user_id` bigint(20) NOT NULL,
  `other_user_name` varchar(20) NOT NULL,
  `rel_status` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `groups`
--

CREATE TABLE `groups` (
  `groupID` bigint(20) NOT NULL,
  `createdBY` bigint(20) NOT NULL,
  `groupName` varchar(20) NOT NULL,
  `date` datetime NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `groups`
--

INSERT INTO `groups` (`groupID`, `createdBY`, `groupName`, `date`) VALUES
(1, 1109, 'code', '0000-00-00 00:00:00'),
(2, 2147483647, 'developers', '2022-04-24 21:58:24');

-- --------------------------------------------------------

--
-- Table structure for table `group_members`
--

CREATE TABLE `group_members` (
  `id` int(11) NOT NULL,
  `group_ID` int(11) NOT NULL,
  `userid` int(11) NOT NULL,
  `role` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `group_members`
--

INSERT INTO `group_members` (`id`, `group_ID`, `userid`, `role`) VALUES
(4, 2, 1109, '');

-- --------------------------------------------------------

--
-- Table structure for table `group_post`
--

CREATE TABLE `group_post` (
  `G_Post_id` bigint(20) NOT NULL,
  `userid` bigint(20) NOT NULL,
  `post` text NOT NULL,
  `image` varchar(50) NOT NULL,
  `likes` int(11) NOT NULL,
  `comments` int(111) NOT NULL,
  `date` datetime NOT NULL DEFAULT current_timestamp(),
  `group_ID` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `group_post`
--

INSERT INTO `group_post` (`G_Post_id`, `userid`, `post`, `image`, `likes`, `comments`, `date`, `group_ID`) VALUES
(7, 2147483647, 'ggggg', '', 0, 0, '2022-04-25 01:27:00', 0),
(8, 2147483647, 'ggggg', '', 0, 0, '2022-04-25 01:28:13', 1),
(9, 2, 'ff hh ', '', 0, 0, '2022-04-25 01:36:37', 1),
(10, 2147483647, 'ff hh ', '', 0, 0, '2022-04-25 01:58:15', 1),
(19, 23467538, 'hi every one', '', 0, 0, '2022-04-25 03:21:35', 2),
(23, 4, 'hi every one', '', 0, 0, '2022-04-25 03:27:24', 2);

-- --------------------------------------------------------

--
-- Table structure for table `likes`
--

CREATE TABLE `likes` (
  `id` int(11) NOT NULL,
  `type` varchar(250) NOT NULL,
  `contentid` int(11) NOT NULL,
  `likes` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `likes`
--

INSERT INTO `likes` (`id`, `type`, `contentid`, `likes`) VALUES
(1, 'post', 81915975, '{\"user\":[0,\"8\"]}'),
(3, 'post', 9344454, '{\"user\":[0,\"2147483647\"]}'),
(4, 'post', 2147483647, '{\"user\":[0,\"1109\",\"8\"]}'),
(5, 'comment', 169530, '{\"user\":[0,\"2147483647\"]}'),
(6, 'comment', 2147483647, '{\"user\":[0]}'),
(7, 'post', 8651, '{\"user\":[0,\"2147483647\"]}'),
(8, 'comment', 9344454, '{\"user\":[0,\"2147483647\"]}'),
(9, 'post', 169530, '{\"user\":[]}'),
(10, 'post', 17368753, '{\"user\":[\"8\",\"2\",\"23467538\"]}');

-- --------------------------------------------------------

--
-- Table structure for table `message`
--

CREATE TABLE `message` (
  `id` int(11) NOT NULL,
  `sender` bigint(20) NOT NULL,
  `receiver` bigint(20) NOT NULL,
  `file` varchar(255) NOT NULL,
  `message` text NOT NULL,
  `seen` tinyint(1) NOT NULL DEFAULT 0,
  `received` tinyint(1) NOT NULL DEFAULT 0,
  `delete_sender` tinyint(1) NOT NULL DEFAULT 0,
  `delete_receiver` tinyint(1) NOT NULL DEFAULT 0,
  `date` datetime NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `message`
--

INSERT INTO `message` (`id`, `sender`, `receiver`, `file`, `message`, `seen`, `received`, `delete_sender`, `delete_receiver`, `date`) VALUES
(2, 23467538, 2147483647, '', 'hi moaaz how are you', 1, 0, 0, 0, '2022-04-19 01:54:19'),
(3, 23467538, 1109, '', 'hi fatma how are you ', 1, 0, 0, 0, '2022-04-19 01:55:42'),
(4, 23467538, 2147483647, '', 'Do what i ask', 1, 0, 0, 0, '2022-04-22 17:13:34'),
(6, 2147483647, 23467538, '', ' i am fine thank you ', 1, 0, 0, 0, '2022-04-22 22:13:57'),
(7, 2147483647, 23467538, '', 'i will send what i do', 1, 0, 0, 0, '2022-04-22 23:04:00'),
(9, 2147483647, 1109, '', 'hi fatma', 1, 0, 0, 0, '2022-04-22 23:30:07'),
(10, 2147483647, 23467538, '', 'this is a new message', 1, 0, 0, 0, '2022-04-22 23:54:18'),
(11, 1109, 23467538, '', 'I am fine thank you', 1, 0, 0, 0, '2022-04-24 14:42:13'),
(12, 2147483647, 23467538, '', 'do you want say something\r\n', 0, 0, 0, 0, '2022-04-26 03:01:31');

-- --------------------------------------------------------

--
-- Table structure for table `messages`
--

CREATE TABLE `messages` (
  `message_id` int(11) NOT NULL,
  `from_id` int(11) NOT NULL,
  `to_id` varchar(200) CHARACTER SET utf8 NOT NULL,
  `message` text NOT NULL,
  `message_status` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `messages`
--

INSERT INTO `messages` (`message_id`, `from_id`, `to_id`, `message`, `message_status`) VALUES
(1, 1, '3', 'Hello Bhaavit', 1),
(2, 1, '2', 'Hello Amit', 1),
(3, 1, '1', 'Hello Vishal', 1),
(4, 1, '1', 'Hello Vishal', 1),
(5, 1, '1', 'Hi  Vishal', 1),
(6, 1, '2', 'Hi Amit', 1),
(7, 1, '3', 'Hello Bhaavit, ', 1),
(8, 3, '1', 'Hello Vishal', 1),
(9, 2, '1', 'Hi Hello Vishal', 1),
(10, 1, '2', 'Hello Amit,', 1),
(11, 1, '2', 'Hello Amit,', 1),
(12, 2, '3', 'good night', 1),
(13, 2, '0', 'how are you', 0),
(14, 2, '0', 'how are you', 0),
(15, 2, '0', 'how are you', 0),
(16, 2, '3', 'how are you', 1),
(17, 2, '1', 'hot cold', 1),
(18, 1, '2', 'gool luck', 1),
(20, 0, '1', 'hi', 1),
(21, 3, '1', 'ggg', 1),
(22, 3, '1', 'congratulation \r\nyour sister has married', 0),
(23, 3, '0', 'have a good day', 0),
(24, 3, '', 'have a good day', 0),
(25, 3, '', 'have a good day', 0),
(26, 3, '', 'have a good day', 0),
(27, 3, '', 'have a good day', 0),
(28, 3, '', 'have a good day', 0),
(29, 3, '', 'have a good day', 0);

-- --------------------------------------------------------

--
-- Table structure for table `notification`
--

CREATE TABLE `notification` (
  `id` bigint(20) NOT NULL,
  `userid` bigint(20) NOT NULL,
  `activity` varchar(100) NOT NULL,
  `contentid` bigint(20) NOT NULL,
  `content_owner` bigint(20) NOT NULL,
  `content_type` varchar(15) NOT NULL,
  `date` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `noti_status` int(1) NOT NULL DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `notification`
--

INSERT INTO `notification` (`id`, `userid`, `activity`, `contentid`, `content_owner`, `content_type`, `date`, `noti_status`) VALUES
(1, 2147483647, 'liked', 9344454, 1109, 'Post', '2022-04-18 22:44:34', 0),
(2, 23467538, 'liked', 9344454, 1109, 'Post', '2022-04-18 22:44:34', 0),
(3, 8, 'liked', 9344454, 1109, 'Post', '2022-04-18 22:44:34', 0),
(4, 8, 'liked', 81915975, 1109, 'Post', '2022-04-18 22:44:34', 0),
(8, 1109, 'commented', 9344454, 1109, 'Post', '2022-04-18 22:44:34', 0),
(9, 2, 'liked', 169530, 23467538, 'Post', '2022-04-18 15:00:19', 1),
(10, 2, 'liked', 169530, 23467538, 'Post', '2022-04-18 15:00:19', 1),
(11, 2, 'commented', 169530, 23467538, 'Post', '2022-04-22 23:01:52', 0),
(12, 2147483647, 'liked', 2147483647, 1109, 'Post', '2022-04-18 22:44:34', 0),
(13, 2147483647, 'liked', 169530, 23467538, 'Post', '2022-04-22 23:01:52', 0),
(28, 2147483647, 'liked', 9344454, 1109, 'comment', '2022-04-19 20:44:35', 0),
(29, 2147483647, 'messaged', 10, 23467538, 'Message', '2022-04-22 23:01:52', 0),
(30, 1109, 'messaged', 11, 23467538, 'Message', '2022-04-24 12:42:13', 0),
(31, 2147483647, 'messaged', 12, 23467538, 'Message', '2022-04-26 01:01:31', 0),
(32, 2147483647, 'liked', 169530, 23467538, 'post', '2022-04-26 12:32:20', 0),
(33, 23467538, 'liked', 169530, 23467538, 'post', '2022-04-26 12:38:28', 0),
(34, 2147483647, 'liked', 169530, 23467538, 'post', '2022-04-26 12:42:55', 0),
(35, 2147483647, 'liked', 169530, 23467538, 'post', '2022-04-26 13:03:35', 0),
(36, 2147483647, 'shared', 169530, 23467538, 'Post', '2022-04-27 22:14:18', 0),
(37, 2, 'shared', 2147483647, 1109, 'Post', '2022-04-28 01:08:30', 0),
(38, 23467538, 'shared', 8651, 2147483647, 'Post', '2022-04-28 01:31:46', 0),
(39, 23467538, 'shared', 81915975, 1109, 'Post', '2022-04-28 02:47:16', 0),
(40, 2147483647, 'shared', 169530, 23467538, 'Post', '2022-04-28 12:50:06', 0),
(41, 1109, 'liked', 2147483647, 1109, 'post', '2022-04-28 23:20:28', 0),
(42, 8, 'liked', 17368753, 8, 'post', '2022-04-29 16:10:02', 0),
(43, 8, 'liked', 2147483647, 1109, 'post', '2022-04-29 16:17:20', 0),
(44, 8, 'liked', 17368753, 8, 'post', '2022-04-29 17:41:06', 0),
(45, 8, 'liked', 17368753, 8, 'post', '2022-04-29 17:43:33', 0),
(46, 2, 'liked', 17368753, 8, 'post', '2022-04-29 20:57:42', 0),
(47, 2, 'liked', 17368753, 8, 'post', '2022-04-29 20:57:44', 0),
(48, 2, 'liked', 17368753, 8, 'post', '2022-04-29 20:57:44', 0),
(49, 2, 'liked', 17368753, 8, 'post', '2022-04-29 20:57:45', 0),
(50, 2, 'liked', 17368753, 8, 'post', '2022-04-29 20:57:56', 0),
(51, 2, 'liked', 17368753, 8, 'post', '2022-04-29 20:58:48', 0),
(52, 2, 'liked', 17368753, 8, 'post', '2022-04-29 20:58:48', 0),
(53, 2, 'liked', 17368753, 8, 'post', '2022-04-29 21:10:10', 0),
(54, 2, 'liked', 17368753, 8, 'post', '2022-04-29 21:11:25', 0),
(55, 2, 'liked', 17368753, 8, 'post', '2022-04-29 21:50:25', 0),
(56, 2, 'liked', 17368753, 8, 'post', '2022-04-29 21:50:27', 0),
(57, 2, 'liked', 17368753, 8, 'post', '2022-04-29 21:50:48', 0),
(58, 2, 'liked', 17368753, 8, 'post', '2022-04-29 21:50:51', 0),
(59, 2, 'liked', 17368753, 8, 'post', '2022-04-29 21:51:46', 0),
(60, 2, 'liked', 17368753, 8, 'post', '2022-04-29 21:51:52', 0),
(61, 2, 'liked', 17368753, 8, 'post', '2022-04-29 21:52:05', 0),
(62, 2, 'liked', 17368753, 8, 'post', '2022-04-29 21:53:45', 0),
(63, 2, 'liked', 17368753, 8, 'post', '2022-04-29 22:00:33', 0),
(64, 2, 'liked', 17368753, 8, 'post', '2022-04-29 22:07:34', 0),
(65, 2, 'liked', 17368753, 8, 'post', '2022-04-29 22:08:30', 0),
(66, 2, 'liked', 17368753, 8, 'post', '2022-04-29 22:09:44', 0),
(67, 2, 'liked', 17368753, 8, 'post', '2022-04-29 22:10:14', 0),
(68, 2, 'liked', 17368753, 8, 'post', '2022-04-29 22:11:27', 0),
(69, 2, 'liked', 17368753, 8, 'post', '2022-05-02 01:21:57', 0),
(70, 23467538, 'liked', 17368753, 8, 'post', '2022-05-02 01:22:29', 0),
(71, 23467538, 'liked', 9344454, 1109, 'post', '2022-05-05 12:07:48', 0),
(72, 23467538, 'liked', 9344454, 1109, 'post', '2022-05-05 12:10:17', 0),
(73, 23467538, 'liked', 9344454, 1109, 'post', '2022-05-05 12:10:23', 0),
(74, 23467538, 'liked', 9344454, 1109, 'post', '2022-05-05 12:10:25', 0),
(75, 23467538, 'liked', 9344454, 1109, 'post', '2022-05-05 12:10:27', 0);

-- --------------------------------------------------------

--
-- Table structure for table `post`
--

CREATE TABLE `post` (
  `id` int(11) NOT NULL,
  `postid` int(11) NOT NULL,
  `userid` int(11) NOT NULL,
  `post` text NOT NULL,
  `image` varchar(250) NOT NULL,
  `likes` int(11) NOT NULL,
  `comment` int(11) NOT NULL,
  `shares` int(11) NOT NULL,
  `post_shared` int(11) NOT NULL,
  `date` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `has_image` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `post`
--

INSERT INTO `post` (`id`, `postid`, `userid`, `post`, `image`, `likes`, `comment`, `shares`, `post_shared`, `date`, `has_image`) VALUES
(15, 169530, 23467538, 'i am engineery', '', 2, 3, 0, 0, '2022-04-29 23:10:02', 0),
(17, 81915975, 1109, 'i am a teacher', '', 1, 1, 0, 0, '2022-04-29 23:10:02', 0),
(18, 9344454, 1109, 'i am a teacher', '', 1, 3, 0, 0, '2022-05-05 12:10:27', 0),
(19, 2147483647, 1109, 'i am a teacher', '', 3, 1, 1, 0, '2022-04-29 16:17:20', 0),
(24, 8651, 2147483647, 'i am delivery and accountant', '', 1, 0, 1, 0, '2022-04-28 01:31:46', 0),
(27, 601985, 2, 'i am a teacher', '', 0, 0, 0, 1, '2022-04-28 01:24:34', 0),
(28, 18835, 23467538, 'i am delivery and accountant', '', 0, 0, 0, 1, '2022-04-28 01:31:46', 0),
(29, 97350964, 23467538, 'that is wrong', '', 0, 0, 0, 1, '2022-04-28 02:47:16', 0),
(39, 32072, 2147483647, '', '', 0, 0, 0, 0, '2022-04-29 23:11:07', 0),
(41, 17368753, 8, 'Hi every body I am manager', '', 3, 0, 0, 0, '2022-05-02 01:22:29', 0);

-- --------------------------------------------------------

--
-- Table structure for table `posts`
--

CREATE TABLE `posts` (
  `post_id` int(11) NOT NULL,
  `name_poster` varchar(200) NOT NULL,
  `post_details` varchar(200) NOT NULL,
  `post_date` date NOT NULL,
  `upload_image` varchar(200) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `posts`
--

INSERT INTO `posts` (`post_id`, `name_poster`, `post_details`, `post_date`, `upload_image`) VALUES
(1, 'tarek', 'hello world', '2022-03-20', '0'),
(8, 'Amit', ' it is hard to learn programming', '2022-03-21', 'member2.jpg'),
(9, 'tarek', ' I love Real Madrid ', '2022-03-21', '0'),
(10, 'gamal', ' Hard luck tarek', '2022-03-21', 'member1.jpg'),
(11, 'tarek', ' good boy', '2022-03-22', '0'),
(12, 'tarek', ' good boy', '2022-03-22', 'member4.jpg'),
(17, 'gamal', ' ok', '2022-03-27', ''),
(18, 'gamal', ' ok', '2022-03-27', '.75'),
(19, 'gamal', ' ok', '2022-03-27', '.96'),
(20, 'gamal', ' ok', '2022-03-27', '.80'),
(21, 'gamal', ' ok', '2022-03-27', 'member3.jpg'),
(22, 'tarek', ' hh', '2022-04-04', ''),
(23, 'tarek', ' hh', '2022-04-04', ''),
(24, 'tarek', ' sss', '2022-04-04', 'Arief.jpeg');

-- --------------------------------------------------------

--
-- Table structure for table `shares`
--

CREATE TABLE `shares` (
  `id` bigint(20) NOT NULL,
  `owner_post` bigint(20) NOT NULL,
  `owner_share` bigint(20) NOT NULL,
  `post_id` bigint(20) NOT NULL,
  `content` text NOT NULL,
  `name_share` varchar(20) NOT NULL,
  `name_post` varchar(20) NOT NULL,
  `img_share` varchar(30) NOT NULL,
  `img_post` varchar(30) NOT NULL,
  `date` datetime NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `shares`
--

INSERT INTO `shares` (`id`, `owner_post`, `owner_share`, `post_id`, `content`, `name_share`, `name_post`, `img_share`, `img_post`, `date`) VALUES
(4, 1109, 23467538, 81915975, 'that is wrong', 'saad ahmed', 'Fatima Nabeel', 'member2.jpg', 'member1.jpg', '2022-04-28 04:47:16'),
(5, 23467538, 2147483647, 169530, 'I like you', 'moaaz reda', 'saad ahmed', 'h-man.jpg', 'member2.jpg', '2022-04-28 14:50:06');

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE `user` (
  `id` int(11) NOT NULL,
  `name` varchar(200) CHARACTER SET utf8 NOT NULL,
  `username` varchar(50) NOT NULL,
  `password` varchar(50) NOT NULL,
  `status` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`id`, `name`, `username`, `password`, `status`) VALUES
(1, 'gamal', 'gamal', '666', 1),
(2, 'Amit', 'amit', '555', 0),
(3, 'tarek', 'tarek', '123', 1);

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `userid` bigint(20) NOT NULL,
  `first_name` varchar(255) NOT NULL,
  `last_name` varchar(255) NOT NULL,
  `gender` enum('male','female') NOT NULL DEFAULT 'male',
  `email` varchar(60) NOT NULL,
  `password` varchar(100) NOT NULL,
  `url_adress` varchar(100) NOT NULL,
  `date` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `img` varchar(250) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `userid`, `first_name`, `last_name`, `gender`, `email`, `password`, `url_adress`, `date`, `img`) VALUES
(1, 4282879, '12', 'dds', 'male', 'moaaz@gmail.com', '333', '12 dds', '2022-04-07 14:55:43', ''),
(2, 2147483647, 'moaaz', 'reda', 'male', 'moaaz@gmail.com', '123', 'moaaz reda', '2022-05-07 19:55:56', 'h-man.jpg'),
(3, 1109, 'Fatima', 'Nabeel', 'female', 'fatima@gmail.com', '456', 'Fatima Nabeel', '2022-04-22 23:18:06', 'member1.jpg'),
(6, 23467538, 'saad', 'ahmed', 'male', 'saad@gmail.com', '828', 'saad ahmed', '2022-04-22 14:01:21', 'member2.jpg'),
(10, 1, 'Ehab', 'Mohamed', 'male', 'ehab@gmail.com', '200', 'EhabMohamed', '2022-04-16 11:11:08', ''),
(11, 4, 'Nabil', 'Ahmed', 'male', 'nabil@gmail.com', '400', 'NabilAhmed', '2022-04-16 14:11:32', ''),
(14, 8, 'Sara', 'Mostafa', 'female', 'sara@gmail.com', '333', 'SaraMostafa', '2022-04-16 14:13:59', ''),
(15, 2, 'Hala', 'Samir', 'female', 'hala@gmail.com', '999', 'HalaSamir', '2022-04-16 14:15:38', '');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `comments`
--
ALTER TABLE `comments`
  ADD PRIMARY KEY (`com_id`);

--
-- Indexes for table `content_i_follow`
--
ALTER TABLE `content_i_follow`
  ADD PRIMARY KEY (`id`),
  ADD KEY `userid` (`userid`),
  ADD KEY `contentid` (`contentid`),
  ADD KEY `disabled` (`disabled`),
  ADD KEY `date` (`date`);

--
-- Indexes for table `friends`
--
ALTER TABLE `friends`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `friend_request`
--
ALTER TABLE `friend_request`
  ADD PRIMARY KEY (`id`),
  ADD KEY `owner_request` (`owner_request`),
  ADD KEY `owner_target` (`owner_target`);

--
-- Indexes for table `friend_suggestions`
--
ALTER TABLE `friend_suggestions`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `groups`
--
ALTER TABLE `groups`
  ADD PRIMARY KEY (`groupID`);

--
-- Indexes for table `group_members`
--
ALTER TABLE `group_members`
  ADD PRIMARY KEY (`id`),
  ADD KEY `group_ID` (`group_ID`),
  ADD KEY `userid` (`userid`);

--
-- Indexes for table `group_post`
--
ALTER TABLE `group_post`
  ADD PRIMARY KEY (`G_Post_id`);

--
-- Indexes for table `likes`
--
ALTER TABLE `likes`
  ADD PRIMARY KEY (`id`),
  ADD KEY `v` (`contentid`),
  ADD KEY `type` (`type`);

--
-- Indexes for table `message`
--
ALTER TABLE `message`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `messages`
--
ALTER TABLE `messages`
  ADD PRIMARY KEY (`message_id`),
  ADD KEY `to_id` (`to_id`);

--
-- Indexes for table `notification`
--
ALTER TABLE `notification`
  ADD PRIMARY KEY (`id`),
  ADD KEY `userid` (`userid`),
  ADD KEY `contentid` (`contentid`),
  ADD KEY `content_owner` (`content_owner`),
  ADD KEY `date` (`date`);

--
-- Indexes for table `post`
--
ALTER TABLE `post`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `postid` (`postid`),
  ADD KEY `id` (`id`,`postid`),
  ADD KEY `user` (`userid`),
  ADD KEY `s` (`likes`),
  ADD KEY `c` (`comment`),
  ADD KEY `user_name` (`userid`),
  ADD KEY `userid` (`userid`),
  ADD KEY `shares` (`shares`),
  ADD KEY `post_shared` (`post_shared`);

--
-- Indexes for table `posts`
--
ALTER TABLE `posts`
  ADD PRIMARY KEY (`post_id`),
  ADD KEY `name` (`name_poster`);

--
-- Indexes for table `shares`
--
ALTER TABLE `shares`
  ADD PRIMARY KEY (`id`),
  ADD KEY `owner_post` (`owner_post`),
  ADD KEY `owner_share` (`owner_share`),
  ADD KEY `post_id` (`post_id`);

--
-- Indexes for table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`id`),
  ADD KEY `name` (`name`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `userid` (`userid`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `comments`
--
ALTER TABLE `comments`
  MODIFY `com_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT for table `content_i_follow`
--
ALTER TABLE `content_i_follow`
  MODIFY `id` bigint(20) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `friends`
--
ALTER TABLE `friends`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT for table `friend_request`
--
ALTER TABLE `friend_request`
  MODIFY `id` bigint(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `friend_suggestions`
--
ALTER TABLE `friend_suggestions`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `groups`
--
ALTER TABLE `groups`
  MODIFY `groupID` bigint(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `group_members`
--
ALTER TABLE `group_members`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `group_post`
--
ALTER TABLE `group_post`
  MODIFY `G_Post_id` bigint(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=24;

--
-- AUTO_INCREMENT for table `likes`
--
ALTER TABLE `likes`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `message`
--
ALTER TABLE `message`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT for table `messages`
--
ALTER TABLE `messages`
  MODIFY `message_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=30;

--
-- AUTO_INCREMENT for table `notification`
--
ALTER TABLE `notification`
  MODIFY `id` bigint(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=76;

--
-- AUTO_INCREMENT for table `post`
--
ALTER TABLE `post`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=42;

--
-- AUTO_INCREMENT for table `posts`
--
ALTER TABLE `posts`
  MODIFY `post_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=25;

--
-- AUTO_INCREMENT for table `shares`
--
ALTER TABLE `shares`
  MODIFY `id` bigint(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `user`
--
ALTER TABLE `user`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `posts`
--
ALTER TABLE `posts`
  ADD CONSTRAINT `d` FOREIGN KEY (`name_poster`) REFERENCES `user` (`name`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
