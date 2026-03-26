-- phpMyAdmin SQL Dump
-- version 5.2.1deb3
-- https://www.phpmyadmin.net/
--
-- Hôte : localhost:3306
-- Généré le : mer. 04 fév. 2026 à 07:36
-- Version du serveur : 8.0.45-0ubuntu0.24.04.1
-- Version de PHP : 8.3.6

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de données : `pinf_syra`
--

-- --------------------------------------------------------

--
-- Structure de la table `blocs_page`
--

CREATE TABLE `blocs_page` (
  `id` int NOT NULL,
  `page_id` int NOT NULL,
  `ordre` int NOT NULL DEFAULT '0',
  `type` enum('texte','image','lien','iframe','html') NOT NULL DEFAULT 'texte',
  `titre_publie` varchar(180) DEFAULT NULL,
  `titre_propose` varchar(180) DEFAULT NULL,
  `contenu_texte_publie` longtext,
  `contenu_texte_propose` longtext,
  `media_publie_id` int DEFAULT NULL,
  `media_propose_id` int DEFAULT NULL,
  `url_publie` varchar(255) DEFAULT NULL,
  `url_propose` varchar(255) DEFAULT NULL,
  `statut` enum('publie','a_valider','brouillon') NOT NULL DEFAULT 'publie',
  `dernier_modifie_par_id` int DEFAULT NULL,
  `date_creation` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `date_modification` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB;

--
-- Déchargement des données de la table `blocs_page`
--

INSERT INTO `blocs_page` (`id`, `page_id`, `ordre`, `type`, `titre_publie`, `titre_propose`, `contenu_texte_publie`, `contenu_texte_propose`, `media_publie_id`, `media_propose_id`, `url_publie`, `url_propose`, `statut`, `dernier_modifie_par_id`, `date_creation`, `date_modification`) VALUES
(1, 1, 10, 'texte', 'hero_titre', NULL, 'Nœux Environnement', NULL, NULL, NULL, NULL, NULL, 'publie', NULL, '2026-02-03 15:21:20', '2026-02-03 15:21:20'),
(2, 1, 20, 'texte', 'hero_sous_titre', NULL, 'Gestion et protection des milieux naturels et insertion socio-professionnelle des personnes éloignées de l’emploi.', NULL, NULL, NULL, NULL, NULL, 'publie', NULL, '2026-02-03 15:21:20', '2026-02-03 15:21:20'),
(3, 1, 30, 'lien', 'hero_bouton_1', NULL, 'Découvrir nos actions', NULL, NULL, NULL, 'nos-actions.html', NULL, 'publie', NULL, '2026-02-03 15:21:20', '2026-02-03 15:21:20'),
(4, 1, 40, 'lien', 'hero_bouton_2', NULL, 'En savoir plus sur La Réserve', NULL, NULL, NULL, 'la-reserve.html', NULL, 'publie', NULL, '2026-02-03 15:21:20', '2026-02-03 15:21:20'),
(5, 1, 50, 'lien', 'hero_bouton_3', NULL, 'Commander un panier de légumes', NULL, NULL, NULL, 'paniers.html', NULL, 'publie', NULL, '2026-02-03 15:21:20', '2026-02-03 15:21:20'),
(6, 1, 60, 'texte', 'intro_paragraphe_1', NULL, 'Depuis 1991, Nœux Environnement agit pour la nature, la biodiversité et l’insertion sur le territoire de Nœux-les-Mines et des communes voisines.', NULL, NULL, NULL, NULL, NULL, 'publie', NULL, '2026-02-03 15:21:20', '2026-02-03 15:21:20'),
(7, 1, 70, 'texte', 'intro_paragraphe_2', NULL, 'Nous intervenons sur les milieux naturels, développons un maraîchage biologique, accompagnons des personnes vers l’emploi et organisons des animations pour tous.', NULL, NULL, NULL, NULL, NULL, 'publie', NULL, '2026-02-03 15:21:20', '2026-02-03 15:21:20'),
(8, 1, 80, 'texte', 'reserve_titre', NULL, 'La Réserve, écolieu vivant de l’Artois', NULL, NULL, NULL, NULL, NULL, 'publie', NULL, '2026-02-03 15:21:20', '2026-02-03 15:21:20'),
(9, 1, 90, 'texte', 'reserve_paragraphe_1', NULL, 'La Réserve est notre nouveau lieu de travail et de vie à Nœux-les-Mines. Ancienne friche commerciale transformée, elle rassemble un bâtiment rénové, des jardins, des parcelles maraîchères et des espaces d’animation.', NULL, NULL, NULL, NULL, NULL, 'publie', NULL, '2026-02-03 15:21:20', '2026-02-03 15:21:20'),
(10, 1, 100, 'texte', 'reserve_paragraphe_2', NULL, 'C’est un lieu pour expérimenter la transition écologique, accueillir des groupes, organiser des événements et rencontrer les habitants.', NULL, NULL, NULL, NULL, NULL, 'publie', NULL, '2026-02-03 15:21:20', '2026-02-03 15:21:20'),
(11, 1, 110, 'lien', 'reserve_bouton', NULL, 'Découvrir La Réserve', NULL, NULL, NULL, 'la-reserve.html', NULL, 'publie', NULL, '2026-02-03 15:21:20', '2026-02-03 15:21:20'),
(12, 1, 120, 'image', 'reserve_image', NULL, NULL, NULL, 2, NULL, NULL, NULL, 'publie', NULL, '2026-02-03 15:21:20', '2026-02-03 15:21:20'),
(13, 1, 130, 'texte', 'planning_titre', NULL, 'Planning à venir', NULL, NULL, NULL, NULL, NULL, 'publie', NULL, '2026-02-03 15:21:20', '2026-02-03 15:21:20'),
(14, 1, 140, 'texte', 'planning_texte', NULL, 'Pas d’événement programmé dans les prochains jours. N’hésitez pas à consulter régulièrement cette page ou à suivre nos réseaux sociaux.', NULL, NULL, NULL, NULL, NULL, 'publie', NULL, '2026-02-03 15:21:20', '2026-02-03 15:21:20'),
(15, 1, 150, 'lien', 'planning_bouton', NULL, 'Voir l\'agenda complet', NULL, NULL, NULL, 'agenda.html', NULL, 'publie', NULL, '2026-02-03 15:21:20', '2026-02-03 15:21:20'),
(16, 10, 10, 'image', 'banniere_image', NULL, NULL, NULL, 3, NULL, NULL, NULL, 'publie', NULL, '2026-02-03 15:21:20', '2026-02-03 15:21:20'),
(17, 10, 20, 'texte', 'banniere_titre', NULL, 'Contact & Venir', NULL, NULL, NULL, NULL, NULL, 'publie', NULL, '2026-02-03 15:21:20', '2026-02-03 15:21:20'),
(18, 10, 30, 'texte', 'intro', NULL, 'Vous souhaitez nous poser une question, organiser une animation, proposer un projet ou tout simplement venir nous voir ? Vous trouverez ici toutes les informations utiles pour contacter Nœux Environnement et venir à La Réserve.', NULL, NULL, NULL, NULL, NULL, 'publie', NULL, '2026-02-03 15:21:20', '2026-02-03 15:21:20'),
(19, 10, 40, 'texte', 'horaires', NULL, 'L’association est ouverte du lundi au jeudi de 9h00 à 17h00 et le vendredi de 9h00 à 16h00.', NULL, NULL, NULL, NULL, NULL, 'publie', NULL, '2026-02-03 15:21:20', '2026-02-03 15:21:20'),
(20, 10, 60, 'texte', 'orga_titre', NULL, 'Organiser une animation, une visite ou un événement', NULL, NULL, NULL, NULL, NULL, 'publie', NULL, '2026-02-03 15:21:20', '2026-02-03 15:21:20'),
(21, 10, 70, 'texte', 'orga_paragraphe_1', NULL, 'Vous êtes enseignant, animateur, responsable de groupe ou représentant d\'une collectivité ? Vous souhaitez organiser une animation nature, visiter les jardins ou co-organiser un événement ?', NULL, NULL, NULL, NULL, NULL, 'publie', NULL, '2026-02-03 15:21:20', '2026-02-03 15:21:20'),
(22, 10, 80, 'texte', 'orga_paragraphe_2', NULL, 'Nous vous proposons d’échanger avec vous pour construire un projet adapté à vos besoins.', NULL, NULL, NULL, NULL, NULL, 'publie', NULL, '2026-02-03 15:21:20', '2026-02-03 15:21:20'),
(23, 10, 90, 'lien', 'orga_bouton', NULL, 'Demander une animation / une visite', NULL, NULL, NULL, 'contact.html?subject=animation', NULL, 'publie', NULL, '2026-02-03 15:21:20', '2026-02-03 15:21:20'),
(24, 10, 110, 'texte', 'infos_pratiques_titre', NULL, 'Infos pratiques', NULL, NULL, NULL, NULL, NULL, 'publie', NULL, '2026-02-03 15:21:20', '2026-02-03 15:21:20'),
(25, 10, 120, 'texte', 'infos_pratiques_texte', NULL, 'Nous faisons notre possible pour répondre rapidement à vos demandes. Selon les périodes, les délais de réponse peuvent être un peu plus longs.', NULL, NULL, NULL, NULL, NULL, 'publie', NULL, '2026-02-03 15:21:20', '2026-02-03 15:21:20'),
(26, 12, 10, 'image', 'hero_image', NULL, NULL, NULL, 5, NULL, NULL, NULL, 'publie', NULL, '2026-02-03 15:21:20', '2026-02-03 15:21:20'),
(27, 12, 20, 'texte', 'hero_titre', NULL, 'La Réserve – écolieu vivant de l’Artois', NULL, NULL, NULL, NULL, NULL, 'publie', NULL, '2026-02-03 15:21:20', '2026-02-03 15:21:20'),
(28, 12, 30, 'texte', 'hero_paragraphe_1', NULL, 'À Nœux-les-Mines, une ancienne friche commerciale s’est transformée en écolieu vivant, ouvert à toutes et tous.', NULL, NULL, NULL, NULL, NULL, 'publie', NULL, '2026-02-03 15:21:20', '2026-02-03 15:21:20'),
(29, 12, 40, 'texte', 'hero_paragraphe_2', NULL, 'La Réserve est un lieu où l’on expérimente concrètement la transition écologique et solidaire : un bâtiment réhabilité, des jardins, des animations, et des parcours d\'insertion.', NULL, NULL, NULL, NULL, NULL, 'publie', NULL, '2026-02-03 15:21:20', '2026-02-03 15:21:20'),
(30, 12, 50, 'lien', 'hero_bouton_1', NULL, 'Découvrir les salles', NULL, NULL, NULL, 'reserver-salle.html', NULL, 'publie', NULL, '2026-02-03 15:21:20', '2026-02-03 15:21:20'),
(31, 12, 60, 'lien', 'hero_bouton_2', NULL, 'Visites & Animations', NULL, NULL, NULL, 'visites.html', NULL, 'publie', NULL, '2026-02-03 15:21:20', '2026-02-03 15:21:20'),
(32, 12, 80, 'texte', 'section1_titre', NULL, 'Un écolieu vivant, pour qui, pour quoi ?', NULL, NULL, NULL, NULL, NULL, 'publie', NULL, '2026-02-03 15:21:20', '2026-02-03 15:21:20'),
(33, 12, 90, 'texte', 'section1_intro', NULL, 'La Réserve, c’est :', NULL, NULL, NULL, NULL, NULL, 'publie', NULL, '2026-02-03 15:21:20', '2026-02-03 15:21:20'),
(34, 12, 100, 'texte', 'section1_item_1', NULL, 'un lieu de vie où se croisent habitants, associations, scolaires, collectivités, entreprises ;', NULL, NULL, NULL, NULL, NULL, 'publie', NULL, '2026-02-03 15:21:20', '2026-02-03 15:21:20'),
(35, 12, 110, 'texte', 'section1_item_2', NULL, 'un site démonstrateur de la transition écologique : bâtiment, énergie, eau, sols, biodiversité, agriculture durable, alimentation, inclusion sociale ;', NULL, NULL, NULL, NULL, NULL, 'publie', NULL, '2026-02-03 15:21:20', '2026-02-03 15:21:20'),
(36, 12, 120, 'texte', 'section1_item_3', NULL, 'un tiers-lieu social et nourricier, au service du territoire.', NULL, NULL, NULL, NULL, NULL, 'publie', NULL, '2026-02-03 15:21:20', '2026-02-03 15:21:20'),
(37, 12, 130, 'texte', 'section1_conclusion', NULL, 'Le projet s’appuie sur l’expérience de Nœux Environnement : gestion des milieux naturels, insertion par l’activité économique, éducation à l’environnement et alimentation durable.', NULL, NULL, NULL, NULL, NULL, 'publie', NULL, '2026-02-03 15:21:20', '2026-02-03 15:21:20'),
(38, 12, 150, 'texte', 'chiffres_titre', NULL, 'La Réserve en quelques chiffres', NULL, NULL, NULL, NULL, NULL, 'publie', NULL, '2026-02-03 15:21:20', '2026-02-03 15:21:20'),
(39, 12, 160, 'image', 'chiffres_image', NULL, NULL, NULL, 6, NULL, NULL, NULL, 'publie', NULL, '2026-02-03 15:21:20', '2026-02-03 15:21:20'),
(40, 12, 180, 'texte', 'avenir_titre', NULL, 'À venir à La Réserve', NULL, NULL, NULL, NULL, NULL, 'publie', NULL, '2026-02-03 15:21:20', '2026-02-03 15:21:20'),
(41, 12, 190, 'texte', 'avenir_texte', NULL, 'Planning à venir...', NULL, NULL, NULL, NULL, NULL, 'publie', NULL, '2026-02-03 15:21:20', '2026-02-03 15:21:20'),
(42, 12, 200, 'lien', 'avenir_bouton', NULL, 'Voir tout l\'agenda', NULL, NULL, NULL, 'agenda.html', NULL, 'publie', NULL, '2026-02-03 15:21:20', '2026-02-03 15:21:20'),
(43, 19, 10, 'image', 'hero_image', NULL, NULL, NULL, 7, NULL, NULL, NULL, 'publie', NULL, '2026-02-03 15:21:20', '2026-02-03 15:21:20'),
(44, 19, 20, 'texte', 'hero_titre', NULL, 'Contact', NULL, NULL, NULL, NULL, NULL, 'publie', NULL, '2026-02-03 15:21:20', '2026-02-03 15:21:20'),
(45, 19, 30, 'texte', 'hero_paragraphe_1', NULL, 'Une question ? Un projet de visite ou d’animation ? Une réservation de salle ?', NULL, NULL, NULL, NULL, NULL, 'publie', NULL, '2026-02-03 15:21:20', '2026-02-03 15:21:20'),
(46, 19, 40, 'texte', 'hero_paragraphe_2', NULL, 'Cette page vous permet de nous écrire facilement, en précisant le motif de votre demande. Nous vous répondrons dans les meilleurs délais.', NULL, NULL, NULL, NULL, NULL, 'publie', NULL, '2026-02-03 15:21:20', '2026-02-03 15:21:20'),
(47, 19, 60, 'texte', 'sujets_titre', NULL, 'Que souhaitez-vous faire ?', NULL, NULL, NULL, NULL, NULL, 'publie', NULL, '2026-02-03 15:21:20', '2026-02-03 15:21:20'),
(48, 19, 70, 'texte', 'sujet_general_titre', NULL, 'Question générale', NULL, NULL, NULL, NULL, NULL, 'publie', NULL, '2026-02-03 15:21:20', '2026-02-03 15:21:20'),
(49, 19, 80, 'texte', 'sujet_general_desc', NULL, 'Une question sur La Réserve, le lieu, un projet, une info pratique…', NULL, NULL, NULL, NULL, NULL, 'publie', NULL, '2026-02-03 15:21:20', '2026-02-03 15:21:20'),
(50, 19, 90, 'texte', 'sujet_visite_titre', NULL, 'Visite ou animation', NULL, NULL, NULL, NULL, NULL, 'publie', NULL, '2026-02-03 15:21:20', '2026-02-03 15:21:20'),
(51, 19, 100, 'texte', 'sujet_visite_desc', NULL, 'Organiser une visite guidée, une animation scolaire, un atelier ou une journée pro.', NULL, NULL, NULL, NULL, NULL, 'publie', NULL, '2026-02-03 15:21:20', '2026-02-03 15:21:20'),
(52, 19, 110, 'texte', 'sujet_location_titre', NULL, 'Réservation de salle', NULL, NULL, NULL, NULL, NULL, 'publie', NULL, '2026-02-03 15:21:20', '2026-02-03 15:21:20'),
(53, 19, 120, 'texte', 'sujet_location_desc', NULL, 'Utiliser une salle de La Réserve pour une réunion, une formation, un événement…', NULL, NULL, NULL, NULL, NULL, 'publie', NULL, '2026-02-03 15:21:20', '2026-02-03 15:21:20'),
(54, 18, 10, 'image', 'hero_image', NULL, NULL, NULL, 8, NULL, NULL, NULL, 'publie', NULL, '2026-02-03 15:21:20', '2026-02-03 15:21:20'),
(55, 18, 20, 'texte', 'hero_titre', NULL, 'Réserver une salle à La Réserve', NULL, NULL, NULL, NULL, NULL, 'publie', NULL, '2026-02-03 15:21:20', '2026-02-03 15:21:20'),
(56, 18, 30, 'texte', 'hero_paragraphe_1', NULL, 'La Réserve dispose de plusieurs salles et espaces qui peuvent accueillir vos réunions, ateliers, formations ou journées d’équipe.', NULL, NULL, NULL, NULL, NULL, 'publie', NULL, '2026-02-03 15:21:20', '2026-02-03 15:21:20'),
(57, 18, 40, 'texte', 'hero_paragraphe_2', NULL, 'Nous mettons ces espaces à disposition des associations, collectivités, structures sociales, organismes de formation et entreprises, dans la mesure des disponibilités du lieu.', NULL, NULL, NULL, NULL, NULL, 'publie', NULL, '2026-02-03 15:21:20', '2026-02-03 15:21:20'),
(58, 18, 50, 'lien', 'hero_bouton', NULL, 'Faire une demande de réservation', NULL, NULL, NULL, 'contact.html?subject=location', NULL, 'publie', NULL, '2026-02-03 15:21:20', '2026-02-03 15:21:20'),
(59, 18, 70, 'texte', 'projets_titre', NULL, 'Pour quels types de projets ?', NULL, NULL, NULL, NULL, NULL, 'publie', NULL, '2026-02-03 15:21:20', '2026-02-03 15:21:20'),
(60, 18, 80, 'image', 'projets_image', NULL, NULL, NULL, 9, NULL, NULL, NULL, 'publie', NULL, '2026-02-03 15:21:20', '2026-02-03 15:21:20'),
(61, 18, 100, 'texte', 'comment_titre', NULL, 'Comment réserver une salle ?', NULL, NULL, NULL, NULL, NULL, 'publie', NULL, '2026-02-03 15:21:20', '2026-02-03 15:21:20'),
(62, 18, 110, 'texte', 'etape1_titre', NULL, 'Étape 1 – Faire une demande', NULL, NULL, NULL, NULL, NULL, 'publie', NULL, '2026-02-03 15:21:20', '2026-02-03 15:21:20'),
(63, 18, 120, 'texte', 'etape1_texte', NULL, 'Vous remplissez le formulaire de la page Contact & demandes, en choisissant le sujet “Réservation de salle / événement”.', NULL, NULL, NULL, NULL, NULL, 'publie', NULL, '2026-02-03 15:21:20', '2026-02-03 15:21:20'),
(64, 18, 130, 'texte', 'etape2_titre', NULL, 'Étape 2 – Validation et confirmation', NULL, NULL, NULL, NULL, NULL, 'publie', NULL, '2026-02-03 15:21:20', '2026-02-03 15:21:20'),
(65, 18, 140, 'texte', 'etape2_texte', NULL, 'L’équipe de La Réserve vous répond pour vérifier les disponibilités et ajuster la configuration. Si tout est OK, nous vous envoyons un récapitulatif par mail.', NULL, NULL, NULL, NULL, NULL, 'publie', NULL, '2026-02-03 15:21:20', '2026-02-03 15:21:20'),
(66, 18, 150, 'texte', 'etape3_titre', NULL, 'Étape 3 – Règlement via Trello', NULL, NULL, NULL, NULL, NULL, 'publie', NULL, '2026-02-03 15:21:20', '2026-02-03 15:21:20'),
(67, 18, 160, 'texte', 'etape3_texte', NULL, 'Pour finaliser, vous recevez un lien externe Trello pour accéder à votre dossier et effectuer le paiement en ligne sécurisé.', NULL, NULL, NULL, NULL, NULL, 'publie', NULL, '2026-02-03 15:21:20', '2026-02-03 15:21:20');

-- --------------------------------------------------------

--
-- Structure de la table `disponibilites_salles`
--

CREATE TABLE `disponibilites_salles` (
  `id` int NOT NULL,
  `salle_id` int NOT NULL,
  `date` date NOT NULL,
  `id_creneau` int NOT NULL
) ENGINE=InnoDB;

-- --------------------------------------------------------

--
-- Structure de la table `medias`
--

CREATE TABLE `medias` (
  `id` int NOT NULL,
  `site_id` int NOT NULL,
  `chemin_fichier` varchar(255) NOT NULL,
  `nom_original` varchar(255) DEFAULT NULL,
  `type_mime` varchar(80) DEFAULT NULL,
  `texte_alt` varchar(180) DEFAULT NULL,
  `date_creation` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB;

--
-- Déchargement des données de la table `medias`
--

INSERT INTO `medias` (`id`, `site_id`, `chemin_fichier`, `nom_original`, `type_mime`, `texte_alt`, `date_creation`) VALUES
(1, 1, 'assets/images/logo_noeux_environnement.png', NULL, NULL, 'Logo Noeux Environnement', '2026-02-03 15:21:19'),
(2, 1, 'assets/images/lareservehero_bellephoto_nuit.jpg', NULL, NULL, 'La Réserve (photo)', '2026-02-03 15:21:19'),
(3, 1, 'assets/images/equipe_noeux_environnement.jpg', NULL, NULL, 'Équipe Nœux Environnement', '2026-02-03 15:21:19'),
(4, 2, 'assets/images/logo_noeux_environnement.png', NULL, NULL, 'Logo Noeux Environnement', '2026-02-03 15:21:19'),
(5, 2, 'assets/images/acceuil_locaux.jpeg', NULL, NULL, 'La Réserve - façade/locaux', '2026-02-03 15:21:19'),
(6, 2, 'assets/images/avant_après.webp', NULL, NULL, 'Avant / Après - plan La Réserve', '2026-02-03 15:21:19'),
(7, 2, 'assets/images/lareservehero_bellephoto_nuit.jpg', NULL, NULL, 'La Réserve - photo de nuit', '2026-02-03 15:21:20'),
(8, 2, 'assets/images/salle_reunion.jpg', NULL, NULL, 'Salle de réunion', '2026-02-03 15:21:20'),
(9, 2, 'assets/images/plan_vue_de_haut_locaux.jpg', NULL, NULL, 'Vue de haut des locaux', '2026-02-03 15:21:20'),
(11, 2, 'uploads/20260203_161924_4c66de68.png', 'schema_fonctionnel_pind_v4.png', 'image/png', 'test', '2026-02-03 17:19:24');

-- --------------------------------------------------------

--
-- Structure de la table `messages_contact`
--

CREATE TABLE `messages_contact` (
  `id` int NOT NULL,
  `site_id` int NOT NULL,
  `nom` varchar(120) NOT NULL,
  `email` varchar(180) NOT NULL,
  `sujet` varchar(160) DEFAULT NULL,
  `message` longtext NOT NULL,
  `champ_piege` varchar(255) DEFAULT NULL,
  `ip` varchar(45) DEFAULT NULL,
  `date_creation` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB;

-- --------------------------------------------------------

--
-- Structure de la table `modules`
--

CREATE TABLE `modules` (
  `id` int NOT NULL,
  `site_id` int NOT NULL,
  `cle` varchar(80) NOT NULL,
  `actif` tinyint(1) NOT NULL DEFAULT '1'
) ENGINE=InnoDB;

--
-- Déchargement des données de la table `modules`
--

INSERT INTO `modules` (`id`, `site_id`, `cle`, `actif`) VALUES
(1, 1, 'cms', 1),
(2, 1, 'agenda', 0),
(3, 1, 'reservations_salles', 0),
(4, 1, 'paniers', 1),
(5, 2, 'cms', 1),
(6, 2, 'agenda', 1),
(7, 2, 'reservations_salles', 1);

-- --------------------------------------------------------

--
-- Structure de la table `pages`
--

CREATE TABLE `pages` (
  `id` int NOT NULL,
  `site_id` int NOT NULL,
  `identifiant_url` varchar(120) NOT NULL,
  `titre_publie` varchar(180) NOT NULL,
  `titre_propose` varchar(180) DEFAULT NULL,
  `statut` enum('publie','a_valider','brouillon') NOT NULL DEFAULT 'publie',
  `dernier_modifie_par_id` int DEFAULT NULL,
  `date_creation` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `date_modification` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB;

--
-- Déchargement des données de la table `pages`
--

INSERT INTO `pages` (`id`, `site_id`, `identifiant_url`, `titre_publie`, `titre_propose`, `statut`, `dernier_modifie_par_id`, `date_creation`, `date_modification`) VALUES
(1, 1, 'accueil', 'Accueil', NULL, 'publie', NULL, '2026-02-03 14:36:07', '2026-02-03 14:36:07'),
(2, 1, 'qui-sommes-nous', 'Qui sommes-nous ?', NULL, 'publie', NULL, '2026-02-03 14:36:07', '2026-02-03 14:36:07'),
(3, 1, 'nos-actions', 'Nos actions', NULL, 'publie', NULL, '2026-02-03 14:36:07', '2026-02-03 14:36:07'),
(4, 1, 'actualites', 'Actualités', NULL, 'publie', NULL, '2026-02-03 14:36:07', '2026-02-03 14:36:07'),
(5, 1, 'paniers', 'Paniers bio', NULL, 'publie', NULL, '2026-02-03 14:36:07', '2026-02-03 14:36:07'),
(6, 1, 'partenaires', 'Partenaires', NULL, 'publie', NULL, '2026-02-03 14:36:07', '2026-02-03 14:36:07'),
(7, 1, 'ressources', 'Ressources & conseils', NULL, 'publie', NULL, '2026-02-03 14:36:07', '2026-02-03 14:36:07'),
(8, 1, 'education', 'Éducation & sensibilisation', NULL, 'publie', NULL, '2026-02-03 14:36:07', '2026-02-03 14:36:07'),
(9, 1, 'insertion', 'Insertion & emploi', NULL, 'publie', NULL, '2026-02-03 14:36:07', '2026-02-03 14:36:07'),
(10, 1, 'contact', 'Contact', NULL, 'publie', NULL, '2026-02-03 14:36:07', '2026-02-03 14:36:07'),
(11, 1, 'mentions-legales', 'Mentions légales', NULL, 'publie', NULL, '2026-02-03 14:36:07', '2026-02-03 14:36:07'),
(12, 2, 'accueil', 'Accueil', NULL, 'publie', NULL, '2026-02-03 14:36:07', '2026-02-03 14:36:07'),
(13, 2, 'decouvrir', 'Découvrir', NULL, 'publie', NULL, '2026-02-03 14:36:07', '2026-02-03 14:36:07'),
(14, 2, 'jardins', 'Jardins', NULL, 'publie', NULL, '2026-02-03 14:36:07', '2026-02-03 14:36:07'),
(15, 2, 'marche', 'Marché & alimentation', NULL, 'publie', NULL, '2026-02-03 14:36:07', '2026-02-03 14:36:07'),
(16, 2, 'visites', 'Visites', NULL, 'publie', NULL, '2026-02-03 14:36:07', '2026-02-03 14:36:07'),
(17, 2, 'agenda', 'Agenda', NULL, 'publie', NULL, '2026-02-03 14:36:07', '2026-02-03 14:36:07'),
(18, 2, 'reserver-salle', 'Réserver une salle', NULL, 'publie', NULL, '2026-02-03 14:36:07', '2026-02-03 14:36:07'),
(19, 2, 'contact', 'Contact', NULL, 'publie', NULL, '2026-02-03 14:36:07', '2026-02-03 14:36:07'),
(20, 2, 'mentions-legales', 'Mentions légales', NULL, 'publie', NULL, '2026-02-03 14:36:07', '2026-02-03 14:36:07');

-- --------------------------------------------------------

--
-- Structure de la table `parametres`
--

CREATE TABLE `parametres` (
  `id` int NOT NULL,
  `site_id` int NOT NULL,
  `cle` varchar(120) NOT NULL,
  `valeur` longtext,
  `date_modification` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB;

--
-- Déchargement des données de la table `parametres`
--

INSERT INTO `parametres` (`id`, `site_id`, `cle`, `valeur`, `date_modification`) VALUES
(1, 1, 'nom_organisation', 'Noeux Environnement', '2026-02-03 14:36:07'),
(2, 1, 'adresse', '22 bis Rue Nationale, 62290 Nœux-les-Mines', '2026-02-03 14:36:07'),
(3, 1, 'telephone', '03 21 66 37 74', '2026-02-03 14:36:07'),
(4, 1, 'email_officiel', 'asso@noeuxenvironnement.fr', '2026-02-03 14:36:07'),
(5, 1, 'youtube_url', 'https://www.youtube.com/@Noeuxenv62', '2026-02-03 14:36:07'),
(6, 1, 'facebook_url', 'https://www.facebook.com/noeuxenv/?locale=fr_FR', '2026-02-03 14:36:07'),
(7, 1, 'instagram_url', 'https://www.instagram.com/noeuxenvironnement/?hl=fr', '2026-02-03 14:36:07'),
(8, 1, 'twitter_url', 'https://x.com/noeuxenv', '2026-02-03 14:36:07'),
(9, 1, 'don_url', 'https://www.helloasso.com/associations/noeux-environnement/formulaires/1', '2026-02-03 14:36:07'),
(10, 1, 'livret_associatif_pdf', 'assets/docs/livret_associatif.pdf', '2026-02-03 14:36:07'),
(11, 1, 'livret_pedagogique_pdf', 'assets/docs/livret_pedagogique.pdf', '2026-02-03 14:36:07'),
(12, 2, 'nom_organisation', 'La Réserve', '2026-02-03 14:36:07'),
(13, 2, 'adresse', '22 bis Rue Nationale, 62290 Nœux-les-Mines', '2026-02-03 14:36:07'),
(14, 2, 'telephone', '03 21 66 37 74', '2026-02-03 14:36:07'),
(15, 2, 'email_officiel', 'asso@noeuxenvironnement.fr', '2026-02-03 14:36:07'),
(16, 2, 'youtube_url', 'https://www.youtube.com/@Noeuxenv62', '2026-02-03 14:36:07'),
(17, 2, 'facebook_url', 'https://www.facebook.com/noeuxenv/?locale=fr_FR', '2026-02-03 14:36:07'),
(18, 2, 'instagram_url', 'https://www.instagram.com/noeuxenvironnement/?hl=fr', '2026-02-03 14:36:07'),
(19, 2, 'twitter_url', 'https://x.com/noeuxenv', '2026-02-03 14:36:07'),
(20, 2, 'nextcloud_agenda_iframe', 'https://lareserve-artois.fr/nextcloud/index.php/apps/calendar/p/cbbbEKXCqkZnZagp', '2026-02-03 14:38:21'),
(21, 2, 'nextcloud_disponibilites_salles_iframe', 'https://lareserve-artois.fr/nextcloud/index.php/apps/calendar/p/cbbbEKXCqkZnZagp', '2026-02-03 14:38:25');

-- --------------------------------------------------------

--
-- Structure de la table `reinitialisations_mdp`
--

CREATE TABLE `reinitialisations_mdp` (
  `id` int NOT NULL,
  `utilisateur_id` int NOT NULL,
  `jeton_hash` varchar(255) NOT NULL,
  `expire_le` datetime NOT NULL,
  `utilise_le` datetime DEFAULT NULL,
  `date_creation` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB;

--
-- Déchargement des données de la table `reinitialisations_mdp`
--

INSERT INTO `reinitialisations_mdp` (`id`, `utilisateur_id`, `jeton_hash`, `expire_le`, `utilise_le`, `date_creation`) VALUES
(1, 6, 'ad8f5c0ec63ca60bbb02d5e43a68dc357101b9672236fa18fc8675df7d8181d2', '2026-02-03 17:14:33', NULL, '2026-02-03 17:44:33');

-- --------------------------------------------------------

--
-- Structure de la table `reservations`
--

CREATE TABLE `reservations` (
  `id` int NOT NULL,
  `salle_id` int DEFAULT NULL,
  `prenom` varchar(80) NOT NULL,
  `nom` varchar(120) NOT NULL,
  `email` varchar(180) NOT NULL,
  `telephone` varchar(50) DEFAULT NULL,
  `id_creneau` int NOT NULL,
  `besoin_materiel` longtext,
  `cuisine_pedagogique` tinyint(1) NOT NULL DEFAULT '0',
  `message` longtext,
  `note_interne` longtext,
  `date_demande` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `date_voulue` date NOT NULL,
  `validation` boolean NOT NULL DEFAULT FALSE
) ENGINE=InnoDB;

-- --------------------------------------------------------

--
-- Structure de la table `salles`
--

CREATE TABLE `salles` (
  `id` int NOT NULL,
  `site_id` int NOT NULL,
  `identifiant_url` varchar(120) NOT NULL,
  `nom` varchar(120) NOT NULL,
  `capacite` int DEFAULT NULL,
  `equipements` longtext,
  `description` longtext,
  `image_principale_id` int DEFAULT NULL,
  `statut` enum('publie','a_valider','brouillon') NOT NULL DEFAULT 'publie',
  `date_creation` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `date_modification` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB;

--
-- Déchargement des données de la table `salles`
--

INSERT INTO `salles` (`id`, `site_id`, `identifiant_url`, `nom`, `capacite`, `equipements`, `description`, `image_principale_id`, `statut`, `date_creation`, `date_modification`) VALUES
(1, 2, 'salle-1', 'Salle 1 – Grande salle polyvalente', 80, 'Chaises, tables modulables, vidéoprojecteur/écran, paperboard, sonorisation légère si besoin', 'Usages : conférences, temps pléniers, ateliers participatifs, projections, événements publics', NULL, 'publie', '2026-02-03 14:36:07', '2026-02-03 14:36:07'),
(2, 2, 'salle-2', 'Salle 2 – Salle de réunion', 20, 'Table centrale ou tables en U, écran/TV/vidéoprojecteur, paperboard', 'Usages : réunions de travail, groupes-projets, comités de pilotage, petites formations', NULL, 'publie', '2026-02-03 14:36:07', '2026-02-03 14:36:07'),
(3, 2, 'salle-3', 'Salle 3 – Espace atelier / convivialité', NULL, 'Plans de travail, rangements, cuisine partagée (à confirmer)', 'Usages : ateliers pratiques (bricolage nature, cuisine, co-conception), temps conviviaux', NULL, 'publie', '2026-02-03 14:36:07', '2026-02-03 14:36:07');

-- --------------------------------------------------------

--
-- Structure de la table `sites`
--

CREATE TABLE `sites` (
  `id` int NOT NULL,
  `nom` varchar(100) NOT NULL,
  `code` varchar(30) NOT NULL
) ENGINE=InnoDB;

--
-- Déchargement des données de la table `sites`
--

INSERT INTO `sites` (`id`, `nom`, `code`) VALUES
(1, 'Noeux Environnement', 'noeux'),
(2, 'La Réserve', 'reserve');

-- --------------------------------------------------------
--
-- Structure de la table `creneaux`
--

CREATE TABLE `creneaux` (
  `id` int NOT NULL,
  `moment` varchar(100) NOT NULL,
  `debut` time NOT NULL,
  `fin` time NOT NULL,
  `actif` boolean NOT NULL
) ENGINE=InnoDB;

--
-- Déchargement des données de la table `creneaux`
--

INSERT INTO `creneaux` (`id`, `moment`, `debut`, `fin`, `actif`) VALUES
(1, 'matin', '08:00:00', '12:00:00', True),
(2, 'aprem', '14:00:00', '18:00:00', True);


-- --------------------------------------------------------

--
-- Structure de la table `utilisateurs`
--

CREATE TABLE `utilisateurs` (
  `id` int NOT NULL,
  `email` varchar(180) NOT NULL,
  `mot_de_passe_hash` varchar(255) NOT NULL,
  `role` enum('administrateur','redacteur','lecteur','utilisateur') NOT NULL DEFAULT 'lecteur',
  `actif` tinyint(1) NOT NULL DEFAULT '1',
  `date_creation` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `date_modification` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB;

--
-- Déchargement des données de la table `utilisateurs`
--

INSERT INTO `utilisateurs` (`id`, `email`, `mot_de_passe_hash`, `role`, `actif`, `date_creation`, `date_modification`) VALUES
(1, 'admin@pinf.local', '$2y$10$RGb2aB/mmLT/QLbds1ONVek0yZseXo/W62h83MMu6nK0ne8bn2Zui', 'administrateur', 1, '2026-02-03 14:36:07', '2026-02-03 14:36:07'),
(2, 'redacteur@pinf.local', '$2y$10$BGjfJuRxTq0Pz4.ImuuCceYPwg6Yd1ud0vTaQ0MLfAbtkbuTbNBhm', 'redacteur', 1, '2026-02-03 14:36:07', '2026-02-03 14:36:07'),
(3, 'lecteur@pinf.local', '$2y$10$ZHFtDR/HQvQuKgIC5VZ3kOcnio1wzQ3pOBgh84ttfV0rgDIyzbMEi', 'lecteur', 1, '2026-02-03 14:36:07', '2026-02-03 14:36:07'),
(6, 'alexis.hecquet59@gmail.com', '$2y$10$WYs200PvRuQun7lTMfP9W..plwpQdmyYXLZ9sHjrOcvnhlVksIvty', 'administrateur', 1, '2026-02-03 17:41:22', '2026-02-03 17:42:09');

--
-- Index pour les tables déchargées
--

--
-- Index pour la table `blocs_page`
--
ALTER TABLE `blocs_page`
  ADD PRIMARY KEY (`id`),
  ADD KEY `page_id` (`page_id`),
  ADD KEY `media_publie_id` (`media_publie_id`),
  ADD KEY `media_propose_id` (`media_propose_id`),
  ADD KEY `dernier_modifie_par_id` (`dernier_modifie_par_id`);

--
-- Index pour la table `disponibilites_salles`
--
ALTER TABLE `disponibilites_salles`
  ADD PRIMARY KEY (`id`),
  ADD KEY `salle_id` (`salle_id`),
  ADD KEY `id_creneau` (`id_creneau`);

--
-- Index pour la table `medias`
--
ALTER TABLE `medias`
  ADD PRIMARY KEY (`id`),
  ADD KEY `site_id` (`site_id`);

--
-- Index pour la table `messages_contact`
--
ALTER TABLE `messages_contact`
  ADD PRIMARY KEY (`id`),
  ADD KEY `site_id` (`site_id`);

--
-- Index pour la table `modules`
--
ALTER TABLE `modules`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `uq_module` (`site_id`,`cle`);

--
-- Index pour la table `pages`
--
ALTER TABLE `pages`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `uq_page` (`site_id`,`identifiant_url`),
  ADD KEY `dernier_modifie_par_id` (`dernier_modifie_par_id`);

--
-- Index pour la table `parametres`
--
ALTER TABLE `parametres`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `uq_param` (`site_id`,`cle`);

--
-- Index pour la table `reinitialisations_mdp`
--
ALTER TABLE `reinitialisations_mdp`
  ADD PRIMARY KEY (`id`),
  ADD KEY `utilisateur_id` (`utilisateur_id`);

--
-- Index pour la table `reservations`
--
ALTER TABLE `reservations`
  ADD PRIMARY KEY (`id`),
  ADD KEY `salle_id` (`salle_id`),
  ADD KEY `id_creneau` (`id_creneau`);

--
-- Index pour la table `salles`
--
ALTER TABLE `salles`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `uq_salle` (`site_id`,`identifiant_url`),
  ADD KEY `image_principale_id` (`image_principale_id`);

--
-- Index pour la table `sites`
--
ALTER TABLE `sites`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `code` (`code`);

--
-- Index pour la table `utilisateurs`
--
ALTER TABLE `utilisateurs`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `email` (`email`);

--
-- AUTO_INCREMENT pour les tables déchargées
--

--
-- AUTO_INCREMENT pour la table `blocs_page`
--
ALTER TABLE `blocs_page`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=68;

--
-- AUTO_INCREMENT pour la table `disponibilites_salles`
--
ALTER TABLE `disponibilites_salles`
  MODIFY `id` int NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT pour la table `medias`
--
ALTER TABLE `medias`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT pour la table `messages_contact`
--
ALTER TABLE `messages_contact`
  MODIFY `id` int NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT pour la table `modules`
--
ALTER TABLE `modules`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT pour la table `pages`
--
ALTER TABLE `pages`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=22;

--
-- AUTO_INCREMENT pour la table `parametres`
--
ALTER TABLE `parametres`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=22;

--
-- AUTO_INCREMENT pour la table `reinitialisations_mdp`
--
ALTER TABLE `reinitialisations_mdp`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT pour la table `reservations`
--
ALTER TABLE `reservations`
  MODIFY `id` int NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT pour la table `salles`
--
ALTER TABLE `salles`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT pour la table `creneaux`
--
ALTER TABLE `creneaux`
  ADD PRIMARY KEY (`id`);

ALTER TABLE `creneaux`
  MODIFY `id` int NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT pour la table `sites`
--
ALTER TABLE `sites`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT pour la table `utilisateurs`
--
ALTER TABLE `utilisateurs`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- Contraintes pour les tables déchargées
--
ALTER TABLE `creneaux` ADD `salle_id` INT NULL AFTER `id`;
ALTER TABLE `creneaux` ADD CONSTRAINT `fk_creneaux_salles` FOREIGN KEY (`salle_id`) REFERENCES `salles`(`id`) ON DELETE CASCADE;
--
-- Contraintes pour la table `blocs_page`
--
ALTER TABLE `blocs_page`
  ADD CONSTRAINT `blocs_page_ibfk_1` FOREIGN KEY (`page_id`) REFERENCES `pages` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `blocs_page_ibfk_2` FOREIGN KEY (`media_publie_id`) REFERENCES `medias` (`id`) ON DELETE SET NULL,
  ADD CONSTRAINT `blocs_page_ibfk_3` FOREIGN KEY (`media_propose_id`) REFERENCES `medias` (`id`) ON DELETE SET NULL,
  ADD CONSTRAINT `blocs_page_ibfk_4` FOREIGN KEY (`dernier_modifie_par_id`) REFERENCES `utilisateurs` (`id`) ON DELETE SET NULL;

--
-- Contraintes pour la table `disponibilites_salles`
--
ALTER TABLE `disponibilites_salles`
  ADD CONSTRAINT `disponibilites_salles_ibfk_1` FOREIGN KEY (`salle_id`) REFERENCES `salles` (`id`) ON DELETE CASCADE;

ALTER TABLE `disponibilites_salles`
  ADD CONSTRAINT `disponibilites_salles_ibfk_creneau` FOREIGN KEY (`id_creneau`) REFERENCES `creneaux` (`id`) ON DELETE RESTRICT;

--
-- Contraintes pour la table `medias`
--
ALTER TABLE `medias`
  ADD CONSTRAINT `medias_ibfk_1` FOREIGN KEY (`site_id`) REFERENCES `sites` (`id`) ON DELETE CASCADE;

--
-- Contraintes pour la table `messages_contact`
--
ALTER TABLE `messages_contact`
  ADD CONSTRAINT `messages_contact_ibfk_1` FOREIGN KEY (`site_id`) REFERENCES `sites` (`id`) ON DELETE CASCADE;

--
-- Contraintes pour la table `modules`
--
ALTER TABLE `modules`
  ADD CONSTRAINT `modules_ibfk_1` FOREIGN KEY (`site_id`) REFERENCES `sites` (`id`) ON DELETE CASCADE;

--
-- Contraintes pour la table `pages`
--
ALTER TABLE `pages`
  ADD CONSTRAINT `pages_ibfk_1` FOREIGN KEY (`site_id`) REFERENCES `sites` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `pages_ibfk_2` FOREIGN KEY (`dernier_modifie_par_id`) REFERENCES `utilisateurs` (`id`) ON DELETE SET NULL;

--
-- Contraintes pour la table `parametres`
--
ALTER TABLE `parametres`
  ADD CONSTRAINT `parametres_ibfk_1` FOREIGN KEY (`site_id`) REFERENCES `sites` (`id`) ON DELETE CASCADE;

--
-- Contraintes pour la table `reinitialisations_mdp`
--
ALTER TABLE `reinitialisations_mdp`
  ADD CONSTRAINT `reinitialisations_mdp_ibfk_1` FOREIGN KEY (`utilisateur_id`) REFERENCES `utilisateurs` (`id`) ON DELETE CASCADE;

--
-- Contraintes pour la table `reservations`
--
ALTER TABLE `reservations`
  ADD CONSTRAINT `reservations_ibfk_2` FOREIGN KEY (`salle_id`) REFERENCES `salles` (`id`) ON DELETE SET NULL;

ALTER TABLE `reservations`
  ADD CONSTRAINT `reservations_ibfk_creneau` FOREIGN KEY (`id_creneau`) REFERENCES `creneaux` (`id`) ON DELETE RESTRICT;

--
-- Contraintes pour la table `salles`
--
ALTER TABLE `salles`
  ADD CONSTRAINT `salles_ibfk_1` FOREIGN KEY (`site_id`) REFERENCES `sites` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `salles_ibfk_2` FOREIGN KEY (`image_principale_id`) REFERENCES `medias` (`id`) ON DELETE SET NULL;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;

-- RESTORING MISSING PAGES
INSERT INTO `pages` (`id`, `site_id`, `identifiant_url`, `titre_publie`, `statut`) VALUES (21, 1, 'nature-territoires', 'Nature & Territoires', 'publie');
INSERT INTO `pages` (`id`, `site_id`, `identifiant_url`, `titre_publie`, `statut`) VALUES (22, 1, 'maraichage', 'Maraîchage', 'publie');
INSERT INTO `pages` (`id`, `site_id`, `identifiant_url`, `titre_publie`, `statut`) VALUES (23, 1, 'nous-rejoindre', 'Nous rejoindre', 'publie');
INSERT INTO `pages` (`id`, `site_id`, `identifiant_url`, `titre_publie`, `statut`) VALUES (24, 1, 'actions', 'Actions', 'publie');
INSERT INTO `pages` (`id`, `site_id`, `identifiant_url`, `titre_publie`, `statut`) VALUES (25, 1, 'la-reserve', 'La Réserve', 'publie');
INSERT INTO `pages` (`id`, `site_id`, `identifiant_url`, `titre_publie`, `statut`) VALUES (26, 2, 'actualites', 'Actualités', 'publie');
INSERT INTO `pages` (`id`, `site_id`, `identifiant_url`, `titre_publie`, `statut`) VALUES (27, 2, 'chiffres-amenagements', 'Chiffres & Aménagements', 'publie');

-- Insertion automatique GRANULAIRE des blocs_page pour le CMS
INSERT INTO `blocs_page` (`page_id`, `ordre`, `type`, `titre_publie`, `contenu_texte_publie`, `statut`) VALUES (2, 10, 'texte', 'qui-sommes-nous_p_1', 'Depuis 1991, Nœux Environnement agit pour la
            nature, la biodiversité et l’insertion des personnes éloignées de l’emploi.', 'publie');
INSERT INTO `blocs_page` (`page_id`, `ordre`, `type`, `titre_publie`, `contenu_texte_publie`, `statut`) VALUES (2, 20, 'texte', 'qui-sommes-nous_p_2', 'Notre objectif est simple : prendre
            soin des milieux naturels de notre territoire tout en créant des emplois et des parcours d’insertion
            pour des habitants qui veulent rebondir.', 'publie');
INSERT INTO `blocs_page` (`page_id`, `ordre`, `type`, `titre_publie`, `contenu_texte_publie`, `statut`) VALUES (2, 30, 'texte', 'qui-sommes-nous_h2_1', 'Une histoire née au bord de la Loisne', 'publie');
INSERT INTO `blocs_page` (`page_id`, `ordre`, `type`, `titre_publie`, `contenu_texte_publie`, `statut`) VALUES (2, 40, 'texte', 'qui-sommes-nous_p_3', 'C’est le 28 juin 1991 que l’association Nœux Environnement voit officiellement le jour. À cette
                    époque, parler de “gestion et protection des milieux naturels” est encore assez nouveau.', 'publie');
INSERT INTO `blocs_page` (`page_id`, `ordre`, `type`, `titre_publie`, `contenu_texte_publie`, `statut`) VALUES (2, 50, 'texte', 'qui-sommes-nous_p_4', 'Au départ, l’idée est de nettoyer et réhabiliter la Loisne, un cours d’eau très marqué par les
                    activités humaines. Avec une petite équipe de passionnés, l’association commence par enlever les
                    déchets, consolider les berges, remettre de la végétation adaptée et utiliser des techniques
                    dites “douces”.', 'publie');
INSERT INTO `blocs_page` (`page_id`, `ordre`, `type`, `titre_publie`, `contenu_texte_publie`, `statut`) VALUES (2, 60, 'texte', 'qui-sommes-nous_p_5', 'Très vite, ces chantiers s’ouvrent à des personnes éloignées de l’emploi. Nous leur proposons des
                    contrats aidés et des formations pour acquérir une expérience et retrouver un projet
                    professionnel.', 'publie');
INSERT INTO `blocs_page` (`page_id`, `ordre`, `type`, `titre_publie`, `contenu_texte_publie`, `statut`) VALUES (2, 70, 'texte', 'qui-sommes-nous_p_6', 'À partir de 1996, notre champ d’action s’élargit : sentiers de randonnée, zones humides, jardins
                    naturels, études écologiques… Les idées se multiplient pour mieux connaître et mieux protéger
                    notre environnement.', 'publie');
INSERT INTO `blocs_page` (`page_id`, `ordre`, `type`, `titre_publie`, `contenu_texte_publie`, `statut`) VALUES (2, 80, 'texte', 'qui-sommes-nous_p_7', 'Au milieu des années 2000, un nouveau projet voit le jour : “Les Jardins du Cœur”. Grâce à la
                    culture maraîchère, nous développons alors la production de légumes de saison, vendus
                    localement, tout en créant de nouveaux postes d’insertion.', 'publie');
INSERT INTO `blocs_page` (`page_id`, `ordre`, `type`, `titre_publie`, `contenu_texte_publie`, `statut`) VALUES (2, 90, 'texte', 'qui-sommes-nous_p_8', 'Aujourd’hui, avec La Réserve – notre nouveau lieu de travail et de vie – cette histoire continue
                    : anciens sites dégradés, friches, bords de cours d’eau ou jardins deviennent des espaces à la
                    fois utiles pour la nature et utiles pour les gens.', 'publie');
INSERT INTO `blocs_page` (`page_id`, `ordre`, `type`, `titre_publie`, `contenu_texte_publie`, `statut`) VALUES (2, 100, 'texte', 'qui-sommes-nous_h2_2', 'Nos valeurs au quotidien', 'publie');
INSERT INTO `blocs_page` (`page_id`, `ordre`, `type`, `titre_publie`, `contenu_texte_publie`, `statut`) VALUES (2, 110, 'texte', 'qui-sommes-nous_h3_1', 'Respect de la nature', 'publie');
INSERT INTO `blocs_page` (`page_id`, `ordre`, `type`, `titre_publie`, `contenu_texte_publie`, `statut`) VALUES (2, 120, 'texte', 'qui-sommes-nous_p_9', 'Nous considérons les rivières, les zones humides, les jardins et la biodiversité comme de
                        vrais patrimoines collectifs. Nos chantiers sont pensés pour améliorer l’état des milieux
                        sans les abîmer : interventions progressives, choix des périodes, maintien d’espaces refuges
                        pour la faune et la flore.', 'publie');
INSERT INTO `blocs_page` (`page_id`, `ordre`, `type`, `titre_publie`, `contenu_texte_publie`, `statut`) VALUES (2, 130, 'texte', 'qui-sommes-nous_h3_2', 'Solidarité et insertion', 'publie');
INSERT INTO `blocs_page` (`page_id`, `ordre`, `type`, `titre_publie`, `contenu_texte_publie`, `statut`) VALUES (2, 140, 'texte', 'qui-sommes-nous_p_10', 'Derrière chaque haie plantée, chaque mare entretenue, chaque panier de légumes, il y a des
                        parcours de vie. Nous accompagnons des personnes qui ont besoin d’un coup de pouce pour
                        revenir vers l’emploi : un cadre de travail, une équipe, des repères, des formations, du
                        temps pour construire la suite.', 'publie');
INSERT INTO `blocs_page` (`page_id`, `ordre`, `type`, `titre_publie`, `contenu_texte_publie`, `statut`) VALUES (2, 150, 'texte', 'qui-sommes-nous_h3_3', 'Éducation et partage', 'publie');
INSERT INTO `blocs_page` (`page_id`, `ordre`, `type`, `titre_publie`, `contenu_texte_publie`, `statut`) VALUES (2, 160, 'texte', 'qui-sommes-nous_p_11', 'Pour nous, protéger l’environnement passe aussi par la compréhension et le partage. Nous
                        accueillons des écoles, des centres de loisirs, des groupes d’adultes ; nous participons à
                        des événements locaux, des chantiers participatifs, des sorties nature. L’idée est toujours
                        la même : faire découvrir, expliquer simplement, donner envie d’agir.', 'publie');
INSERT INTO `blocs_page` (`page_id`, `ordre`, `type`, `titre_publie`, `contenu_texte_publie`, `statut`) VALUES (2, 170, 'texte', 'qui-sommes-nous_h3_4', 'Coopération sur le territoire', 'publie');
INSERT INTO `blocs_page` (`page_id`, `ordre`, `type`, `titre_publie`, `contenu_texte_publie`, `statut`) VALUES (2, 180, 'texte', 'qui-sommes-nous_p_12', 'Nœux Environnement travaille avec de nombreux partenaires : communes, intercommunalité,
                        Région, Département, associations, réseaux de l’insertion et de l’éducation à
                        l’environnement. Cette coopération nous permet de mener des projets à l’échelle du
                        territoire, là où vivent les habitants.', 'publie');
INSERT INTO `blocs_page` (`page_id`, `ordre`, `type`, `titre_publie`, `contenu_texte_publie`, `statut`) VALUES (2, 190, 'texte', 'qui-sommes-nous_h2_3', 'Une association… et une structure d’insertion', 'publie');
INSERT INTO `blocs_page` (`page_id`, `ordre`, `type`, `titre_publie`, `contenu_texte_publie`, `statut`) VALUES (2, 200, 'texte', 'qui-sommes-nous_p_13', 'Nous sommes une association loi 1901, avec une assemblée générale d’adhérents, un conseil
                    d’administration et un bureau, une équipe de salariés permanents et une équipe de salariés en
                    insertion.', 'publie');
INSERT INTO `blocs_page` (`page_id`, `ordre`, `type`, `titre_publie`, `contenu_texte_publie`, `statut`) VALUES (2, 210, 'texte', 'qui-sommes-nous_p_14', 'Nœux Environnement est reconnue comme structure d’insertion par l’activité économique (IAE).
                    Concrètement, cela signifie que nous proposons :', 'publie');
INSERT INTO `blocs_page` (`page_id`, `ordre`, `type`, `titre_publie`, `contenu_texte_publie`, `statut`) VALUES (2, 220, 'texte', 'qui-sommes-nous_li_1', 'des contrats d’insertion,', 'publie');
INSERT INTO `blocs_page` (`page_id`, `ordre`, `type`, `titre_publie`, `contenu_texte_publie`, `statut`) VALUES (2, 230, 'texte', 'qui-sommes-nous_li_2', 'un accompagnement socio-professionnel,', 'publie');
INSERT INTO `blocs_page` (`page_id`, `ordre`, `type`, `titre_publie`, `contenu_texte_publie`, `statut`) VALUES (2, 240, 'texte', 'qui-sommes-nous_li_3', 'des activités supports (chantiers nature, maraîchage, atelier menuiserie…),', 'publie');
INSERT INTO `blocs_page` (`page_id`, `ordre`, `type`, `titre_publie`, `contenu_texte_publie`, `statut`) VALUES (2, 250, 'texte', 'qui-sommes-nous_li_4', 'un travail pour préparer l’après : retour à l’emploi, formation, projet personnel.', 'publie');
INSERT INTO `blocs_page` (`page_id`, `ordre`, `type`, `titre_publie`, `contenu_texte_publie`, `statut`) VALUES (2, 260, 'texte', 'qui-sommes-nous_h2_4', 'Nos lieux d’action', 'publie');
INSERT INTO `blocs_page` (`page_id`, `ordre`, `type`, `titre_publie`, `contenu_texte_publie`, `statut`) VALUES (2, 270, 'texte', 'qui-sommes-nous_p_15', 'Nos actions se déploient :', 'publie');
INSERT INTO `blocs_page` (`page_id`, `ordre`, `type`, `titre_publie`, `contenu_texte_publie`, `statut`) VALUES (2, 280, 'texte', 'qui-sommes-nous_li_5', 'à La Réserve à Nœux-les-Mines, qui est devenue notre lieu central de travail et d’accueil ;', 'publie');
INSERT INTO `blocs_page` (`page_id`, `ordre`, `type`, `titre_publie`, `contenu_texte_publie`, `statut`) VALUES (2, 290, 'texte', 'qui-sommes-nous_li_6', 'sur de nombreux sites naturels du territoire (cours d’eau, zones humides, sentiers…) ;', 'publie');
INSERT INTO `blocs_page` (`page_id`, `ordre`, `type`, `titre_publie`, `contenu_texte_publie`, `statut`) VALUES (2, 300, 'texte', 'qui-sommes-nous_li_7', 'directement chez nos partenaires : communes, écoles, associations, structures sociales…', 'publie');
INSERT INTO `blocs_page` (`page_id`, `ordre`, `type`, `titre_publie`, `contenu_texte_publie`, `statut`) VALUES (2, 310, 'texte', 'qui-sommes-nous_p_16', 'En venant à La Réserve, en croisant nos équipes sur un chantier ou en achetant un panier de légumes,
                vous rencontrez un petit morceau de l’histoire de Nœux Environnement.', 'publie');
INSERT INTO `blocs_page` (`page_id`, `ordre`, `type`, `titre_publie`, `contenu_texte_publie`, `statut`) VALUES (2, 320, 'texte', 'qui-sommes-nous_h2_5', 'Nos livrets à télécharger', 'publie');
INSERT INTO `blocs_page` (`page_id`, `ordre`, `type`, `titre_publie`, `contenu_texte_publie`, `statut`) VALUES (2, 330, 'texte', 'qui-sommes-nous_h3_5', 'Livret Pédagogique', 'publie');
INSERT INTO `blocs_page` (`page_id`, `ordre`, `type`, `titre_publie`, `contenu_texte_publie`, `statut`) VALUES (2, 340, 'texte', 'qui-sommes-nous_p_17', 'Découvrez notre projet d''éducation à l''environnement, nos thématiques d''animations et nos
                        approches pédagogiques pour les scolaires et le grand public.', 'publie');
INSERT INTO `blocs_page` (`page_id`, `ordre`, `type`, `titre_publie`, `contenu_texte_publie`, `url_publie`, `statut`) VALUES (2, 350, 'lien', 'qui-sommes-nous_a_1', 'Télécharger le
                        guide (PDF)', 'assets/docs/Guide-Pédagogique-Noeux-Environnement.pdf', 'publie');
INSERT INTO `blocs_page` (`page_id`, `ordre`, `type`, `titre_publie`, `contenu_texte_publie`, `statut`) VALUES (2, 360, 'texte', 'qui-sommes-nous_h3_6', 'Livret Associatif', 'publie');
INSERT INTO `blocs_page` (`page_id`, `ordre`, `type`, `titre_publie`, `contenu_texte_publie`, `statut`) VALUES (2, 370, 'texte', 'qui-sommes-nous_p_18', 'Retrouvez l''essentiel de notre projet associatif, le bilan de nos actions et nos perspectives. Un
                        document pour mieux comprendre notre engagement.', 'publie');
INSERT INTO `blocs_page` (`page_id`, `ordre`, `type`, `titre_publie`, `contenu_texte_publie`, `url_publie`, `statut`) VALUES (2, 380, 'lien', 'qui-sommes-nous_a_2', 'Télécharger le journal (PDF)', 'assets/docs/journal-asso-2025.pdf', 'publie');
INSERT INTO `blocs_page` (`page_id`, `ordre`, `type`, `titre_publie`, `contenu_texte_publie`, `statut`) VALUES (3, 10, 'texte', 'nos-actions_p_1', 'Nœux Environnement mène des actions toute
                l’année, avec des publics très différents : habitants, scolaires, collectivités, structures sociales,
                entreprises…', 'publie');
INSERT INTO `blocs_page` (`page_id`, `ordre`, `type`, `titre_publie`, `contenu_texte_publie`, `statut`) VALUES (3, 20, 'texte', 'nos-actions_p_2', 'Pour y voir plus clair, nous présentons
                notre travail autour de quatre grands domaines qui se complètent.', 'publie');
INSERT INTO `blocs_page` (`page_id`, `ordre`, `type`, `titre_publie`, `contenu_texte_publie`, `statut`) VALUES (3, 30, 'texte', 'nos-actions_h3_1', 'Nature & territoires', 'publie');
INSERT INTO `blocs_page` (`page_id`, `ordre`, `type`, `titre_publie`, `contenu_texte_publie`, `statut`) VALUES (3, 40, 'texte', 'nos-actions_p_3', 'Nous intervenons sur les milieux naturels pour les préserver et les rendre plus accueillants :
                        cours d’eau, fossés, mares, zones humides ; haies, talus, petites zones boisées ; sentiers de
                        promenade, parcs, friches à requalifier.', 'publie');
INSERT INTO `blocs_page` (`page_id`, `ordre`, `type`, `titre_publie`, `contenu_texte_publie`, `statut`) VALUES (3, 50, 'texte', 'nos-actions_p_4', 'Nos équipes réalisent des chantiers d’entretien et de restauration, en lien avec les communes et
                        les autres partenaires.', 'publie');
INSERT INTO `blocs_page` (`page_id`, `ordre`, `type`, `titre_publie`, `contenu_texte_publie`, `url_publie`, `statut`) VALUES (3, 60, 'lien', 'nos-actions_a_1', 'En savoir plus', 'index.php?view=nature-territoires', 'publie');
INSERT INTO `blocs_page` (`page_id`, `ordre`, `type`, `titre_publie`, `contenu_texte_publie`, `statut`) VALUES (3, 70, 'texte', 'nos-actions_h3_2', 'Maraîchage & alimentation durable', 'publie');
INSERT INTO `blocs_page` (`page_id`, `ordre`, `type`, `titre_publie`, `contenu_texte_publie`, `statut`) VALUES (3, 80, 'texte', 'nos-actions_p_5', 'Nous développons un maraîchage biologique sur plusieurs parcelles, avec des cultures variées
                        selon les saisons. Les légumes sont proposés en paniers, sur des marchés et via des plateformes
                        comme LeCourtCircuit.', 'publie');
INSERT INTO `blocs_page` (`page_id`, `ordre`, `type`, `titre_publie`, `contenu_texte_publie`, `statut`) VALUES (3, 90, 'texte', 'nos-actions_p_6', 'Une partie de cette activité sert aussi à mettre en place des dispositifs solidaires, comme le
                        panier solidaire.', 'publie');
INSERT INTO `blocs_page` (`page_id`, `ordre`, `type`, `titre_publie`, `contenu_texte_publie`, `url_publie`, `statut`) VALUES (3, 100, 'lien', 'nos-actions_a_2', 'En savoir plus', 'index.php?view=maraichage', 'publie');
INSERT INTO `blocs_page` (`page_id`, `ordre`, `type`, `titre_publie`, `contenu_texte_publie`, `statut`) VALUES (3, 110, 'texte', 'nos-actions_h3_3', 'Insertion & emploi', 'publie');
INSERT INTO `blocs_page` (`page_id`, `ordre`, `type`, `titre_publie`, `contenu_texte_publie`, `statut`) VALUES (3, 120, 'texte', 'nos-actions_p_7', 'Nos chantiers ne sont pas seulement des chantiers techniques : ce sont des supports d’insertion.
                        Nous proposons des emplois en contrats d’insertion, un accompagnement social et professionnel,
                        et des mises en situation de travail sur des activités utiles au territoire.', 'publie');
INSERT INTO `blocs_page` (`page_id`, `ordre`, `type`, `titre_publie`, `contenu_texte_publie`, `statut`) VALUES (3, 130, 'texte', 'nos-actions_p_8', 'L’objectif est d’aider chaque personne à reprendre confiance et à accéder à un emploi durable.', 'publie');
INSERT INTO `blocs_page` (`page_id`, `ordre`, `type`, `titre_publie`, `contenu_texte_publie`, `url_publie`, `statut`) VALUES (3, 140, 'lien', 'nos-actions_a_3', 'En savoir plus', 'index.php?view=insertion', 'publie');
INSERT INTO `blocs_page` (`page_id`, `ordre`, `type`, `titre_publie`, `contenu_texte_publie`, `statut`) VALUES (3, 150, 'texte', 'nos-actions_h3_4', 'Éducation & sensibilisation', 'publie');
INSERT INTO `blocs_page` (`page_id`, `ordre`, `type`, `titre_publie`, `contenu_texte_publie`, `statut`) VALUES (3, 160, 'texte', 'nos-actions_p_9', 'Nous accueillons et nous intervenons auprès de nombreux publics : écoles, centres de loisirs,
                        groupes d’adultes, entreprises. Les thématiques abordées : biodiversité, eau, jardin,
                        alimentation...', 'publie');
INSERT INTO `blocs_page` (`page_id`, `ordre`, `type`, `titre_publie`, `contenu_texte_publie`, `statut`) VALUES (3, 170, 'texte', 'nos-actions_p_10', 'Les animations se déroulent à La Réserve, sur des sites naturels, ou directement dans les
                        structures partenaires.', 'publie');
INSERT INTO `blocs_page` (`page_id`, `ordre`, `type`, `titre_publie`, `contenu_texte_publie`, `url_publie`, `statut`) VALUES (3, 180, 'lien', 'nos-actions_a_4', 'Télécharger le guide pédagogique', 'assets/docs/Guide-Pédagogique-Noeux-Environnement.pdf', 'publie');
INSERT INTO `blocs_page` (`page_id`, `ordre`, `type`, `titre_publie`, `contenu_texte_publie`, `statut`) VALUES (3, 190, 'texte', 'nos-actions_h2_1', 'La Réserve : un lieu qui rassemble nos actions', 'publie');
INSERT INTO `blocs_page` (`page_id`, `ordre`, `type`, `titre_publie`, `contenu_texte_publie`, `statut`) VALUES (3, 200, 'texte', 'nos-actions_p_11', 'La plupart de ces actions se croisent à La Réserve, notre “écolieu vivant de l’Artois” :', 'publie');
INSERT INTO `blocs_page` (`page_id`, `ordre`, `type`, `titre_publie`, `contenu_texte_publie`, `statut`) VALUES (3, 210, 'texte', 'nos-actions_li_1', 'site de production maraîchère,', 'publie');
INSERT INTO `blocs_page` (`page_id`, `ordre`, `type`, `titre_publie`, `contenu_texte_publie`, `statut`) VALUES (3, 220, 'texte', 'nos-actions_li_2', 'lieu d’accueil pour les animations et événements,', 'publie');
INSERT INTO `blocs_page` (`page_id`, `ordre`, `type`, `titre_publie`, `contenu_texte_publie`, `statut`) VALUES (3, 230, 'texte', 'nos-actions_li_3', 'espace de travail pour les équipes,', 'publie');
INSERT INTO `blocs_page` (`page_id`, `ordre`, `type`, `titre_publie`, `contenu_texte_publie`, `statut`) VALUES (3, 240, 'texte', 'nos-actions_li_4', 'point relais et lieu de vie pour les habitants.', 'publie');
INSERT INTO `blocs_page` (`page_id`, `ordre`, `type`, `titre_publie`, `contenu_texte_publie`, `url_publie`, `statut`) VALUES (3, 250, 'lien', 'nos-actions_a_5', 'Découvrir La Réserve', 'index.php?view=la-reserve', 'publie');
INSERT INTO `blocs_page` (`page_id`, `ordre`, `type`, `titre_publie`, `contenu_texte_publie`, `statut`) VALUES (4, 10, 'texte', 'actualites_p_1', 'Cette page rassemble les nouvelles de Nœux
                Environnement et de La Réserve : chantiers nature, animations, projets, événements, vie de
                l’association…', 'publie');
INSERT INTO `blocs_page` (`page_id`, `ordre`, `type`, `titre_publie`, `contenu_texte_publie`, `statut`) VALUES (4, 20, 'texte', 'actualites_p_2', 'Vous y trouverez des articles courts,
                illustrés de photos, qui montrent ce qui se passe concrètement sur le terrain.', 'publie');
INSERT INTO `blocs_page` (`page_id`, `ordre`, `type`, `titre_publie`, `contenu_texte_publie`, `statut`) VALUES (4, 30, 'texte', 'actualites_h2_1', 'À la une', 'publie');
INSERT INTO `blocs_page` (`page_id`, `ordre`, `type`, `titre_publie`, `contenu_texte_publie`, `statut`) VALUES (4, 40, 'texte', 'actualites_h3_1', 'Ouverture de La Réserve', 'publie');
INSERT INTO `blocs_page` (`page_id`, `ordre`, `type`, `titre_publie`, `contenu_texte_publie`, `statut`) VALUES (4, 50, 'texte', 'actualites_p_3', 'Découvrez notre nouvel écolieu vivant de l’Artois, un espace dédié à la nature et au
                                partage.', 'publie');
INSERT INTO `blocs_page` (`page_id`, `ordre`, `type`, `titre_publie`, `contenu_texte_publie`, `url_publie`, `statut`) VALUES (4, 60, 'lien', 'actualites_a_1', 'Lire l''article', '#', 'publie');
INSERT INTO `blocs_page` (`page_id`, `ordre`, `type`, `titre_publie`, `contenu_texte_publie`, `statut`) VALUES (4, 70, 'texte', 'actualites_h3_2', 'Lancement du Panier Solidaire', 'publie');
INSERT INTO `blocs_page` (`page_id`, `ordre`, `type`, `titre_publie`, `contenu_texte_publie`, `statut`) VALUES (4, 80, 'texte', 'actualites_p_4', 'Un nouveau dispositif pour rendre les légumes bio accessibles à tous.', 'publie');
INSERT INTO `blocs_page` (`page_id`, `ordre`, `type`, `titre_publie`, `contenu_texte_publie`, `url_publie`, `statut`) VALUES (4, 90, 'lien', 'actualites_a_2', 'Lire l''article', '#', 'publie');
INSERT INTO `blocs_page` (`page_id`, `ordre`, `type`, `titre_publie`, `contenu_texte_publie`, `statut`) VALUES (4, 100, 'texte', 'actualites_h3_3', 'Retour sur la Fête du Sol Vivant', 'publie');
INSERT INTO `blocs_page` (`page_id`, `ordre`, `type`, `titre_publie`, `contenu_texte_publie`, `statut`) VALUES (4, 110, 'texte', 'actualites_p_5', 'Une journée riche en échanges et découvertes autour du jardinage naturel.', 'publie');
INSERT INTO `blocs_page` (`page_id`, `ordre`, `type`, `titre_publie`, `contenu_texte_publie`, `url_publie`, `statut`) VALUES (4, 120, 'lien', 'actualites_a_3', 'Lire l''article', '#', 'publie');
INSERT INTO `blocs_page` (`page_id`, `ordre`, `type`, `titre_publie`, `contenu_texte_publie`, `statut`) VALUES (4, 130, 'texte', 'actualites_h2_2', 'Toutes nos actualités', 'publie');
INSERT INTO `blocs_page` (`page_id`, `ordre`, `type`, `titre_publie`, `contenu_texte_publie`, `statut`) VALUES (4, 140, 'texte', 'actualites_h3_4', 'Réhabilitation d’un espace naturel à Labourse', 'publie');
INSERT INTO `blocs_page` (`page_id`, `ordre`, `type`, `titre_publie`, `contenu_texte_publie`, `statut`) VALUES (4, 150, 'texte', 'actualites_p_6', 'Nos équipes sont intervenues pour restaurer une zone humide et planter des haies.', 'publie');
INSERT INTO `blocs_page` (`page_id`, `ordre`, `type`, `titre_publie`, `contenu_texte_publie`, `url_publie`, `statut`) VALUES (4, 160, 'lien', 'actualites_a_4', 'Plus de détails
                                →', '#', 'publie');
INSERT INTO `blocs_page` (`page_id`, `ordre`, `type`, `titre_publie`, `contenu_texte_publie`, `statut`) VALUES (4, 170, 'texte', 'actualites_h3_5', 'Les oiseaux à l’honneur au lycée', 'publie');
INSERT INTO `blocs_page` (`page_id`, `ordre`, `type`, `titre_publie`, `contenu_texte_publie`, `statut`) VALUES (4, 180, 'texte', 'actualites_p_7', 'Animation pédagogique avec les élèves pour construire des nichoirs.', 'publie');
INSERT INTO `blocs_page` (`page_id`, `ordre`, `type`, `titre_publie`, `contenu_texte_publie`, `url_publie`, `statut`) VALUES (4, 190, 'lien', 'actualites_a_5', 'Plus de détails
                                →', '#', 'publie');
INSERT INTO `blocs_page` (`page_id`, `ordre`, `type`, `titre_publie`, `contenu_texte_publie`, `statut`) VALUES (4, 200, 'texte', 'actualites_h3_6', 'World Clean Up Day : retour en images', 'publie');
INSERT INTO `blocs_page` (`page_id`, `ordre`, `type`, `titre_publie`, `contenu_texte_publie`, `statut`) VALUES (4, 210, 'texte', 'actualites_p_8', 'Merci à tous les bénévoles pour cette belle action de nettoyage !', 'publie');
INSERT INTO `blocs_page` (`page_id`, `ordre`, `type`, `titre_publie`, `contenu_texte_publie`, `url_publie`, `statut`) VALUES (4, 220, 'lien', 'actualites_a_6', 'Plus de détails
                                →', '#', 'publie');
INSERT INTO `blocs_page` (`page_id`, `ordre`, `type`, `titre_publie`, `contenu_texte_publie`, `statut`) VALUES (4, 230, 'texte', 'actualites_h3_7', 'Cultivons notre santé', 'publie');
INSERT INTO `blocs_page` (`page_id`, `ordre`, `type`, `titre_publie`, `contenu_texte_publie`, `statut`) VALUES (4, 240, 'texte', 'actualites_p_9', 'Retour sur l''atelier jardinage et alimentation saine.', 'publie');
INSERT INTO `blocs_page` (`page_id`, `ordre`, `type`, `titre_publie`, `contenu_texte_publie`, `url_publie`, `statut`) VALUES (4, 250, 'lien', 'actualites_a_7', 'Plus de détails
                                →', '#', 'publie');
INSERT INTO `blocs_page` (`page_id`, `ordre`, `type`, `titre_publie`, `contenu_texte_publie`, `statut`) VALUES (4, 260, 'texte', 'actualites_h2_3', 'Suivre Nœux Environnement au quotidien', 'publie');
INSERT INTO `blocs_page` (`page_id`, `ordre`, `type`, `titre_publie`, `contenu_texte_publie`, `statut`) VALUES (4, 270, 'texte', 'actualites_p_10', 'Pour suivre nos actions au fil des jours, vous pouvez aussi consulter nos publications sur les
                    réseaux sociaux (photos de chantiers, ateliers, coulisses de La Réserve, etc.).', 'publie');
INSERT INTO `blocs_page` (`page_id`, `ordre`, `type`, `titre_publie`, `contenu_texte_publie`, `url_publie`, `statut`) VALUES (4, 280, 'lien', 'actualites_a_8', 'Nous
                    suivre sur Facebook', 'https://facebook.com', 'publie');
INSERT INTO `blocs_page` (`page_id`, `ordre`, `type`, `titre_publie`, `contenu_texte_publie`, `statut`) VALUES (4, 290, 'texte', 'actualites_h2_4', 'Journal associatif', 'publie');
INSERT INTO `blocs_page` (`page_id`, `ordre`, `type`, `titre_publie`, `contenu_texte_publie`, `statut`) VALUES (4, 300, 'texte', 'actualites_p_11', 'Retrouvez toute l''actualité de l''association dans notre journal trimestriel.', 'publie');
INSERT INTO `blocs_page` (`page_id`, `ordre`, `type`, `titre_publie`, `contenu_texte_publie`, `url_publie`, `statut`) VALUES (4, 310, 'lien', 'actualites_a_9', 'Télécharger
                        le dernier journal (PDF)', 'assets/docs/journal-asso-2025.pdf', 'publie');
INSERT INTO `blocs_page` (`page_id`, `ordre`, `type`, `titre_publie`, `contenu_texte_publie`, `statut`) VALUES (5, 10, 'texte', 'paniers_h2_1', 'Pourquoi choisir nos paniers de légumes ?', 'publie');
INSERT INTO `blocs_page` (`page_id`, `ordre`, `type`, `titre_publie`, `contenu_texte_publie`, `statut`) VALUES (5, 20, 'texte', 'paniers_p_1', 'Nos paniers de légumes sont :', 'publie');
INSERT INTO `blocs_page` (`page_id`, `ordre`, `type`, `titre_publie`, `contenu_texte_publie`, `statut`) VALUES (5, 30, 'texte', 'paniers_li_1', 'Bio :les légumes sont cultivés en agriculture biologique, sans pesticides
                            ni engrais chimiques de synthèse.', 'publie');
INSERT INTO `blocs_page` (`page_id`, `ordre`, `type`, `titre_publie`, `contenu_texte_publie`, `statut`) VALUES (5, 40, 'texte', 'paniers_li_2', 'Locaux :ils viennent des parcelles maraîchères de Nœux Environnement,
                            notamment à La Réserve – écolieu vivant de l’Artois.', 'publie');
INSERT INTO `blocs_page` (`page_id`, `ordre`, `type`, `titre_publie`, `contenu_texte_publie`, `statut`) VALUES (5, 50, 'texte', 'paniers_li_3', 'Solidaires :ils sont produits dans le cadre d’un Atelier Chantier
                            d’Insertion. En achetant un panier, vous soutenez directement des personnes en parcours de
                            retour à l’emploi.', 'publie');
INSERT INTO `blocs_page` (`page_id`, `ordre`, `type`, `titre_publie`, `contenu_texte_publie`, `statut`) VALUES (5, 60, 'texte', 'paniers_li_4', 'De saison :le contenu varie en fonction des saisons et de la météo, pour
                            respecter les cycles naturels.', 'publie');
INSERT INTO `blocs_page` (`page_id`, `ordre`, `type`, `titre_publie`, `contenu_texte_publie`, `statut`) VALUES (5, 70, 'texte', 'paniers_p_2', 'Chaque panier, c’est donc du bon
                        dans l’assiette, et du sens dans le projet.', 'publie');
INSERT INTO `blocs_page` (`page_id`, `ordre`, `type`, `titre_publie`, `contenu_texte_publie`, `statut`) VALUES (5, 80, 'texte', 'paniers_h2_2', 'Nos formules de paniers', 'publie');
INSERT INTO `blocs_page` (`page_id`, `ordre`, `type`, `titre_publie`, `contenu_texte_publie`, `statut`) VALUES (5, 90, 'texte', 'paniers_h3_1', 'Panier simple', 'publie');
INSERT INTO `blocs_page` (`page_id`, `ordre`, `type`, `titre_publie`, `contenu_texte_publie`, `statut`) VALUES (5, 100, 'texte', 'paniers_p_3', 'Idéal pour 1 à 2 personnes', 'publie');
INSERT INTO `blocs_page` (`page_id`, `ordre`, `type`, `titre_publie`, `contenu_texte_publie`, `statut`) VALUES (5, 110, 'texte', 'paniers_li_5', 'Approx. 1 panier pour 1 à 2 personnes qui cuisinent régulièrement.', 'publie');
INSERT INTO `blocs_page` (`page_id`, `ordre`, `type`, `titre_publie`, `contenu_texte_publie`, `statut`) VALUES (5, 120, 'texte', 'paniers_li_6', 'Contient plusieurs légumes de saison (3 à 5 variétés selon la période).', 'publie');
INSERT INTO `blocs_page` (`page_id`, `ordre`, `type`, `titre_publie`, `contenu_texte_publie`, `statut`) VALUES (5, 130, 'texte', 'paniers_li_7', 'Exemple (printemps) : salade, radis, carottes, herbes aromatiques.', 'publie');
INSERT INTO `blocs_page` (`page_id`, `ordre`, `type`, `titre_publie`, `contenu_texte_publie`, `statut`) VALUES (5, 140, 'texte', 'paniers_li_8', 'Exemple (été) : tomates, courgettes, concombres, oignons frais.', 'publie');
INSERT INTO `blocs_page` (`page_id`, `ordre`, `type`, `titre_publie`, `contenu_texte_publie`, `statut`) VALUES (5, 150, 'texte', 'paniers_p_4', '12 € / panier', 'publie');
INSERT INTO `blocs_page` (`page_id`, `ordre`, `type`, `titre_publie`, `contenu_texte_publie`, `url_publie`, `statut`) VALUES (5, 160, 'lien', 'paniers_a_1', 'Choisir le panier simple', 'https://www.helloasso.com/associations/noeux-environnement/boutiques/panier-de-legumes-2024', 'publie');
INSERT INTO `blocs_page` (`page_id`, `ordre`, `type`, `titre_publie`, `contenu_texte_publie`, `statut`) VALUES (5, 170, 'texte', 'paniers_h3_2', 'Panier familial', 'publie');
INSERT INTO `blocs_page` (`page_id`, `ordre`, `type`, `titre_publie`, `contenu_texte_publie`, `statut`) VALUES (5, 180, 'texte', 'paniers_p_5', 'Pour 3 à 4 personnes', 'publie');
INSERT INTO `blocs_page` (`page_id`, `ordre`, `type`, `titre_publie`, `contenu_texte_publie`, `statut`) VALUES (5, 190, 'texte', 'paniers_li_9', 'Pensé pour une famille ou un foyer de 3 à 4 personnes.', 'publie');
INSERT INTO `blocs_page` (`page_id`, `ordre`, `type`, `titre_publie`, `contenu_texte_publie`, `statut`) VALUES (5, 200, 'texte', 'paniers_li_10', 'Contient une plus grande quantité de légumes et/ou plus de variétés.', 'publie');
INSERT INTO `blocs_page` (`page_id`, `ordre`, `type`, `titre_publie`, `contenu_texte_publie`, `statut`) VALUES (5, 210, 'texte', 'paniers_li_11', 'Exemple (printemps) : plusieurs salades, épinards, carottes, poireaux, aromatiques.', 'publie');
INSERT INTO `blocs_page` (`page_id`, `ordre`, `type`, `titre_publie`, `contenu_texte_publie`, `statut`) VALUES (5, 220, 'texte', 'paniers_li_12', 'Exemple (été) : tomates, courgettes, poivrons, aubergines, pommes de terre nouvelles.', 'publie');
INSERT INTO `blocs_page` (`page_id`, `ordre`, `type`, `titre_publie`, `contenu_texte_publie`, `statut`) VALUES (5, 230, 'texte', 'paniers_p_6', '17 € / panier', 'publie');
INSERT INTO `blocs_page` (`page_id`, `ordre`, `type`, `titre_publie`, `contenu_texte_publie`, `url_publie`, `statut`) VALUES (5, 240, 'lien', 'paniers_a_2', 'Choisir le panier familial', 'https://www.helloasso.com/associations/noeux-environnement/boutiques/panier-de-legumes-2024', 'publie');
INSERT INTO `blocs_page` (`page_id`, `ordre`, `type`, `titre_publie`, `contenu_texte_publie`, `statut`) VALUES (5, 250, 'texte', 'paniers_p_7', 'Le contenu exact des paniers change chaque
                semaine en fonction de la production et de la météo.Nous essayons toujours de proposer des paniers
                équilibrés et variés.', 'publie');
INSERT INTO `blocs_page` (`page_id`, `ordre`, `type`, `titre_publie`, `contenu_texte_publie`, `statut`) VALUES (5, 260, 'texte', 'paniers_h2_3', 'Comment ça marche ?', 'publie');
INSERT INTO `blocs_page` (`page_id`, `ordre`, `type`, `titre_publie`, `contenu_texte_publie`, `statut`) VALUES (5, 270, 'texte', 'paniers_h3_3', 'Je choisis ma formule', 'publie');
INSERT INTO `blocs_page` (`page_id`, `ordre`, `type`, `titre_publie`, `contenu_texte_publie`, `statut`) VALUES (5, 280, 'texte', 'paniers_p_8', 'Je choisis le type de panier qui correspond le mieux à mon foyer :Panier simple (1–2
                        personnes) ou Panier familial (3–4 personnes).', 'publie');
INSERT INTO `blocs_page` (`page_id`, `ordre`, `type`, `titre_publie`, `contenu_texte_publie`, `statut`) VALUES (5, 290, 'texte', 'paniers_h3_4', 'Je commande', 'publie');
INSERT INTO `blocs_page` (`page_id`, `ordre`, `type`, `titre_publie`, `contenu_texte_publie`, `statut`) VALUES (5, 300, 'texte', 'paniers_p_9', 'Je passe commande en ligne via HelloAsso.Je précise mes coordonnées, la date de retrait
                        souhaitée et le type de panier.', 'publie');
INSERT INTO `blocs_page` (`page_id`, `ordre`, `type`, `titre_publie`, `contenu_texte_publie`, `statut`) VALUES (5, 310, 'texte', 'paniers_h3_5', 'Je viens chercher mon panier', 'publie');
INSERT INTO `blocs_page` (`page_id`, `ordre`, `type`, `titre_publie`, `contenu_texte_publie`, `statut`) VALUES (5, 320, 'texte', 'paniers_p_10', 'Je récupère mon panier à La Réserve aux horaires de retrait.Je viens avec mon cabas et ma
                        confirmation de commande.', 'publie');
INSERT INTO `blocs_page` (`page_id`, `ordre`, `type`, `titre_publie`, `contenu_texte_publie`, `statut`) VALUES (5, 330, 'texte', 'paniers_h2_4', 'Le panier solidaire', 'publie');
INSERT INTO `blocs_page` (`page_id`, `ordre`, `type`, `titre_publie`, `contenu_texte_publie`, `statut`) VALUES (5, 340, 'texte', 'paniers_p_11', 'Parce que l’accès à une alimentation de qualité ne doit pas dépendre uniquement du revenu, Nœux
                        Environnement met en place un panier solidaire.', 'publie');
INSERT INTO `blocs_page` (`page_id`, `ordre`, `type`, `titre_publie`, `contenu_texte_publie`, `statut`) VALUES (5, 350, 'texte', 'paniers_p_12', 'Le principe :', 'publie');
INSERT INTO `blocs_page` (`page_id`, `ordre`, `type`, `titre_publie`, `contenu_texte_publie`, `statut`) VALUES (5, 360, 'texte', 'paniers_li_13', 'notre panier de légumes (valeur ~15 €) peut être proposé à un tarif réduit,', 'publie');
INSERT INTO `blocs_page` (`page_id`, `ordre`, `type`, `titre_publie`, `contenu_texte_publie`, `statut`) VALUES (5, 370, 'texte', 'paniers_li_14', 'ce tarif est calculé en fonction du quotient familial CAF,', 'publie');
INSERT INTO `blocs_page` (`page_id`, `ordre`, `type`, `titre_publie`, `contenu_texte_publie`, `statut`) VALUES (5, 380, 'texte', 'paniers_li_15', 'le dispositif est soutenu par des partenaires financiers pour compenser la différence de
                            prix.', 'publie');
INSERT INTO `blocs_page` (`page_id`, `ordre`, `type`, `titre_publie`, `contenu_texte_publie`, `statut`) VALUES (5, 390, 'texte', 'paniers_p_13', 'Si vous pensez pouvoir bénéficier du panier solidaire, ou si vous accompagnez des familles qui
                        pourraient en avoir besoin, n’hésitez pas à nous contacter.', 'publie');
INSERT INTO `blocs_page` (`page_id`, `ordre`, `type`, `titre_publie`, `contenu_texte_publie`, `statut`) VALUES (5, 400, 'texte', 'paniers_p_14', 'Pour demander un panier solidaire :', 'publie');
INSERT INTO `blocs_page` (`page_id`, `ordre`, `type`, `titre_publie`, `contenu_texte_publie`, `statut`) VALUES (5, 410, 'texte', 'paniers_li_16', 'prendre contact avec Nœux Environnement,', 'publie');
INSERT INTO `blocs_page` (`page_id`, `ordre`, `type`, `titre_publie`, `contenu_texte_publie`, `statut`) VALUES (5, 420, 'texte', 'paniers_li_17', 'apporter ou transmettre un justificatif de quotient familial CAF,', 'publie');
INSERT INTO `blocs_page` (`page_id`, `ordre`, `type`, `titre_publie`, `contenu_texte_publie`, `statut`) VALUES (5, 430, 'texte', 'paniers_li_18', 'échanger avec notre équipe sur les modalités.', 'publie');
INSERT INTO `blocs_page` (`page_id`, `ordre`, `type`, `titre_publie`, `contenu_texte_publie`, `url_publie`, `statut`) VALUES (5, 440, 'lien', 'paniers_a_3', 'Demander un panier
                        solidaire', 'index.php?view=contact', 'publie');
INSERT INTO `blocs_page` (`page_id`, `ordre`, `type`, `titre_publie`, `contenu_texte_publie`, `statut`) VALUES (5, 450, 'texte', 'paniers_h2_5', 'Où et quand récupérer mon panier ?', 'publie');
INSERT INTO `blocs_page` (`page_id`, `ordre`, `type`, `titre_publie`, `contenu_texte_publie`, `statut`) VALUES (5, 460, 'texte', 'paniers_h3_6', 'Lieu de retrait', 'publie');
INSERT INTO `blocs_page` (`page_id`, `ordre`, `type`, `titre_publie`, `contenu_texte_publie`, `statut`) VALUES (5, 470, 'texte', 'paniers_p_15', 'La Réserve – écolieu vivant de l’Artois22 bis rue Nationale62290 Nœux-les-Mines', 'publie');
INSERT INTO `blocs_page` (`page_id`, `ordre`, `type`, `titre_publie`, `contenu_texte_publie`, `statut`) VALUES (5, 480, 'texte', 'paniers_p_16', 'La Réserve est le nouveau lieu de travail et de vie de Nœux
                        Environnement : un bâtiment réhabilité, des jardins, des parcelles de maraîchage… Un bon
                        prétexte pour venir découvrir le site en récupérant vos légumes !', 'publie');
INSERT INTO `blocs_page` (`page_id`, `ordre`, `type`, `titre_publie`, `contenu_texte_publie`, `statut`) VALUES (5, 490, 'texte', 'paniers_h3_7', 'Jours et horaires de retrait', 'publie');
INSERT INTO `blocs_page` (`page_id`, `ordre`, `type`, `titre_publie`, `contenu_texte_publie`, `statut`) VALUES (5, 500, 'texte', 'paniers_p_17', 'Les paniers sont habituellement à retirer :– le vendredi entre 16h et 19h,– éventuellement le samedi matin (vérifier lors de la commande).', 'publie');
INSERT INTO `blocs_page` (`page_id`, `ordre`, `type`, `titre_publie`, `contenu_texte_publie`, `statut`) VALUES (5, 510, 'texte', 'paniers_p_18', 'Les créneaux exacts sont indiqués dans le mail de confirmation de votre commande.', 'publie');
INSERT INTO `blocs_page` (`page_id`, `ordre`, `type`, `titre_publie`, `contenu_texte_publie`, `statut`) VALUES (5, 520, 'texte', 'paniers_p_19', 'Pensez-y !', 'publie');
INSERT INTO `blocs_page` (`page_id`, `ordre`, `type`, `titre_publie`, `contenu_texte_publie`, `statut`) VALUES (5, 530, 'texte', 'paniers_li_19', 'Venez avec vos cabas ou cagettes.', 'publie');
INSERT INTO `blocs_page` (`page_id`, `ordre`, `type`, `titre_publie`, `contenu_texte_publie`, `statut`) VALUES (5, 540, 'texte', 'paniers_li_20', 'Si vous ne pouvez pas venir, essayez de faire récupérer votre panier par un proche.', 'publie');
INSERT INTO `blocs_page` (`page_id`, `ordre`, `type`, `titre_publie`, `contenu_texte_publie`, `statut`) VALUES (5, 550, 'texte', 'paniers_li_21', 'En cas d’empêchement de dernière minute, contactez-nous dès que possible.', 'publie');
INSERT INTO `blocs_page` (`page_id`, `ordre`, `type`, `titre_publie`, `contenu_texte_publie`, `statut`) VALUES (5, 560, 'texte', 'paniers_h2_6', 'Commander aussi d’autres produits locaux', 'publie');
INSERT INTO `blocs_page` (`page_id`, `ordre`, `type`, `titre_publie`, `contenu_texte_publie`, `statut`) VALUES (5, 570, 'texte', 'paniers_p_20', 'En plus des paniers de Nœux Environnement, vous pouvez
                    commander d’autres produits locaux (pain, produits laitiers, fruits, etc.) via notre partenaire de
                    circuits courts.', 'publie');
INSERT INTO `blocs_page` (`page_id`, `ordre`, `type`, `titre_publie`, `contenu_texte_publie`, `statut`) VALUES (5, 580, 'texte', 'paniers_p_21', 'Le principe :', 'publie');
INSERT INTO `blocs_page` (`page_id`, `ordre`, `type`, `titre_publie`, `contenu_texte_publie`, `statut`) VALUES (5, 590, 'texte', 'paniers_li_22', 'je commande en ligne sur la plateforme LeCourtCircuit.fr,', 'publie');
INSERT INTO `blocs_page` (`page_id`, `ordre`, `type`, `titre_publie`, `contenu_texte_publie`, `statut`) VALUES (5, 600, 'texte', 'paniers_li_23', 'je choisis La Réserve – Nœux Environnement comme point de retrait,', 'publie');
INSERT INTO `blocs_page` (`page_id`, `ordre`, `type`, `titre_publie`, `contenu_texte_publie`, `statut`) VALUES (5, 610, 'texte', 'paniers_li_24', 'je viens chercher ma commande en même temps que mon panier de légumes.', 'publie');
INSERT INTO `blocs_page` (`page_id`, `ordre`, `type`, `titre_publie`, `contenu_texte_publie`, `url_publie`, `statut`) VALUES (5, 620, 'lien', 'paniers_a_4', 'Commander d’autres produits locaux', 'https://lecourtcircuit.fr', 'publie');
INSERT INTO `blocs_page` (`page_id`, `ordre`, `type`, `titre_publie`, `contenu_texte_publie`, `statut`) VALUES (5, 630, 'texte', 'paniers_h2_7', 'Questions fréquentes', 'publie');
INSERT INTO `blocs_page` (`page_id`, `ordre`, `type`, `titre_publie`, `contenu_texte_publie`, `statut`) VALUES (5, 640, 'texte', 'paniers_h4_1', 'Q1 – Que trouve-t-on dans un panier
                        ?', 'publie');
INSERT INTO `blocs_page` (`page_id`, `ordre`, `type`, `titre_publie`, `contenu_texte_publie`, `statut`) VALUES (5, 650, 'texte', 'paniers_p_22', 'Le contenu change chaque semaine en fonction des saisons et de la production. En général, un
                        panier contient 3 à 6 variétés de légumes différents, tous produits en agriculture biologique.
                        Nous essayons de proposer des paniers équilibrés.', 'publie');
INSERT INTO `blocs_page` (`page_id`, `ordre`, `type`, `titre_publie`, `contenu_texte_publie`, `statut`) VALUES (5, 660, 'texte', 'paniers_h4_2', 'Q2 – Peut-on choisir la composition
                        du panier ?', 'publie');
INSERT INTO `blocs_page` (`page_id`, `ordre`, `type`, `titre_publie`, `contenu_texte_publie`, `statut`) VALUES (5, 670, 'texte', 'paniers_p_23', 'Non, nous ne faisons pas de “commande à la carte”. Le panier est préparé à l’avance en fonction
                        de la récolte de la semaine. En revanche, nous faisons en sorte de varier le contenu sur la
                        saison.', 'publie');
INSERT INTO `blocs_page` (`page_id`, `ordre`, `type`, `titre_publie`, `contenu_texte_publie`, `statut`) VALUES (5, 680, 'texte', 'paniers_h4_3', 'Q3 – Que se passe-t-il si je ne peux
                        pas venir chercher mon panier ?', 'publie');
INSERT INTO `blocs_page` (`page_id`, `ordre`, `type`, `titre_publie`, `contenu_texte_publie`, `statut`) VALUES (5, 690, 'texte', 'paniers_p_24', 'Idéalement, vous pouvez demander à un proche de venir le récupérer à votre place. Si vous savez à
                        l’avance que vous ne pourrez pas être là, contactez-nous dès que possible. Passé un certain
                        délai sans nouvelles, le panier non retiré pourra être redistribué.', 'publie');
INSERT INTO `blocs_page` (`page_id`, `ordre`, `type`, `titre_publie`, `contenu_texte_publie`, `statut`) VALUES (5, 700, 'texte', 'paniers_h4_4', 'Q4 – Comment fonctionne le paiement
                        ?', 'publie');
INSERT INTO `blocs_page` (`page_id`, `ordre`, `type`, `titre_publie`, `contenu_texte_publie`, `statut`) VALUES (5, 710, 'texte', 'paniers_p_25', 'Le paiement se fait en ligne, lors de la commande (CB via HelloAsso). Les informations de
                        paiement sont indiquées clairement lors de la commande.', 'publie');
INSERT INTO `blocs_page` (`page_id`, `ordre`, `type`, `titre_publie`, `contenu_texte_publie`, `statut`) VALUES (5, 720, 'texte', 'paniers_h4_5', 'Q5 – Je n’ai pas beaucoup de moyens
                        : puis-je quand même avoir un panier ?', 'publie');
INSERT INTO `blocs_page` (`page_id`, `ordre`, `type`, `titre_publie`, `contenu_texte_publie`, `statut`) VALUES (5, 730, 'texte', 'paniers_p_26', 'Oui, c’est le but du panier solidaire. Grâce à un financement spécifique, certaines familles
                        peuvent bénéficier d’un tarif réduit, calculé en fonction du quotient familial CAF.', 'publie');
INSERT INTO `blocs_page` (`page_id`, `ordre`, `type`, `titre_publie`, `contenu_texte_publie`, `statut`) VALUES (5, 740, 'texte', 'paniers_h4_6', 'Q6 – Est-ce que je m’engage sur
                        plusieurs mois ?', 'publie');
INSERT INTO `blocs_page` (`page_id`, `ordre`, `type`, `titre_publie`, `contenu_texte_publie`, `statut`) VALUES (5, 750, 'texte', 'paniers_p_27', 'Cela dépend de la formule mise en place. Certains paniers sont proposés à l’unité, d’autres
                        peuvent être pris sous forme d’abonnement. Les modalités d’engagement sont précisées lors de la
                        commande.', 'publie');
INSERT INTO `blocs_page` (`page_id`, `ordre`, `type`, `titre_publie`, `contenu_texte_publie`, `statut`) VALUES (5, 760, 'texte', 'paniers_h2_8', 'Une question avant de commander ?', 'publie');
INSERT INTO `blocs_page` (`page_id`, `ordre`, `type`, `titre_publie`, `contenu_texte_publie`, `statut`) VALUES (5, 770, 'texte', 'paniers_p_28', 'Si vous avez besoin d’un renseignement avant de passer commande (allergie,
                organisation, panier solidaire, commande groupée…), vous pouvez nous contacter :', 'publie');
INSERT INTO `blocs_page` (`page_id`, `ordre`, `type`, `titre_publie`, `contenu_texte_publie`, `statut`) VALUES (5, 780, 'texte', 'paniers_p_29', 'Par mail :contact@noeuxenvironnement.fr', 'publie');
INSERT INTO `blocs_page` (`page_id`, `ordre`, `type`, `titre_publie`, `contenu_texte_publie`, `statut`) VALUES (5, 790, 'texte', 'paniers_p_30', 'Par téléphone :03 21 66 37 74', 'publie');
INSERT INTO `blocs_page` (`page_id`, `ordre`, `type`, `titre_publie`, `contenu_texte_publie`, `url_publie`, `statut`) VALUES (5, 800, 'lien', 'paniers_a_5', 'Nous contacter', 'index.php?view=contact', 'publie');
INSERT INTO `blocs_page` (`page_id`, `ordre`, `type`, `titre_publie`, `contenu_texte_publie`, `statut`) VALUES (6, 10, 'texte', 'partenaires_p_1', 'Nœux Environnement ne travaille pas seul.
                Depuis plus de 30 ans, l’association construit ses projets avec de nombreux partenaires : collectivités,
                réseaux, associations, structures de l’emploi, entreprises, fondations…', 'publie');
INSERT INTO `blocs_page` (`page_id`, `ordre`, `type`, `titre_publie`, `contenu_texte_publie`, `statut`) VALUES (6, 20, 'texte', 'partenaires_h2_1', 'Nos Financeurs', 'publie');
INSERT INTO `blocs_page` (`page_id`, `ordre`, `type`, `titre_publie`, `contenu_texte_publie`, `statut`) VALUES (6, 30, 'texte', 'partenaires_p_2', 'Ces institutions publiques et collectivités soutiennent durablement nos actions en faveur de l''environnement et de l''insertion.', 'publie');
INSERT INTO `blocs_page` (`page_id`, `ordre`, `type`, `titre_publie`, `contenu_texte_publie`, `statut`) VALUES (6, 40, 'texte', 'partenaires_h2_2', 'Nos Partenaires de terrain', 'publie');
INSERT INTO `blocs_page` (`page_id`, `ordre`, `type`, `titre_publie`, `contenu_texte_publie`, `statut`) VALUES (6, 50, 'texte', 'partenaires_p_3', 'Acteurs de l''emploi, de l''insertion, de l''éducation ou associations locales, ils collaborent au quotidien avec nos équipes.', 'publie');
INSERT INTO `blocs_page` (`page_id`, `ordre`, `type`, `titre_publie`, `contenu_texte_publie`, `statut`) VALUES (6, 60, 'texte', 'partenaires_p_4', 'Nous travaillons également en lien étroit avec :', 'publie');
INSERT INTO `blocs_page` (`page_id`, `ordre`, `type`, `titre_publie`, `contenu_texte_publie`, `statut`) VALUES (6, 70, 'texte', 'partenaires_li_1', 'France Travail & Missions Locales', 'publie');
INSERT INTO `blocs_page` (`page_id`, `ordre`, `type`, `titre_publie`, `contenu_texte_publie`, `statut`) VALUES (6, 80, 'texte', 'partenaires_li_2', 'Maison Régionale de l’Environnement et des Solidarités (MRES)', 'publie');
INSERT INTO `blocs_page` (`page_id`, `ordre`, `type`, `titre_publie`, `contenu_texte_publie`, `statut`) VALUES (6, 90, 'texte', 'partenaires_li_3', 'Éducation Nationale (agrément académique)', 'publie');
INSERT INTO `blocs_page` (`page_id`, `ordre`, `type`, `titre_publie`, `contenu_texte_publie`, `statut`) VALUES (6, 100, 'texte', 'partenaires_li_4', 'Fonds MAIF pour le vivant', 'publie');
INSERT INTO `blocs_page` (`page_id`, `ordre`, `type`, `titre_publie`, `contenu_texte_publie`, `statut`) VALUES (6, 110, 'texte', 'partenaires_h2_3', 'Devenir partenaire', 'publie');
INSERT INTO `blocs_page` (`page_id`, `ordre`, `type`, `titre_publie`, `contenu_texte_publie`, `statut`) VALUES (6, 120, 'texte', 'partenaires_p_5', 'Vous souhaitez soutenir nos actions ou collaborer avec nous ?', 'publie');
INSERT INTO `blocs_page` (`page_id`, `ordre`, `type`, `titre_publie`, `contenu_texte_publie`, `url_publie`, `statut`) VALUES (6, 130, 'lien', 'partenaires_a_1', 'Nous contacter', 'index.php?view=contact', 'publie');
INSERT INTO `blocs_page` (`page_id`, `ordre`, `type`, `titre_publie`, `contenu_texte_publie`, `statut`) VALUES (8, 10, 'texte', 'education_p_1', 'Protéger l’environnement, c’est aussi donner
                envie d’agir.', 'publie');
INSERT INTO `blocs_page` (`page_id`, `ordre`, `type`, `titre_publie`, `contenu_texte_publie`, `statut`) VALUES (8, 20, 'texte', 'education_p_2', 'Depuis 1996, Nœux Environnement
                développe des actions d’éducation à l’environnement : animations scolaires, ateliers tout public,
                sorties nature, chantiers participatifs…', 'publie');
INSERT INTO `blocs_page` (`page_id`, `ordre`, `type`, `titre_publie`, `contenu_texte_publie`, `statut`) VALUES (8, 30, 'texte', 'education_h2_1', 'Découvrir, comprendre, protéger', 'publie');
INSERT INTO `blocs_page` (`page_id`, `ordre`, `type`, `titre_publie`, `contenu_texte_publie`, `statut`) VALUES (8, 40, 'texte', 'education_p_3', 'Nos animations ont trois objectifs simples :', 'publie');
INSERT INTO `blocs_page` (`page_id`, `ordre`, `type`, `titre_publie`, `contenu_texte_publie`, `statut`) VALUES (8, 50, 'texte', 'education_li_1', 'Découvrir la nature qui nous entoure (faune, flore, paysages, eau, jardins…) ;', 'publie');
INSERT INTO `blocs_page` (`page_id`, `ordre`, `type`, `titre_publie`, `contenu_texte_publie`, `statut`) VALUES (8, 60, 'texte', 'education_li_2', 'Comprendre les liens entre nos gestes quotidiens, l’environnement et la santé ;', 'publie');
INSERT INTO `blocs_page` (`page_id`, `ordre`, `type`, `titre_publie`, `contenu_texte_publie`, `statut`) VALUES (8, 70, 'texte', 'education_li_3', 'Donner envie de passer à l’action, à son échelle, à la maison, à l’école, dans son quartier.', 'publie');
INSERT INTO `blocs_page` (`page_id`, `ordre`, `type`, `titre_publie`, `contenu_texte_publie`, `statut`) VALUES (8, 80, 'texte', 'education_p_4', 'La démarche est toujours la même : partir du concret, manipuler, observer, expérimenter… et partager
                    un moment convivial.', 'publie');
INSERT INTO `blocs_page` (`page_id`, `ordre`, `type`, `titre_publie`, `contenu_texte_publie`, `statut`) VALUES (8, 90, 'texte', 'education_h2_2', 'Des animations pour tous les publics', 'publie');
INSERT INTO `blocs_page` (`page_id`, `ordre`, `type`, `titre_publie`, `contenu_texte_publie`, `statut`) VALUES (8, 100, 'texte', 'education_p_5', 'Nœux Environnement s’adresse aux scolaires (de la maternelle au lycée), aux centres de loisirs et
                    structures jeunesse, au grand public (familles, habitants, associations, groupes d’adultes), et
                    parfois à des entreprises ou institutions.', 'publie');
INSERT INTO `blocs_page` (`page_id`, `ordre`, `type`, `titre_publie`, `contenu_texte_publie`, `statut`) VALUES (8, 110, 'texte', 'education_p_6', 'Les animations peuvent être ouvertes à tous (programmation “tout public”) ou réservées à un groupe.', 'publie');
INSERT INTO `blocs_page` (`page_id`, `ordre`, `type`, `titre_publie`, `contenu_texte_publie`, `statut`) VALUES (8, 120, 'texte', 'education_h2_3', 'Quelques exemples de thématiques', 'publie');
INSERT INTO `blocs_page` (`page_id`, `ordre`, `type`, `titre_publie`, `contenu_texte_publie`, `statut`) VALUES (8, 130, 'texte', 'education_p_7', 'En fonction des saisons et des lieux, nous proposons par exemple :', 'publie');
INSERT INTO `blocs_page` (`page_id`, `ordre`, `type`, `titre_publie`, `contenu_texte_publie`, `statut`) VALUES (8, 140, 'texte', 'education_li_4', 'Eau et zones humides :cycle de l’eau, petites bêtes aquatiques, fonction
                            des marais, qualité de l’eau…', 'publie');
INSERT INTO `blocs_page` (`page_id`, `ordre`, `type`, `titre_publie`, `contenu_texte_publie`, `statut`) VALUES (8, 150, 'texte', 'education_li_5', 'Biodiversité :insectes pollinisateurs, oiseaux, traces d’animaux, chaînes
                            alimentaires, milieux naturels proches de chez nous.', 'publie');
INSERT INTO `blocs_page` (`page_id`, `ordre`, `type`, `titre_publie`, `contenu_texte_publie`, `statut`) VALUES (8, 160, 'texte', 'education_li_6', 'Jardinage naturel & compost :sol vivant, paillage, rotation des cultures,
                            compostage, semis, association de plantes.', 'publie');
INSERT INTO `blocs_page` (`page_id`, `ordre`, `type`, `titre_publie`, `contenu_texte_publie`, `statut`) VALUES (8, 170, 'texte', 'education_li_7', 'Alimentation et santé :lien entre légumes de saison, circuits courts,
                            gaspillage alimentaire, équilibre alimentaire.', 'publie');
INSERT INTO `blocs_page` (`page_id`, `ordre`, `type`, `titre_publie`, `contenu_texte_publie`, `statut`) VALUES (8, 180, 'texte', 'education_li_8', 'Déchets & sobriété :réduire, réutiliser, trier, fabriquer soi-même.', 'publie');
INSERT INTO `blocs_page` (`page_id`, `ordre`, `type`, `titre_publie`, `contenu_texte_publie`, `statut`) VALUES (8, 190, 'texte', 'education_h2_4', 'Animations scolaires : un partenariat avec l’Éducation nationale', 'publie');
INSERT INTO `blocs_page` (`page_id`, `ordre`, `type`, `titre_publie`, `contenu_texte_publie`, `statut`) VALUES (8, 200, 'texte', 'education_p_8', 'Depuis 1996, Nœux Environnement propose des animations pédagogiques pour les écoles. L’association
                    est agréée par l’Éducation nationale comme association éducative complémentaire de l’enseignement
                    public.', 'publie');
INSERT INTO `blocs_page` (`page_id`, `ordre`, `type`, `titre_publie`, `contenu_texte_publie`, `statut`) VALUES (8, 210, 'texte', 'education_p_9', 'Les interventions s’adaptent aux cycles, s’inscrivent dans les programmes et peuvent se dérouler à La
                    Réserve, sur les sites naturels, dans l’enceinte de l’école ou dans un lieu choisi avec les
                    enseignants.', 'publie');
INSERT INTO `blocs_page` (`page_id`, `ordre`, `type`, `titre_publie`, `contenu_texte_publie`, `statut`) VALUES (8, 220, 'texte', 'education_h2_5', 'Ateliers et sorties pour tous', 'publie');
INSERT INTO `blocs_page` (`page_id`, `ordre`, `type`, `titre_publie`, `contenu_texte_publie`, `statut`) VALUES (8, 230, 'texte', 'education_p_10', 'Tout au long de l’année, nous programmons des animations tout public : balades nature, ateliers
                    jardinage, visites thématiques à La Réserve, participation à des événements.', 'publie');
INSERT INTO `blocs_page` (`page_id`, `ordre`, `type`, `titre_publie`, `contenu_texte_publie`, `statut`) VALUES (8, 240, 'texte', 'education_p_11', 'Ces moments sont pensés comme des temps conviviaux, participatifs et concrets.', 'publie');
INSERT INTO `blocs_page` (`page_id`, `ordre`, `type`, `titre_publie`, `contenu_texte_publie`, `statut`) VALUES (8, 250, 'texte', 'education_h2_6', 'Agir ensemble sur le terrain', 'publie');
INSERT INTO `blocs_page` (`page_id`, `ordre`, `type`, `titre_publie`, `contenu_texte_publie`, `statut`) VALUES (8, 260, 'texte', 'education_p_12', 'En plus des animations classiques, Nœux Environnement anime ou co-anime des chantiers participatifs
                    (plantations de haies, entretien de sentiers…) et des projets avec des communes ou des structures.', 'publie');
INSERT INTO `blocs_page` (`page_id`, `ordre`, `type`, `titre_publie`, `contenu_texte_publie`, `statut`) VALUES (8, 270, 'texte', 'education_p_13', 'Ces projets permettent de rassembler habitants, élus, associations et de montrer que la protection de
                    la nature peut être un moment de vie locale.', 'publie');
INSERT INTO `blocs_page` (`page_id`, `ordre`, `type`, `titre_publie`, `contenu_texte_publie`, `statut`) VALUES (8, 280, 'texte', 'education_h2_7', 'Préparer votre projet avec Nœux Environnement', 'publie');
INSERT INTO `blocs_page` (`page_id`, `ordre`, `type`, `titre_publie`, `contenu_texte_publie`, `statut`) VALUES (8, 290, 'texte', 'education_p_14', 'Vous êtes enseignant, animateur, responsable d’association, élu, référent
                d’un groupe… et vous souhaitez mettre en place une animation ?', 'publie');
INSERT INTO `blocs_page` (`page_id`, `ordre`, `type`, `titre_publie`, `contenu_texte_publie`, `url_publie`, `statut`) VALUES (8, 300, 'lien', 'education_a_1', 'Demander une animation / une
                visite', 'index.php?view=contact', 'publie');
INSERT INTO `blocs_page` (`page_id`, `ordre`, `type`, `titre_publie`, `contenu_texte_publie`, `url_publie`, `statut`) VALUES (8, 310, 'lien', 'education_a_2', 'Télécharger le livret pédagogique', 'assets/docs/livret_pedagogique.pdf', 'publie');
INSERT INTO `blocs_page` (`page_id`, `ordre`, `type`, `titre_publie`, `contenu_texte_publie`, `statut`) VALUES (9, 10, 'texte', 'insertion_p_1', 'Nœux Environnement est une structure
                d’insertion par l’activité économique.', 'publie');
INSERT INTO `blocs_page` (`page_id`, `ordre`, `type`, `titre_publie`, `contenu_texte_publie`, `statut`) VALUES (9, 20, 'texte', 'insertion_p_2', 'Derrière chaque chantier nature, chaque
                atelier de jardinage ou chaque panier de légumes, il y a des personnes en parcours d’insertion qui
                reprennent pied dans l’emploi.', 'publie');
INSERT INTO `blocs_page` (`page_id`, `ordre`, `type`, `titre_publie`, `contenu_texte_publie`, `statut`) VALUES (9, 30, 'texte', 'insertion_h2_1', 'L’insertion par l’activité économique, concrètement', 'publie');
INSERT INTO `blocs_page` (`page_id`, `ordre`, `type`, `titre_publie`, `contenu_texte_publie`, `statut`) VALUES (9, 40, 'texte', 'insertion_p_3', 'L’association porte un Atelier Chantier d’Insertion (ACI) basé sur plusieurs supports permanents
                        :', 'publie');
INSERT INTO `blocs_page` (`page_id`, `ordre`, `type`, `titre_publie`, `contenu_texte_publie`, `statut`) VALUES (9, 50, 'texte', 'insertion_li_1', 'gestion des milieux naturels (zones humides, cours d’eau, sentiers, friches, etc.) ;', 'publie');
INSERT INTO `blocs_page` (`page_id`, `ordre`, `type`, `titre_publie`, `contenu_texte_publie`, `statut`) VALUES (9, 60, 'texte', 'insertion_li_2', 'maraîchage biologique et jardinage écologique ;', 'publie');
INSERT INTO `blocs_page` (`page_id`, `ordre`, `type`, `titre_publie`, `contenu_texte_publie`, `statut`) VALUES (9, 70, 'texte', 'insertion_li_3', 'et ponctuellement la sensibilisation à l’environnement (animations, chantiers
                            participatifs…).', 'publie');
INSERT INTO `blocs_page` (`page_id`, `ordre`, `type`, `titre_publie`, `contenu_texte_publie`, `statut`) VALUES (9, 80, 'texte', 'insertion_p_4', 'Ces activités servent à la fois à rendre des services au territoire et à proposer un cadre de
                        travail à des personnes éloignées de l’emploi.', 'publie');
INSERT INTO `blocs_page` (`page_id`, `ordre`, `type`, `titre_publie`, `contenu_texte_publie`, `statut`) VALUES (9, 90, 'texte', 'insertion_h2_2', 'Qui peut intégrer un parcours d’insertion ?', 'publie');
INSERT INTO `blocs_page` (`page_id`, `ordre`, `type`, `titre_publie`, `contenu_texte_publie`, `statut`) VALUES (9, 100, 'texte', 'insertion_p_5', 'Les postes sont destinés à des personnes qui rencontrent des difficultés d’accès à l’emploi (longue
                    période sans emploi, problèmes sociaux…), sont éligibles à l’IAE (orientation par Pôle Emploi,
                    Mission Locale, PLIE, services sociaux…), et souhaitent s’engager dans une démarche active pour
                    construire ou reconstruire un projet professionnel.', 'publie');
INSERT INTO `blocs_page` (`page_id`, `ordre`, `type`, `titre_publie`, `contenu_texte_publie`, `statut`) VALUES (9, 110, 'texte', 'insertion_p_6', 'Les profils sont très variés : jeunes, adultes, parents isolés, personnes ayant besoin de reprendre
                    confiance après une période difficile, etc.', 'publie');
INSERT INTO `blocs_page` (`page_id`, `ordre`, `type`, `titre_publie`, `contenu_texte_publie`, `statut`) VALUES (9, 120, 'texte', 'insertion_h2_3', 'Les supports de travail : des activités utiles au territoire', 'publie');
INSERT INTO `blocs_page` (`page_id`, `ordre`, `type`, `titre_publie`, `contenu_texte_publie`, `statut`) VALUES (9, 130, 'texte', 'insertion_p_7', 'Les salariés en insertion travaillent principalement sur :', 'publie');
INSERT INTO `blocs_page` (`page_id`, `ordre`, `type`, `titre_publie`, `contenu_texte_publie`, `statut`) VALUES (9, 140, 'texte', 'insertion_li_4', 'entretien et restauration de milieux naturels (cours d’eau, fossés, sentiers, terrils, marais,
                        etc.) ;', 'publie');
INSERT INTO `blocs_page` (`page_id`, `ordre`, `type`, `titre_publie`, `contenu_texte_publie`, `statut`) VALUES (9, 150, 'texte', 'insertion_li_5', 'jardinage écologique et maraîchage bio (préparation des sols, cultures, récolte, ventes) ;', 'publie');
INSERT INTO `blocs_page` (`page_id`, `ordre`, `type`, `titre_publie`, `contenu_texte_publie`, `statut`) VALUES (9, 160, 'texte', 'insertion_li_6', 'certains projets de menuiserie écologique (nichoirs, hôtels à insectes, mangeoires…) ;', 'publie');
INSERT INTO `blocs_page` (`page_id`, `ordre`, `type`, `titre_publie`, `contenu_texte_publie`, `statut`) VALUES (9, 170, 'texte', 'insertion_li_7', 'ponctuellement, participation à des animations ou événements.', 'publie');
INSERT INTO `blocs_page` (`page_id`, `ordre`, `type`, `titre_publie`, `contenu_texte_publie`, `statut`) VALUES (9, 180, 'texte', 'insertion_p_8', 'Ces activités sont encadrées par des encadrants techniques qui organisent le travail, transmettent
                    les gestes professionnels et veillent à la sécurité.', 'publie');
INSERT INTO `blocs_page` (`page_id`, `ordre`, `type`, `titre_publie`, `contenu_texte_publie`, `statut`) VALUES (9, 190, 'texte', 'insertion_h2_4', 'Le suivi social et l’accompagnement professionnel', 'publie');
INSERT INTO `blocs_page` (`page_id`, `ordre`, `type`, `titre_publie`, `contenu_texte_publie`, `statut`) VALUES (9, 200, 'texte', 'insertion_p_9', 'Le parcours ne se limite pas au travail sur le chantier.', 'publie');
INSERT INTO `blocs_page` (`page_id`, `ordre`, `type`, `titre_publie`, `contenu_texte_publie`, `statut`) VALUES (9, 210, 'texte', 'insertion_li_8', 'Le suivi socialvise à identifier et lever les freins : logement, mobilité,
                            santé, démarches administratives, garde d’enfants, etc.', 'publie');
INSERT INTO `blocs_page` (`page_id`, `ordre`, `type`, `titre_publie`, `contenu_texte_publie`, `statut`) VALUES (9, 220, 'texte', 'insertion_li_9', 'L’accompagnement professionnelaide à construire un projet : bilans de
                            compétences, découverte de métiers, mise en relation avec des formations, recherche de
                            stages, d’immersions ou d’emplois.', 'publie');
INSERT INTO `blocs_page` (`page_id`, `ordre`, `type`, `titre_publie`, `contenu_texte_publie`, `statut`) VALUES (9, 230, 'texte', 'insertion_p_10', 'L’idée est de bâtir, pas à pas, un parcours individualisé pour chaque salarié.', 'publie');
INSERT INTO `blocs_page` (`page_id`, `ordre`, `type`, `titre_publie`, `contenu_texte_publie`, `statut`) VALUES (9, 240, 'texte', 'insertion_h2_5', 'Objectif : un emploi durable ou une formation', 'publie');
INSERT INTO `blocs_page` (`page_id`, `ordre`, `type`, `titre_publie`, `contenu_texte_publie`, `statut`) VALUES (9, 250, 'texte', 'insertion_p_11', 'L’ACI n’est pas une fin en soi : c’est un sas de retour à l’emploi. Pendant le contrat d’insertion,
                    l’équipe travaille avec le salarié pour clarifier un projet professionnel réaliste, développer des
                    compétences transférables et préparer la sortie.', 'publie');
INSERT INTO `blocs_page` (`page_id`, `ordre`, `type`, `titre_publie`, `contenu_texte_publie`, `statut`) VALUES (9, 260, 'texte', 'insertion_p_12', 'L’objectif final est que la personne puisse quitter Nœux Environnement pour une solution durable :
                    emploi, alternance, formation longue… et non revenir dans un parcours d’urgence.', 'publie');
INSERT INTO `blocs_page` (`page_id`, `ordre`, `type`, `titre_publie`, `contenu_texte_publie`, `statut`) VALUES (9, 270, 'texte', 'insertion_h3_1', 'Pour les candidats', 'publie');
INSERT INTO `blocs_page` (`page_id`, `ordre`, `type`, `titre_publie`, `contenu_texte_publie`, `statut`) VALUES (9, 280, 'texte', 'insertion_p_13', 'Vous pensez répondre aux critères de l’IAE et vous êtes intéressé par un poste à Nœux
                            Environnement ? Parlez-en avec votre référent emploi ou consultez nos offres.', 'publie');
INSERT INTO `blocs_page` (`page_id`, `ordre`, `type`, `titre_publie`, `contenu_texte_publie`, `url_publie`, `statut`) VALUES (9, 290, 'lien', 'insertion_a_1', 'Voir nos offres d’emploi & stages', 'index.php?view=nous-rejoindre', 'publie');
INSERT INTO `blocs_page` (`page_id`, `ordre`, `type`, `titre_publie`, `contenu_texte_publie`, `statut`) VALUES (9, 300, 'texte', 'insertion_h3_2', 'Pour les partenaires et employeurs', 'publie');
INSERT INTO `blocs_page` (`page_id`, `ordre`, `type`, `titre_publie`, `contenu_texte_publie`, `statut`) VALUES (9, 310, 'texte', 'insertion_p_14', 'Vous êtes une entreprise, une collectivité, une structure sociale et vous souhaitez proposer
                            des immersions, recruter des salariés sortant de l’ACI, ou monter un projet en lien avec nos
                            activités ?', 'publie');
INSERT INTO `blocs_page` (`page_id`, `ordre`, `type`, `titre_publie`, `contenu_texte_publie`, `url_publie`, `statut`) VALUES (9, 320, 'lien', 'insertion_a_2', 'Nous contacter pour un partenariat emploi', 'index.php?view=contact', 'publie');
INSERT INTO `blocs_page` (`page_id`, `ordre`, `type`, `titre_publie`, `contenu_texte_publie`, `statut`) VALUES (11, 10, 'texte', 'mentions-legales_h2_1', 'Éditeur du site', 'publie');
INSERT INTO `blocs_page` (`page_id`, `ordre`, `type`, `titre_publie`, `contenu_texte_publie`, `statut`) VALUES (11, 20, 'texte', 'mentions-legales_p_1', 'Association Noeux Environnement22 bis Rue Nationale62290 Nœux-les-MinesFrance', 'publie');
INSERT INTO `blocs_page` (`page_id`, `ordre`, `type`, `titre_publie`, `contenu_texte_publie`, `statut`) VALUES (11, 30, 'texte', 'mentions-legales_p_2', 'Tél : 03 21 66 37 74Email : contact@noeuxenvironnement.fr', 'publie');
INSERT INTO `blocs_page` (`page_id`, `ordre`, `type`, `titre_publie`, `contenu_texte_publie`, `statut`) VALUES (11, 40, 'texte', 'mentions-legales_h2_2', 'Directeur de la publication', 'publie');
INSERT INTO `blocs_page` (`page_id`, `ordre`, `type`, `titre_publie`, `contenu_texte_publie`, `statut`) VALUES (11, 50, 'texte', 'mentions-legales_p_3', '[Nom du Directeur]', 'publie');
INSERT INTO `blocs_page` (`page_id`, `ordre`, `type`, `titre_publie`, `contenu_texte_publie`, `statut`) VALUES (11, 60, 'texte', 'mentions-legales_h2_3', 'Hébergement', 'publie');
INSERT INTO `blocs_page` (`page_id`, `ordre`, `type`, `titre_publie`, `contenu_texte_publie`, `statut`) VALUES (11, 70, 'texte', 'mentions-legales_p_4', '[Nom de l''hébergeur][Adresse de l''hébergeur]', 'publie');
INSERT INTO `blocs_page` (`page_id`, `ordre`, `type`, `titre_publie`, `contenu_texte_publie`, `statut`) VALUES (11, 80, 'texte', 'mentions-legales_h2_4', 'Propriété intellectuelle', 'publie');
INSERT INTO `blocs_page` (`page_id`, `ordre`, `type`, `titre_publie`, `contenu_texte_publie`, `statut`) VALUES (11, 90, 'texte', 'mentions-legales_p_5', 'L''ensemble de ce site relève de la législation française et internationale sur le droit d''auteur et
                    la propriété intellectuelle. Tous les droits de reproduction sont réservés, y compris pour les
                    documents téléchargeables et les représentations iconographiques et photographiques.', 'publie');
INSERT INTO `blocs_page` (`page_id`, `ordre`, `type`, `titre_publie`, `contenu_texte_publie`, `statut`) VALUES (11, 100, 'texte', 'mentions-legales_h2_5', 'Données personnelles', 'publie');
INSERT INTO `blocs_page` (`page_id`, `ordre`, `type`, `titre_publie`, `contenu_texte_publie`, `statut`) VALUES (11, 110, 'texte', 'mentions-legales_p_6', 'Conformément à la loi "Informatique et Libertés", vous disposez d''un droit d''accès, de modification
                    et de suppression des données qui vous concernent. Pour l''exercer, adressez-vous à l''association
                    Noeux Environnement.', 'publie');
INSERT INTO `blocs_page` (`page_id`, `ordre`, `type`, `titre_publie`, `contenu_texte_publie`, `statut`) VALUES (21, 10, 'texte', 'nature-territoires_p_1', 'Depuis ses débuts, Nœux Environnement est
                très présente sur les milieux naturels du territoire : cours d’eau, zones humides, sentiers, petits
                bois, friches, jardins…', 'publie');
INSERT INTO `blocs_page` (`page_id`, `ordre`, `type`, `titre_publie`, `contenu_texte_publie`, `statut`) VALUES (21, 20, 'texte', 'nature-territoires_p_2', 'L’objectif est double : améliorer la
                qualité des sites (biodiversité, paysage, usages) et proposer des chantiers supports d’insertion pour
                nos salariés.', 'publie');
INSERT INTO `blocs_page` (`page_id`, `ordre`, `type`, `titre_publie`, `contenu_texte_publie`, `statut`) VALUES (21, 30, 'texte', 'nature-territoires_h2_1', 'Nos principaux types d’interventions', 'publie');
INSERT INTO `blocs_page` (`page_id`, `ordre`, `type`, `titre_publie`, `contenu_texte_publie`, `statut`) VALUES (21, 40, 'texte', 'nature-territoires_p_3', 'Nous réalisons, par exemple :', 'publie');
INSERT INTO `blocs_page` (`page_id`, `ordre`, `type`, `titre_publie`, `contenu_texte_publie`, `statut`) VALUES (21, 50, 'texte', 'nature-territoires_li_1', 'Sur les cours d’eau et fossés :enlèvement sélectif de la végétation
                            gênante, dégagement d’embâcles, petits travaux pour stabiliser les berges, entretien des
                            abords.', 'publie');
INSERT INTO `blocs_page` (`page_id`, `ordre`, `type`, `titre_publie`, `contenu_texte_publie`, `statut`) VALUES (21, 60, 'texte', 'nature-territoires_li_2', 'Sur les zones humides et mares :entretien des berges, création ou remise
                            en état de mares, fauche raisonnée, mise en valeur de ces zones souvent méconnues.', 'publie');
INSERT INTO `blocs_page` (`page_id`, `ordre`, `type`, `titre_publie`, `contenu_texte_publie`, `statut`) VALUES (21, 70, 'texte', 'nature-territoires_li_3', 'Sur les haies, talus et petits bois :plantations d’arbres et d’arbustes,
                            taille d’entretien, actions pour maintenir des corridors écologiques et des refuges pour la
                            faune.', 'publie');
INSERT INTO `blocs_page` (`page_id`, `ordre`, `type`, `titre_publie`, `contenu_texte_publie`, `statut`) VALUES (21, 80, 'texte', 'nature-territoires_li_4', 'Sur les sentiers et espaces de promenade :débroussaillage, entretien des
                            chemins, pose ou entretien de petits équipements (panneaux, barrières, mobilier simple).', 'publie');
INSERT INTO `blocs_page` (`page_id`, `ordre`, `type`, `titre_publie`, `contenu_texte_publie`, `statut`) VALUES (21, 90, 'texte', 'nature-territoires_li_5', 'Sur des friches et anciens sites délaissés :remise en état progressive,
                            transformation en espaces plus accueillants pour les habitants et pour la nature.', 'publie');
INSERT INTO `blocs_page` (`page_id`, `ordre`, `type`, `titre_publie`, `contenu_texte_publie`, `statut`) VALUES (21, 100, 'texte', 'nature-territoires_p_4', 'Ces interventions sont adaptées à chaque site : nous discutons avec la commune ou le partenaire
                        pour bien comprendre les besoins et les usages.', 'publie');
INSERT INTO `blocs_page` (`page_id`, `ordre`, `type`, `titre_publie`, `contenu_texte_publie`, `statut`) VALUES (21, 110, 'texte', 'nature-territoires_h2_2', 'Travailler avec la nature, pas contre elle', 'publie');
INSERT INTO `blocs_page` (`page_id`, `ordre`, `type`, `titre_publie`, `contenu_texte_publie`, `statut`) VALUES (21, 120, 'texte', 'nature-territoires_p_5', 'Sur nos chantiers, nous cherchons à trouver le bon équilibre entre :', 'publie');
INSERT INTO `blocs_page` (`page_id`, `ordre`, `type`, `titre_publie`, `contenu_texte_publie`, `statut`) VALUES (21, 130, 'texte', 'nature-territoires_li_6', 'la sécurité et le confort pour les usagers (riverains, promeneurs, pêcheurs…) ;', 'publie');
INSERT INTO `blocs_page` (`page_id`, `ordre`, `type`, `titre_publie`, `contenu_texte_publie`, `statut`) VALUES (21, 140, 'texte', 'nature-territoires_li_7', 'le respect des cycles naturels (périodes de nidification, floraison, etc.) ;', 'publie');
INSERT INTO `blocs_page` (`page_id`, `ordre`, `type`, `titre_publie`, `contenu_texte_publie`, `statut`) VALUES (21, 150, 'texte', 'nature-territoires_li_8', 'la préservation de zones refuges pour la faune et la flore.', 'publie');
INSERT INTO `blocs_page` (`page_id`, `ordre`, `type`, `titre_publie`, `contenu_texte_publie`, `statut`) VALUES (21, 160, 'texte', 'nature-territoires_p_6', 'Concrètement, cela signifie : limiter autant que possible les interventions lourdes, garder des zones
                    “plus sauvages” là où c’est possible, privilégier des techniques simples et robustes.', 'publie');
INSERT INTO `blocs_page` (`page_id`, `ordre`, `type`, `titre_publie`, `contenu_texte_publie`, `statut`) VALUES (21, 170, 'texte', 'nature-territoires_p_7', 'Nous sommes régulièrement en contact avec des structures spécialisées (CPIE, associations
                    naturalistes, techniciens rivières…) pour ajuster nos pratiques et nos choix.', 'publie');
INSERT INTO `blocs_page` (`page_id`, `ordre`, `type`, `titre_publie`, `contenu_texte_publie`, `statut`) VALUES (21, 180, 'texte', 'nature-territoires_h2_3', 'Les chantiers nature comme support d’insertion', 'publie');
INSERT INTO `blocs_page` (`page_id`, `ordre`, `type`, `titre_publie`, `contenu_texte_publie`, `statut`) VALUES (21, 190, 'texte', 'nature-territoires_p_8', 'Les chantiers sur les milieux naturels sont aussi des lieux d’apprentissage pour les salariés en
                        insertion qui rejoignent l’association.', 'publie');
INSERT INTO `blocs_page` (`page_id`, `ordre`, `type`, `titre_publie`, `contenu_texte_publie`, `statut`) VALUES (21, 200, 'texte', 'nature-territoires_p_9', 'Ils permettent de :', 'publie');
INSERT INTO `blocs_page` (`page_id`, `ordre`, `type`, `titre_publie`, `contenu_texte_publie`, `statut`) VALUES (21, 210, 'texte', 'nature-territoires_li_9', 'reprendre un rythme de travail,', 'publie');
INSERT INTO `blocs_page` (`page_id`, `ordre`, `type`, `titre_publie`, `contenu_texte_publie`, `statut`) VALUES (21, 220, 'texte', 'nature-territoires_li_10', 'apprendre à travailler en équipe,', 'publie');
INSERT INTO `blocs_page` (`page_id`, `ordre`, `type`, `titre_publie`, `contenu_texte_publie`, `statut`) VALUES (21, 230, 'texte', 'nature-territoires_li_11', 'se former à l’utilisation d’outils (débroussailleuse, tronçonneuse, petits engins…),', 'publie');
INSERT INTO `blocs_page` (`page_id`, `ordre`, `type`, `titre_publie`, `contenu_texte_publie`, `statut`) VALUES (21, 240, 'texte', 'nature-territoires_li_12', 'découvrir les règles de sécurité,', 'publie');
INSERT INTO `blocs_page` (`page_id`, `ordre`, `type`, `titre_publie`, `contenu_texte_publie`, `statut`) VALUES (21, 250, 'texte', 'nature-territoires_li_13', 'mieux connaître le territoire et ses enjeux environnementaux.', 'publie');
INSERT INTO `blocs_page` (`page_id`, `ordre`, `type`, `titre_publie`, `contenu_texte_publie`, `statut`) VALUES (21, 260, 'texte', 'nature-territoires_p_10', 'Ces compétences peuvent ensuite être mobilisées dans des emplois d’entretien d’espaces verts, de
                        travaux publics, de logistique, de maintenance, etc.', 'publie');
INSERT INTO `blocs_page` (`page_id`, `ordre`, `type`, `titre_publie`, `contenu_texte_publie`, `statut`) VALUES (21, 270, 'texte', 'nature-territoires_h2_4', 'Nos partenaires sur le terrain', 'publie');
INSERT INTO `blocs_page` (`page_id`, `ordre`, `type`, `titre_publie`, `contenu_texte_publie`, `statut`) VALUES (21, 280, 'texte', 'nature-territoires_p_11', 'Nous travaillons principalement pour des communes et intercommunalités, des syndicats de rivières ou
                    de bassins versants, des structures environnementales (CEN, associations…), et parfois des
                    bailleurs, des structures sociales ou d’autres partenaires publics.', 'publie');
INSERT INTO `blocs_page` (`page_id`, `ordre`, `type`, `titre_publie`, `contenu_texte_publie`, `statut`) VALUES (21, 290, 'texte', 'nature-territoires_p_12', 'Les interventions peuvent être ponctuelles, pour remettre un site en état, ou régulières, dans le
                    cadre de conventions ou de contrats d’entretien.', 'publie');
INSERT INTO `blocs_page` (`page_id`, `ordre`, `type`, `titre_publie`, `contenu_texte_publie`, `statut`) VALUES (21, 300, 'texte', 'nature-territoires_h3_1', 'Quelques exemples de réalisations', 'publie');
INSERT INTO `blocs_page` (`page_id`, `ordre`, `type`, `titre_publie`, `contenu_texte_publie`, `statut`) VALUES (21, 310, 'texte', 'nature-territoires_h4_1', 'Restauration de berges', 'publie');
INSERT INTO `blocs_page` (`page_id`, `ordre`, `type`, `titre_publie`, `contenu_texte_publie`, `statut`) VALUES (21, 320, 'texte', 'nature-territoires_p_13', 'Dégagement d’embâcles et remise en place d’une végétation adaptée pour un cours d’eau
                                plus lisible et des berges plus stables.', 'publie');
INSERT INTO `blocs_page` (`page_id`, `ordre`, `type`, `titre_publie`, `contenu_texte_publie`, `statut`) VALUES (21, 330, 'texte', 'nature-territoires_h4_2', 'Entretien de sentier', 'publie');
INSERT INTO `blocs_page` (`page_id`, `ordre`, `type`, `titre_publie`, `contenu_texte_publie`, `statut`) VALUES (21, 340, 'texte', 'nature-territoires_p_14', 'Entretien d''un cheminement et fauche raisonnée dans un espace naturel ouvert au public.', 'publie');
INSERT INTO `blocs_page` (`page_id`, `ordre`, `type`, `titre_publie`, `contenu_texte_publie`, `statut`) VALUES (21, 350, 'texte', 'nature-territoires_h4_3', 'Plantation de haies', 'publie');
INSERT INTO `blocs_page` (`page_id`, `ordre`, `type`, `titre_publie`, `contenu_texte_publie`, `statut`) VALUES (21, 360, 'texte', 'nature-territoires_p_15', 'Plantation de haies champêtres le long de parcelles et de chemins pour offrir des refuges
                                à la faune et limiter l''érosion.', 'publie');
INSERT INTO `blocs_page` (`page_id`, `ordre`, `type`, `titre_publie`, `contenu_texte_publie`, `statut`) VALUES (21, 370, 'texte', 'nature-territoires_h2_5', 'Travaillons ensemble', 'publie');
INSERT INTO `blocs_page` (`page_id`, `ordre`, `type`, `titre_publie`, `contenu_texte_publie`, `statut`) VALUES (21, 380, 'texte', 'nature-territoires_p_16', 'Vous êtes une commune, une intercommunalité, une association ou une
                structure gestionnaire et vous avez un projet nature ?', 'publie');
INSERT INTO `blocs_page` (`page_id`, `ordre`, `type`, `titre_publie`, `contenu_texte_publie`, `url_publie`, `statut`) VALUES (21, 390, 'lien', 'nature-territoires_a_1', 'Nous contacter pour un projet
                nature', 'index.php?view=contact', 'publie');
INSERT INTO `blocs_page` (`page_id`, `ordre`, `type`, `titre_publie`, `contenu_texte_publie`, `statut`) VALUES (22, 10, 'texte', 'maraichage_p_1', 'Depuis 2005, Nœux Environnement développe un
                projet de maraîchage biologique qui associe insertion professionnelle, production de légumes et
                sensibilisation à l’environnement.', 'publie');
INSERT INTO `blocs_page` (`page_id`, `ordre`, `type`, `titre_publie`, `contenu_texte_publie`, `statut`) VALUES (22, 20, 'texte', 'maraichage_p_2', 'L’idée : produire des légumes de
                saison, sans produits chimiques, pour les habitants du territoire, tout en créant des emplois
                d’insertion.', 'publie');
INSERT INTO `blocs_page` (`page_id`, `ordre`, `type`, `titre_publie`, `contenu_texte_publie`, `statut`) VALUES (22, 30, 'texte', 'maraichage_h2_1', 'Des jardins solidaires sur le territoire', 'publie');
INSERT INTO `blocs_page` (`page_id`, `ordre`, `type`, `titre_publie`, `contenu_texte_publie`, `statut`) VALUES (22, 40, 'texte', 'maraichage_p_3', 'Au fil des années, plusieurs jardins du cœur ont vu le jour sur différentes communes, avec des
                        parcelles de tailles variées où l’on cultive une grande diversité de légumes : salades,
                        carottes, petits pois, oignons, ail, échalotes, courgettes, betteraves rouges, concombres…', 'publie');
INSERT INTO `blocs_page` (`page_id`, `ordre`, `type`, `titre_publie`, `contenu_texte_publie`, `statut`) VALUES (22, 50, 'texte', 'maraichage_p_4', 'Aujourd’hui, l’activité maraîchère est aussi fortement présente à La Réserve, écolieu vivant de
                        l’Artois, qui devient un véritable site de production bio en insertion.', 'publie');
INSERT INTO `blocs_page` (`page_id`, `ordre`, `type`, `titre_publie`, `contenu_texte_publie`, `statut`) VALUES (22, 60, 'texte', 'maraichage_p_5', 'Les parcelles et serres sont cultivées en agriculture biologique, travaillées avec des rotations
                        de cultures pour préserver les sols, et entretenues par des équipes en insertion.', 'publie');
INSERT INTO `blocs_page` (`page_id`, `ordre`, `type`, `titre_publie`, `contenu_texte_publie`, `statut`) VALUES (22, 70, 'texte', 'maraichage_h2_2', 'Une agriculture respectueuse de l’environnement', 'publie');
INSERT INTO `blocs_page` (`page_id`, `ordre`, `type`, `titre_publie`, `contenu_texte_publie`, `statut`) VALUES (22, 80, 'texte', 'maraichage_p_6', 'Dans nos jardins :', 'publie');
INSERT INTO `blocs_page` (`page_id`, `ordre`, `type`, `titre_publie`, `contenu_texte_publie`, `statut`) VALUES (22, 90, 'texte', 'maraichage_li_1', 'aucun engrais chimique ;', 'publie');
INSERT INTO `blocs_page` (`page_id`, `ordre`, `type`, `titre_publie`, `contenu_texte_publie`, `statut`) VALUES (22, 100, 'texte', 'maraichage_li_2', 'pas de pesticides ni d’insecticides ;', 'publie');
INSERT INTO `blocs_page` (`page_id`, `ordre`, `type`, `titre_publie`, `contenu_texte_publie`, `statut`) VALUES (22, 110, 'texte', 'maraichage_li_3', 'des amendements organiques et des techniques simples pour enrichir le sol ;', 'publie');
INSERT INTO `blocs_page` (`page_id`, `ordre`, `type`, `titre_publie`, `contenu_texte_publie`, `statut`) VALUES (22, 120, 'texte', 'maraichage_li_4', 'un travail sur la biodiversité (haies, mares, zones refuges, nichoirs, hôtels à insectes).', 'publie');
INSERT INTO `blocs_page` (`page_id`, `ordre`, `type`, `titre_publie`, `contenu_texte_publie`, `statut`) VALUES (22, 130, 'texte', 'maraichage_p_7', 'Cette manière de produire permet de proposer des légumes sains, de saison et locaux, de limiter
                    l’impact sur l’eau et les sols, et de créer un cadre d’apprentissage riche pour les salariés.', 'publie');
INSERT INTO `blocs_page` (`page_id`, `ordre`, `type`, `titre_publie`, `contenu_texte_publie`, `statut`) VALUES (22, 140, 'texte', 'maraichage_h2_3', 'Comment se procurer nos légumes ?', 'publie');
INSERT INTO `blocs_page` (`page_id`, `ordre`, `type`, `titre_publie`, `contenu_texte_publie`, `statut`) VALUES (22, 150, 'texte', 'maraichage_p_8', 'Les légumes produits par Nœux Environnement sont proposés :', 'publie');
INSERT INTO `blocs_page` (`page_id`, `ordre`, `type`, `titre_publie`, `contenu_texte_publie`, `statut`) VALUES (22, 160, 'texte', 'maraichage_li_5', 'en paniers de légumes préparés chaque semaine ;', 'publie');
INSERT INTO `blocs_page` (`page_id`, `ordre`, `type`, `titre_publie`, `contenu_texte_publie`, `statut`) VALUES (22, 170, 'texte', 'maraichage_li_6', 'lors de ventes sur place et marchés, notamment à La Réserve ;', 'publie');
INSERT INTO `blocs_page` (`page_id`, `ordre`, `type`, `titre_publie`, `contenu_texte_publie`, `statut`) VALUES (22, 180, 'texte', 'maraichage_li_7', 'via la plateforme de producteurs locaux LeCourtCircuit.fr, où “Les Maraîchers de Nœux
                        Environnement” sont présents comme producteur bio, avec La Réserve comme point de retrait.', 'publie');
INSERT INTO `blocs_page` (`page_id`, `ordre`, `type`, `titre_publie`, `contenu_texte_publie`, `statut`) VALUES (22, 190, 'texte', 'maraichage_p_9', 'Les paniers contiennent selon la saison : salades, pommes de terre, carottes, poireaux, oignons,
                    courges, radis, tomates, choux, etc.', 'publie');
INSERT INTO `blocs_page` (`page_id`, `ordre`, `type`, `titre_publie`, `contenu_texte_publie`, `url_publie`, `statut`) VALUES (22, 200, 'lien', 'maraichage_a_1', 'Tout savoir sur nos paniers de
                    légumes', 'index.php?view=paniers', 'publie');
INSERT INTO `blocs_page` (`page_id`, `ordre`, `type`, `titre_publie`, `contenu_texte_publie`, `statut`) VALUES (22, 210, 'texte', 'maraichage_h2_4', 'Le panier solidaire : accessible à tous', 'publie');
INSERT INTO `blocs_page` (`page_id`, `ordre`, `type`, `titre_publie`, `contenu_texte_publie`, `statut`) VALUES (22, 220, 'texte', 'maraichage_p_10', 'En complément des paniers “classiques”, l’association met en place un “panier solidaire”. Le même
                        panier de légumes peut être proposé à prix réduit pour certaines familles, la réduction
                        dépendant du quotient familial communiqué par la CAF.', 'publie');
INSERT INTO `blocs_page` (`page_id`, `ordre`, `type`, `titre_publie`, `contenu_texte_publie`, `statut`) VALUES (22, 230, 'texte', 'maraichage_p_11', 'Ce système permet de soutenir des ménages aux revenus plus modestes, tout en maintenant un prix
                        juste pour les producteurs.', 'publie');
INSERT INTO `blocs_page` (`page_id`, `ordre`, `type`, `titre_publie`, `contenu_texte_publie`, `statut`) VALUES (22, 240, 'texte', 'maraichage_h2_5', 'La Réserve, lieu de vente et de rencontre', 'publie');
INSERT INTO `blocs_page` (`page_id`, `ordre`, `type`, `titre_publie`, `contenu_texte_publie`, `statut`) VALUES (22, 250, 'texte', 'maraichage_p_12', 'Chaque semaine, La Réserve devient un lieu de rendez-vous pour les amateurs de produits locaux :
                    vente directe de légumes de Nœux Environnement, retrait des commandes passées sur LeCourtCircuit.fr,
                    et parfois présence d’autres producteurs.', 'publie');
INSERT INTO `blocs_page` (`page_id`, `ordre`, `type`, `titre_publie`, `contenu_texte_publie`, `statut`) VALUES (22, 260, 'texte', 'maraichage_p_13', 'C’est l’occasion de discuter avec les maraîchers, découvrir les jardins et rencontrer d’autres
                    acteurs du territoire.', 'publie');
INSERT INTO `blocs_page` (`page_id`, `ordre`, `type`, `titre_publie`, `contenu_texte_publie`, `statut`) VALUES (22, 270, 'texte', 'maraichage_h2_6', 'Apprendre un métier en produisant des légumes', 'publie');
INSERT INTO `blocs_page` (`page_id`, `ordre`, `type`, `titre_publie`, `contenu_texte_publie`, `statut`) VALUES (22, 280, 'texte', 'maraichage_p_14', 'L’activité maraîchère sert de support de travail aux salariés en parcours d’insertion : préparation
                    des sols, semis, plantation, désherbage manuel, récolte, lavage, pesée, préparation des paniers,
                    accueil des clients.', 'publie');
INSERT INTO `blocs_page` (`page_id`, `ordre`, `type`, `titre_publie`, `contenu_texte_publie`, `statut`) VALUES (22, 290, 'texte', 'maraichage_p_15', 'Ces tâches permettent de développer des compétences techniques en agriculture écologique et en
                    logistique, des habitudes professionnelles et une meilleure connaissance du tissu local.', 'publie');
INSERT INTO `blocs_page` (`page_id`, `ordre`, `type`, `titre_publie`, `contenu_texte_publie`, `statut`) VALUES (22, 300, 'texte', 'maraichage_h2_7', 'Mieux manger, plus près de chez soi', 'publie');
INSERT INTO `blocs_page` (`page_id`, `ordre`, `type`, `titre_publie`, `contenu_texte_publie`, `statut`) VALUES (22, 310, 'texte', 'maraichage_p_16', 'À travers ce projet maraîcher, Nœux Environnement souhaite encourager la consommation de produits frais,
                de saison, issus du territoire, montrer que l’on peut manger mieux sans forcément dépenser plus, et
                proposer des supports pédagogiques pour parler alimentation, santé, budget et gaspillage alimentaire.', 'publie');
INSERT INTO `blocs_page` (`page_id`, `ordre`, `type`, `titre_publie`, `contenu_texte_publie`, `statut`) VALUES (23, 10, 'texte', 'nous-rejoindre_p_1', 'Vous avez envie de vous impliquer à nos
                côtés ? Il existe plusieurs façons de rejoindre Nœux Environnement : en tant que bénévole, comme salarié
                en insertion ou salarié “classique”, ou via un stage ou un service civique.', 'publie');
INSERT INTO `blocs_page` (`page_id`, `ordre`, `type`, `titre_publie`, `contenu_texte_publie`, `statut`) VALUES (23, 20, 'texte', 'nous-rejoindre_h2_1', 'Devenir bénévole à Nœux Environnement', 'publie');
INSERT INTO `blocs_page` (`page_id`, `ordre`, `type`, `titre_publie`, `contenu_texte_publie`, `statut`) VALUES (23, 30, 'texte', 'nous-rejoindre_p_2', 'Les bénévoles ont une place importante dans la vie de l’association. Ils peuvent venir donner un
                        coup de main lors des chantiers participatifs, sur des événements, pendant des ateliers, ou sur
                        des tâches plus ponctuelles.', 'publie');
INSERT INTO `blocs_page` (`page_id`, `ordre`, `type`, `titre_publie`, `contenu_texte_publie`, `statut`) VALUES (23, 40, 'texte', 'nous-rejoindre_p_3', 'Ce que vous pouvez faire : tenir un stand, participer à un chantier nature, aider à l’entretien
                        des jardins, donner un coup de main sur une action de sensibilisation, prêter vos compétences.', 'publie');
INSERT INTO `blocs_page` (`page_id`, `ordre`, `type`, `titre_publie`, `contenu_texte_publie`, `statut`) VALUES (23, 50, 'texte', 'nous-rejoindre_p_4', 'Il n’est pas nécessaire d’être expert : la motivation et l’envie de participer sont les plus
                        importantes.', 'publie');
INSERT INTO `blocs_page` (`page_id`, `ordre`, `type`, `titre_publie`, `contenu_texte_publie`, `url_publie`, `statut`) VALUES (23, 60, 'lien', 'nous-rejoindre_a_1', 'Je veux devenir
                        bénévole', 'index.php?view=contact', 'publie');
INSERT INTO `blocs_page` (`page_id`, `ordre`, `type`, `titre_publie`, `contenu_texte_publie`, `statut`) VALUES (23, 70, 'texte', 'nous-rejoindre_h2_2', 'Travailler à Nœux Environnement', 'publie');
INSERT INTO `blocs_page` (`page_id`, `ordre`, `type`, `titre_publie`, `contenu_texte_publie`, `statut`) VALUES (23, 80, 'texte', 'nous-rejoindre_p_5', 'Nœux Environnement est aussi un employeur via son Atelier Chantier d’Insertion (ACI) et
                    ponctuellement via des postes plus classiques.', 'publie');
INSERT INTO `blocs_page` (`page_id`, `ordre`, `type`, `titre_publie`, `contenu_texte_publie`, `statut`) VALUES (23, 90, 'texte', 'nous-rejoindre_h3_1', 'Les postes en insertion', 'publie');
INSERT INTO `blocs_page` (`page_id`, `ordre`, `type`, `titre_publie`, `contenu_texte_publie`, `statut`) VALUES (23, 100, 'texte', 'nous-rejoindre_p_6', 'Les contrats d’insertion concernent des postes comme ouvrier sur les chantiers nature, ouvrier
                    maraîcher, ou participation à certaines activités de sensibilisation. Ces contrats sont réservés à
                    des personnes éligibles à l’IAE.', 'publie');
INSERT INTO `blocs_page` (`page_id`, `ordre`, `type`, `titre_publie`, `contenu_texte_publie`, `statut`) VALUES (23, 110, 'texte', 'nous-rejoindre_p_7', 'En plus du travail sur le terrain, chaque salarié bénéficie d’un suivi social et d’un accompagnement
                    professionnel.', 'publie');
INSERT INTO `blocs_page` (`page_id`, `ordre`, `type`, `titre_publie`, `contenu_texte_publie`, `statut`) VALUES (23, 120, 'texte', 'nous-rejoindre_h3_2', 'Comment candidater ?', 'publie');
INSERT INTO `blocs_page` (`page_id`, `ordre`, `type`, `titre_publie`, `contenu_texte_publie`, `statut`) VALUES (23, 130, 'texte', 'nous-rejoindre_li_1', 'Pour un poste en insertion :parlez-en à votre référent (Pôle Emploi, Mission
                        Locale, PLIE) ou contactez-nous.', 'publie');
INSERT INTO `blocs_page` (`page_id`, `ordre`, `type`, `titre_publie`, `contenu_texte_publie`, `statut`) VALUES (23, 140, 'texte', 'nous-rejoindre_li_2', 'Pour un autre poste :consultez les offres en cours et envoyez CV + lettre de
                        motivation.', 'publie');
INSERT INTO `blocs_page` (`page_id`, `ordre`, `type`, `titre_publie`, `contenu_texte_publie`, `url_publie`, `statut`) VALUES (23, 150, 'lien', 'nous-rejoindre_a_2', 'Voir nos offres d’emploi', '#', 'publie');
INSERT INTO `blocs_page` (`page_id`, `ordre`, `type`, `titre_publie`, `contenu_texte_publie`, `statut`) VALUES (23, 160, 'texte', 'nous-rejoindre_h2_3', 'Stages & Service Civique', 'publie');
INSERT INTO `blocs_page` (`page_id`, `ordre`, `type`, `titre_publie`, `contenu_texte_publie`, `statut`) VALUES (23, 170, 'texte', 'nous-rejoindre_p_8', 'Nœux Environnement accueille régulièrement des stagiaires et des volontaires en Service Civique,
                        en particulier sur les missions de sensibilisation à l’environnement, de lien avec les habitants
                        et d’animation.', 'publie');
INSERT INTO `blocs_page` (`page_id`, `ordre`, `type`, `titre_publie`, `contenu_texte_publie`, `statut`) VALUES (23, 180, 'texte', 'nous-rejoindre_p_9', 'Les missions peuvent porter sur l’éducation à l’environnement, la communication, ou l’appui aux
                        projets de l’association.', 'publie');
INSERT INTO `blocs_page` (`page_id`, `ordre`, `type`, `titre_publie`, `contenu_texte_publie`, `url_publie`, `statut`) VALUES (23, 190, 'lien', 'nous-rejoindre_a_3', 'Proposer ma candidature', 'index.php?view=contact', 'publie');
INSERT INTO `blocs_page` (`page_id`, `ordre`, `type`, `titre_publie`, `contenu_texte_publie`, `statut`) VALUES (24, 10, 'texte', 'actions_h2_1', 'Nature & Territoires', 'publie');
INSERT INTO `blocs_page` (`page_id`, `ordre`, `type`, `titre_publie`, `contenu_texte_publie`, `statut`) VALUES (24, 20, 'texte', 'actions_p_1', 'Nous menons des chantiers d''entretien et de restauration des milieux naturels pour préserver la
                        biodiversité locale.', 'publie');
INSERT INTO `blocs_page` (`page_id`, `ordre`, `type`, `titre_publie`, `contenu_texte_publie`, `url_publie`, `statut`) VALUES (24, 30, 'lien', 'actions_a_1', 'En savoir plus', 'index.php?view=nature-territoires', 'publie');
INSERT INTO `blocs_page` (`page_id`, `ordre`, `type`, `titre_publie`, `contenu_texte_publie`, `statut`) VALUES (24, 40, 'texte', 'actions_h2_2', 'Maraîchage Biologique', 'publie');
INSERT INTO `blocs_page` (`page_id`, `ordre`, `type`, `titre_publie`, `contenu_texte_publie`, `statut`) VALUES (24, 50, 'texte', 'actions_p_2', 'Production de légumes bio locaux et de saison, distribués sous forme de paniers hebdomadaires.', 'publie');
INSERT INTO `blocs_page` (`page_id`, `ordre`, `type`, `titre_publie`, `contenu_texte_publie`, `url_publie`, `statut`) VALUES (24, 60, 'lien', 'actions_a_2', 'Commander un panier', 'index.php?view=paniers', 'publie');
INSERT INTO `blocs_page` (`page_id`, `ordre`, `type`, `titre_publie`, `contenu_texte_publie`, `statut`) VALUES (24, 70, 'texte', 'actions_h2_3', 'Éducation à l''environnement', 'publie');
INSERT INTO `blocs_page` (`page_id`, `ordre`, `type`, `titre_publie`, `contenu_texte_publie`, `statut`) VALUES (24, 80, 'texte', 'actions_p_3', 'Sensibilisation des publics scolaires et du grand public aux enjeux environnementaux à travers
                        des ateliers pédagogiques.', 'publie');
INSERT INTO `blocs_page` (`page_id`, `ordre`, `type`, `titre_publie`, `contenu_texte_publie`, `url_publie`, `statut`) VALUES (24, 90, 'lien', 'actions_a_3', 'Réserver une animation', 'index.php?view=contact', 'publie');
INSERT INTO `blocs_page` (`page_id`, `ordre`, `type`, `titre_publie`, `contenu_texte_publie`, `statut`) VALUES (24, 100, 'texte', 'actions_h2_4', 'Insertion & Accompagnement', 'publie');
INSERT INTO `blocs_page` (`page_id`, `ordre`, `type`, `titre_publie`, `contenu_texte_publie`, `statut`) VALUES (24, 110, 'texte', 'actions_p_4', 'Accompagnement socioprofessionnel de personnes éloignées de l''emploi à travers nos chantiers
                        nature.', 'publie');
INSERT INTO `blocs_page` (`page_id`, `ordre`, `type`, `titre_publie`, `contenu_texte_publie`, `url_publie`, `statut`) VALUES (24, 120, 'lien', 'actions_a_4', 'Découvrir notre mission', 'index.php?view=insertion', 'publie');
INSERT INTO `blocs_page` (`page_id`, `ordre`, `type`, `titre_publie`, `contenu_texte_publie`, `statut`) VALUES (25, 10, 'texte', 'la-reserve_p_1', 'La Réserve, c’est notre nouveau lieu de vie
                et de travail à Nœux-les-Mines. Ancien supermarché et grande friche commerciale, le site a été
                entièrement transformé pour devenir un écolieu vivant, ouvert aux habitants, aux partenaires, aux
                scolaires et à tous les curieux.', 'publie');
INSERT INTO `blocs_page` (`page_id`, `ordre`, `type`, `titre_publie`, `contenu_texte_publie`, `statut`) VALUES (25, 20, 'texte', 'la-reserve_p_2', 'On y trouve à la fois des jardins et
                parcelles de maraîchage bio, des salles pour se réunir et se former, des espaces pour les animations,
                ateliers et événements, et les locaux de Nœux Environnement.', 'publie');
INSERT INTO `blocs_page` (`page_id`, `ordre`, `type`, `titre_publie`, `contenu_texte_publie`, `statut`) VALUES (25, 30, 'texte', 'la-reserve_h2_1', 'D’une friche commerciale à un écolieu vivant', 'publie');
INSERT INTO `blocs_page` (`page_id`, `ordre`, `type`, `titre_publie`, `contenu_texte_publie`, `statut`) VALUES (25, 40, 'texte', 'la-reserve_p_3', 'Pendant des années, le site était une ancienne friche commerciale, avec un bâtiment de
                        supermarché et de grands parkings. Aujourd’hui, La Réserve est devenue un démonstrateur de la
                        transition écologique et solidaire, un tiers-lieu géré par Nœux Environnement, et un endroit où
                        se rencontrent biodiversité, agriculture durable, pédagogie et insertion.', 'publie');
INSERT INTO `blocs_page` (`page_id`, `ordre`, `type`, `titre_publie`, `contenu_texte_publie`, `statut`) VALUES (25, 50, 'texte', 'la-reserve_p_4', 'Une partie du foncier est consacrée au bâtiment rénové, l’autre à des espaces extérieurs :
                        jardins, terres agricoles, espaces d’essais, zones plus naturelles.', 'publie');
INSERT INTO `blocs_page` (`page_id`, `ordre`, `type`, `titre_publie`, `contenu_texte_publie`, `statut`) VALUES (25, 60, 'texte', 'la-reserve_h2_2', 'Un bâtiment démonstrateur de la transition écologique', 'publie');
INSERT INTO `blocs_page` (`page_id`, `ordre`, `type`, `titre_publie`, `contenu_texte_publie`, `statut`) VALUES (25, 70, 'texte', 'la-reserve_p_5', 'La Réserve n’est pas qu’un bâtiment “classique” : réutilisation d’une structure existante plutôt que
                    de construire ailleurs, choix de matériaux sobres et performants, réflexion sur la gestion de l’eau
                    et de l’énergie, liens forts avec la nature autour du bâtiment.', 'publie');
INSERT INTO `blocs_page` (`page_id`, `ordre`, `type`, `titre_publie`, `contenu_texte_publie`, `statut`) VALUES (25, 80, 'texte', 'la-reserve_p_6', 'Le site sert de support pédagogique : visites, ateliers, événements permettent d’expliquer
                    concrètement comment on peut rénover, réutiliser, végétaliser et faire évoluer des lieux existants.', 'publie');
INSERT INTO `blocs_page` (`page_id`, `ordre`, `type`, `titre_publie`, `contenu_texte_publie`, `statut`) VALUES (25, 90, 'texte', 'la-reserve_h2_3', 'Des jardins et du maraîchage bio en insertion', 'publie');
INSERT INTO `blocs_page` (`page_id`, `ordre`, `type`, `titre_publie`, `contenu_texte_publie`, `statut`) VALUES (25, 100, 'texte', 'la-reserve_p_7', 'Autour du bâtiment, La Réserve accueille des parcelles de maraîchage biologique, des zones
                        plantées (haies, bosquets, bandes fleuries), et des espaces pédagogiques (jardin, sol vivant,
                        compost, mare, etc.).', 'publie');
INSERT INTO `blocs_page` (`page_id`, `ordre`, `type`, `titre_publie`, `contenu_texte_publie`, `statut`) VALUES (25, 110, 'texte', 'la-reserve_p_8', 'Les jardins sont cultivés par Les Maraîchers de Nœux Environnement, une équipe en insertion qui
                        produit des légumes bio vendus en paniers, sur place et via la plateforme LeCourtCircuit.fr.', 'publie');
INSERT INTO `blocs_page` (`page_id`, `ordre`, `type`, `titre_publie`, `contenu_texte_publie`, `statut`) VALUES (25, 120, 'texte', 'la-reserve_h2_4', 'Des salles et espaces pour se réunir', 'publie');
INSERT INTO `blocs_page` (`page_id`, `ordre`, `type`, `titre_publie`, `contenu_texte_publie`, `statut`) VALUES (25, 130, 'texte', 'la-reserve_p_9', 'À l’intérieur, La Réserve propose plusieurs types d’espaces : bureaux pour l’équipe, salles de
                    réunion et de formation, espaces modulables pour des ateliers et conférences, et lieux de
                    convivialité.', 'publie');
INSERT INTO `blocs_page` (`page_id`, `ordre`, `type`, `titre_publie`, `contenu_texte_publie`, `statut`) VALUES (25, 140, 'texte', 'la-reserve_p_10', 'Ces salles permettent d’organiser des réunions de travail, des formations, des rencontres thématiques
                    et des événements plus festifs liés à la transition écologique et solidaire.', 'publie');
INSERT INTO `blocs_page` (`page_id`, `ordre`, `type`, `titre_publie`, `contenu_texte_publie`, `statut`) VALUES (25, 150, 'texte', 'la-reserve_h2_5', 'Un lieu ouvert aux habitants et aux partenaires', 'publie');
INSERT INTO `blocs_page` (`page_id`, `ordre`, `type`, `titre_publie`, `contenu_texte_publie`, `statut`) VALUES (25, 160, 'texte', 'la-reserve_p_11', 'La Réserve accueille régulièrement des animations tout public, des événements (inauguration, journées
                    portes ouvertes, fêtes), un petit marché de producteurs locaux, et des actions plus spécifiques.', 'publie');
INSERT INTO `blocs_page` (`page_id`, `ordre`, `type`, `titre_publie`, `contenu_texte_publie`, `statut`) VALUES (25, 170, 'texte', 'la-reserve_p_12', 'Habitants, élus, associations, structures sociales, entreprises… tout le monde peut venir découvrir
                    le lieu, participer à une activité ou échanger sur un projet.', 'publie');
INSERT INTO `blocs_page` (`page_id`, `ordre`, `type`, `titre_publie`, `contenu_texte_publie`, `statut`) VALUES (25, 180, 'texte', 'la-reserve_h2_6', 'Comment découvrir La Réserve ?', 'publie');
INSERT INTO `blocs_page` (`page_id`, `ordre`, `type`, `titre_publie`, `contenu_texte_publie`, `statut`) VALUES (25, 190, 'texte', 'la-reserve_p_13', 'La Réserve se situe :22 bis rue Nationale, 62290 Nœux-les-Mines.', 'publie');
INSERT INTO `blocs_page` (`page_id`, `ordre`, `type`, `titre_publie`, `contenu_texte_publie`, `statut`) VALUES (25, 200, 'texte', 'la-reserve_p_14', 'Un site internet dédié présente également La Réserve plus en détail.', 'publie');
INSERT INTO `blocs_page` (`page_id`, `ordre`, `type`, `titre_publie`, `contenu_texte_publie`, `url_publie`, `statut`) VALUES (25, 210, 'lien', 'la-reserve_a_1', 'Découvrir le site de la Réserve', '../reserve/index.php?view=accueil', 'publie');
INSERT INTO `blocs_page` (`page_id`, `ordre`, `type`, `titre_publie`, `contenu_texte_publie`, `statut`) VALUES (13, 10, 'texte', 'decouvrir_h2_1', 'D’une friche commerciale à un écolieu vivant', 'publie');
INSERT INTO `blocs_page` (`page_id`, `ordre`, `type`, `titre_publie`, `contenu_texte_publie`, `statut`) VALUES (13, 20, 'texte', 'decouvrir_p_1', 'Pendant des années, le site de La Réserve n’était qu’un grand bâtiment de supermarché et de
                        vastes parkings bitumés.', 'publie');
INSERT INTO `blocs_page` (`page_id`, `ordre`, `type`, `titre_publie`, `contenu_texte_publie`, `statut`) VALUES (13, 30, 'texte', 'decouvrir_p_2', 'Avec La Réserve, Nœux Environnement et ses partenaires ont voulu :', 'publie');
INSERT INTO `blocs_page` (`page_id`, `ordre`, `type`, `titre_publie`, `contenu_texte_publie`, `statut`) VALUES (13, 40, 'texte', 'decouvrir_li_1', 'réutiliser ce lieu au lieu de construire ailleurs ;', 'publie');
INSERT INTO `blocs_page` (`page_id`, `ordre`, `type`, `titre_publie`, `contenu_texte_publie`, `statut`) VALUES (13, 50, 'texte', 'decouvrir_li_2', 'désimperméabiliser une partie des surfaces ;', 'publie');
INSERT INTO `blocs_page` (`page_id`, `ordre`, `type`, `titre_publie`, `contenu_texte_publie`, `statut`) VALUES (13, 60, 'texte', 'decouvrir_li_3', 'ramener de la nature : arbres, haies, verger, jardins, micro-forêt, mares ;', 'publie');
INSERT INTO `blocs_page` (`page_id`, `ordre`, `type`, `titre_publie`, `contenu_texte_publie`, `statut`) VALUES (13, 70, 'texte', 'decouvrir_li_4', 'en faire un lieu de rencontres, d’expérimentations et de pédagogie.', 'publie');
INSERT INTO `blocs_page` (`page_id`, `ordre`, `type`, `titre_publie`, `contenu_texte_publie`, `statut`) VALUES (13, 80, 'texte', 'decouvrir_p_3', 'L’objectif : montrer qu’il est possible de transformer une friche
                        commerciale en un espace fertile, accueillant, vivant.', 'publie');
INSERT INTO `blocs_page` (`page_id`, `ordre`, `type`, `titre_publie`, `contenu_texte_publie`, `statut`) VALUES (13, 90, 'texte', 'decouvrir_h2_2', 'Un laboratoire à ciel ouvert', 'publie');
INSERT INTO `blocs_page` (`page_id`, `ordre`, `type`, `titre_publie`, `contenu_texte_publie`, `statut`) VALUES (13, 100, 'texte', 'decouvrir_p_4', 'La Réserve est pensée comme un
                laboratoire à ciel ouvert de la transition écologique et solidaire. On y travaille sur plusieurs
                dimensions :', 'publie');
INSERT INTO `blocs_page` (`page_id`, `ordre`, `type`, `titre_publie`, `contenu_texte_publie`, `statut`) VALUES (13, 110, 'texte', 'decouvrir_h3_1', 'Bâtiment & Énergie', 'publie');
INSERT INTO `blocs_page` (`page_id`, `ordre`, `type`, `titre_publie`, `contenu_texte_publie`, `statut`) VALUES (13, 120, 'texte', 'decouvrir_p_5', 'Rénovation et transformation d’un bâtiment existant, solutions bioclimatiques, énergie
                        renouvelable, confort d’usage.', 'publie');
INSERT INTO `blocs_page` (`page_id`, `ordre`, `type`, `titre_publie`, `contenu_texte_publie`, `statut`) VALUES (13, 130, 'texte', 'decouvrir_h3_2', 'Eau & Sols', 'publie');
INSERT INTO `blocs_page` (`page_id`, `ordre`, `type`, `titre_publie`, `contenu_texte_publie`, `statut`) VALUES (13, 140, 'texte', 'decouvrir_p_6', 'Désimperméabilisation, infiltration de l’eau de pluie, travail sur le sol vivant.', 'publie');
INSERT INTO `blocs_page` (`page_id`, `ordre`, `type`, `titre_publie`, `contenu_texte_publie`, `statut`) VALUES (13, 150, 'texte', 'decouvrir_h3_3', 'Biodiversité', 'publie');
INSERT INTO `blocs_page` (`page_id`, `ordre`, `type`, `titre_publie`, `contenu_texte_publie`, `statut`) VALUES (13, 160, 'texte', 'decouvrir_p_7', 'Plantation d’arbres, haies, verger, micro-forêt, zones enherbées, mares, habitats pour la faune.', 'publie');
INSERT INTO `blocs_page` (`page_id`, `ordre`, `type`, `titre_publie`, `contenu_texte_publie`, `statut`) VALUES (13, 170, 'texte', 'decouvrir_h3_4', 'Agriculture & Alimentation', 'publie');
INSERT INTO `blocs_page` (`page_id`, `ordre`, `type`, `titre_publie`, `contenu_texte_publie`, `statut`) VALUES (13, 180, 'texte', 'decouvrir_p_8', 'Maraîchage biologique, circuits courts, point relais, cuisine et gaspillage alimentaire.', 'publie');
INSERT INTO `blocs_page` (`page_id`, `ordre`, `type`, `titre_publie`, `contenu_texte_publie`, `statut`) VALUES (13, 190, 'texte', 'decouvrir_h3_5', 'Insertion & Lien Social', 'publie');
INSERT INTO `blocs_page` (`page_id`, `ordre`, `type`, `titre_publie`, `contenu_texte_publie`, `statut`) VALUES (13, 200, 'texte', 'decouvrir_p_9', 'Parcours d’insertion, chantiers avec des habitants, événements à destination de tous.', 'publie');
INSERT INTO `blocs_page` (`page_id`, `ordre`, `type`, `titre_publie`, `contenu_texte_publie`, `statut`) VALUES (13, 210, 'texte', 'decouvrir_p_10', 'La Réserve est un lieu où l’on peut voir, toucher,
                comprendre ce que signifie la transition écologique dans la vie quotidienne.', 'publie');
INSERT INTO `blocs_page` (`page_id`, `ordre`, `type`, `titre_publie`, `contenu_texte_publie`, `statut`) VALUES (13, 220, 'texte', 'decouvrir_h2_3', 'Un tiers-lieu nourricier et social', 'publie');
INSERT INTO `blocs_page` (`page_id`, `ordre`, `type`, `titre_publie`, `contenu_texte_publie`, `statut`) VALUES (13, 230, 'texte', 'decouvrir_p_11', 'La Réserve est un tiers-lieu : un espace qui n’est ni seulement un bâtiment, ni seulement une
                        ferme,
                        ni seulement un centre social… mais un peu tout ça à la fois.', 'publie');
INSERT INTO `blocs_page` (`page_id`, `ordre`, `type`, `titre_publie`, `contenu_texte_publie`, `statut`) VALUES (13, 240, 'texte', 'decouvrir_p_12', 'On peut y :', 'publie');
INSERT INTO `blocs_page` (`page_id`, `ordre`, `type`, `titre_publie`, `contenu_texte_publie`, `statut`) VALUES (13, 250, 'texte', 'decouvrir_li_5', 'acheter des légumes bio et locaux ;', 'publie');
INSERT INTO `blocs_page` (`page_id`, `ordre`, `type`, `titre_publie`, `contenu_texte_publie`, `statut`) VALUES (13, 260, 'texte', 'decouvrir_li_6', 'participer à des ateliers cuisine ou jardin ;', 'publie');
INSERT INTO `blocs_page` (`page_id`, `ordre`, `type`, `titre_publie`, `contenu_texte_publie`, `statut`) VALUES (13, 270, 'texte', 'decouvrir_li_7', 'venir travailler ou se réunir ;', 'publie');
INSERT INTO `blocs_page` (`page_id`, `ordre`, `type`, `titre_publie`, `contenu_texte_publie`, `statut`) VALUES (13, 280, 'texte', 'decouvrir_li_8', 'se former aux métiers de la transition ;', 'publie');
INSERT INTO `blocs_page` (`page_id`, `ordre`, `type`, `titre_publie`, `contenu_texte_publie`, `statut`) VALUES (13, 290, 'texte', 'decouvrir_li_9', 'simplement se promener et observer la nature.', 'publie');
INSERT INTO `blocs_page` (`page_id`, `ordre`, `type`, `titre_publie`, `contenu_texte_publie`, `statut`) VALUES (13, 300, 'texte', 'decouvrir_h2_4', 'Un projet collectif', 'publie');
INSERT INTO `blocs_page` (`page_id`, `ordre`, `type`, `titre_publie`, `contenu_texte_publie`, `statut`) VALUES (13, 310, 'texte', 'decouvrir_p_13', 'La Réserve n’existerait pas sans l''engagement de Nœux Environnement, le soutien de collectivités
                    (commune, intercommunalité, Région, Département), l''appui de programmes régionaux et européens, des
                    partenaires techniques, et des associations, habitants et structures locales.', 'publie');
INSERT INTO `blocs_page` (`page_id`, `ordre`, `type`, `titre_publie`, `contenu_texte_publie`, `statut`) VALUES (13, 320, 'texte', 'decouvrir_p_14', 'La Réserve est donc à la fois un lieu géré par Nœux Environnement, et un projet partagé avec de
                    nombreux acteurs du territoire.', 'publie');
INSERT INTO `blocs_page` (`page_id`, `ordre`, `type`, `titre_publie`, `contenu_texte_publie`, `statut`) VALUES (14, 10, 'texte', 'jardins_h2_1', 'Qui cultive les jardins ?', 'publie');
INSERT INTO `blocs_page` (`page_id`, `ordre`, `type`, `titre_publie`, `contenu_texte_publie`, `statut`) VALUES (14, 20, 'texte', 'jardins_p_1', 'Les jardins de La Réserve sont cultivés par l’équipe des Maraîchers de Nœux Environnement. Leur
                        rôle : préparer les sols, semer, planter, récolter, et participer à la vente.', 'publie');
INSERT INTO `blocs_page` (`page_id`, `ordre`, `type`, `titre_publie`, `contenu_texte_publie`, `statut`) VALUES (14, 30, 'texte', 'jardins_p_2', 'Cette équipe fonctionne comme un atelier d’insertion : des personnes éloignées de l’emploi y
                        travaillent, se forment et construisent un projet professionnel, encadrées par des
                        professionnels.', 'publie');
INSERT INTO `blocs_page` (`page_id`, `ordre`, `type`, `titre_publie`, `contenu_texte_publie`, `statut`) VALUES (14, 40, 'texte', 'jardins_h2_2', 'Des légumes bio, de saison', 'publie');
INSERT INTO `blocs_page` (`page_id`, `ordre`, `type`, `titre_publie`, `contenu_texte_publie`, `statut`) VALUES (14, 50, 'texte', 'jardins_p_3', 'Les jardins sont cultivés en
                agriculture biologique : pas de pesticides, pas d’engrais de synthèse, travail sur la fertilité naturelle
                du sol. L''arrosage est raisonné pour économiser l''eau.', 'publie');
INSERT INTO `blocs_page` (`page_id`, `ordre`, `type`, `titre_publie`, `contenu_texte_publie`, `statut`) VALUES (14, 60, 'texte', 'jardins_h3_1', 'Où les trouver ?', 'publie');
INSERT INTO `blocs_page` (`page_id`, `ordre`, `type`, `titre_publie`, `contenu_texte_publie`, `statut`) VALUES (14, 70, 'texte', 'jardins_li_1', 'Vendus en paniers de légumes', 'publie');
INSERT INTO `blocs_page` (`page_id`, `ordre`, `type`, `titre_publie`, `contenu_texte_publie`, `url_publie`, `statut`) VALUES (14, 80, 'lien', 'jardins_a_1', 'Vendus en paniers de légumes', '/noeux/index.php?view=paniers', 'publie');
INSERT INTO `blocs_page` (`page_id`, `ordre`, `type`, `titre_publie`, `contenu_texte_publie`, `statut`) VALUES (14, 90, 'texte', 'jardins_li_2', 'Sur le marché de La Réserve', 'publie');
INSERT INTO `blocs_page` (`page_id`, `ordre`, `type`, `titre_publie`, `contenu_texte_publie`, `url_publie`, `statut`) VALUES (14, 100, 'lien', 'jardins_a_2', 'Sur le marché de La Réserve', 'index.php?view=marche-alimentation', 'publie');
INSERT INTO `blocs_page` (`page_id`, `ordre`, `type`, `titre_publie`, `contenu_texte_publie`, `statut`) VALUES (14, 110, 'texte', 'jardins_li_3', 'En circuits courts (points relais)', 'publie');
INSERT INTO `blocs_page` (`page_id`, `ordre`, `type`, `titre_publie`, `contenu_texte_publie`, `url_publie`, `statut`) VALUES (14, 120, 'lien', 'jardins_a_3', 'En circuits courts (points relais)', 'index.php?view=marche-alimentation', 'publie');
INSERT INTO `blocs_page` (`page_id`, `ordre`, `type`, `titre_publie`, `contenu_texte_publie`, `statut`) VALUES (14, 130, 'texte', 'jardins_h2_3', 'Un jardin pour le sol vivant et la biodiversité', 'publie');
INSERT INTO `blocs_page` (`page_id`, `ordre`, `type`, `titre_publie`, `contenu_texte_publie`, `statut`) VALUES (14, 140, 'texte', 'jardins_p_4', 'On met en avant des pratiques simples :', 'publie');
INSERT INTO `blocs_page` (`page_id`, `ordre`, `type`, `titre_publie`, `contenu_texte_publie`, `statut`) VALUES (14, 150, 'texte', 'jardins_li_4', 'Sol vivant: paillage, compost, pas de labour profond.', 'publie');
INSERT INTO `blocs_page` (`page_id`, `ordre`, `type`, `titre_publie`, `contenu_texte_publie`, `statut`) VALUES (14, 160, 'texte', 'jardins_li_5', 'Rotations de cultures: pour ne pas épuiser le sol.', 'publie');
INSERT INTO `blocs_page` (`page_id`, `ordre`, `type`, `titre_publie`, `contenu_texte_publie`, `statut`) VALUES (14, 170, 'texte', 'jardins_li_6', 'Plantes compagnes: associations fleurs/légumes.', 'publie');
INSERT INTO `blocs_page` (`page_id`, `ordre`, `type`, `titre_publie`, `contenu_texte_publie`, `statut`) VALUES (14, 180, 'texte', 'jardins_li_7', 'Zones refuges: haies, bandes fleuries pour la faune.', 'publie');
INSERT INTO `blocs_page` (`page_id`, `ordre`, `type`, `titre_publie`, `contenu_texte_publie`, `statut`) VALUES (14, 190, 'texte', 'jardins_p_5', 'Ces choix permettent d''avoir des légumes de qualité, de réduire les
                    intrants
                    et de favoriser la biodiversité.', 'publie');
INSERT INTO `blocs_page` (`page_id`, `ordre`, `type`, `titre_publie`, `contenu_texte_publie`, `statut`) VALUES (14, 200, 'texte', 'jardins_h2_4', 'Des jardins pour apprendre', 'publie');
INSERT INTO `blocs_page` (`page_id`, `ordre`, `type`, `titre_publie`, `contenu_texte_publie`, `statut`) VALUES (14, 210, 'texte', 'jardins_p_6', 'Les jardins servent aussi de support pédagogique pour :', 'publie');
INSERT INTO `blocs_page` (`page_id`, `ordre`, `type`, `titre_publie`, `contenu_texte_publie`, `statut`) VALUES (14, 220, 'texte', 'jardins_li_8', 'Accueillir des classes (semer, observer, comprendre la saisonnalité).', 'publie');
INSERT INTO `blocs_page` (`page_id`, `ordre`, `type`, `titre_publie`, `contenu_texte_publie`, `statut`) VALUES (14, 230, 'texte', 'jardins_li_9', 'Proposer des ateliers tout public (compost, paillage, cuisine).', 'publie');
INSERT INTO `blocs_page` (`page_id`, `ordre`, `type`, `titre_publie`, `contenu_texte_publie`, `statut`) VALUES (14, 240, 'texte', 'jardins_li_10', 'Tester des idées et expérimenter.', 'publie');
INSERT INTO `blocs_page` (`page_id`, `ordre`, `type`, `titre_publie`, `contenu_texte_publie`, `statut`) VALUES (14, 250, 'texte', 'jardins_p_7', 'Les jardins deviennent un support concret pour comprendre ce qui se
                        passe "sous nos pieds" et dans notre assiette.', 'publie');
INSERT INTO `blocs_page` (`page_id`, `ordre`, `type`, `titre_publie`, `contenu_texte_publie`, `statut`) VALUES (14, 260, 'texte', 'jardins_h2_5', 'Visites et ateliers dans les jardins', 'publie');
INSERT INTO `blocs_page` (`page_id`, `ordre`, `type`, `titre_publie`, `contenu_texte_publie`, `statut`) VALUES (14, 270, 'texte', 'jardins_p_8', 'Vous pouvez découvrir les jardins lors d’événements, de visites guidées ou d''animations scolaires.', 'publie');
INSERT INTO `blocs_page` (`page_id`, `ordre`, `type`, `titre_publie`, `contenu_texte_publie`, `url_publie`, `statut`) VALUES (14, 280, 'lien', 'jardins_a_4', 'Voir les prochaines visites', '/noeux/index.php?view=agenda', 'publie');
INSERT INTO `blocs_page` (`page_id`, `ordre`, `type`, `titre_publie`, `contenu_texte_publie`, `url_publie`, `statut`) VALUES (14, 290, 'lien', 'jardins_a_5', 'Organiser une visite de groupe', 'index.php?view=visites', 'publie');
INSERT INTO `blocs_page` (`page_id`, `ordre`, `type`, `titre_publie`, `contenu_texte_publie`, `statut`) VALUES (15, 10, 'texte', 'marche-alimentation_h2_1', 'Le marché à La Réserve', 'publie');
INSERT INTO `blocs_page` (`page_id`, `ordre`, `type`, `titre_publie`, `contenu_texte_publie`, `statut`) VALUES (15, 20, 'texte', 'marche-alimentation_p_1', 'La Réserve accueille un petit marché avec les légumes bio cultivés sur place par les Maraîchers
                        de Nœux Environnement et parfois d''autres producteurs locaux.', 'publie');
INSERT INTO `blocs_page` (`page_id`, `ordre`, `type`, `titre_publie`, `contenu_texte_publie`, `statut`) VALUES (15, 30, 'texte', 'marche-alimentation_p_2', 'Vous pouvez y acheter des légumes au détail, récupérer votre panier, et
                        discuter avec l''équipe. C''est un moment convivial pour rencontrer d''autres habitants.', 'publie');
INSERT INTO `blocs_page` (`page_id`, `ordre`, `type`, `titre_publie`, `contenu_texte_publie`, `statut`) VALUES (15, 40, 'texte', 'marche-alimentation_h2_2', 'Point relais de producteurs locaux', 'publie');
INSERT INTO `blocs_page` (`page_id`, `ordre`, `type`, `titre_publie`, `contenu_texte_publie`, `statut`) VALUES (15, 50, 'texte', 'marche-alimentation_p_3', 'La Réserve est un point relais pour des commandes de produits locaux (via LeCourtCircuit ou autre).', 'publie');
INSERT INTO `blocs_page` (`page_id`, `ordre`, `type`, `titre_publie`, `contenu_texte_publie`, `statut`) VALUES (15, 60, 'texte', 'marche-alimentation_li_1', 'Commandez vos produits en ligne.', 'publie');
INSERT INTO `blocs_page` (`page_id`, `ordre`, `type`, `titre_publie`, `contenu_texte_publie`, `statut`) VALUES (15, 70, 'texte', 'marche-alimentation_li_2', 'Choisissez La Réserve comme point de retrait.', 'publie');
INSERT INTO `blocs_page` (`page_id`, `ordre`, `type`, `titre_publie`, `contenu_texte_publie`, `statut`) VALUES (15, 80, 'texte', 'marche-alimentation_li_3', 'Venez chercher votre commande à l''horaire indiqué.', 'publie');
INSERT INTO `blocs_page` (`page_id`, `ordre`, `type`, `titre_publie`, `contenu_texte_publie`, `statut`) VALUES (15, 90, 'texte', 'marche-alimentation_p_4', 'Cela permet de soutenir un réseau de producteurs locaux et de centraliser
                    les retraits.', 'publie');
INSERT INTO `blocs_page` (`page_id`, `ordre`, `type`, `titre_publie`, `contenu_texte_publie`, `statut`) VALUES (15, 100, 'texte', 'marche-alimentation_h2_3', 'Paniers de légumes & Panier Solidaire', 'publie');
INSERT INTO `blocs_page` (`page_id`, `ordre`, `type`, `titre_publie`, `contenu_texte_publie`, `statut`) VALUES (15, 110, 'texte', 'marche-alimentation_p_5', 'Les paniers de légumes bio de saison sont préparés par les Maraîchers de Nœux Environnement. Il
                    existe aussi un panier solidaire à tarif réduit sous conditions.', 'publie');
INSERT INTO `blocs_page` (`page_id`, `ordre`, `type`, `titre_publie`, `contenu_texte_publie`, `url_publie`, `statut`) VALUES (15, 120, 'lien', 'marche-alimentation_a_1', 'En savoir plus sur les
                    paniers', '/noeux/index.php?view=paniers', 'publie');
INSERT INTO `blocs_page` (`page_id`, `ordre`, `type`, `titre_publie`, `contenu_texte_publie`, `statut`) VALUES (15, 130, 'texte', 'marche-alimentation_h2_4', 'Ateliers autour de l’alimentation', 'publie');
INSERT INTO `blocs_page` (`page_id`, `ordre`, `type`, `titre_publie`, `contenu_texte_publie`, `statut`) VALUES (15, 140, 'texte', 'marche-alimentation_h3_1', 'Cuisine de saison', 'publie');
INSERT INTO `blocs_page` (`page_id`, `ordre`, `type`, `titre_publie`, `contenu_texte_publie`, `statut`) VALUES (15, 150, 'texte', 'marche-alimentation_p_6', 'Découvrir de nouvelles recettes avec les légumes du moment.', 'publie');
INSERT INTO `blocs_page` (`page_id`, `ordre`, `type`, `titre_publie`, `contenu_texte_publie`, `statut`) VALUES (15, 160, 'texte', 'marche-alimentation_h3_2', 'Anti-gaspillage', 'publie');
INSERT INTO `blocs_page` (`page_id`, `ordre`, `type`, `titre_publie`, `contenu_texte_publie`, `statut`) VALUES (15, 170, 'texte', 'marche-alimentation_p_7', 'Apprendre à tout utiliser et limiter les déchets.', 'publie');
INSERT INTO `blocs_page` (`page_id`, `ordre`, `type`, `titre_publie`, `contenu_texte_publie`, `statut`) VALUES (15, 180, 'texte', 'marche-alimentation_h3_3', 'Repas partagés', 'publie');
INSERT INTO `blocs_page` (`page_id`, `ordre`, `type`, `titre_publie`, `contenu_texte_publie`, `statut`) VALUES (15, 190, 'texte', 'marche-alimentation_p_8', 'Moments conviviaux lors d''événements.', 'publie');
INSERT INTO `blocs_page` (`page_id`, `ordre`, `type`, `titre_publie`, `contenu_texte_publie`, `url_publie`, `statut`) VALUES (15, 200, 'lien', 'marche-alimentation_a_2', 'Voir les prochains ateliers', 'index.php?view=agenda', 'publie');
INSERT INTO `blocs_page` (`page_id`, `ordre`, `type`, `titre_publie`, `contenu_texte_publie`, `statut`) VALUES (15, 210, 'texte', 'marche-alimentation_h2_5', 'Infos pratiques', 'publie');
INSERT INTO `blocs_page` (`page_id`, `ordre`, `type`, `titre_publie`, `contenu_texte_publie`, `statut`) VALUES (15, 220, 'texte', 'marche-alimentation_li_4', 'Marché :[Jours et Horaires à préciser]', 'publie');
INSERT INTO `blocs_page` (`page_id`, `ordre`, `type`, `titre_publie`, `contenu_texte_publie`, `statut`) VALUES (15, 230, 'texte', 'marche-alimentation_li_5', 'Retrait commandes :[Jours et Horaires à préciser]', 'publie');
INSERT INTO `blocs_page` (`page_id`, `ordre`, `type`, `titre_publie`, `contenu_texte_publie`, `statut`) VALUES (15, 240, 'texte', 'marche-alimentation_li_6', 'Paiement :Espèces, Chèque, CB (selon producteurs).', 'publie');
INSERT INTO `blocs_page` (`page_id`, `ordre`, `type`, `titre_publie`, `contenu_texte_publie`, `statut`) VALUES (16, 10, 'texte', 'visites_h2_1', 'Pour le grand public et les familles', 'publie');
INSERT INTO `blocs_page` (`page_id`, `ordre`, `type`, `titre_publie`, `contenu_texte_publie`, `statut`) VALUES (16, 20, 'texte', 'visites_p_1', 'Plusieurs fois par an, La Réserve propose des visites et ateliers ouverts à tous :', 'publie');
INSERT INTO `blocs_page` (`page_id`, `ordre`, `type`, `titre_publie`, `contenu_texte_publie`, `statut`) VALUES (16, 30, 'texte', 'visites_li_1', 'visites guidées du site(histoire de la friche, bâtiment, jardins, maraîchage…)
                        ;', 'publie');
INSERT INTO `blocs_page` (`page_id`, `ordre`, `type`, `titre_publie`, `contenu_texte_publie`, `statut`) VALUES (16, 40, 'texte', 'visites_li_2', 'balades dans les jardins: sol vivant, compost, biodiversité ;', 'publie');
INSERT INTO `blocs_page` (`page_id`, `ordre`, `type`, `titre_publie`, `contenu_texte_publie`, `statut`) VALUES (16, 50, 'texte', 'visites_li_3', 'ateliers pratiques: jardiner au naturel, bricolage nature, cuisine des légumes
                        de saison…', 'publie');
INSERT INTO `blocs_page` (`page_id`, `ordre`, `type`, `titre_publie`, `contenu_texte_publie`, `statut`) VALUES (16, 60, 'texte', 'visites_p_2', 'Ces rendez-vous sont annoncés dans notre agenda.', 'publie');
INSERT INTO `blocs_page` (`page_id`, `ordre`, `type`, `titre_publie`, `contenu_texte_publie`, `statut`) VALUES (16, 70, 'texte', 'visites_p_3', '🔎Pour connaître les prochaines dates, consultez la page Agenda.', 'publie');
INSERT INTO `blocs_page` (`page_id`, `ordre`, `type`, `titre_publie`, `contenu_texte_publie`, `statut`) VALUES (16, 80, 'texte', 'visites_p_4', 'Si vous souhaitez organiser un groupe de particuliers (amis, voisins, association…),
                        contactez-nous via la page Contact & demandes.', 'publie');
INSERT INTO `blocs_page` (`page_id`, `ordre`, `type`, `titre_publie`, `contenu_texte_publie`, `statut`) VALUES (16, 90, 'texte', 'visites_h2_2', 'Venir avec une classe ou un groupe de jeunes', 'publie');
INSERT INTO `blocs_page` (`page_id`, `ordre`, `type`, `titre_publie`, `contenu_texte_publie`, `statut`) VALUES (16, 100, 'texte', 'visites_p_5', 'En lien avec Nœux Environnement, La Réserve accueille des :', 'publie');
INSERT INTO `blocs_page` (`page_id`, `ordre`, `type`, `titre_publie`, `contenu_texte_publie`, `statut`) VALUES (16, 110, 'texte', 'visites_li_4', 'classes (de la maternelle au lycée),', 'publie');
INSERT INTO `blocs_page` (`page_id`, `ordre`, `type`, `titre_publie`, `contenu_texte_publie`, `statut`) VALUES (16, 120, 'texte', 'visites_li_5', 'centres de loisirs et structures jeunesse,', 'publie');
INSERT INTO `blocs_page` (`page_id`, `ordre`, `type`, `titre_publie`, `contenu_texte_publie`, `statut`) VALUES (16, 130, 'texte', 'visites_li_6', 'groupes d’enfants ou d’ados accompagnés par des éducateurs.', 'publie');
INSERT INTO `blocs_page` (`page_id`, `ordre`, `type`, `titre_publie`, `contenu_texte_publie`, `statut`) VALUES (16, 140, 'texte', 'visites_p_6', 'Les animations s’appuient sur le bâtiment (énergie, matériaux, eau), les
                    jardins et le maraîchage, et les espaces extérieurs (biodiversité, sols, eau, climat).', 'publie');
INSERT INTO `blocs_page` (`page_id`, `ordre`, `type`, `titre_publie`, `contenu_texte_publie`, `statut`) VALUES (16, 150, 'texte', 'visites_p_7', 'Exemples de thèmes :“Comprendre un écolieu vivant”, “Du
                    sol à l’assiette”, “Biodiversité autour de nous”, “Changer nos habitudes pour le climat”.', 'publie');
INSERT INTO `blocs_page` (`page_id`, `ordre`, `type`, `titre_publie`, `contenu_texte_publie`, `statut`) VALUES (16, 160, 'texte', 'visites_p_8', '📌Nous adaptons le contenu à :l’âge des participants, les programmes
                        scolaires, votre projet pédagogique.', 'publie');
INSERT INTO `blocs_page` (`page_id`, `ordre`, `type`, `titre_publie`, `contenu_texte_publie`, `statut`) VALUES (16, 170, 'texte', 'visites_p_9', '👉 Pour construire une visite scolaire ou un projet sur plusieurs séances, merci de passer par la
                        page Contact & demandes (sujet : “Visite / animation”).', 'publie');
INSERT INTO `blocs_page` (`page_id`, `ordre`, `type`, `titre_publie`, `contenu_texte_publie`, `statut`) VALUES (16, 180, 'texte', 'visites_h2_3', 'Visites techniques et journées professionnelles', 'publie');
INSERT INTO `blocs_page` (`page_id`, `ordre`, `type`, `titre_publie`, `contenu_texte_publie`, `statut`) VALUES (16, 190, 'texte', 'visites_p_10', 'La Réserve est un site ressource pour les professionnels qui s’intéressent à la transition écologique
                    :', 'publie');
INSERT INTO `blocs_page` (`page_id`, `ordre`, `type`, `titre_publie`, `contenu_texte_publie`, `statut`) VALUES (16, 200, 'texte', 'visites_li_7', 'élus et services techniques de collectivités,', 'publie');
INSERT INTO `blocs_page` (`page_id`, `ordre`, `type`, `titre_publie`, `contenu_texte_publie`, `statut`) VALUES (16, 210, 'texte', 'visites_li_8', 'bureaux d’études, architectes, paysagistes, urbanistes,', 'publie');
INSERT INTO `blocs_page` (`page_id`, `ordre`, `type`, `titre_publie`, `contenu_texte_publie`, `statut`) VALUES (16, 220, 'texte', 'visites_li_9', 'organismes de formation, écoles, universités,', 'publie');
INSERT INTO `blocs_page` (`page_id`, `ordre`, `type`, `titre_publie`, `contenu_texte_publie`, `statut`) VALUES (16, 230, 'texte', 'visites_li_10', 'entreprises engagées dans la RSE et la transition.', 'publie');
INSERT INTO `blocs_page` (`page_id`, `ordre`, `type`, `titre_publie`, `contenu_texte_publie`, `statut`) VALUES (16, 240, 'texte', 'visites_p_11', 'Thématiques possibles :transformation d’une friche
                    commerciale en écolieu, désimperméabilisation et renaturation, réhabilitation frugale d’un bâtiment,
                    tiers-lieu nourricier, maraîchage et alimentation, articulation projet social – projet écologique.', 'publie');
INSERT INTO `blocs_page` (`page_id`, `ordre`, `type`, `titre_publie`, `contenu_texte_publie`, `statut`) VALUES (16, 250, 'texte', 'visites_p_12', 'Les visites techniques peuvent combiner : des temps en salle (présentation, échanges), une visite
                        commentée du site, des ateliers de terrain.', 'publie');
INSERT INTO `blocs_page` (`page_id`, `ordre`, `type`, `titre_publie`, `contenu_texte_publie`, `statut`) VALUES (16, 260, 'texte', 'visites_p_13', '👉 Pour organiser une visite technique ou une journée pro, merci
                        d’utiliser la page Contact & demandes (sujet : “Visite / animation – public professionnel”).', 'publie');
INSERT INTO `blocs_page` (`page_id`, `ordre`, `type`, `titre_publie`, `contenu_texte_publie`, `statut`) VALUES (16, 270, 'texte', 'visites_h2_4', 'Comment ça se passe ?', 'publie');
INSERT INTO `blocs_page` (`page_id`, `ordre`, `type`, `titre_publie`, `contenu_texte_publie`, `statut`) VALUES (16, 280, 'texte', 'visites_h3_1', '1. Vous nous contactez', 'publie');
INSERT INTO `blocs_page` (`page_id`, `ordre`, `type`, `titre_publie`, `contenu_texte_publie`, `statut`) VALUES (16, 290, 'texte', 'visites_p_14', 'Via la page Contact, sujet “Visite / animation”, en précisant : type de public, nombre de
                        personnes, âge, thème souhaité, dates possibles.', 'publie');
INSERT INTO `blocs_page` (`page_id`, `ordre`, `type`, `titre_publie`, `contenu_texte_publie`, `statut`) VALUES (16, 300, 'texte', 'visites_h3_2', '2. Nous construisons ensemble', 'publie');
INSERT INTO `blocs_page` (`page_id`, `ordre`, `type`, `titre_publie`, `contenu_texte_publie`, `statut`) VALUES (16, 310, 'texte', 'visites_p_15', 'Nous définissons le contenu de la visite / animation, la durée, les horaires, et l''organisation
                        pratique (accès, équipements, repas, etc.).', 'publie');
INSERT INTO `blocs_page` (`page_id`, `ordre`, `type`, `titre_publie`, `contenu_texte_publie`, `statut`) VALUES (16, 320, 'texte', 'visites_h3_3', '3. Nous confirmons', 'publie');
INSERT INTO `blocs_page` (`page_id`, `ordre`, `type`, `titre_publie`, `contenu_texte_publie`, `statut`) VALUES (16, 330, 'texte', 'visites_p_16', 'Nous validons la date et les modalités. Vous recevez un mail récapitulatif, avec, si besoin, une
                        convention ou un devis.', 'publie');
INSERT INTO `blocs_page` (`page_id`, `ordre`, `type`, `titre_publie`, `contenu_texte_publie`, `statut`) VALUES (16, 340, 'texte', 'visites_p_17', '🎟️ Prêt à préparer une visite ?', 'publie');
INSERT INTO `blocs_page` (`page_id`, `ordre`, `type`, `titre_publie`, `contenu_texte_publie`, `url_publie`, `statut`) VALUES (16, 350, 'lien', 'visites_a_1', 'Demander une visite ou une animation', 'index.php?view=contact&subject=visite', 'publie');
INSERT INTO `blocs_page` (`page_id`, `ordre`, `type`, `titre_publie`, `contenu_texte_publie`, `statut`) VALUES (17, 10, 'texte', 'agenda_h2_1', 'Les prochains rendez-vous', 'publie');
INSERT INTO `blocs_page` (`page_id`, `ordre`, `type`, `titre_publie`, `contenu_texte_publie`, `statut`) VALUES (17, 20, 'texte', 'agenda_h2_2', 'Quels événements à La Réserve ?', 'publie');
INSERT INTO `blocs_page` (`page_id`, `ordre`, `type`, `titre_publie`, `contenu_texte_publie`, `statut`) VALUES (17, 30, 'texte', 'agenda_li_1', 'Visites guidées: découverte de l’écolieu.', 'publie');
INSERT INTO `blocs_page` (`page_id`, `ordre`, `type`, `titre_publie`, `contenu_texte_publie`, `statut`) VALUES (17, 40, 'texte', 'agenda_li_2', 'Ateliers jardin & nature: sol, biodiversité, bricolage.', 'publie');
INSERT INTO `blocs_page` (`page_id`, `ordre`, `type`, `titre_publie`, `contenu_texte_publie`, `statut`) VALUES (17, 50, 'texte', 'agenda_li_3', 'Ateliers alimentation: cuisine, anti-gaspillage.', 'publie');
INSERT INTO `blocs_page` (`page_id`, `ordre`, `type`, `titre_publie`, `contenu_texte_publie`, `statut`) VALUES (17, 60, 'texte', 'agenda_li_4', 'Événements tout public: fêtes, marchés.', 'publie');
INSERT INTO `blocs_page` (`page_id`, `ordre`, `type`, `titre_publie`, `contenu_texte_publie`, `statut`) VALUES (17, 70, 'texte', 'agenda_li_5', 'Journées professionnelles: visites techniques.', 'publie');
INSERT INTO `blocs_page` (`page_id`, `ordre`, `type`, `titre_publie`, `contenu_texte_publie`, `statut`) VALUES (17, 80, 'texte', 'agenda_h2_3', 'Proposer un événement', 'publie');
INSERT INTO `blocs_page` (`page_id`, `ordre`, `type`, `titre_publie`, `contenu_texte_publie`, `statut`) VALUES (17, 90, 'texte', 'agenda_p_1', 'Vous êtes une association, une collectivité, une entreprise ? Vous souhaitez organiser un événement à La Réserve ?', 'publie');
INSERT INTO `blocs_page` (`page_id`, `ordre`, `type`, `titre_publie`, `contenu_texte_publie`, `url_publie`, `statut`) VALUES (17, 100, 'lien', 'agenda_a_1', 'Contactez-nous pour en discuter', 'index.php?view=contact', 'publie');
INSERT INTO `blocs_page` (`page_id`, `ordre`, `type`, `titre_publie`, `contenu_texte_publie`, `statut`) VALUES (20, 10, 'texte', 'mentions-legales_h2_1', 'Éditeur du site', 'publie');
INSERT INTO `blocs_page` (`page_id`, `ordre`, `type`, `titre_publie`, `contenu_texte_publie`, `statut`) VALUES (20, 20, 'texte', 'mentions-legales_p_1', 'Nœux EnvironnementAssociation loi 190122 bis Rue Nationale62290 Nœux-les-MinesTél : 03 21 66 37 74Email : contact@noeuxenvironnement.fr', 'publie');
INSERT INTO `blocs_page` (`page_id`, `ordre`, `type`, `titre_publie`, `contenu_texte_publie`, `statut`) VALUES (20, 30, 'texte', 'mentions-legales_h2_2', 'Directeur de la publication', 'publie');
INSERT INTO `blocs_page` (`page_id`, `ordre`, `type`, `titre_publie`, `contenu_texte_publie`, `statut`) VALUES (20, 40, 'texte', 'mentions-legales_p_2', 'Monsieur le Président de Nœux Environnement.', 'publie');
INSERT INTO `blocs_page` (`page_id`, `ordre`, `type`, `titre_publie`, `contenu_texte_publie`, `statut`) VALUES (20, 50, 'texte', 'mentions-legales_h2_3', 'Hébergement', 'publie');
INSERT INTO `blocs_page` (`page_id`, `ordre`, `type`, `titre_publie`, `contenu_texte_publie`, `statut`) VALUES (20, 60, 'texte', 'mentions-legales_p_3', 'Ce site est hébergé par [Nom de l''hébergeur][Adresse de l''hébergeur][Contact de l''hébergeur]', 'publie');
INSERT INTO `blocs_page` (`page_id`, `ordre`, `type`, `titre_publie`, `contenu_texte_publie`, `statut`) VALUES (20, 70, 'texte', 'mentions-legales_h2_4', 'Propriété intellectuelle', 'publie');
INSERT INTO `blocs_page` (`page_id`, `ordre`, `type`, `titre_publie`, `contenu_texte_publie`, `statut`) VALUES (20, 80, 'texte', 'mentions-legales_p_4', 'L’ensemble de ce site relève de la législation française et internationale sur le droit d’auteur et
                    la propriété intellectuelle. Tous les droits de reproduction sont réservés, y compris pour les
                    documents téléchargeables et les représentations iconographiques et photographiques.', 'publie');
INSERT INTO `blocs_page` (`page_id`, `ordre`, `type`, `titre_publie`, `contenu_texte_publie`, `statut`) VALUES (20, 90, 'texte', 'mentions-legales_h2_5', 'Données personnelles', 'publie');
INSERT INTO `blocs_page` (`page_id`, `ordre`, `type`, `titre_publie`, `contenu_texte_publie`, `statut`) VALUES (20, 100, 'texte', 'mentions-legales_p_5', 'Conformément à la loi « Informatique et Libertés » et au RGPD, vous disposez d’un droit d’accès, de
                    modification et de suppression des données vous concernant. Pour l''exercer, adressez-vous à Nœux
                    Environnement via le formulaire de contact ou par courrier.', 'publie');
INSERT INTO `blocs_page` (`page_id`, `ordre`, `type`, `titre_publie`, `contenu_texte_publie`, `statut`) VALUES (26, 10, 'texte', 'actualites_h2_1', 'À la une', 'publie');
INSERT INTO `blocs_page` (`page_id`, `ordre`, `type`, `titre_publie`, `contenu_texte_publie`, `statut`) VALUES (26, 20, 'texte', 'actualites_h3_1', 'Les travaux de rénovation avancent !', 'publie');
INSERT INTO `blocs_page` (`page_id`, `ordre`, `type`, `titre_publie`, `contenu_texte_publie`, `statut`) VALUES (26, 30, 'texte', 'actualites_p_1', 'Publié le 10 Juin 2024', 'publie');
INSERT INTO `blocs_page` (`page_id`, `ordre`, `type`, `titre_publie`, `contenu_texte_publie`, `statut`) VALUES (26, 40, 'texte', 'actualites_p_2', 'La réhabilitation du bâtiment principal entre dans sa phase finale. L''isolation extérieure est
                        terminée et les aménagements intérieurs des salles de réunion commencent. Un chantier exemplaire
                        en termes de matériaux biosourcés.', 'publie');
INSERT INTO `blocs_page` (`page_id`, `ordre`, `type`, `titre_publie`, `contenu_texte_publie`, `url_publie`, `statut`) VALUES (26, 50, 'lien', 'actualites_a_1', 'Lire l''article', '#', 'publie');
INSERT INTO `blocs_page` (`page_id`, `ordre`, `type`, `titre_publie`, `contenu_texte_publie`, `statut`) VALUES (26, 60, 'texte', 'actualites_h2_2', 'Toutes les actualités', 'publie');
INSERT INTO `blocs_page` (`page_id`, `ordre`, `type`, `titre_publie`, `contenu_texte_publie`, `statut`) VALUES (26, 70, 'texte', 'actualites_h3_2', 'Plantation de la micro-forêt', 'publie');
INSERT INTO `blocs_page` (`page_id`, `ordre`, `type`, `titre_publie`, `contenu_texte_publie`, `statut`) VALUES (26, 80, 'texte', 'actualites_p_3', '25 Mai 2024', 'publie');
INSERT INTO `blocs_page` (`page_id`, `ordre`, `type`, `titre_publie`, `contenu_texte_publie`, `statut`) VALUES (26, 90, 'texte', 'actualites_p_4', 'Retour en images sur le chantier participatif où plus de 100 arbres ont
                            été plantés avec les habitants.', 'publie');
INSERT INTO `blocs_page` (`page_id`, `ordre`, `type`, `titre_publie`, `contenu_texte_publie`, `url_publie`, `statut`) VALUES (26, 100, 'lien', 'actualites_a_2', 'Lire la suite →', '#', 'publie');
INSERT INTO `blocs_page` (`page_id`, `ordre`, `type`, `titre_publie`, `contenu_texte_publie`, `statut`) VALUES (26, 110, 'texte', 'actualites_h3_3', 'Succès pour la fête du printemps', 'publie');
INSERT INTO `blocs_page` (`page_id`, `ordre`, `type`, `titre_publie`, `contenu_texte_publie`, `statut`) VALUES (26, 120, 'texte', 'actualites_p_5', '15 Mai 2024', 'publie');
INSERT INTO `blocs_page` (`page_id`, `ordre`, `type`, `titre_publie`, `contenu_texte_publie`, `statut`) VALUES (26, 130, 'texte', 'actualites_p_6', 'Une belle journée de convivialité sous le soleil, avec marché, musique
                            et
                            découverte des jardins.', 'publie');
INSERT INTO `blocs_page` (`page_id`, `ordre`, `type`, `titre_publie`, `contenu_texte_publie`, `url_publie`, `statut`) VALUES (26, 140, 'lien', 'actualites_a_3', 'Lire la suite →', '#', 'publie');
INSERT INTO `blocs_page` (`page_id`, `ordre`, `type`, `titre_publie`, `contenu_texte_publie`, `statut`) VALUES (26, 150, 'texte', 'actualites_h3_4', 'Accueil des écoles : c''est parti', 'publie');
INSERT INTO `blocs_page` (`page_id`, `ordre`, `type`, `titre_publie`, `contenu_texte_publie`, `statut`) VALUES (26, 160, 'texte', 'actualites_p_7', '02 Mai 2024', 'publie');
INSERT INTO `blocs_page` (`page_id`, `ordre`, `type`, `titre_publie`, `contenu_texte_publie`, `statut`) VALUES (26, 170, 'texte', 'actualites_p_8', 'Les premières classes sont venues découvrir la biodiversité de La
                            Réserve. Au programme : observation des insectes et semis.', 'publie');
INSERT INTO `blocs_page` (`page_id`, `ordre`, `type`, `titre_publie`, `contenu_texte_publie`, `url_publie`, `statut`) VALUES (26, 180, 'lien', 'actualites_a_4', 'Lire la suite →', '#', 'publie');
INSERT INTO `blocs_page` (`page_id`, `ordre`, `type`, `titre_publie`, `contenu_texte_publie`, `statut`) VALUES (26, 190, 'texte', 'actualites_h2_3', 'Et du côté de Nœux Environnement ?', 'publie');
INSERT INTO `blocs_page` (`page_id`, `ordre`, `type`, `titre_publie`, `contenu_texte_publie`, `statut`) VALUES (26, 200, 'texte', 'actualites_p_9', 'Pour suivre aussi les actualités de l’association Nœux Environnement (chantiers nature, projets sur
                    le
                    territoire, vie associative…), vous pouvez consulter le site principal.', 'publie');
INSERT INTO `blocs_page` (`page_id`, `ordre`, `type`, `titre_publie`, `contenu_texte_publie`, `url_publie`, `statut`) VALUES (26, 210, 'lien', 'actualites_a_5', 'Voir les actus Nœux
                    Environnement', '/noeux/index.php?view=actualites', 'publie');
INSERT INTO `blocs_page` (`page_id`, `ordre`, `type`, `titre_publie`, `contenu_texte_publie`, `statut`) VALUES (27, 10, 'texte', 'chiffres-amenagements_h2_1', 'Surfaces et aménagements', 'publie');
INSERT INTO `blocs_page` (`page_id`, `ordre`, `type`, `titre_publie`, `contenu_texte_publie`, `statut`) VALUES (27, 20, 'texte', 'chiffres-amenagements_h3_1', 'Surfaces du site', 'publie');
INSERT INTO `blocs_page` (`page_id`, `ordre`, `type`, `titre_publie`, `contenu_texte_publie`, `statut`) VALUES (27, 30, 'texte', 'chiffres-amenagements_li_1', 'Ancien site de grande distribution: environ 25 000 m² de friche
                            commerciale
                            attenants à des terres agricoles.', 'publie');
INSERT INTO `blocs_page` (`page_id`, `ordre`, `type`, `titre_publie`, `contenu_texte_publie`, `statut`) VALUES (27, 40, 'texte', 'chiffres-amenagements_li_2', 'Bâtiment réhabilité: plus de 2 000 m².', 'publie');
INSERT INTO `blocs_page` (`page_id`, `ordre`, `type`, `titre_publie`, `contenu_texte_publie`, `statut`) VALUES (27, 50, 'texte', 'chiffres-amenagements_li_3', 'Espaces extérieurs repensés: environ 7 000 m² comprenant cours,
                            cheminements,
                            jardins, maraîchage, verger, micro-forêt, espaces de tests.', 'publie');
INSERT INTO `blocs_page` (`page_id`, `ordre`, `type`, `titre_publie`, `contenu_texte_publie`, `statut`) VALUES (27, 60, 'texte', 'chiffres-amenagements_h2_2', 'Le bâtiment : un démonstrateur de rénovation frugale', 'publie');
INSERT INTO `blocs_page` (`page_id`, `ordre`, `type`, `titre_publie`, `contenu_texte_publie`, `statut`) VALUES (27, 70, 'texte', 'chiffres-amenagements_h3_2', 'Un bâtiment réhabilité plutôt qu’un bâtiment neuf', 'publie');
INSERT INTO `blocs_page` (`page_id`, `ordre`, `type`, `titre_publie`, `contenu_texte_publie`, `statut`) VALUES (27, 80, 'texte', 'chiffres-amenagements_p_1', 'Le choix a été fait de réutiliser l’existant : garder la structure, retravailler l’enveloppe,
                        repenser l’intérieur. C’est un exemple concret de réhabilitation frugale : faire le maximum avec
                        ce qui existe déjà.', 'publie');
INSERT INTO `blocs_page` (`page_id`, `ordre`, `type`, `titre_publie`, `contenu_texte_publie`, `statut`) VALUES (27, 90, 'texte', 'chiffres-amenagements_h3_3', 'Quelques éléments techniques', 'publie');
INSERT INTO `blocs_page` (`page_id`, `ordre`, `type`, `titre_publie`, `contenu_texte_publie`, `statut`) VALUES (27, 100, 'texte', 'chiffres-amenagements_li_4', 'Utilisation de matériaux biosourcés et de solutions de réemploi.', 'publie');
INSERT INTO `blocs_page` (`page_id`, `ordre`, `type`, `titre_publie`, `contenu_texte_publie`, `statut`) VALUES (27, 110, 'texte', 'chiffres-amenagements_li_5', 'Panneaux photovoltaïques pour l’électricité.', 'publie');
INSERT INTO `blocs_page` (`page_id`, `ordre`, `type`, `titre_publie`, `contenu_texte_publie`, `statut`) VALUES (27, 120, 'texte', 'chiffres-amenagements_li_6', 'Dispositifs bioclimatiques (apports solaires, ventilation, isolation).', 'publie');
INSERT INTO `blocs_page` (`page_id`, `ordre`, `type`, `titre_publie`, `contenu_texte_publie`, `statut`) VALUES (27, 130, 'texte', 'chiffres-amenagements_li_7', 'Gestion de l’eau (récupération, infiltration).', 'publie');
INSERT INTO `blocs_page` (`page_id`, `ordre`, `type`, `titre_publie`, `contenu_texte_publie`, `statut`) VALUES (27, 140, 'texte', 'chiffres-amenagements_p_2', 'Le bâtiment devient ainsi un support pour des visites techniques, des
                        formations et des animations pédagogiques.', 'publie');
INSERT INTO `blocs_page` (`page_id`, `ordre`, `type`, `titre_publie`, `contenu_texte_publie`, `statut`) VALUES (27, 150, 'texte', 'chiffres-amenagements_h2_3', 'Maraîchage & alimentation', 'publie');
INSERT INTO `blocs_page` (`page_id`, `ordre`, `type`, `titre_publie`, `contenu_texte_publie`, `statut`) VALUES (27, 160, 'texte', 'chiffres-amenagements_h3_4', 'Une ferme maraîchère à La Réserve', 'publie');
INSERT INTO `blocs_page` (`page_id`, `ordre`, `type`, `titre_publie`, `contenu_texte_publie`, `statut`) VALUES (27, 170, 'texte', 'chiffres-amenagements_p_3', 'Sur le site, environ 1 hectare est dédié au maraîchage biologique (plein champ, serres tunnels, serre
                    chapelle). Les Maraîchers de Nœux Environnement y produisent des légumes bio de saison vendus en
                    paniers, sur le marché ou en circuits courts.', 'publie');
INSERT INTO `blocs_page` (`page_id`, `ordre`, `type`, `titre_publie`, `contenu_texte_publie`, `statut`) VALUES (27, 180, 'texte', 'chiffres-amenagements_p_4', 'Le maraîchage est à la fois une activité économique locale, un support d’insertion professionnelle et
                    un terrain d’expérimentation pédagogique.', 'publie');
INSERT INTO `blocs_page` (`page_id`, `ordre`, `type`, `titre_publie`, `contenu_texte_publie`, `statut`) VALUES (27, 190, 'texte', 'chiffres-amenagements_h2_4', 'Un site ressource pour les professionnels', 'publie');
INSERT INTO `blocs_page` (`page_id`, `ordre`, `type`, `titre_publie`, `contenu_texte_publie`, `statut`) VALUES (27, 200, 'texte', 'chiffres-amenagements_p_5', 'Au-delà du grand public, La Réserve accueille collectivités, bureaux d’études, écoles et entreprises
                    pour des visites techniques sur la désimperméabilisation, la réhabilitation frugale, ou le
                    tiers-lieu nourricier.', 'publie');
INSERT INTO `blocs_page` (`page_id`, `ordre`, `type`, `titre_publie`, `contenu_texte_publie`, `statut`) VALUES (27, 210, 'texte', 'chiffres-amenagements_p_6', 'La Réserve est à la fois un lieu à vivre au quotidien et
                    un site ressource pour celles et ceux qui veulent transformer concrètement leurs territoires.', 'publie');
INSERT INTO `blocs_page` (`page_id`, `ordre`, `type`, `titre_publie`, `contenu_texte_publie`, `url_publie`, `statut`) VALUES (27, 220, 'lien', 'chiffres-amenagements_a_1', 'Organiser une visite
                    technique', 'index.php?view=contact', 'publie');