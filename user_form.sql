-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jun 11, 2024 at 09:43 AM
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
-- Database: `user_form`
--

-- --------------------------------------------------------

--
-- Table structure for table `messages`
--

CREATE TABLE `messages` (
  `id` int(11) NOT NULL,
  `user_id` int(11) DEFAULT NULL,
  `message` text DEFAULT NULL,
  `timestamp` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `messages`
--

INSERT INTO `messages` (`id`, `user_id`, `message`, `timestamp`) VALUES
(1, 5, 'Hi', '2024-06-04 00:43:06'),
(2, 12, 'YO, bro!', '2024-06-04 00:46:29'),
(3, 5, 'Have a wonderful everyone :)', '2024-06-04 02:39:05'),
(4, 11, 'Komusta namo guys??', '2024-06-04 11:11:12'),
(5, 5, 'Okay raman, skwela para maka learn hehe.', '2024-06-04 11:11:44'),
(6, 5, 'wassup', '2024-06-04 12:19:35'),
(7, 14, 'heyy wassup', '2024-06-04 18:36:26'),
(8, 14, 'Good morning people <3', '2024-06-04 22:01:52'),
(9, 5, 'Tulog-tulog pud tawn uy HAHAHA', '2024-06-04 22:17:37'),
(10, 14, 'ika tulo diay ta mag present unya sa atoang system pre!', '2024-06-04 22:19:02'),
(11, 5, 'Sge pre :D', '2024-06-04 22:21:06'),
(15, 15, 'heyoo wassup!', '2024-06-05 00:55:51'),
(16, 5, 'Hey!', '2024-06-05 01:49:00'),
(17, 16, 'Hey Salm', '2024-06-05 01:49:16'),
(18, 7, 'UY!', '2024-06-10 13:17:32'),
(19, 5, 'Komusta??', '2024-06-10 13:17:39');

-- --------------------------------------------------------

--
-- Table structure for table `user_form`
--

CREATE TABLE `user_form` (
  `id` int(100) NOT NULL,
  `name` varchar(100) NOT NULL,
  `email` varchar(100) NOT NULL,
  `password` varchar(100) NOT NULL,
  `verification_code` varchar(6) DEFAULT NULL,
  `image` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `user_form`
--

INSERT INTO `user_form` (`id`, `name`, `email`, `password`, `verification_code`, `image`) VALUES
(1, 'Salm Virnel', 'birnel54@gmail.com', '25d55ad283aa400af464c76d713c07ad', NULL, '377116900_668015761952538_3816475769083791369_n.jpg'),
(5, 'Salm Virnel', 'birnel54@gmail.com', 'd8578edf8458ce06fbc5bb76a58c5ca4', '290608', 'imresizer-1708001582324.jpg'),
(6, 'Flake', 'virnel54@gmail.com', 'd8578edf8458ce06fbc5bb76a58c5ca4', NULL, '865c287f-0126-44cb-ac30-0a7422feb334.jpg'),
(7, 'Balokoy', 'balokoy@gmail.com', 'd8578edf8458ce06fbc5bb76a58c5ca4', '846784', '429088397_390904883685381_3736596125430987534_n.jpg'),
(8, 'Sam', 'Sam54@gmail.com', '81dc9bdb52d04dc20036dbd8313ed055', NULL, '15800145_1203715913068551_381357850499026237_o.jpg'),
(11, 'Joel gene', 'Joel@gmail.com', '81dc9bdb52d04dc20036dbd8313ed055', '449809', '410818105_317119804576760_7807969356613867552_n.jpg'),
(12, 'Niel', 'Darryl@gmail.com', '81dc9bdb52d04dc20036dbd8313ed055', NULL, '423555258_400770602620675_1932640732175936904_n.jpg'),
(13, 'Trisha', 'kaishakim1437@gmail.com', '827ccb0eea8a706c4c34a16891f84e7b', NULL, '410818105_317119804576760_7807969356613867552_n.jpg'),
(14, 'Darryl my N', 'mama@gmail.com', '8c32e5048bc4fbfc5dc53c89a36c0812', '220634', '440857090_1168509974324454_6996777414976092154_n.jpg'),
(15, 'KArl', 'KArl@gmail.com', 'd93591bdf7860e1e4ee2fca799911215', '526702', 'hh.jpg'),
(16, 'EGG', 'andy@gmail.com', '81dc9bdb52d04dc20036dbd8313ed055', '879462', '444833932_25567698406178382_2001293664127991242_n.jpg');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `messages`
--
ALTER TABLE `messages`
  ADD PRIMARY KEY (`id`),
  ADD KEY `user_id` (`user_id`);

--
-- Indexes for table `user_form`
--
ALTER TABLE `user_form`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `messages`
--
ALTER TABLE `messages`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=20;

--
-- AUTO_INCREMENT for table `user_form`
--
ALTER TABLE `user_form`
  MODIFY `id` int(100) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `messages`
--
ALTER TABLE `messages`
  ADD CONSTRAINT `messages_ibfk_1` FOREIGN KEY (`user_id`) REFERENCES `user_form` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
