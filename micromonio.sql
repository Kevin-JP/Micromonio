-- phpMyAdmin SQL Dump
-- version 4.6.5.2
-- https://www.phpmyadmin.net/
--
-- Client :  127.0.0.1
-- Généré le :  Mar 08 Août 2017 à 16:55
-- Version du serveur :  10.1.21-MariaDB
-- Version de PHP :  5.6.30

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de données :  `micromonio`
--

-- --------------------------------------------------------

--
-- Structure de la table `console`
--

CREATE TABLE `console` (
  `con_id` int(10) UNSIGNED NOT NULL,
  `con_name` varchar(64) DEFAULT NULL,
  `con_inserted` timestamp NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Contenu de la table `console`
--

INSERT INTO `console` (`con_id`, `con_name`, `con_inserted`) VALUES
(1, 'Gameboy', NULL),
(2, 'NES', NULL),
(3, 'SNES', NULL),
(4, 'MegaDrive', NULL),
(5, 'Playstation', NULL),
(6, 'PC', NULL);

-- --------------------------------------------------------

--
-- Structure de la table `genre`
--

CREATE TABLE `genre` (
  `gen_id` int(10) UNSIGNED NOT NULL,
  `gen_name` varchar(64) DEFAULT NULL,
  `gen_inserted` timestamp NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Contenu de la table `genre`
--

INSERT INTO `genre` (`gen_id`, `gen_name`, `gen_inserted`) VALUES
(1, 'Aventure', NULL),
(2, 'Simulation', NULL),
(3, 'Sport', NULL),
(4, 'Horreur', '2017-08-08 07:34:02'),
(5, 'Action', '2017-08-08 12:40:14');

-- --------------------------------------------------------

--
-- Structure de la table `users`
--

CREATE TABLE `users` (
  `id` int(10) UNSIGNED NOT NULL,
  `usr_username` varchar(60) DEFAULT NULL,
  `usr_email` varchar(255) NOT NULL,
  `usr_password` varchar(255) NOT NULL,
  `usr_role` varchar(24) NOT NULL,
  `usr_inserted` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8 ROW_FORMAT=COMPACT;

--
-- Contenu de la table `users`
--

INSERT INTO `users` (`id`, `usr_username`, `usr_email`, `usr_password`, `usr_role`, `usr_inserted`) VALUES
(1, 'kevin', 'jesus.kevin93@hotmail.com', '$2y$10$qv3XK3wZPHvniKiQLGNPNuYCjlOgFmNTHqEsKDLD/8Lw15nhxDrXK', 'admin', '2017-08-07 10:55:15'),
(2, 'user', 'user@test.com', '$2y$10$z74I0/99QUXbo.fBk4K1PuQvToWBoH9oidzpmohOZX3tPJcfpttiC', 'user', '2017-08-08 12:06:55');

-- --------------------------------------------------------

--
-- Structure de la table `videogame`
--

CREATE TABLE `videogame` (
  `vid_id` int(10) UNSIGNED NOT NULL,
  `vid_name` varchar(128) NOT NULL COMMENT '''Nom du jeu vidéo''',
  `vid_year` year(4) NOT NULL COMMENT '''Année de sorite du jeu vidéo''',
  `vid_editor` varchar(64) NOT NULL COMMENT '''Editeur/Distributeur du jeu vidéo''',
  `vid_image` varchar(128) NOT NULL COMMENT 'URL (site externe) ou fichier uploadé sur le serveur local',
  `vid_inserted` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `console_con_id` int(10) UNSIGNED NOT NULL,
  `genre_gen_id` int(10) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Contenu de la table `videogame`
--

INSERT INTO `videogame` (`vid_id`, `vid_name`, `vid_year`, `vid_editor`, `vid_image`, `vid_inserted`, `console_con_id`, `genre_gen_id`) VALUES
(1, 'Day of the tentacle', 1993, 'LucasArts', 'https://upload.wikimedia.org/wikipedia/en/7/79/Day_of_the_Tentacle_artwork.jpg', '2017-08-07 13:47:12', 6, 1),
(2, 'Theme Hospital', 1997, 'Bullfrog', 'https://upload.wikimedia.org/wikipedia/en/2/26/Theme_Hospital.front_cover.jpg', '2017-08-07 13:47:12', 6, 2),
(3, 'NBA Jam', 1993, 'Midway', 'https://upload.wikimedia.org/wikipedia/en/a/a0/Nbajam.jpg', '2017-08-07 13:47:12', 4, 3),
(4, 'The Witcher 3', 2015, 'CD Projekt RED', 'https://upload.wikimedia.org/wikipedia/en/0/0c/Witcher_3_cover_art.jpg', '2017-08-08 07:29:46', 6, 1),
(5, 'Resident Evil 7', 2017, 'Capcom', 'https://upload.wikimedia.org/wikipedia/en/f/fd/Resident_Evil_7_cover_art.jpg', '2017-08-08 07:34:11', 6, 4),
(6, 'Outlast 2', 2017, 'Red Barrels', 'https://media.senscritique.com/media/000016954343/source_big/Outlast_2.jpg', '2017-08-08 12:35:38', 6, 4),
(7, 'Overwatch', 2016, 'Blizzard', 'https://upload.wikimedia.org/wikipedia/fr/f/f2/Overwatch.png', '2017-08-08 12:39:55', 6, 5),
(8, 'Fifa 18', 2017, 'EA Sports', 'https://www.instant-gaming.com/images/products/2064/271x377/2064.jpg', '2017-08-08 14:00:20', 6, 3);

--
-- Index pour les tables exportées
--

--
-- Index pour la table `console`
--
ALTER TABLE `console`
  ADD PRIMARY KEY (`con_id`);

--
-- Index pour la table `genre`
--
ALTER TABLE `genre`
  ADD PRIMARY KEY (`gen_id`);

--
-- Index pour la table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `usr_email` (`usr_email`),
  ADD UNIQUE KEY `username_unique` (`usr_username`);

--
-- Index pour la table `videogame`
--
ALTER TABLE `videogame`
  ADD PRIMARY KEY (`vid_id`),
  ADD KEY `fk_videogame_console_idx` (`console_con_id`),
  ADD KEY `fk_videogame_genre1_idx` (`genre_gen_id`);

--
-- AUTO_INCREMENT pour les tables exportées
--

--
-- AUTO_INCREMENT pour la table `console`
--
ALTER TABLE `console`
  MODIFY `con_id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;
--
-- AUTO_INCREMENT pour la table `genre`
--
ALTER TABLE `genre`
  MODIFY `gen_id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;
--
-- AUTO_INCREMENT pour la table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT pour la table `videogame`
--
ALTER TABLE `videogame`
  MODIFY `vid_id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
