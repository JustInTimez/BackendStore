-- phpMyAdmin SQL Dump
-- version 5.1.2
-- https://www.phpmyadmin.net/
--
-- Host: localhost:3306
-- Generation Time: Dec 11, 2022 at 07:46 AM
-- Server version: 5.7.24
-- PHP Version: 8.1.0

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `backend_store`
--

-- --------------------------------------------------------

--
-- Table structure for table `orders`
--

CREATE TABLE `orders` (
  `order_id` int(11) NOT NULL,
  `customer_id` int(11) NOT NULL,
  `buy_date` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `orders`
--

INSERT INTO `orders` (`order_id`, `customer_id`, `buy_date`) VALUES
(1, 1, '2022-12-10'),
(2, 1, '2022-12-10'),
(3, 1, '2022-12-10');

-- --------------------------------------------------------

--
-- Table structure for table `order_product`
--

CREATE TABLE `order_product` (
  `order_id` int(11) NOT NULL,
  `product_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `order_product`
--

INSERT INTO `order_product` (`order_id`, `product_id`) VALUES
(2, 2),
(2, 4),
(3, 2),
(3, 3);

-- --------------------------------------------------------

--
-- Table structure for table `products`
--

CREATE TABLE `products` (
  `id` int(11) NOT NULL,
  `name` varchar(80) NOT NULL,
  `image` varchar(800) NOT NULL,
  `price` float NOT NULL,
  `description` varchar(300) NOT NULL,
  `rating` float NOT NULL,
  `genre` varchar(30) NOT NULL,
  `is_pc` tinyint(1) NOT NULL DEFAULT '0',
  `is_xbox` tinyint(1) NOT NULL DEFAULT '0',
  `is_ps` tinyint(1) NOT NULL DEFAULT '0',
  `stock` int(11) NOT NULL,
  `add_date` date NOT NULL DEFAULT '2022-12-09',
  `trailer_link` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `products`
--

INSERT INTO `products` (`id`, `name`, `image`, `price`, `description`, `rating`, `genre`, `is_pc`, `is_xbox`, `is_ps`, `stock`, `add_date`, `trailer_link`) VALUES
(1, 'Diablo 3', 'pc-D3.jpg', 399.95, 'Much like Diablo and Diablo II, Diablo III is an action role-playing game with fast-paced real-time combat and an isometric graphics engine. Utilizing classic dark fantasy elements and players assume the role of a heroic character charged with saving the world of Sanctuary from the forces of Hell.', 4.5, 'Action', 1, 0, 0, 10, '2022-12-09', 'https://www.youtube.com/embed/M2TpNQhfkp4?autoplay=1\" title=\"Diablo III Official Trailer\" frameborder=\"0\" allow=\"accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture\" allowfullscreen>'),
(2, 'Elden Ring', 'pc-ER.jpg', 499.95, 'Elden Ring is an action role-playing game played in a third person perspective, with gameplay focusing on combat and exploration. It features elements similar to those found in other games developed by FromSoftware, such as the Dark Souls series, Bloodborne, and Sekiro: Shadows Die Twice.', 3.9, 'Action, Souls-Like', 1, 0, 0, 6, '2022-12-08', 'https://www.youtube.com/embed/E3Huy2cdih0?autoplay=1\" title=\"ELDEN RING - Official Gameplay Reveal\" frameborder=\"0\" allow=\"accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture\" allowfullscreen>'),
(3, 'GTA V', 'pc-GTA.jpg', 399.95, 'Grand Theft Auto V is an action-adventure game played from either a third-person or first-person perspective. Players complete missions—linear scenarios with set objectives—to progress through the story. Outside of the missions, players may freely roam the open world.', 4.2, 'Action, Adventure', 1, 0, 0, 12, '2022-12-07', 'https://www.youtube.com/embed/QkkoHAzjnUs?autoplay=1\" title=\"Grand Theft Auto V Trailer\" frameborder=\"0\" allow=\"accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture\" allowfullscreen>'),
(4, 'Halo 5', 'pc-HG.jpg', 259.95, 'Halo 5: Guardians is a first-person shooter, with players experiencing most gameplay through the eyes of a playable character. Camera switches to a third-person view for some cinematics and gameplay sequences. The game preserves many of the core features of the Halo franchise\'s gameplay experience.', 3.2, 'First Person Shooter', 1, 0, 0, 18, '2022-12-06', 'https://www.youtube.com/embed/Rh_NXwqFvHc?autoplay=1\" title=\"Halo 5: Launch Gameplay Trailer\" frameborder=\"0\" allow=\"accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture\" allowfullscreen>'),
(5, 'Cuphead', 'ps4-CH.jpg', 299.95, 'Cuphead is a classic run and gun action game heavily focused on boss battles. Inspired by cartoons of the 1930s, the visuals and audio are painstakingly created with the same techniques of the era: traditional hand drawn cel animation, watercolor backgrounds, and original jazz recordings.', 1.8, 'Action, Run and Gun', 0, 0, 1, 0, '2022-12-05', 'https://www.youtube.com/embed/NN-9SQXoi50?autoplay=1\" title=\"Cuphead Launch Trailer\" frameborder=\"0\" allow=\"accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture\" allowfullscreen>'),
(6, 'Far Cry 6', 'ps4-FC5.jpg', 599.95, 'Players control an unnamed junior deputy sheriff who becomes trapped in Hope County and must work alongside various resistance factions to liberate the region from the despotic rule of the Seeds and Eden\'s Gate.', 4.9, 'First Person Shooter', 0, 0, 1, 3, '2022-12-04', 'https://www.youtube.com/embed/-IJuKT1mHO8?autoplay=1\" title=\"Far Cry 6 - Official Reveal Trailer | Ubisoft Forward\" frameborder=\"0\" allow=\"accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture\" allowfullscreen>'),
(7, 'Assassin\'s Creed Valhalla', 'ps5-ACV.jpg', 699.95, 'Assassin\'s Creed Valhalla is an Role-playing video game structured around several main story arcs and numerous optional side-missions, called \"World Events\". The player takes on the role of Eivor Varinsdottir, a Viking raider, as they lead their fellow Vikings against the Anglo-Saxon kingdoms.', 2.5, 'Action, Role Playing', 0, 0, 1, 8, '2022-12-03', 'https://www.youtube.com/embed/ssrNcwxALS4?autoplay=1\" title=\"Assassin\'s Creed Valhalla - Official Trailer\" frameborder=\"0\" allow=\"accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture\" allowfullscreen>'),
(8, 'Saint\'s Row IV', 'ps5-SR4.jpg', 419.95, 'The fourth installment of the outrageous and hilarious series of, \"Saints Row\" comes Saints Row IV. The leader of the Third Street Saints has become the President of the United States of America, and must save the world from an alien invasion that nobody saw coming.', 3.6, 'Action, Adventure', 0, 0, 1, 10, '2022-12-02', 'https://www.youtube.com/embed/0qhFgMRlgNo?autoplay=1\" title=\"Saints Row IV - Launch Trailer\" frameborder=\"0\" allow=\"accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture\" allowfullscreen>'),
(9, 'Cyberpunk 2077', 'xbone-C2077.jpg', 799.95, 'Cyberpunk 2077 is an open-world, action-adventure RPG set in the megalopolis of Night City, where you play as a cyberpunk mercenary wrapped-up in a do-or-die fight for survival. Explore the dark future, now upgraded with next-gen in mind and featuring free additional content!', 4.6, 'Action, Adventure', 0, 1, 0, 7, '2022-12-01', 'https://www.youtube.com/embed/zrHb2p4YPT0?autoplay=1\" title=\"Cyberpunk 2077: Phantom Liberty — Official Teaser #2\" frameborder=\"0\" allow=\"accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture\" allowfullscreen>'),
(10, 'God of War', 'xbone-GoW.jpg', 289.95, 'In God of War, players control Kratos, a Spartan warrior who is sent by the Greek gods to kill Ares, the god of war. As the story progresses, Kratos is revealed to be Ares\' former servant, who had been tricked into killing his own family and is haunted by terrible nightmares.', 2, 'Action, Hack and Slash', 0, 1, 0, 3, '2022-11-30', 'https://www.youtube.com/embed/MMUbcBbIXIA?autoplay=1\" title=\"God of War 3 Official Trailer HD 1080P\" frameborder=\"0\" allow=\"accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture\" allowfullscreen>'),
(11, 'Red Dead Redemption 2', 'xbox360-RDR2.jpg', 479.95, '1899 a gang of outlaws led by Dutch Van Der Linde fail a robbery and now need to fight against the law and travel across the wild country of America and when problems threaten to tear the gang apart, lead enforcer Arthur Morgan must choose between his ideals or the man who raised him.', 2.9, 'Action, Adventure', 0, 1, 0, 14, '2022-11-29', 'https://www.youtube.com/embed/eaW0tYpxyp0?autoplay=1\" title=\"Red Dead Redemption 2: Official Trailer #3\" frameborder=\"0\" allow=\"accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture\" allowfullscreen>'),
(12, 'Resident Evil 5', 'xbox360-RE5.jpg', 319.95, 'The plot involves an investigation of a terrorist threat by Bioterrorism Security Assessment Alliance agents in Kijuju, a fictional region of West Africa. Chris learns that he must confront his past in the form of an old enemy, Albert Wesker, and his former partner, Jill Valentine.', 3.3, 'Survival Horror', 0, 1, 0, 20, '2022-11-28', 'https://www.youtube.com/embed/5lYNJQVz_Pc?autoplay=1\" title=\"Resident Evil 5 Xbox 360 Trailer - Extended E3 Trailer (HD)\" frameborder=\"0\" allow=\"accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture\" allowfullscreen>');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `fname` varchar(80) NOT NULL,
  `lname` varchar(80) DEFAULT NULL,
  `email` varchar(80) NOT NULL,
  `password` varchar(255) NOT NULL,
  `contact_no` varchar(11) DEFAULT NULL,
  `dob` date DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `fname`, `lname`, `email`, `password`, `contact_no`, `dob`) VALUES
(1, 'Justin', 'Oost', 'justin@woohoo.com', '1234', NULL, NULL);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `orders`
--
ALTER TABLE `orders`
  ADD PRIMARY KEY (`order_id`),
  ADD KEY `customer_id` (`customer_id`);

--
-- Indexes for table `order_product`
--
ALTER TABLE `order_product`
  ADD KEY `order_id` (`order_id`),
  ADD KEY `product_id` (`product_id`);

--
-- Indexes for table `products`
--
ALTER TABLE `products`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `orders`
--
ALTER TABLE `orders`
  MODIFY `order_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `products`
--
ALTER TABLE `products`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `orders`
--
ALTER TABLE `orders`
  ADD CONSTRAINT `orders_ibfk_1` FOREIGN KEY (`customer_id`) REFERENCES `users` (`id`);

--
-- Constraints for table `order_product`
--
ALTER TABLE `order_product`
  ADD CONSTRAINT `order_product_ibfk_1` FOREIGN KEY (`order_id`) REFERENCES `orders` (`order_id`),
  ADD CONSTRAINT `order_product_ibfk_2` FOREIGN KEY (`product_id`) REFERENCES `products` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
