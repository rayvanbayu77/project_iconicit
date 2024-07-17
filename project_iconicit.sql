-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jul 17, 2024 at 05:49 PM
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
-- Database: `project_iconicit`
--

-- --------------------------------------------------------

--
-- Table structure for table `kategori`
--

CREATE TABLE `kategori` (
  `id` int(11) NOT NULL,
  `nama_kategori` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `kategori`
--

INSERT INTO `kategori` (`id`, `nama_kategori`) VALUES
(1, 'Software'),
(2, 'Embedded'),
(3, 'Multimedia'),
(4, 'Networking');

-- --------------------------------------------------------

--
-- Table structure for table `klub`
--

CREATE TABLE `klub` (
  `id_klub` int(11) NOT NULL,
  `nama_klub` varchar(255) NOT NULL,
  `id_user` varchar(255) NOT NULL,
  `username` varchar(255) NOT NULL,
  `deskripsi` varchar(255) NOT NULL,
  `kategori` varchar(255) NOT NULL,
  `id_kategori` int(11) NOT NULL,
  `sub_kategori` varchar(255) DEFAULT NULL,
  `date` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `klub`
--

INSERT INTO `klub` (`id_klub`, `nama_klub`, `id_user`, `username`, `deskripsi`, `kategori`, `id_kategori`, `sub_kategori`, `date`) VALUES
(2, 'pante', '2', 'User', '', '', 0, '', '2024-07-16 19:39:57'),
(68, 'brett brett', '2', 'User', 'qqq', 'Software', 1, '', '2024-07-17 14:07:18'),
(69, 'tesss', '2', 'User', 'qqqq', 'Software', 1, '', '2024-07-17 14:09:13'),
(70, 'mamaaaa', '2', 'User', 'alofyu', 'Software', 1, '', '2024-07-17 14:09:48'),
(71, 'dayyyyyum', '2', 'User', 'qqqq', 'Software', 1, '', '2024-07-17 14:10:54'),
(72, 'wwww', '2', 'User', 'wwwww', 'Software', 1, '', '2024-07-17 14:11:50'),
(73, 'robotik', '4', 'safik', 'hehehe', 'Software', 1, 'Machine Learning', '2024-07-17 15:27:37');

-- --------------------------------------------------------

--
-- Table structure for table `member`
--

CREATE TABLE `member` (
  `id` int(11) NOT NULL,
  `id_user` int(11) NOT NULL,
  `username` varchar(255) NOT NULL,
  `id_klub` int(11) NOT NULL,
  `nama_klub` varchar(255) NOT NULL,
  `roles` varchar(255) DEFAULT NULL,
  `join_date` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `member`
--

INSERT INTO `member` (`id`, `id_user`, `username`, `id_klub`, `nama_klub`, `roles`, `join_date`) VALUES
(2, 2, 'User', 59, 'papope ', '', '2024-07-17 13:40:15'),
(3, 0, '', 0, '', '', '2024-07-17 13:51:49'),
(4, 2, 'User', 0, '', '', '2024-07-17 13:56:34'),
(5, 2, 'User', 0, '', '', '2024-07-17 13:58:24'),
(6, 2, 'User', 0, '', '', '2024-07-17 14:04:58'),
(7, 2, 'User', 0, '', '', '2024-07-17 14:06:00'),
(8, 2, 'User', 0, '', 'Admin', '2024-07-17 14:07:18'),
(9, 2, 'User', 0, '', 'tesssAdmin', '2024-07-17 14:09:13'),
(10, 2, 'User', 0, 'wwww', 'Admin', '2024-07-17 14:11:50'),
(11, 4, 'safik', 72, 'wwww', NULL, '2024-07-17 14:20:56'),
(12, 4, 'safik', 0, 'robotik', 'Admin', '2024-07-17 15:27:37'),
(13, 4, 'safik', 73, 'robotik', NULL, '2024-07-17 15:28:31');

-- --------------------------------------------------------

--
-- Table structure for table `sub_kategori`
--

CREATE TABLE `sub_kategori` (
  `id_sub` int(11) NOT NULL,
  `id_kategori` int(11) NOT NULL,
  `kategori` varchar(255) NOT NULL,
  `nama_sub_kategori` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `sub_kategori`
--

INSERT INTO `sub_kategori` (`id_sub`, `id_kategori`, `kategori`, `nama_sub_kategori`) VALUES
(1, 1, 'Software', 'Web Dev'),
(2, 1, 'Software', 'Mobile dev'),
(3, 1, 'Software\r\n', 'Machine Learning'),
(4, 1, 'Software', 'SQL'),
(5, 1, 'Software', 'PHP'),
(7, 1, 'Software', 'Python'),
(8, 1, 'Software', 'Java'),
(9, 1, 'Software', 'C'),
(10, 1, 'Software', 'C++'),
(11, 1, 'Software', 'C#'),
(12, 2, 'Embedded', 'Hardware'),
(13, 2, 'Embedded', 'Robotic'),
(14, 3, 'Multimedia', 'Video Edit'),
(15, 3, 'Multimedia', 'Picture Edit'),
(16, 3, 'Multimedia', 'AI'),
(17, 3, 'Multimedia', 'Photograph'),
(18, 3, 'Multimedia', 'Audio'),
(19, 4, 'Networking', 'Cybersecurity'),
(20, 4, 'Networking', 'Operating System'),
(21, 4, 'Networking', 'IoT');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id_user` int(11) NOT NULL,
  `username` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id_user`, `username`, `password`) VALUES
(2, 'User', '81dc9bdb52d04dc20036dbd8313ed055'),
(4, 'safik', '202cb962ac59075b964b07152d234b70');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `kategori`
--
ALTER TABLE `kategori`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `klub`
--
ALTER TABLE `klub`
  ADD PRIMARY KEY (`id_klub`);

--
-- Indexes for table `member`
--
ALTER TABLE `member`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `sub_kategori`
--
ALTER TABLE `sub_kategori`
  ADD PRIMARY KEY (`id_sub`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id_user`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `kategori`
--
ALTER TABLE `kategori`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `klub`
--
ALTER TABLE `klub`
  MODIFY `id_klub` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=74;

--
-- AUTO_INCREMENT for table `member`
--
ALTER TABLE `member`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- AUTO_INCREMENT for table `sub_kategori`
--
ALTER TABLE `sub_kategori`
  MODIFY `id_sub` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=22;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id_user` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
