-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jul 22, 2024 at 10:30 PM
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
-- Table structure for table `chat`
--

CREATE TABLE `chat` (
  `id_chat` int(11) NOT NULL,
  `id_klub` int(11) NOT NULL,
  `isi_chat` varchar(255) NOT NULL,
  `lampiran` varchar(255) DEFAULT NULL,
  `username` varchar(255) NOT NULL,
  `id_user` int(11) NOT NULL,
  `kategori` varchar(255) NOT NULL,
  `id_kategori` int(11) NOT NULL,
  `roles` varchar(255) DEFAULT NULL,
  `date` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `chat`
--

INSERT INTO `chat` (`id_chat`, `id_klub`, `isi_chat`, `lampiran`, `username`, `id_user`, `kategori`, `id_kategori`, `roles`, `date`) VALUES
(4, 87, 'Pesan pertama', NULL, 'User', 2, 'Multimedia', 3, NULL, '2024-07-19 16:48:52'),
(5, 87, 'Skibidi bop bop bop bop yes yes', NULL, 'User', 2, 'Multimedia', 3, NULL, '2024-07-19 16:50:12'),
(6, 87, 'Bruuuuuuh', NULL, 'safik', 4, 'Multimedia', 3, NULL, '2024-07-19 16:50:32'),
(7, 93, 'bruuu', 'roket raccoon2.png', 'User', 2, 'Software', 1, NULL, '2024-07-22 19:59:48');

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
  `status` varchar(255) NOT NULL,
  `date` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `klub`
--

INSERT INTO `klub` (`id_klub`, `nama_klub`, `id_user`, `username`, `deskripsi`, `kategori`, `id_kategori`, `sub_kategori`, `status`, `date`) VALUES
(87, 'Anklebiters', '2', 'User', 'bruh, wtf is this shiet', 'Multimedia', 3, 'Photograph', 'Public', '2024-07-18 15:20:07'),
(88, 'Barudak senja', '2', 'User', 'Brurrrr', 'Embedded', 2, 'Hardware', 'Public', '2024-07-18 15:25:49'),
(92, 'Komunitas Solo Raya', '5', 'daren', 'yepppppp', 'Networking', 4, 'Cybersecurity', 'Public', '2024-07-18 21:07:34'),
(93, 'SenjaCyphers', '2', 'User', 'bwa bwa bwaa', 'Software', 1, 'PHP', 'Private', '2024-07-20 16:44:00');

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
(33, 2, 'User', 87, 'Anklebiters', 'Admin', '2024-07-18 16:47:50'),
(35, 4, 'safik', 88, 'Barudak senja', NULL, '2024-07-18 21:06:09'),
(48, 5, 'daren', 88, 'Barudak senja', NULL, '2024-07-18 21:06:21'),
(49, 5, 'daren', 92, 'Komunitas Solo Raya', 'Admin', '2024-07-20 17:34:12'),
(50, 4, 'safik', 92, 'Komunitas Solo Raya', NULL, '2024-07-18 21:08:36'),
(51, 4, 'safik', 87, 'Anklebiters', NULL, '2024-07-19 19:23:01'),
(53, 2, 'User', 88, 'Barudak senja', 'Admin', '2024-07-20 17:30:27'),
(54, 2, 'User', 93, 'SenjaCyphers', 'Admin', '2024-07-20 16:44:54'),
(55, 4, 'safik', 93, 'SenjaCyphers', NULL, '2024-07-20 17:18:57'),
(56, 5, 'daren', 93, 'SenjaCyphers', NULL, '2024-07-20 17:33:12');

-- --------------------------------------------------------

--
-- Table structure for table `request`
--

CREATE TABLE `request` (
  `id` int(11) NOT NULL,
  `id_user` int(11) NOT NULL,
  `username` varchar(255) NOT NULL,
  `id_klub` int(11) NOT NULL,
  `nama_klub` varchar(255) NOT NULL,
  `roles` varchar(255) DEFAULT NULL,
  `join_date` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

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
  `password` varchar(255) NOT NULL,
  `date` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id_user`, `username`, `password`, `date`) VALUES
(2, 'User', '81dc9bdb52d04dc20036dbd8313ed055', '2024-07-22 14:52:49'),
(4, 'safik', '202cb962ac59075b964b07152d234b70', '2024-07-22 14:52:49'),
(5, 'daren', '202cb962ac59075b964b07152d234b70', '2024-07-22 14:52:49');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `chat`
--
ALTER TABLE `chat`
  ADD PRIMARY KEY (`id_chat`);

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
-- Indexes for table `request`
--
ALTER TABLE `request`
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
-- AUTO_INCREMENT for table `chat`
--
ALTER TABLE `chat`
  MODIFY `id_chat` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `kategori`
--
ALTER TABLE `kategori`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `klub`
--
ALTER TABLE `klub`
  MODIFY `id_klub` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=96;

--
-- AUTO_INCREMENT for table `member`
--
ALTER TABLE `member`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=59;

--
-- AUTO_INCREMENT for table `request`
--
ALTER TABLE `request`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `sub_kategori`
--
ALTER TABLE `sub_kategori`
  MODIFY `id_sub` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=22;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id_user` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
