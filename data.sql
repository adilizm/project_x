-- phpMyAdmin SQL Dump
-- version 5.1.0
-- https://www.phpmyadmin.net/
--
-- Hôte : 127.0.0.1
-- Généré le : jeu. 26 août 2021 à 17:23
-- Version du serveur :  10.4.19-MariaDB
-- Version de PHP : 7.3.27

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de données : `project_x`
--

-- --------------------------------------------------------

--
-- Structure de la table `autorisations`
--

CREATE TABLE `autorisations` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `autorisation_key` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `autorisation_description` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `is_parent` int(11) NOT NULL DEFAULT 0,
  `parent_id` int(11) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Déchargement des données de la table `autorisations`
--

INSERT INTO `autorisations` (`id`, `name`, `autorisation_key`, `autorisation_description`, `is_parent`, `parent_id`, `created_at`, `updated_at`, `deleted_at`) VALUES
(1, 'les role', '', '', 1, 0, '2021-07-27 01:03:22', '2021-07-27 01:03:22', NULL),
(2, 'role', 'role.index', 'voir les roles', 0, 1, '2021-07-27 01:03:22', '2021-07-27 01:03:22', NULL),
(3, 'role', 'role.create', 'cree un noveau role', 0, 1, '2021-07-27 01:03:22', '2021-07-27 01:03:22', NULL),
(4, 'role', 'role.edit', 'editer les roles', 0, 1, '2021-07-27 01:03:22', '2021-07-27 01:03:22', NULL),
(5, 'role', 'role.destroy', 'supprimer les roles', 0, 1, '2021-07-27 01:03:22', '2021-07-27 01:03:22', NULL),
(6, 'les etulisateur', '', '', 1, 0, '2021-07-27 02:03:22', '2021-07-27 02:03:22', NULL),
(7, '', 'users.index', 'voir les users', 0, 6, '2021-07-27 02:03:22', '2021-07-27 02:03:22', NULL),
(8, '', 'users.edit', 'modifier les utilisateurs', 0, 6, '2021-07-27 02:03:22', '2021-07-27 02:03:22', NULL),
(9, '', 'users.create', 'cree des utilisateurs', 0, 6, '2021-07-27 02:03:22', '2021-07-27 02:03:22', NULL),
(10, '', 'users.destroy', 'supprimer les utilisateurs', 0, 6, '2021-07-27 02:03:22', '2021-07-27 02:03:22', NULL),
(11, 'les categories', '', '', 1, 0, '2021-07-27 01:03:22', '2021-07-27 01:03:22', NULL),
(12, '', 'category.index', 'voir les categories', 0, 11, '2021-07-27 01:03:22', '2021-07-27 01:03:22', NULL),
(13, '', 'category.create', 'cree une nouvelle categorie', 0, 11, '2021-07-27 01:03:22', '2021-07-27 01:03:22', NULL),
(14, '', 'category.edit', 'editer les categories', 0, 11, '2021-07-27 01:03:22', '2021-07-27 01:03:22', NULL),
(15, '', 'category.destroy', 'supprimer les categories', 0, 11, '2021-07-27 01:03:22', '2021-07-27 01:03:22', NULL),
(16, 'les produits', '', '', 1, 0, '2021-07-27 01:03:22', '2021-07-27 01:03:22', NULL),
(17, '', 'products.index', 'voir les produits', 0, 16, '2021-07-27 01:03:22', '2021-07-27 01:03:22', NULL),
(18, '', 'products.create', 'cree une nouvelle produits', 0, 16, '2021-07-27 01:03:22', '2021-07-27 01:03:22', NULL),
(19, '', 'products.edit', 'editer les produits', 0, 16, '2021-07-27 01:03:22', '2021-07-27 01:03:22', NULL),
(20, '', 'products.destroy', 'supprimer les produits', 0, 16, '2021-07-27 01:03:22', '2021-07-27 01:03:22', NULL),
(21, 'Administrateur', '', 'cet perrsone sera admin du site', 1, 0, '2021-08-24 13:11:55', '2021-08-24 13:11:55', NULL),
(22, '', 'Admin', '', 0, 21, '2021-08-24 13:11:55', '2021-08-24 13:11:55', NULL),
(23, 'manager', '', 'cet perrsone sera Manager', 1, 0, '2021-08-24 13:11:55', '2021-08-24 13:11:55', NULL),
(24, '', 'Manager', '', 0, 23, '2021-08-24 13:11:55', '2021-08-24 13:11:55', NULL),
(25, 'Vondeur', '', 'cet perrsone sera Vondeur', 1, 0, '2021-08-24 13:11:55', '2021-08-24 13:11:55', NULL),
(26, '', 'Vondeur', '', 0, 25, '2021-08-24 13:11:55', '2021-08-24 13:11:55', NULL),
(27, 'Livreur', '', 'cet perrsone sera Livreur', 1, 0, '2021-08-24 13:11:55', '2021-08-24 13:11:55', NULL),
(28, '', 'Livreur', '', 0, 27, '2021-08-24 13:11:55', '2021-08-24 13:11:55', NULL),
(29, 'Client', '', 'cet perrsone sera Client', 1, 0, '2021-08-24 13:11:55', '2021-08-24 13:11:55', NULL),
(30, '', 'Client', '', 0, 29, '2021-08-24 13:11:55', '2021-08-24 13:11:55', NULL),
(31, 'les magasins', '', 'managment des magasins', 1, 0, '2021-08-24 14:19:14', '2021-08-24 14:19:14', NULL),
(32, '', 'shops.index', 'voir les magasins', 0, 31, '2021-08-24 14:19:14', '2021-08-24 14:19:14', NULL),
(33, '', 'shops.create', 'cree new magasins', 0, 31, '2021-08-24 14:19:14', '2021-08-24 14:19:14', NULL),
(34, '', 'shops.destroy', 'supprimer magasins', 0, 31, '2021-08-24 14:19:14', '2021-08-24 14:19:14', NULL),
(35, '', 'shops.edit', 'modifier info des magasins', 0, 31, '2021-08-24 14:19:14', '2021-08-24 14:19:14', NULL);

-- --------------------------------------------------------

--
-- Structure de la table `categories`
--

CREATE TABLE `categories` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `slug` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `description` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `picture` varchar(200) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL,
  `parent_id` bigint(20) UNSIGNED DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Déchargement des données de la table `categories`
--

INSERT INTO `categories` (`id`, `name`, `slug`, `description`, `picture`, `created_at`, `updated_at`, `deleted_at`, `parent_id`) VALUES
(1, 'Test1', 'test1', 'testtesttesttesttesttesttesttesttesttesttesttesttesttesttesttesttesttesttesttesttesttesttesttest', 'categories/1629814314_Screenshot (15).png', '2021-08-24 13:11:55', '2021-08-24 13:11:55', NULL, NULL),
(2, 'TestCategory2', 'testcategory2', 'TestCategory2 Description', 'categories/1629814372_Screenshot (21).png', '2021-08-24 13:12:52', '2021-08-24 13:12:52', NULL, NULL);

-- --------------------------------------------------------

--
-- Structure de la table `customers`
--

CREATE TABLE `customers` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Structure de la table `failed_jobs`
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
-- Structure de la table `livreurs`
--

CREATE TABLE `livreurs` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `user_id` bigint(20) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Structure de la table `managers`
--

CREATE TABLE `managers` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `user_id` bigint(20) UNSIGNED NOT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Structure de la table `migrations`
--

CREATE TABLE `migrations` (
  `id` int(10) UNSIGNED NOT NULL,
  `migration` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `batch` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Déchargement des données de la table `migrations`
--

INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES
(1, '2013_08_15_030134_create_roles_table', 1),
(2, '2014_10_12_000000_create_users_table', 1),
(3, '2014_10_12_100000_create_password_resets_table', 1),
(4, '2019_08_19_000000_create_failed_jobs_table', 1),
(5, '2021_08_16_225318_create_autorisations_table', 1),
(6, '2021_08_18_061809_create_managers_table', 1),
(7, '2021_08_18_061845_create_livreurs_table', 1),
(8, '2021_08_18_081935_create_shops_table', 1),
(9, '2021_08_18_192447_create_categories_table', 1),
(10, '2021_08_18_195206_add_parentid_to_categories_table', 1),
(11, '2021_08_18_204726_create_products_table', 1),
(12, '2021_08_18_205413_create_product_images_table', 1),
(13, '2021_08_19_062610_create_vondeurs_table', 1),
(14, '2021_08_19_064255_create_customers_table', 1);

-- --------------------------------------------------------

--
-- Structure de la table `password_resets`
--

CREATE TABLE `password_resets` (
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Structure de la table `products`
--

CREATE TABLE `products` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `shop_id` bigint(20) UNSIGNED NOT NULL,
  `category_id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `slug` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `description` longtext COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `prix` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `unite` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `min_quantity` int(11) NOT NULL DEFAULT 1,
  `keywords` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `variants` longtext CHARACTER SET utf8mb4 COLLATE utf8mb4_bin DEFAULT NULL CHECK (json_valid(`variants`)),
  `status` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'new',
  `confermed` tinyint(1) NOT NULL DEFAULT 0,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Déchargement des données de la table `products`
--

INSERT INTO `products` (`id`, `shop_id`, `category_id`, `name`, `slug`, `description`, `prix`, `unite`, `min_quantity`, `keywords`, `variants`, `status`, `confermed`, `created_at`, `updated_at`, `deleted_at`) VALUES
(2, 1, 2, 'test -product updated name', 'test-product-updated-name', '<p>test -product<br></p>', '120', 'mm', 1, '[\"light\",\"lights\"]', '[{\"color\":\"red\",\"longeur\":\"2m\",\"qty\":\"20\",\"prix\":\"200\",\"image\":\"variants_pic\\/1629986266_test -product updated name_0.jpg\"},{\"color\":\"red\",\"longeur\":\"3m\",\"qty\":\"30\",\"prix\":\"300\",\"image\":\"variants_pic\\/1629986282_test -product updated name_1.jpg\"},{\"color\":\"red\",\"longeur\":\"6m\",\"qty\":\"40\",\"prix\":\"400\",\"image\":\"variants_pic\\/1629986299_test -product updated name_2.jpg\"},{\"color\":\"bleu\",\"longeur\":\"2m\",\"qty\":\"20\",\"prix\":\"200\",\"image\":\"variants_pic\\/1629986282_test -product updated name_3.jpg\"},{\"color\":\"bleu\",\"longeur\":\"3m\",\"qty\":\"30\",\"prix\":\"300\",\"image\":\"variants_pic\\/1629985023_test -product updated name_1.jpg\"},{\"color\":\"bleu\",\"longeur\":\"6m\",\"qty\":\"40\",\"prix\":\"400\",\"image\":null},{\"color\":\"green\",\"longeur\":\"2m\",\"qty\":\"20\",\"prix\":\"200\",\"image\":\"variants_pic\\/1629986299_test -product updated name_6.jpg\"},{\"color\":\"green\",\"longeur\":\"3m\",\"qty\":\"30\",\"prix\":\"300\",\"image\":\"variants_pic\\/1629986299_test -product updated name_7.jpg\"},{\"color\":\"green\",\"longeur\":\"6m\",\"qty\":\"40\",\"prix\":\"400\",\"image\":null}]', 'new', 0, '2021-08-24 14:19:14', '2021-08-26 12:58:19', NULL),
(3, 1, 2, 'Chancellor Owens updated', 'chancellor-owens-updated', 'Chancellor Owens updated&nbsp;Chancellor Owens updated&nbsp;Chancellor Owens updated&nbsp;Chancellor Owens updated', '199', 'metre', 1, '[\"t-shirt\",\"Ex dolorem incidunt\"]', '[{\"color\":\"red\",\"type\":\"2m\",\"qty\":\"20\",\"prix\":\"250\",\"image\":\"variants_pic\\/1629986266_test -product updated name_0.jpg\"},{\"color\":\"red\",\"type\":\"3m\",\"qty\":\"30\",\"prix\":\"300\",\"image\":\"variants_pic\\/1629986282_test -product updated name_1.jpg\"},{\"color\":\"red\",\"type\":\"6m\",\"qty\":\"40\",\"prix\":\"400\",\"image\":\"variants_pic\\/1629986299_test -product updated name_2.jpg\"},{\"color\":\"bleu\",\"type\":\"2m\",\"qty\":\"20\",\"prix\":\"200\",\"image\":\"variants_pic\\/1629986282_test -product updated name_3.jpg\"},{\"color\":\"bleu\",\"type\":\"3m\",\"qty\":\"30\",\"prix\":\"300\",\"image\":\"variants_pic\\/1629985023_test -product updated name_1.jpg\"},{\"color\":\"bleu\",\"type\":\"6m\",\"qty\":\"40\",\"prix\":\"400\",\"image\":\"variants_pic\\/1629989030_Chancellor Owens updated_5.png\"},{\"color\":\"green\",\"type\":\"2m\",\"qty\":\"20\",\"prix\":\"200\",\"image\":\"variants_pic\\/1629986299_test -product updated name_6.jpg\"},{\"color\":\"green\",\"type\":\"3m\",\"qty\":\"30\",\"prix\":\"300\",\"image\":\"variants_pic\\/1629986299_test -product updated name_7.jpg\"},{\"color\":\"green\",\"type\":\"6m\",\"qty\":\"40\",\"prix\":\"400\",\"image\":\"variants_pic\\/1629986361_Chancellor Owens_8.png\"}]', 'new', 0, '2021-08-26 12:42:08', '2021-08-26 13:43:50', NULL);

-- --------------------------------------------------------

--
-- Structure de la table `product_images`
--

CREATE TABLE `product_images` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `product_id` bigint(20) UNSIGNED NOT NULL,
  `path` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `is_main` tinyint(1) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Déchargement des données de la table `product_images`
--

INSERT INTO `product_images` (`id`, `product_id`, `path`, `is_main`, `created_at`, `updated_at`, `deleted_at`) VALUES
(5, 2, 'Main_products/1629818354_test_product_9.jpg', 1, '2021-08-24 14:19:14', '2021-08-24 14:19:14', NULL),
(6, 2, 'details_products/1629818354_test_product_0.jpg', 0, '2021-08-24 14:19:14', '2021-08-24 14:19:14', NULL),
(7, 2, 'details_products/1629818354_test_product_1.jpg', 0, '2021-08-24 14:19:14', '2021-08-24 14:19:14', NULL),
(8, 2, 'details_products/1629818354_test_product_2.jpg', 0, '2021-08-24 14:19:14', '2021-08-24 14:19:14', NULL),
(9, 2, 'details_products/1629818354_test_product_3.jpg', 0, '2021-08-24 14:19:14', '2021-08-24 14:19:14', NULL),
(10, 3, 'Main_products/1629986937_chancellor_owens_updated_0.jpg', 1, '2021-08-26 12:42:08', '2021-08-26 13:08:57', NULL),
(11, 3, 'details_products/1629985328_chancellor_owens_0.jpg', 0, '2021-08-26 12:42:08', '2021-08-26 12:42:08', NULL),
(12, 3, 'details_products/1629985328_chancellor_owens_1.jpg', 0, '2021-08-26 12:42:08', '2021-08-26 12:42:08', NULL),
(13, 3, 'details_products/1629985328_chancellor_owens_2.jpg', 0, '2021-08-26 12:42:08', '2021-08-26 12:42:08', NULL);

-- --------------------------------------------------------

--
-- Structure de la table `roles`
--

CREATE TABLE `roles` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `permissions` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Déchargement des données de la table `roles`
--

INSERT INTO `roles` (`id`, `name`, `permissions`, `created_at`, `updated_at`, `deleted_at`) VALUES
(1, 'admin', '[\"role.index\",\"role.create\",\"role.edit\",\"role.destroy\",\"users.index\",\"users.edit\",\"users.create\",\"users.destroy\",\"category.index\",\"category.create\",\"category.edit\",\"category.destroy\",\"products.index\",\"products.create\",\"products.edit\",\"products.destroy\",\"Admin\",\"shops.index\",\"shops.create\",\"shops.destroy\",\"shops.edit\"]', '2021-07-27 02:03:22', '2021-08-26 14:14:20', NULL),
(2, 'manager', '[\"Manager\"]', '2021-07-27 02:03:22', '2021-08-26 08:12:50', NULL),
(3, 'vondeur', '[\"category.index\",\"products.index\",\"products.create\",\"products.edit\",\"products.destroy\",\"Vondeur\"]', '2021-07-27 02:03:22', '2021-08-26 08:12:59', NULL),
(4, 'livreur', '[\"Livreur\"]', '2021-07-27 02:03:22', '2021-08-26 08:13:06', NULL),
(5, 'client', '[]', '2021-07-27 02:03:22', '2021-07-27 02:03:22', NULL),
(6, 'voircategorie', '[\"category.index\",\"category.create\",\"category.edit\",\"category.destroy\"]', '2021-08-18 20:46:39', '2021-08-18 20:46:39', NULL);

-- --------------------------------------------------------

--
-- Structure de la table `shops`
--

CREATE TABLE `shops` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `user_id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `Ville` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `address` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `map_latitude` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `map_longitude` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `logo_path` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `description` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `is_published` tinyint(1) NOT NULL DEFAULT 0,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Déchargement des données de la table `shops`
--

INSERT INTO `shops` (`id`, `user_id`, `name`, `Ville`, `address`, `map_latitude`, `map_longitude`, `logo_path`, `description`, `is_published`, `created_at`, `updated_at`, `deleted_at`) VALUES
(1, 2, 'bi3shop', 'agadir', 'hay sallam', '30.403141238623295', '-9.548317266209384', 'uploads/1629313976_pikatshu.png', 'description de la boutique description de la boutique description de la boutique description de la boutique description de la boutique description de la boutique description de la boutique', 0, '2021-08-18 17:12:57', '2021-08-18 17:12:57', NULL),
(2, 6, 'Hassan shop', 'Agdir', 'Hay sallam', '30.40351176649147', '-9.546338917147354', 'shops/1629887322_bc20f7eccc94c8dc710fb071e4cf175f.jpg', 'Hassan shop is a really good shop wher you can make everything better from digital marketing to making breakfast', 0, '2021-08-25 09:28:42', '2021-08-25 09:28:42', NULL),
(8, 7, 'BrahimShop', 'Agadir', 'Hay dakhla', '30.4169008', '-9.5577297', 'shops/1629887964_c58d3620ac2aa2193440c40e61d0f49f.jpg', 'Je suis brahim i have a chop that really helps you visit me', 0, '2021-08-25 09:39:24', '2021-08-25 09:39:24', '2021-08-02 11:08:10');

-- --------------------------------------------------------

--
-- Structure de la table `users`
--

CREATE TABLE `users` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `password` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `phone` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `role_id` bigint(20) UNSIGNED NOT NULL,
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `is_banned` tinyint(1) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Déchargement des données de la table `users`
--

INSERT INTO `users` (`id`, `name`, `email`, `email_verified_at`, `password`, `phone`, `role_id`, `remember_token`, `is_banned`, `created_at`, `updated_at`, `deleted_at`) VALUES
(1, 'admin', 'admin@yahoo.com', NULL, '$2y$10$rIqF1C0Z8fPvogZjkVYvD.ygJiFzIF62ndrvOv5A2t9lnmivVqHzK', '0606060606', 1, 'IKc0NGM6zTRESY0PGFD2r1NdCrrZrQzAfkyGU8U6dEnLS0aVVt9ZV9khoOR5', NULL, '2021-08-15 09:16:31', '2021-08-25 09:03:45', NULL),
(2, 'user test', 'test@test.ma', NULL, '$2y$10$nvbkKYGbHMXpMh540vCkU.Tdj8hVJlMmguYVHxXbFlGk1oRrdq3di', '0303030303', 3, 'DRdwsv3N6zgnmG24aSu8NevNu4abswlhqKC2V4GbZgX61Cwc4kYN24S9W3Qw', NULL, '2021-08-17 00:16:08', '2021-08-18 17:10:55', NULL),
(3, 'newvondeur asd', 'adilizmWya@asd.com', NULL, '$2y$10$3hasOCPswZdLEYicdoyePu7Yw/iN1URfh5ckYhkCRQq/azoyTmgi.', '0303030303', 3, NULL, 0, '2021-08-25 09:04:58', '2021-08-26 07:41:06', NULL),
(4, 'asada aasdas', 'tests@sada.asd', NULL, '$2y$10$BKifymwfrBvXftdJNlthcOJjhj0/VEdOQeVJqx0b/nPsBnPhEtXWS', '000000000000', 3, 'jmUWj6s28rCA6CmC25MO2BFzENjeUrs160b1J8Wy0CVhjNlJyn3gWDDRXKe3', 1, '2021-08-25 09:09:05', '2021-08-26 07:50:16', NULL),
(5, 'aasdasa asdasd', 'asda@asda.asd', NULL, '$2y$10$pvpj5bfj.EMmFzt0yvIWjOQaSkAGchZs7WbD/sz.F9dEl6aITw5cS', '0101010101', 3, 'sIVZl4Cc5kxUjBUpmCV2g0hMpBHXgLnXAJceOWoBm9P8gDVsrbWl2maN6Lso', NULL, '2021-08-25 09:10:38', '2021-08-25 09:10:38', NULL),
(6, 'Hassan Ousaid', 'hassan@maroc.ma', NULL, '$2y$10$UmBY8GIuEU48.lO8e7Z16ethzPiNkkpm8MSnZkTsNoN898FgQW2E.', '0909090909', 3, 'xfDQMlqrrBXxyvysOp8B5UayYdOc0oktyEb53e3xWj6BzCYsKxUqWdpEyJbO', NULL, '2021-08-25 09:26:08', '2021-08-25 09:26:08', NULL),
(7, 'Brahim Ousaid', 'brahim@ousaid.com', NULL, '$2y$10$CVWeQucKuK6JTghEtdrSI.eoKqq5RPouFEwJSrYqzxLbschpqMVtG', '8888888888', 3, 'QcEfDrozcqbDFK4Jj1TFRjzmatUwUKpP2ZjYPh3itDuakcIxsnJiaPWmVihB', NULL, '2021-08-25 09:32:16', '2021-08-25 09:32:16', NULL);

-- --------------------------------------------------------

--
-- Structure de la table `vondeurs`
--

CREATE TABLE `vondeurs` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `user_id` bigint(20) UNSIGNED NOT NULL,
  `is_active` tinyint(1) NOT NULL DEFAULT 1,
  `deleted_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Déchargement des données de la table `vondeurs`
--

INSERT INTO `vondeurs` (`id`, `user_id`, `is_active`, `deleted_at`, `created_at`, `updated_at`) VALUES
(1, 4, 1, NULL, '2021-08-25 09:09:05', '2021-08-25 09:09:05'),
(2, 5, 1, NULL, '2021-08-25 09:10:38', '2021-08-25 09:10:38'),
(3, 6, 1, NULL, '2021-08-25 09:26:08', '2021-08-25 09:26:08'),
(4, 7, 1, NULL, '2021-08-25 09:32:16', '2021-08-25 09:32:16');

--
-- Index pour les tables déchargées
--

--
-- Index pour la table `autorisations`
--
ALTER TABLE `autorisations`
  ADD PRIMARY KEY (`id`);

--
-- Index pour la table `categories`
--
ALTER TABLE `categories`
  ADD PRIMARY KEY (`id`),
  ADD KEY `categories_parent_id_foreign` (`parent_id`);

--
-- Index pour la table `customers`
--
ALTER TABLE `customers`
  ADD PRIMARY KEY (`id`);

--
-- Index pour la table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `failed_jobs_uuid_unique` (`uuid`);

--
-- Index pour la table `livreurs`
--
ALTER TABLE `livreurs`
  ADD PRIMARY KEY (`id`),
  ADD KEY `livreurs_user_id_foreign` (`user_id`);

--
-- Index pour la table `managers`
--
ALTER TABLE `managers`
  ADD PRIMARY KEY (`id`),
  ADD KEY `managers_user_id_foreign` (`user_id`);

--
-- Index pour la table `migrations`
--
ALTER TABLE `migrations`
  ADD PRIMARY KEY (`id`);

--
-- Index pour la table `password_resets`
--
ALTER TABLE `password_resets`
  ADD KEY `password_resets_email_index` (`email`);

--
-- Index pour la table `products`
--
ALTER TABLE `products`
  ADD PRIMARY KEY (`id`),
  ADD KEY `products_shop_id_foreign` (`shop_id`),
  ADD KEY `products_category_id_foreign` (`category_id`);

--
-- Index pour la table `product_images`
--
ALTER TABLE `product_images`
  ADD PRIMARY KEY (`id`),
  ADD KEY `product_images_product_id_foreign` (`product_id`);

--
-- Index pour la table `roles`
--
ALTER TABLE `roles`
  ADD PRIMARY KEY (`id`);

--
-- Index pour la table `shops`
--
ALTER TABLE `shops`
  ADD PRIMARY KEY (`id`),
  ADD KEY `shops_user_id_foreign` (`user_id`);

--
-- Index pour la table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `users_email_unique` (`email`),
  ADD KEY `users_role_id_foreign` (`role_id`);

--
-- Index pour la table `vondeurs`
--
ALTER TABLE `vondeurs`
  ADD PRIMARY KEY (`id`),
  ADD KEY `vondeurs_user_id_foreign` (`user_id`);

--
-- AUTO_INCREMENT pour les tables déchargées
--

--
-- AUTO_INCREMENT pour la table `autorisations`
--
ALTER TABLE `autorisations`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=36;

--
-- AUTO_INCREMENT pour la table `categories`
--
ALTER TABLE `categories`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT pour la table `customers`
--
ALTER TABLE `customers`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT pour la table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT pour la table `livreurs`
--
ALTER TABLE `livreurs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT pour la table `managers`
--
ALTER TABLE `managers`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT pour la table `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- AUTO_INCREMENT pour la table `products`
--
ALTER TABLE `products`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT pour la table `product_images`
--
ALTER TABLE `product_images`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- AUTO_INCREMENT pour la table `roles`
--
ALTER TABLE `roles`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT pour la table `shops`
--
ALTER TABLE `shops`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT pour la table `users`
--
ALTER TABLE `users`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT pour la table `vondeurs`
--
ALTER TABLE `vondeurs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- Contraintes pour les tables déchargées
--

--
-- Contraintes pour la table `categories`
--
ALTER TABLE `categories`
  ADD CONSTRAINT `categories_parent_id_foreign` FOREIGN KEY (`parent_id`) REFERENCES `categories` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Contraintes pour la table `livreurs`
--
ALTER TABLE `livreurs`
  ADD CONSTRAINT `livreurs_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`);

--
-- Contraintes pour la table `managers`
--
ALTER TABLE `managers`
  ADD CONSTRAINT `managers_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`);

--
-- Contraintes pour la table `products`
--
ALTER TABLE `products`
  ADD CONSTRAINT `products_category_id_foreign` FOREIGN KEY (`category_id`) REFERENCES `categories` (`id`),
  ADD CONSTRAINT `products_shop_id_foreign` FOREIGN KEY (`shop_id`) REFERENCES `shops` (`id`);

--
-- Contraintes pour la table `product_images`
--
ALTER TABLE `product_images`
  ADD CONSTRAINT `product_images_product_id_foreign` FOREIGN KEY (`product_id`) REFERENCES `products` (`id`);

--
-- Contraintes pour la table `shops`
--
ALTER TABLE `shops`
  ADD CONSTRAINT `shops_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`);

--
-- Contraintes pour la table `users`
--
ALTER TABLE `users`
  ADD CONSTRAINT `users_role_id_foreign` FOREIGN KEY (`role_id`) REFERENCES `roles` (`id`);

--
-- Contraintes pour la table `vondeurs`
--
ALTER TABLE `vondeurs`
  ADD CONSTRAINT `vondeurs_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
