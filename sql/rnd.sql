-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Feb 28, 2025 at 08:18 AM
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
-- Database: `rnd`
--

-- --------------------------------------------------------

--
-- Table structure for table `admin`
--

CREATE TABLE `admin` (
  `id` int(11) NOT NULL,
  `email` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `admin`
--

INSERT INTO `admin` (`id`, `email`, `password`, `created_at`) VALUES
(3, 'test@gmail.com', 'asdf', '2024-03-23 17:04:16'),
(4, 'adesolaoni2001@gmail.com', '$2y$10$slg2Rhcminki8Eo6IAHwHenVIOuRDpYE4VGpp/x7/m98VTLT0USIS', '2024-03-24 05:00:21');

-- --------------------------------------------------------

--
-- Table structure for table `external_internship`
--

CREATE TABLE `external_internship` (
  `id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `school` varchar(255) NOT NULL,
  `department` varchar(255) NOT NULL,
  `fieldStudy` varchar(255) NOT NULL,
  `skill` varchar(255) NOT NULL,
  `phone` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `date` varchar(255) NOT NULL,
  `internshipLetterPath` varchar(255) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `external_internship`
--

INSERT INTO `external_internship` (`id`, `name`, `school`, `department`, `fieldStudy`, `skill`, `phone`, `email`, `date`, `internshipLetterPath`, `created_at`) VALUES
(1, 'Adesola Oni', 'Lincoln', 'Computer Software Engineering', 'Software Engineering', 'React js, PHP', '09032253937', 'adesolaoni2001@gmail.com', '2024-11-05', 'externalitletters/6729925781add_PHPhrame Brand.docx', '2024-11-05 03:34:47');

-- --------------------------------------------------------

--
-- Table structure for table `external_membership`
--

CREATE TABLE `external_membership` (
  `id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `school` varchar(255) NOT NULL,
  `department` varchar(255) NOT NULL,
  `fieldStudy` varchar(255) NOT NULL,
  `skill` varchar(255) NOT NULL,
  `phone` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `date` varchar(255) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `internal_internship`
--

CREATE TABLE `internal_internship` (
  `id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `department` varchar(255) NOT NULL,
  `fieldStudy` varchar(255) NOT NULL,
  `skill` varchar(255) NOT NULL,
  `phone` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `date` varchar(255) NOT NULL,
  `internship_letter` varchar(255) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `internal_internship`
--

INSERT INTO `internal_internship` (`id`, `name`, `department`, `fieldStudy`, `skill`, `phone`, `email`, `date`, `internship_letter`, `created_at`) VALUES
(1, 'Adesola Ayomide Oni', 'Computer Software Engineering', 'Computer', 'PHP', '09032253937', 'adesolaoni2001@gmail.com', '2024-11-05', 'internalitletters/PHP Framework - Project Topic Proposal.docx', '2024-11-05 03:28:12');

-- --------------------------------------------------------

--
-- Table structure for table `project_information`
--

CREATE TABLE `project_information` (
  `id` int(11) NOT NULL,
  `title` varchar(255) NOT NULL,
  `description` varchar(5000) NOT NULL,
  `author` varchar(255) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `project_information`
--

INSERT INTO `project_information` (`id`, `title`, `description`, `author`, `created_at`) VALUES
(1, 'Testing', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Curabitur pulvinar bibendum quam non efficitur. Mauris nec tempus ligula, et molestie massa. Nulla imperdiet lectus tellus, elementum dignissim est ullamcorper eget. Sed ultrices, sapien non molestie porta, tortor tortor fringilla urna, ac luctus eros neque et libero. Nam id convallis risus, eu ultrices ex. Nam ultricies sit amet lorem aliquam sagittis. Phasellus viverra lectus eget maximus rhoncus. Vestibulum id sagittis velit. Ut pellentesque tellus in erat suscipit, ut dictum libero posuere. Proin molestie sit amet justo et vestibulum. Nunc vitae nibh eget arcu euismod eleifend quis non eros. Maecenas volutpat dictum sem vel efficitur. Proin porttitor lorem sit amet eros aliquam venenatis.\r\n\r\nMauris at libero nec dui sagittis dignissim. Duis accumsan risus euismod, tincidunt erat ut, malesuada ex. Integer nisl tellus, auctor in sagittis nec, iaculis at massa. Suspendisse interdum, mauris vel dictum ullamcorper, velit est ultricies tellus, in pellentesque mauris purus nec metus. Sed a lorem non elit tempus pretium a eu lectus. Nulla tincidunt egestas viverra. Vivamus dignissim ante nec velit consequat, a aliquet eros tempus. Aliquam mi odio, tincidunt ut nisi id, placerat commodo massa. Duis vulputate sapien dui, vel tincidunt nulla consectetur non. Duis lobortis gravida risus, in tempor massa viverra in.\r\n\r\nEtiam sit amet facilisis diam, vel imperdiet ligula. Praesent ullamcorper diam sit amet leo rutrum mattis. Quisque vulputate rutrum est, non interdum lorem mattis ac. Nulla libero mauris, dapibus sit amet diam in, gravida interdum dui. Integer commodo varius sagittis. Sed dictum risus a lectus porttitor ultrices. Ut nec dapibus massa. Morbi cursus mi sed enim venenatis auctor ac ac nibh. Donec fringilla porta pulvinar. Phasellus efficitur rutrum est, at consectetur tellus commodo vitae. Class aptent taciti sociosqu ad litora torquent per conubia nostra, per inceptos himenaeos. Nullam vitae suscipit tellus. Maecenas volutpat metus justo, ut accumsan neque accumsan quis. Duis euismod nibh nec odio sollicitudin varius. Aenean sit amet sem a ipsum interdum tempus. Curabitur tempor mi vel justo euismod, eu tempor eros ornare.\r\n\r\nUt justo neque, volutpat a enim in, blandit tempus turpis. Duis vel felis sit amet sapien sollicitudin placerat at sit amet tellus. Pellentesque posuere porttitor varius. Quisque non eros ultricies, malesuada lectus vel, dignissim turpis. Nam eu maximus justo. Sed suscipit volutpat felis, ac tempor mi auctor quis. Donec malesuada augue quis arcu vehicula dictum. Quisque in accumsan eros, vel ornare mauris.\r\n\r\nInteger faucibus sit amet dui ac finibus. Ut augue purus, volutpat vel metus ut, lacinia tristique ligula. Sed metus augue, porta eu viverra quis, consequat egestas turpis. Fusce risus lectus, accumsan sit amet finibus vitae, tincidunt nec libero. Vestibulum ultrices, massa id hendrerit consectetur, nulla est hendrerit eros, a blandit odio nunc non augue. Suspendisse iaculis mollis euismod. Donec placerat lectus eget ullamcorper placerat. Cras ullamcorper metus nec lectus congue porttitor. Aenean gravida felis sed erat lacinia ultricies. Donec quis commodo nulla, et faucibus arcu. Vivamus sit amet feugiat dolor. Pellentesque consequat non nisi vitae luctus. Cras fermentum eget turpis id sodales.', 'Mr Ayo', '2024-03-26 12:46:42'),
(2, 'Testing', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Curabitur pulvinar bibendum quam non efficitur. Mauris nec tempus ligula, et molestie massa. Nulla imperdiet lectus tellus, elementum dignissim est ullamcorper eget. Sed ultrices, sapien non molestie porta, tortor tortor fringilla urna, ac luctus eros neque et libero. Nam id convallis risus, eu ultrices ex. Nam ultricies sit amet lorem aliquam sagittis. Phasellus viverra lectus eget maximus rhoncus. Vestibulum id sagittis velit. Ut pellentesque tellus in erat suscipit, ut dictum libero posuere. Proin molestie sit amet justo et vestibulum. Nunc vitae nibh eget arcu euismod eleifend quis non eros. Maecenas volutpat dictum sem vel efficitur. Proin porttitor lorem sit amet eros aliquam venenatis.\r\n\r\nMauris at libero nec dui sagittis dignissim. Duis accumsan risus euismod, tincidunt erat ut, malesuada ex. Integer nisl tellus, auctor in sagittis nec, iaculis at massa. Suspendisse interdum, mauris vel dictum ullamcorper, velit est ultricies tellus, in pellentesque mauris purus nec metus. Sed a lorem non elit tempus pretium a eu lectus. Nulla tincidunt egestas viverra. Vivamus dignissim ante nec velit consequat, a aliquet eros tempus. Aliquam mi odio, tincidunt ut nisi id, placerat commodo massa. Duis vulputate sapien dui, vel tincidunt nulla consectetur non. Duis lobortis gravida risus, in tempor massa viverra in.\r\n\r\nEtiam sit amet facilisis diam, vel imperdiet ligula. Praesent ullamcorper diam sit amet leo rutrum mattis. Quisque vulputate rutrum est, non interdum lorem mattis ac. Nulla libero mauris, dapibus sit amet diam in, gravida interdum dui. Integer commodo varius sagittis. Sed dictum risus a lectus porttitor ultrices. Ut nec dapibus massa. Morbi cursus mi sed enim venenatis auctor ac ac nibh. Donec fringilla porta pulvinar. Phasellus efficitur rutrum est, at consectetur tellus commodo vitae. Class aptent taciti sociosqu ad litora torquent per conubia nostra, per inceptos himenaeos. Nullam vitae suscipit tellus. Maecenas volutpat metus justo, ut accumsan neque accumsan quis. Duis euismod nibh nec odio sollicitudin varius. Aenean sit amet sem a ipsum interdum tempus. Curabitur tempor mi vel justo euismod, eu tempor eros ornare.\r\n\r\nUt justo neque, volutpat a enim in, blandit tempus turpis. Duis vel felis sit amet sapien sollicitudin placerat at sit amet tellus. Pellentesque posuere porttitor varius. Quisque non eros ultricies, malesuada lectus vel, dignissim turpis. Nam eu maximus justo. Sed suscipit volutpat felis, ac tempor mi auctor quis. Donec malesuada augue quis arcu vehicula dictum. Quisque in accumsan eros, vel ornare mauris.\r\n\r\nInteger faucibus sit amet dui ac finibus. Ut augue purus, volutpat vel metus ut, lacinia tristique ligula. Sed metus augue, porta eu viverra quis, consequat egestas turpis. Fusce risus lectus, accumsan sit amet finibus vitae, tincidunt nec libero. Vestibulum ultrices, massa id hendrerit consectetur, nulla est hendrerit eros, a blandit odio nunc non augue. Suspendisse iaculis mollis euismod. Donec placerat lectus eget ullamcorper placerat. Cras ullamcorper metus nec lectus congue porttitor. Aenean gravida felis sed erat lacinia ultricies. Donec quis commodo nulla, et faucibus arcu. Vivamus sit amet feugiat dolor. Pellentesque consequat non nisi vitae luctus. Cras fermentum eget turpis id sodales.', 'Mrs Fade', '2024-03-26 12:48:46'),
(3, 'Testing', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Curabitur pulvinar bibendum quam non efficitur. Mauris nec tempus ligula, et molestie massa. Nulla imperdiet lectus tellus, elementum dignissim est ullamcorper eget. Sed ultrices, sapien non molestie porta, tortor tortor fringilla urna, ac luctus eros neque et libero. Nam id convallis risus, eu ultrices ex. Nam ultricies sit amet lorem aliquam sagittis. Phasellus viverra lectus eget maximus rhoncus. Vestibulum id sagittis velit. Ut pellentesque tellus in erat suscipit, ut dictum libero posuere. Proin molestie sit amet justo et vestibulum. Nunc vitae nibh eget arcu euismod eleifend quis non eros. Maecenas volutpat dictum sem vel efficitur. Proin porttitor lorem sit amet eros aliquam venenatis.\r\n\r\nMauris at libero nec dui sagittis dignissim. Duis accumsan risus euismod, tincidunt erat ut, malesuada ex. Integer nisl tellus, auctor in sagittis nec, iaculis at massa. Suspendisse interdum, mauris vel dictum ullamcorper, velit est ultricies tellus, in pellentesque mauris purus nec metus. Sed a lorem non elit tempus pretium a eu lectus. Nulla tincidunt egestas viverra. Vivamus dignissim ante nec velit consequat, a aliquet eros tempus. Aliquam mi odio, tincidunt ut nisi id, placerat commodo massa. Duis vulputate sapien dui, vel tincidunt nulla consectetur non. Duis lobortis gravida risus, in tempor massa viverra in.\r\n\r\nEtiam sit amet facilisis diam, vel imperdiet ligula. Praesent ullamcorper diam sit amet leo rutrum mattis. Quisque vulputate rutrum est, non interdum lorem mattis ac. Nulla libero mauris, dapibus sit amet diam in, gravida interdum dui. Integer commodo varius sagittis. Sed dictum risus a lectus porttitor ultrices. Ut nec dapibus massa. Morbi cursus mi sed enim venenatis auctor ac ac nibh. Donec fringilla porta pulvinar. Phasellus efficitur rutrum est, at consectetur tellus commodo vitae. Class aptent taciti sociosqu ad litora torquent per conubia nostra, per inceptos himenaeos. Nullam vitae suscipit tellus. Maecenas volutpat metus justo, ut accumsan neque accumsan quis. Duis euismod nibh nec odio sollicitudin varius. Aenean sit amet sem a ipsum interdum tempus. Curabitur tempor mi vel justo euismod, eu tempor eros ornare.\r\n\r\nUt justo neque, volutpat a enim in, blandit tempus turpis. Duis vel felis sit amet sapien sollicitudin placerat at sit amet tellus. Pellentesque posuere porttitor varius. Quisque non eros ultricies, malesuada lectus vel, dignissim turpis. Nam eu maximus justo. Sed suscipit volutpat felis, ac tempor mi auctor quis. Donec malesuada augue quis arcu vehicula dictum. Quisque in accumsan eros, vel ornare mauris.\r\n\r\nInteger faucibus sit amet dui ac finibus. Ut augue purus, volutpat vel metus ut, lacinia tristique ligula. Sed metus augue, porta eu viverra quis, consequat egestas turpis. Fusce risus lectus, accumsan sit amet finibus vitae, tincidunt nec libero. Vestibulum ultrices, massa id hendrerit consectetur, nulla est hendrerit eros, a blandit odio nunc non augue. Suspendisse iaculis mollis euismod. Donec placerat lectus eget ullamcorper placerat. Cras ullamcorper metus nec lectus congue porttitor. Aenean gravida felis sed erat lacinia ultricies. Donec quis commodo nulla, et faucibus arcu. Vivamus sit amet feugiat dolor. Pellentesque consequat non nisi vitae luctus. Cras fermentum eget turpis id sodales.', 'Mr Test', '2024-03-26 12:49:10');

-- --------------------------------------------------------

--
-- Table structure for table `project_payment`
--

CREATE TABLE `project_payment` (
  `id` int(11) NOT NULL,
  `title` varchar(25) NOT NULL,
  `description` varchar(255) NOT NULL,
  `fee` varchar(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `project_payment`
--

INSERT INTO `project_payment` (`id`, `title`, `description`, `fee`) VALUES
(1, 'New Fee', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Aliquam dapibus ac ex at porttitor. Nulla vel elementum elit. In hac habitasse platea dictumst. Donec aliquet lorem nec lectus malesuada,', '10,000');

-- --------------------------------------------------------

--
-- Table structure for table `project_students`
--

CREATE TABLE `project_students` (
  `id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `studentid` varchar(25) NOT NULL,
  `email` varchar(255) NOT NULL,
  `department` varchar(255) NOT NULL,
  `status_1` int(11) NOT NULL DEFAULT 0,
  `status_2` int(11) NOT NULL DEFAULT 0,
  `password` varchar(255) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `project_students`
--

INSERT INTO `project_students` (`id`, `name`, `studentid`, `email`, `department`, `status_1`, `status_2`, `password`, `created_at`) VALUES
(1, 'Adesola Ayomide Oni', 'LUC-NGA-002-ADM-1000398', 'adesolaoni2001@gmail.com', 'Computer Software Engineering', 1, 1, '$2y$10$ZnJYEQihtj780/VMdu9YvOwEnr.SZt/ly935rkLJqFIatw20E9TxC', '2024-03-26 11:25:25'),
(2, 'test', 'LUC-NGA-002-ADM-1000500', 'test@gmail.com', 'test', 1, 0, '$2y$10$k5kckZ5MjiYfLWhbTP/IzOvZNVCFVmhyn/wZcxjX73sYmZr/BXIfC', '2024-03-26 11:40:38'),
(3, 'test3', 'LUC-NGA-002-ADM-1000300', 'test3@gmail.com', 'test3', 1, 1, '$2y$10$sEVA8K1bh42pqGuZ1nDTO.bCooPPNnx6P5fK21JREJXty5KmaacjG', '2024-03-26 11:41:52'),
(4, 'Ade', 'LUC-NGA-002-ADM-12', 'ade@gmail.com', 'Computer Software Engineering', 0, 0, '$2y$10$7F6XVdeR.C1Uu2bI/1cdvuQjwGH.ohKS3t/fl0RgCFQBgoQENWjgK', '2024-03-26 15:48:21');

-- --------------------------------------------------------

--
-- Table structure for table `project_student_payments`
--

CREATE TABLE `project_student_payments` (
  `id` int(11) NOT NULL,
  `rowid` int(11) NOT NULL,
  `student_id` varchar(112) NOT NULL,
  `receipt_path` varchar(255) NOT NULL,
  `payment_status` enum('paid','pending') DEFAULT 'pending',
  `created_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `project_student_payments`
--

INSERT INTO `project_student_payments` (`id`, `rowid`, `student_id`, `receipt_path`, `payment_status`, `created_at`) VALUES
(1, 1, 'LUC-NGA-002-ADM-1000398', 'receiptuploads/receipt_6728638542a8a8.45132204.png', 'paid', '2024-11-04 06:02:45');

-- --------------------------------------------------------

--
-- Table structure for table `project_uploads`
--

CREATE TABLE `project_uploads` (
  `id` int(11) NOT NULL,
  `studentid` varchar(25) NOT NULL,
  `description` varchar(2555) NOT NULL,
  `document` varchar(255) NOT NULL,
  `gitlink` varchar(255) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `staff_membership`
--

CREATE TABLE `staff_membership` (
  `id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `department` varchar(255) NOT NULL,
  `focusArea` varchar(255) NOT NULL,
  `phone` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `student_membership`
--

CREATE TABLE `student_membership` (
  `id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `department` varchar(255) NOT NULL,
  `fieldStudy` varchar(255) NOT NULL,
  `skill` varchar(255) NOT NULL,
  `phone` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `date` varchar(255) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `student_projects`
--

CREATE TABLE `student_projects` (
  `id` int(11) NOT NULL,
  `image` varchar(255) DEFAULT NULL,
  `document` varchar(225) DEFAULT NULL,
  `link` varchar(225) DEFAULT NULL,
  `title` varchar(255) NOT NULL,
  `description` varchar(255) NOT NULL,
  `student` varchar(255) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `student_projects`
--

INSERT INTO `student_projects` (`id`, `image`, `document`, `link`, `title`, `description`, `student`, `created_at`) VALUES
(1, 'adminprojectuploads/WhatsApp Image 2023-06-23 at 108.12.58.jpg', NULL, NULL, 'Test', 'Test Test ', 'Ayo', '2024-03-21 12:24:28'),
(2, 'adminprojectuploads/sugar-cane-juice-logo-design-template-c696f5842dc00b8cf4cfb6eb281c70bd_screen.jpg', NULL, NULL, 'Second Test', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Aliquam volutpat nunc neque, id molestie odio dictum quis. Praesent sit amet nisl posuere, vestibulum lacus in, consequat metus. Mauris condimentum justo non leo vulputate venenatis. Nulla tortor do', 'Dele', '2024-03-21 13:55:41'),
(3, 'adminprojectuploads/ken.jpg', 'adminprojectuploads/Secret Of Sonic Zone Pt1.pdf', 'https://audiomack.com/', 'Abstract Things', 'Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry\'s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has su', 'Daniel Lincoln', '2025-02-07 11:42:45'),
(4, 'adminprojectuploads/1733985242304.jpeg', 'adminprojectuploads/Treasurer-Roles-Responsibilities.pdf', 'https://www.ilovepdf.com/', 'PHP Project', 'There are many variations of passages of Lorem Ipsum available, but the majority have suffered alteration in some form, by injected humour, or randomised words which don\'t look even slightly believable. If you are going to use a passage of Lorem Ipsum, yo', 'Ayo', '2025-02-07 12:03:30'),
(5, 'adminprojectuploads/weeknd.jpg', 'adminprojectuploads/Secret Of Sonic Zone Pt1.pdf', 'https://soundcloud.com/discover', 'Salt Condenser', 'There are many variations of passages of Lorem Ipsum available, but the majority have suffered alteration in some form, by injected humour, or randomised words which don\'t look even slightly believable. If you are going to use a passage of Lorem Ipsum, yo', 'Dele', '2025-02-07 12:11:40'),
(6, 'adminprojectuploads/mesh.jpeg', 'adminprojectuploads/Independent_Contractor_Agreement_-_fundsfortraders-_Oct2023.pdf', 'https://audiomack.com/', 'message', 'message', 'message', '2025-02-07 12:15:41'),
(7, 'adminprojectuploads/1733985242304.jpeg', 'adminprojectuploads/Secret Of Sonic Zone Pt1.pdf', 'https://www.ilovepdf.com/', 'Deed', 'There are many variations of passages of Lorem Ipsum available, but the majority have suffered alteration in some form, by injected humour, or randomised words which don\'t look even slightly believable. If you are going to use a passage of Lorem Ipsum, yo', 'Dele', '2025-02-07 12:24:22'),
(8, 'adminprojectuploads/kendrick.jpg', 'adminprojectuploads/Secret Of Sonic Zone Pt1.pdf', 'https://soundcloud.com/discover', 'Bot', 'There are many variations of passages of Lorem Ipsum available, but the majority have suffered alteration in some form, by injected humour, or randomised words which don\'t look even slightly believable. If you are going to use a passage of Lorem Ipsum, yo', 'Dara', '2025-02-07 12:36:58'),
(9, 'adminprojectuploads/ye.jpg', 'adminprojectuploads/Secret Of Sonic Zone Pt1.pdf', 'https://audiomack.com/', 'Gigi', 'There are many variations of passages of Lorem Ipsum available, but the majority have suffered alteration in some form, by injected humour, or randomised words which don\'t look even slightly believable. If you are going to use a passage of Lorem Ipsum, yo', 'Gigi', '2025-02-07 12:45:14'),
(10, 'adminprojectuploads/1733985242304.jpeg', 'adminprojectuploads/Secret Of Sonic Zone Pt1.pdf', 'https://www.ilovepdf.com/', 'Kiki', 'There are many variations of passages of Lorem Ipsum available, but the majority have suffered alteration in some form, by injected humour, or randomised words which don\'t look even slightly believable. If you are going to use a passage of Lorem Ipsum, yo', 'Kiki', '2025-02-07 12:50:20'),
(11, 'adminprojectuploads/8384538.jpg', 'adminprojectuploads/Secret Of Sonic Zone Pt1.pdf', 'https://www.lipsum.com/', 'The Greatest', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Nulla sollicitudin arcu et blandit sagittis. Maecenas mollis blandit felis at ornare. Etiam fringilla pulvinar ante sed dignissim. Maecenas suscipit est sit amet nisi commodo consectetur. Pellentesq', 'Jackson Trump', '2025-02-24 14:28:00');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admin`
--
ALTER TABLE `admin`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `external_internship`
--
ALTER TABLE `external_internship`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `external_membership`
--
ALTER TABLE `external_membership`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `internal_internship`
--
ALTER TABLE `internal_internship`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `project_information`
--
ALTER TABLE `project_information`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `project_payment`
--
ALTER TABLE `project_payment`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `project_students`
--
ALTER TABLE `project_students`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `project_student_payments`
--
ALTER TABLE `project_student_payments`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `project_uploads`
--
ALTER TABLE `project_uploads`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `staff_membership`
--
ALTER TABLE `staff_membership`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `student_membership`
--
ALTER TABLE `student_membership`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `student_projects`
--
ALTER TABLE `student_projects`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `admin`
--
ALTER TABLE `admin`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `external_internship`
--
ALTER TABLE `external_internship`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `external_membership`
--
ALTER TABLE `external_membership`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `internal_internship`
--
ALTER TABLE `internal_internship`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `project_information`
--
ALTER TABLE `project_information`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `project_payment`
--
ALTER TABLE `project_payment`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `project_students`
--
ALTER TABLE `project_students`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `project_student_payments`
--
ALTER TABLE `project_student_payments`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `project_uploads`
--
ALTER TABLE `project_uploads`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `staff_membership`
--
ALTER TABLE `staff_membership`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `student_membership`
--
ALTER TABLE `student_membership`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `student_projects`
--
ALTER TABLE `student_projects`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
