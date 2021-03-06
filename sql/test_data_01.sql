-- phpMyAdmin SQL Dump
-- version 3.4.5
-- http://www.phpmyadmin.net
--
-- Host: localhost
-- Generation Time: Sep 27, 2013 at 03:50 PM
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
-- Dumping data for table `assessments`
--

INSERT INTO `assessments` (`id`, `plan_id`, `trainee_id`, `mentor_id`, `supervisor_id`, `occurred`, `completion_status_id`, `created`, `modified`) VALUES
(1, 1, 1, 2, 3, '2012-12-08', 1, '2013-09-23 11:38:03', '2013-09-23 11:38:03'),
(2, 1, 1, 2, 1, '2012-12-15', 2, '2013-09-23 11:38:03', '2013-09-23 11:38:03'),
(3, 2, 1, 1, 1, '2013-09-05', 1, '2013-09-23 11:39:56', '2013-09-23 11:39:56'),
(4, 1, 2, 3, 1, '2013-09-01', 1, '2013-09-23 11:59:00', '2013-09-23 11:59:00'),
(5, 1, 2, 3, 2, '2013-09-08', 1, '2013-09-23 11:59:00', '2013-09-23 11:59:00'),
(6, 5, 2, 1, 1, '2013-09-01', 2, '2013-09-23 12:02:11', '2013-09-23 12:02:11'),
(7, 3, 3, 4, 3, '2012-12-01', 1, '2013-09-23 12:07:35', '2013-09-23 12:07:35'),
(8, 3, 3, 4, 3, '2012-12-08', 1, '2013-09-23 12:07:35', '2013-09-23 12:07:35'),
(9, 3, 3, 4, 3, '2012-12-15', 2, '2013-09-23 12:12:24', '2013-09-23 12:12:24'),
(10, 2, 3, 1, 2, '2013-09-01', 1, '2013-09-23 12:12:24', '2013-09-23 12:12:24'),
(11, 1, 4, 2, 3, '2012-06-15', 2, '2013-09-23 12:15:24', '2013-09-23 12:15:24'),
(12, 3, 5, 4, 2, '2013-09-08', 1, '2013-09-23 12:22:20', '2013-09-23 12:22:20'),
(13, 3, 5, 4, 2, '2013-09-15', 1, '2013-09-23 12:22:20', '2013-09-23 12:22:20'),
(14, 5, 5, 1, 1, '2013-09-15', 1, '2013-09-23 12:24:02', '2013-09-23 12:24:02'),
(15, 1, 6, 2, 1, '2012-12-08', 1, '2013-09-23 12:27:11', '2013-09-23 12:27:11'),
(16, 1, 6, 2, 1, '2012-12-15', 2, '2013-09-23 12:27:11', '2013-09-23 12:27:11'),
(17, 2, 6, 1, 1, '2013-09-01', 3, '2013-09-23 12:30:22', '2013-09-23 12:30:22');

--
-- Dumping data for table `common_skills`
--

INSERT INTO `common_skills` (`id`, `code`, `description`, `created`, `modified`) VALUES
(1, 'HEALTH-SAFETY-01', 'Observe appropriate health and safety procedures.', '2013-09-20 10:11:35', '2013-09-20 10:11:35'),
(2, 'PUNCTUALITY-01', 'Be punctual and timely in all activities.', '2013-09-20 10:11:35', '2013-09-20 10:11:35');

--
-- Dumping data for table `completion_statuses`
--

INSERT INTO `completion_statuses` (`id`, `name`, `created`, `modified`) VALUES
(1, 'Not yet complete', '2013-09-23 10:43:59', '2013-09-23 10:43:59'),
(2, 'Successful completion', '2013-09-23 10:43:59', '2013-09-23 10:43:59'),
(3, 'FAILED completion', '2013-09-23 10:44:14', '2013-09-23 10:44:14');

--
-- Dumping data for table `employees`
--

INSERT INTO `employees` (`id`, `first_name`, `last_name`, `active`, `created`, `modified`) VALUES
(1, 'Daniel', 'Morton', 1, '2013-09-20 10:13:47', '2013-09-20 10:13:47'),
(2, 'Faith', 'McRory', 1, '2013-09-20 10:13:47', '2013-09-20 10:13:47'),
(3, 'David', 'Crick', 1, '2013-09-20 10:15:04', '2013-09-20 10:15:04'),
(4, 'Alice', 'Beddoes', 1, '2013-09-20 10:15:04', '2013-09-20 10:15:04'),
(5, 'Tanya', 'Harrison', 0, '2013-09-20 10:16:05', '2013-09-20 10:16:05'),
(6, 'Clive', 'Dennis', 1, '2013-09-20 10:16:05', '2013-09-20 10:16:05'),
(7, 'James', 'Miller', 1, '2013-09-20 10:17:41', '2013-09-20 10:17:41'),
(8, 'William', 'Leighton', 0, '2013-09-20 10:17:41', '2013-09-20 10:17:41'),
(9, 'Colin', 'Farmer', 1, '2013-09-20 10:26:54', '2013-09-20 10:26:54'),
(10, 'Patrick', 'Todd', 1, '2013-09-20 10:26:54', '2013-09-20 10:26:54');

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
-- Dumping data for table `retrain_reminders`
--

INSERT INTO `retrain_reminders` (`id`, `trainee_id`, `completion_plan_id`, `completion_occurred`, `retrain_plan_id`, `retrain_due`, `retrain_plan_assigned`, `created`, `modified`) VALUES
(1, 1, 1, '2012-12-15', 2, '2013-12-15', 1, '2013-09-23 10:18:12', '2013-09-23 10:18:12'),
(2, 3, 3, '2012-12-15', 2, '2013-12-15', 1, '2013-09-23 10:18:12', '2013-09-23 10:18:12'),
(3, 4, 1, '2012-06-15', 2, '2013-06-15', 0, '2013-09-23 10:20:35', '2013-09-23 10:20:35'),
(4, 6, 1, '2012-12-15', 2, '2013-12-15', 0, '2013-09-23 10:20:35', '2013-09-23 10:20:35');

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
-- Dumping data for table `skill_assessments`
--

INSERT INTO `skill_assessments` (`id`, `skill_id`, `assessment_id`, `skill_grade_id`, `created`, `modified`) VALUES
(1, 1, 1, 2, '2013-09-23 12:40:01', '2013-09-23 12:40:01'),
(2, 2, 1, 2, '2013-09-23 12:40:01', '2013-09-23 12:40:01'),
(3, 3, 1, 1, '2013-09-23 12:40:45', '2013-09-23 12:40:45'),
(4, 4, 1, 1, '2013-09-23 12:40:45', '2013-09-23 12:40:45'),
(5, 1, 2, 1, '2013-09-23 12:42:26', '2013-09-23 12:42:26'),
(6, 2, 2, 1, '2013-09-23 12:42:26', '2013-09-23 12:42:26'),
(7, 3, 2, 1, '2013-09-23 12:43:01', '2013-09-23 12:43:01'),
(8, 4, 2, 2, '2013-09-23 12:43:01', '2013-09-23 12:43:01'),
(9, 10, 3, 1, '2013-09-23 12:45:15', '2013-09-23 12:45:15'),
(10, 11, 3, 1, '2013-09-23 12:45:15', '2013-09-23 12:45:15'),
(11, 12, 3, 2, '2013-09-23 12:45:32', '2013-09-23 12:45:32'),
(12, 1, 4, 2, '2013-09-23 12:47:15', '2013-09-23 12:47:15'),
(13, 2, 4, 2, '2013-09-23 12:47:15', '2013-09-23 12:47:15'),
(14, 3, 4, 2, '2013-09-23 12:47:53', '2013-09-23 12:47:53'),
(15, 4, 4, 2, '2013-09-23 12:47:53', '2013-09-23 12:47:53'),
(16, 1, 5, 2, '2013-09-23 12:49:11', '2013-09-23 12:49:11'),
(17, 2, 5, 2, '2013-09-23 12:49:11', '2013-09-23 12:49:11'),
(18, 3, 5, 1, '2013-09-23 12:50:01', '2013-09-23 12:50:01'),
(19, 4, 5, 2, '2013-09-23 12:50:01', '2013-09-23 12:50:01'),
(20, 18, 6, 1, '2013-09-23 12:51:17', '2013-09-23 12:51:17'),
(21, 19, 6, 1, '2013-09-23 12:51:17', '2013-09-23 12:51:17'),
(22, 13, 7, 2, '2013-09-23 12:53:10', '2013-09-23 12:53:10'),
(23, 14, 7, 2, '2013-09-23 12:53:10', '2013-09-23 12:53:10'),
(24, 15, 7, 2, '2013-09-23 12:53:47', '2013-09-23 12:53:47'),
(25, 16, 7, 2, '2013-09-23 12:53:47', '2013-09-23 12:53:47'),
(26, 17, 7, 2, '2013-09-23 12:54:06', '2013-09-23 12:54:06'),
(27, 13, 8, 2, '2013-09-23 12:55:07', '2013-09-23 12:55:07'),
(28, 14, 8, 2, '2013-09-23 12:55:07', '2013-09-23 12:55:07'),
(29, 15, 8, 2, '2013-09-23 12:55:44', '2013-09-23 12:55:44'),
(30, 16, 8, 1, '2013-09-23 12:55:44', '2013-09-23 12:55:44'),
(31, 17, 8, 1, '2013-09-23 12:56:22', '2013-09-23 12:56:22'),
(32, 13, 9, 1, '2013-09-23 12:57:18', '2013-09-23 12:57:18'),
(33, 14, 9, 1, '2013-09-23 12:57:18', '2013-09-23 12:57:18'),
(34, 15, 9, 1, '2013-09-23 12:57:54', '2013-09-23 12:57:54'),
(35, 16, 9, 1, '2013-09-23 12:57:54', '2013-09-23 12:57:54'),
(36, 17, 9, 1, '2013-09-23 12:58:13', '2013-09-23 12:58:13'),
(37, 10, 10, 2, '2013-09-23 12:59:28', '2013-09-23 12:59:28'),
(38, 11, 10, 2, '2013-09-23 12:59:28', '2013-09-23 12:59:28'),
(39, 12, 10, 1, '2013-09-23 12:59:44', '2013-09-23 12:59:44'),
(40, 1, 11, 1, '2013-09-23 13:06:36', '2013-09-23 13:06:36'),
(41, 2, 11, 1, '2013-09-23 13:06:36', '2013-09-23 13:06:36'),
(42, 3, 11, 1, '2013-09-23 13:07:17', '2013-09-23 13:07:17'),
(43, 4, 11, 1, '2013-09-23 13:07:17', '2013-09-23 13:07:17'),
(44, 13, 12, 2, '2013-09-23 13:30:29', '2013-09-23 13:30:29'),
(45, 14, 12, 2, '2013-09-23 13:30:29', '2013-09-23 13:30:29'),
(46, 15, 12, 2, '2013-09-23 13:31:13', '2013-09-23 13:31:13'),
(47, 16, 12, 2, '2013-09-23 13:31:13', '2013-09-23 13:31:13'),
(48, 17, 12, 2, '2013-09-23 13:31:33', '2013-09-23 13:31:33'),
(49, 13, 13, 2, '2013-09-23 13:51:01', '2013-09-23 13:51:01'),
(50, 14, 13, 2, '2013-09-23 13:51:01', '2013-09-23 13:51:01'),
(51, 15, 13, 1, '2013-09-23 13:51:47', '2013-09-23 13:51:47'),
(52, 16, 13, 1, '2013-09-23 13:51:47', '2013-09-23 13:51:47'),
(53, 17, 13, 1, '2013-09-23 13:52:07', '2013-09-23 13:52:07'),
(54, 18, 14, 1, '2013-09-23 13:53:40', '2013-09-23 13:53:40'),
(55, 19, 14, 2, '2013-09-23 13:53:40', '2013-09-23 13:53:40'),
(56, 1, 15, 1, '2013-09-23 13:55:03', '2013-09-23 13:55:03'),
(57, 2, 15, 1, '2013-09-23 13:55:03', '2013-09-23 13:55:03'),
(58, 3, 15, 2, '2013-09-23 13:56:32', '2013-09-23 13:56:32'),
(59, 4, 15, 2, '2013-09-23 13:56:32', '2013-09-23 13:56:32'),
(60, 1, 16, 1, '2013-09-23 13:59:46', '2013-09-23 13:59:46'),
(61, 2, 16, 1, '2013-09-23 13:59:46', '2013-09-23 13:59:46'),
(62, 3, 16, 1, '2013-09-23 14:00:31', '2013-09-23 14:00:31'),
(63, 4, 16, 1, '2013-09-23 14:00:31', '2013-09-23 14:00:31'),
(64, 10, 17, 3, '2013-09-23 14:02:37', '2013-09-23 14:02:37'),
(65, 11, 17, 3, '2013-09-23 14:02:37', '2013-09-23 14:02:37'),
(66, 12, 17, 2, '2013-09-23 14:02:55', '2013-09-23 14:02:55');

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
(1, 2, 5, '2013-09-20 12:44:50', '2013-09-20 12:44:50'),
(2, 2, 1, '2013-09-20 12:44:50', '2013-09-20 12:44:50'),
(3, 1, 2, '2013-09-20 13:11:27', '2013-09-20 13:11:27'),
(4, 3, 2, '2013-09-20 13:11:27', '2013-09-20 13:11:27'),
(5, 5, 3, '2013-09-20 13:13:24', '2013-09-20 13:13:24'),
(6, 5, 5, '2013-09-20 13:13:24', '2013-09-20 13:13:24'),
(7, 6, 2, '2013-09-23 12:28:33', '2013-09-23 12:28:33');

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
