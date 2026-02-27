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
  `id` int NOT NULL AUTO_INCREMENT,
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
  `id` int NOT NULL AUTO_INCREMENT,
  `salle_id` int DEFAULT NULL,
  `prenom` varchar(80) NOT NULL,
  `nom` varchar(120) NOT NULL,
  `email` varchar(180) NOT NULL,
  `telephone` varchar(50) DEFAULT NULL,
  `id_crenau` int NOT NULL,
  `besoin_materiel` longtext,
  `cuisine_pedagogique` tinyint(1) NOT NULL DEFAULT '0',
  `message` longtext,
  `note_interne` longtext,
  `date_demande` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `date_volue` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `validation` boolean NOT NULL DEFAULT False
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
  `id` int NOT NULL AUTO_INCREMENT,
  `moment` varchar(100) NOT NULL,
  `debut` time NOT NULL,
  `fin` time NOT NULL,
  `actif` boolean NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB;

--
-- Déchargement des données de la table `creneaux`
--

INSERT INTO `creneaux` (`moment`, `debut`, `fin`, `actif`) VALUES
('matin', '08:00:00', '12:00:00', True),
('aprem', '14:00:00', '18:00:00', True);


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
-- Index pour la table `indisponibilites_salles`
--
ALTER TABLE `indisponibilites_salles`
  ADD PRIMARY KEY (`id`),
  ADD KEY `salle_id` (`salle_id`),
  ADD KEY `cree_par_id` (`cree_par_id`);

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
  ADD KEY `site_id` (`site_id`),
  ADD KEY `salle_id` (`salle_id`);

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

--
-- Contraintes pour la table `blocs_page`
--
ALTER TABLE `blocs_page`
  ADD CONSTRAINT `blocs_page_ibfk_1` FOREIGN KEY (`page_id`) REFERENCES `pages` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `blocs_page_ibfk_2` FOREIGN KEY (`media_publie_id`) REFERENCES `medias` (`id`) ON DELETE SET NULL,
  ADD CONSTRAINT `blocs_page_ibfk_3` FOREIGN KEY (`media_propose_id`) REFERENCES `medias` (`id`) ON DELETE SET NULL,
  ADD CONSTRAINT `blocs_page_ibfk_4` FOREIGN KEY (`dernier_modifie_par_id`) REFERENCES `utilisateurs` (`id`) ON DELETE SET NULL;

--
-- Contraintes pour la table `indisponibilites_salles`
--
ALTER TABLE `indisponibilites_salles`
  ADD CONSTRAINT `indisponibilites_salles_ibfk_1` FOREIGN KEY (`salle_id`) REFERENCES `salles` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `indisponibilites_salles_ibfk_2` FOREIGN KEY (`cree_par_id`) REFERENCES `utilisateurs` (`id`) ON DELETE SET NULL;

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
  ADD CONSTRAINT `reservations_ibfk_1` FOREIGN KEY (`site_id`) REFERENCES `sites` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `reservations_ibfk_2` FOREIGN KEY (`salle_id`) REFERENCES `salles` (`id`) ON DELETE SET NULL;

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
