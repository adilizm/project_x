
INSERT INTO `autorisations` (`id`, `name`, `autorisation_key`, `autorisation_description`, `is_parent`, `parent_id`, `created_at`, `updated_at`, `deleted_at`) VALUES
(1, 'les role', '', '', 1, 0, '2021-07-27 02:03:22', '2021-07-27 02:03:22', NULL),
(2, 'role', 'role.index', 'voir les roles', 0, 1, '2021-07-27 02:03:22', '2021-07-27 02:03:22', NULL),
(3, 'role', 'role.create', 'cree un noveau role', 0, 1, '2021-07-27 02:03:22', '2021-07-27 02:03:22', NULL),
(4, 'role', 'role.edit', 'editer les roles', 0, 1, '2021-07-27 02:03:22', '2021-07-27 02:03:22', NULL),
(5, 'role', 'role.destroy', 'supprimer les roles', 0, 1, '2021-07-27 02:03:22', '2021-07-27 02:03:22', NULL),
(6, 'les etulisateur', '', '', 1, 0, '2021-07-27 03:03:22', '2021-07-27 03:03:22', NULL),
(7, '', 'users.index', 'voir les users', 0, 6, '2021-07-27 03:03:22', '2021-07-27 03:03:22', NULL),
(8, '', 'users.edit', 'modifier les utilisateurs', 0, 6, '2021-07-27 03:03:22', '2021-07-27 03:03:22', NULL),
(9, '', 'users.create', 'cree des utilisateurs', 0, 6, '2021-07-27 03:03:22', '2021-07-27 03:03:22', NULL),
(10, '', 'users.destroy', 'supprimer les utilisateurs', 0, 6, '2021-07-27 03:03:22', '2021-07-27 03:03:22', NULL),
(11, 'les categories', '', '', 1, 0, '2021-07-27 02:03:22', '2021-07-27 02:03:22', NULL),
(12, '', 'category.index', 'voir les categories', 0, 11, '2021-07-27 02:03:22', '2021-07-27 02:03:22', NULL),
(13, '', 'category.create', 'cree une nouvelle categorie', 0, 11, '2021-07-27 02:03:22', '2021-07-27 02:03:22', NULL),
(14, '', 'category.edit', 'editer les categories', 0, 11, '2021-07-27 02:03:22', '2021-07-27 02:03:22', NULL),
(15, '', 'category.destroy', 'supprimer les categories', 0, 11, '2021-07-27 02:03:22', '2021-07-27 02:03:22', NULL);

INSERT INTO `categories` (`id`, `name`, `slug`, `parent_id`, `description`, `picture`, `created_at`, `updated_at`, `deleted_at`) VALUES
(1, 'unicorn', 'unicorn', NULL, 'this is a new category id', 'categories/1629332973_e09d0aeaa1bf41189f01382e265bd270.png', '2021-08-18 23:29:33', '2021-08-18 23:29:33', NULL);

INSERT INTO `roles` (`id`, `name`, `permissions`, `created_at`, `updated_at`, `deleted_at`) VALUES
(1, 'admin', '[\"role.index\",\"role.create\",\"role.edit\",\"role.destroy\",\"users.index\",\"users.edit\",\"users.create\",\"users.destroy\",\"category.index\",\"category.create\",\"category.edit\",\"category.destroy\"]', '2021-07-27 03:03:22', '2021-08-18 21:47:10', NULL),
(2, 'manager', '[]', '2021-07-27 03:03:22', '2021-07-27 03:03:22', NULL),
(3, 'vondeur', '[]', '2021-07-27 03:03:22', '2021-08-17 02:29:25', NULL),
(4, 'livreur', '[]', '2021-07-27 03:03:22', '2021-07-27 03:03:22', NULL),
(5, 'client', '[]', '2021-07-27 03:03:22', '2021-07-27 03:03:22', NULL),
(6, 'voircategorie', '[\"category.index\",\"category.create\",\"category.edit\",\"category.destroy\"]', '2021-08-18 21:46:39', '2021-08-18 21:46:39', NULL);

INSERT INTO `users` (`id`, `name`, `email`, `email_verified_at`, `password`, `phone`, `role_id`, `remember_token`, `created_at`, `updated_at`, `deleted_at`) VALUES
(1, 'admin', 'admin@yahoo.com', NULL, '$2y$10$rIqF1C0Z8fPvogZjkVYvD.ygJiFzIF62ndrvOv5A2t9lnmivVqHzK', '0606060606', 1, 'NPyI0ZKegHK7Km6VeaBUcYTggySDRxR7Dt1W8xvssbSGldSco2HZSpgI2ZRt', '2021-08-15 10:16:31', '2021-08-18 18:08:36', NULL),
(2, 'user test', 'test@test.ma', NULL, '$2y$10$nvbkKYGbHMXpMh540vCkU.Tdj8hVJlMmguYVHxXbFlGk1oRrdq3di', '0303030303', 3, 'UflJIl36180NmIuJs5zqcslGsrHNYZ4yeL7M63ZjoKTYTGMSoh9sPhQpKnkA', '2021-08-17 01:16:08', '2021-08-18 18:10:55', NULL);

INSERT INTO `shops` (`id`, `user_id`, `name`, `Ville`, `address`, `map_latitude`, `map_longitude`, `logo_path`, `description`, `created_at`, `updated_at`, `deleted_at`) VALUES
(1, 1, 'bi3shop', 'agadir', 'hay sallam', '30.403141238623295', '-9.548317266209384', 'uploads/1629313976_pikatshu.png', 'description de la boutique description de la boutique description de la boutique description de la boutique description de la boutique description de la boutique description de la boutique', '2021-08-18 18:12:57', '2021-08-18 18:12:57', NULL);
