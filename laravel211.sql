-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1:3306
-- Generation Time: May 17, 2023 at 06:41 AM
-- Server version: 8.0.30
-- PHP Version: 7.2.34

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `laravel211`
--

-- --------------------------------------------------------

--
-- Table structure for table `articles`
--

CREATE TABLE `articles` (
  `id` bigint UNSIGNED NOT NULL,
  `title` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `slug` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `content` text COLLATE utf8mb4_unicode_ci,
  `image` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `category_id` bigint UNSIGNED NOT NULL,
  `is_published` tinyint(1) NOT NULL DEFAULT '1',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `cart`
--

CREATE TABLE `cart` (
  `id` bigint UNSIGNED NOT NULL,
  `user_id` bigint UNSIGNED DEFAULT NULL,
  `total` double(8,2) NOT NULL DEFAULT '0.00',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `cart`
--

INSERT INTO `cart` (`id`, `user_id`, `total`, `created_at`, `updated_at`) VALUES
(2, NULL, 0.00, '2023-05-07 11:40:47', '2023-05-07 11:40:47');

-- --------------------------------------------------------

--
-- Table structure for table `cart_items`
--

CREATE TABLE `cart_items` (
  `id` bigint UNSIGNED NOT NULL,
  `cart_id` bigint UNSIGNED NOT NULL,
  `product_id` bigint UNSIGNED NOT NULL,
  `price` double(8,2) NOT NULL DEFAULT '0.00',
  `quantity` int NOT NULL DEFAULT '1',
  `discount` int DEFAULT NULL,
  `discount_type` enum('amount','percent') COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `sub_total` double(8,2) NOT NULL DEFAULT '0.00',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `cart_items`
--

INSERT INTO `cart_items` (`id`, `cart_id`, `product_id`, `price`, `quantity`, `discount`, `discount_type`, `sub_total`, `created_at`, `updated_at`) VALUES
(2, 2, 41, 50000.00, 1, NULL, NULL, 50000.00, '2023-05-07 11:40:47', '2023-05-07 11:40:47');

-- --------------------------------------------------------

--
-- Table structure for table `categories`
--

CREATE TABLE `categories` (
  `id` bigint UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

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
(2, '2014_10_12_100000_create_password_reset_tokens_table', 1),
(3, '2019_08_19_000000_create_failed_jobs_table', 1),
(4, '2019_12_14_000001_create_personal_access_tokens_table', 1),
(5, '2023_04_12_031857_create_categories_table', 1),
(6, '2023_04_12_032413_create_articales_table', 1),
(7, '2023_04_16_082555_add_slug_to_articles_table', 1),
(8, '2023_04_19_170850_add_is_admin_to_users_table', 1),
(9, '2023_04_23_164854_create_products_table', 1),
(10, '2023_04_23_170921_create_trademarks_table', 1),
(11, '2023_04_23_171311_create_producucing_countries_table', 1),
(12, '2023_04_23_172536_create_product_trademark_table', 1),
(13, '2023_04_28_032254_create_permission_tables', 1),
(14, '2023_05_05_031246_add_price_to_product_table', 2),
(15, '2023_05_06_065748_create_cart_items_table', 3),
(16, '2023_05_06_074048_create_cart_table', 3),
(19, '2023_05_14_074322_create_orders_table', 4),
(20, '2023_05_14_074407_create_order_items_table', 4),
(21, '2023_05_16_024127_add_product_id_to_order_items_table', 4);

-- --------------------------------------------------------

--
-- Table structure for table `model_has_permissions`
--

CREATE TABLE `model_has_permissions` (
  `permission_id` bigint UNSIGNED NOT NULL,
  `model_type` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `model_id` bigint UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `model_has_roles`
--

CREATE TABLE `model_has_roles` (
  `role_id` bigint UNSIGNED NOT NULL,
  `model_type` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `model_id` bigint UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `model_has_roles`
--

INSERT INTO `model_has_roles` (`role_id`, `model_type`, `model_id`) VALUES
(13, 'App\\Models\\User', 1);

-- --------------------------------------------------------

--
-- Table structure for table `orders`
--

CREATE TABLE `orders` (
  `id` bigint UNSIGNED NOT NULL,
  `user_id` bigint UNSIGNED DEFAULT NULL,
  `status` enum('in_process','canceled','finished','paid') COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'in_process',
  `user_surname` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `user_name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `user_patronymic` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `phone` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `total_sum` double(8,2) NOT NULL DEFAULT '0.00',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `orders`
--

INSERT INTO `orders` (`id`, `user_id`, `status`, `user_surname`, `user_name`, `user_patronymic`, `phone`, `email`, `total_sum`, `created_at`, `updated_at`, `deleted_at`) VALUES
(1, NULL, 'in_process', 'Kolmogorova', 'Tatyana', NULL, '74747892902', 'tatka@mail.ru', 0.00, '2023-05-16 00:02:49', '2023-05-16 00:02:49', NULL),
(2, NULL, 'in_process', 'Kolmogorova', 'Tatyana', NULL, '74747892902', 'tatka@mail.ru', 9078.00, '2023-05-16 16:19:05', '2023-05-16 16:19:05', NULL),
(3, NULL, 'in_process', 'Kolmogorova', 'Tatyana', NULL, '74747892902', 'tatka@mail.ru', 59078.00, '2023-05-16 23:43:53', '2023-05-16 23:43:54', NULL),
(4, NULL, 'in_process', 'Kolmogorova', 'Tatyana', NULL, '74747892902', 'tatka@mail.ru', 78089.00, '2023-05-16 23:52:07', '2023-05-16 23:52:07', NULL),
(5, NULL, 'in_process', 'Kolmogorova', 'Tatyana', NULL, '74747892902', 'tatka@mail.ru', 259404.00, '2023-05-17 00:04:48', '2023-05-17 00:04:48', NULL),
(6, NULL, 'in_process', 'Kolmogorova', 'Tatyana', NULL, '74747892902', 'tatka@mail.ru', 68156.00, '2023-05-17 00:08:46', '2023-05-17 00:08:46', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `order_items`
--

CREATE TABLE `order_items` (
  `id` bigint UNSIGNED NOT NULL,
  `order_id` bigint UNSIGNED NOT NULL,
  `price` double(8,2) NOT NULL,
  `quantity` int NOT NULL DEFAULT '1',
  `discount` int DEFAULT NULL,
  `discount_type` enum('amount','percent') COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `subtotal` double(8,2) NOT NULL DEFAULT '0.00',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `product_id` bigint UNSIGNED DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `order_items`
--

INSERT INTO `order_items` (`id`, `order_id`, `price`, `quantity`, `discount`, `discount_type`, `subtotal`, `created_at`, `updated_at`, `product_id`) VALUES
(1, 1, 9078.00, 1, NULL, NULL, 9078.00, '2023-05-16 00:02:49', '2023-05-16 00:02:49', 2),
(2, 2, 9078.00, 1, NULL, NULL, 9078.00, '2023-05-16 16:19:05', '2023-05-16 16:19:05', 2),
(3, 3, 9078.00, 1, NULL, NULL, 9078.00, '2023-05-16 23:43:54', '2023-05-16 23:43:54', 2),
(4, 3, 50000.00, 1, NULL, NULL, 50000.00, '2023-05-16 23:43:54', '2023-05-16 23:43:54', 41),
(5, 4, 9078.00, 1, NULL, NULL, 9078.00, '2023-05-16 23:52:07', '2023-05-16 23:52:07', 2),
(6, 4, 69011.00, 1, NULL, NULL, 69011.00, '2023-05-16 23:52:07', '2023-05-16 23:52:07', 3),
(7, 5, 9078.00, 2, NULL, NULL, 18156.00, '2023-05-17 00:04:48', '2023-05-17 00:04:48', 2),
(8, 5, 60312.00, 4, NULL, NULL, 241248.00, '2023-05-17 00:04:48', '2023-05-17 00:04:48', 5),
(9, 6, 9078.00, 2, NULL, NULL, 18156.00, '2023-05-17 00:08:46', '2023-05-17 00:08:46', 2),
(10, 6, 50000.00, 1, NULL, NULL, 50000.00, '2023-05-17 00:08:46', '2023-05-17 00:08:46', 41);

-- --------------------------------------------------------

--
-- Table structure for table `password_reset_tokens`
--

CREATE TABLE `password_reset_tokens` (
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `permissions`
--

CREATE TABLE `permissions` (
  `id` bigint UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `guard_name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `permissions`
--

INSERT INTO `permissions` (`id`, `name`, `guard_name`, `created_at`, `updated_at`) VALUES
(85, 'products-create', 'web', NULL, NULL),
(86, 'products-edit', 'web', NULL, NULL),
(87, 'products-delete', 'web', NULL, NULL),
(88, 'products-show', 'web', NULL, NULL),
(89, 'users-create', 'web', NULL, NULL),
(90, 'users-edit', 'web', NULL, NULL),
(91, 'users-delete', 'web', NULL, NULL),
(92, 'users-show', 'web', NULL, NULL),
(93, 'trademarks-create', 'web', NULL, NULL),
(94, 'trademarks-edit', 'web', NULL, NULL),
(95, 'trademarks-delete', 'web', NULL, NULL),
(96, 'trademarks-show', 'web', NULL, NULL);

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
  `expires_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `products`
--

CREATE TABLE `products` (
  `id` bigint UNSIGNED NOT NULL,
  `title` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `slug` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `description` text COLLATE utf8mb4_unicode_ci,
  `image` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `price` double(8,2) NOT NULL DEFAULT '0.00',
  `sale_price` double(8,2) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `products`
--

INSERT INTO `products` (`id`, `title`, `slug`, `description`, `image`, `price`, `sale_price`, `created_at`, `updated_at`, `deleted_at`) VALUES
(2, 'Chaim Heaney', 'chaim-heaney', 'Perspiciatis similique tenetur voluptas ea enim. Exercitationem odit consequatur voluptatem iste tempora aliquam exercitationem. Repellendus qui dolore rerum at voluptatem.', NULL, 9078.00, NULL, '2023-05-04 14:42:52', '2023-05-06 03:17:47', NULL),
(3, 'Monserrate Block', 'monserrate-block', 'Nulla rerum amet molestiae eveniet iure. Officia cum sunt voluptates voluptate modi doloremque aliquam. Autem aut rem architecto ut in.', NULL, 69011.00, NULL, '2023-05-04 14:42:52', '2023-05-06 03:17:47', NULL),
(4, 'Darrick Schowalter', 'darrick-schowalter', 'Quos accusamus voluptatem illo. Beatae aliquam delectus velit voluptatem. Rerum tempora vitae laboriosam.', NULL, 74184.00, NULL, '2023-05-04 14:42:52', '2023-05-06 03:17:47', NULL),
(5, 'Mr. Sam Ledner', 'mr-sam-ledner', 'Porro magni fuga delectus quae. Eveniet in fuga rem aut. Occaecati eaque dolor esse quos consequuntur. Rerum omnis quidem inventore. Esse impedit voluptatem beatae odit sit nam dolore.', NULL, 60312.00, NULL, '2023-05-04 14:42:52', '2023-05-06 03:17:47', NULL),
(6, 'Jeffrey Metz', 'jeffrey-metz', 'Magni culpa omnis soluta necessitatibus sint. Sint aut eveniet quam. Qui dolorum perferendis est totam et dolores repellendus.', NULL, 5832.00, NULL, '2023-05-04 14:42:52', '2023-05-06 03:17:47', NULL),
(7, 'Pascale Moen', 'pascale-moen', 'Earum totam similique adipisci fuga harum. Numquam est sit laudantium vel perferendis. Voluptatem esse quae alias voluptatibus animi.', NULL, 8594.00, NULL, '2023-05-04 14:42:52', '2023-05-06 03:17:47', NULL),
(8, 'Loraine Douglas', 'loraine-douglas', 'Dicta nihil at quia hic. Et autem dolor dignissimos mollitia. Qui non voluptas incidunt cumque id nam facilis. Et nesciunt et nihil.', NULL, 75383.00, NULL, '2023-05-04 14:42:52', '2023-05-06 03:17:47', NULL),
(9, 'Nadia O\'Conner V', 'nadia-oconner-v', 'Fugiat qui earum consequatur nulla ut. Nam porro inventore aperiam animi ut alias ab. Illum dolorem iusto dolor dignissimos numquam molestiae aut. Quod iure quisquam error natus.', NULL, 53882.00, NULL, '2023-05-04 14:42:52', '2023-05-06 03:17:47', NULL),
(10, 'Dr. Sheridan Bayer', 'dr-sheridan-bayer', 'Est non labore qui asperiores. Quod itaque quasi accusantium quia ex. Et magnam id occaecati.', NULL, 54865.00, NULL, '2023-05-04 14:42:52', '2023-05-06 03:17:47', NULL),
(11, 'Dr. Stanford Shanahan', 'dr-stanford-shanahan', 'Sed occaecati excepturi voluptatem ullam magnam. Vitae aut corporis corporis quos fugiat. Quia et quis id eum qui adipisci numquam atque.', NULL, 70902.00, NULL, '2023-05-04 14:42:52', '2023-05-06 03:17:47', NULL),
(12, 'Prof. Damion Schneider PhD', 'prof-damion-schneider-phd', 'Omnis non soluta sed cumque. Hic aut perspiciatis voluptatibus in. Quae veritatis nostrum dolores vitae ut recusandae. Dolore ut nam id natus voluptatem dolorum molestiae doloremque.', NULL, 76363.00, NULL, '2023-05-04 14:42:52', '2023-05-06 03:17:47', NULL),
(13, 'Dr. Mohamed Kub', 'dr-mohamed-kub', 'Dolore sit ipsum et occaecati labore. Ut neque expedita voluptatem illum et voluptate non. Nemo ab eum in sed. Esse qui animi iure qui illo optio provident.', NULL, 32547.00, NULL, '2023-05-04 14:42:52', '2023-05-06 03:17:47', NULL),
(14, 'Shad Erdman MD', 'shad-erdman-md', 'Minima sit non possimus sed cumque numquam. Voluptas expedita excepturi praesentium. Vero rerum dolorem aspernatur dolorem qui. Expedita adipisci libero aut at.', NULL, 55078.00, NULL, '2023-05-04 14:42:52', '2023-05-06 03:17:47', NULL),
(15, 'Dr. Jasper Borer', 'dr-jasper-borer', 'Reprehenderit sequi quia distinctio ut. Qui et deleniti eveniet in dicta. Dolore natus qui quod eaque assumenda dolor impedit. Eum nihil sit praesentium iusto. Quas quaerat officia ipsa.', NULL, 33956.00, NULL, '2023-05-04 14:42:52', '2023-05-06 03:17:47', NULL),
(16, 'Janet Legros', 'janet-legros', 'Velit non esse eos id facilis dolores. Officia eum accusantium provident aliquam omnis. Assumenda et veritatis dolor officiis nisi placeat.', NULL, 10759.00, NULL, '2023-05-04 14:42:52', '2023-05-06 03:17:47', NULL),
(17, 'Julianne Nicolas', 'julianne-nicolas', 'Qui inventore aut exercitationem optio numquam est. Quo nam vitae sint adipisci fugit quisquam.', NULL, 75737.00, NULL, '2023-05-04 14:42:52', '2023-05-06 03:17:48', NULL),
(18, 'Mylene Cormier', 'mylene-cormier', 'Hic suscipit qui sequi est. Placeat et omnis laudantium et quibusdam consectetur consectetur. Voluptas quibusdam sed nam ut itaque eum. Numquam porro et voluptatem cum nihil.', NULL, 46150.00, NULL, '2023-05-04 14:42:52', '2023-05-06 03:17:48', NULL),
(19, 'Stefan Cummerata DVM', 'stefan-cummerata-dvm', 'Quia et sunt rerum laborum ab ratione et. Aut atque eius perspiciatis aperiam. Inventore quas iusto impedit qui reiciendis ratione.', NULL, 87114.00, NULL, '2023-05-04 14:42:52', '2023-05-06 03:17:48', NULL),
(20, 'Janis Little', 'janis-little', 'Consequatur quos id pariatur enim commodi in autem. Nulla et vitae dolorem id ut tempore. Qui ex aspernatur voluptatem aut voluptas at. Et magni iusto id eum asperiores aliquam omnis.', NULL, 56920.00, NULL, '2023-05-04 14:42:52', '2023-05-06 03:17:48', NULL),
(21, 'Rosina Cummerata', 'rosina-cummerata', 'Quia iusto dolore rem illum ab ab atque. Eum saepe iure rerum eaque impedit quod. Est at inventore at occaecati non quia molestiae accusamus. Consequatur autem ut dolor quam magnam quia.', NULL, 39008.00, NULL, '2023-05-04 23:47:42', '2023-05-06 03:17:48', NULL),
(22, 'Florida Considine', 'florida-considine', 'Ab et iste dignissimos vero quia odio. Aut enim enim accusamus doloremque dolores animi eveniet quae. Quos quo necessitatibus et maiores autem dolores consectetur.', NULL, 79498.00, NULL, '2023-05-04 23:47:42', '2023-05-06 03:17:48', NULL),
(23, 'Michelle Nitzsche II', 'michelle-nitzsche-ii', 'Iste commodi eius deserunt porro earum. Eum nam sunt deserunt rem molestiae in laudantium. Rem distinctio vitae sint voluptatibus voluptatem nihil ut.', NULL, 87080.00, NULL, '2023-05-04 23:47:42', '2023-05-06 03:17:48', NULL),
(24, 'Dr. Modesto Lemke', 'dr-modesto-lemke', 'Tenetur debitis soluta voluptatum sint. Dolor repellendus laudantium sunt. Porro magnam eveniet qui maiores est.', NULL, 11599.00, NULL, '2023-05-04 23:47:42', '2023-05-06 03:17:48', NULL),
(25, 'Beverly Larson', 'beverly-larson', 'Quaerat id ea est ut itaque. Dolorem quis amet qui quia ullam. Nulla commodi qui nihil laboriosam voluptatum ut molestias. Dolores necessitatibus dignissimos facilis sed provident dolore quae.', NULL, 44608.00, NULL, '2023-05-04 23:47:42', '2023-05-06 03:17:48', NULL),
(26, 'Ida Denesik', 'ida-denesik', 'Culpa sunt quae eos maiores aspernatur illum consequuntur. Expedita consequuntur nisi dolor corporis consectetur molestiae consequatur id. Nesciunt cupiditate cupiditate sed id.', NULL, 86024.00, NULL, '2023-05-04 23:47:42', '2023-05-06 03:17:48', NULL),
(27, 'Ayana Murphy', 'ayana-murphy', 'Qui aut et harum sunt. Eum magnam et magnam nihil ut quae. Accusantium cupiditate qui laborum beatae architecto non non vitae. In qui soluta repellat quis. Quo rerum ut aut eum distinctio recusandae.', NULL, 68036.00, NULL, '2023-05-04 23:47:42', '2023-05-06 03:17:48', NULL),
(28, 'Ken Baumbach', 'ken-baumbach', 'Ea est incidunt autem ut quam quos. Quia qui iste voluptatem velit. Rerum amet veniam accusantium rerum et quis vero ut. Deleniti nemo provident qui et itaque. Sunt minima molestiae aut omnis.', NULL, 82599.00, NULL, '2023-05-04 23:47:42', '2023-05-06 03:17:48', NULL),
(29, 'Mrs. Evalyn Bahringer', 'mrs-evalyn-bahringer', 'Suscipit fugit facilis repudiandae voluptatem sed earum. Perferendis distinctio praesentium minus veniam. Optio veritatis suscipit enim rerum iure quia nemo quasi.', NULL, 12324.00, NULL, '2023-05-04 23:47:42', '2023-05-06 03:17:48', NULL),
(30, 'Dr. Everette Kozey', 'dr-everette-kozey', 'Repellat aut tempora nemo debitis inventore eum. Esse deserunt ut atque ea asperiores. Dolorem rem porro ut quidem sit eum. Doloribus voluptatibus qui nobis quos cumque repellat natus similique.', NULL, 92310.00, NULL, '2023-05-04 23:47:42', '2023-05-06 03:17:48', NULL),
(31, 'Mose Kunde MD', 'mose-kunde-md', 'Est nihil quaerat eligendi explicabo. Minima quidem libero tempore quidem et voluptates. Ut reprehenderit voluptas amet ratione tempora.', NULL, 98763.00, NULL, '2023-05-04 23:47:42', '2023-05-06 03:17:48', NULL),
(32, 'Stanton Klocko', 'stanton-klocko', 'Et labore nostrum omnis ratione recusandae. Qui aperiam eum voluptatem aliquid quidem earum magni inventore. Non qui ex eum nesciunt ut.', NULL, 99696.00, NULL, '2023-05-04 23:47:42', '2023-05-06 03:17:48', NULL),
(33, 'Vada Veum', 'vada-veum', 'Omnis eligendi voluptatum possimus aliquam et repellat et. Cupiditate et illo distinctio. Ea voluptatibus cupiditate eius rem. Itaque distinctio consequuntur eveniet dignissimos.', NULL, 46149.00, NULL, '2023-05-04 23:47:42', '2023-05-06 03:17:48', NULL),
(34, 'Domingo Parker', 'domingo-parker', 'Eum rerum nisi autem. Optio deserunt quia commodi ut autem. Id deserunt odio quia libero. Est qui iure accusantium sint illo. Dolor harum deleniti ut reiciendis aut sed laudantium vel.', NULL, 51175.00, NULL, '2023-05-04 23:47:42', '2023-05-06 03:17:48', NULL),
(35, 'Dr. Nina Volkman', 'dr-nina-volkman', 'Expedita libero tenetur non hic sed. A minus similique architecto inventore est et et. Laboriosam rerum consectetur porro eos. Beatae voluptas asperiores omnis animi illo soluta laboriosam excepturi.', NULL, 22389.00, NULL, '2023-05-04 23:47:42', '2023-05-06 03:17:48', NULL),
(36, 'Loma Windler', 'loma-windler', 'Sed aliquam voluptatem id expedita non. Molestias dignissimos beatae ipsam dolorem enim animi vel. Reiciendis enim voluptatibus rem dolor eum fugit. Eos laboriosam iusto modi inventore.', NULL, 58376.00, NULL, '2023-05-04 23:47:42', '2023-05-06 03:17:48', NULL),
(37, 'Maria Toy II', 'maria-toy-ii', 'Quidem aspernatur sed quos tempore. Hic maxime in et dolorem. Cumque cum expedita assumenda quibusdam saepe similique ad.', NULL, 32577.00, NULL, '2023-05-04 23:47:42', '2023-05-06 03:17:48', NULL),
(38, 'Dr. Toney Ondricka', 'dr-toney-ondricka', 'In autem facere eligendi perferendis et ducimus. Doloribus ea voluptas quia aliquam ut quis. Molestiae amet esse rerum animi cumque repellendus. Repellat explicabo et ipsa.', NULL, 83705.00, NULL, '2023-05-04 23:47:42', '2023-05-06 03:17:48', NULL),
(39, 'Doug Barton I', 'doug-barton-i', 'Unde aperiam non doloremque eaque fugiat. Iste ipsa voluptas est sit fuga et. Tempora velit minima rerum at aut.', NULL, 94683.00, NULL, '2023-05-04 23:47:42', '2023-05-06 03:17:48', NULL),
(40, 'Shanon Adams Jr.', 'shanon-adams-jr', 'Veritatis illo qui reprehenderit magnam nisi libero ea. Possimus magni maiores repudiandae rem.', NULL, 22446.00, NULL, '2023-05-04 23:47:42', '2023-05-06 03:17:48', NULL),
(41, 'Смартфон Samsung Galaxy S21', 'smartfon-samsung-galaxy-s21', 'ядер - 8x(1.8 ГГц, 2.42 ГГц, 2.84 ГГц), 6 Гб, 2 SIM, Dynamic AMOLED 2X, 2340x1080, камера 12+12+8 Мп, NFC, 5G, GPS, FM, 4500 мА*ч', 'products/product_41/56ce50b44e1504e2152d2081e26095a192ba564ec1f26ce301a3bbbf6ffc520d.jpg', 50000.00, NULL, '2023-05-07 03:36:54', '2023-05-07 03:36:56', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `product_trademark`
--

CREATE TABLE `product_trademark` (
  `product_id` bigint UNSIGNED NOT NULL,
  `trademark_id` bigint UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `product_trademark`
--

INSERT INTO `product_trademark` (`product_id`, `trademark_id`) VALUES
(2, 2),
(2, 1),
(41, 2),
(41, 1);

-- --------------------------------------------------------

--
-- Table structure for table `producucing_countries`
--

CREATE TABLE `producucing_countries` (
  `id` bigint UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `slug` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `roles`
--

CREATE TABLE `roles` (
  `id` bigint UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `guard_name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `roles`
--

INSERT INTO `roles` (`id`, `name`, `guard_name`, `created_at`, `updated_at`) VALUES
(13, 'super-admin', 'web', '2023-05-04 00:28:48', '2023-05-04 00:28:48'),
(14, 'admin', 'web', '2023-05-04 00:28:48', '2023-05-04 00:28:48'),
(15, 'moderator', 'web', '2023-05-04 00:28:48', '2023-05-04 00:28:48'),
(16, 'user', 'web', '2023-05-04 00:28:48', '2023-05-04 00:28:48');

-- --------------------------------------------------------

--
-- Table structure for table `role_has_permissions`
--

CREATE TABLE `role_has_permissions` (
  `permission_id` bigint UNSIGNED NOT NULL,
  `role_id` bigint UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `role_has_permissions`
--

INSERT INTO `role_has_permissions` (`permission_id`, `role_id`) VALUES
(85, 13),
(86, 13),
(87, 13),
(88, 13),
(89, 13),
(90, 13),
(91, 13),
(92, 13),
(93, 13),
(94, 13),
(95, 13),
(96, 13),
(85, 14),
(86, 14),
(87, 14),
(88, 14),
(93, 14),
(94, 14),
(95, 14),
(96, 14),
(85, 15),
(86, 15),
(87, 15),
(88, 15),
(93, 15),
(94, 15),
(95, 15),
(96, 15);

-- --------------------------------------------------------

--
-- Table structure for table `trademarks`
--

CREATE TABLE `trademarks` (
  `id` bigint UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `slug` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `trademarks`
--

INSERT INTO `trademarks` (`id`, `name`, `slug`, `created_at`, `updated_at`) VALUES
(1, 'Samsung', 'samsung', '2023-05-07 03:29:04', '2023-05-07 03:29:04'),
(2, 'Android', 'android', '2023-05-07 03:29:36', '2023-05-07 03:29:36');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` bigint UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `password` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `is_admin` tinyint(1) NOT NULL DEFAULT '0',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `name`, `email`, `email_verified_at`, `password`, `remember_token`, `is_admin`, `created_at`, `updated_at`) VALUES
(1, 'tata', 'tatka@mail.ru', NULL, '$2y$10$L573ilotqbALBOw.wOCTruO6fxmYskic4yRWfZIu1CsmoPq9q/E3S', NULL, 0, '2023-05-04 00:28:51', '2023-05-04 00:28:51');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `articles`
--
ALTER TABLE `articles`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `articles_slug_unique` (`slug`),
  ADD KEY `articles_category_id_foreign` (`category_id`);

--
-- Indexes for table `cart`
--
ALTER TABLE `cart`
  ADD PRIMARY KEY (`id`),
  ADD KEY `cart_user_id_foreign` (`user_id`);

--
-- Indexes for table `cart_items`
--
ALTER TABLE `cart_items`
  ADD PRIMARY KEY (`id`),
  ADD KEY `cart_items_product_id_foreign` (`product_id`),
  ADD KEY `cart_items_cart_id_foreign` (`cart_id`);

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
-- Indexes for table `model_has_permissions`
--
ALTER TABLE `model_has_permissions`
  ADD PRIMARY KEY (`permission_id`,`model_id`,`model_type`),
  ADD KEY `model_has_permissions_model_id_model_type_index` (`model_id`,`model_type`);

--
-- Indexes for table `model_has_roles`
--
ALTER TABLE `model_has_roles`
  ADD PRIMARY KEY (`role_id`,`model_id`,`model_type`),
  ADD KEY `model_has_roles_model_id_model_type_index` (`model_id`,`model_type`);

--
-- Indexes for table `orders`
--
ALTER TABLE `orders`
  ADD PRIMARY KEY (`id`),
  ADD KEY `orders_user_id_foreign` (`user_id`);

--
-- Indexes for table `order_items`
--
ALTER TABLE `order_items`
  ADD PRIMARY KEY (`id`),
  ADD KEY `order_items_order_id_foreign` (`order_id`),
  ADD KEY `order_items_product_id_foreign` (`product_id`);

--
-- Indexes for table `password_reset_tokens`
--
ALTER TABLE `password_reset_tokens`
  ADD PRIMARY KEY (`email`);

--
-- Indexes for table `permissions`
--
ALTER TABLE `permissions`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `permissions_name_guard_name_unique` (`name`,`guard_name`);

--
-- Indexes for table `personal_access_tokens`
--
ALTER TABLE `personal_access_tokens`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `personal_access_tokens_token_unique` (`token`),
  ADD KEY `personal_access_tokens_tokenable_type_tokenable_id_index` (`tokenable_type`,`tokenable_id`);

--
-- Indexes for table `products`
--
ALTER TABLE `products`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `products_slug_unique` (`slug`);

--
-- Indexes for table `product_trademark`
--
ALTER TABLE `product_trademark`
  ADD KEY `product_trademark_product_id_foreign` (`product_id`),
  ADD KEY `product_trademark_trademark_id_foreign` (`trademark_id`);

--
-- Indexes for table `producucing_countries`
--
ALTER TABLE `producucing_countries`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `producucing_countries_slug_unique` (`slug`);

--
-- Indexes for table `roles`
--
ALTER TABLE `roles`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `roles_name_guard_name_unique` (`name`,`guard_name`);

--
-- Indexes for table `role_has_permissions`
--
ALTER TABLE `role_has_permissions`
  ADD PRIMARY KEY (`permission_id`,`role_id`),
  ADD KEY `role_has_permissions_role_id_foreign` (`role_id`);

--
-- Indexes for table `trademarks`
--
ALTER TABLE `trademarks`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `trademarks_slug_unique` (`slug`);

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
-- AUTO_INCREMENT for table `articles`
--
ALTER TABLE `articles`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `cart`
--
ALTER TABLE `cart`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `cart_items`
--
ALTER TABLE `cart_items`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=40;

--
-- AUTO_INCREMENT for table `categories`
--
ALTER TABLE `categories`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=22;

--
-- AUTO_INCREMENT for table `orders`
--
ALTER TABLE `orders`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `order_items`
--
ALTER TABLE `order_items`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `permissions`
--
ALTER TABLE `permissions`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=97;

--
-- AUTO_INCREMENT for table `personal_access_tokens`
--
ALTER TABLE `personal_access_tokens`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `products`
--
ALTER TABLE `products`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=42;

--
-- AUTO_INCREMENT for table `producucing_countries`
--
ALTER TABLE `producucing_countries`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `roles`
--
ALTER TABLE `roles`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;

--
-- AUTO_INCREMENT for table `trademarks`
--
ALTER TABLE `trademarks`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `articles`
--
ALTER TABLE `articles`
  ADD CONSTRAINT `articles_category_id_foreign` FOREIGN KEY (`category_id`) REFERENCES `categories` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `cart`
--
ALTER TABLE `cart`
  ADD CONSTRAINT `cart_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `cart_items`
--
ALTER TABLE `cart_items`
  ADD CONSTRAINT `cart_items_cart_id_foreign` FOREIGN KEY (`cart_id`) REFERENCES `cart` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `cart_items_product_id_foreign` FOREIGN KEY (`product_id`) REFERENCES `products` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `model_has_permissions`
--
ALTER TABLE `model_has_permissions`
  ADD CONSTRAINT `model_has_permissions_permission_id_foreign` FOREIGN KEY (`permission_id`) REFERENCES `permissions` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `model_has_roles`
--
ALTER TABLE `model_has_roles`
  ADD CONSTRAINT `model_has_roles_role_id_foreign` FOREIGN KEY (`role_id`) REFERENCES `roles` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `orders`
--
ALTER TABLE `orders`
  ADD CONSTRAINT `orders_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`);

--
-- Constraints for table `order_items`
--
ALTER TABLE `order_items`
  ADD CONSTRAINT `order_items_order_id_foreign` FOREIGN KEY (`order_id`) REFERENCES `orders` (`id`),
  ADD CONSTRAINT `order_items_product_id_foreign` FOREIGN KEY (`product_id`) REFERENCES `products` (`id`);

--
-- Constraints for table `product_trademark`
--
ALTER TABLE `product_trademark`
  ADD CONSTRAINT `product_trademark_product_id_foreign` FOREIGN KEY (`product_id`) REFERENCES `products` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `product_trademark_trademark_id_foreign` FOREIGN KEY (`trademark_id`) REFERENCES `trademarks` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `role_has_permissions`
--
ALTER TABLE `role_has_permissions`
  ADD CONSTRAINT `role_has_permissions_permission_id_foreign` FOREIGN KEY (`permission_id`) REFERENCES `permissions` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `role_has_permissions_role_id_foreign` FOREIGN KEY (`role_id`) REFERENCES `roles` (`id`) ON DELETE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
