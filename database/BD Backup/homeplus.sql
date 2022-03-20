-- phpMyAdmin SQL Dump
-- version 4.8.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Mar 20, 2022 at 06:51 PM
-- Server version: 10.1.31-MariaDB
-- PHP Version: 7.2.4

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `homeplus`
--

-- --------------------------------------------------------

--
-- Table structure for table `admins`
--

CREATE TABLE `admins` (
  `id` int(11) NOT NULL,
  `full_name` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `email` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `password` varchar(500) COLLATE utf8_unicode_ci NOT NULL,
  `remember_token` varchar(500) COLLATE utf8_unicode_ci NOT NULL,
  `status` tinyint(4) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` datetime DEFAULT '0000-00-00 00:00:00'
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `admins`
--

INSERT INTO `admins` (`id`, `full_name`, `email`, `password`, `remember_token`, `status`, `created_at`, `updated_at`) VALUES
(3, 'Admin', 'admin@gmail.com', '$2y$10$a8cWkFhyAzY68ZrTwu64W.rdPB0oK7H13pw5/R3fVLs1eraCcDX1a', 'Wapvby2JtwtVhundCx2DClymhkTgU68otmwuYQYG64OxQZX1fzcX3vJaQS7k', 1, '2016-08-22 05:59:58', '2019-07-10 10:38:07'),
(4, 'Sazzadur Rahman Sobuj', 'sobuj@gmail.com', '$2y$10$kbPWscjoAFrBKITrzSn7AOimBQSz6mCnjdSrDjjUG4do1ABKZMhPi', 'xRlzTA1Os5PU3jkz1i6UsjdU2iBcIvFYrPhTCUW4QgOtLPw3Ew227zOM9VsH', 1, '2019-07-03 04:11:38', '2019-07-03 10:25:07');

-- --------------------------------------------------------

--
-- Table structure for table `business_types`
--

CREATE TABLE `business_types` (
  `id` int(11) NOT NULL,
  `business_type_name_lang1` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `business_type_name_lang2` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `status` tinyint(4) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` datetime DEFAULT '0000-00-00 00:00:00',
  `created_by` int(11) DEFAULT NULL,
  `updated_by` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci ROW_FORMAT=COMPACT;

-- --------------------------------------------------------

--
-- Table structure for table `categories`
--

CREATE TABLE `categories` (
  `id` int(11) NOT NULL,
  `category_name_lang1` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `category_name_lang2` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `icon` varchar(50) COLLATE utf8_unicode_ci DEFAULT NULL,
  `featured_image` varchar(50) COLLATE utf8_unicode_ci DEFAULT NULL,
  `view_order` int(11) DEFAULT NULL,
  `is_selected` int(11) NOT NULL DEFAULT '1',
  `status` tinyint(4) NOT NULL DEFAULT '1',
  `created_at` timestamp NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` timestamp NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `created_by` int(11) NOT NULL,
  `updated_by` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `categories`
--

INSERT INTO `categories` (`id`, `category_name_lang1`, `category_name_lang2`, `icon`, `featured_image`, `view_order`, `is_selected`, `status`, `created_at`, `updated_at`, `created_by`, `updated_by`) VALUES
(19, 'Sub Station', 'Sub Station', '19-201906260600444E1C.png', '19-201906260600444DED.jpg', 1, 1, 2, '2019-06-26 10:00:44', '2019-07-31 02:59:51', 3, 1),
(20, 'Solar Item', 'Solar Item', '20-20190626060440E7F0.png', '20-20190626060440E7D0.jpg', 2, 1, 2, '2019-06-26 10:04:40', '2019-07-31 02:59:56', 3, 1),
(21, 'PFI Item', 'PFI Item', '21-20190626061247560C.png', '21-2019062606124655CD.jpg', 3, 1, 2, '2019-06-26 10:12:46', '2019-07-31 02:58:05', 3, 1),
(22, 'Home Appliance', 'Home Appliance', '22-20190626061414AD51.png', '22-20190626061414AD50.jpg', 4, 1, 2, '2019-06-26 10:14:14', '2019-07-31 02:59:47', 3, 1),
(23, 'Tools', 'যন্ত্রপাতি', '23-201906260616199201.png', '23-2019062606161891F1.jpg', 5, 1, 2, '2019-06-26 10:16:18', '2019-07-31 02:57:19', 3, 1),
(29, 'ty', 'hsjkk', '29-201907291032255AB2.jpg', '29-201907291032255A63.jpg', 567, 0, 0, '2019-07-29 04:32:25', '2019-07-31 02:57:05', 1, 1),
(30, 'Hello', 'yy', '30-20190729103452988E.jpg', '30-20190729103451988D.jpg', 765234, 0, 1, '2019-07-29 04:34:51', '2019-07-31 02:56:46', 1, 1),
(31, 'Hellomnbn', 'bnmbnmbn', '31-201907291054114047.jpg', '31-201907291054114046.jpg', 5, 1, 0, '2019-07-29 04:54:11', '2019-07-31 02:21:59', 1, 1),
(32, 'tysdsda', 'sadsadads', '32-2019072910560424C..jpg', '32-2019072910560423B..jpg', 122, 1, 1, '2019-07-29 04:56:04', '2019-07-29 04:56:04', 1, 1);

-- --------------------------------------------------------

--
-- Table structure for table `cities`
--

CREATE TABLE `cities` (
  `id` int(11) NOT NULL,
  `city_name_lang1` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `city_name_lang2` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `cost` int(11) NOT NULL,
  `status` tinyint(4) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` datetime DEFAULT '0000-00-00 00:00:00',
  `created_by` int(11) DEFAULT NULL,
  `updated_by` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `cities`
--

INSERT INTO `cities` (`id`, `city_name_lang1`, `city_name_lang2`, `cost`, `status`, `created_at`, `updated_at`, `created_by`, `updated_by`) VALUES
(1, 'Dhaka', 'ঢাকা', 50, 1, '2016-11-30 17:41:14', '0000-00-00 00:00:00', NULL, NULL),
(2, 'Lakhipur', 'লক্ষ্মীপুর', 90, 1, '2016-11-30 17:41:36', '0000-00-00 00:00:00', NULL, NULL),
(3, 'Chittagong', 'চট্টগ্রাম', 90, 1, '2017-01-07 00:15:33', '0000-00-00 00:00:00', NULL, NULL),
(4, 'Noakhali', 'নোয়াখালী', 90, 1, '2017-01-07 00:16:05', '0000-00-00 00:00:00', NULL, NULL),
(5, 'Comila', 'কুমিল্লা', 90, 1, '2017-01-07 00:17:00', '0000-00-00 00:00:00', NULL, NULL),
(6, 'B. Baria', 'ব্রাহ্মনবাড়ীয়া', 90, 1, '2017-01-07 00:17:46', '0000-00-00 00:00:00', NULL, NULL),
(7, 'Chandpur', 'চাঁদপুর', 90, 1, '2017-01-07 00:18:16', '0000-00-00 00:00:00', NULL, NULL),
(8, 'Feni', 'ফেনী', 90, 1, '2017-01-07 00:18:37', '0000-00-00 00:00:00', NULL, NULL),
(9, 'Bandharban', 'বান্দরবন', 90, 1, '2017-01-07 00:21:02', '0000-00-00 00:00:00', NULL, NULL),
(10, 'Khagrachari', 'খাগড়াছড়ি', 90, 1, '2017-01-07 00:21:17', '0000-00-00 00:00:00', NULL, NULL),
(11, 'Rangamati', 'রাঙ্গামাটি', 90, 1, '2017-01-07 00:21:42', '0000-00-00 00:00:00', NULL, NULL),
(12, 'Cox\'s Bazar', 'কক্সবাজার', 90, 1, '2017-01-07 00:22:14', '0000-00-00 00:00:00', NULL, NULL),
(13, 'Maulvi Bazar', 'মৌলভীবাজার', 90, 1, '2017-01-07 00:24:38', '0000-00-00 00:00:00', NULL, NULL),
(14, 'Habiganj', 'হবিগঞ্জ', 90, 1, '2017-01-07 00:25:17', '0000-00-00 00:00:00', NULL, NULL),
(15, 'Sunamganj', 'সুনামগঞ্জ', 90, 1, '2017-01-07 00:25:34', '0000-00-00 00:00:00', NULL, NULL),
(16, 'Sylhet', 'সিলেট', 90, 1, '2017-01-07 00:25:58', '0000-00-00 00:00:00', NULL, NULL),
(17, 'Faridpur', 'ফরিদপুর', 90, 1, '2017-01-07 00:27:16', '0000-00-00 00:00:00', NULL, NULL),
(18, 'Gazipur', 'গাজীপুর', 90, 1, '2017-01-07 00:27:35', '0000-00-00 00:00:00', NULL, NULL),
(19, 'Kishoregonj', 'কিশোরগঞ্জ', 90, 1, '2017-01-07 00:28:19', '0000-00-00 00:00:00', NULL, NULL),
(20, 'Gopalgonj', 'গোপালগঞ্জ', 90, 1, '2017-01-07 00:29:05', '0000-00-00 00:00:00', NULL, NULL),
(21, 'Madaripur', 'মাদারীপুর', 90, 1, '2017-01-07 00:29:24', '0000-00-00 00:00:00', NULL, NULL),
(22, 'Manikgonj', 'মানিকগঞ্জ', 90, 1, '2017-01-07 00:29:47', '0000-00-00 00:00:00', NULL, NULL),
(23, 'Munshigonj', 'মন্সীগঞ্জ', 90, 1, '2017-01-07 00:30:14', '0000-00-00 00:00:00', NULL, NULL),
(24, 'Narayangonj', 'নারায়ণগঞ্জ', 90, 1, '2017-01-07 00:30:41', '0000-00-00 00:00:00', NULL, NULL),
(25, 'Narshingdi', 'নরসিংদী', 90, 1, '2017-01-07 00:31:16', '0000-00-00 00:00:00', NULL, NULL),
(26, 'Shariatpur', 'শরিয়তপুর', 90, 1, '2017-01-07 00:31:40', '0000-00-00 00:00:00', NULL, NULL),
(27, 'Rajbari', 'রাজবাড়ী', 90, 1, '2017-01-07 00:32:02', '0000-00-00 00:00:00', NULL, NULL),
(28, 'Tangail', 'টাঙ্গাইল', 90, 1, '2017-01-07 00:32:26', '0000-00-00 00:00:00', NULL, NULL),
(29, 'Barguna', 'বরগুনা', 90, 1, '2017-01-07 00:34:25', '0000-00-00 00:00:00', NULL, NULL),
(30, 'Barisal', 'বরিশাল', 90, 1, '2017-01-07 00:34:42', '0000-00-00 00:00:00', NULL, NULL),
(31, 'Bhola', 'ভোলা', 90, 1, '2017-01-07 00:35:13', '0000-00-00 00:00:00', NULL, NULL),
(32, 'Jhalokathi', 'ঝালকাঠি', 90, 1, '2017-01-07 00:36:14', '0000-00-00 00:00:00', NULL, NULL),
(33, 'Patuakhali', 'পটুয়াখালী', 90, 1, '2017-01-07 00:36:41', '0000-00-00 00:00:00', NULL, NULL),
(34, 'Pirojpur', 'পিরোজপুর', 90, 1, '2017-01-07 00:37:01', '0000-00-00 00:00:00', NULL, NULL),
(35, 'Bagerhat', 'বাগেরহাট', 90, 1, '2017-01-07 00:40:34', '0000-00-00 00:00:00', NULL, NULL),
(36, 'Chuadanga', 'চুয়াডাঙ্গা', 90, 1, '2017-01-07 00:40:56', '0000-00-00 00:00:00', NULL, NULL),
(37, 'Jessore', 'যশোর', 90, 1, '2017-01-07 00:41:13', '0000-00-00 00:00:00', NULL, NULL),
(38, 'Jhenaidah', 'ঝিনাইদহ', 90, 1, '2017-01-07 00:41:42', '0000-00-00 00:00:00', NULL, NULL),
(39, 'Khulna', 'খুলনা', 90, 1, '2017-01-07 00:42:02', '0000-00-00 00:00:00', NULL, NULL),
(40, 'Kushtia', 'কুষ্টিয়া', 90, 1, '2017-01-07 00:42:20', '0000-00-00 00:00:00', NULL, NULL),
(41, 'Magura', 'মাগুরা', 90, 1, '2017-01-07 00:42:37', '0000-00-00 00:00:00', NULL, NULL),
(42, 'Meherpur', 'মেহেরপুর', 90, 1, '2017-01-07 00:42:50', '0000-00-00 00:00:00', NULL, NULL),
(43, 'Narail', 'নড়াইল', 90, 1, '2017-01-07 00:43:14', '0000-00-00 00:00:00', NULL, NULL),
(44, 'Satkhira', 'সাতক্ষীরা', 90, 1, '2017-01-07 00:43:48', '0000-00-00 00:00:00', NULL, NULL),
(45, 'Bogra', 'বগুড়া', 90, 1, '2017-01-07 00:47:17', '0000-00-00 00:00:00', NULL, NULL),
(46, '	Chapainawabganj', 'চাঁপাইনবাবগঞ্জ', 90, 1, '2017-01-07 00:47:40', '0000-00-00 00:00:00', NULL, NULL),
(47, 'Joypurhat', 'জয়পুরহাট', 90, 1, '2017-01-07 00:47:58', '0000-00-00 00:00:00', NULL, NULL),
(48, 'Naogaon', 'নওগাঁ', 90, 1, '2017-01-07 00:48:15', '0000-00-00 00:00:00', NULL, NULL),
(49, 'Natore', 'নাটোর', 90, 1, '2017-01-07 00:48:30', '0000-00-00 00:00:00', NULL, NULL),
(50, 'Pabna', 'পাবনা', 90, 1, '2017-01-07 00:48:42', '0000-00-00 00:00:00', NULL, NULL),
(51, 'Rajshahi', 'রাজশাহী', 90, 1, '2017-01-07 00:48:56', '0000-00-00 00:00:00', NULL, NULL),
(52, 'Sirajganj', 'সিরাজগঞ্জ', 90, 1, '2017-01-07 00:49:12', '0000-00-00 00:00:00', NULL, NULL),
(53, 'Rangpur', 'রংপুর', 90, 1, '2017-01-07 00:52:12', '0000-00-00 00:00:00', NULL, NULL),
(54, 'Kurigram', 'কুড়িগ্রাম', 90, 1, '2017-01-07 00:52:48', '0000-00-00 00:00:00', NULL, NULL),
(55, 'Gaibandha', 'গাইবান্ধা', 90, 1, '2017-01-07 00:53:10', '0000-00-00 00:00:00', NULL, NULL),
(56, 'Thakurgaon', 'ঠাকুরগাঁও', 90, 1, '2017-01-07 00:53:28', '0000-00-00 00:00:00', NULL, NULL),
(57, 'Dinajpur', 'দিনাজপুর', 90, 1, '2017-01-07 00:53:44', '0000-00-00 00:00:00', NULL, NULL),
(58, 'Nilfamari', 'নীলফামারী', 90, 1, '2017-01-07 00:53:59', '0000-00-00 00:00:00', NULL, NULL),
(59, 'Panchagar', 'পঞ্চগড়', 90, 1, '2017-01-07 00:54:22', '0000-00-00 00:00:00', NULL, NULL),
(60, 'Lalmonirhat', 'লালমনিরহাট', 90, 1, '2017-01-07 00:54:40', '0000-00-00 00:00:00', NULL, NULL),
(61, 'Jamalpur', 'জামালপুর', 90, 1, '2017-01-07 00:54:57', '0000-00-00 00:00:00', NULL, NULL),
(62, 'Netrokona', 'নেত্রকোনা', 90, 1, '2017-01-07 00:55:14', '0000-00-00 00:00:00', NULL, NULL),
(63, 'Mymensingh', 'ময়মনসিংহ', 90, 1, '2017-01-07 00:55:33', '0000-00-00 00:00:00', NULL, NULL),
(64, 'Sherpur', 'শেরপুর', 90, 1, '2017-01-07 00:55:47', '0000-00-00 00:00:00', NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `colors`
--

CREATE TABLE `colors` (
  `id` int(11) NOT NULL,
  `color_name_lang1` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `color_name_lang2` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `color_code` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `status` tinyint(4) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` datetime NOT NULL DEFAULT '0000-00-00 00:00:00',
  `created_by` int(10) NOT NULL,
  `updated_by` int(10) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `colors`
--

INSERT INTO `colors` (`id`, `color_name_lang1`, `color_name_lang2`, `color_code`, `status`, `created_at`, `updated_at`, `created_by`, `updated_by`) VALUES
(8, 'Green', 'সবুজ ', '#008000', 1, '2016-11-24 02:15:56', '2018-05-16 01:15:01', 0, 3),
(9, 'Red', 'লাল', '#ff0000', 1, '2016-11-30 00:07:20', '0000-00-00 00:00:00', 0, NULL),
(10, 'Yellow', 'হলুদ', '#ffff00', 1, '2016-11-30 00:07:21', '2016-11-29 01:07:58', 0, 3),
(11, 'Blue', 'নীল', '#0000ff', 1, '2017-01-25 23:40:31', '0000-00-00 00:00:00', 0, NULL),
(12, 'Violet', 'বেগুনী', '#8000ff', 1, '2017-01-25 23:41:00', '0000-00-00 00:00:00', 0, NULL),
(13, 'Orange', 'কমলা', '#ff8000', 1, '2017-01-25 23:41:34', '0000-00-00 00:00:00', 0, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `company_profile`
--

CREATE TABLE `company_profile` (
  `id` int(11) NOT NULL,
  `name` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `email` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `mobile_no` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `logo` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `slogan` varchar(50) COLLATE utf8_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `locations`
--

CREATE TABLE `locations` (
  `id` int(11) NOT NULL,
  `location_name_lang1` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `location_name_lang2` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `status` tinyint(4) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` datetime DEFAULT '0000-00-00 00:00:00',
  `created_by` int(11) DEFAULT NULL,
  `updated_by` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci ROW_FORMAT=COMPACT;

-- --------------------------------------------------------

--
-- Table structure for table `merchants`
--

CREATE TABLE `merchants` (
  `id` int(11) NOT NULL,
  `full_name` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `email` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `password` varchar(200) COLLATE utf8_unicode_ci NOT NULL,
  `hidden_password` varchar(255) COLLATE utf8_unicode_ci NOT NULL DEFAULT '#####***%%',
  `mobile_no` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `company_name` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `logo` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `web_address` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `bank_ac_holder_name` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `bank_ac_number` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `branch_name` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `bank_name` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `routing_number` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `business_type` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `address` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `district` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `location` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `status` tinyint(4) NOT NULL COMMENT '2=deny, 0=pending, 1=approved',
  `remember_token` varchar(200) COLLATE utf8_unicode_ci NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` datetime NOT NULL DEFAULT '0000-00-00 00:00:00',
  `last_login_lang` tinyint(1) NOT NULL DEFAULT '1' COMMENT '1=en , 2=bn'
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `merchants`
--

INSERT INTO `merchants` (`id`, `full_name`, `email`, `password`, `hidden_password`, `mobile_no`, `company_name`, `logo`, `web_address`, `bank_ac_holder_name`, `bank_ac_number`, `branch_name`, `bank_name`, `routing_number`, `business_type`, `address`, `district`, `location`, `status`, `remember_token`, `created_at`, `updated_at`, `last_login_lang`) VALUES
(7, 'A H Rashed', 'ahrashed88@gmail.com', '$2y$10$VRTYXWBIkx60QBS70Uc0iOSw9w2rVqQG9dcK/AmlDKSXxSiF87bLi', '#####***%%', '01921724913', 'Best Fashion', '7-20170105054046c5I5.jpg', '', '', '', '', '', '', '', 'Mirpur-10, Dhaka.', '', '', 1, 'epBsGjR0VDUawojp3vBBWKlpHQqHBosKA6eK6lKhqIIN9stpphmGNXjZmDiM', '2017-01-04 03:25:53', '2017-03-02 10:43:09', 1),
(8, 'Uniko', 'srsumon100@gmail.com', '$2y$10$N0HQPLl3zM4shS/zbQhwvef6GfwxxWvKuZQrN.caTbTjttbl.JfAe', '#####***%%', '01618206020', 'SRS electronics', '8-20170105110644OpU2.png', 'eshoppingbd.com', '', '', '', '', '', 'ইলেকট্রনিক্স', 'Mirpur-10, Dhaka.', '', '', 1, 'N6BfMY86URYDPxpmZhSD1QafEj5pS7KZ2Rkz3JqzLqWDuvFAzgyzz6Ozrr0g', '2017-01-05 21:55:31', '2017-03-15 06:23:18', 1),
(9, 'riyadh', 'riyadh@gmail.com', '$2y$10$X5pXQXfVDlHF/2jzLE6r9.UH7ZfedpMeKFSwh.Ns36vP7WYU9gyBe', '#####***%%', '01672002510', 'RIyadh', '9-20170209061946.jpg', '', '', '', '', '', '', '', 'Dhaka, Mohammadpur\r\n', '', '', 0, 'yS1KGqYU0mVdBBdkzB4QB7miLpPeWSRymbYj1WxM9O1Sy2XkCFEJvte5gDlJ', '2017-01-17 19:53:43', '2017-02-09 06:19:46', 1),
(10, 'Md Tareq Hossain', 'cait1234bd@gmail.com', '$2y$10$sa506rm.XZh7J1IHhamL.Oajon1OfY50.ysKmm12j90wG3x0LtnkC', '#####***%%', '01781435525', 'CAIT', '10-20170221054820.jpg', 'caitbd.com', '', '', '', '', '', 'ইলেকট্রনিক্স', 'Motijheel,Dhaka-1000', '', '', 1, '', '2017-02-21 16:13:59', '2017-02-21 05:48:20', 1),
(11, 'MD. KAMRUL HASSAN', 'hassanjn36@gmail.com', '$2y$10$FyHQFj1JcmxlRctoVHq68euREBIbAcqmhFK5LNyVVYfOrT/lOkF6K', '#####***%%', '01995499097', 'HASSANNI', '11-20170227112733.png', '', '', '', '', '', '', '', 'Mogbazar, Dhaka.', '', '', 1, '4xYfGJb31kOFQHmggDXwNFdyRGruw3v2I5y7VpE4mPbpA0g4ZGyd4ehqWbLE', '2017-02-27 22:00:51', '2017-03-29 04:45:01', 1),
(12, 'MD. MASUDUR RAHMAN', 'masudmsc7@gmail.com', '$2y$10$u0Tf02nyI/efdcBvooGOeOiUNYkPgbYzepDzYwFFXnDzg71THVfCe', '#####***%%', '01881646556', 'Fashion4u.bd', '', '', '', '', '', '', '', '', 'Samorly square shopping mall, level- 4, shop no- 4', '', '', 1, 'YmKkPyRpBO9lBwOsNb9XsC79GkUjd1b5AUTGYvFXtwlhnou7F9jv48H7gUru', '2017-03-02 19:08:34', '2017-03-02 08:11:15', 1),
(13, 'Shamim Reza', 'shamim082008@gmail.com', '$2y$10$e8Ts4A2y6eelBc7rT43ExOmMm5UiD6luedNmXf4fvLJ0F1Zwug8eu', '#####***%%', '01782299826', 'Grameen nakshi', '', '', '', '', '', '', '', '', 'Mirpur-2, Dhaka.', '', '', 1, '', '2017-03-20 17:45:35', '0000-00-00 00:00:00', 1),
(14, 'Watch4u.bd', 'masud_mcom@yahoo.com', '$2y$10$IXfNBJMDJ1dhmMJ2kJmUX.FH6RrTVMv5J4ZzOY5Xq/QDgeYYi7hJ6', '#####***%%', '01743024525', 'Watch4u.bd', '', '', '', '', '', '', '', '', '84 Gojmohol Road, Zigatola, Haharibagh, Dhaka-1209', '', '', 1, '', '2017-03-22 20:35:49', '0000-00-00 00:00:00', 1),
(15, 'Hridoy', 'mdhridoy159222@gmail.com', '$2y$10$tVKCxNsBWMkIQWwyCoUHteUfygl3yiYD0Wyra0BLZFgIiBeOBjyjy', '#####***%%', '1635-163475', 'ewu', '', '', '', '', '', '', '', '', 'Rampora,banasree', '', '', 0, '', '2017-03-28 16:29:55', '0000-00-00 00:00:00', 1);

-- --------------------------------------------------------

--
-- Table structure for table `merchant_shipment_info`
--

CREATE TABLE `merchant_shipment_info` (
  `id` int(11) NOT NULL,
  `fk_merchant_id` int(11) NOT NULL,
  `fk_city_id` int(11) NOT NULL,
  `cost` double NOT NULL,
  `speed` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `status` tinyint(4) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` datetime DEFAULT '0000-00-00 00:00:00',
  `created_by` int(11) NOT NULL,
  `updated_by` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `orders`
--

CREATE TABLE `orders` (
  `id` int(11) NOT NULL,
  `fk_order_master_id` int(11) UNSIGNED DEFAULT NULL,
  `fk_user_id` int(11) DEFAULT NULL,
  `fk_city_id` int(11) NOT NULL,
  `fk_merchant_id` int(11) DEFAULT NULL,
  `fk_order_condition_id` int(11) UNSIGNED DEFAULT NULL,
  `address` text COLLATE utf8_unicode_ci NOT NULL,
  `shipping_mobile_no` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `invoice_no` int(11) NOT NULL,
  `total_amount` int(11) NOT NULL,
  `payable` int(11) NOT NULL,
  `discount` int(11) NOT NULL,
  `shipping_cost` int(11) NOT NULL,
  `vat` int(11) NOT NULL,
  `paid` int(11) NOT NULL,
  `order_date` date NOT NULL,
  `approved_date` datetime DEFAULT NULL,
  `cancel_date` datetime DEFAULT NULL,
  `payment_way` int(11) NOT NULL,
  `status` tinyint(4) DEFAULT NULL COMMENT '0 = deny, 1 = panding, 2 = approved, 3 = complete sale,4=cancel by merchant',
  `created_at` datetime DEFAULT NULL,
  `updated_at` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `order_condition`
--

CREATE TABLE `order_condition` (
  `id` int(10) UNSIGNED NOT NULL,
  `title_lang1` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `title_lang2` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `status` tinyint(1) DEFAULT '1',
  `created_at` datetime DEFAULT NULL,
  `updated_at` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci COMMENT='Order all condition given here , here order cancel.';

--
-- Dumping data for table `order_condition`
--

INSERT INTO `order_condition` (`id`, `title_lang1`, `title_lang2`, `status`, `created_at`, `updated_at`) VALUES
(1, 'Stock Out', 'Stock Out', 1, NULL, NULL),
(2, 'Product Damage', 'Product Damage', 1, NULL, NULL),
(3, 'Size Not Available', 'Size Not Available', 1, NULL, NULL),
(4, 'Color Not Available', 'Color Not Available', 1, NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `order_details`
--

CREATE TABLE `order_details` (
  `id` int(11) NOT NULL,
  `fk_merchant_id` int(11) DEFAULT '0',
  `fk_order_id` int(11) NOT NULL,
  `fk_product_id` int(11) NOT NULL,
  `fk_product_wise_size_id` int(11) DEFAULT NULL,
  `fk_product_wise_color_id` int(11) DEFAULT NULL,
  `quantity` int(11) NOT NULL,
  `sale_price` int(11) NOT NULL,
  `purchase_price` int(11) NOT NULL,
  `discount` int(11) NOT NULL,
  `vat` int(11) NOT NULL,
  `status` tinyint(1) NOT NULL,
  `create_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` datetime DEFAULT '0000-00-00 00:00:00'
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `order_master`
--

CREATE TABLE `order_master` (
  `id` int(10) UNSIGNED NOT NULL,
  `master_invoice_no` int(10) UNSIGNED NOT NULL DEFAULT '0',
  `fk_user_id` int(10) UNSIGNED DEFAULT NULL,
  `created_at` datetime DEFAULT NULL,
  `updated_at` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `photo_sliders`
--

CREATE TABLE `photo_sliders` (
  `id` int(10) UNSIGNED NOT NULL,
  `fk_category_id` int(11) NOT NULL,
  `image_path` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `image_caption` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `fk_sub_category_id` int(11) DEFAULT NULL,
  `status` tinyint(1) DEFAULT '1',
  `created_at` timestamp NULL DEFAULT CURRENT_TIMESTAMP,
  `created_by` int(5) DEFAULT NULL,
  `updated_at` datetime DEFAULT NULL,
  `updated_by` int(5) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `photo_sliders`
--

INSERT INTO `photo_sliders` (`id`, `fk_category_id`, `image_path`, `image_caption`, `fk_sub_category_id`, `status`, `created_at`, `created_by`, `updated_at`, `updated_by`) VALUES
(11, 19, '11-20190626060106A44C.jpg', 'Transformer', 0, 1, '2019-06-26 04:01:06', 3, NULL, NULL),
(12, 20, '12-201906260605187DE7.jpg', 'Solar Item', 0, 1, '2019-06-26 04:05:18', 3, NULL, NULL),
(13, 23, '13-20190626064925DF55.jpg', 'Electrical Tools', 0, 1, '2019-06-26 04:49:25', 3, NULL, NULL),
(14, 22, '14-2019062606494326CF.jpg', 'Home Appliance', 0, 1, '2019-06-26 04:49:43', 3, NULL, NULL),
(15, 21, '15-20190626065032E52F.jpg', 'PFI Item', 0, 1, '2019-06-26 04:50:32', 3, NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `products`
--

CREATE TABLE `products` (
  `id` int(11) NOT NULL,
  `fk_merchant_id` int(11) DEFAULT '8',
  `fk_category_id` int(11) DEFAULT NULL,
  `fk_sub_category_id` int(11) DEFAULT NULL,
  `fk_sub_sub_category_id` int(11) DEFAULT NULL,
  `product_name_lang1` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `product_name_lang2` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `slug` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `product_code` int(11) NOT NULL,
  `details_lang1` text COLLATE utf8_unicode_ci NOT NULL,
  `details_lang2` text COLLATE utf8_unicode_ci NOT NULL,
  `refund_policy` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `quantity` int(11) NOT NULL,
  `market_price` int(11) NOT NULL,
  `discount` int(11) NOT NULL,
  `sale_price` int(11) NOT NULL,
  `commission` int(11) NOT NULL COMMENT 'unit is percentage',
  `placement_type` int(11) NOT NULL,
  `status` tinyint(4) NOT NULL COMMENT '0=panding, 1=approve, 2=deny',
  `comments` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` datetime DEFAULT '0000-00-00 00:00:00'
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `products`
--

INSERT INTO `products` (`id`, `fk_merchant_id`, `fk_category_id`, `fk_sub_category_id`, `fk_sub_sub_category_id`, `product_name_lang1`, `product_name_lang2`, `slug`, `product_code`, `details_lang1`, `details_lang2`, `refund_policy`, `quantity`, `market_price`, `discount`, `sale_price`, `commission`, `placement_type`, `status`, `comments`, `created_at`, `updated_at`) VALUES
(480, 8, 19, 59, 0, '100 KVA – 3 Phase Transformers', '100 KVA – 3 Phase Transformers', '100-kva-3-phase-transformers', 0, '100 KVA – 3 Phase Transformers', '100 KVA – 3 Phase Transformers', '', 10, 300000, 0, 300000, 0, 3, 1, '', '2019-06-26 04:55:18', '0000-00-00 00:00:00'),
(481, 8, 19, 59, 0, '150 KVA – 3 Phase Transformers', '150 KVA – 3 Phase Transformers', '150-kva-3-phase-transformers', 0, '150 KVA – 3 Phase Transformers', '150 KVA – 3 Phase Transformers', '', 10, 450000, 0, 450000, 0, 2, 1, '', '2019-06-26 04:58:42', '0000-00-00 00:00:00'),
(482, 8, 19, 59, 0, '200 KVA – 3 Phase Transformers', '200 KVA – 3 Phase Transformers', '200-kva-3-phase-transformers', 0, '200 KVA – 3 Phase Transformers', '200 KVA – 3 Phase Transformers', '', 10, 600000, 0, 600000, 0, 3, 1, '', '2019-06-26 05:01:09', '0000-00-00 00:00:00'),
(483, 8, 19, 61, 0, 'YIKA DOFC', 'YIKA DOFC', 'yika-dofc', 0, 'YIKA DOFC', 'YIKA DOFC', '', 100, 3000, 0, 3000, 0, 3, 1, '', '2019-06-26 05:04:41', '0000-00-00 00:00:00'),
(484, 8, 19, 62, 0, '11KV HT Wire', '11KV HT Wire', '11kv-ht-wire', 0, '11KV HT Wire', '11KV HT Wire', '', 100, 2500, 0, 2500, 0, 3, 1, '', '2019-06-26 07:20:40', '0000-00-00 00:00:00'),
(485, 8, 19, 62, 0, '440V/250V LT Wire', '440V/250V LT Wire', '440v250v-lt-wire', 0, '440V/250V LT Wire', '440V/250V LT Wire', '', 100, 500, 0, 500, 0, 3, 1, '', '2019-06-26 07:23:37', '0000-00-00 00:00:00'),
(486, 8, 19, 64, 0, '11 KV Switch Gear', '11 KV Switch Gear', '11-kv-switch-gear', 0, '11 KV Switch Gear', '11 KV Switch Gear', '', 10, 100000, 0, 100000, 0, 3, 1, '', '2019-06-26 07:25:44', '0000-00-00 00:00:00'),
(487, 8, 19, 63, 0, '200/5 Amp', '200/5 Amp', '2005-amp', 0, '200/5 Amp', '200/5 Amp', '', 100, 900, 0, 900, 0, 3, 1, '', '2019-06-26 07:27:55', '0000-00-00 00:00:00'),
(488, 8, 19, 65, 0, '32 AMP Circuit Breaker', '32 AMP Circuit Breaker', '32-amp-circuit-breaker', 0, '32 AMP Circuit Breaker', '32 AMP Circuit Breaker', '', 100, 1000, 0, 1000, 0, 3, 1, '', '2019-06-26 07:29:27', '0000-00-00 00:00:00'),
(489, 8, 19, 66, 0, '11KV Lightning Arrester', '11KV Lightning Arrester', '11kv-lightning-arrester', 0, '11KV Lightning Arrester', '11KV Lightning Arrester', '', 50, 2500, 0, 2500, 0, 3, 1, '', '2019-06-26 07:31:04', '0000-00-00 00:00:00'),
(490, 8, 20, 67, 0, '150 W Solar Panel', '150 W Solar Panel', '150-w-solar-panel', 0, '150 W Solar Panel', '150 W Solar Panel', '', 15, 7200, 0, 7200, 0, 3, 1, '', '2019-06-26 07:34:16', '0000-00-00 00:00:00'),
(491, 8, 20, 68, 0, '10/20 A Charge Controller', '10/20 A Charge Controller', '1020-a-charge-controller', 0, '10/20 A Charge Controller', '10/20 A Charge Controller', '', 100, 300, 0, 300, 0, 3, 1, '', '2019-06-26 07:36:38', '0000-00-00 00:00:00'),
(492, 8, 20, 69, 0, '10 A Solar Switch', '10 A Solar Switch', '10-a-solar-switch', 0, '10 A Solar Switch', '10 A Solar Switch', '', 1000, 35, 0, 35, 0, 3, 1, '', '2019-06-26 07:37:41', '0000-00-00 00:00:00'),
(493, 8, 20, 70, 0, '10 W Solar Tube Light', '10 W Solar Tube Light', '10-w-solar-tube-light', 0, '10 W Solar Tube Light', '10 W Solar Tube Light', '', 1000, 50, 0, 50, 0, 3, 1, '', '2019-06-26 07:43:25', '0000-00-00 00:00:00'),
(494, 8, 20, 67, 0, '250 W Solar Panel', '250 W Solar Panel', '250-w-solar-panel', 0, '250 W Solar Panel', '250 W Solar Panel', '', 100, 9000, 0, 9000, 0, 2, 1, '', '2019-06-26 07:44:41', '0000-00-00 00:00:00'),
(495, 8, 21, 71, 0, '25 uF PFI Capacitor', '25 uF PFI Capacitor', '25-uf-pfi-capacitor', 0, '25 uF PFI Capacitor', '25 uF PFI Capacitor', '', 100, 3000, 0, 3000, 0, 3, 1, '', '2019-06-26 07:55:41', '0000-00-00 00:00:00'),
(496, 8, 21, 71, 0, '20 uF PFI Capacitor', '20 uF PFI Capacitor', '20-uf-pfi-capacitor', 0, '20 uF PFI Capacitor', '20 uF PFI Capacitor', '', 100, 2500, 0, 2500, 0, 2, 1, '', '2019-06-26 07:56:41', '0000-00-00 00:00:00'),
(497, 8, 21, 72, 0, '10 A PFI Magnetic Contact', '10 A PFI Magnetic Contact', '10-a-pfi-magnetic-contact', 0, '10 A PFI Magnetic Contact', '10 A PFI Magnetic Contact', '', 50, 1500, 0, 1500, 0, 3, 1, '', '2019-06-26 07:58:54', '0000-00-00 00:00:00'),
(498, 8, 21, 74, 0, 'HT Line RT Fuse', 'HT Line RT Fuse', 'ht-line-rt-fuse', 0, 'HT Line RT Fuse', 'HT Line RT Fuse', '', 100, 1200, 0, 1200, 0, 3, 1, '', '2019-06-26 08:05:00', '0000-00-00 00:00:00'),
(499, 8, 21, 74, 0, 'LT Line RT Fuse', 'LT Line RT Fuse', 'lt-line-rt-fuse', 0, 'LT Line RT Fuse', 'LT Line RT Fuse', '', 100, 150, 0, 150, 0, 2, 1, '', '2019-06-26 08:05:51', '0000-00-00 00:00:00'),
(500, 8, 21, 75, 0, '32 AMP PFI Circuit Breaker ', '32 AMP PFI Circuit Breaker ', '32-amp-pfi-circuit-breaker', 0, '32 AMP PFI Circuit Breaker ', '32 AMP PFI Circuit Breaker ', '', 100, 1200, 0, 1200, 0, 3, 1, '', '2019-06-26 08:09:44', '0000-00-00 00:00:00'),
(501, 8, 22, 77, 0, '1Ton Gree Ac', '1Ton Gree Ac', '1ton-gree-ac', 0, '1Ton Gree Ac', '1Ton Gree Ac', '', 10, 55000, 0, 55000, 0, 3, 1, '', '2019-06-26 08:12:15', '0000-00-00 00:00:00'),
(502, 8, 22, 77, 0, '1Ton Walton Ac', '1Ton Walton Ac', '1ton-walton-ac', 0, '1Ton Walton Ac', '1Ton Walton Ac', '', 10, 45000, 0, 45000, 0, 3, 1, '', '2019-06-26 08:13:00', '0000-00-00 00:00:00'),
(503, 8, 22, 77, 0, '1Ton Sharp Ac', '1Ton Sharp Ac', '1ton-sharp-ac', 0, '1Ton Sharp Ac', '1Ton Sharp Ac', '', 10, 50000, 0, 50000, 0, 2, 1, '', '2019-06-26 08:13:44', '0000-00-00 00:00:00'),
(504, 8, 22, 78, 0, 'Walton 12CFT Refrigerator', 'Walton 12CFT Refrigerator', 'walton-12cft-refrigerator', 0, 'Walton 12CFT Refrigerator', 'Walton 12CFT Refrigerator', '', 5, 20000, 0, 20000, 0, 3, 1, '', '2019-06-26 08:15:40', '0000-00-00 00:00:00'),
(505, 8, 22, 79, 0, 'Nova Electric Oven', 'Nova Electric Oven', 'nova-electric-oven', 0, 'Nova Electric Oven', 'Nova Electric Oven', '', 10, 12000, 0, 12000, 0, 3, 1, '', '2019-06-26 08:17:32', '0000-00-00 00:00:00'),
(506, 8, 23, 80, 0, 'Hammer Drill Machine', 'Hammer Drill Machine', 'hammer-drill-machine', 0, 'Hammer Drill Machine', 'Hammer Drill Machine', '', 10, 7500, 0, 7500, 0, 3, 1, '', '2019-06-26 08:20:34', '0000-00-00 00:00:00'),
(507, 8, 23, 81, 0, 'Side Cutting Pliers', 'Side Cutting Pliers', 'side-cutting-pliers', 0, 'Side Cutting Pliers', 'Side Cutting Pliers', '', 100, 280, 0, 280, 0, 3, 1, '', '2019-06-26 08:22:19', '0000-00-00 00:00:00'),
(508, 8, 23, 82, 0, 'Gardner Wire Stripper', 'Gardner Wire Stripper', 'gardner-wire-stripper', 0, 'Gardner Wire Stripper', 'Gardner Wire Stripper', '', 100, 280, 0, 280, 0, 3, 1, '', '2019-06-26 08:23:48', '0000-00-00 00:00:00'),
(509, 8, 23, 83, 0, 'Draper Redline Combination Pliers', 'Draper Redline Combination Pliers', 'draper-redline-combination-pliers', 0, 'Draper Redline Combination Pliers', 'Draper Redline Combination Pliers', '', 100, 280, 0, 280, 0, 3, 1, '', '2019-06-26 08:25:02', '0000-00-00 00:00:00'),
(510, 8, 19, 60, 0, 'Transformer Oil Indian', 'ট্রান্সফরমার তেল (ইন্ডিয়ান)', '', 0, 'ট্রান্সফরমার তেল (ইন্ডিয়ান)', 'Transformer Oil Indian', '', 100, 270, 0, 270, 0, 2, 1, '', '2019-07-03 08:09:25', '0000-00-00 00:00:00');

-- --------------------------------------------------------

--
-- Table structure for table `product_wise_color`
--

CREATE TABLE `product_wise_color` (
  `id` int(11) NOT NULL,
  `fk_product_id` int(11) NOT NULL,
  `fk_color_id` int(11) NOT NULL,
  `status` tinyint(4) NOT NULL DEFAULT '1',
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` datetime DEFAULT '0000-00-00 00:00:00',
  `created_by` int(11) NOT NULL,
  `updated_by` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `product_wise_image`
--

CREATE TABLE `product_wise_image` (
  `id` int(11) NOT NULL,
  `fk_product_id` int(11) DEFAULT NULL,
  `path` varchar(500) COLLATE utf8_unicode_ci DEFAULT NULL,
  `caption` varchar(50) COLLATE utf8_unicode_ci DEFAULT NULL,
  `type` int(11) DEFAULT NULL,
  `status` tinyint(4) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` datetime NOT NULL DEFAULT '0000-00-00 00:00:00',
  `created_by` int(11) NOT NULL,
  `updated_by` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `product_wise_image`
--

INSERT INTO `product_wise_image` (`id`, `fk_product_id`, `path`, `caption`, `type`, `status`, `created_at`, `updated_at`, `created_by`, `updated_by`) VALUES
(716, 480, '4800-20190626065518428F.jpg', '100 KVA – 3 Phase Transformers', 1, 1, '2019-06-26 04:55:18', '0000-00-00 00:00:00', 0, NULL),
(717, 481, '4810-2019062606584363A6.jpg', '150 KVA – 3 Phase Transformers', 1, 1, '2019-06-26 04:58:43', '0000-00-00 00:00:00', 0, NULL),
(718, 482, '4820-201906260701099DA9.jpg', '200 KVA – 3 Phase Transformers', 1, 1, '2019-06-26 05:01:09', '0000-00-00 00:00:00', 0, NULL),
(719, 482, '4821-201906260701099E07.jpg', '200 KVA – 3 Phase Transformers - 2', 2, 1, '2019-06-26 05:01:09', '0000-00-00 00:00:00', 0, NULL),
(720, 483, '4830-20190626070441DD07.jpg', 'YIKA DOFC', 1, 1, '2019-06-26 05:04:42', '0000-00-00 00:00:00', 0, NULL),
(721, 484, '4840-20190626092040598F.jpg', '11KV HT Wire', 1, 1, '2019-06-26 07:20:40', '0000-00-00 00:00:00', 0, NULL),
(722, 485, '4850-20190626092337E02..jpg', '440V/250V LT Wire', 1, 1, '2019-06-26 07:23:37', '0000-00-00 00:00:00', 0, NULL),
(723, 486, '4860-20190626092544FC75.jpg', '11 KV Switch Gear', 1, 1, '2019-06-26 07:25:44', '0000-00-00 00:00:00', 0, NULL),
(724, 487, '4870-20190626092755FD28.jpg', '200/5 Amp', 1, 1, '2019-06-26 07:27:55', '0000-00-00 00:00:00', 0, NULL),
(725, 488, '4880-201906260929276719.jpg', '32 AMP Circuit Breaker', 1, 1, '2019-06-26 07:29:27', '0000-00-00 00:00:00', 0, NULL),
(726, 489, '4890-20190626093104E05D.png', '11KV Lightning Arrester', 1, 1, '2019-06-26 07:31:04', '0000-00-00 00:00:00', 0, NULL),
(727, 490, '4900-20190626093416D042.jpg', '150 W Solar Panel', 1, 1, '2019-06-26 07:34:16', '0000-00-00 00:00:00', 0, NULL),
(728, 491, '4910-20190626093638FA37.jpg', '10/20 A Charge Controller', 1, 1, '2019-06-26 07:36:38', '0000-00-00 00:00:00', 0, NULL),
(729, 492, '4920-20190626093741F0ED.jpg', '10 A Solar Switch', 1, 1, '2019-06-26 07:37:42', '0000-00-00 00:00:00', 0, NULL),
(730, 493, '4930-20190626094326313A.png', '10 W Solar Tube Light', 1, 1, '2019-06-26 07:43:26', '0000-00-00 00:00:00', 0, NULL),
(731, 494, '4940-201906260944415847.jpg', '250 W Solar Panel', 1, 1, '2019-06-26 07:44:41', '0000-00-00 00:00:00', 0, NULL),
(732, 495, '4950-201906260955416B90.png', '25 uF PFI Capacitor', 1, 1, '2019-06-26 07:55:41', '0000-00-00 00:00:00', 0, NULL),
(733, 496, '4960-201906260956415371.png', '20 uF PFI Capacitor', 1, 1, '2019-06-26 07:56:41', '0000-00-00 00:00:00', 0, NULL),
(734, 497, '4970-201906260958545BC5.jpg', '10 A PFI Magnetic Contact', 1, 1, '2019-06-26 07:58:54', '0000-00-00 00:00:00', 0, NULL),
(735, 498, '4980-20190626100500F34C.jpg', 'HT Line RT Fuse', 1, 1, '2019-06-26 08:05:00', '0000-00-00 00:00:00', 0, NULL),
(736, 499, '4990-20190626100551BAE2.png', 'LT Line RT Fuse', 1, 1, '2019-06-26 08:05:52', '0000-00-00 00:00:00', 0, NULL),
(737, 500, '5000-2019062610094445B0.jpg', '32 AMP PFI Circuit Breaker ', 1, 1, '2019-06-26 08:09:44', '0000-00-00 00:00:00', 0, NULL),
(738, 501, '5010-2019062610121594A2.jpg', '1Ton Gree Ac', 1, 1, '2019-06-26 08:12:15', '0000-00-00 00:00:00', 0, NULL),
(739, 502, '5020-2019062610130043B0.jpg', '1Ton Walton Ac', 1, 1, '2019-06-26 08:13:00', '0000-00-00 00:00:00', 0, NULL),
(740, 503, '5030-20190626101344F2BD.jpg', '1Ton Sharp Ac', 1, 1, '2019-06-26 08:13:45', '0000-00-00 00:00:00', 0, NULL),
(741, 504, '5040-20190626101540B5EA.jpg', 'Walton 12CFT Refrigerator', 1, 1, '2019-06-26 08:15:40', '0000-00-00 00:00:00', 0, NULL),
(742, 505, '5050-201906261017326B0E.jpg', 'Nova Electric Oven', 1, 1, '2019-06-26 08:17:32', '0000-00-00 00:00:00', 0, NULL),
(743, 506, '5060-201906261020343153.JPG', 'Hammer Drill Machine', 1, 1, '2019-06-26 08:20:34', '0000-00-00 00:00:00', 0, NULL),
(744, 507, '5070-20190626102219CAFF.jpg', 'Side Cutting Pliers', 1, 1, '2019-06-26 08:22:19', '0000-00-00 00:00:00', 0, NULL),
(745, 508, '5080-20190626102348265A.jpg', 'Gardner Wire Stripper', 1, 1, '2019-06-26 08:23:48', '0000-00-00 00:00:00', 0, NULL),
(746, 509, '5090-2019062610250247E8.jpg', 'Draper Redline Combination Pliers', 1, 1, '2019-06-26 08:25:02', '0000-00-00 00:00:00', 0, NULL),
(747, 510, '5100-20190703100925.JPG', 'Transformer Oil Indian', 1, 1, '2019-07-03 08:09:25', '0000-00-00 00:00:00', 0, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `product_wise_size`
--

CREATE TABLE `product_wise_size` (
  `id` int(11) NOT NULL,
  `fk_product_id` int(11) NOT NULL,
  `fk_size_id` int(11) NOT NULL,
  `status` tinyint(4) NOT NULL DEFAULT '1',
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` datetime DEFAULT '0000-00-00 00:00:00',
  `created_by` int(11) DEFAULT NULL,
  `updated_by` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `sizes`
--

CREATE TABLE `sizes` (
  `id` int(11) NOT NULL,
  `size_title_lang1` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `size_title_lang2` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `status` tinyint(4) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `updated_at` datetime DEFAULT '0000-00-00 00:00:00',
  `created_by` int(11) DEFAULT NULL,
  `updated_by` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `sizes`
--

INSERT INTO `sizes` (`id`, `size_title_lang1`, `size_title_lang2`, `status`, `created_at`, `updated_at`, `created_by`, `updated_by`) VALUES
(1, 'S', 'S', 1, '2016-11-22 23:59:24', '2016-11-22 12:59:24', NULL, NULL),
(2, 'M', 'M', 1, '2016-11-22 23:59:43', '0000-00-00 00:00:00', NULL, NULL),
(3, 'L', 'L', 1, '2016-11-22 23:59:53', '0000-00-00 00:00:00', NULL, NULL),
(4, 'XL', 'XL', 1, '2016-11-23 00:00:02', '0000-00-00 00:00:00', NULL, NULL),
(5, 'XXL', 'XXL', 1, '2016-11-23 00:00:12', '0000-00-00 00:00:00', NULL, NULL),
(6, '28', '২৮', 1, '2017-02-09 16:47:05', '2017-02-09 05:47:05', NULL, NULL),
(7, '29', '২৯', 1, '2017-02-09 16:46:57', '2017-02-09 05:46:57', NULL, NULL),
(8, '30', '৩০', 1, '2017-02-09 16:47:15', '2017-02-09 05:47:15', NULL, NULL),
(9, '31', '৩১', 1, '2017-02-09 16:47:25', '2017-02-09 05:47:25', NULL, NULL),
(10, '32', '৩২', 1, '2017-02-09 16:47:35', '2017-02-09 05:47:35', NULL, NULL),
(11, '33', '৩৩', 1, '2017-02-09 16:47:44', '2017-02-09 05:47:44', NULL, NULL),
(12, '34', '৩৪', 1, '2017-02-09 16:47:55', '2017-02-09 05:47:55', NULL, NULL),
(13, '35', '৩৫', 1, '2017-02-09 16:48:06', '0000-00-00 00:00:00', NULL, NULL),
(14, '36', '৩৬', 1, '2017-02-09 16:48:18', '0000-00-00 00:00:00', NULL, NULL),
(15, '37', '৩৭', 1, '2017-02-09 16:48:26', '0000-00-00 00:00:00', NULL, NULL),
(16, '38', '৩৮', 1, '2017-02-09 16:49:00', '0000-00-00 00:00:00', NULL, NULL),
(17, '39', '৩৯', 1, '2017-02-09 16:50:18', '0000-00-00 00:00:00', NULL, NULL),
(18, '40', '৪০', 1, '2017-02-09 16:50:29', '0000-00-00 00:00:00', NULL, NULL),
(19, '42', '৪২', 1, '2017-03-01 02:36:22', '0000-00-00 00:00:00', NULL, NULL),
(20, '44', '৪৪', 1, '2017-03-01 02:36:39', '0000-00-00 00:00:00', NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `sub_categories`
--

CREATE TABLE `sub_categories` (
  `id` int(11) NOT NULL,
  `fk_category_id` int(11) NOT NULL,
  `view_order` int(11) DEFAULT NULL,
  `sub_category_name_lang1` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `sub_category_name_lang2` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `featured_image` varchar(50) COLLATE utf8_unicode_ci DEFAULT NULL,
  `status` tinyint(4) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` datetime DEFAULT '0000-00-00 00:00:00',
  `created_by` int(11) DEFAULT NULL,
  `updated_by` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `sub_categories`
--

INSERT INTO `sub_categories` (`id`, `fk_category_id`, `view_order`, `sub_category_name_lang1`, `sub_category_name_lang2`, `featured_image`, `status`, `created_at`, `updated_at`, `created_by`, `updated_by`) VALUES
(59, 19, 1, 'Transformer', 'ট্রান্সফরমার', '', 1, '2019-06-26 10:17:18', '0000-00-00 00:00:00', NULL, NULL),
(60, 19, 2, 'Transformer Oil', 'ট্রান্সফরমারের তেল', '', 1, '2019-06-26 10:17:59', '0000-00-00 00:00:00', NULL, NULL),
(61, 19, 3, 'DOFC', 'ডিওএফসি', '', 1, '2019-06-26 10:18:26', '0000-00-00 00:00:00', NULL, NULL),
(62, 19, 4, 'HT LT Wire', 'এইচটি এলটি তার', '', 1, '2019-06-26 10:19:23', '0000-00-00 00:00:00', NULL, NULL),
(63, 19, 5, 'CT PT IT', 'সিটি পিটি আইটি', '', 1, '2019-06-26 10:19:50', '0000-00-00 00:00:00', NULL, NULL),
(64, 19, 6, 'Switch Gear', 'সুইচ গিয়ার', '', 1, '2019-06-26 10:20:06', '0000-00-00 00:00:00', NULL, NULL),
(65, 19, 7, 'Circuit Breaker', 'সার্কিট ব্রেকার', '', 1, '2019-06-26 10:22:44', '2019-06-26 06:22:53', NULL, NULL),
(66, 19, 8, 'Lighting Arrester', 'Lighting Arrester', '', 1, '2019-06-26 10:26:46', '0000-00-00 00:00:00', NULL, NULL),
(67, 20, 1, 'Solar Module', 'সোলার মডিউল', '', 1, '2019-06-26 10:27:24', '0000-00-00 00:00:00', NULL, NULL),
(68, 20, 2, 'Charge Controller', 'চার্জ কন্ট্রোলার', '', 1, '2019-06-26 10:27:52', '0000-00-00 00:00:00', NULL, NULL),
(69, 20, 3, 'Switch', 'সুইচ', '', 1, '2019-06-26 10:28:11', '0000-00-00 00:00:00', NULL, NULL),
(70, 20, 4, 'Lamp', 'বাতি', '', 1, '2019-06-26 10:28:27', '0000-00-00 00:00:00', NULL, NULL),
(71, 21, 1, 'Capacitor', 'ক্যাপাসিটর', '', 1, '2019-06-26 10:28:47', '0000-00-00 00:00:00', NULL, NULL),
(72, 21, 2, 'Magnetic Contact (MC)', 'Magnetic Contact (MC)', '', 1, '2019-06-26 10:29:16', '0000-00-00 00:00:00', NULL, NULL),
(73, 21, 3, 'Base With Fuse', 'Base With Fuse', '', 1, '2019-06-26 10:29:29', '0000-00-00 00:00:00', NULL, NULL),
(74, 21, 4, 'RT Fuse', 'আরটি ফিউস', '', 1, '2019-06-26 10:29:55', '0000-00-00 00:00:00', NULL, NULL),
(75, 21, 5, 'Circuit Breaker', 'সার্কিট ব্রেকার', '', 1, '2019-06-26 10:30:16', '0000-00-00 00:00:00', NULL, NULL),
(76, 21, 6, 'Channel', 'চ্যানেল', '', 1, '2019-06-26 10:30:31', '0000-00-00 00:00:00', NULL, NULL),
(77, 22, 1, 'AC', 'এসি', '', 1, '2019-06-26 10:30:47', '0000-00-00 00:00:00', NULL, NULL),
(78, 22, 2, 'Refrigerator', 'ফ্রিজ', '', 1, '2019-06-26 10:31:09', '0000-00-00 00:00:00', NULL, NULL),
(79, 22, 3, 'Electric Oven', 'ইলেকট্রিক ওভেন', '', 1, '2019-06-26 10:31:40', '0000-00-00 00:00:00', NULL, NULL),
(80, 23, 1, 'Drill', 'ড্রিল', '', 1, '2019-06-26 10:32:07', '0000-00-00 00:00:00', NULL, NULL),
(81, 23, 2, 'Cutting Pliers', 'Cutting Pliers', '', 1, '2019-06-26 10:33:43', '2019-06-26 06:35:21', NULL, NULL),
(82, 23, 3, 'Wire Stripper', 'Wire Stripper', '', 1, '2019-06-26 10:34:35', '0000-00-00 00:00:00', NULL, NULL),
(83, 23, 5, 'Combination Pliers', 'Combination Pliers', '', 1, '2019-06-26 10:34:48', '2019-06-26 06:35:16', NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `sub_sub_categories`
--

CREATE TABLE `sub_sub_categories` (
  `id` int(11) NOT NULL,
  `fk_category_id` int(11) NOT NULL,
  `fk_sub_category_id` int(11) NOT NULL,
  `sub_sub_category_name_lang1` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `sub_sub_category_name_lang2` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `status` tinyint(4) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` datetime DEFAULT '0000-00-00 00:00:00',
  `created_by` int(11) DEFAULT NULL,
  `updated_by` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `sub_sub_categories`
--

INSERT INTO `sub_sub_categories` (`id`, `fk_category_id`, `fk_sub_category_id`, `sub_sub_category_name_lang1`, `sub_sub_category_name_lang2`, `status`, `created_at`, `updated_at`, `created_by`, `updated_by`) VALUES
(54, 19, 59, '100 KVA', '100 KVA', 1, '2019-06-26 10:45:34', '0000-00-00 00:00:00', 3, NULL),
(55, 19, 59, '150 KVA', '150 KVA', 1, '2019-06-26 10:46:06', '0000-00-00 00:00:00', 3, NULL),
(56, 19, 59, '200 KVA', '200 KVA', 1, '2019-06-26 10:46:21', '0000-00-00 00:00:00', 3, NULL),
(57, 19, 65, '10A 220V', '10A 220V', 1, '2019-06-26 10:47:44', '0000-00-00 00:00:00', 3, NULL),
(58, 19, 65, '32 A 220 V', '32 A 220 V', 1, '2019-06-26 10:48:14', '0000-00-00 00:00:00', 3, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `name` varchar(50) COLLATE utf8_unicode_ci NOT NULL DEFAULT '0',
  `full_name` varchar(50) COLLATE utf8_unicode_ci NOT NULL DEFAULT '0',
  `mobile_no` varchar(50) COLLATE utf8_unicode_ci NOT NULL DEFAULT '0',
  `email` varchar(50) COLLATE utf8_unicode_ci NOT NULL DEFAULT '0',
  `password` varchar(250) COLLATE utf8_unicode_ci NOT NULL DEFAULT '0',
  `gender` tinyint(1) NOT NULL DEFAULT '0',
  `address` text COLLATE utf8_unicode_ci,
  `status` tinyint(4) NOT NULL DEFAULT '0',
  `last_login_lang` tinyint(1) NOT NULL DEFAULT '1',
  `remember_token` varchar(255) COLLATE utf8_unicode_ci NOT NULL DEFAULT '0',
  `created_at` datetime NOT NULL DEFAULT '0000-00-00 00:00:00',
  `updated_at` datetime NOT NULL DEFAULT '0000-00-00 00:00:00'
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `name`, `full_name`, `mobile_no`, `email`, `password`, `gender`, `address`, `status`, `last_login_lang`, `remember_token`, `created_at`, `updated_at`) VALUES
(140, '0', 'riyadh', '01672-002591', 'riyadh@gmail.com', '$2y$10$olbQIsrO3zxiKaq2Yp7.W.SH/yZN13nMe1dOC2axFxK1X/.8US2Re', 1, 'test', 1, 1, 'velhevmHkSeMNQqMMhYICeu8GPEsP9XubDUuUUmK', '2018-05-14 12:05:25', '0000-00-00 00:00:00'),
(141, '0', 'alauddin', '01855-438383', 'demo@gmail.com', '$2y$10$86hXCdO2IM8TTimmmcSbd.BC3aeF9VEVwwlMWd6UpmvSqUKHhsAwK', 1, 'adfadsf', 1, 1, 'LYqN0yZ1bazblTLJfk1FXEaS2UetIVcmvKsB6Qr2', '2018-05-15 08:05:14', '0000-00-00 00:00:00'),
(142, '0', 'Alauddin', '01855-438383', 'eng.alauddin12@gmail.com', '$2y$10$29pFrs.ahNzesjnKd1/XzOaL32b/XTuDcxvUtfQHgqeDpfKLY5Krm', 1, 'Feni', 1, 1, 'Jy5sjpmMMPCMgZ4fFo2Q40KhYkFbpdTfsdp52tlE', '2018-05-15 03:05:10', '0000-00-00 00:00:00'),
(143, '0', 'masud', '01775635214', 'masud@gmail.com', '$2y$10$86hXCdO2IM8TTimmmcSbd.BC3aeF9VEVwwlMWd6UpmvSqUKHhsAwK', 1, 'test', 0, 1, '0', '0000-00-00 00:00:00', '0000-00-00 00:00:00');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admins`
--
ALTER TABLE `admins`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `business_types`
--
ALTER TABLE `business_types`
  ADD PRIMARY KEY (`id`),
  ADD KEY `FK_cities_admins` (`created_by`),
  ADD KEY `FK_cities_admins_2` (`updated_by`);

--
-- Indexes for table `categories`
--
ALTER TABLE `categories`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `cities`
--
ALTER TABLE `cities`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `colors`
--
ALTER TABLE `colors`
  ADD PRIMARY KEY (`id`),
  ADD KEY `fk_admins_id_color_create` (`created_by`),
  ADD KEY `fk_admins_id_color_update` (`updated_by`);

--
-- Indexes for table `company_profile`
--
ALTER TABLE `company_profile`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `locations`
--
ALTER TABLE `locations`
  ADD PRIMARY KEY (`id`),
  ADD KEY `FK_cities_admins` (`created_by`),
  ADD KEY `FK_cities_admins_2` (`updated_by`);

--
-- Indexes for table `merchants`
--
ALTER TABLE `merchants`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `company_name` (`company_name`);

--
-- Indexes for table `merchant_shipment_info`
--
ALTER TABLE `merchant_shipment_info`
  ADD PRIMARY KEY (`id`),
  ADD KEY `FK_merchant_shipment_info_merchants` (`fk_merchant_id`),
  ADD KEY `FK_merchant_shipment_info_cities` (`fk_city_id`);

--
-- Indexes for table `orders`
--
ALTER TABLE `orders`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `invoice_no` (`invoice_no`),
  ADD KEY `FK_orders_users` (`fk_user_id`),
  ADD KEY `FK_orders_cities` (`fk_city_id`),
  ADD KEY `FK_orders_merchants` (`fk_merchant_id`),
  ADD KEY `FK_orders_order_condition` (`fk_order_condition_id`);

--
-- Indexes for table `order_condition`
--
ALTER TABLE `order_condition`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `order_details`
--
ALTER TABLE `order_details`
  ADD PRIMARY KEY (`id`),
  ADD KEY `FK_order_details_orders` (`fk_order_id`),
  ADD KEY `FK_order_details_products` (`fk_product_id`),
  ADD KEY `FK_order_details_product_wise_size` (`fk_product_wise_size_id`),
  ADD KEY `FK_order_details_product_wise_color` (`fk_product_wise_color_id`);

--
-- Indexes for table `order_master`
--
ALTER TABLE `order_master`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `master_invoice` (`master_invoice_no`);

--
-- Indexes for table `photo_sliders`
--
ALTER TABLE `photo_sliders`
  ADD PRIMARY KEY (`id`),
  ADD KEY `FK_category_id` (`fk_category_id`);

--
-- Indexes for table `products`
--
ALTER TABLE `products`
  ADD PRIMARY KEY (`id`),
  ADD KEY `FK_products_merchants` (`fk_merchant_id`),
  ADD KEY `FK_products_categories` (`fk_category_id`),
  ADD KEY `FK_products_sub_categories` (`fk_sub_category_id`),
  ADD KEY `FK_products_sub_sub_categories` (`fk_sub_sub_category_id`);

--
-- Indexes for table `product_wise_color`
--
ALTER TABLE `product_wise_color`
  ADD PRIMARY KEY (`id`),
  ADD KEY `FK_product_wise_color_products` (`fk_product_id`),
  ADD KEY `FK_product_wise_color_colors` (`fk_color_id`);

--
-- Indexes for table `product_wise_image`
--
ALTER TABLE `product_wise_image`
  ADD PRIMARY KEY (`id`),
  ADD KEY `FK_product_wise_image_products` (`fk_product_id`);

--
-- Indexes for table `product_wise_size`
--
ALTER TABLE `product_wise_size`
  ADD PRIMARY KEY (`id`),
  ADD KEY `FK_product_wise_size_products` (`fk_product_id`),
  ADD KEY `FK_product_wise_size_size` (`fk_size_id`),
  ADD KEY `FK_product_wise_size_admins` (`created_by`),
  ADD KEY `FK_product_wise_size_admins_2` (`updated_by`);

--
-- Indexes for table `sizes`
--
ALTER TABLE `sizes`
  ADD PRIMARY KEY (`id`),
  ADD KEY `FK_size_admins` (`created_by`),
  ADD KEY `FK_size_admins_2` (`updated_by`);

--
-- Indexes for table `sub_categories`
--
ALTER TABLE `sub_categories`
  ADD PRIMARY KEY (`id`),
  ADD KEY `FK_sub_categories_categories` (`fk_category_id`),
  ADD KEY `FK_sub_categories_admins` (`created_by`),
  ADD KEY `FK_sub_categories_admins_2` (`updated_by`);

--
-- Indexes for table `sub_sub_categories`
--
ALTER TABLE `sub_sub_categories`
  ADD PRIMARY KEY (`id`),
  ADD KEY `FK_sub_sub_categories_categories` (`fk_category_id`),
  ADD KEY `FK_sub_sub_categories_sub_categories` (`fk_sub_category_id`),
  ADD KEY `FK_sub_sub_categories_admins` (`created_by`),
  ADD KEY `FK_sub_sub_categories_admins_2` (`updated_by`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `admins`
--
ALTER TABLE `admins`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `business_types`
--
ALTER TABLE `business_types`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `categories`
--
ALTER TABLE `categories`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=33;

--
-- AUTO_INCREMENT for table `cities`
--
ALTER TABLE `cities`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=65;

--
-- AUTO_INCREMENT for table `colors`
--
ALTER TABLE `colors`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- AUTO_INCREMENT for table `company_profile`
--
ALTER TABLE `company_profile`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `locations`
--
ALTER TABLE `locations`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `merchants`
--
ALTER TABLE `merchants`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;

--
-- AUTO_INCREMENT for table `merchant_shipment_info`
--
ALTER TABLE `merchant_shipment_info`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `orders`
--
ALTER TABLE `orders`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `order_condition`
--
ALTER TABLE `order_condition`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `order_details`
--
ALTER TABLE `order_details`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `order_master`
--
ALTER TABLE `order_master`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `photo_sliders`
--
ALTER TABLE `photo_sliders`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;

--
-- AUTO_INCREMENT for table `products`
--
ALTER TABLE `products`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=511;

--
-- AUTO_INCREMENT for table `product_wise_color`
--
ALTER TABLE `product_wise_color`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `product_wise_image`
--
ALTER TABLE `product_wise_image`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=748;

--
-- AUTO_INCREMENT for table `product_wise_size`
--
ALTER TABLE `product_wise_size`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `sizes`
--
ALTER TABLE `sizes`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=21;

--
-- AUTO_INCREMENT for table `sub_categories`
--
ALTER TABLE `sub_categories`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=84;

--
-- AUTO_INCREMENT for table `sub_sub_categories`
--
ALTER TABLE `sub_sub_categories`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=59;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=144;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `business_types`
--
ALTER TABLE `business_types`
  ADD CONSTRAINT `business_types_ibfk_1` FOREIGN KEY (`created_by`) REFERENCES `admins` (`id`),
  ADD CONSTRAINT `business_types_ibfk_2` FOREIGN KEY (`updated_by`) REFERENCES `admins` (`id`);

--
-- Constraints for table `locations`
--
ALTER TABLE `locations`
  ADD CONSTRAINT `locations_ibfk_1` FOREIGN KEY (`created_by`) REFERENCES `admins` (`id`),
  ADD CONSTRAINT `locations_ibfk_2` FOREIGN KEY (`updated_by`) REFERENCES `admins` (`id`);

--
-- Constraints for table `merchant_shipment_info`
--
ALTER TABLE `merchant_shipment_info`
  ADD CONSTRAINT `FK_merchant_shipment_info_cities` FOREIGN KEY (`fk_city_id`) REFERENCES `cities` (`id`),
  ADD CONSTRAINT `FK_merchant_shipment_info_merchants` FOREIGN KEY (`fk_merchant_id`) REFERENCES `merchants` (`id`);

--
-- Constraints for table `orders`
--
ALTER TABLE `orders`
  ADD CONSTRAINT `FK_orders_cities` FOREIGN KEY (`fk_city_id`) REFERENCES `cities` (`id`),
  ADD CONSTRAINT `FK_orders_merchants` FOREIGN KEY (`fk_merchant_id`) REFERENCES `merchants` (`id`),
  ADD CONSTRAINT `FK_orders_order_condition` FOREIGN KEY (`fk_order_condition_id`) REFERENCES `order_condition` (`id`),
  ADD CONSTRAINT `FK_orders_users` FOREIGN KEY (`fk_user_id`) REFERENCES `users` (`id`);

--
-- Constraints for table `order_details`
--
ALTER TABLE `order_details`
  ADD CONSTRAINT `FK_order_details_orders` FOREIGN KEY (`fk_order_id`) REFERENCES `orders` (`id`),
  ADD CONSTRAINT `FK_order_details_product_wise_color` FOREIGN KEY (`fk_product_wise_color_id`) REFERENCES `product_wise_color` (`id`),
  ADD CONSTRAINT `FK_order_details_product_wise_size` FOREIGN KEY (`fk_product_wise_size_id`) REFERENCES `product_wise_size` (`id`),
  ADD CONSTRAINT `FK_order_details_products` FOREIGN KEY (`fk_product_id`) REFERENCES `products` (`id`);

--
-- Constraints for table `photo_sliders`
--
ALTER TABLE `photo_sliders`
  ADD CONSTRAINT `FK_category_id` FOREIGN KEY (`fk_category_id`) REFERENCES `categories` (`id`);

--
-- Constraints for table `products`
--
ALTER TABLE `products`
  ADD CONSTRAINT `FK_products_categories` FOREIGN KEY (`fk_category_id`) REFERENCES `categories` (`id`);

--
-- Constraints for table `product_wise_color`
--
ALTER TABLE `product_wise_color`
  ADD CONSTRAINT `FK_product_wise_color_colors` FOREIGN KEY (`fk_color_id`) REFERENCES `colors` (`id`),
  ADD CONSTRAINT `FK_product_wise_color_products` FOREIGN KEY (`fk_product_id`) REFERENCES `products` (`id`);

--
-- Constraints for table `product_wise_image`
--
ALTER TABLE `product_wise_image`
  ADD CONSTRAINT `FK_product_wise_image_products` FOREIGN KEY (`fk_product_id`) REFERENCES `products` (`id`);

--
-- Constraints for table `product_wise_size`
--
ALTER TABLE `product_wise_size`
  ADD CONSTRAINT `FK_product_wise_size_products` FOREIGN KEY (`fk_product_id`) REFERENCES `products` (`id`),
  ADD CONSTRAINT `FK_product_wise_size_size` FOREIGN KEY (`fk_size_id`) REFERENCES `sizes` (`id`);

--
-- Constraints for table `sizes`
--
ALTER TABLE `sizes`
  ADD CONSTRAINT `FK_size_admins` FOREIGN KEY (`created_by`) REFERENCES `admins` (`id`),
  ADD CONSTRAINT `FK_size_admins_2` FOREIGN KEY (`updated_by`) REFERENCES `admins` (`id`);

--
-- Constraints for table `sub_categories`
--
ALTER TABLE `sub_categories`
  ADD CONSTRAINT `FK_sub_categories_admins` FOREIGN KEY (`created_by`) REFERENCES `admins` (`id`),
  ADD CONSTRAINT `FK_sub_categories_admins_2` FOREIGN KEY (`updated_by`) REFERENCES `admins` (`id`),
  ADD CONSTRAINT `FK_sub_categories_categories` FOREIGN KEY (`fk_category_id`) REFERENCES `categories` (`id`);

--
-- Constraints for table `sub_sub_categories`
--
ALTER TABLE `sub_sub_categories`
  ADD CONSTRAINT `FK_sub_sub_categories_admins` FOREIGN KEY (`created_by`) REFERENCES `admins` (`id`),
  ADD CONSTRAINT `FK_sub_sub_categories_admins_2` FOREIGN KEY (`updated_by`) REFERENCES `admins` (`id`),
  ADD CONSTRAINT `FK_sub_sub_categories_categories` FOREIGN KEY (`fk_category_id`) REFERENCES `categories` (`id`),
  ADD CONSTRAINT `FK_sub_sub_categories_sub_categories` FOREIGN KEY (`fk_sub_category_id`) REFERENCES `sub_categories` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
