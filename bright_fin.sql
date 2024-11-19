-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Nov 19, 2024 at 07:46 AM
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
-- Database: `bright_fin`
--

-- --------------------------------------------------------

--
-- Table structure for table `admin`
--

CREATE TABLE `admin` (
  `id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `status` int(11) NOT NULL,
  `created_at` datetime NOT NULL,
  `updated_at` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `admin`
--

INSERT INTO `admin` (`id`, `name`, `email`, `password`, `status`, `created_at`, `updated_at`) VALUES
(1, 'Vinay Kumar Singh', 'vinaysingh43@gmail.com', '$2y$10$f0gXr.2aBQzvfPSqtf3gbup8N2I8cSM3Rckus0cvj/VjlR7L4IRJe', 1, '2024-09-11 09:05:35', '2024-09-20 09:08:01');

-- --------------------------------------------------------

--
-- Table structure for table `dsa_users`
--

CREATE TABLE `dsa_users` (
  `id` int(11) NOT NULL,
  `full_name` varchar(100) NOT NULL,
  `email` varchar(100) NOT NULL,
  `phone` varchar(15) NOT NULL,
  `address` text NOT NULL,
  `city` varchar(50) NOT NULL,
  `zip_code` varchar(10) NOT NULL,
  `otp` varchar(6) DEFAULT NULL,
  `otp_expiry` datetime DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `dsa_users`
--

INSERT INTO `dsa_users` (`id`, `full_name`, `email`, `phone`, `address`, `city`, `zip_code`, `otp`, `otp_expiry`, `created_at`) VALUES
(2, 'Vinay Kumar SINGH', 'vinaysingh43@gmail.com', '08076048139', 'Malaviya Nager Kunraghat Gorakhpur', 'Gorakhpur', '273008', '189666', '2024-11-16 10:06:29', '2024-11-16 09:15:01');

-- --------------------------------------------------------

--
-- Table structure for table `kyc_forms`
--

CREATE TABLE `kyc_forms` (
  `id` int(11) NOT NULL,
  `full_name` varchar(255) NOT NULL,
  `dob` date NOT NULL,
  `gender` enum('male','female','other') NOT NULL,
  `address` varchar(255) NOT NULL,
  `phone` varchar(15) NOT NULL,
  `email` varchar(255) NOT NULL,
  `company_name` varchar(255) DEFAULT NULL,
  `registration_number` varchar(50) DEFAULT NULL,
  `company_address` varchar(255) DEFAULT NULL,
  `company_phone` varchar(15) DEFAULT NULL,
  `company_email` varchar(255) DEFAULT NULL,
  `nature_of_business` varchar(255) DEFAULT NULL,
  `document_path` varchar(255) NOT NULL,
  `additional_documents_path` varchar(255) DEFAULT NULL,
  `address_proof_path` varchar(255) NOT NULL,
  `selfie_path` varchar(255) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `kyc_forms`
--

INSERT INTO `kyc_forms` (`id`, `full_name`, `dob`, `gender`, `address`, `phone`, `email`, `company_name`, `registration_number`, `company_address`, `company_phone`, `company_email`, `nature_of_business`, `document_path`, `additional_documents_path`, `address_proof_path`, `selfie_path`, `created_at`) VALUES
(4, 'Vinay Kumar Singh', '1986-01-01', 'male', 'LGF 10 ANORA KALAN', '91834593453', 'vinaysingh43@gmail.com', 'DC International', '34342222', 'LGF 10 ANORA KALAN', '+12545855554', 'info@digitalcreativeinternational.com', 'IT SERVICES', 'documents/1730194838_3cac6a85835712a4430a.png', 'documents/1730194838_cd48ca671c4d46ff5ee1.png', 'documents/1730194838_ed7053d8ee3dc2f7ceed.png', 'selfies/1730194838_61a11883606f7b944f6a.png', '2024-10-29 09:40:38'),
(5, 'Akash Rajpoot', '2000-12-05', 'male', 'LGF 10 ANORA KALAN', '91834593453', 'akashraj@gmail.com', 'Jhon Player', '34342222', 'St. Pterson Brd Rd , New York 22105 USA', '+12545855554', 'akash@digitalcreativeinternational.com', 'Clothings', 'documents/1730195410_e04bdfaf591f68209308.jpg', 'documents/1730195410_542c571d552eea10a75e.jpg', 'documents/1730195410_3ac63485e8923febd8d9.png', 'selfies/1730195410_4e1c30e63a014df5bf4b.jpg', '2024-10-29 09:50:10'),
(6, 'Rajveer Singh', '1990-04-01', 'male', 'LGF 10 ANORA KALAN', '91838884343', 'rajveersingh1988@gmail.com', 'DC International', '34342222', 'St. Pterson Brd Rd , New York 22105 USA', '4534534534', 'rajveer@digitalcreativeinternational.com', 'IT SERVICES', 'documents/1730199393_2df588a4704c79640455.jpg', 'documents/1730199393_497bcc6a173722f17bdb.jpg', 'documents/1730199393_ff2e440a59d9cd4e8b1b.jpg', 'selfies/1730199393_3c484b7b1d464862d2d7.jpg', '2024-10-29 10:56:33'),
(7, 'Vikram Singh Rajpoot', '1984-01-31', 'male', 'Malaviya Nager  New Delhi', '+918076048888', 'vikramsingh84@gmail.com', 'Vikram Exports', 'IN-DL-154557778', 'Malaviya Nager  New Delhi', '+918076048888', 'info@viktamexports.in', 'Sea Food', 'documents/1730891699_e4b054e20a98510d5f81.jpg', 'documents/1730891699_4e4448edbabe7ea40893.png', 'documents/1730891699_ca5c518fd8975e1b952b.png', 'selfies/1730891699_b2bb1e48da83970e0526.jpg', '2024-11-06 11:14:59');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admin`
--
ALTER TABLE `admin`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `email` (`email`);

--
-- Indexes for table `dsa_users`
--
ALTER TABLE `dsa_users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `email` (`email`);

--
-- Indexes for table `kyc_forms`
--
ALTER TABLE `kyc_forms`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `admin`
--
ALTER TABLE `admin`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `dsa_users`
--
ALTER TABLE `dsa_users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `kyc_forms`
--
ALTER TABLE `kyc_forms`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
