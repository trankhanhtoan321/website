-- phpMyAdmin SQL Dump
-- version 4.5.1
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: May 07, 2017 at 01:49 AM
-- Server version: 10.1.19-MariaDB
-- PHP Version: 5.6.28

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `website`
--

-- --------------------------------------------------------

--
-- Table structure for table `blogcategory`
--

CREATE TABLE `blogcategory` (
  `blogcat_id` int(11) NOT NULL,
  `blogcat_name` text COLLATE utf8_unicode_ci NOT NULL,
  `blogcat_description` text COLLATE utf8_unicode_ci,
  `blogcat_parent_id` int(11) DEFAULT '0',
  `blogcat_seo_title` text COLLATE utf8_unicode_ci,
  `blogcat_seo_keyword` text COLLATE utf8_unicode_ci,
  `blogcat_seo_description` text COLLATE utf8_unicode_ci,
  `blogcat_image` text COLLATE utf8_unicode_ci
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `blogs`
--

CREATE TABLE `blogs` (
  `blog_id` int(11) NOT NULL,
  `blog_name` text COLLATE utf8_unicode_ci NOT NULL,
  `blog_content` text COLLATE utf8_unicode_ci,
  `blog_time` int(11) NOT NULL DEFAULT '0',
  `blog_cat_ids` text COLLATE utf8_unicode_ci,
  `blog_image` text COLLATE utf8_unicode_ci,
  `blog_seo_title` text COLLATE utf8_unicode_ci,
  `blog_seo_keyword` text COLLATE utf8_unicode_ci,
  `blog_seo_description` text COLLATE utf8_unicode_ci,
  `blog_user_id` int(11) DEFAULT '0',
  `blog_views` int(11) DEFAULT '0',
  `blog_excerpt` text COLLATE utf8_unicode_ci,
  `blog_enable_comment` int(11) DEFAULT '1',
  `blog_comments` int(11) DEFAULT '0',
  `blog_cat_names` text COLLATE utf8_unicode_ci
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `comment`
--

CREATE TABLE `comment` (
  `comment_id` int(11) NOT NULL,
  `comment_blog_id` int(11) NOT NULL,
  `comment_user_id` int(11) NOT NULL,
  `comment_time` int(11) NOT NULL,
  `comment_content` text NOT NULL,
  `comment_like` int(11) NOT NULL DEFAULT '0',
  `comment_check` int(11) NOT NULL DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `product`
--

CREATE TABLE `product` (
  `product_id` int(11) NOT NULL,
  `product_name` text NOT NULL,
  `product_price_in` int(11) NOT NULL DEFAULT '0',
  `product_price_out` int(11) NOT NULL,
  `product_image` text NOT NULL,
  `product_gallery` text NOT NULL,
  `product_attribute` text NOT NULL,
  `product_description` text NOT NULL,
  `product_seo_title` text NOT NULL,
  `product_seo_keyword` text NOT NULL,
  `product_seo_description` text NOT NULL,
  `product_views` int(11) NOT NULL DEFAULT '0',
  `product_orders` int(11) NOT NULL DEFAULT '0',
  `product_category_ids` text NOT NULL,
  `product_date_added` int(11) NOT NULL,
  `product_enable` int(11) NOT NULL DEFAULT '0',
  `product_quantity` int(11) NOT NULL DEFAULT '0',
  `product_sku` text NOT NULL,
  `product_model` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `product_category`
--

CREATE TABLE `product_category` (
  `product_category_id` int(11) NOT NULL,
  `product_category_name` text NOT NULL,
  `product_category_image` text,
  `product_category_seo_title` text,
  `product_category_seo_keyword` text,
  `product_category_seo_description` text,
  `product_category_description` text,
  `product_category_date_added` int(11) DEFAULT NULL,
  `product_category_views` int(11) NOT NULL DEFAULT '0',
  `product_category_parent_id` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `setting`
--

CREATE TABLE `setting` (
  `set_name` text COLLATE utf8_unicode_ci NOT NULL,
  `set_value` text COLLATE utf8_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `setting`
--

INSERT INTO `setting` (`set_name`, `set_value`) VALUES
('set_pagetitle', 'Tìm giá thấp nhất Lazada,Tiki,Adayroi tại GiaReHon.net'),
('set_pagedescriptiton', 'GiaReHon.net là website so sánh giá và tìm giá thấp nhất  Lazada,Tiki,Adayroi'),
('set_pagekeyword', '2'),
('author', '6'),
('logo', '/uploads/images/logos/3355c51eb27502e15cb3d94f20249390.png'),
('address', '8'),
('phone', '9'),
('email', '10'),
('id_analytics', '5'),
('google_site_verification', '4'),
('favicon', 'http://website.dev/uploads/images/logos/7efe7b61b40bbbf909ed461a5d2516ab.png'),
('email_host', 'smtp.gmail.com'),
('email_SMTPSecure', 'ssl'),
('email_port', '465'),
('email_Username', 'monnydotnet@gmail.com'),
('email_Password', '123456Aa@'),
('author_name', '7'),
('email_name', 'Monny Dot Net'),
('fb_id', '100004106050082'),
('currency', 'đ');

-- --------------------------------------------------------

--
-- Table structure for table `subscribe_email`
--

CREATE TABLE `subscribe_email` (
  `sub_id` int(11) NOT NULL,
  `sub_email` text NOT NULL,
  `sub_time` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `user_id` int(11) NOT NULL,
  `user_name` text COLLATE utf8_unicode_ci NOT NULL,
  `user_pass` text COLLATE utf8_unicode_ci NOT NULL,
  `user_email` text COLLATE utf8_unicode_ci,
  `user_lastlogin` int(11) DEFAULT '0',
  `user_fullname` text COLLATE utf8_unicode_ci,
  `user_role` text COLLATE utf8_unicode_ci,
  `user_image` text COLLATE utf8_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`user_id`, `user_name`, `user_pass`, `user_email`, `user_lastlogin`, `user_fullname`, `user_role`, `user_image`) VALUES
(14, 'admin', '$2y$10$7pf2VRMeB2O.pbRmYHXYmObW0mVtYVm.01JIkdWn4qbUqNxCby7yq', 'trankhanhtoan321@gmail.com', 1493694026, 'Admin', 'admin', 'http://website.dev/uploads/images/logos/a6fab4065457f401680f9da0dcb8c81e.png');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `blogcategory`
--
ALTER TABLE `blogcategory`
  ADD PRIMARY KEY (`blogcat_id`);

--
-- Indexes for table `blogs`
--
ALTER TABLE `blogs`
  ADD PRIMARY KEY (`blog_id`),
  ADD KEY `blog_user_id` (`blog_user_id`);

--
-- Indexes for table `comment`
--
ALTER TABLE `comment`
  ADD PRIMARY KEY (`comment_id`),
  ADD KEY `comment_blog_id` (`comment_blog_id`),
  ADD KEY `comment_user_id` (`comment_user_id`);

--
-- Indexes for table `product`
--
ALTER TABLE `product`
  ADD PRIMARY KEY (`product_id`);

--
-- Indexes for table `product_category`
--
ALTER TABLE `product_category`
  ADD PRIMARY KEY (`product_category_id`);

--
-- Indexes for table `subscribe_email`
--
ALTER TABLE `subscribe_email`
  ADD PRIMARY KEY (`sub_id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`user_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `blogcategory`
--
ALTER TABLE `blogcategory`
  MODIFY `blogcat_id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `blogs`
--
ALTER TABLE `blogs`
  MODIFY `blog_id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `comment`
--
ALTER TABLE `comment`
  MODIFY `comment_id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `product`
--
ALTER TABLE `product`
  MODIFY `product_id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `product_category`
--
ALTER TABLE `product_category`
  MODIFY `product_category_id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `subscribe_email`
--
ALTER TABLE `subscribe_email`
  MODIFY `sub_id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `user_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;
--
-- Constraints for dumped tables
--

--
-- Constraints for table `blogs`
--
ALTER TABLE `blogs`
  ADD CONSTRAINT `blogs_ibfk_1` FOREIGN KEY (`blog_user_id`) REFERENCES `users` (`user_id`);

--
-- Constraints for table `comment`
--
ALTER TABLE `comment`
  ADD CONSTRAINT `comment_ibfk_1` FOREIGN KEY (`comment_blog_id`) REFERENCES `blogs` (`blog_id`),
  ADD CONSTRAINT `comment_ibfk_2` FOREIGN KEY (`comment_user_id`) REFERENCES `users` (`user_id`);

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
