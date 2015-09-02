-- phpMyAdmin SQL Dump
-- version 4.4.12
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: Sep 01, 2015 at 04:16 PM
-- Server version: 5.6.25
-- PHP Version: 5.6.11

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `alllad`
--

-- --------------------------------------------------------

--
-- Table structure for table `categories`
--

CREATE TABLE IF NOT EXISTS `categories` (
  `id` bigint(20) unsigned NOT NULL,
  `name` varchar(200) COLLATE utf8_unicode_ci NOT NULL,
  `slug` varchar(200) COLLATE utf8_unicode_ci NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `updated_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00'
) ENGINE=InnoDB AUTO_INCREMENT=9 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `categories`
--

INSERT INTO `categories` (`id`, `name`, `slug`, `created_at`, `updated_at`) VALUES
(2, 'Banter', 'banter', '2015-08-11 04:32:50', '2015-08-11 04:32:50'),
(3, 'Football', 'football', '2015-08-11 04:32:59', '2015-08-11 04:32:59'),
(4, 'Gaming', 'gaming', '2015-08-11 04:33:02', '2015-08-11 04:33:02'),
(5, 'Food', 'food', '2015-08-11 04:33:06', '2015-08-11 04:33:06'),
(6, 'News', 'news', '2015-08-11 04:33:08', '2015-08-11 04:33:08'),
(7, 'Uncategorized', 'uncategorized', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(8, 'Anime', 'anime', '2015-08-25 03:41:53', '2015-08-25 03:41:53');

-- --------------------------------------------------------

--
-- Table structure for table `comments`
--

CREATE TABLE IF NOT EXISTS `comments` (
  `id` bigint(20) unsigned NOT NULL,
  `post_id` bigint(20) NOT NULL,
  `author_id` bigint(20) NOT NULL,
  `content` text COLLATE utf8_unicode_ci NOT NULL,
  `approved` tinyint(4) NOT NULL,
  `parent` tinyint(4) NOT NULL DEFAULT '0',
  `created_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `updated_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00'
) ENGINE=InnoDB AUTO_INCREMENT=70 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `comments`
--

INSERT INTO `comments` (`id`, `post_id`, `author_id`, `content`, `approved`, `parent`, `created_at`, `updated_at`) VALUES
(62, 3, 2, 'watermelon', 0, 0, '2015-08-21 00:23:12', '2015-08-21 00:23:12'),
(63, 3, 2, 'ksdfjsdfskdjfkl; asdfklj asl;dkfjad', 0, 62, '2015-08-21 00:23:36', '2015-08-21 00:23:36'),
(64, 3, 2, 'Halo', 0, 62, '2015-08-30 23:04:55', '2015-08-30 23:04:55'),
(65, 3, 2, 'Hslo', 0, 62, '2015-08-30 23:05:07', '2015-08-30 23:05:07'),
(66, 3, 2, 'ha', 0, 62, '2015-08-30 23:05:15', '2015-08-30 23:05:15'),
(67, 5, 2, 'I''m an nice looking comment', 0, 0, '2015-08-31 00:41:15', '2015-08-31 00:41:15'),
(68, 5, 2, 'Oh c''mon', 0, 67, '2015-08-31 00:41:23', '2015-08-31 00:41:23'),
(69, 5, 2, 'You kidding right?', 0, 67, '2015-08-31 00:41:32', '2015-08-31 00:41:32');

-- --------------------------------------------------------

--
-- Table structure for table `links`
--

CREATE TABLE IF NOT EXISTS `links` (
  `id` bigint(20) unsigned NOT NULL,
  `url` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `image` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `description` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `visible` tinyint(4) NOT NULL DEFAULT '1',
  `created_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `updated_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00'
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `links`
--

INSERT INTO `links` (`id`, `url`, `image`, `description`, `visible`, `created_at`, `updated_at`) VALUES
(1, 'http://owlwin.com/slots-commute/', 'http://owlwin.com/wp-content/uploads/2015/02/lp101_1.jpg', 'owlwin.com', 1, '2015-08-14 01:15:14', '2015-08-14 01:15:14'),
(2, 'http://eveningmailnews.com/largest-bonus-history-punters-make-millions', 'http://owlwin.com/wp-content/uploads/2015/05/7528788502_8192e14777_b.jpg', 'Punters are turning £200 into £1,200 with Betfred’s ‘hidden’ bonus deal!', 1, '2015-08-17 06:26:49', '2015-08-17 06:26:49');

-- --------------------------------------------------------

--
-- Table structure for table `media_files`
--

CREATE TABLE IF NOT EXISTS `media_files` (
  `id` bigint(20) unsigned NOT NULL,
  `user_id` bigint(20) NOT NULL,
  `image_url` text COLLATE utf8_unicode_ci NOT NULL,
  `title` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `description` text COLLATE utf8_unicode_ci NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `updated_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00'
) ENGINE=InnoDB AUTO_INCREMENT=39 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `media_files`
--

INSERT INTO `media_files` (`id`, `user_id`, `image_url`, `title`, `description`, `created_at`, `updated_at`) VALUES
(25, 2, '47094_49425161_p0.png', '49425161_p0.png', '', '2015-08-25 03:27:07', '2015-08-25 03:27:07'),
(26, 2, '75602_2016.jpg', '2016.jpg', '', '2015-08-26 19:01:22', '2015-08-26 19:01:22'),
(27, 2, '76906_beckham.jpg', 'beckham.jpg', '', '2015-08-26 19:02:27', '2015-08-26 19:02:27'),
(28, 2, '51074_sleeping.jpg', 'sleeping.jpg', '', '2015-08-26 19:02:56', '2015-08-26 19:02:56'),
(29, 2, '33436_re-l.jpg', 're-l.jpg', '', '2015-08-30 23:29:17', '2015-08-30 23:29:17'),
(30, 2, '91946_death_note_typography-wallpaper-1366x768.jpg', 'death_note_typography-wallpaper-1366x768.jpg', '', '2015-08-30 23:30:40', '2015-08-30 23:30:40'),
(31, 2, '22482_girl-gun.jpg', 'girl-gun.jpg', '', '2015-08-30 23:44:37', '2015-08-30 23:44:37'),
(32, 2, '60582_vamp.jpg', 'vamp.jpg', '', '2015-08-30 23:49:42', '2015-08-30 23:49:42'),
(33, 2, '18787_photo-1416339442236-8ceb164046f8.jpg', 'photo-1416339442236-8ceb164046f8.jpg', '', '2015-08-30 23:49:52', '2015-08-30 23:49:52'),
(34, 2, '49053_fb.jpg', 'fb.jpg', '', '2015-08-31 01:14:17', '2015-08-31 01:14:17'),
(35, 2, '75021_cara.jpg', 'cara.jpg', '', '2015-08-31 01:17:38', '2015-08-31 01:17:38'),
(36, 2, '21587_topless.jpg', 'topless.jpg', '', '2015-08-31 01:19:51', '2015-08-31 01:19:51'),
(37, 2, '19457_amazon.jpg', 'amazon.jpg', '', '2015-08-31 01:27:22', '2015-08-31 01:27:22'),
(38, 2, '96166_watch.jpg', 'watch.jpg', '', '2015-08-31 01:38:34', '2015-08-31 01:38:34');

-- --------------------------------------------------------

--
-- Table structure for table `migrations`
--

CREATE TABLE IF NOT EXISTS `migrations` (
  `migration` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `batch` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `migrations`
--

INSERT INTO `migrations` (`migration`, `batch`) VALUES
('2014_10_12_000000_create_users_table', 1),
('2014_10_12_100000_create_password_resets_table', 1),
('2015_08_11_100127_create_categories_table', 1),
('2015_08_11_100335_create_sub_categories_table', 1),
('2015_08_11_100956_create_posts_table', 1),
('2015_08_11_135114_create_post_categories_table', 2),
('2015_08_11_151343_alter_posts_table', 3),
('2015_08_12_151313_alter_users_table_add_avatar', 4),
('2015_08_13_030505_alter_users_table_add_is_admin', 5),
('2015_08_13_032908_create_comments_table', 5),
('2015_08_13_120905_alter_users_table_add_users_desc', 6),
('2015_08_14_084034_create_links_table', 7),
('2015_08_19_095553_create_media_files_table', 8),
('2015_08_19_145659_alter_posts_table_add_is_shared', 9),
('2015_08_21_044027_create_site_settings_table', 10);

-- --------------------------------------------------------

--
-- Table structure for table `password_resets`
--

CREATE TABLE IF NOT EXISTS `password_resets` (
  `email` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `token` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00'
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `posts`
--

CREATE TABLE IF NOT EXISTS `posts` (
  `id` bigint(20) unsigned NOT NULL,
  `author_id` bigint(20) NOT NULL,
  `content` longtext COLLATE utf8_unicode_ci NOT NULL,
  `title` text COLLATE utf8_unicode_ci NOT NULL,
  `excerpt` text COLLATE utf8_unicode_ci NOT NULL,
  `status` tinyint(4) NOT NULL,
  `password` varchar(20) COLLATE utf8_unicode_ci NOT NULL,
  `slug` varchar(200) COLLATE utf8_unicode_ci NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `updated_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `feat_image_url` text COLLATE utf8_unicode_ci NOT NULL,
  `shared_fb` tinyint(4) NOT NULL DEFAULT '0',
  `shared_twitter` tinyint(4) NOT NULL DEFAULT '0'
) ENGINE=InnoDB AUTO_INCREMENT=18 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `posts`
--

INSERT INTO `posts` (`id`, `author_id`, `content`, `title`, `excerpt`, `status`, `password`, `slug`, `created_at`, `updated_at`, `feat_image_url`, `shared_fb`, `shared_twitter`) VALUES
(14, 2, '<p style="text-align:center"><img alt="" height="400" src="http://192.168.1.4/alllad/public/uploads/49053_fb.jpg" width="700" /></p>\r\n\r\n<p><strong>We probably all know a few people who are guilty of sharing far too much information on the social networking site (you&rsquo;ve fallen out with your &ldquo;best friend&rdquo; for the third time this week? I just don&rsquo;t care, Sarah), but you too may have put too much of your personal life on Facebook.</strong></p>\r\n\r\n<p>It turns out that some of the life info you reveal on social media could put you at serious risk of being hacked or worse.</p>\r\n\r\n<p>Now, digital gurus on the&nbsp;<em>Kim Komando Show</em>&nbsp;have revealed the five details you shouldn&rsquo;t be letting Mark Zuckerberg and his team know&hellip;</p>\r\n\r\n<p style="text-align:center"><img alt="" src="http://cdn.unilad.co.uk/wp-content/uploads/2015/08/UNILAD-4-tips-17.jpg" /></p>\r\n\r\n<p>&nbsp;</p>\r\n\r\n<h1>&nbsp;</h1>\r\n', 'These Are The Five Details You Shouldn’t Give To Facebook', '', 1, '', 'these-are-the-five-details-you-shouldnt-give-to-facebook', '2015-08-31 01:10:34', '2015-08-31 01:24:47', '49053_fb.jpg', 0, 0),
(15, 2, '<p><strong>&lsquo;I don&rsquo;t care a lot about fashion &hellip; I prefer to be naked&rsquo;, says Cara Delevingne, as men everywhere simultaneously stop what they&rsquo;re doing and start reading this article.</strong></p>\r\n\r\n<p>For a catwalk model, a love of clothes might usually be considered essential.</p>\r\n\r\n<p>But not for Cara Delevingne, who has claimed in a recent interview that she hates clothes, the&nbsp;<em><a href="http://www.dailyrecord.co.uk/entertainment/celebrity/cara-delevingne-i-dont-care-6341665" target="_blank">Daily Record</a></em>&nbsp;reports.</p>\r\n\r\n<p>The face of Burberry, Yves Saint Laurent and Chanel, when asked whether she cared about the industry, gave a refreshingly straight answer &ndash; &lsquo;No&rsquo;.</p>\r\n\r\n<p><strong>She clarified slightly:</strong></p>\r\n\r\n<blockquote>\r\n<p>I care enough. I know a lot of people who aren&rsquo;t in the fashion industry who care about fashion a lot more than I do.</p>\r\n\r\n<p>I like clothes, just not all the time. I prefer to be naked, what can I say?</p>\r\n</blockquote>\r\n\r\n<p>Can&rsquo;t argue with that, Cara.</p>\r\n', 'Cara Delevingne Says She Prefers Being Naked To Wearing Clothes', '', 1, '', 'cara-delevingne-says-she-prefers-being-naked-to-wearing-clothes', '2015-08-31 01:17:50', '2015-08-31 01:17:50', '75021_cara.jpg', 0, 0),
(16, 2, '<p>Amazon.com Inc. said Tuesday it will begin delivering wine, beer and spirits to American&nbsp;customers for the first time as part of its speedy delivery service, Prime Now.</p>\r\n\r\n<p style="text-align:center"><img alt="" height="438" src="http://192.168.1.4/alllad/public/uploads/19457_amazon.jpg" width="753" /></p>\r\n\r\n<p>The online retailer is expanding Prime Now, its one- and two-hour service, to Seattle, where the company is headquartered, and offering alcohol deliveries there.</p>\r\n', 'Amazon Prime Now will now deliver booze', '', 1, '', 'amazon-prime-now-will-now-deliver-booze', '2015-08-31 01:27:51', '2015-08-31 01:59:51', '19457_amazon.jpg', 0, 0),
(17, 2, '<p>Nullam id dolor id nibh ultricies vehicula ut id elit. Curabitur blandit tempus porttitor. Integer posuere erat a ante venenatis dapibus posuere velit aliquet. Cras justo odio, dapibus ac facilisis in, egestas eget quam. Vestibulum id ligula porta felis euismod semper. Donec id elit non mi porta gravida at eget metus. Vestibulum id ligula porta felis euismod semper.</p>\r\n\r\n<p style="text-align:center"><img alt="" height="438" src="http://192.168.1.4/alllad/public/uploads/96166_watch.jpg" width="753" /></p>\r\n', 'Apple expected to unveil new iPhones at September event', '', 1, '', 'apple-expected-to-unveil-new-iphones-at-september-event', '2015-08-31 01:46:08', '2015-08-31 02:49:14', '96166_watch.jpg', 0, 0);

-- --------------------------------------------------------

--
-- Table structure for table `post_categories`
--

CREATE TABLE IF NOT EXISTS `post_categories` (
  `id` bigint(20) unsigned NOT NULL,
  `post_id` bigint(20) NOT NULL,
  `category_id` bigint(20) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `updated_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00'
) ENGINE=InnoDB AUTO_INCREMENT=46 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `post_categories`
--

INSERT INTO `post_categories` (`id`, `post_id`, `category_id`, `created_at`, `updated_at`) VALUES
(6, 2, 2, '2015-08-11 07:26:29', '2015-08-11 07:26:29'),
(8, 4, 3, '2015-08-12 07:11:13', '2015-08-12 07:11:13'),
(9, 5, 6, '2015-08-12 07:11:30', '2015-08-12 07:11:30'),
(10, 6, 3, '2015-08-12 07:11:45', '2015-08-12 07:11:45'),
(16, 3, 2, '2015-08-18 03:33:38', '2015-08-18 03:33:38'),
(22, 7, 2, '2015-08-19 03:55:48', '2015-08-19 03:55:48'),
(23, 10, 6, '2015-08-19 08:18:13', '2015-08-19 08:18:13'),
(26, 11, 4, '2015-08-20 03:59:55', '2015-08-20 03:59:55'),
(30, 1, 2, '2015-08-21 00:53:01', '2015-08-21 00:53:01'),
(32, 13, 6, '2015-08-26 18:14:22', '2015-08-26 18:14:22'),
(34, 12, 6, '2015-08-27 04:38:42', '2015-08-27 04:38:42'),
(37, 15, 6, '2015-08-31 01:17:50', '2015-08-31 01:17:50'),
(38, 14, 6, '2015-08-31 01:24:47', '2015-08-31 01:24:47'),
(44, 16, 2, '2015-08-31 01:59:52', '2015-08-31 01:59:52'),
(45, 17, 6, '2015-08-31 02:49:14', '2015-08-31 02:49:14');

-- --------------------------------------------------------

--
-- Table structure for table `site_settings`
--

CREATE TABLE IF NOT EXISTS `site_settings` (
  `id` int(10) unsigned NOT NULL,
  `site_name` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `tagline` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `comment_approve` tinyint(4) NOT NULL,
  `registration` tinyint(4) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `updated_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00'
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `sub_categories`
--

CREATE TABLE IF NOT EXISTS `sub_categories` (
  `id` bigint(20) unsigned NOT NULL,
  `category_id` bigint(20) NOT NULL,
  `name` varchar(200) COLLATE utf8_unicode_ci NOT NULL,
  `description` longtext COLLATE utf8_unicode_ci NOT NULL,
  `count` bigint(20) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `updated_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00'
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE IF NOT EXISTS `users` (
  `id` bigint(20) unsigned NOT NULL,
  `name` varchar(60) COLLATE utf8_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `password` varchar(60) COLLATE utf8_unicode_ci NOT NULL,
  `status` tinyint(4) NOT NULL DEFAULT '1',
  `banned` tinyint(4) NOT NULL DEFAULT '0',
  `banned_reason` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `remember_token` varchar(100) COLLATE utf8_unicode_ci DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `updated_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `avatar` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `is_admin` tinyint(4) NOT NULL DEFAULT '0',
  `description` text COLLATE utf8_unicode_ci NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `name`, `email`, `password`, `status`, `banned`, `banned_reason`, `remember_token`, `created_at`, `updated_at`, `avatar`, `is_admin`, `description`) VALUES
(1, 'Alice', 'alice@gmail.com', '$2y$10$5c9gXAHqMzW.cZ5zJB1HOOV2TlXGSjG1ZOoFYCAH9pCXFkAcg0wT2', 1, 0, '', 'dRYIKi8M3ZdtpaCbgEUK4VNadsFoTCoJwM5H3ZzVlkqClamLo2bRZbF3WTEs', '2015-08-11 03:02:05', '2015-08-13 04:54:29', '', 1, '"Jane Doe writes SEO articles for businesses that want to see their Google search rankings surge.(What she does.) Her articles have appeared in a number of e-zine sites, including EzineArticles.com, ArticlesBase.com, HubPages.com and TRCB.com. (Way to confirm her skills.) She contributes articles about SEO techniques regularly to Site-Reference Newletter.com. (Her experience level.) Her articles focus on balancing informative with SEO needs--but never at the expense of providing an entertaining read. (There''s the hook.) Learn more about how Jane''s SEO articles could grow your 					 business by visiting her blog at JaneDoeSEOArticlesBlog.com."'),
(2, 'Rumar Gibs', 'rumargibs@gmail.com', '$2y$10$Nc/3J.DXkhQxGZEs0cSJJOlEaF3wM2DJAHsDaOjQiQeRG13Nz4VjK', 1, 0, '', 'snlxYjOu3R2Wqam06FvQNusXGp4bXE7sb3oQqD02FegGjaGadVlbZZviFWQR', '2015-08-11 03:02:14', '2015-08-24 18:26:21', '', 1, '"Jane Doe writes SEO articles for businesses that want to see their Google search rankings surge.(What she does.) Her articles have appeared in a number of e-zine sites, including EzineArticles.com, ArticlesBase.com, HubPages.com and TRCB.com. (Way to confirm her skills.) She contributes articles about SEO techniques regularly to Site-Reference Newletter.com. (Her experience level.) Her articles focus on balancing informative with SEO needs--but never at the expense of providing an entertaining read. (There''s the hook.) Learn more about how Jane''s SEO articles could grow your 					 business by visiting her blog at JaneDoeSEOArticlesBlog.com."'),
(3, 'alice', 'alice2@gmail.com', '$2y$10$d0fIyl6yUyKpVhZg.I9ro.oYqwFLqRvYN83w0ds5uYaU4QzjkQkp.', 1, 0, '', 'EhQ2t7Zj2Z7aHDTYd1ig0xk4PajCBd6wDKrd91kDrQXV8o8Qxt9I7dK5sy2n', '2015-08-11 07:46:23', '2015-08-24 07:34:57', '', 0, '');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `categories`
--
ALTER TABLE `categories`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `comments`
--
ALTER TABLE `comments`
  ADD PRIMARY KEY (`id`),
  ADD KEY `comments_post_id_index` (`post_id`),
  ADD KEY `comments_parent_index` (`parent`);

--
-- Indexes for table `links`
--
ALTER TABLE `links`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `media_files`
--
ALTER TABLE `media_files`
  ADD PRIMARY KEY (`id`),
  ADD KEY `media_files_user_id_index` (`user_id`);

--
-- Indexes for table `password_resets`
--
ALTER TABLE `password_resets`
  ADD KEY `password_resets_email_index` (`email`),
  ADD KEY `password_resets_token_index` (`token`);

--
-- Indexes for table `posts`
--
ALTER TABLE `posts`
  ADD PRIMARY KEY (`id`),
  ADD KEY `status` (`status`);

--
-- Indexes for table `post_categories`
--
ALTER TABLE `post_categories`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `site_settings`
--
ALTER TABLE `site_settings`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `sub_categories`
--
ALTER TABLE `sub_categories`
  ADD PRIMARY KEY (`id`);

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
-- AUTO_INCREMENT for table `categories`
--
ALTER TABLE `categories`
  MODIFY `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=9;
--
-- AUTO_INCREMENT for table `comments`
--
ALTER TABLE `comments`
  MODIFY `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=70;
--
-- AUTO_INCREMENT for table `links`
--
ALTER TABLE `links`
  MODIFY `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT for table `media_files`
--
ALTER TABLE `media_files`
  MODIFY `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=39;
--
-- AUTO_INCREMENT for table `posts`
--
ALTER TABLE `posts`
  MODIFY `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=18;
--
-- AUTO_INCREMENT for table `post_categories`
--
ALTER TABLE `post_categories`
  MODIFY `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=46;
--
-- AUTO_INCREMENT for table `site_settings`
--
ALTER TABLE `site_settings`
  MODIFY `id` int(10) unsigned NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `sub_categories`
--
ALTER TABLE `sub_categories`
  MODIFY `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=4;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
