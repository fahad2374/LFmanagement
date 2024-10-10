-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Oct 09, 2024 at 04:34 PM
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
-- Database: `lfms`
--

-- --------------------------------------------------------

--
-- Table structure for table `contacts`
--

CREATE TABLE `contacts` (
  `id` int(6) UNSIGNED NOT NULL,
  `firstname` varchar(30) NOT NULL,
  `lastname` varchar(30) DEFAULT NULL,
  `email` varchar(50) NOT NULL,
  `message` text NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `contacts`
--

INSERT INTO `contacts` (`id`, `firstname`, `lastname`, `email`, `message`, `created_at`) VALUES
(1, 'raza', 'ahmed', 'razxy@hotmail.com', 'asdadasda', '2024-10-07 13:11:51'),
(2, 'mugi', 'jan', 'apple@yahoo.com', 'qwer', '2024-10-07 13:12:40'),
(3, 'Uzair', 'Awan', 'uzairhamidawan7@gmail.com', 'rtyy', '2024-10-07 13:13:04'),
(4, 'Uzair', 'Awan', 'uzairhamidawan7@gmail.com', 'poiuytr', '2024-10-07 13:13:21'),
(5, 'arhan', 'ali', 'aa34@yahoo.com', 'i lost my bag please', '2024-10-09 14:32:54');

-- --------------------------------------------------------

--
-- Table structure for table `product`
--

CREATE TABLE `product` (
  `id` int(100) NOT NULL,
  `name` varchar(100) NOT NULL,
  `des` varchar(100) NOT NULL,
  `image_URL` varchar(255) CHARACTER SET latin1 COLLATE latin1_swedish_ci NOT NULL DEFAULT 'imageNotAvailable.jpg',
  `status` varchar(255) CHARACTER SET latin1 COLLATE latin1_swedish_ci NOT NULL DEFAULT 'Lost',
  `created_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `product`
--

INSERT INTO `product` (`id`, `name`, `des`, `image_URL`, `status`, `created_at`) VALUES
(14, 'jhon', 'book', 'Untitled.jpg', 'lost', '2024-10-09 13:21:12'),
(16, 'jane', 'glasses', 'images.png', 'found', '2024-10-09 13:24:38'),
(19, 'rana', 'near river shore', 'apple watch.jpg', 'Lost', '2024-10-09 13:53:38'),
(20, 'jut', 'near cafe', 'watch.jpg', 'Found', '2024-10-09 13:55:50');

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE `user` (
  `id` int(20) NOT NULL,
  `firstname` varchar(50) NOT NULL,
  `lastname` varchar(50) NOT NULL,
  `email` varchar(50) NOT NULL,
  `username` varchar(50) NOT NULL,
  `password` varchar(50) NOT NULL,
  `created_at` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`id`, `firstname`, `lastname`, `email`, `username`, `password`, `created_at`) VALUES
(1, 'uzair', 'awan', 'abc@hotmail.com', 'abc', '123', '2022-09-07 13:31:41'),
(4, 'mugi', 'jan', 'apple@yahoo.com', 'a', 'a', '2024-10-07 17:59:47'),
(5, 'raza', 'ahmed', 'razxy@hotmail.com', 'raz', 'raz', '2024-10-07 18:01:17'),
(6, 'jame', 'jule', 'jj007@yahoo.com', 'jj07', 'jj07', '2024-10-09 18:40:36'),
(7, 'jut', 'but', 'jutbb@hotmail.com', 'jutb', 'jutb', '2024-10-09 18:42:58');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `contacts`
--
ALTER TABLE `contacts`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `product`
--
ALTER TABLE `product`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `contacts`
--
ALTER TABLE `contacts`
  MODIFY `id` int(6) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `product`
--
ALTER TABLE `product`
  MODIFY `id` int(100) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=21;

--
-- AUTO_INCREMENT for table `user`
--
ALTER TABLE `user`
  MODIFY `id` int(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
