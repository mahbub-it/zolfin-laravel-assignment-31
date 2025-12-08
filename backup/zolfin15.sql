-- phpMyAdmin SQL Dump
-- version 5.2.1deb3
-- https://www.phpmyadmin.net/
--
-- Host: localhost:3306
-- Generation Time: Dec 08, 2025 at 09:16 AM
-- Server version: 8.0.44-0ubuntu0.24.04.1
-- PHP Version: 8.4.15

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `zolfin15`
--

-- --------------------------------------------------------

--
-- Table structure for table `categories`
--

CREATE TABLE `categories` (
  `id` bigint UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `slug` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `categories`
--

INSERT INTO `categories` (`id`, `name`, `slug`, `created_at`, `updated_at`) VALUES
(1, 'Equatorial Guinea', 'eos-quae-ut-dicta-qui-rerum', NULL, NULL),
(2, 'United States Minor Outlying Islands', 'eum-deleniti-aperiam-est', NULL, NULL),
(3, 'El Salvador', 'assumenda-odio-quia-expedita', NULL, NULL),
(4, 'Liechtenstein', 'qui-corporis-porro-optio-est-quas-velit-eum-pariatur', NULL, NULL),
(5, 'Dominica', 'iste-quas-et-qui-dolor-hic', NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `failed_jobs`
--

CREATE TABLE `failed_jobs` (
  `id` bigint UNSIGNED NOT NULL,
  `uuid` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `connection` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `queue` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `payload` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `exception` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `failed_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `migrations`
--

CREATE TABLE `migrations` (
  `id` int UNSIGNED NOT NULL,
  `migration` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `batch` int NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `migrations`
--

INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES
(1, '2014_10_12_000000_create_users_table', 1),
(2, '2014_10_12_100000_create_password_resets_table', 1),
(3, '2019_08_19_000000_create_failed_jobs_table', 1),
(4, '2019_12_14_000001_create_personal_access_tokens_table', 1),
(5, '2022_04_21_164559_create_posts_table', 1),
(6, '2022_04_21_164943_create_categories_table', 1),
(7, '2022_04_22_040758_alter_users_table', 1),
(8, '2022_04_22_171120_table_posts_table', 1),
(9, '2025_12_03_154605_create_add_photo_column_table', 1);

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
-- Table structure for table `personal_access_tokens`
--

CREATE TABLE `personal_access_tokens` (
  `id` bigint UNSIGNED NOT NULL,
  `tokenable_type` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `tokenable_id` bigint UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(64) COLLATE utf8mb4_unicode_ci NOT NULL,
  `abilities` text COLLATE utf8mb4_unicode_ci,
  `last_used_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `posts`
--

CREATE TABLE `posts` (
  `id` bigint UNSIGNED NOT NULL,
  `title` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `excerpt` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `slug` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `content` text COLLATE utf8mb4_unicode_ci,
  `thumbnail` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `user_id` bigint UNSIGNED NOT NULL,
  `category_id` bigint UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `views` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `posts`
--

INSERT INTO `posts` (`id`, `title`, `excerpt`, `slug`, `content`, `thumbnail`, `user_id`, `category_id`, `created_at`, `updated_at`, `views`) VALUES
(1, 'Mary Ann, what ARE.', 'Voluptatem magnam sunt aut exercitationem velit rerum. Voluptas saepe quae at rem voluptatem deserunt molestiae. Quia ea quisquam nam vero sed omnis veritatis. Quis quia corrupti sequi. Sapiente laudantium odio consequatur est. Ullam at est rerum et quas pariatur corrupti. Veniam doloremque numquam explicabo. Et ea fuga qui nisi. Et iusto voluptatum fugiat.', 'et-et-similique-mollitia-perspiciatis', 'Porro quos doloribus et.', 'https://via.placeholder.com/1000x600.png/000033?text=aut', 3, 5, '2025-12-07 19:28:08', NULL, '3200'),
(2, 'Caterpillar. \'Is.', 'Illum sed commodi possimus quis dolor. Velit architecto ut enim incidunt quia sed molestiae. Velit ad vel voluptas sint. Nam rem autem rem qui hic perferendis quisquam. Laborum et officiis qui aspernatur neque aut laudantium. Ducimus ea aut eum fugiat. Debitis minima iusto itaque. Iusto voluptatem aut ducimus harum. Velit ipsam eius aut praesentium sunt autem et. Ea animi earum quia deleniti. Ipsam ut et ipsa accusantium laborum. Laboriosam deleniti officiis id iste cumque. Sit sunt voluptatum ratione est sint.', 'fugit-reprehenderit-amet-nulla-dolor', 'Distinctio quia eum eaque.', 'https://via.placeholder.com/1000x600.png/000077?text=veritatis', 4, 4, '2025-12-07 19:28:08', NULL, '2033'),
(3, 'I was sent for.\'.', 'Eligendi et dolorem distinctio nemo. Explicabo nobis similique eligendi suscipit. Unde reiciendis error voluptatem culpa. Molestiae velit quia ducimus sed aut similique odio. Ullam aut possimus incidunt non incidunt et odit odit. Eius natus cum earum delectus. Maiores eligendi nesciunt voluptatem ut explicabo ut ut voluptas.', 'amet-voluptas-dolores-soluta-aliquid-aut-consequatur', 'Ullam eum nesciunt omnis.', 'https://via.placeholder.com/1000x600.png/0099cc?text=deleniti', 5, 2, '2025-12-07 19:28:08', NULL, '199'),
(4, 'Mock Turtle Soup.', 'Facilis eos molestias hic a nam. Totam est voluptas aut sint provident molestiae. Cumque animi sint quis. Vel aut rerum mollitia occaecati. Velit odit nisi ipsum et. Consequatur sit ut et porro consequuntur. Laudantium vitae rem cum inventore non voluptas ut. Nemo nemo ipsa sit a explicabo impedit amet. Eum saepe aliquid fuga magni.', 'voluptatem-quidem-et-aperiam-ipsa-numquam-quia', 'Dicta aut vel repellendus.', 'https://via.placeholder.com/1000x600.png/003344?text=qui', 3, 1, '2025-12-07 19:28:09', NULL, '2842'),
(5, 'The moment Alice.', 'Consectetur perspiciatis asperiores error inventore quos laudantium quo. Qui nulla minima occaecati ipsa voluptatem reiciendis. Labore in dolor quis repudiandae. Consequuntur et cupiditate expedita et ut quas voluptas. Corrupti quis et veniam quae hic. Incidunt perspiciatis quis aut autem corporis nam. Vitae repellat non sint impedit consequatur eos.', 'et-voluptate-delectus-at-qui-enim-quas', 'Et minima laborum quam saepe.', 'https://via.placeholder.com/1000x600.png/0033bb?text=consequatur', 4, 3, '2025-12-07 19:28:09', NULL, '1371'),
(6, 'Do come back in a.', 'Unde qui nulla id voluptatem. Ut illo maiores non ad accusantium possimus qui. Repellendus adipisci alias quas corrupti quisquam et adipisci. Eius qui unde quia et atque amet nihil consequatur. Laboriosam dolore et soluta eum ut debitis rem. Reprehenderit minus omnis ipsam odio repellat in impedit. Quasi laborum ipsum molestiae. Similique qui accusantium repellendus sit et sed eos sit. Eos accusamus incidunt est qui amet. Non aut in ipsa excepturi dolor iure qui. Placeat veritatis nam illo. Cupiditate dolor mollitia est ut quod perspiciatis. Nisi enim consequuntur aliquid beatae.', 'autem-vitae-expedita-ipsum-vel-odio-est-quisquam', 'Quas perferendis fugiat ut.', 'https://via.placeholder.com/1000x600.png/0066aa?text=molestiae', 1, 5, '2025-12-07 19:28:09', NULL, '2856'),
(7, 'Caterpillar. \'I\'m.', 'Asperiores ut commodi repellat fuga quia quidem cumque. Quia modi expedita ratione error aut laboriosam. Voluptatem quia est eveniet ab doloribus. Voluptate quidem vero quod. In consequatur sit enim impedit qui accusamus minima recusandae. Non vel recusandae dicta amet suscipit. Voluptates aperiam neque qui occaecati et maiores. Ut quibusdam vel autem omnis earum. Animi modi ut labore. Deserunt aut inventore odio reprehenderit. Qui qui dolores id quo. Magni omnis ullam eum. Necessitatibus atque explicabo aliquid. Adipisci dolores rem tempora fuga veritatis natus.', 'cum-in-sint-et-ea', 'Numquam aut sed vero a.', 'https://via.placeholder.com/1000x600.png/000022?text=error', 5, 2, '2025-12-07 19:28:09', NULL, '2715'),
(8, 'Mock Turtle, and.', 'Omnis et distinctio voluptatem provident cumque veniam. Est nemo placeat aut quo quae. Quam nulla libero alias autem iure. Atque blanditiis quae sequi esse aut aut. Autem ea adipisci temporibus temporibus earum voluptas. Aut voluptatum totam saepe nobis voluptas quo et ut. Atque excepturi quidem sit eaque et consectetur enim. Provident quasi eos nulla sequi deleniti accusamus. Consequatur eum molestiae autem quisquam. Architecto iste quia maiores. Explicabo voluptas ut magnam et et temporibus cumque. Vel odio aliquam eius quas.', 'iure-incidunt-ratione-quo-magni-dolorem', 'Et itaque aut tempore sit ut.', 'https://via.placeholder.com/1000x600.png/00aa66?text=cupiditate', 5, 4, '2025-12-07 19:28:09', NULL, '682'),
(9, 'Alice, who had got.', 'Inventore est error aperiam hic voluptatum alias voluptas hic. Provident explicabo dolorem ut eos illo distinctio. Odio excepturi sint voluptatibus maiores error eaque. Perferendis et quae quas impedit suscipit labore. Minus neque eos eveniet aut adipisci et. Et nesciunt possimus alias molestias quod nobis a. Qui quasi quos autem veritatis tenetur sed sunt. Voluptatem magnam modi saepe accusamus itaque iusto cum. Eligendi ea et reprehenderit qui. Facilis quis ab voluptatem soluta consequatur.', 'quia-incidunt-architecto-dolores-enim-occaecati-impedit-voluptate', 'Eos fugit eligendi hic quia.', 'https://via.placeholder.com/1000x600.png/002211?text=et', 5, 1, '2025-12-07 19:28:09', NULL, '927'),
(10, 'They are waiting.', 'Aspernatur aut quia incidunt saepe totam. Reprehenderit eius qui et autem. Iste qui quis et voluptates tempore atque. Consectetur ut et repellat est est aut. Reiciendis qui sapiente ipsum dolor libero. Magni iste repudiandae ipsam accusantium deserunt accusantium. Animi sed et dolorum et accusantium possimus molestias. Exercitationem sint non molestiae neque earum quos. Enim non sunt ipsum voluptatem necessitatibus. Minima error aut animi possimus ipsum.', 'asperiores-fuga-qui-id-ullam-nostrum', 'Unde tempora non et unde.', 'https://via.placeholder.com/1000x600.png/00bbcc?text=distinctio', 1, 2, '2025-12-07 19:28:09', NULL, '376');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` bigint UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `username` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `photo` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `password` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `name`, `username`, `photo`, `email`, `email_verified_at`, `password`, `remember_token`, `created_at`, `updated_at`) VALUES
(1, 'Jonathan Lehner', 'elouise68', 'https://via.placeholder.com/100x100.png/003388?text=totam', 'bmitchell@example.org', NULL, '$2y$10$ftF/6OZP61urs4GMOE9sJeaOUJetjSTnswfCoz/WCzuPoiOYEnn5W', NULL, NULL, NULL),
(2, 'Prof. Alyson McCullough', 'sylvester.damore', 'https://via.placeholder.com/100x100.png/0033bb?text=qui', 'lucy90@example.org', NULL, '$2y$10$qWZ8ld0dAYBawAPO5IhsHeYu0o2A6Siof3bdQvvjkYwhoBaM/6Woq', NULL, NULL, NULL),
(3, 'Wilfred Fritsch', 'wcarter', 'https://via.placeholder.com/100x100.png/009988?text=sed', 'corkery.palma@example.org', NULL, '$2y$10$IzI7lvqDyU/ul4mrB79xreIjzfjAhS0VPh86HbYzawge5lPn1b97q', NULL, NULL, NULL),
(4, 'Montana Bashirian', 'garett56', 'https://via.placeholder.com/100x100.png/004499?text=inventore', 'hyatt.green@example.com', NULL, '$2y$10$Ljg/JkO7cSPKWFGpaagAP.WhN5qt6.tHX2yus091sx82jZMZkmxb2', NULL, NULL, NULL),
(5, 'Toney Lebsack', 'creilly', 'https://via.placeholder.com/100x100.png/002288?text=voluptatem', 'orn.albertha@example.org', NULL, '$2y$10$NkHprRsA6wjKyAy8x0mW8O/1lWrRRVl99EIfboV3bo/TCc2n/K.yK', NULL, NULL, NULL),
(6, 'Dorothea Herman', 'rylan.roberts', 'https://via.placeholder.com/100x100.png/003377?text=atque', 'gislason.keith@example.org', NULL, '$2y$10$lUnR/yYD0Z6r3HgNm3MLDuN52L2DBXX4ecNxLXDUNdVbrKcrGFIci', NULL, NULL, NULL),
(7, 'Ned Koch', 'kupton', 'https://via.placeholder.com/100x100.png/0066cc?text=quia', 'floyd.roberts@example.org', NULL, '$2y$10$IrREwo3LdDCus4mdGMA8y.MgMnU35wgh7f3zVa7A0tZd5ykArEtCq', NULL, NULL, NULL),
(8, 'Jamie Barrows', 'stoltenberg.matt', 'https://via.placeholder.com/100x100.png/006611?text=aut', 'jewel64@example.com', NULL, '$2y$10$IHyXvMneeZX15QKejUFhCOMvordfw0NGT2w2TwXDODzql0W8Lr/QO', NULL, NULL, NULL),
(9, 'Marquise Gerlach', 'armani65', 'https://via.placeholder.com/100x100.png/0044aa?text=culpa', 'doyle72@example.net', NULL, '$2y$10$JjKsaAyVr081D4mHDqwGNObFp5a1uWNU9xWYlpEzAUAp1VdIEYfvW', NULL, NULL, NULL),
(10, 'Robb Ondricka', 'cfeest', 'https://via.placeholder.com/100x100.png/00dd88?text=aliquid', 'renner.dee@example.org', NULL, '$2y$10$DPC6wUiC78D4vb2iQQxcl./1MPtfMCooHQHL1y8Mri2sbBOAWanRy', NULL, NULL, NULL),
(11, 'mahbub', 'mahbub', 'https://placehold.co/', 'bdsmrahman@gmail.com', NULL, '$2y$10$.lLFPo.A2JXDcxDM3cBCauebMbrm9mx5lKqzfn9CxDQhTK9f35OL2', NULL, '2025-12-08 08:40:47', '2025-12-08 08:40:47');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `categories`
--
ALTER TABLE `categories`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `failed_jobs_uuid_unique` (`uuid`);

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
-- Indexes for table `personal_access_tokens`
--
ALTER TABLE `personal_access_tokens`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `personal_access_tokens_token_unique` (`token`),
  ADD KEY `personal_access_tokens_tokenable_type_tokenable_id_index` (`tokenable_type`,`tokenable_id`);

--
-- Indexes for table `posts`
--
ALTER TABLE `posts`
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
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `personal_access_tokens`
--
ALTER TABLE `personal_access_tokens`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `posts`
--
ALTER TABLE `posts`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
