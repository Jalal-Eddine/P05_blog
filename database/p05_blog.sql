-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jan 24, 2023 at 05:37 AM
-- Server version: 10.4.22-MariaDB
-- PHP Version: 8.1.2

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `p05_blog`
--

-- --------------------------------------------------------

--
-- Table structure for table `comment`
--

CREATE TABLE `comment` (
  `id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `post_id` int(11) NOT NULL,
  `comment_status_id` int(11) NOT NULL,
  `title` varchar(70) NOT NULL,
  `content` longtext NOT NULL,
  `created_date` datetime DEFAULT NULL,
  `updated_date` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `comment`
--

INSERT INTO `comment` (`id`, `user_id`, `post_id`, `comment_status_id`, `title`, `content`, `created_date`, `updated_date`) VALUES
(3, 3, 2, 1, 'Thanks', 'Very good article, Thank you very much', '2023-01-11 01:10:24', NULL),
(4, 3, 2, 1, 'very well ', 'thanks a lot for your comment ', '2023-01-11 01:11:06', NULL),
(6, 3, 2, 1, 'test', 'test', '2023-01-15 03:19:08', NULL),
(7, 2, 2, 1, 'test user id', 'is it working ', '2023-01-20 10:37:06', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `comment_status`
--

CREATE TABLE `comment_status` (
  `id` int(11) NOT NULL,
  `staus` varchar(45) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `comment_status`
--

INSERT INTO `comment_status` (`id`, `staus`) VALUES
(1, 'Approved'),
(2, 'Unapproved');

-- --------------------------------------------------------

--
-- Table structure for table `post`
--

CREATE TABLE `post` (
  `id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `post_status_id` int(11) NOT NULL,
  `title` varchar(70) NOT NULL,
  `hero_link` varchar(1000) DEFAULT NULL,
  `excerpt` longtext DEFAULT NULL,
  `content` longtext DEFAULT NULL,
  `created_date` datetime DEFAULT NULL,
  `update_date` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `post`
--

INSERT INTO `post` (`id`, `user_id`, `post_status_id`, `title`, `hero_link`, `excerpt`, `content`, `created_date`, `update_date`) VALUES
(2, 3, 1, 'Php blog post ', 'https://wp.firdaws.live/wp-content/uploads/2020/08/Symfony-min.png', 'How to build a blog app...', 'Connaissez-vous La Rochelle ? C’est le nom d’une ville située dans l’ouest de la France. Chaque année, 3 millions de touristes visitent la ville. On peut y aller en voiture, c’est à 467 kilomètres de Paris, 650 kilomètres de Lyon, 146 kilomètres de Nantes et 950 kilomètres de Strasbourg.\r\nSi vous n’avez pas de voiture, vous pouvez y aller en train. Il y a un TGV Paris / La Rochelle. TGV signifie Train à Grande Vitesse. C’est le train le plus rapide en France. Ça prend 2 heures et 50 minutes pour aller de Paris à La Rochelle. La Rochelle est donc à moins de 3 heures de Paris en TGV. Si vous habitez loin, vous pouvez aussi y aller en avion.\r\n\r\nDans le centre ville, on peut, par exemple, visiter l’Hôtel de ville. Il est situé place de l’Hôtel de ville. La visite coûte 3 euros 50 pour un adulte et 1 euro 50 pour un enfant. Autre visite intéressante : la Tour de la chaîne. L’entrée coûte 5 euros, mais le premier dimanche de chaque mois (entre novembre et mars), c’est gratuit.\r\n\r\nIl y a aussi de nombreux musées : le Musée maritime, le Musée des beaux-arts, le musée du Nouveau-Monde (c’est un musée sur les relations entre la France et l’Amérique, il est situé rue Fleuriau et il est gratuit pour les moins de 18 ans). Si vous aimez les poissons et la mer, il faut voir l’aquarium de La Rochelle, cet aquarium est un des plus grands d’Europe.\r\n\r\nVous pouvez aussi visiter la région de La Rochelle. Il y a notamment deux îles très touristiques : il y a l’île de Ré (vous pouvez y aller à vélo, en bus, en voiture et bien sûr en bateau) et il y a l’île d’Oléron accessible en bus et en bateau.', '2023-01-11 01:05:08', '2023-01-22 20:24:01'),
(4, 2, 1, 'Learn Go: Guide', 'https://wp.firdaws.live/wp-content/uploads/2020/07/Go-min.png', 'Le samedi, il dispute des matchs de football avec son club dans le cadre de compétitions régionales. Le dimanche, il se repose et en profite pour faire ses devoirs pour la semaine. C’est déjà le lundi, et toute la semaine recommence.', 'Le lundi, David reste toute la journée à l’école. Souvent, le soir, il pratique une activité musicale : le piano. Le mardi ressemble au lundi sauf qu’il n’y a pas d’activité après l’école, David rentre chez lui pour faire ses devoirs et se reposer. Il y a des régions où les enfants ne vont pas à l’école le mercredi. David, lui, va à l’école le mercredi matin. Le mercredi après-midi, il se détend et va jouer au football dans son club. Le jeudi est comme le mardi, on ne fait qu’aller à l’école.\r\n\r\nLe vendredi, la classe dure toute la journée mais elle est souvent plus courte pour laisser les élèves en week-end plus tôt. La journée est longue pour David qui attend le samedi toute la semaine.\r\n\r\nLe samedi, il dispute des matchs de football avec son club dans le cadre de compétitions régionales. Le dimanche, il se repose et en profite pour faire ses devoirs pour la semaine. C’est déjà le lundi, et toute la semaine recommence.', '2023-01-20 10:53:05', '2023-01-22 20:24:15'),
(5, 2, 1, 'HTML Tags', 'https://wp.firdaws.live/wp-content/uploads/2020/06/HTML5-tags-min.jpg', 'Cette section énumère toutes les balises HTML permettant de créer des listes (listes à puces, listes numérotées, listes de définitions…)', 'Le Mont Saint-Michel fait partie des sites touristiques les plus importants en France. Il est sur la liste du Patrimoine mondial de l’UNESCO depuis 1979.\r\n\r\nLe Mont Saint-Michel est au milieu d’une baie de 500 kilomètres carrés située au sud-ouest du département de la Manche en Normandie. Cette baie est célèbre pour ses grandes marées. En effet, les marées de cette baie sont les plus grandes marées d’Europe : la mer disparait sur une dizaine de kilomètres puis revient à la vitesse d’un cheval au galop.\r\n\r\nL’abbaye du Mont Saint-Michel est un lieu de pèlerinage. Son architecture religieuse et militaire date de l’époque médiévale. On peut admirer la baie à partir de la terrasse ouest. À l’abbaye, on peut faire des visites guidées, voir des animations et assister à des concerts toute l’année.\r\n\r\nAux alentours du Mont Saint-Michel, il y a les plages et la vieille ville de Granville , les îles Chausay très appréciées pour les excursions, et le musée des manuscrits à Avranches.\r\n\r\nLes spécialités locales sont nombreuses. Il faut en goûter absolument au moins trois :\r\n\r\nl’omelette de la mère Poulard\r\nl’agneau de prés-salés\r\nles crêpes\r\nDormir au Mont Saint-Michel est possible, l’hôtel Saint-Pierre (près de l’abbaye) propose des chambres doubles allant de 198 à 255 €, le petit déjeuner est à partir de 17 €. En s’éloignant un peu, on trouve des chambres à partir de 63 € par personne (petit déjeuner compris ) à l’hôtel Mercure  situé à deux kilomètres du Mont Saint-Michel.\r\n\r\nOn peut se rendre au Mont Saint-Michel depuis Paris. Pour cela, il faut prendre le TGV jusqu’à Rennes, puis la ligne express en autocar entre Rennes et le Mont Saint-Michel.', '2023-01-23 18:36:15', '2023-01-23 18:36:15');

-- --------------------------------------------------------

--
-- Table structure for table `post_status`
--

CREATE TABLE `post_status` (
  `id` int(11) NOT NULL,
  `status` varchar(10) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `post_status`
--

INSERT INTO `post_status` (`id`, `status`) VALUES
(1, 'published'),
(2, 'private'),
(3, 'draft');

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE `user` (
  `id` int(11) NOT NULL,
  `user_role_id` int(11) NOT NULL,
  `first_name` varchar(255) NOT NULL,
  `last_name` varchar(255) NOT NULL,
  `username` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `inscription_date` date DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`id`, `user_role_id`, `first_name`, `last_name`, `username`, `email`, `password`, `inscription_date`) VALUES
(2, 1, 'jalaleddine', 'elhabbazi', 'JalalEddine', 'admin@gmail.com', '$2y$10$Mtyqmnvj/A7RXirFks7wxeBuzV81YUG938OoUUZHCEreUsMnjO6f.', '2023-01-10'),
(3, 1, 'admin', 'Mr', 'admin', 'admin@gmail.com', '$2y$10$Bz5YLJJxO5Rv6dY/dsq.AuB6C/YZYl.OAvcpyVIz1lxhBub/gjcPq', '2023-01-11'),
(4, 2, 'test ', 'test', 'Test', 'test@gmail.com', '$2y$10$s5U2jOz1h4Jo2SnRz54CN.ZgQTzxi4C77LxMfeNv7xgQhbF3RH0oC', '2023-01-15');

-- --------------------------------------------------------

--
-- Table structure for table `user_role`
--

CREATE TABLE `user_role` (
  `id` int(11) NOT NULL,
  `role` varchar(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `user_role`
--

INSERT INTO `user_role` (`id`, `role`) VALUES
(1, 'admin'),
(2, 'user');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `comment`
--
ALTER TABLE `comment`
  ADD PRIMARY KEY (`id`),
  ADD KEY `fk_comment_user1` (`user_id`),
  ADD KEY `fk_comment_comment_status1` (`comment_status_id`),
  ADD KEY `fk_comment_post1` (`post_id`);

--
-- Indexes for table `comment_status`
--
ALTER TABLE `comment_status`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `post`
--
ALTER TABLE `post`
  ADD PRIMARY KEY (`id`),
  ADD KEY `fk_post_user1` (`user_id`),
  ADD KEY `fk_post_post_status1` (`post_status_id`);

--
-- Indexes for table `post_status`
--
ALTER TABLE `post_status`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`id`),
  ADD KEY `fk_user_user_role1` (`user_role_id`);

--
-- Indexes for table `user_role`
--
ALTER TABLE `user_role`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `comment`
--
ALTER TABLE `comment`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `comment_status`
--
ALTER TABLE `comment_status`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `post`
--
ALTER TABLE `post`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `user`
--
ALTER TABLE `user`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `user_role`
--
ALTER TABLE `user_role`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `comment`
--
ALTER TABLE `comment`
  ADD CONSTRAINT `fk_comment_comment_status1` FOREIGN KEY (`comment_status_id`) REFERENCES `comment_status` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `fk_comment_post1` FOREIGN KEY (`post_id`) REFERENCES `post` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `fk_comment_user1` FOREIGN KEY (`user_id`) REFERENCES `user` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Constraints for table `post`
--
ALTER TABLE `post`
  ADD CONSTRAINT `fk_post_post_status1` FOREIGN KEY (`post_status_id`) REFERENCES `post_status` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `fk_post_user1` FOREIGN KEY (`user_id`) REFERENCES `user` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Constraints for table `user`
--
ALTER TABLE `user`
  ADD CONSTRAINT `fk_user_user_role1` FOREIGN KEY (`user_role_id`) REFERENCES `user_role` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
