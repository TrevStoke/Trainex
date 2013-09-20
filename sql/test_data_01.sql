-- phpMyAdmin SQL Dump
-- version 3.4.5
-- http://www.phpmyadmin.net
--
-- Host: localhost
-- Generation Time: Sep 20, 2013 at 03:45 PM
-- Server version: 5.5.16
-- PHP Version: 5.3.8

SET SQL_MODE="NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `trainex_01`
--

--
-- Dumping data for table `common_skills`
--

INSERT INTO `common_skills` (`id`, `code`, `description`, `created`, `modified`) VALUES
(1, 'HEALTH-SAFETY-01', 'Observe appropriate health and safety procedures.', '2013-09-20 10:11:35', '2013-09-20 10:11:35'),
(2, 'PUNCTUALITY-01', 'Be punctual and timely in all activities.', '2013-09-20 10:11:35', '2013-09-20 10:11:35');

--
-- Dumping data for table `employees`
--

INSERT INTO `employees` (`id`, `name`, `active`, `created`, `modified`) VALUES
(1, 'Daniel Morton', 1, '2013-09-20 10:13:47', '2013-09-20 10:13:47'),
(2, 'Faith McCrory', 1, '2013-09-20 10:13:47', '2013-09-20 10:13:47'),
(3, 'David Crick', 1, '2013-09-20 10:15:04', '2013-09-20 10:15:04'),
(4, 'Alice Beddoes', 1, '2013-09-20 10:15:04', '2013-09-20 10:15:04'),
(5, 'Tanya Harrison', 0, '2013-09-20 10:16:05', '2013-09-20 10:16:05'),
(6, 'Clive Dennis', 1, '2013-09-20 10:16:05', '2013-09-20 10:16:05'),
(7, 'James Miller', 1, '2013-09-20 10:17:41', '2013-09-20 10:17:41'),
(8, 'William Leighton', 0, '2013-09-20 10:17:41', '2013-09-20 10:17:41'),
(9, 'Colin Farmer', 1, '2013-09-20 10:26:54', '2013-09-20 10:26:54'),
(10, 'Patrick Todd', 1, '2013-09-20 10:26:54', '2013-09-20 10:26:54');

--
-- Dumping data for table `mentors`
--

INSERT INTO `mentors` (`id`, `employee_id`, `active`, `created`, `modified`) VALUES
(1, 6, 1, '2013-09-20 10:20:39', '2013-09-20 10:20:39'),
(2, 1, 0, '2013-09-20 10:20:39', '2013-09-20 10:20:39'),
(3, 2, 1, '2013-09-20 10:22:21', '2013-09-20 10:22:21'),
(4, 5, 1, '2013-09-20 10:22:21', '2013-09-20 10:22:21');

--
-- Dumping data for table `plans`
--

INSERT INTO `plans` (`id`, `code`, `description`, `retrain_interval`, `retrain_plan_id`, `active`, `created`, `modified`) VALUES
(1, 'LOOSE-DEPOT-01', 'Mount/demount tyres to a loose wheel rim at a T&C depot.', 12, 2, 0, '2013-09-20 11:05:39', '2013-09-20 11:05:39'),
(2, 'LOOSE-DEPOT-RE-01', 'Demonstrate the mounting/demounting of tyres to loose wheel rims.', 24, 2, 1, '2013-09-20 11:05:39', '2013-09-20 11:05:39'),
(3, 'LOOSE-DEPOT-02', 'Mount/demount tyres to loose wheel rims of various types at a T&C depot.', 12, 2, 1, '2013-09-20 11:08:53', '2013-09-20 11:08:53'),
(4, 'FIXED-CLIENT-01', 'Mount/demount tyres onto various rim types on clients'' sites.', NULL, NULL, 1, '2013-09-20 11:11:58', '2013-09-20 11:11:58'),
(5, 'HEALTH-SAFETY-01', 'Read and understand T&C''s Health and Safety Guide.', NULL, NULL, 1, '2013-09-20 12:01:01', '2013-09-20 12:01:01');

--
-- Dumping data for table `skills`
--

INSERT INTO `skills` (`id`, `plan_id`, `code`, `description`, `created`, `modified`) VALUES
(1, 1, 'LOOSE-DEPOT-RIM-X', 'Mount/demount tyres to loose wheel rims of type X.', '2013-09-20 11:22:53', '2013-09-20 11:22:53'),
(2, 1, 'LOOSE-DEPOT-RIM-Y', 'Mount/demount tyres to loose wheel rims of type Y.', '2013-09-20 11:22:36', '2013-09-20 11:22:36'),
(3, 1, 'HEALTH-SAFETY-01', 'Observe appropriate health and safety procedures.', '2013-09-20 11:36:50', '2013-09-20 11:36:50'),
(4, 1, 'PUNCTUALITY-01', 'Be punctual and timely in all activities.', '2013-09-20 11:36:50', '2013-09-20 11:36:50'),
(5, 4, 'FIXED-CLIENT-RIM-X', 'Mount/demount tyres to fixed wheel rims of type X.', '2013-09-20 11:39:05', '2013-09-20 11:39:05'),
(6, 4, 'FIXED-CLIENT-RIM-Y', 'Mount/demount tyres to fixed wheel rims of type Y.', '2013-09-20 11:39:05', '2013-09-20 11:39:05'),
(7, 4, 'FIXED-CLIENT-RIM-Z', 'Mount/demount tyres to fixed wheel rims of type Z.', '2013-09-20 11:39:53', '2013-09-20 11:39:53'),
(8, 4, 'HEALTH-SAFETY-01', 'Observe appropriate health and safety procedures.', '2013-09-20 11:41:15', '2013-09-20 11:41:15'),
(9, 4, 'PUNCTUALITY-01', 'Be punctual and timely in all activities.', '2013-09-20 11:41:15', '2013-09-20 11:41:15'),
(10, 2, 'LOOSE-DEMO-RIM-X', 'Demonstrate the mounting/demounting of tyres to loose wheel rims of type X.', '2013-09-20 11:48:21', '2013-09-20 11:48:21'),
(11, 2, 'LOOSE-DEMO-RIM-Y', 'Demonstrate the mounting/demounting of tyres to loose wheel rims of type Y.', '2013-09-20 11:48:21', '2013-09-20 11:48:21'),
(12, 2, 'HEALTH-SAFETY-01', 'Observe appropriate health and safety procedures.', '2013-09-20 11:49:13', '2013-09-20 11:49:13'),
(13, 3, 'LOOSE-DEPOT-RIM-X', 'Mount/demount tyres to loose wheel rims of type X.', '2013-09-20 11:51:50', '2013-09-20 11:51:50'),
(14, 3, 'LOOSE-DEPOT-RIM-Y', 'Mount/demount tyres to loose wheel rims of type Y.', '2013-09-20 11:51:50', '2013-09-20 11:51:50'),
(15, 3, 'LOOSE-DEPOT-RIM-Z', 'Mount/demount tyres to loose wheel rims of type Z.', '2013-09-20 11:52:42', '2013-09-20 11:52:42'),
(16, 3, 'HEALTH-SAFETY-01', 'Observe appropriate health and safety procedures.', '2013-09-20 11:53:55', '2013-09-20 11:53:55'),
(17, 3, 'PUNCTUALITY-01', 'Be punctual and timely in all activities.', '2013-09-20 11:53:55', '2013-09-20 11:53:55'),
(18, 5, 'TOOLBOX', 'Demonstrate understanding of toolbox safety.', '2013-09-20 12:03:55', '2013-09-20 12:03:55'),
(19, 5, 'CRANE', 'Demonstrate understanding of crane safety.', '2013-09-20 12:03:55', '2013-09-20 12:03:55');

--
-- Dumping data for table `skill_grades`
--

INSERT INTO `skill_grades` (`id`, `grade`, `description`, `created`, `modified`) VALUES
(1, 'A', 'The trainee needs no further training on the associated skill at this time, and is suitably proficient to perform the skill unsupervised at a customer site.', '2013-09-20 11:16:16', '2013-09-20 11:16:16'),
(2, 'B', 'The trainee is demonstrating an increasing ability in this skill, and with further training should become proficient in due course.', '2013-09-20 11:16:16', '2013-09-20 11:16:16'),
(3, 'C', 'The trainee is experiencing considerable difficulty in grasping this skill, and further consideration should be given to their suitability to proceed at all.', '2013-09-20 11:17:23', '2013-09-20 11:17:23'),
(4, 'Z', 'The trainee''s proficiency in this skill was not assessed.', '2013-09-20 11:17:23', '2013-09-20 11:17:23');

--
-- Dumping data for table `supervisors`
--

INSERT INTO `supervisors` (`id`, `employee_id`, `active`, `created`, `modified`) VALUES
(1, 1, 1, '2013-09-20 10:25:06', '2013-09-20 10:25:06'),
(2, 7, 1, '2013-09-20 10:25:06', '2013-09-20 10:25:06'),
(3, 8, 0, '2013-09-20 10:25:47', '2013-09-20 10:25:47');

--
-- Dumping data for table `trainees`
--

INSERT INTO `trainees` (`id`, `employee_id`, `active`, `created`, `modified`) VALUES
(1, 3, 1, '2013-09-20 10:29:02', '2013-09-20 10:29:02'),
(2, 9, 0, '2013-09-20 10:29:02', '2013-09-20 10:29:02'),
(3, 10, 1, '2013-09-20 10:30:01', '2013-09-20 10:30:01'),
(4, 4, 1, '2013-09-20 10:30:01', '2013-09-20 10:30:01'),
(5, 2, 0, '2013-09-20 10:48:37', '2013-09-20 10:48:37'),
(6, 8, 1, '2013-09-20 10:48:37', '2013-09-20 10:48:37');

--
-- Dumping data for table `trainees_plans`
--

INSERT INTO `trainees_plans` (`id`, `trainee_id`, `plan_id`, `created`, `modified`) VALUES
(1, 5, 5, '2013-09-20 12:44:50', '2013-09-20 12:44:50'),
(2, 5, 1, '2013-09-20 12:44:50', '2013-09-20 12:44:50'),
(3, 1, 2, '2013-09-20 13:11:27', '2013-09-20 13:11:27'),
(4, 3, 2, '2013-09-20 13:11:27', '2013-09-20 13:11:27'),
(5, 5, 3, '2013-09-20 13:13:24', '2013-09-20 13:13:24'),
(6, 5, 5, '2013-09-20 13:13:24', '2013-09-20 13:13:24');

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
