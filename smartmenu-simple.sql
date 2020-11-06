-- phpMyAdmin SQL Dump
-- version 5.0.1
-- https://www.phpmyadmin.net/
--
-- Hôte : localhost
-- Généré le : lun. 26 oct. 2020 à 10:29
-- Version du serveur :  10.4.11-MariaDB
-- Version de PHP : 7.4.3

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de données : `smartmenu-simple`
--

-- --------------------------------------------------------

--
-- Structure de la table `categories`
--

CREATE TABLE `categories` (
  `id` int(11) NOT NULL,
  `est_id` int(11) NOT NULL,
  `name` varchar(64) COLLATE latin1_general_ci NOT NULL,
  `image` varchar(32) COLLATE latin1_general_ci DEFAULT '0',
  `description` varchar(256) COLLATE latin1_general_ci NOT NULL,
  `rank` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_general_ci;

-- --------------------------------------------------------

--
-- Structure de la table `compositions`
--

CREATE TABLE `compositions` (
  `id` int(11) NOT NULL,
  `menu_id` int(11) NOT NULL,
  `prod_id` int(11) NOT NULL,
  `name` varchar(64) COLLATE latin1_general_ci NOT NULL,
  `note` varchar(256) COLLATE latin1_general_ci NOT NULL,
  `rank` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_general_ci;

-- --------------------------------------------------------

--
-- Structure de la table `customisation`
--

CREATE TABLE `customisation` (
  `id` int(11) NOT NULL,
  `est_id` int(11) NOT NULL,
  `logo` varchar(64) COLLATE latin1_general_ci NOT NULL,
  `presentation` mediumblob NOT NULL,
  `background_image` varchar(64) COLLATE latin1_general_ci NOT NULL DEFAULT 'ricepaper_v3.png'
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_general_ci;

-- --------------------------------------------------------

--
-- Structure de la table `establishments`
--

CREATE TABLE `establishments` (
  `id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `name` varchar(64) COLLATE latin1_general_ci DEFAULT NULL,
  `url` varchar(64) COLLATE latin1_general_ci DEFAULT NULL,
  `adress` varchar(64) COLLATE latin1_general_ci DEFAULT NULL,
  `postal_code` varchar(5) COLLATE latin1_general_ci DEFAULT NULL,
  `city` varchar(64) COLLATE latin1_general_ci DEFAULT NULL,
  `geo_lat` float(10,6) NOT NULL,
  `geo_lng` float(10,6) NOT NULL,
  `phone` varchar(10) COLLATE latin1_general_ci NOT NULL,
  `web_site` varchar(128) COLLATE latin1_general_ci NOT NULL,
  `facebook` varchar(256) COLLATE latin1_general_ci NOT NULL,
  `twitter` varchar(256) COLLATE latin1_general_ci NOT NULL,
  `instagram` varchar(256) COLLATE latin1_general_ci NOT NULL,
  `maintenance` tinyint(1) NOT NULL DEFAULT 1
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_general_ci;

-- --------------------------------------------------------

--
-- Structure de la table `link_prod_prices`
--

CREATE TABLE `link_prod_prices` (
  `prod_id` int(11) NOT NULL,
  `prices_id` int(11) NOT NULL,
  `price` float NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_general_ci;

-- --------------------------------------------------------

--
-- Structure de la table `menus`
--

CREATE TABLE `menus` (
  `id` int(11) NOT NULL,
  `est_id` int(11) NOT NULL,
  `name` varchar(64) COLLATE latin1_general_ci NOT NULL,
  `price` float UNSIGNED NOT NULL,
  `note` varchar(256) COLLATE latin1_general_ci NOT NULL,
  `rank` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_general_ci;

-- --------------------------------------------------------

--
-- Structure de la table `modules`
--

CREATE TABLE `modules` (
  `est_id` int(11) NOT NULL,
  `geoloc` tinyint(1) NOT NULL DEFAULT 1,
  `prices_cat` tinyint(1) NOT NULL DEFAULT 1,
  `suggest` tinyint(1) NOT NULL DEFAULT 0,
  `menus` tinyint(1) NOT NULL DEFAULT 0,
  `social` tinyint(1) NOT NULL DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_general_ci;

-- --------------------------------------------------------

--
-- Structure de la table `prices_categories`
--

CREATE TABLE `prices_categories` (
  `id` int(11) NOT NULL,
  `cat_id` int(11) NOT NULL,
  `name` varchar(64) COLLATE latin1_general_ci NOT NULL,
  `rank` tinyint(3) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_general_ci;

-- --------------------------------------------------------

--
-- Structure de la table `products`
--

CREATE TABLE `products` (
  `id` int(11) NOT NULL,
  `cat_id` int(11) NOT NULL,
  `name` varchar(128) COLLATE latin1_general_ci NOT NULL,
  `composition` varchar(256) COLLATE latin1_general_ci NOT NULL,
  `prices_categories` tinyint(1) NOT NULL DEFAULT 0,
  `price` float NOT NULL,
  `image` varchar(32) COLLATE latin1_general_ci NOT NULL DEFAULT '0',
  `suggest` tinyint(1) NOT NULL DEFAULT 0,
  `not_in_card` tinyint(1) NOT NULL DEFAULT 0,
  `sold_out` tinyint(1) NOT NULL DEFAULT 0,
  `rank` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_general_ci;

-- --------------------------------------------------------

--
-- Structure de la table `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `email` varchar(128) COLLATE latin1_general_ci NOT NULL,
  `password` varchar(256) COLLATE latin1_general_ci NOT NULL,
  `creation` datetime NOT NULL,
  `active` tinyint(1) NOT NULL DEFAULT 0,
  `activation_hash` varchar(32) COLLATE latin1_general_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_general_ci;

--
-- Index pour les tables déchargées
--

--
-- Index pour la table `categories`
--
ALTER TABLE `categories`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `id` (`id`,`name`),
  ADD KEY `est_id` (`est_id`);

--
-- Index pour la table `compositions`
--
ALTER TABLE `compositions`
  ADD PRIMARY KEY (`id`),
  ADD KEY `menu_id` (`menu_id`),
  ADD KEY `prod_id` (`prod_id`);

--
-- Index pour la table `customisation`
--
ALTER TABLE `customisation`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `est_id` (`est_id`);

--
-- Index pour la table `establishments`
--
ALTER TABLE `establishments`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `name` (`name`,`adress`,`postal_code`,`city`),
  ADD UNIQUE KEY `url_access` (`url`),
  ADD KEY `user_id` (`user_id`);

--
-- Index pour la table `link_prod_prices`
--
ALTER TABLE `link_prod_prices`
  ADD PRIMARY KEY (`prod_id`,`prices_id`),
  ADD KEY `prices_id` (`prices_id`);

--
-- Index pour la table `menus`
--
ALTER TABLE `menus`
  ADD PRIMARY KEY (`id`),
  ADD KEY `est_id` (`est_id`);

--
-- Index pour la table `modules`
--
ALTER TABLE `modules`
  ADD PRIMARY KEY (`est_id`);

--
-- Index pour la table `prices_categories`
--
ALTER TABLE `prices_categories`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `id` (`id`,`cat_id`),
  ADD KEY `cat_id` (`cat_id`);

--
-- Index pour la table `products`
--
ALTER TABLE `products`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `id` (`id`,`name`),
  ADD KEY `cat_id` (`cat_id`);

--
-- Index pour la table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `email` (`email`),
  ADD UNIQUE KEY `email_2` (`email`);

--
-- AUTO_INCREMENT pour les tables déchargées
--

--
-- AUTO_INCREMENT pour la table `categories`
--
ALTER TABLE `categories`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT pour la table `compositions`
--
ALTER TABLE `compositions`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT pour la table `customisation`
--
ALTER TABLE `customisation`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT pour la table `establishments`
--
ALTER TABLE `establishments`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT pour la table `menus`
--
ALTER TABLE `menus`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT pour la table `prices_categories`
--
ALTER TABLE `prices_categories`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT pour la table `products`
--
ALTER TABLE `products`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT pour la table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- Contraintes pour les tables déchargées
--

--
-- Contraintes pour la table `categories`
--
ALTER TABLE `categories`
  ADD CONSTRAINT `categories_ibfk_1` FOREIGN KEY (`est_id`) REFERENCES `establishments` (`id`);

--
-- Contraintes pour la table `compositions`
--
ALTER TABLE `compositions`
  ADD CONSTRAINT `compositions_ibfk_1` FOREIGN KEY (`menu_id`) REFERENCES `menus` (`id`),
  ADD CONSTRAINT `compositions_ibfk_2` FOREIGN KEY (`prod_id`) REFERENCES `products` (`id`);

--
-- Contraintes pour la table `customisation`
--
ALTER TABLE `customisation`
  ADD CONSTRAINT `customisation_ibfk_1` FOREIGN KEY (`est_id`) REFERENCES `establishments` (`id`);

--
-- Contraintes pour la table `establishments`
--
ALTER TABLE `establishments`
  ADD CONSTRAINT `establishments_ibfk_1` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`);

--
-- Contraintes pour la table `link_prod_prices`
--
ALTER TABLE `link_prod_prices`
  ADD CONSTRAINT `link_prod_prices_ibfk_1` FOREIGN KEY (`prod_id`) REFERENCES `products` (`id`),
  ADD CONSTRAINT `link_prod_prices_ibfk_2` FOREIGN KEY (`prices_id`) REFERENCES `prices_categories` (`id`);

--
-- Contraintes pour la table `menus`
--
ALTER TABLE `menus`
  ADD CONSTRAINT `menus_ibfk_1` FOREIGN KEY (`est_id`) REFERENCES `establishments` (`id`);

--
-- Contraintes pour la table `modules`
--
ALTER TABLE `modules`
  ADD CONSTRAINT `modules_ibfk_1` FOREIGN KEY (`est_id`) REFERENCES `establishments` (`id`);

--
-- Contraintes pour la table `prices_categories`
--
ALTER TABLE `prices_categories`
  ADD CONSTRAINT `prices_categories_ibfk_1` FOREIGN KEY (`cat_id`) REFERENCES `categories` (`id`);

--
-- Contraintes pour la table `products`
--
ALTER TABLE `products`
  ADD CONSTRAINT `products_ibfk_1` FOREIGN KEY (`cat_id`) REFERENCES `categories` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
