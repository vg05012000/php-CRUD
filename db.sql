-- phpMyAdmin SQL Dump
-- version 4.9.7
-- https://www.phpmyadmin.net/
--
-- Hôte : localhost:8889
-- Généré le : jeu. 05 mai 2022 à 13:41
-- Version du serveur :  5.7.32
-- Version de PHP : 8.0.0

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";

--
-- Base de données : `wsf`
--

-- --------------------------------------------------------

--
-- Structure de la table `cereal`
--

CREATE TABLE `cereal` (
  `id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `category` varchar(255) NOT NULL,
  `price` int(11) NOT NULL,
  `weight` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Déchargement des données de la table `cereal`
--

INSERT INTO `cereal` (`id`, `name`, `category`, `price`, `weight`) VALUES
(5, 'test', 'chocolat', 5, 5),
(6, 'test', 'chocolat', 5, 5),
(7, 'test', 'chocolat', 5, 5),
(8, 'Test 44', '444', 4444, 444),
(9, 'test', 'chocolat', 34, 44);

--
-- Index pour les tables déchargées
--

--
-- Index pour la table `cereal`
--
ALTER TABLE `cereal`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT pour les tables déchargées
--

--
-- AUTO_INCREMENT pour la table `cereal`
--
ALTER TABLE `cereal`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;