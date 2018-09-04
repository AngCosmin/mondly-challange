-- phpMyAdmin SQL Dump
-- version 4.5.4.1deb2ubuntu2
-- http://www.phpmyadmin.net
--
-- Host: localhost
-- Generation Time: 04 Sep 2018 la 23:44
-- Versiune server: 5.7.22-0ubuntu0.16.04.1
-- PHP Version: 7.1.18-1+ubuntu16.04.1+deb.sury.org+1

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `mondly`
--

-- --------------------------------------------------------

--
-- Structura de tabel pentru tabelul `languages`
--

CREATE TABLE `languages` (
  `id` int(10) UNSIGNED NOT NULL,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `short_code` varchar(2) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `is_supported` tinyint(4) NOT NULL DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Salvarea datelor din tabel `languages`
--

INSERT INTO `languages` (`id`, `name`, `short_code`, `is_supported`) VALUES
(1, 'English', 'en', 1),
(2, 'Afar', 'aa', 1),
(3, 'Abkhazian', 'ab', 1),
(4, 'Afrikaans', 'af', 1),
(5, 'Amharic', 'am', 1),
(6, 'Arabic', 'ar', 1),
(7, 'Assamese', 'as', 1),
(8, 'Aymara', 'ay', 1),
(9, 'Azerbaijani', 'az', 1),
(10, 'Bashkir', 'ba', 1),
(11, 'Belarusian', 'be', 1),
(12, 'Bulgarian', 'bg', 1),
(13, 'Bihari', 'bh', 1),
(14, 'Bislama', 'bi', 1),
(15, 'Bengali/Bangla', 'bn', 1),
(16, 'Tibetan', 'bo', 1),
(17, 'Breton', 'br', 1),
(18, 'Catalan', 'ca', 1),
(19, 'Corsican', 'co', 1),
(20, 'Czech', 'cs', 1),
(21, 'Welsh', 'cy', 1),
(22, 'Danish', 'da', 1),
(23, 'German', 'de', 1),
(24, 'Bhutani', 'dz', 1),
(25, 'Greek', 'el', 1),
(26, 'Esperanto', 'eo', 1),
(27, 'Spanish', 'es', 1),
(28, 'Estonian', 'et', 1),
(29, 'Basque', 'eu', 1),
(30, 'Persian', 'fa', 1),
(31, 'Finnish', 'fi', 1),
(32, 'Fiji', 'fj', 1),
(33, 'Faeroese', 'fo', 1),
(34, 'French', 'fr', 1),
(35, 'Frisian', 'fy', 1),
(36, 'Irish', 'ga', 1),
(37, 'Scots/Gaelic', 'gd', 1),
(38, 'Galician', 'gl', 1),
(39, 'Guarani', 'gn', 1),
(40, 'Gujarati', 'gu', 1),
(41, 'Hausa', 'ha', 1),
(42, 'Hindi', 'hi', 1),
(43, 'Croatian', 'hr', 1),
(44, 'Hungarian', 'hu', 1),
(45, 'Armenian', 'hy', 1),
(46, 'Interlingua', 'ia', 1),
(47, 'Interlingue', 'ie', 1),
(48, 'Inupiak', 'ik', 1),
(49, 'Indonesian', 'in', 1),
(50, 'Icelandic', 'is', 1),
(51, 'Italian', 'it', 1),
(52, 'Hebrew', 'iw', 1),
(53, 'Japanese', 'ja', 1),
(54, 'Yiddish', 'ji', 1),
(55, 'Javanese', 'jw', 1),
(56, 'Georgian', 'ka', 1),
(57, 'Kazakh', 'kk', 1),
(58, 'Greenlandic', 'kl', 1),
(59, 'Cambodian', 'km', 1),
(60, 'Kannada', 'kn', 1),
(61, 'Korean', 'ko', 1),
(62, 'Kashmiri', 'ks', 1),
(63, 'Kurdish', 'ku', 1),
(64, 'Kirghiz', 'ky', 1),
(65, 'Latin', 'la', 1),
(66, 'Lingala', 'ln', 1),
(67, 'Laothian', 'lo', 1),
(68, 'Lithuanian', 'lt', 1),
(69, 'Latvian/Lettish', 'lv', 1),
(70, 'Malagasy', 'mg', 1),
(71, 'Maori', 'mi', 1),
(72, 'Macedonian', 'mk', 1),
(73, 'Malayalam', 'ml', 1),
(74, 'Mongolian', 'mn', 1),
(75, 'Moldavian', 'mo', 1),
(76, 'Marathi', 'mr', 1),
(77, 'Malay', 'ms', 1),
(78, 'Maltese', 'mt', 1),
(79, 'Burmese', 'my', 1),
(80, 'Nauru', 'na', 1),
(81, 'Nepali', 'ne', 1),
(82, 'Dutch', 'nl', 1),
(83, 'Norwegian', 'no', 1),
(84, 'Occitan', 'oc', 1),
(85, '(Afan)/Oromoor/Oriya', 'om', 1),
(86, 'Punjabi', 'pa', 1),
(87, 'Polish', 'pl', 1),
(88, 'Pashto/Pushto', 'ps', 1),
(89, 'Portuguese', 'pt', 1),
(90, 'Quechua', 'qu', 1),
(91, 'Rhaeto-Romance', 'rm', 1),
(92, 'Kirundi', 'rn', 1),
(93, 'Romanian', 'ro', 1),
(94, 'Russian', 'ru', 1),
(95, 'Kinyarwanda', 'rw', 1),
(96, 'Sanskrit', 'sa', 1),
(97, 'Sindhi', 'sd', 1),
(98, 'Sangro', 'sg', 1),
(99, 'Serbo-Croatian', 'sh', 1),
(100, 'Singhalese', 'si', 1),
(101, 'Slovak', 'sk', 1),
(102, 'Slovenian', 'sl', 1),
(103, 'Samoan', 'sm', 1),
(104, 'Shona', 'sn', 1),
(105, 'Somali', 'so', 1),
(106, 'Albanian', 'sq', 1),
(107, 'Serbian', 'sr', 1),
(108, 'Siswati', 'ss', 1),
(109, 'Sesotho', 'st', 1),
(110, 'Sundanese', 'su', 1),
(111, 'Swedish', 'sv', 1),
(112, 'Swahili', 'sw', 1),
(113, 'Tamil', 'ta', 1),
(114, 'Telugu', 'te', 1),
(115, 'Tajik', 'tg', 1),
(116, 'Thai', 'th', 1),
(117, 'Tigrinya', 'ti', 1),
(118, 'Turkmen', 'tk', 1),
(119, 'Tagalog', 'tl', 1),
(120, 'Setswana', 'tn', 1),
(121, 'Tonga', 'to', 1),
(122, 'Turkish', 'tr', 1),
(123, 'Tsonga', 'ts', 1),
(124, 'Tatar', 'tt', 1),
(125, 'Twi', 'tw', 1),
(126, 'Ukrainian', 'uk', 1),
(127, 'Urdu', 'ur', 1),
(128, 'Uzbek', 'uz', 1),
(129, 'Vietnamese', 'vi', 1),
(130, 'Volapuk', 'vo', 1),
(131, 'Wolof', 'wo', 1),
(132, 'Xhosa', 'xh', 1),
(133, 'Yoruba', 'yo', 1),
(134, 'Chinese', 'zh', 1),
(135, 'Zulu', 'zu', 1);

-- --------------------------------------------------------

--
-- Structura de tabel pentru tabelul `migrations`
--

CREATE TABLE `migrations` (
  `id` int(10) UNSIGNED NOT NULL,
  `migration` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `batch` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Salvarea datelor din tabel `migrations`
--

INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES
(1, '2014_10_12_000000_create_users_table', 1),
(2, '2014_10_12_100000_create_password_resets_table', 1),
(3, '2018_04_20_200732_create_rooms', 2),
(4, '2018_04_20_201611_create_languages', 3),
(5, '2018_04_20_202137_add_foreigns_rooms', 4),
(6, '2018_04_20_214130_add_slug_rooms', 5),
(7, '2018_04_20_214554_add_status_rooms', 6),
(8, '2018_04_20_215106_add_created_and_updated_rooms', 7),
(9, '2018_04_21_074714_support_language', 8),
(10, '2018_04_21_092034_game_mods', 9),
(11, '2018_04_21_093010_words_and_phrases', 9),
(12, '2018_04_21_151707_user_totatl_points', 10),
(14, '2018_04_21_160944_online_users', 11);

-- --------------------------------------------------------

--
-- Structura de tabel pentru tabelul `password_resets`
--

CREATE TABLE `password_resets` (
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Structura de tabel pentru tabelul `phrases`
--

CREATE TABLE `phrases` (
  `id` int(10) UNSIGNED NOT NULL,
  `phrase` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Salvarea datelor din tabel `phrases`
--

INSERT INTO `phrases` (`id`, `phrase`) VALUES
(1, 'I need a tooth extracted'),
(2, 'I have a loose tooth'),
(3, 'I may have a cavity'),
(4, 'I would like an x-ray'),
(5, 'I would like nitrous oxide');

-- --------------------------------------------------------

--
-- Structura de tabel pentru tabelul `rooms`
--

CREATE TABLE `rooms` (
  `id` int(10) UNSIGNED NOT NULL,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `slug` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `known_language` int(10) UNSIGNED DEFAULT NULL,
  `foreign_language` int(10) UNSIGNED DEFAULT NULL,
  `online` int(11) NOT NULL DEFAULT '0',
  `max_players` int(11) NOT NULL DEFAULT '2',
  `status` enum('open','password_protect','in_progress','finished') COLLATE utf8mb4_unicode_ci NOT NULL,
  `game_mode` enum('TRANSLATE_W','TRANSLATE_P','PICTURE') COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'TRANSLATE_W',
  `created_by` int(10) UNSIGNED DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Salvarea datelor din tabel `rooms`
--

INSERT INTO `rooms` (`id`, `name`, `slug`, `known_language`, `foreign_language`, `online`, `max_players`, `status`, `game_mode`, `created_by`, `created_at`, `updated_at`) VALUES
(9, 'asdsa', 'words-171', 1, 93, 0, 2, 'open', 'TRANSLATE_W', 1, '2018-04-21 04:48:42', '2018-04-21 13:03:53'),
(11, 'pictures', 'pictures-725', 93, 1, 0, 2, 'open', 'PICTURE', 1, '2018-04-21 14:13:31', '2018-04-23 14:02:08'),
(12, 'asds', 'asds-323', 1, 34, 0, 2, 'open', 'TRANSLATE_W', 1, '2018-04-21 16:08:39', '2018-04-23 14:03:08'),
(13, 'ioana', 'ioana-551', 1, 65, 0, 2, 'open', 'TRANSLATE_W', 2, '2018-04-22 09:59:42', '2018-04-23 14:03:02'),
(14, 'aizer', 'aizer-822', 1, 29, 0, 2, 'open', 'TRANSLATE_W', 2, '2018-04-22 14:03:00', '2018-04-26 06:23:19');

-- --------------------------------------------------------

--
-- Structura de tabel pentru tabelul `users`
--

CREATE TABLE `users` (
  `id` int(10) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `total_points` int(11) NOT NULL DEFAULT '0',
  `password` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Salvarea datelor din tabel `users`
--

INSERT INTO `users` (`id`, `name`, `email`, `total_points`, `password`, `remember_token`, `created_at`, `updated_at`) VALUES
(1, 'Cosmin', 'cosminzorr@gmail.com', 150, '$2y$10$Tkm7PQqx86dFEFdjNV0BLuFX0EhtZGAUGK9rAXiyzP5uSWlJ.DO2C', 'vonaTKPXwGDQSH3hZ6bEtElNeUxZpc2Ywp9eBb2L21nLTsHXKKK1di8fBLmU', '2018-04-20 16:11:13', '2018-04-26 06:23:01'),
(2, 'Martin', 'martin@gmail.com', 10, '$2y$10$EHCTXFkODxtkDzvJpc/NNOhBJvVTm/cmCUo23zIEbpM/ZbzaeAy1i', NULL, '2018-04-21 06:33:23', '2018-04-22 09:59:59');

-- --------------------------------------------------------

--
-- Structura de tabel pentru tabelul `words`
--

CREATE TABLE `words` (
  `id` int(10) UNSIGNED NOT NULL,
  `word` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `picture` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Salvarea datelor din tabel `words`
--

INSERT INTO `words` (`id`, `word`, `picture`) VALUES
(1, 'apple', 'apple.jpg'),
(2, 'banana', 'banana.jpg'),
(3, 'truck', 'truck.jpg'),
(4, 'plane', 'plane.jpg'),
(5, 'dog', 'dog.jpg'),
(6, 'bear', 'bear.jpg'),
(7, 'city', 'city.jpg'),
(8, 'roof', 'roof.jpg'),
(9, 'cow', 'cow.jpg'),
(10, 'table', 'table.jpg');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `languages`
--
ALTER TABLE `languages`
  ADD PRIMARY KEY (`id`);

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
-- Indexes for table `phrases`
--
ALTER TABLE `phrases`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `rooms`
--
ALTER TABLE `rooms`
  ADD PRIMARY KEY (`id`),
  ADD KEY `rooms_created_by_foreign` (`created_by`),
  ADD KEY `rooms_known_language_foreign` (`known_language`),
  ADD KEY `rooms_foreign_language_foreign` (`foreign_language`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `users_email_unique` (`email`);

--
-- Indexes for table `words`
--
ALTER TABLE `words`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `languages`
--
ALTER TABLE `languages`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=136;
--
-- AUTO_INCREMENT for table `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;
--
-- AUTO_INCREMENT for table `phrases`
--
ALTER TABLE `phrases`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;
--
-- AUTO_INCREMENT for table `rooms`
--
ALTER TABLE `rooms`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;
--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT for table `words`
--
ALTER TABLE `words`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;
--
-- Restrictii pentru tabele sterse
--

--
-- Restrictii pentru tabele `rooms`
--
ALTER TABLE `rooms`
  ADD CONSTRAINT `rooms_created_by_foreign` FOREIGN KEY (`created_by`) REFERENCES `users` (`id`),
  ADD CONSTRAINT `rooms_foreign_language_foreign` FOREIGN KEY (`foreign_language`) REFERENCES `languages` (`id`),
  ADD CONSTRAINT `rooms_known_language_foreign` FOREIGN KEY (`known_language`) REFERENCES `languages` (`id`);

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
