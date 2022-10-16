-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Hôte : mysql_db
-- Généré le : dim. 16 oct. 2022 à 21:46
-- Version du serveur : 8.0.31
-- Version de PHP : 8.0.24

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de données : `docker`
--

-- --------------------------------------------------------

--
-- Structure de la table `posts`
--

CREATE TABLE `posts` (
  `id` int NOT NULL,
  `author` varchar(100) NOT NULL,
  `title` varchar(1000) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci NOT NULL,
  `content` varchar(3000) NOT NULL,
  `date` date NOT NULL,
  `image` varchar(1000) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci NOT NULL DEFAULT 'https://www.lonestarpark.com/wp-content/uploads/2019/04/image-placeholder-500x500.jpg'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Déchargement des données de la table `posts`
--

INSERT INTO `posts` (`id`, `author`, `title`, `content`, `date`, `image`) VALUES
(1, 'annemhd', 'Soupe jetée sur les «Tournesols» de Van Gogh à Londres: les militantes écologistes devant la justice', 'Trois militantes écologistes du mouvement Just Stop Oil, dont les deux qui avaient jeté vendredi 14 octobre de la soupe à la tomate sur le chef-d’œuvre de Van Gogh les «Tournesols» à la National Gallery ont comparu samedi devant un tribunal londonien.\r\n\r\nAnna Holland, une jeune femme de 20 ans originaire de Newcastle, et Phoebe Plummer, 21 ans, originaire du sud de la capitale, sont accusées de dégradations pour un montant inférieur à 5000 livres, le tableau n\'ayant pas été endommagé car protégé par une vitre. Elles ont plaidé non coupable.\r\n\r\nVendredi, lors d\'une action spectaculaire, elles avaient jeté de la soupe à la tomate sur le célèbre tableau du peintre néerlandais, avant de se coller au mur. Seul le cadre avait été légèrement endommagé et la toile avait retrouvé rapidement sa place dans le musée.\r\n\r\nCe coup d\'éclat fait partie d\'une série d\'actions lancée depuis début octobre par le mouvement Just Stop Oil qui réclame l\'arrêt de l\'exploitation des hydrocarbures au Royaume-Uni, que le gouvernement de Liz Truss a décidé d\'accélérer en pleine crise énergétique mondiale. Le juge les a remis en liberté à la condition qu\'elles n\'entrent dans aucun musée ou galerie, et n\'utilisent plus de peinture ou de substance adhésive dans l\'espace public. Leur procès est fixé au 13 décembre.\r\n\r\nLa troisième militante, Lora Johnson, 38 ans et originaire du Suffolk, est elle accusée d\'avoir commis des dégradations en couvrant de peinture orage un panneau rotatif devant le siège de Scotland Yard vendredi à Londres. Elle a également plaidé non coupable, a été libérée et son procès est fixé au 23 novembre.\r\n\r\nD\'autres manifestants s\'étaient collés à la route et la police avait affirmé avoir interpellé 24 personnes. «Le tribunal ne vous empêchera pas de protester légalement», a affirmé le juge lors de l\'audience, alors que la ministre de l\'Intérieur veut durcir la répression contre les mouvements de protestations comme Just Stop Oil, les accusant d\'actes de «guérilla». Plusieurs militants de Just Stop Oil ont déjà été condamnés à de la prison pour leurs actions de protestation.                                                                                                                                                                                        ', '2022-10-16', 'uploads/lestournesols.jpeg'),
(7, 'johndoe', 'Art Basel débarque à Paris : le programme détaillé', 'Alors qu’on vous annonçait en début d’année le choix du Grand Palais d’accueillir Art Basel plutôt que la traditionnelle Foire Internationale d’Art Contemporain sous un climat de douche froide, le moment fatidique arrive très prochainement. Paris + par Art Basel débarque au Grand Palais éphémère le week-end prochain et promet une édition inédite, riche d’un programme étoffé. On vous dit tout de ce rendez-vous immanquable.\r\n\r\nVous avez sûrement remarqué quelques installations artistiques se déployer, de l’agitation autour du Grand Palais éphémère et une certaine énergie créative se diffuser dans les travées de la capitale… Nous sommes bien dans les derniers préparatifs de Paris+ par Art Basel ! La grande foire dédiée à l’art contemporain va venir animer la capitale du 20 au 23 octobre prochain et promet déjà de belles surprises.\r\n\r\nSi toute la ville sera concernée par cette belle manifestation, l’épicentre des festivités se concentrera au Grand Palais éphémère. Dans les allées du merveilleux édifice régnant sur le Champ de Mars, plus de 150 galeries ont été réunies, des grandes institutions parisiennes aux galeries émergentes. On retrouvera ainsi peintures, sculptures, photos, dessins et installations artistiques en tout genre. Plus qu’une célébration de l’art contemporain, Paris + fera la passerelle avec les autres disciplines à l’instar du design, de la musique, du cinéma ou de la mode.\r\n\r\nCette année, l’art contemporain s’exporte aussi hors les murs ! Dans le jardin des Tuileries et au musée Eugène Delacroix sera conjointement organisée la Suite de l’Histoire, une exposition curatée par Annabelle Télèze. Au cœur de Paris, une installation monumentale, signée par Alicja Kwade, trônera au beau milieu de la Place Vendôme pendant toute la durée de l’évènement. Enfin, l’installation Karla, que l’on doit à l’artiste Omer Fast, sera exposée dans la Chapelle des Petits-Augustins des Beaux-Arts de Paris.', '2022-10-16', '');

-- --------------------------------------------------------

--
-- Structure de la table `users`
--

CREATE TABLE `users` (
  `id` int NOT NULL,
  `username` varchar(30) NOT NULL,
  `firstname` varchar(30) NOT NULL,
  `lastname` varchar(30) NOT NULL,
  `password` varchar(10000) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Déchargement des données de la table `users`
--

INSERT INTO `users` (`id`, `username`, `firstname`, `lastname`, `password`) VALUES
(1, 'annemhd', 'Anne-Catherine', 'MICHAUD', 'ab4f63f9ac65152575886860dde480a1'),
(2, 'johndoe', 'John', 'DOE', 'ab4f63f9ac65152575886860dde480a1'),
(3, 'janedoe', 'Jane', 'DOE', 'ab4f63f9ac65152575886860dde480a1'),
(4, 'janedoe', 'Jane', 'DOE', 'ab4f63f9ac65152575886860dde480a1'),
(5, 'janedoe', 'Jane', 'DOE', 'ab4f63f9ac65152575886860dde480a1'),
(6, 'janedoe', 'Jane', 'DOE', 'ab4f63f9ac65152575886860dde480a1'),
(7, 'aaa', 'aaa', 'AAA', '47bce5c74f589f4867dbd57e9ca9f808'),
(8, 'aaa', 'aaa', 'AAA', '47bce5c74f589f4867dbd57e9ca9f808'),
(9, 'aaa', 'aaa', 'AAA', '47bce5c74f589f4867dbd57e9ca9f808'),
(10, 'aaaa', 'aaaa', 'AAAA', '74b87337454200d4d33f80c4663dc5e5'),
(11, 'aaaa', 'aaaa', 'AAAA', '74b87337454200d4d33f80c4663dc5e5'),
(12, 'aaaa', 'aaaa', 'AAAA', '74b87337454200d4d33f80c4663dc5e5');

--
-- Index pour les tables déchargées
--

--
-- Index pour la table `posts`
--
ALTER TABLE `posts`
  ADD PRIMARY KEY (`id`);

--
-- Index pour la table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT pour les tables déchargées
--

--
-- AUTO_INCREMENT pour la table `posts`
--
ALTER TABLE `posts`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=24;

--
-- AUTO_INCREMENT pour la table `users`
--
ALTER TABLE `users`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
