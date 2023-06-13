-- phpMyAdmin SQL Dump
-- version 5.0.2
-- https://www.phpmyadmin.net/
--
-- Hôte : localhost
-- Généré le : mar. 15 déc. 2020 à 12:29
-- Version du serveur :  10.4.11-MariaDB
-- Version de PHP : 7.2.29

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de données : `myarcapp`
--

-- --------------------------------------------------------

--
-- Structure de la table `arme`
--

CREATE TABLE `arme` (
  `id` int(255) NOT NULL,
  `nom_arme_long` varchar(60) NOT NULL,
  `nom_arme_court` varchar(3) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Déchargement des données de la table `arme`
--

INSERT INTO `arme` (`id`, `nom_arme_long`, `nom_arme_court`) VALUES
(1, 'Arc classique', 'CL'),
(2, 'Arc à Poulies', 'CO'),
(3, 'Arc Nu', 'BB');

-- --------------------------------------------------------

--
-- Structure de la table `categorie`
--

CREATE TABLE `categorie` (
  `id` int(255) NOT NULL,
  `nom_categ_long` varchar(60) NOT NULL,
  `nom_categ_court` varchar(2) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Déchargement des données de la table `categorie`
--

INSERT INTO `categorie` (`id`, `nom_categ_long`, `nom_categ_court`) VALUES
(1, 'Poussin', 'P'),
(2, 'Benjamin', 'B'),
(3, 'Minime', 'M'),
(4, 'Cadet', 'C'),
(5, 'Junior', 'J'),
(6, 'Senior 1', 'S1'),
(7, 'Senior 2', 'S2'),
(8, 'Senior 3', 'S3');

-- --------------------------------------------------------

--
-- Structure de la table `club`
--

CREATE TABLE `club` (
  `id` int(255) NOT NULL,
  `ville` varchar(50) NOT NULL,
  `nom` varchar(50) NOT NULL,
  `departement` int(3) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Déchargement des données de la table `club`
--

INSERT INTO `club` (`id`, `ville`, `nom`, `departement`) VALUES
(1, 'Ste Maxime', 'ARC CLUB DE STE MAXIME', 83),
(2, 'La Garde', 'ARC CLUB GARDEEN', 83),
(3, 'Agen', 'LES ARCHERS DE BOE', 47),
(4, 'Toulon', 'ARC CLUB TOULONNAIS', 83),
(5, 'Brignoles', 'CIE BRIGNOLAISE DE TIR', 83),
(6, 'Roquebrune', 'CIE ROQUEBRUNE-LES ISSAMBRES', 83),
(7, 'La Verdière', 'CIE VERDIEROISE DE TIR A L\'ARC', 83),
(8, 'Carcès', 'COMPAGNIE CARCOISE TIR A L\'ARC', 83),
(9, 'Ollioule', 'COMPAGNIE D\'ARC OLLIOULAISE', 83),
(10, 'Cogolin', 'COMPAGNONS ARC COGOLIN', 83),
(11, 'Fréjus', 'FREJUS ARC CLUB', 83),
(12, 'Gonfaron', 'LES ARCHERS DE ST QUINIS', 83),
(13, 'Pierrefeu du Var', 'LES ARCHERS DE SULLY', 83),
(14, 'Trans-en-Provence', 'LES ARCHERS DES SIX LANCES', 83),
(15, 'Draguignan', 'LES ARCHERS DU DRAGON', 83),
(16, 'Le Lavandou', 'LES ARCHERS DU GRAND JARDIN', 83),
(17, 'Le Muy', 'LES ARCHERS DU MUY', 83),
(18, 'Fayence', 'LES ARCHERS DU PAYS DE FAYENCE', 83),
(19, 'Lorgues', 'LES ARCHERS LORGUAIS', 83),
(20, 'Puget-sur-Argens', 'LES ARCHERS PUGETOIS', 83),
(21, 'La Valette du Var', 'LES ARCHERS VALETTOIS', 83),
(22, 'St Raphaël', 'LES ARCHERS DE ST RAPHAEL/VALESCURE', 83);

-- --------------------------------------------------------

--
-- Structure de la table `competition`
--

CREATE TABLE `competition` (
  `id` int(255) NOT NULL,
  `date` date NOT NULL,
  `lieu` varchar(70) NOT NULL,
  `type_id` int(255) NOT NULL,
  `mandat` varchar(255) DEFAULT NULL,
  `description` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Déchargement des données de la table `competition`
--

INSERT INTO `competition` (`id`, `date`, `lieu`, `type_id`, `mandat`, `description`) VALUES
(1, '2020-06-26', 'Ruoms', 1, NULL, '2x18m en extérieur'),
(2, '2020-07-04', 'Labeaume', 3, '6ring_50cm_5_for_18_RO4_21.pdf', '2x70m');

-- --------------------------------------------------------

--
-- Structure de la table `competition_type`
--

CREATE TABLE `competition_type` (
  `id` int(255) NOT NULL,
  `nom` varchar(60) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Déchargement des données de la table `competition_type`
--

INSERT INTO `competition_type` (`id`, `nom`) VALUES
(1, 'Salle 18m'),
(2, 'Parcours Campagne'),
(3, 'TAE International'),
(4, 'TAE Fédéral'),
(5, 'Parcours 3D'),
(6, 'Parcours Campagne + 3D');

-- --------------------------------------------------------

--
-- Structure de la table `distance`
--

CREATE TABLE `distance` (
  `id` int(255) NOT NULL,
  `chiffre` int(2) NOT NULL,
  `lettre` varchar(40) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Déchargement des données de la table `distance`
--

INSERT INTO `distance` (`id`, `chiffre`, `lettre`) VALUES
(0, 0, '-'),
(5, 5, 'cinq'),
(10, 10, 'dix'),
(15, 15, 'quinze'),
(18, 18, 'dix-huit'),
(20, 20, 'vingt'),
(25, 25, 'vingt-cinq'),
(30, 30, 'trente'),
(40, 40, 'quarante'),
(50, 50, 'cinquante'),
(60, 60, 'soixante'),
(70, 70, 'soixante-dix');

-- --------------------------------------------------------

--
-- Structure de la table `droit`
--

CREATE TABLE `droit` (
  `id` int(255) NOT NULL,
  `nom` varchar(20) NOT NULL,
  `acces` int(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Déchargement des données de la table `droit`
--

INSERT INTO `droit` (`id`, `nom`, `acces`) VALUES
(1, 'Archer', 1),
(2, 'Entraineur', 2),
(3, 'Administrateur', 3);

-- --------------------------------------------------------

--
-- Structure de la table `humeur`
--

CREATE TABLE `humeur` (
  `id` int(255) NOT NULL,
  `type` varchar(50) NOT NULL,
  `icone` varchar(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Déchargement des données de la table `humeur`
--

INSERT INTO `humeur` (`id`, `type`, `icone`) VALUES
(1, 'Calme', 'grin'),
(2, 'Enervé', 'angry'),
(3, 'Distrait', 'grin-squint-tears'),
(4, 'Triste', 'frown'),
(5, 'Joyeux', 'smile-beam'),
(6, 'Fatigué', 'tired');

-- --------------------------------------------------------

--
-- Structure de la table `mois`
--

CREATE TABLE `mois` (
  `id` int(2) NOT NULL,
  `mois_court` varchar(5) NOT NULL,
  `mois_long` varchar(10) NOT NULL,
  `mois_chiffre` varchar(2) NOT NULL,
  `ordre` tinyint(2) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Déchargement des données de la table `mois`
--

INSERT INTO `mois` (`id`, `mois_court`, `mois_long`, `mois_chiffre`, `ordre`) VALUES
(1, 'Janv.', 'Janvier', '01', 5),
(2, 'Fév.', 'Février', '02', 6),
(3, 'Mars', 'Mars', '03', 7),
(4, 'Avr.', 'Avril', '04', 8),
(5, 'Mai', 'Mai', '05', 9),
(6, 'Juin', 'Juin', '06', 10),
(7, 'Juil.', 'Juillet', '07', 11),
(8, 'Août', 'Août', '08', 12),
(9, 'Sept.', 'Septembre', '09', 1),
(10, 'Oct.', 'Octobre', '10', 2),
(11, 'Nov.', 'Novembre', '11', 3),
(12, 'Déc.', 'Décembre', '12', 4);

-- --------------------------------------------------------

--
-- Structure de la table `prepa_physique`
--

CREATE TABLE `prepa_physique` (
  `id` int(255) NOT NULL,
  `utilisateur_id` int(255) NOT NULL,
  `date` date NOT NULL,
  `semaine` varchar(2) NOT NULL,
  `mois` varchar(2) NOT NULL,
  `an` int(4) NOT NULL,
  `exercice_id` int(255) NOT NULL,
  `outils_id` int(255) NOT NULL,
  `repetitions` int(4) DEFAULT NULL,
  `series` int(3) NOT NULL,
  `temps` varchar(10) DEFAULT NULL,
  `effort` int(1) NOT NULL DEFAULT 1
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Déchargement des données de la table `prepa_physique`
--

INSERT INTO `prepa_physique` (`id`, `utilisateur_id`, `date`, `semaine`, `mois`, `an`, `exercice_id`, `outils_id`, `repetitions`, `series`, `temps`, `effort`) VALUES
(1, 1, '2020-05-10', '19', '05', 2020, 1, 4, 60, 0, NULL, 1),
(2, 1, '2020-05-10', '19', '05', 2020, 1, 3, 60, 0, NULL, 1),
(3, 1, '2020-05-10', '19', '05', 2020, 5, 4, 30, 0, NULL, 1),
(4, 1, '2020-05-07', '19', '05', 2020, 7, 2, 120, 0, NULL, 1),
(5, 1, '2020-05-07', '19', '05', 2020, 7, 2, 60, 0, NULL, 1),
(6, 1, '2020-05-07', '19', '05', 2020, 7, 2, 60, 0, NULL, 1),
(7, 1, '2020-05-07', '19', '05', 2020, 1, 4, 20, 0, NULL, 1),
(8, 1, '2020-05-11', '20', '05', 2020, 1, 3, 90, 0, NULL, 1),
(9, 1, '2020-05-11', '20', '05', 2020, 7, 2, 80, 0, NULL, 1),
(10, 1, '2020-05-12', '20', '05', 2020, 3, 3, 30, 0, NULL, 1),
(11, 1, '2020-05-12', '20', '05', 2020, 1, 3, 120, 0, NULL, 1),
(12, 1, '2020-05-14', '20', '05', 2020, 3, 3, 40, 0, NULL, 1),
(13, 1, '2020-05-14', '20', '05', 2020, 7, 2, 20, 0, NULL, 1),
(14, 1, '2020-05-14', '20', '05', 2020, 7, 2, 80, 0, NULL, 1),
(15, 1, '2020-05-14', '20', '05', 2020, 5, 3, 900, 0, NULL, 1),
(16, 1, '2020-05-15', '20', '05', 2020, 5, 5, 900, 0, NULL, 1),
(17, 1, '2020-05-17', '20', '05', 2020, 3, 3, 100, 0, NULL, 1),
(18, 1, '2020-05-17', '20', '05', 2020, 7, 2, 80, 0, NULL, 1),
(19, 1, '2020-05-17', '20', '05', 2020, 7, 2, 40, 0, NULL, 1),
(20, 1, '2020-05-17', '20', '05', 2020, 7, 2, 40, 0, NULL, 1),
(21, 1, '2020-05-17', '20', '05', 2020, 1, 3, 30, 0, NULL, 1),
(22, 1, '2020-05-19', '21', '05', 2020, 5, 3, 1200, 0, NULL, 3),
(23, 1, '2020-05-20', '21', '05', 2020, 5, 3, 900, 0, NULL, 1),
(24, 1, '2020-05-20', '21', '05', 2020, 7, 2, 40, 0, NULL, 1),
(25, 1, '2020-05-20', '21', '05', 2020, 7, 2, 40, 0, NULL, 1),
(26, 1, '2020-05-22', '21', '05', 2020, 7, 1, NULL, 0, NULL, 2),
(27, 1, '2020-05-22', '21', '05', 2020, 7, 2, NULL, 0, NULL, 1),
(28, 1, '2020-05-23', '21', '05', 2020, 7, 1, NULL, 0, NULL, 1),
(29, 1, '2020-05-23', '21', '05', 2020, 7, 2, NULL, 0, NULL, 2),
(30, 1, '2020-05-24', '21', '05', 2020, 5, 5, NULL, 0, NULL, 2),
(31, 1, '2020-05-24', '21', '05', 2020, 7, 1, NULL, 0, NULL, 2),
(32, 1, '2020-05-24', '21', '05', 2020, 3, 5, NULL, 0, NULL, 2),
(33, 1, '2020-05-25', '22', '05', 2020, 1, 3, NULL, 0, NULL, 1),
(34, 1, '2020-05-25', '22', '05', 2020, 5, 3, NULL, 0, NULL, 1),
(35, 1, '2020-05-25', '22', '05', 2020, 7, 1, NULL, 0, NULL, 2),
(36, 1, '2020-05-25', '22', '05', 2020, 3, 3, NULL, 0, NULL, 1),
(37, 1, '2020-05-26', '22', '05', 2020, 1, 3, NULL, 0, NULL, 2),
(38, 1, '2020-05-26', '22', '05', 2020, 3, 3, NULL, 0, NULL, 1),
(39, 1, '2020-05-27', '22', '05', 2020, 3, 3, NULL, 0, NULL, 3),
(40, 1, '2020-05-27', '22', '05', 2020, 7, 2, NULL, 0, NULL, 2),
(41, 1, '2020-05-27', '22', '05', 2020, 5, 3, NULL, 0, NULL, 3),
(42, 1, '2020-06-01', '23', '06', 2020, 3, 5, NULL, 0, NULL, 2),
(43, 1, '2020-06-01', '23', '06', 2020, 7, 2, NULL, 0, NULL, 3),
(44, 1, '2020-06-01', '23', '06', 2020, 5, 5, NULL, 0, NULL, 2),
(45, 1, '2020-06-02', '23', '06', 2020, 1, 3, NULL, 0, NULL, 1),
(46, 1, '2020-06-02', '23', '06', 2020, 7, 2, NULL, 0, NULL, 2),
(47, 1, '2020-06-02', '23', '06', 2020, 7, 2, NULL, 0, NULL, 2),
(48, 1, '2020-06-02', '23', '06', 2020, 1, 3, NULL, 0, NULL, 1),
(49, 1, '2020-06-03', '23', '06', 2020, 5, 3, NULL, 0, NULL, 2),
(50, 1, '2020-06-03', '23', '06', 2020, 7, 2, NULL, 0, NULL, 2),
(51, 1, '2020-06-03', '23', '06', 2020, 3, 3, NULL, 0, NULL, 2),
(52, 1, '2020-07-02', '27', '07', 2020, 3, 3, NULL, 0, NULL, 1),
(53, 1, '2020-10-07', '44', '10', 2020, 3, 1, NULL, 0, NULL, 1),
(54, 1, '2020-10-16', '44', '10', 2020, 7, 1, NULL, 0, NULL, 1),
(55, 1, '2020-11-01', '44', '11', 2020, 3, 1, NULL, 0, NULL, 1),
(56, 1, '2020-11-02', '45', '11', 2020, 3, 1, NULL, 0, NULL, 1);

-- --------------------------------------------------------

--
-- Structure de la table `prepa_physique_efforts`
--

CREATE TABLE `prepa_physique_efforts` (
  `id` int(255) NOT NULL,
  `efforts_nom` varchar(50) NOT NULL,
  `efforts_color` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Déchargement des données de la table `prepa_physique_efforts`
--

INSERT INTO `prepa_physique_efforts` (`id`, `efforts_nom`, `efforts_color`) VALUES
(1, 'Faible', 'success'),
(2, 'Modéré', 'warning'),
(3, 'Intense', 'danger');

-- --------------------------------------------------------

--
-- Structure de la table `prepa_physique_exos`
--

CREATE TABLE `prepa_physique_exos` (
  `id` int(255) NOT NULL,
  `exos_nom` varchar(60) NOT NULL,
  `vue` int(1) NOT NULL DEFAULT 1,
  `description` varchar(255) NOT NULL,
  `utilite` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Déchargement des données de la table `prepa_physique_exos`
--

INSERT INTO `prepa_physique_exos` (`id`, `exos_nom`, `vue`, `description`, `utilite`) VALUES
(1, 'Gainage', 1, 'Abdos, tronc, lombaires', 'Pour une meilleure stabilité générale.'),
(2, 'Dos', 0, '', ''),
(3, 'Bas du corps', 1, 'Jambes', 'Pour une meilleure tonicité du bas du corps.'),
(4, 'Bras', 0, '', ''),
(5, 'Cardio', 1, 'Marche, jogging, vélo...', 'Pour une meilleure récupération musculaire. Pour une meilleure régulation des émotions.'),
(6, 'Epaules', 0, '', ''),
(7, 'Haut du corps', 1, 'Bras, dos, épaules', 'Pour une meilleure maîtrise de son arc. Pour une meilleure stabilité du bras d\'arc. ');

-- --------------------------------------------------------

--
-- Structure de la table `prepa_physique_outils`
--

CREATE TABLE `prepa_physique_outils` (
  `id` int(255) NOT NULL,
  `outils_nom` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Déchargement des données de la table `prepa_physique_outils`
--

INSERT INTO `prepa_physique_outils` (`id`, `outils_nom`) VALUES
(1, 'Elastique'),
(2, 'Haltères'),
(3, 'Poids de corps'),
(4, 'Ballon'),
(5, 'Autres : Vélo...');

-- --------------------------------------------------------

--
-- Structure de la table `reglage`
--

CREATE TABLE `reglage` (
  `id` int(255) NOT NULL,
  `utilisateur_id` int(255) NOT NULL,
  `photo` varchar(10) NOT NULL,
  `viseur_marque` varchar(80) NOT NULL,
  `distance_10` varchar(50) NOT NULL,
  `distance_15` varchar(50) NOT NULL,
  `distance_18` varchar(50) NOT NULL,
  `distance_20` varchar(50) NOT NULL,
  `distance_25` varchar(50) NOT NULL,
  `distance_30` varchar(50) NOT NULL,
  `distance_40` varchar(50) NOT NULL,
  `distance_50` varchar(50) NOT NULL,
  `distance_55` varchar(50) NOT NULL,
  `distance_60` varchar(50) NOT NULL,
  `distance_70` varchar(50) NOT NULL,
  `allonge` varchar(5) NOT NULL,
  `band` varchar(5) NOT NULL,
  `tiller` varchar(5) NOT NULL,
  `puissance` varchar(5) NOT NULL,
  `poignee_taille` varchar(5) NOT NULL,
  `poignee_marque` varchar(30) NOT NULL,
  `branches_marque` varchar(30) NOT NULL,
  `branches_taille` int(3) NOT NULL,
  `branches_puissance_marquee` int(3) NOT NULL,
  `branches_puissance_allonge` int(3) NOT NULL,
  `fleches_marque` varchar(30) NOT NULL,
  `fleches_longueur` int(3) NOT NULL,
  `fleches_spin` int(4) NOT NULL,
  `corde` varchar(50) NOT NULL,
  `corde_brins` varchar(30) NOT NULL,
  `encoches_marque` varchar(30) NOT NULL,
  `encoches_taille` varchar(10) NOT NULL,
  `pointe_marque` varchar(30) NOT NULL,
  `pointe_nb_grains` int(5) NOT NULL,
  `commentaire` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Déchargement des données de la table `reglage`
--

INSERT INTO `reglage` (`id`, `utilisateur_id`, `photo`, `viseur_marque`, `distance_10`, `distance_15`, `distance_18`, `distance_20`, `distance_25`, `distance_30`, `distance_40`, `distance_50`, `distance_55`, `distance_60`, `distance_70`, `allonge`, `band`, `tiller`, `puissance`, `poignee_taille`, `poignee_marque`, `branches_marque`, `branches_taille`, `branches_puissance_marquee`, `branches_puissance_allonge`, `fleches_marque`, `fleches_longueur`, `fleches_spin`, `corde`, `corde_brins`, `encoches_marque`, `encoches_taille`, `pointe_marque`, `pointe_nb_grains`, `commentaire`) VALUES
(1, 1, '', '', '1.5', '', '2.0', '', '', '', '4.5', '5.6', '', '', '8.7  Trou 5', '29', '23,5', '5', '', '25', 'Win&Win CXT', 'Win&Win', 70, 32, 36, 'Easton ACE', 29, 620, '8125 G', '16', 'Easton', 'L', 'BreakOff', 90, '');

-- --------------------------------------------------------

--
-- Structure de la table `repetition`
--

CREATE TABLE `repetition` (
  `id` int(255) NOT NULL,
  `utilisateur_id` int(255) NOT NULL,
  `date` date NOT NULL,
  `type_id` int(255) NOT NULL,
  `nombre` int(4) NOT NULL,
  `distance_id` int(255) NOT NULL DEFAULT 0,
  `semaine` varchar(2) NOT NULL,
  `mois` varchar(2) NOT NULL,
  `an` int(4) NOT NULL,
  `travail_technique` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Déchargement des données de la table `repetition`
--

INSERT INTO `repetition` (`id`, `utilisateur_id`, `date`, `type_id`, `nombre`, `distance_id`, `semaine`, `mois`, `an`, `travail_technique`) VALUES
(9, 1, '2020-04-28', 1, 20, 0, '18', '04', 2020, ''),
(10, 1, '2020-04-28', 5, 140, 10, '18', '04', 2020, ''),
(11, 1, '2020-04-29', 1, 20, 0, '18', '04', 2020, ''),
(12, 1, '2020-04-29', 5, 66, 10, '18', '04', 2020, ''),
(13, 1, '2020-04-29', 5, 18, 40, '18', '04', 2020, ''),
(14, 1, '2020-04-29', 7, 18, 40, '18', '04', 2020, ''),
(15, 1, '2020-04-29', 7, 25, 70, '18', '04', 2020, ''),
(16, 1, '2020-04-29', 8, 72, 70, '18', '04', 2020, ''),
(17, 1, '2020-04-30', 4, 20, 0, '18', '04', 2020, ''),
(18, 1, '2020-04-30', 5, 40, 10, '18', '04', 2020, ''),
(19, 1, '2020-04-30', 7, 10, 30, '18', '04', 2020, ''),
(20, 1, '2020-04-30', 7, 30, 50, '18', '04', 2020, ''),
(21, 1, '2020-04-30', 7, 40, 70, '18', '04', 2020, ''),
(22, 1, '2020-04-30', 1, 20, 0, '18', '04', 2020, ''),
(23, 1, '2020-04-30', 7, 40, 10, '18', '04', 2020, ''),
(24, 1, '2020-05-01', 7, 10, 70, '18', '05', 2020, ''),
(25, 1, '2020-05-01', 8, 72, 70, '18', '05', 2020, ''),
(26, 1, '2020-05-01', 5, 40, 10, '18', '05', 2020, ''),
(27, 1, '2020-05-02', 8, 72, 70, '18', '05', 2020, ''),
(28, 1, '2020-05-02', 1, 10, 0, '18', '05', 2020, ''),
(29, 1, '2020-05-02', 7, 10, 70, '18', '05', 2020, ''),
(30, 1, '2020-05-03', 7, 30, 70, '18', '05', 2020, ''),
(31, 1, '2020-05-03', 8, 72, 70, '18', '05', 2020, ''),
(32, 1, '2020-05-04', 1, 10, 0, '19', '05', 2020, ''),
(33, 1, '2020-05-04', 7, 163, 70, '19', '05', 2020, ''),
(34, 1, '2020-05-04', 7, 27, 10, '19', '05', 2020, ''),
(35, 1, '2020-05-05', 1, 22, 5, '19', '05', 2020, ''),
(36, 1, '2020-05-05', 6, 126, 15, '19', '05', 2020, ''),
(37, 1, '2020-05-06', 1, 66, 5, '19', '05', 2020, ''),
(38, 1, '2020-05-06', 6, 120, 70, '19', '05', 2020, ''),
(39, 1, '2020-05-06', 6, 20, 20, '19', '05', 2020, ''),
(40, 1, '2020-05-07', 6, 30, 10, '19', '05', 2020, ''),
(41, 1, '2020-05-07', 6, 70, 70, '19', '05', 2020, ''),
(42, 1, '2020-04-01', 1, 10, 0, '14', '04', 2020, ''),
(43, 1, '2020-04-02', 1, 30, 0, '14', '04', 2020, ''),
(44, 1, '2020-04-03', 1, 20, 0, '14', '04', 2020, ''),
(45, 1, '2020-04-04', 1, 20, 0, '14', '04', 2020, ''),
(46, 1, '2020-04-06', 1, 10, 0, '15', '04', 2020, ''),
(47, 1, '2020-04-07', 1, 10, 0, '15', '04', 2020, ''),
(48, 1, '2020-04-09', 1, 10, 0, '15', '04', 2020, ''),
(49, 1, '2020-04-10', 1, 10, 0, '15', '04', 2020, ''),
(50, 1, '2020-04-14', 1, 10, 0, '16', '04', 2020, ''),
(51, 1, '2020-04-15', 1, 60, 0, '16', '04', 2020, ''),
(52, 1, '2020-04-16', 1, 50, 0, '16', '04', 2020, ''),
(53, 1, '2020-04-21', 1, 90, 0, '17', '04', 2020, ''),
(54, 1, '2020-04-22', 1, 50, 0, '17', '04', 2020, ''),
(55, 1, '2020-04-23', 1, 10, 0, '17', '04', 2020, ''),
(56, 1, '2020-04-14', 4, 20, 0, '16', '04', 2020, ''),
(57, 1, '2020-04-15', 4, 140, 0, '16', '04', 2020, ''),
(58, 1, '2020-04-16', 4, 100, 0, '16', '04', 2020, ''),
(59, 1, '2020-04-20', 4, 130, 0, '17', '04', 2020, ''),
(60, 1, '2020-04-21', 4, 110, 0, '17', '04', 2020, ''),
(62, 1, '2020-04-24', 4, 10, 0, '17', '04', 2020, ''),
(63, 1, '2020-04-01', 7, 18, 10, '14', '04', 2020, ''),
(64, 1, '2020-04-01', 7, 18, 40, '14', '04', 2020, ''),
(65, 1, '2020-04-01', 7, 119, 70, '14', '04', 2020, ''),
(66, 1, '2020-04-02', 5, 17, 10, '14', '04', 2020, ''),
(67, 1, '2020-04-02', 7, 17, 10, '14', '04', 2020, ''),
(68, 1, '2020-04-02', 7, 136, 70, '14', '04', 2020, ''),
(69, 1, '2020-04-03', 7, 34, 10, '14', '04', 2020, ''),
(70, 1, '2020-04-03', 7, 34, 50, '14', '04', 2020, ''),
(71, 1, '2020-04-03', 7, 63, 70, '14', '04', 2020, ''),
(72, 1, '2020-04-04', 7, 48, 10, '14', '04', 2020, ''),
(73, 1, '2020-04-04', 7, 32, 40, '14', '04', 2020, ''),
(74, 1, '2020-04-04', 7, 91, 70, '14', '04', 2020, ''),
(75, 1, '2020-04-06', 5, 68, 10, '15', '04', 2020, ''),
(76, 1, '2020-04-06', 7, 141, 70, '15', '04', 2020, ''),
(77, 1, '2020-04-07', 5, 42, 10, '15', '04', 2020, ''),
(78, 1, '2020-04-07', 5, 113, 70, '15', '04', 2020, ''),
(79, 1, '2020-04-07', 7, 56, 70, '15', '04', 2020, ''),
(80, 1, '2020-04-08', 5, 75, 10, '15', '04', 2020, ''),
(81, 1, '2020-04-08', 5, 30, 30, '15', '04', 2020, ''),
(82, 1, '2020-04-08', 5, 90, 70, '15', '04', 2020, ''),
(83, 1, '2020-04-09', 5, 45, 10, '15', '04', 2020, ''),
(84, 1, '2020-04-09', 5, 45, 30, '15', '04', 2020, ''),
(85, 1, '2020-04-09', 5, 75, 70, '15', '04', 2020, ''),
(86, 1, '2020-04-10', 5, 64, 10, '15', '04', 2020, ''),
(87, 1, '2020-04-10', 5, 106, 70, '15', '04', 2020, ''),
(88, 1, '2020-04-13', 5, 24, 10, '16', '04', 2020, ''),
(89, 1, '2020-04-13', 7, 13, 20, '16', '04', 2020, ''),
(90, 1, '2020-04-13', 7, 13, 40, '16', '04', 2020, ''),
(91, 1, '2020-04-13', 7, 133, 50, '16', '04', 2020, ''),
(92, 1, '2020-04-14', 5, 156, 10, '16', '04', 2020, ''),
(93, 1, '2020-04-22', 5, 2, 5, '17', '04', 2020, ''),
(94, 1, '2020-04-22', 4, 48, 0, '17', '04', 2020, ''),
(95, 1, '2020-04-23', 5, 44, 10, '17', '04', 2020, ''),
(96, 1, '2020-04-23', 7, 51, 70, '17', '04', 2020, ''),
(97, 1, '2020-04-23', 8, 72, 70, '17', '04', 2020, ''),
(98, 1, '2020-04-24', 5, 62, 10, '17', '04', 2020, ''),
(99, 1, '2020-04-24', 7, 12, 70, '17', '04', 2020, ''),
(100, 1, '2020-04-24', 8, 72, 70, '17', '04', 2020, ''),
(101, 1, '2020-04-25', 5, 20, 10, '17', '04', 2020, ''),
(102, 1, '2020-04-22', 4, 70, 0, '17', '04', 2020, ''),
(103, 1, '2020-04-25', 8, 72, 70, '17', '04', 2020, ''),
(104, 1, '2020-04-25', 7, 28, 70, '17', '04', 2020, ''),
(105, 1, '2020-05-08', 5, 200, 20, '19', '05', 2020, ''),
(106, 1, '2020-05-10', 1, 10, 0, '19', '05', 2020, ''),
(107, 1, '2020-05-10', 7, 30, 20, '19', '05', 2020, ''),
(108, 1, '2020-05-10', 7, 6, 18, '19', '05', 2020, ''),
(109, 1, '2020-05-10', 8, 120, 18, '19', '05', 2020, ''),
(110, 1, '2020-05-10', 5, 43, 18, '19', '05', 2020, ''),
(111, 1, '2020-05-14', 1, 20, 0, '20', '05', 2020, ''),
(112, 1, '2020-05-14', 5, 216, 10, '20', '05', 2020, ''),
(113, 1, '2020-05-15', 5, 100, 10, '20', '05', 2020, ''),
(114, 1, '2020-05-15', 7, 90, 10, '20', '05', 2020, 'Tir Campagne'),
(115, 1, '2020-05-16', 7, 40, 5, '20', '05', 2020, 'Déroulé'),
(116, 1, '2020-05-16', 7, 160, 15, '20', '05', 2020, 'Campagne contre Haut / contre bas'),
(117, 1, '2020-05-17', 7, 150, 15, '20', '05', 2020, 'Campagne contre Haut / contre bas'),
(118, 1, '2020-05-18', 7, 100, 20, '21', '05', 2020, ''),
(119, 1, '2020-05-18', 7, 66, 18, '21', '05', 2020, 'Run Archery'),
(120, 1, '2020-05-19', 7, 170, 18, '21', '05', 2020, 'Run Archery<br/>à 18m'),
(121, 1, '2020-05-20', 7, 115, 18, '21', '05', 2020, 'Run Archery\r\nDéroulé : maintien devant + mvt arrière'),
(122, 1, '2020-05-22', 5, 226, 10, '21', '05', 2020, 'Travail devant miroir : prise de corde en crochet, contact et libération.'),
(123, 1, '2020-05-23', 1, 10, 0, '21', '05', 2020, ''),
(124, 1, '2020-05-23', 5, 111, 5, '21', '05', 2020, 'Devant miroir : crochet, contact et relâchement'),
(125, 1, '2020-05-23', 7, 96, 20, '21', '05', 2020, ''),
(126, 1, '2020-05-24', 7, 135, 20, '21', '05', 2020, 'Crochet, mvt'),
(127, 1, '2020-05-25', 7, 153, 20, '22', '05', 2020, 'Présent'),
(128, 1, '2020-05-25', 1, 10, 0, '22', '05', 2020, ''),
(129, 1, '2020-05-26', 6, 198, 20, '22', '05', 2020, 'Plénitude dans le tir.\r\nTir plus ou moins automatisé.'),
(130, 1, '2020-05-26', 1, 20, 0, '22', '05', 2020, ''),
(131, 1, '2020-05-27', 1, 20, 0, '22', '05', 2020, ''),
(132, 1, '2020-05-27', 7, 189, 40, '22', '05', 2020, 'Run et Fit Archery\r\nStratégie : Txt sur ma poignée avant de tirer, Solide et fluide.'),
(133, 1, '2020-05-28', 7, 180, 40, '22', '05', 2020, 'Déroulé.\r\nStratégie : PPP (txt poignée) + solide devant + mvt'),
(134, 1, '2020-06-01', 1, 10, 0, '23', '06', 2020, ''),
(135, 1, '2020-06-01', 7, 54, 50, '23', '06', 2020, ''),
(136, 1, '2020-06-01', 7, 153, 70, '23', '06', 2020, 'La Garde.\r\nSoleil / vent. Humeur : calme concentrée, même si bcp de pensées.\r\n2h d\'entrainements.'),
(137, 1, '2020-06-02', 1, 20, 0, '23', '06', 2020, ''),
(138, 1, '2020-06-02', 7, 144, 70, '23', '06', 2020, 'Soleil vent.\r\nCalme, concentrée.\r\nZone de résussite : 10-9-8'),
(139, 1, '2020-06-03', 1, 10, 0, '23', '06', 2020, ''),
(140, 1, '2020-06-03', 7, 144, 70, '23', '06', 2020, 'Laisser faire les automatisme.\r\nRetour vidéo à 70m (relâchement, contact, maintien des axes : épaules, T)'),
(141, 1, '2020-06-03', 7, 36, 18, '23', '06', 2020, 'Pluie'),
(142, 1, '2020-06-04', 1, 10, 0, '23', '06', 2020, ''),
(143, 1, '2020-06-04', 7, 108, 70, '23', '06', 2020, 'Déroulé soir.'),
(144, 1, '2020-06-16', 7, 10, 70, '25', '06', 2020, ''),
(145, 1, '2020-06-16', 8, 150, 70, '25', '06', 2020, 'Soleil, vent.\r\nTai-chi avant de tirer => humeur sereine, concentrée.\r\nLangage interne craque à un moment.'),
(146, 1, '2020-07-01', 7, 149, 70, '27', '07', 2020, ''),
(147, 1, '2020-10-15', 1, 100, 0, '44', '10', 2020, ''),
(148, 1, '2020-10-31', 5, 20, 15, '44', '10', 2020, 'wx;,nlsdfnls, dfsldkjfm jklsd;f lksjdflkj mkj sdf lkj sdflkj sldf\r\nsdfklkjsdmlkfj orpt,gq,;nlfkjgqf\r\nslkdlksjdf');

-- --------------------------------------------------------

--
-- Structure de la table `repetition1`
--

CREATE TABLE `repetition1` (
  `id` int(255) NOT NULL,
  `utilisateur_id` int(255) NOT NULL,
  `date` datetime NOT NULL,
  `elastique` int(4) NOT NULL,
  `arcbois` int(4) NOT NULL,
  `miseentension` int(4) NOT NULL,
  `paille` int(4) NOT NULL,
  `evide` int(4) NOT NULL,
  `blason` int(4) NOT NULL,
  `tpsdetenue` int(4) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Structure de la table `repetition_distance`
--

CREATE TABLE `repetition_distance` (
  `id` int(255) NOT NULL,
  `distance_id` int(255) NOT NULL,
  `repetition_id` int(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Structure de la table `repetition_type`
--

CREATE TABLE `repetition_type` (
  `id` int(255) NOT NULL,
  `nom_long` varchar(30) NOT NULL,
  `nom_court` varchar(20) NOT NULL,
  `nom_champs` varchar(20) NOT NULL,
  `vue` int(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Déchargement des données de la table `repetition_type`
--

INSERT INTO `repetition_type` (`id`, `nom_long`, `nom_court`, `nom_champs`, `vue`) VALUES
(1, 'Nb élastique', 'Elast.', 'elastique', 1),
(2, 'Arc bois', 'Arc bois', 'arcbois', 0),
(3, 'Mise en tension', 'M. en tension', 'miseentension', 0),
(4, 'Tps de tenue', 'Tps ten.', 'tpsdetenue', 1),
(5, 'Paille', 'Pail.', 'paille', 1),
(6, 'Evidé', 'Evid.', 'evide', 1),
(7, 'Blason', 'Blas.', 'blason', 1),
(8, 'Tir compté', 'Comp.', 'compte', 1);

-- --------------------------------------------------------

--
-- Structure de la table `score`
--

CREATE TABLE `score` (
  `id` int(255) NOT NULL,
  `date` date NOT NULL,
  `utilisateur_id` int(255) NOT NULL,
  `distance_id` int(255) NOT NULL,
  `score1` int(4) NOT NULL,
  `score2` int(4) NOT NULL,
  `score_total` int(4) NOT NULL,
  `volee_mini` int(3) NOT NULL,
  `volee_maxi` int(3) NOT NULL,
  `volee_ecart` int(3) NOT NULL,
  `moyenne` varchar(4) NOT NULL,
  `temps_id` int(255) NOT NULL,
  `humeur_id` int(255) NOT NULL,
  `commentaire` text NOT NULL,
  `lieu` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Déchargement des données de la table `score`
--

INSERT INTO `score` (`id`, `date`, `utilisateur_id`, `distance_id`, `score1`, `score2`, `score_total`, `volee_mini`, `volee_maxi`, `volee_ecart`, `moyenne`, `temps_id`, `humeur_id`, `commentaire`, `lieu`) VALUES
(1, '2020-04-29', 1, 70, 310, 301, 611, 48, 54, 6, '8.49', 2, 1, '', 'Roudézet'),
(3, '2020-04-27', 1, 70, 289, 301, 590, 43, 57, 14, '8.19', 2, 2, '', 'Roudézet'),
(4, '2020-04-24', 1, 70, 295, 296, 591, 44, 56, 12, '8.21', 1, 3, '', 'Roudézet'),
(5, '2020-04-23', 1, 70, 296, 307, 603, 44, 55, 11, '8.38', 1, 1, '', 'Roudézet'),
(7, '2020-05-01', 1, 70, 298, 295, 593, 46, 54, 8, '8.24', 2, 2, 'Tendu.\r\nEn conscience difficile.', 'Roudézet'),
(8, '2020-05-02', 1, 70, 293, 319, 612, 42, 56, 13, '8.5', 2, 3, 'Enervée quand ça ne rentre pas.\r\nDû contre-viser au début car soleil sur cible. \r\n2e série ça a déroulé. Centrée plus sur le plaisir de tirer.\r\nRetour vidéo positif pendant le tir.', 'Roudézet'),
(9, '2020-05-03', 1, 70, 293, 316, 609, 45, 57, 12, '8.46', 1, 3, '1ere série énervé, manque de fluidité.\r\n2e série plus dans l\'axe, plus fluide, plus calme, ça rentre.', 'Roudézet'),
(11, '2020-05-10', 1, 18, 263, 252, 515, 23, 29, 6, '8.58', 2, 4, 'Calme en début de série.\r\nEn 2e série triste, désespérée de tirer autant pour faire ce score !\r\nBou !', 'Roudézet'),
(12, '2020-05-10', 1, 18, 257, 263, 520, 24, 28, 4, '8.67', 2, 4, 'Tir rapide. Traction dans l\'axe.\r\nHumeur morose.', 'Roudézet'),
(13, '2020-10-28', 1, 18, 281, 269, 550, 26, 30, 4, '9.17', 1, 1, '', 'Marseille'),
(14, '2020-10-28', 1, 18, 281, 269, 550, 26, 30, 4, '9.17', 1, 1, '', 'Marseille');

-- --------------------------------------------------------

--
-- Structure de la table `stage`
--

CREATE TABLE `stage` (
  `id` int(255) NOT NULL,
  `date` date NOT NULL,
  `lieu` varchar(70) NOT NULL,
  `type_id` int(255) NOT NULL,
  `mandat` varchar(255) DEFAULT NULL,
  `description` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Déchargement des données de la table `stage`
--

INSERT INTO `stage` (`id`, `date`, `lieu`, `type_id`, `mandat`, `description`) VALUES
(1, '2020-05-10', 'Puget', 1, 'Fiche-reprise-V21.pdf', 'blabla'),
(3, '2020-07-12', 'Inconnu', 4, NULL, 'Stage reprise');

-- --------------------------------------------------------

--
-- Structure de la table `stage_inscrits`
--

CREATE TABLE `stage_inscrits` (
  `id` int(255) NOT NULL,
  `stage_id` int(255) NOT NULL,
  `nom` varchar(40) NOT NULL,
  `prenom` varchar(40) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Structure de la table `stage_type`
--

CREATE TABLE `stage_type` (
  `id` int(255) NOT NULL,
  `nom` varchar(60) NOT NULL,
  `description` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Déchargement des données de la table `stage_type`
--

INSERT INTO `stage_type` (`id`, `nom`, `description`) VALUES
(1, 'PPD', 'Départementaux jeunes (pour les Poussin, Benjamins, Minimes et Cadets)'),
(2, 'PPR', 'Stages Elites régionaux jeunes (pour les Benjamins et Minimes)'),
(3, 'Régional', 'Stages organisés par la région'),
(4, 'Interclub', 'Stages départementaux adultes (Junior et Sénior)'),
(5, 'Autres', 'Autres types de stages');

-- --------------------------------------------------------

--
-- Structure de la table `temps`
--

CREATE TABLE `temps` (
  `id` int(255) NOT NULL,
  `type` varchar(50) NOT NULL,
  `icone` varchar(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Déchargement des données de la table `temps`
--

INSERT INTO `temps` (`id`, `type`, `icone`) VALUES
(1, 'Soleil', 'sun'),
(2, 'Nuageux', 'cloud-sun'),
(3, 'Pluie', 'cloud-showers-heavy'),
(4, 'Vent', 'wind'),
(5, 'Pluie et vent', 'poo-storm');

-- --------------------------------------------------------

--
-- Structure de la table `utilisateur`
--

CREATE TABLE `utilisateur` (
  `id` int(255) NOT NULL,
  `login` varchar(40) NOT NULL,
  `password` varchar(100) NOT NULL,
  `photo` varchar(20) NOT NULL,
  `nom` varchar(30) NOT NULL,
  `prenom` varchar(20) NOT NULL,
  `telephone` varchar(30) NOT NULL,
  `email` varchar(100) NOT NULL,
  `club_id` int(255) NOT NULL,
  `licence` varchar(10) NOT NULL,
  `categorie_id` int(5) NOT NULL,
  `arme_id` int(5) NOT NULL,
  `droit_id` int(4) NOT NULL DEFAULT 1
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Déchargement des données de la table `utilisateur`
--

INSERT INTO `utilisateur` (`id`, `login`, `password`, `photo`, `nom`, `prenom`, `telephone`, `email`, `club_id`, `licence`, `categorie_id`, `arme_id`, `droit_id`) VALUES
(1, 'fialon.sandrine@gmail.com', '$2y$10$T0oXrV/5EU2B082wjmHEieiSC9mClOi850ccPBWwstO7W5W4UppBK', '11526.jpg', 'Fialon', 'Sandrine', '0683', '', 2, '803111X', 6, 1, 3),
(3, 'fialon.sandrine1@gmail.com', '$2y$10$sb3LJg9PGJFmwDhWIT4yNODEtny/NZp/6bUOyIsDgnRNG1NCmWxYy', '', 'sd', 'sdf', '', 'fialon.sandrine1@gmail.com', 2, 'sdf', 5, 1, 1),
(4, '1fialon.sandrine@gmail.com', '$2y$10$JUTGsVEzzvfvfVlL/ufC2Oks7/jjFBZZqc0SrEfYrZ2OgnQuFrZiO', '', 'sdf', 'sdf', '', '1fialon.sandrine@gmail.com', 5, 'sdf', 0, 0, 1),
(20, 'testfialon.sandrine@gmail.com', '$2y$10$TwFA4XKDtJ/zRP3JZIHPdejlGWWAjsWvKyLZE7g.5wPeYx4Qiuxgi', '', 'test', 'srer', '', 'testfialon.sandrine@gmail.com', 0, '80983', 0, 0, 1);

-- --------------------------------------------------------

--
-- Structure de la table `viseur`
--

CREATE TABLE `viseur` (
  `id` int(255) NOT NULL,
  `utilisateur_id` int(255) NOT NULL,
  `distance_id` tinyint(3) NOT NULL,
  `valeur` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Index pour les tables déchargées
--

--
-- Index pour la table `arme`
--
ALTER TABLE `arme`
  ADD PRIMARY KEY (`id`);

--
-- Index pour la table `categorie`
--
ALTER TABLE `categorie`
  ADD PRIMARY KEY (`id`);

--
-- Index pour la table `club`
--
ALTER TABLE `club`
  ADD PRIMARY KEY (`id`);

--
-- Index pour la table `competition`
--
ALTER TABLE `competition`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `Type_id` (`type_id`);

--
-- Index pour la table `competition_type`
--
ALTER TABLE `competition_type`
  ADD PRIMARY KEY (`id`);

--
-- Index pour la table `distance`
--
ALTER TABLE `distance`
  ADD PRIMARY KEY (`id`);

--
-- Index pour la table `droit`
--
ALTER TABLE `droit`
  ADD PRIMARY KEY (`id`);

--
-- Index pour la table `humeur`
--
ALTER TABLE `humeur`
  ADD PRIMARY KEY (`id`);

--
-- Index pour la table `mois`
--
ALTER TABLE `mois`
  ADD PRIMARY KEY (`id`);

--
-- Index pour la table `prepa_physique`
--
ALTER TABLE `prepa_physique`
  ADD PRIMARY KEY (`id`),
  ADD KEY `utilisateur_id` (`utilisateur_id`),
  ADD KEY `outils` (`outils_id`);

--
-- Index pour la table `prepa_physique_efforts`
--
ALTER TABLE `prepa_physique_efforts`
  ADD PRIMARY KEY (`id`);

--
-- Index pour la table `prepa_physique_exos`
--
ALTER TABLE `prepa_physique_exos`
  ADD PRIMARY KEY (`id`);

--
-- Index pour la table `prepa_physique_outils`
--
ALTER TABLE `prepa_physique_outils`
  ADD PRIMARY KEY (`id`);

--
-- Index pour la table `reglage`
--
ALTER TABLE `reglage`
  ADD PRIMARY KEY (`id`),
  ADD KEY `utilisateur_id` (`utilisateur_id`);

--
-- Index pour la table `repetition`
--
ALTER TABLE `repetition`
  ADD PRIMARY KEY (`id`),
  ADD KEY `utilisateur_id` (`utilisateur_id`),
  ADD KEY `type_id` (`type_id`),
  ADD KEY `distance_id` (`distance_id`);

--
-- Index pour la table `repetition1`
--
ALTER TABLE `repetition1`
  ADD PRIMARY KEY (`id`),
  ADD KEY `utilisateur_id` (`utilisateur_id`);

--
-- Index pour la table `repetition_distance`
--
ALTER TABLE `repetition_distance`
  ADD PRIMARY KEY (`id`),
  ADD KEY `repetition_id` (`repetition_id`);

--
-- Index pour la table `repetition_type`
--
ALTER TABLE `repetition_type`
  ADD PRIMARY KEY (`id`);

--
-- Index pour la table `score`
--
ALTER TABLE `score`
  ADD PRIMARY KEY (`id`),
  ADD KEY `distance_id` (`distance_id`),
  ADD KEY `utilisateur_id` (`utilisateur_id`);

--
-- Index pour la table `stage`
--
ALTER TABLE `stage`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `Type_id` (`type_id`);

--
-- Index pour la table `stage_inscrits`
--
ALTER TABLE `stage_inscrits`
  ADD PRIMARY KEY (`id`),
  ADD KEY `stage_id` (`stage_id`);

--
-- Index pour la table `stage_type`
--
ALTER TABLE `stage_type`
  ADD PRIMARY KEY (`id`);

--
-- Index pour la table `temps`
--
ALTER TABLE `temps`
  ADD PRIMARY KEY (`id`);

--
-- Index pour la table `utilisateur`
--
ALTER TABLE `utilisateur`
  ADD PRIMARY KEY (`id`),
  ADD KEY `droit` (`droit_id`),
  ADD KEY `club` (`club_id`),
  ADD KEY `categorie_id` (`categorie_id`),
  ADD KEY `arme_id` (`arme_id`);

--
-- Index pour la table `viseur`
--
ALTER TABLE `viseur`
  ADD PRIMARY KEY (`id`),
  ADD KEY `utilisateur_id` (`utilisateur_id`);

--
-- AUTO_INCREMENT pour les tables déchargées
--

--
-- AUTO_INCREMENT pour la table `arme`
--
ALTER TABLE `arme`
  MODIFY `id` int(255) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT pour la table `categorie`
--
ALTER TABLE `categorie`
  MODIFY `id` int(255) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT pour la table `club`
--
ALTER TABLE `club`
  MODIFY `id` int(255) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=23;

--
-- AUTO_INCREMENT pour la table `competition`
--
ALTER TABLE `competition`
  MODIFY `id` int(255) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT pour la table `competition_type`
--
ALTER TABLE `competition_type`
  MODIFY `id` int(255) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT pour la table `distance`
--
ALTER TABLE `distance`
  MODIFY `id` int(255) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=72;

--
-- AUTO_INCREMENT pour la table `droit`
--
ALTER TABLE `droit`
  MODIFY `id` int(255) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT pour la table `humeur`
--
ALTER TABLE `humeur`
  MODIFY `id` int(255) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT pour la table `prepa_physique`
--
ALTER TABLE `prepa_physique`
  MODIFY `id` int(255) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=57;

--
-- AUTO_INCREMENT pour la table `prepa_physique_efforts`
--
ALTER TABLE `prepa_physique_efforts`
  MODIFY `id` int(255) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT pour la table `prepa_physique_exos`
--
ALTER TABLE `prepa_physique_exos`
  MODIFY `id` int(255) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT pour la table `prepa_physique_outils`
--
ALTER TABLE `prepa_physique_outils`
  MODIFY `id` int(255) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT pour la table `reglage`
--
ALTER TABLE `reglage`
  MODIFY `id` int(255) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT pour la table `repetition`
--
ALTER TABLE `repetition`
  MODIFY `id` int(255) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=149;

--
-- AUTO_INCREMENT pour la table `repetition1`
--
ALTER TABLE `repetition1`
  MODIFY `id` int(255) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT pour la table `repetition_distance`
--
ALTER TABLE `repetition_distance`
  MODIFY `id` int(255) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT pour la table `repetition_type`
--
ALTER TABLE `repetition_type`
  MODIFY `id` int(255) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT pour la table `score`
--
ALTER TABLE `score`
  MODIFY `id` int(255) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- AUTO_INCREMENT pour la table `stage`
--
ALTER TABLE `stage`
  MODIFY `id` int(255) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT pour la table `stage_inscrits`
--
ALTER TABLE `stage_inscrits`
  MODIFY `id` int(255) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT pour la table `stage_type`
--
ALTER TABLE `stage_type`
  MODIFY `id` int(255) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT pour la table `temps`
--
ALTER TABLE `temps`
  MODIFY `id` int(255) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT pour la table `utilisateur`
--
ALTER TABLE `utilisateur`
  MODIFY `id` int(255) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=22;

--
-- AUTO_INCREMENT pour la table `viseur`
--
ALTER TABLE `viseur`
  MODIFY `id` int(255) NOT NULL AUTO_INCREMENT;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
