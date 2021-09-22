INSERT INTO `autorisations` (`id`, `name`, `autorisation_key`, `autorisation_description`, `is_parent`, `parent_id`, `created_at`, `updated_at`, `deleted_at`) VALUES
(1, 'les role', '', '', 1, 0, '2021-07-26 23:03:22', '2021-07-26 23:03:22', NULL),
(2, 'role', 'role.index', 'voir les roles', 0, 1, '2021-07-26 23:03:22', '2021-07-26 23:03:22', NULL),
(3, 'role', 'role.create', 'cree un noveau role', 0, 1, '2021-07-26 23:03:22', '2021-07-26 23:03:22', NULL),
(4, 'role', 'role.edit', 'editer les roles', 0, 1, '2021-07-26 23:03:22', '2021-07-26 23:03:22', NULL),
(5, 'role', 'role.destroy', 'supprimer les roles', 0, 1, '2021-07-26 23:03:22', '2021-07-26 23:03:22', NULL),
(6, 'les etulisateur', '', '', 1, 0, '2021-07-27 00:03:22', '2021-07-27 00:03:22', NULL),
(7, '', 'users.index', 'voir les users', 0, 6, '2021-07-27 00:03:22', '2021-07-27 00:03:22', NULL),
(8, '', 'users.edit', 'modifier les utilisateurs', 0, 6, '2021-07-27 00:03:22', '2021-07-27 00:03:22', NULL),
(9, '', 'users.create', 'cree des utilisateurs', 0, 6, '2021-07-27 00:03:22', '2021-07-27 00:03:22', NULL),
(10, '', 'users.destroy', 'supprimer les utilisateurs', 0, 6, '2021-07-27 00:03:22', '2021-07-27 00:03:22', NULL),
(11, 'les categories', '', '', 1, 0, '2021-07-26 23:03:22', '2021-07-26 23:03:22', NULL),
(12, '', 'category.index', 'voir les categories', 0, 11, '2021-07-26 23:03:22', '2021-07-26 23:03:22', NULL),
(13, '', 'category.create', 'cree une nouvelle categorie', 0, 11, '2021-07-26 23:03:22', '2021-07-26 23:03:22', NULL),
(14, '', 'category.edit', 'editer les categories', 0, 11, '2021-07-26 23:03:22', '2021-07-26 23:03:22', NULL),
(15, '', 'category.destroy', 'supprimer les categories', 0, 11, '2021-07-26 23:03:22', '2021-07-26 23:03:22', NULL),
(16, 'les produits', '', '', 1, 0, '2021-07-26 23:03:22', '2021-07-26 23:03:22', NULL),
(17, '', 'products.index', 'voir les produits', 0, 16, '2021-07-26 23:03:22', '2021-07-26 23:03:22', NULL),
(18, '', 'products.create', 'cree une nouvelle produits', 0, 16, '2021-07-26 23:03:22', '2021-07-26 23:03:22', NULL),
(19, '', 'products.edit', 'editer les produits', 0, 16, '2021-07-26 23:03:22', '2021-07-26 23:03:22', NULL),
(20, '', 'products.destroy', 'supprimer les produits', 0, 16, '2021-07-26 23:03:22', '2021-07-26 23:03:22', NULL),
(21, 'Administrateur', '', 'cet perrsone sera admin du site', 1, 0, '2021-08-24 11:11:55', '2021-08-24 11:11:55', NULL),
(22, '', 'Admin', '', 0, 21, '2021-08-24 11:11:55', '2021-08-24 11:11:55', NULL),
(23, 'manager', '', 'cet perrsone sera Manager', 1, 0, '2021-08-24 11:11:55', '2021-08-24 11:11:55', NULL),
(24, '', 'Manager', '', 0, 23, '2021-08-24 11:11:55', '2021-08-24 11:11:55', NULL),
(25, 'Vondeur', '', 'cet perrsone sera Vondeur', 1, 0, '2021-08-24 11:11:55', '2021-08-24 11:11:55', NULL),
(26, '', 'Vondeur', '', 0, 25, '2021-08-24 11:11:55', '2021-08-24 11:11:55', NULL),
(27, 'Livreur', '', 'cet perrsone sera Livreur', 1, 0, '2021-08-24 11:11:55', '2021-08-24 11:11:55', NULL),
(28, '', 'Livreur', '', 0, 27, '2021-08-24 11:11:55', '2021-08-24 11:11:55', NULL),
(29, 'Client', '', 'cet perrsone sera Client', 1, 0, '2021-08-24 11:11:55', '2021-08-24 11:11:55', NULL),
(30, '', 'Client', '', 0, 29, '2021-08-24 11:11:55', '2021-08-24 11:11:55', NULL),
(31, 'les magasins', '', 'managment des magasins', 1, 0, '2021-08-24 12:19:14', '2021-08-24 12:19:14', NULL),
(32, '', 'shops.index', 'voir les magasins', 0, 31, '2021-08-24 12:19:14', '2021-08-24 12:19:14', NULL),
(33, '', 'shops.create', 'cree new magasins', 0, 31, '2021-08-24 12:19:14', '2021-08-24 12:19:14', NULL),
(34, '', 'shops.destroy', 'supprimer magasins', 0, 31, '2021-08-24 12:19:14', '2021-08-24 12:19:14', NULL),
(35, '', 'shops.edit', 'modifier info des magasins', 0, 31, '2021-08-24 12:19:14', '2021-08-24 12:19:14', NULL),
(36, 'les villes', '', 'managment des villes', 1, 0, '2021-08-24 12:19:14', '2021-08-24 12:19:14', NULL),
(37, '', 'cities.index', 'voir les villes', 0, 36, '2021-08-24 12:19:14', '2021-08-24 12:19:14', NULL),
(38, '', 'cities.create', 'cree new villes', 0, 36, '2021-08-24 12:19:14', '2021-08-24 12:19:14', NULL),
(39, '', 'cities.destroy', 'supprimer villes', 0, 36, '2021-08-24 12:19:14', '2021-08-24 12:19:14', NULL),
(40, '', 'cities.edit', 'modifier info des villes', 0, 36, '2021-08-24 12:19:14', '2021-08-24 12:19:14', NULL),
(41, 'les ordres', '', 'managment des ordres', 1, 0, '2021-08-24 12:19:14', '2021-08-24 12:19:14', NULL),
(42, '', 'orders.index', 'voir les villes', 0, 41, '2021-08-24 12:19:14', '2021-08-24 12:19:14', NULL),
(43, '', 'orders.edit', 'editer new villes', 0, 41, '2021-08-24 12:19:14', '2021-08-24 12:19:14', NULL),
(44, 'les Livreur', '', 'managment delivery', 1, 0, '2021-08-24 12:19:14', '2021-08-24 12:19:14', NULL),
(45, '', 'delivery.index', 'voir les delivery', 0, 44, '2021-08-24 12:19:14', '2021-08-24 12:19:14', NULL),
(46, '', 'delivery.edit', 'editer livreurs', 0, 44, '2021-08-24 12:19:14', '2021-08-24 12:19:14', NULL),
(47, 'les Manager', '', 'managment Managers', 1, 0, '2021-08-24 12:19:14', '2021-08-24 12:19:14', NULL),
(48, '', 'managers.index', 'voir les managers', 0, 47, '2021-08-24 12:19:14', '2021-08-24 12:19:14', NULL),
(49, '', 'managers.create', 'create managers', 0, 47, '2021-08-24 12:19:14', '2021-08-24 12:19:14', NULL);

INSERT INTO `businesssettings` (`id`, `name`, `value`, `is_active`, `from`, `to`, `link`, `created_at`, `updated_at`) VALUES
(1, 'top_10_requested_products', '[]', 1, '0000-00-00 00:00:00', '0000-00-00 00:00:00', '', '0000-00-00 00:00:00', '2021-09-04 14:52:28'),
(2, 'disktop_top_annonce', 'top_anonces_barrs/1630781548top_barr.png', 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00', '-', '2021-09-04 14:52:38', '2021-09-04 14:52:28'),
(3, 'tablet_top_annonce', 'top_anonces_barrs/1630781558top_barr.png', 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00', '-', '2021-09-04 14:52:38', '2021-09-04 14:52:38'),
(4, 'phone_top_annonce', 'top_anonces_barrs/1630781569top_barr.png', 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00', '-', '2021-09-04 14:52:38', '2021-09-04 14:52:49'),
(5, 'Delivery_price_costumer_less_than_10_KM', '5', 1, NULL, NULL, NULL, NULL, NULL),
(6, 'Delivery_price_costumer_more_than_10KM', '2', 1, NULL, NULL, NULL, NULL, NULL),
(7, 'min_Delivery_price_costumer', '20', 1, NULL, NULL, NULL, NULL, NULL),
(8, 'Delivery_price_delivery_man_less_than_10_KM', '3.5', 1, NULL, NULL, NULL, NULL, NULL),
(9, 'Delivery_price_delivery_man_more_than_10_KM', '1.4', 1, NULL, NULL, NULL, NULL, NULL),
(10, 'min_Delivery_price_delivery_man', '14', 1, NULL, NULL, NULL, NULL, NULL),
(11, 'max_Delivery_price_costumer', '100', 1, NULL, NULL, NULL, NULL, NULL),
(12, 'max_Delivery_price_delivery_man', '80', 1, NULL, NULL, NULL, NULL, NULL);

INSERT INTO `categories` (`id`, `name`, `slug`, `description`, `picture`, `created_at`, `updated_at`, `deleted_at`, `parent_id`) VALUES
(1, 'Cuisine', 'cuisine', 'Category mere', 'categories/1630841687_9679d6087e_50164125_prix-cuisine.jpg', '2021-08-24 10:11:55', '2021-09-05 09:34:47', NULL, NULL),
(2, 'Beauté & Santé', 'beaute-sante', 'Beauté & Santé', 'categories/1630841775_le-collagene-lingredient-secret-pour-une-peau-jeune-et-en-bonne-sante.jpg', '2021-08-24 10:12:52', '2021-09-05 09:36:15', NULL, NULL),
(3, 'Vêtements & Chaussures', 'vetements-chaussures', 'Vêtements & Chaussures', 'categories/1630845547_75883190-denim-fashion-set-clothes-shoes-and-accessories-selective-focus-.jpg', NULL, '2021-09-05 10:39:08', NULL, NULL),
(4, 'category4', 'category4', 'this is category child4', '-', NULL, NULL, NULL, NULL),
(5, 'Poêles & Casseroles', 'poeles-casseroles', 'Poêles & Casseroles', 'categories/1630841378_184x184_1.png', '2021-09-05 09:29:38', '2021-09-05 09:29:38', NULL, 1),
(6, 'Cocottes', 'cocottes', 'Cocottes', 'categories/1630841414_184x184_2.png', '2021-09-05 09:30:14', '2021-09-05 09:30:14', NULL, 1),
(7, 'Ustensiles et Gadgets de Cuisine', 'ustensiles-et-gadgets-de-cuisine', 'Ustensiles et Gadgets de Cuisine', 'categories/1630841522_184x184_3.png', '2021-09-05 09:32:02', '2021-09-05 09:32:02', NULL, 1),
(8, 'Stockage Organisation', 'stockage-organisation', 'Stockage Des Aliments et Organisation de la Cuisine', 'categories/1630841612_184x184_4.png', '2021-09-05 09:33:32', '2021-09-05 09:33:32', NULL, 1),
(9, 'Soins Visage', 'soins-visage', 'Soins Visage', 'categories/1630841820_300x300_16.png', '2021-09-05 09:37:01', '2021-09-05 09:37:01', NULL, 2),
(10, 'Déodorants & Antitranspirants', 'deodorants-antitranspirants', 'Déodorants & Antitranspirants', 'categories/1630841891_300x300_7.png', '2021-09-05 09:38:11', '2021-09-05 09:38:11', NULL, 2),
(11, 'Bain & Douche', 'bain-douche', 'Bain & Douche', 'categories/1630841920_BainDouche.png', '2021-09-05 09:38:40', '2021-09-05 09:38:40', NULL, 2),
(12, 'Shampoings', 'shampoings', 'Shampoings', 'categories/1630841955_300x300_1.png', '2021-09-05 09:39:15', '2021-09-05 09:39:15', NULL, 2),
(13, 'Après-shampoing', 'apres-shampoing', 'Après-shampoing', 'categories/1630842006_ApresSHampMobile.png', '2021-09-05 09:40:06', '2021-09-05 09:40:06', NULL, 12),
(14, 'Appareils & Outils de Coiffure', 'appareils-outils-de-coiffure', 'Appareils & Outils de Coiffure', 'categories/1630842053_300x300_4.png', '2021-09-05 09:40:53', '2021-09-05 09:40:53', NULL, 2),
(15, 'Brosses à Cheveux', 'brosses-a-cheveux', 'Brosses à Cheveux', 'categories/1630842134_1.jpg', '2021-09-05 09:42:15', '2021-09-05 09:42:15', NULL, 14),
(16, 'Rasage et Épilation Homme', 'rasage-et-epilation-homme', 'Rasage et Épilation Homme', 'categories/1630842195_TondeusesMobile.png', '2021-09-05 09:43:15', '2021-09-05 09:43:15', NULL, 2),
(17, 'Après rasage', 'apres-rasage', 'Après rasage', 'categories/1630842253_1 (1).jpg', '2021-09-05 09:44:14', '2021-09-05 09:44:14', NULL, 16),
(18, 'Soins bucco-dentaires', 'soins-bucco-dentaires', 'Soins bucco-dentaires', 'categories/1630844545_300x300_10.png', '2021-09-05 10:22:25', '2021-09-05 10:22:25', NULL, 2),
(19, 'Cheveux', 'cheveux', 'Cheveux', 'categories/1630845159_Beauty_soin-de-cheveux_132x132.jpg', '2021-09-05 10:32:40', '2021-09-05 10:32:40', NULL, 2),
(20, 'Soins Des Cheveux', 'soins-des-cheveux', 'Soins Des Cheveux et Du Cuir Chevelu', 'categories/1630844640_300x300_3.png', '2021-09-05 10:24:00', '2021-09-05 10:24:00', NULL, 2),
(21, 'Maquillage', 'maquillage', 'Maquillage', 'categories/1630844838_Thumbnail_Health-_-Beauty_maquillage_132x132.jpg', '2021-09-05 10:27:18', '2021-09-05 10:27:18', NULL, 2),
(22, 'Parfums', 'parfums', 'Parfums', 'categories/1630844899_Parfums_132x132.jpg', '2021-09-05 10:28:20', '2021-09-05 10:28:20', NULL, 2),
(23, 'Soins Visage', 'soins-visage', 'Soins Visage', 'categories/1630844947_SoinsVisage-Desktop.png', '2021-09-05 10:29:07', '2021-09-05 10:29:07', NULL, 2),
(24, 'Corps & Bain', 'corps-bain', 'Corps & Bain', 'categories/1630845074_SoinsCorp-Desktop.png', '2021-09-05 10:31:14', '2021-09-05 10:31:14', NULL, 2),
(25, 'Coloration Cheveux', 'coloration-cheveux', 'Coloration Cheveux', NULL, '2021-09-05 10:23:02', '2021-09-05 10:35:49', NULL, 19),
(26, 'Santé & Premiers Soins', 'sante-premiers-soins', 'Santé & Premiers Soins', 'categories/1630845264_Freelink_Health-_-Beauty_MedicalSupplies_Equipment_132x132.jpg', '2021-09-05 10:34:24', '2021-09-05 10:34:24', NULL, 2),
(27, 'Vitamines', 'vitamines', 'Vitamines', 'categories/1630845300_Vitamines-Desktop.png', '2021-09-05 10:35:01', '2021-09-05 10:35:01', NULL, 2),
(28, 'Mode Homme', 'mode-homme', 'Mode Homme', 'categories/1630845648_184-man.jpg', '2021-09-05 10:40:49', '2021-09-05 10:40:49', NULL, 3),
(29, 'Mode Femme', 'mode-femme', 'Mode Femme', 'categories/1630845827_184-Woman.jpg', '2021-09-05 10:43:47', '2021-09-05 10:43:47', NULL, 3),
(30, 'Mode Enfants', 'mode-enfants', 'Mode Enfants', 'categories/1630845871_184-kidas.jpg', '2021-09-05 10:44:31', '2021-09-05 10:44:31', NULL, 3),
(31, 'Bagage et Sacs de Voyage', 'bagage-et-sacs-de-voyage', 'Bagage et Sacs de Voyage', 'categories/1630845922_184--bags.jpg', '2021-09-05 10:45:22', '2021-09-05 10:45:22', NULL, 3),
(32, 'T-Shirt', 't-shirt', 'T-Shirt', 'categories/1630846001_T-Shirt_D.png', '2021-09-05 10:46:41', '2021-09-05 10:46:41', NULL, 28),
(33, 'Shorts', 'shorts', 'Shorts', 'categories/1630846051_Maillot_de_bain_D.png', '2021-09-05 10:47:31', '2021-09-05 10:47:31', NULL, 28),
(34, 'Polos', 'polos', 'Polos', 'categories/1630846082_Polos_D.jpg', '2021-09-05 10:48:02', '2021-09-05 10:48:02', NULL, 28),
(35, 'Chemise', 'chemise', 'Chemise', 'categories/1630846134_Chemise_D.jpg', '2021-09-05 10:48:54', '2021-09-05 10:48:54', NULL, 28),
(36, 'Bermudas', 'bermudas', 'bermudas', 'categories/1630846183_Short_D.png', '2021-09-05 10:49:43', '2021-09-05 10:49:43', NULL, 28),
(37, 'Pantalon', 'pantalon', 'Pantalon', 'categories/1630846213_Pantalon_D.png', '2021-09-05 10:50:13', '2021-09-05 10:50:13', NULL, 28),
(38, 'Chaussures Homme', 'chaussures-homme', 'Chaussures Homme', 'categories/1630846250_Chaussures_D.png', '2021-09-05 10:50:50', '2021-09-05 10:50:50', NULL, 28),
(39, 'Sandales Homme', 'sandales-homme', 'Sandales Homme', 'categories/1630846287_Sandales_D.png', '2021-09-05 10:51:27', '2021-09-05 10:51:27', NULL, 28);


INSERT INTO `roles` (`id`, `name`, `permissions`, `created_at`, `updated_at`, `deleted_at`) VALUES
(1, 'admin', '["role.index","role.create","role.edit","role.destroy","users.index","users.edit","users.create","users.destroy","category.index","category.create","category.edit","category.destroy","products.index","products.create","products.edit","products.destroy","Admin","shops.index","shops.create","shops.destroy","shops.edit","cities.index","cities.create","cities.destroy","cities.edit","orders.index","orders.edit","delivery.index","delivery.edit","managers.index","managers.create"]', '2021-07-27 00:03:22', '2021-08-26 12:14:20', NULL),
(2, 'manager', '[\"Manager\"]', '2021-07-27 00:03:22', '2021-08-26 06:12:50', NULL),
(3, 'vondeur', '[\"category.index\",\"products.index\",\"products.create\",\"products.edit\",\"products.destroy\",\"Vondeur\"]', '2021-07-27 00:03:22', '2021-08-26 06:12:59', NULL),
(4, 'livreur', '[\"Livreur\"]', '2021-07-27 00:03:22', '2021-08-26 06:13:06', NULL),
(5, 'client', '[]', '2021-07-27 00:03:22', '2021-07-27 00:03:22', NULL),
(6, 'voircategorie', '[\"category.index\",\"category.create\",\"category.edit\",\"category.destroy\"]', '2021-08-18 18:46:39', '2021-08-18 18:46:39', NULL);


INSERT INTO `users` (`id`, `name`, `email`, `email_verified_at`, `password`, `phone`, `role_id`, `is_banned`, `remember_token`, `created_at`, `updated_at`, `deleted_at`) VALUES
(1, 'admin', 'admin@yahoo.com', NULL, '$2y$10$rIqF1C0Z8fPvogZjkVYvD.ygJiFzIF62ndrvOv5A2t9lnmivVqHzK', '0606060606', 1, 0, 'IKc0NGM6zTRESY0PGFD2r1NdCrrZrQzAfkyGU8U6dEnLS0aVVt9ZV9khoOR5', '2021-08-15 07:16:31', '2021-08-25 07:03:45', NULL);


INSERT INTO `cities` (`id`, `name`, `created_at`, `updated_at`, `deleted_at`) VALUES
(1, 'Agadir', '2021-08-18 15:12:57', '2021-08-18 15:12:57', NULL),
(2, 'Rabat', '2021-08-18 15:12:57', '2021-08-18 15:12:57', NULL),
(3, 'Ifran', '2021-08-18 15:12:57', '2021-08-18 15:12:57', NULL);

INSERT INTO `languages` (`id`, `name`, `key`, `rtl`, `image_path`, `created_at`, `updated_at`, `deleted_at`) VALUES
(1, 'english', 'en', 0, 'flags/en.png', NULL, NULL, NULL),
(2, 'francais', 'fr', 0, 'flags/fr.png', NULL, NULL, NULL),
(3, 'العربية', 'ar', 1, 'flags/ma.png', NULL, NULL, NULL);

INSERT INTO `sliders` (`id`, `laptop_path`, `link`, `position`, `click_counter`, `created_at`, `updated_at`) VALUES
(1, 'sliders_pc/1630839151laptop_path.jpg', 'llk', 0, '0', '2021-09-05 08:52:31', '2021-09-05 08:52:31');
