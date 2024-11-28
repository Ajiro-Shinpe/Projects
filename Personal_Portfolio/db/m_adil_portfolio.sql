-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Nov 28, 2024 at 07:59 AM
-- Server version: 10.4.32-MariaDB
-- PHP Version: 8.2.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `m_adil_portfolio`
--

-- --------------------------------------------------------

--
-- Table structure for table `admin`
--

CREATE TABLE `admin` (
  `id` int(11) NOT NULL,
  `username` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `created_at` datetime NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `admin`
--

INSERT INTO `admin` (`id`, `username`, `email`, `password`, `created_at`) VALUES
(1, 'Adil', 'adilismail7654321@gmail.com', '123', '2024-11-27 20:12:18'),
(2, 'a', 'ad@gg/com', 'a', '2024-11-27 20:19:34'),
(3, 'Adil khan', 'adilismail7654321@gmail.com', '$2y$10$2NzAlqwS5JRBBd0pyRLD2esThVYJkl9GoGPhsWP6ShdPqxH8KqKv.', '2024-11-27 20:32:46');

-- --------------------------------------------------------

--
-- Table structure for table `category`
--

CREATE TABLE `category` (
  `id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `category`
--

INSERT INTO `category` (`id`, `name`) VALUES
(1, 'React'),
(2, 'PHP'),
(3, 'Laravel'),
(4, 'WordPress'),
(5, 'Front-End');

-- --------------------------------------------------------

--
-- Table structure for table `contact`
--

CREATE TABLE `contact` (
  `id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `subject` text NOT NULL,
  `msg` longtext NOT NULL,
  `date` datetime NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `portfolio`
--

CREATE TABLE `portfolio` (
  `id` int(11) NOT NULL,
  `title` varchar(255) NOT NULL,
  `category` int(11) NOT NULL,
  `url` varchar(255) DEFAULT NULL,
  `desc` text DEFAULT NULL,
  `date` date DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `portfolio`
--

INSERT INTO `portfolio` (`id`, `title`, `category`, `url`, `desc`, `date`) VALUES
(4, 'Sucii (Socializing and Ally) - Social Networking Website', 2, '#', 'Designed and developed a feature-rich social networking website, enabling users to connect, share, and interact with each other. Key features include:\r\n\r\n- User and Admin Authentication: Implemented secure login and registration systems for users and administrators.\r\n- Email Verification: Added an email verification process to ensure user authenticity.\r\n- User Profile Management: Allowed users to create and customize their profiles.\r\n- Image Posting: Enabled users to post images.\r\n- Like, Comment, and Engagement: Implemented features for users to like, comment, and engage with each other\'s posts.\r\n- Follow and Unfollow: Allowed users to follow and unfollow each other. -Chat sys : Real time User to user chat system\r\n\r\nTechnologies Used: [List the technologies you used, e.g., HTML, CSS, JavaScript, BootStrap , JQuery PHP, MySQL,  & AJAX .', '2024-10-05'),
(6, 'Elegance', 3, '#', 'blah', '2024-05-05'),
(11, 'B', 5, 'B B ', '   GG', '2022-02-22'),
(12, 'g', 1, '#', 'h', '1999-06-06');

-- --------------------------------------------------------

--
-- Table structure for table `portfolio_images`
--

CREATE TABLE `portfolio_images` (
  `id` int(11) NOT NULL,
  `portfolio_id` int(11) NOT NULL,
  `image` varchar(255) NOT NULL,
  `is_cover` tinyint(1) DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `portfolio_images`
--

INSERT INTO `portfolio_images` (`id`, `portfolio_id`, `image`, `is_cover`) VALUES
(14, 4, 'uploads/1732646233_Screenshot (80).png', 1),
(15, 4, 'uploads/1732646233_modified_image (8).png', 0),
(16, 4, 'uploads/1732646233_Screenshot (82).png', 0),
(17, 4, 'uploads/1732646233_Screenshot (81).png', 0),
(20, 6, 'uploads/1732717583_Screenshot (62).png', 1),
(25, 11, 'uploads/1732722543_Screenshot (64).png', 1),
(26, 11, 'uploads/1732722543_modified_image (8).png', 0),
(27, 11, 'uploads/1732722543_Screenshot (82).png', 0),
(28, 11, 'uploads/1732722543_Screenshot (81).png', 0),
(29, 12, 'uploads/1732723186_Screenshot (77).png', 1),
(30, 12, 'uploads/1732723186_Screenshot (80).png', 0),
(31, 12, 'uploads/1732723186_Screenshot (79).png', 0),
(32, 12, 'uploads/1732723186_Screenshot (78).png', 0);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admin`
--
ALTER TABLE `admin`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `category`
--
ALTER TABLE `category`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `contact`
--
ALTER TABLE `contact`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `portfolio`
--
ALTER TABLE `portfolio`
  ADD PRIMARY KEY (`id`),
  ADD KEY `category` (`category`);

--
-- Indexes for table `portfolio_images`
--
ALTER TABLE `portfolio_images`
  ADD PRIMARY KEY (`id`),
  ADD KEY `portfolio_id` (`portfolio_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `admin`
--
ALTER TABLE `admin`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `category`
--
ALTER TABLE `category`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `contact`
--
ALTER TABLE `contact`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `portfolio`
--
ALTER TABLE `portfolio`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT for table `portfolio_images`
--
ALTER TABLE `portfolio_images`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=33;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `portfolio`
--
ALTER TABLE `portfolio`
  ADD CONSTRAINT `portfolio_ibfk_1` FOREIGN KEY (`category`) REFERENCES `category` (`id`);

--
-- Constraints for table `portfolio_images`
--
ALTER TABLE `portfolio_images`
  ADD CONSTRAINT `portfolio_images_ibfk_1` FOREIGN KEY (`portfolio_id`) REFERENCES `portfolio` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
