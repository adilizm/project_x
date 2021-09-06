
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
(35, '', 'shops.edit', 'modifier info des magasins', 0, 31, '2021-08-24 14:19:14', '2021-08-24 14:19:14', NULL),
(36, 'les villes', '', 'managment des villes', 1, 0, '2021-08-24 14:19:14', '2021-08-24 14:19:14', NULL),
(37, '', 'cities.index', 'voir les villes', 0, 36, '2021-08-24 14:19:14', '2021-08-24 14:19:14', NULL),
(38, '', 'cities.create', 'cree new villes', 0, 36, '2021-08-24 14:19:14', '2021-08-24 14:19:14', NULL),
(39, '', 'cities.destroy', 'supprimer villes', 0, 36, '2021-08-24 14:19:14', '2021-08-24 14:19:14', NULL),
(40, '', 'cities.edit', 'modifier info des villes', 0, 36, '2021-08-24 14:19:14', '2021-08-24 14:19:14', NULL);


INSERT INTO `languages`(`id`, `name`, `key`, `rtl`, `image_path`) VALUES 
('1','english','en','0','-'),
('2','francais','fr','0','-'),
('3','العربية','ar','1','-');

INSERT INTO `roles` (`id`, `name`, `permissions`, `created_at`, `updated_at`, `deleted_at`) VALUES
(1, 'admin', '[\"role.index\",\"role.create\",\"role.edit\",\"role.destroy\",\"users.index\",\"users.edit\",\"users.create\",\"users.destroy\",\"category.index\",\"category.create\",\"category.edit\",\"category.destroy\",\"products.index\",\"products.create\",\"products.edit\",\"products.destroy\",\"Admin\",\"shops.index\",\"shops.create\",\"shops.destroy\",\"shops.edit\"]', '2021-07-27 02:03:22', '2021-08-26 14:14:20', NULL),
(2, 'manager', '[\"Manager\"]', '2021-07-27 02:03:22', '2021-08-26 08:12:50', NULL),
(3, 'vondeur', '[\"category.index\",\"products.index\",\"products.create\",\"products.edit\",\"products.destroy\",\"Vondeur\"]', '2021-07-27 02:03:22', '2021-08-26 08:12:59', NULL),
(4, 'livreur', '[\"Livreur\"]', '2021-07-27 02:03:22', '2021-08-26 08:13:06', NULL),
(5, 'client', '[]', '2021-07-27 02:03:22', '2021-07-27 02:03:22', NULL),
(6, 'voircategorie', '[\"category.index\",\"category.create\",\"category.edit\",\"category.destroy\"]', '2021-08-18 20:46:39', '2021-08-18 20:46:39', NULL);

INSERT INTO `categories` (`id`, `name`, `slug`, `description`, `picture`, `created_at`, `updated_at`, `deleted_at`, `parent_id`) VALUES
(1, 'Test1', 'test1', 'testtesttesttesttesttesttesttesttesttesttesttesttesttesttesttesttesttesttesttesttesttesttesttest', 'categories/1629814314_Screenshot (15).png', '2021-08-24 12:11:55', '2021-08-24 12:11:55', NULL, NULL),
(2, 'TestCategory2', 'testcategory2', 'TestCategory2 Description', 'categories/1629814372_Screenshot (21).png', '2021-08-24 12:12:52', '2021-08-24 12:12:52', NULL, 1),
(3, 'child2', 'child-2', 'this is category child', '-', NULL, NULL, NULL, 1),
(4, 'child3', 'child-3', 'this is category child3', '-', NULL, NULL, NULL, 1);


INSERT INTO `users` (`id`, `name`, `email`, `email_verified_at`, `password`, `phone`, `role_id`, `remember_token`, `is_banned`, `created_at`, `updated_at`, `deleted_at`) VALUES
(1, 'admin', 'admin@yahoo.com', NULL, '$2y$10$rIqF1C0Z8fPvogZjkVYvD.ygJiFzIF62ndrvOv5A2t9lnmivVqHzK', '0606060606', 1, 'IKc0NGM6zTRESY0PGFD2r1NdCrrZrQzAfkyGU8U6dEnLS0aVVt9ZV9khoOR5', NULL, '2021-08-15 09:16:31', '2021-08-25 09:03:45', NULL),
(2, 'user test', 'test@test.ma', NULL, '$2y$10$nvbkKYGbHMXpMh540vCkU.Tdj8hVJlMmguYVHxXbFlGk1oRrdq3di', '0303030303', 3, 'DRdwsv3N6zgnmG24aSu8NevNu4abswlhqKC2V4GbZgX61Cwc4kYN24S9W3Qw', NULL, '2021-08-17 00:16:08', '2021-08-18 17:10:55', NULL),
(3, 'newvondeur asd', 'adilizmWya@asd.com', NULL, '$2y$10$3hasOCPswZdLEYicdoyePu7Yw/iN1URfh5ckYhkCRQq/azoyTmgi.', '0303030303', 3, NULL, 0, '2021-08-25 09:04:58', '2021-08-26 07:41:06', NULL),
(4, 'asada aasdas', 'tests@sada.asd', NULL, '$2y$10$BKifymwfrBvXftdJNlthcOJjhj0/VEdOQeVJqx0b/nPsBnPhEtXWS', '000000000000', 3, 'jmUWj6s28rCA6CmC25MO2BFzENjeUrs160b1J8Wy0CVhjNlJyn3gWDDRXKe3', 1, '2021-08-25 09:09:05', '2021-08-26 07:50:16', NULL),
(5, 'aasdasa asdasd', 'asda@asda.asd', NULL, '$2y$10$pvpj5bfj.EMmFzt0yvIWjOQaSkAGchZs7WbD/sz.F9dEl6aITw5cS', '0101010101', 3, 'sIVZl4Cc5kxUjBUpmCV2g0hMpBHXgLnXAJceOWoBm9P8gDVsrbWl2maN6Lso', NULL, '2021-08-25 09:10:38', '2021-08-25 09:10:38', NULL),
(6, 'Hassan Ousaid', 'hassan@maroc.ma', NULL, '$2y$10$UmBY8GIuEU48.lO8e7Z16ethzPiNkkpm8MSnZkTsNoN898FgQW2E.', '0909090909', 3, 'xfDQMlqrrBXxyvysOp8B5UayYdOc0oktyEb53e3xWj6BzCYsKxUqWdpEyJbO', NULL, '2021-08-25 09:26:08', '2021-08-25 09:26:08', NULL),
(7, 'Brahim Ousaid', 'brahim@ousaid.com', NULL, '$2y$10$CVWeQucKuK6JTghEtdrSI.eoKqq5RPouFEwJSrYqzxLbschpqMVtG', '8888888888', 3, 'QcEfDrozcqbDFK4Jj1TFRjzmatUwUKpP2ZjYPh3itDuakcIxsnJiaPWmVihB', NULL, '2021-08-25 09:32:16', '2021-08-25 09:32:16', NULL);


INSERT INTO `cities` (`id`, `name`, `created_at`, `updated_at`, `deleted_at`) VALUES
(1,'Agadir','2021-08-18 17:12:57', '2021-08-18 17:12:57', NULL),
(2,'Rabat','2021-08-18 17:12:57', '2021-08-18 17:12:57', NULL),
(3,'Ifran','2021-08-18 17:12:57', '2021-08-18 17:12:57', NULL);


INSERT INTO `shops` (`id`, `user_id`, `name`, `city_id`, `address`, `map_latitude`, `map_longitude`, `logo_path`, `description`, `is_published`, `created_at`, `updated_at`, `deleted_at`) VALUES
(1, 2, 'bi3shop', '1', 'hay sallam', '30.403141238623295', '-9.548317266209384', 'uploads/1629313976_pikatshu.png', 'description de la boutique description de la boutique description de la boutique description de la boutique description de la boutique description de la boutique description de la boutique', 0, '2021-08-18 17:12:57', '2021-08-18 17:12:57', NULL),
(2, 6, 'Hassan shop', '1', 'Hay sallam', '30.40351176649147', '-9.546338917147354', 'shops/1629887322_bc20f7eccc94c8dc710fb071e4cf175f.jpg', 'Hassan shop is a really good shop wher you can make everything better from digital marketing to making breakfast', 0, '2021-08-25 09:28:42', '2021-08-25 09:28:42', NULL),
(8, 7, 'BrahimShop', '3', 'Hay dakhla', '30.4169008', '-9.5577297', 'shops/1629887964_c58d3620ac2aa2193440c40e61d0f49f.jpg', 'Je suis brahim i have a chop that really helps you visit me', 0, '2021-08-25 09:39:24', '2021-08-25 09:39:24', '2021-08-02 11:08:10');

INSERT INTO `products` (`id`, `shop_id`, `category_id`, `name`, `slug`, `description`, `prix`, `unite`, `min_quantity`, `keywords`, `variants`, `status`, `confermed`, `created_at`, `updated_at`, `deleted_at`) VALUES
(2, 1, 2, 'test -product updated name', 'test-product-updated-name', '<p>test -product<br></p>', '120', 'mm', 1, '[\"light\",\"lights\"]', '[{\"color\":\"red\",\"longeur\":\"2m\",\"qty\":\"20\",\"prix\":\"200\",\"image\":\"variants_pic\\/1629986266_test -product updated name_0.jpg\"},{\"color\":\"red\",\"longeur\":\"3m\",\"qty\":\"30\",\"prix\":\"300\",\"image\":\"variants_pic\\/1629986282_test -product updated name_1.jpg\"},{\"color\":\"red\",\"longeur\":\"6m\",\"qty\":\"40\",\"prix\":\"400\",\"image\":\"variants_pic\\/1629986299_test -product updated name_2.jpg\"},{\"color\":\"bleu\",\"longeur\":\"2m\",\"qty\":\"20\",\"prix\":\"200\",\"image\":\"variants_pic\\/1629986282_test -product updated name_3.jpg\"},{\"color\":\"bleu\",\"longeur\":\"3m\",\"qty\":\"30\",\"prix\":\"300\",\"image\":\"variants_pic\\/1629985023_test -product updated name_1.jpg\"},{\"color\":\"bleu\",\"longeur\":\"6m\",\"qty\":\"40\",\"prix\":\"400\",\"image\":null},{\"color\":\"green\",\"longeur\":\"2m\",\"qty\":\"20\",\"prix\":\"200\",\"image\":\"variants_pic\\/1629986299_test -product updated name_6.jpg\"},{\"color\":\"green\",\"longeur\":\"3m\",\"qty\":\"30\",\"prix\":\"300\",\"image\":\"variants_pic\\/1629986299_test -product updated name_7.jpg\"},{\"color\":\"green\",\"longeur\":\"6m\",\"qty\":\"40\",\"prix\":\"400\",\"image\":null}]', 'new', 0, '2021-08-24 14:19:14', '2021-08-26 12:58:19', NULL),
(3, 1, 2, 'Chancellor Owens updated', 'chancellor-owens-updated', 'Chancellor Owens updated&nbsp;Chancellor Owens updated&nbsp;Chancellor Owens updated&nbsp;Chancellor Owens updated', '199', 'metre', 1, '[\"t-shirt\",\"Ex dolorem incidunt\"]', '[{\"color\":\"red\",\"type\":\"2m\",\"qty\":\"20\",\"prix\":\"250\",\"image\":\"variants_pic\\/1629986266_test -product updated name_0.jpg\"},{\"color\":\"red\",\"type\":\"3m\",\"qty\":\"30\",\"prix\":\"300\",\"image\":\"variants_pic\\/1629986282_test -product updated name_1.jpg\"},{\"color\":\"red\",\"type\":\"6m\",\"qty\":\"40\",\"prix\":\"400\",\"image\":\"variants_pic\\/1629986299_test -product updated name_2.jpg\"},{\"color\":\"bleu\",\"type\":\"2m\",\"qty\":\"20\",\"prix\":\"200\",\"image\":\"variants_pic\\/1629986282_test -product updated name_3.jpg\"},{\"color\":\"bleu\",\"type\":\"3m\",\"qty\":\"30\",\"prix\":\"300\",\"image\":\"variants_pic\\/1629985023_test -product updated name_1.jpg\"},{\"color\":\"bleu\",\"type\":\"6m\",\"qty\":\"40\",\"prix\":\"400\",\"image\":\"variants_pic\\/1629989030_Chancellor Owens updated_5.png\"},{\"color\":\"green\",\"type\":\"2m\",\"qty\":\"20\",\"prix\":\"200\",\"image\":\"variants_pic\\/1629986299_test -product updated name_6.jpg\"},{\"color\":\"green\",\"type\":\"3m\",\"qty\":\"30\",\"prix\":\"300\",\"image\":\"variants_pic\\/1629986299_test -product updated name_7.jpg\"},{\"color\":\"green\",\"type\":\"6m\",\"qty\":\"40\",\"prix\":\"400\",\"image\":\"variants_pic\\/1629986361_Chancellor Owens_8.png\"}]', 'new', 0, '2021-08-26 12:42:08', '2021-08-26 13:43:50', NULL);

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

INSERT INTO `vondeurs` (`id`, `user_id`, `is_active`, `deleted_at`, `created_at`, `updated_at`) VALUES
(1, 4, 1, NULL, '2021-08-25 09:09:05', '2021-08-25 09:09:05'),
(2, 5, 1, NULL, '2021-08-25 09:10:38', '2021-08-25 09:10:38'),
(3, 6, 1, NULL, '2021-08-25 09:26:08', '2021-08-25 09:26:08'),
(4, 7, 1, NULL, '2021-08-25 09:32:16', '2021-08-25 09:32:16');

INSERT INTO `businesssettings` (`id`, `name`, `value`, `is_active`, `from`, `to`, `link`, `created_at`, `updated_at`) VALUES
(1, 'top_10_requested_products', '[]', 1, '', '', '', '0000-00-00 00:00:00', '2021-09-04 17:52:28'),
(2, 'disktop_top_annonce', 'top_anonces_barrs/1630781548top_barr.png', 0, '', '', '-',  '2021-09-04 17:52:38', '2021-09-04 17:52:28'),
(3, 'tablet_top_annonce', 'top_anonces_barrs/1630781558top_barr.png', 0, '', '', '-',  '2021-09-04 17:52:38', '2021-09-04 17:52:38'),
(4, 'phone_top_annonce', 'top_anonces_barrs/1630781569top_barr.png', 0, '', '', '-',  '2021-09-04 17:52:38', '2021-09-04 17:52:49');
