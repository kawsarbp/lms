-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Dec 21, 2021 at 01:05 PM
-- Server version: 10.4.21-MariaDB
-- PHP Version: 7.4.25

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `lms`
--

-- --------------------------------------------------------

--
-- Table structure for table `books`
--

CREATE TABLE `books` (
  `id` int(5) NOT NULL,
  `book_name` varchar(70) DEFAULT NULL,
  `book_image` varchar(100) DEFAULT NULL,
  `book_author_name` varchar(50) DEFAULT NULL,
  `book_publication_name` varchar(50) DEFAULT NULL,
  `book_purchase_date` varchar(50) DEFAULT NULL,
  `book_price` varchar(10) DEFAULT NULL,
  `book_qty` int(5) DEFAULT NULL,
  `available_qty` int(5) DEFAULT NULL,
  `libraian_usernaem` varchar(50) DEFAULT NULL,
  `datetime` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `books`
--

INSERT INTO `books` (`id`, `book_name`, `book_image`, `book_author_name`, `book_publication_name`, `book_purchase_date`, `book_price`, `book_qty`, `available_qty`, `libraian_usernaem`, `datetime`) VALUES
(1, 'First Book', '20211221125839.jpg', 'kawsar', 'kawsar ahmed', '2021-12-21', '200', 100, 98, 'bdkawsar', '2021-12-21 11:58:39'),
(2, 'My book', '20211221125940.jpg', 'Zahid', 'Mzhmm', '2021-12-08', '200', 100, 99, 'bdkawsar', '2021-12-21 11:59:40'),
(3, 'faz group book', '20211221010038.jpg', 'Faz group member', 'Faz group member', '2021-12-01', '300', 200, 198, 'bdkawsar', '2021-12-21 12:00:38');

-- --------------------------------------------------------

--
-- Table structure for table `issue_books`
--

CREATE TABLE `issue_books` (
  `id` int(5) NOT NULL,
  `student_id` int(5) NOT NULL,
  `book_id` int(5) NOT NULL,
  `book_issue_date` varchar(20) NOT NULL,
  `book_return_date` varchar(20) NOT NULL,
  `datetime` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `issue_books`
--

INSERT INTO `issue_books` (`id`, `student_id`, `book_id`, `book_issue_date`, `book_return_date`, `datetime`) VALUES
(1, 1, 1, '21-12-2021', '', '2021-12-21 12:03:32'),
(2, 1, 3, '21-12-2021', '', '2021-12-21 12:03:38'),
(3, 2, 2, '21-12-2021', '', '2021-12-21 12:03:42'),
(4, 2, 3, '21-12-2021', '', '2021-12-21 12:03:48'),
(5, 3, 2, '21-12-2021', '21-12-2021', '2021-12-21 12:03:55'),
(6, 3, 1, '21-12-2021', '', '2021-12-21 12:04:02');

-- --------------------------------------------------------

--
-- Table structure for table `libraian`
--

CREATE TABLE `libraian` (
  `id` int(3) NOT NULL,
  `fname` varchar(50) NOT NULL,
  `lname` varchar(50) NOT NULL,
  `email` varchar(100) NOT NULL,
  `username` varchar(20) NOT NULL,
  `password` varchar(100) NOT NULL,
  `datetime` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `libraian`
--

INSERT INTO `libraian` (`id`, `fname`, `lname`, `email`, `username`, `password`, `datetime`) VALUES
(1, 'kawsar', 'ahmed', 'kawsar@gmail.com', 'bdkawsar', '12123123', '2021-12-21 11:56:32'),
(2, 'kawsar', 'ahmed', 'admin@gmail.com', 'bdadmin', 'bdadmin', '2021-12-21 11:57:12');

-- --------------------------------------------------------

--
-- Table structure for table `students`
--

CREATE TABLE `students` (
  `id` int(5) NOT NULL,
  `fname` varchar(50) NOT NULL,
  `lname` varchar(50) NOT NULL,
  `roll` int(5) NOT NULL,
  `reg` int(5) NOT NULL,
  `email` varchar(50) NOT NULL,
  `username` varchar(50) NOT NULL,
  `password` varchar(100) NOT NULL,
  `phone` varchar(11) NOT NULL,
  `photo` varchar(50) DEFAULT NULL,
  `status` tinyint(1) NOT NULL,
  `datetime` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `students`
--

INSERT INTO `students` (`id`, `fname`, `lname`, `roll`, `reg`, `email`, `username`, `password`, `phone`, `photo`, `status`, `datetime`) VALUES
(1, 'kawsar', 'ahmed', 119916, 123485, 'kawsar@gmail.com', 'bdkawsar', '$2y$10$u66d.5xT8/MCAjkg0oB1oOVoBS5NKAfeM7GeEqX7sbM3KHlLDdkM6', '01746755225', NULL, 1, '2021-12-21 12:01:16'),
(2, 'zahid', 'mzhmm', 114477, 123486, 'zahid@gmail.com', 'zahidboss', '$2y$10$.sr6YdXLDfu6FhTG85yplu1ScpQZ3a68jFb8v7JzIvuunAZd0RSRC', '01746755226', NULL, 1, '2021-12-21 12:02:32'),
(3, 'hossain', 'rabbi', 119939, 123488, 'hossain@gmail.com', 'bdhossain', '$2y$10$3PrynqNK6SputF.CT43w2OK1AE8VYLzLX4nGNcHfCPQ1OdT2zO5Om', '01746755229', NULL, 1, '2021-12-21 12:02:54');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `books`
--
ALTER TABLE `books`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `issue_books`
--
ALTER TABLE `issue_books`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `libraian`
--
ALTER TABLE `libraian`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `username` (`username`),
  ADD UNIQUE KEY `email` (`email`);

--
-- Indexes for table `students`
--
ALTER TABLE `students`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `email` (`email`),
  ADD UNIQUE KEY `username` (`username`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `books`
--
ALTER TABLE `books`
  MODIFY `id` int(5) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `issue_books`
--
ALTER TABLE `issue_books`
  MODIFY `id` int(5) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `libraian`
--
ALTER TABLE `libraian`
  MODIFY `id` int(3) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `students`
--
ALTER TABLE `students`
  MODIFY `id` int(5) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
