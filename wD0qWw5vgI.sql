-- phpMyAdmin SQL Dump
-- version 4.8.5
-- https://www.phpmyadmin.net/
--
-- Host: localhost
-- Generation Time: Dec 05, 2019 at 06:24 PM
-- Server version: 8.0.13-4
-- PHP Version: 7.2.24-0ubuntu0.18.04.1

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `wD0qWw5vgI`
--

-- --------------------------------------------------------

--
-- Table structure for table `links`
--

CREATE TABLE `links` (
  `link_id` int(11) NOT NULL,
  `link_url` varchar(45) NOT NULL,
  `link_name` varchar(45) NOT NULL,
  `roles_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `links`
--

INSERT INTO `links` (`link_id`, `link_url`, `link_name`, `roles_id`) VALUES
(46, 'https://globalmanage.com', 'Manage User Accounts', 1),
(47, 'https://globalassignroles.com', 'Assign Roles', 1),
(48, 'https://globalhelpdesk.com', 'Help Desk', 1),
(49, 'https://financereports.com', 'Finace Reports', 3),
(50, 'https://accountspayable.com', 'Accounts Payable', 3),
(51, 'https://accountsreceivables', 'Accounts Receivables', 3),
(52, 'https://tax.com', 'Tax', 3),
(53, 'https://salesreports.com', 'Sales Reports', 4),
(54, 'https://salesleads.com', 'Sales Leads', 4),
(55, 'https://salesdemo.com', 'Sales Demo', 4),
(56, 'https://newhire.com', 'New Hire', 5),
(57, 'https://onboarding.com', 'On-boarding', 5),
(58, 'https://benefits.com', 'Benefits', 5),
(59, 'https://payroll.com', 'Payroll', 5),
(60, 'https://terminations.com', 'Terminations', 5),
(61, 'https://hrreports.com', 'HR Reports', 5),
(62, 'https://applicationmonitoring.com', 'Application Monitoring', 6),
(63, 'https://techsupport.com', 'Tech Support', 6),
(64, 'https://appdevelopment.com', 'App Development', 6),
(65, 'https://appadmin.com', 'App Admin', 6),
(66, 'https://releasemanagement.com', 'Release Management', 6);

-- --------------------------------------------------------

--
-- Table structure for table `roles`
--

CREATE TABLE `roles` (
  `roles_id` int(11) NOT NULL,
  `roles_name` varchar(45) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `roles`
--

INSERT INTO `roles` (`roles_id`, `roles_name`) VALUES
(6, 'Engineering Admin'),
(3, 'Finance Admin'),
(1, 'Global Admin'),
(5, 'HR Admin'),
(4, 'Sales Admin'),
(2, 'Super Admin');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `email` varchar(45) NOT NULL,
  `pass` varchar(256) NOT NULL,
  `roles_id` int(11) DEFAULT NULL,
  `first_name` varchar(45) NOT NULL,
  `last_name` varchar(45) NOT NULL,
  `user_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`email`, `pass`, `roles_id`, `first_name`, `last_name`, `user_id`) VALUES
('eujarral@uh.edu', '$2y$10$zpkRm1XYQDOSSrTJVjba6eQnGSJTQqBuri8PMdDZmswRpwk4mp78m', 2, 'Ehad', 'Jarral', 17),
('ktdinh7@uh.edu', '$2y$10$5.sbcCC0C.XCo0YsWP6Wy.McpmB56fdf43q/ymnMNWpOr1c18r5fy', 3, 'Kiet', 'Dinh', 18),
('ynnguyen4@uh.edu', '$2y$10$KPwrdba16UP3HsXCWiw4I.VRuQX92WCNg5s7TWExzwLbhiQAoJsMm', 6, 'Y', 'Nguyen', 19),
('johnsmith@gmail.com', '$2y$10$o3vY/xVtMCoKDr2/Jw./tecKXCpcedeXD1owY1UEN5Jc9S1AusHKW', 1, 'John', 'Smith', 31),
('maryjohnson@gmail.com', '$2y$10$NohmeVaXC3muZSGRFyEUu.2rUpkH6fGvvIDEsHkBK8OrQqHm0eML6', 4, 'Mary', 'Johnson', 32),
('charleslopez@gmail.com', '$2y$10$R48c79t5uuqCsiGu226b1./Pw3TYEk31p17jOIgsCfWNE/Kc6ZmEm', 5, 'Charles', 'Lopez', 33);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `links`
--
ALTER TABLE `links`
  ADD PRIMARY KEY (`link_id`),
  ADD UNIQUE KEY `link_id_UNIQUE` (`link_id`),
  ADD UNIQUE KEY `link_url_UNIQUE` (`link_url`),
  ADD KEY `roles_id_fk_links_idx` (`roles_id`);

--
-- Indexes for table `roles`
--
ALTER TABLE `roles`
  ADD PRIMARY KEY (`roles_id`),
  ADD UNIQUE KEY `id_roles_UNIQUE` (`roles_id`),
  ADD UNIQUE KEY `roles_name_UNIQUE` (`roles_name`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`user_id`),
  ADD UNIQUE KEY `email_UNIQUE` (`email`),
  ADD UNIQUE KEY `user_id_UNIQUE` (`user_id`),
  ADD KEY `role_idx` (`roles_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `links`
--
ALTER TABLE `links`
  MODIFY `link_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=68;

--
-- AUTO_INCREMENT for table `roles`
--
ALTER TABLE `roles`
  MODIFY `roles_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `user_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=39;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `links`
--
ALTER TABLE `links`
  ADD CONSTRAINT `roles_id_fk_links` FOREIGN KEY (`roles_id`) REFERENCES `roles` (`roles_id`);

--
-- Constraints for table `users`
--
ALTER TABLE `users`
  ADD CONSTRAINT `role` FOREIGN KEY (`roles_id`) REFERENCES `roles` (`roles_id`) ON DELETE SET NULL;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
