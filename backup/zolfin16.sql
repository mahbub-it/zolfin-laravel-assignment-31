-- phpMyAdmin SQL Dump
-- version 5.2.3
-- https://www.phpmyadmin.net/
--
-- Host: localhost
-- Generation Time: Dec 14, 2025 at 10:16 PM
-- Server version: 8.0.44-0ubuntu0.24.04.2
-- PHP Version: 8.4.15

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `zolfin16`
--

-- --------------------------------------------------------

--
-- Table structure for table `categories`
--

CREATE TABLE `categories` (
  `id` bigint UNSIGNED NOT NULL,
  `name` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `slug` text CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `categories`
--

INSERT INTO `categories` (`id`, `name`, `slug`, `created_at`, `updated_at`) VALUES
(1, 'Faroe Islands', 'similique-dolorum-molestias-sed-aut-hic-ut-omnis-incidunt', NULL, NULL),
(2, 'Faroe Islands', 'exercitationem-harum-eligendi-rerum-tempore', NULL, NULL),
(3, 'Djibouti', 'molestiae-illo-aspernatur-voluptatem-sit-voluptas-nobis-facilis', NULL, NULL),
(4, 'Isle of Man', 'nesciunt-dicta-animi-dolore-corporis-voluptatem-eos', NULL, NULL),
(5, 'Ethiopia', 'consequatur-fuga-quia-sed-aut-inventore', NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `failed_jobs`
--

CREATE TABLE `failed_jobs` (
  `id` bigint UNSIGNED NOT NULL,
  `uuid` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `connection` text CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `queue` text CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `payload` longtext CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `exception` longtext CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `failed_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `migrations`
--

CREATE TABLE `migrations` (
  `id` int UNSIGNED NOT NULL,
  `migration` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
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
  `email` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `personal_access_tokens`
--

CREATE TABLE `personal_access_tokens` (
  `id` bigint UNSIGNED NOT NULL,
  `tokenable_type` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `tokenable_id` bigint UNSIGNED NOT NULL,
  `name` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(64) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `abilities` text CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci,
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
  `title` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `excerpt` text CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `slug` text CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `content` text CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci,
  `thumbnail` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `user_id` bigint UNSIGNED NOT NULL,
  `category_id` bigint UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `views` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `posts`
--

INSERT INTO `posts` (`id`, `title`, `excerpt`, `slug`, `content`, `thumbnail`, `user_id`, `category_id`, `created_at`, `updated_at`, `views`) VALUES
(1, 'The Rabbit Sends. 2222', '222222222222 Veritatis dolorem neque velit atque. Nesciunt quas porro rerum adipisci nihil cum nesciunt. Numquam pariatur aperiam necessitatibus et odio. Doloremque quas atque mollitia rerum aut rerum. Assumenda consectetur omnis est ipsam quibusdam. Et id earum quod consectetur eius rem sed. Sunt pariatur ut est sed. In fugiat molestiae est amet minima a. Aperiam atque quis voluptas dolores consequatur. Soluta eligendi placeat fugiat ex nihil in. Ut non in facilis cumque corporis cupiditate mollitia. Aut occaecati distinctio autem veritatis aut. Quos est ut nam libero corporis praesentium ab. Facilis blanditiis aut non nesciunt et. Nihil nulla voluptatem dicta velit quae porro et.', 'atque-voluptatem-ex-dolorem-magni-similique-fugit', '222222222222222 Illum ullam et pariatur.', 'https://placehold.co/600x400', 4, 3, '2025-12-11 06:59:09', '2025-12-14 22:14:46', '2911'),
(2, 'There was no more.1', '1111111111    Qui maiores ipsum itaque beatae sit. Reprehenderit laudantium autem repellendus. Ratione aut rerum voluptate tempore et voluptas. Harum atque suscipit quo dolor accusamus eum sint. Pariatur adipisci incidunt ipsum facere eius sit officiis. Id voluptas molestiae mollitia rerum. Quaerat repellendus repellat alias voluptate molestiae natus. Officia et sit et ab eligendi. Est corporis optio non quos voluptate. Amet ex fuga non id. Ut dolor vitae aut aut totam. Ratione itaque sapiente aliquam voluptatem qui molestias veniam. Nam et magnam sed laboriosam veritatis ullam expedita autem. Quos aut amet maxime ducimus dignissimos possimus.', 'ea-est-eos-repellendus-consequatur-laborum-eos', 'Magni id dolorem aut.', 'https://placehold.co/600x400', 4, 4, '2025-12-11 06:59:09', '2025-12-14 22:11:14', '1755'),
(3, 'Mock Turtle said.', 'Quia praesentium minima rerum qui necessitatibus quisquam. Sunt tempore est fugiat maiores sit fugit voluptatem. Aut excepturi cumque maiores exercitationem. Ut voluptate delectus tempora omnis odit ipsa dolor. Sint qui nulla beatae magnam qui aut. Quo architecto molestiae veniam voluptatem. Ut dignissimos laudantium et rem ut totam ut. Voluptatibus nemo non doloremque quibusdam. Qui molestiae maxime suscipit sit necessitatibus illo molestias. Eum et cumque totam ipsa quia deleniti.', 'exercitationem-tenetur-quia-ducimus-quaerat-tempore-ut', 'Autem nemo et itaque.', 'https://placehold.co/600x400', 4, 1, '2025-12-11 06:59:09', NULL, '3648'),
(4, 'Hatter hurriedly.', 'lorem is good for all, epellat nobis. Omnis excepturi assumenda sunt facere voluptas. Voluptas et reiciendis recusandae illum aspernatur vel. Et tempora nesciunt corporis. Pariatur similique aut debitis voluptatem. Omnis dolorum ipsa eos nesciunt. Dolor modi ipsa itaque et vero. Voluptatem cupiditate nam alias aliquam. Enim quo magnam unde iure sit officiis. Quidem dolores quam repudiandae perferendis sint laborum voluptatem. Natus sit sint officia autem id veniam recusandae velit. Quidem facere iure minus nam vitae tempore et. Doloremque eos doloremque repudiandae ex molestiae et.', 'nulla-eum-enim-ut-autem', 'Dolor vitae omnis quo fuga.', 'https://placehold.co/600x400', 1, 3, '2025-12-11 06:59:09', '2025-12-14 22:06:39', '2460'),
(5, 'I never heard of.', 'Maiores error sunt autem illum dolores voluptates aspernatur. Placeat rem optio est unde. Veniam laboriosam aperiam id modi et magnam adipisci debitis. Debitis in voluptatum maiores voluptatum adipisci ad. Deserunt corrupti qui ab cum nesciunt eum earum. Consequatur esse cupiditate deleniti id culpa adipisci. Necessitatibus veritatis culpa vero repellat beatae voluptatum sit dolor. Vero et quos non sunt nihil. Nihil quas maiores aperiam cupiditate optio molestiae. Rerum esse omnis tempora autem mollitia. Dolorum a beatae doloremque praesentium nihil.', 'neque-id-blanditiis-aut-sit-nobis-fuga', 'Eum numquam quidem et porro.', 'https://placehold.co/600x400', 4, 1, '2025-12-11 06:59:09', NULL, '3767'),
(6, 'It was opened by.', 'Quis ipsa perferendis eum qui est ut velit. Qui quia facere nemo provident quae est qui. Alias ipsum et nemo. Et optio temporibus aliquam vel magni est sunt. Enim reprehenderit cumque velit et. Commodi numquam reprehenderit hic. Et in et aut. Provident accusantium omnis assumenda quas dolorem quis molestias. Saepe dolores quas beatae sapiente voluptas. Vero necessitatibus ipsa eveniet et sit quia.', 'placeat-earum-quia-tempore-est', 'Et quia sint velit officia.', 'https://placehold.co/600x400', 1, 2, '2025-12-11 06:59:09', NULL, '177'),
(7, 'For instance, if.', 'Officiis autem hic hic praesentium quo. Consequatur voluptate quae dolorem omnis aspernatur praesentium architecto facere. Odio labore rerum sint. Asperiores unde suscipit et at eos. Aut quod quo quasi itaque quia vel laboriosam. Sint ratione maxime iure assumenda et. Omnis deserunt excepturi provident rem officia. Odio nesciunt aliquam dolor.', 'rerum-id-molestiae-blanditiis-et-dolorum', 'Sint est adipisci sed.', 'https://placehold.co/600x400', 3, 1, '2025-12-11 06:59:09', NULL, '113'),
(8, 'English); \'now I\'m.', 'Laboriosam impedit aut harum nobis excepturi voluptates maiores. Perferendis eum ut atque rerum et deserunt consequatur debitis. Dolorem laborum non eaque tenetur sunt. Quod iure maxime eius repellendus. At ab et odio aut at ut praesentium. Consequatur labore maiores necessitatibus molestias aspernatur. Ex cumque ut velit animi libero nihil fugit. Et et quis deserunt delectus quis debitis. Dolores ratione architecto non officiis perferendis ratione aperiam et. Numquam expedita omnis inventore. Placeat autem voluptatem delectus alias officia consequuntur enim.', 'ullam-et-velit-qui-voluptatem-autem-assumenda-quod', 'Autem sit ut commodi.', 'https://placehold.co/600x400', 2, 3, '2025-12-11 06:59:09', NULL, '2959'),
(9, 'Even the Duchess.', 'Doloremque consequuntur quas et impedit voluptatum ipsum quibusdam. Modi dolorem sit voluptatem maxime ut odio aperiam. Aliquam quia accusamus soluta veniam impedit non voluptas. Ut dignissimos ea et quos esse voluptatibus amet. Aut aspernatur qui nihil eum natus libero ea. Eos fuga amet est iste. Illo nisi commodi quod iste hic aut. Est sequi qui architecto ut voluptatem.', 'aut-facere-neque-labore-praesentium-quos', 'Id distinctio ut sit eum.', 'https://placehold.co/600x400', 3, 1, '2025-12-11 06:59:09', NULL, '103'),
(10, 'I think.\' And she.', 'Eaque excepturi autem corporis saepe deserunt. Provident commodi veritatis expedita. Occaecati nemo similique officiis dolore. Quaerat amet sit commodi adipisci eaque. Optio voluptas omnis aliquid consequatur. Assumenda esse saepe sit odit sit quo. Aspernatur consequatur rerum quisquam consequuntur. Et voluptatibus itaque dolores quis est eius. Quasi cumque quia sunt sit dolor quisquam. Eum est debitis esse ratione tenetur. Aspernatur qui rerum iste sequi minima aliquam.', 'vero-voluptatibus-a-inventore-voluptas-aspernatur-et', 'Ut quo ut perspiciatis.', 'https://placehold.co/600x400', 2, 1, '2025-12-11 06:59:09', NULL, '2079');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` bigint UNSIGNED NOT NULL,
  `name` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `username` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `photo` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `password` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `remember_token` varchar(100) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `name`, `username`, `photo`, `email`, `email_verified_at`, `password`, `remember_token`, `created_at`, `updated_at`) VALUES
(1, 'Jermey Okuneva', 'ziemann.yvonne', 'https://via.placeholder.com/100x100.png/000011?text=facere', 'kayden.legros@example.net', NULL, '$2y$10$8tz/1I0DSKjL0D1IVcYeDO81XObebsz/H4DMdGMaE8FSPCr9Akg9a', NULL, NULL, NULL),
(2, 'Dr. Justyn Jacobi MD', 'roxanne.franecki', 'https://via.placeholder.com/100x100.png/00bb00?text=ea', 'denesik.enid@example.org', NULL, '$2y$10$BhLs0VDn7ZM.quvLtX3FQ.MTMQPiTK.t5UWCnp7ROfyEk/pOkz6qe', NULL, NULL, NULL),
(3, 'Christina Christiansen', 'elijah.lemke', 'https://via.placeholder.com/100x100.png/0044dd?text=molestias', 'madisyn56@example.net', NULL, '$2y$10$nNX2psxpkptt8FcQv2DXGu7tLOJKcAXTNiBUDNDe1mWpYk5CgqSqe', NULL, NULL, NULL),
(4, 'Orlando Bayer', 'rickie23', 'https://via.placeholder.com/100x100.png/00dd11?text=molestiae', 'macejkovic.trevor@example.org', NULL, '$2y$10$JWEMBGdDfxbqziW9nAXp0ep16fw6wjNKvWqDdt1FM/wFKYHaosrdm', NULL, NULL, NULL),
(5, 'Lurline Waelchi', 'qweimann', 'https://via.placeholder.com/100x100.png/00dd99?text=voluptatem', 'huels.arely@example.org', NULL, '$2y$10$zLN0dfSjYIey4gqBv2N9LO/7AOLkzHPvd7R2C.OrJ8EamVv4xZcCm', NULL, NULL, NULL),
(6, 'Miss Clara Padberg I', 'tressa.bradtke', 'https://via.placeholder.com/100x100.png/001188?text=commodi', 'icie06@example.com', NULL, '$2y$10$OnvbRK0JrNpnsowIO.JqMOrXn9gpCvHikxxgIE.wwYjSGyJ8qWzPq', NULL, NULL, NULL),
(7, 'Veda Dickinson', 'wiegand.ruthe', 'https://via.placeholder.com/100x100.png/003333?text=necessitatibus', 'roslyn99@example.org', NULL, '$2y$10$qLR8WnvE.NC.uL4LvwSCa.u2OiVhKpMpOqLS57RDHMIHeioen/f46', NULL, NULL, NULL),
(8, 'Lily Sauer', 'will.taya', 'https://via.placeholder.com/100x100.png/005533?text=alias', 'harvey.madisyn@example.net', NULL, '$2y$10$cSK0PZgZWp5et4oMpjZ0DOyNIX61I43.0WkMVe5untDt.5/BccTZW', NULL, NULL, NULL),
(9, 'Kaya Schowalter', 'runolfsson.kyla', 'https://via.placeholder.com/100x100.png/000088?text=eligendi', 'jast.sasha@example.org', NULL, '$2y$10$OIjdS1ntLJ4r1bfTHiKnHeRY.b70CCashXJkvlxJ5WTTwiwW04NYO', NULL, NULL, NULL),
(10, 'Dr. Colten Hand', 'giles.mertz', 'https://via.placeholder.com/100x100.png/00aa11?text=velit', 'maggie02@example.com', NULL, '$2y$10$47vOueTLag4YdPOL2OhJR.13e7AhELr.7Wen45orDcE2TOR4lqaCW', NULL, NULL, NULL),
(11, 'mahbub', 'mahbub', 'https://www.dreamwebdev.com/wp-content/uploads/2025/01/cropped-logo-480x480.png', 'bdsmrahman@gmail.com', NULL, '$2y$10$HSN2Gd4cO7Goi0p2QlrCFOW0sUfXl3JwS0CNqzUJ2BOPRScSLkRoO', NULL, '2025-12-11 07:04:33', '2025-12-11 07:04:33');

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
