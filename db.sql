SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";

/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;


DROP TABLE IF EXISTS `article`;
CREATE TABLE `article` (
  `id` int(11) NOT NULL,
  `user_id` int(11) DEFAULT NULL,
  `rubrique_id` int(11) DEFAULT NULL,
  `titre` varchar(255) NOT NULL,
  `contenu` longtext DEFAULT NULL,
  `date_article` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

DROP TABLE IF EXISTS `categorie`;
CREATE TABLE `categorie` (
  `id` int(11) NOT NULL,
  `nom` varchar(255) NOT NULL,
  `description` longtext NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

DROP TABLE IF EXISTS `doctrine_migration_versions`;
CREATE TABLE `doctrine_migration_versions` (
  `version` varchar(191) NOT NULL,
  `executed_at` datetime DEFAULT NULL,
  `execution_time` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

INSERT INTO `doctrine_migration_versions` (`version`, `executed_at`, `execution_time`) VALUES
('DoctrineMigrations\\Version20240319110730', '2024-03-19 12:07:37', 178),
('DoctrineMigrations\\Version20240319110824', '2024-03-19 12:08:29', 115),
('DoctrineMigrations\\Version20240321094045', '2024-03-21 10:41:00', 82),
('DoctrineMigrations\\Version20240321104523', '2024-03-21 11:45:28', 36),
('DoctrineMigrations\\Version20240321110847', '2024-03-21 12:08:53', 110),
('DoctrineMigrations\\Version20240321141507', '2024-03-21 15:15:32', 31),
('DoctrineMigrations\\Version20240321142220', '2024-03-21 15:22:24', 37),
('DoctrineMigrations\\Version20240322095221', '2024-03-22 10:52:39', 282),
('DoctrineMigrations\\Version20240324152354', '2024-03-24 16:24:11', 90),
('DoctrineMigrations\\Version20240402170235', '2024-04-02 19:02:39', 308),
('DoctrineMigrations\\Version20240402171354', '2024-04-02 19:13:59', 1472),
('DoctrineMigrations\\Version20240402194839', '2024-04-02 21:48:46', 87),
('DoctrineMigrations\\Version20240402195735', '2024-04-02 21:57:40', 60),
('DoctrineMigrations\\Version20240402201516', '2024-04-02 22:15:22', 30),
('DoctrineMigrations\\Version20240403075513', '2024-04-03 09:55:22', 829),
('DoctrineMigrations\\Version20240403114453', '2024-04-03 13:44:59', 31),
('DoctrineMigrations\\Version20240403160145', '2024-04-03 18:01:55', 82),
('DoctrineMigrations\\Version20240407175027', '2024-04-07 19:50:33', 138),
('DoctrineMigrations\\Version20240409115400', '2024-04-09 13:54:10', 130);

DROP TABLE IF EXISTS `entrainer`;
CREATE TABLE `entrainer` (
  `id` int(11) NOT NULL,
  `equipe_id` int(11) DEFAULT NULL,
  `user_id` int(11) DEFAULT NULL,
  `statut` varchar(255) NOT NULL,
  `saison` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

DROP TABLE IF EXISTS `equipe`;
CREATE TABLE `equipe` (
  `id` int(11) NOT NULL,
  `nom` varchar(255) NOT NULL,
  `categorie` varchar(255) NOT NULL,
  `championnat` varchar(255) NOT NULL,
  `image_name` varchar(255) NOT NULL,
  `total_point` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

INSERT INTO `equipe` (`id`, `nom`, `categorie`, `championnat`, `image_name`, `total_point`) VALUES
(294, 'Football Club Six-fours', 'Seniors', 'Régional 1', 'af569cac9a4381487c1b8e4322ad0b3c33fcaa85.png', NULL),
(295, 'Hyeres Football Club', 'Seniors', 'Régional 1', '119.jpg', NULL),
(296, 'Sporting Club Toulon', 'Seniors', 'Régional 1', '81-660d81891caa9078444337.jpg', NULL),
(297, 'Football Club Seynois', 'Seniors', 'Régional 1', '123.jpg', NULL),
(298, 'Avenir Sportif Mar-vivo', 'Seniors', 'Régional 1', '286.jpg', NULL),
(299, 'Athlétique Club Berthe', 'Seniors', 'Régional 1', '702.jpg', NULL),
(300, 'Toulon Elite Football', 'Seniors', 'Régional 1', '234.jpg', NULL),
(301, 'Gardia Club-Football', 'Seniors', 'Régional 1', '703.jpg', NULL),
(302, 'Ollioules Olympique', 'Seniors', 'Régional 1', '816.jpg', NULL),
(303, 'Racing Club Toulon', 'Seniors', 'Régional 1', '23.jpg', NULL);

DROP TABLE IF EXISTS `joueur`;
CREATE TABLE `joueur` (
  `id` int(11) NOT NULL,
  `equipe_id` int(11) DEFAULT NULL,
  `nom` varchar(255) NOT NULL,
  `prenom` varchar(255) NOT NULL,
  `date_naissance` date NOT NULL,
  `numero` int(11) NOT NULL,
  `poste` varchar(255) NOT NULL,
  `numero_licence` int(11) DEFAULT NULL,
  `carton_jaune` int(11) NOT NULL,
  `carton_rouge` int(11) NOT NULL,
  `match_joue` int(11) NOT NULL,
  `nbr_passe` int(11) DEFAULT NULL,
  `nbr_passe_decisif` int(11) DEFAULT NULL,
  `nbr_tir` int(11) DEFAULT NULL,
  `nbr_but` int(11) DEFAULT NULL,
  `arret_gardien` int(11) DEFAULT NULL,
  `but_encaisser` int(11) DEFAULT NULL,
  `penalty_dispute` int(11) DEFAULT NULL,
  `penalty_arrete` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

INSERT INTO `joueur` (`id`, `equipe_id`, `nom`, `prenom`, `date_naissance`, `numero`, `poste`, `numero_licence`, `carton_jaune`, `carton_rouge`, `match_joue`, `nbr_passe`, `nbr_passe_decisif`, `nbr_tir`, `nbr_but`, `arret_gardien`, `but_encaisser`, `penalty_dispute`, `penalty_arrete`) VALUES
(1, 294, 'Maignan', 'mike', '1995-02-01', 1, 'Gardien', 123456, 2, 1, 26, 260, 0, 0, 0, 82, 16, 3, 1),
(2, 294, 'Rosier', 'Marc', '2001-07-05', 21, 'Gardien', 123457, 1, 0, 6, 23, 0, 0, 0, 16, 3, 1, 0),
(3, 294, 'Caldara', 'Valentin', '1999-05-03', 2, 'Gardien', 123458, 0, 0, 2, 11, 0, 0, 0, 4, 0, 0, 0);

DROP TABLE IF EXISTS `messenger_messages`;
CREATE TABLE `messenger_messages` (
  `id` bigint(20) NOT NULL,
  `body` longtext NOT NULL,
  `headers` longtext NOT NULL,
  `queue_name` varchar(190) NOT NULL,
  `created_at` datetime NOT NULL COMMENT '(DC2Type:datetime_immutable)',
  `available_at` datetime NOT NULL COMMENT '(DC2Type:datetime_immutable)',
  `delivered_at` datetime DEFAULT NULL COMMENT '(DC2Type:datetime_immutable)'
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

DROP TABLE IF EXISTS `opposition`;
CREATE TABLE `opposition` (
  `id` int(11) NOT NULL,
  `date` date DEFAULT NULL,
  `equipe1_id` int(11) NOT NULL,
  `equipe2_id` int(11) NOT NULL,
  `score_equipe1` int(11) DEFAULT NULL,
  `score_equipe2` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

INSERT INTO `opposition` (`id`, `date`, `equipe1_id`, `equipe2_id`, `score_equipe1`, `score_equipe2`) VALUES
(97, '2023-08-26', 294, 295, 3, 2),
(98, '2023-09-02', 294, 296, 2, 1),
(99, '2023-09-09', 297, 294, 1, 1),
(100, '2023-09-30', 294, 298, 1, 2),
(101, '2023-10-27', 299, 294, 0, 4),
(102, '2023-11-24', 294, 300, 3, 2),
(103, '2024-04-14', 301, 294, 2, 2),
(104, '2024-01-13', 302, 294, 0, 0),
(105, '2024-02-10', 303, 294, 2, 0),
(106, '2023-09-16', 295, 294, 1, 2),
(107, '2023-09-24', 296, 295, 1, 0),
(108, '2023-10-14', 295, 297, 3, 1),
(109, '2023-11-05', 295, 298, 2, 2),
(110, '2023-11-19', 299, 295, 2, 5),
(111, '2023-11-26', 295, 301, 3, 0),
(112, '2023-12-16', 302, 295, 3, 3),
(113, '2024-01-13', 295, 303, 2, 0),
(114, '2023-11-12', 296, 294, 4, 4),
(115, '2023-12-02', 295, 296, 1, 1),
(116, '2023-12-10', 296, 297, 5, 2),
(117, '2023-12-17', 296, 298, 1, 0),
(118, '2023-12-20', 296, 299, 2, 1),
(119, '2024-01-06', 296, 300, 3, 3),
(120, '2024-01-21', 301, 296, 3, 0),
(121, '2024-02-04', 296, 302, 2, 2),
(122, '2024-03-09', 296, 303, 5, 2),
(123, '2023-10-22', 297, 294, 3, 3),
(124, '2023-10-25', 295, 297, 1, 0),
(125, '2023-11-04', 297, 296, 2, 1),
(126, '2023-11-18', 297, 298, 2, 2),
(127, '2023-12-10', 299, 297, 3, 3),
(128, '2023-12-27', 297, 300, 1, 1),
(129, '2024-01-07', 297, 301, 0, 4),
(130, '2024-01-28', 297, 302, 3, 1),
(131, '2024-02-21', 303, 297, 0, 0),
(132, '2023-10-15', 298, 294, 1, 4),
(133, '2023-11-11', 295, 298, 0, 0),
(134, '2023-11-26', 298, 296, 1, 0),
(135, '2023-12-02', 298, 297, 3, 3),
(136, '2024-01-06', 299, 298, 3, 2),
(137, '2024-01-21', 298, 300, 2, 0),
(138, '2024-02-17', 301, 298, 1, 1),
(139, '2024-02-28', 298, 303, 2, 6),
(140, '2024-03-13', 302, 298, 4, 4),
(141, '2023-11-22', 299, 294, 0, 0),
(142, '2023-12-06', 295, 299, 2, 2),
(143, '2023-12-27', 299, 296, 1, 2),
(144, '2024-01-10', 299, 297, 3, 2),
(145, '2024-01-21', 299, 298, 1, 1),
(146, '2024-01-28', 300, 299, 2, 3),
(147, '2024-02-18', 299, 301, 0, 0),
(148, '2024-02-25', 299, 302, 1, 0),
(149, '2024-03-10', 299, 303, 2, 2),
(150, '2023-11-26', 300, 294, 3, 3),
(151, '2023-11-26', 295, 300, 1, 2),
(152, '2023-12-30', 300, 296, 3, 5),
(153, '2024-01-10', 300, 297, 2, 2),
(154, '2024-01-28', 300, 298, 2, 2),
(155, '2024-02-04', 299, 300, 1, 0),
(156, '2024-02-11', 300, 301, 2, 3),
(157, '2024-03-09', 300, 302, 3, 3),
(158, '2024-03-20', 300, 303, 0, 1),
(159, '2023-11-29', 301, 294, 5, 4),
(160, '2023-12-02', 295, 301, 0, 0),
(161, '2023-12-14', 301, 296, 1, 3),
(162, '2024-01-03', 301, 297, 3, 3),
(163, '2024-01-24', 301, 298, 1, 4),
(164, '2024-01-31', 299, 301, 2, 6),
(165, '2024-02-18', 301, 300, 2, 2),
(166, '2024-03-01', 301, 302, 1, 0),
(167, '2024-03-27', 301, 303, 2, 2),
(168, '2023-12-04', 302, 294, 3, 0),
(169, '2023-12-12', 295, 302, 1, 0),
(170, '2023-12-25', 302, 296, 0, 0),
(171, '2024-01-04', 302, 297, 1, 1),
(172, '2024-01-19', 302, 298, 2, 3),
(173, '2024-02-09', 299, 302, 1, 1),
(174, '2024-02-24', 302, 300, 1, 0),
(175, '2024-02-28', 302, 301, 0, 1),
(176, '2024-03-06', 303, 302, 2, 0),
(177, '2024-01-27', 303, 294, 0, 5),
(178, '2024-01-03', 295, 303, 1, 1),
(179, '2024-01-13', 303, 296, 2, 4),
(180, '2024-01-18', 303, 297, 1, 1),
(181, '2024-02-07', 303, 298, 2, 1),
(182, '2024-02-10', 303, 299, 3, 3),
(183, '2024-03-02', 300, 303, 2, 2),
(184, '2024-03-17', 301, 303, 0, 0),
(185, '2024-03-20', 303, 302, 1, 0),
(186, '2024-04-16', 296, 294, 3, 7),
(187, '2024-04-27', 294, 302, 2, 0);

DROP TABLE IF EXISTS `rubrique`;
CREATE TABLE `rubrique` (
  `id` int(11) NOT NULL,
  `categorie_id` int(11) DEFAULT NULL,
  `nom` varchar(255) NOT NULL,
  `description` longtext NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

DROP TABLE IF EXISTS `user`;
CREATE TABLE `user` (
  `id` int(11) NOT NULL,
  `email` varchar(180) NOT NULL,
  `roles` longtext CHARACTER SET utf8mb4 COLLATE utf8mb4_bin NOT NULL COMMENT '(DC2Type:json)' CHECK (json_valid(`roles`)),
  `password` varchar(255) NOT NULL,
  `prenom` varchar(255) NOT NULL,
  `ville` varchar(255) NOT NULL,
  `nom` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

INSERT INTO `user` (`id`, `email`, `roles`, `password`, `prenom`, `ville`, `nom`) VALUES
(7, 'sabrichaf@gmail.com', '[\"ROLE_ADMIN\"]', '$2y$13$Tckoba321YI8wboypGGd6u43KaazbHPR1PzipkfgEaimK1IFafiNW', 'Sabri', 'La Seyne-sur-Mer', 'Chafroud'),
(8, 'Mustapha_mabrouk@dev.com', '[]', '$2y$13$hhAlqfTFxCIWsuvLV5ykue/OrtAN2WDvxsCvlIi.xi3E4IF8AhZbO', 'Mustapha', 'Marseille', 'Mabrouk'),
(9, 'nadia.h@hotmail.fr', '[]', '$2y$13$etSDJLxFgz5FJiMTsmnCUusSdoRgtNUhHUc1g.R3kKwZhfB9Ae5lS', 'nadia', 'Marseille', 'Hamiche');


ALTER TABLE `article`
  ADD PRIMARY KEY (`id`),
  ADD KEY `IDX_23A0E66A76ED395` (`user_id`),
  ADD KEY `IDX_23A0E663BD38833` (`rubrique_id`);

ALTER TABLE `categorie`
  ADD PRIMARY KEY (`id`);

ALTER TABLE `doctrine_migration_versions`
  ADD PRIMARY KEY (`version`);

ALTER TABLE `entrainer`
  ADD PRIMARY KEY (`id`),
  ADD KEY `IDX_6DE5B5926D861B89` (`equipe_id`),
  ADD KEY `IDX_6DE5B592A76ED395` (`user_id`);

ALTER TABLE `equipe`
  ADD PRIMARY KEY (`id`);

ALTER TABLE `joueur`
  ADD PRIMARY KEY (`id`),
  ADD KEY `IDX_FD71A9C56D861B89` (`equipe_id`);

ALTER TABLE `messenger_messages`
  ADD PRIMARY KEY (`id`),
  ADD KEY `IDX_75EA56E0FB7336F0` (`queue_name`),
  ADD KEY `IDX_75EA56E0E3BD61CE` (`available_at`),
  ADD KEY `IDX_75EA56E016BA31DB` (`delivered_at`);

ALTER TABLE `opposition`
  ADD PRIMARY KEY (`id`),
  ADD KEY `IDX_10CBCFC24265900C` (`equipe1_id`),
  ADD KEY `IDX_10CBCFC250D03FE2` (`equipe2_id`);

ALTER TABLE `rubrique`
  ADD PRIMARY KEY (`id`),
  ADD KEY `IDX_8FA4097CBCF5E72D` (`categorie_id`);

ALTER TABLE `user`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `UNIQ_IDENTIFIER_EMAIL` (`email`);


ALTER TABLE `article`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

ALTER TABLE `categorie`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

ALTER TABLE `entrainer`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

ALTER TABLE `equipe`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=304;

ALTER TABLE `joueur`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

ALTER TABLE `messenger_messages`
  MODIFY `id` bigint(20) NOT NULL AUTO_INCREMENT;

ALTER TABLE `opposition`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=188;

ALTER TABLE `rubrique`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

ALTER TABLE `user`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;


ALTER TABLE `article`
  ADD CONSTRAINT `FK_23A0E663BD38833` FOREIGN KEY (`rubrique_id`) REFERENCES `rubrique` (`id`),
  ADD CONSTRAINT `FK_23A0E66A76ED395` FOREIGN KEY (`user_id`) REFERENCES `user` (`id`);

ALTER TABLE `entrainer`
  ADD CONSTRAINT `FK_6DE5B5926D861B89` FOREIGN KEY (`equipe_id`) REFERENCES `equipe` (`id`),
  ADD CONSTRAINT `FK_6DE5B592A76ED395` FOREIGN KEY (`user_id`) REFERENCES `user` (`id`);

ALTER TABLE `joueur`
  ADD CONSTRAINT `FK_FD71A9C56D861B89` FOREIGN KEY (`equipe_id`) REFERENCES `equipe` (`id`);

ALTER TABLE `opposition`
  ADD CONSTRAINT `FK_10CBCFC24265900C` FOREIGN KEY (`equipe1_id`) REFERENCES `equipe` (`id`),
  ADD CONSTRAINT `FK_10CBCFC250D03FE2` FOREIGN KEY (`equipe2_id`) REFERENCES `equipe` (`id`);

ALTER TABLE `rubrique`
  ADD CONSTRAINT `FK_8FA4097CBCF5E72D` FOREIGN KEY (`categorie_id`) REFERENCES `categorie` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
