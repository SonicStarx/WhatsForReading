-- phpMyAdmin SQL Dump
-- version 5.0.4
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Aug 13, 2021 at 09:49 PM
-- Server version: 10.4.17-MariaDB
-- PHP Version: 8.0.1

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `fyp`
--

-- --------------------------------------------------------

--
-- Table structure for table `books`
--

CREATE TABLE `books` (
  `bookid` bigint(20) UNSIGNED NOT NULL,
  `book_title` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `author` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `category` enum('Fiction','Non-Fiction','Phonics') COLLATE utf8mb4_unicode_ci NOT NULL,
  `phonics_level` enum('Stage 1','Stage 2','Stage 3','Stage 4','Stage 5','Stage 6') COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `book_band` enum('Lilac','Pink','Red','Yellow','Light Blue','Green','Orange','Turquoise','Purple','Gold','White','Lime','Lime +','Brown','Grey','Dark Blue','Dark Red') COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `available_quantity` smallint(6) NOT NULL,
  `on_loan` smallint(6) NOT NULL DEFAULT 0,
  `image` varchar(256) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `books`
--

INSERT INTO `books` (`bookid`, `book_title`, `author`, `category`, `phonics_level`, `book_band`, `available_quantity`, `on_loan`, `image`, `created_at`, `updated_at`) VALUES
(1, 'The Bucket Rocket and Other Stories', 'Catherine Baker', 'Phonics', 'Stage 2', NULL, 5, 3, 'noimage.jpg', '2021-07-27 13:38:23', '2021-08-02 21:38:31'),
(2, 'Biff, Chip and Kipper: Wet Feet and Other Stories', 'Roderick Hunt', 'Phonics', 'Stage 2', NULL, 5, 1, 'noimage.jpg', '2021-07-27 13:39:03', '2021-08-02 21:34:46'),
(3, 'Biff, Chip and Kipper: Super Dad and Other Stories', 'Roderick Hunt', 'Phonics', 'Stage 2', NULL, 5, 3, 'noimage.jpg', '2021-07-27 13:39:36', '2021-08-02 21:23:11'),
(4, 'Biff, Chip and Kipper: The Sing Song and Other Stories', 'Roderick Hunt', 'Phonics', 'Stage 2', NULL, 5, 0, 'noimage.jpg', '2021-07-27 13:40:39', '2021-08-02 15:11:18'),
(5, 'Biff, Chip and Kipper: The Duckling and Other Stories', 'Roderick Hunt', 'Phonics', 'Stage 2', NULL, 5, 0, 'noimage.jpg', '2021-07-27 13:41:21', '2021-08-02 20:58:03'),
(6, 'Phonics: The King and His Wish and Other Tales', 'Alex Lane', 'Phonics', 'Stage 2', NULL, 5, 0, 'noimage.jpg', '2021-07-27 13:41:46', '2021-07-27 13:41:46'),
(7, 'Phonics: Dick Whittington and Other Tales', 'Katie Adams', 'Phonics', 'Stage 2', NULL, 5, 0, 'noimage.jpg', '2021-07-27 13:42:13', '2021-08-02 20:31:13'),
(8, 'Julia Donaldson’s Songbirds: Singing Dad and Other Stories', 'Julia Donaldson', 'Phonics', 'Stage 2', NULL, 5, 0, 'noimage.jpg', '2021-07-27 13:47:06', '2021-07-27 13:47:06'),
(9, 'Julia Donaldson’s Songbirds: Ron Rabbit’s Egg and Other Stories', 'Julia Donaldson', 'Phonics', 'Stage 2', NULL, 2, 0, 'noimage.jpg', '2021-07-27 13:48:05', '2021-07-27 13:48:05'),
(10, 'Non-fiction: Our Wonderful World', 'Rob Alcraft', 'Phonics', 'Stage 2', NULL, 3, 0, 'noimage.jpg', '2021-07-27 13:49:18', '2021-07-27 13:49:18'),
(11, 'Non-fiction: Make and Bake!', 'Karra McFarlane', 'Phonics', 'Stage 2', NULL, 3, 1, 'noimage.jpg', '2021-07-27 13:52:13', '2021-08-03 08:15:58'),
(12, 'Sid Did It', 'Jeanne Willis', 'Phonics', 'Stage 2', 'Pink', 3, 0, 'noimage.jpg', '2021-07-27 14:02:16', '2021-07-27 14:02:16'),
(13, 'Sid\'s Pit', 'Emma Lynch', 'Phonics', 'Stage 2', 'Pink', 4, 0, 'noimage.jpg', '2021-07-27 14:10:20', '2021-08-02 20:45:27'),
(14, 'The Dinosaur King and Other Stories', 'Teresa Heapy', 'Phonics', 'Stage 3', NULL, 2, 0, 'noimage.jpg', '2021-07-27 14:25:13', '2021-07-27 14:25:13'),
(15, 'Comic Books: Pip, Lop, Mip, Bop', 'Jamie Smart', 'Phonics', 'Stage 3', NULL, 2, 0, 'noimage.jpg', '2021-07-27 14:26:19', '2021-07-27 14:26:19'),
(16, 'Biff, Chip and Kipper: Dolphin Rescue and Other Stories', 'Roderick Hunt', 'Phonics', 'Stage 3', NULL, 5, 0, 'noimage.jpg', '2021-07-27 14:26:56', '2021-07-27 14:26:56'),
(17, 'Biff, Chip and Kipper: Egg Fried Rice', 'Roderick Hunt', 'Phonics', 'Stage 3', NULL, 5, 0, 'noimage.jpg', '2021-07-27 14:27:22', '2021-07-27 14:27:22'),
(18, 'Biff, Chip and Kipper: Hungry Floppy', 'Roderick Hunt', 'Phonics', 'Stage 3', NULL, 3, 0, 'noimage.jpg', '2021-07-27 14:28:52', '2021-08-02 20:57:05'),
(19, 'Non-fiction: Fantastic Nature', 'Rob Alcraft', 'Phonics', 'Stage 3', NULL, 2, 1, 'noimage.jpg', '2021-07-27 14:31:18', '2021-08-03 12:27:09'),
(20, 'Non-fiction: Survival and Extinction', 'Charlotte Raby', 'Phonics', 'Stage 3', NULL, 3, 0, 'noimage.jpg', '2021-07-27 14:31:42', '2021-07-27 14:31:42'),
(21, 'Non-fiction: Animals and Us', 'Alison Hawes', 'Phonics', 'Stage 1', NULL, 3, 0, 'noimage.jpg', '2021-07-27 14:32:53', '2021-07-27 14:32:53'),
(22, 'Non-fiction: Weather and Seasons', 'Catherine Baker', 'Phonics', 'Stage 1', NULL, 3, 0, 'noimage.jpg', '2021-07-27 14:33:35', '2021-07-27 14:33:35'),
(23, 'Sam’s Backpack and Other Stories', 'Teresa Heapy', 'Phonics', 'Stage 1', NULL, 4, 0, 'noimage.jpg', '2021-07-27 14:36:15', '2021-07-27 14:36:15'),
(24, 'Biff, Chip and Kipper: Silly Races', 'Roderick Hunt', 'Phonics', 'Stage 1', NULL, 3, 0, 'noimage.jpg', '2021-07-27 14:37:05', '2021-07-27 14:37:05'),
(25, 'Big Feet', 'Roderick Hunt', 'Fiction', NULL, 'Pink', 2, 0, 'noimage.jpg', '2021-08-01 12:02:03', '2021-08-01 12:02:03'),
(26, 'Spots!', 'Roderick Hunt', 'Fiction', NULL, 'Red', 3, 0, 'noimage.jpg', '2021-08-01 12:03:09', '2021-08-01 12:03:09'),
(27, 'Ant and the Baby', 'Tony Bradman', 'Fiction', NULL, 'Red', 3, 0, 'noimage.jpg', '2021-08-01 12:07:19', '2021-08-01 12:07:19'),
(28, 'Map, Compass, Explore!', 'Catherine Baker', 'Non-Fiction', NULL, 'Green', 3, 0, 'noimage.jpg', '2021-08-01 12:11:20', '2021-08-01 12:11:20');

-- --------------------------------------------------------

--
-- Table structure for table `failed_jobs`
--

CREATE TABLE `failed_jobs` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `uuid` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `connection` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `queue` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `payload` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `exception` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `failed_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `learning_objectives`
--

CREATE TABLE `learning_objectives` (
  `LO_id` bigint(20) UNSIGNED NOT NULL,
  `LO_title` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `year_group` enum('Reception','Year 1','Year 2') COLLATE utf8mb4_unicode_ci NOT NULL,
  `LO_description` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `learning_objectives`
--

INSERT INTO `learning_objectives` (`LO_id`, `LO_title`, `year_group`, `LO_description`, `created_at`, `updated_at`) VALUES
(1, 'Linking letters with sounds', 'Reception', 'Getting the class to read and identify words by making use of sounds already known', '2021-06-28 13:07:08', '2021-06-28 13:07:08'),
(2, 'Basic comprehension of read texts', 'Reception', 'Pupils demonstrate understanding when talking with others about what they have read.', '2021-08-11 20:58:40', '2021-08-11 20:58:40');

-- --------------------------------------------------------

--
-- Table structure for table `learning_objective_performances`
--

CREATE TABLE `learning_objective_performances` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `LO_id` bigint(20) UNSIGNED NOT NULL,
  `pupilid` bigint(20) UNSIGNED NOT NULL,
  `performance` enum('Working above expectations','Working at expectations','Working towards expectations','Working below expectations') COLLATE utf8mb4_unicode_ci NOT NULL,
  `Notes` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `assessment_date` date NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `learning_objective_performances`
--

INSERT INTO `learning_objective_performances` (`id`, `LO_id`, `pupilid`, `performance`, `Notes`, `assessment_date`, `created_at`, `updated_at`) VALUES
(1, 1, 1, 'Working at expectations', 'Adam successfully links known sounds to letters and uses them to help identify new words. Adam could become more independent with his abilities', '2021-07-19', '2021-07-19 20:05:33', '2021-08-13 01:25:50'),
(2, 1, 1, 'Working towards expectations', 'Adam is continuing to work well on this objective', '2021-07-26', '2021-07-19 20:06:29', '2021-08-13 01:21:46');

-- --------------------------------------------------------

--
-- Table structure for table `migrations`
--

CREATE TABLE `migrations` (
  `id` int(10) UNSIGNED NOT NULL,
  `migration` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `batch` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `migrations`
--

INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES
(100, '2014_10_12_000000_create_users_table', 1),
(101, '2014_10_12_100000_create_password_resets_table', 1),
(102, '2019_08_19_000000_create_failed_jobs_table', 1),
(103, '2021_02_05_105651_create_teachers_table', 1),
(104, '2021_02_05_110712_create_parents_table', 1),
(105, '2021_03_06_144807_create_books_table', 1),
(106, '2021_03_26_121038_create_pupils_table', 1),
(107, '2021_03_26_144949_create_pupil_performances_table', 1),
(108, '2021_04_14_135605_create_tags_table', 1),
(109, '2021_04_14_190236_create_book_tag_table', 1),
(110, '2021_06_22_131702_create_learning_objectives_table', 1),
(111, '2021_06_28_163648_create_topics_table', 1),
(112, '2021_07_09_162141_create_pupil_parents_table', 1),
(113, '2021_07_18_205211_create_learning_objective_performances_table', 2),
(117, '2021_07_26_234621_create_reading_entries_table', 3);

-- --------------------------------------------------------

--
-- Table structure for table `password_resets`
--

CREATE TABLE `password_resets` (
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `pupils`
--

CREATE TABLE `pupils` (
  `pupilid` bigint(20) UNSIGNED NOT NULL,
  `first_name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `last_name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `teacherid` bigint(20) UNSIGNED NOT NULL,
  `year_group` enum('Reception','Year 1','Year 2') COLLATE utf8mb4_unicode_ci NOT NULL,
  `class` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `pupils`
--

INSERT INTO `pupils` (`pupilid`, `first_name`, `last_name`, `teacherid`, `year_group`, `class`, `created_at`, `updated_at`) VALUES
(1, 'Adam', 'Baker', 1, 'Reception', 'Pink', NULL, NULL),
(2, 'Fynley', 'Russo', 1, 'Reception', 'Pink', NULL, NULL),
(3, 'Evelyn', 'Guthrie', 1, 'Reception', 'Pink', NULL, NULL),
(4, 'Weronika', 'Booker', 1, 'Reception', 'Pink', NULL, NULL),
(5, 'Tina', 'Wise', 1, 'Reception', 'Pink', NULL, NULL),
(6, 'Aleyna', 'Hodge', 1, 'Reception', 'Pink', NULL, NULL),
(7, 'Tonicha', 'Drew', 1, 'Reception', 'Pink', NULL, NULL),
(8, 'Misha', 'Adam', 1, 'Reception', 'Pink', NULL, NULL),
(9, 'Eva-Rose', 'Summers', 1, 'Reception', 'Pink', NULL, NULL),
(10, 'Teri', 'Turnbull', 1, 'Reception', 'Pink', NULL, NULL),
(11, 'Archer', 'Hamer', 1, 'Reception', 'Pink', NULL, NULL),
(12, 'Ishmael', 'Rasmussen', 1, 'Reception', 'Pink', NULL, NULL),
(13, 'Jaidon', 'Bryan', 1, 'Reception', 'Pink', NULL, NULL),
(14, 'Kiah', 'Cortes', 1, 'Reception', 'Pink', NULL, NULL),
(15, 'Tobi', 'Smith', 1, 'Reception', 'Pink', NULL, NULL),
(16, 'George', 'Stout', 1, 'Reception', 'Pink', NULL, NULL),
(17, 'Gwen', 'Bentley', 1, 'Reception', 'Pink', NULL, NULL),
(18, 'Isabel', 'Flowers', 1, 'Reception', 'Pink', NULL, NULL),
(19, 'Sienna', 'Boone', 2, 'Year 1', 'Purple', NULL, NULL),
(20, 'Arlo', 'Akhtar', 2, 'Year 1', 'Purple', NULL, NULL),
(21, 'Yvette', 'Vaughan', 2, 'Year 1', 'Purple', NULL, NULL),
(22, 'Rohaan', 'Keith', 2, 'Year 1', 'Purple', NULL, NULL),
(23, 'Reegan', 'Reyes', 2, 'Year 1', 'Purple', NULL, NULL),
(24, 'Addison', 'Marin', 2, 'Year 1', 'Purple', NULL, NULL),
(25, 'Mandy', 'Bourne', 2, 'Year 1', 'Purple', NULL, NULL),
(26, 'Alannah', 'Davenport', 3, 'Year 2', 'Sky', NULL, NULL),
(27, 'Saniya', 'Cordova', 3, 'Year 2', 'Sky', NULL, NULL),
(28, 'Luca', 'Downs', 3, 'Year 2', 'Sky', NULL, NULL),
(29, 'Rhiannan', 'Christensen', 3, 'Year 2', 'Sky', NULL, NULL),
(30, 'Darien', 'Browning', 3, 'Year 2', 'Sky', NULL, NULL),
(31, 'Sohaib', 'Fry', 3, 'Year 2', 'Sky', NULL, NULL),
(32, 'Milton', 'Bright', 3, 'Year 2', 'Sky', NULL, NULL),
(33, 'Izaak', 'Cortes', 3, 'Year 2', 'Sky', NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `pupil_parents`
--

CREATE TABLE `pupil_parents` (
  `parentid` bigint(20) UNSIGNED NOT NULL,
  `pupilid` bigint(20) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `pupil_parents`
--

INSERT INTO `pupil_parents` (`parentid`, `pupilid`) VALUES
(7, 1),
(8, 2),
(9, 3),
(10, 4),
(11, 5),
(12, 6),
(13, 7),
(14, 8),
(15, 9),
(16, 10),
(17, 11),
(18, 12),
(19, 13),
(20, 14),
(20, 33),
(21, 15),
(22, 16),
(23, 17),
(24, 18),
(25, 19),
(26, 20),
(27, 21),
(28, 22),
(29, 23),
(30, 24),
(31, 25),
(32, 26),
(33, 27),
(34, 28),
(35, 29),
(36, 30),
(37, 31),
(38, 32);

-- --------------------------------------------------------

--
-- Table structure for table `pupil_performances`
--

CREATE TABLE `pupil_performances` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `pupilid` bigint(20) UNSIGNED NOT NULL,
  `reading_level` enum('Lilac','Pink','Red','Yellow','Light Blue','Green','Orange','Turquoise','Purple','Gold','White','Lime','Lime +','Brown','Grey','Dark Blue','Dark Red') COLLATE utf8mb4_unicode_ci NOT NULL,
  `phonics_level` enum('Stage 1','Stage 2','Stage 3','Stage 4','Stage 5','Stage 6') COLLATE utf8mb4_unicode_ci NOT NULL,
  `working_level` enum('Working above expectations','Working at expectations','Working towards expectations','Working below expectations') COLLATE utf8mb4_unicode_ci NOT NULL,
  `uploaded_date` date NOT NULL,
  `assessment_date` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `pupil_performances`
--

INSERT INTO `pupil_performances` (`id`, `pupilid`, `reading_level`, `phonics_level`, `working_level`, `uploaded_date`, `assessment_date`) VALUES
(2, 8, 'Lilac', 'Stage 1', 'Working below expectations', '2021-07-25', '2021-07-16'),
(7, 17, 'Pink', 'Stage 2', 'Working towards expectations', '2021-07-26', '2021-07-16'),
(8, 4, 'Red', 'Stage 2', 'Working at expectations', '2021-07-26', '2021-07-15'),
(9, 13, 'Red', 'Stage 2', 'Working at expectations', '2021-08-12', '2021-07-16'),
(10, 1, 'Red', 'Stage 2', 'Working at expectations', '2021-07-26', '2021-07-09'),
(11, 14, 'Lilac', 'Stage 2', 'Working below expectations', '2021-08-13', '2021-07-15'),
(12, 7, 'Yellow', 'Stage 2', 'Working at expectations', '2021-07-26', '2021-07-15'),
(13, 18, 'Yellow', 'Stage 3', 'Working above expectations', '2021-07-26', '2021-07-15'),
(14, 3, 'Red', 'Stage 2', 'Working at expectations', '2021-07-26', '2021-07-15'),
(15, 11, 'Yellow', 'Stage 2', 'Working at expectations', '2021-07-26', '2021-07-15'),
(16, 6, 'Red', 'Stage 2', 'Working towards expectations', '2021-07-26', '2021-07-15'),
(17, 12, 'Yellow', 'Stage 2', 'Working at expectations', '2021-07-26', '2021-07-15'),
(18, 2, 'Red', 'Stage 2', 'Working at expectations', '2021-07-26', '2021-07-15'),
(19, 15, 'Red', 'Stage 1', 'Working below expectations', '2021-07-26', '2021-07-15'),
(20, 16, 'Red', 'Stage 1', 'Working below expectations', '2021-07-26', '2021-07-15'),
(21, 9, 'Light Blue', 'Stage 3', 'Working above expectations', '2021-07-26', '2021-07-15'),
(22, 10, 'Red', 'Stage 2', 'Working towards expectations', '2021-07-26', '2021-07-15'),
(23, 5, 'Red', 'Stage 2', 'Working at expectations', '2021-07-26', '2021-07-15'),
(25, 25, 'Brown', 'Stage 6', 'Working above expectations', '0000-00-00', '0000-00-00');

-- --------------------------------------------------------

--
-- Table structure for table `reading_entries`
--

CREATE TABLE `reading_entries` (
  `entryid` bigint(20) UNSIGNED NOT NULL,
  `pupilid` bigint(20) UNSIGNED NOT NULL,
  `bookid` bigint(20) UNSIGNED NOT NULL,
  `read` tinyint(1) NOT NULL DEFAULT 0,
  `assigned_week` datetime NOT NULL,
  `date_created` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `reading_entries`
--

INSERT INTO `reading_entries` (`entryid`, `pupilid`, `bookid`, `read`, `assigned_week`, `date_created`) VALUES
(6, 8, 1, 0, '2021-07-05 00:00:00', '2021-08-02 22:38:31'),
(7, 14, 11, 0, '2021-07-12 00:00:00', '2021-08-03 09:15:58'),
(8, 14, 19, 0, '2021-07-05 00:00:00', '2021-08-03 13:27:09');

-- --------------------------------------------------------

--
-- Table structure for table `teachers`
--

CREATE TABLE `teachers` (
  `teacherid` bigint(20) UNSIGNED NOT NULL,
  `userid` bigint(20) UNSIGNED NOT NULL,
  `class_name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `year_group` enum('Reception','Year 1','Year 2') COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `teachers`
--

INSERT INTO `teachers` (`teacherid`, `userid`, `class_name`, `year_group`, `created_at`, `updated_at`) VALUES
(1, 4, 'Pink', 'Reception', NULL, NULL),
(2, 5, 'Purple', 'Year 1', NULL, NULL),
(3, 6, 'Sky', 'Year 2', NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `topics`
--

CREATE TABLE `topics` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `topic_title` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `topic_description` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `scheduled_teaching` date NOT NULL,
  `topicLO` bigint(20) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `topics`
--

INSERT INTO `topics` (`id`, `topic_title`, `topic_description`, `scheduled_teaching`, `topicLO`, `created_at`, `updated_at`) VALUES
(1, 'Reading foreign words I', 'This topic encourages pupils to use their knowledge of sounds for each letter to discover and pronounce new words.', '2021-08-23', 1, '2021-08-11 20:47:18', '2021-08-11 20:47:18'),
(2, 'Show and Tell', 'Pupils will present their favourite books to their peers. Pupils give an overview of what happens and what they like about the story.', '2021-09-13', 2, '2021-08-11 21:00:08', '2021-08-11 21:00:08');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `first_name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `last_name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `password` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `role` enum('Admin','Teacher','Parent','Librarian') COLLATE utf8mb4_unicode_ci NOT NULL,
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `first_name`, `last_name`, `email`, `email_verified_at`, `password`, `role`, `remember_token`, `created_at`, `updated_at`) VALUES
(2, 'Alainya', 'Wallace', 'alainyawallace@aol.com', NULL, '$2y$10$Y1khfwRE1a5Pox3gW7nCe.jSm26hKsltBLMjyILy2MYUapJkSirKS', 'Admin', NULL, '2021-03-30 21:19:56', '2021-03-30 21:19:56'),
(3, 'Carmen', 'Williams', 'carmen@email.com', NULL, '$2y$10$SgckSF/No1G0L5FbJODOn.j6NEO/Bxb5vW5Ba/qcCHqb4UajZhhAG', 'Librarian', NULL, '2021-04-06 13:15:17', '2021-04-06 13:15:17'),
(4, 'Tamu', 'County', 'tamu@email.com', NULL, '$2y$10$eHmChivC3inirztimzwI2.E0G58YB2IpfyJbBBKcaDAKLqSJ8fm52', 'Teacher', NULL, '2021-04-06 13:19:06', '2021-04-06 13:19:06'),
(5, 'Kamil', 'Hass', 'kamil.hass@gmail.com', NULL, '$2y$10$BIJT383RL6j2ws7Jv3jYZ.oPBACNmIyu.yO0lzpzx8a0/.B251HpS', 'Teacher', NULL, '2021-07-10 14:47:57', '2021-07-10 14:47:57'),
(6, 'Valerie', 'MacAngus', 'valerie.macangus@gmail.com', NULL, '$2y$10$zbrtLxCdpO4iBorY2KHJJ.OXBoiuchL7AhXEda.EwFyjgAS3OVYRW', 'Teacher', NULL, '2021-07-10 14:49:38', '2021-07-10 14:49:38'),
(7, 'Levi', 'Baker', 'levi.baker@email.com', NULL, '$2y$10$o.V6dPcy34UCJENOz2vXyevO6BNc99w.vQA6L0DGE4CXKY7RaBQfa', 'Parent', NULL, '2021-07-12 21:55:54', '2021-07-12 21:55:54'),
(8, 'Akoni', 'Russo', 'akoni.russo@email.com', NULL, '$2y$10$yrSqZkzDTw8J5V5xlnm4a.ES4VUlFfUShSPEjhBcy.4GWZ9KCktFy', 'Parent', NULL, '2021-07-12 21:56:32', '2021-07-12 21:56:32'),
(9, 'Neil', 'Guthrie', 'neil.guthrie@email.com', NULL, '$2y$10$P0wBA9Z5mK.W6guRjm31ceWTGlWZDwXdnMtYmgsaHZXTvsQZewG6m', 'Parent', NULL, '2021-07-12 21:57:08', '2021-07-12 21:57:08'),
(10, 'Lenox', 'Booker', 'lenox@email.com', NULL, '$2y$10$tjO4a4aZx2Dv22MfA.GFw.8Bpdi.ZZVPoIpfvMLM44VBUxHZhQ8tK', 'Parent', NULL, '2021-07-12 21:57:43', '2021-07-12 21:57:43'),
(11, 'Brynlee', 'Wise', 'brynleew@email.com', NULL, '$2y$10$Tqjz05I5YaAxodp34t3av.336cTQI9Rqrg9dw6QpV5I3FD1pt4jdC', 'Parent', NULL, '2021-07-12 21:58:21', '2021-07-12 21:58:21'),
(12, 'Dorine', 'Hodge', 'dorine@email.com', NULL, '$2y$10$VDDxN60YDJS42NMalrcYOufFrpNVjaLGb0aTDA3STBQUfS4MaBy2y', 'Parent', NULL, '2021-07-12 21:58:57', '2021-07-12 21:58:57'),
(13, 'Shaye', 'Drew', 'shaye@email.com', NULL, '$2y$10$Xx3x4iZ.XNeU1D1XQ33Ikeq7sfE4UurqYXBFtfA88brd87lFc3I7W', 'Parent', NULL, '2021-07-12 21:59:27', '2021-07-12 21:59:27'),
(14, 'Alisha', 'Adam', 'alishaa@email.com', NULL, '$2y$10$Ss3pDiZjUlIe1X5cqdwJsO.e1bK7ZQJjbwhwGTVNqZCLJoC3eJElW', 'Parent', NULL, '2021-07-12 22:00:01', '2021-07-12 22:00:01'),
(15, 'Libby', 'Summers', 'libby@email.com', NULL, '$2y$10$WSdXvdKeqNr6rZ/H.wWPkO0UMTMCJj6Ft8ZDBMBUp9WQRJrxjY94C', 'Parent', NULL, '2021-07-12 22:00:26', '2021-07-12 22:00:26'),
(16, 'Sunny', 'Turnbull', 'sunny@email.com', NULL, '$2y$10$wkyK0xuVPkX9opEzm9B/E.oAEl5Mglw9lQ6mldGSLQmPT9lG/vhEm', 'Parent', NULL, '2021-07-12 22:01:11', '2021-07-12 22:01:11'),
(17, 'Jeptha', 'Hamer', 'Jeptha@email.com', NULL, '$2y$10$DfvvkpWsrQ0y5IMyLmLmWOQBk02YOfqKKbbvuXks2CNJuTNY.61Bi', 'Parent', NULL, '2021-07-12 22:02:53', '2021-07-12 22:02:53'),
(18, 'Reba', 'Rasmussen', 'Reba.r@email.com', NULL, '$2y$10$x4nYmQT4dIh0PhADNjODBOTiuCEshLePat5nS7PswwLn0NpgtZyT.', 'Parent', NULL, '2021-07-12 22:03:17', '2021-07-12 22:03:17'),
(19, 'Marhsall', 'Bryan', 'marshbr@email.com', NULL, '$2y$10$nQkDRLixkkK5k0PAz3INz.X7cZ/cLTeYU2nceGXQZ0s8fZ9sJ4ORW', 'Parent', NULL, '2021-07-12 22:03:49', '2021-07-12 22:03:49'),
(20, 'Jaron', 'Cortes', 'jaron@email.com', NULL, '$2y$10$HYoNSN/ysbKQ3k4FPhjXz.gq22GVv4pOGIrdoNkfuD4xtp7SpOVTO', 'Parent', NULL, '2021-07-12 22:04:44', '2021-07-12 22:04:44'),
(21, 'Moray', 'Smith', 'moray@email.com', NULL, '$2y$10$CQmEixRTGBe0MeP3sF5L6Oo0NZXWkgGUQ/V7KkAhAPLbHe1.0tQUO', 'Parent', NULL, '2021-07-12 22:05:25', '2021-07-12 22:05:25'),
(22, 'Dionne', 'Stout', 'dionne@email.com', NULL, '$2y$10$/GRKzXQj8TWD7OkD5v6mSumn7hv22ZOjiwcH.J3UyQm4OHE3aVpz2', 'Parent', NULL, '2021-07-12 22:06:01', '2021-07-12 22:06:01'),
(23, 'Alicia', 'Bentley', 'alicia@email.com', NULL, '$2y$10$RP2KxslPymMQglXjd6Y9v.oI8o/bHntm6cwFgjDLIz2HUy0qrMA9q', 'Parent', NULL, '2021-07-12 22:06:26', '2021-07-12 22:06:26'),
(24, 'Ashlyn', 'Flowers', 'ashlyn@email.com', NULL, '$2y$10$XOdRJobhG2fqeStP2awlSuCJXD0r6.4kdjpQfjS8luhl2J8ptmeVm', 'Parent', NULL, '2021-07-12 22:06:53', '2021-07-12 22:06:53'),
(25, 'Orval', 'Boone', 'orval@email.com', NULL, '$2y$10$uLTtEY4Son8XBNIiOuyHee6BKV2Tj/SJc39ydcq60DA.O/XN51Vh.', 'Parent', NULL, '2021-07-12 22:07:30', '2021-07-12 22:07:30'),
(26, 'Posy', 'Akhtar', 'posy@email.com', NULL, '$2y$10$lT3Z4AULntpyfrtRlhVMH.9JoRhY6nPdl7V26ZsE6T43FD6W2ahN.', 'Parent', NULL, '2021-07-12 22:07:49', '2021-07-12 22:07:49'),
(27, 'Lance', 'Vaughan', 'lance@email.com', NULL, '$2y$10$8vLE/jdrx6BTA8neew/Lm.V0MffyyAtl3XDNrnCF8r3FC7dhug9Hq', 'Parent', NULL, '2021-07-12 22:10:26', '2021-07-12 22:10:26'),
(28, 'Raymund', 'Keith', 'raymund@email.com', NULL, '$2y$10$qms2wrGmRS5Hg6sWL6kC.eNoMMxjF4Nnh5FATareOSx8s29FHuDq2', 'Parent', NULL, '2021-07-12 22:10:52', '2021-07-12 22:10:52'),
(29, 'Judith', 'Reyes', 'judith@email.com', NULL, '$2y$10$na5gEYsivP4uQrW411hirONA8BQN79y59HlY8MX7z2sO53Kx/Jl1C', 'Parent', NULL, '2021-07-12 22:11:23', '2021-07-12 22:11:23'),
(30, 'Kylie', 'Marin', 'kylie@gmail.com', NULL, '$2y$10$GalOhmFxdLhtm5wanvZ.eOCCEdm6e.Z13pjkJLMLj72TkAp6Ay0lO', 'Parent', NULL, '2021-07-12 22:12:09', '2021-07-12 22:12:09'),
(31, 'Gwen', 'Bourne', 'gwen@email.com', NULL, '$2y$10$stxYmBgTirPxaKHgVAJ1Re8W9eTZnBI1gcgFc37xMayUKzLaMj6Ba', 'Parent', NULL, '2021-07-12 22:12:57', '2021-07-12 22:12:57'),
(32, 'Ulysses', 'Davenport', 'ulysses@email.com', NULL, '$2y$10$ALyB/F3o8XymNPnzM4BE/ekLfYSUEcDeWTvle5S/mNRhWWLMllf/C', 'Parent', NULL, '2021-07-12 22:13:31', '2021-07-12 22:13:31'),
(33, 'Iolo', 'Cordova', 'Iolo@email.com', NULL, '$2y$10$bJQzVa4m0aAqKDrtvxu9eubZryRcxQsgE/AdC76ANZKDkfnGO.8fq', 'Parent', NULL, '2021-07-12 22:13:57', '2021-07-12 22:13:57'),
(34, 'Winifred', 'Downs', 'winifred.d@email.com', NULL, '$2y$10$AyJ.Mjikr8DQH3BTSEbhsuCbmp3RIaKizzAbMznuU6htiTfM5Vq0K', 'Parent', NULL, '2021-07-12 22:14:34', '2021-07-12 22:14:34'),
(35, 'Kev', 'Christensen', 'kev@email.com', NULL, '$2y$10$qP6pKy93SGzXBJZ6vY8W0ednCDLPXUcCRqtnGQK8xkRBmLwaB6Dx.', 'Parent', NULL, '2021-07-12 22:15:06', '2021-07-12 22:15:06'),
(36, 'Heilyn', 'Browning', 'Heilyn@email.com', NULL, '$2y$10$Z5Uxs21C96TKN0P5TCfuO.0WuCGG3MoTG9h2m81cOAZOj5t.Xgv6W', 'Parent', NULL, '2021-07-12 22:15:35', '2021-07-12 22:15:35'),
(37, 'Osmond', 'Fry', 'fry@email.com', NULL, '$2y$10$SIlHv0IOsRwwmivf67zGOeXmPfjygIr5v6p6doMP7BmgOr6Ptsphe', 'Parent', NULL, '2021-07-12 22:16:05', '2021-07-12 22:16:05'),
(38, 'Kai', 'Bright', 'kai.bright@email.com', NULL, '$2y$10$dnnhQoArnKUJVVBRY4vVh.J22eizisbvjMAxcQFWw6BSWl39IoCKy', 'Parent', NULL, '2021-07-12 22:16:35', '2021-07-12 22:16:35');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `books`
--
ALTER TABLE `books`
  ADD PRIMARY KEY (`bookid`);

--
-- Indexes for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `failed_jobs_uuid_unique` (`uuid`);

--
-- Indexes for table `learning_objectives`
--
ALTER TABLE `learning_objectives`
  ADD PRIMARY KEY (`LO_id`);

--
-- Indexes for table `learning_objective_performances`
--
ALTER TABLE `learning_objective_performances`
  ADD PRIMARY KEY (`id`),
  ADD KEY `learning_objective_performances_lo_id_foreign` (`LO_id`),
  ADD KEY `learning_objective_performances_pupilid_foreign` (`pupilid`);

--
-- Indexes for table `migrations`
--
ALTER TABLE `migrations`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `password_resets`
--
ALTER TABLE `password_resets`
  ADD KEY `password_resets_email_index` (`email`);

--
-- Indexes for table `pupils`
--
ALTER TABLE `pupils`
  ADD PRIMARY KEY (`pupilid`),
  ADD KEY `pupils_teacherid_foreign` (`teacherid`);

--
-- Indexes for table `pupil_parents`
--
ALTER TABLE `pupil_parents`
  ADD KEY `pupil_parents_parentid_foreign` (`parentid`),
  ADD KEY `pupil_parents_pupilid_foreign` (`pupilid`);

--
-- Indexes for table `pupil_performances`
--
ALTER TABLE `pupil_performances`
  ADD PRIMARY KEY (`id`),
  ADD KEY `pupil_performances_pupilid_foreign` (`pupilid`);

--
-- Indexes for table `reading_entries`
--
ALTER TABLE `reading_entries`
  ADD PRIMARY KEY (`entryid`),
  ADD KEY `reading_entries_pupilid_foreign` (`pupilid`),
  ADD KEY `reading_entries_bookid_foreign` (`bookid`);

--
-- Indexes for table `teachers`
--
ALTER TABLE `teachers`
  ADD PRIMARY KEY (`teacherid`),
  ADD KEY `teachers_userid_foreign` (`userid`);

--
-- Indexes for table `topics`
--
ALTER TABLE `topics`
  ADD PRIMARY KEY (`id`),
  ADD KEY `topics_topiclo_foreign` (`topicLO`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `users_email_unique` (`email`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `books`
--
ALTER TABLE `books`
  MODIFY `bookid` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=30;

--
-- AUTO_INCREMENT for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `learning_objectives`
--
ALTER TABLE `learning_objectives`
  MODIFY `LO_id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `learning_objective_performances`
--
ALTER TABLE `learning_objective_performances`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=19;

--
-- AUTO_INCREMENT for table `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=118;

--
-- AUTO_INCREMENT for table `pupils`
--
ALTER TABLE `pupils`
  MODIFY `pupilid` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=34;

--
-- AUTO_INCREMENT for table `pupil_performances`
--
ALTER TABLE `pupil_performances`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=26;

--
-- AUTO_INCREMENT for table `reading_entries`
--
ALTER TABLE `reading_entries`
  MODIFY `entryid` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `teachers`
--
ALTER TABLE `teachers`
  MODIFY `teacherid` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `topics`
--
ALTER TABLE `topics`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=41;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `learning_objective_performances`
--
ALTER TABLE `learning_objective_performances`
  ADD CONSTRAINT `learning_objective_performances_lo_id_foreign` FOREIGN KEY (`LO_id`) REFERENCES `learning_objectives` (`LO_id`) ON DELETE CASCADE,
  ADD CONSTRAINT `learning_objective_performances_pupilid_foreign` FOREIGN KEY (`pupilid`) REFERENCES `pupils` (`pupilid`) ON DELETE CASCADE;

--
-- Constraints for table `pupils`
--
ALTER TABLE `pupils`
  ADD CONSTRAINT `pupils_teacherid_foreign` FOREIGN KEY (`teacherid`) REFERENCES `teachers` (`teacherid`);

--
-- Constraints for table `pupil_parents`
--
ALTER TABLE `pupil_parents`
  ADD CONSTRAINT `pupil_parents_parentid_foreign` FOREIGN KEY (`parentid`) REFERENCES `users` (`id`),
  ADD CONSTRAINT `pupil_parents_pupilid_foreign` FOREIGN KEY (`pupilid`) REFERENCES `pupils` (`pupilid`);

--
-- Constraints for table `pupil_performances`
--
ALTER TABLE `pupil_performances`
  ADD CONSTRAINT `pupil_performances_pupilid_foreign` FOREIGN KEY (`pupilid`) REFERENCES `pupils` (`pupilid`) ON DELETE CASCADE;

--
-- Constraints for table `reading_entries`
--
ALTER TABLE `reading_entries`
  ADD CONSTRAINT `reading_entries_bookid_foreign` FOREIGN KEY (`bookid`) REFERENCES `books` (`bookid`) ON DELETE CASCADE,
  ADD CONSTRAINT `reading_entries_pupilid_foreign` FOREIGN KEY (`pupilid`) REFERENCES `pupils` (`pupilid`) ON DELETE CASCADE;

--
-- Constraints for table `teachers`
--
ALTER TABLE `teachers`
  ADD CONSTRAINT `teachers_userid_foreign` FOREIGN KEY (`userid`) REFERENCES `users` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `topics`
--
ALTER TABLE `topics`
  ADD CONSTRAINT `topics_topiclo_foreign` FOREIGN KEY (`topicLO`) REFERENCES `learning_objectives` (`LO_id`) ON DELETE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
