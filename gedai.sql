-- phpMyAdmin SQL Dump
-- version 5.0.4
-- https://www.phpmyadmin.net/
--
-- Hôte : localhost:3306
-- Généré le : mar. 23 fév. 2021 à 06:14
-- Version du serveur :  5.7.24
-- Version de PHP : 7.2.19

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de données : `gedai`
--

-- --------------------------------------------------------

--
-- Structure de la table `beneficiaires`
--

CREATE TABLE `beneficiaires` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `type_beneficiaire_id` int(11) NOT NULL,
  `nom` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `prenom` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `organisme` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `adresse` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `tel_fixe` int(11) NOT NULL,
  `tel_mobile` int(11) NOT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `etat` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Déchargement des données de la table `beneficiaires`
--

INSERT INTO `beneficiaires` (`id`, `created_at`, `updated_at`, `type_beneficiaire_id`, `nom`, `prenom`, `organisme`, `adresse`, `tel_fixe`, `tel_mobile`, `email`, `etat`) VALUES
(1, '2021-01-27 02:41:25', '2021-02-08 08:54:39', 4, 'Doe', 'John', 'CCAS Saint-Louis', '1 rue je ne sais pas quoi', 123456, 123456, 'johndoe@mail.com', '1'),
(2, '2021-02-05 04:41:15', '2021-02-08 09:03:49', 1, 'Marie', 'Toinette', 'CCAS', '2 rue je sais encore', 262659878, 692356599, 'toinette@mail.com', '1'),
(3, '2021-02-14 14:27:45', '2021-02-14 14:29:23', 2, 'Jobs', 'Steve', 'CIVIS', '2 rue Marc Lemarchal', 12345678, 0, 'steve.jobs@gmail.com', '1'),
(4, '2021-02-19 04:28:37', '2021-02-19 04:28:37', 4, 'Hils', 'David', 'CITALIS SAINT DENIS', '3 rue yoyo', 0, 0, 'hils.david@mail.com', '1'),
(5, '2021-02-22 06:22:05', '2021-02-22 06:22:05', 2, 'Carlina', 'Céline', 'CCAS Saint-Louis', '6 Rue Lecourbe 97410 Saint-Pierre', 123456789, 123456789, 'celine@mail.com', '1'),
(6, '2021-02-22 06:29:29', '2021-02-22 08:48:04', 1, 'Logitech', 'Souris', 'ADRIE Saint-Denis', '8 Rue Nationale 97440 Saint-André', 0, 0, 'logitech@mail.com', '0'),
(7, '2021-02-23 04:54:17', '2021-02-23 04:54:17', 2, 'Raza', 'Andry', 'ADRIE LA REUNION', '5 Avenue Bollée 97400 Saint-Denis', 692586945, 0, 'raza@mail.com', '1');

-- --------------------------------------------------------

--
-- Structure de la table `categories`
--

CREATE TABLE `categories` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `categorie` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `etat` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Déchargement des données de la table `categories`
--

INSERT INTO `categories` (`id`, `created_at`, `updated_at`, `categorie`, `etat`) VALUES
(1, '2021-01-27 02:37:49', '2021-02-23 04:44:08', 'Commandes publique', 1),
(2, '2021-01-27 02:37:58', '2021-02-15 10:53:02', 'Domaine et patrimoine', 1),
(3, '2021-01-27 02:38:04', '2021-02-15 10:51:59', 'Fonction publique', 1),
(4, '2021-01-27 02:38:13', '2021-02-08 08:48:49', 'Institutions et vie politique', 1),
(5, '2021-01-27 02:38:22', '2021-01-27 02:38:22', 'Finances locales', 1),
(6, '2021-01-27 02:38:29', '2021-01-27 02:38:29', 'Aide sociale facultative', 1),
(7, '2021-01-27 02:38:38', '2021-02-17 10:20:08', 'Contrat de prestation de service', 1),
(8, '2021-02-05 04:36:45', '2021-02-08 09:00:55', 'Tests', 0),
(9, '2021-02-22 11:10:07', '2021-02-23 05:03:10', 'Test', 0);

-- --------------------------------------------------------

--
-- Structure de la table `failed_jobs`
--

CREATE TABLE `failed_jobs` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `connection` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `queue` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `payload` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `exception` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `failed_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Structure de la table `fiches`
--

CREATE TABLE `fiches` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `service_id` int(11) DEFAULT NULL,
  `utilisateur_id` int(11) DEFAULT NULL,
  `categorie_id` int(11) NOT NULL,
  `sous_categorie_id` int(11) NOT NULL,
  `beneficiaire_id` int(11) NOT NULL,
  `nature_acte_id` int(11) NOT NULL,
  `date_enregistrement` date NOT NULL,
  `date_acte` date NOT NULL,
  `numero_acte` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `url_pdf` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `montant_aide` double(8,2) NOT NULL,
  `tags` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `commentaire` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `etat` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL
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
(31, '2021_01_27_054320_add_service_id_to_fiches_table', 2),
(32, '2021_01_27_054524_add_utilisateur_id_to_fiches_table', 3),
(33, '2021_01_27_054758_add_service_id_to_fiches_table', 4),
(34, '2021_01_27_054856_add_utilisateur_id_to_fiches_table', 5),
(45, '2019_08_19_000000_create_failed_jobs_table', 6),
(46, '2021_01_25_063000_create_utilisateurs_table', 6),
(47, '2021_01_25_063643_create_roles_table', 6),
(48, '2021_01_25_063713_create_services_table', 6),
(49, '2021_01_25_063929_create_sous_categories_table', 6),
(50, '2021_01_25_063942_create_categories_table', 6),
(51, '2021_01_25_064245_create_fiches_table', 6),
(52, '2021_01_25_064523_create_nature_actes_table', 6),
(53, '2021_01_25_064557_create_beneficiaires_table', 6),
(54, '2021_01_25_064959_create_type_beneficiaires_table', 6);

-- --------------------------------------------------------

--
-- Structure de la table `nature_actes`
--

CREATE TABLE `nature_actes` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `acte` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `etat` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Déchargement des données de la table `nature_actes`
--

INSERT INTO `nature_actes` (`id`, `created_at`, `updated_at`, `acte`, `etat`) VALUES
(1, '2021-01-27 02:40:05', '2021-02-08 08:52:07', 'Actes individuels RH', 1),
(2, '2021-01-27 02:40:16', '2021-02-08 08:52:05', 'Actes individuels Aide Facultative', 1),
(3, '2021-01-27 02:40:27', '2021-02-17 10:21:10', 'Actes individuels administrateurs', 1),
(4, '2021-02-05 04:38:24', '2021-02-23 04:41:57', 'Tcheck', 0),
(5, '2021-02-23 04:41:31', '2021-02-23 04:41:55', 'Institut confucius', 0);

-- --------------------------------------------------------

--
-- Structure de la table `roles`
--

CREATE TABLE `roles` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `role` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `etat` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Déchargement des données de la table `roles`
--

INSERT INTO `roles` (`id`, `created_at`, `updated_at`, `role`, `etat`) VALUES
(0, '2021-01-27 06:34:29', NULL, 'Administrateur', 1),
(1, '2021-01-27 06:34:53', NULL, 'Utilisateur', 1);

-- --------------------------------------------------------

--
-- Structure de la table `services`
--

CREATE TABLE `services` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `service` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `etat` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Déchargement des données de la table `services`
--

INSERT INTO `services` (`id`, `created_at`, `updated_at`, `service`, `etat`) VALUES
(0, '2021-02-03 06:50:50', NULL, '', 1),
(1, '2021-01-27 06:37:01', NULL, 'Service un', 1),
(2, '2021-01-27 06:37:11', NULL, 'Service deux', 1),
(3, '2021-01-27 06:37:21', NULL, 'Service trois', 1);

-- --------------------------------------------------------

--
-- Structure de la table `sous_categories`
--

CREATE TABLE `sous_categories` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `categorie_id` int(11) NOT NULL,
  `sous_categorie` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `etat` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Déchargement des données de la table `sous_categories`
--

INSERT INTO `sous_categories` (`id`, `created_at`, `updated_at`, `categorie_id`, `sous_categorie`, `etat`) VALUES
(1, '2021-01-27 02:38:50', '2021-02-08 09:03:21', 6, 'Marchés publics', 1),
(2, '2021-01-27 02:39:01', '2021-01-29 01:49:25', 2, 'Acquisitions', 1),
(3, '2021-01-27 02:39:14', '2021-02-08 08:56:25', 3, 'Personnel titulaires et stagiaires de la FPT', 1),
(4, '2021-01-27 02:39:29', '2021-01-27 02:39:29', 4, 'Election executif', 1),
(5, '2021-01-27 04:39:21', '2021-02-08 09:03:20', 1, 'Délégation de services public', 1),
(7, '2021-02-02 01:20:38', '2021-02-02 01:20:38', 1, 'Conventions de Mandat', 1),
(8, '2021-02-02 01:20:48', '2021-02-02 01:20:48', 1, 'Autres types de contrats', 1),
(9, '2021-02-02 01:21:14', '2021-02-02 01:21:14', 1, 'Transactions protocole d\'accord transaction', 1),
(10, '2021-02-02 01:22:21', '2021-02-02 01:22:21', 1, 'Actes relatifs à la maîtrise d\'oeuvre', 1),
(11, '2021-02-02 01:22:31', '2021-02-02 01:22:31', 1, 'Actes spéciaux et divers', 1),
(12, '2021-02-02 03:15:41', '2021-02-02 03:15:41', 2, 'Aliénations', 1),
(13, '2021-02-02 03:15:49', '2021-02-02 03:15:49', 2, 'Locations', 1),
(14, '2021-02-02 03:16:05', '2021-02-02 03:16:05', 2, 'Occupation temporaire à titre gratuit', 1),
(15, '2021-02-02 03:16:18', '2021-02-02 03:16:18', 2, 'Autres actes de gestion du domaine public', 1),
(16, '2021-02-02 03:16:44', '2021-02-02 03:16:44', 2, 'Autres actes de gestion du domaine privé', 1),
(17, '2021-02-02 03:19:19', '2021-02-02 03:19:19', 7, 'Contrat de prestation de service SAAD', 1),
(18, '2021-02-05 04:37:59', '2021-02-23 04:47:55', 8, 'Toto', 0),
(19, '2021-02-19 06:47:25', '2021-02-23 04:47:59', 1, 'Test', 0);

-- --------------------------------------------------------

--
-- Structure de la table `type_beneficiaires`
--

CREATE TABLE `type_beneficiaires` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `type` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `etat` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Déchargement des données de la table `type_beneficiaires`
--

INSERT INTO `type_beneficiaires` (`id`, `created_at`, `updated_at`, `type`, `etat`) VALUES
(1, '2021-01-27 02:40:40', '2021-02-08 08:53:45', 'Client-Usager', 1),
(2, '2021-01-27 02:40:45', '2021-01-27 02:40:45', 'Agent', 1),
(3, '2021-01-27 02:40:52', '2021-02-08 09:00:45', 'Administrateur', 1),
(4, '2021-01-27 02:40:58', '2021-01-27 02:40:58', 'Association', 1),
(5, '2021-02-05 04:39:12', '2021-02-23 04:50:24', 'Fournisseur', 0);

-- --------------------------------------------------------

--
-- Structure de la table `utilisateurs`
--

CREATE TABLE `utilisateurs` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `role_id` int(11) NOT NULL,
  `service_id` int(11) DEFAULT NULL,
  `nom` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `prenom` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `mot_de_passe` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `telephone` int(11) NOT NULL,
  `etat` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Déchargement des données de la table `utilisateurs`
--

INSERT INTO `utilisateurs` (`id`, `created_at`, `updated_at`, `role_id`, `service_id`, `nom`, `prenom`, `email`, `mot_de_passe`, `telephone`, `etat`) VALUES
(0, '2021-01-27 06:35:16', '2021-02-15 04:10:17', 0, 0, 'Administrateur', 'Administrateur', 'admin@mail.com', '$2y$10$Xrj2tc7LJAyQC5TjuX3LQerh9jX6Y4avGZPtU0BiOtKnzfq/y3kLa', 0, 1),
(2, '2021-01-27 02:36:44', '2021-02-01 00:29:24', 1, 3, 'Doe', 'John', 'johndoe@mail.com', '$2y$10$CWGXYxex.gWTuVTgd8tFxORD44Mn8.J.rDwRzk0W3tWYUgQkiSr..', 123, 1),
(3, '2021-01-29 03:02:01', '2021-02-22 17:26:52', 1, 2, 'Utilisateur', 'Utilisateur', 'utilisateur@mail.com', '$2y$10$EU7E9M3dx2HcqijMxxjHh./keAkdnQu1Pj15g3gFhugbilZFLaOZa', 123456, 1),
(4, '2021-02-03 02:47:19', '2021-02-23 05:21:23', 1, 1, 'Sown', 'Dars', 'sown.dars@mail.com', '$2y$10$hUxP6ywtWDyQxb5cHyWYPeaBlVoCZggyZvozilva2kG9fU4qcSlYq', 123456, 1),
(5, '2021-02-03 02:47:59', '2021-02-10 05:29:45', 1, 1, 'Lol', 'Lzkn', 'srko@mail.com', '$2y$10$Ar2ePc4mc8orrXiQtla9Hu9jspAfNgQnKVgf/M1ELEnEZOkCQUkuu', 123456, 1),
(6, '2021-02-03 02:54:06', '2021-02-08 08:47:46', 1, 0, 'Ekrj', 'Zjak', 'zkz@mail.com', '$2y$10$vHpEXLqCUtdkixLfPATTzeePRUFTb7u2PYCz0D5kaAdio7GVmZ9ti', 159, 1),
(7, '2021-02-05 04:32:21', '2021-02-09 05:32:51', 1, 1, 'Alixx', 'Pierrot', 'pierrot@mail.com', '$2y$10$yf2Fax/XZFHZbxtPRgVqKer4dtSUWmd14WFu.jiuz8Mc2rVyX5Ncu', 692303235, 1),
(8, '2021-02-05 05:29:22', '2021-02-05 05:29:22', 1, 0, 'Bootstrap', 'Boot', 'boot@mail.com', '$2y$10$nEI0OKCDZR3G4HDKMzRlfeFTEQ2l4C9Vn7Yb.sSIhcw4JM6iYkGFW', 12345678, 1),
(9, '2021-02-05 05:55:05', '2021-02-19 06:46:41', 1, 0, 'Doe', 'John', 'john.doe@mail.com', '$2y$10$9jBIRzqBV9aQyd0j2LWMduBJG0hMGT7pIfPZYCt/mBVhMuW.iJbv.', 12345678, 1),
(10, '2021-02-17 04:59:34', '2021-02-17 04:59:53', 1, 2, 'Georges', 'Bryan', 'bryan@mail.com', '$2y$10$TXUjoMG1n9SM1tficTln6OKYI54CyEpNfKGnwwpryDmaXUxOrLyj.', 123456789, 1),
(11, '2021-02-19 04:34:27', '2021-02-23 04:36:09', 1, 0, 'Yvri', 'Stan', 'stan@mail.com', '$2y$10$.0sKWAwnm2taTzDvQDiF4uN4P6gQQWOShttz0S1K.IdKveY/sKX02', 123456789, 0),
(12, '2021-02-19 06:23:25', '2021-02-19 06:23:25', 1, 0, 'Doe', 'John', 'johndoe@mail.com', '$2y$10$HwALrvu0x36xlvDn0EsQ6uijcUgQ2qKf0TGVUk41tAMu0pQT47m7O', 12345678, 1),
(13, '2021-02-23 04:34:14', '2021-02-23 04:36:57', 0, 0, 'Razafin', 'Andry', 'andry@mail.com', '$2y$10$QwkbDXzZRjG6AsoGmipfiOj8PxpLYABP2.rTDcInk1F87fCF1bu2y', 692154876, 1);

--
-- Index pour les tables déchargées
--

--
-- Index pour la table `beneficiaires`
--
ALTER TABLE `beneficiaires`
  ADD PRIMARY KEY (`id`);

--
-- Index pour la table `categories`
--
ALTER TABLE `categories`
  ADD PRIMARY KEY (`id`);

--
-- Index pour la table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  ADD PRIMARY KEY (`id`);

--
-- Index pour la table `fiches`
--
ALTER TABLE `fiches`
  ADD PRIMARY KEY (`id`);

--
-- Index pour la table `migrations`
--
ALTER TABLE `migrations`
  ADD PRIMARY KEY (`id`);

--
-- Index pour la table `nature_actes`
--
ALTER TABLE `nature_actes`
  ADD PRIMARY KEY (`id`);

--
-- Index pour la table `roles`
--
ALTER TABLE `roles`
  ADD PRIMARY KEY (`id`);

--
-- Index pour la table `services`
--
ALTER TABLE `services`
  ADD PRIMARY KEY (`id`);

--
-- Index pour la table `sous_categories`
--
ALTER TABLE `sous_categories`
  ADD PRIMARY KEY (`id`);

--
-- Index pour la table `type_beneficiaires`
--
ALTER TABLE `type_beneficiaires`
  ADD PRIMARY KEY (`id`);

--
-- Index pour la table `utilisateurs`
--
ALTER TABLE `utilisateurs`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT pour les tables déchargées
--

--
-- AUTO_INCREMENT pour la table `beneficiaires`
--
ALTER TABLE `beneficiaires`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT pour la table `categories`
--
ALTER TABLE `categories`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT pour la table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT pour la table `fiches`
--
ALTER TABLE `fiches`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT pour la table `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=55;

--
-- AUTO_INCREMENT pour la table `nature_actes`
--
ALTER TABLE `nature_actes`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT pour la table `roles`
--
ALTER TABLE `roles`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT pour la table `services`
--
ALTER TABLE `services`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT pour la table `sous_categories`
--
ALTER TABLE `sous_categories`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=20;

--
-- AUTO_INCREMENT pour la table `type_beneficiaires`
--
ALTER TABLE `type_beneficiaires`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT pour la table `utilisateurs`
--
ALTER TABLE `utilisateurs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
